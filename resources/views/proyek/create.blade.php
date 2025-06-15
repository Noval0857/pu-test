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
        <div class="card">
            <div class="card-header fw-bold">
                Tambah Proyek Baru
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Terjadi kesalahan!</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('proyeks.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nama_proyek" class="form-label">Nama Proyek</label>
                        <input type="text" name="nama_proyek" class="form-control" value="{{ old('nama_proyek') }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="tahun" class="form-label">Tahun</label>
                        <input type="number" name="tahun" class="form-control" value="{{ old('tahun') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="nilai" class="form-label">Nilai</label>
                        <input type="number" name="nilai" class="form-control" value="{{ old('nilai') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tag</label>
                        <div class="form-check">
                            @foreach ($tags as $tag)
                                <div class="form-check">
                                    <input type="checkbox" name="tags[]" value="{{ $tag->id_tag }}"
                                        class="form-check-input" id="tag{{ $tag->id_tag }}">
                                    <label class="form-check-label" for="tag{{ $tag->id_tag }}">
                                        {{ $tag->nama }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('proyeks.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
