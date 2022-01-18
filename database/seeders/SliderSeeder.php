<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderSeeder extends Seeder
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
                'nama' => 'SIMOU',
                'foto' => '1.png'
            ],
            [
                'nama' => 'MOU',
                'foto' => '2.png'
            ],
            [
                'nama' => 'MOA',
                'foto' => '3.png'
            ],
            [
                'nama' => 'IA',
                'foto' => '4.png'
            ],
        ];

        DB::table('slider')->insert($data);
    }
}
