<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LD Indonesia</title>
<meta name="description" content="Ringkasan performa seluruh siswa LD Indonesia untuk admin.">
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
.page-heading{ margin-bottom: 22px; }
.page-heading h1{ font-size: 1.7rem; }

/* ============ FILTER + EKSPOR BAR ============ */
.filter-bar{ display: flex; gap: 14px; margin-bottom: 22px; flex-wrap: wrap; align-items: center; }
.search-field{ flex: 1 1 280px; position: relative; min-width: 200px; }
.search-field svg{ position: absolute; left: 16px; top: 50%; transform: translateY(-50%); width: 18px; height: 18px; color: var(--gray-400); pointer-events: none; }
.search-field input{
  width: 100%; font: inherit; font-size: 0.92rem; padding: 13px 16px 13px 44px;
  border: 1.5px solid var(--gray-200); border-radius: var(--radius-sm); background: var(--white); box-shadow: var(--shadow-sm);
}
.search-field input:focus{ outline: none; border-color: var(--pink); box-shadow: 0 0 0 4px var(--pink-pale); }

.select-field{ position: relative; flex: 0 0 200px; }
.select-field select{
  appearance: none; -webkit-appearance: none; width: 100%; font: inherit; font-weight: 600; font-size: 0.92rem;
  padding: 13px 40px 13px 18px; border: 1.5px solid var(--gray-200); border-radius: var(--radius-sm);
  background: var(--white); color: var(--navy); box-shadow: var(--shadow-sm); cursor: pointer;
}
.select-field select:focus{ outline: none; border-color: var(--pink); box-shadow: 0 0 0 4px var(--pink-pale); }
.select-field svg{ position: absolute; right: 16px; top: 50%; transform: translateY(-50%); width: 16px; height: 16px; color: var(--gray-500); pointer-events: none; }

.filter-spacer{ flex-grow: 1; }
.btn-export{
  display: inline-flex; align-items: center; gap: 8px;
  padding: 13px 24px; border-radius: var(--radius-pill);
  background: var(--pink-pale); color: var(--pink-dark);
  font-weight: 700; font-size: 0.94rem; white-space: nowrap;
  border: 1.5px solid var(--pink-light);
  transition: background 0.15s ease, transform 0.15s ease;
}
.btn-export:hover{ background: var(--pink-light); transform: translateY(-2px); }
.btn-export:disabled{ opacity: 0.6; cursor: not-allowed; transform: none; }
.btn-export svg{ width: 17px; height: 17px; }

/* ============ TABLE PANEL ============ */
.panel{ background: var(--white); border-radius: var(--radius-lg); box-shadow: var(--shadow-md); border: 1px solid var(--gray-100); overflow: hidden; }
.table-scroll{ overflow-x: auto; }
table{ width: 100%; border-collapse: collapse; min-width: 920px; }
thead th{ text-align: left; font-size: 0.85rem; font-weight: 700; color: var(--navy); background: var(--pink-light); padding: 15px 24px; white-space: nowrap; }
thead th:first-child{ padding-left: 28px; }
tbody td{ padding: 17px 24px; font-size: 0.92rem; color: var(--gray-800); border-bottom: 1px solid var(--gray-100); vertical-align: middle; white-space: nowrap; }
tbody td:first-child{ padding-left: 28px; }
tbody tr:last-child td{ border-bottom: none; }
tbody tr:hover{ background: var(--gray-50); }
td.col-name{ font-weight: 600; color: var(--navy); }
td.col-nilai{ font-weight: 800; color: var(--navy); }

.action-btn{
  display: inline-flex; align-items: center; justify-content: center;
  width: 36px; height: 36px; border-radius: 50%; color: var(--pink-dark);
  transition: background 0.15s ease;
}
.action-btn:hover{ background: var(--pink-pale); }
.action-btn svg{ width: 19px; height: 19px; }

/* ---- Footer & paginasi (tampilan saja) ---- */
.table-footer{ display: flex; align-items: center; justify-content: space-between; gap: 16px; padding: 18px 28px; flex-wrap: wrap; border-top: 1px solid var(--gray-100); }
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
  .filter-bar{ flex-direction: column; align-items: stretch; }
  .select-field{ flex: 1 1 auto; }
  .btn-export{ justify-content: center; }
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
  <aside class="sidebar" id="sidebar" aria-label="Navigasi utama">
    <div class="sidebar-brand">
      <a href="dashboard-tutor.html" style="display:flex;align-items:center;gap:10px;" aria-label="LD Indonesia — Dashboard Tutor">
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
          <a href="dashboard-tutor.html" class="nav-link">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 11.5 12 4l9 7.5"/><path d="M5 10v10a1 1 0 0 0 1 1h4v-6h4v6h4a1 1 0 0 0 1-1V10"/></svg>
            Dashboard
          </a>
        </li>
        <li>
          <a href="tutor-modul-pembelajaran.html" class="nav-link">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 5.5C2 4.7 2.7 4 4.7 4c2.6 0 5.3 1 7.3 2.5C14 4.9 16.7 4 19.3 4c2 0 2.7.7 2.7 1.5v13c0-.8-.7-1.5-2.7-1.5-2.6 0-5.3.9-7.3 2.5-2-1.6-4.7-2.5-7.3-2.5C2.7 17 2 17.7 2 18.5z"/><path d="M12 6.5V20"/></svg>
            Modul Pembelajaran
          </a>
        </li>
        <li>
          <a href="tutor-performa-siswa.html" class="nav-link active" aria-current="page">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 3v18h18"/><rect x="7" y="12" width="3" height="6"/><rect x="12.5" y="8" width="3" height="10"/><rect x="18" y="5" width="3" height="13"/></svg>
            Performa Siswa
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
          <strong>Kevin Simatupang</strong>
          <span>Tutor</span>
        </div>
        <div class="user-avatar" aria-hidden="true">K</div>
      </div>
    </header>

    <main class="page-content" id="mainContent">
      <div class="page-heading">
        <h1>Performa Siswa</h1>
      </div>

      <!-- ============ FILTER + EKSPOR ============ -->
      <!-- Catatan: kolom cari & filter Level di bawah ini baru tampilan (belum fungsional). -->
      <div class="filter-bar">
        <div class="search-field">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg>
          <label for="searchInput" class="sr-only" hidden>Cari nama siswa</label>
          <input type="search" id="searchInput" placeholder="Cari...">
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

        <div class="filter-spacer"></div>

        <button type="button" class="btn-export" id="exportBtn">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 3v13"/><path d="m7 11 5 5 5-5"/><path d="M5 21h14"/></svg>
          <span id="exportBtnLabel">Ekspor</span>
        </button>
      </div>

      <!-- ============ TABLE PANEL ============ -->
      <section class="panel" aria-label="Performa seluruh siswa">
        <div class="table-scroll">
          <table id="performaTable">
            <thead>
              <tr>
                <th scope="col">Nama Pengguna</th>
                <th scope="col">Latihan Selesai</th>
                <th scope="col">Simulasi Selesai</th>
                <th scope="col">Level</th>
                <th scope="col">Nilai Rata-rata</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody id="performaTableBody"></tbody>
          </table>
        </div>

        <!-- Catatan: paginasi di bawah ini baru tampilan (belum fungsional). -->
        <div class="table-footer">
          <div class="rows-per-page">
            Rows per page
            <select id="rowsPerPage" aria-label="Jumlah baris per halaman">
              <option value="15" selected>15</option>
              <option value="25">25</option>
              <option value="50">50</option>
            </select>
            <span class="results-count">1–15 of 200 rows</span>
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
     - STUDENTS di bawah ini adalah data contoh statis (12 baris,
       memenuhi ketentuan minimal 10 data). Saat backend siap, ganti
       dengan fetch('/api/admin/performa-siswa') yang memuat data
       sesungguhnya beserta total baris untuk paginasi.
     - Tombol Aksi (ikon mata) mengarah ke admin-siswa-detail.html?id=...
       — halaman detail performa per siswa belum dibuat, menunggu
       penjelasan lebih lanjut sesuai catatanmu ("akan dijelaskan nanti").
     - Kolom cari & filter Level masih tampilan saja (belum fungsional).
     - Tombol "Ekspor" SUDAH fungsional: mengunduh data pada tabel ini
       sebagai file .xlsx asli (memakai library SheetJS/xlsx dari CDN).
       Saat backend siap, sebaiknya ekspor dilakukan di server agar bisa
       mencakup seluruh data (bukan hanya yang tampil di halaman ini).
  ================================================================== */
  var STUDENTS = [
    { nama: 'Maria Sitanggang', latihan: 10, simulasi: 10, level: 'A1', nilai: 87 },
    { nama: 'Yoel', latihan: 15, simulasi: 2, level: 'A2', nilai: 92 },
    { nama: 'Jack O Wi', latihan: 10, simulasi: 3, level: 'B2', nilai: 76 },
    { nama: 'Wowo', latihan: 1, simulasi: 4, level: 'A1', nilai: 88 },
    { nama: 'Revo Nainggolan', latihan: 8, simulasi: 6, level: 'A1', nilai: 80 },
    { nama: 'Arya Mohan', latihan: 12, simulasi: 5, level: 'B1', nilai: 84 },
    { nama: 'Lany Sitorus', latihan: 9, simulasi: 7, level: 'A2', nilai: 90 },
    { nama: 'Justin Bieber', latihan: 6, simulasi: 3, level: 'B1', nilai: 78 },
    { nama: 'Zayn Malik', latihan: 14, simulasi: 8, level: 'A1', nilai: 95 },
    { nama: 'Sinta Wulandari', latihan: 11, simulasi: 4, level: 'B2', nilai: 82 },
    { nama: 'Bayu Saputra', latihan: 7, simulasi: 2, level: 'A2', nilai: 73 },
    { nama: 'Nadia Putri', latihan: 13, simulasi: 9, level: 'B1', nilai: 91 }
  ];

  var tbody = document.getElementById('performaTableBody');

  STUDENTS.forEach(function(s, i){
    var tr = document.createElement('tr');
    tr.innerHTML =
      '<td class="col-name">' + s.nama + '</td>' +
      '<td>' + s.latihan + '</td>' +
      '<td>' + s.simulasi + '</td>' +
      '<td>' + s.level + '</td>' +
      '<td class="col-nilai">' + s.nilai + '</td>' +
      '<td><a class="action-btn" href="tutor-siswa-detail.html?id=' + (i + 1) + '" aria-label="Lihat detail performa ' + s.nama + '">' +
        '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z"/><circle cx="12" cy="12" r="3"/></svg>' +
      '</a></td>';
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

    var rows = STUDENTS.map(function(s){
      return {
        'Nama Pengguna': s.nama,
        'Latihan Selesai': s.latihan,
        'Simulasi Selesai': s.simulasi,
        'Level': s.level,
        'Nilai Rata-rata': s.nilai
      };
    });

    var worksheet = XLSX.utils.json_to_sheet(rows);
    worksheet['!cols'] = [{ wch: 24 }, { wch: 16 }, { wch: 16 }, { wch: 10 }, { wch: 16 }];
    var workbook = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(workbook, worksheet, 'Performa Siswa');

    var today = new Date().toISOString().slice(0, 10);
    XLSX.writeFile(workbook, 'performa-siswa-' + today + '.xlsx');

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
