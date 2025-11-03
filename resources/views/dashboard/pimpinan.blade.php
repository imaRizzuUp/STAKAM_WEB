@extends('layouts.app')

@section('title', 'Manajemen Pimpinan')

@section('konten')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 fw-bold mb-0">Manajemen Pimpinan</h1>
            <p class="text-secondary mb-0">Kelola daftar jajaran pimpinan STAKAM.</p>
        </div>
        <div>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pimpinanModal"><i class="bi bi-person-plus-fill me-2"></i>Tambah Pimpinan</button>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 10%;">Foto</th>
                            <th>Nama Lengkap</th>
                            <th>Jabatan</th>
                            <th class="text-center" style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pimpinan as $p)
                        <tr>
                            <td>
                                <img src="{{ Storage::url($p->foto) }}" class="rounded-circle" width="50" height="50" alt="{{ $p->nama }}" style="object-fit: cover;">
                            </td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->jabatan }}</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-outline-secondary edit-btn" data-bs-toggle="modal" data-bs-target="#pimpinanModalEdit"
                                    data-action="{{ route('dashboard.pimpinan.update', $p) }}"
                                    data-nama="{{ $p->nama }}"
                                    data-jabatan="{{ $p->jabatan }}"
                                    data-foto="{{ Storage::url($p->foto) }}">
                                    <i class="bi bi-pencil-fill"></i>
                                </button>
                                <form action="{{ route('dashboard.pimpinan.destroy', $p) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="bi bi-trash3-fill"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="text-center text-secondary py-4">Belum ada data pimpinan.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal Tambah --}}
    <div class="modal fade" id="pimpinanModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header"><h1 class="modal-title fs-5">Tambah Data Pimpinan</h1><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
                <form action="{{ route('dashboard.pimpinan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3"><label for="nama" class="form-label">Nama Lengkap & Gelar</label><input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" required>@error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
                        <div class="mb-3"><label for="jabatan" class="form-label">Jabatan</label><input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" value="{{ old('jabatan') }}" required>@error('jabatan')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
                        <div class="mb-3"><label for="foto" class="form-label">Foto</label><input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto" name="foto" required>@error('foto')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
                    </div>
                    <div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button><button type="submit" class="btn btn-primary">Simpan</button></div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal Edit --}}
    <div class="modal fade" id="pimpinanModalEdit" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header"><h1 class="modal-title fs-5">Edit Data Pimpinan</h1><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
                <form id="editPimpinanForm" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="modal-body">
                        <div class="text-center mb-3"><img id="edit_preview_foto" src="" class="rounded-circle" width="100" height="100" alt="Foto Pimpinan" style="object-fit: cover;"></div>
                        <div class="mb-3"><label for="edit_nama" class="form-label">Nama Lengkap & Gelar</label><input type="text" class="form-control" id="edit_nama" name="nama" required></div>
                        <div class="mb-3"><label for="edit_jabatan" class="form-label">Jabatan</label><input type="text" class="form-control" id="edit_jabatan" name="jabatan" required></div>
                        <div class="mb-3"><label for="edit_foto" class="form-label">Ganti Foto (Opsional)</label><input class="form-control" type="file" id="edit_foto" name="foto"></div>
                    </div>
                    <div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button><button type="submit" class="btn btn-primary">Simpan Perubahan</button></div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
{{-- Script untuk modal edit --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const editModal = document.getElementById('pimpinanModalEdit');
    if(editModal) {
        editModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const form = editModal.querySelector('#editPimpinanForm');
            form.action = button.getAttribute('data-action');
            editModal.querySelector('#edit_preview_foto').src = button.getAttribute('data-foto');
            editModal.querySelector('#edit_nama').value = button.getAttribute('data-nama');
            editModal.querySelector('#edit_jabatan').value = button.getAttribute('data-jabatan');
        });
    }
});
</script>
{{-- Script untuk modal tambah jika error --}}
@if($errors->any())
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var addModal = new bootstrap.Modal(document.getElementById('pimpinanModal'), {});
        addModal.show();
    });
</script>
@endif
@endpush