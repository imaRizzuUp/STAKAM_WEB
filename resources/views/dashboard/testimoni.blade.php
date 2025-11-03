@extends('layouts.app')

@section('title', 'Manajemen Testimoni')

@section('konten')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 fw-bold mb-0">Manajemen Testimoni</h1>
            <p class="text-secondary mb-0">Kelola kesaksian dari mahasiswa, alumni, dan mitra.</p>
        </div>
        <div>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#testimoniModal"><i class="bi bi-chat-quote-fill me-2"></i>Tambah Testimoni</button>
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
                            <th style="width: 50%;">Isi Testimoni</th>
                            <th>Nama Pemberi</th>
                            <th>Jabatan/Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($testimonis as $t)
                        <tr>
                            <td>"{{ Str::limit($t->testimoni, 80) }}"</td>
                            <td>{{ $t->nama }}</td>
                            <td>{{ $t->jabatan }}</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-outline-secondary edit-btn" data-bs-toggle="modal" data-bs-target="#testimoniModalEdit"
                                    data-action="{{ route('dashboard.testimoni.update', $t) }}"
                                    data-nama="{{ $t->nama }}"
                                    data-jabatan="{{ $t->jabatan }}"
                                    data-testimoni="{{ $t->testimoni }}">
                                    <i class="bi bi-pencil-fill"></i>
                                </button>
                                <form action="{{ route('dashboard.testimoni.destroy', $t) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="bi bi-trash3-fill"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="text-center text-secondary py-4">Belum ada data testimoni.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal Tambah --}}
    <div class="modal fade" id="testimoniModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header"><h1 class="modal-title fs-5">Tambah Testimoni Baru</h1><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
                <form action="{{ route('dashboard.testimoni.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3"><label for="nama" class="form-label">Nama Pemberi</label><input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" required>@error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
                        <div class="mb-3"><label for="jabatan" class="form-label">Jabatan/Status</label><input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" value="{{ old('jabatan') }}" required>@error('jabatan')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
                        <div class="mb-3"><label for="testimoni" class="form-label">Isi Testimoni</label><textarea class="form-control @error('testimoni') is-invalid @enderror" id="testimoni" name="testimoni" rows="5" required>{{ old('testimoni') }}</textarea>@error('testimoni')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
                    </div>
                    <div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button><button type="submit" class="btn btn-primary">Simpan</button></div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal Edit --}}
    <div class="modal fade" id="testimoniModalEdit" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header"><h1 class="modal-title fs-5">Edit Testimoni</h1><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
                <form id="editTestimoniForm" method="POST">
                    @csrf @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3"><label for="edit_nama" class="form-label">Nama Pemberi</label><input type="text" class="form-control" id="edit_nama" name="nama" required></div>
                        <div class="mb-3"><label for="edit_jabatan" class="form-label">Jabatan/Status</label><input type="text" class="form-control" id="edit_jabatan" name="jabatan" required></div>
                        <div class="mb-3"><label for="edit_testimoni" class="form-label">Isi Testimoni</label><textarea class="form-control" id="edit_testimoni" name="testimoni" rows="5" required></textarea></div>
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
    const editModal = document.getElementById('testimoniModalEdit');
    if(editModal) {
        editModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const form = editModal.querySelector('#editTestimoniForm');
            form.action = button.getAttribute('data-action');
            editModal.querySelector('#edit_nama').value = button.getAttribute('data-nama');
            editModal.querySelector('#edit_jabatan').value = button.getAttribute('data-jabatan');
            editModal.querySelector('#edit_testimoni').value = button.getAttribute('data-testimoni');
        });
    }
});
</script>
{{-- Script untuk modal tambah jika error --}}
@if($errors->any())
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var addModal = new bootstrap.Modal(document.getElementById('testimoniModal'), {});
        addModal.show();
    });
</script>
@endif
@endpush