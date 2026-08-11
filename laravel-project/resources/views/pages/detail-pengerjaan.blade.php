<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Detail Pengerjaan — Artikel Das — LD Indonesia</title>
<meta name="description" content="Detail hasil pengerjaan latihan soal siswa — LD Indonesia.">
<meta name="robots" content="noindex, nofollow">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
:root{
  --navy:#1E2A47; --navy-soft:#435172; --pink:#EC4E8C; --pink-dark:#D63D79;
  --pink-light:#FDEAF1; --pink-pale:#FFF4F8; --purple:#7C6FE0; --gold:#D4A017; --maroon:#5C3620;
  --green:#2C9E6C; --green-bg:#DEF4E8; --green-border:#B7E4CB;
  --red:#D6444F; --red-bg:#FCE7E8; --red-border:#F3BFC4;
  --gray-50:#FAF9F7; --gray-100:#F3F1EE; --gray-200:#E7E4E0; --gray-300:#D8D4CE;
  --gray-400:#9B9691; --gray-500:#7C776F; --gray-600:#6B675F; --gray-800:#3A362F; --white:#FFFFFF;
  --font-display:'Baloo 2','Inter',sans-serif; --font-body:'Inter',sans-serif;
  --radius-sm:10px; --radius-md:16px; --radius-lg:20px; --radius-pill:999px;
  --shadow-sm:0 2px 8px rgba(30,42,71,0.06); --shadow-md:0 10px 30px rgba(30,42,71,0.08);
  --sidebar-w:268px; --topbar-h:96px;
}
body{ font-family:var(--font-body); color:var(--gray-800); background:var(--gray-50); line-height:1.55; -webkit-font-smoothing:antialiased; }
img, svg{ display:block; max-width:100%; }
a{ color:inherit; text-decoration:none; }
button{ font:inherit; cursor:pointer; border:none; background:none; }
:focus-visible{ outline:3px solid var(--purple); outline-offset:2px; border-radius:4px; }
h1, h2{ font-family:var(--font-display); color:var(--navy); font-weight:700; }
.skip-link{ position:absolute; left:-999px; top:0; background:var(--navy); color:#fff; padding:12px 20px; z-index:300; border-radius:0 0 8px 0; }
.skip-link:focus{ left:0; }
@media (prefers-reduced-motion: reduce){ *, *::before, *::after{ animation-duration:0.001ms !important; transition-duration:0.001ms !important; } }

.app-shell{ display:flex; min-height:100vh; }
.sidebar{ width:var(--sidebar-w); flex-shrink:0; background:linear-gradient(180deg, var(--pink-pale) 0%, #FDF1F6 100%); border-right:1px solid var(--gray-200); display:flex; flex-direction:column; position:sticky; top:0; height:100vh; z-index:60; }
.sidebar-brand{ display:flex; align-items:center; gap:10px; padding:26px 24px; border-bottom:1px solid rgba(30,42,71,0.06); }
.brand-mark{ width:40px; height:40px; flex-shrink:0; }
.brand-text{ display:flex; flex-direction:column; line-height:1.15; }
.brand-text strong{ font-family:var(--font-display); font-weight:800; font-size:1.02rem; color:var(--navy); }
.brand-text strong span{ color:var(--pink); }
.brand-text small{ font-size:0.66rem; color:var(--gray-600); font-weight:500; }
.sidebar-nav{ flex-grow:1; padding:20px 16px; }
.sidebar-nav ul{ list-style:none; display:flex; flex-direction:column; gap:6px; }
.nav-link{ display:flex; align-items:center; gap:14px; padding:13px 16px; border-radius:var(--radius-sm); font-weight:700; font-size:0.96rem; color:var(--navy-soft); transition:background 0.15s ease, color 0.15s ease; }
.nav-link svg{ width:21px; height:21px; flex-shrink:0; }
.nav-link:hover{ background:rgba(236,78,140,0.08); color:var(--pink-dark); }
.nav-link.active{ background:var(--white); color:var(--pink-dark); box-shadow:var(--shadow-sm); }
.sidebar-footer{ padding:20px 16px 26px; border-top:1px solid rgba(30,42,71,0.06); }
.logout-link{ display:flex; align-items:center; gap:14px; padding:13px 16px; border-radius:var(--radius-sm); font-weight:700; font-size:0.96rem; color:var(--navy-soft); }
.logout-link:hover{ background:rgba(224,72,63,0.08); color:#C8392F; }
.logout-link svg{ width:21px; height:21px; }
.sidebar-close{ display:none; }
.main-col{ flex-grow:1; min-width:0; display:flex; flex-direction:column; }

.topbar{ height:var(--topbar-h); display:flex; align-items:center; justify-content:flex-end; gap:16px; padding:0 40px; background:linear-gradient(115deg, #FCEFD9 0%, #FDE4EE 55%, #FBCFE0 100%); position:sticky; top:0; z-index:40; }
.menu-toggle{ display:none; width:40px; height:40px; align-items:center; justify-content:center; border-radius:var(--radius-sm); margin-right:auto; color:var(--navy); }
.menu-toggle:hover{ background:rgba(255,255,255,0.5); }
.user-summary{ display:flex; align-items:center; gap:14px; }
.user-meta{ text-align:right; line-height:1.25; }
.user-meta strong{ display:block; font-size:1.02rem; color:var(--navy); font-weight:800; }
.user-meta span{ font-size:0.84rem; color:var(--gray-600); font-weight:600; }
.user-avatar{ width:52px; height:52px; border-radius:50%; background:var(--white); border:2px solid var(--pink); display:flex; align-items:center; justify-content:center; font-family:var(--font-display); font-weight:800; font-size:1.15rem; color:var(--pink-dark); flex-shrink:0; }

.page-content{ padding:32px 40px 60px; max-width:1240px; width:100%; margin:0 auto; }

.back-link{ display:inline-flex; align-items:center; gap:8px; padding:10px 18px; border-radius:var(--radius-pill); border:1.5px solid var(--pink-light); color:var(--pink-dark); font-weight:700; font-size:0.9rem; margin-bottom:18px; }
.back-link:hover{ background:var(--pink-pale); }
.back-link svg{ width:16px; height:16px; }

.result-panel{ background:var(--white); border-radius:var(--radius-lg); box-shadow:var(--shadow-md); border:1px solid var(--gray-100); padding:26px 28px; }
.result-head{ display:flex; align-items:flex-start; justify-content:space-between; gap:16px; flex-wrap:wrap; margin-bottom:8px; }
.result-head h1{ font-size:1.5rem; }
.score-chip{ background:var(--green-bg); color:var(--green); font-family:var(--font-display); font-weight:800; font-size:1.1rem; padding:8px 20px; border-radius:var(--radius-pill); white-space:nowrap; }
.result-desc{ color:var(--gray-500); font-size:0.9rem; margin-bottom:22px; }

.quiz-layout{ display:flex; gap:24px; align-items:flex-start; }
.quiz-card{ flex:1 1 auto; min-width:0; background:var(--white); border:1px solid var(--gray-100); border-radius:var(--radius-md); padding:26px 28px; display:flex; flex-direction:column; min-height:480px; }
.quiz-progress{ color:var(--pink-dark); font-weight:800; font-size:0.95rem; margin-bottom:16px; }
.quiz-question{ font-size:1.12rem; color:var(--gray-800); font-weight:500; margin-bottom:22px; }

.quiz-options{ display:flex; flex-direction:column; gap:14px; margin-bottom:22px; }
.quiz-option{ display:flex; align-items:center; gap:16px; width:100%; padding:14px 18px; border:1.5px solid var(--gray-200); border-radius:var(--radius-sm); }
.quiz-option-letter{ width:30px; height:30px; flex-shrink:0; border-radius:8px; border:1.5px solid var(--gray-300); display:flex; align-items:center; justify-content:center; font-weight:800; font-size:0.86rem; color:var(--navy-soft); }
.quiz-option-text{ font-size:0.98rem; color:var(--gray-800); flex-grow:1; }
.quiz-option-tag{ font-size:0.76rem; font-weight:800; padding:4px 10px; border-radius:var(--radius-pill); white-space:nowrap; }

.quiz-option.is-correct{ border-color:var(--green-border); background:var(--green-bg); }
.quiz-option.is-correct .quiz-option-letter{ background:var(--green); border-color:var(--green); color:var(--white); }
.quiz-option.is-correct .quiz-option-text{ color:var(--green); font-weight:700; }
.quiz-option.is-correct .quiz-option-tag{ background:var(--green); color:var(--white); }

.quiz-option.is-wrong-selected{ border-color:var(--red-border); background:var(--red-bg); }
.quiz-option.is-wrong-selected .quiz-option-letter{ background:var(--red); border-color:var(--red); color:var(--white); }
.quiz-option.is-wrong-selected .quiz-option-text{ color:var(--red); font-weight:700; }
.quiz-option.is-wrong-selected .quiz-option-tag{ background:var(--red); color:var(--white); }

.explanation-box{
  background:var(--pink-pale); border:1px solid var(--pink-light); border-radius:var(--radius-sm);
  padding:16px 20px; display:flex; gap:12px;
}
.explanation-box svg{ width:20px; height:20px; color:var(--pink-dark); flex-shrink:0; margin-top:2px; }
.explanation-title{ font-weight:800; font-size:0.88rem; color:var(--navy); margin-bottom:4px; }
.explanation-text{ font-size:0.9rem; color:var(--gray-600); line-height:1.6; }

.quiz-actions{ margin-top:auto; padding-top:24px; display:flex; align-items:center; justify-content:flex-end; gap:12px; flex-wrap:wrap; }
.nav-btn{ display:inline-flex; align-items:center; gap:8px; padding:12px 26px; border-radius:var(--radius-pill); font-weight:700; font-size:0.94rem; }
.nav-btn svg{ width:16px; height:16px; }
.nav-btn-outline{ border:1.5px solid var(--gray-200); color:var(--navy); background:var(--white); }
.nav-btn-outline:hover{ background:var(--gray-50); }
.nav-btn-primary{ background:linear-gradient(135deg, var(--pink) 0%, var(--pink-dark) 100%); color:var(--white); box-shadow:0 12px 28px rgba(236,78,140,0.22); }
.nav-btn-primary:hover{ transform:translateY(-2px); }

.quiz-sidebar{ flex:0 0 240px; background:var(--white); border:1px solid var(--gray-100); border-radius:var(--radius-md); padding:24px; position:sticky; top:calc(var(--topbar-h) + 24px); }
.quiz-sidebar h2{ font-size:1.05rem; margin-bottom:18px; }
.soal-grid{ display:grid; grid-template-columns:repeat(3, 1fr); gap:10px; margin-bottom:22px; }
.soal-btn{ aspect-ratio:1; border-radius:10px; border:1.5px solid var(--gray-200); background:var(--white); color:var(--navy); font-weight:700; font-size:0.92rem; display:flex; align-items:center; justify-content:center; }
.soal-btn.is-current{ box-shadow:0 0 0 2.5px var(--pink); border-color:var(--pink); }
.soal-btn.is-correct{ background:var(--green-bg); border-color:var(--green-bg); color:var(--green); }
.soal-btn.is-wrong{ background:var(--red-bg); border-color:var(--red-bg); color:var(--red); }
.legend{ display:flex; flex-direction:column; gap:10px; }
.legend-item{ display:flex; align-items:center; gap:10px; font-size:0.86rem; color:var(--gray-600); }
.legend-swatch{ width:16px; height:16px; border-radius:4px; border:1.5px solid var(--gray-200); flex-shrink:0; }
.legend-swatch.correct{ background:var(--green-bg); border-color:var(--green-bg); }
.legend-swatch.wrong{ background:var(--red-bg); border-color:var(--red-bg); }

@media (max-width:980px){
  .sidebar{ position:fixed; left:0; top:0; transform:translateX(-100%); transition:transform 0.22s ease; box-shadow:var(--shadow-md); }
  .sidebar.open{ transform:translateX(0); }
  .sidebar-close{ display:flex; align-items:center; justify-content:center; width:34px; height:34px; border-radius:8px; margin-left:auto; color:var(--navy); }
  .sidebar-close:hover{ background:rgba(30,42,71,0.06); }
  .sidebar-brand{ justify-content:space-between; }
  .menu-toggle{ display:flex; }
  .topbar{ padding:0 20px; }
  .page-content{ padding:24px 20px 48px; }
  .backdrop{ display:none; position:fixed; inset:0; background:rgba(30,42,71,0.35); z-index:50; }
  .backdrop.show{ display:block; }
  .quiz-layout{ flex-direction:column; }
  .quiz-sidebar{ flex:1 1 auto; width:100%; position:static; }
  .quiz-card{ padding:22px 18px; }
  .result-panel{ padding:20px 16px; }
}
@media (max-width:640px){ .user-meta{ display:none; } }
</style>
</head>
<body>
<a href="#mainContent" class="skip-link">Langsung ke konten utama</a>
<div class="app-shell">
  <div class="backdrop" id="backdrop"></div>
  <aside class="sidebar" id="sidebar" aria-label="Navigasi utama">
    <div class="sidebar-brand">
      <a href="dashboard-siswa.html" style="display:flex;align-items:center;gap:10px;" aria-label="LD Indonesia — Dashboard">
        <svg class="brand-mark" viewBox="0 0 48 48" fill="none" aria-hidden="true">
          <path d="M24 4c-6 0-10 5-10 5s3 1 4 4c-3-1-6 0-7 3 3 0 5 1 6 3-3 1-5 3-5 6 3-1 5-1 7 0-1 3 0 6 2 8 1-3 2-5 3-6 1 1 2 3 3 6 2-2 3-5 2-8 2-1 4-1 7 0 0-3-2-5-5-6 1-2 3-3 6-3-1-3-4-4-7-3 1-3 4-4 4-4s-4-5-10-5z" fill="var(--maroon)"/>
          <circle cx="24" cy="17" r="4" fill="var(--gold)"/>
        </svg>
        <span class="brand-text"><strong>LD <span>INDONESIA</span></strong><small>Privat Bahasa Jerman</small></span>
      </a>
      <button class="sidebar-close" id="sidebarClose" aria-label="Tutup menu">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true"><path d="M18 6 6 18M6 6l12 12"/></svg>
      </button>
    </div>
    <nav class="sidebar-nav">
      <ul>
        <li><a href="dashboard-siswa.html" class="nav-link" id="navDashboard"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 11.5 12 4l9 7.5"/><path d="M5 10v10a1 1 0 0 0 1 1h4v-6h4v6h4a1 1 0 0 0 1-1V10"/></svg>Dashboard</a></li>
        <li><a href="modul-pembelajaran.html" class="nav-link"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 5.5C2 4.7 2.7 4 4.7 4c2.6 0 5.3 1 7.3 2.5C14 4.9 16.7 4 19.3 4c2 0 2.7.7 2.7 1.5v13c0-.8-.7-1.5-2.7-1.5-2.6 0-5.3.9-7.3 2.5-2-1.6-4.7-2.5-7.3-2.5C2.7 17 2 17.7 2 18.5z"/><path d="M12 6.5V20"/></svg>Modul Pembelajaran</a></li>
        <li><a href="performa-siswa.html" class="nav-link active" id="navPerforma" aria-current="page"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 3v18h18"/><rect x="7" y="12" width="3" height="6"/><rect x="12.5" y="8" width="3" height="10"/><rect x="18" y="5" width="3" height="13"/></svg>Performa Siswa</a></li>
      </ul>
    </nav>
    <div class="sidebar-footer">
      <a href="keluar.html" class="logout-link"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><path d="M16 17l5-5-5-5"/><path d="M21 12H9"/></svg>Keluar</a>
    </div>
  </aside>

  <div class="main-col">
    <header class="topbar">
      <button class="menu-toggle" id="menuToggle" aria-label="Buka menu navigasi" aria-expanded="false" aria-controls="sidebar">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" aria-hidden="true"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
      </button>
      <div class="user-summary">
        <div class="user-meta"><strong>Maria Sitanggang</strong><span>Siswa</span></div>
        <div class="user-avatar" aria-hidden="true">M</div>
      </div>
    </header>

    <main class="page-content" id="mainContent">
      <a href="performa-siswa.html" class="back-link" id="backLink">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 18l-6-6 6-6"/></svg>
        Kembali
      </a>

      <section class="result-panel" aria-labelledby="resultTitle">
        <div class="result-head">
          <h1 id="resultTitle">Artikel Das</h1>
          <span class="score-chip" id="scoreChip">Nilai: 80</span>
        </div>
        <p class="result-desc">Hasil pengerjaan latihan soal — lihat jawabanmu dan jawaban yang benar untuk tiap soal di bawah ini.</p>

        <div class="quiz-layout">
          <section class="quiz-card" aria-label="Detail jawaban soal">
            <p class="quiz-progress" id="quizProgress">Soal 1 dari 15</p>
            <p class="quiz-question" id="quizQuestion"></p>

            <div class="quiz-options" id="quizOptions"></div>

            <div class="explanation-box">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M9.5 9a2.5 2.5 0 0 1 5 0c0 1.5-2 1.8-2 3.5"/><path d="M12 17h.01"/></svg>
              <div>
                <div class="explanation-title">Kenapa jawaban ini benar?</div>
                <div class="explanation-text" id="explanationText"></div>
              </div>
            </div>

            <div class="quiz-actions">
              <button class="nav-btn nav-btn-outline" id="prevBtn" type="button" hidden>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 18l-6-6 6-6"/></svg>
                Sebelumnya
              </button>
              <button class="nav-btn nav-btn-primary" id="nextBtn" type="button">
                <span id="nextBtnLabel">Selanjutnya</span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" id="nextBtnIcon"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
              </button>
            </div>
          </section>

          <aside class="quiz-sidebar" aria-label="Daftar soal">
            <h2>Daftar Soal</h2>
            <div class="soal-grid" id="soalGrid"></div>
            <div class="legend">
              <div class="legend-item"><span class="legend-swatch correct"></span> Jawaban benar</div>
              <div class="legend-item"><span class="legend-swatch wrong"></span> Jawaban salah</div>
            </div>
          </aside>
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
     - QUESTIONS di bawah ini (soal, opsi, jawaban benar, jawaban siswa,
       dan penjelasan) masih data contoh statis untuk modul "Artikel Das".
       Saat backend siap, ganti dengan fetch('/api/riwayat/{attemptId}')
       yang memuat hasil pengerjaan sesungguhnya berdasarkan id yang
       dikirim lewat parameter URL (?id=...).
     - Nilai pada .score-chip juga masih contoh statis (80), idealnya
       dihitung dari jumlah jawaban benar / total soal oleh backend.
  ================================================================== */
  var QUESTIONS = [
    { text: '… Buch ist sehr interessant. Ich lese es jeden Tag.', options: ['Der', 'Die', 'Das', 'Ein'], correct: 2, selected: 2,
      explanation: '"Buch" berjenis kelamin netral dalam bahasa Jerman, sehingga artikel bestimmt yang tepat adalah "das" (das Buch).' },
    { text: '… Frau arbeitet als Lehrerin in Berlin.', options: ['Der', 'Die', 'Das', 'Eine'], correct: 1, selected: 1,
      explanation: '"Frau" berjenis kelamin feminin, sehingga artikel yang tepat adalah "die" (die Frau).' },
    { text: 'Kannst du mir … Fenster öffnen? Es ist warm hier.', options: ['der', 'die', 'das', 'den'], correct: 2, selected: 0,
      explanation: '"Fenster" berjenis kelamin netral. Dalam kasus akusatif, artikel netral tidak berubah, sehingga tetap "das" (das Fenster).' },
    { text: '… Kinder spielen jeden Nachmittag im Park.', options: ['Der', 'Die', 'Das', 'Ein'], correct: 1, selected: 1,
      explanation: '"Kinder" adalah bentuk jamak (Plural), dan artikel bestimmt untuk semua kata benda jamak adalah "die".' },
    { text: 'Ich brauche … Auto, um zur Arbeit zu fahren.', options: ['der', 'die', 'ein', 'eine'], correct: 2, selected: 2,
      explanation: '"Auto" berjenis kelamin netral, sehingga artikel tak tentu (unbestimmt) yang tepat adalah "ein" (ein Auto).' },
    { text: '… Tisch im Wohnzimmer ist aus Holz.', options: ['Der', 'Die', 'Das', 'Den'], correct: 0, selected: 0,
      explanation: '"Tisch" berjenis kelamin maskulin, sehingga dalam kasus nominatif artikelnya adalah "der" (der Tisch).' },
    { text: 'Wir besuchen … Museum am Wochenende.', options: ['der', 'die', 'das', 'dem'], correct: 2, selected: 3,
      explanation: '"Museum" berjenis kelamin netral. Sebagai objek akusatif setelah kata kerja "besuchen", artikel netral tetap "das" (das Museum).' },
    { text: '… Katze schläft den ganzen Tag auf dem Sofa.', options: ['Der', 'Die', 'Das', 'Ein'], correct: 1, selected: 1,
      explanation: '"Katze" berjenis kelamin feminin, sehingga artikelnya adalah "die" (die Katze).' },
    { text: 'Hast du … Schlüssel für die Wohnung gesehen?', options: ['der', 'die', 'den', 'das'], correct: 2, selected: 2,
      explanation: '"Schlüssel" berjenis kelamin maskulin. Sebagai objek akusatif, artikel maskulin berubah dari "der" menjadi "den".' },
    { text: '… Wetter heute ist wirklich schön.', options: ['Der', 'Die', 'Das', 'Ein'], correct: 2, selected: 2,
      explanation: '"Wetter" berjenis kelamin netral, sehingga artikel bestimmt-nya adalah "das" (das Wetter).' },
    { text: 'Er kauft … Brot für das Frühstück.', options: ['der', 'die', 'das', 'ein'], correct: 2, selected: 2,
      explanation: '"Brot" berjenis kelamin netral. Dalam kasus akusatif, artikel netral tidak berubah dari "das".' },
    { text: '… Straße vor unserem Haus ist sehr laut.', options: ['Der', 'Die', 'Das', 'Eine'], correct: 1, selected: 1,
      explanation: '"Straße" berjenis kelamin feminin, sehingga artikelnya adalah "die" (die Straße).' },
    { text: 'Ich schreibe … Brief an meine Familie.', options: ['der', 'die', 'einen', 'das'], correct: 2, selected: 0,
      explanation: '"Brief" berjenis kelamin maskulin. Sebagai objek akusatif dengan artikel tak tentu, bentuknya berubah dari "ein" menjadi "einen".' },
    { text: '… Zug nach München fährt um acht Uhr ab.', options: ['Der', 'Die', 'Das', 'Ein'], correct: 0, selected: 0,
      explanation: '"Zug" berjenis kelamin maskulin, sehingga artikel nominatifnya adalah "der" (der Zug).' },
    { text: 'Kannst du … Tür bitte schließen? Es ist kalt.', options: ['der', 'die', 'das', 'den'], correct: 1, selected: 1,
      explanation: '"Tür" berjenis kelamin feminin. Dalam kasus akusatif, artikel feminin tidak berubah dari "die".' }
  ];
  var LETTERS = ['A', 'B', 'C', 'D'];

  var totalCorrect = QUESTIONS.filter(function(q){ return q.selected === q.correct; }).length;
  var score = Math.round((totalCorrect / QUESTIONS.length) * 100);
  document.getElementById('scoreChip').textContent = 'Nilai: ' + score;

  var state = { current: 0 };

  var quizProgress = document.getElementById('quizProgress');
  var quizQuestion = document.getElementById('quizQuestion');
  var quizOptions = document.getElementById('quizOptions');
  var explanationText = document.getElementById('explanationText');
  var soalGrid = document.getElementById('soalGrid');
  var prevBtn = document.getElementById('prevBtn');
  var nextBtn = document.getElementById('nextBtn');
  var nextBtnLabel = document.getElementById('nextBtnLabel');
  var nextBtnIcon = document.getElementById('nextBtnIcon');

  function renderQuestion(){
    var idx = state.current;
    var q = QUESTIONS[idx];
    quizProgress.textContent = 'Soal ' + (idx + 1) + ' dari ' + QUESTIONS.length;
    quizQuestion.textContent = q.text;
    explanationText.textContent = q.explanation;

    quizOptions.innerHTML = '';
    q.options.forEach(function(optText, i){
      var isCorrect = i === q.correct;
      var isWrongSelected = i === q.selected && q.selected !== q.correct;

      var row = document.createElement('div');
      row.className = 'quiz-option' + (isCorrect ? ' is-correct' : '') + (isWrongSelected ? ' is-wrong-selected' : '');

      var tag = '';
      if (isCorrect) tag = '<span class="quiz-option-tag">Jawaban Benar</span>';
      else if (isWrongSelected) tag = '<span class="quiz-option-tag">Jawabanmu</span>';

      row.innerHTML =
        '<span class="quiz-option-letter">' + LETTERS[i] + '</span>' +
        '<span class="quiz-option-text">' + optText + '</span>' + tag;
      quizOptions.appendChild(row);
    });

    prevBtn.hidden = idx === 0;
    var isLast = idx === QUESTIONS.length - 1;
    nextBtnLabel.textContent = isLast ? 'Selesai' : 'Selanjutnya';
    nextBtnIcon.innerHTML = isLast ? '<path d="M20 6 9 17l-5-5"/>' : '<path d="M5 12h14M13 6l6 6-6 6"/>';
  }

  function renderGrid(){
    soalGrid.innerHTML = '';
    QUESTIONS.forEach(function(q, i){
      var btn = document.createElement('button');
      btn.type = 'button';
      btn.textContent = i + 1;
      btn.setAttribute('aria-label', 'Ke soal ' + (i + 1) + (q.selected === q.correct ? ' (benar)' : ' (salah)'));
      var classes = ['soal-btn'];
      if (i === state.current) classes.push('is-current');
      classes.push(q.selected === q.correct ? 'is-correct' : 'is-wrong');
      btn.className = classes.join(' ');
      btn.addEventListener('click', function(){
        state.current = i;
        renderQuestion();
        renderGrid();
      });
      soalGrid.appendChild(btn);
    });
  }

  prevBtn.addEventListener('click', function(){
    if (state.current > 0){ state.current--; renderQuestion(); renderGrid(); }
  });
  nextBtn.addEventListener('click', function(){
    var isLast = state.current === QUESTIONS.length - 1;
    if (isLast){
      window.location.href = 'performa-siswa.html';
    } else {
      state.current++;
      renderQuestion();
      renderGrid();
    }
  });

  renderQuestion();
  renderGrid();

  /* Jika halaman dibuka lewat Dashboard, arahkan tombol Kembali ke Dashboard;
     jika dari Performa Siswa (default), tetap ke performa-siswa.html. */
  var params = new URLSearchParams(window.location.search);
  if (params.get('from') === 'dashboard'){
    document.getElementById('backLink').href = 'dashboard-siswa.html';
    document.getElementById('navPerforma').classList.remove('active');
    document.getElementById('navPerforma').removeAttribute('aria-current');
    document.getElementById('navDashboard').classList.add('active');
    document.getElementById('navDashboard').setAttribute('aria-current', 'page');
  }

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
