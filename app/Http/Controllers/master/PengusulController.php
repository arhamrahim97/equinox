<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Models\Pengusul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PengusulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Pengusul::with(['negara', 'provinsi', 'kota', 'kecamatan', 'kelurahan'])->orderBy('id', 'desc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('negara', function (Pengusul $pengusul) {
                    return $pengusul->negara->nama;
                })
                ->addColumn('provinsi', function (Pengusul $pengusul) {
                    $pengusul->provinsi ? $provinsi = $pengusul->provinsi->nama : $provinsi = $pengusul->provinsi_id;
                    return $provinsi;
                })
                ->addColumn('kota', function (Pengusul $pengusul) {
                    $pengusul->kota ? $kota = $pengusul->kota->nama : $kota = $pengusul->kota_id;
                    return $kota;
                })
                ->addColumn('kecamatan', function (Pengusul $pengusul) {
                    $pengusul->kecamatan ? $kecamatan = $pengusul->kecamatan->nama : $kecamatan = $pengusul->kecamatan_id;
                    return $kecamatan;
                })
                ->addColumn('kelurahan', function (Pengusul $pengusul) {
                    $pengusul->kelurahan ? $kelurahan = $pengusul->kelurahan->nama : $kelurahan = $pengusul->kelurahan_id;
                    return $kelurahan;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<div class="row"><a href="' . url('/akun/' . $row->id . '/edit') . '" id="btn-edit" class="btn btn-warning btn-sm mr-1">' . __('components/button.update') . '</a><button id="btn-delete" onclick="hapus(' . $row->id . ')" class="btn btn-danger btn-sm mr-1" value="' . $row->id . '" >' . __('components/button.delete') . '</button></div>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'negara', 'provinsi', 'kota', 'kecamatan', 'kelurahan'])
                ->make(true);
        }
        return view('pages.master.pengusul.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengusul  $pengusul
     * @return \Illuminate\Http\Response
     */
    public function show(Pengusul $pengusul)
    {
        if ($pengusul->provinsi) {
            return 'indonesia';
        } else {
            return 'bukan indonesia';
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengusul  $pengusul
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengusul $pengusul)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengusul  $pengusul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengusul $pengusul)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengusul  $pengusul
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengusul $pengusul)
    {
        $pengusul->delete();
        return response()->json([
            'res' => 'success'
        ]);
    }
}
