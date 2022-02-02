<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnggotaProdiSeeder extends Seeder
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
                'prodi_id' => 31,                
            ],
            [
                'ia_id' => 1,
                'prodi_id' => 30,                
            ],
            [
                'ia_id' => 1,
                'prodi_id' => 32,                
            ],

            [
                'ia_id' => 2,
                'prodi_id' => 31,                
            ],
            [
                'ia_id' => 2,
                'prodi_id' => 32,                
            ],

            [
                'ia_id' => 3,
                'prodi_id' => 31,                
            ],  
            [
                'ia_id' => 3,
                'prodi_id' => 30,                
            ],  
            [
                'ia_id' => 3,
                'prodi_id' => 20,                
            ],  [
                'ia_id' => 3,
                'prodi_id' => 19,                
            ],      
            [
                'ia_id' => 4,
                'prodi_id' => 20,                
            ],  
            [
                'ia_id' => 4,
                'prodi_id' => 19,                
            ],   
            [
                'ia_id' => 5,
                'prodi_id' => 31,                
            ],                   
        ];

        DB::table('anggota_prodi')->insert($data);
    }
}