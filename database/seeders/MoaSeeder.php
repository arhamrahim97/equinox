<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoaSeeder extends Seeder
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
                'users_id' => 2,
                'pengusul_id' => 5,
                'latitude' => '-0.857844',
                'longitude' => '119.881858',
                'mou_id' => '1',
                'nomor_moa' => '1111122222-moa',
                'nomor_moa_pengusul' => '1111144444-moa',
                'nik_nip_pengusul' => '1213213123213123123-moa',
                'jabatan_pengusul' => 'Rektor-moa',
                'program' => 'Penyuluhan Pabrik Tesla-moa',
                'tanggal_mulai' => '2021-08-16',
                'tanggal_berakhir' => '2021-10-16',
                'dokumen' => 'dokumen_tidak_ada1-moa.pdf',
                'metode_pertemuan' => 'desktodesk-moa',
                'tanggal_pertemuan' => '2021-07-15',
                'waktu_pertemuan' => '21:00',
                'tempat_pertemuan' => 'Cafe Mahasiswa-moa',
                'created_at' => '2022-02-02 07:18:42'
            ],
            [
                'users_id' => 2,
                'pengusul_id' => 6,
                'latitude' => '-0.8364322',
                'longitude' => '119.891505',
                'mou_id' => '2',
                'nomor_moa' => '212121313131-moa',
                'nomor_moa_pengusul' => '21212141414141-moa',
                'nik_nip_pengusul' => '999888888888888888-moa',
                'jabatan_pengusul' => 'Kepala Dinas-moa',
                'program' => 'Kerjasama IKM',
                'tanggal_mulai' => '2021-12-21',
                'tanggal_berakhir' => '2022-03-10',
                'dokumen' => 'dokumen_tidak_ada2-moa.pdf',
                'metode_pertemuan' => 'desktodesk-moa',
                'tanggal_pertemuan' => '2022-01-21',
                'waktu_pertemuan' => '17:00',
                'tempat_pertemuan' => 'JCO PGM-moa',
                'created_at' => '2022-01-28 07:18:42'

            ],
            [
                'users_id' => 2,
                'pengusul_id' => 7,
                'latitude' => '-0.893251',
                'longitude' => '119.886419',
                'mou_id' => '3',
                'nomor_moa' => '666666777777-moa',
                'nomor_moa_pengusul' => '666666888888-moa',
                'nik_nip_pengusul' => '677777777777-moa',
                'jabatan_pengusul' => 'Sekretaris Bawaslu-moa',
                'program' => 'Kerjasama Pengawasan Pemilu-moa',
                'tanggal_mulai' => '2021-12-21',
                'tanggal_berakhir' => '2022-08-02',
                'dokumen' => 'dokumen_tidak_ada-moa.pdf',
                'metode_pertemuan' => 'Ceremonial',
                'tanggal_pertemuan' => '2022-01-21',
                'waktu_pertemuan' => '17:00',
                'tempat_pertemuan' => 'Cafe BNS-moa',
                'created_at' => '2021-12-01 07:18:42'                
            ],           
            [
                'users_id' => 8,
                'pengusul_id' => 7,
                'latitude' => '-0.893251',
                'longitude' => '119.886419',
                'mou_id' => '3',
                'nomor_moa' => '6666667777778888-moa',
                'nomor_moa_pengusul' => '6666668888889999-moa',
                'nik_nip_pengusul' => '677777777777-moa',
                'jabatan_pengusul' => 'Sekretaris Bawaslu-moa',
                'program' => 'Testing',
                'tanggal_mulai' => '2021-12-21',
                'tanggal_berakhir' => '2021-08-16',
                'dokumen' => 'dokumen_tidak_ada-moa.pdf',
                'metode_pertemuan' => 'Ceremonial',
                'tanggal_pertemuan' => '2022-01-21',
                'waktu_pertemuan' => '17:00',
                'tempat_pertemuan' => 'Cafe BNS-moa',
                'created_at' => '2022-01-16 07:18:42'                

            ],     
            [
                'users_id' => 5,
                'pengusul_id' => 7,
                'latitude' => '-0.893251',
                'longitude' => '119.886419',
                'mou_id' => '3',
                'nomor_moa' => '66666677777788880000-moa',
                'nomor_moa_pengusul' => '66666688888899990000-moa',
                'nik_nip_pengusul' => '677777777777-moa',
                'jabatan_pengusul' => 'Sekretaris Bawaslu-moa',
                'program' => 'Testing2',
                'tanggal_mulai' => '2021-12-21',
                'tanggal_berakhir' => '2022-04-06',
                'dokumen' => 'dokumen_tidak_ada-moa.pdf',
                'metode_pertemuan' => 'Ceremonial',
                'tanggal_pertemuan' => '2022-01-21',
                'waktu_pertemuan' => '17:00',
                'tempat_pertemuan' => 'Cafe BNS-moa',
                'created_at' => '2021-10-16 07:18:42'                

            ],           
        ];

        DB::table('moa')->insert($data);
    }
}