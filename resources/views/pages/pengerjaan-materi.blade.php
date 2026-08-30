<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LD Indonesia</title>
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
  <x-sidebar.siswa />

  <!-- ============ MAIN ============ -->
  <div class="main-col">
    <x-header.siswa />

    <main class="page-content" id="mainContent">
      <a
          href="{{ route('page', ['page' => 'modul-pembelajaran']) }}"
          class="back-link">
          <svg
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2.4"
              stroke-linecap="round"
              stroke-linejoin="round"
              aria-hidden="true"
          >
              <path d="M15 18l-6-6 6-6"/>
          </svg>

          Kembali
      </a>

      <section class="materi-panel" aria-labelledby="materiTitle">
          {{-- ==============================
              JUDUL MODUL
          =============================== --}}
          <h1 id="materiTitle">
              {{ $module->judul }}
          </h1>

          {{-- ==============================
              DESKRIPSI MODUL
          =============================== --}}
          <p class="materi-desc">
              {{ $module->deskripsi }}
          </p>


          {{-- ==============================
              KATEGORI
          =============================== --}}
          <div style="
              display: inline-flex;
              align-items: center;
              gap: 8px;
              margin-bottom: 24px;
              padding: 7px 14px;
              border-radius: 999px;
              background: var(--pink-light);
              color: var(--pink-dark);
              font-size: .82rem;
              font-weight: 700;
          ">

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

          </div>


          {{-- =====================================================
              JIKA MATERI → TAMPILKAN PDF
              JIKA SIMULASI → TIDAK TAMPILKAN PDF
          ====================================================== --}}

          @if($module->kategori === 'materi')

              @if($module->file_path)

                  <div class="pdf-viewer">

                      {{-- ==============================
                          PDF TOOLBAR
                      =============================== --}}
                      <div class="pdf-toolbar">

                          <span class="pdf-toolbar-label">
                              Dokumen Materi
                          </span>

                          <div class="pdf-toolbar-spacer"></div>

                          {{-- Buka PDF di tab baru --}}
                          <a
                              href="{{ asset('storage/' . $module->file_path) }}"
                              target="_blank"
                              rel="noopener noreferrer"
                              class="pdf-tool-btn"
                              aria-label="Buka PDF"
                              title="Buka PDF"
                          >
                              <svg
                                  viewBox="0 0 24 24"
                                  fill="none"
                                  stroke="currentColor"
                                  stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                              >
                                  <path d="M14 3h7v7"/>
                                  <path d="M10 14 21 3"/>
                                  <path d="M21 14v5a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5"/>
                              </svg>
                          </a>

                          {{-- Download PDF --}}
                          <a
                              href="{{ asset('storage/' . $module->file_path) }}"
                              download
                              class="pdf-tool-btn"
                              aria-label="Unduh PDF"
                              title="Unduh PDF"
                          >
                              <svg
                                  viewBox="0 0 24 24"
                                  fill="none"
                                  stroke="currentColor"
                                  stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                              >
                                  <path d="M12 3v13"/>
                                  <path d="m7 11 5 5 5-5"/>
                                  <path d="M5 21h14"/>
                              </svg>
                          </a>

                      </div>


                      {{-- ==============================
                          PDF ASLI DARI DATABASE
                      =============================== --}}
                      <div
                          class="pdf-page-area"
                          style="
                              padding: 0;
                              background: var(--gray-100);
                          "
                      >

                          <iframe
                              src="{{ asset('storage/' . $module->file_path) }}"
                              title="PDF {{ $module->judul }}"
                              style="
                                  width: 100%;
                                  height: 750px;
                                  border: none;
                                  display: block;
                                  background: white;
                              "
                          ></iframe>
                      </div>
                  </div>
              @else
                  <div style="
                      padding: 20px;
                      border-radius: 12px;
                      background: var(--amber-bg);
                      color: var(--amber);
                      font-weight: 600;
                  ">
                      File PDF untuk materi ini belum tersedia.
                  </div>
              @endif
          @else
              {{-- =================================================
                  SIMULASI
                  HANYA JUDUL + DESKRIPSI
              ================================================== --}}
              <div style="
                  padding: 28px;
                  border-radius: var(--radius-md);
                  background: var(--pink-pale);
                  border: 1px solid var(--pink-light);
              ">
                  <div style="
                      display: flex;
                      align-items: center;
                      gap: 14px;
                      margin-bottom: 16px;
                  ">
                      <div style="
                          width: 44px;
                          height: 44px;
                          border-radius: 12px;
                          background: var(--white);
                          display: flex;
                          align-items: center;
                          justify-content: center;
                          color: var(--pink-dark);
                          flex-shrink: 0;
                      ">
                          <svg
                              viewBox="0 0 24 24"
                              fill="none"
                              stroke="currentColor"
                              stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              width="22"
                              height="22"
                          >
                              <path d="M12 6v12"/>
                              <path d="M6 12h12"/>
                          </svg>
                      </div>
                      <div>
                          <strong style="
                              display: block;
                              color: var(--navy);
                              font-size: 1rem;
                          ">
                              Informasi Simulasi
                          </strong>

                          <span style="
                              color: var(--gray-500);
                              font-size: .86rem;
                          ">
                              Modul simulasi tidak menggunakan file PDF.
                          </span>
                      </div>
                  </div>
                  <p style="
                      color: var(--gray-700, #3A362F);
                      line-height: 1.7;
                      margin: 0;
                  ">
                      {{ $module->deskripsi }}
                  </p>
              </div>
          @endif
        <div class="materi-footer">
          <a
              class="btn-continue"
              href="{{ route('siswa.modul.questions', ['module' => $module->id]) }}"
          >
              Lanjut ke Latihan
              <svg
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2.4"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  aria-hidden="true"
              >
                  <path d="M5 12h14M13 6l6 6-6 6"/>
              </svg>
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
})();
</script>
</body>
</html>
