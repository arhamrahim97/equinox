<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AnggotaFakultasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('anggota_fakultas')->delete();
        
        \DB::table('anggota_fakultas')->insert(array (
            0 => 
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'fakultas_id' => 6,
                'ia_id' => 1,
                'id' => 1,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'fakultas_id' => 6,
                'ia_id' => 2,
                'id' => 2,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'fakultas_id' => 3,
                'ia_id' => 4,
                'id' => 5,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'fakultas_id' => 6,
                'ia_id' => 5,
                'id' => 6,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'created_at' => '2022-10-30 07:21:55',
                'deleted_at' => NULL,
                'fakultas_id' => 3,
                'ia_id' => 3,
                'id' => 7,
                'updated_at' => '2022-10-30 07:21:55',
            ),
            5 => 
            array (
                'created_at' => '2022-10-30 07:21:55',
                'deleted_at' => NULL,
                'fakultas_id' => 6,
                'ia_id' => 3,
                'id' => 8,
                'updated_at' => '2022-10-30 07:21:55',
            ),
            6 => 
            array (
                'created_at' => '2022-10-30 07:21:55',
                'deleted_at' => NULL,
                'fakultas_id' => 15,
                'ia_id' => 3,
                'id' => 9,
                'updated_at' => '2022-10-30 07:21:55',
            ),
        ));
        
        
    }
}