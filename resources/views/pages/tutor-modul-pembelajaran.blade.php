<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LD Indonesia</title>
<meta name="description" content="Kelola modul pembelajaran dan simulasi LD Indonesia — tambah, ubah, dan rilis modul.">
<meta name="robots" content="noindex, nofollow">
<meta name="csrf-token" content="{{ csrf_token() }}">
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

.app-shell{ display: flex; min-height: 100vh; }
.main-col{ flex-grow: 1; min-width: 0; display: flex; flex-direction: column; }

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
.action-btn svg{ width: 18px; height: 18px; }

.empty-state{ padding: 64px 28px; text-align: center; }
.empty-state svg{ width: 52px; height: 52px; color: var(--gray-300); margin: 0 auto 14px; }
.empty-state-title{ font-weight: 700; font-size: 1rem; color: var(--navy); margin-bottom: 6px; }
.empty-state-text{ font-size: 0.9rem; color: var(--gray-500); }

/* ============ FOOTER & PAGINATION ============ */
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

@media (max-width: 980px){
  .filter-bar{ flex-direction: column; align-items: stretch; }
  .select-field{ flex: 1 1 auto; }
  .btn-add{ justify-content: center; }
}
@media (max-width: 640px){
  .table-footer{ flex-direction: column; align-items: flex-start; }
}
</style>
</head>
<body>
<a href="#mainContent" class="skip-link">Langsung ke konten utama</a>

<div class="app-shell">
  <!-- ============ SIDEBAR ============ -->
  <x-sidebar.tutor />

  <!-- ============ MAIN ============ -->
  <div class="main-col">
    <x-header.tutor />

    <main class="page-content" id="mainContent">
      <div class="page-heading">
        <h1>Kelola Modul</h1>
      </div>

      <!-- ============ FILTER + TAMBAH MODUL ============ -->
      <form method="GET" action="{{ url()->current() }}" id="filterTutorForm" class="filter-bar">
        @if(request('per_page'))
          <input type="hidden" name="per_page" value="{{ request('per_page') }}">
        @endif

        <div class="search-field">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg>
          <label for="searchInput" class="sr-only" hidden>Cari modul</label>
          <input 
            type="search" 
            name="search" 
            id="searchInput" 
            placeholder="Cari modul..." 
            value="{{ request('search') }}"
            autocomplete="off"
          >
        </div>

        <div class="select-field">
          <label for="levelFilter" class="sr-only" hidden>Filter level</label>
          <select name="level" id="levelFilter" onchange="document.getElementById('filterTutorForm').submit()">
            <option value="">Semua Level</option>
            <option value="A1" {{ request('level') === 'A1' ? 'selected' : '' }}>Level A1</option>
            <option value="A2" {{ request('level') === 'A2' ? 'selected' : '' }}>Level A2</option>
            <option value="B1" {{ request('level') === 'B1' ? 'selected' : '' }}>Level B1</option>
            <option value="B2" {{ request('level') === 'B2' ? 'selected' : '' }}>Level B2</option>
          </select>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
        </div>

        <div class="select-field">
          <label for="kategoriFilter" class="sr-only" hidden>Filter kategori</label>
          <select name="kategori" id="kategoriFilter" onchange="document.getElementById('filterTutorForm').submit()">
            <option value="">Semua Kategori</option>
            <option value="materi" {{ request('kategori') === 'materi' ? 'selected' : '' }}>Materi</option>
            <option value="simulasi_horen" {{ request('kategori') === 'simulasi_horen' ? 'selected' : '' }}>Simulasi Hören</option>
            <option value="simulasi_lesen" {{ request('kategori') === 'simulasi_lesen' ? 'selected' : '' }}>Simulasi Lesen</option>
            <option value="simulasi_schreiben" {{ request('kategori') === 'simulasi_schreiben' ? 'selected' : '' }}>Simulasi Schreiben</option>
            <option value="simulasi_sprechen" {{ request('kategori') === 'simulasi_sprechen' ? 'selected' : '' }}>Simulasi Sprechen</option>
          </select>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
        </div>

        <div class="filter-spacer"></div>

        <button type="submit" class="btn-add" style="border:none;">
          Cari
        </button>

        @if(request('search') || request('level') || request('kategori'))
          <a href="{{ route('modul.index') }}" class="btn-add">
            Reset
          </a>
        @endif

        <a class="btn-add" href="{{ route('modul.create') }}">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" aria-hidden="true"><path d="M12 5v14M5 12h14"/></svg>
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
                  <a href="{{ request()->fullUrlWithQuery(['sort' => 'judul', 'direction' => request('sort') === 'judul' && request('direction') === 'asc' ? 'desc' : 'asc', 'page' => 1]) }}" style="display:inline-flex;align-items:center;gap:6px;">
                    Judul
                    @if(request('sort') === 'judul')
                      {{ request('direction') === 'asc' ? '↑' : '↓' }}
                    @endif
                  </a>
                </th>
                <th scope="col">
                  <a href="{{ request()->fullUrlWithQuery(['sort' => 'level', 'direction' => request('sort') === 'level' && request('direction') === 'asc' ? 'desc' : 'asc', 'page' => 1]) }}" style="display:inline-flex;align-items:center;gap:6px;">
                    Level
                    @if(request('sort') === 'level')
                      {{ request('direction') === 'asc' ? '↑' : '↓' }}
                    @endif
                  </a>
                </th>
                <th scope="col">
                  <a href="{{ request()->fullUrlWithQuery(['sort' => 'kategori', 'direction' => request('sort') === 'kategori' && request('direction') === 'asc' ? 'desc' : 'asc', 'page' => 1]) }}" style="display:inline-flex;align-items:center;gap:6px;">
                    Kategori
                    @if(request('sort') === 'kategori')
                      {{ request('direction') === 'asc' ? '↑' : '↓' }}
                    @endif
                  </a>
                </th>
                <th>Materi</th>
                <th>Soal</th>
                <th scope="col">
                  <a href="{{ request()->fullUrlWithQuery(['sort' => 'updated_at', 'direction' => request('sort') === 'updated_at' && request('direction') === 'asc' ? 'desc' : 'asc', 'page' => 1]) }}" style="display:inline-flex;align-items:center;gap:6px;">
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
              @forelse($modules as $index => $module)
                @php
                  $kategoriLabel = match ($module->kategori) {
                      'materi' => 'Materi',
                      'simulasi_horen' => 'Simulasi Hören',
                      'simulasi_lesen' => 'Simulasi Lesen',
                      'simulasi_schreiben' => 'Simulasi Schreiben',
                      'simulasi_sprechen' => 'Simulasi Sprechen',
                      default => ucfirst(str_replace('_', ' ', $module->kategori)),
                  };
                @endphp
                <tr id="module-row-{{ $module->id }}">
                  {{-- JUDUL --}}
                  <td class="col-judul">
                    {{ $module->judul }}
                    @if($module->creator)
                      <div style="font-size: 0.75rem; color: var(--gray-500); margin-top: 4px; font-weight: 500;">
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
                  <td>{{ $kategoriLabel }}</td>

                  {{-- MATERI --}}
                  <td>
                    @if($module->file_path)
                      <a href="{{ asset('storage/' . $module->file_path) }}" target="_blank" style="color: var(--pink-dark); font-weight: 700; display: inline-flex; align-items: center; gap: 6px;">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="17" height="17">
                          <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                          <polyline points="14 2 14 8 20 8"/>
                          <line x1="16" y1="13" x2="8" y2="13"/>
                          <line x1="16" y1="17" x2="8" y2="17"/>
                        </svg>
                        Lihat PDF
                      </a>
                    @else
                      <span style="color: var(--gray-400);">Tidak ada</span>
                    @endif
                  </td>

                  {{-- JUMLAH SOAL --}}
                  <td>
                    <span style="display: inline-flex; align-items: center; justify-content: center; min-width: 38px; padding: 4px 8px; border-radius: 999px; background: var(--pink-light); color: var(--pink-dark); font-weight: 800; font-size: 0.82rem;">
                      {{ $module->questions_count ?? 0 }}
                    </span>
                    <span style="font-size: 0.82rem; color: var(--gray-500); margin-left: 4px;">soal</span>
                  </td>

                  {{-- TERAKHIR DIPERBARUI --}}
                  <td>
                    {{ $module->updated_at ? $module->updated_at->format('d M Y') : '-' }}
                  </td>

                  {{-- AKSI --}}
                  <td>
                    <div class="action-group">
                      {{-- Kelola Soal --}}
                      <a class="action-btn" href="{{ route('modul.soal.create', $module) }}" title="Kelola Soal">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h16v16H4z"/><path d="M8 9h8"/><path d="M8 13h8"/><path d="M8 17h5"/></svg>
                      </a>

                      {{-- Edit Modul --}}
                      <a class="action-btn" href="{{ route('modul.edit', $module) }}" title="Ubah Modul">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 20h9"/><path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4z"/></svg>
                      </a>

                      {{-- Tombol Rilis / Unrelease (Hapus diganti rilis) --}}
                      <form action="{{ route('modul.release', $module->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('PATCH')
                        <button
                            type="submit"
                            class="action-btn"
                            aria-label="{{ $module->sudah_rilis ? 'Tarik Publikasi ' . $module->judul : 'Rilis ' . $module->judul }}"
                            title="{{ $module->sudah_rilis ? 'Tarik Publikasi (Unrelease)' : 'Rilis Modul' }}"
                        >
                            @if($module->sudah_rilis)
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                    <circle cx="12" cy="12" r="3"/>
                                </svg>
                            @else
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
                      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                      <div class="empty-state-title">Modul tidak ditemukan</div>
                      <div class="empty-state-text">Belum ada modul yang cocok dengan kriteria filter saat ini.</div>
                    </div>
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>

        <!-- ============ PAGINASI & ROWS PER PAGE ============ -->
        @if($modules->total() > 0)
          <div class="table-footer">
            <div class="rows-per-page">
              Menampilkan <strong>{{ $modules->firstItem() }} – {{ $modules->lastItem() }}</strong> dari <strong>{{ $modules->total() }}</strong> modul
            </div>

            @if($modules->hasPages())
              <nav class="pagination" aria-label="Navigasi halaman">
                {{-- PREVIOUS --}}
                @if($modules->onFirstPage())
                  <button type="button" class="page-btn" disabled aria-label="Halaman sebelumnya">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>
                  </button>
                @else
                  <a href="{{ $modules->previousPageUrl() }}" class="page-btn" aria-label="Halaman sebelumnya">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>
                  </a>
                @endif

                {{-- NUMBER --}}
                @foreach($modules->getUrlRange(1, $modules->lastPage()) as $page => $url)
                  @if($page == $modules->currentPage())
                    <span class="page-btn active" aria-current="page">{{ $page }}</span>
                  @else
                    <a href="{{ $url }}" class="page-btn">{{ $page }}</a>
                  @endif
                @endforeach

                {{-- NEXT --}}
                @if($modules->hasMorePages())
                  <a href="{{ $modules->nextPageUrl() }}" class="page-btn" aria-label="Halaman berikutnya">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M9 6l6 6-6 6"/></svg>
                  </a>
                @else
                  <button type="button" class="page-btn" disabled aria-label="Halaman berikutnya">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M9 6l6 6-6 6"/></svg>
                  </button>
                @endif
              </nav>
            @endif
          </div>
        @endif
      </section>
    </main>
  </div>
</div>

<script>
(function(){
  "use strict";

  const searchInput = document.getElementById('searchInput');
  const filterForm = document.getElementById('filterTutorForm');
  let searchTimer;

  searchInput?.addEventListener('input', function() {
      clearTimeout(searchTimer);
      searchTimer = setTimeout(function() {
          filterForm.submit();
      }, 500);
  });
})();
</script>
</body>
</html>