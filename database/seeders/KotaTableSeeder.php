<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KotaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('kota')->delete();

        DB::table('kota')->insert(array(
            0 =>
            array(
                'id' => 1,
                'nama' => 'PIDIE JAYA',
                'provinsi_id' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 =>
            array(
                'id' => 2,
                'nama' => 'SIMEULUE',
                'provinsi_id' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 =>
            array(
                'id' => 3,
                'nama' => 'BIREUEN',
                'provinsi_id' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 =>
            array(
                'id' => 4,
                'nama' => 'ACEH TIMUR',
                'provinsi_id' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 =>
            array(
                'id' => 5,
                'nama' => 'ACEH UTARA',
                'provinsi_id' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 =>
            array(
                'id' => 6,
                'nama' => 'PIDIE',
                'provinsi_id' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 =>
            array(
                'id' => 7,
                'nama' => 'ACEH BARAT DAYA',
                'provinsi_id' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 =>
            array(
                'id' => 8,
                'nama' => 'GAYO LUES',
                'provinsi_id' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 =>
            array(
                'id' => 9,
                'nama' => 'ACEH SELATAN',
                'provinsi_id' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 =>
            array(
                'id' => 10,
                'nama' => 'ACEH TAMIANG',
                'provinsi_id' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 =>
            array(
                'id' => 11,
                'nama' => 'ACEH BESAR',
                'provinsi_id' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 =>
            array(
                'id' => 12,
                'nama' => 'ACEH TENGGARA',
                'provinsi_id' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 =>
            array(
                'id' => 13,
                'nama' => 'BENER MERIAH',
                'provinsi_id' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 =>
            array(
                'id' => 14,
                'nama' => 'ACEH JAYA',
                'provinsi_id' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 =>
            array(
                'id' => 15,
                'nama' => 'LHOKSEUMAWE',
                'provinsi_id' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 =>
            array(
                'id' => 16,
                'nama' => 'ACEH BARAT',
                'provinsi_id' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 =>
            array(
                'id' => 17,
                'nama' => 'NAGAN RAYA',
                'provinsi_id' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 =>
            array(
                'id' => 18,
                'nama' => 'LANGSA',
                'provinsi_id' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 =>
            array(
                'id' => 19,
                'nama' => 'BANDA ACEH',
                'provinsi_id' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 =>
            array(
                'id' => 20,
                'nama' => 'ACEH SINGKIL',
                'provinsi_id' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 =>
            array(
                'id' => 21,
                'nama' => 'SABANG',
                'provinsi_id' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 =>
            array(
                'id' => 22,
                'nama' => 'ACEH TENGAH',
                'provinsi_id' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 =>
            array(
                'id' => 23,
                'nama' => 'SUBULUSSALAM',
                'provinsi_id' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 =>
            array(
                'id' => 24,
                'nama' => 'NIAS SELATAN',
                'provinsi_id' => 2,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 =>
            array(
                'id' => 25,
                'nama' => 'MANDAILING NATAL',
                'provinsi_id' => 2,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 =>
            array(
                'id' => 26,
                'nama' => 'DAIRI',
                'provinsi_id' => 2,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 =>
            array(
                'id' => 27,
                'nama' => 'LABUHAN BATU UTARA',
                'provinsi_id' => 2,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 =>
            array(
                'id' => 28,
                'nama' => 'TAPANULI UTARA',
                'provinsi_id' => 2,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 =>
            array(
                'id' => 29,
                'nama' => 'SIMALUNGUN',
                'provinsi_id' => 2,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 =>
            array(
                'id' => 30,
                'nama' => 'LANGKAT',
                'provinsi_id' => 2,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 =>
            array(
                'id' => 31,
                'nama' => 'SERDANG BEDAGAI',
                'provinsi_id' => 2,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 =>
            array(
                'id' => 32,
                'nama' => 'TAPANULI SELATAN',
                'provinsi_id' => 2,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 =>
            array(
                'id' => 33,
                'nama' => 'ASAHAN',
                'provinsi_id' => 2,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 =>
            array(
                'id' => 34,
                'nama' => 'PADANG LAWAS UTARA',
                'provinsi_id' => 2,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 =>
            array(
                'id' => 35,
                'nama' => 'PADANG LAWAS',
                'provinsi_id' => 2,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 =>
            array(
                'id' => 36,
                'nama' => 'LABUHAN BATU SELATAN',
                'provinsi_id' => 2,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 =>
            array(
                'id' => 37,
                'nama' => 'PADANG SIDEMPUAN',
                'provinsi_id' => 2,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 =>
            array(
                'id' => 38,
                'nama' => 'TOBA SAMOSIR',
                'provinsi_id' => 2,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 =>
            array(
                'id' => 39,
                'nama' => 'TAPANULI TENGAH',
                'provinsi_id' => 2,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 =>
            array(
                'id' => 40,
                'nama' => 'HUMBANG HASUNDUTAN',
                'provinsi_id' => 2,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 =>
            array(
                'id' => 41,
                'nama' => 'SIBOLGA',
                'provinsi_id' => 2,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 =>
            array(
                'id' => 42,
                'nama' => 'BATU BARA',
                'provinsi_id' => 2,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 =>
            array(
                'id' => 43,
                'nama' => 'SAMOSIR',
                'provinsi_id' => 2,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 =>
            array(
                'id' => 44,
                'nama' => 'PEMATANG SIANTAR',
                'provinsi_id' => 2,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 =>
            array(
                'id' => 45,
                'nama' => 'LABUHAN BATU',
                'provinsi_id' => 2,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 =>
            array(
                'id' => 46,
                'nama' => 'DELI SERDANG',
                'provinsi_id' => 2,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 =>
            array(
                'id' => 47,
                'nama' => 'GUNUNGSITOLI',
                'provinsi_id' => 2,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 =>
            array(
                'id' => 48,
                'nama' => 'NIAS UTARA',
                'provinsi_id' => 2,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 =>
            array(
                'id' => 49,
                'nama' => 'NIAS',
                'provinsi_id' => 2,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 =>
            array(
                'id' => 50,
                'nama' => 'KARO',
                'provinsi_id' => 2,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 =>
            array(
                'id' => 51,
                'nama' => 'NIAS BARAT',
                'provinsi_id' => 2,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 =>
            array(
                'id' => 52,
                'nama' => 'MEDAN',
                'provinsi_id' => 2,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 =>
            array(
                'id' => 53,
                'nama' => 'PAKPAK BHARAT',
                'provinsi_id' => 2,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 =>
            array(
                'id' => 54,
                'nama' => 'TEBING TINGGI',
                'provinsi_id' => 2,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 =>
            array(
                'id' => 55,
                'nama' => 'BINJAI',
                'provinsi_id' => 2,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 =>
            array(
                'id' => 56,
                'nama' => 'TANJUNG BALAI',
                'provinsi_id' => 2,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 =>
            array(
                'id' => 57,
                'nama' => 'DHARMASRAYA',
                'provinsi_id' => 3,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 =>
            array(
                'id' => 58,
                'nama' => 'SOLOK SELATAN',
                'provinsi_id' => 3,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 =>
            array(
                'id' => 59,
                'nama' => 'SIJUNJUNG (SAWAH LUNTO SIJUNJUNG)',
                'provinsi_id' => 3,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 =>
            array(
                'id' => 60,
                'nama' => 'PASAMAN BARAT',
                'provinsi_id' => 3,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 =>
            array(
                'id' => 61,
                'nama' => 'SOLOK',
                'provinsi_id' => 3,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 =>
            array(
                'id' => 62,
                'nama' => 'PASAMAN',
                'provinsi_id' => 3,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 =>
            array(
                'id' => 63,
                'nama' => 'PARIAMAN',
                'provinsi_id' => 3,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 =>
            array(
                'id' => 64,
                'nama' => 'TANAH DATAR',
                'provinsi_id' => 3,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 =>
            array(
                'id' => 65,
                'nama' => 'PADANG PARIAMAN',
                'provinsi_id' => 3,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 =>
            array(
                'id' => 66,
                'nama' => 'PESISIR SELATAN',
                'provinsi_id' => 3,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 =>
            array(
                'id' => 67,
                'nama' => 'PADANG',
                'provinsi_id' => 3,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 =>
            array(
                'id' => 68,
                'nama' => 'SAWAH LUNTO',
                'provinsi_id' => 3,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 =>
            array(
                'id' => 69,
                'nama' => 'LIMA PULUH KOTO / KOTA',
                'provinsi_id' => 3,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 =>
            array(
                'id' => 70,
                'nama' => 'AGAM',
                'provinsi_id' => 3,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 =>
            array(
                'id' => 71,
                'nama' => 'PAYAKUMBUH',
                'provinsi_id' => 3,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 =>
            array(
                'id' => 72,
                'nama' => 'BUKITTINGGI',
                'provinsi_id' => 3,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 =>
            array(
                'id' => 73,
                'nama' => 'PADANG PANJANG',
                'provinsi_id' => 3,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 =>
            array(
                'id' => 74,
                'nama' => 'KEPULAUAN MENTAWAI',
                'provinsi_id' => 3,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 =>
            array(
                'id' => 75,
                'nama' => 'INDRAGIRI HILIR',
                'provinsi_id' => 4,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 =>
            array(
                'id' => 76,
                'nama' => 'KUANTAN SINGINGI',
                'provinsi_id' => 4,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 =>
            array(
                'id' => 77,
                'nama' => 'PELALAWAN',
                'provinsi_id' => 4,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 =>
            array(
                'id' => 78,
                'nama' => 'PEKANBARU',
                'provinsi_id' => 4,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 =>
            array(
                'id' => 79,
                'nama' => 'ROKAN HILIR',
                'provinsi_id' => 4,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 =>
            array(
                'id' => 80,
                'nama' => 'BENGKALIS',
                'provinsi_id' => 4,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            80 =>
            array(
                'id' => 81,
                'nama' => 'INDRAGIRI HULU',
                'provinsi_id' => 4,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 =>
            array(
                'id' => 82,
                'nama' => 'ROKAN HULU',
                'provinsi_id' => 4,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 =>
            array(
                'id' => 83,
                'nama' => 'KAMPAR',
                'provinsi_id' => 4,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 =>
            array(
                'id' => 84,
                'nama' => 'KEPULAUAN MERANTI',
                'provinsi_id' => 4,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 =>
            array(
                'id' => 85,
                'nama' => 'DUMAI',
                'provinsi_id' => 4,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 =>
            array(
                'id' => 86,
                'nama' => 'SIAK',
                'provinsi_id' => 4,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            86 =>
            array(
                'id' => 87,
                'nama' => 'TEBO',
                'provinsi_id' => 5,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            87 =>
            array(
                'id' => 88,
                'nama' => 'TANJUNG JABUNG BARAT',
                'provinsi_id' => 5,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            88 =>
            array(
                'id' => 89,
                'nama' => 'MUARO JAMBI',
                'provinsi_id' => 5,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            89 =>
            array(
                'id' => 90,
                'nama' => 'KERINCI',
                'provinsi_id' => 5,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            90 =>
            array(
                'id' => 91,
                'nama' => 'MERANGIN',
                'provinsi_id' => 5,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            91 =>
            array(
                'id' => 92,
                'nama' => 'BUNGO',
                'provinsi_id' => 5,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            92 =>
            array(
                'id' => 93,
                'nama' => 'TANJUNG JABUNG TIMUR',
                'provinsi_id' => 5,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            93 =>
            array(
                'id' => 94,
                'nama' => 'SUNGAIPENUH',
                'provinsi_id' => 5,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            94 =>
            array(
                'id' => 95,
                'nama' => 'BATANG HARI',
                'provinsi_id' => 5,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            95 =>
            array(
                'id' => 96,
                'nama' => 'JAMBI',
                'provinsi_id' => 5,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            96 =>
            array(
                'id' => 97,
                'nama' => 'SAROLANGUN',
                'provinsi_id' => 5,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            97 =>
            array(
                'id' => 98,
                'nama' => 'PALEMBANG',
                'provinsi_id' => 6,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            98 =>
            array(
                'id' => 99,
                'nama' => 'LAHAT',
                'provinsi_id' => 6,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            99 =>
            array(
                'id' => 100,
                'nama' => 'OGAN KOMERING ULU TIMUR',
                'provinsi_id' => 6,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            100 =>
            array(
                'id' => 101,
                'nama' => 'MUSI BANYUASIN',
                'provinsi_id' => 6,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            101 =>
            array(
                'id' => 102,
                'nama' => 'PAGAR ALAM',
                'provinsi_id' => 6,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            102 =>
            array(
                'id' => 103,
                'nama' => 'OGAN KOMERING ULU SELATAN',
                'provinsi_id' => 6,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            103 =>
            array(
                'id' => 104,
                'nama' => 'BANYUASIN',
                'provinsi_id' => 6,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            104 =>
            array(
                'id' => 105,
                'nama' => 'MUSI RAWAS',
                'provinsi_id' => 6,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            105 =>
            array(
                'id' => 106,
                'nama' => 'MUARA ENIM',
                'provinsi_id' => 6,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            106 =>
            array(
                'id' => 107,
                'nama' => 'OGAN KOMERING ULU',
                'provinsi_id' => 6,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            107 =>
            array(
                'id' => 108,
                'nama' => 'OGAN KOMERING ILIR',
                'provinsi_id' => 6,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            108 =>
            array(
                'id' => 109,
                'nama' => 'EMPAT LAWANG',
                'provinsi_id' => 6,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            109 =>
            array(
                'id' => 110,
                'nama' => 'LUBUK LINGGAU',
                'provinsi_id' => 6,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            110 =>
            array(
                'id' => 111,
                'nama' => 'PRABUMULIH',
                'provinsi_id' => 6,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            111 =>
            array(
                'id' => 112,
                'nama' => 'OGAN ILIR',
                'provinsi_id' => 6,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            112 =>
            array(
                'id' => 113,
                'nama' => 'BENGKULU TENGAH',
                'provinsi_id' => 7,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            113 =>
            array(
                'id' => 114,
                'nama' => 'REJANG LEBONG',
                'provinsi_id' => 7,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            114 =>
            array(
                'id' => 115,
                'nama' => 'MUKO MUKO',
                'provinsi_id' => 7,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            115 =>
            array(
                'id' => 116,
                'nama' => 'KAUR',
                'provinsi_id' => 7,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            116 =>
            array(
                'id' => 117,
                'nama' => 'BENGKULU UTARA',
                'provinsi_id' => 7,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            117 =>
            array(
                'id' => 118,
                'nama' => 'LEBONG',
                'provinsi_id' => 7,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            118 =>
            array(
                'id' => 119,
                'nama' => 'KEPAHIANG',
                'provinsi_id' => 7,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            119 =>
            array(
                'id' => 120,
                'nama' => 'BENGKULU SELATAN',
                'provinsi_id' => 7,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            120 =>
            array(
                'id' => 121,
                'nama' => 'SELUMA',
                'provinsi_id' => 7,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            121 =>
            array(
                'id' => 122,
                'nama' => 'BENGKULU',
                'provinsi_id' => 7,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            122 =>
            array(
                'id' => 123,
                'nama' => 'LAMPUNG UTARA',
                'provinsi_id' => 8,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            123 =>
            array(
                'id' => 124,
                'nama' => 'WAY KANAN',
                'provinsi_id' => 8,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            124 =>
            array(
                'id' => 125,
                'nama' => 'LAMPUNG TENGAH',
                'provinsi_id' => 8,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            125 =>
            array(
                'id' => 126,
                'nama' => 'MESUJI',
                'provinsi_id' => 8,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            126 =>
            array(
                'id' => 127,
                'nama' => 'PRINGSEWU',
                'provinsi_id' => 8,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            127 =>
            array(
                'id' => 128,
                'nama' => 'LAMPUNG TIMUR',
                'provinsi_id' => 8,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            128 =>
            array(
                'id' => 129,
                'nama' => 'LAMPUNG SELATAN',
                'provinsi_id' => 8,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            129 =>
            array(
                'id' => 130,
                'nama' => 'TULANG BAWANG',
                'provinsi_id' => 8,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            130 =>
            array(
                'id' => 131,
                'nama' => 'TULANG BAWANG BARAT',
                'provinsi_id' => 8,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            131 =>
            array(
                'id' => 132,
                'nama' => 'TANGGAMUS',
                'provinsi_id' => 8,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            132 =>
            array(
                'id' => 133,
                'nama' => 'LAMPUNG BARAT',
                'provinsi_id' => 8,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            133 =>
            array(
                'id' => 134,
                'nama' => 'PESISIR BARAT',
                'provinsi_id' => 8,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            134 =>
            array(
                'id' => 135,
                'nama' => 'PESAWARAN',
                'provinsi_id' => 8,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            135 =>
            array(
                'id' => 136,
                'nama' => 'BANDAR LAMPUNG',
                'provinsi_id' => 8,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            136 =>
            array(
                'id' => 137,
                'nama' => 'METRO',
                'provinsi_id' => 8,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            137 =>
            array(
                'id' => 138,
                'nama' => 'BELITUNG',
                'provinsi_id' => 9,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            138 =>
            array(
                'id' => 139,
                'nama' => 'BELITUNG TIMUR',
                'provinsi_id' => 9,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            139 =>
            array(
                'id' => 140,
                'nama' => 'BANGKA',
                'provinsi_id' => 9,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            140 =>
            array(
                'id' => 141,
                'nama' => 'BANGKA SELATAN',
                'provinsi_id' => 9,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            141 =>
            array(
                'id' => 142,
                'nama' => 'BANGKA BARAT',
                'provinsi_id' => 9,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            142 =>
            array(
                'id' => 143,
                'nama' => 'PANGKAL PINANG',
                'provinsi_id' => 9,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            143 =>
            array(
                'id' => 144,
                'nama' => 'BANGKA TENGAH',
                'provinsi_id' => 9,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            144 =>
            array(
                'id' => 145,
                'nama' => 'KEPULAUAN ANAMBAS',
                'provinsi_id' => 10,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            145 =>
            array(
                'id' => 146,
                'nama' => 'BINTAN',
                'provinsi_id' => 10,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            146 =>
            array(
                'id' => 147,
                'nama' => 'NATUNA',
                'provinsi_id' => 10,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            147 =>
            array(
                'id' => 148,
                'nama' => 'BATAM',
                'provinsi_id' => 10,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            148 =>
            array(
                'id' => 149,
                'nama' => 'TANJUNG PINANG',
                'provinsi_id' => 10,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            149 =>
            array(
                'id' => 150,
                'nama' => 'KARIMUN',
                'provinsi_id' => 10,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            150 =>
            array(
                'id' => 151,
                'nama' => 'LINGGA',
                'provinsi_id' => 10,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            151 =>
            array(
                'id' => 152,
                'nama' => 'JAKARTA UTARA',
                'provinsi_id' => 11,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            152 =>
            array(
                'id' => 153,
                'nama' => 'JAKARTA BARAT',
                'provinsi_id' => 11,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            153 =>
            array(
                'id' => 154,
                'nama' => 'JAKARTA TIMUR',
                'provinsi_id' => 11,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            154 =>
            array(
                'id' => 155,
                'nama' => 'JAKARTA SELATAN',
                'provinsi_id' => 11,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            155 =>
            array(
                'id' => 156,
                'nama' => 'JAKARTA PUSAT',
                'provinsi_id' => 11,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            156 =>
            array(
                'id' => 157,
                'nama' => 'KEPULAUAN SERIBU',
                'provinsi_id' => 11,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            157 =>
            array(
                'id' => 158,
                'nama' => 'DEPOK',
                'provinsi_id' => 12,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            158 =>
            array(
                'id' => 159,
                'nama' => 'KARAWANG',
                'provinsi_id' => 12,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            159 =>
            array(
                'id' => 160,
                'nama' => 'CIREBON',
                'provinsi_id' => 12,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            160 =>
            array(
                'id' => 161,
                'nama' => 'BANDUNG',
                'provinsi_id' => 12,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            161 =>
            array(
                'id' => 162,
                'nama' => 'SUKABUMI',
                'provinsi_id' => 12,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            162 =>
            array(
                'id' => 163,
                'nama' => 'SUMEDANG',
                'provinsi_id' => 12,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            163 =>
            array(
                'id' => 164,
                'nama' => 'INDRAMAYU',
                'provinsi_id' => 12,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            164 =>
            array(
                'id' => 165,
                'nama' => 'MAJALENGKA',
                'provinsi_id' => 12,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            165 =>
            array(
                'id' => 166,
                'nama' => 'KUNINGAN',
                'provinsi_id' => 12,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            166 =>
            array(
                'id' => 167,
                'nama' => 'TASIKMALAYA',
                'provinsi_id' => 12,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            167 =>
            array(
                'id' => 168,
                'nama' => 'CIAMIS',
                'provinsi_id' => 12,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            168 =>
            array(
                'id' => 169,
                'nama' => 'SUBANG',
                'provinsi_id' => 12,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            169 =>
            array(
                'id' => 170,
                'nama' => 'PURWAKARTA',
                'provinsi_id' => 12,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            170 =>
            array(
                'id' => 171,
                'nama' => 'BOGOR',
                'provinsi_id' => 12,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            171 =>
            array(
                'id' => 172,
                'nama' => 'BEKASI',
                'provinsi_id' => 12,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            172 =>
            array(
                'id' => 173,
                'nama' => 'GARUT',
                'provinsi_id' => 12,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            173 =>
            array(
                'id' => 174,
                'nama' => 'PANGANDARAN',
                'provinsi_id' => 12,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            174 =>
            array(
                'id' => 175,
                'nama' => 'CIANJUR',
                'provinsi_id' => 12,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            175 =>
            array(
                'id' => 176,
                'nama' => 'BANJAR',
                'provinsi_id' => 12,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            176 =>
            array(
                'id' => 177,
                'nama' => 'BANDUNG BARAT',
                'provinsi_id' => 12,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            177 =>
            array(
                'id' => 178,
                'nama' => 'CIMAHI',
                'provinsi_id' => 12,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            178 =>
            array(
                'id' => 179,
                'nama' => 'PURBALINGGA',
                'provinsi_id' => 13,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            179 =>
            array(
                'id' => 180,
                'nama' => 'KEBUMEN',
                'provinsi_id' => 13,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            180 =>
            array(
                'id' => 181,
                'nama' => 'MAGELANG',
                'provinsi_id' => 13,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            181 =>
            array(
                'id' => 182,
                'nama' => 'CILACAP',
                'provinsi_id' => 13,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            182 =>
            array(
                'id' => 183,
                'nama' => 'BATANG',
                'provinsi_id' => 13,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            183 =>
            array(
                'id' => 184,
                'nama' => 'BANJARNEGARA',
                'provinsi_id' => 13,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            184 =>
            array(
                'id' => 185,
                'nama' => 'BLORA',
                'provinsi_id' => 13,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            185 =>
            array(
                'id' => 186,
                'nama' => 'BREBES',
                'provinsi_id' => 13,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            186 =>
            array(
                'id' => 187,
                'nama' => 'BANYUMAS',
                'provinsi_id' => 13,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            187 =>
            array(
                'id' => 188,
                'nama' => 'WONOSOBO',
                'provinsi_id' => 13,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            188 =>
            array(
                'id' => 189,
                'nama' => 'TEGAL',
                'provinsi_id' => 13,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            189 =>
            array(
                'id' => 190,
                'nama' => 'PURWOREJO',
                'provinsi_id' => 13,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            190 =>
            array(
                'id' => 191,
                'nama' => 'PATI',
                'provinsi_id' => 13,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            191 =>
            array(
                'id' => 192,
                'nama' => 'SUKOHARJO',
                'provinsi_id' => 13,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            192 =>
            array(
                'id' => 193,
                'nama' => 'KARANGANYAR',
                'provinsi_id' => 13,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            193 =>
            array(
                'id' => 194,
                'nama' => 'PEKALONGAN',
                'provinsi_id' => 13,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            194 =>
            array(
                'id' => 195,
                'nama' => 'PEMALANG',
                'provinsi_id' => 13,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            195 =>
            array(
                'id' => 196,
                'nama' => 'BOYOLALI',
                'provinsi_id' => 13,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            196 =>
            array(
                'id' => 197,
                'nama' => 'GROBOGAN',
                'provinsi_id' => 13,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            197 =>
            array(
                'id' => 198,
                'nama' => 'SEMARANG',
                'provinsi_id' => 13,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            198 =>
            array(
                'id' => 199,
                'nama' => 'DEMAK',
                'provinsi_id' => 13,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            199 =>
            array(
                'id' => 200,
                'nama' => 'REMBANG',
                'provinsi_id' => 13,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            200 =>
            array(
                'id' => 201,
                'nama' => 'KLATEN',
                'provinsi_id' => 13,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            201 =>
            array(
                'id' => 202,
                'nama' => 'KUDUS',
                'provinsi_id' => 13,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            202 =>
            array(
                'id' => 203,
                'nama' => 'TEMANGGUNG',
                'provinsi_id' => 13,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            203 =>
            array(
                'id' => 204,
                'nama' => 'SRAGEN',
                'provinsi_id' => 13,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            204 =>
            array(
                'id' => 205,
                'nama' => 'JEPARA',
                'provinsi_id' => 13,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            205 =>
            array(
                'id' => 206,
                'nama' => 'WONOGIRI',
                'provinsi_id' => 13,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            206 =>
            array(
                'id' => 207,
                'nama' => 'KENDAL',
                'provinsi_id' => 13,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            207 =>
            array(
                'id' => 208,
                'nama' => 'SURAKARTA (SOLO)',
                'provinsi_id' => 13,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            208 =>
            array(
                'id' => 209,
                'nama' => 'SALATIGA',
                'provinsi_id' => 13,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            209 =>
            array(
                'id' => 210,
                'nama' => 'SLEMAN',
                'provinsi_id' => 14,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            210 =>
            array(
                'id' => 211,
                'nama' => 'BANTUL',
                'provinsi_id' => 14,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            211 =>
            array(
                'id' => 212,
                'nama' => 'YOGYAKARTA',
                'provinsi_id' => 14,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            212 =>
            array(
                'id' => 213,
                'nama' => 'GUNUNG KIDUL',
                'provinsi_id' => 14,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            213 =>
            array(
                'id' => 214,
                'nama' => 'KULON PROGO',
                'provinsi_id' => 14,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            214 =>
            array(
                'id' => 215,
                'nama' => 'GRESIK',
                'provinsi_id' => 15,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            215 =>
            array(
                'id' => 216,
                'nama' => 'KEDIRI',
                'provinsi_id' => 15,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            216 =>
            array(
                'id' => 217,
                'nama' => 'SAMPANG',
                'provinsi_id' => 15,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            217 =>
            array(
                'id' => 218,
                'nama' => 'BANGKALAN',
                'provinsi_id' => 15,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            218 =>
            array(
                'id' => 219,
                'nama' => 'SUMENEP',
                'provinsi_id' => 15,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            219 =>
            array(
                'id' => 220,
                'nama' => 'SITUBONDO',
                'provinsi_id' => 15,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            220 =>
            array(
                'id' => 221,
                'nama' => 'SURABAYA',
                'provinsi_id' => 15,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            221 =>
            array(
                'id' => 222,
                'nama' => 'JEMBER',
                'provinsi_id' => 15,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            222 =>
            array(
                'id' => 223,
                'nama' => 'PAMEKASAN',
                'provinsi_id' => 15,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            223 =>
            array(
                'id' => 224,
                'nama' => 'JOMBANG',
                'provinsi_id' => 15,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            224 =>
            array(
                'id' => 225,
                'nama' => 'PROBOLINGGO',
                'provinsi_id' => 15,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            225 =>
            array(
                'id' => 226,
                'nama' => 'BANYUWANGI',
                'provinsi_id' => 15,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            226 =>
            array(
                'id' => 227,
                'nama' => 'PASURUAN',
                'provinsi_id' => 15,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            227 =>
            array(
                'id' => 228,
                'nama' => 'BOJONEGORO',
                'provinsi_id' => 15,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            228 =>
            array(
                'id' => 229,
                'nama' => 'BONDOWOSO',
                'provinsi_id' => 15,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            229 =>
            array(
                'id' => 230,
                'nama' => 'MAGETAN',
                'provinsi_id' => 15,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            230 =>
            array(
                'id' => 231,
                'nama' => 'LUMAJANG',
                'provinsi_id' => 15,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            231 =>
            array(
                'id' => 232,
                'nama' => 'MALANG',
                'provinsi_id' => 15,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            232 =>
            array(
                'id' => 233,
                'nama' => 'BLITAR',
                'provinsi_id' => 15,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            233 =>
            array(
                'id' => 234,
                'nama' => 'SIDOARJO',
                'provinsi_id' => 15,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            234 =>
            array(
                'id' => 235,
                'nama' => 'LAMONGAN',
                'provinsi_id' => 15,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            235 =>
            array(
                'id' => 236,
                'nama' => 'PACITAN',
                'provinsi_id' => 15,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            236 =>
            array(
                'id' => 237,
                'nama' => 'TULUNGAGUNG',
                'provinsi_id' => 15,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            237 =>
            array(
                'id' => 238,
                'nama' => 'MOJOKERTO',
                'provinsi_id' => 15,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            238 =>
            array(
                'id' => 239,
                'nama' => 'MADIUN',
                'provinsi_id' => 15,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            239 =>
            array(
                'id' => 240,
                'nama' => 'PONOROGO',
                'provinsi_id' => 15,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            240 =>
            array(
                'id' => 241,
                'nama' => 'NGAWI',
                'provinsi_id' => 15,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            241 =>
            array(
                'id' => 242,
                'nama' => 'NGANJUK',
                'provinsi_id' => 15,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            242 =>
            array(
                'id' => 243,
                'nama' => 'TUBAN',
                'provinsi_id' => 15,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            243 =>
            array(
                'id' => 244,
                'nama' => 'TRENGGALEK',
                'provinsi_id' => 15,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            244 =>
            array(
                'id' => 245,
                'nama' => 'BATU',
                'provinsi_id' => 15,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            245 =>
            array(
                'id' => 246,
                'nama' => 'TANGERANG',
                'provinsi_id' => 16,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            246 =>
            array(
                'id' => 247,
                'nama' => 'SERANG',
                'provinsi_id' => 16,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            247 =>
            array(
                'id' => 248,
                'nama' => 'PANDEGLANG',
                'provinsi_id' => 16,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            248 =>
            array(
                'id' => 249,
                'nama' => 'LEBAK',
                'provinsi_id' => 16,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            249 =>
            array(
                'id' => 250,
                'nama' => 'TANGERANG SELATAN',
                'provinsi_id' => 16,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            250 =>
            array(
                'id' => 251,
                'nama' => 'CILEGON',
                'provinsi_id' => 16,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            251 =>
            array(
                'id' => 252,
                'nama' => 'KLUNGKUNG',
                'provinsi_id' => 17,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            252 =>
            array(
                'id' => 253,
                'nama' => 'KARANGASEM',
                'provinsi_id' => 17,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            253 =>
            array(
                'id' => 254,
                'nama' => 'BANGLI',
                'provinsi_id' => 17,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            254 =>
            array(
                'id' => 255,
                'nama' => 'TABANAN',
                'provinsi_id' => 17,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            255 =>
            array(
                'id' => 256,
                'nama' => 'GIANYAR',
                'provinsi_id' => 17,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            256 =>
            array(
                'id' => 257,
                'nama' => 'BADUNG',
                'provinsi_id' => 17,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            257 =>
            array(
                'id' => 258,
                'nama' => 'JEMBRANA',
                'provinsi_id' => 17,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            258 =>
            array(
                'id' => 259,
                'nama' => 'BULELENG',
                'provinsi_id' => 17,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            259 =>
            array(
                'id' => 260,
                'nama' => 'DENPASAR',
                'provinsi_id' => 17,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            260 =>
            array(
                'id' => 261,
                'nama' => 'MATARAM',
                'provinsi_id' => 18,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            261 =>
            array(
                'id' => 262,
                'nama' => 'DOMPU',
                'provinsi_id' => 18,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            262 =>
            array(
                'id' => 263,
                'nama' => 'SUMBAWA BARAT',
                'provinsi_id' => 18,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            263 =>
            array(
                'id' => 264,
                'nama' => 'SUMBAWA',
                'provinsi_id' => 18,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            264 =>
            array(
                'id' => 265,
                'nama' => 'LOMBOK TENGAH',
                'provinsi_id' => 18,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            265 =>
            array(
                'id' => 266,
                'nama' => 'LOMBOK TIMUR',
                'provinsi_id' => 18,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            266 =>
            array(
                'id' => 267,
                'nama' => 'LOMBOK UTARA',
                'provinsi_id' => 18,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            267 =>
            array(
                'id' => 268,
                'nama' => 'LOMBOK BARAT',
                'provinsi_id' => 18,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            268 =>
            array(
                'id' => 269,
                'nama' => 'BIMA',
                'provinsi_id' => 18,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            269 =>
            array(
                'id' => 270,
                'nama' => 'TIMOR TENGAH SELATAN',
                'provinsi_id' => 19,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            270 =>
            array(
                'id' => 271,
                'nama' => 'FLORES TIMUR',
                'provinsi_id' => 19,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            271 =>
            array(
                'id' => 272,
                'nama' => 'ALOR',
                'provinsi_id' => 19,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            272 =>
            array(
                'id' => 273,
                'nama' => 'ENDE',
                'provinsi_id' => 19,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            273 =>
            array(
                'id' => 274,
                'nama' => 'NAGEKEO',
                'provinsi_id' => 19,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            274 =>
            array(
                'id' => 275,
                'nama' => 'KUPANG',
                'provinsi_id' => 19,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            275 =>
            array(
                'id' => 276,
                'nama' => 'SIKKA',
                'provinsi_id' => 19,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            276 =>
            array(
                'id' => 277,
                'nama' => 'NGADA',
                'provinsi_id' => 19,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            277 =>
            array(
                'id' => 278,
                'nama' => 'TIMOR TENGAH UTARA',
                'provinsi_id' => 19,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            278 =>
            array(
                'id' => 279,
                'nama' => 'BELU',
                'provinsi_id' => 19,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            279 =>
            array(
                'id' => 280,
                'nama' => 'LEMBATA',
                'provinsi_id' => 19,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            280 =>
            array(
                'id' => 281,
                'nama' => 'SUMBA BARAT DAYA',
                'provinsi_id' => 19,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            281 =>
            array(
                'id' => 282,
                'nama' => 'SUMBA BARAT',
                'provinsi_id' => 19,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            282 =>
            array(
                'id' => 283,
                'nama' => 'SUMBA TENGAH',
                'provinsi_id' => 19,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            283 =>
            array(
                'id' => 284,
                'nama' => 'SUMBA TIMUR',
                'provinsi_id' => 19,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            284 =>
            array(
                'id' => 285,
                'nama' => 'ROTE NDAO',
                'provinsi_id' => 19,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            285 =>
            array(
                'id' => 286,
                'nama' => 'MANGGARAI TIMUR',
                'provinsi_id' => 19,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            286 =>
            array(
                'id' => 287,
                'nama' => 'MANGGARAI',
                'provinsi_id' => 19,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            287 =>
            array(
                'id' => 288,
                'nama' => 'SABU RAIJUA',
                'provinsi_id' => 19,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            288 =>
            array(
                'id' => 289,
                'nama' => 'MANGGARAI BARAT',
                'provinsi_id' => 19,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            289 =>
            array(
                'id' => 290,
                'nama' => 'LANDAK',
                'provinsi_id' => 20,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            290 =>
            array(
                'id' => 291,
                'nama' => 'KETAPANG',
                'provinsi_id' => 20,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            291 =>
            array(
                'id' => 292,
                'nama' => 'SINTANG',
                'provinsi_id' => 20,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            292 =>
            array(
                'id' => 293,
                'nama' => 'KUBU RAYA',
                'provinsi_id' => 20,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            293 =>
            array(
                'id' => 294,
                'nama' => 'PONTIANAK',
                'provinsi_id' => 20,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            294 =>
            array(
                'id' => 295,
                'nama' => 'KAYONG UTARA',
                'provinsi_id' => 20,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            295 =>
            array(
                'id' => 296,
                'nama' => 'BENGKAYANG',
                'provinsi_id' => 20,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            296 =>
            array(
                'id' => 297,
                'nama' => 'KAPUAS HULU',
                'provinsi_id' => 20,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            297 =>
            array(
                'id' => 298,
                'nama' => 'SAMBAS',
                'provinsi_id' => 20,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            298 =>
            array(
                'id' => 299,
                'nama' => 'SINGKAWANG',
                'provinsi_id' => 20,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            299 =>
            array(
                'id' => 300,
                'nama' => 'SANGGAU',
                'provinsi_id' => 20,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            300 =>
            array(
                'id' => 301,
                'nama' => 'MELAWI',
                'provinsi_id' => 20,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            301 =>
            array(
                'id' => 302,
                'nama' => 'SEKADAU',
                'provinsi_id' => 20,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            302 =>
            array(
                'id' => 303,
                'nama' => 'KOTAWARINGIN TIMUR',
                'provinsi_id' => 21,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            303 =>
            array(
                'id' => 304,
                'nama' => 'SUKAMARA',
                'provinsi_id' => 21,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            304 =>
            array(
                'id' => 305,
                'nama' => 'KOTAWARINGIN BARAT',
                'provinsi_id' => 21,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            305 =>
            array(
                'id' => 306,
                'nama' => 'BARITO TIMUR',
                'provinsi_id' => 21,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            306 =>
            array(
                'id' => 307,
                'nama' => 'KAPUAS',
                'provinsi_id' => 21,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            307 =>
            array(
                'id' => 308,
                'nama' => 'PULANG PISAU',
                'provinsi_id' => 21,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            308 =>
            array(
                'id' => 309,
                'nama' => 'LAMANDAU',
                'provinsi_id' => 21,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            309 =>
            array(
                'id' => 310,
                'nama' => 'SERUYAN',
                'provinsi_id' => 21,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            310 =>
            array(
                'id' => 311,
                'nama' => 'KATINGAN',
                'provinsi_id' => 21,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            311 =>
            array(
                'id' => 312,
                'nama' => 'BARITO SELATAN',
                'provinsi_id' => 21,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            312 =>
            array(
                'id' => 313,
                'nama' => 'MURUNG RAYA',
                'provinsi_id' => 21,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            313 =>
            array(
                'id' => 314,
                'nama' => 'BARITO UTARA',
                'provinsi_id' => 21,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            314 =>
            array(
                'id' => 315,
                'nama' => 'GUNUNG MAS',
                'provinsi_id' => 21,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            315 =>
            array(
                'id' => 316,
                'nama' => 'PALANGKA RAYA',
                'provinsi_id' => 21,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            316 =>
            array(
                'id' => 317,
                'nama' => 'TAPIN',
                'provinsi_id' => 22,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            317 =>
            array(
                'id' => 318,
                'nama' => 'BANJAR',
                'provinsi_id' => 22,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            318 =>
            array(
                'id' => 319,
                'nama' => 'HULU SUNGAI TENGAH',
                'provinsi_id' => 22,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            319 =>
            array(
                'id' => 320,
                'nama' => 'TABALONG',
                'provinsi_id' => 22,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            320 =>
            array(
                'id' => 321,
                'nama' => 'HULU SUNGAI UTARA',
                'provinsi_id' => 22,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            321 =>
            array(
                'id' => 322,
                'nama' => 'BALANGAN',
                'provinsi_id' => 22,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            322 =>
            array(
                'id' => 323,
                'nama' => 'TANAH BUMBU',
                'provinsi_id' => 22,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            323 =>
            array(
                'id' => 324,
                'nama' => 'BANJARMASIN',
                'provinsi_id' => 22,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            324 =>
            array(
                'id' => 325,
                'nama' => 'KOTABARU',
                'provinsi_id' => 22,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            325 =>
            array(
                'id' => 326,
                'nama' => 'TANAH LAUT',
                'provinsi_id' => 22,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            326 =>
            array(
                'id' => 327,
                'nama' => 'HULU SUNGAI SELATAN',
                'provinsi_id' => 22,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            327 =>
            array(
                'id' => 328,
                'nama' => 'BARITO KUALA',
                'provinsi_id' => 22,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            328 =>
            array(
                'id' => 329,
                'nama' => 'BANJARBARU',
                'provinsi_id' => 22,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            329 =>
            array(
                'id' => 330,
                'nama' => 'KUTAI BARAT',
                'provinsi_id' => 23,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            330 =>
            array(
                'id' => 331,
                'nama' => 'SAMARINDA',
                'provinsi_id' => 23,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            331 =>
            array(
                'id' => 332,
                'nama' => 'PASER',
                'provinsi_id' => 23,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            332 =>
            array(
                'id' => 333,
                'nama' => 'KUTAI KARTANEGARA',
                'provinsi_id' => 23,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            333 =>
            array(
                'id' => 334,
                'nama' => 'BERAU',
                'provinsi_id' => 23,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            334 =>
            array(
                'id' => 335,
                'nama' => 'PENAJAM PASER UTARA',
                'provinsi_id' => 23,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            335 =>
            array(
                'id' => 336,
                'nama' => 'BONTANG',
                'provinsi_id' => 23,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            336 =>
            array(
                'id' => 337,
                'nama' => 'KUTAI TIMUR',
                'provinsi_id' => 23,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            337 =>
            array(
                'id' => 338,
                'nama' => 'BALIKPAPAN',
                'provinsi_id' => 23,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            338 =>
            array(
                'id' => 339,
                'nama' => 'MALINAU',
                'provinsi_id' => 24,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            339 =>
            array(
                'id' => 340,
                'nama' => 'NUNUKAN',
                'provinsi_id' => 24,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            340 =>
            array(
                'id' => 341,
                'nama' => 'BULUNGAN (BULONGAN)',
                'provinsi_id' => 24,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            341 =>
            array(
                'id' => 342,
                'nama' => 'TANA TIDUNG',
                'provinsi_id' => 24,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            342 =>
            array(
                'id' => 343,
                'nama' => 'TARAKAN',
                'provinsi_id' => 24,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            343 =>
            array(
                'id' => 344,
                'nama' => 'BOLAANG MONGONDOW (BOLMONG)',
                'provinsi_id' => 25,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            344 =>
            array(
                'id' => 345,
                'nama' => 'BOLAANG MONGONDOW SELATAN',
                'provinsi_id' => 25,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            345 =>
            array(
                'id' => 346,
                'nama' => 'MINAHASA SELATAN',
                'provinsi_id' => 25,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            346 =>
            array(
                'id' => 347,
                'nama' => 'BITUNG',
                'provinsi_id' => 25,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            347 =>
            array(
                'id' => 348,
                'nama' => 'MINAHASA',
                'provinsi_id' => 25,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            348 =>
            array(
                'id' => 349,
                'nama' => 'KEPULAUAN SANGIHE',
                'provinsi_id' => 25,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            349 =>
            array(
                'id' => 350,
                'nama' => 'MINAHASA UTARA',
                'provinsi_id' => 25,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            350 =>
            array(
                'id' => 351,
                'nama' => 'KEPULAUAN TALAUD',
                'provinsi_id' => 25,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            351 =>
            array(
                'id' => 352,
                'nama' => 'KEPULAUAN SIAU TAGULANDANG BIARO (SITARO)',
                'provinsi_id' => 25,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            352 =>
            array(
                'id' => 353,
                'nama' => 'MANADO',
                'provinsi_id' => 25,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            353 =>
            array(
                'id' => 354,
                'nama' => 'BOLAANG MONGONDOW UTARA',
                'provinsi_id' => 25,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            354 =>
            array(
                'id' => 355,
                'nama' => 'BOLAANG MONGONDOW TIMUR',
                'provinsi_id' => 25,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            355 =>
            array(
                'id' => 356,
                'nama' => 'MINAHASA TENGGARA',
                'provinsi_id' => 25,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            356 =>
            array(
                'id' => 357,
                'nama' => 'KOTAMOBAGU',
                'provinsi_id' => 25,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            357 =>
            array(
                'id' => 358,
                'nama' => 'TOMOHON',
                'provinsi_id' => 25,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            358 =>
            array(
                'id' => 359,
                'nama' => 'BANGGAI KEPULAUAN',
                'provinsi_id' => 26,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            359 =>
            array(
                'id' => 360,
                'nama' => 'TOLI-TOLI',
                'provinsi_id' => 26,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            360 =>
            array(
                'id' => 361,
                'nama' => 'PARIGI MOUTONG',
                'provinsi_id' => 26,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            361 =>
            array(
                'id' => 362,
                'nama' => 'BUOL',
                'provinsi_id' => 26,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            362 =>
            array(
                'id' => 363,
                'nama' => 'DONGGALA',
                'provinsi_id' => 26,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            363 =>
            array(
                'id' => 364,
                'nama' => 'POSO',
                'provinsi_id' => 26,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            364 =>
            array(
                'id' => 365,
                'nama' => 'MOROWALI',
                'provinsi_id' => 26,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            365 =>
            array(
                'id' => 366,
                'nama' => 'TOJO UNA-UNA',
                'provinsi_id' => 26,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            366 =>
            array(
                'id' => 367,
                'nama' => 'BANGGAI',
                'provinsi_id' => 26,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            367 =>
            array(
                'id' => 368,
                'nama' => 'SIGI',
                'provinsi_id' => 26,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            368 =>
            array(
                'id' => 369,
                'nama' => 'PALU',
                'provinsi_id' => 26,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            369 =>
            array(
                'id' => 370,
                'nama' => 'MAROS',
                'provinsi_id' => 27,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            370 =>
            array(
                'id' => 371,
                'nama' => 'WAJO',
                'provinsi_id' => 27,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            371 =>
            array(
                'id' => 372,
                'nama' => 'BONE',
                'provinsi_id' => 27,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            372 =>
            array(
                'id' => 373,
                'nama' => 'SOPPENG',
                'provinsi_id' => 27,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            373 =>
            array(
                'id' => 374,
                'nama' => 'SIDENRENG RAPPANG / RAPANG',
                'provinsi_id' => 27,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            374 =>
            array(
                'id' => 375,
                'nama' => 'TAKALAR',
                'provinsi_id' => 27,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            375 =>
            array(
                'id' => 376,
                'nama' => 'BARRU',
                'provinsi_id' => 27,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            376 =>
            array(
                'id' => 377,
                'nama' => 'LUWU TIMUR',
                'provinsi_id' => 27,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            377 =>
            array(
                'id' => 378,
                'nama' => 'SINJAI',
                'provinsi_id' => 27,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            378 =>
            array(
                'id' => 379,
                'nama' => 'PANGKAJENE KEPULAUAN',
                'provinsi_id' => 27,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            379 =>
            array(
                'id' => 380,
                'nama' => 'PINRANG',
                'provinsi_id' => 27,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            380 =>
            array(
                'id' => 381,
                'nama' => 'JENEPONTO',
                'provinsi_id' => 27,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            381 =>
            array(
                'id' => 382,
                'nama' => 'PALOPO',
                'provinsi_id' => 27,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            382 =>
            array(
                'id' => 383,
                'nama' => 'TORAJA UTARA',
                'provinsi_id' => 27,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            383 =>
            array(
                'id' => 384,
                'nama' => 'LUWU',
                'provinsi_id' => 27,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            384 =>
            array(
                'id' => 385,
                'nama' => 'BULUKUMBA',
                'provinsi_id' => 27,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            385 =>
            array(
                'id' => 386,
                'nama' => 'MAKASSAR',
                'provinsi_id' => 27,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            386 =>
            array(
                'id' => 387,
                'nama' => 'SELAYAR (KEPULAUAN SELAYAR)',
                'provinsi_id' => 27,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            387 =>
            array(
                'id' => 388,
                'nama' => 'TANA TORAJA',
                'provinsi_id' => 27,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            388 =>
            array(
                'id' => 389,
                'nama' => 'LUWU UTARA',
                'provinsi_id' => 27,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            389 =>
            array(
                'id' => 390,
                'nama' => 'BANTAENG',
                'provinsi_id' => 27,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            390 =>
            array(
                'id' => 391,
                'nama' => 'GOWA',
                'provinsi_id' => 27,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            391 =>
            array(
                'id' => 392,
                'nama' => 'ENREKANG',
                'provinsi_id' => 27,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            392 =>
            array(
                'id' => 393,
                'nama' => 'PAREPARE',
                'provinsi_id' => 27,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            393 =>
            array(
                'id' => 394,
                'nama' => 'KOLAKA',
                'provinsi_id' => 28,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            394 =>
            array(
                'id' => 395,
                'nama' => 'MUNA',
                'provinsi_id' => 28,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            395 =>
            array(
                'id' => 396,
                'nama' => 'KONAWE SELATAN',
                'provinsi_id' => 28,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            396 =>
            array(
                'id' => 397,
                'nama' => 'KENDARI',
                'provinsi_id' => 28,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            397 =>
            array(
                'id' => 398,
                'nama' => 'KONAWE',
                'provinsi_id' => 28,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            398 =>
            array(
                'id' => 399,
                'nama' => 'KONAWE UTARA',
                'provinsi_id' => 28,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            399 =>
            array(
                'id' => 400,
                'nama' => 'KOLAKA UTARA',
                'provinsi_id' => 28,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            400 =>
            array(
                'id' => 401,
                'nama' => 'BUTON',
                'provinsi_id' => 28,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            401 =>
            array(
                'id' => 402,
                'nama' => 'BOMBANA',
                'provinsi_id' => 28,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            402 =>
            array(
                'id' => 403,
                'nama' => 'WAKATOBI',
                'provinsi_id' => 28,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            403 =>
            array(
                'id' => 404,
                'nama' => 'BAU-BAU',
                'provinsi_id' => 28,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            404 =>
            array(
                'id' => 405,
                'nama' => 'BUTON UTARA',
                'provinsi_id' => 28,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            405 =>
            array(
                'id' => 406,
                'nama' => 'GORONTALO UTARA',
                'provinsi_id' => 29,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            406 =>
            array(
                'id' => 407,
                'nama' => 'BONE BOLANGO',
                'provinsi_id' => 29,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            407 =>
            array(
                'id' => 408,
                'nama' => 'GORONTALO',
                'provinsi_id' => 29,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            408 =>
            array(
                'id' => 409,
                'nama' => 'BOALEMO',
                'provinsi_id' => 29,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            409 =>
            array(
                'id' => 410,
                'nama' => 'POHUWATO',
                'provinsi_id' => 29,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            410 =>
            array(
                'id' => 411,
                'nama' => 'MAJENE',
                'provinsi_id' => 30,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            411 =>
            array(
                'id' => 412,
                'nama' => 'MAMUJU',
                'provinsi_id' => 30,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            412 =>
            array(
                'id' => 413,
                'nama' => 'MAMUJU UTARA',
                'provinsi_id' => 30,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            413 =>
            array(
                'id' => 414,
                'nama' => 'POLEWALI MANDAR',
                'provinsi_id' => 30,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            414 =>
            array(
                'id' => 415,
                'nama' => 'MAMASA',
                'provinsi_id' => 30,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            415 =>
            array(
                'id' => 416,
                'nama' => 'MALUKU TENGGARA BARAT',
                'provinsi_id' => 31,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            416 =>
            array(
                'id' => 417,
                'nama' => 'MALUKU TENGGARA',
                'provinsi_id' => 31,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            417 =>
            array(
                'id' => 418,
                'nama' => 'SERAM BAGIAN BARAT',
                'provinsi_id' => 31,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            418 =>
            array(
                'id' => 419,
                'nama' => 'MALUKU TENGAH',
                'provinsi_id' => 31,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            419 =>
            array(
                'id' => 420,
                'nama' => 'SERAM BAGIAN TIMUR',
                'provinsi_id' => 31,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            420 =>
            array(
                'id' => 421,
                'nama' => 'MALUKU BARAT DAYA',
                'provinsi_id' => 31,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            421 =>
            array(
                'id' => 422,
                'nama' => 'AMBON',
                'provinsi_id' => 31,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            422 =>
            array(
                'id' => 423,
                'nama' => 'BURU',
                'provinsi_id' => 31,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            423 =>
            array(
                'id' => 424,
                'nama' => 'BURU SELATAN',
                'provinsi_id' => 31,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            424 =>
            array(
                'id' => 425,
                'nama' => 'KEPULAUAN ARU',
                'provinsi_id' => 31,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            425 =>
            array(
                'id' => 426,
                'nama' => 'TUAL',
                'provinsi_id' => 31,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            426 =>
            array(
                'id' => 427,
                'nama' => 'HALMAHERA BARAT',
                'provinsi_id' => 32,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            427 =>
            array(
                'id' => 428,
                'nama' => 'TIDORE KEPULAUAN',
                'provinsi_id' => 32,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            428 =>
            array(
                'id' => 429,
                'nama' => 'TERNATE',
                'provinsi_id' => 32,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            429 =>
            array(
                'id' => 430,
                'nama' => 'PULAU MOROTAI',
                'provinsi_id' => 32,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            430 =>
            array(
                'id' => 431,
                'nama' => 'KEPULAUAN SULA',
                'provinsi_id' => 32,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            431 =>
            array(
                'id' => 432,
                'nama' => 'HALMAHERA SELATAN',
                'provinsi_id' => 32,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            432 =>
            array(
                'id' => 433,
                'nama' => 'HALMAHERA TENGAH',
                'provinsi_id' => 32,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            433 =>
            array(
                'id' => 434,
                'nama' => 'HALMAHERA TIMUR',
                'provinsi_id' => 32,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            434 =>
            array(
                'id' => 435,
                'nama' => 'HALMAHERA UTARA',
                'provinsi_id' => 32,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            435 =>
            array(
                'id' => 436,
                'nama' => 'YALIMO',
                'provinsi_id' => 33,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            436 =>
            array(
                'id' => 437,
                'nama' => 'DOGIYAI',
                'provinsi_id' => 33,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            437 =>
            array(
                'id' => 438,
                'nama' => 'ASMAT',
                'provinsi_id' => 33,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            438 =>
            array(
                'id' => 439,
                'nama' => 'JAYAPURA',
                'provinsi_id' => 33,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            439 =>
            array(
                'id' => 440,
                'nama' => 'PANIAI',
                'provinsi_id' => 33,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            440 =>
            array(
                'id' => 441,
                'nama' => 'MAPPI',
                'provinsi_id' => 33,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            441 =>
            array(
                'id' => 442,
                'nama' => 'TOLIKARA',
                'provinsi_id' => 33,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            442 =>
            array(
                'id' => 443,
                'nama' => 'PUNCAK JAYA',
                'provinsi_id' => 33,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            443 =>
            array(
                'id' => 444,
                'nama' => 'PEGUNUNGAN BINTANG',
                'provinsi_id' => 33,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            444 =>
            array(
                'id' => 445,
                'nama' => 'JAYAWIJAYA',
                'provinsi_id' => 33,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            445 =>
            array(
                'id' => 446,
                'nama' => 'LANNY JAYA',
                'provinsi_id' => 33,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            446 =>
            array(
                'id' => 447,
                'nama' => 'NDUGA',
                'provinsi_id' => 33,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            447 =>
            array(
                'id' => 448,
                'nama' => 'BIAK NUMFOR',
                'provinsi_id' => 33,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            448 =>
            array(
                'id' => 449,
                'nama' => 'KEPULAUAN YAPEN (YAPEN WAROPEN)',
                'provinsi_id' => 33,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            449 =>
            array(
                'id' => 450,
                'nama' => 'PUNCAK',
                'provinsi_id' => 33,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            450 =>
            array(
                'id' => 451,
                'nama' => 'INTAN JAYA',
                'provinsi_id' => 33,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            451 =>
            array(
                'id' => 452,
                'nama' => 'WAROPEN',
                'provinsi_id' => 33,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            452 =>
            array(
                'id' => 453,
                'nama' => 'NABIRE',
                'provinsi_id' => 33,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            453 =>
            array(
                'id' => 454,
                'nama' => 'MIMIKA',
                'provinsi_id' => 33,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            454 =>
            array(
                'id' => 455,
                'nama' => 'BOVEN DIGOEL',
                'provinsi_id' => 33,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            455 =>
            array(
                'id' => 456,
                'nama' => 'YAHUKIMO',
                'provinsi_id' => 33,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            456 =>
            array(
                'id' => 457,
                'nama' => 'SARMI',
                'provinsi_id' => 33,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            457 =>
            array(
                'id' => 458,
                'nama' => 'MERAUKE',
                'provinsi_id' => 33,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            458 =>
            array(
                'id' => 459,
                'nama' => 'DEIYAI (DELIYAI)',
                'provinsi_id' => 33,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            459 =>
            array(
                'id' => 460,
                'nama' => 'KEEROM',
                'provinsi_id' => 33,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            460 =>
            array(
                'id' => 461,
                'nama' => 'SUPIORI',
                'provinsi_id' => 33,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            461 =>
            array(
                'id' => 462,
                'nama' => 'MAMBERAMO RAYA',
                'provinsi_id' => 33,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            462 =>
            array(
                'id' => 463,
                'nama' => 'MAMBERAMO TENGAH',
                'provinsi_id' => 33,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            463 =>
            array(
                'id' => 464,
                'nama' => 'RAJA AMPAT',
                'provinsi_id' => 34,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            464 =>
            array(
                'id' => 465,
                'nama' => 'MANOKWARI SELATAN',
                'provinsi_id' => 34,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            465 =>
            array(
                'id' => 466,
                'nama' => 'MANOKWARI',
                'provinsi_id' => 34,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            466 =>
            array(
                'id' => 467,
                'nama' => 'KAIMANA',
                'provinsi_id' => 34,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            467 =>
            array(
                'id' => 468,
                'nama' => 'MAYBRAT',
                'provinsi_id' => 34,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            468 =>
            array(
                'id' => 469,
                'nama' => 'SORONG SELATAN',
                'provinsi_id' => 34,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            469 =>
            array(
                'id' => 470,
                'nama' => 'FAKFAK',
                'provinsi_id' => 34,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            470 =>
            array(
                'id' => 471,
                'nama' => 'PEGUNUNGAN ARFAK',
                'provinsi_id' => 34,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            471 =>
            array(
                'id' => 472,
                'nama' => 'TAMBRAUW',
                'provinsi_id' => 34,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            472 =>
            array(
                'id' => 473,
                'nama' => 'SORONG',
                'provinsi_id' => 34,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            473 =>
            array(
                'id' => 474,
                'nama' => 'TELUK WONDAMA',
                'provinsi_id' => 34,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            474 =>
            array(
                'id' => 475,
                'nama' => 'TELUK BINTUNI',
                'provinsi_id' => 34,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
    }
}
