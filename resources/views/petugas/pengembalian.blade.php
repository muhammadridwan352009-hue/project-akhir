<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengembalian Inventaris - SIMPATI</title>
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

        /* Area Utama */
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

        /* Title & Badge Header */
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
        .badge-status-group {
            display: flex;
            gap: 8px;
        }
        .pill-count-orange {
            background-color: #ffedd5;
            color: #ea580c;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
        }
        .pill-count-red {
            background-color: #fef2f2;
            color: #ef4444;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
        }

        /* Tab Switcher Bar */
        .tab-switcher {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 6px;
            display: flex;
            gap: 6px;
            margin-bottom: 24px;
        }
        .tab-btn {
            flex: 1;
            text-align: center;
            padding: 10px 12px;
            border-radius: 8px;
            font-size: 12px;
            color: #64748b;
            text-decoration: none;
            font-weight: 600;
            transition: 0.2s;
        }
        .tab-btn.active {
            background-color: #00897b;
            color: #fff;
        }

        /* Main Content Layout Grid */
        .content-grid {
            display: grid;
            grid-template-columns: 320px 1fr;
            gap: 24px;
            align-items: start;
        }

        /* Left Queue Card */
        .queue-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
        }
        .queue-header {
            font-size: 14px;
            font-weight: bold;
            color: #1e293b;
            margin-bottom: 14px;
        }
        .search-box {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 8px 12px;
            font-size: 12px;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .search-box input {
            border: none;
            background: transparent;
            outline: none;
            width: 100%;
            font-size: 12px;
        }

        /* Queue List Items */
        .queue-item {
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 14px;
            margin-bottom: 10px;
            cursor: pointer;
            transition: 0.2s;
            background: #fff;
        }
        .queue-item.active {
            border-color: #10b981;
            background-color: #e6f4ea;
        }
        .queue-item:hover:not(.active) {
            background-color: #f8fafc;
        }
        .queue-user-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 6px;
        }
        .queue-user-name {
            font-size: 13px;
            font-weight: 700;
            color: #071b26;
        }
        .queue-date-danger {
            font-size: 10px;
            font-weight: 700;
            color: #ef4444;
        }
        .queue-date-muted {
            font-size: 10px;
            font-weight: 700;
            color: #64748b;
        }
        .queue-item-desc {
            font-size: 11px;
            color: #64748b;
            margin-bottom: 8px;
        }

        /* Badge Code */
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
        .badge-code .cat.osis { color: #0284c7; }
        .badge-code .cat.rohis { color: #059669; }

        /* Right Detail Card */
        .detail-panel {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
        }
        .detail-top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 6px;
        }
        .req-id {
            font-size: 11px;
            font-weight: bold;
            color: #00897b;
            letter-spacing: 0.5px;
        }
        .status-pill-red {
            background-color: #fef2f2;
            color: #ef4444;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 10px;
            font-weight: 700;
        }
        .detail-title {
            font-size: 18px;
            font-weight: 800;
            color: #071b26;
            margin-bottom: 20px;
        }

        /* Profile & Item Summary Grid */
        .summary-box-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-bottom: 20px;
        }
        .summary-card-inner {
            background-color: #f8fafc;
            border: 1px solid #f1f5f9;
            border-radius: 12px;
            padding: 16px;
        }
        .inner-label {
            font-size: 10px;
            color: #94a3b8;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 6px;
        }
        .borrower-name {
            font-size: 14px;
            font-weight: 800;
            color: #071b26;
        }
        .borrower-sub {
            font-size: 11px;
            color: #64748b;
            margin-top: 2px;
        }
        .borrower-stat {
            font-size: 10px;
            color: #ef4444;
            margin-top: 6px;
            font-weight: 600;
        }

        .item-name-large {
            font-size: 13px;
            font-weight: 700;
            color: #1e293b;
            margin-top: 6px;
            margin-bottom: 8px;
        }
        .stock-available-tag {
            font-size: 10px;
            color: #00897b;
            background-color: #e6f4ea;
            padding: 3px 8px;
            border-radius: 6px;
            font-weight: bold;
            display: inline-block;
        }

        /* Metadata Info Cards 3 Columns */
        .meta-info-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            margin-bottom: 20px;
        }
        .meta-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 12px;
        }
        .meta-card .label { font-size: 10px; color: #94a3b8; margin-bottom: 4px; }
        .meta-card .val { font-size: 11px; font-weight: 700; color: #1e293b; }

        /* Notes & Penalty Box */
        .note-penalty-box {
            background-color: #fffbeb;
            border: 1px solid #fef3c7;
            border-radius: 10px;
            padding: 14px;
            font-size: 11px;
            color: #92400e;
            margin-bottom: 20px;
            line-height: 1.5;
        }
        .note-penalty-box strong { display: block; font-size: 10px; text-transform: uppercase; margin-bottom: 4px; color: #d97706; }

        /* Condition Checklist */
        .verify-list {
            display: flex;
            gap: 12px;
            margin-bottom: 24px;
        }
        .verify-item {
            flex: 1;
            background-color: #f0fdf4;
            border: 1px solid #bbf7d0;
            padding: 8px 12px;
            border-radius: 8px;
            font-size: 11px;
            color: #166534;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        /* Action Footer Buttons */
        .action-footer-grid {
            display: grid;
            grid-template-columns: 140px 140px 1fr;
            gap: 12px;
            padding-top: 16px;
            border-top: 1px solid #f1f5f9;
            margin-bottom: 20px;
        }
        .btn-damage {
            background-color: #ef4444;
            color: #fff;
            border: none;
            padding: 12px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
        }
        .btn-note-damage {
            background: #fff;
            border: 1px solid #cbd5e1;
            color: #334155;
            padding: 12px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
        }
        .btn-confirm-return {
            background-color: #00897b;
            color: #fff;
            border: none;
            padding: 12px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
        }

        /* Fine Calculator Bar Bottom */
        .fine-bar {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 14px 18px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .fine-text {
            font-size: 11px;
            color: #64748b;
        }
        .btn-fine-calc {
            background-color: #fff;
            border: 1px solid #cbd5e1;
            color: #071b26;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <!-- Sidebar Kiri -->
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

    <!-- Area Utama -->
    <main>
        <header>
            <div>
                <div class="title-sub">SISTEM INVENTARIS SEKOLAH</div>
                <h1>Pengembalian inventaris</h1>
            </div>
            <div class="user-badge">
                <span class="dot"></span>
                <span>Rizky Maulana</span>
            </div>
        </header>

        <div class="breadcrumb">Dashboard / <strong>Pengembalian inventaris</strong></div>

        <div class="title-section">
            <div>
                <h2>Pengembalian inventaris</h2>
                <p>Catat barang kembali, kondisi, dan denda keterlambatan.</p>
            </div>
            <div class="badge-status-group">
                <span class="pill-count-orange">• 5 menunggu</span>
                <span class="pill-count-red">• 3 terlambat</span>
            </div>
        </div>

        <!-- Tab Switcher -->
        <div class="tab-switcher">
            <a href="#" class="tab-btn active">Belum dikembalikan - 5</a>
            <a href="#" class="tab-btn">Sudah dikembalikan - 23</a>
        </div>

        <!-- Main Content Grid -->
        <div class="content-grid">
            
            <!-- Antrean Pengembalian (Kiri) -->
            <div class="queue-card">
                <div class="queue-header">Antrean pengembalian</div>
                <div class="search-box">
                    <span>🔍</span>
                    <input type="text" placeholder="Cari peminjam atau alat...">
                </div>

                <!-- Item 1 (Selected) -->
                <div class="queue-item active">
                    <div class="queue-user-top">
                        <span class="queue-user-name">Nadia Putri</span>
                        <span class="queue-date-danger">• Terlambat 1 hari</span>
                    </div>
                    <div class="queue-item-desc">Kamera Sony A6400</div>
                    <div class="badge-code">
                        <span>MM-CAM-014</span>
                        <span class="cat">MULTIMEDIA</span>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="queue-item">
                    <div class="queue-user-top">
                        <span class="queue-user-name">Farhan Akbar</span>
                        <span class="queue-date-muted">• Hari ini</span>
                    </div>
                    <div class="queue-item-desc">Portable Speaker JBL</div>
                    <div class="badge-code">
                        <span>OS-SPK-005</span>
                        <span class="cat osis">OSIS</span>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="queue-item">
                    <div class="queue-user-top">
                        <span class="queue-user-name">Alya Zahra</span>
                        <span class="queue-date-muted">• Besok</span>
                    </div>
                    <div class="queue-item-desc">Karpet Masjid 3×5 m</div>
                    <div class="badge-code">
                        <span>RH-KRP-011</span>
                        <span class="cat rohis">ROHIS</span>
                    </div>
                </div>
            </div>

            <!-- Detail Pengembalian (Kanan) -->
            <div class="detail-panel">
                <div class="detail-top-bar">
                    <span class="req-id">RET-2026025-019</span>
                    <span class="status-pill-red">• Terlambat 1 hari</span>
                </div>
                <div class="detail-title">Detail pengembalian</div>

                <!-- Profile & Item Summary Grid -->
                <div class="summary-box-grid">
                    <div class="summary-card-inner">
                        <div class="inner-label">Peminjam</div>
                        <div class="borrower-name">Nadia Putri</div>
                        <div class="borrower-sub">XI IPS 2 • NIS 221045</div>
                        <div class="borrower-sub" style="font-weight: 600;">Koordinator Multimedia</div>
                        <div class="borrower-stat">12× tepat waktu • 1 keterlambatan</div>
                    </div>

                    <div class="summary-card-inner">
                        <div class="inner-label">Barang Dikembalikan</div>
                        <div class="badge-code">
                            <span>MM-CAM-014</span>
                            <span class="cat">MULTIMEDIA</span>
                        </div>
                        <div class="item-name-large">Kamera Sony Alpha A6400</div>
                        <div class="stock-available-tag">• Menunggu pemeriksaan</div>
                    </div>
                </div>

                <!-- Metadata Grid -->
                <div class="meta-info-grid">
                    <div class="meta-card">
                        <div class="label">Tanggal Pinjam</div>
                        <div class="val">25 Sep 2026 • 08.00</div>
                    </div>
                    <div class="meta-card">
                        <div class="label">Batas Kembali</div>
                        <div class="val">25 Sep 2026 • 15.00</div>
                    </div>
                    <div class="meta-card">
                        <div class="label">Tanggal Kembali</div>
                        <div class="val">26 Sep 2026 • 10.15</div>
                    </div>
                </div>

                <!-- Notes & Penalty Box -->
                <div class="note-penalty-box">
                    <strong>Catatan & Denda Keterlambatan</strong>
                    Barang diterima kembali dalam kondisi baik dan lengkap. Terlambat 1 hari — denda Rp5.000. Setelah dikonfirmasi, stok otomatis bertambah dan denda tersimpan.
                </div>

                <!-- Condition Checklist -->
                <div class="verify-list">
                    <div class="verify-item">
                        <span>✓</span> Kondisi fisik baik
                    </div>
                    <div class="verify-item">
                        <span>✓</span> Aksesori lengkap
                    </div>
                    <div class="verify-item">
                        <span>✓</span> Kebersihan baik
                    </div>
                </div>

                <!-- Action Footer Buttons -->
                <div class="action-footer-grid">
                    <button class="btn-damage">✖ Tandai rusak</button>
                    <button class="btn-note-damage">Catat kerusakan</button>
                    <button class="btn-confirm-return">✓ Konfirmasi pengembalian</button>
                </div>

                <!-- Fine Calculator Bar Bottom -->
                <div class="fine-bar">
                    <div class="fine-text">
                        🔄 Setelah dikonfirmasi, stok otomatis bertambah dan denda keterlambatan tersimpan.
                    </div>
                    <button class="btn-fine-calc">Hitung & simpan denda</button>
                </div>

            </div>

        </div>
    </main>

</body>
</html>