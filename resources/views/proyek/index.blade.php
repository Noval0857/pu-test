<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Proyek</title>
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

        .folder-icon {
            color: #f9b233;
            font-size: 24px;
            margin-right: 10px;
        }

        .project-title {
            color: #1d3264;
            font-weight: bold;
        }

        .filter-box {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        .btn-search {
            background-color: #f9b233;
            border: none;
            color: black;
            font-weight: bold;
        }

        .btn-search:hover {
            background-color: #f1a722;
        }

        .tag-list label {
            display: block;
        }
    </style>
</head>

<body>
    <div class="header d-flex align-items-center">
        <img src="logo.png" alt="Logo" height="40" class="me-3">
        <div>
            <div>Arsip Data</div>
            <div>BWS Banjarmasin</div>
        </div>
    </div>

    <div class="container my-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="fw-bold">Daftar Proyek</span>
                        @if (Auth::user()->role == 'admin')
                            <div>
                                <a href="{{ route('proyeks.create') }}" class="btn btn-primary btn-sm">+ Tambah
                                    Proyek</a>
                                <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm">+ Tambah User</a>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama Proyek</th>
                                    <th>Tahun</th>
                                    <th>Nilai</th>

                                    @if (Auth::user()->role == 'admin')
                                        <th>Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proyeks as $proyek)
                                    <tr>
                                        <td>
                                            <a href="{{ route('detail_proyek.index', $proyek->id_proyek) }}"
                                                class="d-block text-decoration-none text-dark">
                                                <span class="folder-icon">&#128193;</span>
                                                <span class="project-title">{{ $proyek->nama_proyek }}</span>
                                            </a>
                                            <small class="text-muted">
                                                @if ($proyek->tags->count())
                                                    @foreach ($proyek->tags as $tag)
                                                        <span class="">•{{ $tag->nama }}</span>
                                                    @endforeach
                                                @endif
                                            </small>
                                        </td>
                                        <td>{{ $proyek->tahun }}</td>
                                        <td>Rp {{ number_format($proyek->nilai, 0, ',', '.') }}</td>

                                        <td>
                                            @if (Auth::user()->role == 'admin')
                                                <a href="{{ route('proyeks.edit', $proyek->id_proyek) }}"
                                                    class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('proyeks.destroy', $proyek->id_proyek) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Hapus proyek ini?')">Hapus</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="filter-box">
                    <div class="fw-bold mb-3">Gunakan Filter Pencarian</div>
                    <form method="GET" action="{{ route('proyeks.index') }}">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="nama" placeholder="Nama Proyek">
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control" name="tahun" placeholder="Tahun">
                        </div>
                        @if (Auth::user()->role == 'admin')
                            <a href="{{ route('tags.index') }}" class="btn btn-primary btn-sm">+ Tambah Tag</a>
                        @endif

                        <div class="fw-bold mb-2">Atau gunakan Tag</div>
                        <div class="tag-list mb-3">
                            @foreach ($tags as $tag)
                                <label>
                                    <input type="checkbox" name="tag[]" value="{{ $tag->nama }}">
                                    {{ $tag->nama }}
                                </label>
                            @endforeach
                        </div>
                        <button class="btn btn-search w-100">Cari 🔍</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
