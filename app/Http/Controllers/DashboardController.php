<?php

namespace App\Http\Controllers;

use App\Models\Ia;
use App\Models\Moa;
use App\Models\Mou;
use App\Models\Negara;
use App\Models\Pengusul;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function index()
    {
        // MOU
        $totalMou = $this->_countMou()['totalMou'];
        $mouAktif = $this->_countMou()['mouAktif'];
        $mouMasaTenggang = $this->_countMou()['mouMasaTenggang'];
        $mouKadaluarsa = $this->_countMou()['mouKadaluarsa'];

        // MOA
        $totalMoa = $this->_countMoa()['totalMoa'];
        $moaAktif = $this->_countMoa()['moaAktif'];
        $moaMasaTenggang = $this->_countMoa()['moaMasaTenggang'];
        $moaKadaluarsa = $this->_countMoa()['moaKadaluarsa'];

        // Ia
        $totalIa = $this->_countIa()['totalIa'];
        $iaAktif = $this->_countIa()['iaAktif'];
        $iaSelesai = $this->_countIa()['iaSelesai'];
        $iaMelewatiBatas = $this->_countIa()['iaMelewatiBatas'];

        $data = ['totalMou', 'mouAktif', 'mouMasaTenggang', 'mouKadaluarsa', 'totalMoa', 'moaAktif', 'moaMasaTenggang', 'moaKadaluarsa', 'totalIa', 'iaAktif', 'iaSelesai', 'iaMelewatiBatas'];
        return view('pages.dashboard.dashboard', compact($data));
    }

    private function _countMou()
    {
        $hariIni = Carbon::now()->toDateString();
        $intervalMou = Carbon::now()->add('1', 'year');

        $totalMou = Mou::count();
        $mouAktif = Mou::where('tanggal_berakhir', '>', $intervalMou)->where('tanggal_berakhir', '>', $hariIni)->count();
        $mouMasaTenggang = Mou::where('tanggal_berakhir', '=', $hariIni)->orWhere(function ($mou) use ($hariIni, $intervalMou) {
            $mou->where('tanggal_berakhir', '<', $intervalMou)->where('tanggal_berakhir', '>', $hariIni);
        })->count();
        $mouKadaluarsa = Mou::where('tanggal_berakhir', '<', $hariIni)->count();

        return [
            'totalMou' => $totalMou,
            'mouMasaTenggang' => $mouMasaTenggang,
            'mouAktif' => $mouAktif,
            'mouKadaluarsa' => $mouKadaluarsa
        ];
    }

    private function _countMoa()
    {
        $userLogin = Auth::user();
        $hariIni = Carbon::now()->toDateString();
        $intervalMoa = Carbon::now()->add('6', 'month');

        if (in_array(Auth::user()->role, array('Fakultas', 'Pascasarjana', 'PSDKU', 'LPPM', 'Prodi', 'Unit Kerja'))) {
            $totalMoa = Moa::with(['pengusul', 'user'])->whereHas('user', function ($user) use ($userLogin) {
                $user->where('fakultas_id', $userLogin->fakultas_id);
            })->count();

            $moaMasaTenggang = Moa::with(['pengusul', 'user'])->whereHas('user', function ($user) use ($userLogin) {
                $user->where('fakultas_id', $userLogin->fakultas_id);
            })->where('tanggal_berakhir', '=', $hariIni)->orWhere(function ($moa) use ($hariIni, $intervalMoa) {
                $moa->where('tanggal_berakhir', '<', $intervalMoa)->where('tanggal_berakhir', '>', $hariIni);
            })->count();

            $moaAktif = Moa::with(['pengusul', 'user'])->whereHas('user', function ($user) use ($userLogin) {
                $user->where('fakultas_id', $userLogin->fakultas_id);
            })->where('tanggal_berakhir', '>', $hariIni)->where('tanggal_berakhir', '>', $intervalMoa)->count();

            $moaKadaluarsa = Moa::with(['pengusul', 'user'])->whereHas('user', function ($user) use ($userLogin) {
                $user->where('fakultas_id', $userLogin->fakultas_id);
            })->where('tanggal_berakhir', '<', $hariIni)->count();
        } else {
            $totalMoa = Moa::count();
            $moaMasaTenggang = Moa::with(['pengusul', 'user'])->where('tanggal_berakhir', '=', $hariIni)->orWhere(function ($moa) use ($hariIni, $intervalMoa) {
                $moa->where('tanggal_berakhir', '<', $intervalMoa)->where('tanggal_berakhir', '>', $hariIni);
            })->count();
            $moaAktif = Moa::with(['pengusul', 'user'])->where('tanggal_berakhir', '>', $hariIni)->where('tanggal_berakhir', '>', $intervalMoa)->count();
            $moaKadaluarsa = Moa::with(['pengusul', 'user'])->where('tanggal_berakhir', '<', $hariIni)->count();
        }

        return [
            'totalMoa' => $totalMoa,
            'moaMasaTenggang' => $moaMasaTenggang,
            'moaAktif' => $moaAktif,
            'moaKadaluarsa' => $moaKadaluarsa
        ];
    }

    private function _countIa()
    {
        $userLogin = Auth::user();
        $hariIni = Carbon::now();
        if (in_array(Auth::user()->role, array('Fakultas', 'Pascasarjana', 'PSDKU'))) {

            // TotalIa
            $totalIa = Ia::with(['anggotaFakultas'])->whereHas('anggotaFakultas', function ($anggotaFakultas) use ($userLogin) {
                $anggotaFakultas->where('fakultas_id', $userLogin->fakultas_id);
            })->count();

            // Aktif
            $iaAktif = Ia::with(['anggotaFakultas'])->whereHas('anggotaFakultas', function ($anggotaFakultas) use ($userLogin) {
                $anggotaFakultas->where('fakultas_id', $userLogin->fakultas_id);
            })->where(function ($query) {
                $query->where('laporan_hasil_pelaksanaan', '=', 'NULL');
                $query->orWhere('laporan_hasil_pelaksanaan', '=', '');
            })->where('tanggal_berakhir', '>=', $hariIni)->count();

            // Selesai
            $iaSelesai = Ia::with(['anggotaFakultas'])->whereHas('anggotaFakultas', function ($anggotaFakultas) use ($userLogin) {
                $anggotaFakultas->where('fakultas_id', $userLogin->fakultas_id);
            })->where(function ($query) {
                $query->whereNotNull('laporan_hasil_pelaksanaan');
                $query->where('laporan_hasil_pelaksanaan', '!=', '');
            })->count();

            // Melewati Batas
            $iaMelewatiBatas = Ia::with(['anggotaFakultas'])->whereHas('anggotaFakultas', function ($anggotaFakultas) use ($userLogin) {
                $anggotaFakultas->where('fakultas_id', $userLogin->fakultas_id);
            })->where(function ($query) {
                $query->whereNull('laporan_hasil_pelaksanaan');
                $query->orWhere('laporan_hasil_pelaksanaan', '=', '');
            })->where('tanggal_berakhir', '<', $hariIni)->count();
        } else if (Auth::user()->role == 'LPPM') {

            // Total Ia
            $totalIa = Ia::with(['user'])->whereHas('user', function ($user) use ($userLogin) {
                $user->where('role', $userLogin->role);
            })->count();

            // Aktif
            $iaAktif = Ia::with(['user'])->whereHas('user', function ($user) use ($userLogin) {
                $user->where('role', $userLogin->role);
            })->where(function ($query) {
                $query->where('laporan_hasil_pelaksanaan', '=', 'NULL');
                $query->orWhere('laporan_hasil_pelaksanaan', '=', '');
            })->where('tanggal_berakhir', '>=', $hariIni)->count();

            // Selesai
            $iaSelesai = Ia::with(['user'])->whereHas('user', function ($user) use ($userLogin) {
                $user->where('role', $userLogin->role);
            })->where(function ($query) {
                $query->whereNotNull('laporan_hasil_pelaksanaan');
                $query->where('laporan_hasil_pelaksanaan', '!=', '');
            })->count();

            // Melewati Batas
            $iaMelewatiBatas = Ia::with(['user'])->whereHas('user', function ($user) use ($userLogin) {
                $user->where('role', $userLogin->role);
            })->where(function ($query) {
                $query->whereNull('laporan_hasil_pelaksanaan');
                $query->orWhere('laporan_hasil_pelaksanaan', '=', '');
            })->where('tanggal_berakhir', '<', $hariIni)->count();
        } else if (in_array(Auth::user()->role, array('Prodi', 'Unit Kerja'))) {

            // Total Ia
            $totalIa = Ia::with(['anggotaProdi'])->whereHas('anggotaProdi', function ($anggotaProdi) use ($userLogin) {
                $anggotaProdi->where('prodi_id', $userLogin->prodi_id);
            })->count();

            // Aktif
            $iaAktif = Ia::with(['anggotaProdi'])->whereHas('anggotaProdi', function ($anggotaProdi) use ($userLogin) {
                $anggotaProdi->where('prodi_id', $userLogin->prodi_id);
            })->where(function ($query) {
                $query->where('laporan_hasil_pelaksanaan', '=', 'NULL');
                $query->orWhere('laporan_hasil_pelaksanaan', '=', '');
            })->where('tanggal_berakhir', '>=', $hariIni)->count();

            // Selesai
            $iaSelesai = Ia::with(['anggotaProdi'])->whereHas('anggotaProdi', function ($anggotaProdi) use ($userLogin) {
                $anggotaProdi->where('prodi_id', $userLogin->prodi_id);
            })->where(function ($query) {
                $query->whereNotNull('laporan_hasil_pelaksanaan');
                $query->where('laporan_hasil_pelaksanaan', '!=', '');
            })->count();

            // Melewati Batas
            $iaMelewatiBatas = Ia::with(['anggotaProdi'])->whereHas('anggotaProdi', function ($anggotaProdi) use ($userLogin) {
                $anggotaProdi->where('prodi_id', $userLogin->prodi_id);
            })->where(function ($query) {
                $query->whereNull('laporan_hasil_pelaksanaan');
                $query->orWhere('laporan_hasil_pelaksanaan', '=', '');
            })->where('tanggal_berakhir', '<', $hariIni)->count();
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
        }

        return [
            'totalIa' => $totalIa,
            'iaAktif' => $iaAktif,
            'iaSelesai' => $iaSelesai,
            'iaMelewatiBatas' => $iaMelewatiBatas,
        ];
    }

    public function getTotalNegaraMou(Request $request)
    {
        if ($request->ajax()) {
            $data =
                $data = Mou::with('user')
                ->join('pengusul', 'mou.pengusul_id', '=', 'pengusul.id')
                ->join('negara', 'pengusul.negara_id', '=', 'negara.id')
                ->select('negara.nama', DB::raw('count(*) as total'))
                ->groupBy('pengusul.negara_id')
                ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('negara', function ($row) {
                    return $row->nama;
                })
                ->addColumn('total', function ($row) {
                    return $row->total;
                })
                ->rawColumns(['negara', 'total'])
                ->make(true);
        }
    }

    public function getTotalNegaraMoa(Request $request)
    {
        $userLogin = Auth::user();
        if ($request->ajax()) {
            if (in_array(Auth::user()->role, array('Fakultas', 'Pascasarjana', 'PSDKU', 'LPPM', 'Prodi', 'Unit Kerja'))) {
                $data = Moa::with('user')->whereHas('user', function ($user) use ($userLogin) {
                    $user->where('fakultas_id', $userLogin->fakultas_id);
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
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('negara', function ($row) {
                    return $row->nama;
                })
                ->addColumn('total', function ($row) {
                    return $row->total;
                })
                ->rawColumns(['negara', 'total'])
                ->make(true);
        }
    }

    public function getTotalNegaraIa(Request $request)
    {
        $userLogin = Auth::user();
        if (in_array(Auth::user()->role, array('Fakultas', 'Pascasarjana', 'PSDKU'))) {
            $data = Ia::with('user')->whereHas('anggotaFakultas', function ($anggotaFakultas) use ($userLogin) {
                $anggotaFakultas->where('fakultas_id', $userLogin->fakultas_id);
            })
                ->join('pengusul', 'ia.pengusul_id', '=', 'pengusul.id')
                ->join('negara', 'pengusul.negara_id', '=', 'negara.id')
                ->select('negara.nama', DB::raw('count(*) as total'))
                ->groupBy('pengusul.negara_id')
                ->get();
        } else if (Auth::user()->role == 'LPPM') {
            $data = Ia::with(['user'])->whereHas('user', function ($user) use ($userLogin) {
                $user->where('role', $userLogin->role);
            })
                ->join('pengusul', 'ia.pengusul_id', '=', 'pengusul.id')
                ->join('negara', 'pengusul.negara_id', '=', 'negara.id')
                ->select('negara.nama', DB::raw('count(*) as total'))
                ->groupBy('pengusul.negara_id')
                ->get();
        } else if (in_array(Auth::user()->role, array('Prodi', 'Unit Kerja'))) {
            $data = Ia::with(['anggotaProdi'])->whereHas('anggotaProdi', function ($anggotaProdi) use ($userLogin) {
                $anggotaProdi->where('prodi_id', $userLogin->prodi_id);
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
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('negara', function ($row) {
                    return $row->nama;
                })
                ->addColumn('total', function ($row) {
                    return $row->total;
                })
                ->rawColumns(['negara', 'total'])
                ->make(true);
        }
    }
}
