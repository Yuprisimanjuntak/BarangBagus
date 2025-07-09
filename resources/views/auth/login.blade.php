<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Kelola Barang Pintar</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Animasi Logo -->
    <div class="logo-marquee">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
    </div>

    <!-- Form Login -->
    <div class="container">
        <h2>Login</h2>
        @if(session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Masuk</button>
        </form>
        <p>Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>© 2025 Kelola Barang Pintar. All rights reserved.</p>
    </footer>
</body>
</html>