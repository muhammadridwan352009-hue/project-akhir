<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // Read: Menampilkan daftar barang
    public function index()
    {
        $items = Item::with('category')->latest()->get();
        return view('petugas.inventaris.index', compact('items'));
    }

    // Create: Form tambah barang
    public function create()
    {
        $categories = Category::all();
        return view('petugas.inventaris.create', compact('categories'));
    }

    // Store: Validasi & Simpan data barang baru
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'kode_barang' => 'required|string|max:20|unique:items,kode_barang',
            'nama_barang' => 'required|string|max:255',
            'stok'        => 'required|integer|min:0',
            'kondisi'     => 'required|in:baik,rusak_ringan,rusak_berat',
        ], [
            'category_id.required' => 'Kategori wajib dipilih.',
            'kode_barang.unique'   => 'Kode barang sudah terdaftar.',
            'nama_barang.required' => 'Nama barang wajib diisi.',
            'stok.min'             => 'Stok minimal bernilai 0.',
        ]);

        Item::create($request->all());

        return redirect()->route('petugas.inventaris.index')
                         ->with('success', 'Data barang berhasil ditambahkan!');
    }

    // Edit: Form edit barang
    public function edit(Item $item)
    {
        $categories = Category::all();
        return view('petugas.inventaris.edit', compact('item', 'categories'));
    }

    // Update: Validasi & Perbarui data barang
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'kode_barang' => 'required|string|max:20|unique:items,kode_barang,' . $item->id,
            'nama_barang' => 'required|string|max:255',
            'stok'        => 'required|integer|min:0',
            'kondisi'     => 'required|in:baik,rusak_ringan,rusak_berat',
        ]);

        $item->update($request->all());

        return redirect()->route('petugas.inventaris.index')
                         ->with('success', 'Data barang berhasil diperbarui!');
    }

    // Delete: Hapus data barang
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('petugas.inventaris.index')
                         ->with('success', 'Data barang berhasil dihapus!');
    }
}