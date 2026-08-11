<?php

namespace Database\Factories;

use App\Models\Module;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'module_id' => Module::factory(),
            'tipe' => 'pilihan_ganda',
            'pertanyaan' => fake()->sentence() . ' ___',
            'file_path' => null,
            'penjelasan' => fake()->sentence(),
            'urutan' => 0,
        ];
    }

    public function paragraf(): static
    {
        return $this->state(fn (array $attributes) => [
            'tipe' => 'paragraf',
            'penjelasan' => null,
        ]);
    }
}
