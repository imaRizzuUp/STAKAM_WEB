@extends('layouts.app') 
@section('title', 'Tambah Pengumuman Baru')

@section('konten')
<div class="container-fluid px-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h3 fw-bold text-body-emphasis">Tambah Pengumuman Baru</h2>
        <a href="{{ route('dashboard.pengumuman.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar
        </a>
    </div>

    <div class="card shadow-sm rounded-3 border-0">
        <div class="card-body p-4 p-md-5">
            {{-- Form harus memiliki enctype untuk upload file --}}
            <form action="{{ route('dashboard.pengumuman.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="row g-4">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="judul" class="form-label fw-medium">Judul Pengumuman</label>
                            <input type="text" name="judul" id="judul" value="{{ old('judul') }}" required 
                                   class="form-control @error('judul') is-invalid @enderror">
                            @error('judul')
                                <div class="invalid-feedback small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="file" class="form-label fw-medium">File Lampiran (Opsional)</label>
                            
                            {{-- [PERBAIKAN] Hapus 'required' dari input --}}
                            <input type="file" name="file" id="file" 
                                class="form-control @error('file') is-invalid @enderror">
                                
                            {{-- [PERBAIKAN] Ubah teks --}}
                            <div class="form-text">Kosongkan jika tidak ada lampiran. Format: PDF, JPG, PNG, WEBP. Maks: 5MB.</div>
                            
                            @error('file')
                                <div class="invalid-feedback small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label fw-medium">Deskripsi Singkat</label>
                            <textarea name="deskripsi" id="deskripsi" rows="4" required 
                                      class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi') }}</textarea>
                            <div class="form-text">Ringkasan singkat yang akan tampil di daftar pengumuman.</div>
                            @error('deskripsi')
                                <div class="invalid-feedback small">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="isi" class="form-label fw-medium">Keterangan Tambahan (Opsional)</label>
                            <textarea name="isi" id="isi" rows="6" 
                                      class="form-control @error('isi') is-invalid @enderror">{{ old('isi') }}</textarea>
                            <div class="form-text">Konten/keterangan tambahan jika diperlukan.</div>
                            @error('isi')
                                <div class="invalid-feedback small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-4 pt-4 border-top d-flex justify-content-end gap-2">
                    <a href="{{ route('dashboard.pengumuman.index') }}" class="btn btn-secondary">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-primary fw-semibold">
                        Simpan Pengumuman
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection