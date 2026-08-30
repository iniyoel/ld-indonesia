<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>LD Indonesia</title>
<link rel="icon" type="image/jpeg" href="{{ asset('images/logo-ld.jpeg') }}">
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
.app-shell{ 
  display: flex; 
  min-height: 100vh; 
  width: 100%;
}

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

.main-col{ 
  flex: 1 1 0%; 
  min-width: 0; 
  display: flex; 
  flex-direction: column; 
}

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

.page-content{ 
  padding: 32px 40px 60px; 
  max-width: 1180px; 
  width: 100%; 
  margin: 0 auto; 
  box-sizing: border-box;
  overflow-x: hidden;
}

.back-link{
  display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 10px 18px;
  border-radius: var(--radius-pill); border: 1.5px solid var(--pink-light); color: var(--pink-dark);
  font-weight: 700; font-size: 0.9rem; margin-bottom: 18px;
}
.back-link:hover{ background: var(--pink-pale); }
.back-link svg{ width: 16px; height: 16px; }

.page-heading{ margin-bottom: 22px; }
.page-heading h1{ font-size: 1.6rem; }
.page-heading p{ color: var(--gray-500); font-size: 0.92rem; margin-top: 4px; }

.module-info{
  background: var(--white);
  border: 1px solid var(--gray-100);
  border-left: 4px solid var(--pink);
  border-radius: var(--radius-md);
  box-shadow: var(--shadow-sm);
  padding: 16px 20px;
  margin-bottom: 22px;
  width: 100%;
  box-sizing: border-box;
}

/* ============ QUESTION ROW ============ */
.question-row{ 
  display: flex; 
  gap: 16px; 
  align-items: flex-start; 
  margin-bottom: 20px; 
  width: 100%;
  min-width: 0;
}
.question-card{
  flex-grow: 1; 
  min-width: 0;
  background: var(--white); 
  border-radius: var(--radius-lg); 
  box-shadow: var(--shadow-md);
  border: 1px solid var(--gray-100); 
  padding: 26px 28px;
  box-sizing: border-box;
}
.question-card h2{ font-size: 1.15rem; margin-bottom: 16px; }
.question-note{
  padding: 12px 14px;
  border-radius: var(--radius-sm);
  background: var(--pink-pale);
  color: var(--gray-600);
  font-size: 0.83rem;
  line-height: 1.55;
  margin-bottom: 18px;
}

.type-select-wrap{ position: relative; width: 100%; }
.type-select-wrap select{
  appearance: none; -webkit-appearance: none; width: 100%; font: inherit; font-weight: 700; font-size: 0.94rem;
  padding: 13px 40px 13px 42px; border: 1.5px solid var(--gray-200); border-radius: var(--radius-sm);
  background: var(--white); color: var(--navy); cursor: pointer;
}
.type-select-wrap select:focus{ outline: none; border-color: var(--pink); box-shadow: 0 0 0 4px var(--pink-pale); }
.type-select-wrap .type-icon{ position: absolute; left: 14px; top: 50%; transform: translateY(-50%); width: 16px; height: 16px; color: var(--gray-500); pointer-events: none; }
.type-select-wrap .chevron-icon{ position: absolute; right: 14px; top: 50%; transform: translateY(-50%); width: 16px; height: 16px; color: var(--gray-500); pointer-events: none; }

/* ---- Pilihan ganda options ---- */
.options-list{ margin-top: 20px; display: flex; flex-direction: column; gap: 8px; width: 100%; }
.option-row{ 
  display: flex; 
  align-items: center; 
  gap: 12px; 
  padding: 8px 0; 
  width: 100%;
  min-width: 0;
  flex-wrap: wrap;
}
.option-radio{
  width: 22px; height: 22px; border-radius: 50%; border: 1.5px solid var(--gray-300); flex-shrink: 0;
  display: flex; align-items: center; justify-content: center; cursor: pointer;
}
.option-radio .dot{ width: 11px; height: 11px; border-radius: 50%; background: transparent; }
.option-row.is-correct .option-radio{ border-color: var(--navy); }
.option-row.is-correct .option-radio .dot{ background: var(--navy); }
.option-text{
  flex: 1 1 180px; 
  min-width: 0; 
  font: inherit; 
  font-size: 0.94rem; 
  color: var(--gray-800);
  border: none; 
  border-bottom: 1px solid var(--gray-200); 
  padding: 6px 2px; 
  background: transparent;
}
.option-text:focus{ border-bottom-color: var(--pink); outline: none; }
.option-text::placeholder{ color: var(--gray-400); }

.option-image-btn{
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 6px;
  flex-shrink: 0;
  min-height: 34px;
  padding: 7px 11px;
  border: 1px solid var(--gray-200);
  border-radius: 9px;
  background: var(--white);
  color: var(--gray-600);
  font-size: 0.78rem;
  font-weight: 700;
  cursor: pointer;
}
.option-image-btn:hover{
  background: var(--pink-pale);
  border-color: var(--pink-light);
  color: var(--pink-dark);
}
.option-image-btn.has-file{
  background: var(--green-bg);
  border-color: #B7E4CB;
  color: var(--green);
}
.option-image-btn svg{ width: 15px; height: 15px; flex-shrink: 0; }
.option-remove{ width: 26px; height: 26px; border-radius: 50%; color: var(--gray-400); flex-shrink: 0; cursor: pointer; }
.option-remove:hover{ background: var(--red-bg); color: var(--red); }
.option-remove svg{ width: 14px; height: 14px; }

.add-option-btn{
  margin-top: 10px;
  color: var(--pink-dark);
  font-size: 0.88rem;
  font-weight: 700;
  cursor: pointer;
  align-self: flex-start;
}
.add-option-btn:hover{ text-decoration: underline; }

.dropzone-btn{
  background: var(--pink-pale); color: var(--pink-dark); font-weight: 700; font-size: 0.88rem;
  padding: 8px 18px; border-radius: var(--radius-pill); cursor: pointer;
  display: inline-block;
}
.dropzone-btn:hover{ background: var(--pink-light); }
.dropzone-file-name{ font-size: 0.84rem; color: var(--gray-600); overflow-wrap: anywhere; word-break: break-all; }

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
  display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 12px 24px; border-radius: var(--radius-pill);
  background: var(--pink-pale); color: var(--pink-dark); font-weight: 700; font-size: 0.92rem;
}
.empty-add-btn:hover{ background: var(--pink-light); }
.empty-add-btn svg{ width: 16px; height: 16px; }

/* ============ FOOTER ACTIONS ============ */
.form-actions{ display: flex; justify-content: space-between; align-items: center; gap: 14px; margin-top: 14px; flex-wrap: wrap; width: 100%; }
.btn-save{
  display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 14px 32px; border-radius: var(--radius-pill);
  background: linear-gradient(135deg, var(--pink) 0%, var(--pink-dark) 100%); color: var(--white);
  font-weight: 700; font-size: 0.96rem; box-shadow: 0 12px 28px rgba(236,78,140,0.22);
  transition: transform 0.18s ease;
}
.btn-save:hover{ transform: translateY(-2px); }
.btn-save:disabled{ opacity: 0.6; cursor: not-allowed; transform: none; }
.btn-save svg{ width: 17px; height: 17px; }

/* ============ RESPONSIVE BREAKPOINTS ============ */
@media (max-width: 980px){
  .sidebar{ position: fixed; left: 0; top: 0; transform: translateX(-100%); transition: transform 0.22s ease; box-shadow: var(--shadow-md); }
  .sidebar.open{ transform: translateX(0); }
  .sidebar-close{ display: flex; align-items: center; justify-content: center; width: 34px; height: 34px; border-radius: 8px; margin-left: auto; color: var(--navy); }
  .sidebar-close:hover{ background: rgba(30,42,71,0.06); }
  .sidebar-brand{ justify-content: space-between; }
  .menu-toggle{ display: flex; }
  .topbar{ padding: 0 20px; }
  .page-content{ padding: 24px 16px 48px; }
  .backdrop{ display: none; position: fixed; inset: 0; background: rgba(30,42,71,0.35); z-index: 50; }
  .backdrop.show{ display: block; }
  .question-row{ flex-direction: column; gap: 12px; }
  .question-card{ padding: 20px 18px; width: 100%; }
  .control-rail{ flex-direction: row; width: 100%; justify-content: flex-end; }
}

@media (max-width: 640px){
  .page-content{
    padding: 16px 12px 36px;
  }
  .page-heading h1{
    font-size: 1.35rem;
  }
  .question-card{
    padding: 18px 14px;
    border-radius: var(--radius-md);
  }
  .question-card h2{
    font-size: 1.05rem;
    margin-bottom: 12px;
  }
  .form-actions{
    flex-direction: column-reverse;
    gap: 12px;
  }
  .back-link,
  .btn-save{
    width: 100%;
  }
  .option-row{
    gap: 8px;
  }
  .option-image-btn{
    padding: 6px 9px;
    font-size: 0.74rem;
  }
}
</style>
</head>
<body>
<a href="#mainContent" class="skip-link">Langsung ke konten utama</a>

<div class="app-shell">
  <div class="backdrop" id="backdrop"></div>
  <x-sidebar.admin />

  <!-- ============ MAIN ============ -->
  <div class="main-col">
    <x-header.admin />

    <main class="page-content" id="mainContent">
      <a href="{{ route('modul.edit', $module) }}" class="back-link">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>
        Kembali ke Form Modul
      </a>

      <div class="page-heading">
        <h1>Tambah Soal</h1>
        <p>Tambahkan soal sesuai kategori modul yang telah dipilih.</p>
      </div>

      <div class="module-info">
        <strong>{{ $module->judul }}</strong>
        <div style="display:flex;flex-wrap:wrap;gap:8px;margin-top:8px;">
          <span style="display:inline-flex;padding:5px 10px;border-radius:999px;background:var(--pink-pale);color:var(--pink-dark);font-size:.78rem;font-weight:700;">{{ $module->level }}</span>
          <span style="display:inline-flex;padding:5px 10px;border-radius:999px;background:var(--gray-100);color:var(--gray-600);font-size:.78rem;font-weight:700;">
            @switch($module->kategori)
              @case('materi') Materi @break
              @case('simulasi_horen') Simulasi Hören @break
              @case('simulasi_lesen') Simulasi Lesen @break
              @case('simulasi_schreiben') Simulasi Schreiben @break
              @case('simulasi_sprechen') Simulasi Sprechen @break
              @default {{ $module->kategori }}
            @endswitch
          </span>
        </div>
      </div>

      <div id="errorAlert" style="display:none;margin-bottom:18px;padding:14px 16px;border-radius:16px;background:var(--red-bg);border:1px solid #f5c2c0;color:var(--red);font-size:.88rem;"></div>
      <div id="successAlert" style="display:none;margin-bottom:18px;padding:14px 16px;border-radius:16px;background:var(--green-bg);border:1px solid #B7E4CB;color:var(--green);font-size:.88rem;"></div>

      <div id="questionsContainer"></div>

      <div class="empty-questions" id="emptyQuestions" hidden>
        <p>Belum ada pertanyaan. Klik tombol di bawah untuk menambahkan pertanyaan pertama.</p>
        <button type="button" class="empty-add-btn" id="emptyAddBtn">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round"><path d="M12 5v14M5 12h14"/></svg>
          Tambah Pertanyaan
        </button>
      </div>

      <div class="form-actions">
        <a href="{{ route('modul.edit', $module) }}" class="back-link" style="margin-bottom:0;">Kembali</a>
        <button type="button" class="btn-save" id="saveBtn">
          Simpan Semua Soal
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
        </button>
      </div>
    </main>
  </div>
</div>

<x-toast />

<script>
(function(){
  "use strict";

  var category = @json($module->kategori);
  var rawQuestions = @json($questions ?? []);
  var storageBaseUrl = "{{ asset('storage') }}/";

  var configMap = {
    materi: { type: 'pilihan_ganda', label: 'Pilihan Ganda', note: 'Isi 4 pilihan jawaban dan tandai satu jawaban yang benar.' },
    simulasi_horen: { type: 'pilihan_ganda', label: 'Pilihan Ganda + Audio', note: 'Upload audio untuk setiap soal Hören. Pilihan jawaban berjumlah 4.' },
    simulasi_lesen: { type: 'pilihan_ganda', label: 'Pilihan Ganda + Teks Bacaan', note: 'Teks bacaan sudah tersimpan pada modul. Setiap soal memiliki 4 pilihan jawaban.' },
    simulasi_schreiben: { type: 'paragraf', label: 'Paragraf / Essay', note: 'Siswa menjawab dengan tulisan panjang. Tidak ada pilihan ganda.' },
    simulasi_sprechen: { type: 'paragraf', label: 'Pertanyaan / Topik Berbicara', note: 'Isi pertanyaan atau topik yang akan digunakan siswa untuk latihan berbicara.' }
  };

  function getActiveConfig(cat) {
    if (cat === 'simulasi_schreiben' || cat === 'simulasi_sprechen') {
      return { type: 'paragraf', label: 'Paragraf / Essay', note: 'Siswa menjawab dengan tulisan panjang. Tidak ada pilihan ganda.' };
    }
    return configMap[cat] || configMap.materi;
  }

  var questions = [];
  var nextId = 1;
  var container = document.getElementById('questionsContainer');
  var empty = document.getElementById('emptyQuestions');
  var errorAlert = document.getElementById('errorAlert');
  var successAlert = document.getElementById('successAlert');

  function icon(name){
    var x={
      plus:'<path d="M12 5v14M5 12h14"/>',
      copy:'<rect x="9" y="9" width="12" height="12" rx="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/>',
      trash:'<path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/>',
      x:'<path d="M18 6 6 18M6 6l12 12"/>',
      upload:'<path d="M12 16V4"/><path d="m7 9 5-5 5 5"/><path d="M5 20h14"/>',
      pg:'<circle cx="12" cy="12" r="9"/><path d="m9 12 2 2 4-4"/>',
      para:'<path d="M3 6h18M3 12h18M3 18h12"/>'
    }; return x[name]||'';
  }

  function newQuestion(){
    var currentConfig = getActiveConfig(category);
    var q={id:nextId++,type:currentConfig.type,text:'',questionFile:null,options:[],correct:null,penjelasan:''};
    if(currentConfig.type==='pilihan_ganda'){
      q.options=[{text:'',file:null},{text:'',file:null},{text:'',file:null},{text:'',file:null}];
      q.correct=0;
    }
    return q;
  }

  function alertError(msg){
    if (successAlert) successAlert.style.display='none'; 
    if (errorAlert) {
      errorAlert.textContent=msg; 
      errorAlert.style.display='block';
    }
    window.scrollTo({top:0,behavior:'smooth'});
  }
  function clearAlert(){
    if (errorAlert) errorAlert.style.display='none';
    if (successAlert) successAlert.style.display='none';
  }

  function fileBox(file, existingUrl, accept, buttonText, callback){
      var box = document.createElement('div');
      box.style.cssText =
          'border:1.5px dashed var(--gray-300);' +
          'border-radius:var(--radius-md);' +
          'background:var(--gray-50);' +
          'padding:16px;' +
          'display:flex;' +
          'flex-direction:column;' +
          'align-items:flex-start;' +
          'gap:12px;' +
          'width:100%;' +
          'box-sizing:border-box;';

      var top = document.createElement('div');
      top.style.cssText =
          'display:flex;' +
          'align-items:center;' +
          'gap:12px;' +
          'width:100%;' +
          'flex-wrap:wrap;';

      top.innerHTML =
          '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" ' +
          'stroke="currentColor" stroke-width="1.8" stroke-linecap="round" ' +
          'stroke-linejoin="round" style="color:var(--pink-dark);flex-shrink:0;">' +
          icon('upload') +
          '</svg>';

      var label = document.createElement('label');
      label.className = 'dropzone-btn';
      label.textContent = file
          ? 'Ganti Audio'
          : (existingUrl ? 'Ganti Audio' : buttonText);

      var input = document.createElement('input');
      input.type = 'file';
      input.accept = accept;
      input.hidden = true;

      var name = document.createElement('span');
      name.className = 'dropzone-file-name';

      if (file) {
          name.textContent = file.name;
          name.style.color = 'var(--green)';
      } else if (existingUrl) {
          name.textContent = 'Audio tersimpan';
          name.style.color = 'var(--green)';
      } else {
          name.textContent = 'Belum ada file dipilih';
      }

      input.addEventListener('change', function(){
          if(input.files && input.files[0]){
              callback(input.files[0]);
          }
      });

      label.appendChild(input);
      top.appendChild(label);
      top.appendChild(name);

      box.appendChild(top);

      if (file || existingUrl) {
          var audio = document.createElement('audio');
          audio.controls = true;
          audio.style.width = '100%';

          if (file) {
              audio.src = URL.createObjectURL(file);
          } else if (existingUrl) {
              audio.src = existingUrl;
          }

          box.appendChild(audio);
      }

      return box;
  }

  function render(){
    if (!container) return;
    container.innerHTML=''; 
    if (empty) empty.hidden=questions.length>0;
    var currentConfig = getActiveConfig(category);

    questions.forEach(function(q,qi){
      var row=document.createElement('div'); row.className='question-row';
      var card=document.createElement('div'); card.className='question-card';
      var h=document.createElement('h2'); h.textContent='Pertanyaan '+(qi+1); card.appendChild(h);

      var note=document.createElement('div'); note.className='question-note'; note.textContent=currentConfig.note; card.appendChild(note);

      var label=document.createElement('label'); label.textContent=category==='simulasi_sprechen'?'Pertanyaan / Topik Berbicara':'Pertanyaan';
      label.style.cssText='display:block;font-family:var(--font-display);font-weight:700;font-size:1rem;color:var(--navy);margin-bottom:8px;';
      var textarea=document.createElement('textarea'); textarea.className='qtext-input'; textarea.placeholder=category==='simulasi_sprechen'?'Contoh: Perkenalkan diri Anda dan ceritakan kegiatan sehari-hari.':'Tulis pertanyaan di sini...'; textarea.value=q.text;
      textarea.style.cssText='width:100%;min-height:110px;padding:12px 14px;border:1.5px solid var(--gray-200);border-radius:var(--radius-sm);resize:vertical;font-family:inherit;font-size:0.94rem;';
      textarea.addEventListener('input',function(){q.text=textarea.value;});
      card.appendChild(label); card.appendChild(textarea);

      var typeLabel=document.createElement('label'); typeLabel.textContent='Bentuk Soal'; typeLabel.style.cssText='display:block;font-family:var(--font-display);font-weight:700;font-size:1rem;color:var(--navy);margin:18px 0 8px;';
      var type=document.createElement('div'); type.className='type-select-wrap'; type.style.width='100%';
      type.innerHTML='<svg class="type-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">'+icon(currentConfig.type==='pilihan_ganda'?'pg':'para')+'</svg><select disabled><option>'+currentConfig.label+'</option></select>';
      card.appendChild(typeLabel); card.appendChild(type);

      if(category==='simulasi_horen'){
        var audioLabel=document.createElement('label'); audioLabel.textContent='Audio Soal (MP3/WAV/M4A)'; audioLabel.style.cssText='display:block;font-family:var(--font-display);font-weight:700;font-size:1rem;color:var(--navy);margin:18px 0 8px;';
        card.appendChild(audioLabel);
        card.appendChild(fileBox(
            q.questionFile,
            q.existingFileUrl,
            'audio/mpeg,audio/wav,audio/x-wav,audio/mp4,audio/x-m4a',
            q.questionFile || q.existingFileUrl ? 'Ganti Audio' : 'Pilih Audio',
            function(file){
                q.questionFile = file;
                q.existingFileUrl = null;
                render();
            }
        ));
      }

      if(currentConfig.type==='pilihan_ganda'){
        var optLabel=document.createElement('label'); optLabel.textContent='Pilihan Jawaban'; optLabel.style.cssText='display:block;font-family:var(--font-display);font-weight:700;font-size:1rem;color:var(--navy);margin-top:20px;'; card.appendChild(optLabel);
        var list=document.createElement('div'); list.className='options-list';
        q.options.forEach(function(opt,oi){
          var r=document.createElement('div');
          r.className='option-row'+(q.correct===oi?' is-correct':'');

          var radio=document.createElement('button');
          radio.type='button';
          radio.className='option-radio';
          radio.innerHTML='<span class="dot"></span>';
          radio.title='Tandai jawaban benar';
          radio.addEventListener('click',function(){
            q.correct=oi;
            render();
          });

          var input=document.createElement('input');
          input.type='text';
          input.className='option-text';
          input.placeholder='Opsi '+(oi+1)+(category==='simulasi_horen'?' — teks atau gambar':'');
          input.value=opt.text || '';
          input.addEventListener('input',function(){
            opt.text=input.value;
            if(category==='simulasi_horen' && input.value.trim() && opt.file){
              opt.file=null;
              render();
            }
          });

          r.appendChild(radio);
          r.appendChild(input);

          if(category==='simulasi_horen'){
              var imageWrap = document.createElement('div');
              imageWrap.style.cssText =
                  'display:flex;' +
                  'align-items:center;' +
                  'gap:8px;' +
                  'flex-shrink:0;';

              if(opt.file || opt.existingFileUrl){
                  var preview = document.createElement('img');
                  preview.style.cssText =
                      'width:48px;' +
                      'height:48px;' +
                      'object-fit:cover;' +
                      'border-radius:8px;' +
                      'border:1px solid var(--gray-200);' +
                      'background:var(--white);';

                  if(opt.file){
                      preview.src = URL.createObjectURL(opt.file);
                  } else {
                      preview.src = opt.existingFileUrl;
                  }
                  imageWrap.appendChild(preview);
              }

              var imageLabel = document.createElement('label');
              imageLabel.className =
                  'option-image-btn' +
                  ((opt.file || opt.existingFileUrl) ? ' has-file' : '');

              imageLabel.title =
                  (opt.file || opt.existingFileUrl)
                      ? 'Ganti gambar pilihan'
                      : 'Upload gambar pilihan';

              var imageInput = document.createElement('input');
              imageInput.type = 'file';
              imageInput.accept = 'image/jpeg,image/png,image/webp';
              imageInput.hidden = true;

              imageInput.addEventListener('change', function(){
                  if(imageInput.files && imageInput.files[0]){
                      opt.file = imageInput.files[0];
                      opt.existingFileUrl = null;
                      opt.text = '';
                      render();
                  }
              });

              imageLabel.innerHTML =
                  '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" ' +
                  'stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">' +
                  '<rect x="3" y="3" width="18" height="18" rx="2"/>' +
                  '<circle cx="8.5" cy="8.5" r="1.5"/>' +
                  '<path d="m21 15-5-5L5 21"/>' +
                  '</svg>' +
                  (
                      opt.file
                          ? 'Gambar baru'
                          : (opt.existingFileUrl ? 'Ganti gambar' : 'Pilih gambar')
                  );

              imageLabel.appendChild(imageInput);
              imageWrap.appendChild(imageLabel);
              r.appendChild(imageWrap);
          }

          var del=document.createElement('button');
          del.type='button';
          del.className='option-remove';
          del.innerHTML='<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round">'+icon('x')+'</svg>';
          del.addEventListener('click',function(){
            if(q.options.length<=2){
              alertError('Soal pilihan ganda minimal memiliki 2 opsi.');
              return;
            }
            q.options.splice(oi,1);
            if(q.correct===oi) q.correct=0;
            else if(q.correct>oi) q.correct--;
            render();
          });

          r.appendChild(del);
          list.appendChild(r);
        });

        if(q.options.length<4){
          var add=document.createElement('button');
          add.type='button';
          add.className='add-option-btn';
          add.textContent='+ Tambahkan opsi';
          add.addEventListener('click',function(){
            q.options.push({text:'',file:null});
            render();
          });
          list.appendChild(add);
        }
        card.appendChild(list);
      }

      var expLabel=document.createElement('label'); 
      expLabel.textContent='Penjelasan Jawaban (opsional)'; 
      expLabel.style.cssText='display:block;font-family:var(--font-display);font-weight:700;font-size:1rem;color:var(--navy);margin:20px 0 8px;';
      var exp=document.createElement('textarea'); 
      exp.placeholder='Penjelasan jawaban untuk halaman review siswa.'; 
      exp.value=q.penjelasan; 
      exp.style.cssText='width:100%;min-height:80px;padding:12px 14px;border:1.5px solid var(--gray-200);border-radius:var(--radius-sm);resize:vertical;font-family:inherit;font-size:0.94rem;'; 
      exp.addEventListener('input',function(){q.penjelasan=exp.value;});
      card.appendChild(expLabel);
      card.appendChild(exp);

      var rail=document.createElement('div');rail.className='control-rail';
      var addBtn=document.createElement('button');addBtn.type='button';addBtn.className='rail-btn';addBtn.title='Tambah pertanyaan';addBtn.innerHTML='<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round">'+icon('plus')+'</svg>';addBtn.addEventListener('click',function(){questions.splice(qi+1,0,newQuestion());render();});
      var dup=document.createElement('button');
      dup.type='button';
      dup.className='rail-btn';
      dup.title='Duplikat pertanyaan';
      dup.innerHTML='<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">'+icon('copy')+'</svg>';
      dup.addEventListener('click', function(){
        var c = {
          id: nextId++,
          serverQuestionId: null,
          type: q.type,
          text: q.text,
          questionFile: null,
          existingFileUrl: null,
          options: q.options.map(function(o){
            return { id: null, text: o.text, file: null, existingFileUrl: null };
          }),
          correct: q.correct,
          penjelasan: q.penjelasan
        };
        questions.splice(qi + 1, 0, c);
        render();
      });
      var delQ=document.createElement('button');delQ.type='button';delQ.className='rail-btn is-delete';delQ.title='Hapus pertanyaan';delQ.innerHTML='<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">'+icon('trash')+'</svg>';delQ.addEventListener('click',function(){if(questions.length===1){alertError('Minimal harus ada satu soal.');return;}questions.splice(qi,1);render();});
      rail.appendChild(addBtn);rail.appendChild(dup);rail.appendChild(delQ);row.appendChild(card);row.appendChild(rail);container.appendChild(row);
    });
  }

  var emptyAddBtn = document.getElementById('emptyAddBtn');
  if (emptyAddBtn) {
    emptyAddBtn.addEventListener('click',function(){questions.push(newQuestion());render();});
  }

  function validate(){
    if(!questions.length){alertError('Minimal harus ada satu soal.');return false;}
    var currentConfig = getActiveConfig(category);

    for(var i=0;i<questions.length;i++){
      var q=questions[i],n=i+1;
      if(!q.text||!q.text.trim()){alertError('Pertanyaan '+n+' belum diisi.');return false;}
      if(
          category === 'simulasi_horen' &&
          !q.questionFile &&
          !q.existingFileUrl
      ){
          alertError('Soal Hören nomor '+n+' wajib memiliki audio.');
          return false;
      }
      if(currentConfig.type==='pilihan_ganda'){
        if(q.options.length!==4){alertError('Soal nomor '+n+' harus memiliki tepat 4 opsi.');return false;}
        for(var j=0;j<4;j++){
          var option=q.options[j];
          var hasText=!!(option.text && option.text.trim());
          var hasImage = !!option.file || !!option.existingFileUrl;

          if(category==='simulasi_horen'){
            if(!hasText && !hasImage){
              alertError('Opsi '+(j+1)+' pada soal Hören nomor '+n+' harus diisi dengan teks atau gambar.');
              return false;
            }
            if(hasText && hasImage){
              alertError('Opsi '+(j+1)+' pada soal Hören nomor '+n+' hanya boleh berupa teks atau gambar.');
              return false;
            }
          }else{
            if(!hasText){
              alertError('Opsi '+(j+1)+' pada soal nomor '+n+' belum diisi.');
              return false;
            }
          }
        }

        if(q.correct===null||q.correct<0||q.correct>3){
          alertError('Tentukan jawaban benar pada soal nomor '+n+'.');
          return false;
        }
      }
    }
    return true;
  }

  var saveBtn = document.getElementById('saveBtn');
  if (saveBtn) {
    saveBtn.addEventListener('click', async function(){
      clearAlert();
      if(!validate()) return;

      var btn = document.getElementById('saveBtn');
      btn.disabled = true;
      btn.textContent = 'Menyimpan...';

      var csrf = document.querySelector('meta[name="csrf-token"]') ?
                 document.querySelector('meta[name="csrf-token"]').getAttribute('content') :
                 '{{ csrf_token() }}';

      var storeUrl = "{{ route('modul.soal.store', $module) }}";
      var updateUrlTemplate = "{{ route('modul.soal.update', [$module, ':question_id']) }}";

      try {
        for(var i = 0; i < questions.length; i++){
          var q = questions[i];
          var fd = new FormData();

          fd.append('tipe', q.type);
          fd.append('pertanyaan', q.text.trim());
          fd.append('penjelasan', q.penjelasan || '');

          if(category === 'simulasi_horen' && q.questionFile){
            fd.append('file', q.questionFile);
          }

          if(q.type === 'pilihan_ganda'){
            q.options.forEach(function(o, index){
              if (o.id) {
                fd.append('options[' + index + '][id]', o.id);
              }
              fd.append('options[' + index + '][teks]', (o.text || '').trim());

              if(category === 'simulasi_horen' && o.file){
                fd.append('options[' + index + '][file]', o.file);
              }
            });
            fd.append('correct_option', String(q.correct));
          }

          var targetUrl = storeUrl;
          if (q.serverQuestionId) {
            targetUrl = updateUrlTemplate.replace(':question_id', q.serverQuestionId);
          }

          var response = await fetch(targetUrl, {
            method: 'POST',
            headers: {
              'X-CSRF-TOKEN': csrf,
              'Accept': 'application/json'
            },
            body: fd
          });

          if(!response.ok){
            var msg = 'Gagal menyimpan soal nomor ' + (i + 1) + '.';
            try {
              var data = await response.json();
              if(data.message) msg = data.message;
              if(data.errors){
                var key = Object.keys(data.errors)[0];
                if(key && data.errors[key] && data.errors[key][0]) msg = data.errors[key][0];
              }
            } catch(e){}
            throw new Error(msg);
          }
        }

        var finish = await fetch("{{ route('modul.soal.finish', $module) }}", {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': csrf,
            'Accept': 'application/json'
          }
        });

        if(!finish.ok){
          var errorData = await finish.json().catch(() => ({}));
          throw new Error(errorData.message || 'Gagal menyelesaikan modul.');
        }

        if (successAlert) {
          successAlert.textContent = 'Semua soal berhasil disimpan.';
          successAlert.style.display = 'block';
        }
        setTimeout(function(){
          window.location.href = "{{ route('modul.index') }}";
        }, 700);

      } catch(error) {
        console.error(error);
        alertError(error.message || 'Terjadi kesalahan saat menyimpan soal.');
        btn.disabled = false;
        btn.textContent = 'Simpan Semua Soal';
      }
    });
  }

  if (rawQuestions && rawQuestions.length > 0) {
    var activeCfg = getActiveConfig(category);
    questions = rawQuestions.map(function(q) {
      var mappedOptions = [];
      var correctIndex = 0;

      if (q.options && q.options.length > 0) {
        mappedOptions = q.options.map(function(opt, oi) {
          if (opt.is_correct || opt.benar) {
            correctIndex = oi;
          }
          return {
            id: opt.id || null,
            text: opt.teks || opt.text || '',
            file: null,
            existingFileUrl: opt.file_path 
              ? (storageBaseUrl + opt.file_path) 
              : null,
            removeExistingFile: false
          };
        });
      } else if (activeCfg.type === 'pilihan_ganda') {
        mappedOptions = [
          { id: null, text: '', file: null, existingFileUrl: null },
          { id: null, text: '', file: null, existingFileUrl: null },
          { id: null, text: '', file: null, existingFileUrl: null },
          { id: null, text: '', file: null, existingFileUrl: null }
        ];
      }

      return {
        id: nextId++,
        serverQuestionId: q.id || null,
        type: q.tipe || q.type || activeCfg.type,
        text: q.pertanyaan || q.text || '',
        questionFile: null,
        existingFileUrl: q.file_path ? (storageBaseUrl + q.file_path) : null,
        options: mappedOptions,
        correct: correctIndex,
        penjelasan: q.penjelasan || ''
      };
    });
  } else {
    questions.push(newQuestion());
  }

  render();

  var sidebar=document.getElementById('sidebar'),menuToggle=document.getElementById('menuToggle'),sidebarClose=document.getElementById('sidebarClose'),backdrop=document.getElementById('backdrop');
  function openSidebar(){
    if (sidebar) sidebar.classList.add('open');
    if (backdrop) backdrop.classList.add('show');
    if (menuToggle) menuToggle.setAttribute('aria-expanded','true');
  }
  function closeSidebar(){
    if (sidebar) sidebar.classList.remove('open');
    if (backdrop) backdrop.classList.remove('show');
    if (menuToggle) menuToggle.setAttribute('aria-expanded','false');
  }
  if (menuToggle) menuToggle.addEventListener('click',openSidebar);
  if (sidebarClose) sidebarClose.addEventListener('click',closeSidebar);
  if (backdrop) backdrop.addEventListener('click',closeSidebar);
})();
</script>
</body>
</html>