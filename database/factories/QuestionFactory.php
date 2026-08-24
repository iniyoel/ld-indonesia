<?php

namespace Database\Factories;

use App\Models\Module;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Question>
 */
class QuestionFactory extends Factory
{
    protected $model = Question::class;

    public function definition(): array
    {
        return [
            'module_id' => Module::factory(),
            'tipe' => 'pilihan_ganda',
            'pertanyaan' => fake()->sentence().' ___',
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
