<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Siswa - SIMPATI</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            background-color: #f4f6f8;
            color: #333;
            display: flex;
            min-height: 100vh;
        }
        /* Sidebar */
        aside {
            width: 260px;
            background-color: #071b26;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 24px;
        }
        .brand {
            font-size: 20px;
            font-weight: 800;
            letter-spacing: 1px;
            background: #fff;
            color: #071b26;
            padding: 8px 12px;
            border-radius: 8px;
            display: inline-block;
            margin-bottom: 30px;
        }
        .menu-label {
            font-size: 11px;
            color: #8b9bb4;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 12px;
        }
        nav a {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #b0c4de;
            text-decoration: none;
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 14px;
            margin-bottom: 6px;
            transition: 0.2s;
        }
        nav a.active {
            background-color: #00897b;
            color: #fff;
            font-weight: 600;
        }
        nav a:hover:not(.active) {
            background-color: rgba(255, 255, 255, 0.05);
            color: #fff;
        }
        .sidebar-footer {
            font-size: 11px;
            color: #7a8b9e;
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 16px;
        }

        /* Main Content */
        main {
            flex: 1;
            padding: 30px 40px;
            overflow-y: auto;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            padding-bottom: 16px;
            border-bottom: 1px solid #e2e8f0;
        }
        header .title-sub {
            font-size: 11px;
            color: #718096;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        header h1 {
            font-size: 20px;
            color: #1a202c;
            font-weight: bold;
        }
        .user-badge {
            background: #fff;
            border: 1px solid #e2e8f0;
            padding: 6px 14px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            font-weight: 600;
            color: #2d3748;
            box-shadow: 0 1px 2px rgba(0,0,0,0.02);
        }
        .dot {
            width: 8px;
            height: 8px;
            background-color: #10b981;
            border-radius: 50%;
        }
        .breadcrumb {
            font-size: 12px;
            color: #718096;
            margin-bottom: 20px;
        }

        /* Banner */
        .banner {
            background-color: #071b26;
            color: #fff;
            border-radius: 16px;
            padding: 28px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
        .banner h2 {
            font-size: 22px;
            margin-bottom: 6px;
        }
        .banner p {
            font-size: 13px;
            color: #a0aec0;
        }
        .btn-banner {
            background-color: #00897b;
            color: #fff;
            padding: 10px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: 0.2s;
        }
        .btn-banner:hover {
            background-color: #00796b;
        }

        /* Stat Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 24px;
        }
        .stat-card {
            background: #fff;
            padding: 20px;
            border-radius: 14px;
            border: 1px solid #e2e8f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
        }
        .stat-card .label {
            font-size: 12px;
            color: #718096;
            font-weight: 500;
        }
        .stat-card .number {
            font-size: 28px;
            font-weight: bold;
            color: #1a202c;
            margin: 4px 0;
        }
        .stat-card .desc {
            font-size: 11px;
            font-weight: 500;
        }
        .stat-card .desc.orange { color: #d97706; }
        .stat-card .desc.blue { color: #2563eb; }
        .stat-card .desc.gray { color: #4b5563; }
        .stat-icon {
            padding: 12px;
            border-radius: 10px;
            font-size: 18px;
        }
        .bg-green-light { background-color: #e6f4ea; color: #00897b; }
        .bg-orange-light { background-color: #fef3c7; color: #d97706; }
        .bg-blue-light { background-color: #eff6ff; color: #2563eb; }

        /* Content Layout (Grid 2 Kolom) */
        .content-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 24px;
        }
        .card {
            background: #fff;
            padding: 24px;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
        }
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }
        .card-title {
            font-size: 15px;
            font-weight: bold;
            color: #1a202c;
        }
        .card-subtitle {
            font-size: 12px;
            color: #718096;
        }
        .link-all {
            font-size: 12px;
            color: #00897b;
            text-decoration: none;
            font-weight: 600;
        }

        /* Item Pinjaman */
        .loan-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px;
            border: 1px solid #f1f5f9;
            background-color: #f8fafc;
            border-radius: 12px;
            margin-bottom: 12px;
        }
        .loan-info {
            display: flex;
            gap: 14px;
            align-items: center;
        }
        .item-thumb {
            width: 50px;
            height: 40px;
            background: #e2e8f0;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            font-weight: bold;
            color: #4a5568;
        }
        .badge-code {
            font-size: 9px;
            background: #071b26;
            color: #fff;
            padding: 2px 6px;
            border-radius: 4px;
            font-family: monospace;
        }
        .badge-code.orange { background: #d97706; }
        .item-name {
            font-size: 13px;
            font-weight: bold;
            color: #1a202c;
            margin: 2px 0;
        }
        .item-date {
            font-size: 11px;
            color: #718096;
        }
        .status-badge {
            font-size: 11px;
            padding: 4px 10px;
            border-radius: 20px;
            font-weight: 600;
        }
        .status-badge.yellow { background: #fef3c7; color: #b45309; }
        .status-badge.green { background: #d1fae5; color: #047857; }

        .alert-box {
            background-color: #e6f4ea;
            color: #00695c;
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 16px;
        }

        /* Kategori Grid */
        .category-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }
        .category-box {
            border: 1px solid #e2e8f0;
            padding: 12px;
            border-radius: 10px;
            text-decoration: none;
            display: block;
            transition: 0.2s;
        }
        .category-box:hover {
            border-color: #00897b;
        }
        .category-box .icon { font-size: 16px; margin-bottom: 6px; display: block; }
        .category-box .cat-name { font-size: 12px; font-weight: bold; color: #1a202c; }
        .category-box .cat-count { font-size: 10px; color: #718096; }

        .notification-card {
            background-color: #fffbeb;
            border: 1px solid #fde68a;
            padding: 14px;
            border-radius: 12px;
            display: flex;
            gap: 12px;
            margin-top: 16px;
        }
        .notification-card .notif-title {
            font-size: 12px;
            font-weight: bold;
            color: #92400e;
            margin-bottom: 2px;
        }
        .notification-card .notif-desc {
            font-size: 11px;
            color: #b45309;
        }
    </style>
</head>
<body>

    <!-- Sidebar Kiri -->
    <aside>
        <div>
            <div class="brand">SIMPATI</div>
            <div class="menu-label">Menu Utama</div>
           <nav>
    <a href="/siswa/beranda">
        <span>🏠</span> Beranda
    </a>
    <a href="/siswa/katalog">
        <span>📦</span> Katalog alat
    </a>
    <a href="/siswa/peminjaman">
        <span>📋</span> Peminjaman saya
    </a>
    <a href="#">
        <span>🔔</span> Notifikasi - 3
    </a>
</nav>
        </div>
        <div class="sidebar-footer">
            Sistem Inventaris Sekolah<br>SMK Negeri 5 Surakarta
        </div>
    </aside>

    <!-- Konten Utama Kanan -->
    <main>
        <header>
            <div>
                <div class="title-sub">SISTEM INVENTARIS SEKOLAH</div>
                <h1>Beranda siswa</h1>
            </div>
            <div class="user-badge">
                <span class="dot"></span>
                <span>Nadia Putri</span>
            </div>
        </header>

        <div class="breadcrumb">Beranda / Ringkasan</div>

        <!-- Banner Sambutan -->
        <div class="banner">
            <div>
                <h2>Selamat siang, Nadia! 👋</h2>
                <p>Kamera Multimedia perlu dikembalikan ke pihak sekolah pukul 15.00.</p>
            </div>
            <a href="#" class="btn-banner">Lihat pinjaman</a>
        </div>

        <!-- Kartu Statistik -->
        <div class="stats-grid">
            <div class="stat-card">
                <div>
                    <div class="label">Pinjaman aktif</div>
                    <div class="number">2</div>
                    <div class="desc orange">1 unit perlu dikembalikan</div>
                </div>
                <div class="stat-icon bg-green-light">📦</div>
            </div>
            <div class="stat-card">
                <div>
                    <div class="label">Menunggu persetujuan</div>
                    <div class="number">1</div>
                    <div class="desc blue">Diajukan 2 jam lalu</div>
                </div>
                <div class="stat-icon bg-orange-light">⏳</div>
            </div>
            <div class="stat-card">
                <div>
                    <div class="label">Riwayat selesai</div>
                    <div class="number">12</div>
                    <div class="desc gray">Semua dikembalikan tertib</div>
                </div>
                <div class="stat-icon bg-blue-light">✅</div>
            </div>
        </div>

        <!-- Grid Bawah -->
        <div class="content-grid">
            <!-- Pinjaman Aktif -->
            <div class="card">
                <div class="card-header">
                    <div>
                        <div class="card-title">Pinjaman aktif</div>
                        <div class="card-subtitle">Pantau barang yang sedang gunakan</div>
                    </div>
                    <a href="#" class="link-all">Lihat semua ›</a>
                </div>

                <div class="loan-item">
                    <div class="loan-info">
                        <div class="item-thumb">CAM</div>
                        <div>
                            <span class="badge-code">INV-CAM-014</span>
                            <div class="item-name">Kamera Sony Alpha A6400</div>
                            <div class="item-date">24-26 Sep 2026 • Ruang Multimedia</div>
                        </div>
                    </div>
                    <span class="status-badge yellow">⚠️ Besok</span>
                </div>

                <div class="loan-item">
                    <div class="loan-info">
                        <div class="item-thumb">MIC</div>
                        <div>
                            <span class="badge-code orange">INV-MIC-082</span>
                            <div class="item-name">Mikrofon Wireless Shure</div>
                            <div class="item-date">26-28 Sep 2026 • Studio Musik</div>
                        </div>
                    </div>
                    <span class="status-badge green">✓ 3 hari lagi</span>
                </div>

                <div class="alert-box">
                    <span>💡</span> 
                    <span>Rekam jejak Anda baik — 12 pengembalian tepat waktu.</span>
                </div>
            </div>

            <!-- Kanan: Kategori & Notifikasi -->
            <div>
                <div class="card" style="margin-bottom: 20px;">
                    <div class="card-title" style="margin-bottom: 2px;">Jelajahi kategori</div>
                    <div class="card-subtitle" style="margin-bottom: 16px;">Inventaris per unit institusi</div>

                    <div class="category-grid">
                        <a href="#" class="category-box">
                            <span class="icon">💻</span>
                            <div class="cat-name">Ratus</div>
                            <div class="cat-count">84 unit</div>
                        </a>
                        <a href="#" class="category-box">
                            <span class="icon">📷</span>
                            <div class="cat-name">Audio</div>
                            <div class="cat-count">48 unit</div>
                        </a>
                        <a href="#" class="category-box">
                            <span class="icon">🖨️</span>
                            <div class="cat-name">DLL</div>
                            <div class="cat-count">32 unit</div>
                        </a>
                        <a href="#" class="category-box">
                            <span class="icon">🎬</span>
                            <div class="cat-name">Multimedia</div>
                            <div class="cat-count">41 unit</div>
                        </a>
                    </div>
                </div>

                <div class="notification-card">
                    <span style="font-size: 16px;">⏳</span>
                    <div>
                        <div class="notif-title">Permintaan tripod disetujui</div>
                        <div class="notif-desc">Ambil di ruang sarpras mulai pukul 10.00.</div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
</html>