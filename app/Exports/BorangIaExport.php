<?php

namespace App\Exports;

use App\Models\Ia;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromView;

class BorangIaExport implements FromView
{
    protected $jenisKerjasama;
    protected $tingkat;
    protected $dariTanggal;
    protected $sampaiTanggal;

    function __construct($jenisKerjasama, $tingkat, $dariTanggal, $sampaiTanggal)
    {
        $this->jenisKerjasama = $jenisKerjasama;
        $this->tingkat = $tingkat;
        $this->dariTanggal = $dariTanggal;
        $this->sampaiTanggal = $sampaiTanggal;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $userLogin = Auth::user();
        $requestJenisKerjasama = $this->jenisKerjasama;
        $requestTingkat = $this->tingkat;
        $requestDariTanggal = $this->dariTanggal;
        $requestSampaiTanggal = $this->sampaiTanggal;

        $daftarIa = Ia::with(['jenisKerjasama', 'pengusul'])->whereHas('jenisKerjasama', function ($jenisKerjasama) use ($requestJenisKerjasama) {
            if ($requestJenisKerjasama) {
                $jenisKerjasama->whereIn('jenis_kerjasama', $requestJenisKerjasama);
            }
        })->whereHas('pengusul', function ($pengusul) use ($requestTingkat) {
            if ($requestTingkat) {
                if (count($requestTingkat) == 1) {
                    if ($requestTingkat[0] == 'internasional') {
                        $pengusul->where('negara_id', '!=', 102);
                    }

                    if ($requestTingkat[0] == 'nasional') {
                        $pengusul->where('negara_id', '=', 102)->where('provinsi_id', "!=", 26);
                    }

                    if ($requestTingkat[0] == 'lokal') {
                        $pengusul->where('negara_id', '=', 102)->where('provinsi_id', '=', 26);
                    }
                }

                if (count($requestTingkat) == 2) {
                    if (count(array_intersect($requestTingkat, array('internasional', 'nasional'))) == 2) {
                        $pengusul->where('negara_id', '!=', 102);
                        $pengusul->orWhere(function ($pengusul) {
                            $pengusul->where('negara_id', '=', 102)->where('provinsi_id', "!=", 26);
                        });
                    }

                    if (count(array_intersect($requestTingkat, array('internasional', 'lokal'))) == 2) {

                        $pengusul->where('negara_id', '!=', 102);
                        $pengusul->orWhere(function ($pengusul) {
                            $pengusul->where('negara_id', '=', 102)->where('provinsi_id', '=', 26);
                        });
                    }

                    if (count(array_intersect($requestTingkat, array('nasional', 'lokal'))) == 2) {
                        $pengusul->where('negara_id', '=', 102)->where('provinsi_id', "!=", 26);
                        $pengusul->orWhere(function ($pengusul) {
                            $pengusul->where('negara_id', '=', 102)->where('provinsi_id', '=', 26);
                        });
                    };
                }
            }
        })->where(function ($ia) use ($requestDariTanggal, $requestSampaiTanggal) {
            if ($requestDariTanggal && $requestSampaiTanggal) {
                $ia->where('created_at', '>=', $requestDariTanggal)->where('created_at', '<=', $requestSampaiTanggal);
            }
        })->whereHas('anggotaFakultas', function ($anggotaFakultas) use ($userLogin) {
            if (in_array(Auth::user()->role, array('Fakultas', 'Pascasarjana', 'PSDKU'))) {
                $anggotaFakultas->where('fakultas_id', $userLogin->fakultas_id);
            }
        })->whereHas('user', function ($user) use ($userLogin) {
            if (Auth::user()->role == 'LPPM') {
                $user->where('role', $userLogin->role);
            }
        })->whereHas('anggotaProdi', function ($anggotaProdi) use ($userLogin) {
            if (in_array(Auth::user()->role, array('Prodi', 'Unit Kerja'))) {
                $anggotaProdi->where('prodi_id', $userLogin->prodi_id);
            }
        })->orderBy('id', 'desc')->get();

        return view('pages.ia.borangIa.export', compact(['daftarIa', 'requestJenisKerjasama', 'requestTingkat', 'requestDariTanggal', 'requestSampaiTanggal']));
    }
}
