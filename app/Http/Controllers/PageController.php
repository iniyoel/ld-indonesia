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
    /**
     * Halaman dashboard tunggal untuk admin & tutor.
     * Datanya identik untuk kedua role — yang beda hanya sidebar/menu
     * yang tersedia, ditangani otomatis oleh <x-dashboard-sidebar>.
     */
    public function dashboard(Request $request): View
    {
        return view('pages.dashboard-admin', $this->buildDashboardData());
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

        return view($view, $viewData);
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
        $data['performance'] = Attempt::query()
            ->with(['user', 'module'])
            ->where('status', 'selesai')
            ->latest('selesai_pada')
            ->limit(5)
            ->get();

        return $data;
    }
}
