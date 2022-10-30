<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MoaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('moa')->delete();
        
        \DB::table('moa')->insert(array (
            0 => 
            array (
                'created_at' => '2022-02-02 07:18:42',
                'deleted_at' => NULL,
                'dokumen' => 'dokumen_tidak_ada1-moa.pdf',
                'id' => 1,
                'jabatan_pengusul' => 'Rektor-moa',
                'latitude' => '-0.857844',
                'longitude' => '119.881858',
                'metode_pertemuan' => 'desktodesk-moa',
                'mou_id' => 1,
                'nik_nip_pengusul' => '1213213123213123123-moa',
                'nomor_moa' => '1111122222-moa',
                'nomor_moa_pengusul' => '1111144444-moa',
                'pejabat_penandatangan' => 'Louyi',
                'pengusul_id' => 4,
                'program' => 'Penyuluhan Pabrik Tesla-moa',
                'tanggal_berakhir' => '2023-10-16',
                'tanggal_mulai' => '2021-08-16',
                'tanggal_pertemuan' => '2021-07-15',
                'tempat_pertemuan' => 'Cafe Mahasiswa-moa',
                'updated_at' => NULL,
                'users_id' => 9,
                'waktu_pertemuan' => '21:00:00',
            ),
            1 => 
            array (
                'created_at' => '2022-01-28 07:18:42',
                'deleted_at' => NULL,
                'dokumen' => 'dokumen_tidak_ada2-moa.pdf',
                'id' => 2,
                'jabatan_pengusul' => 'Kepala Dinas-moa',
                'latitude' => '-0.8364322',
                'longitude' => '119.891505',
                'metode_pertemuan' => 'desktodesk-moa',
                'mou_id' => 2,
                'nik_nip_pengusul' => '999888888888888888-moa',
                'nomor_moa' => '212121313131-moa',
                'nomor_moa_pengusul' => '21212141414141-moa',
                'pejabat_penandatangan' => 'Badang',
                'pengusul_id' => 4,
                'program' => 'Kerjasama IKM',
                'tanggal_berakhir' => '2022-12-10',
                'tanggal_mulai' => '2021-12-21',
                'tanggal_pertemuan' => '2022-01-21',
                'tempat_pertemuan' => 'JCO PGM-moa',
                'updated_at' => NULL,
                'users_id' => 9,
                'waktu_pertemuan' => '17:00:00',
            ),
            2 => 
            array (
                'created_at' => '2021-12-01 07:18:42',
                'deleted_at' => NULL,
                'dokumen' => 'dokumen_tidak_ada-moa.pdf',
                'id' => 3,
                'jabatan_pengusul' => 'Sekretaris Bawaslu-moa',
                'latitude' => '-0.893251',
                'longitude' => '119.886419',
                'metode_pertemuan' => 'Ceremonial',
                'mou_id' => 3,
                'nik_nip_pengusul' => '677777777777-moa',
                'nomor_moa' => '666666777777-moa',
                'nomor_moa_pengusul' => '666666888888-moa',
                'pejabat_penandatangan' => 'Dyroth',
                'pengusul_id' => 7,
                'program' => 'Kerjasama Pengawasan Pemilu-moa',
                'tanggal_berakhir' => '2022-01-02',
                'tanggal_mulai' => '2021-12-21',
                'tanggal_pertemuan' => '2022-01-21',
                'tempat_pertemuan' => 'Cafe BNS-moa',
                'updated_at' => NULL,
                'users_id' => 9,
                'waktu_pertemuan' => '17:00:00',
            ),
            3 => 
            array (
                'created_at' => '2022-01-16 07:18:42',
                'deleted_at' => NULL,
                'dokumen' => 'dokumen_tidak_ada-moa.pdf',
                'id' => 4,
                'jabatan_pengusul' => 'Sekretaris Bawaslu-moa',
                'latitude' => '-0.893251',
                'longitude' => '119.886419',
                'metode_pertemuan' => 'Ceremonial',
                'mou_id' => 3,
                'nik_nip_pengusul' => '677777777777-moa',
                'nomor_moa' => '6666667777778888-moa',
                'nomor_moa_pengusul' => '6666668888889999-moa',
                'pejabat_penandatangan' => 'Hayabusa',
                'pengusul_id' => 7,
                'program' => 'Testing',
                'tanggal_berakhir' => '2024-08-16',
                'tanggal_mulai' => '2021-12-21',
                'tanggal_pertemuan' => '2022-01-21',
                'tempat_pertemuan' => 'Cafe BNS-moa',
                'updated_at' => NULL,
                'users_id' => 6,
                'waktu_pertemuan' => '17:00:00',
            ),
            4 => 
            array (
                'created_at' => '2021-10-16 07:18:42',
                'deleted_at' => NULL,
                'dokumen' => 'dokumen_tidak_ada-moa.pdf',
                'id' => 5,
                'jabatan_pengusul' => 'Sekretaris Bawaslu-moa',
                'latitude' => '-0.893251',
                'longitude' => '119.886419',
                'metode_pertemuan' => 'Ceremonial',
                'mou_id' => 3,
                'nik_nip_pengusul' => '677777777777-moa',
                'nomor_moa' => '66666677777788880000-moa',
                'nomor_moa_pengusul' => '66666688888899990000-moa',
                'pejabat_penandatangan' => 'Roger',
                'pengusul_id' => 7,
                'program' => 'Testing2',
                'tanggal_berakhir' => '2023-04-30',
                'tanggal_mulai' => '2021-12-21',
                'tanggal_pertemuan' => '2022-01-21',
                'tempat_pertemuan' => 'Cafe BNS-moa',
                'updated_at' => NULL,
                'users_id' => 2,
                'waktu_pertemuan' => '17:00:00',
            ),
            5 => 
            array (
                'created_at' => '2021-10-19 07:18:42',
                'deleted_at' => NULL,
                'dokumen' => 'dokumen_tidak_ada-moa.pdf',
                'id' => 6,
                'jabatan_pengusul' => 'Sekretaris Bawaslu-moa',
                'latitude' => '-0.893251',
                'longitude' => '119.886419',
                'metode_pertemuan' => 'Ceremonial',
                'mou_id' => 3,
                'nik_nip_pengusul' => '677777777777-moa',
                'nomor_moa' => '666666777777-moa-testing',
                'nomor_moa_pengusul' => '6666668888889-moatesting',
                'pejabat_penandatangan' => 'Tigreal',
                'pengusul_id' => 7,
                'program' => 'Testing3',
                'tanggal_berakhir' => '2022-04-06',
                'tanggal_mulai' => '2021-12-21',
                'tanggal_pertemuan' => '2022-01-21',
                'tempat_pertemuan' => 'Cafe Bro',
                'updated_at' => NULL,
                'users_id' => 7,
                'waktu_pertemuan' => '17:00:00',
            ),
        ));
        
        
    }
}