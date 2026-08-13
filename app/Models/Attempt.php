<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Attempt extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'module_id',
        'status',
        'nilai',
        'selesai_dilatih',
        'catatan_tutor',
        'dinilai_oleh',
        'dinilai_pada',
        'dimulai_pada',
        'selesai_pada',
    ];

    protected $casts = [
        'nilai' => 'decimal:2',
        'selesai_dilatih' => 'boolean',
        'dinilai_pada' => 'datetime',
        'dimulai_pada' => 'datetime',
        'selesai_pada' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | SISWA
    |--------------------------------------------------------------------------
    */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /*
    |--------------------------------------------------------------------------
    | MODUL YANG DIKERJAKAN
    |--------------------------------------------------------------------------
    */
    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }

    /*
    |--------------------------------------------------------------------------
    | JAWABAN
    |--------------------------------------------------------------------------
    */
    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }

    /*
    |--------------------------------------------------------------------------
    | TUTOR / ADMIN YANG MENILAI
    |--------------------------------------------------------------------------
    */
    public function grader(): BelongsTo
    {
        return $this->belongsTo(User::class, 'dinilai_oleh');
    }
}