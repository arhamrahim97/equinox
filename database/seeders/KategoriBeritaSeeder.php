<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriBeritaSeeder extends Seeder
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
                'nama' => 'Universitas',
            ],
            [
                'nama' => 'Teknologi',
            ],
            [
                'nama' => 'Berita',
            ],
        ];

        DB::table('kategori_berita')->insert($data);
    }
}
