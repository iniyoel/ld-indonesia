# LD Indonesia — Website (Laravel)

Website LD Indonesia (bimbel bahasa Jerman): landing page, autentikasi, dan portal untuk tiga role — **Siswa**, **Tutor**, dan **Admin** — dibungkus dalam struktur project [Laravel 11](https://laravel.com).

## Status project ini

Landing page, login (dengan pembatasan akses per role), dan sebagian struktur database (`users`, `modules`, `questions`, `question_options`) sudah **sungguhan** — bukan lagi simulasi front-end. Bagian lain (CRUD modul lewat form, penilaian tutor, dsb) isinya masih data contoh statis di tiap halaman, ditandai komentar `TODO` / `CATATAN INTEGRASI BACKEND` yang menunjukkan bagian mana yang perlu disambungkan ke Eloquent/API selanjutnya.

## Cara menjalankan di komputer kamu

Karena project ini dibuat di lingkungan tanpa akses ke Packagist, folder `vendor/` (dependency Composer) **belum ter-install**. Jalankan langkah berikut di komputer kamu yang punya PHP + Composer + MySQL + akses internet:

```bash
composer install
(kalau error atau warning, jalanin "composer update --no-security-blocking --ignore-platform-reqs")
cp .env.example .env
php artisan key:generate
```

Project ini defaultnya dikonfigurasi untuk **MySQL**. Buat databasenya dulu (lewat phpMyAdmin, TablePlus, atau CLI):

```sql
CREATE DATABASE ld_indonesia CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

Cek/isi kredensial di `.env` sesuai instalasi MySQL kamu:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ld_indonesia
DB_USERNAME=root
DB_PASSWORD=
```

Lalu jalankan migrasi + seed data contoh (3 akun demo, lihat bagian "Login & pembatasan akses per role" di bawah):

```bash
php artisan migrate --seed
php artisan serve
```

Lalu buka `http://localhost:8000` di browser.

> Butuh PHP 8.2+, Composer, dan MySQL 5.7+/8.0+ (atau MariaDB). Tidak perlu Node/NPM kecuali kamu ingin memakai pipeline Vite bawaan Laravel (project ini tidak memakainya — semua CSS/JS sudah ditulis langsung di tiap halaman).
>
> **Tidak punya MySQL / mau yang lebih ringan?** Project ini juga tetap bisa jalan pakai SQLite — lihat bagian Troubleshooting di bawah.

## Struktur routing

Semua halaman ditulis sebagai Blade view di `resources/views/pages/`, tetap mengikuti pola nama file `nama-halaman.html` sesuai tautan yang sudah ada di tiap file. Route-nya sengaja dibuat **satu route dinamis saja** untuk semua halaman yang butuh login, supaya tidak ada ambiguitas urutan pencocokan route di Laravel:

```php
Route::middleware('auth')->group(function () {
    Route::get('/{page}.html', [PageController::class, 'show'])
        ->where('page', '[A-Za-z0-9\-]+');
});
```

Pengecekan **role**-nya dilakukan di dalam `PageController::show()`, lewat lookup ke `config/page_access.php` (daftar halaman yang boleh diakses tiap role):

```php
$role = $request->user()->role;
$allowedPages = config("page_access.{$role}", []);
abort_unless(in_array($page, $allowedPages, true), 403);
```

> Versi sebelumnya sempat memecah ini jadi 3 route terpisah (satu per role) dengan pola URI yang sama `/{page}.html` — pendekatan itu menyebabkan bug 404 karena berisiko salah urutan pencocokan route. Struktur sekarang (1 route + 1 pengecekan role di controller) lebih aman dan gampang dilacak.

Jadi tautan internal seperti `href="dashboard-siswa.html"` atau `window.location.href = 'masuk.html'` tetap berfungsi apa adanya, TAPI sekarang hanya bisa dibuka oleh user yang login dengan role yang sesuai — lihat bagian "Login & pembatasan akses per role" di bawah untuk detail dan cara mengetesnya.

| URL | View | Role |
|---|---|---|
| `/` , `/index.html` | `pages/index.blade.php` (landing page) | publik |
| `/masuk.html` | `pages/masuk.blade.php` (login) | publik |
| `/keluar.html` | — (logout, redirect ke `/masuk.html`) | user login |
| `/dashboard-siswa.html`, dst (lihat `config/page_access.php` → `siswa`) | `pages/dashboard-siswa.blade.php`, dst | siswa |
| `/dashboard-tutor.html`, dst (lihat `config/page_access.php` → `tutor`) | `pages/dashboard-tutor.blade.php`, dst | tutor |
| `/dashboard-admin.html`, dst (lihat `config/page_access.php` → `admin`) | `pages/dashboard-admin.blade.php`, dst | admin |

## Login & pembatasan akses per role

Login sekarang **sungguhan** (bukan simulasi front-end lagi): memakai `Auth::attempt()` Laravel terhadap tabel `users`. Setelah login, hanya halaman yang terdaftar untuk role user itu di `config/page_access.php` yang bisa dibuka (lihat `app/Http/Controllers/PageController.php`).

**Setelah `php artisan migrate --seed`**, tersedia 3 akun contoh (password sama untuk semua: `password`):

| Role | Email | Password |
|---|---|---|
| Admin | `admin@ldindonesia.test` | `password` |
| Tutor | `tutor@ldindonesia.test` | `password` |
| Siswa | `siswa@ldindonesia.test` | `password` |

**Cara kerjanya:**
- Belum login, coba buka mis. `/dashboard-admin.html` → otomatis diarahkan ke halaman login.
- Login sebagai **siswa**, lalu coba buka `/dashboard-admin.html` atau `/tutor-modul-pembelajaran.html` → dapat **403 Forbidden** (bukan malah bisa masuk).
- Login sebagai **admin**, otomatis diarahkan ke `/dashboard-admin.html`; tautan sidebar & tombol Keluar semuanya sudah mengarah ke halaman yang benar sesuai role tersebut.
- Akun siswa yang `aktif_sampai`-nya sudah lewat (lihat aturan masa aktif 1 bulan) ditolak saat login, walau password benar — pesan errornya mengarahkan untuk hubungi admin.

Daftar halaman per role dikonfigurasi di `config/page_access.php` — tambahkan nama halaman baru ke array role yang sesuai kalau nanti ada halaman baru.

## Peta halaman per role

**Publik**
- `index` — Landing page
- `masuk` — Login & lupa password

**Siswa**
- `dashboard-siswa`, `modul-pembelajaran`, `performa-siswa`
- `pengerjaan-materi`, `pengerjaan-soal`
- `simulasi-horen`, `simulasi-lesen`, `simulasi-schreiben`, `simulasi-sprechen`
- `detail-pengerjaan`, `detail-pengerjaan-horen`, `detail-pengerjaan-lesen`, `detail-pengerjaan-schreiben`

**Tutor** (isi & fungsi sama dengan Admin, sidebar dibatasi)
- `dashboard-tutor`, `tutor-modul-pembelajaran`, `tutor-modul-form`, `tutor-modul-soal`
- `tutor-performa-siswa`, `tutor-siswa-detail`

**Admin**
- `dashboard-admin`, `admin-modul-pembelajaran`, `admin-modul-form`, `admin-modul-soal`
- `admin-performa-siswa`, `admin-siswa-detail`, `admin-pengguna`

Beberapa tautan (mis. `admin-modul-detail.html`, `admin-pengguna-form.html`, `tutor-modul-detail.html`) sengaja belum punya view — halaman tersebut memang belum dibuat dan akan menghasilkan 404 sampai dikerjakan.

