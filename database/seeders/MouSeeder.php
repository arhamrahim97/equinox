<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MouSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'users_id' => 1,
                'pengusul_id' => 1,
                'latitude' => '-0.857844',
                'longitude' => '119.881858',
                'nomor_mou' => '111111111-mou',
                'nomor_mou_pengusul' => '222222222-mou',
                'nik_nip_pengusul' => '1213213123213123123-mou',
                'jabatan_pengusul' => 'Kepala Dinas-mou',
                'program' => 'Pengadaan Server SIAKAD UNTAD-mou',
                'tanggal_mulai' => '2021-08-16',
                'tanggal_berakhir' => '2023-08-16',
                'dokumen' => 'dokumen_tidak_ada1-mou.pdf',
                'metode_pertemuan' => 'desktodesk-mou',
                'tanggal_pertemuan' => '2021-07-15',
                'waktu_pertemuan' => '21:00',
                'tempat_pertemuan' => 'Cafe Nintendo-mou'
            ],
            [
                'users_id' => 1,
                'pengusul_id' => 2,
                'latitude' => '-0.8364322',
                'longitude' => '119.891505',
                'nomor_mou' => '2121212121-mou',
                'nomor_mou_pengusul' => '4444444444-mou',
                'nik_nip_pengusul' => '999888888888888888-mou',
                'jabatan_pengusul' => 'Kepala Imigrasi-mou',
                'program' => 'Kerjasama Antar Dinas di Besusu Timur-mou',
                'tanggal_mulai' => '2021-12-21',
                'tanggal_berakhir' => '2022-03-16',
                'dokumen' => 'dokumen_tidak_ada2-mou.pdf',
                'metode_pertemuan' => 'desktodesk-mou',
                'tanggal_pertemuan' => '2022-01-21',
                'waktu_pertemuan' => '17:00',
                'tempat_pertemuan' => 'Kantor Imigrasi-mou'
            ],
            [
                'users_id' => 1,
                'pengusul_id' => 3,
                'latitude' => '-0.893251',
                'longitude' => '119.886419',
                'nomor_mou' => '666666666666-mou',
                'nomor_mou_pengusul' => '33333333333333-mou',
                'nik_nip_pengusul' => '677777777777-mou',
                'jabatan_pengusul' => 'CEO Libra Komputer-mou',
                'program' => 'Pembangunan Server Nintendo-mou',
                'tanggal_mulai' => '2021-12-21',
                'tanggal_berakhir' => '2022-03-16',
                'dokumen' => 'dokumen_tidak_ada3-mou.pdf',
                'metode_pertemuan' => 'desktodesk-mou',
                'tanggal_pertemuan' => '2022-01-21',
                'waktu_pertemuan' => '17:00',
                'tempat_pertemuan' => 'UPT TIK UNTAD-mou'
            ],
            [
                'users_id' => 1,
                'pengusul_id' => 4,
                'latitude' => '40.4530387',
                'longitude' => '-3.6905224',
                'nomor_mou' => '777777777777777-mou',
                'nomor_mou_pengusul' => '9999988888888888-mou',
                'nik_nip_pengusul' => '5555555555555555-mou',
                'jabatan_pengusul' => 'Presiden Real Madrid C.F-mou',
                'program' => 'Pertukaran Pelajar Real Madrid-mou',
                'tanggal_mulai' => '2020-02-05',
                'tanggal_berakhir' => '2021-01-04',
                'dokumen' => 'dokumen_tidak_ada4-mou.pdf',
                'metode_pertemuan' => 'desktodesk-mou',
                'tanggal_pertemuan' => '2021-07-13',
                'waktu_pertemuan' => '09:00',
                'tempat_pertemuan' => 'Stadiun Real Madrid-mou'
            ],
        ];

        DB::table('mou')->insert($data);
    }
}
