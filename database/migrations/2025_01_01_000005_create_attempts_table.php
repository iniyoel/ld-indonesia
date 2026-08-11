<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*
|--------------------------------------------------------------------------
| Tabel attempts (riwayat pengerjaan siswa per modul)
|--------------------------------------------------------------------------
|
| Satu baris = satu kali siswa mengerjakan satu modul. Dipakai untuk
| menampilkan "Modul Yang Perlu Dikerjakan" & "Aktivitas Terakhir" di
| dashboard-siswa.html, tabel di modul-pembelajaran.html, serta riwayat
| di performa-siswa.html / admin-performa-siswa.html / admin-siswa-detail.html.
|
| nilai:
|   - Materi / Simulasi Hören / Simulasi Lesen -> dihitung OTOMATIS dari
|     jumlah jawaban benar (lihat Answer::isCorrect).
|   - Simulasi Schreiben -> null sampai tutor mengisi manual lewat
|     catatan_tutor + nilai + dinilai_oleh (lihat detail-pengerjaan-schreiben.html).
|   - Simulasi Sprechen -> selalu null; kolom "selesai_dilatih" yang dipakai
|     sebagai penanda selesai/belum, bukan skor angka.
|
*/
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('attempts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->comment('Siswa yang mengerjakan');
            $table->foreignId('module_id')->constrained()->cascadeOnDelete();

            $table->enum('status', ['belum_dikerjakan', 'sedang_dikerjakan', 'selesai'])
                ->default('belum_dikerjakan');

            $table->unsignedTinyInteger('nilai')->nullable();
            $table->boolean('selesai_dilatih')->default(false)->comment('Khusus Simulasi Sprechen (tanpa nilai)');

            // Khusus Simulasi Schreiben: diisi tutor/admin saat menilai esai siswa.
            $table->text('catatan_tutor')->nullable();
            $table->foreignId('dinilai_oleh')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('dinilai_pada')->nullable();

            $table->timestamp('dimulai_pada')->nullable();
            $table->timestamp('selesai_pada')->nullable();

            $table->timestamps();

            $table->index(['user_id', 'status']);
            $table->index(['module_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('attempts');
    }
};
