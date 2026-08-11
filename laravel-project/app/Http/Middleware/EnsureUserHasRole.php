<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Membatasi akses route berdasarkan role user yang sedang login.
 *
 * Dipakai lewat alias 'role', mis: ->middleware('role:admin') atau
 * ->middleware('role:admin,tutor') untuk mengizinkan lebih dari satu role.
 *
 * CATATAN: pembatasan akses untuk halaman "*.html" saat ini ditangani di
 * App\Http\Controllers\PageController::show() lewat config/page_access.php
 * (satu route, satu pengecekan role — supaya tidak ada ambiguitas urutan
 * route). Middleware ini tetap disediakan untuk dipakai langsung pada
 * route lain di masa depan (mis. route API) yang butuh pembatasan role
 * sederhana tanpa lewat PageController.
 *
 * Middleware ini HARUS dipasang setelah 'auth' pada route/group yang sama,
 * supaya $request->user() sudah pasti terisi saat middleware ini berjalan.
 */
class EnsureUserHasRole
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $user = $request->user();

        // Seharusnya sudah ditangani middleware 'auth', tapi dijaga juga di sini.
        if (! $user) {
            return redirect()->route('login')->with('error', 'Silakan masuk terlebih dahulu.');
        }

        if (! in_array($user->role, $roles, true)) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}
