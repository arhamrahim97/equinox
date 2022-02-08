<?php

namespace App\Http\Controllers;

use App\Exports\BorangIaExport;
use App\Models\Ia;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class BorangIaController extends Controller
{
    public function index(Request $request)
    {
        $userLogin = Auth::user();
        if ($request->ajax()) {
            $data = Ia::with(['pengusul', 'jenisKerjasama'])->orderBy('id', 'desc');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('lembaga_mitra', function (Ia $ia) {
                    return $ia->pengusul->nama;
                })
                ->addColumn('tipe_kerjasama', function (Ia $ia) {
                    $jenisKerjasama = '';
                    $namaJenisKerjasama = '';
                    foreach ($ia->jenisKerjasama as $kerjaSama) {
                        if ($kerjaSama->jenis_kerjasama == 'Penelitian') {
                            $namaJenisKerjasama = __('pages/ia/borangIa/index.penelitian');
                        } else if ($kerjaSama->jenis_kerjasama == 'Pendidikan') {
                            $namaJenisKerjasama = __('pages/ia/borangIa/index.pendidikan');
                        } else {
                            $namaJenisKerjasama = __('pages/ia/borangIa/index.pengabdian_kepada_masyarakat');
                        }
                        $jenisKerjasama .= '<div class="d-block">
                                    <!-- Text -->
                                    <p>&#9679 ' . $namaJenisKerjasama . '</p>

                                </div>';
                    }
                    return $jenisKerjasama;
                })
                ->addColumn('internasional', function (Ia $ia) {
                    $internasional = $ia->pengusul->negara_id != 102 ? "&#10004" : '';
                    return $internasional;
                })
                ->addColumn('nasional', function (Ia $ia) {
                    $nasional = $ia->pengusul->negara_id == 102 && $ia->pengusul->provinsi_id != 26 ?   "&#10004" : '';
                    return $nasional;
                })
                ->addColumn('lokal', function (Ia $ia) {
                    $lokal = $ia->pengusul->negara_id == 102 && $ia->pengusul->provinsi_id == 26 ?  "&#10004" : '';
                    return $lokal;
                })
                ->addColumn('waktu_dan_durasi', function (Ia $ia) {
                    $tanggal_mulai = Carbon::parse($ia->tanggal_mulai);
                    $tanggal_berakhir = Carbon::parse($ia->tanggal_berakhir);
                    $durasi = $tanggal_mulai->diff($tanggal_berakhir)->format('%y ' . __('pages/ia/borangIa/index.tahun')  . ', %m ' . __('pages/ia/borangIa/index.bulan') . ' dan %d ' . __('pages/ia/borangIa/index.hari'));
                    $waktu = Carbon::parse($ia->tanggal_mulai)->translatedFormat('d F Y') . " - " . Carbon::parse($ia->tanggal_berakhir)->translatedFormat('d F Y');
                    return $waktu . "<br>" .  $durasi;
                })
                ->addColumn('bukti_dan_kerjasama', function (Ia $ia) {
                    $lpjBtn = $ia->laporan_hasil_pelaksanaan ? "<a target='_blank' href='" . Storage::url("dokumen/ia-laporan_hasil_pelaksanaan/" . $ia->laporan_hasil_pelaksanaan) . "' class='btn btn-success btn-sm mx-1 my-1'>" .   __('components/button.download_laporan_pelaksanaan') . "</a>" : '';

                    $suratTugasBtn = $ia->surat_tugas ? "<a target='_blank' href='" . Storage::url("dokumen/ia-surat_tugas/" . $ia->surat_tugas) . "' class='btn btn-success btn-sm mx-1 my-1'>" .   __('components/button.download_surat_tugas') . "</a>" : '';

                    $mouBtn = $ia->moa->mou ? "<a target='_blank' href='" . Storage::url('/dokumen/mou/' . $ia->moa->mou->dokumen) . "' class='btn btn-primary btn-sm mx-1 my-1'><i class='fas fa-file-download mr-1'></i>" .  __('pages/ia/map.unduhMou') . "</a>" : '';

                    $moaBtn = $ia->moa ? "<a target='_blank' href='" . Storage::url('/dokumen/moa/' . $ia->moa->dokumen) . "' class='btn btn-warning btn-sm my-1'><i class='fas fa-file-download mr-1'></i>" .  __('pages/ia/map.unduhMoa') . "</a>" : '';

                    $iaBtn = $ia->dokumen ? "<a target='_blank' href='" . Storage::url('/dokumen/ia/' . $ia->dokumen) . "' class='btn btn-success btn-sm my-1'><i class='fas fa-file-download mr-1'></i>" .  __('pages/ia/map.unduhIa') . "</a>" : '';


                    $bukti_dan_kerjasama = "<div class='row justify-content-center'> " . $mouBtn . $moaBtn . $iaBtn .  $suratTugasBtn . $lpjBtn . "</div>";
                    return $bukti_dan_kerjasama;
                })
                ->filter(function ($ia) use ($request, $userLogin) {
                    if ($request->jenisKerjasama) {
                        $ia->whereHas('jenisKerjasama', function ($jenisKerjasama) use ($request) {
                            $jenisKerjasama->whereIn('jenis_kerjasama', $request->jenisKerjasama);
                        });
                    }

                    if ($request->tingkat) {
                        if (count($request->tingkat) == 1) {
                            if ($request->tingkat[0] == 'internasional') {
                                $ia->whereHas('pengusul', function ($pengusul) {
                                    $pengusul->where('negara_id', '!=', 102);
                                });
                            }

                            if ($request->tingkat[0] == 'nasional') {
                                $ia->whereHas('pengusul', function ($pengusul) {
                                    $pengusul->where('negara_id', '=', 102)->where('provinsi_id', "!=", 26);
                                });
                            }

                            if ($request->tingkat[0] == 'lokal') {
                                $ia->whereHas('pengusul', function ($pengusul) {
                                    $pengusul->where('negara_id', '=', 102)->where('provinsi_id', '=', 26);
                                });
                            }
                        }

                        if (count($request->tingkat) == 2) {
                            if (count(array_intersect($request->tingkat, array('internasional', 'nasional'))) == 2) {
                                $ia->whereHas('pengusul', function ($pengusul) {
                                    $pengusul->where('negara_id', '!=', 102);
                                    $pengusul->orWhere(function ($pengusul) {
                                        $pengusul->where('negara_id', '=', 102)->where('provinsi_id', "!=", 26);
                                    });
                                });
                            }

                            if (count(array_intersect($request->tingkat, array('internasional', 'lokal'))) == 2) {
                                $ia->whereHas('pengusul', function ($pengusul) {
                                    $pengusul->where('negara_id', '!=', 102);
                                    $pengusul->orWhere(function ($pengusul) {
                                        $pengusul->where('negara_id', '=', 102)->where('provinsi_id', '=', 26);
                                    });
                                });
                            }

                            if (count(array_intersect($request->tingkat, array('nasional', 'lokal'))) == 2) {
                                $ia->whereHas('pengusul', function ($pengusul) {
                                    $pengusul->where('negara_id', '=', 102)->where('provinsi_id', "!=", 26);
                                    $pengusul->orWhere(function ($pengusul) {
                                        $pengusul->where('negara_id', '=', 102)->where('provinsi_id', '=', 26);
                                    });
                                });
                            }
                        }
                    }

                    if ($request->dariTanggal && $request->sampaiTanggal) {
                        $ia->where('created_at', '>=', $request->dariTanggal)->where('created_at', '<=', $request->sampaiTanggal);
                    }

                    if (in_array(Auth::user()->role, array('Fakultas', 'Pascasarjana', 'PSDKU'))) {
                        $ia->whereHas('anggotaFakultas', function ($anggotaFakultas) use ($userLogin) {
                            $anggotaFakultas->where('fakultas_id', $userLogin->fakultas_id);
                        });
                    } else if (Auth::user()->role == 'LPPM') {
                        $ia->whereHas('user', function ($user) use ($userLogin) {
                            $user->where('role', $userLogin->role);
                        });
                    } else if (in_array(Auth::user()->role, array('Prodi', 'Unit Kerja'))) {
                        $ia->whereHas('anggotaProdi', function ($anggotaProdi) use ($userLogin) {
                            $anggotaProdi->where('prodi_id', $userLogin->prodi_id);
                        });
                    }
                })
                ->rawColumns(['lembaga_mitra', 'tipe_kerjasama', 'internasional', 'nasional', 'lokal', 'manfaat', 'waktu_dan_durasi', 'bukti_dan_kerjasama'])
                ->make(true);
        }
        return view('pages.ia.borangIa.index');
    }

    public function export(Request $request)
    {
        $jenisKerjasama = $request->jenisKerjasama;
        $tingkat = $request->tingkat;
        $dariTanggal = $request->dariTanggal;
        $sampaiTanggal =  $request->sampaiTanggal;
        $hariIni = Carbon::now()->translatedFormat('d F Y');
        return Excel::download(new BorangIaExport($jenisKerjasama, $tingkat, $dariTanggal, $sampaiTanggal), 'Borang IA-' . $hariIni . '.xlsx');
    }
}
