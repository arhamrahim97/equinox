<?php

namespace App\Http\Controllers\API\Master;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Pengusul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PengusulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pengusul::with([
            'negara' => function ($negara) {
                $negara->select('id', 'nama', 'region');
            }, 'provinsi' => function ($provinsi) {
                $provinsi->select('id', 'nama', 'negara_id');
            }, 'kota' => function ($kota) {
                $kota->select('id', 'nama', 'provinsi_id');
            }, 'kecamatan' => function ($kecamatan) {
                $kecamatan->select('id', 'nama', 'kota_id');
            }, 'kelurahan' => function ($kelurahan) {
                $kelurahan->select('id', 'nama', 'kecamatan_id');
            }
        ])->orderBy('id', 'desc')->paginate(10)->except(['latitude', 'longitude']);
        if (count($data) > 0) {
            return ResponseFormatter::success(
                $data,
                'Daftar Pengusul Berhasil Diambil'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Tidak Ada Pengusul',
                404
            );
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
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
            return ResponseFormatter::error(
                $validator->errors(),
                'Gagal Menambahkan Pengusul',
                404
            );
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

        return ResponseFormatter::success(null, 'Berhasil Menambahkan Pengusul');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengusul  $pengusul
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Pengusul::with([
            'negara' => function ($negara) {
                $negara->select('id', 'nama', 'region');
            }, 'provinsi' => function ($provinsi) {
                $provinsi->select('id', 'nama', 'negara_id');
            }, 'kota' => function ($kota) {
                $kota->select('id', 'nama', 'provinsi_id');
            }, 'kecamatan' => function ($kecamatan) {
                $kecamatan->select('id', 'nama', 'kota_id');
            }, 'kelurahan' => function ($kelurahan) {
                $kelurahan->select('id', 'nama', 'kecamatan_id');
            }
        ])->where('id', $id)->first();
        if ($data) {
            return ResponseFormatter::success($data, 'Pengusul Berhasil Diambil');
        } else {
            return ResponseFormatter::error(null, 'Pengusul Tidak Ada', 404);
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
            return ResponseFormatter::error(
                $validator->errors(),
                'Gagal Mengupdate Pengusul',
                404
            );
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

        return ResponseFormatter::success(null, 'Berhasil Mengupdate Pengusul');
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
        return ResponseFormatter::success(
            null,
            'Pengusul Berhasil Dihapus'
        );
    }
}
