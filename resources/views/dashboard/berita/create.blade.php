@extends('layouts.app') 

@section('title', 'Tambah Berita Baru')

{{-- [PERBAIKAN] Menggunakan 'konten' agar sesuai dengan app.blade.php --}}
@section('konten')

{{-- [PERBAIKAN] Seluruh markup di bawah ini dikonversi dari Tailwind ke Bootstrap 5 --}}
<div class="container-fluid px-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h3 fw-bold text-body-emphasis">Tambah Berita Baru</h2>
        <a href="{{ route('dashboard.berita.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar
        </a>
    </div>

    <div class="card shadow-sm rounded-3 border-0">
        <div class="card-body p-4 p-md-5">
            {{-- PENTING: enctype="multipart/form-data" untuk upload file --}}
            <form action="{{ route('dashboard.berita.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="judul" class="form-label fw-medium">Judul Berita</label>
                            <input type="text" name="judul" id="judul" value="{{ old('judul') }}" required 
                                   class="form-control @error('judul') is-invalid @enderror">
                            @error('judul')
                                <div class="invalid-feedback small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="kategori" class="form-label fw-medium">Kategori (Opsional)</label>
                            <input type="text" name="kategori" id="kategori" value="{{ old('kategori') }}" 
                                   class="form-control @error('kategori') is-invalid @enderror">
                            @error('kategori')
                                <div class="invalid-feedback small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="gambar" class="form-label fw-medium">Gambar Utama</label>
                            <input type="file" name="gambar" id="gambar" required 
                                   class="form-control @error('gambar') is-invalid @enderror">
                            <div class="form-text">Wajib diisi. Format: JPG, PNG, WEBP. Maks: 2MB.</div>
                            @error('gambar')
                                <div class="invalid-feedback small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="excerpt" class="form-label fw-medium">Ringkasan (Excerpt)</label>
                            <textarea name="excerpt" id="excerpt" rows="4" required 
                                      class="form-control @error('excerpt') is-invalid @enderror">{{ old('excerpt') }}</textarea>
                            <div class="form-text">Ringkasan singkat yang akan tampil di halaman utama.</div>
                            @error('excerpt')
                                <div class="invalid-feedback small">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="isi" class="form-label fw-medium">Isi Berita Lengkap (Opsional)</label>
                            {{-- Memberikan tinggi minimum agar setara dengan 'rows=8' --}}
                            <textarea name="isi" id="isi" rows="8" 
                                      class="form-control @error('isi') is-invalid @enderror" 
                                      style="min-height: 180px;">{{ old('isi') }}</textarea>
                            @error('isi')
                                <div class="invalid-feedback small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-4 pt-4 border-top d-flex justify-content-end gap-2">
                    <a href="{{ route('dashboard.berita.index') }}" class="btn btn-secondary">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-primary fw-semibold">
                        Simpan Berita
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection