<header class="ld-header">
    <div class="header-left">
        {{ $slot ?? '' }}
    </div>

    <div class="header-right">
        <div class="user-profile-widget">
            <div class="profile-info">
                <span class="user-name">{{ Auth::user()->name ?? 'Siswa' }}</span>
                <span class="user-role role-siswa">Siswa</span>
            </div>
            <div class="profile-avatar">
                @if(Auth::user()->profile_photo ?? false)
                    <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="Avatar" class="avatar-img">
                @else
                    <div class="avatar-initials bg-siswa">
                        {{ strtoupper(substr(Auth::user()->name ?? 'S', 0, 2)) }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</header>
@include('components.header.styles')