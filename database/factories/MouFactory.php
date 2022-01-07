<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MouFactory extends Factory
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
       
        $lang = 33.7490;
        $long = -84.3880;

        return [
            'users_id' => 1,
            'pengusul_id' => $this->faker->unique()->numberBetween(1, 3),
            'latitude' => $this->faker->latitude($min = ($lang - (rand(0,20) / 1000)), $max = ($lang + (rand(0,20) / 1000))),
            'longitude' => $this->faker->longitude($min = ($long - (rand(0,20) / 1000)), $max = ($long + (rand(0,20) / 1000))),
            'nomor_mou' => $this->faker->numberBetween(100000, 500000),
            'nomor_mou_pengusul' => $this->faker->numberBetween(100000, 500000),
            'nik_nip_pengusul' => $this->faker->unique()->numerify('8###############'),
            'jabatan_pengusul' => $jabatan_fungsional[array_rand($jabatan_fungsional)],
            'program' => $this->faker->text($maxNbChars = 200) , 
            'tanggal_mulai' => '2021-12-20',
            'tanggal_berakhir' => '2022-12-20',
            'dokumen' => 'test.pdf',
            'metode_pertemuan' => $metode_pertemuan[array_rand($metode_pertemuan)],
            'tanggal_pertemuan' => '2021-12-30',
            'waktu_pertemuan' => '21:30',
            'tempat_pertemuan' => $tempat_pertemuan[array_rand($tempat_pertemuan)],     
        ];
    }
}