<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Alat - SIMPATI</title>
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
            background-color: #10b981;
            border-radius: 50%;
        }
        .breadcrumb {
            font-size: 12px;
            color: #718096;
            margin-bottom: 16px;
        }

        /* Banner Section */
        .title-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .title-section h2 {
            font-size: 22px;
            color: #071b26;
            font-weight: 800;
        }
        .title-section p {
            font-size: 13px;
            color: #718096;
            margin-top: 2px;
        }
        .view-toggle {
            display: flex;
            gap: 6px;
        }
        .btn-toggle {
            background: #fff;
            border: 1px solid #cbd5e1;
            padding: 8px 12px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 13px;
        }
        .btn-toggle.active {
            background-color: #00897b;
            color: #fff;
            border-color: #00897b;
        }

        /* Search & Filter Bar */
        .filter-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 16px 20px;
            margin-bottom: 28px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
        }
        .filter-top {
            display: flex;
            gap: 12px;
            margin-bottom: 14px;
        }
        .search-box {
            flex: 1;
            display: flex;
            align-items: center;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 10px 14px;
            gap: 10px;
        }
        .search-box input {
            border: none;
            background: transparent;
            width: 100%;
            outline: none;
            font-size: 13px;
            color: #333;
        }
        .toggle-available {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 10px 16px;
            font-size: 12px;
            color: #475569;
            font-weight: 600;
        }
        .switch {
            position: relative;
            display: inline-block;
            width: 34px;
            height: 20px;
        }
        .switch input { opacity: 0; width: 0; height: 0; }
        .slider {
            position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0;
            background-color: #cbd5e1; transition: .3s; border-radius: 20px;
        }
        .slider:before {
            position: absolute; content: ""; height: 14px; width: 14px; left: 3px; bottom: 3px;
            background-color: white; transition: .3s; border-radius: 50%;
        }
        input:checked + .slider { background-color: #00897b; }
        input:checked + .slider:before { transform: translateX(14px); }

        .btn-filter {
            background: #fff;
            border: 1px solid #cbd5e1;
            padding: 10px 18px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            color: #334155;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .filter-tags {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .tags-group {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }
        .tag {
            background: #f1f5f9;
            color: #64748b;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            text-decoration: none;
            font-weight: 500;
            transition: 0.2s;
        }
        .tag.active {
            background: #071b26;
            color: #fff;
        }
        .tag-info {
            font-size: 11px;
            color: #94a3b8;
        }

        /* Grid Produk */
        .catalog-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }
        .item-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .card-img-wrapper {
            position: relative;
            width: 100%;
            height: 160px;
            background: #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        .card-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .placeholder-text {
            font-size: 14px;
            font-weight: bold;
            color: #64748b;
        }
        .badge-code {
            position: absolute;
            top: 12px;
            left: 12px;
            background: rgba(255, 255, 255, 0.95);
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 10px;
            font-weight: bold;
            color: #071b26;
            display: flex;
            align-items: center;
            gap: 6px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .badge-code .cat {
            color: #7c3aed;
            font-size: 9px;
            text-transform: uppercase;
        }
        .badge-code .cat.band { color: #ea580c; }
        .badge-code .cat.osis { color: #0284c7; }
        .badge-code .cat.rohis { color: #059669; }

        .btn-fav {
            position: absolute;
            bottom: 12px;
            left: 12px;
            width: 30px;
            height: 30px;
            background: rgba(255,255,255,0.9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            border: none;
            cursor: pointer;
        }

        .card-body {
            padding: 16px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .item-title {
            font-size: 14px;
            font-weight: bold;
            color: #1e293b;
            margin-bottom: 4px;
        }
        .item-loc {
            font-size: 11px;
            color: #64748b;
            margin-bottom: 12px;
        }
        .card-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 14px;
        }
        .stock-badge {
            font-size: 11px;
            padding: 4px 10px;
            border-radius: 20px;
            font-weight: 600;
        }
        .stock-badge.ready { background: #d1fae5; color: #047857; }
        .stock-badge.busy { background: #fee2e2; color: #dc2626; }
        .condition {
            font-size: 10px;
            color: #94a3b8;
        }

        .btn-action {
            width: 100%;
            background-color: #00897b;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            display: block;
            transition: 0.2s;
        }
        .btn-action:hover { background-color: #00796b; }
        .btn-action.disabled {
            background-color: #fff;
            color: #334155;
            border: 1px solid #cbd5e1;
        }
    </style>
</head>
<body>

    <!-- Sidebar Kiri -->
    <aside>
        <div>
            <div class="brand">SIMPATI</div>
            <div class="menu-label">Ruang Siswa</div>
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
            Bantuan sarpras • ekstensi 102<br>
            SIMPATI v1.4
        </div>
    </aside>

    <!-- Konten Utama -->
    <main>
        <header>
            <div>
                <div class="title-sub">SISTEM INVENTARIS SEKOLAH</div>
                <h1>Katalog alat</h1>
            </div>
            <div class="user-badge">
                <span class="dot"></span>
                <span>Nadia Putri</span>
            </div>
        </header>

        <div class="breadcrumb">Beranda / Katalog alat</div>

        <div class="title-section">
            <div>
                <h2>Temukan alat untuk kegiatanmu</h2>
                <p>196 unit inventaris dari 4 kategori ekskul.</p>
            </div>
            <div class="view-toggle">
                <button class="btn-toggle active">☰</button>
                <button class="btn-toggle">☷</button>
            </div>
        </div>

        <!-- Filter & Search Bar -->
        <div class="filter-card">
            <div class="filter-top">
                <div class="search-box">
                    <span>🔍</span>
                    <input type="text" placeholder="Cari nama, kode inventaris, atau lokasi...">
                </div>
                <div class="toggle-available">
                    <span>Hanya tersedia</span>
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider"></span>
                    </label>
                </div>
                <button class="btn-filter">
                    <span>⚙️</span> Filter lainnya
                </button>
            </div>

            <div class="filter-tags">
                <div class="tags-group">
                    <a href="#" class="tag active">Semua alat · 106</a>
                    <a href="#" class="tag">Rohis · 32</a>
                    <a href="#" class="tag">Band · 48</a>
                    <a href="#" class="tag">OSIS · 66</a>
                    <a href="#" class="tag">Multimedia · 41</a>
                </div>
                <div class="tag-info">Menampilkan 1-6 dari 106 alat</div>
            </div>
        </div>

        <!-- Catalog Grid -->
        <div class="catalog-grid">
            
            <!-- Item 1 -->
            <div class="item-card">
                <div class="card-img-wrapper">
                    <div class="placeholder-text">Kamera Sony</div>
                    <div class="badge-code">
                        <span>MM-CAM-014</span>
                        <span class="cat">MULTIMEDIA</span>
                    </div>
                    <button class="btn-fav">♡</button>
                </div>
                <div class="card-body">
                    <div>
                        <div class="item-title">Kamera Sony Alpha A6400</div>
                        <div class="item-loc">📍 Ruang Multimedia</div>
                    </div>
                    <div>
                        <div class="card-meta">
                            <span class="stock-badge ready">• 3 tersedia</span>
                            <span class="condition">Kondisi baik</span>
                        </div>
                        <a href="#" class="btn-action">Lihat detail</a>
                    </div>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="item-card">
                <div class="card-img-wrapper">
                    <div class="placeholder-text">Mikrofon Shure</div>
                    <div class="badge-code">
                        <span>BND-MIC-082</span>
                        <span class="cat band">BAND</span>
                    </div>
                    <button class="btn-fav">♡</button>
                </div>
                <div class="card-body">
                    <div>
                        <div class="item-title">Mikrofon Wireless Shure</div>
                        <div class="item-loc">📍 Studio Musik</div>
                    </div>
                    <div>
                        <div class="card-meta">
                            <span class="stock-badge ready">• 5 tersedia</span>
                            <span class="condition">Kondisi baik</span>
                        </div>
                        <a href="#" class="btn-action">Lihat detail</a>
                    </div>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="item-card">
                <div class="card-img-wrapper">
                    <div class="placeholder-text">Speaker JBL</div>
                    <div class="badge-code">
                        <span>OS-SPK-005</span>
                        <span class="cat osis">OSIS</span>
                    </div>
                    <button class="btn-fav">♡</button>
                </div>
                <div class="card-body">
                    <div>
                        <div class="item-title">Portable Speaker JBL EON</div>
                        <div class="item-loc">📍 Gudang Aula</div>
                    </div>
                    <div>
                        <div class="card-meta">
                            <span class="stock-badge ready">• 2 tersedia</span>
                            <span class="condition">Kondisi baik</span>
                        </div>
                        <a href="#" class="btn-action">Lihat detail</a>
                    </div>
                </div>
            </div>

            <!-- Item 4 -->
            <div class="item-card">
                <div class="card-img-wrapper">
                    <div class="placeholder-text">Karpet Masjid</div>
                    <div class="badge-code">
                        <span>RH-KRP-011</span>
                        <span class="cat rohis">ROHIS</span>
                    </div>
                    <button class="btn-fav">♡</button>
                </div>
                <div class="card-body">
                    <div>
                        <div class="item-title">Karpet Masjid 3 × 5 m</div>
                        <div class="item-loc">📍 Sekretariat Rohis</div>
                    </div>
                    <div>
                        <div class="card-meta">
                            <span class="stock-badge ready">• 4 tersedia</span>
                            <span class="condition">Kondisi baik</span>
                        </div>
                        <a href="#" class="btn-action">Lihat detail</a>
                    </div>
                </div>
            </div>

            <!-- Item 5 -->
            <div class="item-card">
                <div class="card-img-wrapper">
                    <div class="placeholder-text">Tripod Manfrotto</div>
                    <div class="badge-code">
                        <span>MM-TRP-021</span>
                        <span class="cat">MULTIMEDIA</span>
                    </div>
                    <button class="btn-fav">♡</button>
                </div>
                <div class="card-body">
                    <div>
                        <div class="item-title">Tripod Video Manfrotto</div>
                        <div class="item-loc">📍 Ruang Multimedia</div>
                    </div>
                    <div>
                        <div class="card-meta">
                            <span class="stock-badge ready">• 6 tersedia</span>
                            <span class="condition">Kondisi baik</span>
                        </div>
                        <a href="#" class="btn-action">Lihat detail</a>
                    </div>
                </div>
            </div>

            <!-- Item 6 -->
            <div class="item-card">
                <div class="card-img-wrapper">
                    <div class="placeholder-text">Mixer Yamaha</div>
                    <div class="badge-code">
                        <span>BND-MIX-004</span>
                        <span class="cat band">BAND</span>
                    </div>
                    <button class="btn-fav">♡</button>
                </div>
                <div class="card-body">
                    <div>
                        <div class="item-title">Mixer Audio Yamaha MG10</div>
                        <div class="item-loc">📍 Studio Musik</div>
                    </div>
                    <div>
                        <div class="card-meta">
                            <span class="stock-badge busy">• Sedang dipinjam</span>
                            <span class="condition">Kondisi baik</span>
                        </div>
                        <a href="#" class="btn-action disabled">Lihat jadwal</a>
                    </div>
                </div>
            </div>

        </div>
    </main>

</body>
</html>