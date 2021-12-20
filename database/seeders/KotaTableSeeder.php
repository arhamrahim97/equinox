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
            ),
            1 =>
            array(
                'id' => 2,
                'nama' => 'SIMEULUE',
                'provinsi_id' => 1,
            ),
            2 =>
            array(
                'id' => 3,
                'nama' => 'BIREUEN',
                'provinsi_id' => 1,
            ),
            3 =>
            array(
                'id' => 4,
                'nama' => 'ACEH TIMUR',
                'provinsi_id' => 1,
            ),
            4 =>
            array(
                'id' => 5,
                'nama' => 'ACEH UTARA',
                'provinsi_id' => 1,
            ),
            5 =>
            array(
                'id' => 6,
                'nama' => 'PIDIE',
                'provinsi_id' => 1,
            ),
            6 =>
            array(
                'id' => 7,
                'nama' => 'ACEH BARAT DAYA',
                'provinsi_id' => 1,
            ),
            7 =>
            array(
                'id' => 8,
                'nama' => 'GAYO LUES',
                'provinsi_id' => 1,
            ),
            8 =>
            array(
                'id' => 9,
                'nama' => 'ACEH SELATAN',
                'provinsi_id' => 1,
            ),
            9 =>
            array(
                'id' => 10,
                'nama' => 'ACEH TAMIANG',
                'provinsi_id' => 1,
            ),
            10 =>
            array(
                'id' => 11,
                'nama' => 'ACEH BESAR',
                'provinsi_id' => 1,
            ),
            11 =>
            array(
                'id' => 12,
                'nama' => 'ACEH TENGGARA',
                'provinsi_id' => 1,
            ),
            12 =>
            array(
                'id' => 13,
                'nama' => 'BENER MERIAH',
                'provinsi_id' => 1,
            ),
            13 =>
            array(
                'id' => 14,
                'nama' => 'ACEH JAYA',
                'provinsi_id' => 1,
            ),
            14 =>
            array(
                'id' => 15,
                'nama' => 'LHOKSEUMAWE',
                'provinsi_id' => 1,
            ),
            15 =>
            array(
                'id' => 16,
                'nama' => 'ACEH BARAT',
                'provinsi_id' => 1,
            ),
            16 =>
            array(
                'id' => 17,
                'nama' => 'NAGAN RAYA',
                'provinsi_id' => 1,
            ),
            17 =>
            array(
                'id' => 18,
                'nama' => 'LANGSA',
                'provinsi_id' => 1,
            ),
            18 =>
            array(
                'id' => 19,
                'nama' => 'BANDA ACEH',
                'provinsi_id' => 1,
            ),
            19 =>
            array(
                'id' => 20,
                'nama' => 'ACEH SINGKIL',
                'provinsi_id' => 1,
            ),
            20 =>
            array(
                'id' => 21,
                'nama' => 'SABANG',
                'provinsi_id' => 1,
            ),
            21 =>
            array(
                'id' => 22,
                'nama' => 'ACEH TENGAH',
                'provinsi_id' => 1,
            ),
            22 =>
            array(
                'id' => 23,
                'nama' => 'SUBULUSSALAM',
                'provinsi_id' => 1,
            ),
            23 =>
            array(
                'id' => 24,
                'nama' => 'NIAS SELATAN',
                'provinsi_id' => 2,
            ),
            24 =>
            array(
                'id' => 25,
                'nama' => 'MANDAILING NATAL',
                'provinsi_id' => 2,
            ),
            25 =>
            array(
                'id' => 26,
                'nama' => 'DAIRI',
                'provinsi_id' => 2,
            ),
            26 =>
            array(
                'id' => 27,
                'nama' => 'LABUHAN BATU UTARA',
                'provinsi_id' => 2,
            ),
            27 =>
            array(
                'id' => 28,
                'nama' => 'TAPANULI UTARA',
                'provinsi_id' => 2,
            ),
            28 =>
            array(
                'id' => 29,
                'nama' => 'SIMALUNGUN',
                'provinsi_id' => 2,
            ),
            29 =>
            array(
                'id' => 30,
                'nama' => 'LANGKAT',
                'provinsi_id' => 2,
            ),
            30 =>
            array(
                'id' => 31,
                'nama' => 'SERDANG BEDAGAI',
                'provinsi_id' => 2,
            ),
            31 =>
            array(
                'id' => 32,
                'nama' => 'TAPANULI SELATAN',
                'provinsi_id' => 2,
            ),
            32 =>
            array(
                'id' => 33,
                'nama' => 'ASAHAN',
                'provinsi_id' => 2,
            ),
            33 =>
            array(
                'id' => 34,
                'nama' => 'PADANG LAWAS UTARA',
                'provinsi_id' => 2,
            ),
            34 =>
            array(
                'id' => 35,
                'nama' => 'PADANG LAWAS',
                'provinsi_id' => 2,
            ),
            35 =>
            array(
                'id' => 36,
                'nama' => 'LABUHAN BATU SELATAN',
                'provinsi_id' => 2,
            ),
            36 =>
            array(
                'id' => 37,
                'nama' => 'PADANG SIDEMPUAN',
                'provinsi_id' => 2,
            ),
            37 =>
            array(
                'id' => 38,
                'nama' => 'TOBA SAMOSIR',
                'provinsi_id' => 2,
            ),
            38 =>
            array(
                'id' => 39,
                'nama' => 'TAPANULI TENGAH',
                'provinsi_id' => 2,
            ),
            39 =>
            array(
                'id' => 40,
                'nama' => 'HUMBANG HASUNDUTAN',
                'provinsi_id' => 2,
            ),
            40 =>
            array(
                'id' => 41,
                'nama' => 'SIBOLGA',
                'provinsi_id' => 2,
            ),
            41 =>
            array(
                'id' => 42,
                'nama' => 'BATU BARA',
                'provinsi_id' => 2,
            ),
            42 =>
            array(
                'id' => 43,
                'nama' => 'SAMOSIR',
                'provinsi_id' => 2,
            ),
            43 =>
            array(
                'id' => 44,
                'nama' => 'PEMATANG SIANTAR',
                'provinsi_id' => 2,
            ),
            44 =>
            array(
                'id' => 45,
                'nama' => 'LABUHAN BATU',
                'provinsi_id' => 2,
            ),
            45 =>
            array(
                'id' => 46,
                'nama' => 'DELI SERDANG',
                'provinsi_id' => 2,
            ),
            46 =>
            array(
                'id' => 47,
                'nama' => 'GUNUNGSITOLI',
                'provinsi_id' => 2,
            ),
            47 =>
            array(
                'id' => 48,
                'nama' => 'NIAS UTARA',
                'provinsi_id' => 2,
            ),
            48 =>
            array(
                'id' => 49,
                'nama' => 'NIAS',
                'provinsi_id' => 2,
            ),
            49 =>
            array(
                'id' => 50,
                'nama' => 'KARO',
                'provinsi_id' => 2,
            ),
            50 =>
            array(
                'id' => 51,
                'nama' => 'NIAS BARAT',
                'provinsi_id' => 2,
            ),
            51 =>
            array(
                'id' => 52,
                'nama' => 'MEDAN',
                'provinsi_id' => 2,
            ),
            52 =>
            array(
                'id' => 53,
                'nama' => 'PAKPAK BHARAT',
                'provinsi_id' => 2,
            ),
            53 =>
            array(
                'id' => 54,
                'nama' => 'TEBING TINGGI',
                'provinsi_id' => 2,
            ),
            54 =>
            array(
                'id' => 55,
                'nama' => 'BINJAI',
                'provinsi_id' => 2,
            ),
            55 =>
            array(
                'id' => 56,
                'nama' => 'TANJUNG BALAI',
                'provinsi_id' => 2,
            ),
            56 =>
            array(
                'id' => 57,
                'nama' => 'DHARMASRAYA',
                'provinsi_id' => 3,
            ),
            57 =>
            array(
                'id' => 58,
                'nama' => 'SOLOK SELATAN',
                'provinsi_id' => 3,
            ),
            58 =>
            array(
                'id' => 59,
                'nama' => 'SIJUNJUNG (SAWAH LUNTO SIJUNJUNG)',
                'provinsi_id' => 3,
            ),
            59 =>
            array(
                'id' => 60,
                'nama' => 'PASAMAN BARAT',
                'provinsi_id' => 3,
            ),
            60 =>
            array(
                'id' => 61,
                'nama' => 'SOLOK',
                'provinsi_id' => 3,
            ),
            61 =>
            array(
                'id' => 62,
                'nama' => 'PASAMAN',
                'provinsi_id' => 3,
            ),
            62 =>
            array(
                'id' => 63,
                'nama' => 'PARIAMAN',
                'provinsi_id' => 3,
            ),
            63 =>
            array(
                'id' => 64,
                'nama' => 'TANAH DATAR',
                'provinsi_id' => 3,
            ),
            64 =>
            array(
                'id' => 65,
                'nama' => 'PADANG PARIAMAN',
                'provinsi_id' => 3,
            ),
            65 =>
            array(
                'id' => 66,
                'nama' => 'PESISIR SELATAN',
                'provinsi_id' => 3,
            ),
            66 =>
            array(
                'id' => 67,
                'nama' => 'PADANG',
                'provinsi_id' => 3,
            ),
            67 =>
            array(
                'id' => 68,
                'nama' => 'SAWAH LUNTO',
                'provinsi_id' => 3,
            ),
            68 =>
            array(
                'id' => 69,
                'nama' => 'LIMA PULUH KOTO / KOTA',
                'provinsi_id' => 3,
            ),
            69 =>
            array(
                'id' => 70,
                'nama' => 'AGAM',
                'provinsi_id' => 3,
            ),
            70 =>
            array(
                'id' => 71,
                'nama' => 'PAYAKUMBUH',
                'provinsi_id' => 3,
            ),
            71 =>
            array(
                'id' => 72,
                'nama' => 'BUKITTINGGI',
                'provinsi_id' => 3,
            ),
            72 =>
            array(
                'id' => 73,
                'nama' => 'PADANG PANJANG',
                'provinsi_id' => 3,
            ),
            73 =>
            array(
                'id' => 74,
                'nama' => 'KEPULAUAN MENTAWAI',
                'provinsi_id' => 3,
            ),
            74 =>
            array(
                'id' => 75,
                'nama' => 'INDRAGIRI HILIR',
                'provinsi_id' => 4,
            ),
            75 =>
            array(
                'id' => 76,
                'nama' => 'KUANTAN SINGINGI',
                'provinsi_id' => 4,
            ),
            76 =>
            array(
                'id' => 77,
                'nama' => 'PELALAWAN',
                'provinsi_id' => 4,
            ),
            77 =>
            array(
                'id' => 78,
                'nama' => 'PEKANBARU',
                'provinsi_id' => 4,
            ),
            78 =>
            array(
                'id' => 79,
                'nama' => 'ROKAN HILIR',
                'provinsi_id' => 4,
            ),
            79 =>
            array(
                'id' => 80,
                'nama' => 'BENGKALIS',
                'provinsi_id' => 4,
            ),
            80 =>
            array(
                'id' => 81,
                'nama' => 'INDRAGIRI HULU',
                'provinsi_id' => 4,
            ),
            81 =>
            array(
                'id' => 82,
                'nama' => 'ROKAN HULU',
                'provinsi_id' => 4,
            ),
            82 =>
            array(
                'id' => 83,
                'nama' => 'KAMPAR',
                'provinsi_id' => 4,
            ),
            83 =>
            array(
                'id' => 84,
                'nama' => 'KEPULAUAN MERANTI',
                'provinsi_id' => 4,
            ),
            84 =>
            array(
                'id' => 85,
                'nama' => 'DUMAI',
                'provinsi_id' => 4,
            ),
            85 =>
            array(
                'id' => 86,
                'nama' => 'SIAK',
                'provinsi_id' => 4,
            ),
            86 =>
            array(
                'id' => 87,
                'nama' => 'TEBO',
                'provinsi_id' => 5,
            ),
            87 =>
            array(
                'id' => 88,
                'nama' => 'TANJUNG JABUNG BARAT',
                'provinsi_id' => 5,
            ),
            88 =>
            array(
                'id' => 89,
                'nama' => 'MUARO JAMBI',
                'provinsi_id' => 5,
            ),
            89 =>
            array(
                'id' => 90,
                'nama' => 'KERINCI',
                'provinsi_id' => 5,
            ),
            90 =>
            array(
                'id' => 91,
                'nama' => 'MERANGIN',
                'provinsi_id' => 5,
            ),
            91 =>
            array(
                'id' => 92,
                'nama' => 'BUNGO',
                'provinsi_id' => 5,
            ),
            92 =>
            array(
                'id' => 93,
                'nama' => 'TANJUNG JABUNG TIMUR',
                'provinsi_id' => 5,
            ),
            93 =>
            array(
                'id' => 94,
                'nama' => 'SUNGAIPENUH',
                'provinsi_id' => 5,
            ),
            94 =>
            array(
                'id' => 95,
                'nama' => 'BATANG HARI',
                'provinsi_id' => 5,
            ),
            95 =>
            array(
                'id' => 96,
                'nama' => 'JAMBI',
                'provinsi_id' => 5,
            ),
            96 =>
            array(
                'id' => 97,
                'nama' => 'SAROLANGUN',
                'provinsi_id' => 5,
            ),
            97 =>
            array(
                'id' => 98,
                'nama' => 'PALEMBANG',
                'provinsi_id' => 6,
            ),
            98 =>
            array(
                'id' => 99,
                'nama' => 'LAHAT',
                'provinsi_id' => 6,
            ),
            99 =>
            array(
                'id' => 100,
                'nama' => 'OGAN KOMERING ULU TIMUR',
                'provinsi_id' => 6,
            ),
            100 =>
            array(
                'id' => 101,
                'nama' => 'MUSI BANYUASIN',
                'provinsi_id' => 6,
            ),
            101 =>
            array(
                'id' => 102,
                'nama' => 'PAGAR ALAM',
                'provinsi_id' => 6,
            ),
            102 =>
            array(
                'id' => 103,
                'nama' => 'OGAN KOMERING ULU SELATAN',
                'provinsi_id' => 6,
            ),
            103 =>
            array(
                'id' => 104,
                'nama' => 'BANYUASIN',
                'provinsi_id' => 6,
            ),
            104 =>
            array(
                'id' => 105,
                'nama' => 'MUSI RAWAS',
                'provinsi_id' => 6,
            ),
            105 =>
            array(
                'id' => 106,
                'nama' => 'MUARA ENIM',
                'provinsi_id' => 6,
            ),
            106 =>
            array(
                'id' => 107,
                'nama' => 'OGAN KOMERING ULU',
                'provinsi_id' => 6,
            ),
            107 =>
            array(
                'id' => 108,
                'nama' => 'OGAN KOMERING ILIR',
                'provinsi_id' => 6,
            ),
            108 =>
            array(
                'id' => 109,
                'nama' => 'EMPAT LAWANG',
                'provinsi_id' => 6,
            ),
            109 =>
            array(
                'id' => 110,
                'nama' => 'LUBUK LINGGAU',
                'provinsi_id' => 6,
            ),
            110 =>
            array(
                'id' => 111,
                'nama' => 'PRABUMULIH',
                'provinsi_id' => 6,
            ),
            111 =>
            array(
                'id' => 112,
                'nama' => 'OGAN ILIR',
                'provinsi_id' => 6,
            ),
            112 =>
            array(
                'id' => 113,
                'nama' => 'BENGKULU TENGAH',
                'provinsi_id' => 7,
            ),
            113 =>
            array(
                'id' => 114,
                'nama' => 'REJANG LEBONG',
                'provinsi_id' => 7,
            ),
            114 =>
            array(
                'id' => 115,
                'nama' => 'MUKO MUKO',
                'provinsi_id' => 7,
            ),
            115 =>
            array(
                'id' => 116,
                'nama' => 'KAUR',
                'provinsi_id' => 7,
            ),
            116 =>
            array(
                'id' => 117,
                'nama' => 'BENGKULU UTARA',
                'provinsi_id' => 7,
            ),
            117 =>
            array(
                'id' => 118,
                'nama' => 'LEBONG',
                'provinsi_id' => 7,
            ),
            118 =>
            array(
                'id' => 119,
                'nama' => 'KEPAHIANG',
                'provinsi_id' => 7,
            ),
            119 =>
            array(
                'id' => 120,
                'nama' => 'BENGKULU SELATAN',
                'provinsi_id' => 7,
            ),
            120 =>
            array(
                'id' => 121,
                'nama' => 'SELUMA',
                'provinsi_id' => 7,
            ),
            121 =>
            array(
                'id' => 122,
                'nama' => 'BENGKULU',
                'provinsi_id' => 7,
            ),
            122 =>
            array(
                'id' => 123,
                'nama' => 'LAMPUNG UTARA',
                'provinsi_id' => 8,
            ),
            123 =>
            array(
                'id' => 124,
                'nama' => 'WAY KANAN',
                'provinsi_id' => 8,
            ),
            124 =>
            array(
                'id' => 125,
                'nama' => 'LAMPUNG TENGAH',
                'provinsi_id' => 8,
            ),
            125 =>
            array(
                'id' => 126,
                'nama' => 'MESUJI',
                'provinsi_id' => 8,
            ),
            126 =>
            array(
                'id' => 127,
                'nama' => 'PRINGSEWU',
                'provinsi_id' => 8,
            ),
            127 =>
            array(
                'id' => 128,
                'nama' => 'LAMPUNG TIMUR',
                'provinsi_id' => 8,
            ),
            128 =>
            array(
                'id' => 129,
                'nama' => 'LAMPUNG SELATAN',
                'provinsi_id' => 8,
            ),
            129 =>
            array(
                'id' => 130,
                'nama' => 'TULANG BAWANG',
                'provinsi_id' => 8,
            ),
            130 =>
            array(
                'id' => 131,
                'nama' => 'TULANG BAWANG BARAT',
                'provinsi_id' => 8,
            ),
            131 =>
            array(
                'id' => 132,
                'nama' => 'TANGGAMUS',
                'provinsi_id' => 8,
            ),
            132 =>
            array(
                'id' => 133,
                'nama' => 'LAMPUNG BARAT',
                'provinsi_id' => 8,
            ),
            133 =>
            array(
                'id' => 134,
                'nama' => 'PESISIR BARAT',
                'provinsi_id' => 8,
            ),
            134 =>
            array(
                'id' => 135,
                'nama' => 'PESAWARAN',
                'provinsi_id' => 8,
            ),
            135 =>
            array(
                'id' => 136,
                'nama' => 'BANDAR LAMPUNG',
                'provinsi_id' => 8,
            ),
            136 =>
            array(
                'id' => 137,
                'nama' => 'METRO',
                'provinsi_id' => 8,
            ),
            137 =>
            array(
                'id' => 138,
                'nama' => 'BELITUNG',
                'provinsi_id' => 9,
            ),
            138 =>
            array(
                'id' => 139,
                'nama' => 'BELITUNG TIMUR',
                'provinsi_id' => 9,
            ),
            139 =>
            array(
                'id' => 140,
                'nama' => 'BANGKA',
                'provinsi_id' => 9,
            ),
            140 =>
            array(
                'id' => 141,
                'nama' => 'BANGKA SELATAN',
                'provinsi_id' => 9,
            ),
            141 =>
            array(
                'id' => 142,
                'nama' => 'BANGKA BARAT',
                'provinsi_id' => 9,
            ),
            142 =>
            array(
                'id' => 143,
                'nama' => 'PANGKAL PINANG',
                'provinsi_id' => 9,
            ),
            143 =>
            array(
                'id' => 144,
                'nama' => 'BANGKA TENGAH',
                'provinsi_id' => 9,
            ),
            144 =>
            array(
                'id' => 145,
                'nama' => 'KEPULAUAN ANAMBAS',
                'provinsi_id' => 10,
            ),
            145 =>
            array(
                'id' => 146,
                'nama' => 'BINTAN',
                'provinsi_id' => 10,
            ),
            146 =>
            array(
                'id' => 147,
                'nama' => 'NATUNA',
                'provinsi_id' => 10,
            ),
            147 =>
            array(
                'id' => 148,
                'nama' => 'BATAM',
                'provinsi_id' => 10,
            ),
            148 =>
            array(
                'id' => 149,
                'nama' => 'TANJUNG PINANG',
                'provinsi_id' => 10,
            ),
            149 =>
            array(
                'id' => 150,
                'nama' => 'KARIMUN',
                'provinsi_id' => 10,
            ),
            150 =>
            array(
                'id' => 151,
                'nama' => 'LINGGA',
                'provinsi_id' => 10,
            ),
            151 =>
            array(
                'id' => 152,
                'nama' => 'JAKARTA UTARA',
                'provinsi_id' => 11,
            ),
            152 =>
            array(
                'id' => 153,
                'nama' => 'JAKARTA BARAT',
                'provinsi_id' => 11,
            ),
            153 =>
            array(
                'id' => 154,
                'nama' => 'JAKARTA TIMUR',
                'provinsi_id' => 11,
            ),
            154 =>
            array(
                'id' => 155,
                'nama' => 'JAKARTA SELATAN',
                'provinsi_id' => 11,
            ),
            155 =>
            array(
                'id' => 156,
                'nama' => 'JAKARTA PUSAT',
                'provinsi_id' => 11,
            ),
            156 =>
            array(
                'id' => 157,
                'nama' => 'KEPULAUAN SERIBU',
                'provinsi_id' => 11,
            ),
            157 =>
            array(
                'id' => 158,
                'nama' => 'DEPOK',
                'provinsi_id' => 12,
            ),
            158 =>
            array(
                'id' => 159,
                'nama' => 'KARAWANG',
                'provinsi_id' => 12,
            ),
            159 =>
            array(
                'id' => 160,
                'nama' => 'CIREBON',
                'provinsi_id' => 12,
            ),
            160 =>
            array(
                'id' => 161,
                'nama' => 'BANDUNG',
                'provinsi_id' => 12,
            ),
            161 =>
            array(
                'id' => 162,
                'nama' => 'SUKABUMI',
                'provinsi_id' => 12,
            ),
            162 =>
            array(
                'id' => 163,
                'nama' => 'SUMEDANG',
                'provinsi_id' => 12,
            ),
            163 =>
            array(
                'id' => 164,
                'nama' => 'INDRAMAYU',
                'provinsi_id' => 12,
            ),
            164 =>
            array(
                'id' => 165,
                'nama' => 'MAJALENGKA',
                'provinsi_id' => 12,
            ),
            165 =>
            array(
                'id' => 166,
                'nama' => 'KUNINGAN',
                'provinsi_id' => 12,
            ),
            166 =>
            array(
                'id' => 167,
                'nama' => 'TASIKMALAYA',
                'provinsi_id' => 12,
            ),
            167 =>
            array(
                'id' => 168,
                'nama' => 'CIAMIS',
                'provinsi_id' => 12,
            ),
            168 =>
            array(
                'id' => 169,
                'nama' => 'SUBANG',
                'provinsi_id' => 12,
            ),
            169 =>
            array(
                'id' => 170,
                'nama' => 'PURWAKARTA',
                'provinsi_id' => 12,
            ),
            170 =>
            array(
                'id' => 171,
                'nama' => 'BOGOR',
                'provinsi_id' => 12,
            ),
            171 =>
            array(
                'id' => 172,
                'nama' => 'BEKASI',
                'provinsi_id' => 12,
            ),
            172 =>
            array(
                'id' => 173,
                'nama' => 'GARUT',
                'provinsi_id' => 12,
            ),
            173 =>
            array(
                'id' => 174,
                'nama' => 'PANGANDARAN',
                'provinsi_id' => 12,
            ),
            174 =>
            array(
                'id' => 175,
                'nama' => 'CIANJUR',
                'provinsi_id' => 12,
            ),
            175 =>
            array(
                'id' => 176,
                'nama' => 'BANJAR',
                'provinsi_id' => 12,
            ),
            176 =>
            array(
                'id' => 177,
                'nama' => 'BANDUNG BARAT',
                'provinsi_id' => 12,
            ),
            177 =>
            array(
                'id' => 178,
                'nama' => 'CIMAHI',
                'provinsi_id' => 12,
            ),
            178 =>
            array(
                'id' => 179,
                'nama' => 'PURBALINGGA',
                'provinsi_id' => 13,
            ),
            179 =>
            array(
                'id' => 180,
                'nama' => 'KEBUMEN',
                'provinsi_id' => 13,
            ),
            180 =>
            array(
                'id' => 181,
                'nama' => 'MAGELANG',
                'provinsi_id' => 13,
            ),
            181 =>
            array(
                'id' => 182,
                'nama' => 'CILACAP',
                'provinsi_id' => 13,
            ),
            182 =>
            array(
                'id' => 183,
                'nama' => 'BATANG',
                'provinsi_id' => 13,
            ),
            183 =>
            array(
                'id' => 184,
                'nama' => 'BANJARNEGARA',
                'provinsi_id' => 13,
            ),
            184 =>
            array(
                'id' => 185,
                'nama' => 'BLORA',
                'provinsi_id' => 13,
            ),
            185 =>
            array(
                'id' => 186,
                'nama' => 'BREBES',
                'provinsi_id' => 13,
            ),
            186 =>
            array(
                'id' => 187,
                'nama' => 'BANYUMAS',
                'provinsi_id' => 13,
            ),
            187 =>
            array(
                'id' => 188,
                'nama' => 'WONOSOBO',
                'provinsi_id' => 13,
            ),
            188 =>
            array(
                'id' => 189,
                'nama' => 'TEGAL',
                'provinsi_id' => 13,
            ),
            189 =>
            array(
                'id' => 190,
                'nama' => 'PURWOREJO',
                'provinsi_id' => 13,
            ),
            190 =>
            array(
                'id' => 191,
                'nama' => 'PATI',
                'provinsi_id' => 13,
            ),
            191 =>
            array(
                'id' => 192,
                'nama' => 'SUKOHARJO',
                'provinsi_id' => 13,
            ),
            192 =>
            array(
                'id' => 193,
                'nama' => 'KARANGANYAR',
                'provinsi_id' => 13,
            ),
            193 =>
            array(
                'id' => 194,
                'nama' => 'PEKALONGAN',
                'provinsi_id' => 13,
            ),
            194 =>
            array(
                'id' => 195,
                'nama' => 'PEMALANG',
                'provinsi_id' => 13,
            ),
            195 =>
            array(
                'id' => 196,
                'nama' => 'BOYOLALI',
                'provinsi_id' => 13,
            ),
            196 =>
            array(
                'id' => 197,
                'nama' => 'GROBOGAN',
                'provinsi_id' => 13,
            ),
            197 =>
            array(
                'id' => 198,
                'nama' => 'SEMARANG',
                'provinsi_id' => 13,
            ),
            198 =>
            array(
                'id' => 199,
                'nama' => 'DEMAK',
                'provinsi_id' => 13,
            ),
            199 =>
            array(
                'id' => 200,
                'nama' => 'REMBANG',
                'provinsi_id' => 13,
            ),
            200 =>
            array(
                'id' => 201,
                'nama' => 'KLATEN',
                'provinsi_id' => 13,
            ),
            201 =>
            array(
                'id' => 202,
                'nama' => 'KUDUS',
                'provinsi_id' => 13,
            ),
            202 =>
            array(
                'id' => 203,
                'nama' => 'TEMANGGUNG',
                'provinsi_id' => 13,
            ),
            203 =>
            array(
                'id' => 204,
                'nama' => 'SRAGEN',
                'provinsi_id' => 13,
            ),
            204 =>
            array(
                'id' => 205,
                'nama' => 'JEPARA',
                'provinsi_id' => 13,
            ),
            205 =>
            array(
                'id' => 206,
                'nama' => 'WONOGIRI',
                'provinsi_id' => 13,
            ),
            206 =>
            array(
                'id' => 207,
                'nama' => 'KENDAL',
                'provinsi_id' => 13,
            ),
            207 =>
            array(
                'id' => 208,
                'nama' => 'SURAKARTA (SOLO)',
                'provinsi_id' => 13,
            ),
            208 =>
            array(
                'id' => 209,
                'nama' => 'SALATIGA',
                'provinsi_id' => 13,
            ),
            209 =>
            array(
                'id' => 210,
                'nama' => 'SLEMAN',
                'provinsi_id' => 14,
            ),
            210 =>
            array(
                'id' => 211,
                'nama' => 'BANTUL',
                'provinsi_id' => 14,
            ),
            211 =>
            array(
                'id' => 212,
                'nama' => 'YOGYAKARTA',
                'provinsi_id' => 14,
            ),
            212 =>
            array(
                'id' => 213,
                'nama' => 'GUNUNG KIDUL',
                'provinsi_id' => 14,
            ),
            213 =>
            array(
                'id' => 214,
                'nama' => 'KULON PROGO',
                'provinsi_id' => 14,
            ),
            214 =>
            array(
                'id' => 215,
                'nama' => 'GRESIK',
                'provinsi_id' => 15,
            ),
            215 =>
            array(
                'id' => 216,
                'nama' => 'KEDIRI',
                'provinsi_id' => 15,
            ),
            216 =>
            array(
                'id' => 217,
                'nama' => 'SAMPANG',
                'provinsi_id' => 15,
            ),
            217 =>
            array(
                'id' => 218,
                'nama' => 'BANGKALAN',
                'provinsi_id' => 15,
            ),
            218 =>
            array(
                'id' => 219,
                'nama' => 'SUMENEP',
                'provinsi_id' => 15,
            ),
            219 =>
            array(
                'id' => 220,
                'nama' => 'SITUBONDO',
                'provinsi_id' => 15,
            ),
            220 =>
            array(
                'id' => 221,
                'nama' => 'SURABAYA',
                'provinsi_id' => 15,
            ),
            221 =>
            array(
                'id' => 222,
                'nama' => 'JEMBER',
                'provinsi_id' => 15,
            ),
            222 =>
            array(
                'id' => 223,
                'nama' => 'PAMEKASAN',
                'provinsi_id' => 15,
            ),
            223 =>
            array(
                'id' => 224,
                'nama' => 'JOMBANG',
                'provinsi_id' => 15,
            ),
            224 =>
            array(
                'id' => 225,
                'nama' => 'PROBOLINGGO',
                'provinsi_id' => 15,
            ),
            225 =>
            array(
                'id' => 226,
                'nama' => 'BANYUWANGI',
                'provinsi_id' => 15,
            ),
            226 =>
            array(
                'id' => 227,
                'nama' => 'PASURUAN',
                'provinsi_id' => 15,
            ),
            227 =>
            array(
                'id' => 228,
                'nama' => 'BOJONEGORO',
                'provinsi_id' => 15,
            ),
            228 =>
            array(
                'id' => 229,
                'nama' => 'BONDOWOSO',
                'provinsi_id' => 15,
            ),
            229 =>
            array(
                'id' => 230,
                'nama' => 'MAGETAN',
                'provinsi_id' => 15,
            ),
            230 =>
            array(
                'id' => 231,
                'nama' => 'LUMAJANG',
                'provinsi_id' => 15,
            ),
            231 =>
            array(
                'id' => 232,
                'nama' => 'MALANG',
                'provinsi_id' => 15,
            ),
            232 =>
            array(
                'id' => 233,
                'nama' => 'BLITAR',
                'provinsi_id' => 15,
            ),
            233 =>
            array(
                'id' => 234,
                'nama' => 'SIDOARJO',
                'provinsi_id' => 15,
            ),
            234 =>
            array(
                'id' => 235,
                'nama' => 'LAMONGAN',
                'provinsi_id' => 15,
            ),
            235 =>
            array(
                'id' => 236,
                'nama' => 'PACITAN',
                'provinsi_id' => 15,
            ),
            236 =>
            array(
                'id' => 237,
                'nama' => 'TULUNGAGUNG',
                'provinsi_id' => 15,
            ),
            237 =>
            array(
                'id' => 238,
                'nama' => 'MOJOKERTO',
                'provinsi_id' => 15,
            ),
            238 =>
            array(
                'id' => 239,
                'nama' => 'MADIUN',
                'provinsi_id' => 15,
            ),
            239 =>
            array(
                'id' => 240,
                'nama' => 'PONOROGO',
                'provinsi_id' => 15,
            ),
            240 =>
            array(
                'id' => 241,
                'nama' => 'NGAWI',
                'provinsi_id' => 15,
            ),
            241 =>
            array(
                'id' => 242,
                'nama' => 'NGANJUK',
                'provinsi_id' => 15,
            ),
            242 =>
            array(
                'id' => 243,
                'nama' => 'TUBAN',
                'provinsi_id' => 15,
            ),
            243 =>
            array(
                'id' => 244,
                'nama' => 'TRENGGALEK',
                'provinsi_id' => 15,
            ),
            244 =>
            array(
                'id' => 245,
                'nama' => 'BATU',
                'provinsi_id' => 15,
            ),
            245 =>
            array(
                'id' => 246,
                'nama' => 'TANGERANG',
                'provinsi_id' => 16,
            ),
            246 =>
            array(
                'id' => 247,
                'nama' => 'SERANG',
                'provinsi_id' => 16,
            ),
            247 =>
            array(
                'id' => 248,
                'nama' => 'PANDEGLANG',
                'provinsi_id' => 16,
            ),
            248 =>
            array(
                'id' => 249,
                'nama' => 'LEBAK',
                'provinsi_id' => 16,
            ),
            249 =>
            array(
                'id' => 250,
                'nama' => 'TANGERANG SELATAN',
                'provinsi_id' => 16,
            ),
            250 =>
            array(
                'id' => 251,
                'nama' => 'CILEGON',
                'provinsi_id' => 16,
            ),
            251 =>
            array(
                'id' => 252,
                'nama' => 'KLUNGKUNG',
                'provinsi_id' => 17,
            ),
            252 =>
            array(
                'id' => 253,
                'nama' => 'KARANGASEM',
                'provinsi_id' => 17,
            ),
            253 =>
            array(
                'id' => 254,
                'nama' => 'BANGLI',
                'provinsi_id' => 17,
            ),
            254 =>
            array(
                'id' => 255,
                'nama' => 'TABANAN',
                'provinsi_id' => 17,
            ),
            255 =>
            array(
                'id' => 256,
                'nama' => 'GIANYAR',
                'provinsi_id' => 17,
            ),
            256 =>
            array(
                'id' => 257,
                'nama' => 'BADUNG',
                'provinsi_id' => 17,
            ),
            257 =>
            array(
                'id' => 258,
                'nama' => 'JEMBRANA',
                'provinsi_id' => 17,
            ),
            258 =>
            array(
                'id' => 259,
                'nama' => 'BULELENG',
                'provinsi_id' => 17,
            ),
            259 =>
            array(
                'id' => 260,
                'nama' => 'DENPASAR',
                'provinsi_id' => 17,
            ),
            260 =>
            array(
                'id' => 261,
                'nama' => 'MATARAM',
                'provinsi_id' => 18,
            ),
            261 =>
            array(
                'id' => 262,
                'nama' => 'DOMPU',
                'provinsi_id' => 18,
            ),
            262 =>
            array(
                'id' => 263,
                'nama' => 'SUMBAWA BARAT',
                'provinsi_id' => 18,
            ),
            263 =>
            array(
                'id' => 264,
                'nama' => 'SUMBAWA',
                'provinsi_id' => 18,
            ),
            264 =>
            array(
                'id' => 265,
                'nama' => 'LOMBOK TENGAH',
                'provinsi_id' => 18,
            ),
            265 =>
            array(
                'id' => 266,
                'nama' => 'LOMBOK TIMUR',
                'provinsi_id' => 18,
            ),
            266 =>
            array(
                'id' => 267,
                'nama' => 'LOMBOK UTARA',
                'provinsi_id' => 18,
            ),
            267 =>
            array(
                'id' => 268,
                'nama' => 'LOMBOK BARAT',
                'provinsi_id' => 18,
            ),
            268 =>
            array(
                'id' => 269,
                'nama' => 'BIMA',
                'provinsi_id' => 18,
            ),
            269 =>
            array(
                'id' => 270,
                'nama' => 'TIMOR TENGAH SELATAN',
                'provinsi_id' => 19,
            ),
            270 =>
            array(
                'id' => 271,
                'nama' => 'FLORES TIMUR',
                'provinsi_id' => 19,
            ),
            271 =>
            array(
                'id' => 272,
                'nama' => 'ALOR',
                'provinsi_id' => 19,
            ),
            272 =>
            array(
                'id' => 273,
                'nama' => 'ENDE',
                'provinsi_id' => 19,
            ),
            273 =>
            array(
                'id' => 274,
                'nama' => 'NAGEKEO',
                'provinsi_id' => 19,
            ),
            274 =>
            array(
                'id' => 275,
                'nama' => 'KUPANG',
                'provinsi_id' => 19,
            ),
            275 =>
            array(
                'id' => 276,
                'nama' => 'SIKKA',
                'provinsi_id' => 19,
            ),
            276 =>
            array(
                'id' => 277,
                'nama' => 'NGADA',
                'provinsi_id' => 19,
            ),
            277 =>
            array(
                'id' => 278,
                'nama' => 'TIMOR TENGAH UTARA',
                'provinsi_id' => 19,
            ),
            278 =>
            array(
                'id' => 279,
                'nama' => 'BELU',
                'provinsi_id' => 19,
            ),
            279 =>
            array(
                'id' => 280,
                'nama' => 'LEMBATA',
                'provinsi_id' => 19,
            ),
            280 =>
            array(
                'id' => 281,
                'nama' => 'SUMBA BARAT DAYA',
                'provinsi_id' => 19,
            ),
            281 =>
            array(
                'id' => 282,
                'nama' => 'SUMBA BARAT',
                'provinsi_id' => 19,
            ),
            282 =>
            array(
                'id' => 283,
                'nama' => 'SUMBA TENGAH',
                'provinsi_id' => 19,
            ),
            283 =>
            array(
                'id' => 284,
                'nama' => 'SUMBA TIMUR',
                'provinsi_id' => 19,
            ),
            284 =>
            array(
                'id' => 285,
                'nama' => 'ROTE NDAO',
                'provinsi_id' => 19,
            ),
            285 =>
            array(
                'id' => 286,
                'nama' => 'MANGGARAI TIMUR',
                'provinsi_id' => 19,
            ),
            286 =>
            array(
                'id' => 287,
                'nama' => 'MANGGARAI',
                'provinsi_id' => 19,
            ),
            287 =>
            array(
                'id' => 288,
                'nama' => 'SABU RAIJUA',
                'provinsi_id' => 19,
            ),
            288 =>
            array(
                'id' => 289,
                'nama' => 'MANGGARAI BARAT',
                'provinsi_id' => 19,
            ),
            289 =>
            array(
                'id' => 290,
                'nama' => 'LANDAK',
                'provinsi_id' => 20,
            ),
            290 =>
            array(
                'id' => 291,
                'nama' => 'KETAPANG',
                'provinsi_id' => 20,
            ),
            291 =>
            array(
                'id' => 292,
                'nama' => 'SINTANG',
                'provinsi_id' => 20,
            ),
            292 =>
            array(
                'id' => 293,
                'nama' => 'KUBU RAYA',
                'provinsi_id' => 20,
            ),
            293 =>
            array(
                'id' => 294,
                'nama' => 'PONTIANAK',
                'provinsi_id' => 20,
            ),
            294 =>
            array(
                'id' => 295,
                'nama' => 'KAYONG UTARA',
                'provinsi_id' => 20,
            ),
            295 =>
            array(
                'id' => 296,
                'nama' => 'BENGKAYANG',
                'provinsi_id' => 20,
            ),
            296 =>
            array(
                'id' => 297,
                'nama' => 'KAPUAS HULU',
                'provinsi_id' => 20,
            ),
            297 =>
            array(
                'id' => 298,
                'nama' => 'SAMBAS',
                'provinsi_id' => 20,
            ),
            298 =>
            array(
                'id' => 299,
                'nama' => 'SINGKAWANG',
                'provinsi_id' => 20,
            ),
            299 =>
            array(
                'id' => 300,
                'nama' => 'SANGGAU',
                'provinsi_id' => 20,
            ),
            300 =>
            array(
                'id' => 301,
                'nama' => 'MELAWI',
                'provinsi_id' => 20,
            ),
            301 =>
            array(
                'id' => 302,
                'nama' => 'SEKADAU',
                'provinsi_id' => 20,
            ),
            302 =>
            array(
                'id' => 303,
                'nama' => 'KOTAWARINGIN TIMUR',
                'provinsi_id' => 21,
            ),
            303 =>
            array(
                'id' => 304,
                'nama' => 'SUKAMARA',
                'provinsi_id' => 21,
            ),
            304 =>
            array(
                'id' => 305,
                'nama' => 'KOTAWARINGIN BARAT',
                'provinsi_id' => 21,
            ),
            305 =>
            array(
                'id' => 306,
                'nama' => 'BARITO TIMUR',
                'provinsi_id' => 21,
            ),
            306 =>
            array(
                'id' => 307,
                'nama' => 'KAPUAS',
                'provinsi_id' => 21,
            ),
            307 =>
            array(
                'id' => 308,
                'nama' => 'PULANG PISAU',
                'provinsi_id' => 21,
            ),
            308 =>
            array(
                'id' => 309,
                'nama' => 'LAMANDAU',
                'provinsi_id' => 21,
            ),
            309 =>
            array(
                'id' => 310,
                'nama' => 'SERUYAN',
                'provinsi_id' => 21,
            ),
            310 =>
            array(
                'id' => 311,
                'nama' => 'KATINGAN',
                'provinsi_id' => 21,
            ),
            311 =>
            array(
                'id' => 312,
                'nama' => 'BARITO SELATAN',
                'provinsi_id' => 21,
            ),
            312 =>
            array(
                'id' => 313,
                'nama' => 'MURUNG RAYA',
                'provinsi_id' => 21,
            ),
            313 =>
            array(
                'id' => 314,
                'nama' => 'BARITO UTARA',
                'provinsi_id' => 21,
            ),
            314 =>
            array(
                'id' => 315,
                'nama' => 'GUNUNG MAS',
                'provinsi_id' => 21,
            ),
            315 =>
            array(
                'id' => 316,
                'nama' => 'PALANGKA RAYA',
                'provinsi_id' => 21,
            ),
            316 =>
            array(
                'id' => 317,
                'nama' => 'TAPIN',
                'provinsi_id' => 22,
            ),
            317 =>
            array(
                'id' => 318,
                'nama' => 'BANJAR',
                'provinsi_id' => 22,
            ),
            318 =>
            array(
                'id' => 319,
                'nama' => 'HULU SUNGAI TENGAH',
                'provinsi_id' => 22,
            ),
            319 =>
            array(
                'id' => 320,
                'nama' => 'TABALONG',
                'provinsi_id' => 22,
            ),
            320 =>
            array(
                'id' => 321,
                'nama' => 'HULU SUNGAI UTARA',
                'provinsi_id' => 22,
            ),
            321 =>
            array(
                'id' => 322,
                'nama' => 'BALANGAN',
                'provinsi_id' => 22,
            ),
            322 =>
            array(
                'id' => 323,
                'nama' => 'TANAH BUMBU',
                'provinsi_id' => 22,
            ),
            323 =>
            array(
                'id' => 324,
                'nama' => 'BANJARMASIN',
                'provinsi_id' => 22,
            ),
            324 =>
            array(
                'id' => 325,
                'nama' => 'KOTABARU',
                'provinsi_id' => 22,
            ),
            325 =>
            array(
                'id' => 326,
                'nama' => 'TANAH LAUT',
                'provinsi_id' => 22,
            ),
            326 =>
            array(
                'id' => 327,
                'nama' => 'HULU SUNGAI SELATAN',
                'provinsi_id' => 22,
            ),
            327 =>
            array(
                'id' => 328,
                'nama' => 'BARITO KUALA',
                'provinsi_id' => 22,
            ),
            328 =>
            array(
                'id' => 329,
                'nama' => 'BANJARBARU',
                'provinsi_id' => 22,
            ),
            329 =>
            array(
                'id' => 330,
                'nama' => 'KUTAI BARAT',
                'provinsi_id' => 23,
            ),
            330 =>
            array(
                'id' => 331,
                'nama' => 'SAMARINDA',
                'provinsi_id' => 23,
            ),
            331 =>
            array(
                'id' => 332,
                'nama' => 'PASER',
                'provinsi_id' => 23,
            ),
            332 =>
            array(
                'id' => 333,
                'nama' => 'KUTAI KARTANEGARA',
                'provinsi_id' => 23,
            ),
            333 =>
            array(
                'id' => 334,
                'nama' => 'BERAU',
                'provinsi_id' => 23,
            ),
            334 =>
            array(
                'id' => 335,
                'nama' => 'PENAJAM PASER UTARA',
                'provinsi_id' => 23,
            ),
            335 =>
            array(
                'id' => 336,
                'nama' => 'BONTANG',
                'provinsi_id' => 23,
            ),
            336 =>
            array(
                'id' => 337,
                'nama' => 'KUTAI TIMUR',
                'provinsi_id' => 23,
            ),
            337 =>
            array(
                'id' => 338,
                'nama' => 'BALIKPAPAN',
                'provinsi_id' => 23,
            ),
            338 =>
            array(
                'id' => 339,
                'nama' => 'MALINAU',
                'provinsi_id' => 24,
            ),
            339 =>
            array(
                'id' => 340,
                'nama' => 'NUNUKAN',
                'provinsi_id' => 24,
            ),
            340 =>
            array(
                'id' => 341,
                'nama' => 'BULUNGAN (BULONGAN)',
                'provinsi_id' => 24,
            ),
            341 =>
            array(
                'id' => 342,
                'nama' => 'TANA TIDUNG',
                'provinsi_id' => 24,
            ),
            342 =>
            array(
                'id' => 343,
                'nama' => 'TARAKAN',
                'provinsi_id' => 24,
            ),
            343 =>
            array(
                'id' => 344,
                'nama' => 'BOLAANG MONGONDOW (BOLMONG)',
                'provinsi_id' => 25,
            ),
            344 =>
            array(
                'id' => 345,
                'nama' => 'BOLAANG MONGONDOW SELATAN',
                'provinsi_id' => 25,
            ),
            345 =>
            array(
                'id' => 346,
                'nama' => 'MINAHASA SELATAN',
                'provinsi_id' => 25,
            ),
            346 =>
            array(
                'id' => 347,
                'nama' => 'BITUNG',
                'provinsi_id' => 25,
            ),
            347 =>
            array(
                'id' => 348,
                'nama' => 'MINAHASA',
                'provinsi_id' => 25,
            ),
            348 =>
            array(
                'id' => 349,
                'nama' => 'KEPULAUAN SANGIHE',
                'provinsi_id' => 25,
            ),
            349 =>
            array(
                'id' => 350,
                'nama' => 'MINAHASA UTARA',
                'provinsi_id' => 25,
            ),
            350 =>
            array(
                'id' => 351,
                'nama' => 'KEPULAUAN TALAUD',
                'provinsi_id' => 25,
            ),
            351 =>
            array(
                'id' => 352,
                'nama' => 'KEPULAUAN SIAU TAGULANDANG BIARO (SITARO)',
                'provinsi_id' => 25,
            ),
            352 =>
            array(
                'id' => 353,
                'nama' => 'MANADO',
                'provinsi_id' => 25,
            ),
            353 =>
            array(
                'id' => 354,
                'nama' => 'BOLAANG MONGONDOW UTARA',
                'provinsi_id' => 25,
            ),
            354 =>
            array(
                'id' => 355,
                'nama' => 'BOLAANG MONGONDOW TIMUR',
                'provinsi_id' => 25,
            ),
            355 =>
            array(
                'id' => 356,
                'nama' => 'MINAHASA TENGGARA',
                'provinsi_id' => 25,
            ),
            356 =>
            array(
                'id' => 357,
                'nama' => 'KOTAMOBAGU',
                'provinsi_id' => 25,
            ),
            357 =>
            array(
                'id' => 358,
                'nama' => 'TOMOHON',
                'provinsi_id' => 25,
            ),
            358 =>
            array(
                'id' => 359,
                'nama' => 'BANGGAI KEPULAUAN',
                'provinsi_id' => 26,
            ),
            359 =>
            array(
                'id' => 360,
                'nama' => 'TOLI-TOLI',
                'provinsi_id' => 26,
            ),
            360 =>
            array(
                'id' => 361,
                'nama' => 'PARIGI MOUTONG',
                'provinsi_id' => 26,
            ),
            361 =>
            array(
                'id' => 362,
                'nama' => 'BUOL',
                'provinsi_id' => 26,
            ),
            362 =>
            array(
                'id' => 363,
                'nama' => 'DONGGALA',
                'provinsi_id' => 26,
            ),
            363 =>
            array(
                'id' => 364,
                'nama' => 'POSO',
                'provinsi_id' => 26,
            ),
            364 =>
            array(
                'id' => 365,
                'nama' => 'MOROWALI',
                'provinsi_id' => 26,
            ),
            365 =>
            array(
                'id' => 366,
                'nama' => 'TOJO UNA-UNA',
                'provinsi_id' => 26,
            ),
            366 =>
            array(
                'id' => 367,
                'nama' => 'BANGGAI',
                'provinsi_id' => 26,
            ),
            367 =>
            array(
                'id' => 368,
                'nama' => 'SIGI',
                'provinsi_id' => 26,
            ),
            368 =>
            array(
                'id' => 369,
                'nama' => 'PALU',
                'provinsi_id' => 26,
            ),
            369 =>
            array(
                'id' => 370,
                'nama' => 'MAROS',
                'provinsi_id' => 27,
            ),
            370 =>
            array(
                'id' => 371,
                'nama' => 'WAJO',
                'provinsi_id' => 27,
            ),
            371 =>
            array(
                'id' => 372,
                'nama' => 'BONE',
                'provinsi_id' => 27,
            ),
            372 =>
            array(
                'id' => 373,
                'nama' => 'SOPPENG',
                'provinsi_id' => 27,
            ),
            373 =>
            array(
                'id' => 374,
                'nama' => 'SIDENRENG RAPPANG / RAPANG',
                'provinsi_id' => 27,
            ),
            374 =>
            array(
                'id' => 375,
                'nama' => 'TAKALAR',
                'provinsi_id' => 27,
            ),
            375 =>
            array(
                'id' => 376,
                'nama' => 'BARRU',
                'provinsi_id' => 27,
            ),
            376 =>
            array(
                'id' => 377,
                'nama' => 'LUWU TIMUR',
                'provinsi_id' => 27,
            ),
            377 =>
            array(
                'id' => 378,
                'nama' => 'SINJAI',
                'provinsi_id' => 27,
            ),
            378 =>
            array(
                'id' => 379,
                'nama' => 'PANGKAJENE KEPULAUAN',
                'provinsi_id' => 27,
            ),
            379 =>
            array(
                'id' => 380,
                'nama' => 'PINRANG',
                'provinsi_id' => 27,
            ),
            380 =>
            array(
                'id' => 381,
                'nama' => 'JENEPONTO',
                'provinsi_id' => 27,
            ),
            381 =>
            array(
                'id' => 382,
                'nama' => 'PALOPO',
                'provinsi_id' => 27,
            ),
            382 =>
            array(
                'id' => 383,
                'nama' => 'TORAJA UTARA',
                'provinsi_id' => 27,
            ),
            383 =>
            array(
                'id' => 384,
                'nama' => 'LUWU',
                'provinsi_id' => 27,
            ),
            384 =>
            array(
                'id' => 385,
                'nama' => 'BULUKUMBA',
                'provinsi_id' => 27,
            ),
            385 =>
            array(
                'id' => 386,
                'nama' => 'MAKASSAR',
                'provinsi_id' => 27,
            ),
            386 =>
            array(
                'id' => 387,
                'nama' => 'SELAYAR (KEPULAUAN SELAYAR)',
                'provinsi_id' => 27,
            ),
            387 =>
            array(
                'id' => 388,
                'nama' => 'TANA TORAJA',
                'provinsi_id' => 27,
            ),
            388 =>
            array(
                'id' => 389,
                'nama' => 'LUWU UTARA',
                'provinsi_id' => 27,
            ),
            389 =>
            array(
                'id' => 390,
                'nama' => 'BANTAENG',
                'provinsi_id' => 27,
            ),
            390 =>
            array(
                'id' => 391,
                'nama' => 'GOWA',
                'provinsi_id' => 27,
            ),
            391 =>
            array(
                'id' => 392,
                'nama' => 'ENREKANG',
                'provinsi_id' => 27,
            ),
            392 =>
            array(
                'id' => 393,
                'nama' => 'PAREPARE',
                'provinsi_id' => 27,
            ),
            393 =>
            array(
                'id' => 394,
                'nama' => 'KOLAKA',
                'provinsi_id' => 28,
            ),
            394 =>
            array(
                'id' => 395,
                'nama' => 'MUNA',
                'provinsi_id' => 28,
            ),
            395 =>
            array(
                'id' => 396,
                'nama' => 'KONAWE SELATAN',
                'provinsi_id' => 28,
            ),
            396 =>
            array(
                'id' => 397,
                'nama' => 'KENDARI',
                'provinsi_id' => 28,
            ),
            397 =>
            array(
                'id' => 398,
                'nama' => 'KONAWE',
                'provinsi_id' => 28,
            ),
            398 =>
            array(
                'id' => 399,
                'nama' => 'KONAWE UTARA',
                'provinsi_id' => 28,
            ),
            399 =>
            array(
                'id' => 400,
                'nama' => 'KOLAKA UTARA',
                'provinsi_id' => 28,
            ),
            400 =>
            array(
                'id' => 401,
                'nama' => 'BUTON',
                'provinsi_id' => 28,
            ),
            401 =>
            array(
                'id' => 402,
                'nama' => 'BOMBANA',
                'provinsi_id' => 28,
            ),
            402 =>
            array(
                'id' => 403,
                'nama' => 'WAKATOBI',
                'provinsi_id' => 28,
            ),
            403 =>
            array(
                'id' => 404,
                'nama' => 'BAU-BAU',
                'provinsi_id' => 28,
            ),
            404 =>
            array(
                'id' => 405,
                'nama' => 'BUTON UTARA',
                'provinsi_id' => 28,
            ),
            405 =>
            array(
                'id' => 406,
                'nama' => 'GORONTALO UTARA',
                'provinsi_id' => 29,
            ),
            406 =>
            array(
                'id' => 407,
                'nama' => 'BONE BOLANGO',
                'provinsi_id' => 29,
            ),
            407 =>
            array(
                'id' => 408,
                'nama' => 'GORONTALO',
                'provinsi_id' => 29,
            ),
            408 =>
            array(
                'id' => 409,
                'nama' => 'BOALEMO',
                'provinsi_id' => 29,
            ),
            409 =>
            array(
                'id' => 410,
                'nama' => 'POHUWATO',
                'provinsi_id' => 29,
            ),
            410 =>
            array(
                'id' => 411,
                'nama' => 'MAJENE',
                'provinsi_id' => 30,
            ),
            411 =>
            array(
                'id' => 412,
                'nama' => 'MAMUJU',
                'provinsi_id' => 30,
            ),
            412 =>
            array(
                'id' => 413,
                'nama' => 'MAMUJU UTARA',
                'provinsi_id' => 30,
            ),
            413 =>
            array(
                'id' => 414,
                'nama' => 'POLEWALI MANDAR',
                'provinsi_id' => 30,
            ),
            414 =>
            array(
                'id' => 415,
                'nama' => 'MAMASA',
                'provinsi_id' => 30,
            ),
            415 =>
            array(
                'id' => 416,
                'nama' => 'MALUKU TENGGARA BARAT',
                'provinsi_id' => 31,
            ),
            416 =>
            array(
                'id' => 417,
                'nama' => 'MALUKU TENGGARA',
                'provinsi_id' => 31,
            ),
            417 =>
            array(
                'id' => 418,
                'nama' => 'SERAM BAGIAN BARAT',
                'provinsi_id' => 31,
            ),
            418 =>
            array(
                'id' => 419,
                'nama' => 'MALUKU TENGAH',
                'provinsi_id' => 31,
            ),
            419 =>
            array(
                'id' => 420,
                'nama' => 'SERAM BAGIAN TIMUR',
                'provinsi_id' => 31,
            ),
            420 =>
            array(
                'id' => 421,
                'nama' => 'MALUKU BARAT DAYA',
                'provinsi_id' => 31,
            ),
            421 =>
            array(
                'id' => 422,
                'nama' => 'AMBON',
                'provinsi_id' => 31,
            ),
            422 =>
            array(
                'id' => 423,
                'nama' => 'BURU',
                'provinsi_id' => 31,
            ),
            423 =>
            array(
                'id' => 424,
                'nama' => 'BURU SELATAN',
                'provinsi_id' => 31,
            ),
            424 =>
            array(
                'id' => 425,
                'nama' => 'KEPULAUAN ARU',
                'provinsi_id' => 31,
            ),
            425 =>
            array(
                'id' => 426,
                'nama' => 'TUAL',
                'provinsi_id' => 31,
            ),
            426 =>
            array(
                'id' => 427,
                'nama' => 'HALMAHERA BARAT',
                'provinsi_id' => 32,
            ),
            427 =>
            array(
                'id' => 428,
                'nama' => 'TIDORE KEPULAUAN',
                'provinsi_id' => 32,
            ),
            428 =>
            array(
                'id' => 429,
                'nama' => 'TERNATE',
                'provinsi_id' => 32,
            ),
            429 =>
            array(
                'id' => 430,
                'nama' => 'PULAU MOROTAI',
                'provinsi_id' => 32,
            ),
            430 =>
            array(
                'id' => 431,
                'nama' => 'KEPULAUAN SULA',
                'provinsi_id' => 32,
            ),
            431 =>
            array(
                'id' => 432,
                'nama' => 'HALMAHERA SELATAN',
                'provinsi_id' => 32,
            ),
            432 =>
            array(
                'id' => 433,
                'nama' => 'HALMAHERA TENGAH',
                'provinsi_id' => 32,
            ),
            433 =>
            array(
                'id' => 434,
                'nama' => 'HALMAHERA TIMUR',
                'provinsi_id' => 32,
            ),
            434 =>
            array(
                'id' => 435,
                'nama' => 'HALMAHERA UTARA',
                'provinsi_id' => 32,
            ),
            435 =>
            array(
                'id' => 436,
                'nama' => 'YALIMO',
                'provinsi_id' => 33,
            ),
            436 =>
            array(
                'id' => 437,
                'nama' => 'DOGIYAI',
                'provinsi_id' => 33,
            ),
            437 =>
            array(
                'id' => 438,
                'nama' => 'ASMAT',
                'provinsi_id' => 33,
            ),
            438 =>
            array(
                'id' => 439,
                'nama' => 'JAYAPURA',
                'provinsi_id' => 33,
            ),
            439 =>
            array(
                'id' => 440,
                'nama' => 'PANIAI',
                'provinsi_id' => 33,
            ),
            440 =>
            array(
                'id' => 441,
                'nama' => 'MAPPI',
                'provinsi_id' => 33,
            ),
            441 =>
            array(
                'id' => 442,
                'nama' => 'TOLIKARA',
                'provinsi_id' => 33,
            ),
            442 =>
            array(
                'id' => 443,
                'nama' => 'PUNCAK JAYA',
                'provinsi_id' => 33,
            ),
            443 =>
            array(
                'id' => 444,
                'nama' => 'PEGUNUNGAN BINTANG',
                'provinsi_id' => 33,
            ),
            444 =>
            array(
                'id' => 445,
                'nama' => 'JAYAWIJAYA',
                'provinsi_id' => 33,
            ),
            445 =>
            array(
                'id' => 446,
                'nama' => 'LANNY JAYA',
                'provinsi_id' => 33,
            ),
            446 =>
            array(
                'id' => 447,
                'nama' => 'NDUGA',
                'provinsi_id' => 33,
            ),
            447 =>
            array(
                'id' => 448,
                'nama' => 'BIAK NUMFOR',
                'provinsi_id' => 33,
            ),
            448 =>
            array(
                'id' => 449,
                'nama' => 'KEPULAUAN YAPEN (YAPEN WAROPEN)',
                'provinsi_id' => 33,
            ),
            449 =>
            array(
                'id' => 450,
                'nama' => 'PUNCAK',
                'provinsi_id' => 33,
            ),
            450 =>
            array(
                'id' => 451,
                'nama' => 'INTAN JAYA',
                'provinsi_id' => 33,
            ),
            451 =>
            array(
                'id' => 452,
                'nama' => 'WAROPEN',
                'provinsi_id' => 33,
            ),
            452 =>
            array(
                'id' => 453,
                'nama' => 'NABIRE',
                'provinsi_id' => 33,
            ),
            453 =>
            array(
                'id' => 454,
                'nama' => 'MIMIKA',
                'provinsi_id' => 33,
            ),
            454 =>
            array(
                'id' => 455,
                'nama' => 'BOVEN DIGOEL',
                'provinsi_id' => 33,
            ),
            455 =>
            array(
                'id' => 456,
                'nama' => 'YAHUKIMO',
                'provinsi_id' => 33,
            ),
            456 =>
            array(
                'id' => 457,
                'nama' => 'SARMI',
                'provinsi_id' => 33,
            ),
            457 =>
            array(
                'id' => 458,
                'nama' => 'MERAUKE',
                'provinsi_id' => 33,
            ),
            458 =>
            array(
                'id' => 459,
                'nama' => 'DEIYAI (DELIYAI)',
                'provinsi_id' => 33,
            ),
            459 =>
            array(
                'id' => 460,
                'nama' => 'KEEROM',
                'provinsi_id' => 33,
            ),
            460 =>
            array(
                'id' => 461,
                'nama' => 'SUPIORI',
                'provinsi_id' => 33,
            ),
            461 =>
            array(
                'id' => 462,
                'nama' => 'MAMBERAMO RAYA',
                'provinsi_id' => 33,
            ),
            462 =>
            array(
                'id' => 463,
                'nama' => 'MAMBERAMO TENGAH',
                'provinsi_id' => 33,
            ),
            463 =>
            array(
                'id' => 464,
                'nama' => 'RAJA AMPAT',
                'provinsi_id' => 34,
            ),
            464 =>
            array(
                'id' => 465,
                'nama' => 'MANOKWARI SELATAN',
                'provinsi_id' => 34,
            ),
            465 =>
            array(
                'id' => 466,
                'nama' => 'MANOKWARI',
                'provinsi_id' => 34,
            ),
            466 =>
            array(
                'id' => 467,
                'nama' => 'KAIMANA',
                'provinsi_id' => 34,
            ),
            467 =>
            array(
                'id' => 468,
                'nama' => 'MAYBRAT',
                'provinsi_id' => 34,
            ),
            468 =>
            array(
                'id' => 469,
                'nama' => 'SORONG SELATAN',
                'provinsi_id' => 34,
            ),
            469 =>
            array(
                'id' => 470,
                'nama' => 'FAKFAK',
                'provinsi_id' => 34,
            ),
            470 =>
            array(
                'id' => 471,
                'nama' => 'PEGUNUNGAN ARFAK',
                'provinsi_id' => 34,
            ),
            471 =>
            array(
                'id' => 472,
                'nama' => 'TAMBRAUW',
                'provinsi_id' => 34,
            ),
            472 =>
            array(
                'id' => 473,
                'nama' => 'SORONG',
                'provinsi_id' => 34,
            ),
            473 =>
            array(
                'id' => 474,
                'nama' => 'TELUK WONDAMA',
                'provinsi_id' => 34,
            ),
            474 =>
            array(
                'id' => 475,
                'nama' => 'TELUK BINTUNI',
                'provinsi_id' => 34,
            ),
        ));
    }
}
