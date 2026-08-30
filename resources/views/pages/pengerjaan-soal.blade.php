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

.main-col{ flex-grow: 1; min-width: 0; display: flex; flex-direction: column; }

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

/* ============ CUSTOM HÖREN AUDIO PLAYER (PERSIS GAMBAR) ============ */
.custom-audio-player {
    display: flex;
    align-items: center;
    gap: 14px;
    width: 100%;
    background: #fdf2f5;
    border: 1px solid #f6d4de;
    border-radius: 14px;
    padding: 12px 18px;
    margin-bottom: 24px;
}

.custom-play-btn {
    width: 28px;
    height: 28px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--pink-dark);
    background: transparent;
    cursor: pointer;
    flex-shrink: 0;
}

.custom-play-btn svg {
    width: 20px;
    height: 20px;
    fill: var(--pink-dark);
}

.custom-time-display {
    font-size: 0.85rem;
    font-weight: 600;
    color: #555;
    min-width: 82px;
    user-select: none;
}

.custom-slider-container {
    flex-grow: 1;
    position: relative;
    display: flex;
    align-items: center;
    height: 24px;
    cursor: pointer;
}

.custom-slider-track {
    width: 100%;
    height: 6px;
    background: #e8c5d1;
    border-radius: 999px;
    position: relative;
    overflow: visible;
}

.custom-slider-fill {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    background: var(--pink-dark);
    border-radius: 999px;
    width: 0%;
}

.custom-slider-thumb {
    position: absolute;
    top: 50%;
    left: 0%;
    transform: translate(-50%, -50%);
    width: 14px;
    height: 14px;
    background: var(--pink-dark);
    border-radius: 50%;
    box-shadow: 0 1px 3px rgba(0,0,0,0.2);
    pointer-events: none;
}

.custom-volume-icon {
    width: 22px;
    height: 22px;
    color: var(--pink-dark);
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
}

.custom-volume-icon svg {
    width: 18px;
    height: 18px;
    fill: var(--pink-dark);
}

/* ============ GAMBAR PILIHAN HÖREN ============ */
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

.quiz-option.has-image {
    align-items: center;
}

.quiz-option.has-image .quiz-option-text {
    display: none;
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

@media (max-width: 640px) {
    .quiz-option-content img {
        max-width: 160px;
        max-height: 110px;
    }
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
      <a href="{{ route('page', ['page' => 'modul-pembelajaran']) }}" class="back-link">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 18l-6-6 6-6"/></svg>
        Kembali
      </a>
      <div class="quiz-header">
          <h1>{{ $module->judul }}</h1>
          <p>{{ $module->deskripsi }}</p>
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

    if (!QUESTIONS.length) {
        quizProgress.textContent = 'Belum ada soal';
        quizQuestion.textContent = 'Belum ada soal yang tersedia untuk modul ini.';
        quizOptions.innerHTML = '';
        nextBtn.disabled = true;
        markBtn.disabled = true;
        soalGrid.innerHTML = '<p style="color:var(--gray-500);font-size:.9rem;">Belum ada soal.</p>';
        return;
    }

    function formatTime(seconds) {
        if (isNaN(seconds)) return "0:00";
        var mins = Math.floor(seconds / 60);
        var secs = Math.floor(seconds % 60);
        return mins + ":" + (secs < 10 ? "0" : "") + secs;
    }

    function renderQuestion() {
        var idx = state.current;
        var q = QUESTIONS[idx];

        if (!q) return;

        quizProgress.textContent = 'Soal ' + (idx + 1) + ' dari ' + QUESTIONS.length;
        quizQuestion.textContent = q.text || '';

        // Hapus audio lama jika ada
        var oldAudioContainer = document.getElementById('customAudioContainer');
        if (oldAudioContainer) {
            oldAudioContainer.remove();
        }

        var isAudio = q.file_path && (
            q.file_type === 'audio' ||
            q.file_type === 'audio/mpeg' ||
            q.file_type === 'audio/mp3' ||
            q.file_type === 'audio/wav' ||
            q.file_type === 'mp3' ||
            q.file_type === 'wav' ||
            q.file_type === 'm4a'
        );

        if (isAudio) {
            var audioSrc = "{{ asset('storage') }}/" + String(q.file_path).replace(/^\/+/, '');
            
            // Buat HTML custom audio player persis seperti gambar referensi
            var playerHtml = `
                <div id="customAudioContainer" class="custom-audio-player">
                    <button type="button" id="customPlayBtn" class="custom-play-btn" aria-label="Play/Pause">
                        <!-- Icon Play -->
                        <svg id="playIconSvg" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                    </button>
                    <div id="customTimeDisplay" class="custom-time-display">0:00 / 0:30</div>
                    <div id="customSliderContainer" class="custom-slider-container">
                        <div class="custom-slider-track">
                            <div id="customSliderFill" class="custom-slider-fill"></div>
                            <div id="customSliderThumb" class="custom-slider-thumb"></div>
                        </div>
                    </div>
                    <div class="custom-volume-icon">
                        <svg viewBox="0 0 24 24"><path d="M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.85-5 6.71v2.06c4.01-.91 7-4.49 7-8.77s-2.99-7.86-7-8.77z"/></svg>
                    </div>
                    <audio id="hiddenHtmlAudio" src="${audioSrc}"></audio>
                </div>
            `;

            quizQuestion.insertAdjacentHTML('afterend', playerHtml);

            var htmlAudio = document.getElementById('hiddenHtmlAudio');
            var playBtn = document.getElementById('customPlayBtn');
            var playIconSvg = document.getElementById('playIconSvg');
            var timeDisplay = document.getElementById('customTimeDisplay');
            var sliderContainer = document.getElementById('customSliderContainer');
            var sliderFill = document.getElementById('customSliderFill');
            var sliderThumb = document.getElementById('customSliderThumb');

            var totalDuration = 30; // Default fallback jika metadata belum termuat

            htmlAudio.addEventListener('loadedmetadata', function() {
                if (!isNaN(htmlAudio.duration) && htmlAudio.duration > 0) {
                    totalDuration = htmlAudio.duration;
                }
                timeDisplay.textContent = formatTime(htmlAudio.currentTime) + " / " + formatTime(totalDuration);
            });

            htmlAudio.addEventListener('timeupdate', function() {
                var current = htmlAudio.currentTime;
                if (!isNaN(htmlAudio.duration) && htmlAudio.duration > 0) {
                    totalDuration = htmlAudio.duration;
                }
                timeDisplay.textContent = formatTime(current) + " / " + formatTime(totalDuration);
                
                var percent = (current / totalDuration) * 100;
                if (percent > 100) percent = 100;
                sliderFill.style.width = percent + "%";
                sliderThumb.style.left = percent + "%";
            });

            htmlAudio.addEventListener('ended', function() {
                playIconSvg.innerHTML = '<path d="M8 5v14l11-7z"/>';
            });

            playBtn.addEventListener('click', function() {
                if (htmlAudio.paused) {
                    htmlAudio.play();
                    playIconSvg.innerHTML = '<path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>'; // Icon Pause
                } else {
                    htmlAudio.pause();
                    playIconSvg.innerHTML = '<path d="M8 5v14l11-7z"/>'; // Icon Play
                }
            });

            sliderContainer.addEventListener('click', function(e) {
                var rect = sliderContainer.getBoundingClientRect();
                var clickX = e.clientX - rect.left;
                var width = rect.width;
                var clickPercent = clickX / width;
                if (clickPercent < 0) clickPercent = 0;
                if (clickPercent > 1) clickPercent = 1;

                htmlAudio.currentTime = clickPercent * totalDuration;
            });
        }

        quizOptions.innerHTML = '';

        if (MODULE_CATEGORY === 'simulasi_schreiben') {
            var writingBox = document.createElement('div');
            writingBox.className = 'writing-box';

            var label = document.createElement('label');
            label.className = 'writing-box-label';
            label.textContent = 'Jawaban Anda';

            var textarea = document.createElement('textarea');
            textarea.className = 'writing-answer';
            textarea.placeholder = 'Tuliskan jawaban Anda dalam bahasa Jerman...';
            textarea.value = state.answers[idx] || '';

            var meta = document.createElement('div');
            meta.className = 'writing-meta';

            var hint = document.createElement('span');
            hint.textContent = 'Tulis jawaban sesuai instruksi pada soal.';

            var counter = document.createElement('span');
            counter.className = 'writing-word-count';

            function updateWordCount() {
                var text = textarea.value.trim();
                var words = text ? text.split(/\s+/).filter(Boolean).length : 0;
                counter.textContent = words + ' kata';
            }

            textarea.addEventListener('input', function() {
                state.answers[idx] = textarea.value;
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

            markBtn.classList.toggle('is-marked', state.marked[idx]);
            markBtnLabel.textContent = state.marked[idx] ? 'Ditandai' : 'Tandai';

            prevBtn.hidden = idx === 0;
            var isLastSchreiben = idx === QUESTIONS.length - 1;
            nextBtnLabel.textContent = isLastSchreiben ? 'Selesai' : 'Selanjutnya';
            nextBtnIcon.innerHTML = isLastSchreiben ? '<path d="M20 6 9 17l-5-5"/>' : '<path d="M5 12h14M13 6l6 6-6 6"/>';
            return;
        }

        if (!Array.isArray(q.options) || q.options.length === 0) {
            return;
        }

        q.options.forEach(function(option, i) {
            var btn = document.createElement('button');
            btn.type = 'button';

            var isSelected = state.answers[idx] === option.id;

            btn.className = 'quiz-option' + (isSelected ? ' is-selected' : '');
            btn.setAttribute('role', 'radio');
            btn.setAttribute('aria-checked', isSelected ? 'true' : 'false');

            var content = '<span class="quiz-option-letter">' + LETTERS[i] + '</span>';

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
                var imageSrc = "{{ asset('storage') }}/" + String(option.file_path).replace(/^\/+/, '');
                content += '<span class="quiz-option-content"><img src="' + imageSrc + '" alt="Pilihan ' + LETTERS[i] + '" class="quiz-option-image"></span>';
                btn.classList.add('has-image');
            } else {
                content += '<span class="quiz-option-text">' + escapeHtml(option.text || '') + '</span>';
            }

            btn.innerHTML = content;

            btn.addEventListener('click', function() {
                state.answers[idx] = option.id;
                renderQuestion();
                renderGrid();
            });

            quizOptions.appendChild(btn);
        });

        markBtn.classList.toggle('is-marked', state.marked[idx]);
        markBtnLabel.textContent = state.marked[idx] ? 'Ditandai' : 'Tandai';

        prevBtn.hidden = idx === 0;

        var isLast = idx === QUESTIONS.length - 1;
        nextBtnLabel.textContent = isLast ? 'Selesai' : 'Selanjutnya';
        nextBtnIcon.innerHTML = isLast ? '<path d="M20 6 9 17l-5-5"/>' : '<path d="M5 12h14M13 6l6 6-6 6"/>';
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
            btn.setAttribute('aria-label', 'Ke soal ' + (i + 1));

            var classes = ['soal-btn'];

            if (i === state.current) {
                classes.push('is-current');
            }

            if (MODULE_CATEGORY === 'simulasi_sprechen') {
                // Sprechen
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
        state.marked[state.current] = !state.marked[state.current];
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
        var isLast = state.current === QUESTIONS.length - 1;

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
                    throw new Error(data.message || 'Gagal menyelesaikan pengerjaan.');
                }
                return data;
            })
            .then(function(data) {
                window.location.href = data.result_url;
            })
            .catch(function(error) {
                console.error(error);
                alert(error.message || 'Terjadi kesalahan saat menyelesaikan modul.');
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