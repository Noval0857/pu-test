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
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
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
                    <div class="card-header fw-bold">Daftar Proyek</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama Proyek</th>
                                    <th>Tahun</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span class="folder-icon">&#128193;</span> <span class="project-title">Pengolahan Irigasi dan Perairan riam kanan</span></td>
                                    <td>2024</td>
                                </tr>
                                <tr>
                                    <td><span class="folder-icon">&#128193;</span> <span class="project-title">Restrukturasi Irigasi Barito Kuala</span></td>
                                    <td>2025</td>
                                </tr>
                                <tr>
                                    <td><span class="folder-icon">&#128193;</span> <span class="project-title">Pengolahan Bendungan riam kanan</span></td>
                                    <td>2023</td>
                                </tr>
                                <tr>
                                    <td><span class="folder-icon">&#128193;</span> <span class="project-title">Proyek Perbaikan irigasi</span></td>
                                    <td>2025</td>
                                </tr>
                                <tr>
                                    <td><span class="folder-icon">&#128193;</span> <span class="project-title">Pemberdayaan Program SISDA desa Kertak Baru</span></td>
                                    <td>2024</td>
                                </tr>
                                <tr>
                                    <td><span class="folder-icon">&#128193;</span> <span class="project-title">Pengolahan Bendungan riam kiri</span></td>
                                    <td>2022</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="filter-box">
                    <div class="fw-bold mb-3">Gunakan Filter Pencarian</div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Nama Proyek">
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control" placeholder="Tahun">
                    </div>
                    <div class="fw-bold mb-2">Atau gunakan Tag</div>
                    <div class="tag-list mb-3">
                        <label><input type="checkbox"> Irigasi</label>
                        <label><input type="checkbox"> Banjir</label>
                        <label><input type="checkbox"> Bandungan</label>
                        <label><input type="checkbox"> Sisda</label>
                        <label><input type="checkbox"> Perbaikan</label>
                    </div>
                    <button class="btn btn-search w-100">Cari 🔍</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
