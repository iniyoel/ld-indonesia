<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Simulasi Sprechen — LD Indonesia</title>
<meta name="description" content="Simulasi latihan Sprechen (berbicara) bahasa Jerman — LD Indonesia.">
<meta name="robots" content="noindex, nofollow">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
:root{
  --navy:#1E2A47; --navy-soft:#435172; --pink:#EC4E8C; --pink-dark:#D63D79;
  --pink-light:#FDEAF1; --pink-pale:#FFF4F8; --purple:#7C6FE0; --gold:#D4A017; --maroon:#5C3620;
  --green:#2C9E6C; --green-bg:#DEF4E8;
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

.page-content{ padding:32px 40px 60px; max-width:820px; width:100%; margin:0 auto; }
.back-link{ display:inline-flex; align-items:center; gap:8px; padding:10px 18px; border-radius:var(--radius-pill); border:1.5px solid var(--pink-light); color:var(--pink-dark); font-weight:700; font-size:0.9rem; margin-bottom:22px; }
.back-link:hover{ background:var(--pink-pale); }
.back-link svg{ width:16px; height:16px; }

.sprechen-panel{ background:var(--white); border-radius:var(--radius-lg); box-shadow:var(--shadow-md); border:1px solid var(--gray-100); padding:34px 36px; text-align:center; }
.sprechen-panel h1{ font-size:1.5rem; margin-bottom:6px; }
.sprechen-panel > p.subtitle{ color:var(--gray-500); font-size:0.92rem; margin-bottom:28px; }

.topic-card{
  background:var(--pink-pale); border:1px solid var(--pink-light); border-radius:var(--radius-md);
  padding:26px 28px; text-align:left; margin-bottom:26px;
}
.topic-label{ color:var(--pink-dark); font-weight:800; font-size:0.9rem; margin-bottom:10px; }
.topic-text{ font-size:1.05rem; color:var(--gray-800); line-height:1.7; }
.topic-hints{ margin-top:16px; padding-left:20px; color:var(--gray-600); font-size:0.9rem; line-height:1.8; }

.practice-timer{ display:flex; flex-direction:column; align-items:center; gap:6px; margin-bottom:28px; }
.practice-timer .label{ font-size:0.8rem; color:var(--gray-500); font-weight:600; text-transform:uppercase; letter-spacing:0.04em; }
.practice-timer .value{ font-family:var(--font-display); font-size:1.8rem; font-weight:800; color:var(--navy); }
.practice-hint{ font-size:0.82rem; color:var(--gray-400); }

.record-btn{
  width:78px; height:78px; border-radius:50%;
  background:var(--pink); color:var(--white);
  display:flex; align-items:center; justify-content:center;
  margin:0 auto 14px;
  box-shadow:0 14px 30px rgba(236,78,140,0.28);
  transition:transform 0.15s ease, background 0.15s ease;
}
.record-btn:hover{ transform:translateY(-2px); }
.record-btn.is-recording{ background:var(--pink-dark); animation:pulse 1.4s ease-in-out infinite; }
.record-btn svg{ width:30px; height:30px; }
@keyframes pulse{ 0%,100%{ box-shadow:0 0 0 0 rgba(214,61,121,0.35);} 50%{ box-shadow:0 0 0 14px rgba(214,61,121,0);} }
.record-label{ font-size:0.9rem; font-weight:700; color:var(--navy); margin-bottom:30px; }

.finish-btn{
  display:inline-flex; align-items:center; gap:8px;
  padding:14px 32px; border-radius:var(--radius-pill);
  background:linear-gradient(135deg, var(--pink) 0%, var(--pink-dark) 100%);
  color:var(--white); font-weight:700; font-size:0.96rem;
  box-shadow:0 12px 28px rgba(236,78,140,0.22);
}
.finish-btn:hover{ transform:translateY(-2px); }
.finish-btn svg{ width:17px; height:17px; }
.finish-btn:disabled{ opacity:0.55; cursor:not-allowed; transform:none; }

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
  .sprechen-panel{ padding:26px 22px; }
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

    <main class="page-content" id="mainContent">
      <a href="modul-pembelajaran.html" class="back-link">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 18l-6-6 6-6"/></svg>
        Kembali
      </a>

      <section class="sprechen-panel" aria-label="Latihan Sprechen">
        <h1>Simulasi Sprechen</h1>
        <p class="subtitle">Latihan ini tidak memiliki batas waktu — latih topik berikut sampai kamu percaya diri.</p>

        <div class="topic-card">
          <p class="topic-label">Topik Latihan</p>
          <p class="topic-text">Stellen Sie sich vor! Erzählen Sie etwas über sich: Ihren Namen, Ihr Alter, Ihren Wohnort, Ihren Beruf und Ihr Hobby.</p>
          <ul class="topic-hints">
            <li>Gunakan kalimat sederhana dan jelas.</li>
            <li>Latih pelafalan (Aussprache) setiap kata baru.</li>
            <li>Rekam ulang sebanyak yang kamu butuhkan sebelum menandai selesai.</li>
          </ul>
        </div>

        <!-- Catatan: tombol rekam ini murni tampilan (belum mengakses mikrofon
             sesungguhnya). Stopwatch di bawah hanya menghitung durasi latihan
             sebagai referensi pribadi siswa, bukan batas waktu. -->
        <div class="practice-timer">
          <span class="label">Durasi latihan</span>
          <span class="value" id="practiceValue">00:00</span>
          <span class="practice-hint">Tidak ada batas waktu untuk latihan Sprechen</span>
        </div>

        <button class="record-btn" id="recordBtn" type="button" aria-label="Mulai rekam latihan">
          <svg id="recordIcon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 15a3 3 0 0 0 3-3V6a3 3 0 0 0-6 0v6a3 3 0 0 0 3 3z" fill="none" stroke="currentColor" stroke-width="2"/><path d="M19 11a7 7 0 0 1-14 0M12 18v3" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"/></svg>
        </button>
        <p class="record-label" id="recordLabel">Tekan untuk mulai berlatih</p>

        <button class="finish-btn" id="finishBtn" type="button" disabled>
          Selesai
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>
        </button>
      </section>
    </main>
  </div>
</div>

<script>
(function(){
  "use strict";

  /* ==================================================================
     CATATAN INTEGRASI BACKEND
     - Topik latihan (.topic-text) masih data contoh statis; ganti
       dengan fetch('/api/modul/{id}/topik') saat backend siap.
     - Tombol rekam saat ini hanya menjalankan stopwatch visual, belum
       benar-benar mengakses mikrofon perangkat. Saat fitur rekam suara
       sungguhan dikembangkan, gunakan Web Audio/MediaRecorder API dan
       unggah hasil rekaman ke server untuk dinilai tutor.
     - Tombol "Selesai" aktif setelah siswa menekan tombol rekam
       minimal satu kali, menandakan modul sudah dilatih.
  ================================================================== */
  var practiceSeconds = 0;
  var practiceInterval = null;
  var isRecording = false;
  var hasPracticed = false;

  var recordBtn = document.getElementById('recordBtn');
  var recordIcon = document.getElementById('recordIcon');
  var recordLabel = document.getElementById('recordLabel');
  var practiceValue = document.getElementById('practiceValue');
  var finishBtn = document.getElementById('finishBtn');

  recordBtn.addEventListener('click', function(){
    isRecording = !isRecording;
    recordBtn.classList.toggle('is-recording', isRecording);

    if (isRecording){
      hasPracticed = true;
      finishBtn.disabled = false;
      recordLabel.textContent = 'Sedang berlatih… tekan lagi untuk berhenti';
      practiceInterval = setInterval(function(){
        practiceSeconds++;
        var m = Math.floor(practiceSeconds / 60);
        var s = practiceSeconds % 60;
        practiceValue.textContent = (m < 10 ? '0' : '') + m + ':' + (s < 10 ? '0' : '') + s;
      }, 1000);
    } else {
      clearInterval(practiceInterval);
      recordLabel.textContent = 'Tekan untuk berlatih lagi';
    }
  });

  finishBtn.addEventListener('click', function(){
    if (!hasPracticed) return;
    clearInterval(practiceInterval);
    // TODO: kirim status "selesai dilatih" (dan rekaman jika ada) ke backend.
    window.location.href = 'modul-pembelajaran.html';
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
