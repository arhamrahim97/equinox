<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Fakultas;
use App\Models\Ia;
use App\Models\KategoriBerita;
use App\Models\Moa;
use App\Models\Mou;
use App\Models\Negara;
use App\Models\Prodi;
use App\Models\Slider;
use App\Models\Tentang;
use App\Models\User;
use DateTime;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class LandingController extends Controller
{
    public function index()
    {
        $bahasa = session()->get('locale');

        $mou = Mou::count();
        $moa = Moa::count();
        $ia = Ia::count();

        $slider = Slider::orderBy('id', 'asc')->get();

        if (!$bahasa || $bahasa == 'id') {
            $daftarBerita = Berita::with(['kategoriBerita',])->where('bahasa', 'Indonesia')->orderBy('id', 'desc')->limit(3)->get();
        } else {
            $daftarBerita = Berita::with(['kategoriBerita',])->where('bahasa', 'Inggris')->orderBy('id', 'desc')->limit(3)->get();
        }

        $statistik = $this->statistik();

        return view('pages.landing.landing', compact(['mou', 'moa', 'ia', 'daftarBerita', 'slider', 'statistik']));
    }

    private function statistik()
    {
        $daftarFakultas = Fakultas::orderBy("nama", 'asc')->get();
        $daftarUser = User::whereIn('role', ['Admin', 'Fakultas', 'Pascasarjana', 'PSDKU', 'LPPM'])
            ->get();
        $dataMoa = array();
        $dataIa = array();
        foreach ($daftarFakultas as $fakultas) {
            $moa = Moa::with('pengusul', 'user')->latest()->whereHas('user', function ($q)  use ($fakultas) {
                $q->where('fakultas_id', $fakultas->id);
            })->count();
            $dataMoa[] = $moa;

            $ia = Ia::with('pengusul', 'user', 'anggotaFakultas', 'anggotaProdi')->latest()
                ->whereHas('user', function ($q)  use ($fakultas) {
                    $q->where('fakultas_id', $fakultas->id);
                })
                ->orWhereHas('anggotaFakultas', function ($q2) use ($fakultas) {
                    $q2->where('fakultas_id', $fakultas->id);
                })
                ->count();

            $dataIa[] = $ia;
        }

        $label = $daftarFakultas->pluck('nama')->toArray();
        $label[] = 'Lainnya';
        $dataMoa[] = Moa::with('pengusul', 'user')->latest()->whereHas('user', function ($q)  use ($fakultas) {
            $q->where('fakultas_id', NULL);
        })->count();

        $dataIa[] = Ia::with('pengusul', 'user', 'anggotaFakultas', 'anggotaProdi')->latest()
            ->whereHas('user', function ($q)  use ($fakultas) {
                $q->where('fakultas_id', NULL);
            })
            ->orWhereHas('anggotaFakultas', function ($q2) use ($fakultas) {
                $q2->where('fakultas_id', NULL);
            })
            ->count();

        return [
            'label' => $label,
            'dataMoa' => $dataMoa,
            'dataIa' => $dataIa
        ];
    }

    public function detailIa(Request $request)
    {
        $fakultas = $request->fakultas;

        $dataIa = $this->getDataIa($fakultas);

        if ($request->ajax()) {
            return DataTables::of($dataIa)
                ->addIndexColumn()
                ->make(true);
        }

        $daftarFakultas = Fakultas::orderBy('nama', 'asc')->get();
        return view('pages.landing.detailIa', compact(['daftarFakultas']));
    }

    private function getDataIa($fakultas)
    {
        $daftarProdi = Prodi::where(function ($query) use ($fakultas) {
            if ($fakultas && $fakultas != 'semua') {
                $query->where('fakultas_id', $fakultas);
            }
        })->get();

        $dataIa = new Collection();
        if ($fakultas != 'lainnya') {
            foreach ($daftarProdi as $prodi) {
                $ia = Ia::with('pengusul', 'user', 'anggotaFakultas', 'anggotaProdi')->latest()
                    ->whereHas('anggotaProdi', function ($q2) use ($prodi) {
                        $q2->where('prodi_id', $prodi->id);
                    })
                    ->count();

                $dataIa->push([
                    'prodi' => $prodi->nama,
                    'total' => $ia
                ]);
            }
        }


        if ($fakultas && ($fakultas == 'semua' || $fakultas == 'lainnya')) {
            $daftarUser = User::has('ia')->where('fakultas_id', NULL)->get();
            foreach ($daftarUser as $user) {
                $ia = Ia::with('pengusul', 'user', 'anggotaFakultas', 'anggotaProdi')
                    ->where('users_id', $user->id)
                    ->count();

                $dataIa->push([
                    'prodi' => $user->nama,
                    'total' => $ia
                ]);
            }
        }

        return $dataIa;
    }

    public function dataIa(Request $request)
    {
        $fakultas = $request->fakultas;
        $dataIa = $this->getDataIa($fakultas);

        $label = $dataIa->pluck('prodi')->toArray();
        $ia = $dataIa->pluck('total')->toArray();

        return response()->json([
            'label' => $label,
            'data' => $ia,
        ]);
    }

    public function berita(Berita $berita)
    {
        return view('pages.landing.detailBerita', compact(['berita']));
    }

    public function daftarBerita()
    {
        $bahasa = session()->get('locale');
        if (!$bahasa || $bahasa == 'id') {
            $daftarBerita = Berita::with(['kategoriBerita',])->where('bahasa', 'Indonesia')->orderBy('id', 'desc')->orderBy('id', 'desc')->cari(request())->latest()->paginate(8)->withQueryString();
        } else {
            $daftarBerita = Berita::with(['kategoriBerita',])->where('bahasa', 'Inggris')->orderBy('id', 'desc')->cari(request())->latest()->paginate(8)->withQueryString();
        }
        $daftarKategoriBerita = KategoriBerita::orderBy('nama', 'asc')->get();
        return view('pages.landing.daftarBerita', compact(['daftarBerita', 'daftarKategoriBerita']));
    }

    public function tentang()
    {
        $bahasa = session()->get('locale');
        if (!$bahasa || $bahasa == 'id') {
            $tentang = Tentang::orderBy('id', 'asc')->where('bahasa', 'Indonesia')->get();
        } else {
            $tentang = Tentang::orderBy('id', 'asc')->where('bahasa', 'Inggris')->get();
        }
        return view('pages.landing.tentang', compact(['tentang']));
    }

    public function daftarMou(Request $request)
    {
        if ($request->ajax()) {
            $data = Mou::with(['pengusul'])->orderBy('id', 'desc')->whereHas('pengusul', function ($query) use ($request) {
                if ($request->region) {
                    $query->where('region', $request->region);
                    if ($request->negara) {
                        $query->where('negara_id', $request->negara);
                    }
                }
            });
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('pengusul', function (Mou $mou) {
                    return $mou->pengusul->nama;
                })
                ->addColumn('region', function (Mou $mou) {
                    return $mou->pengusul->region;
                })
                ->addColumn('negara', function (Mou $mou) {
                    return $mou->pengusul->negara->nama;
                })
                ->addColumn('tanggal_mulai', function ($row) {
                    return Carbon::parse($row->tanggal_mulai)->translatedFormat('d F Y');
                })
                ->addColumn('tanggal_berakhir', function ($row) {
                    return Carbon::parse($row->tanggal_berakhir)->translatedFormat('d F Y');
                })
                ->addColumn('status', function ($row) {
                    $datetime1 = date_create($row->tanggal_berakhir);
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
                ->filter(function ($instance) use ($request) {
                    if ($request->status) {
                        if ($request->status == "Aktif") {
                            $instance->where('tanggal_berakhir', '>', DB::raw('NOW() + INTERVAL 1 YEAR'));
                        } else if ($request->status == "Masa Tenggang") {
                            $instance->where('tanggal_berakhir', '>', DB::raw('NOW()'));
                            $instance->where('tanggal_berakhir', '<', DB::raw('NOW() + INTERVAL 1 YEAR'));
                        } else {
                            $instance->where('tanggal_berakhir', '<', DB::raw('NOW()'));
                        }
                    }

                    if ($request->search) {
                        $instance->where('program', 'LIKE', '%' . $request->search . '%');
                        $instance->orWhereHas('pengusul', function ($query) use ($request) {
                            $query->where('nama', 'LIKE', '%' . $request->search . '%');
                        });
                    }
                })
                ->rawColumns(['pengusul', 'region', 'negara', 'tanggal_mulai', 'tanggal_berakhir', 'status'])
                ->make(true);
        }
        return view('pages.landing.mou');
    }

    public function daftarMoa(Request $request)
    {
        if ($request->ajax()) {
            $data = Moa::with(['pengusul'])->orderBy('id', 'desc')->whereHas('pengusul', function ($query) use ($request) {
                if ($request->region) {
                    $query->where('region', $request->region);
                    if ($request->negara) {
                        $query->where('negara_id', $request->negara);
                    }
                }
            });
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('pengusul', function (Moa $moa) {
                    return $moa->pengusul->nama;
                })
                ->addColumn('region', function (Moa $moa) {
                    return $moa->pengusul->region;
                })
                ->addColumn('negara', function (Moa $moa) {
                    return $moa->pengusul->negara->nama;
                })
                ->addColumn('tanggal_mulai', function ($row) {
                    return Carbon::parse($row->tanggal_mulai)->translatedFormat('d F Y');
                })
                ->addColumn('tanggal_berakhir', function ($row) {
                    return Carbon::parse($row->tanggal_berakhir)->translatedFormat('d F Y');
                })
                ->addColumn('status', function ($row) {
                    $datetime1 = date_create($row->tanggal_berakhir);
                    $datetime2 = date_create(date("Y-m-d"));
                    $interval = date_diff($datetime1, $datetime2);
                    $jumlah_tahun =  $interval->format('%y');
                    $jumlah_bulan =  $interval->format('%m');
                    if ($datetime1 < $datetime2) {
                        return '<span class="badge badge-danger bg-danger">' . __('components/span.kadaluarsa') . '</span>';
                    } else {
                        if ($jumlah_tahun < 1) {
                            if ($jumlah_bulan < 6) {
                                return '<span class="badge badge-warning bg-warning">' . __('components/span.masa_tenggang') . '</span>';
                            } else {
                                return '<span class="badge badge-success bg-success">' . __('components/span.aktif') . '</span>';
                            }
                        } else {
                            return '<span class="badge badge-success bg-success">' . __('components/span.aktif') . '</span>';
                        }
                    }
                })
                ->filter(function ($instance) use ($request) {
                    if (!empty($request->status)) {
                        if ($request->status == 'Aktif') {
                            $instance->whereRaw('tanggal_berakhir > NOW() AND DATE_ADD(NOW(), INTERVAL 180 DAY) < tanggal_berakhir');
                            if ($request->search != '') {
                                $instance->whereRaw('program LIKE "%' . $request->search . '%"');
                            }
                        } else if ($request->status == 'Masa Tenggang') {
                            $instance->whereRaw('tanggal_berakhir = ' . date("Y-m-d"));
                            $instance->orWhereRaw('tanggal_berakhir > NOW() AND DATE_ADD(NOW(), INTERVAL 180 DAY) > tanggal_berakhir');
                            if ($request->search != '') {
                                $instance->whereRaw('program LIKE "%' . $request->search . '%"');
                            }
                        } else { // expired
                            $instance->where('tanggal_berakhir', '<', date("Y-m-d"));
                            if ($request->search != '') {
                                $instance->where('program', 'LIKE', '%' . $request->search . '%');
                            }
                        }
                    }

                    if ($request->search) {
                        $instance->where('program', 'LIKE', '%' . $request->search . '%');
                        $instance->orWhereHas('pengusul', function ($query) use ($request) {
                            $query->where('nama', 'LIKE', '%' . $request->search . '%');
                        });
                    }
                })
                ->rawColumns(['pengusul', 'region', 'negara', 'tanggal_mulai', 'tanggal_berakhir', 'status'])
                ->make(true);
        }
        return view('pages.landing.moa');
    }

    public function daftarIa(Request $request)
    {
        if ($request->ajax()) {
            $data = Ia::with(['pengusul'])->orderBy('id', 'desc')->whereHas('pengusul', function ($query) use ($request) {
                if ($request->region) {
                    $query->where('region', $request->region);
                    if ($request->negara) {
                        $query->where('negara_id', $request->negara);
                    }
                }
            });
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('pengusul', function (Ia $ia) {
                    return $ia->pengusul->nama;
                })
                ->addColumn('region', function (Ia $ia) {
                    return $ia->pengusul->region;
                })
                ->addColumn('negara', function (Ia $ia) {
                    return $ia->pengusul->negara->nama;
                })
                ->addColumn('tanggal_mulai', function ($row) {
                    return Carbon::parse($row->tanggal_mulai)->translatedFormat('d F Y');
                })
                ->addColumn('tanggal_berakhir', function ($row) {
                    return Carbon::parse($row->tanggal_berakhir)->translatedFormat('d F Y');
                })
                ->addColumn('status', function ($row) {
                    $datetime1 = date_create($row->tanggal_berakhir);
                    $datetime2 = date_create(date("Y-m-d"));
                    $interval = date_diff($datetime1, $datetime2);
                    $jumlah_tahun =  $interval->format('%y');
                    $jumlah_bulan =  $interval->format('%m');
                    if ($datetime1 < $datetime2) {
                        if (($row->laporan_hasil_pelaksanaan != '') || ($row->laporan_hasil_pelaksanaan != NULL)) {
                            return '<span class="badge badge-primary bg-primary">' . __('components/span.selesai') . '</span>';
                        } else {
                            // return '<span class="badge badge-success">'.__('components/span.aktif').'</span>';
                            return '<span class="badge badge-danger bg-danger">' . __('components/span.melewati_batas') . '</span>';
                        }
                    } else {
                        if (($row->laporan_hasil_pelaksanaan != '') || ($row->laporan_hasil_pelaksanaan != NULL)) {
                            return '<span class="badge badge-primary bg-primary">' . __('components/span.selesai') . '</span>';
                        } else {
                            return '<span class="badge badge-success bg-success">' . __('components/span.aktif') . '</span>';
                        }
                    }
                })
                ->filter(function ($instance) use ($request) {
                    if (!empty($request->status)) {
                        if ($request->status == 'Aktif') {
                            $instance->where('tanggal_berakhir', '>=', date("Y-m-d"));
                            $instance->whereRaw('(laporan_hasil_pelaksanaan = "" OR laporan_hasil_pelaksanaan is NULL)');
                        } else if ($request->status == 'Selesai') {
                            $instance->where('laporan_hasil_pelaksanaan', '!=', '');
                            $instance->orWhereRaw('laporan_hasil_pelaksanaan != NULL');
                        } else if ($request->status == 'melewati_batas') { // melewati batas
                            $instance->whereRaw('tanggal_berakhir < NOW() AND (laporan_hasil_pelaksanaan = "" OR laporan_hasil_pelaksanaan is NULL)');
                        }
                    }

                    if ($request->search) {
                        $instance->where('program', 'LIKE', '%' . $request->search . '%');
                        $instance->orWhereHas('pengusul', function ($query) use ($request) {
                            $query->where('nama', 'LIKE', '%' . $request->search . '%');
                        });
                    }
                })
                ->rawColumns(['pengusul', 'region', 'negara', 'tanggal_mulai', 'tanggal_berakhir', 'status'])
                ->make(true);
        }
        return view('pages.landing.ia');
    }

    public function getMapDataMou()
    {
        $dataMou = Mou::all();
        $mapDataArray = array();

        foreach ($dataMou as $mou) {
            $datetime1 = date_create($mou->tanggal_berakhir);
            $datetime2 = date_create(date("Y-m-d"));
            $interval = date_diff($datetime1, $datetime2);
            $jumlah_tahun =  $interval->format('%y');
            if ($datetime1 < $datetime2) {
                $status = 'tidak_aktif';
                $namaStatus = '<span class="badge badge-danger bg-danger">' . __('components/span.kadaluarsa') . '</span>';
            } else {
                if ($jumlah_tahun < 1) {
                    $status = 'masa_tenggang';
                    $namaStatus = '<span class="badge badge-warning bg-warning">' . __('components/span.masa_tenggang') . '</span>';
                } else {
                    $status = 'aktif';
                    $namaStatus = '<span class="badge badge-success bg-success">' . __('components/span.aktif') . '</span>';
                }
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
                'negara' => $mou->pengusul->negara->nama,
                'namaStatus' => $namaStatus
            ];
        }

        return response()->json([
            $mapDataArray
        ]);
    }

    public function getMapDataMoa()
    {
        $dataMoa = Moa::all();
        $mapDataArray = array();

        foreach ($dataMoa as $moa) {
            $datetime1 = date_create($moa->tanggal_berakhir);
            $datetime2 = date_create(date("Y-m-d"));
            $interval = date_diff($datetime1, $datetime2);
            $jumlah_tahun =  $interval->format('%y');
            $jumlah_bulan =  $interval->format('%m');
            if ($datetime1 < $datetime2) {
                $status = 'tidak_aktif';
                $namaStatus = '<span class="badge badge-danger bg-danger">' . __('components/span.kadaluarsa') . '</span>';
            } else {
                if ($jumlah_tahun < 1) {
                    if ($jumlah_bulan < 6) {
                        $status = 'masa_tenggang';
                        $namaStatus = '<span class="badge badge-warning bg-warning">' . __('components/span.masa_tenggang') . '</span>';
                    } else {
                        $status = 'aktif';
                        $namaStatus = '<span class="badge badge-success bg-success">' . __('components/span.aktif') . '</span>';
                    }
                } else {
                    $status = 'aktif';
                    $namaStatus = '<span class="badge badge-success bg-success">' . __('components/span.aktif') . '</span>';
                }
            }

            $dokumen_mou = '';
            if ($moa->mou) {
                $dokumen_mou = Storage::url('/dokumen/mou/' . $moa->mou->dokumen);
            }

            $mapDataArray[] = [
                'id' => $moa->id,
                'latitude' => $moa->latitude,
                'longitude' => $moa->longitude,
                'nama_pengusul' => $moa->pengusul->nama,
                'program' => $moa->program,
                'alamat' => $moa->pengusul->alamat,
                'no_referensi' => $moa->nomor_moa,
                'tanggal_berakhir' =>  Carbon::parse($moa->tanggal_berakhir)->translatedFormat('d F Y'),
                'dokumen_moa' =>  Storage::url('/dokumen/moa/' . $moa->dokumen),
                'dokumen_mou' =>  $dokumen_mou,
                'status' => $status,
                'negara' => $moa->pengusul->negara->nama,
                'namaStatus' => $namaStatus
            ];
        }

        return response()->json([
            $mapDataArray
        ]);
    }

    public function getMapDataIa()
    {
        $dataIa = Ia::all();
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

            $mapDataArray[] = [
                'id' => $ia->id,
                'latitude' => $ia->latitude,
                'longitude' => $ia->longitude,
                'nama_pengusul' => $ia->pengusul->nama,
                'program' => $ia->program,
                'alamat' => $ia->pengusul->alamat,
                'no_referensi' => $ia->nomor_moa,
                'tanggal_berakhir' =>  Carbon::parse($ia->tanggal_berakhir)->translatedFormat('d F Y'),
                'dokumen_ia' =>  Storage::url('/dokumen/ia/' . $ia->dokumen),
                'dokumen_moa' =>  Storage::url('/dokumen/moa/' . $ia->moa->dokumen),
                'dokumen_mou' =>  Storage::url('/dokumen/moa/' . $ia->moa->mou->dokumen),
                'negara' => $ia->pengusul->negara->nama,
                'status' => $status,
                'namaStatus' => $namaStatus
            ];
        }

        return response()->json([
            $mapDataArray
        ]);
    }

    public function listNegaraTersedia(Request $request)
    {
        $daftarNegara = Negara::with('pengusul')->whereHas('pengusul', function ($query) use ($request) {
            $query->whereHas($request->dokumen)->where('region', $request->region);
        })->get();

        $html = '<option hidden selected value="">' . __('pages/landing/mou.pilih_negara') . '</option>';
        $html .= '<option value="">' . __('pages/landing/mou.semua') . '</option>';
        if ($daftarNegara) {
            foreach ($daftarNegara as $negara) {
                $html .= '<option value="' . $negara->id . '">' . $negara->nama . '</option>';
            }
        }
        return response()->json(
            [
                'res' => 'success',
                'html' => $html,
            ]
        );
    }
}
