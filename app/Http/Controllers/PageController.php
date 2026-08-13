<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Render halaman "pages.{$page}", HANYA jika:
     *  1. View-nya memang ada, dan
     *  2. Role user yang sedang login diizinkan membuka halaman itu
     *     (lihat config/page_access.php).
     *
     * Route yang memanggil method ini sudah dijaga middleware 'auth',
     * jadi $request->user() di sini dipastikan tidak null.
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
            $viewData['users'] = \App\Models\User::query()
                ->orderBy('role')
                ->orderBy('name')
                ->get();
        }

        if ($page === 'dashboard-admin') {
            $viewData['totalSiswaAktif'] = \App\Models\User::query()
                ->where('role', 'siswa')
                ->where('status', 'aktif')
                ->where(function ($query) {
                    $query->whereNull('aktif_sampai')
                        ->orWhereDate('aktif_sampai', '>=', now()->toDateString());
                })
                ->count();
        }

        return view($view, $viewData);
    }
}
