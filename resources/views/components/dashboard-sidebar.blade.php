@php
    // Menu "Pengguna" hanya tampil untuk admin. Semua route lain (dashboard,
    // modul) sudah dipakai bersama admin & tutor lewat middleware Gate,
    // jadi tidak perlu percabangan URL di sini lagi.
    $role = auth()->user()->role;
@endphp
<aside class="sidebar" id="sidebar" aria-label="Navigasi utama">
    <div class="sidebar-brand">
        <a href="{{ route('dashboard.admin') }}" style="display:flex;align-items:center;gap:10px;"
            aria-label="LD Indonesia — Dashboard">
            <svg class="brand-mark" viewBox="0 0 48 48" fill="none" aria-hidden="true">
                <path
                    d="M24 4c-6 0-10 5-10 5s3 1 4 4c-3-1-6 0-7 3 3 0 5 1 6 3-3 1-5 3-5 6 3-1 5-1 7 0-1 3 0 6 2 8 1-3 2-5 3-6 1 1 2 3 3 6 2-2 3-5 2-8 2-1 4-1 7 0 0-3-2-5-5-6 1-2 3-3 6-3-1-3-4-4-7-3 1-3 4-4 4-4s-4-5-10-5z"
                    fill="var(--maroon)" />
                <circle cx="24" cy="17" r="4" fill="var(--gold)" />
            </svg>
            <span class="brand-text">
                <strong>LD <span>INDONESIA</span></strong>
                <small>Privat Bahasa Jerman</small>
            </span>
        </a>
        <button class="sidebar-close" id="sidebarClose" aria-label="Tutup menu">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"
                aria-hidden="true">
                <path d="M18 6 6 18M6 6l12 12" />
            </svg>
        </button>
    </div>

    <nav class="sidebar-nav">
        <ul>
            <li>
                <a href="{{ route('dashboard.admin') }}"
                    class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                    @if (request()->routeIs('dashboard')) aria-current="page" @endif>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M3 11.5 12 4l9 7.5" />
                        <path d="M5 10v10a1 1 0 0 0 1 1h4v-6h4v6h4a1 1 0 0 0 1-1V10" />
                    </svg>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('modul.index') }}"
                    class="nav-link {{ request()->routeIs('modul.*') ? 'active' : '' }}"
                    @if (request()->routeIs('modul.*')) aria-current="page" @endif>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path
                            d="M2 5.5C2 4.7 2.7 4 4.7 4c2.6 0 5.3 1 7.3 2.5C14 4.9 16.7 4 19.3 4c2 0 2.7.7 2.7 1.5v13c0-.8-.7-1.5-2.7-1.5-2.6 0-5.3.9-7.3 2.5-2-1.6-4.7-2.5-7.3-2.5C2.7 17 2 17.7 2 18.5z" />
                        <path d="M12 6.5V20" />
                    </svg>
                    Modul Pembelajaran
                </a>
            </li>
            <li>
                <a href="{{ route('admin.performa.index') }}"
                    class="nav-link {{ request()->routeIs('performa-siswa.*') ? 'active' : '' }}"
                    @if (request()->routeIs('performa-siswa.*')) aria-current="page" @endif>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M3 3v18h18" />
                        <rect x="7" y="12" width="3" height="6" />
                        <rect x="12.5" y="8" width="3" height="10" />
                        <rect x="18" y="5" width="3" height="13" />
                    </svg>
                    Performa Siswa
                </a>
            </li>
            @if ($role === 'admin')
                <li>
                    <a href="{{ url('/admin-pengguna') }}"
                        class="nav-link {{ request()->routeIs('pengguna.*') ? 'active' : '' }}"
                        @if (request()->routeIs('pengguna.*')) aria-current="page" @endif>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        </svg>
                        Pengguna
                    </a>
                </li>
            @endif
        </ul>
    </nav>

    <div class="sidebar-footer">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-link" style="width:100%; text-align:left;">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" aria-hidden="true">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                    <path d="M16 17l5-5-5-5" />
                    <path d="M21 12H9" />
                </svg>
                Keluar
            </button>
        </form>
    </div>
</aside>
