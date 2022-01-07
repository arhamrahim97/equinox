<?php

namespace App\Http\Controllers;

use App\Models\Moa;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class MapMoaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Moa::with(['pengusul', 'mou'])->orderBy('id', 'desc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('pengusul', function (Moa $moa) {
                    return $moa->pengusul->nama;
                })
                ->addColumn('alamat', function (Moa $moa) {
                    return $moa->pengusul->alamat;
                })
                ->addColumn('tanggal_mulai', function (Moa $moa) {
                    return Carbon::parse($moa->tanggal_mulai)->format('d-m-Y');
                })
                ->addColumn('tanggal_berakhir', function (Moa $moa) {
                    return Carbon::parse($moa->tanggal_berakhir)->format('d-m-Y');
                })
                ->addColumn('status', function (Moa $moa) {
                    $sekarang = new DateTime("now");
                    $tanggal_berakhir = new DateTime($moa->tanggal_berakhir);
                    $tahun = ($sekarang->diff($tanggal_berakhir)->format('%r%Y') * 12);
                    $bulan = ($sekarang->diff($tanggal_berakhir)->format('%r%M') + $tahun);

                    if ($bulan > 12) {
                        $status = __('pages/moa/map.aktif');
                    } else if ($bulan < 0) {
                        $status = __('pages/moa/map.tidak_aktif');
                    } else {
                        $status = __('pages/moa/map.kurang_1_tahun');
                    }
                    return $status;
                })
                ->addColumn('action', function (Moa $moa) {
                    $actionBtn = "<div class='row justify-content-center'><a target='_blank' href='" . Storage::url('/dokumen/mou/' . $moa->mou->dokumen) . "' class='btn btn-primary btn-sm mx-1 my-1'><i class='fas fa-file-download mr-1'></i>" .  __('pages/moa/map.unduhMou') . "</a><a target='_blank' href='" . Storage::url('/dokumen/moa/' . $moa->dokumen) . "' class='btn btn-success btn-sm my-1'><i class='fas fa-file-download mr-1'></i>" .  __('pages/moa/map.unduhMoa') . "</a></div>";
                    return $actionBtn;
                })
                ->rawColumns(['action', 'pengusul', 'alamat', 'tanggal_mulai', 'tanggal_berakhir', 'status'])
                ->make(true);
        }
        return view('pages.moa.map');
    }

    public function getMapDataMoa()
    {
        $dataMoa = Moa::all();
        $mapDataArray = array();

        $sekarang = new DateTime("now");
        $tanggal_berakhir = '';

        foreach ($dataMoa as $moa) {
            $tanggal_berakhir = new DateTime($moa->tanggal_berakhir);
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
                'id' => $moa->id,
                'latitude' => $moa->latitude,
                'longitude' => $moa->longitude,
                'nama_pengusul' => $moa->pengusul->nama,
                'program' => $moa->program,
                'alamat' => $moa->pengusul->alamat,
                'no_referensi' => $moa->nomor_moa,
                'tanggal_berakhir' => Carbon::parse($moa->tanggal_berakhir)->format('d-m-Y'),
                'dokumen_moa' =>  Storage::url('/dokumen/moa/' . $moa->dokumen),
                'dokumen_mou' =>  Storage::url('/dokumen/mou/' . $moa->mou->dokumen),
                'status' => $status
            ];
        }

        return response()->json([
            $mapDataArray
        ]);
    }

    public function getDetailMoa(Moa $moa)
    {
        $pertemuan = $moa->tempat_pertemuan . ' | ' . $moa->metode_pertemuan . ' | ' . Carbon::parse($moa->tanggal_pertemuan)->format('d-m-Y') . ' | ' . Carbon::parse($moa->waktu_pertemuan)->format('H:i');

        $sekarang = new DateTime("now");
        $tanggal_berakhir = new DateTime($moa->tanggal_berakhir);
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
            'nomor_moa' => $moa->nomor_moa,
            'nomor_moa_pengusul' => $moa->nomor_moa_pengusul,
            'nomor_mou' => $moa->mou->nomor_mou,
            'nomor_mou_pengusul' => $moa->mou->nomor_mou_pengusul,
            'pengusul' => $moa->pengusul->nama,
            'alamat' => $moa->pengusul->alamat,
            'nik_nip_pengusul' => $moa->nik_nip_pengusul,
            'jabatan_pengusul' => $moa->jabatan_pengusul,
            'program' => $moa->program,
            'tanggal_mulai' => Carbon::parse($moa->tanggal_mulai)->format('d-m-Y'),
            'tanggal_berakhir' => Carbon::parse($moa->tanggal_berakhir)->format('d-m-Y'),
            'pertemuan' => $pertemuan,
            'dokumen_moa' =>  Storage::url('/dokumen/moa/' . $moa->dokumen),
            'dokumen_mou' =>  Storage::url('/dokumen/mou/' . $moa->mou->dokumen),
            'status' => $status
        ]);
    }
}
