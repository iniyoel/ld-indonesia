<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class QuestionOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'teks',
        'file_path',
        'is_correct',
        'urutan_tampil',
    ];

    protected function casts(): array
    {
        return [
            'is_correct' => 'boolean',
        ];
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    /** Jawaban siswa yang memilih opsi ini. */
    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }
}
