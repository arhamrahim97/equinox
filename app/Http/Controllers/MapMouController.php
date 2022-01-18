<?php

namespace App\Http\Controllers;

use App\Models\Mou;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class MapMouController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Mou::with(['pengusul'])->orderBy('id', 'desc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('pengusul', function (Mou $mou) {
                    return $mou->pengusul->nama;
                })
                ->addColumn('alamat', function (Mou $mou) {
                    return $mou->pengusul->alamat;
                })
                ->addColumn('tanggal_mulai', function ($row) {
                    return Carbon::parse($row->tanggal_mulai)->translatedFormat('d F Y');
                })
                ->addColumn('tanggal_berakhir', function ($row) {
                    return Carbon::parse($row->tanggal_berakhir)->translatedFormat('d F Y');
                })
                ->addColumn('status', function (Mou $mou) {
                    $datetime1 = date_create($mou->tanggal_berakhir);
                    $datetime2 = date_create(date("Y-m-d"));
                    $interval = date_diff($datetime1, $datetime2);
                    $jumlah_tahun =  $interval->format('%y');
                    if ($datetime1 < $datetime2) {
                        return '<span class="badge badge-danger bg-danger">' . __('components/span.kadaluarsa') . '</span>';
                    } else {
                        if ($jumlah_tahun < 1) {
                            return '<span class="badge badge-warning bg-warning">' . __('components/span.masa_tenggang') . '</span>';
                        } else {
                            return '<span class="badge badge-success bg-success">' . __('components/span.aktif') . '</span>';
                        }
                    }
                })
                ->addColumn('action', function (Mou $mou) {
                    $actionBtn = "<a target='_blank' href='" . Storage::url('/dokumen/mou/' . $mou->dokumen) . "' class='btn btn-success btn-sm'>
                                            <i class='fas fa-file-download mr-1'>
                                            </i>" .  __('pages/mou/map.unduh') . "
                                        </a>";
                    return $actionBtn;
                })
                ->rawColumns(['action', 'pengusul', 'alamat', 'tanggal_mulai', 'tanggal_berakhir', 'status'])
                ->make(true);
        }
        return view('pages.mou.map');
    }

    public function getMapDataMou()
    {
        $dataMou = Mou::all();
        $mapDataArray = array();

        $sekarang = new DateTime("now");
        $tanggal_berakhir = '';

        foreach ($dataMou as $mou) {
            $tanggal_berakhir = new DateTime($mou->tanggal_berakhir);
            $tahun = ($sekarang->diff($tanggal_berakhir)->format('%r%Y') * 12);
            $bulan = ($sekarang->diff($tanggal_berakhir)->format('%r%M') + $tahun);

            if ($bulan > 12) {
                $status = 'aktif';
                $namaStatus = '<span class="badge badge-success bg-success">' . __('components/span.aktif') . '</span>';
            } else if ($bulan < 0) {
                $status = 'tidak_aktif';
                $namaStatus = '<span class="badge badge-danger bg-danger">' . __('components/span.kadaluarsa') . '</span>';
            } else {
                $status = 'masa_tenggang';
                $namaStatus = '<span class="badge badge-warning bg-warning">' . __('components/span.masa_tenggang') . '</span>';
            }

            $mapDataArray[] = [
                'id' => $mou->id,
                'latitude' => $mou->latitude,
                'longitude' => $mou->longitude,
                'nama_pengusul' => $mou->pengusul->nama,
                'program' => $mou->program,
                'alamat' => $mou->pengusul->alamat,
                'no_referensi' => $mou->nomor_mou,
                'tanggal_berakhir' => Carbon::parse($mou->tanggal_berakhir)->translatedFormat('d F Y'),
                'dokumen' =>  Storage::url('/dokumen/mou/' . $mou->dokumen),
                'status' => $status,
                'namaStatus' => $namaStatus
            ];
        }

        return response()->json([
            $mapDataArray
        ]);
    }

    public function getDetailMou(Mou $mou)
    {
        $pertemuan = $mou->tempat_pertemuan . ' | ' . $mou->metode_pertemuan . ' | ' . Carbon::parse($mou->tanggal_pertemuan)->translatedFormat('d F Y') . ' | ' . Carbon::parse($mou->waktu_pertemuan)->format('H:i');

        $sekarang = new DateTime("now");
        $tanggal_berakhir = new DateTime($mou->tanggal_berakhir);
        $tahun = ($sekarang->diff($tanggal_berakhir)->format('%r%Y') * 12);
        $bulan = ($sekarang->diff($tanggal_berakhir)->format('%r%M') + $tahun);

        if ($bulan > 12) {
            $status = '<span class="badge badge-success bg-success">' . __('components/span.aktif') . '</span>';
        } else if ($bulan < 0) {
            $status = '<span class="badge badge-danger bg-danger">' . __('components/span.kadaluarsa') . '</span>';
        } else {
            $status = '<span class="badge badge-warning bg-warning">' . __('components/span.masa_tenggang') . '</span>';
        }

        return response()->json([
            'nomor_mou' => $mou->nomor_mou,
            'nomor_mou_pengusul' => $mou->nomor_mou_pengusul,
            'pengusul' => $mou->pengusul->nama,
            'alamat' => $mou->pengusul->alamat,
            'nik_nip_pengusul' => $mou->nik_nip_pengusul,
            'jabatan_pengusul' => $mou->jabatan_pengusul,
            'program' => $mou->program,
            'tanggal_mulai' => Carbon::parse($mou->tanggal_mulai)->translatedFormat('d F Y'),
            'tanggal_berakhir' => Carbon::parse($mou->tanggal_berakhir)->translatedFormat('d F Y'),
            'pertemuan' => $pertemuan,
            'dokumen' =>  Storage::url('/dokumen/mou/' . $mou->dokumen),
            'status' => $status
        ]);
    }
}
