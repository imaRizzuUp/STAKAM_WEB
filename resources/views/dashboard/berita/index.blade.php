@extends('layouts.app') 
@section('title', 'Manajemen Berita')

{{-- [PERBAIKAN] Menggunakan 'konten' agar sesuai dengan app.blade.php --}}
@section('konten')

{{-- [PERBAIKAN] Seluruh markup di bawah ini dikonversi dari Tailwind ke Bootstrap 5 --}}
<div class="container-fluid px-0">
    <h2 class="h3 fw-bold mb-4 text-body-emphasis">Manajemen Berita</h2>

    <div class="mb-4">
        <a href="{{ route('dashboard.berita.create') }}" class="btn btn-primary fw-semibold">
            <i class="bi bi-plus-lg me-1"></i> Tambah Berita Baru
        </a>
    </div>

    @if (session('success'))
        {{-- Menggunakan data attribute untuk auto-dismiss --}}
        <div class="alert alert-success alert-dismissible fade show" role="alert" 
             x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" @click="show = false"></button>
        </div>
    @endif

    <div class="card shadow-sm rounded-3 border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    {{-- Menggunakan thead-light untuk header tabel --}}
                    <thead class="table-light">
                        <tr>
                            <th scope="col" class="small text-uppercase text-secondary">Gambar</th>
                            <th scope="col" class="small text-uppercase text-secondary">Judul</th>
                            <th scope="col" class="small text-uppercase text-secondary">Kategori</th>
                            <th scope="col" class="small text-uppercase text-secondary">Tanggal Publikasi</th>
                            <th scope="col" class="small text-uppercase text-secondary text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($beritas as $item)
                            <tr>
                                <td style="width: 120px;">
                                    @if($item->gambar)
                                        <img src="{{ Storage::url($item->gambar) }}" alt="{{ $item->judul }}" class="rounded" style="width: 100px; height: 60px; object-fit: cover;">
                                    @else
                                        {{-- Placeholder jika tidak ada gambar --}}
                                        <div class="rounded bg-secondary-subtle d-flex align-items-center justify-content-center" style="width: 100px; height: 60px;">
                                            <span class="text-muted small">Tanpa gambar</span>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <p class="fw-semibold mb-0 text-body-emphasis">{{ $item->judul }}</p>
                                </td>
                                <td>
                                    {{-- Badge Bootstrap --}}
                                    <span class="badge bg-primary-subtle text-primary-emphasis rounded-pill fw-medium">{{ $item->kategori ?? 'Umum' }}</span>
                                </td>
                                <td>
                                    <p class="text-muted mb-0">{{ $item->created_at->format('d M Y') }}</p>
                                </td>
                                <td class="text-end text-nowrap">
                                    {{-- Tombol aksi Bootstrap --}}
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('dashboard.berita.edit', $item->id) }}" class="btn btn-sm btn-outline-warning">
                                            <i class="bi bi-pencil-fill me-1"></i> Edit
                                        </a>
                                        
                                        <form action="{{ route('dashboard.berita.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus berita ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash-fill me-1"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    Belum ada berita yang ditambahkan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- 
    Catatan: Notifikasi sukses di atas menggunakan atribut x-data dari AlpineJS 
    untuk auto-dismiss. Jika Anda tidak memuat AlpineJS di layout, 
    notifikasi akan tetap muncul tetapi tidak akan hilang otomatis (hanya bisa ditutup manual).
--}}
@endsection