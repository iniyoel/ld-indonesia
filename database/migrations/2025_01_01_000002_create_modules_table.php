<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*
|--------------------------------------------------------------------------
| Tabel modules
|--------------------------------------------------------------------------
|
| Satu baris = satu modul pembelajaran/simulasi (mis. "Artikel Der, Das,
| Die"). kategori menentukan bagaimana modul dikerjakan siswa:
|   - materi              -> menampilkan file (PDF/DOCX/PPTX/MP4/MP3)
|                            lalu lanjut ke soal pilihan ganda.
|   - simulasi_horen      -> soal pilihan ganda bergambar + audio,
|                            2 menit/soal.
|   - simulasi_lesen      -> bacaan + soal pilihan ganda, 2 menit/soal.
|   - simulasi_schreiben  -> instruksi menulis esai, dinilai manual tutor.
|   - simulasi_sprechen   -> topik latihan bicara, tanpa nilai/batas waktu.
|
*/
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->enum('level', ['A1', 'A2', 'B1', 'B2']);
            $table->enum('kategori', [
                'materi',
                'simulasi_horen',
                'simulasi_lesen',
                'simulasi_schreiben',
                'simulasi_sprechen',
            ]);

            // Khusus kategori "materi": berkas penjelasan (PDF/DOCX/PPTX/MP4/MP3).
            // Tidak dipakai untuk kategori simulasi (lihat catatan di admin-modul-form.html).
            $table->string('file_path')->nullable();
            $table->string('file_type', 20)->nullable();

            $table->foreignId('dibuat_oleh')->constrained('users')->cascadeOnDelete();
            $table->foreignId('diperbarui_oleh')->nullable()->constrained('users')->nullOnDelete();

            $table->timestamps();

            $table->index(['kategori', 'level']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
