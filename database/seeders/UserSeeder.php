<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

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
            // admin
            [
                'id' => 1,
                'nama' => 'Admin',
                'username' => 'admin',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'fakultas_id' => null,
                'prodi_id' => null,
                'status' => 1,
                'role' => 'Admin'
            ],
            // fakultas, pascasarjana, psdku
            [
                'id' => 2,
                'nama' => 'LPPM',
                'username' => 'lppm',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'fakultas_id' => null,
                'prodi_id' => null,
                'status' => 1,
                'role' => 'LPPM'
            ],
            [
                'id' => 3,
                'nama' => 'Pascasarjana',
                'username' => 'pascasarjana',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'fakultas_id' => 12,
                'prodi_id' => null,
                'status' => 1,
                'role' => 'Pascasarjana'
            ],
            [
                'id' => 4,
                'nama' => 'Fakultas Keguruan dan Ilmu Pendidikan (FKIP)',
                'username' => 'fkip',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'fakultas_id' => 1,
                'prodi_id' => null,
                'status' => 1,
                'role' => 'Fakultas'
            ],
            [
                'id' => 5,
                'nama' => 'Fakultas Hukum (FAKUM)',
                'username' => 'fakum',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'fakultas_id' => 2,
                'prodi_id' => null,
                'status' => 1,
                'role' => 'Fakultas'
            ],
            [
                'id' => 6,
                'nama' => 'Fakultas Ilmu Sosial dan Ilmu Politik (FISIP)',
                'username' => 'fisip',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'fakultas_id' => 3,
                'prodi_id' => null,
                'status' => 1,
                'role' => 'Fakultas'
            ],
            [
                'id' => 7,
                'nama' => 'Fakultas Ekonomi (FEKON)',
                'username' => 'fekon',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'fakultas_id' => 4,
                'prodi_id' => null,
                'status' => 1,
                'role' => 'Fakultas'
            ],
            [
                'id' => 8,
                'nama' => 'Fakultas Pertanian (FAPERTA)',
                'username' => 'faperta',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'fakultas_id' => 5,
                'prodi_id' => null,
                'status' => 1,
                'role' => 'Fakultas'
            ],
            [
                'id' => 9,
                'nama' => 'Fakultas Teknik (FATEK)',
                'username' => 'fatek',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'fakultas_id' => 6,
                'prodi_id' => null,
                'status' => 1,
                'role' => 'Fakultas'
            ],
            [
                'id' => 10,
                'nama' => 'Fakultas Matematika dan Ilmu Pengetahuan Alam (FMIPA)',
                'username' => 'fmipa',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'fakultas_id' => 7,
                'prodi_id' => null,
                'status' => 1,
                'role' => 'Fakultas'
            ],
            [
                'id' => 11,
                'nama' => 'Fakultas Kehutanan (FAHUT)',
                'username' => 'fahut',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'fakultas_id' => 8,
                'prodi_id' => null,
                'status' => 1,
                'role' => 'Fakultas'
            ],
            [
                'id' => 12,
                'nama' => 'Fakultas Pertanian dan Perikanan (FAPETKAN)',
                'username' => 'fapetkan',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'fakultas_id' => 9,
                'prodi_id' => null,
                'status' => 1,
                'role' => 'Fakultas'
            ],
            [
                'id' => 13,
                'nama' => 'Fakultas Kedokteran (FK)',
                'username' => 'fk',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'fakultas_id' => 10,
                'prodi_id' => null,
                'status' => 1,
                'role' => 'Fakultas'
            ],
            [
                'id' => 14,
                'nama' => 'Fakultas Kesehatan Masyarakat (FKM)',
                'username' => 'fkm',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'fakultas_id' => 11,
                'prodi_id' => null,
                'status' => 1,
                'role' => 'Fakultas'
            ],
            [
                'id' => 15,
                'nama' => 'PSDKU UNTAD Tojo Una-Una',
                'username' => 'psdku_una',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'fakultas_id' => 13,
                'prodi_id' => null,
                'status' => 1,
                'role' => 'PSDKU'
            ],
            [
                'id' => 16,
                'nama' => 'PSDKU UNTAD Morowali',
                'username' => 'psdku_morowali',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'fakultas_id' => 14,
                'prodi_id' => null,
                'status' => 1,
                'role' => 'PSDKU'
            ],                                            
        ];
        
        DB::table('users')->insert($data);

        // FKIP | start : 17
        $fkip = array('Pendidikan Matematika (S1)', 'Pendidikan IPS (S1)', 'Pendidikan Guru SD (S1)', 'Pendidikan Anak Usia Dini (S1)', 'Pendidikan Sejarah (S1)', 'Pendidikan Pancasila & Kewarganegaraan (S1)', 'Bimbingan dan Konseling (S1)', 'Pendidikan Jasmani, Kesehatan, dan Rekreasi (S1)', 'Pendidikan Fisika (S1)', 'Pendidikan Biologi (S1)', 'Pendidikan Bahasa Indonesia (S1)', 'Pendidikan Bahasa Inggris (S1)', 'Pendidikan Geografi (S1)', 'Pendidikan Kimia (S1)');    
                
        for ($i = 0; $i < count($fkip); $i++) {            
            $user = [
                'nama' => $fkip[$i],
                'username' => 'fkip_prodi_'. floatval($i + 1),                
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'fakultas_id' => 1,
                'prodi_id' => floatval($i + 1),             
                'status' => 1,
                'role' => 'Prodi'
            ];
            DB::table('users')->insert($user);
        }

        // FAKUM | start : 31
        $fakum = array('Hukum (S1)'); 
        for ($i = 0; $i < count($fakum); $i++) {            
            $user = [
                'nama' => $fakum[$i],
                'username' => 'fakum_prodi_'. floatval($i + 1),                
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'fakultas_id' => 2,
                'prodi_id' => floatval($i + 15),             
                'status' => 1,
                'role' => 'Prodi'
            ];
            DB::table('users')->insert($user);
        }

        // FISIP | start : 32
        $fisip = array('Ilmu Pemerintahan (S1)', 'Sosiologi (S1)', 'Antropologi (S1)', 'Ilmu Administrasi Negara (S1)', 'Ilmu Komunikasi (S1)'); 
        for ($i = 0; $i < count($fisip); $i++) {            
            $user = [
                'nama' => $fisip[$i],
                'username' => 'fisip_prodi_'. floatval($i + 1),                
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'fakultas_id' => 3,
                'prodi_id' => floatval($i + 16),             
                'status' => 1,
                'role' => 'Prodi'
            ];
            DB::table('users')->insert($user);
        }

        // FEKON | start : 37
        $fekon = array('Ilmu Ekonomi Pembangunan (S1)', 'Manajemen (S1)', 'Akuntansi (S1)', 'Akuntansi (D3)', 'Manajemen Pemasaran (D3)'); 
        for ($i = 0; $i < count($fekon); $i++) {            
            $user = [
                'nama' => $fekon[$i],
                'username' => 'fekon_prodi_'. floatval($i + 1),                
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'fakultas_id' => 4,
                'prodi_id' => floatval($i + 21),             
                'status' => 1,
                'role' => 'Prodi'
            ];
            DB::table('users')->insert($user);
        }

        // FAPERTA | start : 42
        $faperta = array('Agroteknologi (S1)', 'Agribisnis (S1)'); 
        for ($i = 0; $i < count($faperta); $i++) {            
            $user = [
                'nama' => $faperta[$i],
                'username' => 'faperta_prodi_'. floatval($i + 1),                
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'fakultas_id' => 5,
                'prodi_id' => floatval($i + 26),             
                'status' => 1,
                'role' => 'Prodi'
            ];
            DB::table('users')->insert($user);
        }

        // FATEK | start : 44
        $fatek = array('Teknik Arsitektur (S1)', 'Teknik Perancangan Wilayah Kota (S1)', 'Teknik Sipil (S1)', 'Teknik Informatika (S1)', 'Teknik Geologi (S1)', 'Teknik Mesin (S1)', 'Teknik Elektro (S1)', 'Teknik Geofisika (S1)', 'Teknik Elektro (D3)', 'Teknik Bangunan (D3)', 'Teknik Mesin (D3)', 'Teknik Sipil (D3)'); 
        for ($i = 0; $i < count($fatek); $i++) {            
            $user = [
                'nama' => $fatek[$i],
                'username' => 'fatek_prodi_'. floatval($i + 1),                
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'fakultas_id' => 6,
                'prodi_id' => floatval($i + 28),             
                'status' => 1,
                'role' => 'Prodi'
            ];
            DB::table('users')->insert($user);
        }

        // FMIPA | start : 56
        $fmipa = array('Fisika (S1)', 'Statistik (S1)', 'Kimia (S1)', 'Matematika (S1)', 'Farmasi (S1)', 'Biologi (S1)'); 
        for ($i = 0; $i < count($fmipa); $i++) {            
            $user = [
                'nama' => $fmipa[$i],
                'username' => 'fmipa_prodi_'. floatval($i + 1),                
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'fakultas_id' => 7,
                'prodi_id' => floatval($i + 40),             
                'status' => 1,
                'role' => 'Prodi'
            ];
            DB::table('users')->insert($user);
        }

        // FAHUT | start : 62
        $fahut = array('Kehutanan (S1)', 'Konservasi Hutan (S1)'); 
        for ($i = 0; $i < count($fahut); $i++) {            
            $user = [
                'nama' => $fahut[$i],
                'username' => 'fahut_prodi_'. floatval($i + 1),                
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'fakultas_id' => 8,
                'prodi_id' => floatval($i + 46),             
                'status' => 1,
                'role' => 'Prodi'
            ];
            DB::table('users')->insert($user);
        }

        // FAPETKAN | start : 64
        $fapetkan = array('Perikanan (S1)', 'Peternakan (S1)'); 
        for ($i = 0; $i < count($fapetkan); $i++) {            
            $user = [
                'nama' => $fapetkan[$i],
                'username' => 'fapetkan_prodi_'. floatval($i + 1),                
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'fakultas_id' => 9,
                'prodi_id' => floatval($i + 48),             
                'status' => 1,
                'role' => 'Prodi'
            ];
            DB::table('users')->insert($user);
        }
        
        // FK | start : 66
        $fk = array('Pendidikan Kedokteran (S1)'); 
        for ($i = 0; $i < count($fk); $i++) {            
            $user = [
                'nama' => $fk[$i],
                'username' => 'fk_prodi_'. floatval($i + 1),                
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'fakultas_id' => 10,
                'prodi_id' => floatval($i + 50),             
                'status' => 1,
                'role' => 'Prodi'
            ];
            DB::table('users')->insert($user);
        }        

        // FKM | start : 67
        $fkm = array('Kesehatan Masyarakat (S1)', 'Gizi (S1)'); 
        for ($i = 0; $i < count($fkm); $i++) {            
            $user = [
                'nama' => $fkm[$i],
                'username' => 'fkm_prodi_'. floatval($i + 1),                
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'fakultas_id' => 11,
                'prodi_id' => floatval($i + 51),             
                'status' => 1,
                'role' => 'Prodi'
            ];
            DB::table('users')->insert($user);
        }

        // Pascasarjana | start : 69
        $pascasarjana = array('Pendidikan Matematika (S2)', 'Pendidikan Bahasa Inggris (S2)', 'Pendidikan Sejarah (S2)', 'Pendidikan IPA (S2)', 'Pendidikan IPS (S2)', 'Pendidikan Bahasa Indonesia (S2)', 'Ilmu Hukum (S2)', 'Ilmu Administrasi Publik (S2)', 'Akuntansi (S2)', 'Manajemen (S2)', 'Ilmu Ekonomi (S2)', 'Ilmu Pertanian (S2)', 'Agribisnis (S2)', 'Teknik Sipil (S2)', 'Teknik Perancangan Wilayah Desa (S2)'); 
        for ($i = 0; $i < count($pascasarjana); $i++) {            
            $user = [
                'nama' => $pascasarjana[$i],
                'username' => 'pascasarjana_prodi_'. floatval($i + 1),                
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'fakultas_id' => 12,
                'prodi_id' => floatval($i + 53),             
                'status' => 1,
                'role' => 'Pascasarjana'
            ];
            DB::table('users')->insert($user);
        }

        // PSDKU Tojo Una-una | start : 84
        $psdkutojo = array('Manajemen (S1) - PSDKU Tojo Una-una', 'Agroteknologi (S1) - PSDKU Tojo Una-una', 'Teknik Sipil (S1) - PSDKU Tojo Una-una'); 
        for ($i = 0; $i < count($psdkutojo); $i++) {            
            $user = [
                'nama' => $psdkutojo[$i],
                'username' => 'psdku_tojo_una_prodi_'. floatval($i + 1),                
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'fakultas_id' => 13,
                'prodi_id' => floatval($i + 68),             
                'status' => 1,
                'role' => 'PSDKU'
            ];
            DB::table('users')->insert($user);
        }

        // PSDKU Morowali | start : 87
        $psdkumorowali = array('Manajemen (S1) - PSDKU Morowali', 'Agroteknologi (S1) - PSDKU Morowali', 'Teknik Sipil (S1) - PSDKU Morowali'); 
        for ($i = 0; $i < count($psdkumorowali); $i++) {            
            $user = [
                'nama' => $psdkumorowali[$i],
                'username' => 'psdku_morowali_prodi_'. floatval($i + 1),                
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'fakultas_id' => 14,
                'prodi_id' => floatval($i + 71),             
                'status' => 1,
                'role' => 'PSDKU'
            ];
            DB::table('users')->insert($user);
        }        

        // Unit Kerja | start : 90      
        $unit_kerja = array('UPT. Bahasa', 'UPT. TIK', 'UPT. Herbarium', 'UPT. Perpustakaan', 'UPT. Natalia', 'UPT. LABDAS', 'Pusat Pengembangan Usaha (PPU)', 'Pusat International Office (IO)', 'Sentra HKI'); 
        for ($i = 0; $i < count($unit_kerja); $i++) {            
            $user = [
                'nama' => $unit_kerja[$i],
                'username' => 'unit_kerja_prodi_'. floatval($i + 1),                
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'fakultas_id' => 15,
                'prodi_id' => floatval($i + 74),             
                'status' => 1,
                'role' => 'Unit Kerja'
            ];
            DB::table('users')->insert($user);
        }
       
        // DUMMY       
        // $nama = array('Prodi Informatika', 'Ilmu Pemerintahan', 'Ilmu Administrasi Negara', 'Fakultas Teknik 2', 'Admin 2');
        // $username = array('prodi', 'prodi2', 'prodi3', 'fakultas', 'admin2');
        // $fakultas_id = array(6, 3, 3, 6, NULL);
        // $prodi_id = array(31, 16, 19, NULL, NULL);
        // $role = array('Prodi', 'Prodi', 'Prodi', 'Fakultas', 'Admin');
        // for ($i = 0; $i < count($nama); $i++) {
        //     $user = [
        //         'nama' => $nama[$i],
        //         'username' => $username[$i],                
        //         'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //         'fakultas_id' => $fakultas_id[$i],
        //         'prodi_id' => $prodi_id[$i],
        //         'status' => 1,
        //         'role' => $role[$i]
        //     ];
        //     DB::table('users')->insert($user);
        // }      
    }
}