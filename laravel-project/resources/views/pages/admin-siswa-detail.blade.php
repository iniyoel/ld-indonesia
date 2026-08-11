<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Detail Siswa — Admin — LD Indonesia</title>
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

.page-content{ padding: 32px 40px 60px; max-width: 1320px; width: 100%; margin: 0 auto; }

.back-link{
  display: inline-flex; align-items: center; gap: 8px; padding: 10px 18px;
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
  margin-bottom: 20px;
}
.profile-identity{ display: flex; align-items: center; gap: 18px; }
.profile-avatar{
  width: 76px; height: 76px; border-radius: 50%; background: var(--pink-pale); color: var(--pink-dark);
  display: flex; align-items: center; justify-content: center; font-family: var(--font-display); font-weight: 800; font-size: 1.7rem; flex-shrink: 0;
}
.profile-name{ font-family: var(--font-display); font-weight: 800; font-size: 1.15rem; color: var(--navy); margin-bottom: 8px; }
.profile-line{ display: flex; align-items: center; gap: 8px; font-size: 0.86rem; color: var(--gray-600); margin-bottom: 5px; }
.profile-line svg{ width: 15px; height: 15px; color: var(--gray-400); flex-shrink: 0; }

.profile-stat-group{ border-left: 1px solid var(--gray-100); padding-left: 26px; }
.profile-stat{ margin-bottom: 14px; }
.profile-stat:last-child{ margin-bottom: 0; }
.profile-stat-label{ font-size: 0.8rem; color: var(--gray-500); font-weight: 600; margin-bottom: 3px; }
.profile-stat-value{ font-family: var(--font-display); font-weight: 700; font-size: 1.02rem; color: var(--navy); }

.profile-score{ border-left: 1px solid var(--gray-100); padding-left: 26px; }
.profile-score-label{ font-size: 0.8rem; color: var(--gray-500); font-weight: 600; margin-bottom: 6px; }
.profile-score-row{ display: flex; align-items: baseline; gap: 10px; }
.profile-score-value{ font-family: var(--font-display); font-weight: 800; font-size: 2.1rem; color: var(--pink-dark); }
.profile-score-tag{ font-weight: 700; font-size: 0.94rem; color: var(--navy); }
.profile-score-sub{ font-size: 0.8rem; color: var(--gray-400); margin-top: 4px; }

/* ============ RINGKASAN KATEGORI ============ */
.panel{ background: var(--white); border-radius: var(--radius-lg); box-shadow: var(--shadow-md); border: 1px solid var(--gray-100); padding: 26px 28px; margin-bottom: 20px; }
.panel h2{ font-size: 1.12rem; margin-bottom: 18px; }

.category-grid{ display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; }
.category-card{ border: 1px solid var(--gray-100); border-radius: var(--radius-md); padding: 18px 20px; }
.category-top{ display: flex; align-items: flex-start; justify-content: space-between; gap: 10px; margin-bottom: 4px; }
.category-icon-title{ display: flex; align-items: center; gap: 10px; }
.category-icon{ width: 36px; height: 36px; border-radius: 10px; background: var(--pink-pale); color: var(--pink-dark); display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.category-icon svg{ width: 17px; height: 17px; }
.category-title{ font-weight: 700; font-size: 0.9rem; color: var(--navy); }
.category-avg-label{ font-size: 0.76rem; color: var(--gray-400); text-align: right; }
.category-avg-value{ font-family: var(--font-display); font-weight: 800; font-size: 1.3rem; color: var(--pink-dark); text-align: right; }
.category-sub{ font-size: 0.82rem; color: var(--gray-500); margin-top: 8px; }

/* ============ RIWAYAT AKTIVITAS ============ */
.riwayat-head{ display: flex; align-items: center; justify-content: space-between; gap: 14px; flex-wrap: wrap; margin-bottom: 18px; }
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
  display: inline-flex; align-items: center; gap: 8px; padding: 11px 20px; border-radius: var(--radius-sm);
  background: var(--white); border: 1.5px solid var(--gray-200); color: var(--navy);
  font-weight: 700; font-size: 0.9rem; white-space: nowrap;
}
.btn-export:hover{ background: var(--gray-50); }
.btn-export:disabled{ opacity: 0.6; cursor: not-allowed; }
.btn-export svg{ width: 16px; height: 16px; }

.table-scroll{ overflow-x: auto; margin: 0 -28px; padding: 0 28px; }
table{ width: 100%; border-collapse: collapse; min-width: 760px; }
thead th{ text-align: left; font-size: 0.85rem; font-weight: 700; color: var(--navy); background: var(--pink-light); padding: 14px 20px; white-space: nowrap; }
thead th:first-child{ border-top-left-radius: 10px; }
thead th:last-child{ border-top-right-radius: 10px; }
tbody td{ padding: 16px 20px; font-size: 0.92rem; color: var(--gray-800); border-bottom: 1px solid var(--gray-100); white-space: nowrap; }
tbody tr:last-child td{ border-bottom: none; }
tbody tr:hover{ background: var(--gray-50); }
td.col-modul{ font-weight: 600; color: var(--navy); white-space: normal; min-width: 200px; }
td.col-nilai{ font-weight: 800; color: var(--navy); }

.status-pill{ display: inline-block; padding: 6px 14px; border-radius: var(--radius-pill); font-size: 0.8rem; font-weight: 700; background: var(--amber-bg); color: var(--amber); }

/* ---- Footer & paginasi (tampilan saja) ---- */
.table-footer{ display: flex; align-items: center; justify-content: space-between; gap: 16px; padding: 18px 4px 0; flex-wrap: wrap; }
.rows-per-page{ display: flex; align-items: center; gap: 10px; font-size: 0.88rem; color: var(--gray-600); font-weight: 600; }
.rows-per-page select{
  font: inherit; font-weight: 700; color: var(--navy); padding: 7px 30px 7px 12px;
  border: 1.5px solid var(--gray-200); border-radius: 8px; appearance: none; -webkit-appearance: none;
  background: var(--white) url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="%237C776F" stroke-width="2.4"><path d="M6 9l6 6 6-6"/></svg>') no-repeat right 8px center;
  cursor: pointer;
}
.results-count{ font-size: 0.88rem; color: var(--gray-500); }
.pagination{ display: flex; align-items: center; gap: 8px; }
.page-btn{
  min-width: 34px; height: 34px; padding: 0 8px; border-radius: 8px; border: 1.5px solid var(--gray-200);
  color: var(--navy); font-weight: 700; font-size: 0.86rem; display: flex; align-items: center; justify-content: center; background: var(--white);
}
.page-btn:hover:not(:disabled):not(.active){ background: var(--gray-50); }
.page-btn.active{ background: var(--pink); border-color: var(--pink); color: var(--white); }
.page-btn:disabled{ opacity: 0.4; cursor: not-allowed; }
.page-btn svg{ width: 16px; height: 16px; }

/* ============ RESPONSIVE ============ */
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
  .page-content{ padding: 24px 20px 48px; }
  .backdrop{ display: none; position: fixed; inset: 0; background: rgba(30,42,71,0.35); z-index: 50; }
  .backdrop.show{ display: block; }
  .profile-card{ grid-template-columns: 1fr; padding: 22px; }
  .profile-stat-group{ border-left: none; border-top: 1px solid var(--gray-100); padding-left: 0; padding-top: 18px; }
  .panel{ padding: 20px 18px; }
  .table-scroll{ margin: 0 -18px; padding: 0 18px; }
}
@media (max-width: 640px){
  .user-meta{ display: none; }
  .category-grid{ grid-template-columns: 1fr; }
  .table-footer{ flex-direction: column; align-items: flex-start; }
}
</style>
</head>
<body>
<a href="#mainContent" class="skip-link">Langsung ke konten utama</a>

<div class="app-shell">
  <div class="backdrop" id="backdrop"></div>

  <!-- ============ SIDEBAR ============ -->
  <aside class="sidebar" id="sidebar" aria-label="Navigasi utama">
    <div class="sidebar-brand">
      <a href="dashboard-admin.html" style="display:flex;align-items:center;gap:10px;" aria-label="LD Indonesia — Dashboard Admin">
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
          <a href="dashboard-admin.html" class="nav-link">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 11.5 12 4l9 7.5"/><path d="M5 10v10a1 1 0 0 0 1 1h4v-6h4v6h4a1 1 0 0 0 1-1V10"/></svg>
            Dashboard
          </a>
        </li>
        <li>
          <a href="admin-modul-pembelajaran.html" class="nav-link">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 5.5C2 4.7 2.7 4 4.7 4c2.6 0 5.3 1 7.3 2.5C14 4.9 16.7 4 19.3 4c2 0 2.7.7 2.7 1.5v13c0-.8-.7-1.5-2.7-1.5-2.6 0-5.3.9-7.3 2.5-2-1.6-4.7-2.5-7.3-2.5C2.7 17 2 17.7 2 18.5z"/><path d="M12 6.5V20"/></svg>
            Modul Pembelajaran
          </a>
        </li>
        <li>
          <a href="admin-performa-siswa.html" class="nav-link active" aria-current="page">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 3v18h18"/><rect x="7" y="12" width="3" height="6"/><rect x="12.5" y="8" width="3" height="10"/><rect x="18" y="5" width="3" height="13"/></svg>
            Performa Siswa
          </a>
        </li>
        <li>
          <a href="admin-pengguna.html" class="nav-link">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            Pengguna
          </a>
        </li>
      </ul>
    </nav>

    <div class="sidebar-footer">
      <a href="keluar.html" class="logout-link">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><path d="M16 17l5-5-5-5"/><path d="M21 12H9"/></svg>
        Keluar
      </a>
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
          <strong>Ari Hutabarat</strong>
          <span>Admin</span>
        </div>
        <div class="user-avatar" aria-hidden="true">A</div>
      </div>
    </header>

    <main class="page-content" id="mainContent">
      <a href="admin-performa-siswa.html" class="back-link">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 18l-6-6 6-6"/></svg>
        Kembali
      </a>

      <div class="page-heading">
        <h1>Detail Siswa</h1>
      </div>

      <!-- ============ PROFIL SISWA ============ -->
      <section class="profile-card" aria-label="Profil siswa">
        <div class="profile-identity">
          <div class="profile-avatar" aria-hidden="true">M</div>
          <div>
            <div class="profile-name">Maria Sitanggang</div>
            <div class="profile-line">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m2 7 10 6 10-6"/></svg>
              maria@gmail.com
            </div>
            <div class="profile-line">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
              Bergabung: 10 Mei 2026
            </div>
            <div class="profile-line">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
              Peran: Siswa
            </div>
          </div>
        </div>

        <div class="profile-stat-group">
          <div class="profile-stat">
            <div class="profile-stat-label">Level</div>
            <div class="profile-stat-value">A1</div>
          </div>
          <div class="profile-stat">
            <div class="profile-stat-label">Status</div>
            <div class="profile-stat-value">Aktif</div>
          </div>
        </div>

        <div class="profile-stat-group">
          <div class="profile-stat">
            <div class="profile-stat-label">Total Latihan Selesai</div>
            <div class="profile-stat-value">5</div>
          </div>
          <div class="profile-stat">
            <div class="profile-stat-label">Total Simulasi Selesai</div>
            <div class="profile-stat-value">10</div>
          </div>
        </div>

        <div class="profile-score">
          <div class="profile-score-label">Nilai Rata-rata Keseluruhan</div>
          <div class="profile-score-row">
            <span class="profile-score-value">85</span>
            <span class="profile-score-tag">Baik</span>
          </div>
          <div class="profile-score-sub">Dari 15 aktivitas</div>
        </div>
      </section>

      <!-- ============ RINGKASAN KATEGORI ============ -->
      <section class="panel" aria-label="Ringkasan kategori">
        <h2>Ringkasan Kategori</h2>
        <div class="category-grid">
          <div class="category-card">
            <div class="category-top">
              <div class="category-icon-title">
                <div class="category-icon">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                </div>
                <span class="category-title">Materi</span>
              </div>
              <div>
                <div class="category-avg-label">Rata-rata</div>
                <div class="category-avg-value">88</div>
              </div>
            </div>
            <div class="category-sub">5 selesai</div>
          </div>

          <div class="category-card">
            <div class="category-top">
              <div class="category-icon-title">
                <div class="category-icon">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 18v-6a9 9 0 0 1 18 0v6"/><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"/></svg>
                </div>
                <span class="category-title">Simulasi Hören</span>
              </div>
              <div>
                <div class="category-avg-label">Rata-rata</div>
                <div class="category-avg-value">88</div>
              </div>
            </div>
            <div class="category-sub">3 selesai</div>
          </div>

          <div class="category-card">
            <div class="category-top">
              <div class="category-icon-title">
                <div class="category-icon">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 5.5C2 4.7 2.7 4 4.7 4c2.6 0 5.3 1 7.3 2.5C14 4.9 16.7 4 19.3 4c2 0 2.7.7 2.7 1.5v13c0-.8-.7-1.5-2.7-1.5-2.6 0-5.3.9-7.3 2.5-2-1.6-4.7-2.5-7.3-2.5C2.7 17 2 17.7 2 18.5z"/></svg>
                </div>
                <span class="category-title">Simulasi Lesen</span>
              </div>
              <div>
                <div class="category-avg-label">Rata-rata</div>
                <div class="category-avg-value">88</div>
              </div>
            </div>
            <div class="category-sub">7 selesai</div>
          </div>

          <div class="category-card">
            <div class="category-top">
              <div class="category-icon-title">
                <div class="category-icon">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m12 20 9-9-2-2-9 9-4 4z"/><path d="M2 22l3-1 1-3"/><path d="m14.5 6.5 3 3"/></svg>
                </div>
                <span class="category-title">Simulasi Schreiben</span>
              </div>
              <div>
                <div class="category-avg-label">Rata-rata</div>
                <div class="category-avg-value">88</div>
              </div>
            </div>
            <div class="category-sub">10 selesai</div>
          </div>
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
              </tr>
            </thead>
            <tbody id="riwayatBody"></tbody>
          </table>
        </div>

        <!-- Catatan: paginasi di bawah ini baru tampilan (belum fungsional). -->
        <div class="table-footer">
          <div class="rows-per-page">
            Rows per page
            <select id="rowsPerPage" aria-label="Jumlah baris per halaman">
              <option value="5" selected>5</option>
              <option value="10">10</option>
              <option value="25">25</option>
            </select>
            <span class="results-count">1–5 of 30 aktivitas</span>
          </div>
          <nav class="pagination" aria-label="Navigasi halaman (contoh tampilan)">
            <button class="page-btn" disabled aria-label="Halaman sebelumnya">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>
            </button>
            <button class="page-btn active" aria-current="page" aria-label="Halaman 1">1</button>
            <button class="page-btn" aria-label="Halaman 2">2</button>
            <button class="page-btn" aria-label="Halaman 3">3</button>
            <button class="page-btn" aria-label="Halaman berikutnya">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M9 6l6 6-6 6"/></svg>
            </button>
          </nav>
        </div>
      </section>
    </main>
  </div>
</div>

<script>
(function(){
  "use strict";

  /* ==================================================================
     CATATAN INTEGRASI BACKEND
     - Seluruh data di halaman ini (profil, ringkasan kategori, dan
       riwayat aktivitas) masih data contoh statis untuk satu siswa
       ("Maria Sitanggang"). Saat backend siap, ambil siswa yang tepat
       berdasarkan parameter ?id= pada URL, mis.
       fetch('/api/admin/siswa/' + id).
     - Baris dengan nilai "Belum Dinilai" merepresentasikan soal
       Simulasi Schreiben yang belum diperiksa tutor (lihat juga
       detail-pengerjaan-schreiben.html untuk alur penilaian tutor).
     - Filter Kategori & Waktu, serta paginasi, masih tampilan saja
       (belum fungsional).
     - Tombol "Ekspor" SUDAH fungsional (mengunduh riwayat aktivitas
       sebagai file .xlsx asli memakai SheetJS), sama seperti pada
       halaman Performa Siswa.
  ================================================================== */
  var RIWAYAT = [
    { modul: 'Artikel Bestimte Der, Die, Das, Die', kategori: 'Materi', nilai: 80, waktu: '20 Jun 2026, 10:30' },
    { modul: 'Modal Verben', kategori: 'Simulasi Hören', nilai: 70, waktu: '20 Jun 2026, 10:30' },
    { modul: 'Pronomen', kategori: 'Simulasi Schreiben', nilai: null, waktu: '20 Jun 2026, 10:30' },
    { modul: 'Adjektiv', kategori: 'Simulasi Lesen', nilai: 100, waktu: '20 Jun 2026, 10:30' },
    { modul: 'Adjektiv Deklination', kategori: 'Simulasi Lesen', nilai: 100, waktu: '20 Jun 2026, 10:30' }
  ];

  var tbody = document.getElementById('riwayatBody');
  RIWAYAT.forEach(function(r, i){
    var tr = document.createElement('tr');
    var nilaiCell = r.nilai === null
      ? '<span class="status-pill">Belum Dinilai</span>'
      : r.nilai;
    tr.innerHTML =
      '<td>' + (i + 1) + '</td>' +
      '<td class="col-modul">' + r.modul + '</td>' +
      '<td>' + r.kategori + '</td>' +
      '<td class="col-nilai">' + nilaiCell + '</td>' +
      '<td>' + r.waktu + '</td>';
    tbody.appendChild(tr);
  });

  /* ---- Ekspor ke Excel (.xlsx) — fungsional, memakai SheetJS ---- */
  var exportBtn = document.getElementById('exportBtn');
  var exportBtnLabel = document.getElementById('exportBtnLabel');

  exportBtn.addEventListener('click', function(){
    if (typeof XLSX === 'undefined'){
      alert('Gagal memuat pustaka ekspor. Periksa koneksi internet Anda lalu coba lagi.');
      return;
    }
    exportBtn.disabled = true;
    exportBtnLabel.textContent = 'Mengekspor…';

    var rows = RIWAYAT.map(function(r){
      return {
        'Modul': r.modul,
        'Kategori': r.kategori,
        'Nilai': r.nilai === null ? 'Belum Dinilai' : r.nilai,
        'Tanggal & Waktu': r.waktu
      };
    });

    var worksheet = XLSX.utils.json_to_sheet(rows);
    worksheet['!cols'] = [{ wch: 30 }, { wch: 20 }, { wch: 14 }, { wch: 20 }];
    var workbook = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(workbook, worksheet, 'Riwayat Aktivitas');

    var today = new Date().toISOString().slice(0, 10);
    XLSX.writeFile(workbook, 'riwayat-maria-sitanggang-' + today + '.xlsx');

    exportBtn.disabled = false;
    exportBtnLabel.textContent = 'Ekspor';
  });

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
