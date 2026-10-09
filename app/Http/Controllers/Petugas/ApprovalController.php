<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrowing;

class ApprovalController extends Controller
{
    // Menampilkan daftar pengajuan masuk untuk diverifikasi petugas
    public function index()
    {
        $borrowings = Borrowing::with('item')->latest()->get();
        return view('petugas.persetujuan', compact('borrowings'));
    }

    // Mengubah status persetujuan (Setujui / Tolak)
    public function updateStatus(Request $request, $id)
    {
        $borrowing = Borrowing::findOrFail($id);
        
        $request->validate([
            'status' => 'required|in:disetujui,ditolak,dikembalikan',
            'catatan_petugas' => 'nullable|string'
        ]);

        // Jika disetujui, kurangi stok barang yang dipinjam
        if ($request->status == 'disetujui' && $borrowing->status != 'disetujui') {
            $item = $borrowing->item;
            if ($item->stok >= $borrowing->jumlah) {
                $item->stok -= $borrowing->jumlah;
                $item->save();
            } else {
                return back()->with('error', 'Stok barang tidak mencukupi untuk disetujui!');
            }
        }

        // Jika status dikembalikan, kembalikan stok barang
        if ($request->status == 'dikembalikan' && $borrowing->status == 'disetujui') {
            $item = $borrowing->item;
            $item->stok += $borrowing->jumlah;
            $item->save();
        }

        $borrowing->update([
            'status' => $request->status,
            'catatan_petugas' => $request->catatan_petugas
        ]);

        return redirect()->route('petugas.persetujuan')->with('success', 'Status peminjaman berhasil diperbarui.');
    }
}