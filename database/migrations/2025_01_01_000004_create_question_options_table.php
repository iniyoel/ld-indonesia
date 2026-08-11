<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*
|--------------------------------------------------------------------------
| Tabel question_options (opsi jawaban pilihan ganda)
|--------------------------------------------------------------------------
|
| Maksimal 4 opsi per soal (divalidasi di level aplikasi, lihat
| admin-modul-soal.html). file_path dipakai untuk opsi bergambar
| (Simulasi Hören). urutan_tampil diacak ulang oleh backend setiap kali
| modul disimpan, sesuai ketentuan "opsi akan diacak saat selesai input
| ke database" — TIDAK diacak di sisi front-end.
|
*/
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('question_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->constrained()->cascadeOnDelete();
            $table->string('teks')->nullable();
            $table->string('file_path')->nullable()->comment('Gambar opsi, untuk pilihan bergambar (Simulasi Hören)');
            $table->boolean('is_correct')->default(false);
            $table->unsignedTinyInteger('urutan_tampil')->default(0);
            $table->timestamps();

            $table->index('question_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('question_options');
    }
};
