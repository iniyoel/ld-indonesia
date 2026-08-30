<style>
    .ld-sidebar {
        position: sticky;
        top: 0;
        width: 275px;
        min-width: 275px;
        height: 100vh;
        max-height: 100vh;
        background-color: #fcecef;
        overflow: hidden;
        border-right: 1px solid rgba(243, 195, 208, 0.6);
        box-sizing: border-box;
        font-family: 'Plus Jakarta Sans', 'Segoe UI', system-ui, -apple-system, sans-serif;
        z-index: 50;
        flex-shrink: 0;
    }

    /* 2 Siluet Lingkaran Saling Menimpa */
    .sidebar-silhouettes {
        position: absolute;
        inset: 0;
        pointer-events: none;
        overflow: hidden;
        z-index: 1;
    }

    .sidebar-silhouettes .circle {
        position: absolute;
        border-radius: 50%;
    }

    /* Lingkaran Bawah (Siluet 1 - Pink Medium) */
    .sidebar-silhouettes .circle-1 {
        bottom: -70px;
        left: -120px;
        width: 380px;
        height: 380px;
        background: radial-gradient(circle, rgba(247, 185, 203, 0.7) 0%, rgba(247, 185, 203, 0.2) 75%);
    }

    /* Lingkaran Atas yang menimpa (Siluet 2 - Pink Cerah) */
    .sidebar-silhouettes .circle-2 {
        bottom: 130px;
        left: -140px;
        width: 320px;
        height: 320px;
        background: radial-gradient(circle, rgba(250, 200, 215, 0.6) 0%, rgba(250, 200, 215, 0.15) 75%);
    }

    .sidebar-inner {
        position: relative;
        z-index: 2;
        display: flex;
        flex-direction: column;
        height: 100%;
        padding: 24px 16px 20px 16px;
        box-sizing: border-box;
    }

    .brand-header {
        padding: 0 8px 24px 8px;
    }

    .brand-link {
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .brand-logo-img {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        object-fit: cover;
        flex-shrink: 0;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
    }

    .brand-text {
        display: flex;
        flex-direction: column;
    }

    .brand-title {
        font-size: 1.15rem;
        font-weight: 800;
        color: #262626;
        letter-spacing: 0.5px;
        line-height: 1.2;
    }

    .brand-title .highlight {
        color: #e59323;
    }

    .brand-subtitle {
        font-size: 0.78rem;
        color: #6b6365;
        font-weight: 500;
        margin-top: 2px;
    }

    .sidebar-nav {
        flex: 1;
        overflow-y: auto;
    }

    .nav-list {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .nav-link {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 12px 18px;
        border-radius: 14px;
        text-decoration: none;
        color: #3b3638;
        font-weight: 600;
        font-size: 0.93rem;
        transition: all 0.2s ease;
    }

    .nav-icon {
        width: 21px;
        height: 21px;
        flex-shrink: 0;
    }

    .nav-link:hover {
        background-color: rgba(245, 195, 210, 0.45);
        color: #b82352;
    }

    .nav-link.active {
        background-color: #f7d3dd;
        color: #b82352;
        box-shadow: 0 2px 5px rgba(184, 35, 82, 0.06);
    }

    .nav-link.active .nav-icon {
        color: #b82352;
    }

    .sidebar-footer {
        padding-top: 12px;
    }

    .logout-btn {
        display: flex;
        align-items: center;
        gap: 14px;
        width: 100%;
        padding: 12px 18px;
        background: transparent;
        border: none;
        border-radius: 14px;
        color: #3b3638;
        font-weight: 600;
        font-size: 0.93rem;
        cursor: pointer;
        text-align: left;
        transition: all 0.2s ease;
    }

    .logout-btn:hover {
        background-color: rgba(245, 195, 210, 0.45);
        color: #b82352;
    }

    /* Styling Responsif untuk Sidebar di Handphone & Tablet */
    @media (max-width: 980px) {
        .ld-sidebar {
            position: fixed !important;
            top: 0;
            left: 0;
            height: 100vh;
            transform: translateX(-100%);
            transition: transform 0.25s ease-in-out;
            z-index: 70;
        }
        
        .ld-sidebar.open {
            transform: translateX(0);
        }
    }
</style>