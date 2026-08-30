<?php

namespace App\Http\Controllers;

use App\Models\Attempt;
use App\Models\Module;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function dashboard(Request $request): View
    {
        $user = $request->user();

        switch ($user->role) {
            case 'admin':
                return view(
                    'pages.dashboard-admin',
                    $this->buildDashboardData()
                );

            case 'tutor':
                return view(
                    'pages.dashboard-tutor',
                    $this->buildDashboardData()
                );

            case 'siswa':
                // Kirimkan $request sebagai parameter pertama
                return $this->show($request, 'dashboard-siswa');

            default:
                abort(403, 'Role pengguna tidak dikenali.');
        }
    }

    /**
     * Render halaman pages.* generik untuk halaman yang belum/tidak
     * perlu controller khusus (mis. admin-pengguna).
     */
    public function show(Request $request, string $page): View
    {
        $view = 'pages.'.$page;

        abort_unless(view()->exists($view), 404);

        $role = $request->user()->role;
        $allowedPages = config("page_access.{$role}", []);

        abort_unless(in_array($page, $allowedPages, true), 403);

        $viewData = [];

        if ($page === 'admin-pengguna') {
            $query = \App\Models\User::query();

            // =========================
            // SEARCH
            // =========================
            if ($request->filled('search')) {
                $search = trim($request->input('search'));

                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
                });
            }

            // =========================
            // FILTER PERAN / KATEGORI
            // =========================
            if ($request->filled('role')) {
                $query->where('role', $request->input('role'));
            }

            // =========================
            // FILTER LEVEL
            // =========================
            if ($request->filled('level')) {
                $query->where('level', $request->input('level'));
            }

            // =========================
            // FILTER STATUS
            // =========================
            if ($request->filled('status')) {
                $query->where('status', $request->input('status'));
            }

            // =========================
            // SORTING
            // =========================
            $sort = $request->input('sort', 'name');
            $direction = $request->input('direction', 'asc');

            $allowedSorts = [
                'name',
                'email',
                'role',
                'level',
                'status',
                'created_at',
            ];

            if (!in_array($sort, $allowedSorts, true)) {
                $sort = 'name';
            }

            $direction = $direction === 'desc' ? 'desc' : 'asc';

            $query->orderBy($sort, $direction);

            // =========================
            // PAGINATION
            // =========================
            $perPage = (int) $request->input('per_page', 15);

            if (!in_array($perPage, [15, 25, 50], true)) {
                $perPage = 15;
            }

            $viewData['users'] = $query
                ->paginate($perPage)
                ->withQueryString();
        }

        if ($page === 'dashboard-siswa') {
            $user = $request->user();

            /*
            |--------------------------------------------------------------------------
            | Modul yang perlu dikerjakan
            |--------------------------------------------------------------------------
            */

            $completedModuleIds = DB::table('attempts')
                ->where('user_id', $user->id)
                ->where('status', 'selesai')
                ->pluck('module_id');

            $inProgressModuleIds = DB::table('attempts')
                ->where('user_id', $user->id)
                ->where('status', '!=', 'selesai')
                ->pluck('module_id');

            $modulesTodo = Module::query()
                ->released() // Hanya mengirim modul yang sudah rilis
                ->where('level', $user->level)
                ->whereNotIn('id', $completedModuleIds)
                ->with([
                    'attempts' => function ($query) use ($user) {
                        $query->where('user_id', $user->id)
                            ->latest('updated_at');
                    },
                ])
                ->latest()
                ->take(5)
                ->get();

            /*
            |--------------------------------------------------------------------------
            | Aktivitas terakhir
            |--------------------------------------------------------------------------
            */

            $recentActivities = Attempt::query()
                ->where('user_id', $user->id)
                ->where('status', 'selesai')
                ->whereNotNull('selesai_pada')
                ->with('module')
                ->latest('selesai_pada')
                ->take(5)
                ->get();

            $viewData['modulesTodo'] = $modulesTodo;
            $viewData['recentActivities'] = $recentActivities;
        }

        if ($page === 'modul-pembelajaran') {
            $user = $request->user();

            /*
            |--------------------------------------------------------------------------
            | Filter parameter dari Request
            |--------------------------------------------------------------------------
            */
            $search = trim((string) $request->query('search', ''));
            $level = $request->query('level', '');
            $kategori = $request->query('kategori', '');
            
            // Ambil jumlah baris per halaman dari request (default 5)
            $perPage = (int) $request->query('per_page', 5);
            if (!in_array($perPage, [5, 10, 15, 25], true)) {
                $perPage = 5;
            }

            /*
            |--------------------------------------------------------------------------
            | Query modul yang sudah rilis
            |--------------------------------------------------------------------------
            */
            $modulesQuery = Module::query()
                ->released(); // Hanya modul yang sudah rilis

            /*
            |--------------------------------------------------------------------------
            | Filter Level:
            | Jika dropdown level dipilih, gunakan level tersebut.
            | Jika dropdown kosong, defaultkan ke level siswa (jika ada).
            |--------------------------------------------------------------------------
            */
            if (in_array($level, ['A1', 'A2', 'B1', 'B2'], true)) {
                $modulesQuery->where('level', $level);
            } elseif (!empty($user->level)) {
                $modulesQuery->where('level', $user->level);
            }

            /*
            |--------------------------------------------------------------------------
            | Search berdasarkan judul atau deskripsi modul
            |--------------------------------------------------------------------------
            */
            if ($search !== '') {
                $modulesQuery->where(function ($query) use ($search) {
                    $query->where('judul', 'like', '%'.$search.'%')
                        ->orWhere('deskripsi', 'like', '%'.$search.'%');
                });
            }

            /*
            |--------------------------------------------------------------------------
            | Filter kategori
            |--------------------------------------------------------------------------
            */
            if (in_array($kategori, [
                'materi',
                'simulasi_horen',
                'simulasi_lesen',
                'simulasi_schreiben',
                'simulasi_sprechen',
            ], true)) {
                $modulesQuery->where('kategori', $kategori);
            }

            /*
            |--------------------------------------------------------------------------
            | Pagination dinamis sesuai per_page yang dipilih
            |--------------------------------------------------------------------------
            */
            $modules = $modulesQuery
                ->withCount('questions')
                ->orderByDesc('created_at')
                ->paginate($perPage)
                ->withQueryString();

            /*
            |--------------------------------------------------------------------------
            | Ambil attempt milik siswa yang sedang login
            |--------------------------------------------------------------------------
            */
            $attempts = Attempt::query()
                ->where('user_id', $user->id)
                ->whereIn('module_id', $modules->pluck('id'))
                ->orderByDesc('updated_at')
                ->get()
                ->groupBy('module_id');

            /*
            |--------------------------------------------------------------------------
            | Pasangkan attempt terbaru ke masing-masing modul
            |--------------------------------------------------------------------------
            */
            $modules->getCollection()->transform(function ($module) use ($attempts) {
                $module->attempt = $attempts
                    ->get($module->id, collect())
                    ->first();

                return $module;
            });

            /*
            |--------------------------------------------------------------------------
            | Kirim data ke Blade
            |--------------------------------------------------------------------------
            */
            $viewData['modules'] = $modules;
            $viewData['search'] = $search;
            $viewData['selectedLevel'] = $level;
            $viewData['selectedKategori'] = $kategori;
            $viewData['perPage'] = $perPage;
        }

        if ($page === 'performa-siswa') {
            $user = $request->user();

            /*
            |--------------------------------------------------------------------------
            | Filter parameter dari Request
            |--------------------------------------------------------------------------
            */
            $search   = trim((string) $request->query('search', ''));
            $kategori = $request->query('kategori', '');
            $waktu    = $request->query('waktu', '');
            $perPage  = (int) $request->query('per_page', 10);

            if (!in_array($perPage, [5, 10, 15, 25], true)) {
                $perPage = 10;
            }

            /*
            |--------------------------------------------------------------------------
            | Query Riwayat Pengerjaan Siswa (Attempt Selesai)
            |--------------------------------------------------------------------------
            */
            $attemptsQuery = Attempt::query()
                ->where('user_id', $user->id)
                ->where('status', 'selesai')
                ->with('module')
                ->whereHas('module', function ($q) use ($search, $kategori) {
                    // Filter Search judul modul
                    if ($search !== '') {
                        $q->where('judul', 'like', '%' . $search . '%');
                    }
                    // Filter Kategori
                    if ($kategori !== '') {
                        $q->where('kategori', $kategori);
                    }
                });

            /*
            |--------------------------------------------------------------------------
            | Filter Waktu
            |--------------------------------------------------------------------------
            */
            if ($waktu === '7hari') {
                $attemptsQuery->where('selesai_pada', '>=', now()->subDays(7));
            } elseif ($waktu === '30hari') {
                $attemptsQuery->where('selesai_pada', '>=', now()->subDays(30));
            } elseif ($waktu === 'bulanini') {
                $attemptsQuery->whereMonth('selesai_pada', now()->month)
                              ->whereYear('selesai_pada', now()->year);
            }

            $attempts = $attemptsQuery
                ->latest('selesai_pada')
                ->paginate($perPage)
                ->withQueryString();

            /*
            |--------------------------------------------------------------------------
            | Ringkasan Performa Berdasarkan Kategori (Total Card Atas)
            |--------------------------------------------------------------------------
            */
            $kategoriList = [
                'materi'             => 'Materi',
                'simulasi_lesen'     => 'Simulasi Lesen',
                'simulasi_horen'     => 'Simulasi Hören',
                'simulasi_schreiben' => 'Simulasi Schreiben',
                'simulasi_sprechen'  => 'Simulasi Sprechen',
            ];

            $summary = [];

            foreach ($kategoriList as $katKey => $label) {
                $query = Attempt::query()
                    ->where('user_id', $user->id)
                    ->where('status', 'selesai')
                    ->whereHas('module', function ($q) use ($katKey) {
                        $q->where('kategori', $katKey);
                    });

                $selesai = (clone $query)->count();

                if ($katKey === 'simulasi_sprechen') {
                    $rataRata = null;
                } else {
                    $rataRata = (clone $query)
                        ->whereNotNull('nilai')
                        ->avg('nilai');
                }

                $summary[$katKey] = [
                    'label'     => $label,
                    'selesai'   => $selesai,
                    'rata_rata' => $rataRata,
                ];
            }

            $viewData['attempts'] = $attempts;
            $viewData['summary']  = $summary;
            $viewData['search']   = $search;
            $viewData['kategori'] = $kategori;
            $viewData['waktu']    = $waktu;
            $viewData['perPage']  = $perPage;
        }

        return view($view, $viewData);
    }

    public function kerjakanSoal(Request $request, Module $module): View
    {
        $user = $request->user();

        // Hanya siswa yang boleh mengerjakan
        abort_unless($user->role === 'siswa', 403);

        // Siswa hanya boleh mengerjakan modul sesuai level
        abort_unless($module->level === $user->level, 403);

        /*
        |--------------------------------------------------------------------------
        | Ambil attempt yang sedang dikerjakan
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
        | Kalau belum ada attempt
        |--------------------------------------------------------------------------
        */
        if (!$attempt) {
            $attempt = Attempt::create([
                'user_id' => $user->id,
                'module_id' => $module->id,
                'status' => 'sedang_dikerjakan',
                'dimulai_pada' => now(),
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Ambil seluruh soal berdasarkan modul
        |--------------------------------------------------------------------------
        |
        | Penting:
        | - Hören  : soal + audio + image options
        | - Lesen  : soal + text options
        | - Schreiben : soal essay
        | - Sprechen  : topik/pertanyaan
        |
        */
        $questions = $module->questions()
            ->with([
                'options' => function ($query) {
                    $query->orderBy('urutan_tampil');
                }
            ])
            ->orderBy('urutan')
            ->get();

        return view('pages.pengerjaan-soal', [
            'module' => $module,
            'attempt' => $attempt,
            'questions' => $questions,
            'totalQuestions' => $questions->count(),
        ]);
    }

    /**
     * Kumpulkan seluruh data ringkasan dashboard (Total Siswa, Total
     * Modul, Ringkasan Modul, Perlu Dinilai, Aktivitas, Performa Siswa).
     */
    private function buildDashboardData(): array
    {
        $data = [];

        // =============================================================
        // 1. TOTAL SISWA AKTIF
        // =============================================================
        $data['totalSiswaAktif'] = User::query()
            ->where('role', 'siswa')
            ->where('status', 'aktif')
            ->where(function ($query) {
                $query->whereNull('aktif_sampai')
                    ->orWhereDate('aktif_sampai', '>=', now()->toDateString());
            })
            ->count();

        // =============================================================
        // 2. TOTAL MODUL
        // =============================================================
        $data['totalModul'] = Module::query()->count();

        // =============================================================
        // 3. RINGKASAN MODUL PER KATEGORI
        // =============================================================
        $data['moduleSummary'] = Module::query()
            ->select('kategori', DB::raw('COUNT(*) as total'))
            ->groupBy('kategori')
            ->pluck('total', 'kategori');

        // =============================================================
        // 4. PENGERJAAN SCHREIBEN YANG BELUM DINILAI
        // =============================================================
        $pendingGradingQuery = Attempt::query()
            ->with(['user', 'module'])
            ->where('status', 'selesai')
            ->whereNull('dinilai_pada')
            ->whereHas('module', function ($query) {
                $query->where('kategori', 'simulasi_schreiben');
            });

        $data['perluPenilaian'] = (clone $pendingGradingQuery)->count();

        $data['needsGrading'] = $pendingGradingQuery
            ->latest('selesai_pada')
            ->limit(4)
            ->get();

        // =============================================================
        // 5. AKTIVITAS ADMIN TERBARU
        // =============================================================
        $data['activities'] = DB::table('activity_logs')
            ->join('users', 'activity_logs.user_id', '=', 'users.id')
            ->whereIn('users.role', ['admin', 'tutor'])
            ->where('activity_logs.target_table', 'modules')
            ->whereIn('activity_logs.aksi', ['tambah', 'ubah', 'hapus'])
            ->select(
                'activity_logs.id',
                'activity_logs.aksi',
                'activity_logs.target_table',
                'activity_logs.target_id',
                'activity_logs.deskripsi',
                'activity_logs.created_at',
                'users.name as user_name',
                'users.role as user_role'
            )
            ->latest('activity_logs.created_at')
            ->limit(5)
            ->get();

        // =============================================================
        // 6. PERFORMA SISWA TERBARU
        // =============================================================
        // Semua pengerjaan yang sudah selesai ditampilkan. Untuk
        // Schreiben yang belum dinilai, nilai ditampilkan sebagai '-'.
        $data['performance'] = Attempt::query()
            ->with(['user', 'module'])
            ->where('status', 'selesai')
            ->latest('selesai_pada')
            ->limit(5)
            ->get();

        return $data;
    }

    /**
     * Halaman pengerjaan / detail modul untuk siswa.
     */
    public function kerjakanModule(Request $request, Module $module)
    {
        $user = $request->user();

        /*
        |--------------------------------------------------------------------------
        | Security
        |--------------------------------------------------------------------------
        */

        // Hanya siswa
        abort_unless(
            $user->role === 'siswa',
            403,
            'Akses hanya untuk siswa.'
        );

        // Hanya modul sesuai level siswa
        abort_unless(
            $module->level === $user->level,
            403,
            'Modul ini bukan untuk level kamu.'
        );

        /*
        |--------------------------------------------------------------------------
        | Tentukan halaman berdasarkan kategori
        |--------------------------------------------------------------------------
        */

        switch ($module->kategori) {

            /*
            |--------------------------------------------------------------------------
            | Materi
            |--------------------------------------------------------------------------
            */
            case 'materi':

                return view('pages.pengerjaan-materi', [
                    'module' => $module,
                ]);


            /*
            |--------------------------------------------------------------------------
            | Simulasi Hören
            | Simulasi Lesen
            | Simulasi Schreiben
            | Simulasi Sprechen
            |--------------------------------------------------------------------------
            */

            case 'simulasi_horen':
            case 'simulasi_lesen':
            case 'simulasi_schreiben':
            case 'simulasi_sprechen':

                return redirect()->route(
                    'siswa.modul.questions',
                    ['module' => $module]
                );


            /*
            |--------------------------------------------------------------------------
            | Kategori tidak dikenal
            |--------------------------------------------------------------------------
            */

            default:

                abort(
                    404,
                    'Kategori modul tidak dikenali.'
                );
        }
    }

    /**
     * Menampilkan hasil pengerjaan siswa.
     */
    public function hasilPengerjaan(
        Request $request,
        Module $module,
        Attempt $attempt
    ): View {

        $user = $request->user();

        /*
        |--------------------------------------------------------------------------
        | Security check
        |--------------------------------------------------------------------------
        */

        abort_unless($user->role === 'siswa', 403);

        abort_unless($module->level === $user->level, 403);

        /*
        * Attempt harus benar-benar milik siswa yang login
        * dan berasal dari modul yang sedang dibuka.
        */
        abort_unless($attempt->user_id === $user->id, 403);

        abort_unless($attempt->module_id === $module->id, 403);

        abort_unless($attempt->status === 'selesai', 404);

        /*
        |--------------------------------------------------------------------------
        | Ambil soal
        |--------------------------------------------------------------------------
        */

        $questions = $module->questions()
            ->with('options')
            ->orderBy('urutan')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Ambil jawaban siswa
        |--------------------------------------------------------------------------
        */

        $answers = $attempt->answers()
            ->with([
                'selectedOption',
                'question',
            ])
            ->get()
            ->keyBy('question_id');

        /*
        |--------------------------------------------------------------------------
        | Gabungkan soal + jawaban siswa
        |--------------------------------------------------------------------------
        */

        $questions->each(function ($question) use ($answers) {

            $question->studentAnswer =
                $answers->get($question->id);

        });

        /*
        |--------------------------------------------------------------------------
        | Data ke Blade
        |--------------------------------------------------------------------------
        */

        return view('pages.detail-pengerjaan', [
            'module' => $module,
            'attempt' => $attempt,
            'questions' => $questions,
        ]);
    }
}
