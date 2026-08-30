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
    | DAFTAR MODUL (Admin & Tutor)
    |--------------------------------------------------------------------------
    */
    public function index(Request $request)
    {
        $search    = $request->input('search');
        $level     = $request->input('level');
        $kategori  = $request->input('kategori');
        $sort      = $request->input('sort', 'updated_at');
        $direction = $request->input('direction', 'desc');
        $perPage   = (int) $request->input('per_page', 10);

        if (!in_array($perPage, [5, 10, 15, 25, 50], true)) {
            $perPage = 10;
        }

        $allowedSorts = [
            'judul',
            'level',
            'kategori',
            'updated_at',
            'created_at'
        ];

        if (!in_array($sort, $allowedSorts, true)) {
            $sort = 'updated_at';
        }

        $direction = $direction === 'asc' ? 'asc' : 'desc';

        $modules = Module::with('creator')
            ->withCount('questions')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('judul', 'like', '%' . $search . '%')
                      ->orWhere('deskripsi', 'like', '%' . $search . '%')
                      ->orWhereHas('creator', function ($creatorQuery) use ($search) {
                          $creatorQuery->where('name', 'like', '%' . $search . '%');
                      });
                });
            })
            ->when($level, function ($query) use ($level) {
                $query->where('level', $level);
            })
            ->when($kategori, function ($query) use ($kategori) {
                $query->where('kategori', $kategori);
            })
            ->orderBy($sort, $direction)
            ->paginate($perPage)
            ->withQueryString();

        $viewName = Auth::user()->role === 'tutor' 
            ? 'pages.tutor-modul-pembelajaran' 
            : 'pages.admin-modul-pembelajaran';

        return view($viewName, compact(
            'modules',
            'search',
            'level',
            'kategori',
            'sort',
            'direction',
            'perPage'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | FORM TAMBAH MODUL
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        $viewName = Auth::user()->role === 'tutor' 
            ? 'pages.tutor-modul-form' 
            : 'pages.admin-modul-form';

        return view($viewName);
    }

    /*
    |--------------------------------------------------------------------------
    | FORM SOAL MODUL
    |--------------------------------------------------------------------------
    */
    public function soal(Module $module)
    {
        $viewName = Auth::user()->role === 'tutor' 
            ? 'pages.tutor-modul-soal' 
            : 'pages.admin-modul-soal';

        return view($viewName, compact('module'));
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
            'judul' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string'],
            'level' => ['required', 'in:A1,A2,B1,B2'],
            'kategori' => ['required', 'in:materi,simulasi_horen,simulasi_lesen,simulasi_schreiben,simulasi_sprechen'],
            'file' => ['nullable', 'file', 'mimes:pdf', 'max:10240', 'required_if:kategori,materi'],
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
        $moduleId = $module->id;
        $moduleTitle = $module->judul;
        $moduleKategori = $module->kategori;
        $moduleLevel = $module->level;

        if ($module->file_path) {
            Storage::disk('public')->delete($module->file_path);
        }

        foreach ($module->questions()->with('options')->get() as $question) {
            if ($question->file_path) {
                Storage::disk('public')->delete($question->file_path);
            }

            foreach ($question->options as $option) {
                if ($option->file_path) {
                    Storage::disk('public')->delete($option->file_path);
                }
            }
        }

        $module->delete();

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

        return response()->json([
            'message' => 'Modul "'.$moduleTitle.'" berhasil dihapus.',
        ]);
    }

    public function edit(Module $module)
    {
        $viewName = Auth::user()->role === 'tutor' 
            ? 'pages.tutor-modul-form' 
            : 'pages.admin-modul-form';

        return view($viewName, compact('module'));
    }

    public function update(Request $request, Module $module)
    {
        $validated = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string'],
            'level' => ['required', 'in:A1,A2,B1,B2'],
            'kategori' => ['required', 'in:materi,simulasi_horen,simulasi_lesen,simulasi_schreiben,simulasi_sprechen'],
            'file' => ['nullable', 'file', 'mimes:pdf', 'max:10240'],
        ]);

        if (
            $validated['kategori'] === 'materi' &&
            !$module->file_path &&
            !$request->hasFile('file')
        ) {
            return back()
                ->withErrors([
                    'file' => 'Modul Materi wajib memiliki file PDF.',
                ])
                ->withInput();
        }

        $judulLama = $module->judul;
        $levelLama = $module->level;
        $kategoriLama = $module->kategori;

        $module->judul = $validated['judul'];
        $module->deskripsi = $validated['deskripsi'];
        $module->level = $validated['level'];
        
        // Cek apakah kategori berubah jenis (misal dari pilihan ganda ke essay atau sebaliknya)
        $isOldEssay = in_array($kategoriLama, ['simulasi_schreiben', 'simulasi_sprechen'], true);
        $isNewEssay = in_array($validated['kategori'], ['simulasi_schreiben', 'simulasi_sprechen'], true);

        // Jika tipe kategori berubah drastis, bersihkan soal dan file media fisiknya
        if ($isOldEssay !== $isNewEssay) {
            foreach ($module->questions()->with('options')->get() as $question) {
                if ($question->file_path) {
                    Storage::disk('public')->delete($question->file_path);
                }
                foreach ($question->options as $option) {
                    if ($option->file_path) {
                        Storage::disk('public')->delete($option->file_path);
                    }
                }
                $question->options()->delete();
                $question->delete();
            }
        }

        $module->kategori = $validated['kategori'];
        $module->diperbarui_oleh = Auth::id();

        if ($request->hasFile('file')) {
            if ($module->file_path) {
                Storage::disk('public')->delete($module->file_path);
            }

            $file = $request->file('file');
            $path = $file->store('modules', 'public');
            $module->file_path = $path;
            $module->file_type = $file->getMimeType();
        }

        $module->save();

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

    public function start(Module $module)
    {
        $user = Auth::user();
        abort_unless($user->role === 'siswa', 403);
        abort_unless($module->level === $user->level, 403);
        abort_unless($module->sudah_rilis === true, 403);

        $attempt = Attempt::query()
            ->where('user_id', $user->id)
            ->where('module_id', $module->id)
            ->where('status', 'sedang_dikerjakan')
            ->latest('dimulai_pada')
            ->first();

        if (! $attempt) {
            $attempt = Attempt::create([
                'user_id' => $user->id,
                'module_id' => $module->id,
                'status' => 'sedang_dikerjakan',
                'dimulai_pada' => now(),
            ]);
        }

        if ($module->kategori === 'materi') {
            return redirect()->route('modul.kerjakan', $module);
        }

        return redirect()->route('siswa.modul.questions', $module);
    }

    public function finishAttempt(Request $request, Module $module)
    {
        $user = Auth::user();
        abort_unless($user->role === 'siswa', 403);
        abort_unless($module->level === $user->level, 403);
        abort_unless($module->sudah_rilis === true, 403);

        $validated = $request->validate([
            'answers' => ['nullable', 'array'],
            'marked' => ['nullable', 'array'],
        ]);

        $answers = $validated['answers'] ?? [];
        $marked = $validated['marked'] ?? [];

        $attempt = Attempt::query()
            ->where('user_id', $user->id)
            ->where('module_id', $module->id)
            ->where('status', 'sedang_dikerjakan')
            ->latest('dimulai_pada')
            ->first();

        abort_unless($attempt, 404);

        $questions = $module->questions()
            ->with('options')
            ->orderBy('urutan')
            ->get();

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

                if ($question->tipe === 'paragraf') {
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

            $nilai = null;
            if (! in_array($attempt->module->kategori, [
                'simulasi_schreiben',
                'simulasi_sprechen',
            ], true)) {
                $nilai = $totalQuestions > 0
                    ? round(($correctCount / $totalQuestions) * 100)
                    : 0;
            }

            $attempt->update([
                'status' => 'selesai',
                'nilai' => $nilai,
                'selesai_pada' => now(),
            ]);
        });

        return response()->json([
            'success' => true,
            'message' => 'Pengerjaan modul berhasil diselesaikan.',
            'attempt_id' => $attempt->id,
            'result_url' => route('siswa.modul.hasil', [
                'module' => $module->id,
                'attempt' => $attempt->id,
            ]),
        ]);
    }

    public function toggleRelease(Module $module)
    {
        $statusBaru = ! $module->sudah_rilis;
        $module->sudah_rilis = $statusBaru;
        $module->diperbarui_oleh = Auth::id();
        $module->save();

        $statusTeks = $statusBaru ? 'merilis (publish)' : 'menarik publikasi (unrelease)';

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