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
        'penjelasan',
        'urutan',
    ];

    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }

    /** Maks. 4 opsi, diacak urutan_tampil-nya oleh backend saat modul disimpan. */
    public function options(): HasMany
    {
        return $this->hasMany(QuestionOption::class)->orderBy('urutan_tampil');
    }

    public function correctOption(): HasOne
    {
        return $this->hasOne(QuestionOption::class)->where('is_correct', true);
    }

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }
}
