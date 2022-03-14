<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Ia;
use App\Models\Moa;
use App\Models\Mou;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Berita;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class LandingController extends Controller
{
    public function totalSemuaDokumen()
    {
        $mou = Mou::count();
        $moa = Moa::count();
        $ia = Ia::count();

        $data = [
            [
                'mou' => $mou
            ],
            [
                'moa' => $moa,
            ],
            [
                'ia' => $ia
            ]
        ];

        return ResponseFormatter::success(
            $data,
            'Total Semua Dokumen Berhasil Diambil'
        );
    }

    public function listMou(Request $request)
    {
        $region = $request->region;
        $negara_id = $request->negara_id;
        $status = $request->status;
        $cari = $request->cari;

        $data = Mou::with(
            [
                'pengusul' => function ($pengusul) {
                    $pengusul->select('id', 'nama', 'region', 'negara_id');
                },
                'pengusul.negara' => function ($negara) {
                    $negara->select('id', 'nama', 'region');
                }
            ]
        )
            ->select('id', 'program', 'pengusul_id', 'tanggal_mulai', 'tanggal_berakhir')
            ->orderBy('id', 'desc')
            ->whereHas('pengusul', function ($pengusul) use ($region, $negara_id, $cari) {
                if ($region) {
                    $pengusul->where('region', $region);
                    if ($negara_id) {
                        $pengusul->where('negara_id', $negara_id);
                    }
                }

                if ($cari) {
                    $pengusul->where('nama', 'LIKE', '%' . $cari . '%');
                }
            })->where(function ($mou) use ($status) {
                if ($status) {
                    if ($status == "Aktif") {
                        $mou->where('tanggal_berakhir', '>', DB::raw('NOW() + INTERVAL 1 YEAR'));
                    } else if ($status == "Masa Tenggang") {
                        $mou->where('tanggal_berakhir', '>', DB::raw('NOW()'));
                        $mou->where('tanggal_berakhir', '<', DB::raw('NOW() + INTERVAL 1 YEAR'));
                    } else if ($status == "Kadaluarsa") {
                        $mou->where('tanggal_berakhir', '<', DB::raw('NOW()'));
                    }
                }
            })
            ->paginate(10);

        if (count($data) > 0) {
            return ResponseFormatter::success(
                $data,
                'Daftar MOU Berhasil Diambil'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Daftar MOU Tidak Ada',
                404
            );
        }
    }

    public function listMoa(Request $request)
    {
        $region = $request->region;
        $negara_id = $request->negara_id;
        $status = $request->status;
        $cari = $request->cari;
        $data = Moa::with(
            [
                'pengusul' => function ($pengusul) {
                    $pengusul->select('id', 'nama', 'region', 'negara_id');
                },
                'pengusul.negara' => function ($negara) {
                    $negara->select('id', 'nama', 'region');
                }
            ]
        )
            ->select('id', 'program', 'pengusul_id', 'tanggal_mulai', 'tanggal_berakhir')
            ->where(function ($moa) use ($status) {
                if ($status) {
                    if ($status == "Aktif") {
                        $moa->where('tanggal_berakhir', '>', DB::raw('NOW() + INTERVAL 1 YEAR'));
                    } else if ($status == "Masa Tenggang") {
                        $moa->where('tanggal_berakhir', '>', DB::raw('NOW()'));
                        $moa->where('tanggal_berakhir', '<', DB::raw('NOW() + INTERVAL 1 YEAR'));
                    } else if ($status == "Kadaluarsa") {
                        $moa->where('tanggal_berakhir', '<', DB::raw('NOW()'));
                    }
                }
            })
            ->orderBy('id', 'desc')
            ->whereHas('pengusul', function ($pengusul) use ($region, $negara_id, $cari) {
                if ($region) {
                    $pengusul->where('region', $region);
                    if ($negara_id) {
                        $pengusul->where('negara_id', $negara_id);
                    }
                }

                if ($cari) {
                    $pengusul->where('nama', 'LIKE', '%' . $cari . '%');
                }
            })->paginate(10);

        if (count($data) > 0) {
            return ResponseFormatter::success(
                $data,
                'Daftar MOA Berhasil Diambil'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Daftar MOA Tidak Ada',
                404
            );
        }
    }

    public function listIa(Request $request)
    {
        $region = $request->region;
        $negara_id = $request->negara_id;
        $status = $request->status;
        $cari = $request->cari;
        $data = Ia::with(
            [
                'pengusul' => function ($pengusul) {
                    $pengusul->select('id', 'nama', 'region', 'negara_id');
                },
                'pengusul.negara' => function ($negara) {
                    $negara->select('id', 'nama', 'region');
                }
            ]
        )
            ->select('id', 'program', 'pengusul_id', 'tanggal_mulai', 'tanggal_berakhir')
            ->orderBy('id', 'desc')
            ->where(function ($ia) use ($status) {
                if (!empty($status)) {
                    if ($status == 'Aktif') {
                        $ia->where('tanggal_berakhir', '>=', date("Y-m-d"));
                        $ia->whereRaw('(laporan_hasil_pelaksanaan = "" OR laporan_hasil_pelaksanaan is NULL)');
                    } else if ($status == 'Selesai') {
                        $ia->where('laporan_hasil_pelaksanaan', '!=', '');
                        $ia->orWhereRaw('laporan_hasil_pelaksanaan != NULL');
                    } else if ($status == 'melewati_batas') { // melewati batas
                        $ia->whereRaw('tanggal_berakhir < NOW() AND (laporan_hasil_pelaksanaan = "" OR laporan_hasil_pelaksanaan is NULL)');
                    }
                }
            })
            ->whereHas('pengusul', function ($pengusul) use ($region, $negara_id, $cari) {
                if ($region) {
                    $pengusul->where('region', $region);
                    if ($negara_id) {
                        $pengusul->where('negara_id', $negara_id);
                    }
                }

                if ($cari) {
                    $pengusul->where('nama', 'LIKE', '%' . $cari . '%');
                }
            })->paginate(10);

        if (count($data)) {
            return ResponseFormatter::success(
                $data,
                'Daftar IA Berhasil Diambil'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Daftar IA Tidak Ada',
                404
            );
        }
    }

    public function listSlider()
    {
        $data = Slider::select('id', 'nama', 'foto')->get();
        return ResponseFormatter::success(
            $data,
            'Daftar Slider Berhasil Diambil'
        );
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
                $status = __('components/span.kadaluarsa');
            } else {
                if ($jumlah_tahun < 1) {
                    $status = __('components/span.masa_tenggang');
                } else {
                    $status = __('components/span.aktif');
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
                'dokumen' =>  url(Storage::url('/dokumen/mou/' . $mou->dokumen)),
                'status' => $status,
                'negara' => $mou->pengusul->negara->nama,
            ];
        }

        if (count($mapDataArray) > 0) {
            return ResponseFormatter::success(
                $mapDataArray,
                'Berhasil Mengambil Data Map MOU'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Data Map MOU Tidak Ada',
                404
            );
        }
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
                $status = __('components/span.kadaluarsa');
            } else {
                if ($jumlah_tahun < 1) {
                    if ($jumlah_bulan < 6) {
                        $status = __('components/span.masa_tenggang');
                    } else {
                        $status = __('components/span.aktif');
                    }
                } else {
                    $status = __('components/span.aktif');
                }
            }

            $dokumen_mou = '';
            if ($moa->mou) {
                $dokumen_mou = url(Storage::url('/dokumen/mou/' . $moa->mou->dokumen));
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
                'dokumen_moa' =>  url(Storage::url('/dokumen/moa/' . $moa->dokumen)),
                'dokumen_mou' =>  $dokumen_mou,
                'status' => $status,
                'negara' => $moa->pengusul->negara->nama,
            ];
        }

        if (count($mapDataArray) > 0) {
            return ResponseFormatter::success(
                $mapDataArray,
                'Berhasil Mengambil Data Map MOA'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Data Map MOA Tidak Ada'
            );
        }
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
                    $status = __('components/span.selesai');
                } else {
                    $status = __('components/span.melewati_batas');
                }
            } else {
                if (($ia->laporan_hasil_pelaksanaan != '') || ($ia->laporan_hasil_pelaksanaan != NULL)) {
                    $status = __('components/span.selesai');
                } else {
                    $status = __('components/span.aktif');
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
                'dokumen_ia' =>  url(Storage::url('/dokumen/ia/' . $ia->dokumen)),
                'dokumen_moa' =>  url(Storage::url('/dokumen/moa/' . $ia->moa->dokumen)),
                'dokumen_mou' =>  url(Storage::url('/dokumen/moa/' . $ia->moa->mou->dokumen)),
                'negara' => $ia->pengusul->negara->nama,
                'status' => $status,
            ];
        }

        if (count($mapDataArray) > 0) {
            return ResponseFormatter::success(
                $mapDataArray,
                'Berhasil Mengambil Data Map IA'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Data Map IA Tidak Ada',
                404
            );
        }
    }

    public function listBeritaLanding()
    {
        $data = Berita::with(['kategoriBerita' => function ($kategoriBerita) {
            $kategoriBerita->select('id', 'nama');
        }])->where('bahasa', 'Indonesia')->limit(3)->latest()->get()->makeHidden(['konten']);
        if (count($data) > 0) {
            return ResponseFormatter::success(
                $data,
                'Daftar Berita Berhasil Diambil'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Daftar Berita Tidak Ada',
                404
            );
        }
    }

    public function daftarBerita()
    {
        $data = Berita::with(['kategoriBerita' => function ($kategoriBerita) {
            $kategoriBerita->select('id', 'nama');
        },])->where('bahasa', 'Indonesia')->orderBy('id', 'desc')->orderBy('id', 'desc')->cari(request())->latest()->paginate(8)->makeHidden(['konten']);
        if (count($data) > 0) {
            return ResponseFormatter::success(
                $data,
                'Daftar Berita Berhasil Diambil'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Daftar Berita Tidak Ada',
                404
            );
        }
    }

    public function detailBerita($slug)
    {
        $data = Berita::with('kategoriBerita')->where('slug', $slug)->first();
        if ($data) {
            return ResponseFormatter::success(
                $data,
                'Berita Berhasil Diambil'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Berita Tidak Ada',
                404
            );
        }
    }
}
