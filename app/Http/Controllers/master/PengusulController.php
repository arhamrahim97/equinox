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
                    $negara = $pengusul->negara->nama ? $pengusul->negara->nama : "";
                    return $negara;
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
                    $actionBtn = '<div class="row"><a href="' . url('/pengusul/' . $row->id . '/edit') . '" id="btn-edit" class="btn btn-warning btn-sm mr-1">' . __('components/button.update') . '</a><button id="btn-delete" onclick="hapus(' . $row->id . ')" class="btn btn-danger btn-sm mr-1" value="' . $row->id . '" >' . __('components/button.delete') . '</button></div>';
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
        return view('pages.master.pengusul.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'alamat' => 'required',
                'region' => 'required',
                'negara' => 'required',
                'provinsi' => 'required',
                'kota' => 'required',
                'kecamatan' => 'required',
                'kelurahan' => 'required',
                'latitude' => 'required',
                'longitude' => 'required',
                'telepon' => 'required',
            ],
            [
                'nama.required' => __('components/validation.required', ['nama' => __('pages/master/pengusul.nama')]),
                'alamat.required' => __('components/validation.required', ['nama' => __('pages/master/pengusul.alamat')]),
                'region.required' => __('components/validation.required', ['nama' => __('pages/master/pengusul.region')]),
                'negara.required' => __('components/validation.required', ['nama' => __('pages/master/pengusul.negara')]),
                'provinsi.required' => __('components/validation.required', ['nama' => __('pages/master/pengusul.provinsi')]),
                'kota.required' => __('components/validation.required', ['nama' => __('pages/master/pengusul.kota')]),
                'kecamatan.required' => __('components/validation.required', ['nama' => __('pages/master/pengusul.kecamatan')]),
                'kelurahan.required' => __('components/validation.required', ['nama' => __('pages/master/pengusul.kelurahan')]),
                'latitude.required' => __('components/validation.required', ['nama' => __('pages/master/pengusul.latitude')]),
                'longitude.required' => __('components/validation.required', ['nama' => __('pages/master/pengusul.longitude')]),
                'telepon.required' => __('components/validation.required', ['nama' => __('pages/master/pengusul.telepon')]),
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }
        $pengusul = new Pengusul();
        $pengusul->nama = $request->nama;
        $pengusul->alamat = $request->alamat;
        $pengusul->region = $request->region;
        $pengusul->negara_id = $request->negara;
        $pengusul->provinsi_id = $request->provinsi;
        $pengusul->kota_id = $request->kota;
        $pengusul->kecamatan_id = $request->kecamatan;
        $pengusul->kelurahan_id = $request->kelurahan;
        $pengusul->latitude = $request->latitude;
        $pengusul->longitude = $request->longitude;
        $pengusul->telepon = $request->telepon;
        $pengusul->save();

        return response()->json(['success' => 'Success']);
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
        return view('pages/master/pengusul.edit', compact('pengusul'));
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
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'alamat' => 'required',
                'region' => 'required',
                'negara' => 'required',
                'provinsi' => 'required',
                'kota' => 'required',
                'kecamatan' => 'required',
                'kelurahan' => 'required',
                'latitude' => 'required',
                'longitude' => 'required',
                'telepon' => 'required',
            ],
            [
                'nama.required' => __('components/validation.required', ['nama' => __('pages/master/pengusul.nama')]),
                'alamat.required' => __('components/validation.required', ['nama' => __('pages/master/pengusul.alamat')]),
                'region.required' => __('components/validation.required', ['nama' => __('pages/master/pengusul.region')]),
                'negara.required' => __('components/validation.required', ['nama' => __('pages/master/pengusul.negara')]),
                'provinsi.required' => __('components/validation.required', ['nama' => __('pages/master/pengusul.provinsi')]),
                'kota.required' => __('components/validation.required', ['nama' => __('pages/master/pengusul.kota')]),
                'kecamatan.required' => __('components/validation.required', ['nama' => __('pages/master/pengusul.kecamatan')]),
                'kelurahan.required' => __('components/validation.required', ['nama' => __('pages/master/pengusul.kelurahan')]),
                'latitude.required' => __('components/validation.required', ['nama' => __('pages/master/pengusul.latitude')]),
                'longitude.required' => __('components/validation.required', ['nama' => __('pages/master/pengusul.longitude')]),
                'telepon.required' => __('components/validation.required', ['nama' => __('pages/master/pengusul.telepon')]),
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $pengusul->nama = $request->nama;
        $pengusul->alamat = $request->alamat;
        $pengusul->region = $request->region;
        $pengusul->negara_id = $request->negara;
        $pengusul->provinsi_id = $request->provinsi;
        $pengusul->kota_id = $request->kota;
        $pengusul->kecamatan_id = $request->kecamatan;
        $pengusul->kelurahan_id = $request->kelurahan;
        $pengusul->latitude = $request->latitude;
        $pengusul->longitude = $request->longitude;
        $pengusul->telepon = $request->telepon;
        $pengusul->save();

        return response()->json(['success' => 'Success']);
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
