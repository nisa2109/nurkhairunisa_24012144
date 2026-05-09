<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Contact</title>

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
                --grad: linear-gradient(135deg, #2563eb, #7c3aed);
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
                box-shadow: none;
                transform: none;
            }
            .navlinks .btn:hover { background: rgba(255, 255, 255, 0.14); color: #fff; box-shadow: none; transform: none; }
            .navlinks .btn:active { filter: none; }

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
            form { margin-top: 14px; display: grid; gap: 12px; }
            label { display: block; font-size: 14px; font-weight: 650; margin-bottom: 6px; color: var(--text); }
            input, textarea {
                width: 100%;
                padding: 10px 12px;
                border: 1px solid rgba(15, 23, 42, 0.16);
                border-radius: 12px;
                font-size: 14px;
                box-sizing: border-box;
                background: rgba(255, 255, 255, 0.95);
                outline: none;
                font-family: inherit;
            }
            textarea { min-height: 110px; resize: vertical; }
            input:focus, textarea:focus { border-color: rgba(37, 99, 235, 0.7); box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.15); }
            .actions { display: flex; justify-content: flex-end; }
            .btn {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
                padding: 10px 12px;
                border-radius: 12px;
                border: 1px solid var(--border-strong);
                background: rgba(255, 255, 255, 0.9);
                color: var(--text);
                text-decoration: none;
                font-size: 14px;
                cursor: pointer;
                transition: transform .14s ease, box-shadow .14s ease, filter .14s ease;
                user-select: none;
            }
            .btn:hover { transform: translateY(-1px); box-shadow: 0 12px 28px rgba(15, 23, 42, 0.10); }
            .btn:active { transform: translateY(0); filter: brightness(0.98); }
            .btn-primary { background: var(--grad); border-color: transparent; color: #fff; }
            .note { margin-top: 10px; font-size: 12px; color: var(--muted); }
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
                <h1>Contact</h1>
                <p>Ini contoh tampilan halaman contact (tugas dasar). Form ini hanya tampilan UI (belum menyimpan ke database).</p>

                <form>
                    <div>
                        <label>Nama</label>
                        <input type="text" placeholder="Nama kamu" />
                    </div>
                    <div>
                        <label>Email</label>
                        <input type="email" placeholder="email@contoh.com" />
                    </div>
                    <div>
                        <label>Pesan</label>
                        <textarea placeholder="Tulis pesan..."></textarea>
                    </div>
                    <div class="actions">
                        <button type="button" class="btn btn-primary">Kirim</button>
                    </div>
                </form>

                <div class="note">Kalau mau difungsikan (submit beneran), aku bisa tambahkan route + controller untuk simpan ke database / kirim email.</div>
            </div>
        </div>
    </body>
</html>
