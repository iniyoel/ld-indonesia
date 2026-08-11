<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Module>
 */
class ModuleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'judul' => fake()->sentence(3),
            'deskripsi' => fake()->sentence(),
            'level' => fake()->randomElement(['A1', 'A2', 'B1', 'B2']),
            'kategori' => 'materi',
            'file_path' => null,
            'file_type' => null,
            'teks_bacaan' => null,
            'topik_sprechen' => null,
            'dibuat_oleh' => User::factory()->admin(),
            'diperbarui_oleh' => null,
        ];
    }

    public function kategori(string $kategori): static
    {
        return $this->state(fn (array $attributes) => [
            'kategori' => $kategori,
            'teks_bacaan' => $kategori === 'simulasi_lesen' ? fake()->paragraphs(3, true) : null,
            'topik_sprechen' => $kategori === 'simulasi_sprechen' ? fake()->sentence() : null,
        ]);
    }
}
