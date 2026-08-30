<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LD Indonesia</title>
<link rel="icon" type="image/jpeg" href="{{ asset('images/logo-ld.jpeg') }}">
<meta name="description" content="Admin Detail hasil pengerjaan latihan — LD Indonesia.">
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

.quiz-option.is-selected{
  box-shadow:0 0 0 2px rgba(236,78,140,0.12);
}

#prevBtn[hidden] {
    display: none !important;
}

/* =========================================================
   MEDIA SOAL HÖREN
   ========================================================= */

.question-audio-box {
    margin: 0 0 22px;
    padding: 16px 18px;
    background: var(--pink-pale);
    border: 1px solid var(--pink-light);
    border-radius: var(--radius-sm);
}

.question-audio-label {
    font-family: var(--font-display);
    font-size: 0.88rem;
    font-weight: 800;
    color: var(--navy);
    margin-bottom: 9px;
}

.question-audio {
    width: 100%;
    display: block;
}


/* =========================================================
   GAMBAR PILIHAN HÖREN
   ========================================================= */

.quiz-option-media {
    flex: 0 0 auto;
    display: flex;
    align-items: center;
    justify-content: center;
}

.quiz-option-image {
    width: 180px;
    max-width: 100%;
    max-height: 150px;
    object-fit: contain;
    border-radius: 10px;
    border: 1px solid var(--gray-200);
    background: var(--white);
}

.quiz-option.has-image {
    align-items: center;
}

.quiz-option.has-image .quiz-option-text {
    display: none;
}


/* =========================================================
   JAWABAN ESSAY SCHREIBEN
   ========================================================= */

.essay-answer-box {
    margin-top: 8px;
    margin-bottom: 22px;
    border: 1.5px solid var(--pink-light);
    background: var(--pink-pale);
    border-radius: var(--radius-md);
    padding: 20px 22px;
}

.essay-answer-label {
    font-family: var(--font-display);
    color: var(--pink-dark);
    font-size: 0.92rem;
    font-weight: 800;
    margin-bottom: 10px;
}

.essay-answer {
    background: var(--white);
    border: 1px solid var(--gray-200);
    border-radius: var(--radius-sm);
    padding: 18px 20px;
    color: var(--gray-800);
    font-size: 0.98rem;
    line-height: 1.75;
    white-space: pre-wrap;
    overflow-wrap: anywhere;
}

.essay-empty {
    color: var(--gray-500);
    font-style: italic;
}

.soal-btn.is-answered {
    background: var(--pink-pale);
    border-color: var(--pink-light);
    color: var(--pink-dark);
}

.legend-swatch.answered {
    background: var(--pink-pale);
    border-color: var(--pink-light);
}

.legend-swatch.pending {
    background: #FFF3D6;
    border-color: #F3D99B;
}
</style>
</head>
<body>
<a href="#mainContent" class="skip-link">Langsung ke konten utama</a>
<div class="app-shell">
  <div class="backdrop" id="backdrop"></div>
    @if(Auth::user()->role === 'tutor')
        <x-sidebar.tutor />
    @else
        <x-sidebar.admin />
    @endif

  <div class="main-col">
    @if(Auth::user()->role === 'tutor')
        <x-header.tutor />
    @else
        <x-header.admin />
    @endif

    <main class="page-content" id="mainContent">
        <a
            href="{{ Auth::user()->role === 'tutor' ? route('tutor.siswa.detail', $student->id) : route('admin.siswa.detail', $student->id) }}"
            class="back-link"
        >
            <svg
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2.4"
                stroke-linecap="round"
                stroke-linejoin="round"
            >
                <path d="M15 18l-6-6 6-6"/>
            </svg>
            Kembali
        </a>

      <section class="result-panel" aria-labelledby="resultTitle">
        <div class="result-head">
          <h1 id="resultTitle">{{ $module->judul }}</h1>
          @if($attempt->nilai !== null)
              <span class="score-chip" id="scoreChip">
                  Nilai: {{ number_format($attempt->nilai, 0) }}
              </span>
          @else
              <span class="score-chip" id="scoreChip">
                  Menunggu Penilaian
              </span>
          @endif
        </div>
        <p class="result-desc">
            Hasil pengerjaan modul
            @if($attempt->selesai_pada)
                — selesai pada
                {{ $attempt->selesai_pada->format('d M Y, H:i') }}
            @endif
        </p>

        <div class="quiz-layout">
          <section class="quiz-card" aria-label="Detail jawaban soal">
            <p class="quiz-progress" id="quizProgress">Soal 1 dari {{ $questions->count() }}</p>
            <p class="quiz-question" id="quizQuestion"></p>

            <div class="quiz-options" id="quizOptions"></div>

            <div class="explanation-box">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M9.5 9a2.5 2.5 0 0 1 5 0c0 1.5-2 1.8-2 3.5"/><path d="M12 17h.01"/></svg>
              <div>
                <div class="explanation-title">Penjelasan Jawaban</div>
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
                <div class="legend" id="legendMultipleChoice">
                    <div class="legend-item">
                        <span class="legend-swatch correct"></span>
                        Jawaban benar
                    </div>

                    <div class="legend-item">
                        <span class="legend-swatch wrong"></span>
                        Jawaban salah
                    </div>
                </div>

                <div class="legend" id="legendEssay" style="display:none;">
                    <div class="legend-item">
                        <span class="legend-swatch answered"></span>
                        Sudah dijawab
                    </div>

                    <div class="legend-item">
                        <span class="legend-swatch pending"></span>
                        Menunggu penilaian
                    </div>
                </div>
            </div>
          </aside>
        </div>
      </section>
    </main>
  </div>
</div>
@php
    $questionsData = $questions->map(function ($question) {

        $studentAnswer = $question->studentAnswer;

        $selectedId = $studentAnswer
            ? $studentAnswer->question_option_id
            : null;

        $options = $question->options
            ->sortBy('urutan_tampil')
            ->values();

        $correctOption = $options->first(function ($option) {
            return (bool) $option->is_correct === true;
        });

        $correctId = $correctOption
            ? $correctOption->id
            : null;

        $isAnswered = $studentAnswer !== null;

        $isCorrect =
            $selectedId !== null &&
            $correctId !== null &&
            (int) $selectedId === (int) $correctId;

        return [
            'id' => $question->id,

            // penting untuk membedakan pilihan ganda dan essay
            'type' => $question->tipe,

            'text' => $question->pertanyaan,

            // Audio soal Hören
            'file_path' => $question->file_path,
            'file_type' => $question->file_type,

            // Jawaban essay siswa untuk Schreiben
            'answer_text' => $studentAnswer
                ? $studentAnswer->jawaban_teks
                : null,

            'selected' => $selectedId,

            'correct_option_id' => $correctId,

            'is_answered' => $isAnswered,

            'is_correct' => $isCorrect,

            'explanation' => $question->penjelasan,

            'options' => $options->map(function ($option) use ($selectedId) {

                $isCorrectOption = (bool) $option->is_correct;

                $isSelected =
                    $selectedId !== null &&
                    (int) $option->id === (int) $selectedId;

                return [
                    'id' => $option->id,

                    'text' => $option->teks,

                    // Gambar pilihan Hören
                    'file_path' => $option->file_path,
                    'file_type' => $option->file_type,

                    'is_correct' => $isCorrectOption,

                    'is_selected' => $isSelected,
                ];

            })->toArray(),
        ];
    })
    ->values()
    ->toArray();
@endphp
<script>
    const QUESTIONS = @json($questionsData);
    const MODULE_CATEGORY = @json($module->kategori);

    var legendMultipleChoice =
    document.getElementById('legendMultipleChoice');

    var legendEssay =
        document.getElementById('legendEssay');

    if (
        MODULE_CATEGORY === 'simulasi_schreiben'
    ) {

        legendMultipleChoice.style.display = 'none';
        legendEssay.style.display = 'flex';

    } else {

        legendMultipleChoice.style.display = 'flex';
        legendEssay.style.display = 'none';
    }
</script>

<script>
(function(){
    "use strict";

    var LETTERS = ['A', 'B', 'C', 'D'];

    var state = {
        current: 0
    };

    var quizProgress =
        document.getElementById('quizProgress');

    var quizQuestion =
        document.getElementById('quizQuestion');

    var quizOptions =
        document.getElementById('quizOptions');

    var explanationText =
        document.getElementById('explanationText');

    var soalGrid =
        document.getElementById('soalGrid');

    var prevBtn =
        document.getElementById('prevBtn');

    var nextBtn =
        document.getElementById('nextBtn');

    var nextBtnLabel =
        document.getElementById('nextBtnLabel');

    var nextBtnIcon =
        document.getElementById('nextBtnIcon');


    /*
    |--------------------------------------------------------------------------
    | Tidak ada soal
    |--------------------------------------------------------------------------
    */

    if (!QUESTIONS.length) {

        quizProgress.textContent =
            'Belum ada soal';

        quizQuestion.textContent =
            'Belum ada soal untuk modul ini.';

        quizOptions.innerHTML = '';

        explanationText.textContent =
            '';

        soalGrid.innerHTML =
            '<p style="color:var(--gray-500);font-size:.9rem;">' +
            'Belum ada soal.' +
            '</p>';

        prevBtn.hidden = true;
        nextBtn.hidden = true;

        return;
    }


    /*
    |--------------------------------------------------------------------------
    | Render soal
    |--------------------------------------------------------------------------
    */

function renderQuestion(){

    var idx = state.current;
    var q = QUESTIONS[idx];

    quizProgress.textContent =
        'Soal ' +
        (idx + 1) +
        ' dari ' +
        QUESTIONS.length;

    quizQuestion.textContent =
        q.text || '';

    quizOptions.innerHTML = '';

    /*
    |--------------------------------------------------------------------------
    | SIMULASI HÖREN
    |--------------------------------------------------------------------------
    | Audio berada pada questions.file_path
    |--------------------------------------------------------------------------
    */

    if (
        MODULE_CATEGORY === 'simulasi_horen' &&
        q.file_path &&
        q.file_type &&
        String(q.file_type).startsWith('audio/')
    ) {

        var audioBox =
            document.createElement('div');

        audioBox.className =
            'question-audio-box';

        var audioLabel =
            document.createElement('div');

        audioLabel.className =
            'question-audio-label';

        audioLabel.textContent =
            'Audio Soal';

        var audio =
            document.createElement('audio');

        audio.className =
            'question-audio';

        audio.controls = true;

        audio.preload = 'metadata';

        audio.src =
            '{{ asset('storage') }}/' +
            q.file_path;

        audioBox.appendChild(audioLabel);
        audioBox.appendChild(audio);

        quizOptions.appendChild(audioBox);
    }


    /*
    |--------------------------------------------------------------------------
    | SIMULASI SCHREIBEN
    |--------------------------------------------------------------------------
    | Tidak ada pilihan ganda.
    | Tampilkan jawaban essay siswa.
    |--------------------------------------------------------------------------
    */

    if (
        MODULE_CATEGORY === 'simulasi_schreiben' ||
        q.type === 'paragraf'
    ) {

        var essayBox =
            document.createElement('div');

        essayBox.className =
            'essay-answer-box';

        var essayLabel =
            document.createElement('div');

        essayLabel.className =
            'essay-answer-label';

        essayLabel.textContent =
            'Jawabanmu';

        var essay =
            document.createElement('div');

        essay.className =
            'essay-answer';

        if (
            q.answer_text !== null &&
            q.answer_text !== undefined &&
            String(q.answer_text).trim() !== ''
        ) {

            essay.textContent =
                q.answer_text;

        } else {

            essay.textContent =
                'Siswa belum memberikan jawaban.';

            essay.classList.add(
                'essay-empty'
            );
        }

        essayBox.appendChild(essayLabel);
        essayBox.appendChild(essay);

        quizOptions.appendChild(essayBox);

        /*
         * Schreiben tidak menggunakan explanation
         * pilihan ganda.
         */
        explanationText.textContent =
            q.explanation ||
            'Jawaban essay akan dinilai secara manual oleh tutor.';

    } else {

        /*
        |--------------------------------------------------------------------------
        | PILIHAN GANDA
        |--------------------------------------------------------------------------
        */

        q.options.forEach(function(option, i){

            var isCorrect =
                option.is_correct === true ||
                option.is_correct === 1 ||
                option.is_correct === "1";

            var isSelected =
                option.is_selected === true ||
                option.is_selected === 1 ||
                option.is_selected === "1";

            var isWrongSelected =
                isSelected &&
                !isCorrect;

            var row =
                document.createElement('div');

            var hasImage =
                option.file_path &&
                option.file_type &&
                String(option.file_type)
                    .startsWith('image/');

            row.className =
                'quiz-option' +
                (isCorrect
                    ? ' is-correct'
                    : '') +
                (isWrongSelected
                    ? ' is-wrong-selected'
                    : '') +
                (isSelected
                    ? ' is-selected'
                    : '') +
                (hasImage
                    ? ' has-image'
                    : '');

            var tag = '';

            if (
                isSelected &&
                isCorrect
            ) {

                tag =
                    '<span class="quiz-option-tag">' +
                    'Jawabanmu • Jawaban Benar' +
                    '</span>';

            } else if (
                isSelected &&
                isWrongSelected
            ) {

                tag =
                    '<span class="quiz-option-tag">' +
                    'Jawabanmu' +
                    '</span>';

            } else if (isCorrect) {

                tag =
                    '<span class="quiz-option-tag">' +
                    'Jawaban Benar' +
                    '</span>';
            }


            /*
            |--------------------------------------------------------------------------
            | Huruf A/B/C/D
            |--------------------------------------------------------------------------
            */

            var letter =
                '<span class="quiz-option-letter">' +
                LETTERS[i] +
                '</span>';


            /*
            |--------------------------------------------------------------------------
            | Isi opsi
            |--------------------------------------------------------------------------
            */

            var content = '';

            if (hasImage) {

                content +=
                    '<span class="quiz-option-media">' +
                        '<img ' +
                            'class="quiz-option-image" ' +
                            'src="{{ asset('storage') }}/' +
                            escapeHtml(option.file_path) +
                            '" ' +
                            'alt="Gambar pilihan ' +
                            LETTERS[i] +
                            '">' +
                    '</span>';

            } else {

                content +=
                    '<span class="quiz-option-text">' +
                    escapeHtml(option.text || '') +
                    '</span>';
            }


            row.innerHTML =
                letter +
                content +
                tag;

            quizOptions.appendChild(row);
        });


        /*
        |--------------------------------------------------------------------------
        | Penjelasan
        |--------------------------------------------------------------------------
        */

        explanationText.textContent =
            q.explanation ||
            'Tidak ada penjelasan untuk soal ini.';
    }


    /*
    |--------------------------------------------------------------------------
    | Tombol navigasi
    |--------------------------------------------------------------------------
    */

    if (idx === 0) {

        prevBtn.hidden = true;
        prevBtn.style.display = 'none';

    } else {

        prevBtn.hidden = false;
        prevBtn.style.display = 'inline-flex';
    }


    var isLast =
        idx === QUESTIONS.length - 1;


    nextBtnLabel.textContent =
        isLast
            ? 'Kembali ke Performa'
            : 'Selanjutnya';


    nextBtnIcon.innerHTML =
        isLast

            ? '<path d="M5 12h14"/>' +
              '<path d="m12 5 7 7-7 7"/>'

            : '<path d="M5 12h14M13 6l6 6-6 6"/>';
}


    /*
    |--------------------------------------------------------------------------
    | Escape HTML
    |--------------------------------------------------------------------------
    */

    function escapeHtml(value){

        return String(value)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');

    }


    /*
    |--------------------------------------------------------------------------
    | Daftar soal
    |--------------------------------------------------------------------------
    */

    function renderGrid(){

        soalGrid.innerHTML = '';


        QUESTIONS.forEach(function(q, i){

            var btn =
                document.createElement('button');

            btn.type =
                'button';

            btn.textContent =
                i + 1;

            btn.setAttribute(
                'aria-label',
                'Ke soal ' + (i + 1)
            );


            var classes =
                ['soal-btn'];


            if (i === state.current) {

                classes.push(
                    'is-current'
                );
            }


            /*
             * Tentukan warna berdasarkan jawaban.
             */
if (q.is_answered) {

    if (
        MODULE_CATEGORY === 'simulasi_schreiben' ||
        q.type === 'paragraf'
    ) {

        // Schreiben sudah dijawab,
        // tetapi belum dikategorikan benar/salah.

        classes.push('is-answered');

    } else {

        if (q.is_correct) {
            classes.push('is-correct');
        } else {
            classes.push('is-wrong');
        }
    }
}


            btn.className =
                classes.join(' ');


            btn.addEventListener(
                'click',
                function(){

                    state.current =
                        i;

                    renderQuestion();
                    renderGrid();

                }
            );


            soalGrid.appendChild(btn);

        });

    }


    /*
    |--------------------------------------------------------------------------
    | Sebelumnya
    |--------------------------------------------------------------------------
    */

    prevBtn.addEventListener(
        'click',
        function(){

            if (state.current > 0) {

                state.current--;

                renderQuestion();
                renderGrid();

            }

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Selanjutnya / kembali
    |--------------------------------------------------------------------------
    */

    nextBtn.addEventListener(
        'click',
        function(){

            var isLast =
                state.current ===
                QUESTIONS.length - 1;


            if (isLast) {

                window.location.href =
                    '{{ route('page', ['page' => 'performa-siswa']) }}';

            } else {

                state.current++;

                renderQuestion();
                renderGrid();

            }

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Initial render
    |--------------------------------------------------------------------------
    */

    renderQuestion();
    renderGrid();


    /*
    |--------------------------------------------------------------------------
    | Sidebar mobile
    |--------------------------------------------------------------------------
    */

    var sidebar =
        document.getElementById('sidebar');

    var menuToggle =
        document.getElementById('menuToggle');

    var sidebarClose =
        document.getElementById('sidebarClose');

    var backdrop =
        document.getElementById('backdrop');


    function openSidebar(){

        sidebar.classList.add('open');

        backdrop.classList.add('show');

        menuToggle.setAttribute(
            'aria-expanded',
            'true'
        );

    }


    function closeSidebar(){

        sidebar.classList.remove('open');

        backdrop.classList.remove('show');

        menuToggle.setAttribute(
            'aria-expanded',
            'false'
        );

    }


    menuToggle.addEventListener(
        'click',
        openSidebar
    );

    sidebarClose.addEventListener(
        'click',
        closeSidebar
    );

    backdrop.addEventListener(
        'click',
        closeSidebar
    );

})();
</script>
</body>
</html>
