<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Module;
use App\Models\Question;
use App\Models\QuestionOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        | Tentukan tipe soal berdasarkan kategori modul secara mutlak
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
                'nullable',
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
                'nullable',
                'integer',
                'between:0,3',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Validasi khusus pilihan ganda
        |--------------------------------------------------------------------------
        */
        if ($forcedType === 'pilihan_ganda') {
            if (empty($validated['options']) || count($validated['options']) !== 4) {
                return response()->json([
                    'success' => false,
                    'message' => 'Soal pilihan ganda harus memiliki 4 opsi.',
                ], 422);
            }

            foreach ($validated['options'] as $index => $option) {
                $hasText = ! empty($option['teks'] ?? '');
                $hasFile = $request->hasFile("options.$index.file");

                if (! $hasText && ! $hasFile) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Pilihan jawaban ' . ($index + 1) . ' harus memiliki teks atau gambar.',
                    ], 422);
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

            $question = new Question;
            $question->module_id = $module->id;
            $question->tipe = $forcedType; // Dipaksa menggunakan tipe yang sesuai kategori modul
            $question->pertanyaan = $validated['pertanyaan'];
            $question->penjelasan = $validated['penjelasan'] ?? null;
            $question->urutan = ($lastOrder ?? 0) + 1;

            if (
                $module->kategori === 'simulasi_horen' &&
                $request->hasFile('file')
            ) {
                $file = $request->file('file');
                $path = $file->store('questions', 'public');
                $question->file_path = $path;
                $question->file_type = $file->getMimeType();
            }

            $question->save();

            /*
            |--------------------------------------------------------------------------
            | Simpan pilihan jawaban (Hanya jika tipe pilihan ganda)
            |--------------------------------------------------------------------------
            */
            if ($forcedType === 'pilihan_ganda' && !empty($validated['options'])) {
                foreach ($validated['options'] as $index => $option) {
                    $optionModel = new QuestionOption;
                    $optionModel->question_id = $question->id;
                    $optionModel->teks = $option['teks'] ?? null;
                    $optionModel->is_correct = (isset($validated['correct_option']) && (int) $validated['correct_option'] === $index);

                    if ($request->hasFile("options.$index.file")) {
                        $image = $request->file("options.$index.file");
                        $path = $image->store('question-options', 'public');
                        $optionModel->file_path = $path;
                        $optionModel->file_type = $image->getMimeType();
                    }

                    $optionModel->urutan_tampil = $index;
                    $optionModel->save();
                }
            }

            ActivityLog::create([
                'user_id' => Auth::id(),
                'aksi' => 'tambah',
                'target_table' => 'questions',
                'target_id' => $question->id,
                'deskripsi' => 'Menambahkan soal pada modul "'.$module->judul.'"',
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

    public function update(Request $request, Module $module, Question $question)
    {
        abort_if($question->module_id !== $module->id, 404);

        /*
        |--------------------------------------------------------------------------
        | 1. Tentukan tipe soal secara mutlak berdasarkan kategori modul
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

        /*
        |--------------------------------------------------------------------------
        | 2. Validasi Request
        |--------------------------------------------------------------------------
        */
        $validated = $request->validate([
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
                'mimes:mp3,wav,m4a,ogg',
                'max:10240',
            ],
            'options' => [
                'nullable',
                'array',
            ],
            'options.*.id' => [
                'nullable',
                'integer',
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
                'nullable',
                'integer',
                'between:0,3',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | 3. Validasi Khusus Pilihan Ganda
        |--------------------------------------------------------------------------
        */
        $existingOptions = $question->options()->orderBy('urutan_tampil')->get();

        if ($forcedType === 'pilihan_ganda') {
            if (empty($validated['options']) || count($validated['options']) !== 4) {
                return response()->json([
                    'success' => false,
                    'message' => 'Soal pilihan ganda harus memiliki 4 opsi.',
                ], 422);
            }

            foreach ($validated['options'] as $index => $option) {
                $hasText = ! empty(trim($option['teks'] ?? ''));
                $hasNewFile = $request->hasFile("options.$index.file");
                $hasExistingFile = isset($existingOptions[$index]) && ! empty($existingOptions[$index]->file_path);

                if (! $hasText && ! $hasNewFile && ! $hasExistingFile) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Opsi '.($index + 1).' harus memiliki teks atau gambar.',
                    ], 422);
                }
            }
        }

        /*
        |--------------------------------------------------------------------------
        | 4. Update Database & Storage Transaction
        |--------------------------------------------------------------------------
        */
        DB::transaction(function () use ($request, $module, $question, $validated, $forcedType, $existingOptions) {

            $question->tipe = $forcedType; // Dipaksa mengikuti kategori modul saat ini
            $question->pertanyaan = $validated['pertanyaan'];
            $question->penjelasan = $validated['penjelasan'] ?? null;

            if ($module->kategori === 'simulasi_horen' && $request->hasFile('file')) {
                if ($question->file_path && Storage::disk('public')->exists($question->file_path)) {
                    Storage::disk('public')->delete($question->file_path);
                }

                $file = $request->file('file');
                $question->file_path = $file->store('questions', 'public');
                $question->file_type = $file->getMimeType();
            }

            $question->save();

            // Jika tipe berubah menjadi paragraf/essay, hapus opsi pilihan ganda lama jika ada
            if ($forcedType === 'paragraf') {
                foreach ($existingOptions as $opt) {
                    if ($opt->file_path && Storage::disk('public')->exists($opt->file_path)) {
                        Storage::disk('public')->delete($opt->file_path);
                    }
                    $opt->delete();
                }
            }

            // Jika tipe pilihan ganda, perbarui/simpan opsi
            if ($forcedType === 'pilihan_ganda' && !empty($validated['options'])) {
                // Hapus opsi yang berlebih jika ada
                if ($existingOptions->count() > count($validated['options'])) {
                    for ($k = count($validated['options']); $k < $existingOptions->count(); $k++) {
                        $extraOpt = $existingOptions[$k];
                        if ($extraOpt->file_path && Storage::disk('public')->exists($extraOpt->file_path)) {
                            Storage::disk('public')->delete($extraOpt->file_path);
                        }
                        $extraOpt->delete();
                    }
                }

                foreach ($validated['options'] as $index => $optionData) {
                    $optionModel = $existingOptions->get($index) ?? new QuestionOption;

                    $optionModel->question_id = $question->id;
                    $optionModel->teks = $optionData['teks'] ?? null;
                    $optionModel->is_correct = (isset($validated['correct_option']) && (int) $validated['correct_option'] === $index);
                    $optionModel->urutan_tampil = $index;

                    if ($request->hasFile("options.$index.file")) {
                        if ($optionModel->file_path && Storage::disk('public')->exists($optionModel->file_path)) {
                            Storage::disk('public')->delete($optionModel->file_path);
                        }

                        $image = $request->file("options.$index.file");
                        $optionModel->file_path = $image->store('question-options', 'public');
                        $optionModel->file_type = $image->getMimeType();
                    }

                    $optionModel->save();
                }
            }

            ActivityLog::create([
                'user_id' => Auth::id(),
                'aksi' => 'ubah',
                'target_table' => 'questions',
                'target_id' => $question->id,
                'deskripsi' => 'Memperbarui soal ID '.$question->id.' pada modul "'.$module->judul.'"',
                'metadata' => [
                    'module_id' => $module->id,
                    'question_id' => $question->id,
                    'tipe' => $question->tipe,
                    'kategori' => $module->kategori,
                ],
            ]);
        });

        return response()->json([
            'success' => true,
            'message' => 'Soal berhasil diperbarui.',
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
            'deskripsi' => 'Menghapus soal dari modul "'.
                $module->judul.
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
                    'questions' => 'Minimal harus ada satu soal sebelum modul diselesaikan.',
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
            'deskripsi' => 'Menyelesaikan input soal modul "'.
                $module->judul.
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
