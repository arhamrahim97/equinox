<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            // Teknik
            [
                'nama' => 'Teknik Informatika',
                'fakultas_id' => 1,
                'is_unit_kerja' => 0,
            ],
            [
                'nama' => 'Teknik Sipil',
                'fakultas_id' => 1,
                'is_unit_kerja' => 0,
            ],
            [
                'nama' => 'Perpustakaan Teknik',
                'fakultas_id' => 1,
                'is_unit_kerja' => 1,
            ],
            // FISIP
            [
                'nama' => 'Ilmu Komunikasi',
                'fakultas_id' => 2,
                'is_unit_kerja' => 0,
            ],
            [
                'nama' => 'Ilmu Politik',
                'fakultas_id' => 2,
                'is_unit_kerja' => 0,
            ],
            [
                'nama' => 'Perpustakaan FISIP',
                'fakultas_id' => 2,
                'is_unit_kerja' => 1,
            ],
            // Pascasarjana
            [
                'nama' => 'Master Pendidikan Matematika',
                'fakultas_id' => 3,
                'is_unit_kerja' => 0,
            ],
            [
                'nama' => 'Master Pendidikan Sejarah',
                'fakultas_id' => 3,
                'is_unit_kerja' => 0,
            ],
            [
                'nama' => 'Master Pendidikan IPS',
                'fakultas_id' => 3,
                'is_unit_kerja' => 0,
            ],
            // PSDKU
            [
                'nama' => 'Manajemen',
                'fakultas_id' => 4,
                'is_unit_kerja' => 0,
            ],
            [
                'nama' => 'Agroteknologi',
                'fakultas_id' => 4,
                'is_unit_kerja' => 0,
            ],
            [
                'nama' => 'Sipil',
                'fakultas_id' => 4,
                'is_unit_kerja' => 0,
            ],
        ];

        DB::table('prodi')->insert($data);
    }
}
