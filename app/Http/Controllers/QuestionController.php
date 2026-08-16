<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Question;
use App\Models\QuestionOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\ActivityLog;

class QuestionController extends Controller
{
    /**
     * Menampilkan halaman input soal untuk sebuah modul.
     */
    public function create(Module $module)
    {
        $questions = $module->questions()
            ->with('options')
            ->orderBy('urutan')
            ->get();

        return view('pages.admin-modul-soal', compact(
            'module',
            'questions'
        ));
    }

    /**
     * Menyimpan satu soal.
     */
    public function store(Request $request, Module $module)
    {
        /*
        |--------------------------------------------------------------------------
        | Tentukan tipe soal berdasarkan kategori modul
        |--------------------------------------------------------------------------
        */

        $forcedType = match ($module->kategori) {
            'materi',
            'simulasi_horen',
            'simulasi_lesen' => 'pilihan_ganda',

            'simulasi_schreiben',
            'simulasi_sprechen' => 'paragraf',

            default => null,
        };

        abort_if($forcedType === null, 404);

        $validated = $request->validate([
            'tipe' => [
                'required',
                'in:pilihan_ganda,paragraf',
            ],

            'pertanyaan' => [
                'required',
                'string',
            ],

            'penjelasan' => [
                'nullable',
                'string',
            ],

            'file' => [
                'nullable',
                'file',
                'max:10240',
            ],

            'options' => [
                'required_if:tipe,pilihan_ganda',
                'array',
                'size:4',
            ],

            'options.*.teks' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'options.*.file' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'correct_option' => [
                'required_if:tipe,pilihan_ganda',
                'integer',
                'between:0,3',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Pastikan frontend tidak bisa mengirim tipe yang salah
        |--------------------------------------------------------------------------
        */

        if ($validated['tipe'] !== $forcedType) {
            return back()
                ->withErrors([
                    'tipe' => 'Tipe soal tidak sesuai dengan kategori modul.',
                ])
                ->withInput();
        }

        /*
        |--------------------------------------------------------------------------
        | Validasi khusus pilihan ganda
        |--------------------------------------------------------------------------
        */

        if ($forcedType === 'pilihan_ganda') {

            foreach ($validated['options'] as $index => $option) {

                $hasText = !empty($option['teks'] ?? '');
                $hasFile = $request->hasFile("options.$index.file");

                if (!$hasText && !$hasFile) {
                    return back()
                        ->withErrors([
                            "options.$index.teks" =>
                                'Pilihan jawaban harus memiliki teks atau gambar.',
                        ])
                        ->withInput();
                }
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Validasi file khusus Hören
        |--------------------------------------------------------------------------
        */

        if ($module->kategori === 'simulasi_horen' && $request->hasFile('file')) {

            $request->validate([
                'file' => [
                    'file',
                    'mimes:mp3,wav,m4a,ogg',
                    'max:10240',
                ],
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Untuk kategori selain Hören, file soal tidak diperlukan
        |--------------------------------------------------------------------------
        */

        if ($module->kategori !== 'simulasi_horen') {
            // File boleh kosong.
            // Tidak perlu diproses sebagai audio Hören.
        }

        /*
        |--------------------------------------------------------------------------
        | Simpan soal
        |--------------------------------------------------------------------------
        */

        DB::transaction(function () use (
            $request,
            $module,
            $validated,
            $forcedType
        ) {

            $lastOrder = $module->questions()->max('urutan');

            $question = new Question();

            $question->module_id = $module->id;
            $question->tipe = $forcedType;
            $question->pertanyaan = $validated['pertanyaan'];
            $question->penjelasan = $validated['penjelasan'] ?? null;
            $question->urutan = ($lastOrder ?? 0) + 1;

            /*
            |--------------------------------------------------------------------------
            | File hanya digunakan untuk Hören
            |--------------------------------------------------------------------------
            */

            if (
                $module->kategori === 'simulasi_horen' &&
                $request->hasFile('file')
            ) {

                $file = $request->file('file');

                $path = $file->store(
                    'questions',
                    'public'
                );

                $question->file_path = $path;
                $question->file_type = $file->getMimeType();
            }

            $question->save();

            /*
            |--------------------------------------------------------------------------
            | Simpan pilihan jawaban
            |--------------------------------------------------------------------------
            */

            if ($forcedType === 'pilihan_ganda') {

                foreach ($validated['options'] as $index => $option) {

                    $optionModel = new QuestionOption();

                    $optionModel->question_id = $question->id;

                    $optionModel->teks =
                        $option['teks'] ?? null;

                    $optionModel->is_correct =
                        ((int) $validated['correct_option'] === $index);

                    /*
                    |--------------------------------------------------------------
                    | Gambar opsi
                    |--------------------------------------------------------------
                    */

                    if ($request->hasFile("options.$index.file")) {

                        $image = $request->file(
                            "options.$index.file"
                        );

                        $path = $image->store(
                            'question-options',
                            'public'
                        );

                        $optionModel->file_path = $path;
                        $optionModel->file_type = $image->getMimeType();
                    }

                    $optionModel->urutan_tampil = $index;

                    $optionModel->save();
                }
            }

            /*
            |--------------------------------------------------------------------------
            | Activity Log
            |--------------------------------------------------------------------------
            */

            ActivityLog::create([
                'user_id' => Auth::id(),
                'aksi' => 'tambah',
                'target_table' => 'questions',
                'target_id' => $question->id,

                'deskripsi' =>
                    'Menambahkan soal pada modul "' .
                    $module->judul .
                    '"',

                'metadata' => [
                    'module_id' => $module->id,
                    'tipe' => $question->tipe,
                    'kategori' => $module->kategori,
                ],
            ]);
        });

        return response()->json([
            'success' => true,
            'message' => 'Soal berhasil ditambahkan.',
        ]);
    }

    /**
     * Menghapus soal.
     */
    public function destroy(
        Module $module,
        Question $question
    ) {
        /*
        | Pastikan soal memang milik modul tersebut.
        */

        abort_unless(
            $question->module_id === $module->id,
            404
        );

        $question->delete();

        ActivityLog::create([
            'user_id' => Auth::id(),
            'aksi' => 'hapus',
            'target_table' => 'questions',
            'target_id' => $question->id,
            'deskripsi' =>
                'Menghapus soal dari modul "' .
                $module->judul .
                '"',
            'metadata' => [
                'module_id' => $module->id,
            ],
        ]);

        return redirect()
            ->route('modul.soal.create', $module)
            ->with('success', 'Soal berhasil dihapus.');
    }

    /**
     * Selesai memasukkan soal.
     */
    public function finish(Module $module)
    {
        $questionCount = $module->questions()->count();

        if ($questionCount === 0) {
            return back()
                ->withErrors([
                    'questions' =>
                        'Minimal harus ada satu soal sebelum modul diselesaikan.',
                ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Acak urutan pilihan jawaban
        |--------------------------------------------------------------------------
        */

        foreach ($module->questions()->with('options')->get() as $question) {

            $options = $question->options
                ->shuffle()
                ->values();

            foreach ($options as $index => $option) {

                $option->update([
                    'urutan_tampil' => $index,
                ]);
            }
        }

        ActivityLog::create([
            'user_id' => Auth::id(),
            'aksi' => 'selesai',
            'target_table' => 'modules',
            'target_id' => $module->id,
            'deskripsi' =>
                'Menyelesaikan input soal modul "' .
                $module->judul .
                '"',
            'metadata' => [
                'jumlah_soal' => $questionCount,
            ],
        ]);

        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Modul dan soal berhasil disimpan.',
            ]);
        }

        return redirect()
            ->route('modul.index')
            ->with(
                'success',
                'Modul dan soal berhasil disimpan.'
            );
    }
}