<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*
|--------------------------------------------------------------------------
| Tabel activity_logs
|--------------------------------------------------------------------------
|
| Mencatat aksi admin/tutor terhadap modul & pengguna, dipakai untuk
| panel "Aktivitas Terbaru Admin" / "Aktivitas Siswa" di
| dashboard-admin.html & dashboard-tutor.html.
|
| target_table + target_id merujuk ke record terkait (mis. modules,
| users) tanpa foreign key ketat karena bisa menunjuk ke tabel berbeda.
| deskripsi menyimpan teks siap-tampil, mis. 'Modul "Artikel Das" ditambahkan'.
|
*/
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->comment('Admin/tutor pelaku aksi');
            $table->enum('aksi', ['tambah', 'ubah', 'hapus']);
            $table->string('target_table', 50)->comment('mis. modules, users, questions');
            $table->unsignedBigInteger('target_id')->nullable();
            $table->string('deskripsi');
            $table->timestamps();

            $table->index(['target_table', 'target_id']);
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};
