<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class IaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ia')->delete();
        
        \DB::table('ia')->insert(array (
            0 => 
            array (
                'created_at' => '2021-08-16 07:18:42',
                'deleted_at' => NULL,
                'dokumen' => 'dokumen_tidak_ada-ia.pdf',
                'id' => 1,
                'jabatan_pengusul' => 'Rektor-ia',
                'laporan_hasil_pelaksanaan' => 'lpj_tidak_ada-ia.pdf',
                'latitude' => '-0.857844',
                'longitude' => '119.881858',
                'manfaat' => 'Menjalin Kerjasama1',
                'metode_pertemuan' => 'Desk to Desk',
                'moa_id' => 1,
                'nik_nip_pengusul' => '1213213123213123123',
                'nilai_uang' => 50000000,
                'nomor_ia' => '11111222223333333-ia',
                'nomor_ia_pengusul' => '1111144444555555-ia',
                'pejabat_penandatangan' => 'Kadita',
                'pengusul_id' => 4,
                'program' => 'Peresmian Pabrik Tesla-ia',
                'surat_tugas' => 'dokumen_surat_tugas_tidak_ada-ia.pdf',
                'tanggal_berakhir' => '2022-01-16',
                'tanggal_mulai' => '2021-08-16',
                'tanggal_pertemuan' => '2021-07-15',
                'tempat_pertemuan' => 'Darisa-ia',
                'updated_at' => '2022-10-30 07:12:39',
                'users_id' => 9,
                'waktu_pertemuan' => '21:00:00',
            ),
            1 => 
            array (
                'created_at' => '2021-12-21 07:18:42',
                'deleted_at' => NULL,
                'dokumen' => 'dokumen_tidak_ada-ia.pdf',
                'id' => 2,
                'jabatan_pengusul' => 'Kepala Dinas-ia',
                'laporan_hasil_pelaksanaan' => NULL,
                'latitude' => '-0.8364322',
                'longitude' => '119.891505',
                'manfaat' => 'Menjalin Kerjasama2',
                'metode_pertemuan' => 'Desk to Desk',
                'moa_id' => 2,
                'nik_nip_pengusul' => '999888888888888888-ia',
                'nilai_uang' => 10000000,
                'nomor_ia' => '212121313131414141-ia',
                'nomor_ia_pengusul' => 'ia-212121414141416161616-ia',
                'pejabat_penandatangan' => 'Bruno',
                'pengusul_id' => 4,
                'program' => 'Pelaksanaan IKM-ia',
                'surat_tugas' => '',
                'tanggal_berakhir' => '2022-11-01',
                'tanggal_mulai' => '2021-12-21',
                'tanggal_pertemuan' => '2022-11-21',
                'tempat_pertemuan' => 'Anjungan-ia',
                'updated_at' => NULL,
                'users_id' => 9,
                'waktu_pertemuan' => '17:00:00',
            ),
            2 => 
            array (
                'created_at' => '2021-11-11 07:18:42',
                'deleted_at' => NULL,
                'dokumen' => 'dokumen_tidak_ada-ia.pdf',
                'id' => 3,
                'jabatan_pengusul' => 'Sekretaris Bawaslu-ia',
                'laporan_hasil_pelaksanaan' => 'IA LAPORAN HASIL PELAKSANAAN - Bawaslu Provinsi Sulawesi Tengah - 202210301554.pdf',
                'latitude' => '-0.893251',
                'longitude' => '119.886419',
                'manfaat' => 'Menjalin Kerjasama3',
                'metode_pertemuan' => 'Ceremonial',
                'moa_id' => 3,
                'nik_nip_pengusul' => '677777777777',
                'nilai_uang' => 5000000,
                'nomor_ia' => '666666777777888888-ia',
                'nomor_ia_pengusul' => '666666888899999-ia',
                'pejabat_penandatangan' => 'Natan',
                'pengusul_id' => 7,
                'program' => 'Pelaksaan Pengawasan Pemilu-ia',
                'surat_tugas' => 'IA SURAT TUGAS - Bawaslu Provinsi Sulawesi Tengah - 202210301514.pdf',
                'tanggal_berakhir' => '2022-02-27',
                'tanggal_mulai' => '2021-11-11',
                'tanggal_pertemuan' => '2022-01-21',
                'tempat_pertemuan' => 'Hutan Kota-ia',
                'updated_at' => '2022-10-30 15:26:54',
                'users_id' => 2,
                'waktu_pertemuan' => '17:00:00',
            ),
            3 => 
            array (
                'created_at' => '2021-10-18 07:18:42',
                'deleted_at' => NULL,
                'dokumen' => 'dokumen_tidak_ada-ia.pdf',
                'id' => 4,
                'jabatan_pengusul' => 'Sekretaris Bawaslu-ia',
                'laporan_hasil_pelaksanaan' => '',
                'latitude' => '-0.891618',
                'longitude' => '119.8517753',
                'manfaat' => 'Menjalin Kerjasama4',
                'metode_pertemuan' => 'Ceremonial',
                'moa_id' => 1,
                'nik_nip_pengusul' => '677777777777-ia',
                'nilai_uang' => 800000,
                'nomor_ia' => '666666777777888888000000-ia',
                'nomor_ia_pengusul' => '666666888899999000000-ia',
                'pejabat_penandatangan' => 'Chou',
                'pengusul_id' => 7,
                'program' => 'Testing-fakultas',
                'surat_tugas' => 'dokumen_surat_tugas_tidak_ada',
                'tanggal_berakhir' => '2022-03-15',
                'tanggal_mulai' => '2021-10-18',
                'tanggal_pertemuan' => '2022-01-21',
                'tempat_pertemuan' => 'Kos-ia',
                'updated_at' => NULL,
                'users_id' => 6,
                'waktu_pertemuan' => '17:00:00',
            ),
            4 => 
            array (
                'created_at' => '2021-12-14 07:18:42',
                'deleted_at' => NULL,
                'dokumen' => 'dokumen_tidak_ada-ia.pdf',
                'id' => 5,
                'jabatan_pengusul' => 'Sekretaris Bawaslu-ia',
                'laporan_hasil_pelaksanaan' => '',
                'latitude' => '-0.886793',
                'longitude' => '119.8594253',
                'manfaat' => 'Menjalin Kerjasama5',
                'metode_pertemuan' => 'Ceremonial',
                'moa_id' => 1,
                'nik_nip_pengusul' => '677777777777-ia',
                'nilai_uang' => 800000,
                'nomor_ia' => '666666777777888888111111-ia',
                'nomor_ia_pengusul' => '666666888899999111111-ia',
                'pejabat_penandatangan' => 'Layla',
                'pengusul_id' => 5,
                'program' => 'Testing-prodi',
                'surat_tugas' => 'dokumen_surat_tugas_tidak_ada',
                'tanggal_berakhir' => '2022-04-04',
                'tanggal_mulai' => '2021-12-14',
                'tanggal_pertemuan' => '2022-01-21',
                'tempat_pertemuan' => 'Kos-ia',
                'updated_at' => NULL,
                'users_id' => 47,
                'waktu_pertemuan' => '17:00:00',
            ),
        ));
        
        
    }
}