<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LD Indonesia</title>
<link rel="icon" type="image/jpeg" href="{{ asset('images/logo-ld.jpeg') }}">
<meta name="description" content="Detail performa dan riwayat aktivitas siswa — LD Indonesia.">
<meta name="robots" content="noindex, nofollow">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

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
.app-shell{ 
  display: flex; 
  min-height: 100vh; 
  width: 100%;
}

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

.main-col{ 
  flex: 1 1 0%; 
  min-width: 0; 
  display: flex; 
  flex-direction: column; 
}

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

.page-content{ 
  padding: 32px 40px 60px; 
  max-width: 1320px; 
  width: 100%; 
  margin: 0 auto; 
  box-sizing: border-box;
  overflow-x: hidden;
}

.back-link{
  display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 10px 18px;
  border-radius: var(--radius-pill); border: 1.5px solid var(--pink-light); color: var(--pink-dark);
  font-weight: 700; font-size: 0.9rem; margin-bottom: 18px;
}
.back-link:hover{ background: var(--pink-pale); }
.back-link svg{ width: 16px; height: 16px; }

.page-heading{ margin-bottom: 22px; }
.page-heading h1{ font-size: 1.6rem; }

/* ============ PROFILE CARD ============ */
.profile-card{
  background: var(--white); border-radius: var(--radius-lg); box-shadow: var(--shadow-md); border: 1px solid var(--gray-100);
  padding: 28px 32px; display: grid; grid-template-columns: 1.4fr 0.75fr 1fr 1fr; gap: 28px; align-items: center;
  margin-bottom: 20px; width: 100%; min-width: 0; box-sizing: border-box;
}
.profile-identity{ display: flex; align-items: center; gap: 18px; min-width: 0; }
.profile-avatar{
  width: 76px; height: 76px; border-radius: 50%; background: var(--pink-pale); color: var(--pink-dark);
  display: flex; align-items: center; justify-content: center; font-family: var(--font-display); font-weight: 800; font-size: 1.7rem; flex-shrink: 0;
}
.profile-name{ font-family: var(--font-display); font-weight: 800; font-size: 1.15rem; color: var(--navy); margin-bottom: 8px; word-break: break-word; }
.profile-line{ display: flex; align-items: center; gap: 8px; font-size: 0.86rem; color: var(--gray-600); margin-bottom: 5px; word-break: break-all; }
.profile-line svg{ width: 15px; height: 15px; color: var(--gray-400); flex-shrink: 0; }

.profile-stat-group{ border-left: 1px solid var(--gray-100); padding-left: 26px; min-width: 0; }
.profile-stat{ margin-bottom: 14px; }
.profile-stat:last-child{ margin-bottom: 0; }
.profile-stat-label{ font-size: 0.8rem; color: var(--gray-500); font-weight: 600; margin-bottom: 3px; }
.profile-stat-value{ font-family: var(--font-display); font-weight: 700; font-size: 1.02rem; color: var(--navy); }

.profile-score{ border-left: 1px solid var(--gray-100); padding-left: 26px; min-width: 0; }
.profile-score-label{ font-size: 0.8rem; color: var(--gray-500); font-weight: 600; margin-bottom: 6px; }
.profile-score-row{ display: flex; align-items: baseline; gap: 10px; flex-wrap: wrap; }
.profile-score-value{ font-family: var(--font-display); font-weight: 800; font-size: 2.1rem; color: var(--pink-dark); }
.profile-score-tag{ font-weight: 700; font-size: 0.94rem; color: var(--navy); }
.profile-score-sub{ font-size: 0.8rem; color: var(--gray-400); margin-top: 4px; }

/* ============ RINGKASAN KATEGORI ============ */
.panel{ 
  background: var(--white); 
  border-radius: var(--radius-lg); 
  box-shadow: var(--shadow-md); 
  border: 1px solid var(--gray-100); 
  padding: 26px 28px; 
  margin-bottom: 20px; 
  width: 100%;
  max-width: 100%;
  box-sizing: border-box;
}
.panel h2{ font-size: 1.12rem; margin-bottom: 18px; }

.category-grid{ display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; width: 100%; min-width: 0; }
.category-card{ border: 1px solid var(--gray-100); border-radius: var(--radius-md); padding: 18px 20px; min-width: 0; }
.category-top{ display: flex; align-items: flex-start; justify-content: space-between; gap: 10px; margin-bottom: 4px; }
.category-icon-title{ display: flex; align-items: center; gap: 10px; min-width: 0; }
.category-icon{ width: 36px; height: 36px; border-radius: 10px; background: var(--pink-pale); color: var(--pink-dark); display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.category-icon svg{ width: 17px; height: 17px; }
.category-title{ font-weight: 700; font-size: 0.9rem; color: var(--navy); word-break: break-word; }
.category-avg-label{ font-size: 0.76rem; color: var(--gray-400); text-align: right; }
.category-avg-value{ font-family: var(--font-display); font-weight: 800; font-size: 1.3rem; color: var(--pink-dark); text-align: right; }
.category-sub{ font-size: 0.82rem; color: var(--gray-500); margin-top: 8px; }

/* ============ RIWAYAT AKTIVITAS ============ */
.riwayat-head{ display: flex; align-items: center; justify-content: space-between; gap: 14px; flex-wrap: wrap; margin-bottom: 18px; width: 100%; }
.riwayat-filters{ display: flex; gap: 12px; flex-wrap: wrap; }

.select-field{ position: relative; }
.select-field select{
  appearance: none; -webkit-appearance: none; font: inherit; font-weight: 600; font-size: 0.9rem;
  padding: 11px 38px 11px 16px; border: 1.5px solid var(--gray-200); border-radius: var(--radius-sm);
  background: var(--white); color: var(--navy); cursor: pointer;
}
.select-field select:focus{ outline: none; border-color: var(--pink); box-shadow: 0 0 0 4px var(--pink-pale); }
.select-field svg{ position: absolute; right: 14px; top: 50%; transform: translateY(-50%); width: 15px; height: 15px; color: var(--gray-500); pointer-events: none; }

.btn-export{
  display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 11px 20px; border-radius: var(--radius-sm);
  background: var(--white); border: 1.5px solid var(--gray-200); color: var(--navy);
  font-weight: 700; font-size: 0.9rem; white-space: nowrap; cursor: pointer;
}
.btn-export:hover{ background: var(--gray-50); }
.btn-export:disabled{ opacity: 0.6; cursor: not-allowed; }
.btn-export svg{ width: 16px; height: 16px; }

.table-scroll{ 
  width: 100%;
  max-width: 100%;
  overflow-x: auto; 
  -webkit-overflow-scrolling: touch;
  display: block;
}
table{ width: 100%; border-collapse: collapse; min-width: 720px; }
thead th{ text-align: left; font-size: 0.85rem; font-weight: 700; color: var(--navy); background: var(--pink-light); padding: 14px 18px; white-space: nowrap; }
thead th:first-child{ border-top-left-radius: 10px; }
thead th:last-child{ border-top-right-radius: 10px; }
tbody td{ padding: 14px 18px; font-size: 0.9rem; color: var(--gray-800); border-bottom: 1px solid var(--gray-100); white-space: nowrap; vertical-align: middle; }
tbody tr:last-child td{ border-bottom: none; }
tbody tr:hover{ background: var(--gray-50); }
td.col-modul{ font-weight: 600; color: var(--navy); white-space: normal; min-width: 180px; word-break: break-word; }
td.col-nilai{ font-weight: 800; color: var(--navy); }

.status-pill{ display: inline-block; padding: 5px 12px; border-radius: var(--radius-pill); font-size: 0.78rem; font-weight: 700; background: var(--amber-bg); color: var(--amber); }

/* ---- Footer & paginasi ---- */
.table-footer{ display: flex; align-items: center; justify-content: space-between; gap: 16px; padding: 18px 0 0; flex-wrap: wrap; border-top: 1px solid var(--gray-100); margin-top: 14px; }
.rows-per-page{ display: flex; align-items: center; gap: 10px; font-size: 0.88rem; color: var(--gray-600); font-weight: 600; }
.rows-per-page select{
  font: inherit; font-weight: 700; color: var(--navy); padding: 7px 30px 7px 12px;
  border: 1.5px solid var(--gray-200); border-radius: 8px; appearance: none; -webkit-appearance: none;
  background: var(--white) url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="%237C776F" stroke-width="2.4"><path d="M6 9l6 6 6-6"/></svg>') no-repeat right 8px center;
  cursor: pointer;
}
.results-count{ font-size: 0.88rem; color: var(--gray-500); }
.pagination{ display: flex; align-items: center; gap: 6px; flex-wrap: wrap; }
.page-btn{
  min-width: 34px; height: 34px; padding: 0 8px; border-radius: 8px; border: 1.5px solid var(--gray-200);
  color: var(--navy); font-weight: 700; font-size: 0.86rem; display: flex; align-items: center; justify-content: center; background: var(--white);
}
.page-btn:hover:not(:disabled):not(.active){ background: var(--gray-50); }
.page-btn.active{ background: var(--pink); border-color: var(--pink); color: var(--white); }
.page-btn:disabled{ opacity: 0.4; cursor: not-allowed; }
.page-btn svg{ width: 16px; height: 16px; }

.aksi-btn{
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 7px;
  min-width: 76px;
  padding: 6px 12px;
  border-radius: 8px;
  font-weight: 600;
  font-size: 0.82rem;
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

/* ============ RESPONSIVE BREAKPOINTS ============ */
@media (max-width: 1180px){
  .profile-card{ grid-template-columns: 1fr 1fr; }
  .profile-score{ grid-column: 1 / -1; border-left: none; border-top: 1px solid var(--gray-100); padding-left: 0; padding-top: 18px; }
  .category-grid{ grid-template-columns: repeat(2, 1fr); }
}

@media (max-width: 980px){
  .sidebar{ position: fixed; left: 0; top: 0; transform: translateX(-100%); transition: transform 0.22s ease; box-shadow: var(--shadow-md); }
  .sidebar.open{ transform: translateX(0); }
  .sidebar-close{ display: flex; align-items: center; justify-content: center; width: 34px; height: 34px; border-radius: 8px; margin-left: auto; color: var(--navy); }
  .sidebar-close:hover{ background: rgba(30,42,71,0.06); }
  .sidebar-brand{ justify-content: space-between; }
  .menu-toggle{ display: flex; }
  .topbar{ padding: 0 20px; }
  .page-content{ padding: 24px 16px 48px; }
  .backdrop{ display: none; position: fixed; inset: 0; background: rgba(30,42,71,0.35); z-index: 50; }
  .backdrop.show{ display: block; }
  .panel{ padding: 20px 18px; }
  .riwayat-head{ flex-direction: column; align-items: stretch; }
  .riwayat-filters{ width: 100%; }
  .select-field{ flex: 1 1 100%; width: 100%; }
  .select-field select{ width: 100%; }
  .btn-export{ width: 100%; justify-content: center; }
}

@media (max-width: 640px){
  .page-content{
    padding: 16px 12px 36px;
  }
  .page-heading h1{
    font-size: 1.35rem;
  }
  .profile-card{
    grid-template-columns: 1fr;
    padding: 18px 16px;
    gap: 18px;
  }
  .profile-identity{
    flex-direction: column;
    text-align: center;
  }
  .profile-line{
    justify-content: center;
  }
  .profile-stat-group{
    border-left: none;
    border-top: 1px solid var(--gray-100);
    padding-left: 0;
    padding-top: 16px;
  }
  .category-grid{
    grid-template-columns: 1fr;
    gap: 12px;
  }
  .panel{
    padding: 16px 14px;
    border-radius: var(--radius-md);
  }
  .table-footer{ 
    flex-direction: column; 
    align-items: flex-start; 
    gap: 12px;
    padding-top: 14px;
  }
  .pagination{
    width: 100%;
    justify-content: center;
  }
  thead th{
    padding: 12px 14px;
    font-size: 0.78rem;
  }
  tbody td{
    padding: 12px 14px;
    font-size: 0.84rem;
  }
}
</style>
</head>
<body>
<a href="#mainContent" class="skip-link">Langsung ke konten utama</a>

<div class="app-shell">
  <div class="backdrop" id="backdrop"></div>

  <x-sidebar.admin />

  <!-- ============ MAIN ============ -->
  <div class="main-col">
    <x-header.admin />

    <main class="page-content" id="mainContent">
      <a href="{{ route('admin.performa.index') }}" class="back-link">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 18l-6-6 6-6"/></svg>
        Kembali
      </a>

      <div class="page-heading">
        <h1>Detail Siswa</h1>
      </div>

      <!-- ============ PROFIL SISWA ============ -->
      <section class="profile-card" aria-label="Profil siswa">
          <div class="profile-identity">
              <div class="profile-avatar" aria-hidden="true">
                  {{ strtoupper(substr($student->name, 0, 1)) }}
              </div>

              <div>
                  <div class="profile-name">
                      {{ $student->name }}
                  </div>

                  <div class="profile-line">
                      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                          <rect x="2" y="4" width="20" height="16" rx="2"/>
                          <path d="m2 7 10 6 10-6"/>
                      </svg>
                      {{ $student->email }}
                  </div>

                  <div class="profile-line">
                      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                          <rect x="3" y="4" width="18" height="18" rx="2"/>
                          <path d="M16 2v4M8 2v4M3 10h18"/>
                      </svg>
                      Bergabung: {{ $student->created_at ? \Carbon\Carbon::parse($student->created_at)->translatedFormat('d F Y') : '-' }}
                  </div>

                  <div class="profile-line">
                      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                          <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                          <circle cx="12" cy="7" r="4"/>
                      </svg>
                      Peran: Siswa
                  </div>
              </div>
          </div>

          <div class="profile-stat-group">
              <div class="profile-stat">
                  <div class="profile-stat-label">Level</div>
                  <div class="profile-stat-value">{{ $student->level ?? '-' }}</div>
              </div>

              <div class="profile-stat">
                  <div class="profile-stat-label">Status</div>
                  <div class="profile-stat-value">{{ ucfirst($student->status ?? '-') }}</div>
              </div>
          </div>

          <div class="profile-stat-group">
              <div class="profile-stat">
                  <div class="profile-stat-label">Total Latihan Selesai</div>
                  <div class="profile-stat-value">{{ $totalLatihan }}</div>
              </div>

              <div class="profile-stat">
                  <div class="profile-stat-label">Total Simulasi Selesai</div>
                  <div class="profile-stat-value">{{ $totalSimulasi }}</div>
              </div>
          </div>

          <div class="profile-score">
              <div class="profile-score-label">Nilai Rata-rata Keseluruhan</div>
              <div class="profile-score-row">
                  <span class="profile-score-value">{{ $nilaiRataRata !== null ? $nilaiRataRata : '-' }}</span>
                  <span class="profile-score-tag">{{ $nilaiStatus }}</span>
              </div>
              <div class="profile-score-sub">Dari {{ $activities->count() }} aktivitas</div>
          </div>
      </section>

      <!-- ============ RINGKASAN KATEGORI ============ -->
      <section class="panel" aria-label="Ringkasan kategori">
        <h2>Ringkasan Kategori</h2>
        <div class="category-grid">
            @foreach($categorySummaries as $kategori => $summary)
                <div class="category-card">
                    <div class="category-top">
                        <div class="category-icon-title">
                            <div class="category-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    @if($kategori === 'materi')
                                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                                    @elseif($kategori === 'simulasi_horen')
                                        <path d="M3 18v-6a9 9 0 0 1 18 0v6"/>
                                        <path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3z"/>
                                        <path d="M3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"/>
                                    @elseif($kategori === 'simulasi_lesen')
                                        <path d="M2 5.5C2 4.7 2.7 4 4.7 4c2.6 0 5.3 1 7.3 2.5C14 4.9 16.7 4 19.3 4c2 0 2.7.7 2.7 1.5v13c0-.8-.7-1.5-2.7-1.5-2.6 0-5.3.9-7.3 2.5-2-1.6-4.7-2.5-7.3-2.5C2.7 17 2 17.7 2 18.5z"/>
                                        <path d="M12 6.5V20"/>
                                    @else
                                        <path d="m12 20 9-9-2-2-9 9-4 4z"/>
                                        <path d="M2 22l3-1 1-3"/>
                                        <path d="m14.5 6.5 3 3"/>
                                    @endif
                                </svg>
                            </div>
                            <span class="category-title">{{ $summary['label'] }}</span>
                        </div>
                      @if(!in_array($kategori, ['simulasi_schreiben', 'simulasi_sprechen']))
                          <div>
                              <div class="category-avg-label">Rata-rata</div>
                              <div class="category-avg-value">{{ $summary['rata_rata'] !== null ? $summary['rata_rata'] : '-' }}</div>
                          </div>
                      @endif
                    </div>

                    <div class="category-sub">{{ $summary['selesai'] }} selesai</div>
                </div>
            @endforeach
        </div>
      </section>

      <!-- ============ RIWAYAT AKTIVITAS ============ -->
      <section class="panel" aria-label="Riwayat aktivitas siswa">
        <div class="riwayat-head">
          <h2 style="margin-bottom:0;">Riwayat Aktivitas</h2>
          <div class="riwayat-filters">
            <div class="select-field">
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
            <div class="select-field">
              <select id="waktuFilter">
                <option value="">Semua Waktu</option>
                <option value="24jam">24 Jam Terakhir</option>
                <option value="1minggu">1 Minggu Terakhir</option>
                <option value="1bulan">1 Bulan Terakhir</option>
              </select>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
            </div>
            <button type="button" class="btn-export" id="exportBtn">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 3v13"/><path d="m7 11 5 5 5-5"/><path d="M5 21h14"/></svg>
              <span id="exportBtnLabel">Ekspor</span>
            </button>
          </div>
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
            <tbody id="riwayatBody">
                @forelse($activities as $index => $activity)
                    <tr
                        data-category="{{ $activity->kategori ?? '' }}"
                        data-date="{{ $activity->selesai_pada ?? '' }}"
                        data-activity-id="{{ $activity->id ?? '' }}"
                    >
                        <td>{{ $index + 1 }}</td>
                        <td class="col-modul">{{ $activity->judul ?? 'Modul tidak ditemukan' }}</td>
                        <td>{{ $categorySummaries[$activity->kategori]['label'] ?? ($activity->kategori ?? '-') }}</td>
                        <td class="col-nilai">
                            @if(in_array($activity->kategori, ['simulasi_schreiben', 'simulasi_sprechen']))
                                <span style="color: var(--gray-400);">—</span>
                            @elseif($activity->nilai !== null)
                                {{ number_format((float) $activity->nilai, 1) }}
                            @else
                                <span class="status-pill">Belum Dinilai</span>
                            @endif
                        </td>
                        <td>
                            {{ $activity->selesai_pada
                                ? \Carbon\Carbon::parse($activity->selesai_pada)->format('d M Y, H:i')
                                : '-' }}
                        </td>
                        <td>
                            <a href="{{ route('admin.siswa.hasil', [
                                    'user' => $student->id,
                                    'attempt' => $activity->id
                                ]) }}"
                                class="aksi-btn"
                                title="Lihat hasil pengerjaan"
                                aria-label="Lihat hasil pengerjaan {{ $activity->judul ?? 'Modul' }}"
                            >
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                      <path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6-10-6-10-6z"/>
                                      <circle cx="12" cy="12" r="2.5"/>
                                </svg>
                                Lihat
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align:center;padding:30px;">
                            Belum ada aktivitas siswa.
                        </td>
                    </tr>
                @endforelse
            </tbody>
          </table>
        </div>

        <div class="table-footer">
            <div class="rows-per-page">
                Rows per page
                <select id="rowsPerPage" aria-label="Jumlah baris per halaman">
                    <option value="5" selected>5</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                </select>
                <span class="results-count" id="resultsCount">0–0 of 0 aktivitas</span>
            </div>

            <nav class="pagination" id="pagination" aria-label="Navigasi halaman"></nav>
        </div>
      </section>
    </main>
  </div>
</div>

<script>
(function(){
  "use strict";

  var tbody = document.getElementById('riwayatBody');
  var rowsPerPageSelect = document.getElementById('rowsPerPage');
  var resultsCount = document.getElementById('resultsCount');
  var pagination = document.getElementById('pagination');

  var currentPage = 1;
  var rowsPerPage = parseInt(rowsPerPageSelect.value, 10) || 5;

  var allRows = Array.from(
      tbody.querySelectorAll('tr[data-category]')
  );

  var filteredRows = allRows.slice();

  function renderPagination() {
      var totalRows = filteredRows.length;
      var totalPages = Math.ceil(totalRows / rowsPerPage);

      if (totalPages === 0) {
          currentPage = 1;
      } else if (currentPage > totalPages) {
          currentPage = totalPages;
      }

      allRows.forEach(function(row) {
          row.style.display = 'none';
      });

      var startIndex = (currentPage - 1) * rowsPerPage;
      var endIndex = Math.min(
          startIndex + rowsPerPage,
          totalRows
      );

      for (var i = startIndex; i < endIndex; i++) {
          filteredRows[i].style.display = '';
          var numberCell = filteredRows[i].querySelector('td:first-child');
          if (numberCell) {
              numberCell.textContent = i + 1;
          }
      }

      if (totalRows === 0) {
          resultsCount.textContent = '0–0 of 0 aktivitas';
      } else {
          resultsCount.textContent =
              (startIndex + 1) +
              '–' +
              endIndex +
              ' of ' +
              totalRows +
              ' aktivitas';
      }

      pagination.innerHTML = '';

      var previousButton = document.createElement('button');
      previousButton.type = 'button';
      previousButton.className = 'page-btn';
      previousButton.setAttribute('aria-label', 'Halaman sebelumnya');
      previousButton.innerHTML = `
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <path d="M15 18l-6-6 6-6"/>
          </svg>
      `;

      previousButton.disabled = currentPage <= 1 || totalPages === 0;

      previousButton.addEventListener('click', function() {
          if (currentPage > 1) {
              currentPage--;
              renderPagination();
          }
      });

      pagination.appendChild(previousButton);

      if (totalPages > 0) {
          var maxVisiblePages = 5;
          var startPage = Math.max(1, currentPage - Math.floor(maxVisiblePages / 2));
          var endPage = Math.min(totalPages, startPage + maxVisiblePages - 1);

          if (endPage - startPage + 1 < maxVisiblePages) {
              startPage = Math.max(1, endPage - maxVisiblePages + 1);
          }

          if (startPage > 1) {
              createPageButton(1);
              if (startPage > 2) {
                  createEllipsis();
              }
          }

          for (var page = startPage; page <= endPage; page++) {
              createPageButton(page);
          }

          if (endPage < totalPages) {
              if (endPage < totalPages - 1) {
                  createEllipsis();
              }
              createPageButton(totalPages);
          }
      }

      var nextButton = document.createElement('button');
      nextButton.type = 'button';
      nextButton.className = 'page-btn';
      nextButton.setAttribute('aria-label', 'Halaman berikutnya');
      nextButton.innerHTML = `
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <path d="M9 6l6 6-6 6"/>
          </svg>
      `;

      nextButton.disabled = currentPage >= totalPages || totalPages === 0;

      nextButton.addEventListener('click', function() {
          if (currentPage < totalPages) {
              currentPage++;
              renderPagination();
          }
      });

      pagination.appendChild(nextButton);
  }

  function createPageButton(page) {
      var button = document.createElement('button');
      button.type = 'button';
      button.className = 'page-btn';
      button.textContent = page;
      button.setAttribute('aria-label', 'Halaman ' + page);

      if (page === currentPage) {
          button.classList.add('active');
          button.setAttribute('aria-current', 'page');
      }

      button.addEventListener('click', function() {
          currentPage = page;
          renderPagination();
      });

      pagination.appendChild(button);
  }

  function createEllipsis() {
      var span = document.createElement('span');
      span.textContent = '…';
      span.setAttribute('aria-hidden', 'true');
      span.style.display = 'flex';
      span.style.alignItems = 'center';
      span.style.justifyContent = 'center';
      span.style.minWidth = '24px';
      span.style.height = '34px';
      span.style.color = 'var(--gray-400)';
      span.style.fontWeight = '700';

      pagination.appendChild(span);
  }

  if (rowsPerPageSelect) {
    rowsPerPageSelect.addEventListener('change', function() {
        rowsPerPage = parseInt(this.value, 10) || 5;
        currentPage = 1;
        renderPagination();
    });
  }

  renderPagination();

  var kategoriFilter = document.getElementById('kategoriFilter');
  var waktuFilter = document.getElementById('waktuFilter');

  function applyFilters() {
      var selectedCategory = kategoriFilter.value;
      var selectedTime = waktuFilter.value;
      var now = new Date();

      filteredRows = allRows.filter(function(row) {
          var category = row.dataset.category || '';
          var dateString = row.dataset.date || '';

          if (selectedCategory && getCategoryLabel(category) !== selectedCategory) {
              return false;
          }

          if (selectedTime && dateString) {
              var activityDate = new Date(dateString.replace(' ', 'T'));
              if (!isNaN(activityDate.getTime())) {
                  var diff = now.getTime() - activityDate.getTime();
                  var diffHours = diff / (1000 * 60 * 60);

                  if (selectedTime === '24jam' && diffHours > 24) return false;
                  if (selectedTime === '1minggu' && diffHours > 24 * 7) return false;
                  if (selectedTime === '1bulan' && diffHours > 24 * 30) return false;
              }
          }
          return true;
      });

      currentPage = 1;
      renderPagination();
  }

  function getCategoryLabel(category) {
      var labels = {
          'materi': 'Materi',
          'simulasi_horen': 'Simulasi Hören',
          'simulasi_lesen': 'Simulasi Lesen',
          'simulasi_schreiben': 'Simulasi Schreiben',
          'simulasi_sprechen': 'Simulasi Sprechen'
      };
      return labels[category] || category;
  }

  if (kategoriFilter) kategoriFilter.addEventListener('change', applyFilters);
  if (waktuFilter) waktuFilter.addEventListener('change', applyFilters);

  var exportBtn = document.getElementById('exportBtn');
  var exportBtnLabel = document.getElementById('exportBtnLabel');

  if (exportBtn) {
    exportBtn.addEventListener('click', function(){
        if (typeof XLSX === 'undefined') {
            alert('Gagal memuat pustaka ekspor. Periksa koneksi internet Anda lalu coba lagi.');
            return;
        }

        exportBtn.disabled = true;
        if (exportBtnLabel) exportBtnLabel.textContent = 'Mengekspor…';

        var rows = [];

        document.querySelectorAll('#riwayatBody tr[data-category]').forEach(function(row){
            if (row.style.display === 'none') return;
            var cells = row.querySelectorAll('td');
            if (cells.length < 5) return;

            rows.push({
                'No': cells[0].innerText.trim(),
                'Modul': cells[1].innerText.trim(),
                'Kategori': cells[2].innerText.trim(),
                'Nilai': cells[3].innerText.trim(),
                'Tanggal & Waktu': cells[4].innerText.trim()
            });
        });

        var worksheet = XLSX.utils.json_to_sheet(rows);
        worksheet['!cols'] = [
            { wch: 8 },
            { wch: 35 },
            { wch: 25 },
            { wch: 15 },
            { wch: 25 }
        ];

        var workbook = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(workbook, worksheet, 'Riwayat Aktivitas');

        var studentName = @json($student->name);
        var safeName = studentName.replace(/[^a-z0-9]/gi, '-').toLowerCase();
        var today = new Date().toISOString().slice(0, 10);

        XLSX.writeFile(workbook, 'riwayat-' + safeName + '-' + today + '.xlsx');

        exportBtn.disabled = false;
        if (exportBtnLabel) exportBtnLabel.textContent = 'Ekspor';
    });
  }

  var sidebar = document.getElementById('sidebar');
  var menuToggle = document.getElementById('menuToggle');
  var sidebarClose = document.getElementById('sidebarClose');
  var backdrop = document.getElementById('backdrop');

  function openSidebar(){ 
    if (sidebar) sidebar.classList.add('open'); 
    if (backdrop) backdrop.classList.add('show'); 
    if (menuToggle) menuToggle.setAttribute('aria-expanded', 'true'); 
  }
  function closeSidebar(){ 
    if (sidebar) sidebar.classList.remove('open'); 
    if (backdrop) backdrop.classList.remove('show'); 
    if (menuToggle) menuToggle.setAttribute('aria-expanded', 'false'); 
  }

  if (menuToggle) menuToggle.addEventListener('click', openSidebar);
  if (sidebarClose) sidebarClose.addEventListener('click', closeSidebar);
  if (backdrop) backdrop.addEventListener('click', closeSidebar);
})();
</script>
</body>
</html>