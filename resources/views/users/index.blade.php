<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>User</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <style>
            :root { color-scheme: light; }
            body {
                margin: 0;
                font-family: "Instrument Sans", system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
                background: radial-gradient(900px 420px at 15% 0%, rgba(59, 130, 246, 0.20), rgba(255, 255, 255, 0)) ,
                            radial-gradient(900px 420px at 85% 0%, rgba(168, 85, 247, 0.20), rgba(255, 255, 255, 0)) ,
                            #f8fafc;
                color: #0f172a;
            }
            .container { max-width: 1040px; margin: 0 auto; padding: 26px; }
            .topbar {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 16px;
                padding: 14px 14px;
                border: 1px solid rgba(15, 23, 42, 0.10);
                border-radius: 16px;
                background: rgba(255, 255, 255, 0.80);
                backdrop-filter: blur(8px);
                box-shadow: 0 18px 40px rgba(15, 23, 42, 0.08);
            }
            h1 { margin: 0; font-size: 20px; letter-spacing: -0.02em; }
            .subtitle { margin-top: 2px; font-size: 13px; color: #475569; }
            .meta { display: inline-flex; align-items: center; gap: 8px; margin-top: 6px; }
            .pill { display: inline-flex; align-items: center; gap: 8px; padding: 6px 10px; border-radius: 999px; border: 1px solid rgba(15, 23, 42, 0.10); background: rgba(255, 255, 255, 0.75); font-size: 12px; color: #334155; }
            .dot { width: 8px; height: 8px; border-radius: 999px; background: linear-gradient(135deg, #3b82f6, #a855f7); }
            .actions { display: flex; gap: 10px; flex-wrap: wrap; justify-content: flex-end; }
            .btn { display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 10px 12px; border-radius: 12px; border: 1px solid rgba(15, 23, 42, 0.14); background: rgba(255, 255, 255, 0.9); color: #0f172a; text-decoration: none; font-size: 14px; }
            .btn:hover { transform: translateY(-1px); box-shadow: 0 12px 28px rgba(15, 23, 42, 0.10); }
            .btn-primary { background: linear-gradient(135deg, #2563eb, #7c3aed); border-color: transparent; color: #fff; }
            .btn-danger { background: linear-gradient(135deg, #ef4444, #be123c); border-color: transparent; color: #fff; cursor: pointer; }
            .card { margin-top: 16px; background: rgba(255, 255, 255, 0.88); border: 1px solid rgba(15, 23, 42, 0.10); border-radius: 16px; overflow: hidden; box-shadow: 0 18px 40px rgba(15, 23, 42, 0.08); }
            table { width: 100%; border-collapse: collapse; font-size: 14px; }
            th, td { padding: 12px 14px; border-bottom: 1px solid rgba(15, 23, 42, 0.08); vertical-align: top; }
            th { background: rgba(248, 250, 252, 0.8); text-transform: uppercase; font-size: 12px; color: #475569; letter-spacing: .06em; }
            tbody tr:nth-child(odd) { background: rgba(248, 250, 252, 0.5); }
            .row-actions { display: flex; gap: 8px; align-items: center; }
            .alert { margin-top: 12px; padding: 12px 14px; border-radius: 14px; border: 1px solid rgba(34, 197, 94, 0.25); background: rgba(34, 197, 94, 0.10); color: #14532d; font-size: 14px; }
            .empty { text-align: center; color: #64748b; padding: 20px 12px; }
            .pagination { margin-top: 12px; display: flex; align-items: center; justify-content: space-between; gap: 12px; font-size: 14px; }
            .pagination a { color: #0f172a; text-decoration: none; border: 1px solid rgba(15, 23, 42, 0.14); padding: 8px 12px; border-radius: 12px; background: rgba(255, 255, 255, 0.85); }
            .pagination .disabled { color: #94a3b8; border: 1px solid rgba(15, 23, 42, 0.08); padding: 8px 12px; border-radius: 12px; background: rgba(248, 250, 252, 0.8); }
            form { margin: 0; }
        </style>
    </head>
    <body>
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
                        Tambah User
                    </a>
                </div>
            </div>

            @if (session('success'))
                <div class="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card">
                <div>
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
                                            <a href="{{ route('users.edit', $user) }}" class="btn">
                                                Edit
                                            </a>

                                            <form method="POST" action="{{ route('users.destroy', $user) }}" onsubmit="return confirm('Hapus user ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
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
                    <div>
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
