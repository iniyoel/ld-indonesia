<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'level',
        'status',
        'profile_photo_path',
        'description',
        'password_generated',
        'aktif_sampai',
        'diperpanjang_oleh',
        'diperpanjang_pada',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'aktif_sampai' => 'date',
            'diperpanjang_pada' => 'datetime',
        ];
    }

    // ------------------------------------------------------------------
    // Role helpers — dipakai di middleware & Blade (mis. @if($user->isAdmin()))
    // ------------------------------------------------------------------

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isTutor(): bool
    {
        return $this->role === 'tutor';
    }

    public function isSiswa(): bool
    {
        return $this->role === 'siswa';
    }

    /**
     * Status aktif "sesungguhnya", dengan mempertimbangkan masa aktif siswa.
     * Admin/tutor selalu dianggap aktif selama status kolomnya "aktif"
     * (akun mereka tidak punya masa berlaku). Untuk siswa, akun otomatis
     * dianggap non-aktif begitu melewati aktif_sampai, TERLEPAS dari nilai
     * kolom status — perpanjangan HARUS lewat admin (lihat
     * diperpanjang_oleh/diperpanjang_pada), sistem tidak mengubahnya sendiri.
     */
    public function isAccountActive(): bool
    {
        if ($this->status !== 'aktif') {
            return false;
        }

        if ($this->isSiswa() && $this->aktif_sampai) {
            return now()->lte($this->aktif_sampai);
        }

        return true;
    }

    // ------------------------------------------------------------------
    // Relationships
    // ------------------------------------------------------------------

    /** Modul yang dibuat oleh user ini (admin/tutor). */
    public function modulesCreated(): HasMany
    {
        return $this->hasMany(Module::class, 'dibuat_oleh');
    }

    /**
     * Modul yang terakhir diperbarui oleh user ini.
     */
    public function modulesUpdated(): HasMany
    {
        return $this->hasMany(Module::class, 'diperbarui_oleh');
    }

    /** Riwayat pengerjaan modul (khusus siswa). */
    public function attempts(): HasMany
    {
        return $this->hasMany(Attempt::class);
    }

    /**
     * Attempt yang dinilai oleh user ini.
     */
    public function gradedAttempts(): HasMany
    {
        return $this->hasMany(Attempt::class, 'dinilai_oleh');
    }

    /** Log aktivitas yang dilakukan user ini (admin/tutor). */
    public function activityLogs(): HasMany
    {
        return $this->hasMany(ActivityLog::class);
    }
}
