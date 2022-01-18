<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TentangSeeder extends Seeder
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
                'nama' => 'MOU',
                'konten' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur maxime aliquam officiis ad fugit! Voluptates provident ullam et assumenda fuga',
                'bahasa' => 'Indonesia'
            ],
            [
                'nama' => 'MOA',
                'konten' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur maxime aliquam officiis ad fugit! Voluptates provident ullam et assumenda fuga',
                'bahasa' => 'Indonesia'
            ],
            [
                'nama' => 'IA',
                'konten' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur maxime aliquam officiis ad fugit! Voluptates provident ullam et assumenda fuga',
                'bahasa' => 'Indonesia'
            ],
            [
                'nama' => 'MOU',
                'konten' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur maxime aliquam officiis ad fugit! Voluptates provident ullam et assumenda fuga',
                'bahasa' => 'Inggris'
            ],
            [
                'nama' => 'MOA',
                'konten' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur maxime aliquam officiis ad fugit! Voluptates provident ullam et assumenda fuga',
                'bahasa' => 'Inggris'
            ],
            [
                'nama' => 'IA',
                'konten' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur maxime aliquam officiis ad fugit! Voluptates provident ullam et assumenda fuga',
                'bahasa' => 'Inggris'
            ],
        ];

        DB::table('tentang')->insert($data);
    }
}
