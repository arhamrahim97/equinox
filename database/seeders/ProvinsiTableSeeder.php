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
                'negara_id' => 102,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 =>
            array(
                'id' => 2,
                'nama' => 'SUMATERA UTARA',
                'negara_id' => 102,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 =>
            array(
                'id' => 3,
                'nama' => 'SUMATERA BARAT',
                'negara_id' => 102,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 =>
            array(
                'id' => 4,
                'nama' => 'RIAU',
                'negara_id' => 102,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 =>
            array(
                'id' => 5,
                'nama' => 'JAMBI',
                'negara_id' => 102,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 =>
            array(
                'id' => 6,
                'nama' => 'SUMATERA SELATAN',
                'negara_id' => 102,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 =>
            array(
                'id' => 7,
                'nama' => 'BENGKULU',
                'negara_id' => 102,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 =>
            array(
                'id' => 8,
                'nama' => 'LAMPUNG',
                'negara_id' => 102,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 =>
            array(
                'id' => 9,
                'nama' => 'KEPULAUAN BANGKA BELITUNG',
                'negara_id' => 102,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 =>
            array(
                'id' => 10,
                'nama' => 'KEPULAUAN RIAU',
                'negara_id' => 102,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 =>
            array(
                'id' => 11,
                'nama' => 'DKI JAKARTA',
                'negara_id' => 102,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 =>
            array(
                'id' => 12,
                'nama' => 'JAWA BARAT',
                'negara_id' => 102,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 =>
            array(
                'id' => 13,
                'nama' => 'JAWA TENGAH',
                'negara_id' => 102,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 =>
            array(
                'id' => 14,
                'nama' => 'DI YOGYAKARTA',
                'negara_id' => 102,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 =>
            array(
                'id' => 15,
                'nama' => 'JAWA TIMUR',
                'negara_id' => 102,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 =>
            array(
                'id' => 16,
                'nama' => 'BANTEN',
                'negara_id' => 102,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 =>
            array(
                'id' => 17,
                'nama' => 'BALI',
                'negara_id' => 102,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 =>
            array(
                'id' => 18,
                'nama' => 'NUSA TENGGARA BARAT',
                'negara_id' => 102,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 =>
            array(
                'id' => 19,
                'nama' => 'NUSA TENGGARA TIMUR',
                'negara_id' => 102,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 =>
            array(
                'id' => 20,
                'nama' => 'KALIMANTAN BARAT',
                'negara_id' => 102,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 =>
            array(
                'id' => 21,
                'nama' => 'KALIMANTAN TENGAH',
                'negara_id' => 102,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 =>
            array(
                'id' => 22,
                'nama' => 'KALIMANTAN SELATAN',
                'negara_id' => 102,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 =>
            array(
                'id' => 23,
                'nama' => 'KALIMANTAN TIMUR',
                'negara_id' => 102,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 =>
            array(
                'id' => 24,
                'nama' => 'KALIMANTAN UTARA',
                'negara_id' => 102,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 =>
            array(
                'id' => 25,
                'nama' => 'SULAWESI UTARA',
                'negara_id' => 102,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 =>
            array(
                'id' => 26,
                'nama' => 'SULAWESI TENGAH',
                'negara_id' => 102,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 =>
            array(
                'id' => 27,
                'nama' => 'SULAWESI SELATAN',
                'negara_id' => 102,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 =>
            array(
                'id' => 28,
                'nama' => 'SULAWESI TENGGARA',
                'negara_id' => 102,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 =>
            array(
                'id' => 29,
                'nama' => 'GORONTALO',
                'negara_id' => 102,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 =>
            array(
                'id' => 30,
                'nama' => 'SULAWESI BARAT',
                'negara_id' => 102,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 =>
            array(
                'id' => 31,
                'nama' => 'MALUKU',
                'negara_id' => 102,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 =>
            array(
                'id' => 32,
                'nama' => 'MALUKU UTARA',
                'negara_id' => 102,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 =>
            array(
                'id' => 33,
                'nama' => 'PAPUA',
                'negara_id' => 102,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 =>
            array(
                'id' => 34,
                'nama' => 'PAPUA BARAT',
                'negara_id' => 102,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
    }
}
