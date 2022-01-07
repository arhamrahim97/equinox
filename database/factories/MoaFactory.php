<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MoaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $jabatan_fungsional = array('Kepala Dinas', 'Ketua', 'Pimpinan');
        $metode_pertemuan = array('Ceremonial', 'Desk to Desk');
        $tempat_pertemuan = array('Hotel Jazz', 'Best Western', 'Bukti Doda');
        $nomor_moa = array(101010, 202020, 303030, 4040404, 505050);
        $nomor_moa_pengusul = array(606060, 707070, 808080, 909090);
        $pengusul_id = array(1,2,3);
       
        $lang = 33.7490;
        $long = -84.3880;

        return [
            'users_id' => 2,
            'pengusul_id' => $pengusul_id[array_rand($pengusul_id)],
            'latitude' => $this->faker->latitude($min = ($lang - (rand(0,20) / 1000)), $max = ($lang + (rand(0,20) / 1000))),
            'longitude' => $this->faker->longitude($min = ($long - (rand(0,20) / 1000)), $max = ($long + (rand(0,20) / 1000))),
            'mou_id' => $pengusul_id[array_rand($pengusul_id)],
            'nomor_moa' => $nomor_moa[array_rand($nomor_moa)],
            'nomor_moa_pengusul' => $nomor_moa_pengusul[array_rand($nomor_moa_pengusul)],            
            'nik_nip_pengusul' => $this->faker->unique()->numerify('7###############'),
            'jabatan_pengusul' => $jabatan_fungsional[array_rand($jabatan_fungsional)],
            'program' => $this->faker->text($maxNbChars = 200) , 
            'tanggal_mulai' => '2021-12-20',
            'tanggal_berakhir' => '2022-12-20',
            'dokumen' => 'test.pdf',
            'metode_pertemuan' => $metode_pertemuan[array_rand($metode_pertemuan)],
            'tanggal_pertemuan' => '2021-12-30',
            'waktu_pertemuan' => '20:30',
            'tempat_pertemuan' => $tempat_pertemuan[array_rand($tempat_pertemuan)],     
        ];
    }
}