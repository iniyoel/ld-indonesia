<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Halaman yang boleh diakses per role
    |--------------------------------------------------------------------------
    |
    | Kunci array adalah nilai kolom `role` pada tabel users (siswa/tutor/
    | admin), isinya daftar nama halaman (nama file Blade tanpa ".blade.php"
    | dan tanpa ".html") yang boleh dibuka oleh role tersebut.
    |
    | Dipakai oleh App\Http\Controllers\PageController::show() untuk
    | menentukan apakah user yang sedang login boleh membuka halaman yang
    | diminta atau tidak (403 kalau tidak boleh).
    |
    */

    'siswa' => [
        'dashboard-siswa',
        'modul-pembelajaran',
        'performa-siswa',
        'pengerjaan-materi',
        'pengerjaan-soal',
        'simulasi-horen',
        'simulasi-lesen',
        'simulasi-schreiben',
        'simulasi-sprechen',
        'detail-pengerjaan',
        'detail-pengerjaan-horen',
        'detail-pengerjaan-lesen',
        'detail-pengerjaan-schreiben',
    ],

    'tutor' => [
        'dashboard-tutor',
        'tutor-modul-pembelajaran',
        'tutor-modul-form',
        'tutor-modul-soal',
        'tutor-performa-siswa',
        'tutor-siswa-detail',

        'dashboard-admin',
        'admin-modul-pembelajaran',
        'admin-modul-form',
        'admin-modul-soal',
        'admin-performa-siswa',
        'admin-siswa-detail',
    ],

    'admin' => [
        'dashboard-admin',
        'admin-modul-pembelajaran',
        'admin-modul-form',
        'admin-modul-soal',
        'admin-performa-siswa',
        'admin-siswa-detail',
        'admin-pengguna',
    ],

];
