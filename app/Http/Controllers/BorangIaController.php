<?php

namespace App\Http\Controllers;

use App\Exports\BorangIaExport;
use App\Models\Ia;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class BorangIaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Ia::with(['pengusul'])->orderBy('id', 'desc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('lembaga_mitra', function (Ia $ia) {
                    return $ia->pengusul->nama;
                })
                ->addColumn('tipe_kerjasama', function (Ia $ia) {
                    return '-';
                })
                ->addColumn('internasional', function (Ia $ia) {
                    $internasional = $ia->pengusul->negara_id != 102 ? "&#10004" : '';
                    return $internasional;
                })
                ->addColumn('nasional', function (Ia $ia) {
                    $nasional = $ia->pengusul->negara_id != 102 && $ia->pengusul->provinsi_id != 26 ?   "&#10004" : '';
                    return $nasional;
                })
                ->addColumn('lokal', function (Ia $ia) {
                    $lokal = $ia->pengusul->negara_id == 102 && $ia->pengusul->provinsi_id == 26 ?  "&#10004" : '';
                    return $lokal;
                })
                ->addColumn('manfaat', function (Ia $ia) {
                    return '-';
                })
                ->addColumn('waktu_dan_durasi', function (Ia $ia) {
                    $tanggal_mulai = Carbon::parse($ia->tanggal_mulai);
                    $tanggal_berakhir = Carbon::parse($ia->tanggal_berakhir);
                    $durasi = $tanggal_mulai->diff($tanggal_berakhir)->format('%y Tahun, %m Bulan dan %d Hari');
                    $waktu = Carbon::parse($ia->tanggal_mulai)->translatedFormat('d F Y') . " - " . Carbon::parse($ia->tanggal_berakhir)->translatedFormat('d F Y');
                    return $waktu . "<br>" .  $durasi;
                })
                ->addColumn('bukti_dan_kerjasama', function (Ia $ia) {
                    $lpjBtn = $ia->laporan_hasil_pelaksanaan ? "<a target='_blank' href='" . Storage::url("dokumen/ia_laporan_hasil_pelaksanaan/" . $ia->laporan_hasil_pelaksanaan) . "' class='btn btn-success btn-sm mx-1 my-1'>" .   __('components/button.download_laporan_pelaksanaan') . "</a>" : '';
                    // Belum Fix

                    $bukti_dan_kerjasama = "<div class='row justify-content-center'><a target='_blank' href='" . Storage::url('/dokumen/mou/' . $ia->moa->mou->dokumen) . "' class='btn btn-primary btn-sm mx-1 my-1'><i class='fas fa-file-download mr-1'></i>" .  __('pages/ia/map.unduhMou') . "</a><a target='_blank' href='" . Storage::url('/dokumen/moa/' . $ia->moa->dokumen) . "' class='btn btn-warning btn-sm my-1'><i class='fas fa-file-download mr-1'></i>" .  __('pages/ia/map.unduhMoa') . "</a><a target='_blank' href='" . Storage::url('/dokumen/ia/' . $ia->dokumen) . "' class='btn btn-success btn-sm my-1'><i class='fas fa-file-download mr-1'></i>" .  __('pages/ia/map.unduhIa') . "</a>" . $lpjBtn . "</div>";
                    return $bukti_dan_kerjasama;
                })
                ->rawColumns(['lembaga_mitra', 'tipe_kerjasama', 'internasional', 'nasional', 'lokal', 'manfaat', 'waktu_dan_durasi', 'bukti_dan_kerjasama'])
                ->make(true);
        }
        return view('pages.ia.borangIa.index');
    }

    public function export()
    {
        return Excel::download(new BorangIaExport, 'tesBorang.xlsx');
    }
}
