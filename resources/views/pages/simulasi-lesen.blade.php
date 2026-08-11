<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Simulasi Lesen — LD Indonesia</title>
<meta name="description" content="Simulasi ujian Lesen (membaca) bahasa Jerman — LD Indonesia.">
<meta name="robots" content="noindex, nofollow">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
:root{
  --navy:#1E2A47; --navy-soft:#435172; --pink:#EC4E8C; --pink-dark:#D63D79;
  --pink-light:#FDEAF1; --pink-pale:#FFF4F8; --purple:#7C6FE0; --gold:#D4A017; --maroon:#5C3620;
  --amber:#C98A1A; --amber-bg:#FCEBCF; --green:#2C9E6C; --green-bg:#DEF4E8; --red:#E0483F; --red-bg:#FDECEA;
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

.timer-strip{ display:flex; justify-content:flex-end; padding:16px 40px 0; }
.timer-badge{ background:var(--pink-light); color:var(--pink-dark); border-radius:var(--radius-md); padding:8px 24px; text-align:center; min-width:110px; }
.timer-badge .timer-label{ font-size:0.72rem; font-weight:700; text-transform:uppercase; letter-spacing:0.04em; opacity:0.85; }
.timer-badge .timer-value{ font-family:var(--font-display); font-size:1.15rem; font-weight:800; }
.timer-badge.is-low{ background:var(--red-bg); color:var(--red); }

.page-content{ padding:24px 40px 60px; max-width:1320px; width:100%; margin:0 auto; }
.back-link{ display:inline-flex; align-items:center; gap:8px; padding:10px 18px; border-radius:var(--radius-pill); border:1.5px solid var(--pink-light); color:var(--pink-dark); font-weight:700; font-size:0.9rem; margin-bottom:18px; }
.back-link:hover{ background:var(--pink-pale); }
.back-link svg{ width:16px; height:16px; }

.page-heading{ margin-bottom:18px; }
.page-heading h1{ font-size:1.5rem; margin-bottom:4px; }
.page-heading p{ color:var(--gray-500); font-size:0.9rem; }

.lesen-layout{ display:grid; grid-template-columns:1fr 1fr 240px; gap:22px; align-items:start; }

.passage-panel{
  background:var(--white); border-radius:var(--radius-lg); box-shadow:var(--shadow-md); border:1px solid var(--gray-100);
  padding:26px 28px; position:sticky; top:calc(var(--topbar-h) + 90px);
}
.passage-label{ color:var(--pink-dark); font-weight:800; font-size:0.98rem; margin-bottom:14px; }
.passage-text{ font-size:0.95rem; color:var(--gray-800); line-height:1.8; white-space:pre-line; max-height:520px; overflow-y:auto; }

.quiz-card{ background:var(--white); border-radius:var(--radius-lg); box-shadow:var(--shadow-md); border:1px solid var(--gray-100); padding:30px 32px; display:flex; flex-direction:column; min-height:420px; }
.quiz-progress{ color:var(--pink-dark); font-weight:800; font-size:0.95rem; margin-bottom:18px; }
.quiz-question{ font-size:1.08rem; color:var(--gray-800); font-weight:500; margin-bottom:24px; }

.quiz-options{ display:flex; flex-direction:column; gap:14px; }
.quiz-option{ display:flex; align-items:center; gap:16px; width:100%; text-align:left; padding:14px 18px; border:1.5px solid var(--gray-200); border-radius:var(--radius-sm); transition:border-color 0.15s ease, background 0.15s ease; }
.quiz-option:hover{ border-color:var(--pink); background:var(--pink-pale); }
.quiz-option-letter{ width:30px; height:30px; flex-shrink:0; border-radius:8px; border:1.5px solid var(--gray-300); display:flex; align-items:center; justify-content:center; font-weight:800; font-size:0.86rem; color:var(--navy-soft); }
.quiz-option-text{ font-size:0.98rem; color:var(--gray-800); }
.quiz-option.is-selected{ border-color:var(--pink); background:var(--pink-pale); box-shadow:0 0 0 3px var(--pink-light); }
.quiz-option.is-selected .quiz-option-letter{ background:var(--pink); border-color:var(--pink); color:var(--white); }

.quiz-actions{ margin-top:auto; padding-top:26px; display:flex; align-items:center; justify-content:flex-end; gap:12px; flex-wrap:wrap; }
.nav-btn{ display:inline-flex; align-items:center; gap:8px; padding:12px 26px; border-radius:var(--radius-pill); font-weight:700; font-size:0.94rem; }
.nav-btn svg{ width:16px; height:16px; }
.nav-btn-outline{ border:1.5px solid var(--gray-200); color:var(--navy); background:var(--white); }
.nav-btn-outline:hover{ background:var(--gray-50); }
.nav-btn-primary{ background:linear-gradient(135deg, var(--pink) 0%, var(--pink-dark) 100%); color:var(--white); box-shadow:0 12px 28px rgba(236,78,140,0.22); }
.nav-btn-primary:hover{ transform:translateY(-2px); }

.quiz-sidebar{ background:var(--white); border-radius:var(--radius-lg); box-shadow:var(--shadow-md); border:1px solid var(--gray-100); padding:24px; position:sticky; top:calc(var(--topbar-h) + 90px); }
.quiz-sidebar h2{ font-size:1.05rem; margin-bottom:18px; }
.soal-grid{ display:grid; grid-template-columns:repeat(3, 1fr); gap:10px; margin-bottom:22px; }
.soal-btn{ aspect-ratio:1; border-radius:10px; border:1.5px solid var(--gray-200); background:var(--white); color:var(--navy); font-weight:700; font-size:0.92rem; display:flex; align-items:center; justify-content:center; }
.soal-btn.is-current{ box-shadow:0 0 0 2.5px var(--pink); border-color:var(--pink); }
.soal-btn.is-answered{ background:var(--green-bg); border-color:var(--green-bg); color:var(--green); }
.legend{ display:flex; flex-direction:column; gap:10px; }
.legend-item{ display:flex; align-items:center; gap:10px; font-size:0.86rem; color:var(--gray-600); }
.legend-swatch{ width:16px; height:16px; border-radius:4px; border:1.5px solid var(--gray-200); flex-shrink:0; }
.legend-swatch.answered{ background:var(--green-bg); border-color:var(--green-bg); }

@media (max-width:1180px){
  .lesen-layout{ grid-template-columns:1fr 1fr; }
  .quiz-sidebar{ grid-column:1 / -1; position:static; }
  .soal-grid{ grid-template-columns:repeat(8, 1fr); }
}
@media (max-width:980px){
  .sidebar{ position:fixed; left:0; top:0; transform:translateX(-100%); transition:transform 0.22s ease; box-shadow:var(--shadow-md); }
  .sidebar.open{ transform:translateX(0); }
  .sidebar-close{ display:flex; align-items:center; justify-content:center; width:34px; height:34px; border-radius:8px; margin-left:auto; color:var(--navy); }
  .sidebar-close:hover{ background:rgba(30,42,71,0.06); }
  .sidebar-brand{ justify-content:space-between; }
  .menu-toggle{ display:flex; }
  .topbar{ padding:0 20px; }
  .timer-strip{ padding:14px 20px 0; }
  .page-content{ padding:20px 20px 48px; }
  .backdrop{ display:none; position:fixed; inset:0; background:rgba(30,42,71,0.35); z-index:50; }
  .backdrop.show{ display:block; }
  .lesen-layout{ grid-template-columns:1fr; }
  .passage-panel{ position:static; }
  .soal-grid{ grid-template-columns:repeat(5, 1fr); }
}
@media (max-width:640px){ .user-meta{ display:none; } .soal-grid{ grid-template-columns:repeat(4, 1fr); } }
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
        <li><a href="dashboard-siswa.html" class="nav-link"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 11.5 12 4l9 7.5"/><path d="M5 10v10a1 1 0 0 0 1 1h4v-6h4v6h4a1 1 0 0 0 1-1V10"/></svg>Dashboard</a></li>
        <li><a href="modul-pembelajaran.html" class="nav-link active" aria-current="page"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 5.5C2 4.7 2.7 4 4.7 4c2.6 0 5.3 1 7.3 2.5C14 4.9 16.7 4 19.3 4c2 0 2.7.7 2.7 1.5v13c0-.8-.7-1.5-2.7-1.5-2.6 0-5.3.9-7.3 2.5-2-1.6-4.7-2.5-7.3-2.5C2.7 17 2 17.7 2 18.5z"/><path d="M12 6.5V20"/></svg>Modul Pembelajaran</a></li>
        <li><a href="performa-siswa.html" class="nav-link"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 3v18h18"/><rect x="7" y="12" width="3" height="6"/><rect x="12.5" y="8" width="3" height="10"/><rect x="18" y="5" width="3" height="13"/></svg>Performa Siswa</a></li>
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

    <div class="timer-strip">
      <div class="timer-badge" id="timerBadge">
        <div class="timer-label">Sisa waktu soal</div>
        <div class="timer-value" id="timerValue">02:00</div>
      </div>
    </div>

    <main class="page-content" id="mainContent">
      <a href="modul-pembelajaran.html" class="back-link">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 18l-6-6 6-6"/></svg>
        Kembali
      </a>

      <div class="page-heading">
        <h1>Simulasi Lesen</h1>
        <p>Baca teks di sebelah kiri, lalu jawab pertanyaan berdasarkan bacaan tersebut. Setiap soal memiliki batas waktu 2 menit.</p>
      </div>

      <div class="lesen-layout">
        <section class="passage-panel" aria-label="Teks bacaan">
          <p class="passage-label">Teks</p>
          <p class="passage-text" id="passageText">Anna wohnt in Hamburg und arbeitet als Krankenschwester in einem großen Krankenhaus. Jeden Morgen steht sie um sechs Uhr auf und fährt mit dem Fahrrad zur Arbeit, weil das Krankenhaus nicht weit von ihrer Wohnung ist.

Nach der Arbeit geht Anna oft einkaufen oder trifft sich mit Freunden im Café. Am Wochenende besucht sie ihre Eltern, die auf dem Land wohnen. Sie mag es, Zeit mit ihrer Familie zu verbringen und frische Luft zu genießen.

Anna lernt auch seit einem Jahr Spanisch, weil sie nächstes Jahr nach Spanien reisen möchte. Sie übt jeden Abend eine halbe Stunde mit einer App.</p>
        </section>

        <section class="quiz-card" aria-label="Soal latihan Lesen">
          <p class="quiz-progress" id="quizProgress">Soal 1 dari 15</p>
          <p class="quiz-question" id="quizQuestion"></p>
          <div class="quiz-options" id="quizOptions" role="radiogroup" aria-labelledby="quizQuestion"></div>

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
            <div class="legend-item"><span class="legend-swatch"></span> Belum dijawab</div>
            <div class="legend-item"><span class="legend-swatch answered"></span> Sudah dijawab</div>
          </div>
        </aside>
      </div>
    </main>
  </div>
</div>

<script>
(function(){
  "use strict";

  /* ==================================================================
     CATATAN INTEGRASI BACKEND
     - Teks bacaan (#passageText) dan QUESTIONS di bawah masih data
       contoh statis. Saat backend siap, ganti dengan
       fetch('/api/modul/{id}/soal') yang memuat teks & soal sesungguhnya.
     - Timer 2 menit per soal berjalan lokal di browser; idealnya
       divalidasi ulang dari server saat submit.
  ================================================================== */
  var QUESTIONS = [
    { text: 'Wo wohnt Anna?', options: ['In München', 'In Hamburg', 'In Berlin', 'In Köln'] },
    { text: 'Als was arbeitet Anna?', options: ['Lehrerin', 'Krankenschwester', 'Verkäuferin', 'Ingenieurin'] },
    { text: 'Wie fährt Anna zur Arbeit?', options: ['Mit dem Auto', 'Mit dem Bus', 'Mit dem Fahrrad', 'Zu Fuß'] },
    { text: 'Um wie viel Uhr steht Anna auf?', options: ['Um fünf Uhr', 'Um sechs Uhr', 'Um sieben Uhr', 'Um acht Uhr'] },
    { text: 'Was macht Anna oft nach der Arbeit?', options: ['Sie schläft', 'Sie kocht', 'Sie geht einkaufen', 'Sie liest'] },
    { text: 'Wen trifft Anna manchmal im Café?', options: ['Ihre Kollegen', 'Ihre Freunde', 'Ihre Eltern', 'Ihren Chef'] },
    { text: 'Wo wohnen Annas Eltern?', options: ['In der Stadt', 'Auf dem Land', 'Am Meer', 'Im Ausland'] },
    { text: 'Wann besucht Anna ihre Eltern?', options: ['Jeden Tag', 'Am Wochenende', 'Einmal im Monat', 'Im Sommer'] },
    { text: 'Was genießt Anna bei ihren Eltern?', options: ['Frische Luft', 'Gutes Essen', 'Ruhe', 'Musik'] },
    { text: 'Welche Sprache lernt Anna?', options: ['Englisch', 'Französisch', 'Spanisch', 'Italienisch'] },
    { text: 'Seit wann lernt Anna diese Sprache?', options: ['Seit einem Monat', 'Seit einem Jahr', 'Seit zwei Jahren', 'Seit einer Woche'] },
    { text: 'Warum lernt Anna diese Sprache?', options: ['Für die Arbeit', 'Für die Reise', 'Für die Schule', 'Für die Familie'] },
    { text: 'Wie oft übt Anna die Sprache?', options: ['Jeden Morgen', 'Jeden Abend', 'Am Wochenende', 'Zweimal pro Woche'] },
    { text: 'Wie lange übt Anna jeden Tag?', options: ['15 Minuten', 'Eine Stunde', 'Eine halbe Stunde', 'Zwei Stunden'] },
    { text: 'Womit übt Anna die Sprache?', options: ['Mit einem Buch', 'Mit einer App', 'Mit einem Lehrer', 'Mit einem Freund'] }
  ];
  var LETTERS = ['A', 'B', 'C', 'D'];
  var state = { current: 0, answers: new Array(QUESTIONS.length).fill(null) };

  var quizProgress = document.getElementById('quizProgress');
  var quizQuestion = document.getElementById('quizQuestion');
  var quizOptions = document.getElementById('quizOptions');
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

    quizOptions.innerHTML = '';
    q.options.forEach(function(optText, i){
      var btn = document.createElement('button');
      btn.type = 'button';
      btn.className = 'quiz-option' + (state.answers[idx] === i ? ' is-selected' : '');
      btn.setAttribute('role', 'radio');
      btn.setAttribute('aria-checked', state.answers[idx] === i ? 'true' : 'false');
      btn.innerHTML = '<span class="quiz-option-letter">' + LETTERS[i] + '</span><span class="quiz-option-text">' + optText + '</span>';
      btn.addEventListener('click', function(){
        state.answers[idx] = i;
        renderQuestion();
        renderGrid();
      });
      quizOptions.appendChild(btn);
    });

    prevBtn.hidden = idx === 0;
    var isLast = idx === QUESTIONS.length - 1;
    nextBtnLabel.textContent = isLast ? 'Selesai' : 'Selanjutnya';
    nextBtnIcon.innerHTML = isLast ? '<path d="M20 6 9 17l-5-5"/>' : '<path d="M5 12h14M13 6l6 6-6 6"/>';

    resetQuestionTimer();
  }

  function renderGrid(){
    soalGrid.innerHTML = '';
    QUESTIONS.forEach(function(q, i){
      var btn = document.createElement('button');
      btn.type = 'button';
      btn.textContent = i + 1;
      btn.setAttribute('aria-label', 'Ke soal ' + (i + 1));
      var classes = ['soal-btn'];
      if (i === state.current) classes.push('is-current');
      if (state.answers[i] !== null) classes.push('is-answered');
      btn.className = classes.join(' ');
      btn.addEventListener('click', function(){
        state.current = i;
        renderQuestion();
        renderGrid();
      });
      soalGrid.appendChild(btn);
    });
  }

  function goNext(){
    var isLast = state.current === QUESTIONS.length - 1;
    if (isLast){
      // TODO: kirim state.answers ke backend untuk dinilai sebelum redirect.
      window.location.href = 'modul-pembelajaran.html';
    } else {
      state.current++;
      renderQuestion();
      renderGrid();
    }
  }

  prevBtn.addEventListener('click', function(){
    if (state.current > 0){ state.current--; renderQuestion(); renderGrid(); }
  });
  nextBtn.addEventListener('click', goNext);

  /* ---- Timer 2 menit per soal — otomatis lanjut saat waktu habis ---- */
  var questionSeconds = 120;
  var questionTimerInterval = null;
  var timerValue = document.getElementById('timerValue');
  var timerBadge = document.getElementById('timerBadge');

  function resetQuestionTimer(){
    clearInterval(questionTimerInterval);
    questionSeconds = 120;
    updateTimerDisplay();
    questionTimerInterval = setInterval(function(){
      questionSeconds--;
      if (questionSeconds <= 0){
        clearInterval(questionTimerInterval);
        goNext();
        return;
      }
      updateTimerDisplay();
    }, 1000);
  }
  function updateTimerDisplay(){
    var m = Math.floor(questionSeconds / 60);
    var s = questionSeconds % 60;
    timerValue.textContent = (m < 10 ? '0' : '') + m + ':' + (s < 10 ? '0' : '') + s;
    timerBadge.classList.toggle('is-low', questionSeconds <= 20);
  }

  renderQuestion();
  renderGrid();

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
