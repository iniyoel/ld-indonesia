<style>
    .ld-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 16px 36px;
        /* Gradasi Peach/Kuning lembut ke Pink Soft */
        background: linear-gradient(90deg, #fef2e6 0%, #fae6ec 55%, #f7dbe3 100%);
        border-bottom: 1px solid rgba(243, 203, 216, 0.5);
        box-sizing: border-box;
        font-family: 'Plus Jakarta Sans', 'Segoe UI', system-ui, -apple-system, sans-serif;
    }

    .header-left {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .header-right {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .user-profile-widget {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .profile-info {
        display: flex;
        flex-direction: column;
        text-align: right;
    }

    .user-name {
        font-size: 0.95rem;
        font-weight: 800;
        color: #2b2b2b;
        line-height: 1.2;
    }

    .user-role {
        font-size: 0.75rem;
        font-weight: 600;
        color: #7d6b70;
        margin-top: 3px;
    }

    .profile-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        overflow: hidden;
        flex-shrink: 0;
        box-shadow: 0 2px 6px rgba(184, 35, 82, 0.12);
    }

    .avatar-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Lingkaran Avatar Inisial Pink */
    .avatar-initials {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.95rem;
        font-weight: 800;
        background-color: #f7d0dc;
        color: #b82352;
        border: 1.5px solid #f3b7c8;
        border-radius: 50%;
    }

    .menu-toggle { display: none; }

    @media (max-width: 980px) {
        .menu-toggle {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: none;
            border: none;
            cursor: pointer;
            margin-right: auto;
            color: var(--navy);
        }
    }
</style>