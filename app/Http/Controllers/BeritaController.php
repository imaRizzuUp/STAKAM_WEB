<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Menampilkan halaman daftar berita (di dashboard admin).
     */
    public function index()
    {
        $beritas = Berita::latest()->get(); // Ambil semua berita, urutkan dari yang terbaru
        return view('dashboard.berita.index', compact('beritas'));
    }

    /**
     * Menampilkan form untuk membuat berita baru.
     */
    public function create()
    {
        return view('dashboard.berita.create');
    }

    /**
     * Menyimpan berita baru ke database.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:100',
            'excerpt' => 'required|string|max:500',
            'isi' => 'nullable|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048', // Wajib ada gambar, maks 2MB
        ]);

        // 2. Handle Upload Gambar
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('berita_images', 'public');
            $validatedData['gambar'] = $imagePath;
        }

        // 3. Simpan data ke database
        Berita::create($validatedData);

        // 4. Redirect dengan pesan sukses
        return redirect()->route('dashboard.berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }
    
    /**
     * Menampilkan form untuk mengedit berita.
     * Route Model Binding: Laravel otomatis mencari Berita berdasarkan ID.
     */
    public function edit(Berita $berita)
    {
        return view('dashboard.berita.edit', compact('berita'));
    }

    /**
     * Mengupdate berita di database.
     */
    public function update(Request $request, Berita $berita)
    {
        // 1. Validasi Input
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:100',
            'excerpt' => 'required|string|max:500',
            'isi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // Gambar tidak wajib diisi saat update
        ]);

        // 2. Handle Upload Gambar (jika ada gambar baru)
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
                Storage::disk('public')->delete($berita->gambar);
            }

            // Simpan gambar baru
            $imagePath = $request->file('gambar')->store('berita_images', 'public');
            $validatedData['gambar'] = $imagePath;
        }

        // 3. Update data di database
        $berita->update($validatedData);

        // 4. Redirect dengan pesan sukses
        return redirect()->route('dashboard.berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    /**
     * Menghapus berita dari database.
     */
    public function destroy(Berita $berita)
    {
        // 1. Hapus gambar terkait dari storage
        if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
            Storage::disk('public')->delete($berita->gambar);
        }

        // 2. Hapus data dari database
        $berita->delete();

        // 3. Redirect dengan pesan sukses
        return redirect()->route('dashboard.berita.index')->with('success', 'Berita berhasil dihapus!');
    }
}