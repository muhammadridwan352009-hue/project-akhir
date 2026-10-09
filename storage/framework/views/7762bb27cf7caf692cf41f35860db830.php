<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Siswa - SIMPATI</title>
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
            min-height: 100vh;
            display: flex;
        }
        .container {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }
        .panel-left {
            width: 45%;
            background-color: #071b26;
            color: #fff;
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
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
        }
        .badge-sub {
            background: rgba(16, 185, 129, 0.2);
            color: #34d399;
            font-size: 11px;
            padding: 4px 10px;
            border-radius: 6px;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 16px;
        }
        .panel-left h1 {
            font-size: 28px;
            line-height: 1.3;
            margin-bottom: 16px;
            font-weight: 600;
            font-style: italic;
        }
        .panel-left p {
            font-size: 13px;
            color: #a0aec0;
        }
        .footer-left {
            font-size: 12px;
            color: #718096;
        }
        .panel-right {
            width: 55%;
            background-color: #f4f6f8;
            padding: 40px 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .form-wrapper {
            width: 100%;
            max-width: 420px;
        }
        .back-link {
            font-size: 12px;
            color: #718096;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 24px;
        }
        .back-link:hover { color: #1a202c; }
        .card-form {
            background: #fff;
            border: 1px solid #e2e8f0;
            padding: 32px;
            border-radius: 16px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
        }
        .card-form h2 {
            font-size: 22px;
            color: #1a202c;
            margin-bottom: 6px;
            font-weight: bold;
        }
        .card-form p {
            font-size: 12px;
            color: #718096;
            margin-bottom: 24px;
        }
        .form-group {
            margin-bottom: 16px;
        }
        .form-group label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 6px;
        }
        .form-control {
            width: 100%;
            padding: 12px 14px;
            font-size: 13px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            outline: none;
            transition: 0.2s;
        }
        .form-control:focus {
            border-color: #00897b;
            box-shadow: 0 0 0 3px rgba(0,137,123,0.1);
        }
        .form-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
            color: #718096;
            margin-bottom: 20px;
        }
        .form-row a { color: #00897b; text-decoration: none; }
        .form-row a:hover { text-decoration: underline; }
        .btn-submit {
            width: 100%;
            background-color: #00897b;
            color: #fff;
            border: none;
            padding: 12px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }
        .btn-submit:hover {
            background-color: #00796b;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Panel Kiri -->
        <div class="panel-left">
            <div>
                <div class="brand">SIMPATI</div>
            </div>
            <div>
                <span class="badge-sub">AKSES SISWA • SMK NEGERI 5 SURAKARTA</span>
                <h1>"Persiapan kegiatan lebih ringan saat semua alat jelas keberadaannya."</h1>
                <p>Naka • Koordinator Multimedia</p>
            </div>
            <div class="footer-left">
                Portal Inventaris Sarpras & Prasarana
            </div>
        </div>

        <!-- Panel Kanan -->
        <div class="panel-right">
            <div class="form-wrapper">
                <a href="<?php echo e(url('/')); ?>" class="back-link">‹ Kembali pilih peran</a>

                <div class="card-form">
                    <h2>Masuk sebagai Siswa</h2>
                    <p>Gunakan akun sekolah untuk mulai meminjam alat.</p>

                    <form action="<?php echo e(route('siswa.beranda')); ?>" method="GET">
                        <div class="form-group">
                            <label>NIS atau email sekolah</label>
                            <input type="text" placeholder="Contoh: 33189 atau siswa@smkn5surakarta.id" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Kata sandi</label>
                            <input type="password" placeholder="••••••••••••••" class="form-control" required>
                        </div>

                        <div class="form-row">
                            <label style="display: flex; align-items: center; gap: 6px; cursor: pointer;">
                                <input type="checkbox" style="accent-color: #00897b;"> Ingat saya
                            </label>
                            <a href="#">Lupa kata sandi?</a>
                        </div>

                        <button type="submit" class="btn-submit">🚀 Masuk ke SIMPATI</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html><?php /**PATH C:\xampp7\htdocs\simpati\resources\views/auth/login-siswa.blade.php ENDPATH**/ ?>