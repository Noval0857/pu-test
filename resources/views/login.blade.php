<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Arsip Data BWS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
        }
        .login-container {
            display: flex;
            height: 100vh;
        }
        .left-panel {
            flex: 1;
            background-color: white;
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .right-panel {
            flex: 1;
            background: url('/images/bg-login-pupr.png') no-repeat center center;
            background-size: cover;
            position: relative;
        }
        .pupr-logo {
            position: absolute;
            bottom: 30px;
            left: 30px;
            color: white;
            font-weight: bold;
        }
        .btn-login {
            background-color: #f9b233;
            font-weight: bold;
            color: black;
            border: none;
        }
        .btn-login:hover {
            background-color: #f1a722;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #1d3264;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Panel kiri -->
        <div class="left-panel">
            <h4 class="fw-bold text-primary mb-1"><img src="/images/pupr-small.png" height="20" class="me-2">Arsip data BWS</h4>
            <h1 class="fw-bold text-dark">Selamat Datang</h1>
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
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control shadow-sm" required>
                </div>
                <button type="submit" class="btn btn-login w-100 py-2">Masuk</button>
                <div class="mt-3 text-center">
                    <a href="#" class="text-decoration-none">Admin</a>
                </div>
            </form>
        </div>

        <!-- Panel kanan -->
        <div class="right-panel">
            <div class="pupr-logo">
                <img src="/images/pupr-small.png" height="30" class="me-2">
                KEMENTERIAN PEKERJAAN UMUM
            </div>
        </div>
    </div>
</body>
</html>
