<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>User</title>

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
                --surface-strong: rgba(255, 255, 255, 0.92);
                --shadow: 0 18px 40px rgba(15, 23, 42, 0.08);
                --shadow-hover: 0 22px 55px rgba(15, 23, 42, 0.12);
                --grad: linear-gradient(135deg, #2563eb, #7c3aed);
                --grad-danger: linear-gradient(135deg, #ef4444, #be123c);
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
                background: radial-gradient(900px 420px at 15% 0%, rgba(59, 130, 246, 0.20), rgba(255, 255, 255, 0)) ,
                            radial-gradient(900px 420px at 85% 0%, rgba(168, 85, 247, 0.20), rgba(255, 255, 255, 0)) ,
                            var(--bg);
                color: var(--text);
            }
            .container { max-width: 1100px; margin: 0 auto; padding: 28px 18px; }
            @media (min-width: 768px) { .container { padding: 34px 22px; } }
            .topbar {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 16px;
                padding: 14px 14px;
                border: 1px solid var(--border);
                border-radius: 16px;
                background: rgba(255, 255, 255, 0.78);
                backdrop-filter: blur(8px);
                box-shadow: var(--shadow);
            }
            h1 { margin: 0; font-size: 20px; letter-spacing: -0.02em; line-height: 1.2; }
            .subtitle { margin-top: 3px; font-size: 13px; color: var(--muted); }
            .meta { display: inline-flex; align-items: center; gap: 8px; margin-top: 6px; }
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
            }
            .dot { width: 8px; height: 8px; border-radius: 999px; background: var(--grad); }
            .actions { display: flex; gap: 10px; flex-wrap: wrap; justify-content: flex-end; }
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
                transition: transform .14s ease, box-shadow .14s ease, filter .14s ease, background .14s ease;
                user-select: none;
            }
            .btn:hover { transform: translateY(-1px); box-shadow: 0 12px 28px rgba(15, 23, 42, 0.10); }
            .btn:active { transform: translateY(0); filter: brightness(0.98); }
            .btn-primary { background: var(--grad); border-color: transparent; color: #fff; }
            .btn-danger { background: var(--grad-danger); border-color: transparent; color: #fff; cursor: pointer; }
            .card { margin-top: 16px; background: var(--surface); border: 1px solid var(--border); border-radius: 16px; overflow: hidden; box-shadow: var(--shadow); }
            .table-wrap { overflow-x: auto; }
            table { width: 100%; border-collapse: collapse; font-size: 14px; }
            th, td { padding: 12px 14px; border-bottom: 1px solid rgba(15, 23, 42, 0.08); vertical-align: top; }
            th {
                background: rgba(248, 250, 252, 0.85);
                text-transform: uppercase;
                font-size: 12px;
                color: var(--muted);
                letter-spacing: .06em;
                position: sticky;
                top: 0;
                z-index: 1;
            }
            tbody tr:nth-child(odd) { background: rgba(248, 250, 252, 0.50); }
            tbody tr:hover { background: rgba(59, 130, 246, 0.06); }
            td:first-child, th:first-child { width: 64px; text-align: center; }
            .row-actions { display: flex; gap: 8px; align-items: center; }
            .alert { margin-top: 12px; padding: 12px 14px; border-radius: 14px; border: 1px solid rgba(34, 197, 94, 0.25); background: rgba(34, 197, 94, 0.10); color: #14532d; font-size: 14px; }
            .empty { text-align: center; color: #64748b; padding: 22px 12px; }
            .pagination { margin-top: 12px; display: flex; align-items: center; justify-content: space-between; gap: 12px; font-size: 14px; }
            .pagination a { color: #0f172a; text-decoration: none; border: 1px solid rgba(15, 23, 42, 0.14); padding: 8px 12px; border-radius: 12px; background: rgba(255, 255, 255, 0.85); }
            .pagination .disabled { color: #94a3b8; border: 1px solid rgba(15, 23, 42, 0.08); padding: 8px 12px; border-radius: 12px; background: rgba(248, 250, 252, 0.8); }
            .page-label { color: var(--muted); font-size: 13px; }
            form { margin: 0; }
            .btn-small { padding: 8px 10px; border-radius: 11px; font-size: 13px; }
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
            <div class="topbar">
                <div>
                    <h1>Data User</h1>
                    <div class="subtitle">Kelola data: tambah, edit, dan hapus user</div>
                    <div class="meta">
                        <div class="pill">
                            <span class="dot"></span>
                            Total: {{ $users->total() }}
                        </div>
                    </div>
                </div>

                <div class="actions">
                    <a href="{{ route('users.create') }}" class="btn btn-primary">
                        + Tambah User
                    </a>
                </div>
            </div>

            @if (session('success'))
                <div class="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card">
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $users->firstItem() ? ($users->firstItem() + $loop->index) : $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at?->format('Y-m-d H:i') }}</td>
                                    <td>
                                        <div class="row-actions">
                                            <a href="{{ route('users.edit', $user) }}" class="btn btn-small">
                                                Edit
                                            </a>

                                            <form method="POST" action="{{ route('users.destroy', $user) }}" onsubmit="return confirm('Hapus user ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-small">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="empty" colspan="5">
                                        Belum ada data user.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            @if ($users->hasPages())
                <div class="pagination">
                    <div>
                        @if ($users->onFirstPage())
                            <span class="disabled">Prev</span>
                        @else
                            <a href="{{ $users->previousPageUrl() }}">Prev</a>
                        @endif
                    </div>
                    <div class="page-label">
                        Page {{ $users->currentPage() }} / {{ $users->lastPage() }}
                    </div>
                    <div>
                        @if ($users->hasMorePages())
                            <a href="{{ $users->nextPageUrl() }}">Next</a>
                        @else
                            <span class="disabled">Next</span>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </body>
</html>
