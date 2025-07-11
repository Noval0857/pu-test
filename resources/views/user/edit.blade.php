<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
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

        .card {
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
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
    </style>
</head>

<body>

    <div class="header d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <img src="/storage/gambar/logo.png" alt="Logo" height="40" class="me-3">
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
            <div class="card-header fw-bold">Form Edit User</div>
            <div class="card-body">
                {{-- ERROR VALIDATION --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('users.update', $user->id_user) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="username" class="form-label">Nama User</label>
                        <input type="text" class="form-control" name="username" id="username"
                            value="{{ old('username', $user->username) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Kata Sandi Baru (opsional)</label>
                        <input type="password" class="form-control" name="password" id="password">
                        <small class="text-muted">Kosongkan jika tidak ingin mengubah password.</small>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                        <input type="password" class="form-control" name="password_confirmation"
                            id="password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
