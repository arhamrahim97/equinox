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
                'nama' => 'Kantor Kelurahan Tondo',
                'alamat' => 'Jl. Padat Karya, Tondo, Mantikulore, Kota Palu, Sulawesi Tengah 94148',
                'region' => 'Asia',
                'negara_id' => 102,
                'provinsi_id' => 26,
                'kota_id' => 369,
                'kecamatan_id' => 5453,
                'kelurahan_id' => 65845,
                'latitude' => '-0.848937437882',
                'longitude' => '119.88367080688',
                'telepon' => '082195155175'
            ],
            [
                'nama' => 'Kantor Kelurahan Besusu Timur',
                'alamat' => 'Jl. Urip Sumoharjo, Besusu Tim., Kec. Palu Tim., Kota Palu, Sulawesi Tengah 94118',
                'region' => 'Asia',
                'negara_id' => 102,
                'provinsi_id' => 26,
                'kota_id' => 369,
                'kecamatan_id' => 5453,
                'kelurahan_id' => 65845,
                'latitude' => '-0.890131423145',
                'longitude' => '119.86616134643',
                'telepon' => '082195155175'
            ],
            [
                'nama' => 'Kantor Kelurahan Ujuna',
                'alamat' => 'Jl. S. Kinore, Ujuna, Kec. Palu Bar., Kota Palu, Sulawesi Tengah 94222',
                'region' => 'Asia',
                'negara_id' => 102,
                'provinsi_id' => 26,
                'kota_id' => 369,
                'kecamatan_id' => 5453,
                'kelurahan_id' => 65845,
                'latitude' => '-0.895967201005',
                'longitude' => '119.85517501831',
                'telepon' => '082195155175'
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
            ],

            // MOA & IA
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
                'nama' => 'Dinas Perdagangan dan Perindustrian',
                'alamat' => 'Jl. S. Parman No.48, Besusu Tengah, Kec.  ., Kota Palu, Sulawesi Tengah 94118',
                'region' => 'Asia',
                'negara_id' => 102,
                'provinsi_id' => 26,
                'kota_id' => 369,
                'kecamatan_id' => 5453,
                'kelurahan_id' => 65845,
                'latitude' => '-0.894250796714',
                'longitude' => '119.86993789672',
                'telepon' => '(0451) 422611'
            ],
            [
                'nama' => 'Bawaslu Provinsi Sulawesi Tengah',
                'alamat' => 'Jl. S. Parman No.48, Besusu Tengah, Kec. Palu Tim., Kota Palu, Sulawesi Tengah 94118',
                'region' => 'Asia',
                'negara_id' => 102,
                'provinsi_id' => 26,
                'kota_id' => 369,
                'kecamatan_id' => 5453,
                'kelurahan_id' => 65845,
                'latitude' => '-0.894250796714',
                'longitude' => '119.86993789672',
                'telepon' => '(0451) 422611'
            ],


        ];

        DB::table('pengusul')->insert($data);
    }
}