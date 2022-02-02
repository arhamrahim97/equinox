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
            // FKIP
            [
                'id' => 1,
                'nama' => 'Pendidikan Matematika (S1)',
                'fakultas_id' => 1,
                'is_unit_kerja' => 0,
            ],
            [
                'id' => 2,
                'nama' => 'Pendidikan IPS (S1)', 
                'fakultas_id' => 1,
                'is_unit_kerja' => 0,
            ],
            [
                'id' => 3,
                'nama' => 'Pendidikan Guru SD (S1)',
                'fakultas_id' => 1,
                'is_unit_kerja' => 0,
            ],
            [
                'id' => 4,
                'nama' => 'Pendidikan Anak Usia Dini (S1)',
                'fakultas_id' => 1,
                'is_unit_kerja' => 0,
            ],
            [
                'id' => 5,
                'nama' => 'Pendidikan Sejarah (S1)',
                'fakultas_id' => 1,
                'is_unit_kerja' => 0,
            ],
            [
                'id' => 6,
                'nama' => 'Pendidikan Pancasila & Kewarganegaraan (S1)',
                'fakultas_id' => 1,
                'is_unit_kerja' => 0,
            ],
            [
                'id' => 7,
                'nama' => 'Bimbingan dan Konseling (S1)',
                'fakultas_id' => 1,
                'is_unit_kerja' => 0,
            ],   
            [
                'id' => 8,
                'nama' => 'Pendidikan Jasmani, Kesehatan, dan Rekreasi (S1)',
                'fakultas_id' => 1,
                'is_unit_kerja' => 0,
            ],
            [
                'id' => 9,
                'nama' => 'Pendidikan Fisika (S1)',
                'fakultas_id' => 1,
                'is_unit_kerja' => 0,
            ],
            [
                'id' => 10,
                'nama' => 'Pendidikan Biologi (S1)',
                'fakultas_id' => 1,
                'is_unit_kerja' => 0,
            ],
            [    
                'id' => 11,            
                'nama' => 'Pendidikan Bahasa Indonesia (S1)', //
                'fakultas_id' => 1,
                'is_unit_kerja' => 0,
            ],
            [
                'id' => 12,
                'nama' => 'Pendidikan Bahasa Inggris (S1)',
                'fakultas_id' => 1,
                'is_unit_kerja' => 0,
            ],
            [
                'id' => 13,
                'nama' => 'Pendidikan Geografi (S1)',
                'fakultas_id' => 1,
                'is_unit_kerja' => 0,
            ],
            [
                'id' => 14,
                'nama' => 'Pendidikan Kimia (S1)',
                'fakultas_id' => 1,
                'is_unit_kerja' => 0,
            ],
            
            // FAKUM
            [
                'id' => 15,
                'nama' => 'Hukum (S1)',
                'fakultas_id' => 2,
                'is_unit_kerja' => 0,
            ],   

            // FISIP
            [
                'id' => 16,
                'nama' => 'Ilmu Pemerintahan (S1)',
                'fakultas_id' => 3,
                'is_unit_kerja' => 0,
            ],   
            [
                'id' => 17,
                'nama' => 'Sosiologi (S1)',
                'fakultas_id' => 3,
                'is_unit_kerja' => 0,
            ],   
            [
                'id' => 18,
                'nama' => 'Antropologi (S1)',
                'fakultas_id' => 3,
                'is_unit_kerja' => 0,
            ],   
            [
                'id' => 19,
                'nama' => 'Ilmu Administrasi Negara (S1)',
                'fakultas_id' => 3,
                'is_unit_kerja' => 0,
            ],   
            [
                'id' => 20,
                'nama' => 'Ilmu Komunikasi (S1)',
                'fakultas_id' => 3,
                'is_unit_kerja' => 0,
            ],               

            // FEKON
            [
                'id' => 21,
                'nama' => 'Ilmu Ekonomi Pembangunan (S1)',
                'fakultas_id' => 4,
                'is_unit_kerja' => 0,
            ],   
            [
                'id' => 22,
                'nama' => 'Manajemen (S1)',
                'fakultas_id' => 4,
                'is_unit_kerja' => 0,
            ],   
            [
                'id' => 23,
                'nama' => 'Akuntansi (S1)',
                'fakultas_id' => 4,
                'is_unit_kerja' => 0,
            ],   
            [
                'id' => 24,
                'nama' => 'Akuntansi (D3)',
                'fakultas_id' => 4,
                'is_unit_kerja' => 0,
            ],   
            [
                'id' => 25,
                'nama' => 'Manajemen Pemasaran (D3)',
                'fakultas_id' => 4,
                'is_unit_kerja' => 0,
            ],   

            // FAPERTA
            [
                'id' => 26,
                'nama' => 'Agroteknologi (S1)',
                'fakultas_id' => 5,
                'is_unit_kerja' => 0,
            ],   
            [
                'id' => 27,
                'nama' => 'Agribisnis (S1)',
                'fakultas_id' => 5,
                'is_unit_kerja' => 0,
            ],   

            // FATEK
            [
                'id' => 28,
                'nama' => 'Teknik Arsitektur (S1)',
                'fakultas_id' => 6,
                'is_unit_kerja' => 0,
            ],               
            [
                'id' => 29,
                'nama' => 'Teknik Perancangan Wilayah Kota (S1)',
                'fakultas_id' => 6,
                'is_unit_kerja' => 0,
            ],   
            [
                'id' => 30,
                'nama' => 'Teknik Sipil (S1)',
                'fakultas_id' => 6,
                'is_unit_kerja' => 0,
            ],   
            [
                'id' => 31,
                'nama' => 'Teknik Informatika (S1)',
                'fakultas_id' => 6,
                'is_unit_kerja' => 0,
            ],   
            [
                'id' => 32,
                'nama' => 'Teknik Geologi (S1)',
                'fakultas_id' => 6,
                'is_unit_kerja' => 0,
            ],   
            [
                'id' => 33,
                'nama' => 'Teknik Mesin (S1)',
                'fakultas_id' => 6,
                'is_unit_kerja' => 0,
            ],   
            [
                'id' => 34,
                'nama' => 'Teknik Elektro (S1)',
                'fakultas_id' => 6,
                'is_unit_kerja' => 0,
            ],   
            [
                'id' => 35,
                'nama' => 'Teknik Geofisika (S1)',
                'fakultas_id' => 6,
                'is_unit_kerja' => 0,
            ],   
            [
                'id' => 36,
                'nama' => 'Teknik Elektro (D3)',
                'fakultas_id' => 6,
                'is_unit_kerja' => 0,
            ],   
            [
                'id' => 37,
                'nama' => 'Teknik Bangunan (D3)',
                'fakultas_id' => 6,
                'is_unit_kerja' => 0,
            ],   
            [
                'id' => 38,
                'nama' => 'Teknik Mesin (D3)',
                'fakultas_id' => 6,
                'is_unit_kerja' => 0,
            ],   
            [
                'id' => 39,
                'nama' => 'Teknik Sipil (D3)',
                'fakultas_id' => 6,
                'is_unit_kerja' => 0,
            ],   

            // FMIPA
            [
                'id' => 40,
                'nama' => 'Fisika (S1)',
                'fakultas_id' => 7,
                'is_unit_kerja' => 0,
            ], 
            [
                'id' => 41,
                'nama' => 'Statistik (S1)',
                'fakultas_id' => 7,
                'is_unit_kerja' => 0,
            ], 
            [
                'id' => 42,
                'nama' => 'Kimia (S1)',
                'fakultas_id' => 7,
                'is_unit_kerja' => 0,
            ], 
            [
                'id' => 43,
                'nama' => 'Matematika (S1)',
                'fakultas_id' => 7,
                'is_unit_kerja' => 0,
            ], 
            [
                'id' => 44,
                'nama' => 'Farmasi (S1)',
                'fakultas_id' => 7,
                'is_unit_kerja' => 0,
            ], 
            [
                'id' => 45,
                'nama' => 'Biologi (S1)',
                'fakultas_id' => 7,
                'is_unit_kerja' => 0,
            ],      
            
            // FAHUT
            [
                'id' => 46,
                'nama' => 'Kehutanan (S1)',
                'fakultas_id' => 8,
                'is_unit_kerja' => 0,
            ],      
            [
                'id' => 47,
                'nama' => 'Konservasi Hutan (S1)',
                'fakultas_id' => 8,
                'is_unit_kerja' => 0,
            ],    
            
            // FAPETKAN
            [
                'id' => 48,
                'nama' => 'Perikanan (S1)',
                'fakultas_id' => 9,
                'is_unit_kerja' => 0,
            ],   
            [
                'id' => 49,
                'nama' => 'Peternakan (S1)',
                'fakultas_id' => 9,
                'is_unit_kerja' => 0,
            ],  
            
            // FK
            [
                'id' => 50,
                'nama' => 'Pendidikan Kedokteran (S1)',
                'fakultas_id' => 10,
                'is_unit_kerja' => 0,
            ],   

            // FKM
            [
                'id' => 51,
                'nama' => 'Kesehatan Masyarakat (S1)',
                'fakultas_id' => 11,
                'is_unit_kerja' => 0,
            ],  
            [
                'id' => 52,
                'nama' => 'Gizi (S1)',
                'fakultas_id' => 11,
                'is_unit_kerja' => 0,
            ],   

            // Pascasarjana
            [
                'id' => 53,
                'nama' => 'Pendidikan Matematika (S2)',
                'fakultas_id' => 12,
                'is_unit_kerja' => 0,
            ],   
            [
                'id' => 54,
                'nama' => 'Pendidikan Bahasa Inggris (S2)',
                'fakultas_id' => 12,
                'is_unit_kerja' => 0,
            ],   
            [
                'id' => 55,
                'nama' => 'Pendidikan Sejarah (S2)',
                'fakultas_id' => 12,
                'is_unit_kerja' => 0,
            ],   
            [
                'id' => 56,
                'nama' => 'Pendidikan IPA (S2)',
                'fakultas_id' => 12,
                'is_unit_kerja' => 0,
            ],   
            [
                'id' => 57,
                'nama' => 'Pendidikan IPS (S2)',
                'fakultas_id' => 12,
                'is_unit_kerja' => 0,
            ],   
            [
                'id' => 58,
                'nama' => 'Pendidikan Bahasa Indonesia (S2)',
                'fakultas_id' => 12,
                'is_unit_kerja' => 0,
            ],              
            [
                'id' => 59,
                'nama' => 'Ilmu Hukum (S2)',
                'fakultas_id' => 12,
                'is_unit_kerja' => 0,
            ],   
            [
                'id' => 60,
                'nama' => 'Ilmu Administrasi Publik (S2)',
                'fakultas_id' => 12,
                'is_unit_kerja' => 0,
            ],   
            [
                'id' => 61,
                'nama' => 'Akuntansi (S2)',
                'fakultas_id' => 12,
                'is_unit_kerja' => 0,
            ],   
            [
                'id' => 62,
                'nama' => 'Manajemen (S2)',
                'fakultas_id' => 12,
                'is_unit_kerja' => 0,
            ],   
            [
                'id' => 63,
                'nama' => 'Ilmu Ekonomi (S2)',
                'fakultas_id' => 12,
                'is_unit_kerja' => 0,
            ],   
            [
                'id' => 64,
                'nama' => 'Ilmu Pertanian (S2)',
                'fakultas_id' => 12,
                'is_unit_kerja' => 0,
            ],   
            [
                'id' => 65,
                'nama' => 'Agribisnis (S2)',
                'fakultas_id' => 12,
                'is_unit_kerja' => 0,
            ],    
            [
                'id' => 66,
                'nama' => 'Teknik Sipil (S2)',
                'fakultas_id' => 12,
                'is_unit_kerja' => 0,
            ],   
            [
                'id' => 67,
                'nama' => 'Teknik Perancangan Wilayah Desa (S2)',
                'fakultas_id' => 12,
                'is_unit_kerja' => 0,
            ],    
            
            // PSDKU Tojo Una-una
            [
                'id' => 68,
                'nama' => 'Manajemen (S1) - PSDKU Tojo Una-una',
                'fakultas_id' => 13,
                'is_unit_kerja' => 0,
            ],    
            [
                'id' => 69,
                'nama' => 'Agroteknologi (S1) - PSDKU Tojo Una-una',
                'fakultas_id' => 13,
                'is_unit_kerja' => 0,
            ],  
            [
                'id' => 70,
                'nama' => 'Teknik Sipil (S1) - PSDKU Tojo Una-una',
                'fakultas_id' => 13,
                'is_unit_kerja' => 0,
            ],  

            // PSDKU Morowali
            [
                'id' => 71,
                'nama' => 'Manajemen (S1) - PSDKU Morowali',
                'fakultas_id' => 14,
                'is_unit_kerja' => 0,
            ],    
            [
                'id' => 72,
                'nama' => 'Agroteknologi (S1) - PSDKU Morowali',
                'fakultas_id' => 14,
                'is_unit_kerja' => 0,
            ],  
            [
                'id' => 73,
                'nama' => 'Teknik Sipil (S1) - PSDKU Morowali',
                'fakultas_id' => 14,
                'is_unit_kerja' => 0,
            ],  

            // Unit Kerja
            [
                'id' => 74,
                'nama' => 'UPT. Bahasa',
                'fakultas_id' => 15,
                'is_unit_kerja' => 1,
            ], 
            [
                'id' => 75,
                'nama' => 'UPT. TIK',
                'fakultas_id' => 15,
                'is_unit_kerja' => 1,
            ],  
            [
                'id' => 76,
                'nama' => 'UPT. Herbarium',
                'fakultas_id' => 15,
                'is_unit_kerja' => 1,
            ],  
            [
                'id' => 77,
                'nama' => 'UPT. Perpustakaan',
                'fakultas_id' => 15,
                'is_unit_kerja' => 1,
            ],  
            [
                'id' => 78,
                'nama' => 'UPT. Natalia',
                'fakultas_id' => 15,
                'is_unit_kerja' => 1,
            ],  
            [
                'id' => 79,
                'nama' => 'UPT. LABDAS',
                'fakultas_id' => 15,
                'is_unit_kerja' => 1,
            ], 
            [
                'id' => 80,
                'nama' => 'Pusat Pengembangan Usaha (PPU)',
                'fakultas_id' => 15,
                'is_unit_kerja' => 1,
            ], 
            [
                'id' => 81,
                'nama' => 'Pusat International Office (IO)',
                'fakultas_id' => 15,
                'is_unit_kerja' => 1,
            ], 
            [
                'id' => 82,
                'nama' => 'Sentra HKI',
                'fakultas_id' => 15,
                'is_unit_kerja' => 1,
            ], 
        ];


        // Dummy    
        // $data = [            
        //     // Teknik
        //     [
        //         'nama' => 'Teknik Informatika',
        //         'fakultas_id' => 6,
        //         'is_unit_kerja' => 0,
        //     ],
        //     [
        //         'nama' => 'Teknik Sipil',
        //         'fakultas_id' => 6,
        //         'is_unit_kerja' => 0,
        //     ],
        //     [
        //         'nama' => 'Perpustakaan Teknik',
        //         'fakultas_id' => 6,
        //         'is_unit_kerja' => 1,
        //     ],
        //     // FISIP
        //     [
        //         'nama' => 'Ilmu Komunikasi',
        //         'fakultas_id' => 3,
        //         'is_unit_kerja' => 0,
        //     ],
        //     [
        //         'nama' => 'Ilmu Politik',
        //         'fakultas_id' => 3,
        //         'is_unit_kerja' => 0,
        //     ],
        //     [
        //         'nama' => 'Perpustakaan FISIP',
        //         'fakultas_id' => 3,
        //         'is_unit_kerja' => 1,
        //     ],

        //     // Pascasarjana
        //     [
        //         'nama' => 'Master Pendidikan Matematika',
        //         'fakultas_id' => 12,
        //         'is_unit_kerja' => 0,
        //     ],
        //     [
        //         'nama' => 'Master Pendidikan Sejarah',
        //         'fakultas_id' => 12,
        //         'is_unit_kerja' => 0,
        //     ],
        //     [
        //         'nama' => 'Master Pendidikan IPS',
        //         'fakultas_id' => 12,
        //         'is_unit_kerja' => 0,
        //     ],
            
        //     // PSDKU
        //     [
        //         'nama' => 'Manajemen',
        //         'fakultas_id' => 13,
        //         'is_unit_kerja' => 0,
        //     ],
        //     [
        //         'nama' => 'Agroteknologi',
        //         'fakultas_id' => 13,
        //         'is_unit_kerja' => 0,
        //     ],
        //     [
        //         'nama' => 'Sipil',
        //         'fakultas_id' => 13,
        //         'is_unit_kerja' => 0,
        //     ],
        // ];

        DB::table('prodi')->insert($data);
    }
}