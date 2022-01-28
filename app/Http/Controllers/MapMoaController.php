<?php

namespace App\Http\Controllers;

use App\Models\Moa;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class MapMoaController extends Controller
{
    public function index(Request $request)
    {
        $userLogin = Auth::user();
        if ($request->ajax()) {
            if (in_array(Auth::user()->role, array('Fakultas', 'Pascasarjana', 'PSDKU', 'LPPM', 'Prodi', 'Unit Kerja'))) {
                $data = Moa::with(['pengusul', 'user'])->whereHas('user', function ($user) use ($userLogin) {
                    $user->where('fakultas_id', $userLogin->fakultas_id);
                })->get();
            } else {
                $data = Moa::get();
            }
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('pengusul', function (Moa $moa) {
                    return $moa->pengusul->nama;
                })
                ->addColumn('alamat', function (Moa $moa) {
                    return $moa->pengusul->alamat;
                })
                ->addColumn('tanggal_mulai', function ($row) {
                    return Carbon::parse($row->tanggal_mulai)->translatedFormat('d F Y');
                })
                ->addColumn('tanggal_berakhir', function ($row) {
                    return Carbon::parse($row->tanggal_berakhir)->translatedFormat('d F Y');
                })
                ->addColumn('status', function (Moa $moa) {
                    $datetime1 = date_create($moa->tanggal_berakhir);
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
        $userLogin = Auth::user();

        if (in_array(Auth::user()->role, array('Fakultas', 'Pascasarjana', 'PSDKU', 'LPPM', 'Prodi', 'Unit Kerja'))) {
            $dataMoa = Moa::with(['pengusul', 'user'])->whereHas('user', function ($user) use ($userLogin) {
                $user->where('fakultas_id', $userLogin->fakultas_id);
            })->get();
        } else {
            $dataMoa = Moa::get();
        }
        $mapDataArray = array();

        $sekarang = new DateTime("now");
        $tanggal_berakhir = '';
        if ($dataMoa) {
            foreach ($dataMoa as $moa) {
                $tanggal_berakhir = new DateTime($moa->tanggal_berakhir);
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
                    'id' => $moa->id,
                    'latitude' => $moa->latitude,
                    'longitude' => $moa->longitude,
                    'nama_pengusul' => $moa->pengusul->nama,
                    'pejabat_penandatangan' => $moa->pejabat_penandatangan,
                    'program' => $moa->program,
                    'alamat' => $moa->pengusul->alamat,
                    'no_referensi' => $moa->nomor_moa,
                    'tanggal_berakhir' => Carbon::parse($moa->tanggal_berakhir)->translatedFormat('d F Y'),
                    'dokumen_moa' =>  Storage::url('/dokumen/moa/' . $moa->dokumen),
                    'dokumen_mou' =>  Storage::url('/dokumen/mou/' . $moa->mou->dokumen),
                    'status' => $status,
                    'namaStatus' => $namaStatus
                ];
            }
        }


        return response()->json([
            $mapDataArray
        ]);
    }

    public function getDetailMoa(Moa $moa)
    {
        $metode_pertemuan = ($moa->metode_pertemuan == NULL || $moa->metode_pertemuan == '') ? '-' : $moa->metode_pertemuan;
        $pertemuan = $moa->tempat_pertemuan . ' | ' . $metode_pertemuan .  ' | ' . Carbon::parse($moa->tanggal_pertemuan)->translatedFormat('d F Y') . ' | ' . Carbon::parse($moa->waktu_pertemuan)->format('H:i');

        $sekarang = new DateTime("now");
        $tanggal_berakhir = new DateTime($moa->tanggal_berakhir);
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
            'nomor_moa' => $moa->nomor_moa,
            'nomor_moa_pengusul' => $moa->nomor_moa_pengusul,
            'nomor_mou' => $moa->mou->nomor_mou,
            'nomor_mou_pengusul' => $moa->mou->nomor_mou_pengusul,
            'pengusul' => $moa->pengusul->nama,
            'pejabat_penandatangan' => $moa->pejabat_penandatangan,
            'alamat' => $moa->pengusul->alamat,
            'nik_nip_pengusul' => $moa->nik_nip_pengusul,
            'jabatan_pengusul' => $moa->jabatan_pengusul,
            'program' => $moa->program,
            'tanggal_mulai' => Carbon::parse($moa->tanggal_mulai)->translatedFormat('d F Y'),
            'tanggal_berakhir' => Carbon::parse($moa->tanggal_berakhir)->translatedFormat('d F Y'),
            'pertemuan' => $pertemuan,
            'dokumen_moa' =>  Storage::url('/dokumen/moa/' . $moa->dokumen),
            'dokumen_mou' =>  Storage::url('/dokumen/mou/' . $moa->mou->dokumen),
            'status' => $status
        ]);
    }
}
