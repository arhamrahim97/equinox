<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Fakultas;
use App\Models\Ia;
use App\Models\KategoriBerita;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Kota;
use App\Models\Moa;
use App\Models\Mou;
use App\Models\Negara;
use App\Models\Pengusul;
use App\Models\Prodi;
use App\Models\Provinsi;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListController extends Controller
{
    public function listRegion()
    {
        $region = [
            [
                'nama' => 'Africa'
            ],
            [
                'nama' => 'Americas'
            ],
            [
                'nama' => 'Asia'
            ],
            [
                'nama' => 'Oceania'
            ],
            [
                'nama' => 'Polar'
            ],
        ];

        return ResponseFormatter::success(
            $region,
            'Data Region Berhasil Diambil'
        );
    }

    public function listNegara(Request $request)
    {
        $region = $request->region;
        $negara = Negara::select('id', 'nama')->where('region', $region)->orderBy('nama', 'asc')->get();

        if (count($negara) > 0) {
            return ResponseFormatter::success(
                $negara,
                'Data Negara Berhasil Diambil'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Data Negara Tidak Ada',
                404
            );
        }
    }

    public function listProvinsi(Request $request)
    {
        $negara_id = $request->negara_id;
        $provinsi = Provinsi::select('id', 'nama')->where('negara_id', $negara_id)->orderBy('nama', 'asc')->get();

        if (count($provinsi) > 0) {
            return ResponseFormatter::success(
                $provinsi,
                'Data Provinsi Berhasil Diambil'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Data Provinsi Tidak Ada',
                404
            );
        }
    }

    public function listKota(Request $request)
    {
        $provinsi_id = $request->provinsi_id;
        $kota = Kota::select('id', 'nama')->where('provinsi_id', $provinsi_id)->orderBy('nama', 'asc')->get();

        if (count($kota) > 0) {
            return ResponseFormatter::success(
                $kota,
                'Data Kota Berhasil Diambil'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Data Kota Tidak Ada',
                404
            );
        }
    }

    public function listKecamatan(Request $request)
    {
        $kota_id = $request->kota_id;
        $kecamatan = Kecamatan::select('id', 'nama')->where('kota_id', $kota_id)->orderBy('nama', 'asc')->get();

        if (count($kecamatan) > 0) {
            return ResponseFormatter::success(
                $kecamatan,
                'Data Kecamatan Berhasil Diambil'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Data Kecamatan Tidak Ada',
                404
            );
        }
    }

    public function listKelurahan(Request $request)
    {
        $kecamatan_id = $request->kecamatan_id;
        $kelurahan = Kelurahan::select('id', 'nama')->where('kecamatan_id', $kecamatan_id)->orderBy('nama', 'asc')->get();

        if (count($kelurahan) > 0) {
            return ResponseFormatter::success(
                $kelurahan,
                'Data Kelurahan Berhasil Diambil'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Data Kelurahan Tidak Ada',
                404
            );
        }
    }

    public function listPengusul()
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
        ])->orderBy('id', 'desc')->get();
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

    public function listKategoriBerita()
    {
        $data = KategoriBerita::orderBy('nama', 'asc')->select('id', 'nama')->get();
        if (count($data) > 0) {
            return ResponseFormatter::success(
                $data,
                'Data Kategori Berita Berhasil Diambil'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Data Kategori Berita Tidak Ada',
                404
            );
        }
    }

    public function listFakultas()
    {
        $data = Fakultas::orderBy('nama', 'asc')->select('id', 'nama')->get();
        if (count($data) > 0) {
            return ResponseFormatter::success(
                $data,
                'Data Fakultas Berhasil Diambil'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Data Fakultas Tidak Ada',
                404
            );
        }
    }

    public function listProdi(Request $request)
    {
        $fakultas_id = $request->fakultas_id;
        $data = Prodi::where('fakultas_id', $fakultas_id)->orderBy('nama', 'asc')->get();
        if (count($data) > 0) {
            return ResponseFormatter::success(
                $data,
                'Data Prodi Berhasil Diambil'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Data Prodi Tidak Ada',
                404
            );
        }
    }

    public function listJenisKerjasama()
    {
        $data = [
            [
                'nama' => 'Pendidikan'
            ],
            [
                'nama' => 'Penelitian'
            ],
            [
                'nama' => 'Pengabdian Kepada Masyarakat'
            ],
        ];

        return ResponseFormatter::success(
            $data,
            'Data Jenis Kerjasama Berhasil Diambil'
        );
    }
}
