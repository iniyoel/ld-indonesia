<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'level',
        'kategori',
        'file_path',
        'file_type',
        'teks_bacaan',
        'topik_sprechen',
        'dibuat_oleh',
        'diperbarui_oleh',
    ];

    /*
    |--------------------------------------------------------------------------
    | PEMBUAT MODUL
    |--------------------------------------------------------------------------
    */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'dibuat_oleh');
    }

    /*
    |--------------------------------------------------------------------------
    | USER YANG TERAKHIR MEMPERBARUI
    |--------------------------------------------------------------------------
    */
    public function updater(): BelongsTo
    {
        return $this->belongsTo(User::class, 'diperbarui_oleh');
    }

    /*
    |--------------------------------------------------------------------------
    | SOAL DALAM MODUL
    |--------------------------------------------------------------------------
    */
    public function questions(): HasMany
    {
        return $this->hasMany(Question::class)
            ->orderBy('urutan');
    }

    /*
    |--------------------------------------------------------------------------
    | RIWAYAT PENGERJAAN SISWA
    |--------------------------------------------------------------------------
    */
    public function attempts(): HasMany
    {
        return $this->hasMany(Attempt::class);
    }
}