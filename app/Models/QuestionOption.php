<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuestionOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'teks',
        'file_path',
        'file_type',
        'is_correct',
        'urutan_tampil',
    ];

    protected $casts = [
        'is_correct' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | SOAL INDUK
    |--------------------------------------------------------------------------
    */
    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}