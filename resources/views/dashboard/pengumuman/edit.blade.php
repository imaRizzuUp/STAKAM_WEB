@extends('layouts.app') 
@section('title', 'Edit Pengumuman')

@section('konten')
<div class="container-fluid px-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h3 fw-bold text-body-emphasis">Edit Pengumuman</h2>
        <a href="{{ route('dashboard.pengumuman.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar
        </a>
    </div>

    <div class="card shadow-sm rounded-3 border-0">
        <div class="card-body p-4 p-md-5">
            <form action="{{ route('dashboard.pengumuman.update', $pengumuman->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="row g-4">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="judul" class="form-label fw-medium">Judul Pengumuman</label>
                            <input type="text" name="judul" id="judul" value="{{ old('judul', $pengumuman->judul) }}" required 
                                   class="form-control @error('judul') is-invalid @enderror">
                            @error('judul')
                                <div class="invalid-feedback small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="file" class="form-label fw-medium">File Lampiran (Opsional)</label>
                            
                            <div class="mb-2">
                                <span class="fw-medium small">File Saat Ini:</span>
                                @if($pengumuman->file_path)
                                    @if($pengumuman->file_type == 'image')
                                        <img src="{{ Storage::url($pengumuman->file_path) }}" alt="Pratinjau" class="img-thumbnail mt-2" style="max-height: 100px;">
                                    @elseif($pengumuman->file_type == 'pdf')
                                        <a href="{{ Storage::url($pengumuman->file_path) }}" target="_blank" class="btn btn-sm btn-outline-danger ms-2">
                                            <i class="bi bi-file-earmark-pdf-fill me-1"></i> Lihat PDF
                                        </a>
                                    @endif
                                @else
                                    {{-- [PERBAIKAN] Tampilkan jika tidak ada file --}}
                                    <span class="text-muted small ms-2">Tidak ada file terlampir.</span>
                                @endif
                            </div>

                            <input type="file" name="file" id="file" 
                                class="form-control @error('file') is-invalid @enderror">
                            <div class="form-text">Kosongkan jika tidak ingin mengubah file. Maks: 5MB.</div>
                            @error('file')
                                <div class="invalid-feedback small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label fw-medium">Deskripsi Singkat</label>
                            <textarea name="deskripsi" id="deskripsi" rows="4" required 
                                      class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $pengumuman->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback small">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="isi" class="form-label fw-medium">Keterangan Tambahan (Opsional)</label>
                            <textarea name="isi" id="isi" rows="6" 
                                      class="form-control @error('isi') is-invalid @enderror">{{ old('isi', $pengumuman->isi) }}</textarea>
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
                        Update Pengumuman
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection