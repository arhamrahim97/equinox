<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinsiTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        DB::table('provinsi')->delete();

        DB::table('provinsi')->insert(array(
            0 =>
            array(
                'id' => 1,
                'nama' => 'ACEH',
            ),
            1 =>
            array(
                'id' => 2,
                'nama' => 'SUMATERA UTARA',
            ),
            2 =>
            array(
                'id' => 3,
                'nama' => 'SUMATERA BARAT',
            ),
            3 =>
            array(
                'id' => 4,
                'nama' => 'RIAU',
            ),
            4 =>
            array(
                'id' => 5,
                'nama' => 'JAMBI',
            ),
            5 =>
            array(
                'id' => 6,
                'nama' => 'SUMATERA SELATAN',
            ),
            6 =>
            array(
                'id' => 7,
                'nama' => 'BENGKULU',
            ),
            7 =>
            array(
                'id' => 8,
                'nama' => 'LAMPUNG',
            ),
            8 =>
            array(
                'id' => 9,
                'nama' => 'KEPULAUAN BANGKA BELITUNG',
            ),
            9 =>
            array(
                'id' => 10,
                'nama' => 'KEPULAUAN RIAU',
            ),
            10 =>
            array(
                'id' => 11,
                'nama' => 'DKI JAKARTA',
            ),
            11 =>
            array(
                'id' => 12,
                'nama' => 'JAWA BARAT',
            ),
            12 =>
            array(
                'id' => 13,
                'nama' => 'JAWA TENGAH',
            ),
            13 =>
            array(
                'id' => 14,
                'nama' => 'DI YOGYAKARTA',
            ),
            14 =>
            array(
                'id' => 15,
                'nama' => 'JAWA TIMUR',
            ),
            15 =>
            array(
                'id' => 16,
                'nama' => 'BANTEN',
            ),
            16 =>
            array(
                'id' => 17,
                'nama' => 'BALI',
            ),
            17 =>
            array(
                'id' => 18,
                'nama' => 'NUSA TENGGARA BARAT',
            ),
            18 =>
            array(
                'id' => 19,
                'nama' => 'NUSA TENGGARA TIMUR',
            ),
            19 =>
            array(
                'id' => 20,
                'nama' => 'KALIMANTAN BARAT',
            ),
            20 =>
            array(
                'id' => 21,
                'nama' => 'KALIMANTAN TENGAH',
            ),
            21 =>
            array(
                'id' => 22,
                'nama' => 'KALIMANTAN SELATAN',
            ),
            22 =>
            array(
                'id' => 23,
                'nama' => 'KALIMANTAN TIMUR',
            ),
            23 =>
            array(
                'id' => 24,
                'nama' => 'KALIMANTAN UTARA',
            ),
            24 =>
            array(
                'id' => 25,
                'nama' => 'SULAWESI UTARA',
            ),
            25 =>
            array(
                'id' => 26,
                'nama' => 'SULAWESI TENGAH',
            ),
            26 =>
            array(
                'id' => 27,
                'nama' => 'SULAWESI SELATAN',
            ),
            27 =>
            array(
                'id' => 28,
                'nama' => 'SULAWESI TENGGARA',
            ),
            28 =>
            array(
                'id' => 29,
                'nama' => 'GORONTALO',
            ),
            29 =>
            array(
                'id' => 30,
                'nama' => 'SULAWESI BARAT',
            ),
            30 =>
            array(
                'id' => 31,
                'nama' => 'MALUKU',
            ),
            31 =>
            array(
                'id' => 32,
                'nama' => 'MALUKU UTARA',
            ),
            32 =>
            array(
                'id' => 33,
                'nama' => 'PAPUA',
            ),
            33 =>
            array(
                'id' => 34,
                'nama' => 'PAPUA BARAT',
            ),
        ));
    }
}
