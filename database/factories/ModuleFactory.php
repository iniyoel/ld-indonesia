<?php

namespace Database\Factories;

use App\Models\Module;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

/**
 * @extends Factory<Module>
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
            'dibuat_oleh' => User::factory()->admin(),
            'diperbarui_oleh' => null,
            'sudah_rilis' => false,
        ];
    }

    /**
     * Buat soal serta opsi jawaban otomatis setelah membuat modul
     */
    public function configure(): static
    {
        return $this->afterCreating(function (Module $module) {
            Question::factory()
                ->count(3)
                ->for($module)
                ->has(
                    QuestionOption::factory()
                        ->count(4)
                        ->state(new Sequence(
                            ['is_correct' => true],
                            ['is_correct' => false],
                            ['is_correct' => false],
                            ['is_correct' => false],
                        )),
                    'options'
                )
                ->create();
        });
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
