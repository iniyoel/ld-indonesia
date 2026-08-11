<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * Membuat 1 akun contoh untuk tiap role, supaya bisa langsung dipakai
     * untuk mengetes pembatasan akses per halaman setelah
     * `php artisan migrate --seed`. Password ketiganya sama: "password".
     */
    public function run(): void
    {
        User::factory()->admin()->create([
            'name' => 'Ari Hutabarat',
            'email' => 'admin@ldindonesia.test',
        ]);

        User::factory()->tutor()->create([
            'name' => 'Kevin Simatupang',
            'email' => 'tutor@ldindonesia.test',
        ]);

        User::factory()->siswa('A1')->create([
            'name' => 'Maria Sitanggang',
            'email' => 'siswa@ldindonesia.test',
        ]);
    }
}
