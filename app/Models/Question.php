<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'module_id',
        'tipe',
        'pertanyaan',
        'file_path',
        'file_type',
        'penjelasan',
        'urutan',
    ];

    /*
    |--------------------------------------------------------------------------
    | MODUL INDUK
    |--------------------------------------------------------------------------
    */
    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }

    /*
    |--------------------------------------------------------------------------
    | PILIHAN JAWABAN
    |--------------------------------------------------------------------------
    */
    public function options(): HasMany
    {
        return $this->hasMany(QuestionOption::class)
            ->orderBy('urutan_tampil');
    }

    public function studentAnswer(): HasOne
    {
        return $this->hasOne(Answer::class, 'question_id');
    }
}