<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*
|--------------------------------------------------------------------------
| Tabel questions (soal)
|--------------------------------------------------------------------------
|
| tipe "pilihan_ganda"  -> jawaban ada di tabel question_options (maks. 4).
| tipe "paragraf"       -> siswa mengisi jawaban esai bebas (dipakai untuk
|                          Simulasi Schreiben, dinilai manual oleh tutor).
|
| file_path dipakai untuk melampirkan gambar/audio pada soal itu sendiri
| (mis. audio Hören, atau gambar pendukung bacaan Lesen).
|
| penjelasan diisi admin agar bisa ditampilkan ke siswa di halaman review
| jawaban (lihat detail-pengerjaan.html / detail-pengerjaan-lesen.html) —
| TIDAK ditampilkan untuk soal Simulasi Hören sesuai ketentuan.
|
*/
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('module_id')
                ->constrained('modules')
                ->cascadeOnDelete();

            $table->enum('tipe', [
                'pilihan_ganda',
                'paragraf'
            ])->default('pilihan_ganda');

            $table->text('pertanyaan');

            $table->text('teks_bacaan')
                ->nullable()
                ->comment('Khusus simulasi Lesen');

            $table->text('topik_sprechen')
                ->nullable()
                ->comment('Khusus simulasi Sprechen');

            $table->string('file_path')
                ->nullable()
                ->comment('Audio/gambar pendukung soal');

            $table->text('penjelasan')
                ->nullable();

            $table->unsignedSmallInteger('urutan')
                ->default(0);

            $table->timestamps();

            $table->index(['module_id', 'urutan']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
