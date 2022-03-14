<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Models\Moa;
use App\Models\Mou;
use App\Models\Ia;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function listNegaraMou()
    {
        $data = Mou::join('pengusul', 'mou.pengusul_id', '=', 'pengusul.id')
            ->join('negara', 'pengusul.negara_id', '=', 'negara.id')
            ->select('negara.nama', DB::raw('count(*) as total'))
            ->groupBy('pengusul.negara_id')
            ->get();

        if (count($data) > 0) {
            return ResponseFormatter::success(
                $data,
                'Daftar Negara Mou Berhasil Diambil'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Daftar Negara MOU Tidak Ada'
            );
        }
    }

    public function listNegaraMoa(Request $request)
    {
        $role = $request->role;
        $fakultas_id = $request->fakultas_id;

        if (in_array($role, array('Fakultas', 'Pascasarjana', 'PSDKU', 'LPPM', 'Prodi', 'Unit Kerja'))) {
            $data = Moa::whereHas('user', function ($user) use ($fakultas_id) {
                $user->where('fakultas_id', $fakultas_id);
            })
                ->join('pengusul', 'moa.pengusul_id', '=', 'pengusul.id')
                ->join('negara', 'pengusul.negara_id', '=', 'negara.id')
                ->select('negara.nama', DB::raw('count(*) as total'))
                ->groupBy('pengusul.negara_id')
                ->get();
        } else {
            $data = Moa::join('pengusul', 'moa.pengusul_id', '=', 'pengusul.id')
                ->join('negara', 'pengusul.negara_id', '=', 'negara.id')
                ->select('negara.nama', DB::raw('count(*) as total'))
                ->groupBy('pengusul.negara_id')
                ->get();
        }

        if (count($data) > 0) {
            return ResponseFormatter::success(
                $data,
                'Daftar Negara MOA Berhasil Diambil'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Daftar Negara MOA Tidak Ada'
            );
        }
    }

    public function listNegaraIa(Request $request)
    {
        $role = $request->role;
        $fakultas_id = $request->fakultas_id;
        $prodi_id = $request->prodi_id;
        if (in_array($role, array('Fakultas', 'Pascasarjana', 'PSDKU'))) {
            $data = Ia::with('user')->whereHas('anggotaFakultas', function ($anggotaFakultas) use ($fakultas_id) {
                $anggotaFakultas->where('fakultas_id', $fakultas_id);
            })
                ->join('pengusul', 'ia.pengusul_id', '=', 'pengusul.id')
                ->join('negara', 'pengusul.negara_id', '=', 'negara.id')
                ->select('negara.nama', DB::raw('count(*) as total'))
                ->groupBy('pengusul.negara_id')
                ->get();
        } else if ($role == 'LPPM') {
            $data = Ia::with(['user'])->whereHas('user', function ($user) use ($role) {
                $user->where('role', $role);
            })
                ->join('pengusul', 'ia.pengusul_id', '=', 'pengusul.id')
                ->join('negara', 'pengusul.negara_id', '=', 'negara.id')
                ->select('negara.nama', DB::raw('count(*) as total'))
                ->groupBy('pengusul.negara_id')
                ->get();
        } else if (in_array($role, array('Prodi', 'Unit Kerja'))) {
            $data = Ia::with(['anggotaProdi'])->whereHas('anggotaProdi', function ($anggotaProdi) use ($prodi_id) {
                $anggotaProdi->where('prodi_id', $prodi_id);
            })
                ->join('pengusul', 'ia.pengusul_id', '=', 'pengusul.id')
                ->join('negara', 'pengusul.negara_id', '=', 'negara.id')
                ->select('negara.nama', DB::raw('count(*) as total'))
                ->groupBy('pengusul.negara_id')
                ->get();
        } else {
            $data = Ia::join('pengusul', 'ia.pengusul_id', '=', 'pengusul.id')
                ->join('negara', 'pengusul.negara_id', '=', 'negara.id')
                ->select('negara.nama', DB::raw('count(*) as total'))
                ->groupBy('pengusul.negara_id')
                ->get();
        }

        if (count($data) > 0) {
            return ResponseFormatter::success(
                $data,
                'Daftar Negara IA Berhasil Diambil'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Daftar Negara IA Tidak Ada'
            );
        }
    }

    public function totalDataMou()
    {
        $hariIni = Carbon::now()->toDateString();
        $intervalMou = Carbon::now()->add('1', 'year');

        $totalMou = Mou::count();
        $mouAktif = Mou::where('tanggal_berakhir', '>', $intervalMou)->where('tanggal_berakhir', '>', $hariIni)->count();
        $mouMasaTenggang = Mou::where('tanggal_berakhir', '=', $hariIni)->orWhere(function ($mou) use ($hariIni, $intervalMou) {
            $mou->where('tanggal_berakhir', '<', $intervalMou)->where('tanggal_berakhir', '>', $hariIni);
        })->count();
        $mouKadaluarsa = Mou::where('tanggal_berakhir', '<', $hariIni)->count();

        $data = [
            'totalMou' => $totalMou,
            'mouMasaTenggang' => $mouMasaTenggang,
            'mouAktif' => $mouAktif,
            'mouKadaluarsa' => $mouKadaluarsa
        ];

        return ResponseFormatter::success(
            $data,
            'Total Data MOU Berhasil Diambil'
        );
    }

    public function totalDataMoa(Request $request)
    {
        $fakultas_id = $request->fakultas_id;
        $role = $request->role;

        $hariIni = Carbon::now()->toDateString();
        $intervalMoa = Carbon::now()->add('6', 'month');

        if (in_array($role, array('Fakultas', 'Pascasarjana', 'PSDKU', 'LPPM', 'Prodi', 'Unit Kerja'))) {
            $totalMoa = Moa::with(['pengusul', 'user'])->whereHas('user', function ($user) use ($fakultas_id) {
                $user->where('fakultas_id', $fakultas_id);
            })->count();

            $moaMasaTenggang = Moa::with(['pengusul', 'user'])->whereHas('user', function ($user) use ($fakultas_id) {
                $user->where('fakultas_id', $fakultas_id);
            })->where('tanggal_berakhir', '=', $hariIni)->orWhere(function ($moa) use ($hariIni, $intervalMoa) {
                $moa->where('tanggal_berakhir', '<', $intervalMoa)->where('tanggal_berakhir', '>', $hariIni);
            })->count();

            $moaAktif = Moa::with(['pengusul', 'user'])->whereHas('user', function ($user) use ($fakultas_id) {
                $user->where('fakultas_id', $fakultas_id);
            })->where('tanggal_berakhir', '>', $hariIni)->where('tanggal_berakhir', '>', $intervalMoa)->count();

            $moaKadaluarsa = Moa::with(['pengusul', 'user'])->whereHas('user', function ($user) use ($fakultas_id) {
                $user->where('fakultas_id', $fakultas_id);
            })->where('tanggal_berakhir', '<', $hariIni)->count();
        } else {
            $totalMoa = Moa::count();
            $moaMasaTenggang = Moa::with(['pengusul', 'user'])->where('tanggal_berakhir', '=', $hariIni)->orWhere(function ($moa) use ($hariIni, $intervalMoa) {
                $moa->where('tanggal_berakhir', '<', $intervalMoa)->where('tanggal_berakhir', '>', $hariIni);
            })->count();
            $moaAktif = Moa::with(['pengusul', 'user'])->where('tanggal_berakhir', '>', $hariIni)->where('tanggal_berakhir', '>', $intervalMoa)->count();
            $moaKadaluarsa = Moa::with(['pengusul', 'user'])->where('tanggal_berakhir', '<', $hariIni)->count();
        }

        $data = [
            'totalMoa' => $totalMoa,
            'moaMasaTenggang' => $moaMasaTenggang,
            'moaAktif' => $moaAktif,
            'moaKadaluarsa' => $moaKadaluarsa
        ];

        return ResponseFormatter::success(
            $data,
            'Total Data MOA Berhasil Diambil'
        );
    }

    public function totalDataIa(Request $request)
    {
        $fakultas_id = $request->fakultas_id;
        $prodi_id = $request->prodi_id;
        $role = $request->role;

        $hariIni = Carbon::now();
        if (in_array($role, array('Fakultas', 'Pascasarjana', 'PSDKU'))) {

            // TotalIa
            $totalIa = Ia::with(['anggotaFakultas'])->whereHas('anggotaFakultas', function ($anggotaFakultas) use ($fakultas_id) {
                $anggotaFakultas->where('fakultas_id', $fakultas_id);
            })->count();

            // Aktif
            $iaAktif = Ia::with(['anggotaFakultas'])->whereHas('anggotaFakultas', function ($anggotaFakultas) use ($fakultas_id) {
                $anggotaFakultas->where('fakultas_id', $fakultas_id);
            })->where(function ($query) {
                $query->where('laporan_hasil_pelaksanaan', '=', 'NULL');
                $query->orWhere('laporan_hasil_pelaksanaan', '=', '');
            })->where('tanggal_berakhir', '>=', $hariIni)->count();

            // Selesai
            $iaSelesai = Ia::with(['anggotaFakultas'])->whereHas('anggotaFakultas', function ($anggotaFakultas) use ($fakultas_id) {
                $anggotaFakultas->where('fakultas_id', $fakultas_id);
            })->where(function ($query) {
                $query->whereNotNull('laporan_hasil_pelaksanaan');
                $query->where('laporan_hasil_pelaksanaan', '!=', '');
            })->count();

            $iaSuratTugas = "";

            // Melewati Batas
            $iaMelewatiBatas = Ia::with(['anggotaFakultas'])->whereHas('anggotaFakultas', function ($anggotaFakultas) use ($fakultas_id) {
                $anggotaFakultas->where('fakultas_id', $fakultas_id);
            })->where(function ($query) {
                $query->whereNull('laporan_hasil_pelaksanaan');
                $query->orWhere('laporan_hasil_pelaksanaan', '=', '');
            })->where('tanggal_berakhir', '<', $hariIni)->count();

            $totalPemasukan = Ia::with(['anggotaFakultas'])->whereHas('anggotaFakultas', function ($anggotaFakultas) use ($fakultas_id) {
                $anggotaFakultas->where('fakultas_id', $fakultas_id);
            })->sum('nilai_uang');
        } else if ($role == 'LPPM') {

            // Total Ia
            $totalIa = Ia::with(['user'])->whereHas('user', function ($user) use ($role) {
                $user->where('role', $role);
            })->count();

            // Aktif
            $iaAktif = Ia::with(['user'])->whereHas('user', function ($user) use ($role) {
                $user->where('role', $role);
            })->where(function ($query) {
                $query->where('laporan_hasil_pelaksanaan', '=', 'NULL');
                $query->orWhere('laporan_hasil_pelaksanaan', '=', '');
            })->where('tanggal_berakhir', '>=', $hariIni)->count();

            // Selesai
            $iaSelesai = Ia::with(['user'])->whereHas('user', function ($user) use ($role) {
                $user->where('role', $role);
            })->where(function ($query) {
                $query->whereNotNull('laporan_hasil_pelaksanaan');
                $query->where('laporan_hasil_pelaksanaan', '!=', '');
            })->count();

            // Melewati Batas
            $iaMelewatiBatas = Ia::with(['user'])->whereHas('user', function ($user) use ($role) {
                $user->where('role', $role);
            })->where(function ($query) {
                $query->whereNull('laporan_hasil_pelaksanaan');
                $query->orWhere('laporan_hasil_pelaksanaan', '=', '');
            })->where('tanggal_berakhir', '<', $hariIni)->count();

            $iaSuratTugas = "";

            $totalPemasukan = Ia::with(['user'])->whereHas('user', function ($user) use ($role) {
                $user->where('role', $role);
            })->sum('nilai_uang');
        } else if (in_array($role, array('Prodi', 'Unit Kerja'))) {

            // Total Ia
            $totalIa = Ia::with(['anggotaProdi'])->whereHas('anggotaProdi', function ($anggotaProdi) use ($prodi_id) {
                $anggotaProdi->where('prodi_id', $prodi_id);
            })->count();

            // Aktif
            $iaAktif = Ia::with(['anggotaProdi'])->whereHas('anggotaProdi', function ($anggotaProdi) use ($prodi_id) {
                $anggotaProdi->where('prodi_id', $prodi_id);
            })->where(function ($query) {
                $query->where('laporan_hasil_pelaksanaan', '=', 'NULL');
                $query->orWhere('laporan_hasil_pelaksanaan', '=', '');
            })->where('tanggal_berakhir', '>=', $hariIni)->count();

            // Selesai
            $iaSelesai = Ia::with(['anggotaProdi'])->whereHas('anggotaProdi', function ($anggotaProdi) use ($prodi_id) {
                $anggotaProdi->where('prodi_id', $prodi_id);
            })->where(function ($query) {
                $query->whereNotNull('laporan_hasil_pelaksanaan');
                $query->where('laporan_hasil_pelaksanaan', '!=', '');
            })->count();

            // Melewati Batas
            $iaMelewatiBatas = Ia::with(['anggotaProdi'])->whereHas('anggotaProdi', function ($anggotaProdi) use ($prodi_id) {
                $anggotaProdi->where('prodi_id', $prodi_id);
            })->where(function ($query) {
                $query->whereNull('laporan_hasil_pelaksanaan');
                $query->orWhere('laporan_hasil_pelaksanaan', '=', '');
            })->where('tanggal_berakhir', '<', $hariIni)->count();

            $iaSuratTugas = "";

            $totalPemasukan = Ia::with(['anggotaProdi'])->whereHas('anggotaProdi', function ($anggotaProdi) use ($prodi_id) {
                $anggotaProdi->where('prodi_id', $prodi_id);
            })->sum('nilai_uang');
        } else {
            // Total Ia
            $totalIa = Ia::count();

            // Aktif
            $iaAktif = Ia::with(['anggotaProdi'])->where(function ($query) {
                $query->where('laporan_hasil_pelaksanaan', '=', 'NULL');
                $query->orWhere('laporan_hasil_pelaksanaan', '=', '');
            })->where('tanggal_berakhir', '>=', $hariIni)->count();

            // Selesai
            $iaSelesai = Ia::with(['anggotaProdi'])->where(function ($query) {
                $query->whereNotNull('laporan_hasil_pelaksanaan');
                $query->where('laporan_hasil_pelaksanaan', '!=', '');
            })->count();

            // Melewati Batas
            $iaMelewatiBatas = Ia::with(['anggotaProdi'])->where(function ($query) {
                $query->whereNull('laporan_hasil_pelaksanaan');
                $query->orWhere('laporan_hasil_pelaksanaan', '=', '');
            })->where('tanggal_berakhir', '<', $hariIni)->count();

            // Belum Upload Surat Tugas
            $iaSuratTugas = Ia::where('surat_tugas', '=', NULL)->orWhere('surat_tugas', '=', '')->count();

            // Total Pemasukan
            $totalPemasukan = Ia::sum('nilai_uang');
        }

        $data = [
            'totalIa' => $totalIa,
            'iaAktif' => $iaAktif,
            'iaSelesai' => $iaSelesai,
            'iaMelewatiBatas' => $iaMelewatiBatas,
            'iaSuratTugas' => $iaSuratTugas,
            'totalPemasukan' => $totalPemasukan
        ];

        return ResponseFormatter::success(
            $data,
            'Total Data IA Berhasil Diambil'
        );
    }
}
