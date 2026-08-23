<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PageController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AdminPerformanceController;

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
        ->orderBy('naodul-e')
        ->get();

    return view('pages.index', compact('tutors'));
})->name('home.index');
Route::redirect('/index.html', '/index');

Route::get('/masuk', [AuthController::class, 'show'])->name('login');
Route::post('/masuk', [AuthController::class, 'login'])->name('login.attempt');
Route::redirect('/masuk.html', '/masuk');

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

    /*
    |--------------------------------------------------------------------------
    | Dashboard — Admin & Tutor
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [PageController::class, 'dashboard'])
        ->name('dashboard.admin')
        ->middleware('can:manage-modules');

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

    Route::delete('/modul/{module}', [ModuleController::class, 'destroy'])
        ->name('modul.destroy')
        ->middleware('can:manage-modules');

    Route::get('/modul/{module}/edit', [ModuleController::class, 'edit'])
        ->name('modul.edit')
        ->middleware('can:manage-modules');

    Route::put('/modul/{module}', [ModuleController::class, 'update'])
        ->name('modul.update')
        ->middleware('can:manage-modules');


    /*
    |--------------------------------------------------------------------------
    | Soal — Admin & Tutor
    |--------------------------------------------------------------------------
    */

    Route::get('/modul/{module}/soal', [QuestionController::class, 'create'])
        ->name('modul.soal.create')
        ->middleware('can:manage-modules');

    Route::post('/modul/{module}/soal', [QuestionController::class, 'store'])
        ->name('modul.soal.store')
        ->middleware('can:manage-modules');

    // Route ini harus sebelum modul.soal.update agar laravel tidak mengakses route update ketika proses finish soal
    Route::post('/modul/{module}/soal/selesai', [QuestionController::class, 'finish'])
        ->name('modul.soal.finish')
        ->middleware('can:manage-modules');
    
    Route::post('/modul/{module}/soal/{question}', [QuestionController::class, 'update'])
        ->name('modul.soal.update')
        ->middleware('can:manage-modules');

    Route::delete('/modul/{module}/soal/{question}/destroy', [QuestionController::class, 'destroy'])
        ->name('modul.soal.destroy')
        ->middleware('can:manage-modules');

    // =====================================================
    // SISWA — Mengerjakan Modul
    // ===================================================== 

    Route::get('/modul-pembelajaran/{module}', [PageController::class, 'kerjakanModule'])
        ->name('modul.kerjakan')
        ->middleware('auth');

    // Halaman pengerjaan soal siswa
    Route::get('/modul/{module}/soal-pengerjaan', [PageController::class, 'kerjakanSoal'])
        ->name('siswa.modul.questions')
        ->middleware('auth');

    // Mulai mengerjakan modul
    Route::get('/modul/{module}/kerjakan', [ModuleController::class, 'start'])
        ->name('siswa.modul.start')
        ->middleware('auth');

    // Selesai mengerjakan modul
    Route::post('/modul/{module}/selesai', [ModuleController::class, 'finishAttempt'])
        ->name('siswa.modul.finish')
        ->middleware('auth');

    Route::get('/modul/{module}/hasil/{attempt}', [PageController::class, 'hasilPengerjaan'])
        ->name('siswa.modul.hasil')
        ->middleware('auth');

    /*
    |--------------------------------------------------------------------------
    | Halaman Generik
    |--------------------------------------------------------------------------
    */

    Route::get('/{page}', [PageController::class, 'show'])
        ->where('page', '[A-Za-z0-9\-]+')
        ->name('page');

    /*
    |--------------------------------------------------------------------------
    | Performa Siswa — Admin
    |--------------------------------------------------------------------------
    */
    Route::get('/admin/performa-siswa', [AdminPerformanceController::class, 'index'])
        ->name('admin.performa.index');

    Route::get('/admin/performa-siswa/{user}', [AdminPerformanceController::class, 'show'])
        ->name('admin.siswa.detail');

    /*
    |--------------------------------------------------------------------------
    | Logout
    |--------------------------------------------------------------------------
    */
    Route::post('/logout', function () {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login');
    })->name('logout');

});
