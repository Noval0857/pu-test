<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Dokumen</title>
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
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>
    <div class="header d-flex align-items-center">
        <img src="/logo.png" alt="Logo" height="40" class="me-3">
        <div>
            <div>Tambah Dokumen</div>
            <div>BWS Banjarmasin</div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header fw-bold">Form Tambah Dokumen ke Proyek: {{ $proyek->nama_proyek }}</div>
            <div class="card-body">
                <form action="{{ route('detail_proyek.store', $proyek->id_proyek) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_berkas" class="form-label">Nama Dokumen</label>
                        <input type="text" class="form-control" id="nama_berkas" name="nama_berkas" required>
                    </div>
                    <div class="mb-3">
                        <label for="url_berkas" class="form-label">Upload File (PDF)</label>
                        <input type="file" class="form-control" id="url_berkas" name="url_berkas" accept=".pdf" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('detail_proyek.index', $proyek->id_proyek) }}" class="btn btn-back">← Kembali</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
