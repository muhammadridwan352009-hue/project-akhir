<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Alat - SIMPATI</title>
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
            background-color: #10b981;
            border-radius: 50%;
        }
        .breadcrumb {
            font-size: 12px;
            color: #718096;
            margin-bottom: 24px;
        }

        /* Layout Detail Utama */
        .detail-grid {
            display: grid;
            grid-template-columns: 1fr 340px;
            gap: 24px;
            align-items: start;
        }

        /* Section Kiri */
        .left-content {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        /* Card Banner Atas */
        .item-main-card {
            background: #fff;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            padding: 24px;
            display: grid;
            grid-template-columns: 320px 1fr;
            gap: 24px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
        }
        .img-container {
            position: relative;
            width: 100%;
            height: 220px;
            background: #2d3748;
            border-radius: 12px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #a0aec0;
            font-weight: bold;
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
        }
        .badge-code .cat { color: #7c3aed; font-size: 9px; }
        .page-indicator {
            position: absolute;
            top: 12px;
            right: 12px;
            background: rgba(0, 0, 0, 0.5);
            color: #fff;
            padding: 2px 8px;
            border-radius: 10px;
            font-size: 10px;
        }

        .info-header {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .status-pill {
            font-size: 11px;
            color: #059669;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            margin-bottom: 6px;
        }
        .item-title-large {
            font-size: 22px;
            font-weight: 800;
            color: #071b26;
            margin-bottom: 8px;
            line-height: 1.2;
        }
        .item-description {
            font-size: 12px;
            color: #64748b;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .quick-specs {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }
        .spec-box {
            background: #f8fafc;
            border: 1px solid #f1f5f9;
            border-radius: 10px;
            padding: 10px;
            font-size: 11px;
        }
        .spec-box .label { color: #94a3b8; margin-bottom: 2px; }
        .spec-box .value { font-weight: bold; color: #1e293b; }

        /* Grid Spesifikasi & Aturan */
        .bottom-cards-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        .card-box {
            background: #fff;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            padding: 20px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
        }
        .card-box-title {
            font-size: 14px;
            font-weight: bold;
            color: #1a202c;
            margin-bottom: 16px;
        }

        /* Tabel Spesifikasi */
        .spec-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }
        .spec-table tr {
            border-bottom: 1px solid #f1f5f9;
        }
        .spec-table tr:last-child {
            border-bottom: none;
        }
        .spec-table td {
            padding: 8px 0;
            color: #64748b;
        }
        .spec-table td:last-child {
            text-align: right;
            font-weight: 600;
            color: #1e293b;
        }

        /* List Aturan */
        .rule-list {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        .rule-list li {
            font-size: 12px;
            color: #475569;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .rule-list li span.check {
            color: #00897b;
            font-weight: bold;
        }

        /* Section Kanan Widget Form */
        .booking-card {
            background: #fff;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
        }
        .booking-card h3 {
            font-size: 16px;
            font-weight: bold;
            color: #1a202c;
            margin-bottom: 4px;
        }
        .booking-card p.sub {
            font-size: 11px;
            color: #718096;
            margin-bottom: 16px;
        }

        /* Calendar Mockup */
        .calendar-box {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 14px;
            margin-bottom: 16px;
        }
        .cal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
            font-weight: bold;
            color: #1e293b;
            margin-bottom: 12px;
        }
        .cal-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 4px;
            text-align: center;
            font-size: 10px;
        }
        .cal-day-label {
            color: #94a3b8;
            font-weight: 600;
            padding-bottom: 4px;
        }
        .cal-date {
            padding: 8px 0;
            border-radius: 6px;
            color: #334155;
            font-weight: 500;
            cursor: pointer;
        }
        .cal-date.selected {
            background-color: #00897b;
            color: #fff;
            font-weight: bold;
        }
        .cal-date.active-range {
            background-color: #e6f4ea;
            color: #00897b;
            font-weight: bold;
        }
        .cal-note {
            font-size: 10px;
            color: #64748b;
            margin-top: 8px;
            text-align: center;
        }

        /* Time Selection Input Box */
        .time-box {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 10px 14px;
            font-size: 11px;
            color: #475569;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .time-box strong { color: #1e293b; }

        .status-alert-green {
            background-color: #e6f4ea;
            color: #00695c;
            padding: 10px 12px;
            border-radius: 8px;
            font-size: 11px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 16px;
        }

        .btn-submit-booking {
            width: 100%;
            background-color: #00897b;
            color: #fff;
            border: none;
            padding: 12px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            margin-bottom: 10px;
            transition: 0.2s;
        }
        .btn-submit-booking:hover { background-color: #00796b; }

        .btn-fav-secondary {
            width: 100%;
            background: #fff;
            border: 1px solid #cbd5e1;
            padding: 10px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 600;
            color: #475569;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
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
                <h1>Detail alat</h1>
            </div>
            <div class="user-badge">
                <span class="dot"></span>
                <span>Nadia Putri</span>
            </div>
        </header>

        <div class="breadcrumb">Beranda / Katalog alat / <strong>Kamera Sony Alpha A6400</strong></div>

        <div class="detail-grid">
            
            <!-- Kolom Kiri -->
            <div class="left-content">
                
                <!-- Main Product Display -->
                <div class="item-main-card">
                    <div class="img-container">
                        [ Gambar Kamera Sony ]
                        <div class="badge-code">
                            <span>MM-CAM-014</span>
                            <span class="cat">MULTIMEDIA</span>
                        </div>
                        <div class="page-indicator">1 / 4</div>
                    </div>

                    <div class="info-header">
                        <div>
                            <div class="status-pill">● Tersedia</div>
                            <div class="item-title-large">Kamera Sony Alpha A6400</div>
                            <div class="item-description">
                                Kamera mirrorless untuk dokumentasi kegiatan sekolah, produksi video, dan liputan acara.
                            </div>
                        </div>

                        <div class="quick-specs">
                            <div class="spec-box">
                                <div class="label">Stok</div>
                                <div class="value">3 dari 5 unit</div>
                            </div>
                            <div class="spec-box">
                                <div class="label">Kondisi</div>
                                <div class="value">Baik</div>
                            </div>
                            <div class="spec-box">
                                <div class="label">Lokasi</div>
                                <div class="value">Ruang Multimedia</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Spesifikasi & Aturan -->
                <div class="bottom-cards-grid">
                    
                    <!-- Tabel Spesifikasi -->
                    <div class="card-box">
                        <div class="card-box-title">Spesifikasi & kelengkapan</div>
                        <table class="spec-table">
                            <tr>
                                <td>Sensor</td>
                                <td>APS-C 24.2 MP</td>
                            </tr>
                            <tr>
                                <td>Lensa</td>
                                <td>16-50 mm f/3.5</td>
                            </tr>
                            <tr>
                                <td>Video</td>
                                <td>4K UHD</td>
                            </tr>
                            <tr>
                                <td>Kelengkapan</td>
                                <td>Baterai, charger, tas, strap</td>
                            </tr>
                        </table>
                    </div>

                    <!-- Aturan Peminjaman -->
                    <div class="card-box">
                        <div class="card-box-title">Aturan peminjaman</div>
                        <ul class="rule-list">
                            <li><span class="check">✓</span> Maksimal peminjaman 3 hari.</li>
                            <li><span class="check">✓</span> Wajib didampingi koordinator ekskul.</li>
                            <li><span class="check">✓</span> Periksa baterai dan lensa saat pengambilan.</li>
                            <li><span class="check">✓</span> Kerusakan wajib dilaporkan maksimal 2 jam.</li>
                        </ul>
                    </div>

                </div>

            </div>

            <!-- Kolom Kanan: Pemilih Tanggal -->
            <div class="booking-card">
                <h3>Pilih tanggal peminjaman</h3>
                <p class="sub">Tanggal hijau tersedia. Maksimal 3 hari berturut-turut.</p>

                <!-- Kalender Minimalis -->
                <div class="calendar-box">
                    <div class="cal-header">
                        <span>‹</span>
                        <span>September 2026</span>
                        <span>›</span>
                    </div>
                    <div class="cal-grid">
                        <div class="cal-day-label">Sen</div>
                        <div class="cal-day-label">Sel</div>
                        <div class="cal-day-label">Rab</div>
                        <div class="cal-day-label">Kam</div>
                        <div class="cal-day-label">Jum</div>
                        <div class="cal-day-label">Sab</div>
                        <div class="cal-day-label">Min</div>

                        <div class="cal-date">21</div>
                        <div class="cal-date">22</div>
                        <div class="cal-date">23</div>
                        <div class="cal-date active-range">24</div>
                        <div class="cal-date selected">25</div>
                        <div class="cal-date selected">26</div>
                        <div class="cal-date">27</div>
                    </div>
                    <div class="cal-note">25–26 Sep sudah dipilih (Maksimal 3 hari).</div>
                </div>

                <!-- Rentang Waktu -->
                <div class="time-box">
                    <span>Mulai</span>
                    <strong>Jum, 25 Sep 2026 - 08.00</strong>
                </div>

                <div class="time-box">
                    <span>Selesai</span>
                    <strong>Sab, 26 Sep 2026 - 15.00</strong>
                </div>

                <div class="status-alert-green">
                    <span>✓</span> 3 unit tersedia pada rentang ini.
                </div>

                <button class="btn-submit-booking">↗ Ajukan peminjaman</button>
                <button class="btn-fav-secondary">♡ Simpan ke favorit</button>
            </div>

        </div>
    </main>

</body>
</html>