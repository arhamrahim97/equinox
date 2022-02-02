<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $data = [
        //     [
        //         'nama' => 'Teknik'
        //     ],
        //     [
        //         'nama' => 'Ilmu Sosial dan Ilmu Politik'
        //     ],
        //     [
        //         'nama' => 'Pascasarjana'
        //     ],
        //     [
        //         'nama' => 'PSDKU UNTAD Tojo Una-Una'
        //     ],
        // ];

        $data = [
            [
                'id' => 1,
                'nama' => 'Fakultas Keguruan dan Ilmu Pendidikan (FKIP)',
            ],
            [
                'id' => 2,
                'nama' => 'Fakultas Hukum (FAKUM)',
            ],
            [
                'id' => 3,
                'nama' => 'Fakultas Ilmu Sosial dan Ilmu Politik (FISIP)',
            ],
            [
                'id' => 4,
                'nama' => 'Fakultas Ekonomi (FEKON)',
            ],
            [
                'id' => 5,
                'nama' => 'Fakultas Pertanian (FAPERTA)',
            ],
            [
                'id' => 6,
                'nama' => 'Fakultas Teknik (FATEK)',
            ],
            [
                'id' => 7,
                'nama' => 'Fakultas Matematika dan Ilmu Pengetahuan Alam (FMIPA)',
            ],
            [
                'id' => 8,
                'nama' => 'Fakultas Kehutanan (FAHUT)',
            ],
            [
                'id' => 9,
                'nama' => 'Fakultas Pertanian dan Perikanan (FAPETKAN)',
            ],
            [
                'id' => 10,
                'nama' => 'Fakultas Kedokteran (FK)',
            ],
            [
                'id' => 11,
                'nama' => 'Fakultas Kesehatan Masyarakat (FKM)',
            ],
            [
                'id' => 12,
                'nama' => 'Pascasarjana',
            ],
            [
                'id' => 13,
                'nama' => 'PSDKU UNTAD Tojo Una-Una'
            ],
            [
                'id' => 14,
                'nama' => 'PSDKU UNTAD Morowali'
            ],
            [
                'id' => 15,
                'nama' => 'Unit Kerja'
            ],
            
        ];
        DB::table('fakultas')->insert($data);
    }
}