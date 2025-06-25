<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Arsip Data BWS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
        }

        .login-container {
            display: flex;
            height: 100vh;
        }

        .left-panel,
        .right-panel {
            width: 50%;
            flex: none;
        }

        .left-panel {
            background-image: url('{{ asset('storage/gambar/bg4.png') }}');
            background-color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 0 80px;
        }

        .right-panel {
            background-image: url('{{ asset('storage/gambar/bg2.png') }}');
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .pupr-footer {
            position: absolute;
            height: 100px;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
        }

        .pupr-footer img {
            height: 100px;
            max-width: 100%;
            vertical-align: middle;
            text-align: center;
            margin-right: 1px;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .form-label {
            font-weight: 500;
        }

        .btn-login {
            background-color: #f9b233;
            font-weight: bold;
            color: black;
            border: none;
            transition: background-color 0.3s;
        }
        .btn-login1 {
            background-color:rgb(27, 59, 134);
            font-weight: bold;
            color: white;
            border: none;
            transition: background-color 0.3s;
        }

        .btn-login:hover {
            background-color:rgb(218, 165, 66);
        }

        .btn-login1:hover {
            background-color:rgb(107, 96, 222);
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #1d3264;
        }

        .brand-logo {
            height: 24px;
            margin-right: 8px;
        }

        @media (max-width: 991.98px) {
            .login-container {
                flex-direction: column;
            }

            .right-panel {
                height: 300px;
                order: -1;
            }

            .left-panel {
                padding: 40px;
            }

            .pupr-footer {
                position: static;
                margin-top: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <!-- Panel kiri -->
        <div class="left-panel">
            <div class="mb-4 d-flex align-items-center">
                <img src="{{ asset('storage/gambar/logo.png') }}" class="brand-logo" alt="Logo PU">
                <h5 class="mb-0 fw-bold">BWS KALIMANTAN III</h5>
            </div>
            <h1 class="text-dark mb-2">Selamat Datang</h1>
            <p class="text-muted mb-4">Silahkan masuk dengan akun anda</p>

            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control shadow-sm" required>
                </div>
                <div class="mb-4">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control shadow-sm" required>
                </div>
                <button type="submit" name="login_type" value="paket" class="btn btn-login w-100 py-2 mb-2">Masuk Data
                    Paket</button>
                <button type="submit" name="login_type" value="surat" class="btn btn-login1 w-100 py-2">Masuk Data
                    Surat</button>
            </form>

        </div>

        <!-- Panel kanan -->
        <div class="right-panel">
            <div class="pupr-footer">
                <img src="{{ asset('storage/gambar/logo3.png') }}" alt="Logo PU">
            </div>
        </div>
    </div>
</body>

</html>