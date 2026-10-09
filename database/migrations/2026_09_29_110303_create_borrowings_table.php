<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('borrowings', function (Blueprint $table) {
            $table->id();
            $table->string('nama_peminjam'); // Nama/Identitas Siswa
            $table->foreignId('item_id')->constrained('items')->onDelete('cascade'); // Barang yang dipinjam
            $table->integer('jumlah')->default(1);
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali')->nullable();
            // Status: pending (menunggu), disetujui, ditolak, dikembalikan
            $table->enum('status', ['pending', 'disetujui', 'ditolak', 'dikembalikan'])->default('pending');
            $table->text('catatan_petugas')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('borrowings');
    }
};