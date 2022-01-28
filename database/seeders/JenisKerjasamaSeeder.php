<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisKerjasamaSeeder extends Seeder
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
                'ia_id' => 1,
                'jenis_kerjasama' => 'Pendidikan',                
            ], 

            [
                'ia_id' => 2,
                'jenis_kerjasama' => 'Penelitian',                
            ],
            [
                'ia_id' => 3,
                'jenis_kerjasama' => 'Pengabdian Kepada Masyarakat',                
            ],
            [
                'ia_id' => 3,
                'jenis_kerjasama' => 'Penelitian',                
            ],
            [
                'ia_id' => 4,
                'jenis_kerjasama' => 'Pengabdian Kepada Masyaraka',                
            ],
            [
                'ia_id' => 5,
                'jenis_kerjasama' => 'Penelitian',                
            ],
          
        ];

        DB::table('jenis_kerjasama')->insert($data);
    }
}