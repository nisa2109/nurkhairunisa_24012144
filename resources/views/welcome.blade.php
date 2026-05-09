<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>POLGAN</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <style>
            :root {
                color-scheme: light;
                --bg: #f8fafc;
                --text: #0f172a;
                --muted: #475569;
                --border: rgba(15, 23, 42, 0.10);
                --border-strong: rgba(15, 23, 42, 0.14);
                --surface: rgba(255, 255, 255, 0.88);
                --shadow: 0 18px 40px rgba(15, 23, 42, 0.08);
                --shadow-hover: 0 22px 55px rgba(15, 23, 42, 0.12);
                --grad: linear-gradient(135deg, #2563eb, #7c3aed);
            }

            body {
                margin: 0;
                font-family: "Instrument Sans", system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
                min-height: 100vh;
                background:
                    radial-gradient(1200px 600px at 10% -10%, rgba(59, 130, 246, 0.22), rgba(255, 255, 255, 0) 60%),
                    radial-gradient(1200px 600px at 90% -10%, rgba(168, 85, 247, 0.22), rgba(255, 255, 255, 0) 60%),
                    radial-gradient(1200px 600px at 50% 110%, rgba(59, 130, 246, 0.10), rgba(255, 255, 255, 0) 60%),
                    var(--bg);
                background-repeat: no-repeat;
                background-attachment: fixed;
                color: var(--text);
            }

            .menu {
                position: sticky;
                top: 0;
                z-index: 50;
                background: #0d6efd;
                color: #fff;
                box-shadow: 0 10px 30px rgba(2, 6, 23, 0.18);
            }
            .menu-inner {
                max-width: 1100px;
                margin: 0 auto;
                padding: 14px 18px;
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 16px;
            }
            @media (min-width: 768px) { .menu-inner { padding: 14px 22px; } }
            .brand {
                display: inline-flex;
                align-items: center;
                gap: 10px;
                font-weight: 800;
                letter-spacing: 0.04em;
                text-decoration: none;
                color: #fff;
            }
            .brand-badge {
                width: 10px;
                height: 10px;
                border-radius: 999px;
                background: rgba(255, 255, 255, 0.85);
                box-shadow: 0 0 0 4px rgba(255, 255, 255, 0.15);
            }
            .navlinks { display: flex; align-items: center; gap: 14px; flex-wrap: wrap; justify-content: flex-end; }
            .navlinks a {
                color: rgba(255, 255, 255, 0.88);
                text-decoration: none;
                font-size: 14px;
                padding: 6px 8px;
                border-radius: 10px;
                transition: background .14s ease, color .14s ease;
            }
            .navlinks a:hover { background: rgba(255, 255, 255, 0.14); color: #fff; }
            .navlinks a.active { background: rgba(255, 255, 255, 0.20); color: #fff; }
            .navlinks form { margin: 0; }
            .navlinks .btn {
                background: transparent;
                border: 0;
                color: rgba(255, 255, 255, 0.88);
                padding: 6px 8px;
                border-radius: 10px;
                cursor: pointer;
                font: inherit;
            }
            .navlinks .btn:hover { background: rgba(255, 255, 255, 0.14); color: #fff; }

            .container { max-width: 1100px; margin: 0 auto; padding: 28px 18px; }
            @media (min-width: 768px) { .container { padding: 46px 22px; } }

            .hero {
                display: grid;
                grid-template-columns: 1fr;
                gap: 14px;
                align-items: stretch;
            }
            @media (min-width: 900px) { .hero { grid-template-columns: 1.25fr 0.75fr; } }

            .card {
                background: var(--surface);
                border: 1px solid var(--border);
                border-radius: 18px;
                box-shadow: var(--shadow);
                padding: 18px;
            }
            .card:hover { box-shadow: var(--shadow-hover); }

            h1 { margin: 0; font-size: 28px; letter-spacing: -0.03em; line-height: 1.15; }
            .lead { margin: 10px 0 0; color: var(--muted); line-height: 1.7; }
            .actions { margin-top: 14px; display: flex; flex-wrap: wrap; gap: 10px; }

            .btn-primary {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
                padding: 10px 12px;
                border-radius: 12px;
                background: var(--grad);
                color: #fff;
                text-decoration: none;
                font-size: 14px;
                border: 0;
                cursor: pointer;
                transition: transform .14s ease, box-shadow .14s ease, filter .14s ease;
                user-select: none;
            }
            .btn-primary:hover { transform: translateY(-1px); box-shadow: 0 12px 28px rgba(15, 23, 42, 0.10); }
            .btn-primary:active { transform: translateY(0); filter: brightness(0.98); }

            .btn-ghost {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
                padding: 10px 12px;
                border-radius: 12px;
                background: rgba(255, 255, 255, 0.9);
                border: 1px solid var(--border-strong);
                color: var(--text);
                text-decoration: none;
                font-size: 14px;
                transition: transform .14s ease, box-shadow .14s ease;
                user-select: none;
            }
            .btn-ghost:hover { transform: translateY(-1px); box-shadow: 0 12px 28px rgba(15, 23, 42, 0.10); }

            .mini {
                border: 1px solid var(--border);
                border-radius: 16px;
                background: rgba(255, 255, 255, 0.85);
                padding: 16px;
            }
            .mini h2 { margin: 0; font-size: 14px; letter-spacing: -0.01em; }
            .mini p { margin: 8px 0 0; font-size: 13px; color: var(--muted); line-height: 1.65; }
            .pill {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                padding: 6px 10px;
                border-radius: 999px;
                border: 1px solid var(--border);
                background: rgba(255, 255, 255, 0.75);
                font-size: 12px;
                color: #334155;
                margin-top: 12px;
            }
            .dot { width: 8px; height: 8px; border-radius: 999px; background: var(--grad); }
        </style>
    </head>
    <body>
        <nav class="menu">
            <div class="menu-inner">
                <a class="brand" href="{{ url('/') }}">
                    <span class="brand-badge"></span>
                    POLGAN
                </a>
                <div class="navlinks">
                    <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Home</a>
                    <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a>
                    <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
                    @if (session('admin_logged_in'))
                        <a href="{{ route('users.index') }}" class="{{ request()->routeIs('users.*') ? 'active' : '' }}">User</a>
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button type="submit" class="btn">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('admin.login') }}" class="{{ request()->routeIs('admin.login') ? 'active' : '' }}">Login Admin</a>
                    @endif
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="hero">
                <div class="card">
                    <h1>Website CRUD User</h1>
                    <p class="lead">
                        Halaman User hanya bisa diakses setelah admin login. Setelah login, admin bisa menambah, mengedit, dan menghapus data user.
                    </p>
                    <div class="actions">
                        @if (session('admin_logged_in'))
                            <a class="btn-primary" href="{{ route('users.index') }}">Masuk ke Data User</a>
                        @else
                            <a class="btn-primary" href="{{ route('admin.login') }}">Login Admin</a>
                        @endif
                        <a class="btn-ghost" href="{{ route('about') }}">Lihat About</a>
                        <a class="btn-ghost" href="{{ route('contact') }}">Lihat Contact</a>
                    </div>
                    <div class="pill">
                        <span class="dot"></span>
                        Laravel + MySQL + CRUD
                    </div>
                </div>

                <div class="card">
                    <div class="mini">
                        <h2>Menu</h2>
                        <p>Home, About, Contact, Login Admin. Setelah login, menu User dan Logout muncul.</p>
                    </div>
                    <div class="mini" style="margin-top: 12px;">
                        <h2>Catatan</h2>
                        <p>Tampilan dibuat ringan (tanpa Vite) supaya halaman cepat dibuka.</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
