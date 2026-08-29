<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LD Indonesia</title>
<meta name="description" content="Dashboard admin LD Indonesia: ringkasan siswa, modul, penilaian, dan performa siswa.">
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
  --green: #2C9E6C;
  --red: #D6444F;
  --blue: #3A6FD9;
  --gray-50: #FAF9F7;
  --gray-100: #F3F1EE;
  --gray-200: #E7E4E0;
  --gray-300: #D8D4CE;
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
.sidebar-brand{ display: flex; align-items: center; gap: 10px; padding: 26px 24px; border-bottom: 1px solid rgba(30,42,71,0.06); }
.brand-mark{ width: 40px; height: 40px; flex-shrink: 0; }
.brand-text{ display: flex; flex-direction: column; line-height: 1.15; }
.brand-text strong{ font-family: var(--font-display); font-weight: 800; font-size: 1.02rem; color: var(--navy); }
.brand-text strong span{ color: var(--pink); }
.brand-text small{ font-size: 0.66rem; color: var(--gray-600); font-weight: 500; }

.sidebar-nav{ flex-grow: 1; padding: 20px 16px; }
.sidebar-nav ul{ list-style: none; display: flex; flex-direction: column; gap: 6px; }
.nav-link{
  display: flex; align-items: center; gap: 14px; padding: 13px 16px;
  border-radius: var(--radius-sm); font-weight: 700; font-size: 0.96rem; color: var(--navy-soft);
  transition: background 0.15s ease, color 0.15s ease;
}
.nav-link svg{ width: 21px; height: 21px; flex-shrink: 0; }
.nav-link:hover{ background: rgba(236,78,140,0.08); color: var(--pink-dark); }
.nav-link.active{ background: var(--white); color: var(--pink-dark); box-shadow: var(--shadow-sm); }

.sidebar-footer{ padding: 20px 16px 26px; border-top: 1px solid rgba(30,42,71,0.06); }
.logout-link{ display: flex; align-items: center; gap: 14px; padding: 13px 16px; border-radius: var(--radius-sm); font-weight: 700; font-size: 0.96rem; color: var(--navy-soft); }
.logout-link:hover{ background: rgba(224,72,63,0.08); color: #C8392F; }
.logout-link svg{ width: 21px; height: 21px; }

.sidebar-close{ display: none; }

.main-col{ flex-grow: 1; min-width: 0; display: flex; flex-direction: column; }

.topbar{
  height: var(--topbar-h);
  display: flex; align-items: center; justify-content: flex-end; gap: 16px;
  padding: 0 40px;
  background: linear-gradient(115deg, #FCEFD9 0%, #FDE4EE 55%, #FBCFE0 100%);
  position: sticky; top: 0; z-index: 40;
}
.menu-toggle{ display: none; width: 40px; height: 40px; align-items: center; justify-content: center; border-radius: var(--radius-sm); margin-right: auto; color: var(--navy); }
.menu-toggle:hover{ background: rgba(255,255,255,0.5); }

.user-summary{ display: flex; align-items: center; gap: 14px; }
.user-meta{ text-align: right; line-height: 1.25; }
.user-meta strong{ display: block; font-size: 1.02rem; color: var(--navy); font-weight: 800; }
.user-meta span{ font-size: 0.84rem; color: var(--gray-600); font-weight: 600; }
.user-avatar{
  width: 52px; height: 52px; border-radius: 50%; background: var(--white); border: 2px solid var(--pink);
  display: flex; align-items: center; justify-content: center;
  font-family: var(--font-display); font-weight: 800; font-size: 1.15rem; color: var(--pink-dark); flex-shrink: 0;
}

.page-content{ padding: 36px 40px 60px; max-width: 1320px; width: 100%; margin: 0 auto; }

/* ============ SUMMARY CARDS ============ */
.summary-grid{ display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; margin-bottom: 20px; }
.summary-card{
  background: var(--white); border-radius: var(--radius-lg); box-shadow: var(--shadow-md); border: 1px solid var(--gray-100);
  padding: 22px 26px; display: flex; align-items: center; gap: 18px;
}
.summary-icon{ width: 62px; height: 62px; border-radius: 16px; background: var(--pink-pale); color: var(--pink-dark); display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.summary-icon svg{ width: 28px; height: 28px; }
.summary-label{ font-size: 0.92rem; color: var(--gray-500); font-weight: 600; margin-bottom: 4px; }
.summary-value{ font-family: var(--font-display); font-size: 1.9rem; font-weight: 800; color: var(--navy); line-height: 1; margin-bottom: 4px; }
.summary-sub{ font-size: 0.8rem; color: var(--gray-400); font-weight: 600; }

/* ============ TWO-COLUMN PANELS ============ */
.dash-grid{ display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px; align-items: start; }
.panel{ background: var(--white); border-radius: var(--radius-lg); box-shadow: var(--shadow-md); border: 1px solid var(--gray-100); padding: 26px 28px; }
.panel h2{ font-size: 1.2rem; margin-bottom: 3px; }
.panel-subtitle{ color: var(--gray-500); font-size: 0.86rem; margin-bottom: 18px; }

/* ---- Icon-list rows (Ringkasan Modul, Perlu Dinilai, Aktivitas Siswa) ---- */
.icon-list{ display: flex; flex-direction: column; gap: 4px; }
.icon-list-item{ display: flex; align-items: flex-start; gap: 14px; padding: 12px 2px; border-bottom: 1px solid var(--gray-100); }
.icon-list-item:last-child{ border-bottom: none; }
.icon-list-icon{ width: 40px; height: 40px; border-radius: 50%; background: var(--pink-pale); color: var(--pink-dark); display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.icon-list-icon svg{ width: 18px; height: 18px; }
.icon-list-icon.is-edit{ background: #E2EBFC; color: var(--blue); }
.icon-list-icon.is-delete{ background: #FCE7E8; color: var(--red); }
.icon-list-body{ flex-grow: 1; min-width: 0; }
.icon-list-title{ font-weight: 700; font-size: 0.94rem; color: var(--navy); }
.icon-list-desc{ font-size: 0.85rem; color: var(--gray-500); }
.icon-list-count{ font-family: var(--font-display); font-weight: 800; font-size: 1.2rem; color: var(--navy); flex-shrink: 0; align-self: center; }
.icon-list-time{ font-size: 0.78rem; color: var(--gray-400); white-space: nowrap; flex-shrink: 0; align-self: flex-start; padding-top: 2px; }

.panel-link{ display: flex; justify-content: flex-end; align-items: center; gap: 6px; font-weight: 700; font-size: 0.9rem; color: var(--pink-dark); margin-top: 6px; }
.panel-link:hover{ text-decoration: underline; }
.panel-link svg{ width: 15px; height: 15px; }

.icon-list-item.is-clickable{ cursor: pointer; border-radius: var(--radius-sm); margin: 0 -8px; padding: 12px 8px; }
.icon-list-item.is-clickable:hover{ background: var(--gray-50); }

/* ---- Performa Siswa table ---- */
.table-panel-inner{ overflow-x: auto; }
table{ width: 100%; border-collapse: collapse; min-width: 460px; }
thead th{ text-align: left; font-size: 0.83rem; font-weight: 700; color: var(--navy); background: var(--pink-light); padding: 12px 16px; white-space: nowrap; }
thead th:first-child{ border-top-left-radius: 8px; }
thead th:last-child{ border-top-right-radius: 8px; }
tbody td{ padding: 13px 16px; font-size: 0.9rem; color: var(--gray-800); border-bottom: 1px solid var(--gray-100); white-space: nowrap; }
tbody tr:last-child td{ border-bottom: none; }
tbody tr:hover{ background: var(--gray-50); }
td.col-nama{ font-weight: 600; color: var(--navy); }
td.col-nilai{ font-weight: 800; color: var(--navy); }
td.col-nilai.is-pending{ color: var(--gray-400); font-weight: 600; }

/* ============ RESPONSIVE ============ */
@media (max-width: 1080px){
  .dash-grid{ grid-template-columns: 1fr; }
}
@media (max-width: 980px){
  .sidebar{ position: fixed; left: 0; top: 0; transform: translateX(-100%); transition: transform 0.22s ease; box-shadow: var(--shadow-md); }
  .sidebar.open{ transform: translateX(0); }
  .sidebar-close{ display: flex; align-items: center; justify-content: center; width: 34px; height: 34px; border-radius: 8px; margin-left: auto; color: var(--navy); }
  .sidebar-close:hover{ background: rgba(30,42,71,0.06); }
  .sidebar-brand{ justify-content: space-between; }
  .menu-toggle{ display: flex; }
  .topbar{ padding: 0 20px; }
  .page-content{ padding: 26px 20px 48px; }
  .backdrop{ display: none; position: fixed; inset: 0; background: rgba(30,42,71,0.35); z-index: 50; }
  .backdrop.show{ display: block; }
  .panel{ padding: 20px 18px; }
}
@media (max-width: 640px){
  .user-meta{ display: none; }
  .summary-grid{ grid-template-columns: 1fr; }
}
</style>
</head>
<body>
<a href="#mainContent" class="skip-link">Langsung ke konten utama</a>

<div class="app-shell">
  <div class="backdrop" id="backdrop"></div>

  <x-dashboard-sidebar />

  <!-- ============ MAIN ============ -->
  <div class="main-col">
    <x-dashboard-header />

    <main class="page-content" id="mainContent">

      <!-- ============ RINGKASAN ATAS ============ -->
      <div class="summary-grid">
        <div class="summary-card">
          <div class="summary-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          </div>
          <div>
            <div class="summary-label">Total Siswa</div>
            <div class="summary-value">{{ $totalSiswaAktif }}</div>
            <div class="summary-sub">Siswa Aktif</div>
          </div>
        </div>

        <div class="summary-card">
          <div class="summary-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
          </div>
          <div>
            <div class="summary-label">Total Modul</div>
            <div class="summary-value">{{ $totalModul }}</div>
            <div class="summary-sub">(Materi + Simulasi)</div>
          </div>
        </div>

        <div class="summary-card">
          <div class="summary-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="9" y="2.5" width="6" height="4" rx="1"/><path d="M9 4.5H6a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-14a2 2 0 0 0-2-2h-3"/><path d="m9 14 2 2 4-4"/></svg>
          </div>
          <div>
            <div class="summary-label">Perlu Penilaian</div>
            <div class="summary-value">{{ $perluPenilaian }}</div>
            <div class="summary-sub">Schreiben belum dinilai</div>
          </div>
        </div>
      </div>

      <!-- ============ RINGKASAN MODUL & PERLU DINILAI ============ -->
      <div class="dash-grid">
        <section class="panel" aria-labelledby="moduleSummaryTitle">
          <h2 id="moduleSummaryTitle">Ringkasan Modul</h2>
          <p class="panel-subtitle">Ringkasan modul yang tersedia</p>
          @php
            $moduleCount = fn ($kategori) => (int) ($moduleSummary[$kategori] ?? 0);
          @endphp

          <div class="icon-list">
            <div class="icon-list-item">
              <div class="icon-list-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
              </div>
              <div class="icon-list-body">
                <div class="icon-list-title">Materi</div>
                <div class="icon-list-desc">Modul materi pembelajaran</div>
              </div>
              <span class="icon-list-count">{{ $moduleCount('materi') }}</span>
            </div>

            <div class="icon-list-item">
              <div class="icon-list-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 18v-6a9 9 0 0 1 18 0v6"/><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"/></svg>
              </div>
              <div class="icon-list-body">
                <div class="icon-list-title">Simulasi Hören</div>
                <div class="icon-list-desc">Simulasi ujian mendengar</div>
              </div>
              <span class="icon-list-count">{{ $moduleCount('simulasi_horen') }}</span>
            </div>

            <div class="icon-list-item">
              <div class="icon-list-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 5.5C2 4.7 2.7 4 4.7 4c2.6 0 5.3 1 7.3 2.5C14 4.9 16.7 4 19.3 4c2 0 2.7.7 2.7 1.5v13c0-.8-.7-1.5-2.7-1.5-2.6 0-5.3.9-7.3 2.5-2-1.6-4.7-2.5-7.3-2.5C2.7 17 2 17.7 2 18.5z"/><path d="M12 6.5V20"/></svg>
              </div>
              <div class="icon-list-body">
                <div class="icon-list-title">Simulasi Lesen</div>
                <div class="icon-list-desc">Simulasi ujian membaca</div>
              </div>
              <span class="icon-list-count">{{ $moduleCount('simulasi_lesen') }}</span>
            </div>

            <div class="icon-list-item">
              <div class="icon-list-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m12 20 9-9-2-2-9 9-4 4z"/><path d="M2 22l3-1 1-3"/><path d="m14.5 6.5 3 3"/></svg>
              </div>
              <div class="icon-list-body">
                <div class="icon-list-title">Simulasi Schreiben</div>
                <div class="icon-list-desc">Simulasi ujian menulis</div>
              </div>
              <span class="icon-list-count">{{ $moduleCount('simulasi_schreiben') }}</span>
            </div>

            <div class="icon-list-item">
              <div class="icon-list-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 5h16v10H4z"/><path d="M8 19h8"/><path d="M12 15v4"/></svg>
              </div>
              <div class="icon-list-body">
                <div class="icon-list-title">Simulasi Sprechen</div>
                <div class="icon-list-desc">Simulasi ujian berbicara</div>
              </div>
              <span class="icon-list-count">{{ $moduleCount('simulasi_sprechen') }}</span>
            </div>
          </div>

          <a href="{{ route('modul.index') }}" class="panel-link">
            Lihat semua modul
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
          </a>
        </section>

        <section class="panel" aria-labelledby="needsGradingTitle">
          <h2 id="needsGradingTitle">Perlu Dinilai</h2>
          <p class="panel-subtitle">Modul Schreiben yang belum dinilai</p>
          <div class="icon-list" id="needsGradingList">
            @forelse($needsGrading as $attempt)
              <div class="icon-list-item is-clickable">
                <div class="icon-list-icon">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                </div>
                <div class="icon-list-body">
                  <div class="icon-list-title">{{ $attempt->user?->name ?? 'Siswa' }}</div>
                  <div class="icon-list-desc">{{ $attempt->module?->judul ?? 'Modul Schreiben' }} · {{ $attempt->module?->level ?? '—' }}</div>
                </div>
                <span class="icon-list-time">{{ $attempt->selesai_pada?->diffForHumans() ?? '—' }}</span>
              </div>
            @empty
              <div class="icon-list-item">
                <div class="icon-list-icon">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m5 12 4 4L19 6"/></svg>
                </div>
                <div class="icon-list-body">
                  <div class="icon-list-title">Tidak ada pengerjaan yang menunggu penilaian</div>
                  <div class="icon-list-desc">Semua Schreiben yang selesai sudah dinilai.</div>
                </div>
              </div>
            @endforelse
          </div>
        </section>
      </div>

      <!-- ============ AKTIVITAS ADMIN & PERFORMA SISWA ============ -->
      <div class="dash-grid">
        <section class="panel" aria-labelledby="activityTitle">
          <h2 id="activityTitle">Aktivitas Admin</h2>
          <p class="panel-subtitle">Aktivitas terbaru admin dalam mengatur modul.</p>
          <div class="icon-list">
            @forelse($activities as $activity)
            @php
                $activityIcon = match($activity->aksi) {
                    'hapus' => 'delete',
                    'ubah' => 'edit',
                    'tambah' => 'add',
                    default => 'add',
                };

                $activityLabel = match($activity->aksi) {
                    'hapus' => 'menghapus modul',
                    'ubah' => 'mengedit modul',
                    'tambah' => 'menambahkan modul',
                    default => 'mengubah modul',
                };
            @endphp
              <div class="icon-list-item">
                <div class="icon-list-icon {{ $activityIcon === 'delete' ? 'is-delete' : ($activityIcon === 'edit' ? 'is-edit' : '') }}">
                  @if($activityIcon === 'delete')
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/></svg>
                  @elseif($activityIcon === 'edit')
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 20h9"/><path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4z"/></svg>
                  @else
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 5v14M5 12h14"/></svg>
                  @endif
                </div>
                <div class="icon-list-body">
                  <div class="icon-list-title">
                      {{ $activity->user_name ?? 'Admin' }} {{ $activityLabel }}
                  </div>
                  <div class="icon-list-desc">{{ $activity->deskripsi }}</div>
                </div>
                <span class="icon-list-time">{{ \Illuminate\Support\Carbon::parse($activity->created_at)->diffForHumans() }}</span>
              </div>
            @empty
              <div class="icon-list-item">
                <div class="icon-list-body">
                  <div class="icon-list-title">Belum ada aktivitas</div>
                  <div class="icon-list-desc">Aktivitas admin/tutor akan muncul di sini.</div>
                </div>
              </div>
            @endforelse
          </div>
        </section>

        <section class="panel" aria-labelledby="performanceTitle">
          <h2 id="performanceTitle">Performa Siswa</h2>
          <p class="panel-subtitle">Performa siswa berdasarkan modul yang dikerjakan</p>
          <div class="table-panel-inner">
            <table>
              <thead>
                <tr>
                  <th scope="col">Nama siswa</th>
                  <th scope="col">Modul</th>
                  <th scope="col">Kategori</th>
                  <th scope="col">Nilai</th>
                </tr>
              </thead>
              <tbody>
                @forelse($performance as $attempt)
                  <tr>
                    <td class="col-nama">{{ $attempt->user?->name ?? 'Siswa' }}</td>
                    <td>{{ $attempt->module?->judul ?? '—' }}</td>
                    <td>
                      @switch($attempt->module?->kategori)
                        @case('materi') Materi @break
                        @case('simulasi_horen') Simulasi Hören @break
                        @case('simulasi_lesen') Simulasi Lesen @break
                        @case('simulasi_schreiben') Simulasi Schreiben @break
                        @case('simulasi_sprechen') Simulasi Sprechen @break
                        @default —
                      @endswitch
                    </td>
                    <td class="col-nilai {{ is_null($attempt->nilai) ? 'is-pending' : '' }}">
                      {{ is_null($attempt->nilai) ? '–' : $attempt->nilai }}
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="4" style="text-align:center;color:var(--gray-500);padding:28px 16px;">
                      Belum ada pengerjaan siswa yang selesai.
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </section>
      </div>
    </main>
  </div>
</div>

<script>
(function(){
  "use strict";

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
