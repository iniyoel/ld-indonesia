<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PageController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes — LD Indonesia
|--------------------------------------------------------------------------
|
| Setiap halaman ditulis sebagai Blade view di resources/views/pages/,
| dengan tautan internal berformat "nama-halaman" tanpa ekstensi .html
| (baik lewat <a href="..."> maupun window.location.href di JavaScript).
|
| SATU route dinamis "/{page}" melayani SEMUA halaman yang butuh login
| (siswa/tutor/admin). Middleware 'auth' memastikan sudah login;
| PageController::show() yang menentukan apakah role user boleh membuka
| halaman yang diminta atau tidak, berdasarkan config/page_access.php.
|
| URL lama dengan .html tetap didukung sebagai redirect ke versi tanpa
| ekstensi agar tautan lama tidak rusak.
|
*/

// ------------------------------------------------------------------
// Halaman publik (tidak butuh login)
// ------------------------------------------------------------------

Route::get('/', function () {
    $tutors = User::query()
        ->where('role', 'tutor')
        ->where('status', 'aktif')
        ->orderBy('name')
        ->get();

    return view('pages.index', compact('tutors'));
})->name('home');
Route::get('/index', function () {
    $tutors = User::query()
        ->where('role', 'tutor')
        ->where('status', 'aktif')
        ->orderBy('name')
        ->get();

    return view('pages.index', compact('tutors'));
})->name('home.index');
Route::redirect('/index.html', '/index');

Route::get('/masuk', [AuthController::class, 'show'])->name('login');
Route::post('/masuk', [AuthController::class, 'login'])->name('login.attempt');
Route::redirect('/masuk.html', '/masuk');

Route::get('/keluar', [AuthController::class, 'logout'])->name('logout');
Route::redirect('/keluar.html', '/keluar');

// ------------------------------------------------------------------
// Semua halaman lain — wajib login, role dicek di PageController
// ------------------------------------------------------------------

Route::get('/{page}.html', function (string $page) {
    return redirect('/' . $page, 301);
})->where('page', '[A-Za-z0-9\-]+');

Route::post('/forgot-password', function (Illuminate\Http\Request $request) {
    $email = trim((string) $request->input('email', $request->input('email')));
    $password = $request->input('password');
    $confirmation = $request->input('password_confirmation');

    $data = $request->validate([
        'email' => ['required', 'email', 'exists:users,email'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ], [
        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Masukkan alamat email yang valid.',
        'email.exists' => 'Email tidak ditemukan.',
        'password.required' => 'Password baru wajib diisi.',
        'password.min' => 'Password minimal 8 karakter.',
        'password.confirmed' => 'Konfirmasi password tidak cocok.',
    ]);

    $user = \App\Models\User::where('email', $email)->first();

    if (! $user) {
        throw \Illuminate\Validation\ValidationException::withMessages([
            'email' => 'Email tidak ditemukan.',
        ]);
    }

    $user->forceFill([
        'password' => \Illuminate\Support\Facades\Hash::make($password),
    ])->save();

    return response()->json([
        'message' => 'Password berhasil diubah. Anda dapat masuk dengan password baru.',
    ]);
});

Route::middleware('auth')->group(function () {
    Route::post('/admin-pengguna', function (Illuminate\Http\Request $request) {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'role' => ['required', 'string', 'in:admin,tutor,siswa'],
            'level' => ['nullable', 'string', 'in:A1,A2,B1,B2'],
            'description' => ['nullable', 'string', 'max:2000'],
            'generate_password' => ['nullable', 'boolean'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $role = $data['role'];
        $generatePassword = filter_var($data['generate_password'] ?? true, FILTER_VALIDATE_BOOLEAN);

        if ($role === 'tutor' && empty($data['photo'] ?? null)) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'photo' => 'Foto profil wajib diunggah untuk tutor.',
            ]);
        }

        $password = Illuminate\Support\Str::random(12);
        $photoPath = null;

        if (!empty($data['photo'])) {
            $photoPath = $data['photo']->store('profile-photos', 'public');
        }
        
        $user = \App\Models\User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($password),
            'role' => $role,
            'level' => $role === 'siswa' ? ($data['level'] ?? null) : null,
            'profile_photo_path' => $photoPath,
            'description' => $role === 'tutor'
                ? ($data['description'] ?? null)
                : null,
            'password_generated' => $generatePassword,
            'status' => 'aktif',
            'aktif_sampai' => $role === 'siswa' ? now()->addMonth() : null,
        ]);

        if ($generatePassword) {
            \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\UserAccountCreatedMail($user->name, $user->email, $password, ucfirst($role)));
        }

        return response()->json([
            'message' => 'Pengguna berhasil dibuat.',
            'user' => [
                'id' => $user->id,
                'nama' => $user->name,
                'email' => $user->email,
                'peran' => ucfirst($role),
                'level' => $user->level,
                'status' => 'Aktif',
                'dibuat' => $user->created_at->toDateString(),
            ],
        ], 201);
    })->middleware('can:admin');

    Route::patch('/admin-pengguna/{user}', function (Illuminate\Http\Request $request, \App\Models\User $user) {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
            'role' => ['required', 'string', 'in:admin,tutor,siswa'],
            'level' => ['nullable', 'string', 'in:A1,A2,B1,B2'],
            'status' => ['required', 'string', 'in:aktif,non_aktif'],
        ]);

        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'level' => $data['role'] === 'siswa' ? ($data['level'] ?? null) : null,
            'status' => $data['status'],
        ]);

        return response()->json([
            'message' => 'Data pengguna berhasil diperbarui.',
            'user' => [
                'id' => $user->id,
                'nama' => $user->name,
                'email' => $user->email,
                'peran' => ucfirst($user->role),
                'level' => $user->level,
                'status' => $user->status === 'aktif' ? 'Aktif' : 'Non-Aktif',
            ],
        ]);
    })->middleware('can:admin');

    Route::delete('/admin-pengguna/{user}', function (\App\Models\User $user) {
        // Jangan biarkan admin menghapus dirinya sendiri
        if (auth()->id() === $user->id) {
            return response()->json(['message' => 'Anda tidak dapat menghapus akun Anda sendiri.'], 403);
        }

        $user->delete();

        return response()->json([
            'message' => 'Pengguna berhasil dihapus.',
        ]);
    })->middleware('can:admin');

    // ------------------------------------------------------------------
    // Modul — Admin & Tutor
    // ------------------------------------------------------------------

    Route::get('/modul', [ModuleController::class, 'index'])
        ->name('modul.index')
        ->middleware('can:manage-modules');

    Route::get('/modul/tambah', [ModuleController::class, 'create'])
        ->name('modul.create')
        ->middleware('can:manage-modules');

    Route::post('/modul', [ModuleController::class, 'store'])
        ->name('modul.store')
        ->middleware('can:manage-modules');

    Route::get('/{page}', [PageController::class, 'show'])
        ->where('page', '[A-Za-z0-9\-]+')
        ->name('page');
});
