<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .button-primary {
            background-color: #00aaff;
            color: white;
            border: none;
            padding: 14px 28px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin: 10px;
        }

        .button-primary:hover {
            background-color: #007ecc;
        }

        .button-danger {
            background-color: #f05454;
            color: white;
            border: none;
            padding: 14px 28px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin: 10px;
        }

        .button-danger:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <!-- Logo animasi -->
    <div class="logo-marquee">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
    </div>

    <div class="container">
        <h2>👋 Selamat datang, {{ Auth::user()->name }}!</h2>
        <p>Silakan pilih menu:</p>

        <!-- Tombol aksi -->
        <div>
            <a href="#">
                <a href="{{ route('barang.index') }}">
                <button class="button-primary">Kelola Data Barang</button>
            </a>

            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="button-danger">Logout</button>
            </form>
        </div>
    </div>

    <footer class="footer">
        <p>© 2025 Kelola Barang Pintar. All rights reserved.</p>
    </footer>
</body>
</html>
