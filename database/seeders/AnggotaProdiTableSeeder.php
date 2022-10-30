<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AnggotaProdiTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('anggota_prodi')->delete();
        
        \DB::table('anggota_prodi')->insert(array (
            0 => 
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'ia_id' => 2,
                'id' => 4,
                'prodi_id' => 31,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'ia_id' => 2,
                'id' => 5,
                'prodi_id' => 32,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'ia_id' => 4,
                'id' => 10,
                'prodi_id' => 20,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'ia_id' => 4,
                'id' => 11,
                'prodi_id' => 19,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'ia_id' => 5,
                'id' => 12,
                'prodi_id' => 31,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'created_at' => '2022-10-30 07:12:39',
                'deleted_at' => NULL,
                'ia_id' => 1,
                'id' => 13,
                'prodi_id' => 30,
                'updated_at' => '2022-10-30 07:12:39',
            ),
            6 => 
            array (
                'created_at' => '2022-10-30 07:12:39',
                'deleted_at' => NULL,
                'ia_id' => 1,
                'id' => 14,
                'prodi_id' => 32,
                'updated_at' => '2022-10-30 07:12:39',
            ),
            7 => 
            array (
                'created_at' => '2022-10-30 07:21:55',
                'deleted_at' => NULL,
                'ia_id' => 3,
                'id' => 15,
                'prodi_id' => 19,
                'updated_at' => '2022-10-30 07:21:55',
            ),
            8 => 
            array (
                'created_at' => '2022-10-30 07:21:55',
                'deleted_at' => NULL,
                'ia_id' => 3,
                'id' => 16,
                'prodi_id' => 30,
                'updated_at' => '2022-10-30 07:21:55',
            ),
            9 => 
            array (
                'created_at' => '2022-10-30 07:21:55',
                'deleted_at' => NULL,
                'ia_id' => 3,
                'id' => 17,
                'prodi_id' => 31,
                'updated_at' => '2022-10-30 07:21:55',
            ),
            10 => 
            array (
                'created_at' => '2022-10-30 07:21:55',
                'deleted_at' => NULL,
                'ia_id' => 3,
                'id' => 18,
                'prodi_id' => 75,
                'updated_at' => '2022-10-30 07:21:55',
            ),
        ));
        
        
    }
}