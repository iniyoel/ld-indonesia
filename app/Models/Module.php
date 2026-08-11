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

    protected function casts(): array
    {
        return [
            //
        ];
    }

    /** Modul kategori "materi" butuh file; kategori simulasi tidak. */
    public function butuhFile(): bool
    {
        return $this->kategori === 'materi';
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'dibuat_oleh');
    }

    public function updater(): BelongsTo
    {
        return $this->belongsTo(User::class, 'diperbarui_oleh');
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class)->orderBy('urutan');
    }

    public function attempts(): HasMany
    {
        return $this->hasMany(Attempt::class);
    }
}
