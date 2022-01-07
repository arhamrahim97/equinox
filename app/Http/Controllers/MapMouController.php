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
                ->addColumn('tanggal_mulai', function (Mou $mou) {
                    return Carbon::parse($mou->tanggal_mulai)->format('d-m-Y');
                })
                ->addColumn('tanggal_berakhir', function (Mou $mou) {
                    return Carbon::parse($mou->tanggal_berakhir)->format('d-m-Y');
                })
                ->addColumn('status', function (Mou $mou) {
                    $sekarang = new DateTime("now");
                    $tanggal_berakhir = new DateTime($mou->tanggal_berakhir);
                    $tahun = ($sekarang->diff($tanggal_berakhir)->format('%r%Y') * 12);
                    $bulan = ($sekarang->diff($tanggal_berakhir)->format('%r%M') + $tahun);

                    if ($bulan > 12) {
                        $status = __('pages/mou/map.aktif');
                    } else if ($bulan < 0) {
                        $status = __('pages/mou/map.tidak_aktif');
                    } else {
                        $status = __('pages/mou/map.kurang_1_tahun');
                    }
                    return $status;
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
                $status = 'Aktif';
            } else if ($bulan < 0) {
                $status = 'Tidak Aktif';
            } else {
                $status = 'Aktif (Kurang dari 1 tahun)';
            }

            $mapDataArray[] = [
                'id' => $mou->id,
                'latitude' => $mou->latitude,
                'longitude' => $mou->longitude,
                'nama_pengusul' => $mou->pengusul->nama,
                'program' => $mou->program,
                'alamat' => $mou->pengusul->alamat,
                'no_referensi' => $mou->nomor_mou,
                'tanggal_berakhir' => Carbon::parse($mou->tanggal_berakhir)->format('d-m-Y'),
                'dokumen' =>  Storage::url('/dokumen/mou/' . $mou->dokumen),
                'status' => $status
            ];
        }

        return response()->json([
            $mapDataArray
        ]);
    }

    public function getDetailMou(Mou $mou)
    {
        $pertemuan = $mou->tempat_pertemuan . ' | ' . $mou->metode_pertemuan . ' | ' . Carbon::parse($mou->tanggal_pertemuan)->format('d-m-Y') . ' | ' . Carbon::parse($mou->waktu_pertemuan)->format('H:i');

        $sekarang = new DateTime("now");
        $tanggal_berakhir = new DateTime($mou->tanggal_berakhir);
        $tahun = ($sekarang->diff($tanggal_berakhir)->format('%r%Y') * 12);
        $bulan = ($sekarang->diff($tanggal_berakhir)->format('%r%M') + $tahun);

        if ($bulan > 12) {
            $status = 'Aktif';
        } else if ($bulan < 0) {
            $status = 'Tidak Aktif';
        } else {
            $status = 'Aktif (Kurang dari 1 tahun)';
        }

        return response()->json([
            'nomor_mou' => $mou->nomor_mou,
            'nomor_mou_pengusul' => $mou->nomor_mou_pengusul,
            'pengusul' => $mou->pengusul->nama,
            'alamat' => $mou->pengusul->alamat,
            'nik_nip_pengusul' => $mou->nik_nip_pengusul,
            'jabatan_pengusul' => $mou->jabatan_pengusul,
            'program' => $mou->program,
            'tanggal_mulai' => Carbon::parse($mou->tanggal_mulai)->format('d-m-Y'),
            'tanggal_berakhir' => Carbon::parse($mou->tanggal_berakhir)->format('d-m-Y'),
            'pertemuan' => $pertemuan,
            'dokumen' =>  Storage::url('/dokumen/mou/' . $mou->dokumen),
            'status' => $status
        ]);
    }
}
