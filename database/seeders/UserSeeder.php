<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ROLE : Admin, Fakultas, Pascasarjana, PSDKU, LPPM, Prodi, Unit Kerja
        // STATUS : 1 aktif, 0 tidak aktif
        $data = [
            [
                'nama' => 'Admin',
                'username' => 'admin',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'status' => 1,
                'fakultas_id' => null,
                'prodi_id' => null,
                'role' => 'Admin'
            ],
            [
                'nama' => 'Fakultas Teknik',
                'username' => 'fakultas',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'fakultas_id' => 1,
                'prodi_id' => null,
                'status' => 1,
                'role' => 'Fakultas'
            ],            
            [
                'nama' => 'Pascasarjana',
                'username' => 'pascasarjana',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'fakultas_id' => 3,
                'prodi_id' => null,
                'status' => 1,
                'role' => 'Pascasarjana'
            ],
            [
                'nama' => 'PSDKU',
                'username' => 'psdku',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'fakultas_id' => 4,
                'prodi_id' => null,
                'status' => 1,
                'role' => 'PSDKU'
            ],
            [
                'nama' => 'LPPM',
                'username' => 'LPPM',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'status' => 1,
                'fakultas_id' => null,
                'prodi_id' => null,
                'role' => 'LPPM'
            ],
            [
                'nama' => 'Prodi Informatika',
                'username' => 'prodi',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'fakultas_id' => 1,
                'prodi_id' => 1,
                'status' => 1,
                'role' => 'Prodi'
            ],
            [
                'nama' => 'Unit Kerja',
                'username' => 'unitkerja',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'fakultas_id' => 2,
                'prodi_id' => 6,
                'status' => 1,
                'role' => 'Unit Kerja'
            ],
            [
                'nama' => 'Fakultas Fisip',
                'username' => 'fakultas2',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'fakultas_id' => 2,
                'prodi_id' => null,
                'status' => 1,
                'role' => 'Fakultas'
            ],
            [
                'nama' => 'Prodi Ilmu Politik',
                'username' => 'prodi2',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'fakultas_id' => 2,
                'prodi_id' => 5,
                'status' => 1,
                'role' => 'Prodi'
            ],
        ];

        DB::table('users')->insert($data);
    }
}