<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <label>Username:</label>
        <input type="text" name="username" required><br>
        <label>Password:</label>
        <input type="password" name="password" required><br>
        <label>Konfirmasi Password:</label>
        <input type="password" name="password_confirmation" required><br>
        <button type="submit">Register</button>
    </form>
    <p>Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
</body>
</html>
