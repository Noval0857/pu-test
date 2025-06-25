<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Paket</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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
    <div class="header d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <img src="{{ asset('storage/gambar/logo.png') }}" alt="Logo" height="40" class="me-3">

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

    <div class="container my-5">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="fw-bold">Daftar Paket</span>
                        @if (Auth::user()->role == 'admin')
                            <div>
                                <a href="{{ route('proyek.create') }}" class="btn btn-primary btn-sm">+ Tambah
                                    Paket</a>
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
                                    <th>Nama Paket</th>
                                    <th>Kontraktor</th>
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
                                                <!-- <span class="folder-icon">&#128193;</span> -->
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
                                        <td>{{ $proyek->kontraktor }}</td>
                                        <td>{{ $proyek->tahun }}</td>
                                        <td>Rp {{ number_format($proyek->nilai, 0, ',', '.') }}</td>

                                        <td>
                                            @if (Auth::user()->role == 'admin')
                                                <a href="{{ route('proyek.edit', $proyek->id_proyek) }}"
                                                    class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <form action="{{ route('proyek.destroy', $proyek->id_proyek) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Hapus proyek ini?')" title="Hapus">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
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
                    <form method="GET" action="{{ route('proyek.index') }}">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="nama" placeholder="Nama Paket">
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control" name="tahun" placeholder="Tahun">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="kontraktor" placeholder="Kontraktor"
                                value="{{ request('kontraktor') }}">
                        </div>

                        @if (Auth::user()->role == 'admin')
                            <a href="{{ route('tags.index') }}" class="btn btn-primary btn-sm">+ Tambah Tag</a>
                        @endif

                        <div class="fw-bold mb-2">Atau Gunakan Tag</div>
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