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
                    'pages.dashboard-admin',
                    $this->buildDashboardData()
                );

            case 'siswa':
                return view(
                    'pages.dashboard-siswa',
                    $this->buildDashboardData()
                );

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
        $view = 'pages.' . $page;

        abort_unless(view()->exists($view), 404);

        $role = $request->user()->role;
        $allowedPages = config("page_access.{$role}", []);

        abort_unless(in_array($page, $allowedPages, true), 403);

        $viewData = [];

        if ($page === 'admin-pengguna') {
            $viewData['users'] = User::query()
                ->orderBy('role')
                ->orderBy('name')
                ->get();
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

            $modulesTodo = \App\Models\Module::query()
                ->where('level', $user->level)
                ->whereNotIn('id', $completedModuleIds)
                ->with([
                    'attempts' => function ($query) use ($user) {
                        $query->where('user_id', $user->id)
                            ->latest('updated_at');
                    }
                ])
                ->latest()
                ->take(5)
                ->get();

            /*
            |--------------------------------------------------------------------------
            | Aktivitas terakhir
            |--------------------------------------------------------------------------
            */

            $recentActivities = \App\Models\Attempt::query()
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
            | Filter modul
            |--------------------------------------------------------------------------
            */

            $search = trim((string) $request->query('search', ''));
            $level = $request->query('level', '');
            $kategori = $request->query('kategori', '');

            /*
            |--------------------------------------------------------------------------
            | Query modul
            |--------------------------------------------------------------------------
            */

            $modulesQuery = Module::query()
                ->where('level', $user->level);

            /*
            |--------------------------------------------------------------------------
            | Search berdasarkan judul modul
            |--------------------------------------------------------------------------
            */

            if ($search !== '') {
                $modulesQuery->where(function ($query) use ($search) {
                    $query->where('judul', 'like', '%' . $search . '%')
                        ->orWhere('deskripsi', 'like', '%' . $search . '%');
                });
            }

            /*
            |--------------------------------------------------------------------------
            | Filter level
            |--------------------------------------------------------------------------
            |
            | Siswa tetap tidak boleh melihat level di luar levelnya.
            |
            */

            if (in_array($level, ['A1', 'A2', 'B1', 'B2'], true)) {
                $modulesQuery->where('level', $level);
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
            | Pagination
            |--------------------------------------------------------------------------
            */

            $modules = $modulesQuery
                ->withCount('questions')
                ->orderByDesc('created_at')
                ->paginate(5)
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
        }

        if ($page === 'performa-siswa') {
            $user = $request->user();

            /*
            |--------------------------------------------------------------------------
            | Riwayat pengerjaan siswa
            |--------------------------------------------------------------------------
            | Hanya mengambil attempt milik siswa yang sedang login
            | dan sudah selesai.
            */
            $attempts = Attempt::query()
                ->where('user_id', $user->id)
                ->where('status', 'selesai')
                ->with('module')
                ->whereHas('module')
                ->latest('selesai_pada')
                ->paginate(10)
                ->withQueryString();

            /*
            |--------------------------------------------------------------------------
            | Ringkasan performa berdasarkan kategori
            |--------------------------------------------------------------------------
            */
            $kategoriList = [
                'materi' => 'Materi',
                'simulasi_lesen' => 'Simulasi Lesen',
                'simulasi_horen' => 'Simulasi Hören',
                'simulasi_schreiben' => 'Simulasi Schreiben',
                'simulasi_sprechen' => 'Simulasi Sprechen',
            ];

            $summary = [];

            foreach ($kategoriList as $kategori => $label) {
                $query = Attempt::query()
                    ->where('user_id', $user->id)
                    ->where('status', 'selesai')
                    ->whereHas('module', function ($query) use ($kategori) {
                        $query->where('kategori', $kategori);
                    });

                $selesai = (clone $query)->count();

                /*
                * Sprechen tidak menggunakan nilai angka.
                */
                if ($kategori === 'simulasi_sprechen') {
                    $rataRata = null;
                } else {
                    $rataRata = (clone $query)
                        ->whereNotNull('nilai')
                        ->avg('nilai');
                }

                $summary[$kategori] = [
                    'label' => $label,
                    'selesai' => $selesai,
                    'rata_rata' => $rataRata,
                ];
            }

            $viewData['attempts'] = $attempts;
            $viewData['summary'] = $summary;
        }

        return view($view, $viewData);
    }

    public function kerjakanSoal(Request $request, Module $module): View
    {
        $user = $request->user();

        // Hanya siswa yang boleh mengerjakan soal
        abort_unless($user->role === 'siswa', 403);

        // Siswa hanya boleh mengakses modul sesuai levelnya
        abort_unless($module->level === $user->level, 403);

        // Ambil soal berdasarkan modul
        // JANGAN mengambil is_correct karena jawaban benar
        // tidak boleh dikirim ke browser siswa.
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
            'questions' => $questions,
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
    public function kerjakanModule(Request $request, Module $module): View
    {
        $user = $request->user();

        // Hanya siswa yang boleh mengerjakan modul
        abort_unless($user->role === 'siswa', 403);

        // Siswa hanya boleh mengerjakan modul sesuai levelnya
        abort_unless($module->level === $user->level, 403);

        return view('pages.pengerjaan-materi', [
            'module' => $module,
        ]);
    }
}