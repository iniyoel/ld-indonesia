<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>LD Indonesia</title>
<link rel="icon" type="image/jpeg" href="{{ asset('images/logo-ld.jpeg') }}">
<meta name="description" content="Masuk ke akun LD Indonesia untuk mengakses materi, latihan soal, dan progres belajar bahasa Jerman Anda.">
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
  --gray-50: #FAF9F7;
  --gray-200: #E7E4E0;
  --gray-400: #9B9691;
  --gray-500: #7C776F;
  --gray-600: #6B675F;
  --gray-800: #3A362F;
  --white: #FFFFFF;
  --red: #E0483F;
  --green: #2C9E6C;

  --font-display: 'Baloo 2', 'Inter', sans-serif;
  --font-body: 'Inter', sans-serif;

  --radius-sm: 10px;
  --radius-md: 16px;
  --radius-pill: 999px;
  --shadow-sm: 0 2px 8px rgba(30,42,71,0.06);
  --shadow-md: 0 10px 30px rgba(30,42,71,0.10);
  --shadow-lg: 0 16px 40px rgba(236,78,140,0.20);
}

body{
  font-family: var(--font-body);
  color: var(--gray-800);
  background: var(--white);
  line-height: 1.55;
  -webkit-font-smoothing: antialiased;
}

@media (prefers-reduced-motion: reduce){
  *, *::before, *::after { animation-duration: 0.001ms !important; transition-duration: 0.001ms !important; }
}

img, svg { display: block; max-width: 100%; }
a { color: inherit; text-decoration: none; }
button { font: inherit; cursor: pointer; border: none; background: none; }
:focus-visible{ outline: 3px solid var(--purple); outline-offset: 2px; border-radius: 4px; }

h1, h2 { font-family: var(--font-display); color: var(--navy); font-weight: 700; }

.skip-link{ position: absolute; left: -999px; top: 0; background: var(--navy); color: #fff; padding: 12px 20px; z-index: 200; border-radius: 0 0 8px 0; }
.skip-link:focus{ left: 0; }

/* ============ LAYOUT ============ */
.auth-page{
  min-height: 100vh;
  display: flex;
}

.auth-left{
  flex: 1 1 48%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding: 48px 10%;
}

.auth-form-wrap{ width: 100%; max-width: 400px; margin: 0 auto; }

/* Logo Kiri */
.brand{ display: inline-flex; align-items: center; gap: 12px; margin-bottom: 40px; }
.brand-logo-img{ width: 44px; height: 44px; border-radius: 50%; object-fit: cover; border: 1.5px solid var(--pink); flex-shrink: 0; }
.brand-text{ display: flex; flex-direction: column; line-height: 1.15; }
.brand-text strong{ font-family: var(--font-display); font-weight: 800; font-size: 1.15rem; color: var(--navy); }
.brand-text strong span{ color: var(--pink); }
.brand-text small{ font-size: 0.72rem; color: var(--gray-600); font-weight: 500; }

.auth-heading h1{ font-size: 1.35rem; margin-bottom: 6px; }
.auth-heading p{ color: var(--gray-500); font-size: 0.9rem; margin-bottom: 26px; }

.field{ margin-bottom: 18px; }
.field label{
  display: block;
  font-weight: 700;
  font-size: 0.86rem;
  color: var(--navy);
  margin-bottom: 8px;
}
.input-group{ position: relative; }
.input-group svg.field-icon{
  position: absolute;
  left: 15px; top: 50%;
  transform: translateY(-50%);
  width: 18px; height: 18px;
  color: var(--gray-400);
  pointer-events: none;
}
.input-group input{
  width: 100%;
  font: inherit;
  font-size: 0.92rem;
  padding: 13px 16px 13px 44px;
  border: 1.5px solid var(--gray-200);
  border-radius: var(--radius-sm);
  background: var(--white);
  color: var(--gray-800);
  transition: border-color 0.15s ease, box-shadow 0.15s ease;
}
.input-group input::placeholder{ color: var(--gray-400); }
.input-group input:focus{
  outline: none;
  border-color: var(--pink);
  box-shadow: 0 0 0 4px var(--pink-pale);
}

.toggle-visibility{
  position: absolute;
  right: 10px; top: 50%;
  transform: translateY(-50%);
  width: 32px; height: 32px;
  display: flex; align-items: center; justify-content: center;
  border-radius: 8px;
  color: var(--gray-400);
}
.toggle-visibility:hover{ background: var(--gray-50); color: var(--navy); }
.toggle-visibility svg{ width: 18px; height: 18px; }

.field-error{
  display: none;
  align-items: center;
  gap: 6px;
  color: var(--red);
  font-size: 0.8rem;
  margin-top: 7px;
  font-weight: 500;
}
.field-error.show{ display: flex; }

.form-row{
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 22px;
  flex-wrap: wrap;
  gap: 10px;
}
.checkbox-label{
  display: flex;
  align-items: center;
  gap: 9px;
  font-size: 0.86rem;
  font-weight: 700;
  color: var(--navy);
  cursor: pointer;
}
.checkbox-label input[type="checkbox"]{
  width: 18px; height: 18px;
  accent-color: var(--pink);
  cursor: pointer;
}
.link-pink{
  color: var(--pink-dark);
  font-weight: 700;
  font-size: 0.86rem;
}
.link-pink:hover{ text-decoration: underline; }

.btn{
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  width: 100%;
  font-family: var(--font-body);
  font-weight: 700;
  font-size: 0.96rem;
  padding: 13px 26px;
  border-radius: var(--radius-pill);
  transition: transform 0.18s ease, box-shadow 0.18s ease, opacity 0.15s ease;
  margin-bottom: 12px;
}
.btn:hover{ transform: translateY(-2px); }

.btn-primary{
  background: #FDE4EE;
  color: #D63D79;
  border: 1px solid #F5C2D9;
}
.btn-primary:hover{ background: #FBD5E6; }

.btn-secondary{
  background: #FCEFD9;
  color: #C98A1A;
  border: 1px solid #F5DCB8;
}
.btn-secondary:hover{ background: #FCE4BC; }

.spinner{
  width: 16px; height: 16px;
  border: 2px solid rgba(214,61,121,0.3);
  border-top-color: var(--pink-dark);
  border-radius: 50%;
  animation: spin 0.7s linear infinite;
  display: none;
}
.is-loading .spinner{ display: inline-block; }
.is-loading .btn-label{ opacity: 0.85; }
@keyframes spin{ to{ transform: rotate(360deg); } }

.status-banner{
  display: none;
  align-items: center;
  gap: 10px;
  background: #FDECEA;
  color: var(--red);
  border: 1px solid #F6C9C4;
  padding: 12px 16px;
  border-radius: var(--radius-sm);
  font-size: 0.86rem;
  font-weight: 600;
  margin-bottom: 20px;
}
.status-banner.show{ display: flex; }

.auth-view{ display: none; }
.auth-view.active{ display: block; }

.sent-icon{
  width: 64px; height: 64px;
  border-radius: 50%;
  background: var(--pink-pale);
  display: flex; align-items: center; justify-content: center;
  color: var(--pink-dark);
  margin-bottom: 22px;
}

.back-link{
  display: inline-flex;
  align-items: center;
  gap: 6px;
  font-weight: 700;
  font-size: 0.88rem;
  color: var(--navy-soft);
  margin-bottom: 24px;
}
.back-link:hover{ color: var(--pink-dark); }

/* ============ RIGHT PANEL (LOGO GAMBAR KANAN) ============ */
.auth-right{
  flex: 1 1 52%;
  position: relative;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  background: linear-gradient(140deg, #FCE9AE 0%, #F8C6DA 48%, #F294C1 100%);
}

.deco-dots{
  position: absolute;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 8px;
}
.deco-dots span{ width: 6px; height: 6px; border-radius: 50%; background: rgba(30,42,71,0.28); }
.deco-dots.top-left{ top: 36px; left: 40px; }
.deco-dots.bottom-right{ bottom: 36px; right: 40px; }

.deco-ring{
  position: absolute;
  border-radius: 50%;
  border: 1px solid rgba(255,255,255,0.5);
}
.ring-1{ width: 460px; height: 460px; }
.ring-2{ width: 560px; height: 560px; }

.seal-wrap{
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 2;
  width: 280px;
  height: 280px;
  background: rgba(255, 255, 255, 0.85);
  border-radius: 50%;
  box-shadow: 0 18px 30px rgba(92,54,32,0.15);
  border: 4px solid var(--white);
  padding: 20px;
}

.seal-logo-img {
  width: 100%;
  height: 100%;
  object-fit: contain;
  border-radius: 50%;
}

.auth-right-caption{
  position: relative;
  z-index: 2;
  text-align: center;
  margin-top: 40px;
}
.auth-right-caption p{ color: var(--maroon); font-size: 0.92rem; opacity: 0.85; }
.auth-right-caption strong{
  display: block;
  font-family: var(--font-display);
  font-size: 1.3rem;
  color: var(--navy);
  margin-top: 4px;
}

@media (max-width: 900px){
  .auth-right{ display: none; }
  .auth-left{ flex: 1 1 100%; padding: 40px 24px; }
  .auth-page{ background: var(--pink-pale); }
  .auth-form-wrap{
    background: var(--white);
    padding: 32px 24px;
    border-radius: var(--radius-md);
    box-shadow: var(--shadow-md);
  }
}
</style>
</head>
<body>
<a href="#authMain" class="skip-link">Langsung ke konten utama</a>

<div class="auth-page">
  <!-- ============ LEFT: FORM ============ -->
  <section class="auth-left" id="authMain">
    <div class="auth-form-wrap">
      <a href="{{ route('home') }}" class="brand" aria-label="LD Indonesia — kembali ke beranda">
        <img src="{{ asset('images/logo-ld.jpeg') }}" alt="Logo LD Indonesia" class="brand-logo-img">
        <span class="brand-text">
          <strong>LD <span>INDONESIA</span></strong>
          <small>Private Bahasa Jerman</small>
        </span>
      </a>

      <!-- ============ VIEW 1: LOGIN ============ -->
      <div class="auth-view active" id="loginView">
        <div class="auth-heading">
          <h1>Selamat datang kembali !</h1>
          <p>Masuk untuk melanjutkan pembelajaran Anda.</p>
        </div>

        <div class="status-banner{{ $errors->any() ? ' show' : '' }}" id="loginStatus" role="alert">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 8v5M12 16h.01"/></svg>
          <span id="loginStatusText">{{ $errors->first() ?: 'Email atau password salah. Silakan coba lagi.' }}</span>
        </div>

        <form id="loginForm" action="{{ route('login.attempt') }}" method="POST" novalidate>
          @csrf
          <div class="field">
            <label for="loginEmail">Email</label>
            <div class="input-group">
              <svg class="field-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m2 7 10 6 10-6"/></svg>
              <input type="email" id="loginEmail" name="email" autocomplete="username" value="{{ old('email') }}" placeholder="Masukkan email Anda" aria-describedby="loginEmailError" required>
            </div>
            <p class="field-error" id="loginEmailError"><span>Masukkan alamat email yang valid.</span></p>
          </div>

          <div class="field">
            <label for="loginPassword">Password</label>
            <div class="input-group">
              <svg class="field-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="4" y="10" width="16" height="10" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/></svg>
              <input type="password" id="loginPassword" name="password" autocomplete="current-password" placeholder="Masukkan password Anda" aria-describedby="loginPasswordError" required style="padding-right:44px;">
              <button type="button" class="toggle-visibility" data-toggle-for="loginPassword" aria-label="Tampilkan password">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z"/><circle cx="12" cy="12" r="3"/></svg>
              </button>
            </div>
            <p class="field-error" id="loginPasswordError"><span>Password wajib diisi.</span></p>
          </div>

          <div class="form-row">
            <label class="checkbox-label">
              <input type="checkbox" name="remember" id="rememberMe">
              Ingat saya
            </label>
            <button type="button" class="link-pink" id="showForgot">Forgot Password?</button>
          </div>

          <button type="submit" class="btn btn-primary" id="loginSubmit">
            <span class="spinner" aria-hidden="true"></span>
            <span class="btn-label">Masuk</span>
          </button>

          <a href="{{ route('home') }}" class="btn btn-secondary">
            <span class="btn-label">Kembali</span>
          </a>
        </form>
      </div>

      <!-- ============ VIEW 2: FORGOT PASSWORD ============ -->
      <div class="auth-view" id="forgotView">
        <button type="button" class="back-link" id="backToLoginFromForgot">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 18l-6-6 6-6"/></svg>
          Kembali ke Masuk
        </button>

        <div class="auth-heading">
          <h1>Atur Password Baru</h1>
          <p>Masukkan email yang terdaftar dan buat password baru untuk akun Anda.</p>
        </div>

        <form id="forgotForm" novalidate>
          <div class="field">
            <label for="forgotEmail">Email</label>
            <div class="input-group">
              <svg class="field-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m2 7 10 6 10-6"/></svg>
              <input type="email" id="forgotEmail" name="email" autocomplete="username" placeholder="Masukkan email Anda" required>
            </div>
          </div>

          <div class="field">
            <label for="forgotPassword">Password Baru</label>
            <div class="input-group">
              <svg class="field-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="4" y="10" width="16" height="10" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/></svg>
              <input type="password" id="forgotPassword" name="password" autocomplete="new-password" placeholder="Buat password baru" required style="padding-right:44px;">
            </div>
          </div>

          <div class="field">
            <label for="forgotPasswordConfirmation">Konfirmasi Password</label>
            <div class="input-group">
              <svg class="field-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="4" y="10" width="16" height="10" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/></svg>
              <input type="password" id="forgotPasswordConfirmation" name="password_confirmation" autocomplete="new-password" placeholder="Ulangi password baru" required style="padding-right:44px;">
            </div>
          </div>

          <button type="submit" class="btn btn-primary" id="forgotSubmit">
            <span class="spinner" aria-hidden="true"></span>
            <span class="btn-label">Simpan Password Baru</span>
          </button>
        </form>
      </div>

      <!-- ============ VIEW 3: EMAIL SENT ============ -->
      <div class="auth-view" id="sentView">
        <div class="sent-icon" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m2 7 10 6 10-6"/><path d="m9 13 2 2 4-4"/></svg>
        </div>
        <div class="auth-heading">
          <h1>Password Berhasil Diubah</h1>
          <p>Password akun Anda telah diperbarui. Silakan masuk kembali dengan password baru.</p>
        </div>
        <button type="button" class="btn btn-secondary" id="backToLoginFromSent">Kembali ke Halaman Masuk</button>
      </div>
    </div>
  </section>

  <!-- ============ RIGHT: VISUAL (MENGGUNAKAN LOGO public/images/logo-ld.jpeg) ============ -->
  <aside class="auth-right" aria-hidden="true">
    <div class="deco-dots top-left"><span></span><span></span><span></span><span></span><span></span><span></span></div>
    <div class="deco-dots bottom-right"><span></span><span></span><span></span><span></span><span></span><span></span></div>
    <div class="deco-ring ring-1"></div>
    <div class="deco-ring ring-2"></div>

    <div class="seal-wrap">
      <img src="{{ asset('images/logo-ld.jpeg') }}" alt="Logo LD Indonesia" class="seal-logo-img">
    </div>

    <div class="auth-right-caption">
      <p>Belajar bersama LD Indonesia</p>
      <strong>Langkah awal menuju Jerman</strong>
    </div>
  </aside>
</div>

<script>
(function(){
  "use strict";

  function resetPasswordDirect(email, password, confirmation){
    var csrfMeta = document.querySelector('meta[name="csrf-token"]');
    var csrfToken = csrfMeta ? csrfMeta.getAttribute('content') : '';

    return fetch('/forgot-password', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': csrfToken
      },
      body: JSON.stringify({ email: email, password: password, password_confirmation: confirmation })
    }).then(function(response){
      return response.text().then(function(text){
        var data = {};
        try { data = text ? JSON.parse(text) : {}; } catch (e) { data = {}; }
        if (!response.ok) {
          throw new Error(data.message || 'Gagal mengubah password');
        }
        return data;
      });
    });
  }

  var views = {
    login: document.getElementById('loginView'),
    forgot: document.getElementById('forgotView'),
    sent: document.getElementById('sentView')
  };
  function showView(name){
    Object.keys(views).forEach(function(key){
      views[key].classList.toggle('active', key === name);
    });
  }

  document.getElementById('showForgot').addEventListener('click', function(){ showView('forgot'); });
  document.getElementById('backToLoginFromForgot').addEventListener('click', function(){ showView('login'); });
  document.getElementById('backToLoginFromSent').addEventListener('click', function(){ showView('login'); });

  document.querySelectorAll('.toggle-visibility').forEach(function(btn){
    btn.addEventListener('click', function(){
      var input = document.getElementById(btn.getAttribute('data-toggle-for'));
      var isHidden = input.type === 'password';
      input.type = isHidden ? 'text' : 'password';
    });
  });

  var loginForm = document.getElementById('loginForm');
  var loginStatus = document.getElementById('loginStatus');
  loginForm.addEventListener('submit', function(){
    loginStatus.classList.remove('show');
    document.getElementById('loginSubmit').classList.add('is-loading');
  });

  var forgotForm = document.getElementById('forgotForm');
  forgotForm.addEventListener('submit', function(e){
    e.preventDefault();
    var email = document.getElementById('forgotEmail').value.trim();
    var password = document.getElementById('forgotPassword').value;
    var confirmation = document.getElementById('forgotPasswordConfirmation').value;

    if (!email || password.length < 8 || password !== confirmation) {
      window.alert('Pastikan data reset password valid.');
      return;
    }

    var btn = document.getElementById('forgotSubmit');
    btn.classList.add('is-loading');

    resetPasswordDirect(email, password, confirmation).then(function(){
      btn.classList.remove('is-loading');
      showView('sent');
    }).catch(function(err){
      btn.classList.remove('is-loading');
      window.alert(err.message || 'Gagal mengubah password');
    });
  });
})();
</script>
</body>
</html>