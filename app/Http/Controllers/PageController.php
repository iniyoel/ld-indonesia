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
     * Render halaman pages.* dan menyiapkan data yang memang dibutuhkan
     * oleh masing-masing halaman.
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

        if ($page === 'dashboard-admin') {
            // =============================================================
            // 1. TOTAL SISWA AKTIF
            // =============================================================
            // Akun siswa hanya dihitung aktif jika status = aktif dan masa
            // aktifnya belum lewat.
            $viewData['totalSiswaAktif'] = User::query()
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
            $viewData['totalModul'] = Module::query()->count();

            // =============================================================
            // 3. RINGKASAN MODUL PER KATEGORI
            // =============================================================
            $viewData['moduleSummary'] = Module::query()
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

            $viewData['perluPenilaian'] = (clone $pendingGradingQuery)->count();

            $viewData['needsGrading'] = $pendingGradingQuery
                ->latest('selesai_pada')
                ->limit(5)
                ->get();

            // =============================================================
            // 5. AKTIVITAS ADMIN/TUTOR TERBARU
            // =============================================================
            // Menggunakan query builder supaya dashboard tidak bergantung
            // pada implementasi model ActivityLog. Tabel activity_logs
            // menyimpan user_id, aksi, target_table, target_id, deskripsi,
            // dan timestamps.
            $viewData['activities'] = DB::table('activity_logs')
                ->join('users', 'activity_logs.user_id', '=', 'users.id')
                ->where('users.role', 'admin')
                ->where('activity_logs.target_table', 'modules')
                ->whereIn('activity_logs.aksi', [
                    'tambah',
                    'ubah',
                    'hapus',
                ])
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
            $viewData['performance'] = Attempt::query()
                ->with(['user', 'module'])
                ->where('status', 'selesai')
                ->latest('selesai_pada')
                ->limit(5)
                ->get();
        }

        return view($view, $viewData);
    }
}