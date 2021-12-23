<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengusulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // REGION : Africa, America, Asia, Europe, Oceania, Polar
        // ID NEGARA INDONESIA : 102
        // ID SULAWESI TENGAH : 26
        // ID PALU : 369
        $data = [
            [
                'nama' => 'RSUD Undata Palu',
                'alamat' => 'Jl. Trans Sulawesi, Talise, Mantikulore, Kota Palu, Sulawesi Tengah',
                'region' => 'Asia',
                'negara_id' => 102,
                'provinsi_id' => 26,
                'kota_id' => 369,
                'kecamatan_id' => 5453,
                'kelurahan_id' => 65845,
                'latitude' => '-0.857844',
                'longitude' => '119.881858',
                'telepon' => '082195155175'
            ],
            [
                'nama' => 'Universitas Tadulako',
                'alamat' => 'Jl. Soekarno Hatta No.KM. 9, Tondo, Mantikulore, Kota Palu, Sulawesi Tengah 94148',
                'region' => 'Asia',
                'negara_id' => 102,
                'provinsi_id' => 26,
                'kota_id' => 369,
                'kecamatan_id' => 5453,
                'kelurahan_id' => 65845,
                'latitude' => '-0.8364322',
                'longitude' => '119.891505',
                'telepon' => '(0451) 422611'
            ],
            [
                'nama' => 'Real Madrid C.F',
                'alamat' => 'Avda. de Concha Espina 1,28036; Madrid - España',
                'region' => 'Europe',
                'negara_id' => 207,
                'provinsi_id' => 'Madrid',
                'kota_id' => 'Espana',
                'kecamatan_id' => 'Avda. de Concha Espina 1',
                'kelurahan_id' => '-',
                'latitude' => '40.4530387',
                'longitude' => '-3.6905224',
                'telepon' => '(0451) 422611'
            ]
        ];

        DB::table('pengusul')->insert($data);
    }
}
