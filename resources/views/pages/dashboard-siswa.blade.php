<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LD Indonesia</title>
<meta name="description" content="Dashboard siswa LD Indonesia: pantau modul yang perlu dikerjakan dan aktivitas belajar terakhir.">
<meta name="robots" content="noindex, nofollow">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
/* ============ RESET & TOKENS (konsisten dengan landing & login) ============ */
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

/* ============ APP SHELL ============ */
.app-shell{ display: flex; min-height: 100vh; }

/* ---- Sidebar ---- */
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

/* ---- Main column ---- */
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

.page-content{ padding: 36px 40px 60px; max-width: 1240px; width: 100%; margin: 0 auto; }

.page-heading{ margin-bottom: 26px; }
.page-heading h1{ font-size: 1.7rem; margin-bottom: 6px; }
.page-heading p{ color: var(--gray-500); font-size: 0.96rem; font-weight: 500; }

/* ---- Panel / card ---- */
.panel{
  background: var(--white);
  border-radius: var(--radius-lg);
  box-shadow: var(--shadow-md);
  border: 1px solid var(--gray-100);
  margin-bottom: 28px;
  overflow: hidden;
}
.panel-head{
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 16px;
  padding: 24px 28px;
  flex-wrap: wrap;
}
.panel-head-left{ display: flex; align-items: center; gap: 14px; }
.panel-icon{
  width: 44px; height: 44px;
  border-radius: 12px;
  background: var(--pink-pale);
  color: var(--pink-dark);
  display: flex; align-items: center; justify-content: center;
  flex-shrink: 0;
}
.panel-icon svg{ width: 21px; height: 21px; }
.panel-icon.alt{ background: var(--pink-light); }
.panel-head h2{ font-size: 1.12rem; }
.panel-link{
  display: inline-flex;
  align-items: center;
  gap: 6px;
  font-weight: 700;
  font-size: 0.9rem;
  color: var(--pink-dark);
  white-space: nowrap;
}
.panel-link:hover{ text-decoration: underline; }
.panel-link svg{ width: 16px; height: 16px; }

/* ---- Table ---- */
.table-scroll{ overflow-x: auto; }
table{ width: 100%; border-collapse: collapse; min-width: 720px; }
thead th{
  text-align: left;
  font-size: 0.85rem;
  font-weight: 700;
  color: var(--navy);
  background: var(--pink-light);
  padding: 15px 28px;
  white-space: nowrap;
}
thead th:first-child{ padding-left: 28px; width: 64px; }
tbody td{
  padding: 18px 28px;
  font-size: 0.92rem;
  color: var(--gray-800);
  border-bottom: 1px solid var(--gray-100);
  vertical-align: middle;
}
tbody tr:last-child td{ border-bottom: none; }
tbody tr:hover{ background: var(--gray-50); }
td.col-num{ color: var(--gray-500); font-weight: 600; }
td.col-modul{ font-weight: 600; color: var(--navy); }
td.col-nilai{ font-weight: 800; color: var(--navy); }

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

.action-btn{
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 36px; height: 36px;
  border-radius: 50%;
  color: var(--pink-dark);
  transition: background 0.15s ease;
}
.action-btn:hover{ background: var(--pink-pale); }
.action-btn svg{ width: 19px; height: 19px; }

.empty-state{ padding: 48px 28px; text-align: center; color: var(--gray-500); font-size: 0.92rem; }

/* ============ RESPONSIVE ============ */
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
  .panel-head{ align-items: flex-start; }
}
</style>
</head>
<body>
<a href="#mainContent" class="skip-link">Langsung ke konten utama</a>

<div class="app-shell">
  <div class="backdrop" id="backdrop"></div>

  <!-- ============ SIDEBAR ============ -->
  <x-sidebar.siswa />

  <!-- ============ MAIN ============ -->
  <div class="main-col">
    <x-header.siswa />

    <main class="page-content" id="mainContent">
      <div class="page-heading">
        <h1 id="greeting">Halo, {{ explode(' ', trim(Auth::user()->name))[0] }}!</h1>
        <p>Selamat datang kembali. Semangat belajar hari ini!</p>
      </div>

      <!-- ============ MODUL YANG PERLU DIKERJAKAN ============ -->
      <section class="panel" aria-labelledby="todoTitle">
        <div class="panel-head">
          <div class="panel-head-left">
            <div class="panel-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 4h11M9 12h11M9 20h11"/><rect x="3" y="2.5" width="3" height="3" rx="0.5"/><rect x="3" y="10.5" width="3" height="3" rx="0.5"/><rect x="3" y="18.5" width="3" height="3" rx="0.5"/></svg>
            </div>
            <h2 id="todoTitle">Modul Yang Perlu Dikerjakan</h2>
          </div>
          <a href="{{ route('page', ['page' => 'modul-pembelajaran']) }}" class="panel-link">
            Lihat Semua Modul
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
          </a>
        </div>

        <div class="table-scroll">
          <table>
            <caption class="sr-only" hidden>Daftar modul yang perlu dikerjakan</caption>
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Modul</th>
                <th scope="col">Kategori</th>
                <th scope="col">Progres</th>
                <th scope="col">Tanggal &amp; Waktu</th>
              </tr>
            </thead>
              <tbody id="todoTableBody">
              @forelse($modulesTodo ?? [] as $index => $module)
                  @php
                      $attempt = $module->attempts->first();

                      $statusClass = 'status-belum';
                      $statusText = 'Belum Dikerjakan';

                      if ($attempt && $attempt->status !== 'selesai') {
                          $statusClass = 'status-proses';
                          $statusText = 'Sedang Dikerjakan';
                      }
                  @endphp
                  <tr>
                      <td class="col-num">
                          {{ $index + 1 }}
                      </td>
                      <td class="col-modul">
                          {{ $module->judul }}
                      </td>
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
                      <td>
                          <span class="status-pill {{ $statusClass }}">
                              {{ $statusText }}
                          </span>
                      </td>
                      <td>
                          {{ $module->created_at
                              ? $module->created_at->locale('id')->translatedFormat('d M Y, H:i')
                              : '-' }}
                      </td>
                  </tr>
              @empty
                  <tr>
                      <td colspan="5">
                          <div class="empty-state">
                              Semua modul pada level
                              <strong>{{ Auth::user()->level ?? '-' }}</strong>
                              sudah selesai dikerjakan 🎉
                          </div>
                      </td>
                  </tr>
              @endforelse
              </tbody>
          </table>
        </div>
      </section>

      <!-- ============ AKTIVITAS TERAKHIR ============ -->
      <section class="panel" aria-labelledby="activityTitle">
        <div class="panel-head">
          <div class="panel-head-left">
            <div class="panel-icon alt">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3.5 2"/><path d="M4.2 4.2 6 6"/></svg>
            </div>
            <h2 id="activityTitle">Aktivitas Terakhir</h2>
          </div>
          <a href="{{ route('page', ['page' => 'performa-siswa']) }}" class="panel-link">
            Lihat Semua Hasil
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
          </a>
        </div>

        <div class="table-scroll">
          <table>
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Modul</th>
                <th scope="col">Kategori</th>
                <th scope="col">Nilai</th>
                <th scope="col">Tanggal &amp; Waktu</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse($recentActivities as $index => $attempt)
                  <tr>
                      <td class="col-num">
                          {{ $index + 1 }}
                      </td>
                      <td class="col-modul">
                          {{ $attempt->module->judul ?? 'Modul tidak ditemukan' }}
                      </td>
                      <td>
                          @switch($attempt->module->kategori ?? null)
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
                                  {{ $attempt->module->kategori ?? '-' }}
                          @endswitch
                      </td>
                      <td class="col-nilai">
                          {{ $attempt->nilai !== null
                              ? number_format((float) $attempt->nilai, 0)
                              : '-' }}
                      </td>
                      <td>
                          {{ $attempt->selesai_pada
                              ? $attempt->selesai_pada->locale('id')->translatedFormat('d M Y, H:i')
                              : '-' }}
                      </td>
                      <td>
                          <a class="action-btn"
                            href="{{ route('page', ['page' => 'hasil-pengerjaan']) }}?id={{ $attempt->id }}&from=dashboard"
                            aria-label="Lihat detail pengerjaan {{ $attempt->module->judul ?? 'modul' }}">
                              <svg
                                  viewBox="0 0 24 24"
                                  fill="none"
                                  stroke="currentColor"
                                  stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  aria-hidden="true"
                              >
                                  <path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z"/>
                                  <circle cx="12" cy="12" r="3"/>
                              </svg>
                          </a>
                      </td>
                  </tr>
              @empty
                  <tr>
                      <td colspan="6">
                          <div class="empty-state">
                              Belum ada aktivitas pengerjaan.
                          </div>
                      </td>
                  </tr>

              @endforelse
            </tbody>
          </table>
        </div>
      </section>
    </main>
  </div>
</div>

<script>
(function(){
  "use strict";
  renderUserIdentity('{{ Auth::user()->name }}');

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
