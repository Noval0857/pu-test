<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tag</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }

        .header {
            background-color: #1d3264;
            color: white;
            padding: 15px;
            font-weight: bold;
        }

        .btn-primary {
            background-color: #1d3264;
            border: none;
        }

        .btn-primary:hover {
            background-color: #16244b;
        }

        .btn-back {
            background-color: #f9b233;
            color: black;
            font-weight: bold;
        }

        .btn-back:hover {
            background-color: #f1a722;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>

<body>

    <div class="header d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <img src="logo.png" alt="Logo" height="40" class="me-3">
            <div>
                <div>Arsip Data</div>
                <div>BWS Banjarmasin</div>
            </div>
        </div>

        <form action="{{ route('logout') }}" method="POST" class="mb-0 me-3">
            @csrf
            <button type="submit" class="btn btn-light btn-sm text-dark fw-bold">Logout</button>
        </form>
    </div>

    <div class="container my-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Daftar Tag</h5>
                <a href="{{ route('tags.create') }}" class="btn btn-primary btn-sm">+ Tambah Tag</a>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Nama Tag</th>
                            <th style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $tag)
                            <tr>
                                <td>{{ $tag->nama }}</td>
                                <td>
                                    <a href="{{ route('tags.edit', $tag->id_tag) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('tags.destroy', $tag->id_tag) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Hapus tag ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @if ($tags->isEmpty())
                            <tr>
                                <td colspan="2" class="text-center text-muted">Belum ada tag.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('proyeks.index') }}" class="btn btn-back btn-sm">← Kembali ke Daftar Proyek</a>
        </div>
    </div>

</body>

</html>
