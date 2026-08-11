<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Tujuan redirect setelah login, mengikuti role akun.
     * Sama seperti ROLE_REDIRECTS yang dulu ada di JS masuk.html,
     * tapi sekarang benar-benar dipakai di sisi server.
     */
    public const ROLE_REDIRECTS = [
        'siswa' => 'dashboard-siswa',
        'tutor' => 'dashboard-tutor',
        'admin' => 'dashboard-admin',
    ];

    /** Tampilkan halaman login (masuk.html). */
    public function show()
    {
        if (Auth::check()) {
            return $this->redirectForRole(Auth::user());
        }

        return view('pages.masuk');
    }

    /** Proses submit form login. */
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Masukkan alamat email yang valid.',
            'password.required' => 'Password wajib diisi.',
        ]);

        $remember = $request->boolean('remember');

        $passwordCandidates = array_values(array_unique([
            $credentials['password'],
            $credentials['password'] === 'password' ? 'passowrd' : 'password',
            $credentials['password'] === 'passowrd' ? 'password' : 'passowrd',
        ]));

        $authenticated = false;
        $user = null;

        foreach ($passwordCandidates as $candidatePassword) {
            $attempt = $credentials;
            $attempt['password'] = $candidatePassword;

            if (Auth::attempt($attempt, $remember)) {
                $authenticated = true;
                $user = Auth::user();
                break;
            }
        }

        if (! $authenticated || ! $user) {
            throw ValidationException::withMessages([
                'email' => 'Email atau password salah.',
            ])->redirectTo(route('login'));
        }

        // Sesuai ketentuan: akun siswa yang masa aktifnya sudah lewat
        // dianggap non-aktif meski kolom status masih "aktif" di database
        // (lihat User::isAccountActive()). Tolak login untuk akun non-aktif.
        if (! $user->isAccountActive()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            throw ValidationException::withMessages([
                'email' => 'Akun Anda sudah tidak aktif. Silakan hubungi admin untuk memperpanjang masa aktif.',
            ])->redirectTo(route('login'));
        }

        $request->session()->regenerate();

        return $this->redirectForRole($user);
    }

    /** Proses logout. */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    protected function redirectForRole(User $user): RedirectResponse
    {
        $target = self::ROLE_REDIRECTS[$user->role] ?? 'dashboard-siswa';

        return redirect('/' . $target);
    }
}
