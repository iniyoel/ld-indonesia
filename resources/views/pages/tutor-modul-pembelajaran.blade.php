<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LD Indonesia</title>
<meta name="description" content="Kelola modul pembelajaran dan simulasi LD Indonesia — tambah, ubah, dan hapus modul.">
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
  --red: #D6444F;
  --red-bg: #FCE7E8;
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

.page-content{ padding: 36px 40px 60px; max-width: 1280px; width: 100%; margin: 0 auto; }
.page-heading{ margin-bottom: 22px; }
.page-heading h1{ font-size: 1.7rem; }

/* ============ FILTER + ACTION BAR ============ */
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
.btn-add{
  display: inline-flex; align-items: center; gap: 8px;
  padding: 13px 24px; border-radius: var(--radius-pill);
  background: linear-gradient(135deg, var(--pink) 0%, var(--pink-dark) 100%); color: var(--white);
  font-weight: 700; font-size: 0.94rem; box-shadow: var(--shadow-md); white-space: nowrap;
  transition: transform 0.18s ease;
}
.btn-add:hover{ transform: translateY(-2px); }
.btn-add svg{ width: 17px; height: 17px; }

/* ============ TABLE PANEL ============ */
.panel{ background: var(--white); border-radius: var(--radius-lg); box-shadow: var(--shadow-md); border: 1px solid var(--gray-100); overflow: hidden; }
.table-scroll{ overflow-x: auto; }
table{ width: 100%; border-collapse: collapse; min-width: 880px; }
thead th{ text-align: left; font-size: 0.85rem; font-weight: 700; color: var(--navy); background: var(--pink-light); padding: 15px 24px; white-space: nowrap; }
thead th:first-child{ padding-left: 28px; }
tbody td{ padding: 17px 24px; font-size: 0.92rem; color: var(--gray-800); border-bottom: 1px solid var(--gray-100); vertical-align: middle; white-space: nowrap; }
tbody td:first-child{ padding-left: 28px; }
tbody tr:last-child td{ border-bottom: none; }
tbody tr:hover{ background: var(--gray-50); }
td.col-judul{ font-weight: 600; color: var(--navy); white-space: normal; min-width: 220px; }

.action-group{ display: flex; align-items: center; gap: 4px; }
.action-btn{
  display: inline-flex; align-items: center; justify-content: center;
  width: 34px; height: 34px; border-radius: 8px; color: var(--pink-dark);
  transition: background 0.15s ease;
}
.action-btn:hover{ background: var(--pink-pale); }
.action-btn.is-delete{ color: var(--pink); }
.action-btn.is-delete:hover{ background: var(--red-bg); color: var(--red); }
.action-btn svg{ width: 18px; height: 18px; }

.empty-state{ padding: 64px 28px; text-align: center; }
.empty-state svg{ width: 52px; height: 52px; color: var(--gray-300); margin: 0 auto 14px; }
.empty-state-title{ font-weight: 700; font-size: 1rem; color: var(--navy); margin-bottom: 6px; }
.empty-state-text{ font-size: 0.9rem; color: var(--gray-500); margin-bottom: 20px; }

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
  .btn-add{ justify-content: center; }
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
  <x-sidebar.tutor />

  <!-- ============ MAIN ============ -->
  <div class="main-col">
    <x-header.tutor />

    <main class="page-content" id="mainContent">
      <div class="page-heading">
        <h1>Kelola Modul</h1>
      </div>

      <!-- ============ FILTER + TAMBAH MODUL ============ -->
      <!-- Catatan: kolom cari & filter Level di bawah ini baru tampilan (belum fungsional). -->
      <div class="filter-bar">
        <div class="search-field">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg>
          <label for="searchInput" class="sr-only" hidden>Cari modul</label>
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

        <a class="btn-add" href="tutor-modul-form.html">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" aria-hidden="true"><path d="M12 5v14M5 12h14"/></svg>
          Tambah Modul
        </a>
      </div>

      <!-- ============ TABLE PANEL ============ -->
      <section class="panel" aria-label="Daftar modul dan simulasi">
        <div class="table-scroll">
          <table>
            <thead>
              <tr>
                <th scope="col">Judul</th>
                <th scope="col">Level</th>
                <th scope="col">Kategori</th>
                <th scope="col">Terakhir diperbarui</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody id="moduleTableBody"></tbody>
          </table>
        </div>

        <!-- Ditampilkan otomatis oleh script jika daftar modul kosong -->
        <div class="empty-state" id="emptyState" hidden>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
          <div class="empty-state-title">Modul belum tersedia</div>
          <div class="empty-state-text">Belum ada modul atau simulasi yang ditambahkan. Klik "Tambah Modul" untuk membuat modul pertama.</div>
        </div>

        <!-- Catatan: paginasi di bawah ini baru tampilan (belum fungsional). -->
        <div class="table-footer" id="tableFooter">
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
     - MODULES di bawah ini adalah data contoh statis. Saat backend
       siap, ganti dengan fetch('/api/admin/modul') untuk mengambil
       daftar modul & simulasi sesungguhnya (termasuk total baris
       untuk paginasi).
     - Tombol Lihat mengarah ke halaman detail modul yang belum dibuat
       (tutor-modul-detail.html). Tombol Ubah mengarah ke
       tutor-modul-form.html (form Tambah/Ubah Modul yang sudah ada).
     - Tombol Hapus di bawah ini SUDAH fungsional secara lokal (memakai
       konfirmasi browser lalu menghapus baris dari tampilan) sebagai
       simulasi front-end. Saat backend siap, ganti dengan pemanggilan
       API DELETE sebelum menghapus barisnya dari tampilan.
     - Baris tabel otomatis menampilkan pesan "Modul belum tersedia"
       ketika array MODULES kosong (mis. setelah semua modul dihapus).
  ================================================================== */
  var MODULES = [
    { id: 1, judul: 'Artikel Der, Das, Die', level: 'A1', kategori: 'Materi', updated: '19 Jun 2026' },
    { id: 2, judul: 'Simulasi Prüfung A1', level: 'A1', kategori: 'Simulasi Hören', updated: '19 Jun 2026' },
    { id: 3, judul: 'Modal Verben', level: 'A2', kategori: 'Materi', updated: '20 Jun 2026' },
    { id: 4, judul: 'Perfekt', level: 'A2', kategori: 'Simulasi Schreiben', updated: '20 Jun 2026' }
  ];

  var tbody = document.getElementById('moduleTableBody');
  var emptyState = document.getElementById('emptyState');
  var tableFooter = document.getElementById('tableFooter');

  function render(){
    tbody.innerHTML = '';
    var isEmpty = MODULES.length === 0;
    emptyState.hidden = !isEmpty;
    tableFooter.hidden = isEmpty;
    tbody.parentElement.parentElement.querySelector('.table-scroll').hidden = isEmpty;

    MODULES.forEach(function(m){
      var tr = document.createElement('tr');
      tr.innerHTML =
        '<td class="col-judul">' + m.judul + '</td>' +
        '<td>Level ' + m.level + '</td>' +
        '<td>' + m.kategori + '</td>' +
        '<td>' + m.updated + '</td>' +
        '<td>' +
          '<div class="action-group">' +
            '<a class="action-btn" href="tutor-modul-detail.html?id=' + m.id + '" aria-label="Lihat ' + m.judul + '">' +
              '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z"/><circle cx="12" cy="12" r="3"/></svg>' +
            '</a>' +
            '<a class="action-btn" href="tutor-modul-form.html?id=' + m.id + '" aria-label="Ubah ' + m.judul + '">' +
              '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 20h9"/><path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4z"/></svg>' +
            '</a>' +
            '<button type="button" class="action-btn is-delete" data-delete-id="' + m.id + '" aria-label="Hapus ' + m.judul + '">' +
              '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/></svg>' +
            '</button>' +
          '</div>' +
        '</td>';
      tbody.appendChild(tr);
    });

    tbody.querySelectorAll('[data-delete-id]').forEach(function(btn){
      btn.addEventListener('click', function(){
        var id = parseInt(btn.getAttribute('data-delete-id'), 10);
        var target = MODULES.find(function(m){ return m.id === id; });
        if (!target) return;
        var confirmed = window.confirm('Hapus modul "' + target.judul + '"? Tindakan ini tidak dapat dibatalkan.');
        if (!confirmed) return;
        // TODO: panggil API DELETE ke backend sebelum menghapus dari tampilan.
        MODULES = MODULES.filter(function(m){ return m.id !== id; });
        render();
      });
    });
  }

  render();

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
