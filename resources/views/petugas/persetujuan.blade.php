<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Persetujuan Peminjaman - Petugas</title>
</head>
<body style="font-family: Arial, sans-serif; padding: 20px; background-color: #f4f6f9;">
    <h2>Daftar Persetujuan & Verifikasi Peminjaman</h2>
    <a href="{{ route('petugas.dashboard') }}">&laquo; Kembali ke Dashboard Petugas</a>
    <hr>

    @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div style="background: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
            {{ session('error') }}
        </div>
    @endif

    <div style="background: white; padding: 20px; border-radius: 8px;">
        <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse;">
            <tr style="background: #eee;">
                <th>No</th>
                <th>Nama Peminjam</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Tgl Pinjam</th>
                <th>Status Saat Ini</th>
                <th>Aksi / Ubah Status</th>
            </tr>
            @forelse($borrowings as $index => $b)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $b->nama_peminjam }}</td>
                <td>{{ $b->item->nama_barang ?? '-' }}</td>
                <td>{{ $b->jumlah }}</td>
                <td>{{ $b->tanggal_pinjam }}</td>
                <td>
                    @if($b->status == 'pending') <span style="color: orange; font-weight: bold;">Pending</span>
                    @elseif($b->status == 'disetujui') <span style="color: green; font-weight: bold;">Disetujui</span>
                    @elseif($b->status == 'ditolak') <span style="color: red; font-weight: bold;">Ditolak</span>
                    @else <span style="color: gray; font-weight: bold;">Dikembalikan</span>
                    @endif
                </td>
                <td>
                    <form action="{{ route('petugas.persetujuan.update', $b->id) }}" method="POST" style="display: flex; gap: 5px; align-items: center;">
                        @csrf
                        @method('PUT')
                        <select name="status" style="padding: 5px;">
                            <option value="pending" {{ $b->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="disetujui" {{ $b->status == 'disetujui' ? 'selected' : '' }}>Setujui</option>
                            <option value="ditolak" {{ $b->status == 'ditolak' ? 'selected' : '' }}>Tolak</option>
                            <option value="dikembalikan" {{ $b->status == 'dikembalikan' ? 'selected' : '' }}>Selesai / Dikembalikan</option>
                        </select>
                        <button type="submit" style="background: #28a745; color: white; border: none; padding: 6px 10px; border-radius: 4px; cursor: pointer;">Simpan</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align: center;">Belum ada pengajuan peminjaman barang.</td>
            </tr>
            @endforelse
        </table>
    </div>
</body>
</html>