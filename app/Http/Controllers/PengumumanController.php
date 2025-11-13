<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PengumumanController extends Controller
{
    /**
     * Menampilkan daftar pengumuman.
     */
    public function index()
    {
        $pengumumans = Pengumuman::latest()->get();
        return view('dashboard.pengumuman.index', [
            'title' => 'Manajemen Pengumuman',
            'pengumumans' => $pengumumans
        ]);
    }

    /**
     * Menampilkan form tambah pengumuman.
     */
    public function create()
    {
        return view('dashboard.pengumuman.create', [
            'title' => 'Tambah Pengumuman Baru'
        ]);
    }

    /**
     * Menyimpan pengumuman baru.
     */
    public function store(Request $request)
    {
        // [PERBAIKAN] Ubah 'required' menjadi 'nullable'
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:1000',
            'isi' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,jpg,jpeg,png,webp|max:5120', // Maks 5MB
        ]);

        $path = null;
        $type = null;

        // [PERBAIKAN] Bungkus logika file dalam 'if'
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('pengumuman_files', 'public');
            $extension = $request->file('file')->getClientOriginalExtension();
            $type = ($extension == 'pdf') ? 'pdf' : 'image';
        }

        Pengumuman::create([
            'judul' => $validatedData['judul'],
            'deskripsi' => $validatedData['deskripsi'],
            'isi' => $validatedData['isi'],
            'file_path' => $path,
            'file_type' => $type,
        ]);

        return redirect()->route('dashboard.pengumuman.index')->with('success', 'Pengumuman berhasil ditambahkan!');
    }
   
    public function edit(Pengumuman $pengumuman)
    {
        return view('dashboard.pengumuman.edit', [
            'title' => 'Edit Pengumuman',
            'pengumuman' => $pengumuman
        ]);
    }

    /**
     * Mengupdate pengumuman.
     */
    public function update(Request $request, Pengumuman $pengumuman)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:1000',
            'isi' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,jpg,jpeg,png,webp|max:5120', // Tidak wajib
        ]);

        $dataToUpdate = $request->except(['_token', '_method', 'file']);

        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($pengumuman->file_path && Storage::disk('public')->exists($pengumuman->file_path)) {
                Storage::disk('public')->delete($pengumuman->file_path);
            }

            // Simpan file baru
            $dataToUpdate['file_path'] = $request->file('file')->store('pengumuman_files', 'public');
            $extension = $request->file('file')->getClientOriginalExtension();
            $dataToUpdate['file_type'] = ($extension == 'pdf') ? 'pdf' : 'image';
        }

        $pengumuman->update($dataToUpdate);

        return redirect()->route('dashboard.pengumuman.index')->with('success', 'Pengumuman berhasil diperbarui!');
    }

    /**
     * Menghapus pengumuman.
     */
    public function destroy(Pengumuman $pengumuman)
    {
        // Hapus file dari storage
        if ($pengumuman->file_path && Storage::disk('public')->exists($pengumuman->file_path)) {
            Storage::disk('public')->delete($pengumuman->file_path);
        }

        $pengumuman->delete();

        return redirect()->route('dashboard.pengumuman.index')->with('success', 'Pengumuman berhasil dihapus!');
    }
}