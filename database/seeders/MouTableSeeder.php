<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MouTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('mou')->delete();
        
        \DB::table('mou')->insert(array (
            0 => 
            array (
                'created_at' => '2022-01-12 18:18:42',
                'deleted_at' => NULL,
                'dokumen' => 'dokumen_tidak_ada1-mou.pdf',
                'id' => 1,
                'jabatan_pengusul' => 'Kepala Dinas-mou',
                'latitude' => '-0.857844',
                'longitude' => '119.881858',
                'metode_pertemuan' => 'desktodesk-mou',
                'nik_nip_pengusul' => '1213213123213123123-mou',
                'nomor_mou' => '111111111-mou',
                'nomor_mou_pengusul' => '222222222-mou',
                'pejabat_penandatangan' => 'Alucard',
                'pengusul_id' => 1,
                'program' => 'Pengadaan Server SIAKAD UNTAD-mou',
                'tanggal_berakhir' => '2021-07-15',
                'tanggal_mulai' => '2021-08-16',
                'tanggal_pertemuan' => '2021-07-15',
                'tempat_pertemuan' => 'Cafe Nintendo-mou',
                'updated_at' => NULL,
                'users_id' => 1,
                'waktu_pertemuan' => '21:00:00',
            ),
            1 => 
            array (
                'created_at' => '2022-01-21 07:18:42',
                'deleted_at' => NULL,
                'dokumen' => 'dokumen_tidak_ada2-mou.pdf',
                'id' => 2,
                'jabatan_pengusul' => 'Kepala Imigrasi-mou',
                'latitude' => '-0.8364322',
                'longitude' => '119.891505',
                'metode_pertemuan' => 'desktodesk-mou',
                'nik_nip_pengusul' => '999888888888888888-mou',
                'nomor_mou' => '2121212121-mou',
                'nomor_mou_pengusul' => '4444444444-mou',
                'pejabat_penandatangan' => 'Eudora',
                'pengusul_id' => 2,
                'program' => 'Kerjasama Antar Dinas di Besusu Timur-mou',
                'tanggal_berakhir' => '2023-01-21',
                'tanggal_mulai' => '2021-12-21',
                'tanggal_pertemuan' => '2022-01-21',
                'tempat_pertemuan' => 'Kantor Imigrasi-mou',
                'updated_at' => NULL,
                'users_id' => 1,
                'waktu_pertemuan' => '17:00:00',
            ),
            2 => 
            array (
                'created_at' => '2022-01-27 07:18:42',
                'deleted_at' => NULL,
                'dokumen' => 'dokumen_tidak_ada3-mou.pdf',
                'id' => 3,
                'jabatan_pengusul' => 'CEO Libra Komputer-mou',
                'latitude' => '-0.893251',
                'longitude' => '119.886419',
                'metode_pertemuan' => 'desktodesk-mou',
                'nik_nip_pengusul' => '677777777777-mou',
                'nomor_mou' => '666666666666-mou',
                'nomor_mou_pengusul' => '33333333333333-mou',
                'pejabat_penandatangan' => 'Miya',
                'pengusul_id' => 3,
                'program' => 'Pembangunan Server Nintendo-mou',
                'tanggal_berakhir' => '2024-10-29',
                'tanggal_mulai' => '2021-12-21',
                'tanggal_pertemuan' => '2022-01-21',
                'tempat_pertemuan' => 'UPT TIK UNTAD-mou',
                'updated_at' => NULL,
                'users_id' => 1,
                'waktu_pertemuan' => '17:00:00',
            ),
            3 => 
            array (
                'created_at' => '2022-01-25 07:18:42',
                'deleted_at' => NULL,
                'dokumen' => 'dokumen_tidak_ada4-mou.pdf',
                'id' => 4,
                'jabatan_pengusul' => 'Presiden Real Madrid C.F-mou',
                'latitude' => '40.4530387',
                'longitude' => '-3.6905224',
                'metode_pertemuan' => 'desktodesk-mou',
                'nik_nip_pengusul' => '5555555555555555-mou',
                'nomor_mou' => '777777777777777-mou',
                'nomor_mou_pengusul' => '9999988888888888-mou',
                'pejabat_penandatangan' => 'Lesley',
                'pengusul_id' => 4,
                'program' => 'Pertukaran Pelajar Real Madrid-mou',
                'tanggal_berakhir' => '2024-07-13',
                'tanggal_mulai' => '2020-02-05',
                'tanggal_pertemuan' => '2021-07-13',
                'tempat_pertemuan' => 'Stadiun Real Madrid-mou',
                'updated_at' => NULL,
                'users_id' => 1,
                'waktu_pertemuan' => '09:00:00',
            ),
            4 => 
            array (
                'created_at' => '2022-01-25 07:18:42',
                'deleted_at' => NULL,
                'dokumen' => 'dokumen_tidak_ada4-mou.pdf',
                'id' => 5,
                'jabatan_pengusul' => 'Presiden Real Madrid C.F-mou',
                'latitude' => '40.4530387',
                'longitude' => '-3.6905224',
                'metode_pertemuan' => 'desktodesk-mou',
                'nik_nip_pengusul' => '5555555555555555-mou',
                'nomor_mou' => '777777777777777testing-mou',
                'nomor_mou_pengusul' => '9999988888888888tetsing-mou',
                'pejabat_penandatangan' => 'Pharsa',
                'pengusul_id' => 4,
                'program' => 'Testing Admin Baru',
                'tanggal_berakhir' => '2023-07-13',
                'tanggal_mulai' => '2020-02-05',
                'tanggal_pertemuan' => '2021-07-13',
                'tempat_pertemuan' => 'Stadiun Real Madrid-mou',
                'updated_at' => NULL,
                'users_id' => 1,
                'waktu_pertemuan' => '09:00:00',
            ),
        ));
        
        
    }
}