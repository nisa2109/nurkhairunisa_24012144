<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>About</title>

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
            .btn {
                color: rgba(255, 255, 255, 0.88);
                font-size: 14px;
                padding: 6px 8px;
                border-radius: 10px;
                background: transparent;
                border: 0;
                cursor: pointer;
            }
            .btn:hover { background: rgba(255, 255, 255, 0.14); color: #fff; }

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
            .container { max-width: 1100px; margin: 0 auto; padding: 28px 18px; }
            @media (min-width: 768px) { .container { padding: 34px 22px; } }
            .card { background: var(--surface); border: 1px solid var(--border); border-radius: 16px; box-shadow: var(--shadow); padding: 18px; }
            h1 { margin: 0; font-size: 22px; letter-spacing: -0.02em; }
            p { margin: 10px 0 0; color: var(--muted); line-height: 1.6; }
            .grid { display: grid; grid-template-columns: 1fr; gap: 12px; margin-top: 14px; }
            @media (min-width: 768px) { .grid { grid-template-columns: 1fr 1fr; } }
            .mini { border: 1px solid var(--border); border-radius: 14px; background: rgba(255, 255, 255, 0.85); padding: 14px; }
            .mini h2 { margin: 0; font-size: 14px; letter-spacing: -0.01em; }
            .mini p { margin-top: 6px; font-size: 13px; }
            .link { color: #0d6efd; text-decoration: none; }
        </style>
    </head>
    <body>
        <nav class="menu">
            <div class="menu-inner">
                <a class="brand" href="{{ route('users.index') }}">
                    <span class="brand-badge"></span>
                    POLGAN
                </a>
                <div class="navlinks">
                    <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Home</a>
                    <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a>
                    <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
                    @if (session('admin_logged_in'))
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button type="submit" class="btn">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('admin.login') }}" class="{{ request()->routeIs('admin.login') ? 'active' : '' }}">Login</a>
                    @endif
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="card">
                <h1>About</h1>
                <p>Halaman ini adalah contoh halaman statis untuk menu navigasi. Project ini berisi fitur CRUD User (tambah, edit, hapus) menggunakan Laravel.</p>

                <div class="grid">
                    <div class="mini">
                        <h2>Fitur</h2>
                        <p>- List user + pagination<br>- Tambah user<br>- Edit user<br>- Hapus user</p>
                    </div>
                    <div class="mini">
                        <h2>Navigasi</h2>
                        <p>Gunakan menu atas untuk berpindah halaman. Kembali ke halaman utama: <a class="link" href="{{ route('users.index') }}">User</a></p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
