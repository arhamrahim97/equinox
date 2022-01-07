<?php

namespace App\Http\Controllers;

use App\Models\Ia;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class MapIaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Ia::with(['pengusul', 'moa'])->orderBy('id', 'desc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('pengusul', function (Ia $ia) {
                    return $ia->pengusul->nama;
                })
                ->addColumn('alamat', function (Ia $ia) {
                    return $ia->pengusul->alamat;
                })
                ->addColumn('tanggal_mulai', function (Ia $ia) {
                    return Carbon::parse($ia->tanggal_mulai)->format('d-m-Y');
                })
                ->addColumn('tanggal_berakhir', function (Ia $ia) {
                    return Carbon::parse($ia->tanggal_berakhir)->format('d-m-Y');
                })
                ->addColumn('status', function (Ia $ia) {
                    $sekarang = new DateTime("now");
                    $tanggal_berakhir = new DateTime($ia->tanggal_berakhir);
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
                ->addColumn('action', function (Ia $ia) {
                    $actionBtn = "<div class='row justify-content-center'><a target='_blank' href='" . Storage::url('/dokumen/mou/' . $ia->moa->mou->dokumen) . "' class='btn btn-primary btn-sm mx-1 my-1'><i class='fas fa-file-download mr-1'></i>" .  __('pages/ia/map.unduhMou') . "</a><a target='_blank' href='" . Storage::url('/dokumen/moa/' . $ia->moa->dokumen) . "' class='btn btn-warning btn-sm my-1'><i class='fas fa-file-download mr-1'></i>" .  __('pages/ia/map.unduhMoa') . "</a><a target='_blank' href='" . Storage::url('/dokumen/ia/' . $ia->dokumen) . "' class='btn btn-success btn-sm my-1'><i class='fas fa-file-download mr-1'></i>" .  __('pages/ia/map.unduhIa') . "</a></div>";
                    return $actionBtn;
                })
                ->rawColumns(['action', 'pengusul', 'alamat', 'tanggal_mulai', 'tanggal_berakhir', 'status'])
                ->make(true);
        }
        return view('pages.ia.map');
    }

    public function getMapDataIa()
    {
        $dataIa = Ia::all();
        $mapDataArray = array();

        $sekarang = new DateTime("now");
        $tanggal_berakhir = '';

        foreach ($dataIa as $ia) {
            $tanggal_berakhir = new DateTime($ia->tanggal_berakhir);
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
                'id' => $ia->id,
                'latitude' => $ia->latitude,
                'longitude' => $ia->longitude,
                'nama_pengusul' => $ia->pengusul->nama,
                'program' => $ia->program,
                'alamat' => $ia->pengusul->alamat,
                'no_referensi' => $ia->nomor_moa,
                'tanggal_berakhir' => Carbon::parse($ia->tanggal_berakhir)->format('d-m-Y'),
                'dokumen_ia' =>  Storage::url('/dokumen/ia/' . $ia->dokumen),
                'dokumen_moa' =>  Storage::url('/dokumen/moa/' . $ia->moa->dokumen),
                'dokumen_mou' =>  Storage::url('/dokumen/moa/' . $ia->moa->mou->dokumen),
                'status' => $status
            ];
        }

        return response()->json([
            $mapDataArray
        ]);
    }

    public function getDetailIa(Ia $ia)
    {
        $pertemuan = $ia->tempat_pertemuan . ' | ' . $ia->metode_pertemuan . ' | ' . Carbon::parse($ia->tanggal_pertemuan)->format('d-m-Y') . ' | ' . Carbon::parse($ia->waktu_pertemuan)->format('H:i');

        $sekarang = new DateTime("now");
        $tanggal_berakhir = new DateTime($ia->tanggal_berakhir);
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
            'nomor_mou' => $ia->moa->mou->nomor_mou,
            'nomor_mou_pengusul' => $ia->moa->mou->nomor_mou_pengusul,
            'nomor_moa' => $ia->moa->nomor_moa,
            'nomor_moa_pengusul' => $ia->moa->nomor_moa_pengusul,
            'nomor_ia' => $ia->nomor_ia,
            'nomor_ia_pengusul' => $ia->nomor_ia_pengusul,
            'pengusul' => $ia->pengusul->nama,
            'alamat' => $ia->pengusul->alamat,
            'nik_nip_pengusul' => $ia->nik_nip_pengusul,
            'jabatan_pengusul' => $ia->jabatan_pengusul,
            'program' => $ia->program,
            'tanggal_mulai' => Carbon::parse($ia->tanggal_mulai)->format('d-m-Y'),
            'tanggal_berakhir' => Carbon::parse($ia->tanggal_berakhir)->format('d-m-Y'),
            'pertemuan' => $pertemuan,
            'dokumen_moa' =>  Storage::url('/dokumen/moa/' . $ia->moa->dokumen),
            'dokumen_mou' =>  Storage::url('/dokumen/mou/' . $ia->moa->mou->dokumen),
            'dokumen_ia' =>  Storage::url('/dokumen/ia/' . $ia->dokumen),
            'status' => $status
        ]);
    }
}
