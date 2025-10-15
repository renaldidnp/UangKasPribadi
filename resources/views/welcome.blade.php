<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kas Kecil - Kelola Keuangan Pribadi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: white;
        }

        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 5%;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 24px;
            font-weight: bold;
        }

        .logo-icon {
            font-size: 32px;
        }

        .nav-links {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .nav-link {
            color: white;
            text-decoration: none;
            padding: 10px 25px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        .nav-link.btn-primary {
            background: white;
            color: #667eea;
            border: 2px solid white;
        }

        .nav-link.btn-primary:hover {
            background: transparent;
            color: white;
        }

        /* Hero Section */
        .hero {
            text-align: center;
            padding: 80px 5%;
            max-width: 900px;
            margin: 0 auto;
            animation: fadeIn 1s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-icon {
            font-size: 100px;
            margin-bottom: 20px;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .hero h1 {
            font-size: 48px;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .hero p {
            font-size: 20px;
            margin-bottom: 40px;
            opacity: 0.9;
            line-height: 1.6;
        }

        .cta-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 15px 40px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
            border: 2px solid white;
        }

        .btn-white {
            background: white;
            color: #667eea;
        }

        .btn-white:hover {
            background: transparent;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(255, 255, 255, 0.3);
        }

        .btn-outline {
            background: transparent;
            color: white;
            border: 2px solid white;
        }

        .btn-outline:hover {
            background: white;
            color: #667eea;
            transform: translateY(-3px);
        }

        /* Features Section */
        .features {
            padding: 60px 5%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .features-title {
            text-align: center;
            font-size: 36px;
            margin-bottom: 50px;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 35px;
            border-radius: 20px;
            text-align: center;
            transition: all 0.3s ease;
            border: 2px solid rgba(255, 255, 255, 0.2);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.2);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .feature-icon {
            font-size: 50px;
            margin-bottom: 20px;
            display: block;
        }

        .feature-card h3 {
            font-size: 22px;
            margin-bottom: 15px;
        }

        .feature-card p {
            opacity: 0.9;
            line-height: 1.6;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 30px 5%;
            background: rgba(0, 0, 0, 0.2);
            margin-top: 60px;
        }

        .footer p {
            opacity: 0.8;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 36px;
            }

            .hero p {
                font-size: 18px;
            }

            .hero-icon {
                font-size: 80px;
            }

            .features-title {
                font-size: 28px;
            }

            .nav-links {
                gap: 10px;
            }

            .nav-link {
                padding: 8px 15px;
                font-size: 14px;
            }

            .cta-buttons {
                flex-direction: column;
                align-items: stretch;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">
            <span class="logo-icon">💰</span>
            <span>Kas Kecil</span>
        </div>
        <div class="nav-links">
            @auth
                <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="nav-link">Masuk</a>
                <a href="{{ route('register') }}" class="nav-link btn-primary">Daftar</a>
            @endauth
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-icon">💰</div>
        <h1>Kelola Keuangan Pribadi dengan Mudah</h1>
        <p>
            Aplikasi pencatat keuangan yang membantu Anda melacak pemasukan dan pengeluaran.
            Sederhana, cepat, dan gratis!
        </p>
        <div class="cta-buttons">
            @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-white">
                    Buka Dashboard
                </a>
            @else
                <a href="{{ route('register') }}" class="btn btn-white">
                    Mulai Gratis
                </a>
                <a href="{{ route('login') }}" class="btn btn-outline">
                    Sudah Punya Akun
                </a>
            @endauth
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <h2 class="features-title">Fitur Unggulan</h2>
        <div class="features-grid">
            <div class="feature-card">
                <span class="feature-icon">📝</span>
                <h3>Catat Transaksi</h3>
                <p>Mudah mencatat setiap pemasukan dan pengeluaran dengan cepat dan praktis</p>
            </div>

            <div class="feature-card">
                <span class="feature-icon">📊</span>
                <h3>Laporan & Grafik</h3>
                <p>Visualisasi data keuangan Anda dengan grafik dan laporan yang jelas</p>
            </div>

            <div class="feature-card">
                <span class="feature-icon">🗂️</span>
                <h3>Kategori Fleksibel</h3>
                <p>Organisir transaksi dengan berbagai kategori sesuai kebutuhan Anda</p>
            </div>

            <div class="feature-card">
                <span class="feature-icon">💵</span>
                <h3>Pantau Saldo</h3>
                <p>Lihat total saldo dan arus kas Anda secara real-time</p>
            </div>

            <div class="feature-card">
                <span class="feature-icon">📅</span>
                <h3>Laporan Bulanan</h3>
                <p>Dapatkan ringkasan keuangan setiap bulan untuk evaluasi</p>
            </div>

            <div class="feature-card">
                <span class="feature-icon">🔒</span>
                <h3>Aman & Privat</h3>
                <p>Data Anda tersimpan dengan aman dan hanya bisa diakses oleh Anda</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; {{ date('Y') }} Kas Kecil. Dibuat dengan ❤️ untuk membantu kelola keuangan Anda.</p>
    </footer>
</body>

</html>
