<?php

namespace Database\Seeders;

use App\Models\AnggotaFakultas;
use App\Models\AnggotaProdi;
use App\Models\Moa;
use App\Models\Mou;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Mou::factory(3)->create();
        // Moa::factory(3)->create();

        // \App\Models\User::factory(10)->create();
        $this->call(MouSeeder::class);
        $this->call(MoaSeeder::class);
        $this->call(IaSeeder::class);
        $this->call(AnggotaProdiSeeder::class);
        $this->call(AnggotaFakultasSeeder::class);
        $this->call(NegaraTableSeeder::class);
        $this->call(ProvinsiTableSeeder::class);
        $this->call(KotaTableSeeder::class);
        $this->call(KecamatanTableSeeder::class);
        $this->call(KelurahanTableSeeder::class);

        $this->call(FakultasSeeder::class);
        $this->call(ProdiSeeder::class);
        $this->call(UserSeeder::class);

        $this->call(PengusulSeeder::class);

        // $this->call(BeritaSeeder::class);
        $this->call(KategoriBeritaSeeder::class);
        $this->call(BeritaTableSeeder::class);

        // $this->call(TentangSeeder::class);
        $this->call(TentangTableSeeder::class);
        $this->call(SliderSeeder::class);
    }
}
