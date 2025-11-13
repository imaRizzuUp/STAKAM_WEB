@extends('layouts.app')
@section('title', 'Manajemen Pengumuman')

@section('konten')
<div class="container-fluid px-0">
    <h2 class="h3 fw-bold mb-4 text-body-emphasis">Manajemen Pengumuman</h2>

    <div class="mb-4">
        <a href="{{ route('dashboard.pengumuman.create') }}" class="btn btn-primary fw-semibold">
            <i class="bi bi-plus-lg me-1"></i> Tambah Pengumuman Baru
        </a>
    </div>

    @if (session('success'))
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
                    <thead class="table-light">
                        <tr>
                            <th scope="col" class="small text-uppercase text-secondary">File</th>
                            <th scope="col" class="small text-uppercase text-secondary">Judul</th>
                            <th scope="col" class="small text-uppercase text-secondary">Deskripsi</th>
                            <th scope="col" class="small text-uppercase text-secondary">Tanggal</th>
                            <th scope="col" class="small text-uppercase text-secondary text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pengumumans as $item)
                            <tr>
                                <td style="width: 100px;">
                                    @if($item->file_type == 'image')
                                        <img src="{{ Storage::url($item->file_path) }}" alt="{{ $item->judul }}" class="rounded" style="width: 80px; height: 50px; object-fit: cover;">
                                    @elseif($item->file_type == 'pdf')
                                        <div class="rounded bg-light d-flex align-items-center justify-content-center" style="width: 80px; height: 50px;">
                                            <i class="bi bi-file-earmark-pdf-fill fs-3 text-danger"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <p class="fw-semibold mb-0 text-body-emphasis">{{ Str::limit($item->judul, 50) }}</p>
                                </td>
                                <td>
                                    <p class="text-muted mb-0 small">{{ Str::limit($item->deskripsi, 80) }}</p>
                                </td>
                                <td class="text-nowrap">
                                    <p class="text-muted mb-0 small">{{ $item->created_at->format('d M Y') }}</p>
                                </td>
                                <td class="text-end text-nowrap">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('dashboard.pengumuman.edit', $item->id) }}" class="btn btn-sm btn-outline-warning">
                                            <i class="bi bi-pencil-fill me-1"></i> Edit
                                        </a>
                                        
                                        <form action="{{ route('dashboard.pengumuman.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus pengumuman ini?');">
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
                                    Belum ada pengumuman yang ditambahkan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection