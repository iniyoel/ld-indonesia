<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Simulasi Schreiben — LD Indonesia</title>
<meta name="description" content="Simulasi ujian Schreiben bahasa Jerman — LD Indonesia.">
<meta name="robots" content="noindex, nofollow">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
:root{
  --navy:#1E2A47; --navy-soft:#435172; --pink:#EC4E8C; --pink-dark:#D63D79;
  --pink-light:#FDEAF1; --pink-pale:#FFF4F8; --purple:#7C6FE0; --gold:#D4A017; --maroon:#5C3620;
  --amber:#C98A1A; --amber-bg:#FCEBCF; --red:#E0483F; --red-bg:#FDECEA;
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

/* ---- Timer strip ---- */
.timer-strip{ display:flex; justify-content:flex-end; padding:16px 40px 0; }
.timer-badge{ background:var(--pink-light); color:var(--pink-dark); border-radius:var(--radius-md); padding:8px 24px; text-align:center; min-width:110px; }
.timer-badge .timer-label{ font-size:0.72rem; font-weight:700; text-transform:uppercase; letter-spacing:0.04em; opacity:0.85; }
.timer-badge .timer-value{ font-family:var(--font-display); font-size:1.15rem; font-weight:800; }
.timer-badge.is-low{ background:var(--red-bg); color:var(--red); }

.page-content{ padding:24px 40px 60px; max-width:1240px; width:100%; margin:0 auto; }
.back-link{ display:inline-flex; align-items:center; gap:8px; padding:10px 18px; border-radius:var(--radius-pill); border:1.5px solid var(--pink-light); color:var(--pink-dark); font-weight:700; font-size:0.9rem; margin-bottom:18px; }
.back-link:hover{ background:var(--pink-pale); }
.back-link svg{ width:16px; height:16px; }

.page-heading{ margin-bottom:18px; }
.page-heading h1{ font-size:1.5rem; margin-bottom:4px; }
.page-heading p{ color:var(--gray-500); font-size:0.9rem; }

.essay-layout{ display:grid; grid-template-columns:1fr 1fr; gap:22px; align-items:stretch; }
.essay-panel{ background:var(--white); border-radius:var(--radius-lg); box-shadow:var(--shadow-md); border:1px solid var(--gray-100); display:flex; flex-direction:column; min-height:400px; }

.prompt-panel{ padding:26px 28px; }
.teil-label{ color:var(--pink-dark); font-weight:800; font-size:0.98rem; margin-bottom:14px; }
.prompt-text{ font-size:0.98rem; color:var(--gray-800); line-height:1.75; white-space:pre-line; }

.editor-toolbar{ display:flex; align-items:center; gap:4px; padding:10px 14px; border-bottom:1px solid var(--gray-100); flex-wrap:wrap; }
.editor-btn{ width:32px; height:32px; border-radius:8px; display:flex; align-items:center; justify-content:center; color:var(--navy-soft); font-weight:800; font-size:0.9rem; }
.editor-btn:hover{ background:var(--gray-50); color:var(--navy); }
.editor-btn.is-active{ background:var(--pink-pale); color:var(--pink-dark); }
.editor-btn svg{ width:16px; height:16px; }
.editor-sep{ width:1px; height:20px; background:var(--gray-200); margin:0 6px; }

.essay-editor{
  flex-grow:1;
  padding:22px 24px;
  font-size:0.98rem;
  color:var(--gray-800);
  outline:none;
  line-height:1.7;
  overflow-y:auto;
}
.essay-editor:empty::before{ content: attr(data-placeholder); color:var(--gray-400); }
.essay-editor:focus{ background:var(--pink-pale); }

.essay-footer{ display:flex; justify-content:space-between; align-items:center; padding:14px 28px 0; }
.word-count{ font-size:0.82rem; color:var(--gray-500); }

.page-actions{ display:flex; justify-content:flex-end; margin-top:24px; }
.nav-btn{ display:inline-flex; align-items:center; gap:8px; padding:13px 26px; border-radius:var(--radius-pill); font-weight:700; font-size:0.94rem; }
.nav-btn svg{ width:16px; height:16px; }
.nav-btn-primary{ background:linear-gradient(135deg, var(--pink) 0%, var(--pink-dark) 100%); color:var(--white); box-shadow:0 12px 28px rgba(236,78,140,0.22); }
.nav-btn-primary:hover{ transform:translateY(-2px); }

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
  .essay-layout{ grid-template-columns:1fr; }
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
        <div class="timer-label">Sisa waktu</div>
        <div class="timer-value" id="timerValue">30:00</div>
      </div>
    </div>

    <main class="page-content" id="mainContent">
      <a href="modul-pembelajaran.html" class="back-link">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 18l-6-6 6-6"/></svg>
        Kembali
      </a>

      <div class="page-heading">
        <h1>Simulasi Schreiben</h1>
        <p>Tulis jawabanmu berdasarkan petunjuk soal di sebelah kiri, sesuai batas waktu yang tersedia.</p>
      </div>

      <div class="essay-layout">
        <section class="essay-panel prompt-panel" aria-label="Petunjuk soal">
          <p class="teil-label" id="teilLabel">Teil 1</p>
          <p class="prompt-text" id="promptText"></p>
        </section>

        <section class="essay-panel" aria-label="Area menulis jawaban">
          <!-- Catatan: toolbar ini menggunakan document.execCommand untuk pratinjau
               format dasar (Bold/Italic/Underline/List). Saat backend siap, simpan
               konten essay (mis. innerHTML/innerText editor) ke server saat submit. -->
          <div class="editor-toolbar">
            <button class="editor-btn" data-cmd="bold" aria-label="Tebal" type="button"><b>B</b></button>
            <button class="editor-btn" data-cmd="italic" aria-label="Miring" type="button"><i>I</i></button>
            <button class="editor-btn" data-cmd="underline" aria-label="Garis bawah" type="button"><u>U</u></button>
            <div class="editor-sep"></div>
            <button class="editor-btn" data-cmd="justifyLeft" aria-label="Rata kiri" type="button">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><path d="M3 6h18M3 12h12M3 18h15"/></svg>
            </button>
            <button class="editor-btn" data-cmd="insertUnorderedList" aria-label="Daftar bullet" type="button">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><circle cx="4" cy="6" r="1" fill="currentColor" stroke="none"/><circle cx="4" cy="12" r="1" fill="currentColor" stroke="none"/><circle cx="4" cy="18" r="1" fill="currentColor" stroke="none"/><path d="M9 6h11M9 12h11M9 18h11"/></svg>
            </button>
            <button class="editor-btn" data-cmd="insertOrderedList" aria-label="Daftar bernomor" type="button">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><path d="M9 6h11M9 12h11M9 18h11M4 6h1M4 10v1h1M4 18h2"/></svg>
            </button>
            <button class="editor-btn" data-cmd="indent" aria-label="Indentasi" type="button">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><path d="M3 4h18M3 20h18M3 10h11M3 15h11M15 7.5 19 12l-4 4.5"/></svg>
            </button>
          </div>
          <div class="essay-editor" id="essayEditor" contenteditable="true" data-placeholder="Tulis jawaban Anda di sini…"></div>
          <div class="essay-footer">
            <span class="word-count" id="wordCount">0 kata</span>
          </div>
        </section>
      </div>

      <div class="page-actions">
        <button class="nav-btn nav-btn-primary" id="nextBtn" type="button">
          <span id="nextBtnLabel">Selanjutnya</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" id="nextBtnIcon" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
        </button>
      </div>
    </main>
  </div>
</div>

<script>
(function(){
  "use strict";

  /* ==================================================================
     CATATAN INTEGRASI BACKEND
     - TEILS di bawah adalah data contoh statis untuk 2 bagian soal.
       Ganti dengan fetch('/api/modul/{id}/soal') saat backend tersedia.
     - Jawaban essay tiap Teil hanya disimpan di memori (variabel JS)
       selama halaman terbuka. Saat "Selesai" ditekan, TODO: kirim ke
       server (mis. fetch('/api/modul/{id}/submit', {method:'POST', ...})).
     - Durasi timer (30 menit) juga masih nilai contoh; idealnya
       durasi & waktu mulai divalidasi dari server agar tidak bisa
       dimanipulasi dari sisi klien.
  ================================================================== */
  var TEILS = [
    {
      label: 'Teil 1',
      prompt: 'Sie sind unterwegs in der Stadt und schreiben eine SMS an Ihre Freundin Ekaterini.\n– Entschuldigen Sie sich, dass Sie spät kommen.\n– Schreiben Sie, warum.\n– Nennen Sie einen neuen Ort und eine neue Uhrzeit für das Treffen.\n\nSchreiben Sie 20–30 Wörter. Schreiben Sie zu allen drei Punkten.'
    },
    {
      label: 'Teil 2',
      prompt: 'Sie schreiben eine E-Mail an Ihren Deutschlehrer.\n– Sagen Sie, warum Sie schreiben.\n– Fragen Sie nach dem nächsten Termin.\n– Bedanken Sie sich für die letzte Unterrichtsstunde.\n\nSchreiben Sie 30–40 Wörter. Schreiben Sie zu allen drei Punkten.'
    }
  ];

  var state = { current: 0, answers: new Array(TEILS.length).fill('') };

  var teilLabel = document.getElementById('teilLabel');
  var promptText = document.getElementById('promptText');
  var editor = document.getElementById('essayEditor');
  var wordCount = document.getElementById('wordCount');
  var nextBtn = document.getElementById('nextBtn');
  var nextBtnLabel = document.getElementById('nextBtnLabel');
  var nextBtnIcon = document.getElementById('nextBtnIcon');

  function updateWordCount(){
    var text = editor.innerText.trim();
    var count = text.length === 0 ? 0 : text.split(/\s+/).length;
    wordCount.textContent = count + ' kata';
  }

  function renderTeil(){
    var t = TEILS[state.current];
    teilLabel.textContent = t.label;
    promptText.textContent = t.prompt;
    editor.innerHTML = state.answers[state.current] || '';
    updateWordCount();

    var isLast = state.current === TEILS.length - 1;
    nextBtnLabel.textContent = isLast ? 'Selesai' : 'Selanjutnya';
    nextBtnIcon.innerHTML = isLast ? '<path d="M20 6 9 17l-5-5"/>' : '<path d="M5 12h14M13 6l6 6-6 6"/>';
  }

  editor.addEventListener('input', function(){
    state.answers[state.current] = editor.innerHTML;
    updateWordCount();
  });

  document.querySelectorAll('.editor-btn').forEach(function(btn){
    btn.addEventListener('click', function(){
      editor.focus();
      document.execCommand(btn.getAttribute('data-cmd'), false, null);
    });
  });

  nextBtn.addEventListener('click', function(){
    state.answers[state.current] = editor.innerHTML;
    var isLast = state.current === TEILS.length - 1;
    if (isLast){
      // TODO: kirim state.answers ke backend untuk dinilai sebelum redirect.
      window.location.href = 'modul-pembelajaran.html';
    } else {
      state.current++;
      renderTeil();
    }
  });

  renderTeil();

  /* ---- Timer mundur (contoh 30 menit) ---- */
  var totalSeconds = 30 * 60;
  var timerValue = document.getElementById('timerValue');
  var timerBadge = document.getElementById('timerBadge');
  var timerInterval = setInterval(function(){
    totalSeconds--;
    if (totalSeconds <= 0){
      clearInterval(timerInterval);
      totalSeconds = 0;
      // Waktu habis — kirimkan otomatis (TODO: submit ke backend) lalu kembali.
      window.location.href = 'modul-pembelajaran.html';
      return;
    }
    var m = Math.floor(totalSeconds / 60);
    var s = totalSeconds % 60;
    timerValue.textContent = (m < 10 ? '0' : '') + m + ':' + (s < 10 ? '0' : '') + s;
    timerBadge.classList.toggle('is-low', totalSeconds <= 60);
  }, 1000);

  /* ---- Sidebar toggle (mobile) ---- */
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
