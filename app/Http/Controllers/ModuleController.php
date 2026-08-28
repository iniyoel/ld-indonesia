<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Answer;
use App\Models\Attempt;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ModuleController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DAFTAR MODUL
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $modules = Module::with(['creator'])
            ->withCount('questions')
            ->latest('updated_at')
            ->paginate(10);

        return view('pages.admin-modul-pembelajaran', compact('modules'));
    }

    /*
    |--------------------------------------------------------------------------
    | FORM TAMBAH MODUL
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('pages.admin-modul-form');
    }

    /*
    |--------------------------------------------------------------------------
    | FORM SOAL MODUL
    |--------------------------------------------------------------------------
    */
    public function soal(Module $module)
    {
        return view('pages.admin-modul-soal', compact('module'));
    }

    public function kerjakan($id)
    {
        $module = Module::findOrFail($id);

        return view('pages.modul-pembelajaran', compact('module'));
    }

    /*
    |--------------------------------------------------------------------------
    | SIMPAN MODUL
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => [
                'required',
                'string',
                'max:255',
            ],

            'deskripsi' => [
                'required',
                'string',
            ],

            'level' => [
                'required',
                'in:A1,A2,B1,B2',
            ],

            'kategori' => [
                'required',
                'in:materi,simulasi_horen,simulasi_lesen,simulasi_schreiben,simulasi_sprechen',
            ],

            'file' => [
                'nullable',
                'file',
                'mimes:pdf',
                'max:10240',
                'required_if:kategori,materi',
            ],
        ]);

        $module = new Module;

        $module->judul = $validated['judul'];
        $module->deskripsi = $validated['deskripsi'];
        $module->level = $validated['level'];
        $module->kategori = $validated['kategori'];

        $module->dibuat_oleh = Auth::id();
        $module->diperbarui_oleh = Auth::id();

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $path = $file->store('modules', 'public');

            $module->file_path = $path;
            $module->file_type = $file->getMimeType();
        }

        $module->save();

        ActivityLog::create([
            'user_id' => Auth::id(),
            'aksi' => 'tambah',
            'target_table' => 'modules',
            'target_id' => $module->id,
            'deskripsi' => 'Menambahkan modul "'.$module->judul.'"',
            'metadata' => [
                'kategori' => $module->kategori,
                'level' => $module->level,
            ],
        ]);

        return redirect()
            ->route('modul.soal.create', ['module' => $module->id])
            ->with('success', 'Modul berhasil ditambahkan. Silakan tambahkan soal.');
    }

    /**
     * Hapus modul beserta seluruh data yang berkaitan.
     */
    public function destroy(Module $module)
    {
        // Simpan informasi untuk activity log sebelum modul dihapus
        $moduleId = $module->id;
        $moduleTitle = $module->judul;
        $moduleKategori = $module->kategori;
        $moduleLevel = $module->level;

        /*
        |--------------------------------------------------------------------------
        | Hapus file PDF modul jika ada
        |--------------------------------------------------------------------------
        */
        if ($module->file_path) {
            Storage::disk('public')->delete($module->file_path);
        }

        /*
        |--------------------------------------------------------------------------
        | Hapus file yang dimiliki oleh soal
        |--------------------------------------------------------------------------
        |
        | Karena questions/options menggunakan cascadeOnDelete(),
        | record database akan ikut terhapus ketika module dihapus.
        |
        | Tetapi file fisiknya tidak otomatis terhapus oleh database,
        | sehingga kita hapus manual terlebih dahulu.
        |
        */
        foreach ($module->questions()->with('options')->get() as $question) {

            // File gambar/audio pada soal
            if ($question->file_path) {
                Storage::disk('public')->delete($question->file_path);
            }

            // File pada opsi jawaban
            foreach ($question->options as $option) {
                if ($option->file_path) {
                    Storage::disk('public')->delete($option->file_path);
                }
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Hapus modul
        |--------------------------------------------------------------------------
        |
        | questions dan question_options akan ikut terhapus karena
        | foreign key menggunakan cascadeOnDelete().
        |
        */
        $module->delete();

        /*
        |--------------------------------------------------------------------------
        | Activity Log
        |--------------------------------------------------------------------------
        */
        ActivityLog::create([
            'user_id' => Auth::id(),
            'aksi' => 'hapus',
            'target_table' => 'modules',
            'target_id' => $moduleId,
            'deskripsi' => 'Menghapus modul "'.$moduleTitle.'"',
            'metadata' => [
                'kategori' => $moduleKategori,
                'level' => $moduleLevel,
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Response
        |--------------------------------------------------------------------------
        */
        return response()->json([
            'message' => 'Modul "'.$moduleTitle.'" berhasil dihapus.',
        ]);
    }

    public function edit(Module $module)
    {
        return view('pages.admin-modul-form', compact('module'));
    }

    public function update(Request $request, Module $module)
    {
        $validated = $request->validate([
            'judul' => [
                'required',
                'string',
                'max:255',
            ],

            'deskripsi' => [
                'required',
                'string',
            ],

            'level' => [
                'required',
                'in:A1,A2,B1,B2',
            ],

            'kategori' => [
                'required',
                'in:materi,simulasi_horen,simulasi_lesen,simulasi_schreiben,simulasi_sprechen',
            ],

            'file' => [
                'nullable',
                'file',
                'mimes:pdf',
                'max:10240',
                'required_if:kategori,materi',
            ],
        ]);

        // Simpan data lama untuk kebutuhan activity log
        $judulLama = $module->judul;
        $levelLama = $module->level;
        $kategoriLama = $module->kategori;

        // Update data utama
        $module->judul = $validated['judul'];
        $module->deskripsi = $validated['deskripsi'];
        $module->level = $validated['level'];
        $module->kategori = $validated['kategori'];

        $module->diperbarui_oleh = Auth::id();

        // Jika upload PDF baru
        if ($request->hasFile('file')) {

            // Hapus file lama jika ada
            if ($module->file_path) {
                Storage::disk('public')->delete($module->file_path);
            }

            $file = $request->file('file');

            $path = $file->store('modules', 'public');

            $module->file_path = $path;
            $module->file_type = $file->getMimeType();
        }

        $module->save();

        // Catat aktivitas admin
        ActivityLog::create([
            'user_id' => Auth::id(),
            'aksi' => 'ubah',
            'target_table' => 'modules',
            'target_id' => $module->id,
            'deskripsi' => 'Mengubah modul "'.$module->judul.'"',
            'metadata' => [
                'judul_lama' => $judulLama,
                'judul_baru' => $module->judul,
                'level_lama' => $levelLama,
                'level_baru' => $module->level,
                'kategori_lama' => $kategoriLama,
                'kategori_baru' => $module->kategori,
            ],
        ]);

        return redirect()
            ->route('modul.soal.create', ['module' => $module->id])
            ->with('success', 'Modul berhasil diperbarui. Silahkan cek soal dan ubah jika diperlukan');
    }

    /**
     * Siswa mulai mengerjakan modul.
     */
    public function start(Module $module)
    {
        $user = Auth::user();
        // Hanya siswa yang boleh mengerjakan modul
        abort_unless($user->role === 'siswa', 403);
        // Siswa hanya boleh mengerjakan modul sesuai level
        abort_unless($module->level === $user->level, 403);
        // Siswa hanya boleh mengerjakan modul yang sudah rilis
        abort_unless($module->sudah_rilis === true, 403);

        /*
        |--------------------------------------------------------------------------
        | Cek apakah masih ada attempt yang sedang dikerjakan
        |--------------------------------------------------------------------------
        */

        $attempt = Attempt::query()
            ->where('user_id', $user->id)
            ->where('module_id', $module->id)
            ->where('status', 'sedang_dikerjakan')
            ->latest('dimulai_pada')
            ->first();

        /*
        |--------------------------------------------------------------------------
        | Kalau belum ada, buat attempt baru
        |--------------------------------------------------------------------------
        */

        if (! $attempt) {
            $attempt = Attempt::create([
                'user_id' => $user->id,
                'module_id' => $module->id,
                'status' => 'sedang_dikerjakan',
                'dimulai_pada' => now(),
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Materi
        |--------------------------------------------------------------------------
        */

        if ($module->kategori === 'materi') {
            return redirect()->route('modul.kerjakan', $module);
        }

        /*
        |--------------------------------------------------------------------------
        | Simulasi / soal
        |--------------------------------------------------------------------------
        */

        return redirect()->route('siswa.modul.questions', $module);
    }

    /**
     * Siswa menyelesaikan pengerjaan modul.
     */
    public function finishAttempt(Request $request, Module $module)
    {
        $user = Auth::user();

        abort_unless($user->role === 'siswa', 403);

        abort_unless($module->level === $user->level, 403);

        // Siswa hanya boleh mengerjakan modul yang sudah rilis
        abort_unless($module->sudah_rilis === true, 403);

        /*
        |--------------------------------------------------------------------------
        | Validasi jawaban dari browser
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([
            'answers' => ['nullable', 'array'],
            'marked' => ['nullable', 'array'],
        ]);

        $answers = $validated['answers'] ?? [];
        $marked = $validated['marked'] ?? [];

        /*
        |--------------------------------------------------------------------------
        | Cari attempt yang sedang dikerjakan
        |--------------------------------------------------------------------------
        */

        $attempt = Attempt::query()
            ->where('user_id', $user->id)
            ->where('module_id', $module->id)
            ->where('status', 'sedang_dikerjakan')
            ->latest('dimulai_pada')
            ->first();

        abort_unless($attempt, 404);

        /*
        |--------------------------------------------------------------------------
        | Ambil semua soal + pilihan jawaban
        |--------------------------------------------------------------------------
        */

        $questions = $module->questions()
            ->with('options')
            ->orderBy('urutan')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Simpan jawaban + hitung nilai
        |--------------------------------------------------------------------------
        */

        $correctCount = 0;
        $totalQuestions = $questions->count();

        DB::transaction(function () use (
            $questions,
            $answers,
            $marked,
            $attempt,
            &$correctCount,
            $totalQuestions
        ) {

            foreach ($questions as $index => $question) {

                $answer = $answers[$index] ?? null;

                /*
                |--------------------------------------------------------------------------
                | SCHREIBEN / PARAGRAF
                |--------------------------------------------------------------------------
                */
                if ($question->tipe === 'paragraf') {

                    // Kalau tidak ada jawaban, jangan simpan
                    if ($answer === null || trim((string) $answer) === '') {
                        continue;
                    }

                    Answer::create([
                        'attempt_id' => $attempt->id,
                        'question_id' => $question->id,
                        'question_option_id' => null,
                        'jawaban_teks' => trim((string) $answer),
                        'is_correct' => null,
                        'ditandai' => (bool) ($marked[$index] ?? false),
                        'waktu_menjawab_detik' => null,
                    ]);

                    continue;
                }


                /*
                |--------------------------------------------------------------------------
                | PILIHAN GANDA — HÖREN / LESEN / MATERI
                |--------------------------------------------------------------------------
                */

                $selectedOptionId = $answer;

                if (!$selectedOptionId) {
                    continue;
                }

                $selectedOption = $question->options
                    ->firstWhere('id', (int) $selectedOptionId);

                if (!$selectedOption) {
                    continue;
                }

                $isCorrect = (bool) $selectedOption->is_correct;

                if ($isCorrect) {
                    $correctCount++;
                }

                Answer::create([
                    'attempt_id' => $attempt->id,
                    'question_id' => $question->id,
                    'question_option_id' => $selectedOption->id,
                    'jawaban_teks' => null,
                    'is_correct' => $isCorrect,
                    'ditandai' => (bool) ($marked[$index] ?? false),
                    'waktu_menjawab_detik' => null,
                ]);
            }

            /*
            |--------------------------------------------------------------------------
            | Hitung nilai
            |--------------------------------------------------------------------------
            */

            $nilai = null;

            /*
            * Schreiben dan Sprechen tidak dihitung otomatis.
            */
            if (! in_array($attempt->module->kategori, [
                'simulasi_schreiben',
                'simulasi_sprechen',
            ], true)) {

                $nilai = $totalQuestions > 0
                    ? round(($correctCount / $totalQuestions) * 100)
                    : 0;
            }

            /*
            |--------------------------------------------------------------------------
            | Selesaikan attempt
            |--------------------------------------------------------------------------
            */

            $attempt->update([
                'status' => 'selesai',
                'nilai' => $nilai,
                'selesai_pada' => now(),
            ]);
        });

        /*
        |--------------------------------------------------------------------------
        | Response
        |--------------------------------------------------------------------------
        */

        return response()->json([
            'success' => true,
            'message' => 'Pengerjaan modul berhasil diselesaikan.',
            'attempt_id' => $attempt->id,

            /*
            * Setelah selesai, langsung menuju halaman hasil.
            */
            'result_url' => route('siswa.modul.hasil', [
                'module' => $module->id,
                'attempt' => $attempt->id,
            ]),
        ]);
    }

    public function toggleRelease(Module $module)
    {
        // Balik status rilis saat ini (true jadi false, false jadi true)
        $statusBaru = ! $module->sudah_rilis;

        // Update data modul
        $module->sudah_rilis = $statusBaru;
        $module->diperbarui_oleh = Auth::id();
        $module->save();

        // Tentukan teks status untuk deskripsi log
        $statusTeks = $statusBaru ? 'merilis (publish)' : 'menarik publikasi (unrelease)';

        // Catat aktivitas admin/tutor (menyesuaikan pola activity log Anda)
        ActivityLog::create([
            'user_id' => Auth::id(),
            'aksi' => 'ubah',
            'target_table' => 'modules',
            'target_id' => $module->id,
            'deskripsi' => 'Berhasil '.$statusTeks.' modul "'.$module->judul.'"',
            'metadata' => [
                'judul' => $module->judul,
                'sudah_rilis' => $statusBaru,
            ],
        ]);

        return back()->with('success', 'Status rilis modul "'.$module->judul.'" berhasil diperbarui.');
    }
}
