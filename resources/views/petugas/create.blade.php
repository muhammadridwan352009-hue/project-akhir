<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Barang - SIMPATI</title>
</head>
<body style="font-family: Arial, sans-serif; padding: 20px; background-color: #f4f6f9;">
    <h2>Tambah Data Barang Baru</h2>
    <a href="{{ route('petugas.inventaris.index') }}">&laquo; Kembali ke Daftar Inventaris</a>
    <hr>

    <form action="{{ route('petugas.inventaris.store') }}" method="POST" style="background: white; padding: 20px; border-radius: 8px; max-width: 500px;">
        @csrf

        <div style="margin-bottom: 15px;">
            <label for="category_id">Kategori Barang:</label><br>
            <select name="category_id" id="category_id" style="width: 100%; padding: 8px; margin-top: 5px;">
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->nama_kategori }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="kode_barang">Kode Barang:</label><br>
            <input type="text" name="kode_barang" id="kode_barang" value="{{ old('kode_barang') }}" style="width: 100%; padding: 8px; margin-top: 5px;">
            @error('kode_barang')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="nama_barang">Nama Barang:</label><br>
            <input type="text" name="nama_barang" id="nama_barang" value="{{ old('nama_barang') }}" style="width: 100%; padding: 8px; margin-top: 5px;">
            @error('nama_barang')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="stok">Stok:</label><br>
            <input type="number" name="stok" id="stok" value="{{ old('stok') }}" style="width: 100%; padding: 8px; margin-top: 5px;">
            @error('stok')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="kondisi">Kondisi:</label><br>
            <select name="kondisi" id="kondisi" style="width: 100%; padding: 8px; margin-top: 5px;">
                <option value="baik" {{ old('kondisi') == 'baik' ? 'selected' : '' }}>Baik</option>
                <option value="rusak_ringan" {{ old('kondisi') == 'rusak_ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                <option value="rusak_berat" {{ old('kondisi') == 'rusak_berat' ? 'selected' : '' }}>Rusak Berat</option>
            </select>
            @error('kondisi')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" style="background: #28a745; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer;">Simpan Data</button>
    </form>
</body>
</html>