<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LD Indonesia</title>
<meta name="description" content="LD Indonesia adalah bimbingan belajar bahasa Jerman online untuk persiapan ujian A1, A2, B1, dan B2 (Goethe/ASM). Belajar bersama tutor berpengalaman, modul lengkap, latihan soal, dan grup belajar.">
<meta name="robots" content="index, follow">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; }

:root{
  --navy: #1E2A47;
  --navy-soft: #435172;
  --pink: #EC4E8C;
  --pink-dark: #D63D79;
  --pink-light: #FDEAF1;
  --pink-pale: #FFF4F8;
  --purple: #7C6FE0;
  --purple-dark: #6558C9;
  --gold: #D4A017;
  --gray-50: #FAF9F7;
  --gray-100: #F2F0ED;
  --gray-200: #E7E4E0;
  --gray-400: #9B9691;
  --gray-600: #6B675F;
  --gray-800: #3A362F;
  --white: #FFFFFF;

  --font-display: 'Baloo 2', 'Inter', sans-serif;
  --font-body: 'Inter', sans-serif;

  --radius-sm: 10px;
  --radius-md: 16px;
  --radius-lg: 24px;
  --radius-pill: 999px;

  --shadow-sm: 0 2px 8px rgba(30,42,71,0.06);
  --shadow-md: 0 8px 24px rgba(30,42,71,0.08);
  --shadow-lg: 0 16px 40px rgba(236,78,140,0.14);

  --container: 1180px;
}

body{
  font-family: var(--font-body);
  color: var(--gray-800);
  background: var(--white);
  line-height: 1.6;
  -webkit-font-smoothing: antialiased;
}

img, svg { display: block; max-width: 100%; }
a { color: inherit; text-decoration: none; }
ul { list-style: none; }
button { font: inherit; cursor: pointer; border: none; background: none; }

:focus-visible{
  outline: 3px solid var(--purple);
  outline-offset: 2px;
  border-radius: 4px;
}

.container{
  width: 100%;
  max-width: var(--container);
  margin: 0 auto;
  padding: 0 24px;
}

section { scroll-margin-top: 88px; }

h1, h2, h3, h4 { font-family: var(--font-display); color: var(--navy); font-weight: 700; line-height: 1.2; }

.eyebrow{
  display: inline-block;
  font-family: var(--font-body);
  font-weight: 700;
  font-size: 0.78rem;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--pink-dark);
  margin-bottom: 8px;
}

.section-head{
  text-align: center;
  max-width: 620px;
  margin: 0 auto 48px;
}
.section-head h2{ font-size: clamp(1.6rem, 3vw, 2.1rem); margin-bottom: 10px; }
.section-head p{ color: var(--gray-600); font-size: 1rem; }

.btn{
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  font-family: var(--font-body);
  font-weight: 700;
  font-size: 0.95rem;
  padding: 13px 26px;
  border-radius: var(--radius-pill);
  transition: transform 0.18s ease, box-shadow 0.18s ease, background 0.18s ease;
  white-space: nowrap;
}
.btn:hover{ transform: translateY(-2px); }
.btn-primary{
  background: linear-gradient(135deg, var(--pink) 0%, var(--pink-dark) 100%);
  color: var(--white);
  box-shadow: var(--shadow-lg);
}
.btn-primary:hover{ box-shadow: 0 20px 44px rgba(236,78,140,0.24); }
.btn-outline{
  background: var(--white);
  color: var(--pink-dark);
  border: 1.5px solid var(--pink);
}
.btn-outline:hover{ background: var(--pink-pale); }
.btn-ghost-navy{
  background: var(--pink);
  color: var(--white);
  border-radius: var(--radius-pill);
}
.btn-ghost-navy:hover{ background: var(--pink-dark); }
.btn-purple{
  background: linear-gradient(135deg, var(--purple) 0%, var(--purple-dark) 100%);
  color: var(--white);
  box-shadow: 0 12px 28px rgba(124,111,224,0.28);
}
.btn-block{ width: 100%; }
.btn-sm{ padding: 10px 20px; font-size: 0.85rem; }

.icon{ width: 20px; height: 20px; flex-shrink: 0; }

.skip-link{
  position: absolute;
  left: -999px;
  top: 0;
  background: var(--navy);
  color: var(--white);
  padding: 12px 20px;
  z-index: 200;
  border-radius: 0 0 8px 0;
}
.skip-link:focus{ left: 0; }

/* ============ HEADER ============ */
.site-header{
  position: sticky;
  top: 0;
  z-index: 100;
  background: rgba(255,255,255,0.92);
  backdrop-filter: blur(10px);
  border-bottom: 1px solid var(--gray-100);
}
.header-inner{
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 20px;
  padding: 14px 24px;
}
.brand{ display: flex; align-items: center; gap: 10px; }
.brand-logo-img{ width: 40px; height: 40px; border-radius: 50%; object-fit: cover; border: 1.5px solid var(--pink); flex-shrink: 0; }
.brand-text{ display: flex; flex-direction: column; line-height: 1.15; }
.brand-text strong{ font-family: var(--font-display); font-weight: 800; font-size: 1.05rem; color: var(--navy); }
.brand-text strong span{ color: var(--pink); }
.brand-text small{ font-size: 0.64rem; color: var(--gray-600); font-weight: 500; }

.nav-toggle{
  display: none;
  width: 40px; height: 40px;
  align-items: center; justify-content: center;
  border-radius: var(--radius-sm);
}
.nav-toggle:hover{ background: var(--gray-100); }

.main-nav ul{ display: flex; align-items: center; gap: 30px; }
.main-nav a{
  font-weight: 600;
  font-size: 0.95rem;
  color: var(--navy-soft);
  position: relative;
  padding: 6px 2px;
  transition: color 0.15s ease;
}
.main-nav a::after{
  content: "";
  position: absolute;
  left: 0; bottom: -2px;
  width: 0; height: 2px;
  background: var(--pink);
  transition: width 0.2s ease;
  border-radius: 2px;
}
.main-nav a:hover, .main-nav a.active{ color: var(--pink-dark); }
.main-nav a:hover::after, .main-nav a.active::after{ width: 100%; }

.header-actions{ display: flex; align-items: center; gap: 12px; }

.btn-whatsapp-header {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: var(--white);
  color: var(--pink-dark);
  border: 1.5px solid var(--pink);
  padding: 8px 18px;
  border-radius: var(--radius-pill);
  font-weight: 700;
  font-size: 0.88rem;
}
.btn-whatsapp-header:hover { background: var(--pink-pale); }

.btn-login-header {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: var(--pink);
  color: var(--white);
  padding: 8px 22px;
  border-radius: var(--radius-pill);
  font-weight: 700;
  font-size: 0.88rem;
}
.btn-login-header:hover { background: var(--pink-dark); }

/* ============ HERO (BLUR KIRI & KANAN) ============ */
.hero{
  position: relative;
  overflow: hidden;
  background: linear-gradient(135deg, #FCE9AE 0%, #F8C6DA 48%, #F294C1 100%);
  padding: 0;
}
.hero-grid{
  position: relative;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 32px;
  align-items: center;
  min-height: 440px;
  max-width: var(--container);
  margin: 0 auto;
  padding: 0 24px;
}
.hero-copy {
  padding: 64px 0;
  z-index: 2;
  text-align: left;
}
.hero-copy h1{ font-size: clamp(1.8rem, 3.5vw, 2.6rem); margin-bottom: 14px; }
.hero-copy h1 .accent{ color: var(--pink-dark); }
.hero-copy p{ color: var(--gray-600); font-size: 0.98rem; max-width: 440px; margin-bottom: 22px; }

.level-pills{ display: flex; gap: 8px; margin-bottom: 24px; flex-wrap: wrap; }
.level-pill{
  background: var(--white);
  color: var(--pink-dark);
  font-weight: 700;
  font-size: 0.85rem;
  padding: 6px 18px;
  border-radius: var(--radius-pill);
  box-shadow: var(--shadow-sm);
}

.hero-ctas{ display: flex; gap: 12px; flex-wrap: wrap; }

.hero-visual{ 
  position: absolute; 
  top: 0;
  right: 0;
  bottom: 0;
  width: 50vw;
  display: flex; 
  align-items: center; 
  justify-content: center; 
  overflow: hidden;
  pointer-events: none;
}

/* Siluet landmark full kanan, dengan efek blur/fade di sisi KIRI dan KANAN */
.hero-bg-landmark {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  height: 100%;
  width: 100%;
  object-fit: cover;
  object-position: right center;
  opacity: 0.35;
  mix-blend-mode: overlay;
  -webkit-mask-image: linear-gradient(to right, rgba(0,0,0,0) 0%, rgba(0,0,0,1) 25%, rgba(0,0,0,1) 85%, rgba(0,0,0,0) 100%);
  mask-image: linear-gradient(to right, rgba(0,0,0,0) 0%, rgba(0,0,0,1) 25%, rgba(0,0,0,1) 85%, rgba(0,0,0,0) 100%);
}

.seal-badge{
  position: relative;
  width: 240px; height: 240px;
  background: rgba(255, 255, 255, 0.92);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 16px 32px rgba(30,42,71,0.12);
  border: 4px solid var(--white);
  z-index: 2;
}
.seal-badge img {
  width: 100%;
  height: 100%;
  object-fit: contain;
  border-radius: 50%;
}

/* ============ FASILITAS ============ */
.section{ padding: 80px 0; }
.section-alt{ background: var(--gray-50); }

.facility-grid{
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
}
.facility-card{
  background: var(--white);
  border: 1px solid var(--gray-100);
  border-radius: var(--radius-md);
  padding: 26px 20px;
  text-align: center;
  transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
}
.facility-card:hover{
  transform: translateY(-4px);
  box-shadow: var(--shadow-md);
  border-color: transparent;
}
.facility-icon{
  width: 50px; height: 50px;
  border-radius: 14px;
  display: flex; align-items: center; justify-content: center;
  margin: 0 auto 16px;
}
.facility-icon svg{ width: 24px; height: 24px; }
.icon-1{ background: #FDECD9; color: #D98A2B; }
.icon-2{ background: #FCE3EC; color: var(--pink-dark); }
.icon-3{ background: #FDE7EC; color: #E0507B; }
.icon-4{ background: #ECE9FB; color: var(--purple-dark); }
.icon-5{ background: #FDE7EF; color: var(--pink-dark); }
.icon-6{ background: #ECE9FB; color: var(--purple-dark); }

.facility-card h3{ font-size: 1rem; margin-bottom: 6px; }
.facility-card p{ font-size: 0.85rem; color: var(--gray-600); }

/* ============ TUTOR ============ */
.tutor-wrap{ position: relative; }
.tutor-track{
  display: flex;
  gap: 20px;
  overflow-x: auto;
  scroll-snap-type: x mandatory;
  scroll-behavior: smooth;
  padding: 4px 4px 16px;
  -ms-overflow-style: none;
  scrollbar-width: none;
}
.tutor-track::-webkit-scrollbar{ display: none; }
.tutor-card{
  scroll-snap-align: start;
  flex: 0 0 320px;
  display: flex;
  align-items: center;
  min-height: 140px;
  padding: 16px;
  background: var(--white);
  border: 1px solid var(--gray-100);
  border-radius: var(--radius-md);
  overflow: hidden;
  transition: box-shadow 0.2s ease, transform 0.2s ease;
}
.tutor-card:hover{
  box-shadow: var(--shadow-md);
  transform: translateY(-4px);
}
.tutor-photo{
  width: 80px;
  height: 80px;
  flex: 0 0 80px;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
  border-radius: 50%;
}
.tutor-photo img{
  width: 100%;
  height: 100%;
  display: block;
  object-fit: cover;
  border-radius: 50%;
}
.tutor-photo svg{
  width: 100%;
  height: 100%;
  display: block;
  border-radius: 50%;
}
.tutor-info{
  flex: 1;
  min-width: 0;
  padding: 0 0 0 14px;
}
.tutor-info h3{
  font-size: 0.98rem;
  margin: 0 0 2px;
  color: var(--navy);
}
.tutor-info p{
  font-size: 0.8rem;
  line-height: 1.45;
  color: var(--gray-600);
  margin: 0;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
.tutor-nav{
  display: flex;
  justify-content: center;
  gap: 12px;
  margin-top: 20px;
}
.tutor-nav-btn{
  width: 40px; height: 40px;
  border-radius: 50%;
  background: var(--white);
  border: 1.5px solid var(--gray-200);
  display: flex; align-items: center; justify-content: center;
  color: var(--navy);
  transition: background 0.15s ease, border-color 0.15s ease;
}
.tutor-nav-btn:hover{ background: var(--pink-pale); border-color: var(--pink); color: var(--pink-dark); }
.tutor-nav-btn:disabled{ opacity: 0.35; cursor: not-allowed; }

/* ============ PAKET ============ */
.paket-grid{
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 20px;
}
.paket-card{
  background: var(--white);
  border: 1px solid var(--gray-100);
  border-radius: var(--radius-lg);
  padding: 26px 22px;
  display: flex;
  flex-direction: column;
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.paket-card:hover{ transform: translateY(-4px); box-shadow: var(--shadow-md); }
.paket-card.featured{
  border: 2px solid var(--purple);
  box-shadow: 0 16px 36px rgba(124,111,224,0.16);
  position: relative;
}
.paket-tag-best{
  position: absolute;
  top: -13px; left: 50%;
  transform: translateX(-50%);
  background: var(--purple);
  color: var(--white);
  font-size: 0.7rem;
  font-weight: 700;
  padding: 4px 12px;
  border-radius: var(--radius-pill);
}
.paket-level{ font-family: var(--font-display); font-weight: 800; font-size: 1.1rem; color: var(--pink-dark); }
.paket-card.featured .paket-level{ color: var(--purple-dark); }
.paket-tier{ font-size: 0.76rem; color: var(--gray-400); font-weight: 600; margin-bottom: 12px; }
.paket-price{ font-family: var(--font-display); font-size: 1.5rem; font-weight: 800; color: var(--navy); margin-bottom: 16px; }
.paket-features{ margin-bottom: 20px; flex-grow: 1; }
.paket-features li{
  display: flex;
  align-items: flex-start;
  gap: 8px;
  font-size: 0.85rem;
  color: var(--gray-600);
  margin-bottom: 10px;
}
.paket-features svg{ width: 15px; height: 15px; flex-shrink: 0; margin-top: 3px; color: var(--pink); }
.paket-card.featured .paket-features svg{ color: var(--purple); }
.paket-note{ text-align: center; color: var(--gray-400); font-size: 0.78rem; margin-top: 24px; }

/* ============ CARA BOOKING ============ */
.step-grid{
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 0;
  position: relative;
}
.step-item{ text-align: center; padding: 0 14px; position: relative; }
.step-icon-wrap{ position: relative; display: inline-flex; margin-bottom: 16px; }
.step-icon{
  width: 68px; height: 68px;
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  background: var(--white);
  box-shadow: var(--shadow-sm);
}
.step-icon svg{ width: 28px; height: 28px; }
.step-1 .step-icon{ color: var(--pink-dark); background: var(--pink-pale); }
.step-2 .step-icon{ color: #D98A2B; background: #FDECD9; }
.step-3 .step-icon{ color: var(--purple-dark); background: #ECE9FB; }
.step-4 .step-icon{ color: #2C9E6C; background: #DEF4E8; }
.step-num{
  position: absolute;
  top: -4px; right: -4px;
  width: 24px; height: 24px;
  border-radius: 50%;
  background: var(--navy);
  color: var(--white);
  font-size: 0.7rem;
  font-weight: 700;
  display: flex; align-items: center; justify-content: center;
  border: 2px solid var(--white);
}
.step-arrow{
  position: absolute;
  top: 32px; right: -12px;
  color: var(--gray-200);
  width: 20px; height: 20px;
}
.step-item h3{ font-size: 0.95rem; margin-bottom: 6px; }
.step-item p{ font-size: 0.82rem; color: var(--gray-600); }

/* ============ FOOTER ============ */
.site-footer{ background: #FFF4F8; padding: 48px 0 24px; border-top: 1px solid var(--gray-100); }
.footer-inner-row{
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 32px;
  padding-bottom: 32px;
  border-bottom: 1px solid rgba(30,42,71,0.08);
}
.footer-brand-wrap { display: flex; align-items: center; gap: 12px; }
.footer-social-wrap { display: flex; align-items: center; gap: 16px; }
.footer-social-wrap span { font-weight: 600; font-size: 0.9rem; color: var(--navy); }
.footer-social-icons { display: flex; gap: 10px; }
.footer-contact-wrap { display: flex; align-items: center; gap: 16px; }
.footer-contact-wrap span { font-weight: 600; font-size: 0.9rem; color: var(--navy); }

.social-btn{
  width: 38px; height: 38px;
  border-radius: 50%;
  background: var(--white);
  display: flex; align-items: center; justify-content: center;
  color: var(--navy);
  box-shadow: var(--shadow-sm);
  transition: background 0.15s ease, color 0.15s ease;
}
.social-btn:hover{ background: var(--pink); color: var(--white); }
.social-btn svg{ width: 17px; height: 17px; }

.contact-link-row{
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: var(--white);
  padding: 8px 16px;
  border-radius: var(--radius-pill);
  font-weight: 700;
  font-size: 0.85rem;
  color: var(--navy);
  box-shadow: var(--shadow-sm);
}
.contact-link-row svg{ width: 16px; height: 16px; color: #2CB84E; }
.contact-link-row:hover{ color: var(--pink-dark); }

.footer-bottom{
  padding-top: 20px;
  text-align: center;
  font-size: 0.8rem;
  color: var(--gray-400);
}

/* ============ RESPONSIVE ============ */
@media (max-width: 980px){
  .hero-grid{ grid-template-columns: 1fr; min-height: auto; padding-left: 24px; padding-right: 24px; }
  .hero-visual{ position: relative; width: 100%; height: 280px; order: -1; }
  .hero-copy { padding: 36px 0; }
  .hero-bg-landmark { -webkit-mask-image: linear-gradient(to bottom, rgba(0,0,0,0), rgba(0,0,0,1)); mask-image: linear-gradient(to bottom, rgba(0,0,0,0), rgba(0,0,0,1)); }
  .facility-grid{ grid-template-columns: repeat(2, 1fr); }
  .paket-grid{ grid-template-columns: repeat(2, 1fr); }
  .step-grid{ grid-template-columns: repeat(2, 1fr); gap: 32px 0; }
  .step-arrow{ display: none; }
  .footer-inner-row{ flex-direction: column; align-items: flex-start; gap: 20px; }
}

@media (max-width: 760px){
  .nav-toggle{ display: flex; }
  .main-nav{
    position: fixed;
    inset: 70px 16px auto 16px;
    background: var(--white);
    border-radius: var(--radius-md);
    box-shadow: var(--shadow-lg);
    padding: 10px 8px;
    opacity: 0;
    visibility: hidden;
    transform: translateY(-8px);
    transition: opacity 0.18s ease, transform 0.18s ease, visibility 0.18s;
  }
  .main-nav.open{ opacity: 1; visibility: visible; transform: translateY(0); }
  .main-nav ul{ flex-direction: column; align-items: stretch; gap: 0; }
  .main-nav a{ display: block; padding: 13px 16px; border-radius: var(--radius-sm); }
  .main-nav a:hover{ background: var(--pink-pale); }
  .main-nav a::after{ display: none; }
  .header-actions .btn-whatsapp-header{ display: none; }
  .facility-grid{ grid-template-columns: 1fr; }
  .paket-grid{ grid-template-columns: 1fr; }
  .step-grid{ grid-template-columns: 1fr; }
  .section{ padding: 50px 0; }
}
</style>
</head>
<body>
<a href="#main" class="skip-link">Langsung ke konten utama</a>

<!-- ============ HEADER ============ -->
<header class="site-header">
  <div class="header-inner">
    <a href="#beranda" class="brand" aria-label="LD Indonesia — kembali ke beranda">
      <img src="{{ asset('images/logo-ld.jpeg') }}" alt="Logo LD Indonesia" class="brand-logo-img">
      <span class="brand-text">
        <strong>LD <span>INDONESIA</span></strong>
        <small>Belajar Bahasa Jerman Dengan Mudah</small>
      </span>
    </a>

    <button class="nav-toggle" id="navToggle" aria-expanded="false" aria-controls="mainNav" aria-label="Buka menu navigasi">
      <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
    </button>

    <nav class="main-nav" id="mainNav" aria-label="Navigasi utama">
      <ul>
        <li><a href="#beranda" class="active" data-nav>Beranda</a></li>
        <li><a href="#fasilitas" data-nav>Fasilitas</a></li>
        <li><a href="#tutor" data-nav>Tutor</a></li>
        <li><a href="#paket" data-nav>Paket</a></li>     
      </ul>
    </nav>

    <div class="header-actions">
      <a class="btn-whatsapp-header" href="https://wa.me/6281234567890?text=Halo%20LD%20Indonesia%2C%20saya%20ingin%20bertanya%20tentang%20paket%20belajar" target="_blank" rel="noopener">
        <svg class="icon" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2C6.5 2 2 6.5 2 12c0 1.9.5 3.6 1.5 5.1L2 22l5-1.5C8.4 21.5 10.1 22 12 22c5.5 0 10-4.5 10-10S17.5 2 12 2zm0 18c-1.7 0-3.3-.5-4.6-1.3l-.3-.2-3 .9.9-2.9-.2-.3C4 14.9 3.5 13.5 3.5 12 3.5 7.3 7.3 3.5 12 3.5S20.5 7.3 20.5 12 16.7 20 12 20zm5-6.6c-.3-.1-1.6-.8-1.8-.9-.2-.1-.4-.1-.6.1-.2.3-.7.9-.8 1-.2.2-.3.2-.6.1-.3-.1-1.2-.4-2.2-1.4-.8-.7-1.4-1.6-1.5-1.9-.2-.3 0-.4.1-.6.1-.1.3-.3.4-.5.1-.2.2-.3.3-.5.1-.2 0-.4 0-.5C10 8.6 9.5 7.3 9.3 6.8c-.2-.5-.4-.4-.6-.4h-.5c-.2 0-.5.1-.7.3-.2.3-1 1-1 2.3 0 1.4 1 2.7 1.1 2.9.1.2 2 3 4.8 4.3.7.3 1.2.5 1.6.6.7.2 1.3.2 1.8.1.5-.1 1.6-.7 1.9-1.3.2-.6.2-1.1.2-1.3 0-.1-.2-.2-.5-.3z"/></svg>
        Hubungi Kami
      </a>
      <a class="btn-login-header" href="{{ route('login') }}">Masuk</a>
    </div>
  </div>
</header>

<main id="main">

  <!-- ============ HERO (BLUR KIRI & KANAN) ============ -->
  <section class="hero" id="beranda" aria-labelledby="hero-title">
    <div class="hero-grid">
      <div class="hero-copy">
        <h1 id="hero-title">Belajar Bahasa Jerman<br>Bersama <span class="accent">LD Indonesia</span></h1>
        <p>Persiapan ujian A1, A2, B1, B2 dengan metode belajar praktis, terstruktur, dan mudah dipahami.</p>
        <div class="level-pills" role="list" aria-label="Level ujian yang tersedia">
          <span class="level-pill" role="listitem">A1</span>
          <span class="level-pill" role="listitem">A2</span>
          <span class="level-pill" role="listitem">B1</span>
          <span class="level-pill" role="listitem">B2</span>
        </div>
        <div class="hero-ctas">
          <a href="#paket" class="btn btn-primary" data-nav>
            Lihat Paket Belajar
            <svg class="icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
          </a>
          <a href="https://wa.me/6281234567890?text=Halo%20Admin%20LD%20Indonesia" class="btn btn-outline" target="_blank" rel="noopener">Hubungi Admin</a>
        </div>
      </div>

      <div class="hero-visual" aria-hidden="true">
        <!-- Siluet landmark full kanan, dengan efek fade/blur di sisi kiri dan kanan -->
        <img src="{{ asset('images/Les-Jerman.png') }}" alt="Siluet Gerbang Brandenburg" class="hero-bg-landmark">

        <div class="seal-badge">
          <img src="{{ asset('images/logo-ld.jpeg') }}" alt="Logo LD Indonesia">
        </div>
      </div>
    </div>
  </section>

  <!-- ============ FASILITAS ============ -->
  <section class="section" id="fasilitas" aria-labelledby="fasilitas-title">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow">FASILITAS</span>
        <h2 id="fasilitas-title">Fasilitas Belajar Lengkap</h2>
        <p>Semua yang Anda butuhkan untuk belajar bahasa Jerman dengan optimal.</p>
      </div>

      <div class="facility-grid">
        <article class="facility-card">
          <div class="facility-icon icon-1"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg></div>
          <h3>Modul &amp; Materi PDF</h3>
          <p>Materi lengkap dan terstruktur dalam bentuk PDF.</p>
        </article>
        <article class="facility-card">
          <div class="facility-icon icon-2"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 18v-6a9 9 0 0 1 18 0v6"/><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"/></svg></div>
          <h3>Persiapan Ujian</h3>
          <p>Latihan lengkap untuk persiapan ujian A1, A2, B1, B2 (ASM).</p>
        </article>
        <article class="facility-card">
          <div class="facility-icon icon-3"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m12 20 9-9-2-2-9 9-4 4z"/><path d="M2 22l3-1 1-3"/><path d="m14.5 6.5 3 3"/></svg></div>
          <h3>Latihan Soal</h3>
          <p>Soal latihan mirip ujian asli untuk setiap level.</p>
        </article>
        <article class="facility-card">
          <div class="facility-icon icon-4"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
          <p>Bergabung dengan komunitas dan dapatkan dukungan.</p>
        </article>
        <article class="facility-card">
          <div class="facility-icon icon-5"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 2l3 6.5 7 1-5.2 5 1.2 7-6-3.4L6 21.5l1.2-7L2 9.5l7-1z"/></svg></div>
          <h3>Konsultasi Tutor</h3>
          <p>Bimbingan langsung bersama tutor berpengalaman.</p>
        </article>
        <article class="facility-card">
          <div class="facility-icon icon-6"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 2 4 5v6c0 5.5 3.4 9.7 8 11 4.6-1.3 8-5.5 8-11V5z"/><path d="m9 12 2 2 4-4"/></svg></div>
          <h3>Monitoring Progress</h3>
          <p>Pantau perkembangan belajarmu secara berkala.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- ============ TUTOR ============ -->
  <section class="section section-alt" id="tutor" aria-labelledby="tutor-title">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow">TUTOR KAMI</span>
        <h2 id="tutor-title">Belajar Bersama Tutor Berpengalaman</h2>
        <p>Tutor profesional yang siap membimbing perjalanan belajarmu.</p>
      </div>

      <div class="tutor-wrap">
          <ul class="tutor-track" id="tutorTrack" role="list">
      @php
          $tutorCardColors = ['#FCE3EC', '#ECE9FB', '#FDECD9', '#DEF4E8', '#FDE7EF'];
          $tutorIconColors = ['#D63D79', '#6558C9', '#D98A2B', '#2C9E6C', '#E0507B'];
          $displayTutors = $tutors->values();
      @endphp

      @foreach($displayTutors as $index => $tutor)
        @php
            $cardColor = $tutorCardColors[$index % count($tutorCardColors)];
            $iconColor = $tutorIconColors[$index % count($tutorIconColors)];
            $photoPath = $tutor->profile_photo_path;
        @endphp
        
        <li class="tutor-card" role="listitem">
          <div class="tutor-photo" style="background:{{ $cardColor }};">
              @if($photoPath)
                  <img src="{{ asset('storage/' . $photoPath) }}" alt="Foto {{ $tutor->name }}">
              @else
                  <svg viewBox="0 0 100 100" aria-hidden="true">
                      <circle cx="50" cy="38" r="18" fill="{{ $iconColor }}"/>
                      <path d="M15 92c0-19 15-34 35-34s35 15 35 34" fill="{{ $iconColor }}"/>
                  </svg>
              @endif
          </div>

          <div class="tutor-info">
              <h3>{{ $tutor->name }}</h3>
              <span class="tutor-role" style="color:var(--pink-dark);font-weight:700;font-size:0.78rem;margin-bottom:6px;display:block;">Tutor {{ $tutor->level ? 'A1 - ' . $tutor->level : 'Bahasa Jerman' }}</span>
              <p>{{ $tutor->description ?: 'Tutor profesional LD Indonesia siap membantu perjalanan belajar bahasa Jerman.' }}</p>
          </div>
        </li>
      @endforeach
  </ul>
        <div class="tutor-nav">
          <button class="tutor-nav-btn" id="tutorPrev" aria-label="Lihat tutor sebelumnya">
            <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 18l-6-6 6-6"/></svg>
          </button>
          <button class="tutor-nav-btn" id="tutorNext" aria-label="Lihat tutor berikutnya">
            <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 6l6 6-6 6"/></svg>
          </button>
        </div>
      </div>
    </div>
  </section>

  <!-- ============ PAKET ============ -->
  <section class="section" id="paket" aria-labelledby="paket-title">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow">PAKET BELAJAR</span>
        <h2 id="paket-title">Pilih Paket Sesuai Kebutuhanmu</h2>
        <p>Belajar lebih terarah dengan paket yang fleksibel dan terjangkau.</p>
      </div>

      <div class="paket-grid">
        <article class="paket-card">
          <span class="paket-level">Paket A1</span>
          <span class="paket-tier">Pemula</span>
          <p class="paket-price">Rp1.500.000</p>
          <ul class="paket-features">
            <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>Materi PDF Lengkap</li>
            <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>Persiapan Ujian A1 (ASM)</li>
            <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>Latihan Soal</li>
            <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>Konsultasi Tutor</li>
          </ul>
          <a href="https://wa.me/6281234567890?text=Halo%2C%20saya%20ingin%20mendaftar%20Paket%20A1" class="btn btn-primary btn-block" target="_blank" rel="noopener">Pilih Paket</a>
        </article>

        <article class="paket-card">
          <span class="paket-level">Paket A2</span>
          <span class="paket-tier">Dasar</span>
          <p class="paket-price">Rp2.500.000</p>
          <ul class="paket-features">
            <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>Materi PDF Lengkap</li>
            <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>Persiapan Ujian A2 (ASM)</li>
            <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>Latihan Soal</li>
            <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>Konsultasi Tutor</li>
          </ul>
          <a href="https://wa.me/6281234567890?text=Halo%2C%20saya%20ingin%20mendaftar%20Paket%20A2" class="btn btn-primary btn-block" target="_blank" rel="noopener">Pilih Paket</a>
        </article>

        <article class="paket-card featured">
          <span class="paket-tag-best">Paling Populer</span>
          <span class="paket-level">Paket B1</span>
          <span class="paket-tier">Menengah</span>
          <p class="paket-price">Rp4.000.000</p>
          <ul class="paket-features">
            <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>Materi PDF Lengkap</li>
            <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>Persiapan Ujian B1 (ASM)</li>
            <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>Latihan Soal</li>
            <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>Konsultasi Tutor</li>
          </ul>
          <a href="https://wa.me/6281234567890?text=Halo%2C%20saya%20ingin%20mendaftar%20Paket%20B1" class="btn btn-purple btn-block" target="_blank" rel="noopener">Pilih Paket</a>
        </article>

        <article class="paket-card">
          <span class="paket-level">Paket B2</span>
          <span class="paket-tier">Lanjutan</span>
          <p class="paket-price">Rp8.000.000</p>
          <ul class="paket-features">
            <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>Materi PDF Lengkap</li>
            <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>Persiapan Ujian B2 (ASM)</li>
            <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>Latihan Soal</li>
            <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>Konsultasi Tutor</li>
          </ul>
          <a href="https://wa.me/6281234567890?text=Halo%2C%20saya%20ingin%20mendaftar%20Paket%20B2" class="btn btn-primary btn-block" target="_blank" rel="noopener">Pilih Paket</a>
        </article>
      </div>
      <p class="paket-note">* Harga dapat berubah sewaktu-waktu.</p>
    </div>
  </section>

  <!-- ============ CARA BOOKING ============ -->
  <section class="section section-alt" id="cara-booking" aria-labelledby="booking-title">
    <div class="container">
      <div class="section-head">
        <span class="eyebrow">CARA BOOKING</span>
        <h2 id="booking-title">Mudah Daftar &amp; Konsultasi</h2>
        <p>Ikuti langkah mudah berikut untuk mulai belajar bersama kami.</p>
      </div>

      <div class="step-grid">
        <div class="step-item step-1">
          <div class="step-icon-wrap">
            <div class="step-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 2C6.5 2 2 6.5 2 12c0 1.9.5 3.6 1.5 5.1L2 22l5-1.5C8.4 21.5 10.1 22 12 22c5.5 0 10-4.5 10-10S17.5 2 12 2z"/></svg></div>
            <span class="step-num">1</span>
            <svg class="step-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
          </div>
          <h3>Hubungi Admin</h3>
          <p>Klik tombol WhatsApp untuk menghubungi admin kami.</p>
        </div>

        <div class="step-item step-2">
          <div class="step-icon-wrap">
            <div class="step-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></div>
            <span class="step-num">2</span>
            <svg class="step-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
          </div>
          <h3>Konsultasi</h3>
          <p>Sampaikan kebutuhan dan level yang ingin kamu pelajari.</p>
        </div>

        <div class="step-item step-3">
          <div class="step-icon-wrap">
            <div class="step-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="9" y="2" width="6" height="4" rx="1"/><path d="M9 4H6a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-3"/><path d="m9 14 2 2 4-4"/></svg></div>
            <span class="step-num">3</span>
            <svg class="step-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
          </div>
          <h3>Pilih Paket</h3>
          <p>Pilih paket belajar yang sesuai dengan kebutuhanmu.</p>
        </div>

        <div class="step-item step-4">
          <div class="step-icon-wrap">
            <div class="step-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 10 12 5 2 10l10 5 10-5z"/><path d="M6 12v5c0 1.7 2.7 3 6 3s6-1.3 6-3v-5"/></svg></div>
            <span class="step-num">4</span>
          </div>
          <h3>Mulai Belajar</h3>
          <p>Dapatkan akses materi dan mulai perjalanan belajarmu!</p>
        </div>
      </div>
    </div>
  </section>

</main>

<!-- ============ FOOTER ============ -->
<footer class="site-footer">
  <div class="container">
    <div class="footer-inner-row">
      <div class="footer-brand-wrap">
        <img src="{{ asset('images/logo-ld.jpeg') }}" alt="Logo LD Indonesia" class="brand-logo-img" style="width:40px;height:40px;border-radius:50%;object-fit:cover;border:1.5px solid var(--pink);">
        <span class="brand-text">
          <strong>LD <span>INDONESIA</span></strong>
          <small>Belajar Bahasa Jerman Dengan Mudah</small>
        </span>
      </div>

      <div class="footer-social-wrap">
        <span>Ikuti kami di</span>
        <div class="footer-social-icons">
          <a class="social-btn" href="https://www.instagram.com/ld.indonesia/" target="_blank" rel="noopener" aria-label="Instagram">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg>
          </a>
          <a class="social-btn" href="https://www.tiktok.com/@ld_indonesia" target="_blank" rel="noopener" aria-label="TikTok">
            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M16.6 2h-3.2v13.7a3 3 0 1 1-2.1-2.9V9.5a6.2 6.2 0 1 0 5.3 6.1V8.4a7.6 7.6 0 0 0 4.4 1.4V6.6a4.4 4.4 0 0 1-4.4-4.6z"/></svg>
          </a>
        </div>
      </div>

      <div class="footer-contact-wrap">
        <span>Hubungi Kami</span>
        <a class="contact-link-row" href="https://wa.me/6281234567890" target="_blank" rel="noopener">
          <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2C6.5 2 2 6.5 2 12c0 1.9.5 3.6 1.5 5.1L2 22l5-1.5C8.4 21.5 10.1 22 12 22c5.5 0 10-4.5 10-10S17.5 2 12 2z"/></svg>
          Chat via WhatsApp
        </a>
      </div>
    </div>

    <div class="footer-bottom">
      &copy; <span id="year">2026</span> LD Indonesia. All rights reserved.
    </div>
  </div>
</footer>

<script>
(function(){
  "use strict";

  /* ---- Mobile nav toggle ---- */
  var toggle = document.getElementById('navToggle');
  var nav = document.getElementById('mainNav');
  if (toggle && nav) {
    toggle.addEventListener('click', function(){
      var isOpen = nav.classList.toggle('open');
      toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    });
    nav.querySelectorAll('a').forEach(function(link){
      link.addEventListener('click', function(){
        nav.classList.remove('open');
        toggle.setAttribute('aria-expanded', 'false');
      });
    });
  }

  /* ---- Active nav link on scroll (scrollspy) ---- */
  var navLinks = document.querySelectorAll('[data-nav]');
  var sections = Array.prototype.map.call(navLinks, function(link){
    var id = link.getAttribute('href');
    return id && id.charAt(0) === '#' ? document.querySelector(id) : null;
  }).filter(Boolean);

  function setActiveLink(){
    var scrollPos = window.scrollY + 110;
    var current = sections[0];
    sections.forEach(function(sec){
      if (sec.offsetTop <= scrollPos) current = sec;
    });
    document.querySelectorAll('.main-nav a').forEach(function(link){
      var match = link.getAttribute('href') === '#' + current.id;
      link.classList.toggle('active', match);
    });
  }
  window.addEventListener('scroll', setActiveLink, { passive: true });
  setActiveLink();

  /* ---- Tutor carousel: show slide buttons only when overflowing ---- */
  var track = document.getElementById('tutorTrack');
  var prevBtn = document.getElementById('tutorPrev');
  var nextBtn = document.getElementById('tutorNext');
  var navWrap = document.querySelector('.tutor-nav');
  var MAX_VISIBLE = 5;

  function updateTutorNav(){
    var cardCount = track.children.length;
    var needsSlider = cardCount > MAX_VISIBLE || track.scrollWidth > track.clientWidth + 4;
    navWrap.style.display = needsSlider ? 'flex' : 'none';
    prevBtn.disabled = track.scrollLeft <= 4;
    nextBtn.disabled = track.scrollLeft + track.clientWidth >= track.scrollWidth - 4;
  }

  function scrollByCard(dir){
    var card = track.querySelector('.tutor-card');
    var amount = card ? (card.getBoundingClientRect().width + 20) * dir : 260 * dir;
    track.scrollBy({ left: amount, behavior: 'smooth' });
  }

  if (track && prevBtn && nextBtn) {
    prevBtn.addEventListener('click', function(){ scrollByCard(-1); });
    nextBtn.addEventListener('click', function(){ scrollByCard(1); });
    track.addEventListener('scroll', updateTutorNav, { passive: true });
    window.addEventListener('resize', updateTutorNav);
    updateTutorNav();
  }

  /* ---- Footer year ---- */
  var yearEl = document.getElementById('year');
  if (yearEl) yearEl.textContent = new Date().getFullYear();
})();
</script>
</body>
</html>