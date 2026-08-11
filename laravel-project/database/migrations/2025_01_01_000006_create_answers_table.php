<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*
|--------------------------------------------------------------------------
| Tabel answers (jawaban siswa per soal)
|--------------------------------------------------------------------------
|
| question_option_id: dipilih siswa untuk soal tipe pilihan_ganda.
| jawaban_teks       : diisi siswa untuk soal tipe paragraf (esai Schreiben).
| is_correct         : dihitung otomatis untuk pilihan_ganda
|                       (question_option_id->is_correct); tetap null untuk
|                       tipe paragraf karena dinilai manual di level attempt.
| ditandai           : status "Tandai" saat siswa mengerjakan (lihat
|                       Daftar Soal berwarna oranye di pengerjaan-soal.html).
|
*/
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attempt_id')->constrained()->cascadeOnDelete();
            $table->foreignId('question_id')->constrained()->cascadeOnDelete();
            $table->foreignId('question_option_id')->nullable()->constrained('question_options')->nullOnDelete();

            $table->text('jawaban_teks')->nullable();
            $table->boolean('is_correct')->nullable();
            $table->boolean('ditandai')->default(false);
            $table->unsignedSmallInteger('waktu_menjawab_detik')->nullable()
                ->comment('Opsional: durasi siswa menjawab soal ini, untuk analitik kecepatan (Hören/Lesen)');

            $table->timestamps();

            $table->unique(['attempt_id', 'question_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};
