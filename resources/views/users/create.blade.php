<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tambah User</title>

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
                max-width: 720px;
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
                background: radial-gradient(900px 420px at 15% 0%, rgba(59, 130, 246, 0.20), rgba(255, 255, 255, 0)) ,
                            radial-gradient(900px 420px at 85% 0%, rgba(168, 85, 247, 0.20), rgba(255, 255, 255, 0)) ,
                            var(--bg);
                color: var(--text);
            }
            .container { max-width: 720px; margin: 0 auto; padding: 28px 18px; }
            @media (min-width: 768px) { .container { padding: 34px 22px; } }
            .header {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 16px;
                padding: 14px 14px;
                border: 1px solid var(--border);
                border-radius: 16px;
                background: rgba(255, 255, 255, 0.80);
                backdrop-filter: blur(8px);
                box-shadow: var(--shadow);
            }
            h1 { margin: 0; font-size: 20px; letter-spacing: -0.02em; line-height: 1.2; }
            .subtitle { margin-top: 3px; font-size: 13px; color: var(--muted); }
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
            .card { margin-top: 16px; background: var(--surface); border: 1px solid var(--border); border-radius: 16px; padding: 16px; box-shadow: var(--shadow); }
            label { display: block; font-size: 14px; font-weight: 650; margin-bottom: 6px; color: var(--text); }
            input {
                width: 100%;
                padding: 10px 12px;
                border: 1px solid rgba(15, 23, 42, 0.16);
                border-radius: 12px;
                font-size: 14px;
                box-sizing: border-box;
                background: rgba(255, 255, 255, 0.95);
                outline: none;
            }
            input:focus { border-color: rgba(37, 99, 235, 0.7); box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.15); }
            .help { margin-top: 6px; font-size: 12px; color: var(--muted); }
            .field { margin-bottom: 12px; }
            .actions { display: flex; justify-content: flex-end; gap: 8px; }
            .alert { margin-top: 12px; padding: 12px 14px; border-radius: 14px; border: 1px solid rgba(239, 68, 68, 0.25); background: rgba(239, 68, 68, 0.10); color: #7f1d1d; font-size: 14px; }
            ul { margin: 0; padding-left: 18px; }
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
                    <a href="{{ route('users.index') }}" class="{{ request()->routeIs('users.*') ? 'active' : '' }}">Home</a>
                    <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a>
                    <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="btn">Logout</button>
                    </form>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="header">
                <div>
                    <h1>Tambah User</h1>
                    <div class="subtitle">Isi form di bawah untuk menambahkan user baru</div>
                </div>
                <a href="{{ route('users.index') }}" class="btn">Kembali</a>
            </div>

            @if ($errors->any())
                <div class="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('users.store') }}" class="card">
                @csrf

                <div class="field">
                    <label for="name">Nama</label>
                    <input
                        id="name"
                        name="name"
                        type="text"
                        value="{{ old('name') }}"
                        placeholder="Contoh: Nurkhairunisa"
                        required
                    />
                </div>

                <div class="field">
                    <label for="email">Email</label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        value="{{ old('email') }}"
                        placeholder="Contoh: nisa@email.com"
                        required
                    />
                </div>

                <div class="field">
                    <label for="password">Password</label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Minimal 8 karakter"
                        required
                    />
                    <p class="help">Minimal 8 karakter.</p>
                </div>

                <div class="actions">
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </body>
</html>
