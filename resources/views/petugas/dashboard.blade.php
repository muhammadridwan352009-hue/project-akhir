<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Petugas - SIMPATI</title>
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

        /* Sidebar Kiri - Ruang Petugas */
        aside {
            width: 260px;
            background-color: #071b26;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 24px;
            flex-shrink: 0;
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
            margin-bottom: 20px;
            padding-bottom: 16px;
            border-bottom: 1px solid #e2e8f0;
        }
        header .title-sub {
            font-size: 11px;
            color: #00897b;
            font-weight: 700;
            letter-spacing: 0.5px;
        }
        header h1 {
            font-size: 22px;
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
        }
        .dot {
            width: 8px;
            height: 8px;
            background-color: #f59e0b;
            border-radius: 50%;
        }
        .breadcrumb {
            font-size: 12px;
            color: #718096;
            margin-bottom: 20px;
        }

        /* Title Section */
        .title-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }
        .title-section h2 {
            font-size: 22px;
            color: #071b26;
            font-weight: 800;
        }
        .title-section p {
            font-size: 12px;
            color: #718096;
            margin-top: 2px;
        }
        .btn-add {
            background-color: #00897b;
            color: #fff;
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: 0.2s;
        }
        .btn-add:hover { background-color: #00796b; }

        /* Stats Cards Bar */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 28px;
        }
        .stat-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 16px 20px;
            display: flex;
            align-items: center;
            gap: 16px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
        }
        .stat-icon {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            flex-shrink: 0;
        }
        .stat-icon.warning { background-color: #fffbeb; border-color: #fef3c7; color: #d97706; }
        .stat-icon.danger { background-color: #fef2f2; border-color: #fee2e2; color: #ef4444; }
        .stat-label {
            font-size: 11px;
            color: #64748b;
            font-weight: 600;
            margin-bottom: 2px;
        }
        .stat-value {
            font-size: 22px;
            font-weight: 800;
            color: #071b26;
            line-height: 1;
        }
        .stat-sub {
            font-size: 10px;
            color: #94a3b8;
            margin-top: 4px;
        }

        /* Layout Grid Konten */
        .dashboard-content-grid {
            display: grid;
            grid-template-columns: 1fr 320px;
            gap: 24px;
            align-items: start;
        }

        /* Table Card (Permintaan Terbaru) */
        .card-panel {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
        }
        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .panel-header h3 {
            font-size: 15px;
            font-weight: bold;
            color: #1e293b;
        }
        .panel-header a {
            font-size: 12px;
            color: #00897b;
            text-decoration: none;
            font-weight: 600;
        }

        /* Request Item List */
        .request-item {
            background: #f8fafc;
            border: 1px solid #f1f5f9;
            border-radius: 12px;
            padding: 14px 18px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .request-item:last-child { margin-bottom: 0; }

        .req-user {
            width: 140px;
        }
        .req-user strong { font-size: 13px; color: #1e293b; display: block; }
        .req-user span { font-size: 10px; color: #94a3b8; }

        .req-item-info {
            flex: 1;
            padding: 0 16px;
        }
        .req-item-title { font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px; }
        .badge-code {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 9px;
            font-weight: bold;
            background: #fff;
            border: 1px solid #e2e8f0;
            padding: 2px 6px;
            border-radius: 4px;
            color: #334155;
        }
        .badge-code .cat { color: #7c3aed; }
        .badge-code .cat.band { color: #ea580c; }
        .badge-code .cat.osis { color: #0284c7; }
        .badge-code .cat.rohis { color: #059669; }

        .req-date { font-size: 11px; color: #94a3b8; width: 90px; text-align: center; }

        .req-status-action {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .status-pill-orange {
            background: #ffedd5;
            color: #ea580c;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 10px;
            font-weight: 700;
        }
        .btn-review {
            background: #fff;
            border: 1px solid #cbd5e1;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 600;
            color: #334155;
            cursor: pointer;
            text-decoration: none;
            transition: 0.2s;
        }
        .btn-review:hover { background: #f1f5f9; }

        /* Panel Kanan (Pemakaian Kategori & Alert Terlambat) */
        .right-column {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        /* Progress Bars Card */
        .category-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 20px;
        }
        .category-card h4 {
            font-size: 13px;
            font-weight: bold;
            color: #1e293b;
            margin-bottom: 16px;
        }
        .cat-progress-item {
            margin-bottom: 12px;
        }
        .cat-progress-item:last-child { margin-bottom: 0; }
        .cat-info {
            display: flex;
            justify-content: space-between;
            font-size: 11px;
            color: #64748b;
            margin-bottom: 4px;
        }
        .progress-bar-bg {
            width: 100%;
            height: 6px;
            background-color: #f1f5f9;
            border-radius: 10px;
            overflow: hidden;
        }
        .progress-bar-fill {
            height: 100%;
            border-radius: 10px;
        }

        /* Danger Alert Box Terlambat */
        .late-alert-card {
            background-color: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 16px;
            padding: 20px;
        }
        .late-title {
            font-size: 13px;
            font-weight: bold;
            color: #dc2626;
            margin-bottom: 10px;
        }
        .late-list {
            list-style: none;
            font-size: 11px;
            color: #7f1d1d;
            margin-bottom: 16px;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }
        .btn-action-danger {
            width: 100%;
            background-color: #ef4444;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }
        .btn-action-danger:hover { background-color: #dc2626; }
    </style>
</head>
<body>

    <!-- Sidebar Kiri (Ruang Petugas) -->
    <aside>
        <div>
            <div class="brand">SIMPATI</div>
            <div class="menu-label">Ruang Petugas</div>
     <nav>
    <a href="/petugas/dashboard">
        <span>📊</span> Dashboard
    </a>
    <a href="/petugas/inventaris">
        <span>📦</span> Inventaris
    </a>
    <a href="/petugas/persetujuan">
        <span>📝</span> Persetujuan <span style="margin-left:auto; background:#d97706; color:#fff; font-size:10px; padding:2px 6px; border-radius:10px;">8</span>
    </a>
    <a href="/petugas/pengembalian">
        <span>🔄</span> Pengembalian
    </a>
    <a href="/petugas/laporan">
        <span>📈</span> Laporan
    </a>
</nav>
        </div>
        <div class="sidebar-footer">
            Bantuan sarpras • ekstensi 104<br>
            SIMPATI v1.4
        </div>
    </aside>

    <!-- Main Area -->
    <main>
        <header>
            <div>
                <div class="title-sub">SISTEM INVENTARIS SEKOLAH</div>
                <h1>Dashboard petugas</h1>
            </div>
            <div class="user-badge">
                <span class="dot"></span>
                <span>Rizky Maulana</span>
            </div>
        </header>

        <div class="breadcrumb">Dashboard / <strong>Ringkasan operasional</strong></div>

        <div class="title-section">
            <div>
                <h2>Ringkasan hari ini</h2>
                <p>Jumat, 25 September 2026 • Diperbarui 10.24 WIB</p>
            </div>
            <a href="#" class="btn-add">
                <span>+</span> Tambah inventaris
            </a>
        </div>

        <!-- Metric Stat Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">📦</div>
                <div>
                    <div class="stat-label">Total inventaris</div>
                    <div class="stat-value">284</div>
                    <div class="stat-sub">+12 bulan ini</div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">🔄</div>
                <div>
                    <div class="stat-label">Sedang dipinjam</div>
                    <div class="stat-value">37</div>
                    <div class="stat-sub" style="color:#10b981;">13% dari stok</div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon warning">◆</div>
                <div>
                    <div class="stat-label">Perlu persetujuan</div>
                    <div class="stat-value">8</div>
                    <div class="stat-sub" style="color:#d97706;">3 prioritas</div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon danger">!</div>
                <div>
                    <div class="stat-label">Terlambat</div>
                    <div class="stat-value">3</div>
                    <div class="stat-sub" style="color:#ef4444;">Perlu tindak lanjut</div>
                </div>
            </div>
        </div>

        <!-- Dashboard Content Grid -->
        <div class="dashboard-content-grid">
            
            <!-- Permintaan Terbaru -->
            <div class="card-panel">
                <div class="panel-header">
                    <h3>Permintaan terbaru</h3>
                    <a href="#">Lihat semua →</a>
                </div>

                <!-- Item 1 -->
                <div class="request-item">
                    <div class="req-user">
                        <strong>Nadia Putri</strong>
                        <span>Siswa • Ekskul</span>
                    </div>
                    <div class="req-item-info">
                        <div class="req-item-title">Kamera Sony A6400</div>
                        <div class="badge-code">
                            <span>MM-CAM-014</span>
                            <span class="cat">MULTIMEDIA</span>
                        </div>
                    </div>
                    <div class="req-date">25-26 Sep</div>
                    <div class="req-status-action">
                        <span class="status-pill-orange">• Menunggu</span>
                        <a href="#" class="btn-review">Tinjau</a>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="request-item">
                    <div class="req-user">
                        <strong>Farhan Akbar</strong>
                        <span>Siswa • Ekskul</span>
                    </div>
                    <div class="req-item-info">
                        <div class="req-item-title">Portable Speaker JBL</div>
                        <div class="badge-code">
                            <span>OS-SPK-005</span>
                            <span class="cat osis">OSIS</span>
                        </div>
                    </div>
                    <div class="req-date">27 Sep</div>
                    <div class="req-status-action">
                        <span class="status-pill-orange">• Menunggu</span>
                        <a href="#" class="btn-review">Tinjau</a>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="request-item">
                    <div class="req-user">
                        <strong>Alya Zahra</strong>
                        <span>Siswa • Ekskul</span>
                    </div>
                    <div class="req-item-info">
                        <div class="req-item-title">Karpet Masjid 3×5 m</div>
                        <div class="badge-code">
                            <span>RH-KRP-011</span>
                            <span class="cat rohis">ROHIS</span>
                        </div>
                    </div>
                    <div class="req-date">29-30 Sep</div>
                    <div class="req-status-action">
                        <span class="status-pill-orange">• Menunggu</span>
                        <a href="#" class="btn-review">Tinjau</a>
                    </div>
                </div>

                <!-- Item 4 -->
                <div class="request-item">
                    <div class="req-user">
                        <strong>Bima Pratama</strong>
                        <span>Siswa • Ekskul</span>
                    </div>
                    <div class="req-item-info">
                        <div class="req-item-title">Mikrofon Wireless</div>
                        <div class="badge-code">
                            <span>BND-MIC-008</span>
                            <span class="cat band">BAND</span>
                        </div>
                    </div>
                    <div class="req-date">1 Okt</div>
                    <div class="req-status-action">
                        <span class="status-pill-orange">• Menunggu</span>
                        <a href="#" class="btn-review">Tinjau</a>
                    </div>
                </div>

            </div>

            <!-- Panel Kanan -->
            <div class="right-column">
                
                <!-- Pemakaian Kategori Bar -->
                <div class="category-card">
                    <h4>Pemakaian kategori</h4>
                    
                    <div class="cat-progress-item">
                        <div class="cat-info">
                            <span>Multimedia</span>
                            <strong>78%</strong>
                        </div>
                        <div class="progress-bar-bg">
                            <div class="progress-bar-fill" style="width: 78%; background-color: #8b5cf6;"></div>
                        </div>
                    </div>

                    <div class="cat-progress-item">
                        <div class="cat-info">
                            <span>Band</span>
                            <strong>64%</strong>
                        </div>
                        <div class="progress-bar-bg">
                            <div class="progress-bar-fill" style="width: 64%; background-color: #f97316;"></div>
                        </div>
                    </div>

                    <div class="cat-progress-item">
                        <div class="cat-info">
                            <span>OSIS</span>
                            <strong>52%</strong>
                        </div>
                        <div class="progress-bar-bg">
                            <div class="progress-bar-fill" style="width: 52%; background-color: #0284c7;"></div>
                        </div>
                    </div>

                    <div class="cat-progress-item">
                        <div class="cat-info">
                            <span>Rohis</span>
                            <strong>36%</strong>
                        </div>
                        <div class="progress-bar-bg">
                            <div class="progress-bar-fill" style="width: 36%; background-color: #10b981;"></div>
                        </div>
                    </div>
                </div>

                <!-- Warning Box Terlambat -->
                <div class="late-alert-card">
                    <div class="late-title">3 pengembalian terlambat</div>
                    <ul class="late-list">
                        <li>• Fajar • Kabel XLR • 4 hari</li>
                        <li>• Rian • Handycam • 2 hari</li>
                        <li>• Dimas • Stand banner • 1 hari</li>
                    </ul>
                    <button class="btn-action-danger">Tindak lanjut</button>
                </div>

            </div>

        </div>
    </main>

</body>
</html>