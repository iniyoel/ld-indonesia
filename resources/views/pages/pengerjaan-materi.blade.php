<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Artikel Das — Modul Pembelajaran — LD Indonesia</title>
<meta name="description" content="Materi pembelajaran bahasa Jerman: Artikel Das — LD Indonesia.">
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

/* ============ APP SHELL (konsisten dengan halaman lain) ============ */
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

.page-content{ padding: 32px 40px 60px; max-width: 1180px; width: 100%; margin: 0 auto; }

/* ============ KEMBALI ============ */
.back-link{
  display: inline-flex; align-items: center; gap: 8px;
  padding: 10px 18px;
  border-radius: var(--radius-pill);
  border: 1.5px solid var(--pink-light);
  color: var(--pink-dark);
  font-weight: 700;
  font-size: 0.9rem;
  margin-bottom: 22px;
}
.back-link:hover{ background: var(--pink-pale); }
.back-link svg{ width: 16px; height: 16px; }

/* ============ MATERI PANEL ============ */
.materi-panel{
  background: var(--white);
  border-radius: var(--radius-lg);
  box-shadow: var(--shadow-md);
  border: 1px solid var(--gray-100);
  padding: 30px 32px 32px;
}
.materi-panel h1{ font-size: 1.5rem; margin-bottom: 8px; }
.materi-desc{ color: var(--gray-500); font-size: 0.94rem; margin-bottom: 24px; }

/* ---- PDF viewer mock ---- */
.pdf-viewer{
  border: 1px solid var(--gray-200);
  border-radius: var(--radius-md);
  overflow: hidden;
  background: var(--pink-pale);
}
.pdf-toolbar{
  display: flex;
  align-items: center;
  gap: 18px;
  padding: 12px 20px;
  flex-wrap: wrap;
}
.pdf-toolbar-group{ display: flex; align-items: center; gap: 8px; }
.pdf-tool-btn{
  width: 32px; height: 32px;
  border-radius: 8px;
  display: flex; align-items: center; justify-content: center;
  color: var(--navy-soft);
}
.pdf-tool-btn:hover{ background: rgba(255,255,255,0.7); color: var(--navy); }
.pdf-tool-btn svg{ width: 18px; height: 18px; }
.pdf-toolbar-label{ font-size: 0.86rem; color: var(--gray-600); font-weight: 600; }
.pdf-page-input{
  width: 40px;
  text-align: center;
  font: inherit;
  font-weight: 700;
  font-size: 0.86rem;
  color: var(--navy);
  border: 1px solid var(--gray-200);
  border-radius: 6px;
  padding: 5px 4px;
  background: var(--white);
}
.pdf-zoom-label{
  font-size: 0.84rem;
  font-weight: 700;
  color: var(--navy);
  background: var(--white);
  border: 1px solid var(--gray-200);
  border-radius: 8px;
  padding: 6px 14px;
}
.pdf-toolbar-spacer{ flex-grow: 1; }

.pdf-page-area{
  background: var(--pink-light);
  padding: 28px;
  position: relative;
}
.pdf-page{
  background: var(--white);
  max-width: 760px;
  margin: 0 auto;
  min-height: 420px;
  border-radius: 6px;
  box-shadow: 0 8px 24px rgba(30,42,71,0.10);
  padding: 44px 52px;
  position: relative;
}
.pdf-page h2{ font-size: 2rem; margin-bottom: 18px; }
.pdf-page h3{ font-family: var(--font-display); font-size: 1.15rem; margin-bottom: 14px; color: var(--gray-800); font-weight: 700; }
.pdf-page .subhead-pink{ color: var(--pink-dark); font-family: var(--font-display); font-size: 1.1rem; font-weight: 700; margin: 22px 0 12px; }
.pdf-page p{ color: var(--gray-800); font-size: 1.02rem; line-height: 1.65; }
.pdf-scrollbar{
  position: absolute;
  right: 8px; top: 28px;
  width: 6px; height: 130px;
  border-radius: 4px;
  background: var(--gray-300);
}

.materi-footer{
  display: flex;
  justify-content: flex-end;
  margin-top: 26px;
}
.btn-continue{
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 13px 26px;
  border-radius: var(--radius-pill);
  background: linear-gradient(135deg, var(--pink) 0%, var(--pink-dark) 100%);
  color: var(--white);
  font-weight: 700;
  font-size: 0.94rem;
  box-shadow: 0 12px 28px rgba(236,78,140,0.22);
  transition: transform 0.18s ease;
}
.btn-continue:hover{ transform: translateY(-2px); }
.btn-continue svg{ width: 17px; height: 17px; }

/* ============ RESPONSIVE ============ */
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
  .materi-panel{ padding: 22px 18px 26px; }
  .pdf-page{ padding: 30px 24px; }
}
@media (max-width: 640px){
  .user-meta{ display: none; }
  .pdf-toolbar{ gap: 10px; }
  .pdf-toolbar-label{ display: none; }
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
      <a href="dashboard-siswa.html" style="display:flex;align-items:center;gap:10px;" aria-label="LD Indonesia — Dashboard">
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
          <a href="dashboard-siswa.html" class="nav-link">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 11.5 12 4l9 7.5"/><path d="M5 10v10a1 1 0 0 0 1 1h4v-6h4v6h4a1 1 0 0 0 1-1V10"/></svg>
            Dashboard
          </a>
        </li>
        <li>
          <a href="modul-pembelajaran.html" class="nav-link active" aria-current="page">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 5.5C2 4.7 2.7 4 4.7 4c2.6 0 5.3 1 7.3 2.5C14 4.9 16.7 4 19.3 4c2 0 2.7.7 2.7 1.5v13c0-.8-.7-1.5-2.7-1.5-2.6 0-5.3.9-7.3 2.5-2-1.6-4.7-2.5-7.3-2.5C2.7 17 2 17.7 2 18.5z"/><path d="M12 6.5V20"/></svg>
            Modul Pembelajaran
          </a>
        </li>
        <li>
          <a href="performa-siswa.html" class="nav-link">
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
          <strong>Maria Sitanggang</strong>
          <span>Siswa</span>
        </div>
        <div class="user-avatar" aria-hidden="true">M</div>
      </div>
    </header>

    <main class="page-content" id="mainContent">
      <a href="modul-pembelajaran.html" class="back-link">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 18l-6-6 6-6"/></svg>
        Kembali
      </a>

      <section class="materi-panel" aria-labelledby="materiTitle">
        <h1 id="materiTitle">Artikel Das</h1>
        <p class="materi-desc">Pengantar penggunaan artikel bestimmt (der, die, das) dalam bahasa Jerman.</p>

        <!-- ============ PDF VIEWER (tampilan saja — pratinjau materi statis) ============ -->
        <!-- Catatan: toolbar ini murni dekoratif untuk tahap front-end. Saat backend
             siap, ganti area .pdf-page-area dengan penampil PDF sesungguhnya
             (mis. PDF.js) yang memuat file materi dari server. -->
        <div class="pdf-viewer">
          <div class="pdf-toolbar">
            <button class="pdf-tool-btn" aria-label="Daftar halaman" type="button">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="16" rx="2"/><path d="M3 9h18"/></svg>
            </button>
            <span class="pdf-toolbar-label">Halaman</span>

            <div class="pdf-toolbar-group">
              <input class="pdf-page-input" type="text" value="1" aria-label="Halaman saat ini" readonly>
              <span class="pdf-toolbar-label">/ 12</span>
            </div>

            <div class="pdf-toolbar-group">
              <button class="pdf-tool-btn" aria-label="Perkecil" type="button">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" aria-hidden="true"><path d="M5 12h14"/></svg>
              </button>
              <span class="pdf-zoom-label">100%</span>
              <button class="pdf-tool-btn" aria-label="Perbesar" type="button">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" aria-hidden="true"><path d="M12 5v14M5 12h14"/></svg>
              </button>
            </div>

            <button class="pdf-tool-btn" aria-label="Mode buku" type="button">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 5.5C2 4.7 2.7 4 4.7 4c2.6 0 5.3 1 7.3 2.5C14 4.9 16.7 4 19.3 4c2 0 2.7.7 2.7 1.5v13c0-.8-.7-1.5-2.7-1.5-2.6 0-5.3.9-7.3 2.5-2-1.6-4.7-2.5-7.3-2.5C2.7 17 2 17.7 2 18.5z"/></svg>
            </button>
            <button class="pdf-tool-btn" aria-label="Muat ulang" type="button">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 12a9 9 0 1 1-3-6.7"/><path d="M21 3v6h-6"/></svg>
            </button>

            <div class="pdf-toolbar-spacer"></div>

            <button class="pdf-tool-btn" aria-label="Unduh" type="button">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 3v13"/><path d="m7 11 5 5 5-5"/><path d="M5 21h14"/></svg>
            </button>
            <button class="pdf-tool-btn" aria-label="Cetak" type="button">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9V3h12v6"/><rect x="4" y="9" width="16" height="8" rx="1"/><path d="M6 17v4h12v-4"/></svg>
            </button>
            <button class="pdf-tool-btn" aria-label="Menu lainnya" type="button">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true"><circle cx="12" cy="5" r="0.7" fill="currentColor" stroke="none"/><circle cx="12" cy="12" r="0.7" fill="currentColor" stroke="none"/><circle cx="12" cy="19" r="0.7" fill="currentColor" stroke="none"/></svg>
            </button>
          </div>

          <div class="pdf-page-area">
            <div class="pdf-page">
              <h2>Artikel Das</h2>
              <h3>Pengantar Artikel dalam Bahasa Jerman</h3>
              <p class="subhead-pink">Was ist ein Artikel?</p>
              <p>Artikel adalah kata kecil yang digunakan sebelum kata benda (Nomen) dalam bahasa Jerman. Artikel membantu menunjukkan jenis kelamin, jumlah, dan kasus dari kata benda tersebut.</p>
              <div class="pdf-scrollbar" aria-hidden="true"></div>
            </div>
          </div>
        </div>

        <div class="materi-footer">
          <a class="btn-continue" href="pengerjaan-soal.html?id=1">
            Lanjut ke Latihan
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
          </a>
        </div>
      </section>
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

  /* Teruskan parameter id modul (jika ada) ke tombol "Lanjut ke Latihan" */
  var params = new URLSearchParams(window.location.search);
  var moduleId = params.get('id');
  if (moduleId) {
    var continueBtn = document.querySelector('.btn-continue');
    continueBtn.href = 'pengerjaan-soal.html?id=' + encodeURIComponent(moduleId);
  }
})();
</script>
</body>
</html>
