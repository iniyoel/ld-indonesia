@php
    // Label role yang ditampilkan di topbar. Tambahkan mapping baru di sini
    // kalau suatu saat ada role lain yang juga memakai layout dashboard ini.
    $roleLabels = [
        'admin' => 'Admin',
        'tutor' => 'Tutor',
    ];
    $roleLabel = $roleLabels[auth()->user()->role] ?? \Illuminate\Support\Str::ucfirst(auth()->user()->role);
@endphp
<header class="topbar">
    <button class="menu-toggle" id="menuToggle" aria-label="Buka menu navigasi" aria-expanded="false"
        aria-controls="sidebar">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"
            aria-hidden="true">
            <path d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>
    <div class="user-summary">
        <div class="user-meta">
            <strong>{{ auth()->user()->name }}</strong>
            <span>{{ $roleLabel }}</span>
        </div>
        <div class="user-avatar" aria-hidden="true">
            @if (auth()->user()->profile_photo_path)
                <img src="{{ asset('storage/' . auth()->user()->profile_photo_path) }}" alt="{{ auth()->user()->name }}"
                    style="width:100%;height:100%;object-fit:cover;border-radius:50%;">
            @else
                {{ \Illuminate\Support\Str::upper(\Illuminate\Support\Str::substr(auth()->user()->name, 0, 1)) }}
            @endif
        </div>
    </div>
</header>
