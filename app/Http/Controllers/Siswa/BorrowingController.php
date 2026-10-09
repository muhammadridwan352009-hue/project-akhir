<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Borrowing;

class BorrowingController extends Controller
{
    // Menampilkan halaman peminjaman (berisi form dan riwayat sekaligus)
    public function index()
    {
        $items = Item::all();
        $peminjaman = Borrowing::with('item')->latest()->get();
        return view('siswa.peminjaman', compact('items', 'peminjaman'));
    }

    // Jika diakses via /tambah, arahkan juga ke view peminjaman yang sama
    public function create()
    {
        $items = Item::all();
        $peminjaman = Borrowing::with('item')->latest()->get();
        return view('siswa.peminjaman', compact('items', 'peminjaman'));
    }

    // Menyimpan data pengajuan peminjaman
    public function store(Request $request)
    {
        $request->validate([
            'nama_peminjam' => 'required|string|max:255',
            'item_id' => 'required|exists:items,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_pinjam' => 'required|date',
        ]);

        Borrowing::create([
            'nama_peminjam' => $request->nama_peminjam,
            'item_id' => $request->item_id,
            'jumlah' => $request->jumlah,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'status' => 'pending',
        ]);

        return redirect()->route('siswa.peminjaman')->with('success', 'Pengajuan peminjaman berhasil dikirim!');
    }
}