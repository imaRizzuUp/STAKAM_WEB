@extends('layouts.app')

@section('title', 'Manajemen Konten Hero')

@section('konten')

    {{-- Header Halaman --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 fw-bold mb-0">Manajemen Konten Hero</h1>
            <p class="text-secondary mb-0">Ubah teks dan gambar yang tampil di bagian paling depan website.</p>
        </div>
    </div>

    {{-- Tampilkan pesan sukses jika ada --}}
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="row g-4">
        {{-- Kolom Kiri: Formulir Edit --}}
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header bg-transparent">
                    <h5 class="card-title mb-0 fw-bold">Formulir Konten</h5>
                </div>
                <div class="card-body">
                    {{-- Ganti action dengan route yang sesuai --}}
                    <form action="{{ route('dashboard.kontenHero.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') 

                        {{-- Input Judul Utama --}}
                        <div class="mb-3">
                            <label for="judul_utama" class="form-label">Judul Utama</label>
                            {{-- Value diisi dari data yang ada di database --}}
                            <input type="text" class="form-control @error('judul_utama') is-invalid @enderror" id="judul_utama" name="judul_utama" value="{{ old('judul_utama', $konten->judul_utama) }}">
                             @error('judul_utama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Input Deskripsi --}}
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi', $konten->deskripsi) }}</textarea>
                            @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        
                        <hr class="my-4">

                        {{-- Input Gambar Utama (Kanan) --}}
                        <div class="mb-3">
                            <label for="gambar_utama" class="form-label">Gambar Utama (di sebelah kanan teks)</label>
                            <input class="form-control @error('gambar_utama') is-invalid @enderror" type="file" id="gambar_utama" name="gambar_utama">
                            <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
                            @error('gambar_utama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        
                        {{-- Input Gambar Latar Belakang --}}
                        <div class="mb-4">
                            <label for="gambar_latar" class="form-label">Gambar Latar Belakang</label>
                            <input class="form-control @error('gambar_latar') is-invalid @enderror" type="file" id="gambar_latar" name="gambar_latar">
                            <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
                             @error('gambar_latar') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Tombol Aksi --}}
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-save-fill me-2"></i>Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Kolom Kanan: Pratinjau (Preview) --}}
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header bg-transparent"><h5 class="card-title mb-0 fw-bold">Pratinjau</h5></div>
                <div class="card-body p-0">
                    <div class="position-relative text-white overflow-hidden" style="min-height: 400px;">
                        {{-- Background Image & Overlay --}}
                        <img src="{{ $konten->gambar_latar ? Storage::url($konten->gambar_latar) : asset('picture/background/background.png') }}" class="position-absolute w-100 h-100" style="object-fit: cover; z-index: 1;" alt="Preview Background">
                        <div class="position-absolute w-100 h-100" style="background-color: rgba(10, 30, 60, 0.75); z-index: 2;"></div>
                        <div class="position-relative d-flex align-items-end p-4" style="z-index: 3; min-height: 400px;">
                            <div class="w-100 d-flex justify-content-between align-items-end">
                                <div class="w-50">
                                    <h4 class="fw-bold">{{ $konten->judul_utama }}</h4>
                                    <p class="small opacity-75">{{ Str::limit($konten->deskripsi, 50) }}</p>
                                </div>
                                <div class="w-50 text-end">
                                    <img src="{{ $konten->gambar_utama ? Storage::url($konten->gambar_utama) : asset('picture/icon/hero-foto.png') }}" class="img-fluid" style="max-height: 250px;" alt="Preview Gambar Utama">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center"><small class="text-secondary">Ini adalah perkiraan tampilan.</small></div>
            </div>
        </div>
    </div>
@endsection