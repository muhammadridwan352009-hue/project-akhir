<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Inventaris - SIMPATI</title>
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

        /* Main Area */
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

        /* Title & Action Section */
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
            font-size: 13px;
            color: #718096;
            margin-top: 2px;
        }
        .action-buttons {
            display: flex;
            gap: 10px;
        }
        .btn-secondary {
            background: #fff;
            border: 1px solid #cbd5e1;
            color: #334155;
            padding: 10px 16px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: 0.2s;
        }
        .btn-secondary:hover { background: #f8fafc; }
        .btn-primary {
            background-color: #00897b;
            color: #fff;
            padding: 10px 18px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: 0.2s;
        }
        .btn-primary:hover { background-color: #00796b; }

        /* Filter Bar */
        .filter-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 14px 18px;
            margin-bottom: 20px;
            display: flex;
            gap: 12px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
        }
        .search-box {
            flex: 1;
            display: flex;
            align-items: center;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 8px 14px;
            gap: 8px;
        }
        .search-box input {
            border: none;
            background: transparent;
            width: 100%;
            outline: none;
            font-size: 13px;
            color: #333;
        }
        .select-filter {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 8px 12px;
            font-size: 12px;
            color: #475569;
            outline: none;
            cursor: pointer;
        }

        /* Table Container */
        .table-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }
        thead {
            background-color: #071b26;
            color: #fff;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        th, td {
            padding: 16px 20px;
            vertical-align: middle;
        }
        tbody tr {
            border-bottom: 1px solid #f1f5f9;
            transition: 0.2s;
        }
        tbody tr:last-child { border-bottom: none; }
        tbody tr:hover { background-color: #f8fafc; }

        /* Table Components */
        .item-details strong {
            display: block;
            font-size: 13px;
            color: #071b26;
            margin-bottom: 4px;
        }
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

        .stock-text {
            font-size: 13px;
            font-weight: bold;
            color: #1e293b;
        }

        .status-pill {
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }
        .status-pill.baik { background-color: #d1fae5; color: #059669; }
        .status-pill.cek { background-color: #fef3c7; color: #d97706; }
        .status-pill.dipakai { background-color: #ffedd5; color: #ea580c; }

        .location-text {
            font-size: 12px;
            color: #64748b;
        }

        .action-cell {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 12px;
        }
        .btn-edit {
            background: none;
            border: none;
            font-size: 12px;
            color: #64748b;
            cursor: pointer;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 4px;
            text-decoration: none;
        }
        .btn-edit:hover { color: #00897b; }
        .more-opt {
            font-size: 14px;
            color: #94a3b8;
            cursor: pointer;
            border: none;
            background: none;
        }

        /* Footer Pagination */
        .table-footer {
            padding: 16px 20px;
            background-color: #fff;
            border-top: 1px solid #f1f5f9;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
            color: #64748b;
        }
        .pagination {
            display: flex;
            gap: 6px;
            align-items: center;
        }
        .page-link {
            padding: 4px 8px;
            border-radius: 6px;
            color: #64748b;
            text-decoration: none;
            font-weight: 600;
        }
        .page-link.active {
            background-color: #071b26;
            color: #fff;
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

    <!-- Konten Utama -->
    <main>
        <header>
            <div>
                <div class="title-sub">SISTEM INVENTARIS SEKOLAH</div>
                <h1>Manajemen inventaris</h1>
            </div>
            <div class="user-badge">
                <span class="dot"></span>
                <span>Rizky Maulana</span>
            </div>
        </header>

        <div class="breadcrumb">Dashboard / <strong>Inventaris</strong></div>

        <div class="title-section">
            <div>
                <h2>Manajemen inventaris</h2>
                <p>Kelola 284 unit alat dari seluruh organisasi siswa.</p>
            </div>
            <div class="action-buttons">
                <a href="#" class="btn-secondary">
                    <span>↑</span> Impor CSV
                </a>
                <a href="#" class="btn-primary">
                    <span>+</span> Tambah alat
                </a>
            </div>
        </div>

        <!-- Filter Search Bar -->
        <div class="filter-card">
            <div class="search-box">
                <span>🔍</span>
                <input type="text" placeholder="Cari nama atau kode inventaris...">
            </div>
            <select class="select-filter">
                <option>Semua kategori</option>
                <option>Multimedia</option>
                <option>Band</option>
                <option>OSIS</option>
                <option>Rohis</option>
            </select>
            <select class="select-filter">
                <option>Semua kondisi</option>
                <option>Baik</option>
                <option>Perlu cek</option>
                <option>Dipakai</option>
            </select>
            <select class="select-filter">
                <option>Semua lokasi</option>
            </select>
        </div>

        <!-- Table Card -->
        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th style="width: 40px; padding-left: 20px;">
                            <input type="checkbox" style="accent-color: #00897b;">
                        </th>
                        <th>Inventaris</th>
                        <th>Stok</th>
                        <th>Kondisi</th>
                        <th>Lokasi</th>
                        <th style="text-align: right; padding-right: 20px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Row 1 -->
                    <tr>
                        <td style="padding-left: 20px;">
                            <input type="checkbox" style="accent-color: #00897b;">
                        </td>
                        <td>
                            <div class="item-details">
                                <strong>Kamera Sony Alpha A6400</strong>
                                <div class="badge-code">
                                    <span>MM-CAM-014</span>
                                    <span class="cat">MULTIMEDIA</span>
                                </div>
                            </div>
                        </td>
                        <td><span class="stock-text">3 / 5</span></td>
                        <td><span class="status-pill baik">• Baik</span></td>
                        <td><span class="location-text">Ruang Multimedia</span></td>
                        <td>
                            <div class="action-cell">
                                <a href="#" class="btn-edit">✏️ Edit</a>
                                <button class="more-opt">••</button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 2 -->
                    <tr>
                        <td style="padding-left: 20px;">
                            <input type="checkbox" style="accent-color: #00897b;">
                        </td>
                        <td>
                            <div class="item-details">
                                <strong>Mikrofon Wireless Shure</strong>
                                <div class="badge-code">
                                    <span>BND-MIC-008</span>
                                    <span class="cat band">BAND</span>
                                </div>
                            </div>
                        </td>
                        <td><span class="stock-text">5 / 8</span></td>
                        <td><span class="status-pill baik">• Baik</span></td>
                        <td><span class="location-text">Studio Musik</span></td>
                        <td>
                            <div class="action-cell">
                                <a href="#" class="btn-edit">✏️ Edit</a>
                                <button class="more-opt">••</button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 3 -->
                    <tr>
                        <td style="padding-left: 20px;">
                            <input type="checkbox" style="accent-color: #00897b;">
                        </td>
                        <td>
                            <div class="item-details">
                                <strong>Portable Speaker JBL EON</strong>
                                <div class="badge-code">
                                    <span>OS-SPK-005</span>
                                    <span class="cat osis">OSIS</span>
                                </div>
                            </div>
                        </td>
                        <td><span class="stock-text">2 / 4</span></td>
                        <td><span class="status-pill cek">• Perlu cek</span></td>
                        <td><span class="location-text">Gudang Aula</span></td>
                        <td>
                            <div class="action-cell">
                                <a href="#" class="btn-edit">✏️ Edit</a>
                                <button class="more-opt">••</button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 4 -->
                    <tr>
                        <td style="padding-left: 20px;">
                            <input type="checkbox" style="accent-color: #00897b;">
                        </td>
                        <td>
                            <div class="item-details">
                                <strong>Karpet Masjid 3 × 5 m</strong>
                                <div class="badge-code">
                                    <span>RH-KRP-011</span>
                                    <span class="cat rohis">ROHIS</span>
                                </div>
                            </div>
                        </td>
                        <td><span class="stock-text">4 / 6</span></td>
                        <td><span class="status-pill baik">• Baik</span></td>
                        <td><span class="location-text">Sekretariat Rohis</span></td>
                        <td>
                            <div class="action-cell">
                                <a href="#" class="btn-edit">✏️ Edit</a>
                                <button class="more-opt">••</button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 5 -->
                    <tr>
                        <td style="padding-left: 20px;">
                            <input type="checkbox" style="accent-color: #00897b;">
                        </td>
                        <td>
                            <div class="item-details">
                                <strong>Tripod Video Manfrotto</strong>
                                <div class="badge-code">
                                    <span>MM-TRP-021</span>
                                    <span class="cat">MULTIMEDIA</span>
                                </div>
                            </div>
                        </td>
                        <td><span class="stock-text">6 / 7</span></td>
                        <td><span class="status-pill baik">• Baik</span></td>
                        <td><span class="location-text">Ruang Multimedia</span></td>
                        <td>
                            <div class="action-cell">
                                <a href="#" class="btn-edit">✏️ Edit</a>
                                <button class="more-opt">••</button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 6 -->
                    <tr>
                        <td style="padding-left: 20px;">
                            <input type="checkbox" style="accent-color: #00897b;">
                        </td>
                        <td>
                            <div class="item-details">
                                <strong>Mixer Audio Yamaha MG10</strong>
                                <div class="badge-code">
                                    <span>BND-MIX-004</span>
                                    <span class="cat band">BAND</span>
                                </div>
                            </div>
                        </td>
                        <td><span class="stock-text">0 / 2</span></td>
                        <td><span class="status-pill dipakai">• Dipakai</span></td>
                        <td><span class="location-text">Studio Musik</span></td>
                        <td>
                            <div class="action-cell">
                                <a href="#" class="btn-edit">✏️ Edit</a>
                                <button class="more-opt">••</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Footer Pagination -->
            <div class="table-footer">
                <div>Menampilkan 1-6 dari 284 inventaris</div>
                <div class="pagination">
                    <a href="#" class="page-link">‹</a>
                    <a href="#" class="page-link active">1</a>
                    <a href="#" class="page-link">2</a>
                    <a href="#" class="page-link">3</a>
                    <span>...</span>
                    <a href="#" class="page-link">48</a>
                    <a href="#" class="page-link">›</a>
                </div>
            </div>
        </div>
    </main>

</body>
</html>