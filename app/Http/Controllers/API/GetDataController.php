<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Pengusul;
use Illuminate\Http\Request;

class GetDataController extends Controller
{
    public function pengusul($id)
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
        ])->orderBy('id', 'desc')->where('id', $id)->get();

        if (count($data) > 0) {
            return ResponseFormatter::success(
                $data,
                'Data Pengusul Berhasil Diambil'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Data Pengusul Tidak Ada',
                404
            );
        }
    }
}
