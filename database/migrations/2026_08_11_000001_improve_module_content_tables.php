<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        /*
        |--------------------------------------------------------------------------
        | QUESTIONS
        |--------------------------------------------------------------------------
        | Menyimpan tipe file agar kita tahu apakah file soal adalah:
        | - audio/mp3
        | - image
        | - file lainnya
        */
        Schema::table('questions', function (Blueprint $table) {
            $table->string('file_type', 100)
                ->nullable()
                ->after('file_path');
        });


        /*
        |--------------------------------------------------------------------------
        | QUESTION OPTIONS
        |--------------------------------------------------------------------------
        | Digunakan terutama untuk Hören:
        | setiap pilihan jawaban dapat memiliki gambar.
        */
        Schema::table('question_options', function (Blueprint $table) {
            $table->string('file_type', 100)
                ->nullable()
                ->after('file_path');
        });


        /*
        |--------------------------------------------------------------------------
        | ACTIVITY LOGS
        |--------------------------------------------------------------------------
        | Sebelumnya aksi hanya:
        | tambah / ubah / hapus
        |
        | Sekarang kita membutuhkan aksi yang lebih spesifik:
        | login
        | logout
        | tambah
        | ubah
        | hapus
        | mulai_mengerjakan
        | menjawab
        | selesai_mengerjakan
        | menilai
        | dll.
        */
        Schema::table('activity_logs', function (Blueprint $table) {
            $table->string('aksi', 50)->change();

            $table->json('metadata')
                ->nullable()
                ->after('deskripsi');
        });
    }

    public function down(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropColumn('file_type');
        });

        Schema::table('question_options', function (Blueprint $table) {
            $table->dropColumn('file_type');
        });

        Schema::table('activity_logs', function (Blueprint $table) {
            $table->dropColumn('metadata');

            // Jangan kembalikan aksi menjadi enum di sini.
            // Migration rollback yang aman akan membutuhkan
            // struktur enum lama yang persis sama dengan migration awal.
        });
    }
};