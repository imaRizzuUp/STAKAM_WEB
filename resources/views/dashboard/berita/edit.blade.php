@extends('layouts.app') 

@section('title', 'Edit Berita')

{{-- [PERBAIKAN] Menggunakan 'konten' agar sesuai dengan app.blade.php --}}
@section('konten')

{{-- [PERBAIKAN] Seluruh markup di bawah ini dikonversi dari Tailwind ke Bootstrap 5 --}}
<div class="container-fluid px-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h3 fw-bold text-body-emphasis">Edit Berita</h2>
        <a href="{{ route('dashboard.berita.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar
        </a>
    </div>

    <div class="card shadow-sm rounded-3 border-0">
        <div class="card-body p-4 p-md-5">
            <form action="{{ route('dashboard.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') {{-- Method spoofing untuk UPDATE --}}
                
                <div class="row g-4">
                    <!-- Kolom Kiri -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="judul" class="form-label fw-medium">Judul Berita</label>
                            <input type="text" name="judul" id="judul" value="{{ old('judul', $berita->judul) }}" required 
                                   class="form-control @error('judul') is-invalid @enderror">
                            @error('judul')
                                <div class="invalid-feedback small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="kategori" class="form-label fw-medium">Kategori (Opsional)</label>
                            <input type="text" name="kategori" id="kategori" value="{{ old('kategori', $berita->kategori) }}" 
                                   class="form-control @error('kategori') is-invalid @enderror">
                            @error('kategori')
                                <div class="invalid-feedback small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="gambar" class="form-label fw-medium">Gambar Utama</label>
                            @if($berita->gambar)
                                <img src="{{ Storage::url($berita->gambar) }}" alt="Gambar saat ini" class="img-fluid rounded mb-3" style="max-height: 150px; object-fit: cover;">
                            @endif
                            <input type="file" name="gambar" id="gambar" 
                                   class="form-control @error('gambar') is-invalid @enderror">
                            <div class="form-text">Kosongkan jika tidak ingin mengubah gambar.</div>
                            @error('gambar')
                                <div class="invalid-feedback small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="excerpt" class="form-label fw-medium">Ringkasan (Excerpt)</label>
                            <textarea name="excerpt" id="excerpt" rows="4" required 
                                      class="form-control @error('excerpt') is-invalid @enderror">{{ old('excerpt', $berita->excerpt) }}</textarea>
                            @error('excerpt')
                                <div class="invalid-feedback small">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="isi" class="form-label fw-medium">Isi Berita Lengkap (Opsional)</label>
                            {{-- Memberikan tinggi minimum agar setara dengan 'rows=8' --}}
                            <textarea name="isi" id="isi" rows="8" 
                                      class="form-control @error('isi') is-invalid @enderror" 
                                      style="min-height: 180px;">{{ old('isi', $berita->isi) }}</textarea>
                            @error('isi')
                                <div class="invalid-feedback small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="mt-4 pt-4 border-top d-flex justify-content-end gap-2">
                    <a href="{{ route('dashboard.berita.index') }}" class="btn btn-secondary">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-primary fw-semibold">
                        Update Berita
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection