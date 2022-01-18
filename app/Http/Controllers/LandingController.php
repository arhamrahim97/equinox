<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Ia;
use App\Models\KategoriBerita;
use App\Models\Moa;
use App\Models\Mou;
use App\Models\Negara;
use App\Models\Slider;
use App\Models\Tentang;
use DateTime;
use Carbon\Carbon;
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

        return view('pages.landing.landing', compact(['mou', 'moa', 'ia', 'daftarBerita', 'slider']));
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
                    // $interval = date_diff($datetime1, $datetime2);
                    // $jumlah_tahun =  $interval->format('%y');
                    if ($row->lpj) {
                        return '<span class="badge badge-primary bg-primary">' . __('components/span.selesai') . '</span>';
                    } else if ($datetime1 > $datetime2) {
                        return '<span class="badge badge-success bg-success">' . __('components/span.aktif') . '</span>';
                    } else {
                        return '<span class="badge badge-danger bg-danger">' . __('components/span.melewati_batas') . '</span>';
                    }
                })
                ->filter(function ($instance) use ($request) {
                    if ($request->status) {
                        if ($request->status == "Aktif") {
                            $instance->where('tanggal_berakhir', '>', DB::raw('NOW()'));
                            $instance->where('lpj', '=', '');
                        } else if ($request->status == "Selesai") {
                            $instance->where('lpj', '!=', '');
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
        return view('pages.landing.ia');
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

        $sekarang = new DateTime("now");
        $tanggal_berakhir = '';

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
                'program' => $moa->program,
                'alamat' => $moa->pengusul->alamat,
                'no_referensi' => $moa->nomor_moa,
                'tanggal_berakhir' =>  Carbon::parse($moa->tanggal_berakhir)->translatedFormat('d F Y'),
                'dokumen_moa' =>  Storage::url('/dokumen/moa/' . $moa->dokumen),
                'dokumen_mou' =>  Storage::url('/dokumen/mou/' . $moa->mou->dokumen),
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

            if ($ia->lpj) {
                $status = 'selesai';
                $namaStatus = '<span class="badge badge-primary bg-primary">' . __('components/span.selesai') . '</span>';
            } else if ($datetime1 > $datetime2) {
                $status = 'aktif';
                $namaStatus = '<span class="badge badge-success bg-success">' . __('components/span.aktif') . '</span>';
            } else {
                $status = 'lewat_batas';
                $namaStatus = '<span class="badge badge-danger bg-danger">' . __('components/span.melewati_batas') . '</span>';
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
