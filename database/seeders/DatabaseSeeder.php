<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        $this->call(NegaraTableSeeder::class);
        $this->call(ProvinsiTableSeeder::class);
        $this->call(KotaTableSeeder::class);
        $this->call(KecamatanTableSeeder::class);
        $this->call(KelurahanTableSeeder::class);

        $this->call(FakultasSeeder::class);
        $this->call(ProdiSeeder::class);
        $this->call(UserSeeder::class);

        $this->call(PengusulSeeder::class);

        $this->call(BeritaSeeder::class);
        $this->call(KategoriBeritaSeeder::class);

        $this->call(MouSeeder::class);
        $this->call(MoaSeeder::class);
        $this->call(IaSeeder::class);
        $this->call(BeritaTableSeeder::class);
    }
}
