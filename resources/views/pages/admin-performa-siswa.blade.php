<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LD Indonesia</title>
<meta name="description" content="Ringkasan aktivitas dan performa seluruh siswa LD Indonesia untuk admin.">
<meta name="robots" content="noindex, nofollow">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com">
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{
--navy:#1E2A47;--navy-soft:#435172;--pink:#EC4E8C;--pink-dark:#D63D79;
--pink-light:#FDEAF1;--pink-pale:#FFF4F8;--purple:#7C6FE0;--gold:#D4A017;
--maroon:#5C3620;--gray-50:#FAF9F7;--gray-100:#F3F1EE;--gray-200:#E7E4E0;
--gray-300:#D8D4CE;--gray-400:#9B9691;--gray-500:#7C776F;--gray-600:#6B675F;
--gray-800:#3A362F;--white:#FFF;--font-display:'Baloo 2','Inter',sans-serif;
--font-body:'Inter',sans-serif;--radius-sm:10px;--radius-lg:20px;
--radius-pill:999px;--shadow-sm:0 2px 8px rgba(30,42,71,.06);
--shadow-md:0 10px 30px rgba(30,42,71,.08);--sidebar-w:268px;--topbar-h:96px
}
body{font-family:var(--font-body);color:var(--gray-800);background:var(--gray-50);line-height:1.55;-webkit-font-smoothing:antialiased}
img,svg{display:block;max-width:100%}a{color:inherit;text-decoration:none}
button{font:inherit;cursor:pointer;border:none;background:none}
:focus-visible{outline:3px solid var(--purple);outline-offset:2px;border-radius:4px}
h1,h2{font-family:var(--font-display);color:var(--navy);font-weight:700}
.skip-link{position:absolute;left:-999px;top:0;background:var(--navy);color:#fff;padding:12px 20px;z-index:300;border-radius:0 0 8px 0}
.skip-link:focus{left:0}
.app-shell{display:flex;min-height:100vh}
.sidebar{width:var(--sidebar-w);flex-shrink:0;background:linear-gradient(180deg,var(--pink-pale),#FDF1F6);
border-right:1px solid var(--gray-200);display:flex;flex-direction:column;position:sticky;top:0;height:100vh;z-index:60}
.sidebar-brand{display:flex;align-items:center;gap:10px;padding:26px 24px;border-bottom:1px solid rgba(30,42,71,.06)}
.brand-mark{width:40px;height:40px;flex-shrink:0}.brand-text{display:flex;flex-direction:column;line-height:1.15}
.brand-text strong{font-family:var(--font-display);font-weight:800;font-size:1.02rem;color:var(--navy)}
.brand-text strong span{color:var(--pink)}.brand-text small{font-size:.66rem;color:var(--gray-600);font-weight:500}
.sidebar-nav{flex-grow:1;padding:20px 16px}.sidebar-nav ul{list-style:none;display:flex;flex-direction:column;gap:6px}
.nav-link{display:flex;align-items:center;gap:14px;padding:13px 16px;border-radius:var(--radius-sm);font-weight:700;font-size:.96rem;color:var(--navy-soft);transition:.15s}
.nav-link svg{width:21px;height:21px;flex-shrink:0}.nav-link:hover{background:rgba(236,78,140,.08);color:var(--pink-dark)}
.nav-link.active{background:var(--white);color:var(--pink-dark);box-shadow:var(--shadow-sm)}
.sidebar-footer{padding:20px 16px 26px;border-top:1px solid rgba(30,42,71,.06)}
.logout-link{display:flex;align-items:center;gap:14px;padding:13px 16px;border-radius:var(--radius-sm);font-weight:700;font-size:.96rem;color:var(--navy-soft)}
.logout-link:hover{background:rgba(224,72,63,.08);color:#C8392F}.logout-link svg{width:21px;height:21px}
.sidebar-close{display:none}.main-col{flex-grow:1;min-width:0;display:flex;flex-direction:column}
.topbar{height:var(--topbar-h);display:flex;align-items:center;justify-content:flex-end;gap:16px;padding:0 40px;
background:linear-gradient(115deg,#FCEFD9,#FDE4EE 55%,#FBCFE0);position:sticky;top:0;z-index:40}
.menu-toggle{display:none;width:40px;height:40px;align-items:center;justify-content:center;border-radius:var(--radius-sm);margin-right:auto;color:var(--navy)}
.user-summary{display:flex;align-items:center;gap:14px}.user-meta{text-align:right;line-height:1.25}
.user-meta strong{display:block;font-size:1.02rem;color:var(--navy);font-weight:800}.user-meta span{font-size:.84rem;color:var(--gray-600);font-weight:600}
.user-avatar{width:52px;height:52px;border-radius:50%;background:var(--white);border:2px solid var(--pink);display:flex;align-items:center;justify-content:center;
font-family:var(--font-display);font-weight:800;font-size:1.15rem;color:var(--pink-dark);flex-shrink:0}
.page-content{padding:36px 40px 60px;max-width:1320px;width:100%;margin:0 auto}.page-heading{margin-bottom:22px}.page-heading h1{font-size:1.7rem}
.filter-bar{display:flex;gap:14px;margin-bottom:22px;flex-wrap:wrap;align-items:center}.search-field{flex:1 1 280px;position:relative;min-width:200px}
.search-field svg{position:absolute;left:16px;top:50%;transform:translateY(-50%);width:18px;height:18px;color:var(--gray-400);pointer-events:none}
.search-field input{width:100%;font:inherit;font-size:.92rem;padding:13px 16px 13px 44px;border:1.5px solid var(--gray-200);border-radius:var(--radius-sm);background:#fff;box-shadow:var(--shadow-sm)}
.search-field input:focus{outline:none;border-color:var(--pink);box-shadow:0 0 0 4px var(--pink-pale)}
.select-field{position:relative;flex:0 0 200px}.select-field select{appearance:none;width:100%;font:inherit;font-weight:600;font-size:.92rem;padding:13px 40px 13px 18px;
border:1.5px solid var(--gray-200);border-radius:var(--radius-sm);background:#fff;color:var(--navy);box-shadow:var(--shadow-sm);cursor:pointer}
.select-field svg{position:absolute;right:16px;top:50%;transform:translateY(-50%);width:16px;height:16px;color:var(--gray-500);pointer-events:none}
.filter-spacer{flex-grow:1}.btn-export{display:inline-flex;align-items:center;gap:8px;padding:13px 24px;border-radius:var(--radius-pill);
background:var(--pink-pale);color:var(--pink-dark);font-weight:700;font-size:.94rem;white-space:nowrap;border:1.5px solid var(--pink-light);transition:.15s}
.btn-export:hover{background:var(--pink-light);transform:translateY(-2px)}.btn-export:disabled{opacity:.6;cursor:not-allowed;transform:none}
.btn-export svg{width:17px;height:17px}
.panel{background:#fff;border-radius:var(--radius-lg);box-shadow:var(--shadow-md);border:1px solid var(--gray-100);overflow:hidden}
.table-scroll{overflow-x:auto}table{width:100%;border-collapse:collapse;min-width:1080px}
thead th{text-align:left;font-size:.85rem;font-weight:700;color:var(--navy);background:var(--pink-light);padding:15px 24px;white-space:nowrap}
thead th:first-child{padding-left:28px}tbody td{padding:17px 24px;font-size:.92rem;color:var(--gray-800);border-bottom:1px solid var(--gray-100);vertical-align:middle;white-space:nowrap}
tbody td:first-child{padding-left:28px}tbody tr:last-child td{border-bottom:none}tbody tr:hover{background:var(--gray-50)}
td.col-name{font-weight:700;color:var(--navy)}td.col-nilai{font-weight:800;color:var(--navy)}
.activity-badge{display:inline-flex;align-items:center;justify-content:center;min-width:42px;padding:5px 10px;border-radius:999px;background:var(--pink-light);color:var(--pink-dark);font-weight:800;font-size:.82rem}
.activity-muted{color:var(--gray-400);font-weight:600}.activity-date{color:var(--gray-600);font-size:.86rem}
.action-btn{display:inline-flex;align-items:center;justify-content:center;width:36px;height:36px;border-radius:50%;color:var(--pink-dark);transition:background .15s}
.action-btn:hover{background:var(--pink-pale)}.action-btn svg{width:19px;height:19px}
.table-footer{display:flex;align-items:center;justify-content:space-between;gap:16px;padding:18px 28px;flex-wrap:wrap;border-top:1px solid var(--gray-100)}
.rows-per-page{display:flex;align-items:center;gap:10px;font-size:.88rem;color:var(--gray-600);font-weight:600}
.rows-per-page select{font:inherit;font-weight:700;color:var(--navy);padding:7px 30px 7px 12px;border:1.5px solid var(--gray-200);border-radius:8px;background:#fff;cursor:pointer}
.pagination{display:flex;align-items:center;gap:8px}.page-btn{min-width:34px;height:34px;padding:0 8px;border-radius:8px;border:1.5px solid var(--gray-200);
color:var(--navy);font-weight:700;font-size:.86rem;display:flex;align-items:center;justify-content:center;background:#fff}
.page-btn:hover:not(:disabled):not(.active){background:var(--gray-50)}.page-btn.active{background:var(--pink);border-color:var(--pink);color:#fff}
.page-btn:disabled{opacity:.4;cursor:not-allowed}.page-btn svg{width:16px;height:16px}
.empty-state{padding:64px 28px;text-align:center;color:var(--gray-500)}.empty-state-title{font-weight:700;color:var(--navy);margin-bottom:6px}
@media(max-width:980px){.sidebar{position:fixed;left:0;top:0;transform:translateX(-100%);transition:transform .22s;box-shadow:var(--shadow-md)}
.sidebar.open{transform:translateX(0)}.sidebar-close{display:flex;align-items:center;justify-content:center;width:34px;height:34px;border-radius:8px;margin-left:auto;color:var(--navy)}
.sidebar-brand{justify-content:space-between}.menu-toggle{display:flex}.topbar{padding:0 20px}.page-content{padding:26px 20px 48px}
.backdrop{display:none;position:fixed;inset:0;background:rgba(30,42,71,.35);z-index:50}.backdrop.show{display:block}.filter-bar{flex-direction:column;align-items:stretch}
.select-field{flex:1 1 auto}.btn-export{justify-content:center}}
@media(max-width:640px){.user-meta{display:none}.table-footer{flex-direction:column;align-items:flex-start}}
</style>
</head>
<body>
  <a href="#mainContent" class="skip-link">Langsung ke konten utama</a>

  <div class="app-shell">
  <div class="backdrop" id="backdrop"></div>
    <x-dashboard-sidebar />

  <div class="main-col">
    <x-dashboard-header />

  <main class="page-content" id="mainContent">
    <div class="page-heading"><h1>Performa Siswa</h1></div>

    <div class="filter-bar">
    <div class="search-field">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg>
      <input type="search" id="searchInput" placeholder="Cari nama siswa...">
    </div>
    <div class="select-field">
      <select id="levelFilter">
        <option value="">Semua Level</option><option value="A1">Level A1</option><option value="A2">Level A2</option><option value="B1">Level B1</option><option value="B2">Level B2</option>
      </select>
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
    </div>
    <div class="filter-spacer"></div>
      <button type="button" class="btn-export" id="exportBtn">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 3v13"/><path d="m7 11 5 5 5-5"/><path d="M5 21h14"/></svg>
        <span id="exportBtnLabel">Ekspor Excel</span>
      </button>
    </div>

  <section class="panel" aria-label="Aktivitas seluruh siswa">
    <div class="table-scroll">
      <table id="performaTable">
          <thead><tr>
            <th>Nama Pengguna</th>
            <th>Latihan Selesai</th>
            <th>Simulasi Selesai</th>
            <th>Level</th>
            <th>Nilai Rata-rata</th>
            <th>Aktivitas Terakhir</th>
            <th>Aksi</th>
          </tr></thead>
        <tbody id="performaTableBody">
          @forelse($students as $student)
          <tr data-name="{{ strtolower($student->name) }}" data-level="{{ $student->level ?? '' }}">
            <td class="col-name">{{ $student->name }}</td>
            <td><span class="activity-badge">{{ $student->latihan_selesai ?? 0 }}</span></td>
            <td><span class="activity-badge">{{ $student->simulasi_selesai ?? 0 }}</span></td>
            <td>{{ $student->level ?? '-' }}</td>
            <td class="col-nilai">{{ $student->nilai_rata_rata !== null ? number_format($student->nilai_rata_rata, 1) : '-' }}</td>
            <td class="activity-date">{{ $student->aktivitas_terakhir ? \Carbon\Carbon::parse($student->aktivitas_terakhir)->format('d M Y H:i') : 'Belum ada aktivitas' }}</td>
            <td>
              <a class="action-btn" href="{{ route('admin.siswa.detail', $student->id) }}" title="Lihat detail" aria-label="Lihat detail performa {{ $student->name }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z"/><circle cx="12" cy="12" r="3"/></svg>
              </a>
            </td>
          </tr>
          @empty
          <tr><td colspan="7"><div class="empty-state"><div class="empty-state-title">Belum ada data siswa</div><div>Belum ada aktivitas siswa yang dapat ditampilkan.</div></div></td></tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="table-footer">
        <div class="rows-per-page">Menampilkan <strong>{{ $students->firstItem() ?? 0 }}–{{ $students->lastItem() ?? 0 }}</strong>dari <strong>{{ $students->total() ?? $students->count() }}</strong> siswa
        </div>
          @if(method_exists($students, 'links'))
          <nav class="pagination" aria-label="Navigasi halaman">
            @if($students->onFirstPage())<button class="page-btn" disabled>‹</button>
             @else<a class="page-btn" href="{{ $students->previousPageUrl() }}">‹</a>@endif
             @foreach($students->getUrlRange(1,$students->lastPage()) as $page=>$url)
               @if($page==$students->currentPage())<span class="page-btn active">{{ $page }}</span>
               @else<a class="page-btn" href="{{ $url }}">{{ $page }}</a>@endif
             @endforeach
             @if($students->hasMorePages())<a class="page-btn" href="{{ $students->nextPageUrl() }}">›</a>
             @else<button class="page-btn" disabled>›</button>@endif
          </nav>
          @endif
        </div>
  </section>
</main>
</div>
</div>

<script>
(function(){
'use strict';

var searchInput=document.getElementById('searchInput');
var levelFilter=document.getElementById('levelFilter');
var rows=[].slice.call(document.querySelectorAll('#performaTableBody tr[data-name]'));

function filterRows(){
  var keyword=(searchInput.value||'').trim().toLowerCase();
  var level=levelFilter.value;
  rows.forEach(function(row){
    var matchName=!keyword || row.dataset.name.indexOf(keyword)!==-1;
    var matchLevel=!level || row.dataset.level===level;
    row.style.display=(matchName&&matchLevel)?'':'none';
  });
}
searchInput.addEventListener('input',filterRows);
levelFilter.addEventListener('change',filterRows);

var exportBtn=document.getElementById('exportBtn');
var exportLabel=document.getElementById('exportBtnLabel');

exportBtn.addEventListener('click',function(){
  if(typeof XLSX==='undefined'){
    alert('Pustaka Excel gagal dimuat. Periksa koneksi internet lalu coba lagi.');
    return;
  }

  exportBtn.disabled=true;
  exportLabel.textContent='Mengekspor...';

  var data=[];
  rows.forEach(function(row){
    if(row.style.display==='none') return;
    var cells=row.querySelectorAll('td');
    data.push({
      'Nama Pengguna':cells[0].innerText.trim(),
      'Latihan Selesai':cells[1].innerText.trim(),
      'Simulasi Selesai':cells[2].innerText.trim(),
      'Level':cells[3].innerText.trim(),
      'Nilai Rata-rata':cells[4].innerText.trim(),
      'Aktivitas Terakhir':cells[5].innerText.trim()
    });
  });

  var worksheet=XLSX.utils.json_to_sheet(data);
  worksheet['!cols']=[
    {wch:28},{wch:18},{wch:19},{wch:10},{wch:18},{wch:24}
  ];
  var workbook=XLSX.utils.book_new();
  XLSX.utils.book_append_sheet(workbook,worksheet,'Aktivitas Siswa');

  var today=new Date().toISOString().slice(0,10);
  XLSX.writeFile(workbook,'aktivitas-siswa-'+today+'.xlsx');

  exportBtn.disabled=false;
  exportLabel.textContent='Ekspor Excel';
});

var sidebar=document.getElementById('sidebar');
var menuToggle=document.getElementById('menuToggle');
var sidebarClose=document.getElementById('sidebarClose');
var backdrop=document.getElementById('backdrop');

function openSidebar(){sidebar.classList.add('open');backdrop.classList.add('show');menuToggle.setAttribute('aria-expanded','true')}
function closeSidebar(){sidebar.classList.remove('open');backdrop.classList.remove('show');menuToggle.setAttribute('aria-expanded','false')}
menuToggle.addEventListener('click',openSidebar);
sidebarClose.addEventListener('click',closeSidebar);
backdrop.addEventListener('click',closeSidebar);
})();
</script>
</body>
</html>
