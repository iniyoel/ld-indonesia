<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LD Indonesia</title>
<meta name="description" content="LD Indonesia">
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

.quiz-header{ margin-bottom: 20px; }
.quiz-header h1{ font-size: 1.45rem; margin-bottom: 6px; }
.quiz-header p{ color: var(--gray-500); font-size: 0.92rem; }

/* ============ QUIZ LAYOUT ============ */
.quiz-layout{ display: flex; gap: 24px; align-items: flex-start; }

.quiz-card{
  flex: 1 1 auto;
  min-width: 0;
  background: var(--white);
  border-radius: var(--radius-lg);
  box-shadow: var(--shadow-md);
  border: 1px solid var(--gray-100);
  padding: 30px 32px;
  display: flex;
  flex-direction: column;
  min-height: 500px;
}
.quiz-progress{
  color: var(--pink-dark);
  font-weight: 800;
  font-size: 0.95rem;
  margin-bottom: 16px;
}
.quiz-question{
  font-size: 1.12rem;
  color: var(--gray-800);
  font-weight: 500;
  margin-bottom: 26px;
}

.quiz-options{ display: flex; flex-direction: column; gap: 14px; }
.quiz-option{
  display: flex;
  align-items: center;
  gap: 16px;
  width: 100%;
  text-align: left;
  padding: 14px 18px;
  border: 1.5px solid var(--gray-200);
  border-radius: var(--radius-sm);
  transition: border-color 0.15s ease, background 0.15s ease;
}
.quiz-option:hover{ border-color: var(--pink); background: var(--pink-pale); }
.quiz-option-letter{
  width: 30px; height: 30px;
  flex-shrink: 0;
  border-radius: 8px;
  border: 1.5px solid var(--gray-300);
  display: flex; align-items: center; justify-content: center;
  font-weight: 800;
  font-size: 0.86rem;
  color: var(--navy-soft);
}
.quiz-option-text{ font-size: 0.98rem; color: var(--gray-800); }
.quiz-option.is-selected{
  border-color: var(--pink);
  background: var(--pink-pale);
  box-shadow: 0 0 0 3px var(--pink-light);
}
.quiz-option.is-selected .quiz-option-letter{
  background: var(--pink);
  border-color: var(--pink);
  color: var(--white);
}

.quiz-actions{
  margin-top: auto;
  padding-top: 26px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 14px;
  flex-wrap: wrap;
}
.mark-btn{
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 12px 22px;
  border-radius: var(--radius-pill);
  border: 1.5px solid var(--pink);
  color: var(--pink-dark);
  font-weight: 700;
  font-size: 0.92rem;
  background: var(--white);
}
.mark-btn:hover{ background: var(--pink-pale); }
.mark-btn svg{ width: 16px; height: 16px; }
.mark-btn.is-marked{ background: var(--amber-bg); border-color: var(--amber); color: var(--amber); }
.mark-btn.is-marked svg{ fill: var(--amber); }

.quiz-nav-actions{ display: flex; gap: 12px; }
.nav-btn{
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 12px 26px;
  border-radius: var(--radius-pill);
  font-weight: 700;
  font-size: 0.94rem;
}
.nav-btn svg{ width: 16px; height: 16px; }
.nav-btn-outline{ border: 1.5px solid var(--gray-200); color: var(--navy); background: var(--white); }
.nav-btn-outline:hover{ background: var(--gray-50); }
.nav-btn-primary{
  background: linear-gradient(135deg, var(--pink) 0%, var(--pink-dark) 100%);
  color: var(--white);
  box-shadow: 0 12px 28px rgba(236,78,140,0.22);
}
.nav-btn-primary:hover{ transform: translateY(-2px); }

/* ============ SIDEBAR SOAL ============ */
.quiz-sidebar{
  flex: 0 0 240px;
  background: var(--white);
  border-radius: var(--radius-lg);
  box-shadow: var(--shadow-md);
  border: 1px solid var(--gray-100);
  padding: 24px;
  position: sticky;
  top: calc(var(--topbar-h) + 24px);
}
.quiz-sidebar h2{ font-size: 1.05rem; margin-bottom: 18px; }
.soal-grid{
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 10px;
  margin-bottom: 22px;
}
.soal-btn{
  aspect-ratio: 1;
  border-radius: 10px;
  border: 1.5px solid var(--gray-200);
  background: var(--white);
  color: var(--navy);
  font-weight: 700;
  font-size: 0.92rem;
  display: flex; align-items: center; justify-content: center;
  transition: transform 0.12s ease;
}
.soal-btn:hover{ transform: translateY(-1px); }
.soal-btn.is-current{ box-shadow: 0 0 0 2.5px var(--pink); border-color: var(--pink); }
.soal-btn.is-answered{ background: var(--green-bg); border-color: var(--green-bg); color: var(--green); }
.soal-btn.is-marked{ background: var(--amber-bg); border-color: var(--amber-bg); color: var(--amber); }

.legend{ display: flex; flex-direction: column; gap: 10px; }
.legend-item{ display: flex; align-items: center; gap: 10px; font-size: 0.86rem; color: var(--gray-600); }
.legend-swatch{ width: 16px; height: 16px; border-radius: 4px; border: 1.5px solid var(--gray-200); flex-shrink: 0; }
.legend-swatch.answered{ background: var(--green-bg); border-color: var(--green-bg); }
.legend-swatch.marked{ background: var(--amber-bg); border-color: var(--amber-bg); }

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
  .quiz-layout{ flex-direction: column; }
  .quiz-sidebar{ flex: 1 1 auto; width: 100%; position: static; }
  .quiz-card{ padding: 22px 20px; }
}
@media (max-width: 640px){
  .user-meta{ display: none; }
  .quiz-actions{ flex-direction: column; align-items: stretch; }
  .quiz-nav-actions{ justify-content: stretch; }
  .quiz-nav-actions .nav-btn{ flex: 1; justify-content: center; }
}

/* =========================================================
   TIPE KHUSUS SIMULASI
   ========================================================= */

/* AUDIO HÖREN */
.question-audio {
    width: 100%;
    margin-bottom: 24px;
    padding: 16px;
    border-radius: 14px;
    background: var(--pink-pale);
    border: 1px solid var(--pink-light);
}

.question-audio audio {
    width: 100%;
}

/* GAMBAR PILIHAN HÖREN */
.quiz-option.is-image-option {
    align-items: center;
    min-height: 150px;
}

.quiz-option-content {
    display: flex;
    align-items: center;
    justify-content: center;
    flex: 1;
    min-height: 110px;
}

.quiz-option-content img {
    display: block;
    max-width: 220px;
    max-height: 140px;
    width: auto;
    height: auto;
    object-fit: contain;
    border-radius: 10px;
}

.question-audio {
    width: 100%;
    margin: 18px 0 22px;
    padding: 16px;
    background: var(--pink-pale);
    border: 1px solid var(--pink-light);
    border-radius: var(--radius-md);
}

.question-audio audio {
    width: 100%;
    display: block;
}

.quiz-option-content {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 120px;
}

.quiz-option-image {
    display: block;
    width: auto;
    max-width: 100%;
    max-height: 180px;
    object-fit: contain;
    border-radius: 10px;
}

/* TEKS BACAAN LESEN */
.reading-box {
    margin-bottom: 26px;
    padding: 20px;
    border-radius: 14px;
    background: #FAF9F7;
    border: 1px solid var(--gray-200);
}

.reading-box-title {
    font-family: var(--font-display);
    font-size: 1rem;
    font-weight: 800;
    color: var(--navy);
    margin-bottom: 12px;
}

.reading-box-text {
    font-size: 0.95rem;
    color: var(--gray-800);
    line-height: 1.75;
    white-space: pre-line;
}

/* SCHREIBEN */
.writing-box {
    margin-top: 8px;
}

.writing-box-label {
    display: block;
    margin-bottom: 10px;
    font-size: 0.9rem;
    font-weight: 700;
    color: var(--navy);
}

.writing-answer {
    width: 100%;
    min-height: 300px;
    resize: vertical;

    padding: 16px;

    border: 1.5px solid var(--gray-200);
    border-radius: 12px;

    background: var(--white);
    color: var(--gray-800);

    font-family: var(--font-body);
    font-size: 0.95rem;
    line-height: 1.7;

    transition:
        border-color 0.15s ease,
        box-shadow 0.15s ease;
}

.writing-answer:focus {
    outline: none;
    border-color: var(--pink);

    box-shadow:
        0 0 0 3px var(--pink-light);
}

.writing-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;

    margin-top: 8px;

    font-size: 0.82rem;
    color: var(--gray-500);
}

.writing-word-count {
    font-weight: 600;
}

/* SPRECHEN */
.speaking-box {
    padding: 22px;
    border-radius: 16px;
    background: var(--pink-pale);
    border: 1px solid var(--pink-light);
}

.speaking-title {
    font-family: var(--font-display);
    font-size: 1.05rem;
    font-weight: 800;
    color: var(--navy);
    margin-bottom: 12px;
}

.speaking-text {
    font-size: 0.95rem;
    line-height: 1.75;
    color: var(--gray-800);
    white-space: pre-line;
}

/* Untuk Sprechen tidak ada pilihan */
.quiz-options.is-non-interactive {
    margin-top: 0;
}

/* Mobile */
@media (max-width: 640px) {

    .quiz-option-content img {
        max-width: 160px;
        max-height: 110px;
    }

    .writing-answer {
        min-height: 220px;
    }
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
          <a href="{{ route('page', ['page' => 'dashboard-siswa']) }}" class="nav-link">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 11.5 12 4l9 7.5"/><path d="M5 10v10a1 1 0 0 0 1 1h4v-6h4v6h4a1 1 0 0 0 1-1V10"/></svg>
            Dashboard
          </a>
        </li>
        <li>
          <a href="{{ route('page', ['page' => 'modul-pembelajaran']) }}" class="nav-link active" aria-current="page">
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
          <strong>{{ Auth::user()->name }}</strong>
          <span>Siswa</span>
        </div>
        <div class="user-avatar" aria-hidden="true">M</div>
      </div>
    </header>

    <main class="page-content" id="mainContent">
      <a href="{{ route('page', ['page' => 'modul-pembelajaran']) }}" class="back-link">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 18l-6-6 6-6"/></svg>
        Kembali
      </a>
      <div class="quiz-header">
          <h1>{{ $module->judul }}</h1>

          <p>
              {{ $module->deskripsi }}
          </p>
      </div>
      <div class="quiz-layout">
        <!-- ============ KARTU SOAL ============ -->
        <section class="quiz-card" aria-label="Soal latihan">
          <p class="quiz-progress" id="quizProgress">Soal 1 dari 15</p>
          <div id="questionAudio" class="question-audio" hidden></div>
          <p class="quiz-question" id="quizQuestion"></p>
          <div class="quiz-options" id="quizOptions" role="radiogroup" aria-labelledby="quizQuestion"></div>

          <div class="quiz-actions">
            <button class="mark-btn" id="markBtn" type="button">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 21 12 16l-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"/></svg>
              <span id="markBtnLabel">Tandai</span>
            </button>

            <div class="quiz-nav-actions">
              <button class="nav-btn nav-btn-outline" id="prevBtn" type="button" hidden>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 18l-6-6 6-6"/></svg>
                Sebelumnya
              </button>
              <button class="nav-btn nav-btn-primary" id="nextBtn" type="button">
                <span id="nextBtnLabel">Selanjutnya</span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" id="nextBtnIcon"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
              </button>
            </div>
          </div>
        </section>

        <!-- ============ DAFTAR SOAL ============ -->
        <aside class="quiz-sidebar" aria-label="Daftar soal">
          <h2>Daftar Soal</h2>
          <div class="soal-grid" id="soalGrid"></div>
          <div class="legend">
            <div class="legend-item"><span class="legend-swatch"></span> Belum dijawab</div>
            <div class="legend-item"><span class="legend-swatch answered"></span> Sudah dijawab</div>
            <div class="legend-item"><span class="legend-swatch marked"></span> Ditandai</div>
          </div>
        </aside>
      </div>
    </main>
  </div>
</div>
@php
    $questionsData = $questions->map(function ($question) {
        return [
            'id' => $question->id,
            'type' => $question->tipe,
            'text' => $question->pertanyaan,
            'file_path' => $question->file_path,
            'file_type' => $question->file_type,
            'options' => $question->options
                ->sortBy('urutan_tampil')
                ->values()
                ->map(function ($option) {
                    return [
                        'id' => $option->id,
                        'text' => $option->teks,
                        'file_path' => $option->file_path,
                        'file_type' => $option->file_type,
                    ];
                })
                ->toArray(),
        ];
    })
    ->values()
    ->toArray();
@endphp
<script>
(function(){
    "use strict";

    var QUESTIONS = @json($questionsData);
    var MODULE_CATEGORY = @json($module->kategori);


    var LETTERS = ['A', 'B', 'C', 'D'];

    var state = {
        current: 0,
        answers: new Array(QUESTIONS.length).fill(null),
        marked: new Array(QUESTIONS.length).fill(false)
    };

    var quizProgress = document.getElementById('quizProgress');
    var quizQuestion = document.getElementById('quizQuestion');
    var quizOptions = document.getElementById('quizOptions');
    var soalGrid = document.getElementById('soalGrid');
    var markBtn = document.getElementById('markBtn');
    var markBtnLabel = document.getElementById('markBtnLabel');
    var prevBtn = document.getElementById('prevBtn');
    var nextBtn = document.getElementById('nextBtn');
    var nextBtnLabel = document.getElementById('nextBtnLabel');
    var nextBtnIcon = document.getElementById('nextBtnIcon');

    /*
     * Kalau belum ada soal
     */
    if (!QUESTIONS.length) {

        quizProgress.textContent = 'Belum ada soal';

        quizQuestion.textContent =
            'Belum ada soal yang tersedia untuk modul ini.';

        quizOptions.innerHTML = '';

        nextBtn.disabled = true;
        markBtn.disabled = true;

        soalGrid.innerHTML =
            '<p style="color:var(--gray-500);font-size:.9rem;">' +
            'Belum ada soal.' +
            '</p>';

        return;
    }

    function isMultipleChoiceCategory() {
    return MODULE_CATEGORY === 'simulasi_horen'
        || MODULE_CATEGORY === 'simulasi_lesen';
    } 

    function isSchreiben() {
        return MODULE_CATEGORY === 'simulasi_schreiben';
    }

    function isSprechen() {
        return MODULE_CATEGORY === 'simulasi_sprechen';
    }

function renderQuestion() {

    var idx = state.current;
    var q = QUESTIONS[idx];

    if (!q) {
        console.error('Question tidak ditemukan:', idx);
        return;
    }

    /*
    |--------------------------------------------------------------------------
    | NOMOR SOAL
    |--------------------------------------------------------------------------
    */

    quizProgress.textContent =
        'Soal ' + (idx + 1) + ' dari ' + QUESTIONS.length;


    /*
    |--------------------------------------------------------------------------
    | TEKS SOAL
    |--------------------------------------------------------------------------
    */

    quizQuestion.textContent =
        q.text || '';


    /*
    |--------------------------------------------------------------------------
    | AUDIO SOAL
    |--------------------------------------------------------------------------
    |
    | Untuk Hören:
    | q.file_path = lokasi audio
    | q.file_type = tipe file
    |
    | Audio berada di level QUESTION,
    | bukan di dalam OPTION.
    |--------------------------------------------------------------------------
    */

    var oldAudio =
        document.getElementById('quizAudio');

    if (oldAudio) {
        oldAudio.remove();
    }


    /*
    |--------------------------------------------------------------------------
    | CEK AUDIO
    |--------------------------------------------------------------------------
    */

    var isAudio =
        q.file_path &&
        (
            q.file_type === 'audio' ||
            q.file_type === 'audio/mpeg' ||
            q.file_type === 'audio/mp3' ||
            q.file_type === 'audio/wav' ||
            q.file_type === 'audio/x-wav' ||
            q.file_type === 'audio/m4a' ||
            q.file_type === 'audio/x-m4a' ||
            q.file_type === 'mp3' ||
            q.file_type === 'wav' ||
            q.file_type === 'm4a'
        );


    if (isAudio) {

        var audioWrapper =
            document.createElement('div');

        audioWrapper.id =
            'quizAudio';

        audioWrapper.className =
            'quiz-audio-wrapper';


        var audio =
            document.createElement('audio');

        audio.controls = true;

        audio.preload = 'metadata';

        audio.className =
            'quiz-audio-player';


        /*
         * file_path dari database.
         *
         * Contoh:
         *
         * simulasi-horen/audio/abc.mp3
         *
         * menjadi:
         *
         * /storage/simulasi-horen/audio/abc.mp3
         */

        var audioSrc =
            "{{ asset('storage') }}/" +
            String(q.file_path)
                .replace(/^\/+/, '');


        audio.src = audioSrc;


        audioWrapper.appendChild(audio);


        /*
         * Audio diletakkan SETELAH teks soal.
         */

        quizQuestion.insertAdjacentElement(
            'afterend',
            audioWrapper
        );


        console.log(
            'AUDIO SOAL:',
            audioSrc
        );

    }


    /*
    |--------------------------------------------------------------------------
    | RESET PILIHAN
    |--------------------------------------------------------------------------
    */

    quizOptions.innerHTML = '';

    if (isSchreiben()) {

        var writingBox = document.createElement('div');
        writingBox.className = 'writing-box';

        var label = document.createElement('label');
        label.className = 'writing-box-label';
        label.textContent = 'Jawaban Anda';

        var textarea = document.createElement('textarea');

        textarea.className = 'writing-answer';
        textarea.placeholder =
            'Tuliskan jawaban Anda dalam bahasa Jerman...';

        textarea.value =
            state.answers[idx] || '';

        var meta = document.createElement('div');
        meta.className = 'writing-meta';

        var hint = document.createElement('span');
        hint.textContent =
            'Tulis jawaban sesuai instruksi pada soal.';

        var counter = document.createElement('span');
        counter.className = 'writing-word-count';

        function updateWordCount() {

            var text = textarea.value.trim();

            var words = text
                ? text.split(/\s+/).filter(Boolean).length
                : 0;

            counter.textContent =
                words + ' kata';
        }

        textarea.addEventListener('input', function() {

            state.answers[idx] =
                textarea.value;

            updateWordCount();
            renderGrid();
        });

        updateWordCount();

        meta.appendChild(hint);
        meta.appendChild(counter);

        writingBox.appendChild(label);
        writingBox.appendChild(textarea);
        writingBox.appendChild(meta);

        quizOptions.appendChild(writingBox);

        /*
        * Schreiben tidak menggunakan pilihan A/B/C/D.
        */
        markBtn.classList.toggle(
            'is-marked',
            state.marked[idx]
        );

        markBtnLabel.textContent =
            state.marked[idx]
                ? 'Ditandai'
                : 'Tandai';

        prevBtn.hidden = idx === 0;

        var isLastSchreiben =
            idx === QUESTIONS.length - 1;

        nextBtnLabel.textContent =
            isLastSchreiben
                ? 'Selesai'
                : 'Selanjutnya';

        nextBtnIcon.innerHTML =
            isLastSchreiben
                ? '<path d="M20 6 9 17l-5-5"/>'
                : '<path d="M5 12h14M13 6l6 6-6 6"/>';

        return;
    }


    /*
    |--------------------------------------------------------------------------
    | RENDER PILIHAN
    |--------------------------------------------------------------------------
    */

    if (
        !Array.isArray(q.options) ||
        q.options.length === 0
    ) {

        console.warn(
            'Soal tidak memiliki pilihan:',
            q
        );

    } else {

        q.options.forEach(function(option, i) {

            var btn =
                document.createElement('button');


            btn.type =
                'button';


            /*
             * PENTING:
             * state.answers menyimpan option.id,
             * bukan index.
             */

            var isSelected =
                state.answers[idx] === option.id;


            btn.className =
                'quiz-option' +
                (
                    isSelected
                        ? ' is-selected'
                        : ''
                );


            btn.setAttribute(
                'role',
                'radio'
            );


            btn.setAttribute(
                'aria-checked',
                isSelected
                    ? 'true'
                    : 'false'
            );


            /*
            |--------------------------------------------------------------------------
            | ISI PILIHAN
            |--------------------------------------------------------------------------
            */

            var content = '';


            /*
             * HURUF A / B / C / D
             */

            content +=
                '<span class="quiz-option-letter">' +
                LETTERS[i] +
                '</span>';


            /*
            |--------------------------------------------------------------------------
            | PILIHAN GAMBAR
            |--------------------------------------------------------------------------
            */

            if (
                option.file_path &&
                (
                    option.file_type === 'image' ||
                    option.file_type === 'image/jpeg' ||
                    option.file_type === 'image/png' ||
                    option.file_type === 'image/webp' ||
                    option.file_type === 'jpg' ||
                    option.file_type === 'jpeg' ||
                    option.file_type === 'png' ||
                    option.file_type === 'webp'
                )
            ) {

                var imageSrc =
                    "{{ asset('storage') }}/" +
                    String(option.file_path)
                        .replace(/^\/+/, '');


                content +=
                    '<span class="quiz-option-content">' +

                        '<img ' +
                            'src="' +
                            imageSrc +
                            '" ' +
                            'alt="Pilihan ' +
                            LETTERS[i] +
                            '" ' +
                            'class="quiz-option-image"' +
                        '>' +

                    '</span>';


                console.log(
                    'GAMBAR PILIHAN ' +
                    LETTERS[i] +
                    ':',
                    imageSrc
                );


            } else {

                /*
                |--------------------------------------------------------------------------
                | PILIHAN TEKS
                |--------------------------------------------------------------------------
                */

                content +=
                    '<span class="quiz-option-text">' +
                    escapeHtml(
                        option.text || ''
                    ) +
                    '</span>';
            }


            /*
            |--------------------------------------------------------------------------
            | MASUKKAN KE BUTTON
            |--------------------------------------------------------------------------
            */

            btn.innerHTML =
                content;


            /*
            |--------------------------------------------------------------------------
            | CLICK PILIHAN
            |--------------------------------------------------------------------------
            */

            btn.addEventListener(
                'click',
                function() {

                    /*
                     * Simpan ID option.
                     */

                    state.answers[idx] =
                        option.id;


                    /*
                     * Render ulang.
                     */

                    renderQuestion();

                    renderGrid();

                }
            );


            /*
            |--------------------------------------------------------------------------
            | MASUKKAN BUTTON KE CONTAINER
            |--------------------------------------------------------------------------
            */

            quizOptions.appendChild(btn);

        });

    }


    /*
    |--------------------------------------------------------------------------
    | TANDAI
    |--------------------------------------------------------------------------
    */

    markBtn.classList.toggle(
        'is-marked',
        state.marked[idx]
    );


    markBtnLabel.textContent =
        state.marked[idx]
            ? 'Ditandai'
            : 'Tandai';


    /*
    |--------------------------------------------------------------------------
    | TOMBOL SEBELUMNYA
    |--------------------------------------------------------------------------
    */

    prevBtn.hidden =
        idx === 0;


    /*
    |--------------------------------------------------------------------------
    | TOMBOL SELANJUTNYA
    |--------------------------------------------------------------------------
    */

    var isLast =
        idx === QUESTIONS.length - 1;


    nextBtnLabel.textContent =
        isLast
            ? 'Selesai'
            : 'Selanjutnya';


    nextBtnIcon.innerHTML =
        isLast
            ? '<path d="M20 6 9 17l-5-5"/>'
            : '<path d="M5 12h14M13 6l6 6-6 6"/>';
}

    function escapeHtml(value) {

        return String(value)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }

    function renderGrid() {

        soalGrid.innerHTML = '';

        QUESTIONS.forEach(function(q, i) {

            var btn = document.createElement('button');

            btn.type = 'button';

            btn.textContent = i + 1;

            btn.setAttribute(
                'aria-label',
                'Ke soal ' + (i + 1)
            );

            var classes = ['soal-btn'];

            if (i === state.current) {
                classes.push('is-current');
            }

            if (MODULE_CATEGORY === 'simulasi_sprechen') {

                /*
                * Sprechen tidak memiliki jawaban.
                * Grid hanya menunjukkan soal aktif.
                */

            } else if (state.marked[i]) {

                classes.push('is-marked');

            } else if (state.answers[i] !== null) {

                classes.push('is-answered');

            }

            btn.className = classes.join(' ');

            btn.addEventListener('click', function() {

                state.current = i;

                renderQuestion();
                renderGrid();

            });

            soalGrid.appendChild(btn);
        });
    }

    markBtn.addEventListener('click', function() {

        state.marked[state.current] =
            !state.marked[state.current];

        renderQuestion();
        renderGrid();
    });

    prevBtn.addEventListener('click', function() {

        if (state.current > 0) {

            state.current--;

            renderQuestion();
            renderGrid();
        }
    });

    nextBtn.addEventListener('click', function() {

        var isLast =
            state.current === QUESTIONS.length - 1;

          if (isLast) {

              nextBtn.disabled = true;
              nextBtnLabel.textContent = 'Menyimpan...';

              fetch('{{ route('siswa.modul.finish', $module) }}', {
                  method: 'POST',
                  headers: {
                      'X-CSRF-TOKEN': '{{ csrf_token() }}',
                      'Accept': 'application/json',
                      'Content-Type': 'application/json'
                  },
                  body: JSON.stringify({
                      answers: state.answers,
                      marked: state.marked
                  })
              })
              .then(async function(response) {

                  const data = await response.json();

                  if (!response.ok) {
                      throw new Error(
                          data.message || 'Gagal menyelesaikan pengerjaan.'
                      );
                  }

                  return data;
              })
              .then(function(data) {

                  window.location.href = data.result_url;

              })
              .catch(function(error) {

                  console.error(error);

                  alert(
                      error.message ||
                      'Terjadi kesalahan saat menyelesaikan modul.'
                  );

                  nextBtn.disabled = false;
                  nextBtnLabel.textContent = 'Selesai';
              });

          } else {

              state.current++;
              renderQuestion();
              renderGrid();

          }
    });

    renderQuestion();
    renderGrid();

})();
</script>
</body>
</html>
