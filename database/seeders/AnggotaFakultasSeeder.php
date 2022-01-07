<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnggotaFakultasSeeder extends Seeder
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
                'fakultas_id' => 1,                
            ], 

            [
                'ia_id' => 2,
                'fakultas_id' => 1,                
            ],
            [
                'ia_id' => 3,
                'fakultas_id' => 1,                
            ],
            [
                'ia_id' => 3,
                'fakultas_id' => 2,                
            ],
            [
                'ia_id' => 4,
                'fakultas_id' => 2,                
            ],
            [
                'ia_id' => 5,
                'fakultas_id' => 1,                
            ],
          
        ];

        DB::table('anggota_fakultas')->insert($data);
    }
}