<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LD Indonesia</title>
<meta name="description" content="Form pembuatan soal modul pembelajaran dan simulasi — LD Indonesia.">
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
  --green: #2C9E6C;
  --green-bg: #DEF4E8;
  --red: #E0483F;
  --red-bg: #FDECEA;
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
  display: inline-flex; align-items: center; gap: 8px; padding: 10px 18px;
  border-radius: var(--radius-pill); border: 1.5px solid var(--pink-light); color: var(--pink-dark);
  font-weight: 700; font-size: 0.9rem; margin-bottom: 18px;
}
.back-link:hover{ background: var(--pink-pale); }
.back-link svg{ width: 16px; height: 16px; }

.page-heading{ margin-bottom: 22px; }
.page-heading h1{ font-size: 1.6rem; }

/* ============ QUESTION ROW ============ */
.question-row{ display: flex; gap: 16px; align-items: flex-start; margin-bottom: 20px; }
.question-card{
  flex-grow: 1; min-width: 0;
  background: var(--white); border-radius: var(--radius-lg); box-shadow: var(--shadow-md);
  border: 1px solid var(--gray-100); padding: 26px 28px;
}
.question-card h2{ font-size: 1.15rem; margin-bottom: 16px; }

.qtext-row{ display: flex; align-items: flex-start; gap: 14px; margin-bottom: 4px; }
.qtext-box{ flex-grow: 1; min-width: 0; border: 1.5px solid var(--gray-200); border-radius: var(--radius-sm); overflow: hidden; }
.qtext-input{
  width: 100%; padding: 13px 16px; font: inherit; font-size: 0.96rem; color: var(--gray-800);
  outline: none; min-height: 24px;
}
.qtext-input:empty::before{ content: "Tulis pertanyaan di sini..."; color: var(--gray-400); }
.qtext-toolbar{ display: flex; align-items: center; gap: 2px; padding: 8px 12px; border-top: 1px solid var(--gray-100); background: var(--gray-50); flex-wrap: wrap; }
.tb-btn{ width: 30px; height: 30px; border-radius: 7px; display: flex; align-items: center; justify-content: center; color: var(--navy-soft); font-weight: 800; font-size: 0.86rem; }
.tb-btn:hover{ background: var(--white); color: var(--navy); }
.tb-btn svg{ width: 15px; height: 15px; }
.tb-sep{ width: 1px; height: 18px; background: var(--gray-200); margin: 0 5px; }

.icon-btn-circle{
  width: 40px; height: 40px; border-radius: 50%; background: var(--gray-100); color: var(--gray-500);
  display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 2px;
  position: relative;
}
.icon-btn-circle:hover{ background: var(--pink-pale); color: var(--pink-dark); }
.icon-btn-circle svg{ width: 18px; height: 18px; }
.icon-btn-circle.has-file{ background: var(--green-bg); color: var(--green); }
.icon-btn-circle .file-badge{
  position: absolute; bottom: -4px; right: -4px; width: 16px; height: 16px; border-radius: 50%;
  background: var(--green); color: var(--white); display: flex; align-items: center; justify-content: center;
  border: 2px solid var(--white);
}
.icon-btn-circle .file-badge svg{ width: 9px; height: 9px; }

.type-select-wrap{ position: relative; flex-shrink: 0; width: 220px; }
.type-select-wrap select{
  appearance: none; -webkit-appearance: none; width: 100%; font: inherit; font-weight: 700; font-size: 0.94rem;
  padding: 13px 40px 13px 42px; border: 1.5px solid var(--gray-200); border-radius: var(--radius-sm);
  background: var(--white); color: var(--navy); cursor: pointer;
}
.type-select-wrap select:focus{ outline: none; border-color: var(--pink); box-shadow: 0 0 0 4px var(--pink-pale); }
.type-select-wrap .type-icon{ position: absolute; left: 14px; top: 50%; transform: translateY(-50%); width: 16px; height: 16px; color: var(--gray-500); pointer-events: none; }
.type-select-wrap .chevron-icon{ position: absolute; right: 14px; top: 50%; transform: translateY(-50%); width: 16px; height: 16px; color: var(--gray-500); pointer-events: none; }

/* ---- Pilihan ganda options ---- */
.options-list{ margin-top: 20px; display: flex; flex-direction: column; gap: 4px; }
.option-row{ display: flex; align-items: center; gap: 14px; padding: 8px 0; }
.option-radio{
  width: 22px; height: 22px; border-radius: 50%; border: 1.5px solid var(--gray-300); flex-shrink: 0;
  display: flex; align-items: center; justify-content: center;
}
.option-radio .dot{ width: 11px; height: 11px; border-radius: 50%; background: transparent; }
.option-row.is-correct .option-radio{ border-color: var(--navy); }
.option-row.is-correct .option-radio .dot{ background: var(--navy); }
.option-text{
  flex-grow: 1; min-width: 0; font: inherit; font-size: 0.94rem; color: var(--gray-800);
  border: none; border-bottom: 1px solid transparent; padding: 6px 2px; background: transparent;
}
.option-text:hover, .option-text:focus{ border-bottom-color: var(--gray-200); outline: none; }
.option-text::placeholder{ color: var(--gray-400); }
.option-remove{ width: 26px; height: 26px; border-radius: 50%; color: var(--gray-400); flex-shrink: 0; visibility: hidden; }
.option-row:hover .option-remove{ visibility: visible; }
.option-remove:hover{ background: var(--red-bg); color: var(--red); }
.option-remove svg{ width: 14px; height: 14px; }

.add-option-row{ display: flex; align-items: center; gap: 14px; padding: 8px 0; }
.add-option-row .option-radio{ border-style: dashed; }
.add-option-btn{ color: var(--gray-400); font-size: 0.94rem; font-weight: 500; }
.add-option-btn:hover{ color: var(--pink-dark); }

/* ---- Paragraf preview ---- */
.paragraf-preview{ margin-top: 22px; }
.paragraf-preview-line{ border-bottom: 1px solid var(--gray-200); padding: 8px 4px; color: var(--gray-400); font-size: 0.94rem; max-width: 560px; }

/* ---- Control rail ---- */
.control-rail{ display: flex; flex-direction: column; gap: 10px; flex-shrink: 0; padding-top: 2px; }
.rail-btn{
  width: 44px; height: 44px; border-radius: 50%; background: var(--white); box-shadow: var(--shadow-sm);
  border: 1px solid var(--gray-100); color: var(--pink-dark); display: flex; align-items: center; justify-content: center;
  transition: background 0.15s ease, transform 0.15s ease;
}
.rail-btn:hover{ background: var(--pink-pale); transform: translateY(-1px); }
.rail-btn.is-delete:hover{ background: var(--red-bg); color: var(--red); }
.rail-btn svg{ width: 18px; height: 18px; }

.empty-questions{
  background: var(--white); border-radius: var(--radius-lg); box-shadow: var(--shadow-md); border: 1px solid var(--gray-100);
  padding: 50px 28px; text-align: center; margin-bottom: 20px;
}
.empty-questions p{ color: var(--gray-500); font-size: 0.94rem; margin-bottom: 18px; }
.empty-add-btn{
  display: inline-flex; align-items: center; gap: 8px; padding: 12px 24px; border-radius: var(--radius-pill);
  background: var(--pink-pale); color: var(--pink-dark); font-weight: 700; font-size: 0.92rem;
}
.empty-add-btn:hover{ background: var(--pink-light); }
.empty-add-btn svg{ width: 16px; height: 16px; }

/* ============ FOOTER ACTIONS ============ */
.form-actions{ display: flex; justify-content: flex-end; margin-top: 8px; }
.btn-save{
  display: inline-flex; align-items: center; gap: 8px; padding: 14px 32px; border-radius: var(--radius-pill);
  background: linear-gradient(135deg, var(--pink) 0%, var(--pink-dark) 100%); color: var(--white);
  font-weight: 700; font-size: 0.96rem; box-shadow: 0 12px 28px rgba(236,78,140,0.22);
  transition: transform 0.18s ease;
}
.btn-save:hover{ transform: translateY(-2px); }
.btn-save svg{ width: 17px; height: 17px; }

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
  .question-card{ padding: 20px 18px; }
  .qtext-row{ flex-wrap: wrap; }
  .type-select-wrap{ width: 100%; margin-top: 10px; }
  .control-rail{ flex-direction: row; }
}
@media (max-width: 640px){ .user-meta{ display: none; } }
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
      <a href="tutor-modul-form.html" class="back-link">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 18l-6-6 6-6"/></svg>
        Kembali
      </a>

      <div class="page-heading">
        <h1>Buat Soal</h1>
      </div>

      <div id="questionsContainer"></div>

      <div class="empty-questions" id="emptyQuestions" hidden>
        <p>Belum ada pertanyaan. Klik tombol di bawah untuk menambahkan pertanyaan pertama.</p>
        <button type="button" class="empty-add-btn" id="emptyAddBtn">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" aria-hidden="true"><path d="M12 5v14M5 12h14"/></svg>
          Tambah Pertanyaan
        </button>
      </div>

      <div class="form-actions">
        <button type="button" class="btn-save" id="saveBtn">
          Simpan
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>
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
     - Seluruh state soal (questions[]) di bawah ini hanya disimpan di
       memori (variabel JS) selama halaman terbuka — belum dikirim ke
       server. Saat tombol "Simpan" ditekan, TODO: kirim questions[]
       (termasuk file gambar/audio yang dipilih) ke backend, mis.
       fetch('/api/admin/modul/{id}/soal', {method:'POST', body: formData}).
     - Sesuai ketentuan: urutan opsi pilihan ganda akan DIACAK oleh
       backend saat disimpan ke database — pengacakan TIDAK dilakukan
       di sisi front-end ini.
     - Maksimal 4 opsi per soal pilihan ganda, dengan satu opsi
       ditandai benar lewat radio button.
     - Ikon gambar di sebelah pertanyaan & tiap opsi menerima file
       gambar ATAU audio (mis. untuk soal Simulasi Hören yang butuh
       berkas audio, atau opsi jawaban bergambar).
  ================================================================== */

  var nextId = 3;
  var questions = [
    {
      id: 1, type: 'pg', text: '',
      questionFile: null,
      options: [ { text: 'Opsi 1', file: null } ],
      correct: 0
    },
    {
      id: 2, type: 'paragraf', text: '',
      questionFile: null,
      options: [],
      correct: null
    }
  ];

  var container = document.getElementById('questionsContainer');
  var emptyQuestions = document.getElementById('emptyQuestions');

  function iconSvg(name){
    var icons = {
      image: '<path d="M3 5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><circle cx="8.5" cy="9.5" r="1.5"/><path d="m21 15-5-5L5 21"/>',
      check: '<path d="M20 6 9 17l-5-5"/>',
      plus: '<path d="M12 5v14M5 12h14"/>',
      copy: '<rect x="9" y="9" width="12" height="12" rx="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/>',
      trash: '<path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/>',
      x: '<path d="M18 6 6 18M6 6l12 12"/>',
      pg: '<circle cx="12" cy="12" r="9"/><path d="m9 12 2 2 4-4"/>',
      para: '<path d="M3 6h18M3 12h18M3 18h12"/>',
      chevron: '<path d="M6 9l6 6 6-6"/>'
    };
    return icons[name] || '';
  }

  function render(){
    container.innerHTML = '';
    emptyQuestions.hidden = questions.length > 0;

    questions.forEach(function(q, qIndex){
      var row = document.createElement('div');
      row.className = 'question-row';

      var card = document.createElement('div');
      card.className = 'question-card';

      var heading = document.createElement('h2');
      heading.textContent = 'Pertanyaan ' + (qIndex + 1);
      card.appendChild(heading);

      /* ---- Baris teks pertanyaan + upload + tipe soal ---- */
      var qtextRow = document.createElement('div');
      qtextRow.className = 'qtext-row';

      var qtextBox = document.createElement('div');
      qtextBox.className = 'qtext-box';
      qtextBox.innerHTML =
        '<div class="qtext-input" contenteditable="true" data-role="qtext"></div>' +
        '<div class="qtext-toolbar">' +
          '<button type="button" class="tb-btn" data-cmd="bold"><b>B</b></button>' +
          '<button type="button" class="tb-btn" data-cmd="italic"><i>I</i></button>' +
          '<button type="button" class="tb-btn" data-cmd="underline"><u>U</u></button>' +
          '<div class="tb-sep"></div>' +
          '<button type="button" class="tb-btn" title="Ukuran teks">A <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" style="width:11px;height:11px;margin-left:2px;">' + iconSvg('chevron') + '</svg></button>' +
          '<button type="button" class="tb-btn" title="Perataan"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">' + iconSvg('para') + '</svg></button>' +
          '<button type="button" class="tb-btn" data-cmd="insertOrderedList" title="Daftar bernomor"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M9 6h11M9 12h11M9 18h11M4 6h1M4 10v1h1M4 18h2"/></svg></button>' +
          '<button type="button" class="tb-btn" data-cmd="insertUnorderedList" title="Daftar bullet"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="4" cy="6" r="1" fill="currentColor" stroke="none"/><circle cx="4" cy="12" r="1" fill="currentColor" stroke="none"/><circle cx="4" cy="18" r="1" fill="currentColor" stroke="none"/><path d="M9 6h11M9 12h11M9 18h11"/></svg></button>' +
          '<button type="button" class="tb-btn" data-cmd="indent" title="Indentasi"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M3 4h18M3 20h18M3 10h11M3 15h11M15 7.5 19 12l-4 4.5"/></svg></button>' +
        '</div>';
      var qtextInput = qtextBox.querySelector('[data-role="qtext"]');
      qtextInput.innerHTML = q.text;
      qtextInput.addEventListener('input', function(){ q.text = qtextInput.innerHTML; });
      qtextBox.querySelectorAll('.tb-btn[data-cmd]').forEach(function(btn){
        btn.addEventListener('click', function(){
          qtextInput.focus();
          document.execCommand(btn.getAttribute('data-cmd'), false, null);
        });
      });

      var qImageBtn = buildFileIconButton(q.questionFile, 'image/*,audio/*', 'Upload gambar atau audio untuk pertanyaan', function(file){
        q.questionFile = file;
        render();
      });

      var typeWrap = document.createElement('div');
      typeWrap.className = 'type-select-wrap';
      typeWrap.innerHTML =
        '<svg class="type-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">' + iconSvg(q.type === 'pg' ? 'pg' : 'para') + '</svg>' +
        '<select data-role="typeSelect">' +
          '<option value="pg"' + (q.type === 'pg' ? ' selected' : '') + '>Pilihan Ganda</option>' +
          '<option value="paragraf"' + (q.type === 'paragraf' ? ' selected' : '') + '>Paragraf</option>' +
        '</select>' +
        '<svg class="chevron-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round">' + iconSvg('chevron') + '</svg>';
      typeWrap.querySelector('select').addEventListener('change', function(e){
        q.type = e.target.value;
        if (q.type === 'pg' && q.options.length === 0){
          q.options.push({ text: 'Opsi 1', file: null });
          q.correct = 0;
        }
        render();
      });

      qtextRow.appendChild(qtextBox);
      qtextRow.appendChild(qImageBtn);
      qtextRow.appendChild(typeWrap);
      card.appendChild(qtextRow);

      /* ---- Body: Pilihan Ganda atau Paragraf ---- */
      if (q.type === 'pg'){
        var optionsList = document.createElement('div');
        optionsList.className = 'options-list';

        q.options.forEach(function(opt, oIndex){
          var optRow = document.createElement('div');
          optRow.className = 'option-row' + (q.correct === oIndex ? ' is-correct' : '');

          var radio = document.createElement('button');
          radio.type = 'button';
          radio.className = 'option-radio';
          radio.setAttribute('aria-label', 'Tandai opsi ' + (oIndex + 1) + ' sebagai jawaban benar');
          radio.innerHTML = '<span class="dot"></span>';
          radio.addEventListener('click', function(){ q.correct = oIndex; render(); });

          var textInput = document.createElement('input');
          textInput.type = 'text';
          textInput.className = 'option-text';
          textInput.placeholder = 'Opsi ' + (oIndex + 1);
          textInput.value = opt.text;
          textInput.addEventListener('input', function(){ opt.text = textInput.value; });

          var imgBtn = buildFileIconButton(opt.file, 'image/*,audio/*', 'Upload gambar untuk opsi ' + (oIndex + 1), function(file){
            opt.file = file;
            render();
          });

          var removeBtn = document.createElement('button');
          removeBtn.type = 'button';
          removeBtn.className = 'option-remove';
          removeBtn.setAttribute('aria-label', 'Hapus opsi ' + (oIndex + 1));
          removeBtn.innerHTML = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round">' + iconSvg('x') + '</svg>';
          removeBtn.addEventListener('click', function(){
            q.options.splice(oIndex, 1);
            if (q.correct === oIndex) q.correct = q.options.length ? 0 : null;
            else if (q.correct > oIndex) q.correct--;
            render();
          });

          optRow.appendChild(radio);
          optRow.appendChild(textInput);
          optRow.appendChild(imgBtn);
          optRow.appendChild(removeBtn);
          optionsList.appendChild(optRow);
        });

        if (q.options.length < 4){
          var addRow = document.createElement('div');
          addRow.className = 'add-option-row';
          addRow.innerHTML =
            '<span class="option-radio"><span class="dot"></span></span>' +
            '<button type="button" class="add-option-btn">Tambahkan opsi</button>';
          addRow.querySelector('.add-option-btn').addEventListener('click', function(){
            q.options.push({ text: 'Opsi ' + (q.options.length + 1), file: null });
            render();
          });
          optionsList.appendChild(addRow);
        }

        card.appendChild(optionsList);
      } else {
        var preview = document.createElement('div');
        preview.className = 'paragraf-preview';
        preview.innerHTML = '<div class="paragraf-preview-line">Teks jawaban panjang</div>';
        card.appendChild(preview);
      }

      /* ---- Control rail ---- */
      var rail = document.createElement('div');
      rail.className = 'control-rail';

      var addBtn = document.createElement('button');
      addBtn.type = 'button';
      addBtn.className = 'rail-btn';
      addBtn.setAttribute('aria-label', 'Tambah pertanyaan baru setelah Pertanyaan ' + (qIndex + 1));
      addBtn.innerHTML = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round">' + iconSvg('plus') + '</svg>';
      addBtn.addEventListener('click', function(){
        questions.splice(qIndex + 1, 0, {
          id: nextId++, type: 'pg', text: '', questionFile: null,
          options: [{ text: 'Opsi 1', file: null }], correct: 0
        });
        render();
      });

      var dupBtn = document.createElement('button');
      dupBtn.type = 'button';
      dupBtn.className = 'rail-btn';
      dupBtn.setAttribute('aria-label', 'Duplikat Pertanyaan ' + (qIndex + 1));
      dupBtn.innerHTML = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">' + iconSvg('copy') + '</svg>';
      dupBtn.addEventListener('click', function(){
        var clone = JSON.parse(JSON.stringify(q));
        clone.id = nextId++;
        clone.options.forEach(function(o){ o.file = null; });
        clone.questionFile = null;
        questions.splice(qIndex + 1, 0, clone);
        render();
      });

      var delBtn = document.createElement('button');
      delBtn.type = 'button';
      delBtn.className = 'rail-btn is-delete';
      delBtn.setAttribute('aria-label', 'Hapus Pertanyaan ' + (qIndex + 1));
      delBtn.innerHTML = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">' + iconSvg('trash') + '</svg>';
      delBtn.addEventListener('click', function(){
        questions.splice(qIndex, 1);
        render();
      });

      rail.appendChild(addBtn);
      rail.appendChild(dupBtn);
      rail.appendChild(delBtn);

      row.appendChild(card);
      row.appendChild(rail);
      container.appendChild(row);
    });
  }

  function buildFileIconButton(file, accept, label, onChange){
    var wrap = document.createElement('button');
    wrap.type = 'button';
    wrap.className = 'icon-btn-circle' + (file ? ' has-file' : '');
    wrap.setAttribute('aria-label', label);
    wrap.title = file ? file.name : label;
    wrap.innerHTML =
      '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">' + iconSvg('image') + '</svg>' +
      (file ? '<span class="file-badge"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round">' + iconSvg('check') + '</svg></span>' : '');

    var input = document.createElement('input');
    input.type = 'file';
    input.accept = accept;
    input.hidden = true;
    input.addEventListener('change', function(){
      if (input.files && input.files[0]) onChange(input.files[0]);
    });

    wrap.appendChild(input);
    wrap.addEventListener('click', function(){ input.click(); });
    return wrap;
  }

  document.getElementById('emptyAddBtn').addEventListener('click', function(){
    questions.push({ id: nextId++, type: 'pg', text: '', questionFile: null, options: [{ text: 'Opsi 1', file: null }], correct: 0 });
    render();
  });

  document.getElementById('saveBtn').addEventListener('click', function(){
    // TODO: kirim `questions` (dan file terlampir) ke backend di sini.
    window.location.href = 'tutor-modul-pembelajaran.html';
  });

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
