<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NegaraTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('negara')->delete();

        DB::table('negara')->insert(array(
            0 =>
            array(
                'id' => 1,
                'nama' => 'Afghanistan',
                'region' => 'Asia',
            ),
            1 =>
            array(
                'id' => 2,
                'nama' => 'Aland Islands',
                'region' => 'Europe',
            ),
            2 =>
            array(
                'id' => 3,
                'nama' => 'Albania',
                'region' => 'Europe',
            ),
            3 =>
            array(
                'id' => 4,
                'nama' => 'Algeria',
                'region' => 'Africa',
            ),
            4 =>
            array(
                'id' => 5,
                'nama' => 'American Samoa',
                'region' => 'Oceania',
            ),
            5 =>
            array(
                'id' => 6,
                'nama' => 'Andorra',
                'region' => 'Europe',
            ),
            6 =>
            array(
                'id' => 7,
                'nama' => 'Angola',
                'region' => 'Africa',
            ),
            7 =>
            array(
                'id' => 8,
                'nama' => 'Anguilla',
                'region' => 'Americas',
            ),
            8 =>
            array(
                'id' => 9,
                'nama' => 'Antarctica',
                'region' => 'Polar',
            ),
            9 =>
            array(
                'id' => 10,
                'nama' => 'Antigua And Barbuda',
                'region' => 'Americas',
            ),
            10 =>
            array(
                'id' => 11,
                'nama' => 'Argentina',
                'region' => 'Americas',
            ),
            11 =>
            array(
                'id' => 12,
                'nama' => 'Armenia',
                'region' => 'Asia',
            ),
            12 =>
            array(
                'id' => 13,
                'nama' => 'Aruba',
                'region' => 'Americas',
            ),
            13 =>
            array(
                'id' => 14,
                'nama' => 'Australia',
                'region' => 'Oceania',
            ),
            14 =>
            array(
                'id' => 15,
                'nama' => 'Austria',
                'region' => 'Europe',
            ),
            15 =>
            array(
                'id' => 16,
                'nama' => 'Azerbaijan',
                'region' => 'Asia',
            ),
            16 =>
            array(
                'id' => 17,
                'nama' => 'Bahamas The',
                'region' => 'Americas',
            ),
            17 =>
            array(
                'id' => 18,
                'nama' => 'Bahrain',
                'region' => 'Asia',
            ),
            18 =>
            array(
                'id' => 19,
                'nama' => 'Bangladesh',
                'region' => 'Asia',
            ),
            19 =>
            array(
                'id' => 20,
                'nama' => 'Barbados',
                'region' => 'Americas',
            ),
            20 =>
            array(
                'id' => 21,
                'nama' => 'Belarus',
                'region' => 'Europe',
            ),
            21 =>
            array(
                'id' => 22,
                'nama' => 'Belgium',
                'region' => 'Europe',
            ),
            22 =>
            array(
                'id' => 23,
                'nama' => 'Belize',
                'region' => 'Americas',
            ),
            23 =>
            array(
                'id' => 24,
                'nama' => 'Benin',
                'region' => 'Africa',
            ),
            24 =>
            array(
                'id' => 25,
                'nama' => 'Bermuda',
                'region' => 'Americas',
            ),
            25 =>
            array(
                'id' => 26,
                'nama' => 'Bhutan',
                'region' => 'Asia',
            ),
            26 =>
            array(
                'id' => 27,
                'nama' => 'Bolivia',
                'region' => 'Americas',
            ),
            27 =>
            array(
                'id' => 28,
                'nama' => 'Bosnia and Herzegovina',
                'region' => 'Europe',
            ),
            28 =>
            array(
                'id' => 29,
                'nama' => 'Botswana',
                'region' => 'Africa',
            ),
            29 =>
            array(
                'id' => 30,
                'nama' => 'Bouvet Island',
                'region' => '',
            ),
            30 =>
            array(
                'id' => 31,
                'nama' => 'Brazil',
                'region' => 'Americas',
            ),
            31 =>
            array(
                'id' => 32,
                'nama' => 'British Indian Ocean Territory',
                'region' => 'Africa',
            ),
            32 =>
            array(
                'id' => 33,
                'nama' => 'Brunei',
                'region' => 'Asia',
            ),
            33 =>
            array(
                'id' => 34,
                'nama' => 'Bulgaria',
                'region' => 'Europe',
            ),
            34 =>
            array(
                'id' => 35,
                'nama' => 'Burkina Faso',
                'region' => 'Africa',
            ),
            35 =>
            array(
                'id' => 36,
                'nama' => 'Burundi',
                'region' => 'Africa',
            ),
            36 =>
            array(
                'id' => 37,
                'nama' => 'Cambodia',
                'region' => 'Asia',
            ),
            37 =>
            array(
                'id' => 38,
                'nama' => 'Cameroon',
                'region' => 'Africa',
            ),
            38 =>
            array(
                'id' => 39,
                'nama' => 'Canada',
                'region' => 'Americas',
            ),
            39 =>
            array(
                'id' => 40,
                'nama' => 'Cape Verde',
                'region' => 'Africa',
            ),
            40 =>
            array(
                'id' => 41,
                'nama' => 'Cayman Islands',
                'region' => 'Americas',
            ),
            41 =>
            array(
                'id' => 42,
                'nama' => 'Central African Republic',
                'region' => 'Africa',
            ),
            42 =>
            array(
                'id' => 43,
                'nama' => 'Chad',
                'region' => 'Africa',
            ),
            43 =>
            array(
                'id' => 44,
                'nama' => 'Chile',
                'region' => 'Americas',
            ),
            44 =>
            array(
                'id' => 45,
                'nama' => 'China',
                'region' => 'Asia',
            ),
            45 =>
            array(
                'id' => 46,
                'nama' => 'Christmas Island',
                'region' => 'Oceania',
            ),
            46 =>
            array(
                'id' => 47,
                'nama' => 'Cocos (Keeling) Islands',
                'region' => 'Oceania',
            ),
            47 =>
            array(
                'id' => 48,
                'nama' => 'Colombia',
                'region' => 'Americas',
            ),
            48 =>
            array(
                'id' => 49,
                'nama' => 'Comoros',
                'region' => 'Africa',
            ),
            49 =>
            array(
                'id' => 50,
                'nama' => 'Congo',
                'region' => 'Africa',
            ),
            50 =>
            array(
                'id' => 51,
                'nama' => 'Democratic Republic of the Congo',
                'region' => 'Africa',
            ),
            51 =>
            array(
                'id' => 52,
                'nama' => 'Cook Islands',
                'region' => 'Oceania',
            ),
            52 =>
            array(
                'id' => 53,
                'nama' => 'Costa Rica',
                'region' => 'Americas',
            ),
            53 =>
            array(
                'id' => 54,
                'nama' => 'Cote D\'Ivoire (Ivory Coast)',
                'region' => 'Africa',
            ),
            54 =>
            array(
                'id' => 55,
                'nama' => 'Croatia',
                'region' => 'Europe',
            ),
            55 =>
            array(
                'id' => 56,
                'nama' => 'Cuba',
                'region' => 'Americas',
            ),
            56 =>
            array(
                'id' => 57,
                'nama' => 'Cyprus',
                'region' => 'Europe',
            ),
            57 =>
            array(
                'id' => 58,
                'nama' => 'Czech Republic',
                'region' => 'Europe',
            ),
            58 =>
            array(
                'id' => 59,
                'nama' => 'Denmark',
                'region' => 'Europe',
            ),
            59 =>
            array(
                'id' => 60,
                'nama' => 'Djibouti',
                'region' => 'Africa',
            ),
            60 =>
            array(
                'id' => 61,
                'nama' => 'Dominica',
                'region' => 'Americas',
            ),
            61 =>
            array(
                'id' => 62,
                'nama' => 'Dominican Republic',
                'region' => 'Americas',
            ),
            62 =>
            array(
                'id' => 63,
                'nama' => 'East Timor',
                'region' => 'Asia',
            ),
            63 =>
            array(
                'id' => 64,
                'nama' => 'Ecuador',
                'region' => 'Americas',
            ),
            64 =>
            array(
                'id' => 65,
                'nama' => 'Egypt',
                'region' => 'Africa',
            ),
            65 =>
            array(
                'id' => 66,
                'nama' => 'El Salvador',
                'region' => 'Americas',
            ),
            66 =>
            array(
                'id' => 67,
                'nama' => 'Equatorial Guinea',
                'region' => 'Africa',
            ),
            67 =>
            array(
                'id' => 68,
                'nama' => 'Eritrea',
                'region' => 'Africa',
            ),
            68 =>
            array(
                'id' => 69,
                'nama' => 'Estonia',
                'region' => 'Europe',
            ),
            69 =>
            array(
                'id' => 70,
                'nama' => 'Ethiopia',
                'region' => 'Africa',
            ),
            70 =>
            array(
                'id' => 71,
                'nama' => 'Falkland Islands',
                'region' => 'Americas',
            ),
            71 =>
            array(
                'id' => 72,
                'nama' => 'Faroe Islands',
                'region' => 'Europe',
            ),
            72 =>
            array(
                'id' => 73,
                'nama' => 'Fiji Islands',
                'region' => 'Oceania',
            ),
            73 =>
            array(
                'id' => 74,
                'nama' => 'Finland',
                'region' => 'Europe',
            ),
            74 =>
            array(
                'id' => 75,
                'nama' => 'France',
                'region' => 'Europe',
            ),
            75 =>
            array(
                'id' => 76,
                'nama' => 'French Guiana',
                'region' => 'Americas',
            ),
            76 =>
            array(
                'id' => 77,
                'nama' => 'French Polynesia',
                'region' => 'Oceania',
            ),
            77 =>
            array(
                'id' => 78,
                'nama' => 'French Southern Territories',
                'region' => 'Africa',
            ),
            78 =>
            array(
                'id' => 79,
                'nama' => 'Gabon',
                'region' => 'Africa',
            ),
            79 =>
            array(
                'id' => 80,
                'nama' => 'Gambia The',
                'region' => 'Africa',
            ),
            80 =>
            array(
                'id' => 81,
                'nama' => 'Georgia',
                'region' => 'Asia',
            ),
            81 =>
            array(
                'id' => 82,
                'nama' => 'Germany',
                'region' => 'Europe',
            ),
            82 =>
            array(
                'id' => 83,
                'nama' => 'Ghana',
                'region' => 'Africa',
            ),
            83 =>
            array(
                'id' => 84,
                'nama' => 'Gibraltar',
                'region' => 'Europe',
            ),
            84 =>
            array(
                'id' => 85,
                'nama' => 'Greece',
                'region' => 'Europe',
            ),
            85 =>
            array(
                'id' => 86,
                'nama' => 'Greenland',
                'region' => 'Americas',
            ),
            86 =>
            array(
                'id' => 87,
                'nama' => 'Grenada',
                'region' => 'Americas',
            ),
            87 =>
            array(
                'id' => 88,
                'nama' => 'Guadeloupe',
                'region' => 'Americas',
            ),
            88 =>
            array(
                'id' => 89,
                'nama' => 'Guam',
                'region' => 'Oceania',
            ),
            89 =>
            array(
                'id' => 90,
                'nama' => 'Guatemala',
                'region' => 'Americas',
            ),
            90 =>
            array(
                'id' => 91,
                'nama' => 'Guernsey and Alderney',
                'region' => 'Europe',
            ),
            91 =>
            array(
                'id' => 92,
                'nama' => 'Guinea',
                'region' => 'Africa',
            ),
            92 =>
            array(
                'id' => 93,
                'nama' => 'Guinea-Bissau',
                'region' => 'Africa',
            ),
            93 =>
            array(
                'id' => 94,
                'nama' => 'Guyana',
                'region' => 'Americas',
            ),
            94 =>
            array(
                'id' => 95,
                'nama' => 'Haiti',
                'region' => 'Americas',
            ),
            95 =>
            array(
                'id' => 96,
                'nama' => 'Heard Island and McDonald Islands',
                'region' => '',
            ),
            96 =>
            array(
                'id' => 97,
                'nama' => 'Honduras',
                'region' => 'Americas',
            ),
            97 =>
            array(
                'id' => 98,
                'nama' => 'Hong Kong S.A.R.',
                'region' => 'Asia',
            ),
            98 =>
            array(
                'id' => 99,
                'nama' => 'Hungary',
                'region' => 'Europe',
            ),
            99 =>
            array(
                'id' => 100,
                'nama' => 'Iceland',
                'region' => 'Europe',
            ),
            100 =>
            array(
                'id' => 101,
                'nama' => 'India',
                'region' => 'Asia',
            ),
            101 =>
            array(
                'id' => 102,
                'nama' => 'Indonesia',
                'region' => 'Asia',
            ),
            102 =>
            array(
                'id' => 103,
                'nama' => 'Iran',
                'region' => 'Asia',
            ),
            103 =>
            array(
                'id' => 104,
                'nama' => 'Iraq',
                'region' => 'Asia',
            ),
            104 =>
            array(
                'id' => 105,
                'nama' => 'Ireland',
                'region' => 'Europe',
            ),
            105 =>
            array(
                'id' => 106,
                'nama' => 'Israel',
                'region' => 'Asia',
            ),
            106 =>
            array(
                'id' => 107,
                'nama' => 'Italy',
                'region' => 'Europe',
            ),
            107 =>
            array(
                'id' => 108,
                'nama' => 'Jamaica',
                'region' => 'Americas',
            ),
            108 =>
            array(
                'id' => 109,
                'nama' => 'Japan',
                'region' => 'Asia',
            ),
            109 =>
            array(
                'id' => 110,
                'nama' => 'Jersey',
                'region' => 'Europe',
            ),
            110 =>
            array(
                'id' => 111,
                'nama' => 'Jordan',
                'region' => 'Asia',
            ),
            111 =>
            array(
                'id' => 112,
                'nama' => 'Kazakhstan',
                'region' => 'Asia',
            ),
            112 =>
            array(
                'id' => 113,
                'nama' => 'Kenya',
                'region' => 'Africa',
            ),
            113 =>
            array(
                'id' => 114,
                'nama' => 'Kiribati',
                'region' => 'Oceania',
            ),
            114 =>
            array(
                'id' => 115,
                'nama' => 'North Korea',
                'region' => 'Asia',
            ),
            115 =>
            array(
                'id' => 116,
                'nama' => 'South Korea',
                'region' => 'Asia',
            ),
            116 =>
            array(
                'id' => 117,
                'nama' => 'Kuwait',
                'region' => 'Asia',
            ),
            117 =>
            array(
                'id' => 118,
                'nama' => 'Kyrgyzstan',
                'region' => 'Asia',
            ),
            118 =>
            array(
                'id' => 119,
                'nama' => 'Laos',
                'region' => 'Asia',
            ),
            119 =>
            array(
                'id' => 120,
                'nama' => 'Latvia',
                'region' => 'Europe',
            ),
            120 =>
            array(
                'id' => 121,
                'nama' => 'Lebanon',
                'region' => 'Asia',
            ),
            121 =>
            array(
                'id' => 122,
                'nama' => 'Lesotho',
                'region' => 'Africa',
            ),
            122 =>
            array(
                'id' => 123,
                'nama' => 'Liberia',
                'region' => 'Africa',
            ),
            123 =>
            array(
                'id' => 124,
                'nama' => 'Libya',
                'region' => 'Africa',
            ),
            124 =>
            array(
                'id' => 125,
                'nama' => 'Liechtenstein',
                'region' => 'Europe',
            ),
            125 =>
            array(
                'id' => 126,
                'nama' => 'Lithuania',
                'region' => 'Europe',
            ),
            126 =>
            array(
                'id' => 127,
                'nama' => 'Luxembourg',
                'region' => 'Europe',
            ),
            127 =>
            array(
                'id' => 128,
                'nama' => 'Macau S.A.R.',
                'region' => 'Asia',
            ),
            128 =>
            array(
                'id' => 129,
                'nama' => 'Macedonia',
                'region' => 'Europe',
            ),
            129 =>
            array(
                'id' => 130,
                'nama' => 'Madagascar',
                'region' => 'Africa',
            ),
            130 =>
            array(
                'id' => 131,
                'nama' => 'Malawi',
                'region' => 'Africa',
            ),
            131 =>
            array(
                'id' => 132,
                'nama' => 'Malaysia',
                'region' => 'Asia',
            ),
            132 =>
            array(
                'id' => 133,
                'nama' => 'Maldives',
                'region' => 'Asia',
            ),
            133 =>
            array(
                'id' => 134,
                'nama' => 'Mali',
                'region' => 'Africa',
            ),
            134 =>
            array(
                'id' => 135,
                'nama' => 'Malta',
                'region' => 'Europe',
            ),
            135 =>
            array(
                'id' => 136,
                'nama' => 'Man (Isle of)',
                'region' => 'Europe',
            ),
            136 =>
            array(
                'id' => 137,
                'nama' => 'Marshall Islands',
                'region' => 'Oceania',
            ),
            137 =>
            array(
                'id' => 138,
                'nama' => 'Martinique',
                'region' => 'Americas',
            ),
            138 =>
            array(
                'id' => 139,
                'nama' => 'Mauritania',
                'region' => 'Africa',
            ),
            139 =>
            array(
                'id' => 140,
                'nama' => 'Mauritius',
                'region' => 'Africa',
            ),
            140 =>
            array(
                'id' => 141,
                'nama' => 'Mayotte',
                'region' => 'Africa',
            ),
            141 =>
            array(
                'id' => 142,
                'nama' => 'Mexico',
                'region' => 'Americas',
            ),
            142 =>
            array(
                'id' => 143,
                'nama' => 'Micronesia',
                'region' => 'Oceania',
            ),
            143 =>
            array(
                'id' => 144,
                'nama' => 'Moldova',
                'region' => 'Europe',
            ),
            144 =>
            array(
                'id' => 145,
                'nama' => 'Monaco',
                'region' => 'Europe',
            ),
            145 =>
            array(
                'id' => 146,
                'nama' => 'Mongolia',
                'region' => 'Asia',
            ),
            146 =>
            array(
                'id' => 147,
                'nama' => 'Montenegro',
                'region' => 'Europe',
            ),
            147 =>
            array(
                'id' => 148,
                'nama' => 'Montserrat',
                'region' => 'Americas',
            ),
            148 =>
            array(
                'id' => 149,
                'nama' => 'Morocco',
                'region' => 'Africa',
            ),
            149 =>
            array(
                'id' => 150,
                'nama' => 'Mozambique',
                'region' => 'Africa',
            ),
            150 =>
            array(
                'id' => 151,
                'nama' => 'Myanmar',
                'region' => 'Asia',
            ),
            151 =>
            array(
                'id' => 152,
                'nama' => 'Namibia',
                'region' => 'Africa',
            ),
            152 =>
            array(
                'id' => 153,
                'nama' => 'Nauru',
                'region' => 'Oceania',
            ),
            153 =>
            array(
                'id' => 154,
                'nama' => 'Nepal',
                'region' => 'Asia',
            ),
            154 =>
            array(
                'id' => 155,
                'nama' => 'Bonaire, Sint Eustatius and Saba',
                'region' => 'Americas',
            ),
            155 =>
            array(
                'id' => 156,
                'nama' => 'Netherlands',
                'region' => 'Europe',
            ),
            156 =>
            array(
                'id' => 157,
                'nama' => 'New Caledonia',
                'region' => 'Oceania',
            ),
            157 =>
            array(
                'id' => 158,
                'nama' => 'New Zealand',
                'region' => 'Oceania',
            ),
            158 =>
            array(
                'id' => 159,
                'nama' => 'Nicaragua',
                'region' => 'Americas',
            ),
            159 =>
            array(
                'id' => 160,
                'nama' => 'Niger',
                'region' => 'Africa',
            ),
            160 =>
            array(
                'id' => 161,
                'nama' => 'Nigeria',
                'region' => 'Africa',
            ),
            161 =>
            array(
                'id' => 162,
                'nama' => 'Niue',
                'region' => 'Oceania',
            ),
            162 =>
            array(
                'id' => 163,
                'nama' => 'Norfolk Island',
                'region' => 'Oceania',
            ),
            163 =>
            array(
                'id' => 164,
                'nama' => 'Northern Mariana Islands',
                'region' => 'Oceania',
            ),
            164 =>
            array(
                'id' => 165,
                'nama' => 'Norway',
                'region' => 'Europe',
            ),
            165 =>
            array(
                'id' => 166,
                'nama' => 'Oman',
                'region' => 'Asia',
            ),
            166 =>
            array(
                'id' => 167,
                'nama' => 'Pakistan',
                'region' => 'Asia',
            ),
            167 =>
            array(
                'id' => 168,
                'nama' => 'Palau',
                'region' => 'Oceania',
            ),
            168 =>
            array(
                'id' => 169,
                'nama' => 'Palestinian Territory Occupied',
                'region' => 'Asia',
            ),
            169 =>
            array(
                'id' => 170,
                'nama' => 'Panama',
                'region' => 'Americas',
            ),
            170 =>
            array(
                'id' => 171,
                'nama' => 'Papua new Guinea',
                'region' => 'Oceania',
            ),
            171 =>
            array(
                'id' => 172,
                'nama' => 'Paraguay',
                'region' => 'Americas',
            ),
            172 =>
            array(
                'id' => 173,
                'nama' => 'Peru',
                'region' => 'Americas',
            ),
            173 =>
            array(
                'id' => 174,
                'nama' => 'Philippines',
                'region' => 'Asia',
            ),
            174 =>
            array(
                'id' => 175,
                'nama' => 'Pitcairn Island',
                'region' => 'Oceania',
            ),
            175 =>
            array(
                'id' => 176,
                'nama' => 'Poland',
                'region' => 'Europe',
            ),
            176 =>
            array(
                'id' => 177,
                'nama' => 'Portugal',
                'region' => 'Europe',
            ),
            177 =>
            array(
                'id' => 178,
                'nama' => 'Puerto Rico',
                'region' => 'Americas',
            ),
            178 =>
            array(
                'id' => 179,
                'nama' => 'Qatar',
                'region' => 'Asia',
            ),
            179 =>
            array(
                'id' => 180,
                'nama' => 'Reunion',
                'region' => 'Africa',
            ),
            180 =>
            array(
                'id' => 181,
                'nama' => 'Romania',
                'region' => 'Europe',
            ),
            181 =>
            array(
                'id' => 182,
                'nama' => 'Russia',
                'region' => 'Europe',
            ),
            182 =>
            array(
                'id' => 183,
                'nama' => 'Rwanda',
                'region' => 'Africa',
            ),
            183 =>
            array(
                'id' => 184,
                'nama' => 'Saint Helena',
                'region' => 'Africa',
            ),
            184 =>
            array(
                'id' => 185,
                'nama' => 'Saint Kitts And Nevis',
                'region' => 'Americas',
            ),
            185 =>
            array(
                'id' => 186,
                'nama' => 'Saint Lucia',
                'region' => 'Americas',
            ),
            186 =>
            array(
                'id' => 187,
                'nama' => 'Saint Pierre and Miquelon',
                'region' => 'Americas',
            ),
            187 =>
            array(
                'id' => 188,
                'nama' => 'Saint Vincent And The Grenadines',
                'region' => 'Americas',
            ),
            188 =>
            array(
                'id' => 189,
                'nama' => 'Saint-Barthelemy',
                'region' => 'Americas',
            ),
            189 =>
            array(
                'id' => 190,
                'nama' => 'Saint-Martin (French part)',
                'region' => 'Americas',
            ),
            190 =>
            array(
                'id' => 191,
                'nama' => 'Samoa',
                'region' => 'Oceania',
            ),
            191 =>
            array(
                'id' => 192,
                'nama' => 'San Marino',
                'region' => 'Europe',
            ),
            192 =>
            array(
                'id' => 193,
                'nama' => 'Sao Tome and Principe',
                'region' => 'Africa',
            ),
            193 =>
            array(
                'id' => 194,
                'nama' => 'Saudi Arabia',
                'region' => 'Asia',
            ),
            194 =>
            array(
                'id' => 195,
                'nama' => 'Senegal',
                'region' => 'Africa',
            ),
            195 =>
            array(
                'id' => 196,
                'nama' => 'Serbia',
                'region' => 'Europe',
            ),
            196 =>
            array(
                'id' => 197,
                'nama' => 'Seychelles',
                'region' => 'Africa',
            ),
            197 =>
            array(
                'id' => 198,
                'nama' => 'Sierra Leone',
                'region' => 'Africa',
            ),
            198 =>
            array(
                'id' => 199,
                'nama' => 'Singapore',
                'region' => 'Asia',
            ),
            199 =>
            array(
                'id' => 200,
                'nama' => 'Slovakia',
                'region' => 'Europe',
            ),
            200 =>
            array(
                'id' => 201,
                'nama' => 'Slovenia',
                'region' => 'Europe',
            ),
            201 =>
            array(
                'id' => 202,
                'nama' => 'Solomon Islands',
                'region' => 'Oceania',
            ),
            202 =>
            array(
                'id' => 203,
                'nama' => 'Somalia',
                'region' => 'Africa',
            ),
            203 =>
            array(
                'id' => 204,
                'nama' => 'South Africa',
                'region' => 'Africa',
            ),
            204 =>
            array(
                'id' => 205,
                'nama' => 'South Georgia',
                'region' => 'Americas',
            ),
            205 =>
            array(
                'id' => 206,
                'nama' => 'South Sudan',
                'region' => 'Africa',
            ),
            206 =>
            array(
                'id' => 207,
                'nama' => 'Spain',
                'region' => 'Europe',
            ),
            207 =>
            array(
                'id' => 208,
                'nama' => 'Sri Lanka',
                'region' => 'Asia',
            ),
            208 =>
            array(
                'id' => 209,
                'nama' => 'Sudan',
                'region' => 'Africa',
            ),
            209 =>
            array(
                'id' => 210,
                'nama' => 'Suriname',
                'region' => 'Americas',
            ),
            210 =>
            array(
                'id' => 211,
                'nama' => 'Svalbard And Jan Mayen Islands',
                'region' => 'Europe',
            ),
            211 =>
            array(
                'id' => 212,
                'nama' => 'Swaziland',
                'region' => 'Africa',
            ),
            212 =>
            array(
                'id' => 213,
                'nama' => 'Sweden',
                'region' => 'Europe',
            ),
            213 =>
            array(
                'id' => 214,
                'nama' => 'Switzerland',
                'region' => 'Europe',
            ),
            214 =>
            array(
                'id' => 215,
                'nama' => 'Syria',
                'region' => 'Asia',
            ),
            215 =>
            array(
                'id' => 216,
                'nama' => 'Taiwan',
                'region' => 'Asia',
            ),
            216 =>
            array(
                'id' => 217,
                'nama' => 'Tajikistan',
                'region' => 'Asia',
            ),
            217 =>
            array(
                'id' => 218,
                'nama' => 'Tanzania',
                'region' => 'Africa',
            ),
            218 =>
            array(
                'id' => 219,
                'nama' => 'Thailand',
                'region' => 'Asia',
            ),
            219 =>
            array(
                'id' => 220,
                'nama' => 'Togo',
                'region' => 'Africa',
            ),
            220 =>
            array(
                'id' => 221,
                'nama' => 'Tokelau',
                'region' => 'Oceania',
            ),
            221 =>
            array(
                'id' => 222,
                'nama' => 'Tonga',
                'region' => 'Oceania',
            ),
            222 =>
            array(
                'id' => 223,
                'nama' => 'Trinidad And Tobago',
                'region' => 'Americas',
            ),
            223 =>
            array(
                'id' => 224,
                'nama' => 'Tunisia',
                'region' => 'Africa',
            ),
            224 =>
            array(
                'id' => 225,
                'nama' => 'Turkey',
                'region' => 'Asia',
            ),
            225 =>
            array(
                'id' => 226,
                'nama' => 'Turkmenistan',
                'region' => 'Asia',
            ),
            226 =>
            array(
                'id' => 227,
                'nama' => 'Turks And Caicos Islands',
                'region' => 'Americas',
            ),
            227 =>
            array(
                'id' => 228,
                'nama' => 'Tuvalu',
                'region' => 'Oceania',
            ),
            228 =>
            array(
                'id' => 229,
                'nama' => 'Uganda',
                'region' => 'Africa',
            ),
            229 =>
            array(
                'id' => 230,
                'nama' => 'Ukraine',
                'region' => 'Europe',
            ),
            230 =>
            array(
                'id' => 231,
                'nama' => 'United Arab Emirates',
                'region' => 'Asia',
            ),
            231 =>
            array(
                'id' => 232,
                'nama' => 'United Kingdom',
                'region' => 'Europe',
            ),
            232 =>
            array(
                'id' => 233,
                'nama' => 'United States',
                'region' => 'Americas',
            ),
            233 =>
            array(
                'id' => 234,
                'nama' => 'United States Minor Outlying Islands',
                'region' => 'Americas',
            ),
            234 =>
            array(
                'id' => 235,
                'nama' => 'Uruguay',
                'region' => 'Americas',
            ),
            235 =>
            array(
                'id' => 236,
                'nama' => 'Uzbekistan',
                'region' => 'Asia',
            ),
            236 =>
            array(
                'id' => 237,
                'nama' => 'Vanuatu',
                'region' => 'Oceania',
            ),
            237 =>
            array(
                'id' => 238,
                'nama' => 'Vatican City State (Holy See)',
                'region' => 'Europe',
            ),
            238 =>
            array(
                'id' => 239,
                'nama' => 'Venezuela',
                'region' => 'Americas',
            ),
            239 =>
            array(
                'id' => 240,
                'nama' => 'Vietnam',
                'region' => 'Asia',
            ),
            240 =>
            array(
                'id' => 241,
                'nama' => 'Virgin Islands (British)',
                'region' => 'Americas',
            ),
            241 =>
            array(
                'id' => 242,
                'nama' => 'Virgin Islands (US)',
                'region' => 'Americas',
            ),
            242 =>
            array(
                'id' => 243,
                'nama' => 'Wallis And Futuna Islands',
                'region' => 'Oceania',
            ),
            243 =>
            array(
                'id' => 244,
                'nama' => 'Western Sahara',
                'region' => 'Africa',
            ),
            244 =>
            array(
                'id' => 245,
                'nama' => 'Yemen',
                'region' => 'Asia',
            ),
            245 =>
            array(
                'id' => 246,
                'nama' => 'Zambia',
                'region' => 'Africa',
            ),
            246 =>
            array(
                'id' => 247,
                'nama' => 'Zimbabwe',
                'region' => 'Africa',
            ),
            247 =>
            array(
                'id' => 248,
                'nama' => 'Kosovo',
                'region' => 'Europe',
            ),
            248 =>
            array(
                'id' => 249,
                'nama' => 'Curaçao',
                'region' => 'Americas',
            ),
            249 =>
            array(
                'id' => 250,
                'nama' => 'Sint Maarten (Dutch part)',
                'region' => 'Americas',
            ),
        ));
    }
}
