<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LD Indonesia</title>
<link rel="icon" type="image/jpeg" href="{{ asset('images/logo-ld.jpeg') }}">
<meta name="description" content="Ringkasan performa seluruh siswa LD Indonesia untuk tutor.">
<meta name="robots" content="noindex, nofollow">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

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

.page-content{ 
  padding: 36px 40px 60px; 
  max-width: 1320px; 
  width: 100%; 
  margin: 0 auto; 
  box-sizing: border-box;
  overflow-x: hidden;
}
.page-heading{ margin-bottom: 22px; }
.page-heading h1{ font-size: 1.7rem; }

/* ============ FILTER + EKSPOR BAR ============ */
.filter-bar{ display: flex; gap: 14px; margin-bottom: 22px; flex-wrap: wrap; align-items: center; width: 100%; }
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
.btn-export{
  display: inline-flex; align-items: center; justify-content: center; gap: 8px;
  padding: 13px 24px; border-radius: var(--radius-pill);
  background: var(--pink-pale); color: var(--pink-dark);
  font-weight: 700; font-size: 0.94rem; white-space: nowrap;
  border: 1.5px solid var(--pink-light);
  transition: background 0.15s ease, transform 0.15s ease;
  cursor: pointer;
}
.btn-export:hover{ background: var(--pink-light); transform: translateY(-2px); }
.btn-export:disabled{ opacity: 0.6; cursor: not-allowed; transform: none; }
.btn-export svg{ width: 17px; height: 17px; }

/* ============ TABLE PANEL ============ */
.panel{ 
  background: var(--white); 
  border-radius: var(--radius-lg); 
  box-shadow: var(--shadow-md); 
  border: 1px solid var(--gray-100); 
  width: 100%;
  max-width: 100%;
  box-sizing: border-box;
}
.table-scroll{ 
  width: 100%;
  max-width: 100%;
  overflow-x: auto; 
  -webkit-overflow-scrolling: touch;
  display: block;
}
table{ width: 100%; border-collapse: collapse; min-width: 780px; }
thead th{ text-align: left; font-size: 0.85rem; font-weight: 700; color: var(--navy); background: var(--pink-light); padding: 15px 20px; white-space: nowrap; }
thead th:first-child{ padding-left: 24px; width: 60px; }
tbody td{ padding: 15px 20px; font-size: 0.92rem; color: var(--gray-800); border-bottom: 1px solid var(--gray-100); vertical-align: middle; white-space: nowrap; }
tbody td:first-child{ padding-left: 24px; }
tbody tr:last-child td{ border-bottom: none; }
tbody tr:hover{ background: var(--gray-50); }
td.col-name{ font-weight: 600; color: var(--navy); white-space: normal; min-width: 160px; word-break: break-word; }
td.col-nilai{ font-weight: 800; color: var(--navy); }
td.col-num{ color: var(--gray-500); font-weight: 600; }
.empty-state{ text-align: center; padding: 40px 20px; color: var(--gray-500); }

.action-btn{
  display: inline-flex; align-items: center; justify-content: center;
  width: 36px; height: 36px; border-radius: 50%; color: var(--pink-dark);
  transition: background 0.15s ease;
}
.action-btn:hover{ background: var(--pink-pale); }
.action-btn svg{ width: 19px; height: 19px; }

/* ============ FOOTER & PAGINATION ============ */
.table-footer{ display: flex; align-items: center; justify-content: space-between; gap: 16px; padding: 18px 24px; flex-wrap: wrap; border-top: 1px solid var(--gray-100); }
.rows-per-page{ display: flex; align-items: center; gap: 10px; font-size: 0.88rem; color: var(--gray-600); font-weight: 600; }
.rows-per-page select{
  font: inherit; font-weight: 700; color: var(--navy); padding: 7px 30px 7px 12px;
  border: 1.5px solid var(--gray-200); border-radius: 8px; appearance: none; -webkit-appearance: none;
  background: var(--white) url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="%237C776F" stroke-width="2.4"><path d="M6 9l6 6 6-6"/></svg>') no-repeat right 8px center;
  cursor: pointer;
}
.results-count{ font-size: 0.88rem; color: var(--gray-500); }
.pagination{ display: flex; align-items: center; gap: 6px; flex-wrap: wrap; }
.page-btn{
  min-width: 34px; height: 34px; padding: 0 8px; border-radius: 8px; border: 1.5px solid var(--gray-200);
  color: var(--navy); font-weight: 700; font-size: 0.86rem; display: flex; align-items: center; justify-content: center; background: var(--white);
}
.page-btn:hover:not(:disabled):not(.active){ background: var(--gray-50); }
.page-btn.active{ background: var(--pink); border-color: var(--pink); color: var(--white); }
.page-btn:disabled{ opacity: 0.4; cursor: not-allowed; }
.page-btn svg{ width: 16px; height: 16px; }

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
  .panel{ padding: 0; }
  .filter-bar{ flex-direction: column; align-items: stretch; gap: 10px; }
  .search-field, .select-field{ flex: 1 1 100%; width: 100%; }
  .btn-export{ width: 100%; justify-content: center; }
}

@media (max-width: 640px){
  .page-content{
    padding: 16px 12px 36px;
  }
  .page-heading h1{
    font-size: 1.35rem;
  }
  .table-footer{ 
    flex-direction: column; 
    align-items: flex-start; 
    gap: 12px;
    padding: 14px 16px;
  }
  .pagination{
    width: 100%;
    justify-content: center;
  }
  thead th{
    padding: 12px 14px;
    font-size: 0.78rem;
  }
  thead th:first-child{
    padding-left: 14px;
  }
  tbody td{
    padding: 12px 14px;
    font-size: 0.84rem;
  }
  tbody td:first-child{
    padding-left: 14px;
  }
}
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
      <div class="page-heading">
        <h1>Performa Siswa</h1>
      </div>

      <!-- ============ FILTER + EKSPOR FORM ============ -->
      <form method="GET" action="{{ url()->current() }}" id="filterPerformaTutorForm" class="filter-bar">
        @if(request('per_page'))
          <input type="hidden" name="per_page" value="{{ request('per_page') }}">
        @endif

        <div class="search-field">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg>
          <label for="searchInput" class="sr-only" hidden>Cari nama siswa</label>
          <input 
            type="search" 
            name="search" 
            id="searchInput" 
            placeholder="Cari nama siswa..." 
            value="{{ request('search') }}"
            autocomplete="off"
          >
        </div>

        <div class="select-field">
          <label for="levelFilter" class="sr-only" hidden>Filter level</label>
          <select name="level" id="levelFilter" onchange="document.getElementById('filterPerformaTutorForm').submit()">
            <option value="">Semua Level</option>
            <option value="A1" {{ request('level') === 'A1' ? 'selected' : '' }}>Level A1</option>
            <option value="A2" {{ request('level') === 'A2' ? 'selected' : '' }}>Level A2</option>
            <option value="B1" {{ request('level') === 'B1' ? 'selected' : '' }}>Level B1</option>
            <option value="B2" {{ request('level') === 'B2' ? 'selected' : '' }}>Level B2</option>
          </select>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
        </div>

        <div class="filter-spacer"></div>

        <button type="button" class="btn-export" id="exportBtn">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 3v13"/><path d="m7 11 5 5 5-5"/><path d="M5 21h14"/></svg>
          <span id="exportBtnLabel">Ekspor</span>
        </button>
      </form>

      <!-- ============ TABLE PANEL ============ -->
      <section class="panel" aria-label="Performa seluruh siswa">
        <div class="table-scroll">
          <table id="performaTable">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Pengguna</th>
                <th scope="col">Latihan Selesai</th>
                <th scope="col">Simulasi Selesai</th>
                <th scope="col">Level</th>
                <th scope="col">Nilai Rata-rata</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody id="performaTableBody">
              @forelse($students as $index => $student)
                <tr>
                  <td class="col-num">
                    {{ $students->firstItem() ? $students->firstItem() + $index : $index + 1 }}
                  </td>
                  <td class="col-name">{{ $student->name }}</td>
                  <td>{{ $student->latihan_count }}</td>
                  <td>{{ $student->simulasi_count }}</td>
                  <td>{{ $student->level ? 'Level ' . $student->level : '-' }}</td>
                  <td class="col-nilai">
                    {{ $student->avg_nilai !== null ? $student->avg_nilai : '—' }}
                  </td>
                  <td>
                    <a class="action-btn" href="{{ url('/tutor-siswa-detail/' . $student->id) }}" title="Lihat detail performa {{ $student->name }}" aria-label="Lihat detail performa {{ $student->name }}">
                      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z"/><circle cx="12" cy="12" r="3"/></svg>
                    </a>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="7">
                    <div class="empty-state">
                      <div>Tidak ada data siswa yang cocok dengan kriteria filter saat ini.</div>
                    </div>
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>

        <!-- ============ FOOTER & PAGINASI ============ -->
        @if($students->total() > 0)
          <div class="table-footer">
            <form method="GET" action="{{ url()->current() }}" class="rows-per-page">
              @if(request('search'))
                <input type="hidden" name="search" value="{{ request('search') }}">
              @endif
              @if(request('level'))
                <input type="hidden" name="level" value="{{ request('level') }}">
              @endif

              Rows per page
              <select name="per_page" id="rowsPerPage" aria-label="Jumlah baris per halaman" onchange="this.form.submit()">
                <option value="5" {{ request('per_page', 10) == 5 ? 'selected' : '' }}>5</option>
                <option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>10</option>
                <option value="15" {{ request('per_page', 10) == 15 ? 'selected' : '' }}>15</option>
                <option value="25" {{ request('per_page', 10) == 25 ? 'selected' : '' }}>25</option>
              </select>
              <span class="results-count">
                Menampilkan <strong>{{ $students->firstItem() }} – {{ $students->lastItem() }}</strong> dari <strong>{{ $students->total() }}</strong> siswa
              </span>
            </form>

            @if($students->hasPages())
              <nav class="pagination" aria-label="Navigasi halaman">
                {{-- PREVIOUS --}}
                @if($students->onFirstPage())
                  <button type="button" class="page-btn" disabled aria-label="Halaman sebelumnya">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>
                  </button>
                @else
                  <a href="{{ $students->previousPageUrl() }}" class="page-btn" aria-label="Halaman sebelumnya">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>
                  </a>
                @endif

                {{-- NOMOR HALAMAN --}}
                @foreach($students->getUrlRange(1, $students->lastPage()) as $page => $url)
                  @if($page == $students->currentPage())
                    <span class="page-btn active" aria-current="page">{{ $page }}</span>
                  @else
                    <a href="{{ $url }}" class="page-btn">{{ $page }}</a>
                  @endif
                @endforeach

                {{-- NEXT --}}
                @if($students->hasMorePages())
                  <a href="{{ $students->nextPageUrl() }}" class="page-btn" aria-label="Halaman berikutnya">
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

  // Debounce input pencarian
  const searchInput = document.getElementById('searchInput');
  const filterForm = document.getElementById('filterPerformaTutorForm');
  let searchTimer;

  searchInput?.addEventListener('input', function() {
      clearTimeout(searchTimer);
      searchTimer = setTimeout(function() {
          filterForm.submit();
      }, 500);
  });

  // Toggle Sidebar Mobile
  const sidebar = document.getElementById('sidebar');
  const menuToggle = document.getElementById('menuToggle');
  const sidebarClose = document.getElementById('sidebarClose');
  const backdrop = document.getElementById('backdrop');

  function openSidebar(){ 
    if (sidebar) sidebar.classList.add('open'); 
    if (backdrop) backdrop.classList.add('show'); 
    if (menuToggle) menuToggle.setAttribute('aria-expanded', 'true'); 
  }

  function closeSidebar(){ 
    if (sidebar) sidebar.classList.remove('open'); 
    if (backdrop) backdrop.classList.remove('show'); 
    if (menuToggle) menuToggle.setAttribute('aria-expanded', 'false'); 
  }

  if (menuToggle) menuToggle.addEventListener('click', openSidebar);
  if (sidebarClose) sidebarClose.addEventListener('click', closeSidebar);
  if (backdrop) backdrop.addEventListener('click', closeSidebar);

  // Ekspor Excel Data Tabel yang Tampil
  const exportBtn = document.getElementById('exportBtn');
  const exportBtnLabel = document.getElementById('exportBtnLabel');

  exportBtn?.addEventListener('click', function(){
    if (typeof XLSX === 'undefined'){
      alert('Library ekspor sedang dimuat, pastikan koneksi internet stabil.');
      return;
    }
    
    exportBtn.disabled = true;
    exportBtnLabel.textContent = 'Mengekspor…';

    const table = document.getElementById('performaTable');
    const workbook = XLSX.utils.table_to_book(table, { sheet: "Performa Siswa" });
    const today = new Date().toISOString().slice(0, 10);
    
    XLSX.writeFile(workbook, 'performa-siswa-tutor-' + today + '.xlsx');

    exportBtn.disabled = false;
    exportBtnLabel.textContent = 'Ekspor';
  });
})();
</script>
</body>
</html>