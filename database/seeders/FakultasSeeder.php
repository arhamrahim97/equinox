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
        $data = [
            [
                'nama' => 'Teknik'
            ],
            [
                'nama' => 'Ilmu Sosial dan Ilmu Politik'
            ],
            [
                'nama' => 'Pascasarjana'
            ],
            [
                'nama' => 'PSDKU UNTAD Tojo Una-Una'
            ],
        ];

        DB::table('fakultas')->insert($data);
    }
}