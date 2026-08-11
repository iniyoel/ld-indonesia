<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*
|--------------------------------------------------------------------------
| Tambahan kolom peran & status akun pada tabel users
|--------------------------------------------------------------------------
|
| - role: menentukan hak akses & tampilan sidebar (admin, tutor, siswa).
| - level: level bahasa Jerman siswa (A1/A2/B1/B2) — HANYA relevan untuk
|   role "siswa"; null untuk admin/tutor.
| - status: aktif / non_aktif. Untuk siswa, status ini akan otomatis
|   dianggap non_aktif oleh aplikasi ketika akun sudah melewati
|   `aktif_sampai` (lihat method User::isAccountActive()).
| - aktif_sampai: tanggal berakhirnya masa aktif akun siswa (dibuat_pada
|   + 1 bulan, mengikuti durasi les). Null untuk admin/tutor (permanen).
| - diperpanjang_oleh / diperpanjang_pada: mencatat admin mana yang
|   memperpanjang masa aktif siswa secara manual setelah konfirmasi
|   pembayaran — sesuai ketentuan bahwa sistem TIDAK mengonfirmasi
|   pembayaran secara otomatis.
|
*/
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['admin', 'tutor', 'siswa'])
                ->default('siswa')
                ->after('email');

            $table->enum('level', ['A1', 'A2', 'B1', 'B2'])
                ->nullable()
                ->after('role')
                ->comment('Hanya diisi untuk role siswa');

            $table->enum('status', ['aktif', 'non_aktif'])
                ->default('aktif')
                ->after('level');

            $table->date('aktif_sampai')
                ->nullable()
                ->after('status')
                ->comment('Masa aktif akun siswa (dibuat_pada + 1 bulan). Null untuk admin/tutor.');

            $table->foreignId('diperpanjang_oleh')
                ->nullable()
                ->after('aktif_sampai')
                ->constrained('users')
                ->nullOnDelete()
                ->comment('Admin yang memperpanjang masa aktif siswa setelah konfirmasi pembayaran manual');

            $table->timestamp('diperpanjang_pada')->nullable()->after('diperpanjang_oleh');

            $table->index(['role', 'status']);
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropConstrainedForeignId('diperpanjang_oleh');
            $table->dropColumn(['role', 'level', 'status', 'aktif_sampai', 'diperpanjang_pada']);
        });
    }
};
