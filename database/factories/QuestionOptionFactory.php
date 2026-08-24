<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\QuestionOption;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<QuestionOption>
 */
class QuestionOptionFactory extends Factory
{
    protected $model = QuestionOption::class;

    public function definition(): array
    {
        return [
            'question_id' => Question::factory(),
            'teks' => fake()->words(2, true),
            'file_path' => null,
            'is_correct' => false,
            'urutan_tampil' => 0,
        ];
    }

    /** Tandai opsi ini sebagai jawaban yang benar. */
    public function correct(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_correct' => true,
        ]);
    }
}
