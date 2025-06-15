<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Proyek</title>
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

        .btn-warning {
            font-weight: bold;
        }

        .btn-danger {
            font-weight: bold;
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

        .table td,
        .table th {
            vertical-align: middle;
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

    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="fw-bold">Detail Proyek: {{ $proyek->nama_proyek }} ({{ $proyek->tahun }})</h4>

                @if (Auth::user()->role == 'admin')
                    <a href="{{ route('detail_proyek.create', $proyek->id_proyek) }}"
                        class="btn btn-primary btn-sm mb-3">+
                        Tambah Dokumen</a>
                @endif

                <nav class="mb-3">
                    <small class="text-muted">
                        @foreach ($proyek->tags as $tag)
                            <span>•{{ $tag->nama }}</span>
                        @endforeach
                    </small>
                </nav>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <table class="table table-borderless align-middle">
                    <thead class="border-bottom">
                        <tr>
                            <th>Nama Dokumen</th>
                            <th class="text-end">Waktu Upload</th>
                            @if (Auth::user()->role == 'admin')
                                <th class="text-center">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($proyek->detailProyek as $detail)
                            <tr>
                                <td>
                                    <i class="bi bi-file-earmark-pdf-fill text-danger me-2"></i>
                                    <a href="{{ asset('storage/' . $detail->url_berkas) }}"
                                        class="fw-semibold text-dark text-decoration-none" target="_blank">
                                        {{ $detail->nama_berkas }}
                                    </a>


                                </td>
                                <td class="text-end">
                                    {{ \Carbon\Carbon::parse($detail->created_at)->format('d/m/Y') }}
                                </td>
                                @if (Auth::user()->role == 'admin')
                                    <td class="text-center">
                                        <a href="{{ route('detail_proyek.edit', $detail->id_detail) }}"
                                            class="btn btn-sm btn-warning">Edit</a>

                                        <form action="{{ route('detail_proyek.destroy', $detail->id_detail) }}"
                                            method="POST" class="d-inline"
                                            onsubmit="return confirm('Yakin ingin menghapus dokumen ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted">Belum ada dokumen.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <a href="{{ route('proyeks.index') }}" class="btn btn-back mt-3">← Kembali ke Daftar Proyek</a>
            </div>
        </div>
    </div>
    <script>
        function printPdf(url) {
            const iframe = document.createElement('iframe');
            iframe.style.display = 'none';
            iframe.src = url;
            document.body.appendChild(iframe);
            iframe.onload = function() {
                setTimeout(() => {
                    iframe.contentWindow.focus();
                    iframe.contentWindow.print();
                }, 500); // tunggu sedikit agar PDF dimuat sempurna
            };
        }
    </script>

</body>

</html>
