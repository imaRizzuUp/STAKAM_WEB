<?php

namespace App\Observers;

use App\Models\Pendaftar;
use Carbon\Carbon;

class PendaftarObserver
{
    /**
     * Handle the Pendaftar "creating" event.
     * Logika ini berjalan sebelum data baru disimpan.
     */
    public function creating(Pendaftar $pendaftar): void
    {
        // 1. Dapatkan prefix tanggal hari ini (Contoh: 20240523)
        $datePrefix = Carbon::now()->format('Ymd');

        // 2. Cari pendaftar terakhir yang pernah dibuat untuk mendapatkan ID tertinggi
        $lastPendaftar = Pendaftar::orderBy('id', 'desc')->first();

        // 3. Tentukan nomor urut berikutnya
        // Jika ada pendaftar sebelumnya, ambil ID-nya dan tambah 1.
        // Jika tidak ada (tabel kosong), mulai dari 1.
        $nextId = $lastPendaftar ? $lastPendaftar->id + 1 : 1;
        
        // 4. Format nomor urut menjadi 3 digit (001, 002, ..., 010, ..., 100)
        $sequencePadded = str_pad($nextId, 3, '0', STR_PAD_LEFT);

        // 5. Gabungkan semuanya dan set ke model pendaftar
        $pendaftar->nomor_pendaftaran = $datePrefix . $sequencePadded;
    }
}