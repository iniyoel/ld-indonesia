<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LD Indonesia</title>
<meta name="description" content="Daftar modul pembelajaran bahasa Jerman LD Indonesia berdasarkan level dan kategori, lengkap dengan status progres.">
<meta name="robots" content="noindex, nofollow">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root{
  --navy: #1E2A47;
  --navy-soft: #435172;
  --pink: #EC4E8C;
  --pink-dark: #D63D79;
  --pink-light: #FDEAF1;
  --pink-pale: #FFF4F8;
  --purple: #7C6FE0;
  --gold: #D4A017;
  --maroon: #5C3620;
  --amber: #C98A1A;
  --amber-bg: #FCEBCF;
  --green: #2C9E6C;
  --green-bg: #DEF4E8;
  --blue: #3A6FD9;
  --blue-bg: #E2EBFC;
  --gray-50: #FAF9F7;
  --gray-100: #F3F1EE;
  --gray-200: #E7E4E0;
  --gray-400: #9B9691;
  --gray-500: #7C776F;
  --gray-600: #6B675F;
  --gray-800: #3A362F;
  --white: #FFFFFF;

  --font-display: 'Baloo 2', 'Inter', sans-serif;
  --font-body: 'Inter', sans-serif;

  --radius-sm: 10px;
  --radius-md: 16px;
  --radius-lg: 20px;
  --radius-pill: 999px;
  --shadow-sm: 0 2px 8px rgba(30,42,71,0.06);
  --shadow-md: 0 10px 30px rgba(30,42,71,0.08);

  --sidebar-w: 268px;
  --topbar-h: 96px;
}

body{
  font-family: var(--font-body);
  color: var(--gray-800);
  background: var(--gray-50);
  line-height: 1.55;
  -webkit-font-smoothing: antialiased;
}
img, svg { display: block; max-width: 100%; }
a { color: inherit; text-decoration: none; }
button { font: inherit; cursor: pointer; border: none; background: none; }
:focus-visible{ outline: 3px solid var(--purple); outline-offset: 2px; border-radius: 4px; }
h1, h2 { font-family: var(--font-display); color: var(--navy); font-weight: 700; }

.skip-link{ position: absolute; left: -999px; top: 0; background: var(--navy); color: #fff; padding: 12px 20px; z-index: 300; border-radius: 0 0 8px 0; }
.skip-link:focus{ left: 0; }

@media (prefers-reduced-motion: reduce){
  *, *::before, *::after { animation-duration: 0.001ms !important; transition-duration: 0.001ms !important; }
}

.app-shell{ display: flex; min-height: 100vh; }

.sidebar{
  width: var(--sidebar-w);
  flex-shrink: 0;
  background: linear-gradient(180deg, var(--pink-pale) 0%, #FDF1F6 100%);
  border-right: 1px solid var(--gray-200);
  display: flex;
  flex-direction: column;
  position: sticky;
  top: 0;
  height: 100vh;
  z-index: 60;
}
.sidebar-brand{
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 26px 24px;
  border-bottom: 1px solid rgba(30,42,71,0.06);
}
.brand-mark{ width: 40px; height: 40px; flex-shrink: 0; }
.brand-text{ display: flex; flex-direction: column; line-height: 1.15; }
.brand-text strong{ font-family: var(--font-display); font-weight: 800; font-size: 1.02rem; color: var(--navy); }
.brand-text strong span{ color: var(--pink); }
.brand-text small{ font-size: 0.66rem; color: var(--gray-600); font-weight: 500; }

.sidebar-nav{ flex-grow: 1; padding: 20px 16px; }
.sidebar-nav ul{ list-style: none; display: flex; flex-direction: column; gap: 6px; }
.nav-link{
  display: flex;
  align-items: center;
  gap: 14px;
  padding: 13px 16px;
  border-radius: var(--radius-sm);
  font-weight: 700;
  font-size: 0.96rem;
  color: var(--navy-soft);
  transition: background 0.15s ease, color 0.15s ease;
}
.nav-link svg{ width: 21px; height: 21px; flex-shrink: 0; }
.nav-link:hover{ background: rgba(236,78,140,0.08); color: var(--pink-dark); }
.nav-link.active{ background: var(--white); color: var(--pink-dark); box-shadow: var(--shadow-sm); }

.sidebar-footer{ padding: 20px 16px 26px; border-top: 1px solid rgba(30,42,71,0.06); }
.logout-link{
  display: flex;
  align-items: center;
  gap: 14px;
  padding: 13px 16px;
  border-radius: var(--radius-sm);
  font-weight: 700;
  font-size: 0.96rem;
  color: var(--navy-soft);
}
.logout-link:hover{ background: rgba(224,72,63,0.08); color: #C8392F; }
.logout-link svg{ width: 21px; height: 21px; }

.sidebar-close{ display: none; }

.main-col{ flex-grow: 1; min-width: 0; display: flex; flex-direction: column; }

.topbar{
  height: var(--topbar-h);
  display: flex;
  align-items: center;
  justify-content: flex-end;
  gap: 16px;
  padding: 0 40px;
  background: linear-gradient(115deg, #FCEFD9 0%, #FDE4EE 55%, #FBCFE0 100%);
  position: sticky;
  top: 0;
  z-index: 40;
}
.menu-toggle{
  display: none;
  width: 40px; height: 40px;
  align-items: center; justify-content: center;
  border-radius: var(--radius-sm);
  margin-right: auto;
  color: var(--navy);
}
.menu-toggle:hover{ background: rgba(255,255,255,0.5); }

.user-summary{ display: flex; align-items: center; gap: 14px; }
.user-meta{ text-align: right; line-height: 1.25; }
.user-meta strong{ display: block; font-size: 1.02rem; color: var(--navy); font-weight: 800; }
.user-meta span{ font-size: 0.84rem; color: var(--gray-600); font-weight: 600; }
.user-avatar{
  width: 52px; height: 52px;
  border-radius: 50%;
  background: var(--white);
  border: 2px solid var(--pink);
  display: flex; align-items: center; justify-content: center;
  font-family: var(--font-display);
  font-weight: 800;
  font-size: 1.15rem;
  color: var(--pink-dark);
  flex-shrink: 0;
}

.page-content{ padding: 36px 40px 60px; max-width: 1280px; width: 100%; margin: 0 auto; }

.page-heading{ margin-bottom: 22px; }
.page-heading h1{ font-size: 1.7rem; }

/* ---- Filter bar (tampilan saja, belum fungsional — akan disambungkan ke backend) ---- */
.filter-bar{
  display: flex;
  gap: 14px;
  margin-bottom: 22px;
  flex-wrap: wrap;
}
.search-field{
  flex: 1 1 320px;
  position: relative;
  min-width: 220px;
}
.search-field svg{
  position: absolute;
  left: 16px; top: 50%;
  transform: translateY(-50%);
  width: 18px; height: 18px;
  color: var(--gray-400);
  pointer-events: none;
}
.search-field input{
  width: 100%;
  font: inherit;
  font-size: 0.92rem;
  padding: 13px 16px 13px 44px;
  border: 1.5px solid var(--gray-200);
  border-radius: var(--radius-sm);
  background: var(--white);
  box-shadow: var(--shadow-sm);
}
.search-field input:focus{ outline: none; border-color: var(--pink); box-shadow: 0 0 0 4px var(--pink-pale); }

.select-field{ position: relative; flex: 0 0 210px; }
.select-field select{
  appearance: none;
  -webkit-appearance: none;
  width: 100%;
  font: inherit;
  font-weight: 600;
  font-size: 0.92rem;
  padding: 13px 40px 13px 18px;
  border: 1.5px solid var(--gray-200);
  border-radius: var(--radius-sm);
  background: var(--white);
  color: var(--navy);
  box-shadow: var(--shadow-sm);
  cursor: pointer;
}
.select-field select:focus{ outline: none; border-color: var(--pink); box-shadow: 0 0 0 4px var(--pink-pale); }
.select-field svg{
  position: absolute;
  right: 16px; top: 50%;
  transform: translateY(-50%);
  width: 16px; height: 16px;
  color: var(--gray-500);
  pointer-events: none;
}

.panel{
  background: var(--white);
  border-radius: var(--radius-lg);
  box-shadow: var(--shadow-md);
  border: 1px solid var(--gray-100);
  overflow: hidden;
}
.table-scroll{ overflow-x: auto; }
table{ width: 100%; border-collapse: collapse; min-width: 900px; }
thead th{
  text-align: left;
  font-size: 0.85rem;
  font-weight: 700;
  color: var(--navy);
  background: var(--pink-light);
  padding: 15px 24px;
  white-space: nowrap;
}
thead th:first-child{ padding-left: 28px; width: 60px; }
tbody td{
  padding: 17px 24px;
  font-size: 0.92rem;
  color: var(--gray-800);
  border-bottom: 1px solid var(--gray-100);
  vertical-align: middle;
  white-space: nowrap;
}
tbody td:first-child{ padding-left: 28px; }
tbody tr:last-child td{ border-bottom: none; }
tbody tr:hover{ background: var(--gray-50); }
td.col-num{ color: var(--gray-500); font-weight: 600; }
td.col-modul{ font-weight: 600; color: var(--navy); white-space: normal; min-width: 220px; }

.status-pill{
  display: inline-block;
  padding: 7px 16px;
  border-radius: var(--radius-pill);
  font-size: 0.82rem;
  font-weight: 700;
  white-space: nowrap;
}
.status-belum{ background: var(--amber-bg); color: var(--amber); }
.status-proses{ background: var(--blue-bg); color: var(--blue); }
.status-selesai{ background: var(--green-bg); color: var(--green); }

.aksi-btn{
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 7px;
  min-width: 86px;
  padding: 7px 14px;
  border-radius: 8px;
  font-weight: 600;
  font-size: 0.84rem;
  border: 1.5px solid var(--pink);
  color: var(--pink-dark);
  background: var(--white);
  transition: background 0.15s ease, color 0.15s ease;
}

.aksi-btn:hover{
  background: var(--pink-pale);
}

.aksi-btn svg{
  width: 15px;
  height: 15px;
  flex-shrink: 0;
}

.aksi-btn.is-selesai{
  border-color: var(--pink);
  color: var(--pink-dark);
}

.aksi-btn.is-proses{
  border-color: var(--pink);
  color: var(--pink-dark);
}

/* ---- Footer tabel & paginasi (tampilan saja, belum fungsional) ---- */
.table-footer{
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 16px;
  padding: 18px 28px;
  flex-wrap: wrap;
  border-top: 1px solid var(--gray-100);
}
.rows-per-page{ display: flex; align-items: center; gap: 10px; font-size: 0.88rem; color: var(--gray-600); font-weight: 600; }
.rows-per-page select{
  font: inherit;
  font-weight: 700;
  color: var(--navy);
  padding: 7px 30px 7px 12px;
  border: 1.5px solid var(--gray-200);
  border-radius: 8px;
  appearance: none;
  -webkit-appearance: none;
  background: var(--white) url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="%237C776F" stroke-width="2.4"><path d="M6 9l6 6 6-6"/></svg>') no-repeat right 8px center;
  cursor: pointer;
}
.results-count{ font-size: 0.88rem; color: var(--gray-500); }

.pagination{ display: flex; align-items: center; gap: 8px; }
.page-btn{
  min-width: 34px; height: 34px;
  padding: 0 8px;
  border-radius: 8px;
  border: 1.5px solid var(--gray-200);
  color: var(--navy);
  font-weight: 700;
  font-size: 0.86rem;
  display: flex; align-items: center; justify-content: center;
  background: var(--white);
}
.page-btn:hover:not(:disabled):not(.active){ background: var(--gray-50); }
.page-btn.active{ background: var(--pink); border-color: var(--pink); color: var(--white); }
.page-btn:disabled{ opacity: 0.4; cursor: not-allowed; }
.page-btn svg{ width: 16px; height: 16px; }

@media (max-width: 980px){
  .sidebar{
    position: fixed;
    left: 0; top: 0;
    transform: translateX(-100%);
    transition: transform 0.22s ease;
    box-shadow: var(--shadow-md);
  }
  .sidebar.open{ transform: translateX(0); }
  .sidebar-close{
    display: flex;
    align-items: center; justify-content: center;
    width: 34px; height: 34px;
    border-radius: 8px;
    margin-left: auto;
    color: var(--navy);
  }
  .sidebar-close:hover{ background: rgba(30,42,71,0.06); }
  .sidebar-brand{ justify-content: space-between; }
  .menu-toggle{ display: flex; }
  .topbar{ padding: 0 20px; }
  .page-content{ padding: 26px 20px 48px; }
  .backdrop{
    display: none;
    position: fixed; inset: 0;
    background: rgba(30,42,71,0.35);
    z-index: 50;
  }
  .backdrop.show{ display: block; }
}
@media (max-width: 640px){
  .user-meta{ display: none; }
  .table-footer{ flex-direction: column; align-items: flex-start; }
}
</style>
</head>
<body>
<a href="#mainContent" class="skip-link">Langsung ke konten utama</a>

<div class="app-shell">
  <div class="backdrop" id="backdrop"></div>

  <!-- ============ SIDEBAR ============ -->
  <!-- ============ SIDEBAR ============ -->
  <aside class="sidebar" id="sidebar" aria-label="Navigasi utama">
    <div class="sidebar-brand">
      <a href="{{ route('page', ['page' => 'dashboard-siswa']) }}" style="display:flex;align-items:center;gap:10px;" aria-label="LD Indonesia — Dashboard">
        <svg class="brand-mark" viewBox="0 0 48 48" fill="none" aria-hidden="true">
          <path d="M24 4c-6 0-10 5-10 5s3 1 4 4c-3-1-6 0-7 3 3 0 5 1 6 3-3 1-5 3-5 6 3-1 5-1 7 0-1 3 0 6 2 8 1-3 2-5 3-6 1 1 2 3 3 6 2-2 3-5 2-8 2-1 4-1 7 0 0-3-2-5-5-6 1-2 3-3 6-3-1-3-4-4-7-3 1-3 4-4 4-4s-4-5-10-5z" fill="var(--maroon)"/>
          <circle cx="24" cy="17" r="4" fill="var(--gold)"/>
        </svg>
        <span class="brand-text">
          <strong>LD <span>INDONESIA</span></strong>
          <small>Privat Bahasa Jerman</small>
        </span>
      </a>
      <button class="sidebar-close" id="sidebarClose" aria-label="Tutup menu">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true"><path d="M18 6 6 18M6 6l12 12"/></svg>
      </button>
    </div>

    <nav class="sidebar-nav">
      <ul>
        <li>
          <a href="{{ route('page', ['page' => 'dashboard-siswa']) }}" class="nav-link" aria-current="page">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 11.5 12 4l9 7.5"/><path d="M5 10v10a1 1 0 0 0 1 1h4v-6h4v6h4a1 1 0 0 0 1-1V10"/></svg>
            Dashboard
          </a>
        </li>
        <li>
          <a href="{{ route('page', ['page' => 'modul-pembelajaran']) }}" class="nav-link active">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 5.5C2 4.7 2.7 4 4.7 4c2.6 0 5.3 1 7.3 2.5C14 4.9 16.7 4 19.3 4c2 0 2.7.7 2.7 1.5v13c0-.8-.7-1.5-2.7-1.5-2.6 0-5.3.9-7.3 2.5-2-1.6-4.7-2.5-7.3-2.5C2.7 17 2 17.7 2 18.5z"/><path d="M12 6.5V20"/></svg>
            Modul Pembelajaran
          </a>
        </li>
        <li>
          <a href="{{ route('page', ['page' => 'performa-siswa']) }}" class="nav-link">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 3v18h18"/><rect x="7" y="12" width="3" height="6"/><rect x="12.5" y="8" width="3" height="10"/><rect x="18" y="5" width="3" height="13"/></svg>
            Performa Siswa
          </a>
        </li>
      </ul>
    </nav>

    <div class="sidebar-footer">
      <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="logout-link" style="width: 100%; text-align: left;">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                  stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" aria-hidden="true">
                  <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                  <path d="M16 17l5-5-5-5"/>
                  <path d="M21 12H9"/>
              </svg>
              Keluar
          </button>
      </form>
    </div>
  </aside>

  <!-- ============ MAIN ============ -->
  <div class="main-col">
    <header class="topbar">
      <button class="menu-toggle" id="menuToggle" aria-label="Buka menu navigasi" aria-expanded="false" aria-controls="sidebar">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" aria-hidden="true"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
      </button>
      <div class="user-summary">
        <div class="user-meta">
          <strong id="userName">{{ Auth::user()->name }}</strong>
          <span>Siswa</span>
        </div>
        <div class="user-avatar" id="userAvatar" aria-hidden="true">
          @if(Auth::user()->profile_photo_path)
            <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="{{ Auth::user()->name }}" style="width:100%;height:100%;object-fit:cover;border-radius:50%;">
          @else
            {{ Str::upper(Str::substr(Auth::user()->name, 0, 1)) }}
          @endif
        </div>
      </div>
    </header>

    <main class="page-content" id="mainContent">
      <div class="page-heading">
        <h1>Modul Pembelajaran</h1>
      </div>

      <!-- ============ FILTER BAR ============ -->
      <!-- Catatan: search & sortir di bawah ini baru tampilan (belum fungsional).
           Logika pencarian dan penyortiran akan dikerjakan saat integrasi backend. -->
      <div class="filter-bar">
        <div class="search-field">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg>
          <label for="searchInput" class="sr-only" hidden>Cari modul</label>
          <input type="search" id="searchInput" placeholder="Cari modul...">
        </div>

        <div class="select-field">
          <label for="levelFilter" class="sr-only" hidden>Filter level</label>
          <select id="levelFilter">
            <option value="">Semua Level</option>
            <option value="A1">Level A1</option>
            <option value="A2">Level A2</option>
            <option value="B1">Level B1</option>
            <option value="B2">Level B2</option>
          </select>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
        </div>

        <div class="select-field">
          <label for="kategoriFilter" class="sr-only" hidden>Filter kategori</label>
          <select id="kategoriFilter">
            <option value="">Semua Kategori</option>
            <option value="Materi">Materi</option>
            <option value="Simulasi Hören">Simulasi Hören</option>
            <option value="Simulasi Lesen">Simulasi Lesen</option>
            <option value="Simulasi Schreiben">Simulasi Schreiben</option>
            <option value="Simulasi Sprechen">Simulasi Sprechen</option>
          </select>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
        </div>
      </div>

      <!-- ============ TABLE PANEL (5 contoh data statis) ============ -->
      <section class="panel" aria-label="Daftar modul pembelajaran">
        <div class="table-scroll">
          <table>
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Modul</th>
                <th scope="col">Kategori</th>
                <th scope="col">Level</th>
                <th scope="col">Progres</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
              @forelse($modules as $index => $module)

                  @php
                      $attempt = $module->attempt;

                      if (!$attempt) {
                          $status = 'belum';
                          $statusText = 'Belum Dikerjakan';
                      } elseif ($attempt->status === 'selesai') {
                          $status = 'selesai';
                          $statusText = 'Selesai';
                      } else {
                          $status = 'proses';
                          $statusText = 'Sedang Dikerjakan';
                      }
                  @endphp

                  <tr>
                      {{-- NO --}}
                      <td class="col-num">
                          {{ $modules->firstItem() + $index }}
                      </td>

                      {{-- MODUL --}}
                      <td class="col-modul">
                          {{ $module->judul }}
                      </td>

                      {{-- KATEGORI --}}
                      <td>
                          @switch($module->kategori)

                              @case('materi')
                                  Materi
                                  @break

                              @case('simulasi_horen')
                                  Simulasi Hören
                                  @break

                              @case('simulasi_lesen')
                                  Simulasi Lesen
                                  @break

                              @case('simulasi_schreiben')
                                  Simulasi Schreiben
                                  @break

                              @case('simulasi_sprechen')
                                  Simulasi Sprechen
                                  @break

                              @default
                                  {{ $module->kategori }}

                          @endswitch
                      </td>

                      {{-- LEVEL --}}
                      <td>
                          {{ $module->level }}
                      </td>

                      {{-- PROGRES --}}
                      <td>
                          @if($status === 'belum')
                              <span class="status-pill status-belum">
                                  Belum Dikerjakan
                              </span>

                          @elseif($status === 'proses')
                              <span class="status-pill status-proses">
                                  Sedang Dikerjakan
                              </span>

                          @else
                              <span class="status-pill status-selesai">
                                  Selesai
                              </span>
                          @endif
                      </td>
                      {{-- AKSI --}}
                      <td>
                          @if($status === 'belum')

                              <a href="{{ route('modul.kerjakan', $module) }}"
                                class="aksi-btn"
                                title="Mulai mengerjakan modul">

                                  <svg viewBox="0 0 24 24"
                                      fill="none"
                                      stroke="currentColor"
                                      stroke-width="2"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      aria-hidden="true">
                                      <path d="M8 5v14l11-7z"/>
                                  </svg>

                                  Mulai
                              </a>

                          @elseif($status === 'proses')

                              <a href="{{ route('modul.kerjakan', $module) }}"
                                class="aksi-btn is-proses"
                                title="Lanjutkan mengerjakan modul">

                                  <svg viewBox="0 0 24 24"
                                      fill="none"
                                      stroke="currentColor"
                                      stroke-width="2"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      aria-hidden="true">
                                      <path d="M8 5v14"/>
                                      <path d="M16 5v14"/>
                                  </svg>

                                  Lanjutkan
                              </a>

                          @else

                              <a href="{{ route('siswa.modul.hasil', [
                                  'module' => $module->id,
                                  'attempt' => $attempt->id
                              ]) }}"
                                class="aksi-btn is-selesai"
                                title="Lihat hasil modul">

                                  <svg viewBox="0 0 24 24"
                                      fill="none"
                                      stroke="currentColor"
                                      stroke-width="2"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      aria-hidden="true">
                                      <path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6-10-6-10-6z"/>
                                      <circle cx="12" cy="12" r="2.5"/>
                                  </svg>

                                  Lihat
                              </a>

                          @endif
                      </td>
                  </tr>

              @empty

                  <tr>
                      <td colspan="6" class="empty-state">
                          Belum ada modul pembelajaran untuk level
                          {{ Auth::user()->level ?? '-' }}.
                      </td>
                  </tr>

              @endforelse
          </tbody>
          </table>
        </div>

        <!-- Catatan: paginasi di bawah ini baru tampilan (belum fungsional).
             Saat backend siap, hubungkan dengan jumlah modul & halaman sesungguhnya. -->
        @if($modules->total() > 0)
          <div class="table-footer">

              {{-- Jumlah data per halaman --}}
              <form method="GET" action="{{ url()->current() }}" class="rows-per-page">

                  <span>Rows per page</span>

                  <select
                      name="per_page"
                      id="rowsPerPage"
                      aria-label="Jumlah baris per halaman"
                      onchange="this.form.submit()"
                  >
                      <option value="5" {{ request('per_page', 5) == 5 ? 'selected' : '' }}>
                          5
                      </option>

                      <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>
                          10
                      </option>

                      <option value="15" {{ request('per_page') == 15 ? 'selected' : '' }}>
                          15
                      </option>

                      <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>
                          25
                      </option>
                  </select>

                  <span class="results-count">
                      Menampilkan
                      {{ $modules->firstItem() }}
                    –{{ $modules->lastItem() }}
                      dari
                      {{ $modules->total() }}
                      modul
                  </span>

              </form>


              {{-- Pagination --}}
              @if($modules->hasPages())

                  <nav class="pagination" aria-label="Navigasi halaman">

                      {{-- Previous --}}
                      @if($modules->onFirstPage())

                          <button
                              type="button"
                              class="page-btn"
                              disabled
                              aria-label="Halaman sebelumnya"
                          >
                              <svg
                                  viewBox="0 0 24 24"
                                  fill="none"
                                  stroke="currentColor"
                                  stroke-width="2.4"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                              >
                                  <path d="M15 18l-6-6 6-6"/>
                              </svg>
                          </button>

                      @else

                          <a
                              href="{{ $modules->previousPageUrl() }}"
                              class="page-btn"
                              aria-label="Halaman sebelumnya"
                          >
                              <svg
                                  viewBox="0 0 24 24"
                                  fill="none"
                                  stroke="currentColor"
                                  stroke-width="2.4"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                              >
                                  <path d="M15 18l-6-6 6-6"/>
                              </svg>
                          </a>

                      @endif


                      {{-- Nomor halaman --}}
                      @foreach($modules->getUrlRange(1, $modules->lastPage()) as $page => $url)

                          @if($page == $modules->currentPage())

                              <span
                                  class="page-btn active"
                                  aria-current="page"
                              >
                                  {{ $page }}
                              </span>

                          @else

                              <a
                                  href="{{ $url }}"
                                  class="page-btn"
                                  aria-label="Halaman {{ $page }}"
                              >
                                  {{ $page }}
                              </a>

                          @endif

                      @endforeach


                      {{-- Next --}}
                      @if($modules->hasMorePages())

                          <a
                              href="{{ $modules->nextPageUrl() }}"
                              class="page-btn"
                              aria-label="Halaman berikutnya"
                          >
                              <svg
                                  viewBox="0 0 24 24"
                                  fill="none"
                                  stroke="currentColor"
                                  stroke-width="2.4"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                              >
                                  <path d="M9 6l6 6-6 6"/>
                              </svg>
                          </a>

                      @else

                          <button
                              type="button"
                              class="page-btn"
                              disabled
                              aria-label="Halaman berikutnya"
                          >
                              <svg
                                  viewBox="0 0 24 24"
                                  fill="none"
                                  stroke="currentColor"
                                  stroke-width="2.4"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                              >
                                  <path d="M9 6l6 6-6 6"/>
                              </svg>
                          </button>

                      @endif

                  </nav>

              @endif

          </div>
      @endif
      </section>
    </main>
  </div>
</div>

<script>
(function(){
  "use strict";

  const searchInput = document.getElementById('searchInput');
  const levelFilter = document.getElementById('levelFilter');
  const kategoriFilter = document.getElementById('kategoriFilter');

  function filterModules() {
      const search = searchInput.value.toLowerCase();
      const level = levelFilter.value.toLowerCase();
      const kategori = kategoriFilter.value.toLowerCase();
  }

  searchInput?.addEventListener('input', filterModules);
  levelFilter?.addEventListener('change', filterModules);
  kategoriFilter?.addEventListener('change', filterModules);
  /* ---- Sidebar toggle (mobile) ---- */
  var sidebar = document.getElementById('sidebar');
  var menuToggle = document.getElementById('menuToggle');
  var sidebarClose = document.getElementById('sidebarClose');
  var backdrop = document.getElementById('backdrop');
  function openSidebar(){ sidebar.classList.add('open'); backdrop.classList.add('show'); menuToggle.setAttribute('aria-expanded', 'true'); }
  function closeSidebar(){ sidebar.classList.remove('open'); backdrop.classList.remove('show'); menuToggle.setAttribute('aria-expanded', 'false'); }
  menuToggle.addEventListener('click', openSidebar);
  sidebarClose.addEventListener('click', closeSidebar);
  backdrop.addEventListener('click', closeSidebar);
})();
</script>
</body>
</html>
