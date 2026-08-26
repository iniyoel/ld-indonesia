<style>
    .toast {
        position: fixed;
        top: 24px;
        right: 24px;
        z-index: 300;
        background: var(--white);
        border: 1px solid var(--green-bg, var(--gray-100));
        border-left: 4px solid var(--green);
        border-radius: var(--radius-md);
        box-shadow: var(--shadow-md);
        padding: 16px 20px;
        max-width: 380px;
        display: flex;
        gap: 12px;
        align-items: flex-start;
        transform: translateX(120%);
        transition: transform 0.25s ease;
    }

    .toast.show {
        transform: translateX(0);
    }

    .toast svg {
        width: 20px;
        height: 20px;
        color: var(--green);
        flex-shrink: 0;
        margin-top: 1px;
    }

    .toast-title {
        font-weight: 800;
        font-size: 0.9rem;
        color: var(--navy);
        margin-bottom: 2px;
    }

    .toast-text {
        font-size: 0.84rem;
        color: var(--gray-600);
        line-height: 1.5;
    }
</style>
<div class="toast" id="successToast" role="status" aria-live="polite">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
        stroke-linejoin="round" aria-hidden="true">
        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
        <path d="M22 4 12 14.01l-3-3" />
    </svg>
    <div>
        <div class="toast-title" id="toastTitle">Berhasil</div>
        <div class="toast-text" id="toastText"></div>
    </div>
</div>

<script>
    function showToast(text, title = 'Berhasil') {
        var toast = document.getElementById('successToast');
        var toastTitle = document.getElementById('toastTitle');
        var toastText = document.getElementById('toastText');

        if (!toast) return;

        toastTitle.textContent = title;
        toastText.textContent = text;
        toast.classList.add('show');

        setTimeout(function() {
            toast.classList.remove('show');
        }, 4000);
    }

    // Otomatis tangkap session success dari Laravel jika ada
    @if (session('success'))
        document.addEventListener('DOMContentLoaded', function() {
            showToast(@json(session('success')), 'Berhasil');
        });
    @endif
</script>
