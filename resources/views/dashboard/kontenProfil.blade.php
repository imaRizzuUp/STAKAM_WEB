@extends('layouts.app')

@section('title', 'Manajemen Konten Profil')

@section('konten')
    {{-- ... Header Halaman ... --}}
    
    {{-- Tampilkan pesan sukses --}}
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('dashboard.kontenProfil.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- BAGIAN 1: DESKRIPSI UTAMA --}}
        <div class="card mb-4">
            <div class="card-header bg-transparent">
                <h5 class="card-title mb-0 fw-bold"><i class="bi bi-file-text-fill me-2"></i>Deskripsi & Gambar Utama</h5>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-md-7">
                        <div class="mb-3">
                            <label for="judul_profil" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul_profil" name="judul_profil" value="{{ old('judul_profil', $konten->judul) }}">
                        </div>
                        <div class="mb-3">
                            <label for="paragraf_satu" class="form-label">Paragraf 1</label>
                            <textarea class="form-control" id="paragraf_satu" name="paragraf_satu" rows="4">{{ old('paragraf_satu', $konten->paragraf_satu) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="paragraf_dua" class="form-label">Paragraf 2</label>
                            <textarea class="form-control" id="paragraf_dua" name="paragraf_dua" rows="3">{{ old('paragraf_dua', $konten->paragraf_dua) }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="gambar_profil" class="form-label">Gambar Kampus</label>
                        <img id="preview_gambar_profil" src="{{ $konten->gambar_profil ? Storage::url($konten->gambar_profil) : 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?q=80&w=2070&auto=format&fit=crop' }}" class="img-fluid rounded mb-2" alt="Preview Gambar Profil">
                        <input class="form-control" type="file" id="gambar_profil" name="gambar_profil" onchange="previewImage(event, 'preview_gambar_profil')">
                        <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah.</small>
                    </div>
                </div>
            </div>
        </div>

        {{-- BAGIAN 2: KARTU KEUNGGULAN --}}
        <div class="card mb-4">
            <div class="card-header bg-transparent">
                <h5 class="card-title mb-0 fw-bold"><i class="bi bi-star-fill me-2"></i>Kartu Keunggulan</h5>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    {{-- Kartu 1 --}}
                    <div class="col-lg-4">
                        <h6 class="fw-bold">Kartu 1</h6>
                        <div class="mb-3">
                            <label for="kartu1_judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="kartu1_judul" name="kartu1_judul" value="{{ old('kartu1_judul', $konten->kartu1_judul) }}">
                        </div>
                        <div class="mb-3">
                            <label for="kartu1_deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="kartu1_deskripsi" name="kartu1_deskripsi" value="{{ old('kartu1_deskripsi', $konten->kartu1_deskripsi) }}">
                        </div>
                    </div>
                    {{-- Kartu 2 --}}
                    <div class="col-lg-4">
                        <h6 class="fw-bold">Kartu 2</h6>
                        <div class="mb-3">
                            <label for="kartu2_judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="kartu2_judul" name="kartu2_judul" value="{{ old('kartu2_judul', $konten->kartu2_judul) }}">
                        </div>
                        <div class="mb-3">
                            <label for="kartu2_deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="kartu2_deskripsi" name="kartu2_deskripsi" value="{{ old('kartu2_deskripsi', $konten->kartu2_deskripsi) }}">
                        </div>
                    </div>
                    {{-- Kartu 3 --}}
                    <div class="col-lg-4">
                        <h6 class="fw-bold">Kartu 3</h6>
                        <div class="mb-3">
                            <label for="kartu3_judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="kartu3_judul" name="kartu3_judul" value="{{ old('kartu3_judul', $konten->kartu3_judul) }}">
                        </div>
                        <div class="mb-3">
                            <label for="kartu3_deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="kartu3_deskripsi" name="kartu3_deskripsi" value="{{ old('kartu3_deskripsi', $konten->kartu3_deskripsi) }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tombol Aksi --}}
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary"><i class="bi bi-save-fill me-2"></i>Simpan Semua Perubahan</button>
        </div>
    </form>
@endsection

@push('scripts')
{{-- Script untuk live preview gambar tetap sama --}}
<script>
    function previewImage(event, previewId) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById(previewId);
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endpush