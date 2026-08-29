<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kelola Modul — Admin — LD Indonesia</title>
<meta name="description" content="Kelola modul pembelajaran dan simulasi LD Indonesia — tambah, ubah, dan hapus modul.">
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
  --red: #D6444F;
  --red-bg: #FCE7E8;
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

.page-content{ padding: 36px 40px 60px; max-width: 1280px; width: 100%; margin: 0 auto; }
.page-heading{ margin-bottom: 22px; }
.page-heading h1{ font-size: 1.7rem; }

/* ============ FILTER + ACTION BAR ============ */
.filter-bar{ display: flex; gap: 14px; margin-bottom: 22px; flex-wrap: wrap; align-items: center; }
.search-field{ flex: 1 1 280px; position: relative; min-width: 200px; }
.search-field svg{ position: absolute; left: 16px; top: 50%; transform: translateY(-50%); width: 18px; height: 18px; color: var(--gray-400); pointer-events: none; }
.search-field input{
  width: 100%; font: inherit; font-size: 0.92rem; padding: 13px 16px 13px 44px;
  border: 1.5px solid var(--gray-200); border-radius: var(--radius-sm); background: var(--white); box-shadow: var(--shadow-sm);
}
.search-field input:focus{ outline: none; border-color: var(--pink); box-shadow: 0 0 0 4px var(--pink-pale); }

.select-field{ position: relative; flex: 0 0 200px; }
.select-field select{
  appearance: none; -webkit-appearance: none; width: 100%; font: inherit; font-weight: 600; font-size: 0.92rem;
  padding: 13px 40px 13px 18px; border: 1.5px solid var(--gray-200); border-radius: var(--radius-sm);
  background: var(--white); color: var(--navy); box-shadow: var(--shadow-sm); cursor: pointer;
}
.select-field select:focus{ outline: none; border-color: var(--pink); box-shadow: 0 0 0 4px var(--pink-pale); }
.select-field svg{ position: absolute; right: 16px; top: 50%; transform: translateY(-50%); width: 16px; height: 16px; color: var(--gray-500); pointer-events: none; }

.filter-spacer{ flex-grow: 1; }
.btn-add{
  display: inline-flex; align-items: center; gap: 8px;
  padding: 13px 24px; border-radius: var(--radius-pill);
  background: linear-gradient(135deg, var(--pink) 0%, var(--pink-dark) 100%); color: var(--white);
  font-weight: 700; font-size: 0.94rem; box-shadow: var(--shadow-md); white-space: nowrap;
  transition: transform 0.18s ease;
}
.btn-add:hover{ transform: translateY(-2px); }
.btn-add svg{ width: 17px; height: 17px; }

/* ============ TABLE PANEL ============ */
.panel{ background: var(--white); border-radius: var(--radius-lg); box-shadow: var(--shadow-md); border: 1px solid var(--gray-100); overflow: hidden; }
.table-scroll{ overflow-x: auto; }
table{ width: 100%; border-collapse: collapse; min-width: 880px; }
thead th{ text-align: left; font-size: 0.85rem; font-weight: 700; color: var(--navy); background: var(--pink-light); padding: 15px 24px; white-space: nowrap; }
thead th:first-child{ padding-left: 28px; }
tbody td{ padding: 17px 24px; font-size: 0.92rem; color: var(--gray-800); border-bottom: 1px solid var(--gray-100); vertical-align: middle; white-space: nowrap; }
tbody td:first-child{ padding-left: 28px; }
tbody tr:last-child td{ border-bottom: none; }
tbody tr:hover{ background: var(--gray-50); }
td.col-judul{ font-weight: 600; color: var(--navy); white-space: normal; min-width: 220px; }

.action-group{ display: flex; align-items: center; gap: 4px; }
.action-btn{
  display: inline-flex; align-items: center; justify-content: center;
  width: 34px; height: 34px; border-radius: 8px; color: var(--pink-dark);
  transition: background 0.15s ease;
}
.action-btn:hover{ background: var(--pink-pale); }
.action-btn.is-delete{ color: var(--pink); }
.action-btn.is-delete:hover{ background: var(--red-bg); color: var(--red); }
.action-btn svg{ width: 18px; height: 18px; }

.empty-state{ padding: 64px 28px; text-align: center; }
.empty-state svg{ width: 52px; height: 52px; color: var(--gray-300); margin: 0 auto 14px; }
.empty-state-title{ font-weight: 700; font-size: 1rem; color: var(--navy); margin-bottom: 6px; }
.empty-state-text{ font-size: 0.9rem; color: var(--gray-500); margin-bottom: 20px; }

/* ---- Footer & paginasi (tampilan saja) ---- */
.table-footer{ display: flex; align-items: center; justify-content: space-between; gap: 16px; padding: 18px 28px; flex-wrap: wrap; border-top: 1px solid var(--gray-100); }
.rows-per-page{ display: flex; align-items: center; gap: 10px; font-size: 0.88rem; color: var(--gray-600); font-weight: 600; }
.rows-per-page select{
  font: inherit; font-weight: 700; color: var(--navy); padding: 7px 30px 7px 12px;
  border: 1.5px solid var(--gray-200); border-radius: 8px; appearance: none; -webkit-appearance: none;
  background: var(--white) url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="%237C776F" stroke-width="2.4"><path d="M6 9l6 6 6-6"/></svg>') no-repeat right 8px center;
  cursor: pointer;
}
.results-count{ font-size: 0.88rem; color: var(--gray-500); }
.pagination{ display: flex; align-items: center; gap: 8px; }
.page-btn{
  min-width: 34px; height: 34px; padding: 0 8px; border-radius: 8px; border: 1.5px solid var(--gray-200);
  color: var(--navy); font-weight: 700; font-size: 0.86rem; display: flex; align-items: center; justify-content: center; background: var(--white);
}
.page-btn:hover:not(:disabled):not(.active){ background: var(--gray-50); }
.page-btn.active{ background: var(--pink); border-color: var(--pink); color: var(--white); }
.page-btn:disabled{ opacity: 0.4; cursor: not-allowed; }
.page-btn svg{ width: 16px; height: 16px; }


/* ============ MODAL KONFIRMASI HAPUS ============ */
.delete-modal{
  position: fixed;
  inset: 0;
  z-index: 500;
  display: none;
  align-items: center;
  justify-content: center;
  padding: 24px;
}
.delete-modal.is-open{
  display: flex;
}
.delete-modal-backdrop{
  position: absolute;
  inset: 0;
  background: rgba(30,42,71,0.58);
  backdrop-filter: blur(4px);
  -webkit-backdrop-filter: blur(4px);
}
.delete-modal-card{
  position: relative;
  width: min(100%, 480px);
  background: var(--white);
  border: 1px solid var(--gray-200);
  border-radius: 22px;
  box-shadow: 0 24px 70px rgba(30,42,71,0.22);
  padding: 30px;
  animation: deleteModalIn 0.18s ease-out;
}
@keyframes deleteModalIn{
  from{ opacity: 0; transform: translateY(10px) scale(0.98); }
  to{ opacity: 1; transform: translateY(0) scale(1); }
}
.delete-modal-icon{
  width: 58px;
  height: 58px;
  margin-bottom: 18px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  background: var(--red-bg);
  color: var(--red);
}
.delete-modal-icon svg{
  width: 28px;
  height: 28px;
}
.delete-modal-title{
  margin-bottom: 8px;
  font-family: var(--font-display);
  font-size: 1.45rem;
  line-height: 1.2;
  color: var(--navy);
}
.delete-modal-text{
  color: var(--gray-600);
  font-size: 0.94rem;
  line-height: 1.6;
}
.delete-modal-module{
  display: block;
  margin-top: 10px;
  padding: 11px 14px;
  border-radius: 10px;
  background: var(--pink-pale);
  color: var(--navy);
  font-weight: 800;
  overflow-wrap: anywhere;
}
.delete-modal-warning{
  margin-top: 14px;
  padding: 12px 14px;
  border-radius: 10px;
  background: var(--red-bg);
  color: var(--red);
  font-size: 0.84rem;
  font-weight: 600;
}
.delete-modal-actions{
  display: flex;
  justify-content: flex-end;
  gap: 10px;
  margin-top: 24px;
}
.delete-modal-btn{
  min-height: 44px;
  padding: 10px 18px;
  border-radius: 10px;
  font-weight: 800;
  font-size: 0.9rem;
  transition: transform 0.15s ease, background 0.15s ease;
}
.delete-modal-btn:hover{
  transform: translateY(-1px);
}
.delete-modal-btn.cancel{
  border: 1.5px solid var(--gray-200);
  background: var(--white);
  color: var(--navy);
}
.delete-modal-btn.cancel:hover{
  background: var(--gray-50);
}
.delete-modal-btn.confirm{
  background: linear-gradient(135deg, var(--red) 0%, #B93640 100%);
  color: var(--white);
  box-shadow: 0 8px 18px rgba(214,68,79,0.22);
}
.delete-modal-btn.confirm:hover{
  background: linear-gradient(135deg, #C83D48 0%, #A92F39 100%);
}
body.modal-open{
  overflow: hidden;
}

/* ============ MODAL HASIL PENGHAPUSAN ============ */
.feedback-modal{
  position: fixed;
  inset: 0;
  z-index: 600;
  display: none;
  align-items: center;
  justify-content: center;
  padding: 24px;
}
.feedback-modal.is-open{
  display: flex;
}
.feedback-modal-backdrop{
  position: absolute;
  inset: 0;
  background: rgba(30,42,71,0.45);
  backdrop-filter: blur(4px);
  -webkit-backdrop-filter: blur(4px);
}
.feedback-modal-card{
  position: relative;
  width: min(100%, 440px);
  background: var(--white);
  border: 1px solid var(--gray-200);
  border-radius: 22px;
  box-shadow: 0 24px 70px rgba(30,42,71,0.22);
  padding: 30px;
  text-align: center;
  animation: deleteModalIn 0.18s ease-out;
}
.feedback-icon{
  width: 64px;
  height: 64px;
  margin: 0 auto 18px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
}
.feedback-icon.success{
  background: #E7F7EF;
  color: #2E9B68;
}
.feedback-icon.error{
  background: var(--red-bg);
  color: var(--red);
}
.feedback-icon svg{
  width: 31px;
  height: 31px;
}
.feedback-title{
  margin-bottom: 8px;
  font-family: var(--font-display);
  font-size: 1.45rem;
  line-height: 1.2;
  color: var(--navy);
}
.feedback-text{
  color: var(--gray-600);
  font-size: 0.94rem;
  line-height: 1.6;
}
.feedback-close{
  margin-top: 22px;
  min-height: 44px;
  padding: 10px 24px;
  border-radius: 10px;
  background: linear-gradient(135deg, var(--pink) 0%, var(--pink-dark) 100%);
  color: var(--white);
  font-weight: 800;
  font-size: 0.9rem;
  box-shadow: 0 8px 18px rgba(236,78,140,0.18);
  transition: transform 0.15s ease;
}
.feedback-close:hover{
  transform: translateY(-1px);
}
body.feedback-open{
  overflow: hidden;
}


/* ============ RESPONSIVE ============ */
@media (max-width: 980px){
  .sidebar{ position: fixed; left: 0; top: 0; transform: translateX(-100%); transition: transform 0.22s ease; box-shadow: var(--shadow-md); }
  .sidebar.open{ transform: translateX(0); }
  .sidebar-close{ display: flex; align-items: center; justify-content: center; width: 34px; height: 34px; border-radius: 8px; margin-left: auto; color: var(--navy); }
  .sidebar-close:hover{ background: rgba(30,42,71,0.06); }
  .sidebar-brand{ justify-content: space-between; }
  .menu-toggle{ display: flex; }
  .topbar{ padding: 0 20px; }
  .page-content{ padding: 26px 20px 48px; }
  .backdrop{ display: none; position: fixed; inset: 0; background: rgba(30,42,71,0.35); z-index: 50; }
  .backdrop.show{ display: block; }
  .filter-bar{ flex-direction: column; align-items: stretch; }
  .select-field{ flex: 1 1 auto; }
  .btn-add{ justify-content: center; }
}
@media (max-width: 640px){
  .user-meta{ display: none; }
  .table-footer{ flex-direction: column; align-items: flex-start; }
}
</style>
</head>
<body>
<a href="#mainContent" class="skip-link">Langsung ke konten utama</a>

<div class="app-shell">
  <div class="backdrop" id="backdrop"></div>

  <x-dashboard-sidebar />

  <!-- ============ MAIN ============ -->
  <div class="main-col">
    <x-dashboard-header />

    <main class="page-content" id="mainContent">
      <div class="page-heading">
        <h1>Kelola Modul</h1>
      </div>

      <!-- ============ FILTER + TAMBAH MODUL ============ -->
      <form
          action="{{ route('modul.index') }}"
          method="GET"
          class="filter-bar"
      >
          <div class="search-field">
              <svg
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  aria-hidden="true"
              >
                  <circle cx="11" cy="11" r="7"/>
                  <path d="m21 21-4.3-4.3"/>
              </svg>

              <label for="searchInput" class="sr-only" hidden>
                  Cari modul
              </label>

              <input
                  type="search"
                  id="searchInput"
                  name="search"
                  value="{{ request('search') }}"
                  placeholder="Cari modul..."
              >
          </div>

          <div class="select-field">
              <label for="levelFilter" class="sr-only" hidden>
                  Filter level
              </label>

              <select
                  id="levelFilter"
                  name="level"
                  onchange="this.form.submit()"
              >
                  <option value="">Semua Level</option>

                  <option
                      value="A1"
                      {{ request('level') === 'A1' ? 'selected' : '' }}
                  >
                      Level A1
                  </option>

                  <option
                      value="A2"
                      {{ request('level') === 'A2' ? 'selected' : '' }}
                  >
                      Level A2
                  </option>

                  <option
                      value="B1"
                      {{ request('level') === 'B1' ? 'selected' : '' }}
                  >
                      Level B1
                  </option>

                  <option
                      value="B2"
                      {{ request('level') === 'B2' ? 'selected' : '' }}
                  >
                      Level B2
                  </option>
              </select>

              <svg
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2.2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  aria-hidden="true"
              >
                  <path d="M6 9l6 6 6-6"/>
              </svg>
          </div>

          <div class="filter-spacer"></div>

          <button
              type="submit"
              class="btn-add"
              style="border:none;"
          >
              Cari
          </button>

          @if(request('search') || request('level'))
              <a
                  href="{{ route('modul.index') }}"
                  class="btn-add"
              >
                  Reset
              </a>
          @endif

          <a class="btn-add" href="{{ route('modul.create') }}">
              <svg
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2.6"
                  stroke-linecap="round"
                  aria-hidden="true"
              >
                  <path d="M12 5v14M5 12h14"/>
              </svg>

              Tambah Modul
          </a>
      </form>

      <!-- ============ TABLE PANEL ============ -->
      <section class="panel" aria-label="Daftar modul dan simulasi">
        <div class="table-scroll">
          <table>
            <thead>
                <tr>
                  <th scope="col">
                    <a
                        href="{{ request()->fullUrlWithQuery([
                            'sort' => 'judul',
                            'direction' => request('sort') === 'judul' && request('direction') === 'asc'
                                ? 'desc'
                                : 'asc',
                            'page' => 1
                        ]) }}"
                        style="
                            display:inline-flex;
                            align-items:center;
                            gap:6px;
                        "
                    >
                        Judul

                        @if(request('sort') === 'judul')
                            {{ request('direction') === 'asc' ? '↑' : '↓' }}
                        @endif
                    </a>
                </th>
                <th scope="col">
                    <a
                        href="{{ request()->fullUrlWithQuery([
                            'sort' => 'level',
                            'direction' => request('sort') === 'level' && request('direction') === 'asc'
                                ? 'desc'
                                : 'asc',
                            'page' => 1
                        ]) }}"
                        style="
                            display:inline-flex;
                            align-items:center;
                            gap:6px;
                        "
                    >
                        Level

                        @if(request('sort') === 'level')
                            {{ request('direction') === 'asc' ? '↑' : '↓' }}
                        @endif
                    </a>
                </th>
                <th scope="col">
                    <a
                        href="{{ request()->fullUrlWithQuery([
                            'sort' => 'kategori',
                            'direction' => request('sort') === 'kategori' && request('direction') === 'asc'
                                ? 'desc'
                                : 'asc',
                            'page' => 1
                        ]) }}"
                        style="
                            display:inline-flex;
                            align-items:center;
                            gap:6px;
                        "
                    >
                        Kategori

                        @if(request('sort') === 'kategori')
                            {{ request('direction') === 'asc' ? '↑' : '↓' }}
                        @endif
                    </a>
                </th>
                <th>Materi</th>
                <th>Soal</th>
                <th scope="col">
                    <a
                        href="{{ request()->fullUrlWithQuery([
                            'sort' => 'updated_at',
                            'direction' => request('sort') === 'updated_at' && request('direction') === 'asc'
                                ? 'desc'
                                : 'asc',
                            'page' => 1
                        ]) }}"
                        style="
                            display:inline-flex;
                            align-items:center;
                            gap:6px;
                        "
                    >
                        Terakhir diperbarui

                        @if(request('sort') === 'updated_at')
                            {{ request('direction') === 'asc' ? '↑' : '↓' }}
                        @endif
                    </a>
                </th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($modules as $module)
                    <tr>
                        {{-- JUDUL --}}
                        <td class="col-judul">
                            {{ $module->judul }}

                            @if($module->creator)
                                <div style="
                                    font-size: 0.75rem;
                                    color: var(--gray-500);
                                    margin-top: 4px;
                                    font-weight: 500;
                                ">
                                    Dibuat oleh {{ $module->creator->name }}
                                </div>
                            @endif
                        </td>

                        {{-- LEVEL --}}
                        <td>
                            <span style="font-weight: 600;">
                                Level {{ $module->level }}
                            </span>
                        </td>

                        {{-- KATEGORI --}}
                        <td>
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
                        </td>

                        {{-- MATERI --}}
                        <td>
                            @if($module->file_path)
                                <a
                                    href="{{ asset('storage/' . $module->file_path) }}"
                                    target="_blank"
                                    style="
                                        color: var(--pink-dark);
                                        font-weight: 700;
                                        display: inline-flex;
                                        align-items: center;
                                        gap: 6px;
                                    "
                                >
                                    <svg
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        width="17"
                                        height="17"
                                    >
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                        <polyline points="14 2 14 8 20 8"/>
                                        <line x1="16" y1="13" x2="8" y2="13"/>
                                        <line x1="16" y1="17" x2="8" y2="17"/>
                                    </svg>

                                    Lihat PDF
                                </a>
                            @elseif($module->kategori === 'simulasi_lesen' && $module->teks_bacaan)
                                <span style="color: var(--gray-600); font-weight: 600;">
                                    Teks bacaan tersedia
                                </span>
                            @elseif($module->kategori === 'simulasi_sprechen' && $module->topik_sprechen)
                                <span style="color: var(--gray-600); font-weight: 600;">
                                    Topik tersedia
                                </span>
                            @else
                                <span style="color: var(--gray-400);">
                                    Tidak ada
                                </span>
                            @endif
                        </td>

                        {{-- JUMLAH SOAL --}}
                        <td>
                            <span style="
                                display: inline-flex;
                                align-items: center;
                                justify-content: center;
                                min-width: 42px;
                                padding: 5px 10px;
                                border-radius: 999px;
                                background: var(--pink-light);
                                color: var(--pink-dark);
                                font-weight: 800;
                                font-size: 0.82rem;
                            ">
                                {{ $module->questions_count }}
                            </span>
                            <span style="
                                font-size: 0.82rem;
                                color: var(--gray-500);
                                margin-left: 4px;
                            ">
                                soal
                            </span>
                        </td>

                        {{-- TERAKHIR DIPERBARUI --}}
                        <td>
                            {{ $module->updated_at?->format('d M Y') }}
                        </td>

                  {{-- AKSI --}}
                  <td>
                      <div class="action-group">

                          {{-- Kelola / lihat soal --}}
                          <a
                              class="action-btn"
                              href="{{ route('modul.soal.create', $module) }}"
                              aria-label="Kelola soal {{ $module->judul }}"
                              title="Kelola Soal"
                          >
                              <svg
                                  viewBox="0 0 24 24"
                                  fill="none"
                                  stroke="currentColor"
                                  stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                              >
                                  <path d="M4 4h16v16H4z"/>
                                  <path d="M8 9h8"/>
                                  <path d="M8 13h8"/>
                                  <path d="M8 17h5"/>
                              </svg>
                          </a>

                          {{-- Edit modul --}}
                          <a
                              class="action-btn"
                              href="{{ route('modul.edit', $module) }}"
                              aria-label="Ubah {{ $module->judul }}"
                              title="Ubah Modul"
                          >
                              <svg
                                  viewBox="0 0 24 24"
                                  fill="none"
                                  stroke="currentColor"
                                  stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                              >
                                  <path d="M12 20h9"/>
                                  <path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4z"/>
                              </svg>
                          </a>

                          {{-- Hapus modul --}}
                          <form
                              action="{{ route('modul.destroy', $module) }}"
                              method="POST"
                              style="display: inline;"
                              class="delete-module-form"
                              data-module-title="{{ e($module->judul) }}"
                          >
                              @csrf
                              @method('DELETE')

                              <button
                                  type="button"
                                  class="action-btn is-delete delete-module-btn"
                                  aria-label="Hapus {{ $module->judul }}"
                                  title="Hapus Modul"
                              >
                                  <svg
                                      viewBox="0 0 24 24"
                                      fill="none"
                                      stroke="currentColor"
                                      stroke-width="2"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                  >
                                      <polyline points="3 6 5 6 21 6"/>
                                      <path d="M19 6l-1 14H6L5 6"/>
                                      <path d="M10 11v5"/>
                                      <path d="M14 11v5"/>
                                      <path d="M9 6V4h6v2"/>
                                  </svg>
                              </button>
                          </form>

                        <form action="{{ route('modul.release', $module->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('PATCH')
                            <button
                                type="submit"
                                class="action-btn {{ $module->sudah_rilis ? 'sudah_rilis' : 'draft' }}"
                                aria-label="{{ $module->sudah_rilis ? 'Tarik Publikasi ' . $module->judul : 'Rilis ' . $module->judul }}"
                                title="{{ $module->sudah_rilis ? 'Tarik Publikasi (Unrelease)' : 'Rilis Modul' }}"
                            >
                                @if($module->sudah_rilis)
                                    <!-- Ikon untuk modul yang sudah rilis (Contoh: Mata Terbuka / Check) -->
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                        <circle cx="12" cy="12" r="3"/>
                                    </svg>
                                @else
                                    <!-- Ikon untuk modul yang belum rilis / draft (Contoh: Mata Dicoret / Send / Upload) -->
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/>
                                        <line x1="1" y1="1" x2="23" y2="23"/>
                                    </svg>
                                @endif
                            </button>
                        </form>

                      </div>
                  </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="7">
                            <div class="empty-state">
                                <svg
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.6"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                                </svg>

                                <div class="empty-state-title">
                                    Modul belum tersedia
                                </div>

                                <div class="empty-state-text">
                                    Belum ada modul atau simulasi yang ditambahkan.
                                    Klik "Tambah Modul" untuk membuat modul pertama.
                                </div>

                                <a
                                    href="{{ route('modul.create') }}"
                                    class="btn-add"
                                    style="display:inline-flex;"
                                >
                                    + Tambah Modul
                                </a>
                            </div>
                        </td>
                    </tr>

                @endforelse
            </tbody>
          </table>
        </div>

        <!-- Ditampilkan otomatis oleh script jika daftar modul kosong -->
        <div class="empty-state" id="emptyState" hidden>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
          <div class="empty-state-title">Modul belum tersedia</div>
          <div class="empty-state-text">Belum ada modul atau simulasi yang ditambahkan. Klik "Tambah Modul" untuk membuat modul pertama.</div>
        </div>
        @if($modules->hasPages() || $modules->total() > 0)
            <div class="table-footer">

                <div class="rows-per-page">
                    Menampilkan
                    <strong>
                        {{ $modules->firstItem() ?? 0 }}
                        -
                        {{ $modules->lastItem() ?? 0 }}
                    </strong>
                    dari
                    <strong>{{ $modules->total() }}</strong>
                    modul
                </div>

                <nav class="pagination" aria-label="Navigasi halaman">

                    {{-- Previous --}}
                    @if($modules->onFirstPage())
                        <button class="page-btn" disabled>
                            <svg viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2.4">
                                <path d="M15 18l-6-6 6-6"/>
                            </svg>
                        </button>
                    @else
                        <a
                            href="{{ $modules->previousPageUrl() }}"
                            class="page-btn"
                            aria-label="Halaman sebelumnya"
                        >
                            <svg viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2.4">
                                <path d="M15 18l-6-6 6-6"/>
                            </svg>
                        </a>
                    @endif


                    {{-- Nomor halaman --}}
                    @foreach($modules->getUrlRange(1, $modules->lastPage()) as $page => $url)

                        @if($page == $modules->currentPage())
                            <span class="page-btn active">
                                {{ $page }}
                            </span>
                        @else
                            <a
                                href="{{ $url }}"
                                class="page-btn"
                            >
                                {{ $page }}
                            </a>
                        @endif

                    @endforeach


                    {{-- Next --}}
                    @if($modules->hasMorePages())
                        <a
                            href="{{ $modules->nextPageUrl() }}"
                            class="page-btn"
                            aria-label="Halaman berikutnya"
                        >
                            <svg viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2.4">
                                <path d="M9 6l6 6-6 6"/>
                            </svg>
                        </a>
                    @else
                        <button class="page-btn" disabled>
                            <svg viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2.4">
                                <path d="M9 6l6 6-6 6"/>
                            </svg>
                        </button>
                    @endif

                </nav>
            </div>
        @endif
      </section>
    </main>
  </div>
</div>


<!-- ============ MODAL KONFIRMASI HAPUS MODUL ============ -->
<div
  class="delete-modal"
  id="deleteModal"
  aria-hidden="true"
  role="dialog"
  aria-modal="true"
  aria-labelledby="deleteModalTitle"
>
  <div class="delete-modal-backdrop" data-delete-cancel></div>

  <div class="delete-modal-card" role="document">
    <div class="delete-modal-icon" aria-hidden="true">
      <svg
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round"
      >
        <polyline points="3 6 5 6 21 6"/>
        <path d="M19 6l-1 14H6L5 6"/>
        <path d="M10 11v5"/>
        <path d="M14 11v5"/>
        <path d="M9 6V4h6v2"/>
      </svg>
    </div>

    <h2 class="delete-modal-title" id="deleteModalTitle">
      Hapus modul?
    </h2>

    <p class="delete-modal-text">
      Kamu akan menghapus modul berikut:
    </p>

    <span class="delete-modal-module" id="deleteModalModuleName">
      Nama modul
    </span>

    <div class="delete-modal-warning">
      Tindakan ini tidak dapat dibatalkan. Semua soal yang berada di dalam
      modul ini juga akan ikut dihapus.
    </div>

    <div class="delete-modal-actions">
      <button
        type="button"
        class="delete-modal-btn cancel"
        id="deleteModalCancel"
      >
        Batal
      </button>

      <button
        type="button"
        class="delete-modal-btn confirm"
        id="deleteModalConfirm"
      >
        Ya, Hapus Modul
      </button>
    </div>
  </div>
</div>

<!-- ============ MODAL HASIL PENGHAPUSAN ============ -->
<div
  class="feedback-modal"
  id="feedbackModal"
  aria-hidden="true"
  role="dialog"
  aria-modal="true"
  aria-labelledby="feedbackModalTitle"
>
  <div class="feedback-modal-backdrop" id="feedbackModalBackdrop"></div>

  <div class="feedback-modal-card" role="document">
    <div class="feedback-icon success" id="feedbackIcon" aria-hidden="true">
      <svg id="feedbackSuccessIcon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
        <path d="m5 12 4 4L19 6"/>
      </svg>
      <svg id="feedbackErrorIcon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="display:none">
        <path d="M6 6l12 12M18 6 6 18"/>
      </svg>
    </div>

    <h2 class="feedback-title" id="feedbackModalTitle">Berhasil</h2>
    <p class="feedback-text" id="feedbackModalText">Modul berhasil dihapus.</p>

    <button type="button" class="feedback-close" id="feedbackModalClose">OK</button>
  </div>
</div>

<x-toast />

<script>
(function(){
  "use strict";

  var sidebar = document.getElementById('sidebar');
  var menuToggle = document.getElementById('menuToggle');
  var sidebarClose = document.getElementById('sidebarClose');
  var backdrop = document.getElementById('backdrop');

  function openSidebar(){
    sidebar.classList.add('open');
    backdrop.classList.add('show');
    menuToggle.setAttribute('aria-expanded', 'true');
  }

  function closeSidebar(){
    sidebar.classList.remove('open');
    backdrop.classList.remove('show');
    menuToggle.setAttribute('aria-expanded', 'false');
  }

  menuToggle.addEventListener('click', openSidebar);
  sidebarClose.addEventListener('click', closeSidebar);
  backdrop.addEventListener('click', closeSidebar);

  /* ================================================================
     MODAL KONFIRMASI HAPUS MODUL
     Tidak menggunakan confirm() browser.
  ================================================================ */
  var deleteModal = document.getElementById('deleteModal');
  var deleteModalModuleName = document.getElementById('deleteModalModuleName');
  var deleteModalCancel = document.getElementById('deleteModalCancel');
  var deleteModalConfirm = document.getElementById('deleteModalConfirm');
  var activeDeleteForm = null;
  var lastFocusedElement = null;

  function openDeleteModal(form, trigger){
    activeDeleteForm = form;
    lastFocusedElement = trigger;

    deleteModalModuleName.textContent =
      form.getAttribute('data-module-title') || 'Modul ini';

    deleteModal.classList.add('is-open');
    deleteModal.setAttribute('aria-hidden', 'false');
    document.body.classList.add('modal-open');

    deleteModalCancel.focus();
  }

  function closeDeleteModal(){
    deleteModal.classList.remove('is-open');
    deleteModal.setAttribute('aria-hidden', 'true');
    document.body.classList.remove('modal-open');

    activeDeleteForm = null;

    if (lastFocusedElement) {
      lastFocusedElement.focus();
      lastFocusedElement = null;
    }
  }

  document.querySelectorAll('.delete-module-btn').forEach(function(button){
    button.addEventListener('click', function(){
      var form = button.closest('.delete-module-form');

      if (!form) {
        return;
      }

      openDeleteModal(form, button);
    });
  });

  deleteModalCancel.addEventListener('click', closeDeleteModal);

  document.querySelector('[data-delete-cancel]').addEventListener(
    'click',
    closeDeleteModal
  );

  /* ================================================================
     HAPUS MODUL VIA FETCH
     Controller destroy mengembalikan JSON, jadi form tidak boleh
     dibiarkan submit normal karena browser akan pindah ke halaman JSON.
     Kita kirim request ke controller, lalu tampilkan modal hasilnya.
  ================================================================ */
  var feedbackModal = document.getElementById('feedbackModal');
  var feedbackModalBackdrop = document.getElementById('feedbackModalBackdrop');
  var feedbackModalClose = document.getElementById('feedbackModalClose');
  var feedbackIcon = document.getElementById('feedbackIcon');
  var feedbackSuccessIcon = document.getElementById('feedbackSuccessIcon');
  var feedbackErrorIcon = document.getElementById('feedbackErrorIcon');
  var feedbackModalTitle = document.getElementById('feedbackModalTitle');
  var feedbackModalText = document.getElementById('feedbackModalText');

  function openFeedbackModal(type, title, message){
    var isSuccess = type === 'success';

    feedbackIcon.className = 'feedback-icon ' + (isSuccess ? 'success' : 'error');
    feedbackSuccessIcon.style.display = isSuccess ? 'block' : 'none';
    feedbackErrorIcon.style.display = isSuccess ? 'none' : 'block';
    feedbackModalTitle.textContent = title;
    feedbackModalText.textContent = message;

    feedbackModal.classList.add('is-open');
    feedbackModal.setAttribute('aria-hidden', 'false');
    document.body.classList.add('feedback-open');
    feedbackModalClose.focus();
  }

  function closeFeedbackModal(reloadPage){
    feedbackModal.classList.remove('is-open');
    feedbackModal.setAttribute('aria-hidden', 'true');
    document.body.classList.remove('feedback-open');

    if (reloadPage) {
      window.location.reload();
    }
  }

  deleteModalConfirm.addEventListener('click', function(){
    if (!activeDeleteForm) {
      return;
    }

    var form = activeDeleteForm;
    deleteModalConfirm.disabled = true;
    deleteModalConfirm.textContent = 'Menghapus...';

    var formData = new FormData(form);

    fetch(form.action, {
      method: 'POST',
      body: formData,
      headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'Accept': 'application/json'
      },
      credentials: 'same-origin'
    })
    .then(function(response){
      return response.json().then(function(data){
        if (!response.ok) {
          throw new Error(data.message || 'Modul gagal dihapus.');
        }
        return data;
      });
    })
    .then(function(data){
      closeDeleteModal();
      openFeedbackModal(
        'success',
        'Berhasil Dihapus',
        data.message || 'Modul berhasil dihapus dari sistem.'
      );
    })
    .catch(function(error){
      closeDeleteModal();
      openFeedbackModal(
        'error',
        'Gagal Menghapus',
        error.message || 'Terjadi kesalahan saat menghapus modul.'
      );
    })
    .finally(function(){
      deleteModalConfirm.disabled = false;
      deleteModalConfirm.textContent = 'Ya, Hapus Modul';
    });
  });

  feedbackModalClose.addEventListener('click', function(){
    var isSuccess = feedbackIcon.classList.contains('success');
    closeFeedbackModal(isSuccess);
  });

  feedbackModalBackdrop.addEventListener('click', function(){
    var isSuccess = feedbackIcon.classList.contains('success');
    closeFeedbackModal(isSuccess);
  });

  document.addEventListener('keydown', function(event){
    if (event.key === 'Escape') {
      if (!deleteModal.classList.contains('is-open') && !feedbackModal.classList.contains('is-open')) {
        return;
      }
      event.preventDefault();

      if (feedbackModal.classList.contains('is-open')) {
        var isSuccess = feedbackIcon.classList.contains('success');
        closeFeedbackModal(isSuccess);
        return;
      }

      closeDeleteModal();
    }
  });
})();
</script>
</body>
</html>
