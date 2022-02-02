<?php

namespace App\Http\Controllers;

use App\Models\Ia;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class MapIaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $userLogin = Auth::user();
            if (in_array(Auth::user()->role, array('Fakultas', 'Pascasarjana', 'PSDKU'))) {
                $data = Ia::with(['anggotaFakultas'])->whereHas('anggotaFakultas', function ($anggotaFakultas) use ($userLogin) {
                    $anggotaFakultas->where('fakultas_id', $userLogin->fakultas_id);
                })->get();
            } else if (Auth::user()->role == 'LPPM') {
                $data = Ia::with(['user'])->whereHas('user', function ($user) use ($userLogin) {
                    $user->where('role', $userLogin->role);
                })->get();
            } else if (in_array(Auth::user()->role, array('Prodi', 'Unit Kerja'))) {
                $data = Ia::with(['anggotaProdi'])->whereHas('anggotaProdi', function ($anggotaProdi) use ($userLogin) {
                    $anggotaProdi->where('prodi_id', $userLogin->prodi_id);
                })->get();
            } else {
                $data = Ia::get();
            }
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('pengusul', function (Ia $ia) {
                    return $ia->pengusul->nama;
                })
                ->addColumn('alamat', function (Ia $ia) {
                    return $ia->pengusul->alamat;
                })
                ->addColumn('tanggal_mulai', function ($row) {
                    return Carbon::parse($row->tanggal_mulai)->translatedFormat('d F Y');
                })
                ->addColumn('tanggal_berakhir', function ($row) {
                    return Carbon::parse($row->tanggal_berakhir)->translatedFormat('d F Y');
                })
                ->addColumn('status', function (Ia $ia) {
                    $datetime1 = date_create($ia->tanggal_berakhir);
                    $datetime2 = date_create(date("Y-m-d"));
                    $interval = date_diff($datetime1, $datetime2);
                    if ($datetime1 < $datetime2) {
                        if (($ia->laporan_hasil_pelaksanaan != '') || ($ia->laporan_hasil_pelaksanaan != NULL)) {
                            return '<span class="badge badge-primary bg-primary">' . __('components/span.selesai') . '</span>';
                        } else {
                            return '<span class="badge badge-danger bg-danger">' . __('components/span.melewati_batas') . '</span>';
                        }
                    } else {
                        if (($ia->laporan_hasil_pelaksanaan != '') || ($ia->laporan_hasil_pelaksanaan != NULL)) {
                            return '<span class="badge badge-primary bg-primary">' . __('components/span.selesai') . '</span>';
                        } else {
                            return '<span class="badge badge-success bg-success">' . __('components/span.aktif') . '</span>';
                        }
                    }
                })
                ->addColumn('action', function (Ia $ia) {
                    $lpjBtn = $ia->laporan_hasil_pelaksanaan ? "<a target='_blank' href='" . Storage::url("dokumen/ia-laporan_hasil_pelaksanaan/" . $ia->laporan_hasil_pelaksanaan) . "' class='btn btn-success btn-sm mx-1 my-1'>" .   __('components/button.download_laporan_pelaksanaan') . "</a>" : '';
                    $suratTugasBtn = $ia->surat_tugas ? "<a target='_blank' href='" . Storage::url("dokumen/ia-surat_tugas/" . $ia->surat_tugas) . "' class='btn btn-success btn-sm mx-1 my-1'>" .   __('components/button.download_surat_tugas') . "</a>" : '';

                    $actionBtn = "<div class='row justify-content-center'><a target='_blank' href='" . Storage::url('/dokumen/mou/' . $ia->moa->mou->dokumen) . "' class='btn btn-primary btn-sm mx-1 my-1'><i class='fas fa-file-download mr-1'></i>" .  __('pages/ia/map.unduhMou') . "</a><a target='_blank' href='" . Storage::url('/dokumen/moa/' . $ia->moa->dokumen) . "' class='btn btn-warning btn-sm my-1'><i class='fas fa-file-download mr-1'></i>" .  __('pages/ia/map.unduhMoa') . "</a><a target='_blank' href='" . Storage::url('/dokumen/ia/' . $ia->dokumen) . "' class='btn btn-success btn-sm my-1'><i class='fas fa-file-download mr-1'></i>" .  __('pages/ia/map.unduhIa') . "</a>" . $suratTugasBtn . $lpjBtn . "</div>";
                    return $actionBtn;
                })
                ->rawColumns(['action', 'pengusul', 'alamat', 'tanggal_mulai', 'tanggal_berakhir', 'status'])
                ->make(true);
        }
        return view('pages.ia.map');
    }

    public function getMapDataIa()
    {
        $userLogin = Auth::user();
        if (in_array(Auth::user()->role, array('Fakultas', 'Pascasarjana', 'PSDKU'))) {

            $dataIa = Ia::with(['anggotaFakultas'])->whereHas('anggotaFakultas', function ($anggotaFakultas) use ($userLogin) {
                $anggotaFakultas->where('fakultas_id', $userLogin->fakultas_id);
            })->get();
        } else if (Auth::user()->role == 'LPPM') {

            $dataIa = Ia::with(['user'])->whereHas('user', function ($user) use ($userLogin) {
                $user->where('role', $userLogin->role);
            })->get();
        } else if (in_array(Auth::user()->role, array('Prodi', 'Unit Kerja'))) {

            $dataIa = Ia::with(['anggotaProdi'])->whereHas('anggotaProdi', function ($anggotaProdi) use ($userLogin) {
                $anggotaProdi->where('prodi_id', $userLogin->prodi_id);
            })->get();
        } else {

            $dataIa = Ia::get();
        }

        $mapDataArray = array();

        foreach ($dataIa as $ia) {
            $datetime1 = date_create($ia->tanggal_berakhir);
            $datetime2 = date_create(date("Y-m-d"));
            if ($datetime1 < $datetime2) {
                if (($ia->laporan_hasil_pelaksanaan != '') || ($ia->laporan_hasil_pelaksanaan != NULL)) {
                    $status = 'selesai';
                    $namaStatus = '<span class="badge badge-primary bg-primary">' . __('components/span.selesai') . '</span>';
                } else {
                    $status = 'lewat_batas';
                    $namaStatus = '<span class="badge badge-danger bg-danger">' . __('components/span.melewati_batas') . '</span>';
                }
            } else {
                if (($ia->laporan_hasil_pelaksanaan != '') || ($ia->laporan_hasil_pelaksanaan != NULL)) {
                    $status = 'selesai';
                    $namaStatus = '<span class="badge badge-primary bg-primary">' . __('components/span.selesai') . '</span>';
                } else {
                    $status = 'aktif';
                    $namaStatus = '<span class="badge badge-success bg-success">' . __('components/span.aktif') . '</span>';
                }
            }

            $lpjBtn = $ia->laporan_hasil_pelaksanaan ? "<a target='_blank' href='" . Storage::url("dokumen/ia_laporan_hasil_pelaksanaan/" . $ia->laporan_hasil_pelaksanaan) . "' class='btn btn-success btn-sm mx-1 my-1'>" .   __('components/button.download_laporan_pelaksanaan') . "</a>" : '';
            $suratTugasBtn = $ia->surat_tugas ? "<a target='_blank' href='" . Storage::url("dokumen/ia-surat_tugas/" . $ia->surat_tugas) . "' class='btn btn-success btn-sm mx-1 my-1'>" .   __('components/button.download_surat_tugas') . "</a>" : '';



            $mapDataArray[] = [
                'id' => $ia->id,
                'latitude' => $ia->latitude,
                'longitude' => $ia->longitude,
                'nama_pengusul' => $ia->pengusul->nama,
                'program' => $ia->program,
                'pejabat_penandatangan' => $ia->pejabat_penandatangan,
                'alamat' => $ia->pengusul->alamat,
                'no_referensi' => $ia->nomor_moa,
                'tanggal_berakhir' => Carbon::parse($ia->tanggal_berakhir)->translatedFormat('d F Y'),
                'dokumen_ia' =>  Storage::url('/dokumen/ia/' . $ia->dokumen),
                'dokumen_moa' =>  Storage::url('/dokumen/moa/' . $ia->moa->dokumen),
                'dokumen_mou' =>  Storage::url('/dokumen/moa/' . $ia->moa->mou->dokumen),
                'laporan_hasil_pelaksanaan' => $lpjBtn,
                'surat_tugas' => $suratTugasBtn,
                'status' => $status,
                'namaStatus' => $namaStatus
            ];
        }

        return response()->json([
            $mapDataArray
        ]);
    }

    public function getDetailIa(Ia $ia)
    {
        $metode_pertemuan = ($ia->metode_pertemuan == NULL || $ia->metode_pertemuan == '') ? '-' : $ia->metode_pertemuan;
        $pertemuan = $ia->tempat_pertemuan . ' | ' . $metode_pertemuan .  ' | ' . Carbon::parse($ia->tanggal_pertemuan)->translatedFormat('d F Y') . ' | ' . Carbon::parse($ia->waktu_pertemuan)->format('H:i');
        $datetime1 = date_create($ia->tanggal_berakhir);
        $datetime2 = date_create(date("Y-m-d"));
        if ($datetime1 < $datetime2) {
            if (($ia->laporan_hasil_pelaksanaan != '') || ($ia->laporan_hasil_pelaksanaan != NULL)) {
                $status = '<span class="badge badge-primary bg-primary">' . __('components/span.selesai') . '</span>';
            } else {
                $status = '<span class="badge badge-danger bg-danger">' . __('components/span.melewati_batas') . '</span>';
            }
        } else {
            if (($ia->laporan_hasil_pelaksanaan != '') || ($ia->laporan_hasil_pelaksanaan != NULL)) {
                $status = '<span class="badge badge-primary bg-primary">' . __('components/span.selesai') . '</span>';
            } else {
                $status = '<span class="badge badge-success bg-success">' . __('components/span.aktif') . '</span>';
            }
        }

        $lpjBtn = $ia->laporan_hasil_pelaksanaan ? "<a target='_blank' href='" . Storage::url("dokumen/ia_laporan_hasil_pelaksanaan/" . $ia->laporan_hasil_pelaksanaan) . "' class='btn btn-success btn-sm mx-1 my-1'>" .   __('components/button.download_laporan_pelaksanaan') . "</a>" : '';

        $suratTugasBtn = $ia->surat_tugas ? "<a target='_blank' href='" . Storage::url("dokumen/ia-surat_tugas/" . $ia->surat_tugas) . "' class='btn btn-success btn-sm mx-1 my-1'>" .   __('components/button.download_surat_tugas') . "</a>" : '';

        return response()->json([
            'nomor_mou' => $ia->moa->mou->nomor_mou,
            'nomor_mou_pengusul' => $ia->moa->mou->nomor_mou_pengusul,
            'nomor_moa' => $ia->moa->nomor_moa,
            'nomor_moa_pengusul' => $ia->moa->nomor_moa_pengusul,
            'nomor_ia' => $ia->nomor_ia,
            'nomor_ia_pengusul' => $ia->nomor_ia_pengusul,
            'pejabat_penandatangan' => $ia->pejabat_penandatangan,
            'pengusul' => $ia->pengusul->nama,
            'alamat' => $ia->pengusul->alamat,
            'nik_nip_pengusul' => $ia->nik_nip_pengusul,
            'jabatan_pengusul' => $ia->jabatan_pengusul,
            'program' => $ia->program,
            'tanggal_mulai' => Carbon::parse($ia->tanggal_mulai)->translatedFormat('d F Y'),
            'tanggal_berakhir' => Carbon::parse($ia->tanggal_berakhir)->translatedFormat('d F Y'),
            'pertemuan' => $pertemuan,
            'dokumen_moa' =>  Storage::url('/dokumen/moa/' . $ia->moa->dokumen),
            'dokumen_mou' =>  Storage::url('/dokumen/mou/' . $ia->moa->mou->dokumen),
            'dokumen_ia' =>  Storage::url('/dokumen/ia/' . $ia->dokumen),
            'laporan_hasil_pelaksanaan' => $lpjBtn,
            'surat_tugas' => $suratTugasBtn,
            'status' => $status
        ]);
    }
}
