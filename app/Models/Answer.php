<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'attempt_id',
        'question_id',
        'question_option_id',
        'jawaban_teks',
        'is_correct',
        'ditandai',
        'waktu_menjawab_detik',
    ];

    protected $casts = [
        'is_correct' => 'boolean',
        'ditandai' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | ATTEMPT
    |--------------------------------------------------------------------------
    */
    public function attempt(): BelongsTo
    {
        return $this->belongsTo(Attempt::class);
    }

    /*
    |--------------------------------------------------------------------------
    | SOAL
    |--------------------------------------------------------------------------
    */
    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    /*
    |--------------------------------------------------------------------------
    | PILIHAN YANG DIPILIH
    |--------------------------------------------------------------------------
    */
    public function selectedOption(): BelongsTo
    {
        return $this->belongsTo(
            QuestionOption::class,
            'question_option_id'
        );
    }
}