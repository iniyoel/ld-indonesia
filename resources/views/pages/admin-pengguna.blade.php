<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kelola Pengguna — Admin — LD Indonesia</title>
<meta name="description" content="Kelola akun Admin, Tutor, dan Siswa LD Indonesia.">
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
  --green: #2C9E6C;
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

.page-content{ padding: 36px 40px 60px; max-width: 1320px; width: 100%; margin: 0 auto; }
.page-heading{ margin-bottom: 22px; }
.page-heading h1{ font-size: 1.7rem; }

/* ============ FILTER + ACTION BAR ============ */
.filter-bar{ display: flex; gap: 14px; margin-bottom: 22px; flex-wrap: wrap; align-items: center; }
.search-field{ flex: 1 1 240px; position: relative; min-width: 200px; }
.search-field svg{ position: absolute; left: 16px; top: 50%; transform: translateY(-50%); width: 18px; height: 18px; color: var(--gray-400); pointer-events: none; }
.search-field input{
  width: 100%; font: inherit; font-size: 0.92rem; padding: 13px 16px 13px 44px;
  border: 1.5px solid var(--gray-200); border-radius: var(--radius-sm); background: var(--white); box-shadow: var(--shadow-sm);
}
.search-field input:focus{ outline: none; border-color: var(--pink); box-shadow: 0 0 0 4px var(--pink-pale); }

.select-field{ position: relative; flex: 0 0 190px; }
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
  padding: 13px 24px; border-radius: var(--radius-sm);
  background: var(--white); color: var(--navy); border: 1.5px solid var(--gray-200);
  font-weight: 700; font-size: 0.94rem; white-space: nowrap;
  transition: background 0.15s ease;
}
.btn-add:hover{ background: var(--gray-50); }
.btn-add svg{ width: 17px; height: 17px; }

/* ============ TABLE PANEL ============ */
.panel{ background: var(--white); border-radius: var(--radius-lg); box-shadow: var(--shadow-md); border: 1px solid var(--gray-100); overflow: hidden; }
.table-scroll{ overflow-x: auto; }
table{ width: 100%; border-collapse: collapse; min-width: 960px; }
thead th{ text-align: left; font-size: 0.85rem; font-weight: 700; color: var(--navy); background: var(--pink-light); padding: 15px 24px; white-space: nowrap; }
thead th:first-child{ padding-left: 28px; }
tbody td{ padding: 17px 24px; font-size: 0.92rem; color: var(--gray-800); border-bottom: 1px solid var(--gray-100); vertical-align: middle; white-space: nowrap; }
tbody td:first-child{ padding-left: 28px; }
tbody tr:last-child td{ border-bottom: none; }
tbody tr:hover{ background: var(--gray-50); }
td.col-name{ font-weight: 600; color: var(--navy); }

.status-text{ font-weight: 700; }
.status-text.is-aktif{ color: var(--green); }
.status-text.is-nonaktif{ color: var(--gray-500); }
.status-expiry{ display: block; font-size: 0.76rem; font-weight: 500; color: var(--gray-400); margin-top: 2px; }

.action-group{ display: flex; align-items: center; gap: 4px; }
.action-btn{
  display: inline-flex; align-items: center; justify-content: center;
  width: 34px; height: 34px; border-radius: 8px; color: var(--pink-dark);
  transition: background 0.15s ease;
}
.action-btn:hover{ background: var(--pink-pale); }
.action-btn.is-delete:hover{ background: var(--red-bg); color: var(--red); }
.action-btn svg{ width: 18px; height: 18px; }

.empty-state{ padding: 64px 28px; text-align: center; }
.empty-state svg{ width: 52px; height: 52px; color: var(--gray-300); margin: 0 auto 14px; }
.empty-state-title{ font-weight: 700; font-size: 1rem; color: var(--navy); margin-bottom: 6px; }
.empty-state-text{ font-size: 0.9rem; color: var(--gray-500); }

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

.policy-note{
  display: flex; align-items: flex-start; gap: 10px;
  background: var(--pink-pale); border: 1px solid var(--pink-light); border-radius: var(--radius-md);
  padding: 16px 20px; margin-bottom: 22px; font-size: 0.86rem; color: var(--gray-600); line-height: 1.6;
}
.policy-note svg{ width: 18px; height: 18px; color: var(--pink-dark); flex-shrink: 0; margin-top: 1px; }

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

/* ============ MODAL: TAMBAH PENGGUNA ============ */
.modal-overlay{
  position: fixed; inset: 0; background: rgba(30,42,71,0.45);
  display: none; align-items: center; justify-content: center; padding: 20px; z-index: 200;
}
.modal-overlay.show{ display: flex; }
.modal-card{
  background: var(--white); border-radius: var(--radius-lg); box-shadow: 0 24px 60px rgba(30,42,71,0.25);
  width: 100%; max-width: 560px; max-height: calc(100vh - 40px); overflow-y: auto;
}
.modal-head{ display: flex; align-items: center; justify-content: space-between; padding: 26px 30px; border-bottom: 1px solid var(--gray-100); }
.modal-head h2{ font-size: 1.35rem; }
.modal-close{ width: 36px; height: 36px; border-radius: 50%; color: var(--pink-dark); display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.modal-close:hover{ background: var(--pink-pale); }
.modal-close svg{ width: 19px; height: 19px; }

.modal-body{ padding: 26px 30px 30px; }
.modal-field{ margin-bottom: 22px; }
.modal-field label{ display: block; font-weight: 700; font-size: 0.98rem; color: var(--navy); margin-bottom: 10px; }
.modal-input-group{ position: relative; }
.modal-input-group svg.field-icon{ position: absolute; left: 15px; top: 50%; transform: translateY(-50%); width: 18px; height: 18px; color: var(--gray-400); pointer-events: none; }
.modal-input-group input{
  width: 100%; font: inherit; font-size: 0.94rem; padding: 13px 16px 13px 44px;
  border: 1.5px solid var(--gray-200); border-radius: var(--radius-sm); background: var(--white); color: var(--gray-800);
  transition: border-color 0.15s ease, box-shadow 0.15s ease;
}
.modal-input-group input:focus{ outline: none; border-color: var(--pink); box-shadow: 0 0 0 4px var(--pink-pale); }
.modal-input-group input[aria-invalid="true"]{ border-color: var(--red); }

.modal-select-wrap{ position: relative; }
.modal-select-wrap select{
  appearance: none; -webkit-appearance: none; width: 100%; font: inherit; font-size: 0.94rem;
  padding: 13px 42px 13px 16px; border: 1.5px solid var(--gray-200); border-radius: var(--radius-sm);
  background: var(--white); color: var(--gray-800); cursor: pointer;
}
.modal-select-wrap select:invalid{ color: var(--gray-400); }
.modal-select-wrap select:focus{ outline: none; border-color: var(--pink); box-shadow: 0 0 0 4px var(--pink-pale); }
.modal-select-wrap select[aria-invalid="true"]{ border-color: var(--red); }
.modal-select-wrap svg{ position: absolute; right: 16px; top: 50%; transform: translateY(-50%); width: 16px; height: 16px; color: var(--gray-500); pointer-events: none; }

.modal-field-error{ display: none; align-items: center; gap: 6px; color: var(--red); font-size: 0.8rem; font-weight: 500; margin-top: 7px; }
.modal-field-error.show{ display: flex; }
.modal-field-error svg{ width: 14px; height: 14px; flex-shrink: 0; }

.modal-hint{
  display: flex; gap: 10px; background: var(--pink-pale); border: 1px solid var(--pink-light);
  border-radius: var(--radius-sm); padding: 14px 16px; font-size: 0.84rem; color: var(--gray-600); line-height: 1.6; margin-bottom: 24px;
}
.modal-hint svg{ width: 17px; height: 17px; color: var(--pink-dark); flex-shrink: 0; margin-top: 1px; }

/* ---- Read-only detail fields (modal Detail Pengguna) ---- */
.readonly-input{ background: var(--gray-50); color: var(--gray-800); cursor: default; }
.readonly-input:focus{ box-shadow: none; border-color: var(--gray-200); }
.readonly-input-plain{
  width: 100%; font: inherit; font-size: 0.94rem; padding: 13px 16px;
  border: 1.5px solid var(--gray-200); border-radius: var(--radius-sm);
}
.modal-field-row{ display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 22px; }

/* ---- Status toggle switch (menggantikan field Password pada Edit Pengguna) ---- */
.status-toggle-row{ display: flex; align-items: center; gap: 14px; }
.status-toggle{
  width: 52px; height: 30px; border-radius: var(--radius-pill); background: var(--gray-200);
  position: relative; flex-shrink: 0; transition: background 0.2s ease;
}
.status-toggle.is-on{ background: var(--green); }
.status-toggle-knob{
  position: absolute; top: 3px; left: 3px; width: 24px; height: 24px; border-radius: 50%;
  background: var(--white); box-shadow: 0 1px 3px rgba(0,0,0,0.2); transition: transform 0.2s ease;
}
.status-toggle.is-on .status-toggle-knob{ transform: translateX(22px); }
.status-toggle-label{ font-weight: 700; font-size: 0.94rem; color: var(--navy); min-width: 70px; }

/* ---- Modal konfirmasi hapus ---- */
.confirm-card{ max-width: 460px; }
.confirm-body{ padding: 36px 32px; text-align: center; }
.confirm-title{ font-weight: 700; font-size: 1.05rem; color: var(--navy); margin-bottom: 6px; }
.confirm-sub{ font-size: 0.88rem; color: var(--gray-500); margin-bottom: 26px; }
.confirm-actions{ display: flex; justify-content: center; gap: 12px; }
.btn-confirm-cancel{
  padding: 11px 28px; border-radius: var(--radius-pill); border: 1.5px solid var(--pink-light);
  color: var(--pink-dark); font-weight: 700; font-size: 0.92rem; background: var(--white);
}
.btn-confirm-cancel:hover{ background: var(--pink-pale); }
.btn-confirm-delete{
  padding: 11px 28px; border-radius: var(--radius-pill); border: 1.5px solid transparent;
  color: var(--pink-dark); font-weight: 700; font-size: 0.92rem; background: var(--pink-pale);
}
.btn-confirm-delete:hover{ background: var(--pink-light); }
.btn-confirm-delete:disabled{ opacity: 0.6; cursor: not-allowed; }

.modal-actions{ display: flex; justify-content: flex-end; gap: 12px; }
.btn-cancel{ padding: 13px 24px; border-radius: var(--radius-pill); font-weight: 700; font-size: 0.94rem; color: var(--navy-soft); }
.btn-cancel:hover{ background: var(--gray-100); }
.btn-save-user{
  display: inline-flex; align-items: center; gap: 8px; padding: 13px 30px; border-radius: var(--radius-pill);
  background: linear-gradient(135deg, var(--pink) 0%, var(--pink-dark) 100%); color: var(--white);
  font-weight: 700; font-size: 0.94rem; box-shadow: 0 12px 28px rgba(236,78,140,0.22);
  transition: transform 0.18s ease;
}
.btn-save-user:hover{ transform: translateY(-2px); }
.btn-save-user:disabled{ opacity: 0.7; cursor: not-allowed; transform: none; }
.btn-save-user .spinner{
  width: 15px; height: 15px; border: 2px solid rgba(255,255,255,0.5); border-top-color: #fff; border-radius: 50%;
  animation: spin 0.7s linear infinite; display: none;
}
.btn-save-user.is-loading .spinner{ display: inline-block; }
@keyframes spin{ to{ transform: rotate(360deg); } }

/* ---- Toast ---- */
.toast{
  position: fixed; top: 24px; right: 24px; z-index: 300;
  background: var(--white); border: 1px solid var(--green-bg, var(--gray-100)); border-left: 4px solid var(--green);
  border-radius: var(--radius-md); box-shadow: var(--shadow-md); padding: 16px 20px; max-width: 380px;
  display: flex; gap: 12px; align-items: flex-start;
  transform: translateX(120%); transition: transform 0.25s ease;
}
.toast.show{ transform: translateX(0); }
.toast svg{ width: 20px; height: 20px; color: var(--green); flex-shrink: 0; margin-top: 1px; }
.toast-title{ font-weight: 800; font-size: 0.9rem; color: var(--navy); margin-bottom: 2px; }
.toast-text{ font-size: 0.84rem; color: var(--gray-600); line-height: 1.5; }
@media (max-width: 640px){
  .modal-head, .modal-body{ padding-left: 20px; padding-right: 20px; }
  .toast{ left: 16px; right: 16px; max-width: none; }
}

/* =========================
   FOTO TUTOR - CROP MODAL
   ========================= */

.crop-modal-overlay{
    position: fixed;
    inset: 0;
    z-index: 300;
    display: none;
    align-items: center;
    justify-content: center;
    padding: 20px;
    background: rgba(30, 42, 71, 0.65);
}

.crop-modal-overlay.show{
    display: flex;
}

.crop-modal{
    width: min(620px, 100%);
    max-height: 90vh;
    overflow: auto;
    background: var(--white);
    border-radius: 20px;
    box-shadow: 0 20px 60px rgba(30,42,71,.25);
}

.crop-modal-head{
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 18px 22px;
    border-bottom: 1px solid var(--gray-100);
}

.crop-modal-head h3{
    font-size: 1.1rem;
}

.crop-modal-close{
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.crop-modal-close:hover{
    background: var(--gray-100);
}

.crop-editor{
    padding: 22px;
}

.crop-stage{
    position: relative;
    width: 100%;
    max-width: 560px;
    aspect-ratio: 13 / 7;
    margin: 0 auto;
    overflow: hidden;
    background: #111;
    border-radius: 12px;
    cursor: grab;
    touch-action: none;
}

.crop-stage:active{
    cursor: grabbing;
}

#cropImage{
    position: absolute;
    max-width: none;
    user-select: none;
    -webkit-user-drag: none;
}

.crop-overlay{
    position: absolute;
    inset: 0;
    pointer-events: none;
    border: 2px solid rgba(255,255,255,.9);
    box-shadow: 0 0 0 9999px rgba(0,0,0,.28);
    border-radius: 4px;
}

.crop-help{
    text-align: center;
    margin-top: 12px;
    color: var(--gray-600);
    font-size: .85rem;
}

.crop-zoom{
    display: flex;
    align-items: center;
    gap: 12px;
    margin-top: 18px;
}

.crop-zoom input{
    flex: 1;
}

.crop-modal-actions{
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    padding: 16px 22px 22px;
}
</style>
</head>
<body>
<a href="#mainContent" class="skip-link">Langsung ke konten utama</a>

<div class="app-shell">
  <div class="backdrop" id="backdrop"></div>

  <!-- ============ SIDEBAR ============ -->
  <aside class="sidebar" id="sidebar" aria-label="Navigasi utama">
    <div class="sidebar-brand">
      <a href="dashboard-admin.html" style="display:flex;align-items:center;gap:10px;" aria-label="LD Indonesia — Dashboard Admin">
        <svg class="brand-mark" viewBox="0 0 48 48" fill="none" aria-hidden="true">
          <path d="M24 4c-6 0-10 5-10 5s3 1 4 4c-3-1-6 0-7 3 3 0 5 1 6 3-3 1-5 3-5 6 3-1 5-1 7 0-1 3 0 6 2 8 1-3 2-5 3-6 1 1 2 3 3 6 2-2 3-5 2-8 2-1 4-1 7 0 0-3-2-5-5-6 1-2 3-3 6-3-1-3-4-4-7-3 1-3 4-4 4-4s-4-5-10-5z" fill="var(--maroon)"/>
          <circle cx="24" cy="17" r="4" fill="var(--gold)"/>
        </svg>
        <span class="brand-text">
          <strong>LD <span>INDONESIA</span></strong>
          <small>Privat Bahasa Jerman</small>
        </span>
      </a>
      <button class="sidebar-close" id="sidebarClose" aria-label="Tutup menu">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true"><path d="M18 6 6 18M6 6l12 12"/></svg>
      </button>
    </div>

    <nav class="sidebar-nav">
      <ul>
        <li>
          <a href="dashboard-admin.html" class="nav-link">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 11.5 12 4l9 7.5"/><path d="M5 10v10a1 1 0 0 0 1 1h4v-6h4v6h4a1 1 0 0 0 1-1V10"/></svg>
            Dashboard
          </a>
        </li>
        <li>
          <a href="admin-modul-pembelajaran.html" class="nav-link">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 5.5C2 4.7 2.7 4 4.7 4c2.6 0 5.3 1 7.3 2.5C14 4.9 16.7 4 19.3 4c2 0 2.7.7 2.7 1.5v13c0-.8-.7-1.5-2.7-1.5-2.6 0-5.3.9-7.3 2.5-2-1.6-4.7-2.5-7.3-2.5C2.7 17 2 17.7 2 18.5z"/><path d="M12 6.5V20"/></svg>
            Modul Pembelajaran
          </a>
        </li>
        <li>
          <a href="admin-performa-siswa.html" class="nav-link">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 3v18h18"/><rect x="7" y="12" width="3" height="6"/><rect x="12.5" y="8" width="3" height="10"/><rect x="18" y="5" width="3" height="13"/></svg>
            Performa Siswa
          </a>
        </li>
        <li>
          <a href="admin-pengguna.html" class="nav-link active" aria-current="page">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            Pengguna
          </a>
        </li>
      </ul>
    </nav>

    <div class="sidebar-footer">
      <a href="keluar.html" class="logout-link">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><path d="M16 17l5-5-5-5"/><path d="M21 12H9"/></svg>
        Keluar
      </a>
    </div>
  </aside>

  <!-- ============ MAIN ============ -->
  <div class="main-col">
    <header class="topbar">
      <button class="menu-toggle" id="menuToggle" aria-label="Buka menu navigasi" aria-expanded="false" aria-controls="sidebar">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" aria-hidden="true"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
      </button>
      <div class="user-summary">
        <div class="user-meta">
          <strong>{{ Auth::user()->name }}</strong>
          <span>Admin</span>
        </div>
        <div class="user-avatar" aria-hidden="true">
          @if(Auth::user()->profile_photo_path)
            <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="{{ Auth::user()->name }}" style="width:100%;height:100%;object-fit:cover;border-radius:50%;">
          @else
            {{ Str::upper(Str::substr(Auth::user()->name, 0, 1)) }}
          @endif
        </div>
      </div>
    </header>

    <main class="page-content" id="mainContent">
      <div class="page-heading">
        <h1>Kelola Pengguna</h1>
      </div>

      <!-- Catatan penting mengenai masa aktif akun siswa -->
      <div class="policy-note">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 8v5M12 16h.01"/></svg>
        <span>Akun siswa memiliki masa aktif <strong>1 bulan</strong> sejak dibuat (mengikuti durasi les). Status akan otomatis berubah menjadi <strong>Non-Aktif</strong> setelah masa tersebut habis, kecuali Admin memperpanjang secara manual setelah konfirmasi pembayaran diterima. Sistem tidak mengonfirmasi pembayaran secara otomatis.</span>
      </div>

      <!-- ============ FILTER + TAMBAH PENGGUNA ============ -->
      <!-- Catatan: kolom cari & filter Status/Peran di bawah ini baru tampilan (belum fungsional). -->
      <div class="filter-bar">
        <div class="search-field">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg>
          <label for="searchInput" class="sr-only" hidden>Cari nama pengguna</label>
          <input type="search" id="searchInput" placeholder="Cari...">
        </div>

        <div class="select-field">
          <label for="statusFilter" class="sr-only" hidden>Filter status</label>
          <select id="statusFilter">
            <option value="">Semua Status</option>
            <option value="Aktif">Aktif</option>
            <option value="Non-Aktif">Non-Aktif</option>
          </select>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
        </div>

        <div class="select-field">
          <label for="peranFilter" class="sr-only" hidden>Filter peran</label>
          <select id="peranFilter">
            <option value="">Semua Peran</option>
            <option value="Admin">Admin</option>
            <option value="Tutor">Tutor</option>
            <option value="Siswa">Siswa</option>
          </select>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
        </div>

        <div class="filter-spacer"></div>

        <a class="btn-add" href="admin-pengguna-form.html" id="addUserBtn">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" aria-hidden="true"><path d="M12 5v14M5 12h14"/></svg>
          Tambah Pengguna
        </a>
      </div>

      <!-- ============ TABLE PANEL ============ -->
      <section class="panel" aria-label="Daftar pengguna">
        <div class="table-scroll">
          <table>
            <thead>
              <tr>
                <th scope="col">Nama Pengguna</th>
                <th scope="col">Email</th>
                <th scope="col">Peran</th>
                <th scope="col">Status</th>
                <th scope="col">Dibuat</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody id="userTableBody"></tbody>
          </table>
        </div>

        <div class="empty-state" id="emptyState" hidden>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
          <div class="empty-state-title">Belum ada pengguna</div>
          <div class="empty-state-text">Klik "Tambah Pengguna" untuk membuat akun pertama.</div>
        </div>

        <!-- Catatan: paginasi di bawah ini baru tampilan (belum fungsional). -->
        <div class="table-footer" id="tableFooter">
          <div class="rows-per-page">
            Rows per page
            <select id="rowsPerPage" aria-label="Jumlah baris per halaman">
              <option value="15" selected>15</option>
              <option value="25">25</option>
              <option value="50">50</option>
            </select>
            <span class="results-count">1–15 of 200 rows</span>
          </div>
          <nav class="pagination" aria-label="Navigasi halaman (contoh tampilan)">
            <button class="page-btn" disabled aria-label="Halaman sebelumnya">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>
            </button>
            <button class="page-btn active" aria-current="page" aria-label="Halaman 1">1</button>
            <button class="page-btn" aria-label="Halaman 2">2</button>
            <button class="page-btn" aria-label="Halaman 3">3</button>
            <button class="page-btn" aria-label="Halaman berikutnya">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M9 6l6 6-6 6"/></svg>
            </button>
          </nav>
        </div>
      </section>
    </main>
  </div>
</div>

<!-- ============ MODAL: TAMBAH PENGGUNA ============ -->
<div class="modal-overlay" id="addUserModal" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
  <div class="modal-card">
    <div class="modal-head">
      <h2 id="modalTitle">Tambah Pengguna</h2>
      <button type="button" class="modal-close" id="modalCloseBtn" aria-label="Tutup">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true"><path d="M18 6 6 18M6 6l12 12"/></svg>
      </button>
    </div>

    <form class="modal-body" id="addUserForm" novalidate>
      <div class="modal-field">
        <label for="newUserName">Nama Pengguna</label>
        <div class="modal-input-group">
          <svg class="field-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
          <input type="text" id="newUserName" placeholder="Masukkan nama pengguna" aria-describedby="newUserNameError">
        </div>
        <p class="modal-field-error" id="newUserNameError">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 8v5M12 16h.01"/></svg>
          <span>Nama pengguna wajib diisi.</span>
        </p>
      </div>

      <div class="modal-field">
        <label for="newUserEmail">Email</label>
        <div class="modal-input-group">
          <svg class="field-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m2 7 10 6 10-6"/></svg>
          <input type="email" id="newUserEmail" placeholder="Masukkan Email" aria-describedby="newUserEmailError">
        </div>
        <p class="modal-field-error" id="newUserEmailError">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 8v5M12 16h.01"/></svg>
          <span>Masukkan alamat email yang valid.</span>
        </p>
      </div>

      <div class="modal-field" style="margin-bottom:16px;">
        <label for="newUserRole">Peran</label>
        <div class="modal-select-wrap">
          <select id="newUserRole" required aria-describedby="newUserRoleError">
            <option value="" selected disabled>Pilih Peran</option>
            <option value="Siswa">Siswa</option>
            <option value="Tutor">Tutor</option>
            <option value="Admin">Admin</option>
          </select>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
        </div>
        <p class="modal-field-error" id="newUserRoleError">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 8v5M12 16h.01"/></svg>
          <span>Pilih peran pengguna.</span>
        </p>
      </div>

      <div class="modal-field" id="newUserPhotoField" style="margin-bottom:16px;">
        <label for="newUserPhoto">Foto Profil</label>
        <input type="file" id="newUserPhoto" name="photo" accept="image/*" style="width:100%;padding:10px 12px;border:1px solid var(--gray-300);border-radius:10px;background:var(--white);">
        <p class="modal-field-help" id="newUserPhotoHelp" style="margin-top:8px;font-size:0.9rem;color:var(--gray-600);">Opsional untuk siswa/admin. Wajib untuk tutor agar foto tampil di landing page.</p>
        <p class="modal-field-error" id="newUserPhotoError">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 8v5M12 16h.01"/></svg>
          <span>Foto profil wajib diunggah untuk tutor.</span>
        </p>
      </div>

      <div class="modal-field" id="newUserDescriptionField" style="margin-bottom:16px; display:none;">
          <label for="newUserDescription">Deskripsi Tutor</label>

          <textarea
              id="newUserDescription"
              rows="4"
              maxlength="2000"
              placeholder="Tuliskan deskripsi singkat tutor..."
              style="width:100%;padding:12px;border:1px solid var(--gray-300);border-radius:10px;background:var(--white);resize:vertical;"
          ></textarea>

          <p class="modal-field-help" style="margin-top:8px;font-size:0.9rem;color:var(--gray-600);">
              Deskripsi ini akan ditampilkan pada kartu tutor di landing page.
          </p>

          <p class="modal-field-error" id="newUserDescriptionError">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true">
                  <circle cx="12" cy="12" r="10"/>
                  <path d="M12 8v5M12 16h.01"/>
              </svg>
              <span>Deskripsi tutor wajib diisi.</span>
          </p>
      </div>

      <div class="modal-field" style="margin-bottom:16px;">
        <label class="checkbox-label" style="display:flex;align-items:center;gap:10px;cursor:pointer;">
          <input type="checkbox" id="generatePassword" name="generate_password" checked>
          <span>Buat password otomatis untuk akun ini</span>
        </label>
        <p class="modal-field-help" style="margin-top:8px;font-size:0.9rem;color:var(--gray-600);">Jika opsi ini aktif, akun dibuat dengan password otomatis. Pengguna dapat mengatur ulang password sendiri melalui halaman lupa password.</p>
      </div>

      <!-- Muncul otomatis hanya saat Peran = Siswa -->
      <div class="modal-field" id="newUserLevelField" style="margin-bottom:16px; display:none;">
        <label for="newUserLevel">Level Siswa</label>
        <div class="modal-select-wrap">
          <select id="newUserLevel" aria-describedby="newUserLevelError">
            <option value="" selected disabled>Pilih Level</option>
            <option value="A1">A1</option>
            <option value="A2">A2</option>
            <option value="B1">B1</option>
            <option value="B2">B2</option>
          </select>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
        </div>
        <p class="modal-field-error" id="newUserLevelError">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 8v5M12 16h.01"/></svg>
          <span>Pilih level siswa.</span>
        </p>
      </div>

      <div class="modal-hint">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 8v5M12 16h.01"/></svg>
        <span>Akun akan dibuat dengan password otomatis. Jika opsi generate password aktif, password akan disiapkan oleh sistem dan pengguna dapat mengatur ulang lewat halaman lupa password.</span>
      </div>

      <div class="modal-actions">
        <button type="button" class="btn-cancel" id="modalCancelBtn">Batal</button>
        <button type="submit" class="btn-save-user" id="modalSaveBtn">
          <span class="spinner" aria-hidden="true"></span>
          <span id="modalSaveBtnLabel">Simpan</span>
        </button>
      </div>
    </form>
  </div>
</div>
<div class="crop-modal-overlay" id="cropModal" role="dialog" aria-modal="true" aria-labelledby="cropModalTitle">
    <div class="crop-modal">

        <div class="crop-modal-head">
            <h3 id="cropModalTitle">Sesuaikan Foto Tutor</h3>

            <button
                type="button"
                class="crop-modal-close"
                id="cropModalClose"
                aria-label="Tutup"
            >
                ×
            </button>
        </div>

        <div class="crop-editor">

            <div class="crop-stage" id="cropStage">
                <img
                    id="cropImage"
                    src=""
                    alt="Preview foto tutor"
                    draggable="false"
                >

                <div class="crop-overlay"></div>
            </div>

            <p class="crop-help">
                Geser foto agar wajah berada di tengah. Gunakan slider untuk memperbesar atau memperkecil.
            </p>

            <div class="crop-zoom">
                <span>−</span>

                <input
                    type="range"
                    id="cropZoom"
                    min="1"
                    max="3"
                    step="0.01"
                    value="1"
                    aria-label="Zoom foto"
                >

                <span>+</span>
            </div>

        </div>

        <div class="crop-modal-actions">
            <button
                type="button"
                class="btn-cancel"
                id="cropCancelBtn"
            >
                Batal
            </button>

            <button
                type="button"
                class="btn-save-user"
                id="cropApplyBtn"
            >
                Gunakan Foto
            </button>
        </div>

    </div>
</div>
<!-- ============ MODAL: DETAIL PENGGUNA ============ -->
<div class="modal-overlay" id="viewUserModal" role="dialog" aria-modal="true" aria-labelledby="viewModalTitle">
  <div class="modal-card">
    <div class="modal-head">
      <h2 id="viewModalTitle">Detail Pengguna</h2>
      <button type="button" class="modal-close" id="viewModalCloseBtn" aria-label="Tutup">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true"><path d="M18 6 6 18M6 6l12 12"/></svg>
      </button>
    </div>

    <div class="modal-body">
      <div class="modal-field">
        <label>Nama Pengguna</label>
        <div class="modal-input-group">
          <svg class="field-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
          <input type="text" id="viewUserName" class="readonly-input" readonly>
        </div>
      </div>

      <div class="modal-field">
        <label>Email</label>
        <div class="modal-input-group">
          <svg class="field-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m2 7 10 6 10-6"/></svg>
          <input type="text" id="viewUserEmail" class="readonly-input" readonly>
        </div>
      </div>

      <div class="modal-field-row">
        <div class="modal-field" style="margin-bottom:0;">
          <label>Peran</label>
          <input type="text" id="viewUserRole" class="readonly-input readonly-input-plain" readonly>
        </div>
        <div class="modal-field" id="viewUserLevelField" style="margin-bottom:0;">
          <label>Level Siswa</label>
          <input type="text" id="viewUserLevel" class="readonly-input readonly-input-plain" readonly>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ============ MODAL: EDIT PENGGUNA ============ -->
<div class="modal-overlay" id="editUserModal" role="dialog" aria-modal="true" aria-labelledby="editModalTitle">
  <div class="modal-card">
    <div class="modal-head">
      <h2 id="editModalTitle">Edit Pengguna</h2>
      <button type="button" class="modal-close" id="editModalCloseBtn" aria-label="Tutup">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true"><path d="M18 6 6 18M6 6l12 12"/></svg>
      </button>
    </div>

    <form class="modal-body" id="editUserForm" novalidate>
      <input type="hidden" id="editUserId">

      <div class="modal-field">
        <label for="editUserName">Nama Pengguna</label>
        <div class="modal-input-group">
          <svg class="field-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
          <input type="text" id="editUserName" aria-describedby="editUserNameError">
        </div>
        <p class="modal-field-error" id="editUserNameError">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 8v5M12 16h.01"/></svg>
          <span>Nama pengguna wajib diisi.</span>
        </p>
      </div>

      <div class="modal-field">
        <label for="editUserEmail">Email</label>
        <div class="modal-input-group">
          <svg class="field-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m2 7 10 6 10-6"/></svg>
          <input type="email" id="editUserEmail" aria-describedby="editUserEmailError">
        </div>
        <p class="modal-field-error" id="editUserEmailError">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 8v5M12 16h.01"/></svg>
          <span>Masukkan alamat email yang valid.</span>
        </p>
      </div>

      <div class="modal-field-row">
        <div class="modal-field" style="margin-bottom:16px;">
          <label for="editUserRole">Peran</label>
          <div class="modal-select-wrap">
            <select id="editUserRole" aria-describedby="editUserRoleError">
              <option value="Siswa">Siswa</option>
              <option value="Tutor">Tutor</option>
              <option value="Admin">Admin</option>
            </select>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
          </div>
          <p class="modal-field-error" id="editUserRoleError">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 8v5M12 16h.01"/></svg>
            <span>Pilih peran pengguna.</span>
          </p>
        </div>

        <!-- Muncul otomatis hanya saat Peran = Siswa -->
        <div class="modal-field" id="editUserLevelField" style="margin-bottom:16px; display:none;">
          <label for="editUserLevel">Level Siswa</label>
          <div class="modal-select-wrap">
            <select id="editUserLevel" aria-describedby="editUserLevelError">
              <option value="" selected disabled>Pilih Level</option>
              <option value="A1">A1</option>
              <option value="A2">A2</option>
              <option value="B1">B1</option>
              <option value="B2">B2</option>
            </select>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
          </div>
          <p class="modal-field-error" id="editUserLevelError">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 8v5M12 16h.01"/></svg>
            <span>Pilih level siswa.</span>
          </p>
        </div>
      </div>

      <!-- Menggantikan bagian "Password" pada rancangan awal, sesuai permintaan:
           Admin mengubah status Aktif/Non-Aktif akun langsung di form Edit ini. -->
      <div class="modal-field" style="margin-bottom:16px;">
        <label>Status Akun</label>
        <div class="status-toggle-row">
          <button type="button" class="status-toggle" id="editUserStatusToggle" role="switch" aria-checked="true" aria-label="Status akun aktif atau non-aktif">
            <span class="status-toggle-knob"></span>
          </button>
          <span class="status-toggle-label" id="editUserStatusLabel">Aktif</span>
        </div>
      </div>

      <div class="modal-actions">
        <button type="button" class="btn-cancel" id="editModalCancelBtn">Batal</button>
        <button type="submit" class="btn-save-user" id="editModalSaveBtn">
          <span class="spinner" aria-hidden="true"></span>
          <span id="editModalSaveBtnLabel">Simpan</span>
        </button>
      </div>
    </form>
  </div>
</div>

<!-- ============ MODAL: KONFIRMASI HAPUS ============ -->
<div class="modal-overlay" id="deleteConfirmModal" role="alertdialog" aria-modal="true" aria-labelledby="deleteConfirmTitle">
  <div class="modal-card confirm-card">
    <div class="confirm-body">
      <p class="confirm-title" id="deleteConfirmTitle">Apakah kamu yakin menghapus pengguna ini</p>
      <p class="confirm-sub">Tindakan ini tidak dapat diurungkan.</p>
      <div class="confirm-actions">
        <button type="button" class="btn-confirm-cancel" id="deleteCancelBtn">Batal</button>
        <button type="button" class="btn-confirm-delete" id="deleteConfirmBtn">Hapus</button>
      </div>
    </div>
  </div>
</div>

<!-- ============ TOAST ============ -->
<div class="toast" id="successToast" role="status" aria-live="polite">
  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="M22 4 12 14.01l-3-3"/></svg>
  <div>
    <div class="toast-title" id="toastTitle">Pengguna berhasil ditambahkan</div>
    <div class="toast-text" id="toastText"></div>
  </div>
</div>

<script>
(function(){
  "use strict";

  /* ==================================================================
     CATATAN INTEGRASI BACKEND
     - USERS di bawah ini adalah data contoh statis. Saat backend siap,
       ganti dengan fetch('/api/admin/pengguna') untuk data sesungguhnya
       (termasuk total baris untuk paginasi).
     - Tombol Lihat (ikon mata) membuka pop-up "Detail Pengguna" berisi
       data read-only: Nama Pengguna, Email, Peran, dan Level (hanya
       ditampilkan jika Peran = Siswa). Sesuai ketentuan, PASSWORD TIDAK
       ditampilkan pada pop-up ini sama sekali.
     - Tombol Edit (pensil) membuka pop-up "Edit Pengguna" yang berisi
       field Nama, Email, Peran, Level (khusus Siswa), dan sebuah
       toggle switch "Status Akun" (Aktif/Non-Aktif) — menggantikan
       posisi field Password pada rancangan desain, sesuai permintaan.
       Menekan "Simpan" langsung memperbarui data pengguna di tabel.
       Saat backend siap, ganti blok simulasi ini dengan
       fetch('/api/admin/pengguna/{id}', {method:'PATCH', body:{...}}).
     - Tombol Hapus (tempat sampah) juga fungsional secara lokal
       (konfirmasi lalu menghapus baris), dengan TODO memanggil API
       DELETE saat backend siap.
     - PENTING (aturan bisnis, dijalankan di BACKEND, bukan di sini):
       akun bertipe Siswa otomatis berubah menjadi Non-Aktif setelah
       1 bulan sejak tanggal dibuat, kecuali Admin memperpanjang secara
       manual setelah mengonfirmasi pembayaran. Baris Siswa di bawah ini
       menampilkan perkiraan tanggal berakhir (Dibuat + 1 bulan) sebagai
       info bantu untuk Admin — perhitungan sesungguhnya harus dilakukan
       di server agar konsisten dan tidak bisa dimanipulasi dari klien.
  ================================================================== */
  var MONTHS_ID = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];

  function formatDate(d){
    return d.getDate() + ' ' + MONTHS_ID[d.getMonth()] + ' ' + d.getFullYear();
  }
  function addOneMonth(d){
    var nd = new Date(d);
    nd.setMonth(nd.getMonth() + 1);
    return nd;
  }
  function normalizeRole(role){
    if (!role) return 'Siswa';
    return role.charAt(0).toUpperCase() + role.slice(1);
  }
  function normalizeStatus(status){
    if (!status) return 'Non-Aktif';
    return status === 'aktif' ? 'Aktif' : 'Non-Aktif';
  }
  function normalizeDisplayDate(dateValue){
    if (!dateValue) return null;
    var date = new Date(dateValue);
    if (Number.isNaN(date.getTime())) return null;
    return date;
  }

  var USERS = [];
  @if(isset($users))
  USERS = {!! json_encode($users->map(function ($user) {
      return [
          'id' => $user->id,
          'nama' => $user->name,
          'email' => $user->email,
          'peran' => ucfirst($user->role),
          'level' => $user->level,
          'status' => $user->status === 'aktif' ? 'Aktif' : 'Non-Aktif',
          'dibuat' => $user->created_at ? $user->created_at->toDateString() : null,
      ];
  })->all()) !!};
  @endif

  var tbody = document.getElementById('userTableBody');
  var emptyState = document.getElementById('emptyState');
  var tableFooter = document.getElementById('tableFooter');

  function render(){
    tbody.innerHTML = '';
    var isEmpty = USERS.length === 0;
    emptyState.hidden = !isEmpty;
    tableFooter.hidden = isEmpty;

    USERS.forEach(function(u){
      var tr = document.createElement('tr');
      var isAktif = u.status === 'Aktif';
      var createdDate = normalizeDisplayDate(u.dibuat);
      var expiryHtml = '';
      if (u.peran === 'Siswa'){
        var expiryDate = createdDate ? addOneMonth(createdDate) : null;
        expiryHtml = '<span class="status-expiry">' + (isAktif && expiryDate ? 'Berakhir ' + formatDate(expiryDate) : 'Masa aktif berakhir') + '</span>';
      }

      tr.innerHTML =
        '<td class="col-name">' + u.nama + '</td>' +
        '<td>' + u.email + '</td>' +
        '<td>' + u.peran + '</td>' +
        '<td><span class="status-text ' + (isAktif ? 'is-aktif' : 'is-nonaktif') + '">' + u.status + '</span>' + expiryHtml + '</td>' +
        '<td>' + (createdDate ? formatDate(createdDate) : '—') + '</td>' +
        '<td>' +
          '<div class="action-group">' +
            '<button type="button" class="action-btn" data-view-id="' + u.id + '" aria-label="Lihat detail ' + u.nama + '">' +
              '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z"/><circle cx="12" cy="12" r="3"/></svg>' +
            '</button>' +
            '<button type="button" class="action-btn" data-edit-id="' + u.id + '" aria-label="Ubah pengguna ' + u.nama + '">' +
              '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 20h9"/><path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4z"/></svg>' +
            '</button>' +
            '<button type="button" class="action-btn is-delete" data-delete-id="' + u.id + '" aria-label="Hapus ' + u.nama + '">' +
              '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/></svg>' +
            '</button>' +
          '</div>' +
        '</td>';
      tbody.appendChild(tr);
    });

    tbody.querySelectorAll('[data-view-id]').forEach(function(btn){
      btn.addEventListener('click', function(){
        var id = parseInt(btn.getAttribute('data-view-id'), 10);
        var user = USERS.find(function(u){ return u.id === id; });
        if (user) openViewModal(user);
      });
    });

    tbody.querySelectorAll('[data-edit-id]').forEach(function(btn){
      btn.addEventListener('click', function(){
        var id = parseInt(btn.getAttribute('data-edit-id'), 10);
        var user = USERS.find(function(u){ return u.id === id; });
        if (user) openEditModal(user);
      });
    });

    tbody.querySelectorAll('[data-delete-id]').forEach(function(btn){
      btn.addEventListener('click', function(){
        var id = parseInt(btn.getAttribute('data-delete-id'), 10);
        var target = USERS.find(function(u){ return u.id === id; });
        if (target) openDeleteModal(target);
      });
    });
  }

  render();

  /* ==================================================================
     MODAL: TAMBAH PENGGUNA
     - Saat "Simpan" ditekan dan validasi lolos, kode ini men-SIMULASIKAN
       alur nyata: password sementara dibuat otomatis lalu "dikirim" ke
       email pengguna (di sini hanya ditampilkan lewat toast, TIDAK ada
       email sungguhan yang terkirim). Pengguna baru langsung berstatus
       Aktif dan ditambahkan ke tabel.
     - TODO backend: ganti bagian simulasi ini dengan pemanggilan API,
       mis. fetch('/api/admin/pengguna', {method:'POST', body:{...}}),
       yang akan men-generate password acak di server, menyimpannya
       (dalam bentuk hash) ke database, lalu mengirim email berisi
       password sementara tersebut ke pengguna.
     - Dropdown Level (A1/A2/B1/B2) hanya muncul & wajib diisi saat
       Peran = "Siswa"; untuk Admin/Tutor field ini disembunyikan dan
       tidak divalidasi. Nilai level disimpan pada data pengguna untuk
       dipakai backend nanti.
  ================================================================== */
  var modal = document.getElementById('addUserModal');
  var addUserBtn = document.getElementById('addUserBtn');
  var modalCloseBtn = document.getElementById('modalCloseBtn');
  var modalCancelBtn = document.getElementById('modalCancelBtn');
  var addUserForm = document.getElementById('addUserForm');
  var nameInput = document.getElementById('newUserName');
  var emailInput = document.getElementById('newUserEmail');
  var roleSelect = document.getElementById('newUserRole');
  var photoInput = document.getElementById('newUserPhoto');
  var photoField = document.getElementById('newUserPhotoField');
  var photoError = document.getElementById('newUserPhotoError');
  var photoHelp = document.getElementById('newUserPhotoHelp');

  var descriptionInput = document.getElementById('newUserDescription');
  var descriptionField = document.getElementById('newUserDescriptionField');
  var descriptionError = document.getElementById('newUserDescriptionError');

  /* Crop */
  var cropModal = document.getElementById('cropModal');
  var cropStage = document.getElementById('cropStage');
  var cropImage = document.getElementById('cropImage');
  var cropZoom = document.getElementById('cropZoom');
  var cropApplyBtn = document.getElementById('cropApplyBtn');
  var cropCancelBtn = document.getElementById('cropCancelBtn');
  var cropModalClose = document.getElementById('cropModalClose');

  var cropState = {
      scale: 1,
      x: 0,
      y: 0,
      dragging: false,
      startX: 0,
      startY: 0,
      startImageX: 0,
      startImageY: 0
  };

  var croppedPhotoBlob = null;
  var generatePasswordCheckbox = document.getElementById('generatePassword');
  var levelField = document.getElementById('newUserLevelField');
  var levelSelect = document.getElementById('newUserLevel');
  var saveBtn = document.getElementById('modalSaveBtn');
  var saveBtnLabel = document.getElementById('modalSaveBtnLabel');
  var toast = document.getElementById('successToast');
  var toastText = document.getElementById('toastText');
  var toastTitle = document.getElementById('toastTitle');
  var toastTimer = null;

  function isValidEmail(value){ return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value); }
  function setFieldError(inputId, errorId, show){
    document.getElementById(inputId).setAttribute('aria-invalid', show ? 'true' : 'false');
    document.getElementById(errorId).classList.toggle('show', show);
  }
  function resetForm(){
      addUserForm.reset();

      croppedPhotoBlob = null;

      setFieldError(
          'newUserName',
          'newUserNameError',
          false
      );

      setFieldError(
          'newUserEmail',
          'newUserEmailError',
          false
      );

      setFieldError(
          'newUserRole',
          'newUserRoleError',
          false
      );

      setFieldError(
          'newUserLevel',
          'newUserLevelError',
          false
      );

      setFieldError(
          'newUserDescription',
          'newUserDescriptionError',
          false
      );

      photoError.classList.remove('show');

      levelField.style.display = 'none';
      descriptionField.style.display = 'none';

      cropState.scale = 1;
      cropState.x = 0;
      cropState.y = 0;
      cropZoom.value = '1';

      closeCropModal();
  }

  function toggleLevelField(){
    var showLevel = roleSelect.value === 'Siswa';
    levelField.style.display = showLevel ? 'block' : 'none';
    if (!showLevel){
      levelSelect.value = '';
      setFieldError('newUserLevel', 'newUserLevelError', false);
    }
  }
  function togglePhotoRequirement(){
      var isTutor = roleSelect.value === 'Tutor';

      photoHelp.textContent = isTutor
          ? 'Wajib untuk tutor. Setelah memilih foto, Anda dapat mengatur posisi wajah sebelum menyimpan.'
          : 'Opsional untuk siswa/admin.';

      photoField.style.display = 'block';

      descriptionField.style.display = isTutor ? 'block' : 'none';

      if (!isTutor) {
          descriptionInput.value = '';
          setFieldError(
              'newUserDescription',
              'newUserDescriptionError',
              false
          );
      }
  }
  togglePhotoRequirement();

  roleSelect.addEventListener('change', function(){
      toggleLevelField();
      togglePhotoRequirement();
  });

function openCropModal(file){
    var reader = new FileReader();

    reader.onload = function(e){
        cropImage.onload = function(){
            cropState.scale = 1;
            cropState.x = 0;
            cropState.y = 0;

            cropZoom.value = '1';

            updateCropImage();

            cropModal.classList.add('show');
            document.body.style.overflow = 'hidden';
        };

        cropImage.src = e.target.result;
    };

    reader.readAsDataURL(file);
}

function closeCropModal(){
    cropModal.classList.remove('show');
    document.body.style.overflow = '';
}

  function updateCropImage(){
      if (!cropImage.naturalWidth || !cropImage.naturalHeight) {
          return;
      }

      var stageWidth = cropStage.clientWidth;
      var stageHeight = cropStage.clientHeight;

      /*
      * Foto harus menutup seluruh area crop.
      */
      var baseScale = Math.max(
          stageWidth / cropImage.naturalWidth,
          stageHeight / cropImage.naturalHeight
      );

      var scale = baseScale * cropState.scale;

      var width = cropImage.naturalWidth * scale;
      var height = cropImage.naturalHeight * scale;

      /*
      * Posisi default berada di tengah.
      */
      var x = (stageWidth - width) / 2 + cropState.x;
      var y = (stageHeight - height) / 2 + cropState.y;

      cropImage.style.width = width + 'px';
      cropImage.style.height = height + 'px';
      cropImage.style.left = x + 'px';
      cropImage.style.top = y + 'px';
  }

  photoInput.addEventListener('change', function(){
      var file = this.files && this.files[0];

      if (!file) {
          return;
      }

      if (!file.type.startsWith('image/')) {
          this.value = '';
          return;
      }

      openCropModal(file);
  });

  cropZoom.addEventListener('input', function(){
      cropState.scale = parseFloat(this.value);
      updateCropImage();
  });

  cropStage.addEventListener('pointerdown', function(e){
      cropState.dragging = true;

      cropState.startX = e.clientX;
      cropState.startY = e.clientY;

      cropState.startImageX = cropState.x;
      cropState.startImageY = cropState.y;

      cropStage.setPointerCapture(e.pointerId);
  });

  cropStage.addEventListener('pointermove', function(e){
      if (!cropState.dragging) {
          return;
      }

      cropState.x =
          cropState.startImageX +
          (e.clientX - cropState.startX);

      cropState.y =
          cropState.startImageY +
          (e.clientY - cropState.startY);

      updateCropImage();
  });

  cropStage.addEventListener('pointerup', function(){
      cropState.dragging = false;
  });

  cropStage.addEventListener('pointercancel', function(){
      cropState.dragging = false;
  });


  function createCroppedPhoto(callback){
      var canvas = document.createElement('canvas');

      /*
      * Ratio dibuat sama dengan area foto tutor
      * di landing page: 260 x 150.
      */
      var outputWidth = 1040;
      var outputHeight = 600;

      canvas.width = outputWidth;
      canvas.height = outputHeight;

      var ctx = canvas.getContext('2d');

      var stageWidth = cropStage.clientWidth;
      var stageHeight = cropStage.clientHeight;

      var baseScale = Math.max(
          stageWidth / cropImage.naturalWidth,
          stageHeight / cropImage.naturalHeight
      );

      var scale = baseScale * cropState.scale;

      var renderedWidth = cropImage.naturalWidth * scale;
      var renderedHeight = cropImage.naturalHeight * scale;

      var imageX =
          (stageWidth - renderedWidth) / 2 +
          cropState.x;

      var imageY =
          (stageHeight - renderedHeight) / 2 +
          cropState.y;

      /*
      * Konversi koordinat area crop dari tampilan browser
      * ke koordinat gambar asli.
      */
      var sourceX = (-imageX) / scale;
      var sourceY = (-imageY) / scale;

      var sourceWidth = stageWidth / scale;
      var sourceHeight = stageHeight / scale;

      sourceX = Math.max(
          0,
          Math.min(sourceX, cropImage.naturalWidth - sourceWidth)
      );

      sourceY = Math.max(
          0,
          Math.min(sourceY, cropImage.naturalHeight - sourceHeight)
      );

      sourceWidth = Math.min(
          sourceWidth,
          cropImage.naturalWidth - sourceX
      );

      sourceHeight = Math.min(
          sourceHeight,
          cropImage.naturalHeight - sourceY
      );

      ctx.drawImage(
          cropImage,
          sourceX,
          sourceY,
          sourceWidth,
          sourceHeight,
          0,
          0,
          outputWidth,
          outputHeight
      );

      canvas.toBlob(function(blob){
          callback(blob);
      }, 'image/jpeg', 0.90);
  }

  cropApplyBtn.addEventListener('click', function(){
      cropApplyBtn.disabled = true;
      cropApplyBtn.textContent = 'Memproses...';

      createCroppedPhoto(function(blob){
          croppedPhotoBlob = blob;

          cropApplyBtn.disabled = false;
          cropApplyBtn.textContent = 'Gunakan Foto';

          closeCropModal();
      });
  });

  cropCancelBtn.addEventListener('click', function(){
      photoInput.value = '';
      croppedPhotoBlob = null;
      closeCropModal();
  });

  cropModalClose.addEventListener('click', function(){
      photoInput.value = '';
      croppedPhotoBlob = null;
      closeCropModal();
  });

  function openModal(){
    modal.classList.add('show');
    document.body.style.overflow = 'hidden';
    nameInput.focus();
  }
  function closeModal(){
    modal.classList.remove('show');
    document.body.style.overflow = '';
    resetForm();
  }

  addUserBtn.addEventListener('click', function(e){ e.preventDefault(); openModal(); });
  modalCloseBtn.addEventListener('click', closeModal);
  modalCancelBtn.addEventListener('click', closeModal);
  modal.addEventListener('click', function(e){ if (e.target === modal) closeModal(); });

  /* ---- Modal: Detail Pengguna (read-only) ---- */
  var viewModal = document.getElementById('viewUserModal');
  var viewModalCloseBtn = document.getElementById('viewModalCloseBtn');
  var viewUserLevelField = document.getElementById('viewUserLevelField');

  function openViewModal(user){
    document.getElementById('viewUserName').value = user.nama;
    document.getElementById('viewUserEmail').value = user.email;
    document.getElementById('viewUserRole').value = user.peran;

    var isSiswa = user.peran === 'Siswa';
    viewUserLevelField.style.display = isSiswa ? 'block' : 'none';
    document.getElementById('viewUserLevel').value = isSiswa ? (user.level || '—') : '';

    viewModal.classList.add('show');
    document.body.style.overflow = 'hidden';
  }
  function closeViewModal(){
    viewModal.classList.remove('show');
    document.body.style.overflow = '';
  }
  viewModalCloseBtn.addEventListener('click', closeViewModal);
  viewModal.addEventListener('click', function(e){ if (e.target === viewModal) closeViewModal(); });

  document.addEventListener('keydown', function(e){
    if (e.key !== 'Escape') return;
    if (modal.classList.contains('show')) closeModal();
    if (viewModal.classList.contains('show')) closeViewModal();
    if (editModal.classList.contains('show')) closeEditModal();
    if (deleteModal.classList.contains('show')) closeDeleteModal();
  });

  /* ---- Modal: Konfirmasi Hapus ---- */
  var deleteModal = document.getElementById('deleteConfirmModal');
  var deleteCancelBtn = document.getElementById('deleteCancelBtn');
  var deleteConfirmBtn = document.getElementById('deleteConfirmBtn');
  var pendingDeleteId = null;

  function openDeleteModal(user){
    pendingDeleteId = user.id;
    deleteModal.classList.add('show');
    document.body.style.overflow = 'hidden';
    deleteCancelBtn.focus();
  }
  function closeDeleteModal(){
    deleteModal.classList.remove('show');
    document.body.style.overflow = '';
    pendingDeleteId = null;
  }
  deleteCancelBtn.addEventListener('click', closeDeleteModal);
  deleteModal.addEventListener('click', function(e){ if (e.target === deleteModal) closeDeleteModal(); });

  deleteConfirmBtn.addEventListener('click', function(){
    if (pendingDeleteId === null) return;
    var id = pendingDeleteId;
    var target = USERS.find(function(u){ return u.id === id; });

    deleteConfirmBtn.disabled = true;
    deleteConfirmBtn.textContent = 'Menghapus…';

    fetch('/admin-pengguna/' + id, {
      method: 'DELETE',
      headers: {
        'Accept': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      }
    }).then(function(response){
      return response.json().then(function(data){
        if (!response.ok) throw new Error(data.message || 'Gagal menghapus pengguna');
        return data;
      });
    }).then(function(data){
      USERS = USERS.filter(function(u){ return u.id !== id; });
      render();

      deleteConfirmBtn.disabled = false;
      deleteConfirmBtn.textContent = 'Hapus';
      closeDeleteModal();
      if (target) showToast('Akun "' + target.nama + '" telah dihapus dari sistem.', 'Pengguna berhasil dihapus');
    }).catch(function(error){
      deleteConfirmBtn.disabled = false;
      deleteConfirmBtn.textContent = 'Hapus';
      showToast(error.message || 'Gagal menghapus pengguna.', 'Gagal');
    });
  });

  function generateTempPassword(){
    // Contoh pembuatan password sementara di sisi klien untuk keperluan demo.
    // Di produksi, password HARUS dibuat & di-hash di backend, tidak di browser.
    var chars = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789';
    var pass = '';
    for (var i = 0; i < 10; i++) pass += chars.charAt(Math.floor(Math.random() * chars.length));
    return pass;
  }

  function showToast(message, title){
    toastTitle.textContent = title || 'Berhasil';
    toastText.textContent = message;
    toast.classList.add('show');
    clearTimeout(toastTimer);
    toastTimer = setTimeout(function(){ toast.classList.remove('show'); }, 5000);
  }

  var nextUserId = 100;
  addUserForm.addEventListener('submit', function(e){
    e.preventDefault();

    var nameOk = nameInput.value.trim().length > 0;
    var emailOk = isValidEmail(emailInput.value.trim());
    var roleOk = roleSelect.value !== '';
    var isSiswa = roleSelect.value === 'Siswa';
    var isTutor = roleSelect.value === 'Tutor';

    var levelOk =
        !isSiswa ||
        levelSelect.value !== '';

    var descriptionOk =
      !isTutor ||
      descriptionInput.value.trim().length > 0;

    setFieldError('newUserName', 'newUserNameError', !nameOk);
    setFieldError('newUserEmail', 'newUserEmailError', !emailOk);
    setFieldError('newUserRole', 'newUserRoleError', !roleOk);
    setFieldError('newUserLevel', 'newUserLevelError', isSiswa && !levelOk);
    setFieldError('newUserDescription', 'newUserDescriptionError', isTutor && !descriptionOk);

    if (!nameOk || !emailOk || !roleOk || !levelOk || !descriptionOk) {
      return;
    }

    saveBtn.disabled = true;
    saveBtn.classList.add('is-loading');
    saveBtnLabel.textContent = 'Menyimpan…';

    var email = emailInput.value.trim();
    var name = nameInput.value.trim();
    var role = roleSelect.value;
    var level = isSiswa ? levelSelect.value : null;

    var description = role === 'Tutor'
        ? descriptionInput.value.trim()
        : '';

    var formData = new FormData();

    formData.append('name', name);
    formData.append('email', email);
    formData.append('role', role.toLowerCase());
    formData.append('level', level || '');
    formData.append('description', description);

    formData.append(
        'generate_password',
        generatePasswordCheckbox.checked ? '1' : '0'
    );

    if (role === 'Tutor') {
        if (!croppedPhotoBlob) {
            photoError.classList.add('show');

            saveBtn.disabled = false;
            saveBtn.classList.remove('is-loading');
            saveBtnLabel.textContent = 'Simpan';

            return;
        }

        formData.append(
            'photo',
            croppedPhotoBlob,
            'tutor-profile.jpg'
        );
    }

    fetch('/admin-pengguna', {
      method: 'POST',
      headers: {
        'Accept': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      },
      body: formData
    }).then(function(response){
      return response.json().then(function(data){
        if (!response.ok) {
          throw new Error(data.message || 'Gagal membuat pengguna');
        }
        return data;
      });
    }).then(function(data){
      USERS.push({
        id: data.user.id,
        nama: data.user.nama,
        email: data.user.email,
        peran: data.user.peran,
        level: data.user.level,
        status: data.user.status,
        dibuat: new Date(data.user.dibuat)
      });
      render();

      saveBtn.disabled = false;
      saveBtn.classList.remove('is-loading');
      saveBtnLabel.textContent = 'Simpan';
      closeModal();

      showToast('Akun pengguna berhasil dibuat. ' + (generatePasswordCheckbox.checked ? 'Password otomatis disiapkan dan pengguna dapat mengatur ulang lewat lupa password.' : 'Pengguna dapat mengatur ulang password lewat lupa password.'), 'Pengguna berhasil ditambahkan');
    }).catch(function(error){
      saveBtn.disabled = false;
      saveBtn.classList.remove('is-loading');
      saveBtnLabel.textContent = 'Simpan';
      showToast(error.message || 'Gagal membuat pengguna.', 'Gagal menambahkan pengguna');
    });
  });

  /* ---- Modal: Edit Pengguna ---- */
  var editModal = document.getElementById('editUserModal');
  var editModalCloseBtn = document.getElementById('editModalCloseBtn');
  var editModalCancelBtn = document.getElementById('editModalCancelBtn');
  var editUserForm = document.getElementById('editUserForm');
  var editUserIdInput = document.getElementById('editUserId');
  var editNameInput = document.getElementById('editUserName');
  var editEmailInput = document.getElementById('editUserEmail');
  var editRoleSelect = document.getElementById('editUserRole');
  var editLevelField = document.getElementById('editUserLevelField');
  var editLevelSelect = document.getElementById('editUserLevel');
  var editStatusToggle = document.getElementById('editUserStatusToggle');
  var editStatusLabel = document.getElementById('editUserStatusLabel');
  var editSaveBtn = document.getElementById('editModalSaveBtn');
  var editSaveBtnLabel = document.getElementById('editModalSaveBtnLabel');

  function toggleEditLevelField(){
    var showLevel = editRoleSelect.value === 'Siswa';
    editLevelField.style.display = showLevel ? 'block' : 'none';
    if (!showLevel) setFieldError('editUserLevel', 'editUserLevelError', false);
  }
  editRoleSelect.addEventListener('change', toggleEditLevelField);

  function setEditStatusToggle(isAktif){
    editStatusToggle.classList.toggle('is-on', isAktif);
    editStatusToggle.setAttribute('aria-checked', isAktif ? 'true' : 'false');
    editStatusLabel.textContent = isAktif ? 'Aktif' : 'Non-Aktif';
  }
  editStatusToggle.addEventListener('click', function(){
    setEditStatusToggle(!editStatusToggle.classList.contains('is-on'));
  });

  function openEditModal(user){
    editUserIdInput.value = user.id;
    editNameInput.value = user.nama;
    editEmailInput.value = user.email;
    editRoleSelect.value = user.peran;
    toggleEditLevelField();
    editLevelSelect.value = user.level || '';
    setEditStatusToggle(user.status === 'Aktif');

    setFieldError('editUserName', 'editUserNameError', false);
    setFieldError('editUserEmail', 'editUserEmailError', false);
    setFieldError('editUserLevel', 'editUserLevelError', false);

    editModal.classList.add('show');
    document.body.style.overflow = 'hidden';
    editNameInput.focus();
  }
  function closeEditModal(){
    editModal.classList.remove('show');
    document.body.style.overflow = '';
  }
  editModalCloseBtn.addEventListener('click', closeEditModal);
  editModalCancelBtn.addEventListener('click', closeEditModal);
  editModal.addEventListener('click', function(e){ if (e.target === editModal) closeEditModal(); });

  editUserForm.addEventListener('submit', function(e){
    e.preventDefault();

  var nameOk = editNameInput.value.trim().length > 0;
  var emailOk = isValidEmail(editEmailInput.value.trim());
  var isSiswaEdit = editRoleSelect.value === 'Siswa';
  var levelOk = !isSiswaEdit || editLevelSelect.value !== '';

  setFieldError('editUserName', 'editUserNameError', !nameOk);
  setFieldError('editUserEmail', 'editUserEmailError', !emailOk);
  setFieldError('editUserLevel', 'editUserLevelError', isSiswaEdit && !levelOk);

    if (!nameOk || !emailOk || !levelOk) return;

  editSaveBtn.disabled = true;
  editSaveBtn.classList.add('is-loading');
  editSaveBtnLabel.textContent = 'Menyimpan…';

    var editId = parseInt(editUserIdInput.value, 10);

  fetch('/admin-pengguna/' + editId, {
    method: 'PATCH',
    headers: {
      'Content-Type': 'application/json',
      'Accept': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    },
    body: JSON.stringify({
      name: editNameInput.value.trim(),
      email: editEmailInput.value.trim(),
      role: editRoleSelect.value.toLowerCase(),
      level: isSiswaEdit ? editLevelSelect.value : null,
      status: editStatusToggle.classList.contains('is-on') ? 'aktif' : 'non_aktif'
    })
  }).then(function(response){
    return response.json().then(function(data){
      if (!response.ok) throw new Error(data.message || 'Gagal memperbarui pengguna');
      return data;
    });
  }).then(function(data){
    var user = USERS.find(function(u){ return u.id === editId; });
    if (user){
      user.nama = data.user.nama;
      user.email = data.user.email;
      user.peran = data.user.peran;
      user.level = data.user.level;
      user.status = data.user.status;
      render();
    }

    editSaveBtn.disabled = false;
    editSaveBtn.classList.remove('is-loading');
    editSaveBtnLabel.textContent = 'Simpan';
    closeEditModal();
    showToast('Perubahan pada akun ini telah disimpan.', 'Data pengguna berhasil diperbarui');
  }).catch(function(error){
    editSaveBtn.disabled = false;
    editSaveBtn.classList.remove('is-loading');
    editSaveBtnLabel.textContent = 'Simpan';
    showToast(error.message || 'Gagal memperbarui pengguna.', 'Gagal');
  });
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
