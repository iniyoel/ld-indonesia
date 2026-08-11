<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Modul — Tutor — LD Indonesia</title>
<meta name="description" content="Form tambah modul pembelajaran atau simulasi baru — LD Indonesia.">
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
  --red: #E0483F;
  --red-bg: #FDECEA;
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

.page-content{ padding: 32px 40px 60px; max-width: 1180px; width: 100%; margin: 0 auto; }

.back-link{
  display: inline-flex; align-items: center; gap: 8px; padding: 13px 22px;
  border-radius: var(--radius-pill); border: 1.5px solid var(--pink-light); color: var(--pink-dark);
  font-weight: 700; font-size: 0.94rem;
}
.back-link:hover{ background: var(--pink-pale); }
.back-link svg{ width: 16px; height: 16px; }

.page-heading{ margin-bottom: 22px; }
.page-heading h1{ font-size: 1.6rem; }

/* ============ FORM PANEL ============ */
.form-panel{
  background: var(--white); border-radius: var(--radius-lg); box-shadow: var(--shadow-md);
  border: 1px solid var(--gray-100); padding: 32px 34px;
}
.form-grid{ display: grid; grid-template-columns: 1.15fr 0.85fr; gap: 40px; }

.field{ margin-bottom: 24px; }
.field label{ display: block; font-family: var(--font-display); font-weight: 700; font-size: 1.02rem; color: var(--navy); margin-bottom: 10px; }
.field input[type="text"], .field textarea{
  width: 100%; font: inherit; font-size: 0.94rem; padding: 13px 16px;
  border: 1.5px solid var(--gray-200); border-radius: var(--radius-sm); background: var(--white); color: var(--gray-800);
  transition: border-color 0.15s ease, box-shadow 0.15s ease;
}
.field input[type="text"]:focus, .field textarea:focus{ outline: none; border-color: var(--pink); box-shadow: 0 0 0 4px var(--pink-pale); }
.field textarea{ min-height: 190px; resize: vertical; font-family: var(--font-body); }
.field input[aria-invalid="true"], .field textarea[aria-invalid="true"]{ border-color: var(--red); }

.field-row{ display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }

.select-wrap{ position: relative; }
.select-wrap select{
  appearance: none; -webkit-appearance: none; width: 100%; font: inherit; font-size: 0.94rem;
  padding: 13px 42px 13px 16px; border: 1.5px solid var(--gray-200); border-radius: var(--radius-sm);
  background: var(--white); color: var(--gray-800); cursor: pointer;
}
.select-wrap select:invalid{ color: var(--gray-400); }
.select-wrap select:focus{ outline: none; border-color: var(--pink); box-shadow: 0 0 0 4px var(--pink-pale); }
.select-wrap svg{ position: absolute; right: 16px; top: 50%; transform: translateY(-50%); width: 16px; height: 16px; color: var(--gray-500); pointer-events: none; }
.select-wrap select[aria-invalid="true"]{ border-color: var(--red); }

.field-error{ display: none; align-items: center; gap: 6px; color: var(--red); font-size: 0.8rem; font-weight: 500; margin-top: 7px; }
.field-error.show{ display: flex; }
.field-error svg{ width: 14px; height: 14px; flex-shrink: 0; }

/* ---- Upload panel ---- */
.upload-panel-label{ font-family: var(--font-display); font-weight: 700; font-size: 1.02rem; color: var(--navy); margin-bottom: 10px; }
.dropzone{
  border: 1.5px dashed var(--gray-300); border-radius: var(--radius-md);
  min-height: 300px; display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center;
  padding: 30px; transition: border-color 0.15s ease, background 0.15s ease;
}
.dropzone.is-dragover{ border-color: var(--pink); background: var(--pink-pale); }
.dropzone-icon{ width: 52px; height: 52px; color: var(--gray-400); margin-bottom: 16px; }
.dropzone-title{ font-weight: 700; font-size: 0.96rem; color: var(--navy); margin-bottom: 6px; }
.dropzone-or{ font-size: 0.86rem; color: var(--gray-400); margin-bottom: 14px; }
.dropzone-btn{
  background: var(--pink-pale); color: var(--pink-dark); font-weight: 700; font-size: 0.9rem;
  padding: 10px 26px; border-radius: var(--radius-pill);
}
.dropzone-btn:hover{ background: var(--pink-light); }
.upload-hint{ font-size: 0.82rem; color: var(--gray-500); margin-top: 12px; }

.file-chip{
  display: none; align-items: center; gap: 12px; margin-top: 16px;
  background: var(--green-bg); border: 1px solid #B7E4CB; border-radius: var(--radius-sm); padding: 12px 16px;
}
.file-chip.show{ display: flex; }
.file-chip svg{ width: 20px; height: 20px; color: var(--green); flex-shrink: 0; }
.file-chip-name{ flex-grow: 1; font-size: 0.86rem; font-weight: 600; color: var(--navy); word-break: break-all; }
.file-chip-remove{ color: var(--gray-500); flex-shrink: 0; }
.file-chip-remove:hover{ color: var(--red); }
.file-chip-remove svg{ width: 16px; height: 16px; color: inherit; }

.upload-skip-note{
  display: none; align-items: flex-start; gap: 10px;
  background: var(--pink-pale); border: 1px solid var(--pink-light); border-radius: var(--radius-md);
  padding: 18px 20px; font-size: 0.88rem; color: var(--gray-600); line-height: 1.6;
}
.upload-skip-note.show{ display: flex; }
.upload-skip-note svg{ width: 18px; height: 18px; color: var(--pink-dark); flex-shrink: 0; margin-top: 1px; }

/* ============ FOOTER ACTIONS ============ */
.form-actions{ display: flex; align-items: center; justify-content: space-between; gap: 16px; margin-top: 30px; flex-wrap: wrap; }
.btn-next{
  display: inline-flex; align-items: center; gap: 8px;
  padding: 14px 30px; border-radius: var(--radius-pill);
  background: linear-gradient(135deg, var(--pink) 0%, var(--pink-dark) 100%); color: var(--white);
  font-weight: 700; font-size: 0.96rem; box-shadow: 0 12px 28px rgba(236,78,140,0.22);
  transition: transform 0.18s ease;
}
.btn-next:hover{ transform: translateY(-2px); }
.btn-next svg{ width: 17px; height: 17px; }

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
  .form-panel{ padding: 22px 20px; }
  .form-grid{ grid-template-columns: 1fr; gap: 24px; }
  .field-row{ grid-template-columns: 1fr; }
}
@media (max-width: 640px){ .user-meta{ display: none; } }
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
          <a href="tutor-modul-pembelajaran.html" class="nav-link active" aria-current="page">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 5.5C2 4.7 2.7 4 4.7 4c2.6 0 5.3 1 7.3 2.5C14 4.9 16.7 4 19.3 4c2 0 2.7.7 2.7 1.5v13c0-.8-.7-1.5-2.7-1.5-2.6 0-5.3.9-7.3 2.5-2-1.6-4.7-2.5-7.3-2.5C2.7 17 2 17.7 2 18.5z"/><path d="M12 6.5V20"/></svg>
            Modul Pembelajaran
          </a>
        </li>
        <li>
          <a href="tutor-performa-siswa.html" class="nav-link">
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
        <h1>Tambah Modul</h1>
      </div>

      <form class="form-panel" id="modulForm" novalidate>
        <div class="form-grid">
          <!-- ============ KOLOM KIRI: DATA MODUL ============ -->
          <div>
            <div class="field">
              <label for="judulModul">Judul Modul</label>
              <input type="text" id="judulModul" name="judul" placeholder="Contoh: Artikel Der, Das, Die" aria-describedby="judulError">
              <p class="field-error" id="judulError">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 8v5M12 16h.01"/></svg>
                <span>Judul modul wajib diisi.</span>
              </p>
            </div>

            <div class="field-row">
              <div class="field">
                <label for="levelModul">Level</label>
                <div class="select-wrap">
                  <select id="levelModul" name="level" required aria-describedby="levelError">
                    <option value="" selected disabled>Pilih Level</option>
                    <option value="A1">A1</option>
                    <option value="A2">A2</option>
                    <option value="B1">B1</option>
                    <option value="B2">B2</option>
                  </select>
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
                </div>
                <p class="field-error" id="levelError">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 8v5M12 16h.01"/></svg>
                  <span>Pilih level modul.</span>
                </p>
              </div>

              <div class="field">
                <label for="kategoriModul">Kategori</label>
                <div class="select-wrap">
                  <select id="kategoriModul" name="kategori" required aria-describedby="kategoriError">
                    <option value="" selected disabled>Pilih Kategori</option>
                    <option value="Materi">Materi</option>
                    <option value="Simulasi Hören">Simulasi Hören</option>
                    <option value="Simulasi Lesen">Simulasi Lesen</option>
                    <option value="Simulasi Schreiben">Simulasi Schreiben</option>
                    <option value="Simulasi Sprechen">Simulasi Sprechen</option>
                  </select>
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
                </div>
                <p class="field-error" id="kategoriError">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 8v5M12 16h.01"/></svg>
                  <span>Pilih kategori modul.</span>
                </p>
              </div>
            </div>

            <div class="field" style="margin-bottom:0;">
              <label for="deskripsiModul">Deskripsi</label>
              <textarea id="deskripsiModul" name="deskripsi" placeholder="Tuliskan deskripsi singkat mengenai modul ini..."></textarea>
            </div>
          </div>

          <!-- ============ KOLOM KANAN: UPLOAD FILE ============ -->
          <div>
            <div class="upload-panel-label" id="uploadLabel">Upload File</div>

            <div class="dropzone" id="dropzone">
              <svg class="dropzone-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 18a4.5 4.5 0 0 1-1.4-8.8A5.5 5.5 0 0 1 16.3 7 4 4 0 0 1 17 15"/><path d="M12 12v8"/><path d="m9 15 3-3 3 3"/></svg>
              <div class="dropzone-title">Drag &amp; drop file di sini</div>
              <div class="dropzone-or">atau</div>
              <button type="button" class="dropzone-btn" id="chooseFileBtn">Pilih</button>
              <input type="file" id="fileInput" accept=".pdf,.docx,.pptx,.mp4,.mp3" hidden>
            </div>

            <div class="file-chip" id="fileChip">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>
              <span class="file-chip-name" id="fileChipName"></span>
              <button type="button" class="file-chip-remove" id="fileChipRemove" aria-label="Hapus file">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" aria-hidden="true"><path d="M18 6 6 18M6 6l12 12"/></svg>
              </button>
            </div>

            <p class="upload-hint" id="uploadHint">Format yang didukung: PDF, DOCX, PPTX, MP4, MP3</p>

            <!-- Muncul otomatis saat Kategori = salah satu Simulasi -->
            <div class="upload-skip-note" id="uploadSkipNote">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 8v5M12 16h.01"/></svg>
              <span>Upload file tidak diperlukan untuk kategori simulasi. Soal simulasi akan ditambahkan pada langkah berikutnya.</span>
            </div>
          </div>
        </div>

        <div class="form-actions">
          <a href="tutor-modul-pembelajaran.html" class="back-link">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 18l-6-6 6-6"/></svg>
            Kembali
          </a>
          <button type="submit" class="btn-next" id="nextBtn">
            Selanjutnya
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
          </button>
        </div>
      </form>
    </main>
  </div>
</div>

<script>
(function(){
  "use strict";

  /* ==================================================================
     CATATAN INTEGRASI BACKEND
     - Saat tombol "Selanjutnya" ditekan, data form (judul, level,
       kategori, deskripsi, file) di halaman ini belum benar-benar
       dikirim/disimpan ke server — TODO: kirim lewat
       fetch('/api/admin/modul', {method:'POST', body: formData}).
     - Halaman berikutnya (menambahkan soal) belum dibuat; tombol ini
       akan mengarah ke admin-modul-soal.html dengan detail modul
       diteruskan lewat query string sebagai contoh.
     - Sesuai ketentuan: kolom Upload File otomatis disembunyikan saat
       Kategori yang dipilih adalah salah satu Simulasi (Hören, Lesen,
       Schreiben, Sprechen), karena materi berkas hanya relevan untuk
       kategori Materi.
  ================================================================== */

  var kategoriSelect = document.getElementById('kategoriModul');
  var uploadLabel = document.getElementById('uploadLabel');
  var dropzone = document.getElementById('dropzone');
  var fileChip = document.getElementById('fileChip');
  var uploadHint = document.getElementById('uploadHint');
  var uploadSkipNote = document.getElementById('uploadSkipNote');
  var fileInput = document.getElementById('fileInput');
  var chooseFileBtn = document.getElementById('chooseFileBtn');
  var fileChipName = document.getElementById('fileChipName');
  var fileChipRemove = document.getElementById('fileChipRemove');
  var selectedFile = null;

  function isSimulasi(value){ return value.indexOf('Simulasi') === 0; }

  function updateUploadVisibility(){
    var value = kategoriSelect.value;
    var showUpload = value === 'Materi';
    var showSkipNote = isSimulasi(value);

    uploadLabel.style.display = showUpload ? 'block' : 'none';
    dropzone.style.display = showUpload ? 'flex' : 'none';
    uploadHint.style.display = showUpload ? 'block' : 'none';
    if (!showUpload) fileChip.classList.remove('show');
    else fileChip.classList.toggle('show', !!selectedFile);

    uploadSkipNote.classList.toggle('show', showSkipNote);
  }
  kategoriSelect.addEventListener('change', updateUploadVisibility);
  updateUploadVisibility();

  function setSelectedFile(file){
    selectedFile = file;
    if (file){
      fileChipName.textContent = file.name;
      fileChip.classList.add('show');
    } else {
      fileChip.classList.remove('show');
    }
  }

  chooseFileBtn.addEventListener('click', function(){ fileInput.click(); });
  fileInput.addEventListener('change', function(){
    if (fileInput.files && fileInput.files[0]) setSelectedFile(fileInput.files[0]);
  });
  fileChipRemove.addEventListener('click', function(){
    setSelectedFile(null);
    fileInput.value = '';
  });

  ['dragenter', 'dragover'].forEach(function(evt){
    dropzone.addEventListener(evt, function(e){
      e.preventDefault(); e.stopPropagation();
      dropzone.classList.add('is-dragover');
    });
  });
  ['dragleave', 'drop'].forEach(function(evt){
    dropzone.addEventListener(evt, function(e){
      e.preventDefault(); e.stopPropagation();
      dropzone.classList.remove('is-dragover');
    });
  });
  dropzone.addEventListener('drop', function(e){
    var files = e.dataTransfer && e.dataTransfer.files;
    if (files && files[0]) setSelectedFile(files[0]);
  });

  /* ---- Validasi form ---- */
  var form = document.getElementById('modulForm');
  var judulInput = document.getElementById('judulModul');
  var levelSelect = document.getElementById('levelModul');

  function setFieldError(inputId, errorId, show){
    document.getElementById(inputId).setAttribute('aria-invalid', show ? 'true' : 'false');
    document.getElementById(errorId).classList.toggle('show', show);
  }

  form.addEventListener('submit', function(e){
    e.preventDefault();

    var judulOk = judulInput.value.trim().length > 0;
    var levelOk = levelSelect.value !== '';
    var kategoriOk = kategoriSelect.value !== '';

    setFieldError('judulModul', 'judulError', !judulOk);
    setFieldError('levelModul', 'levelError', !levelOk);
    setFieldError('kategoriModul', 'kategoriError', !kategoriOk);

    if (!judulOk || !levelOk || !kategoriOk) return;

    // TODO: kirim data form (termasuk file jika kategori Materi) ke backend di sini.
    var params = new URLSearchParams({
      judul: judulInput.value.trim(),
      level: levelSelect.value,
      kategori: kategoriSelect.value
    });
    window.location.href = 'tutor-modul-soal.html?' + params.toString();
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
