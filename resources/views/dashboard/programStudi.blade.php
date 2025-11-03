@extends('layouts.app')

@section('title', 'Manajemen Program Studi')

@section('konten')

    {{-- Header Halaman & Tombol Tambah --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 fw-bold mb-0">Manajemen Program Studi</h1>
            <p class="text-secondary mb-0">Tambah, ubah, atau hapus program studi yang ditampilkan di landing page.</p>
        </div>
        <div>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#prodiModal">
                <i class="bi bi-plus-circle-fill me-2"></i>Tambah Program Studi
            </button>
        </div>
    </div>

    {{-- Pesan Sukses --}}
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    {{-- Tabel Data Program Studi --}}
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Jenjang</th>
                            <th>Nama Program Studi</th>
                            <th>Deskripsi Singkat</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($programStudi as $prodi)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @php
                                    $badgeColor = 'primary';
                                    if ($prodi->jenjang == 'Magister') $badgeColor = 'success';
                                    if ($prodi->jenjang == 'Doktor') $badgeColor = 'warning';
                                @endphp
                                <span class="badge bg-{{$badgeColor}}-subtle text-{{$badgeColor}}-emphasis">{{ $prodi->jenjang }}</span>
                            </td>
                            <td>{{ $prodi->nama_prodi }}</td>
                            <td>{{ Str::limit($prodi->deskripsi, 50) }}</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-outline-secondary edit-btn" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#prodiModalEdit"
                                        data-jenjang="{{ $prodi->jenjang }}"
                                        data-nama="{{ $prodi->nama_prodi }}"
                                        data-deskripsi="{{ $prodi->deskripsi }}"
                                        data-link="{{ $prodi->link_detail }}"
                                        data-action="{{ route('dashboard.programStudi.update', $prodi) }}">
                                    <i class="bi bi-pencil-fill"></i>
                                </button>
                                <form action="{{ route('dashboard.programStudi.destroy', $prodi) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="bi bi-trash3-fill"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-secondary py-4">Belum ada data program studi. Silakan tambah baru.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    {{-- ================================================================= --}}
    {{-- MODAL TAMBAH (DENGAN ERROR HANDLING) --}}
    {{-- ================================================================= --}}
    <div class="modal fade" id="prodiModal" tabindex="-1" aria-labelledby="prodiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="prodiModalLabel">Tambah Program Studi Baru</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dashboard.programStudi.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="jenjang" class="form-label">Jenjang</label>
                            <select class="form-select @error('jenjang') is-invalid @enderror" id="jenjang" name="jenjang" required>
                                <option value="" selected disabled>-- Pilih Jenjang --</option>
                                <option value="Sarjana" {{ old('jenjang') == 'Sarjana' ? 'selected' : '' }}>Sarjana (S1)</option>
                                <option value="Magister" {{ old('jenjang') == 'Magister' ? 'selected' : '' }}>Magister (S2)</option>
                                <option value="Doktor" {{ old('jenjang') == 'Doktor' ? 'selected' : '' }}>Doktor (S3)</option>
                            </select>
                            @error('jenjang')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama_prodi" class="form-label">Nama Program Studi</label>
                            <input type="text" class="form-control @error('nama_prodi') is-invalid @enderror" id="nama_prodi" name="nama_prodi" value="{{ old('nama_prodi') }}" placeholder="Contoh: S1 Teologi" required>
                            @error('nama_prodi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi Singkat</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3" placeholder="Jelaskan secara singkat tentang prodi ini" required>{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="link_detail" class="form-label">Link Selengkapnya (Opsional)</label>
                            <input type="url" class="form-control @error('link_detail') is-invalid @enderror" id="link_detail" name="link_detail" value="{{ old('link_detail') }}" placeholder="https://stakam.ac.id/prodi/s1-teologi">
                             @error('link_detail')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- ================================================================= --}}
    {{-- MODAL EDIT (SUDAH BENAR) --}}
    {{-- ================================================================= --}}
    <div class="modal fade" id="prodiModalEdit" tabindex="-1" aria-labelledby="prodiModalEditLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="prodiModalEditLabel">Edit Program Studi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editProdiForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="edit_jenjang" class="form-label">Jenjang</label>
                            <select class="form-select" id="edit_jenjang" name="jenjang" required>
                                <option value="Sarjana">Sarjana (S1)</option>
                                <option value="Magister">Magister (S2)</option>
                                <option value="Doktor">Doktor (S3)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="edit_nama_prodi" class="form-label">Nama Program Studi</label>
                            <input type="text" class="form-control" id="edit_nama_prodi" name="nama_prodi" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_deskripsi_prodi" class="form-label">Deskripsi Singkat</label>
                            <textarea class="form-control" id="edit_deskripsi_prodi" name="deskripsi_prodi" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="edit_link_detail" class="form-label">Link Selengkapnya (Opsional)</label>
                            <input type="url" class="form-control" id="edit_link_detail" name="link_detail">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
{{-- Script untuk mengisi data ke Modal Edit --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const editModal = document.getElementById('prodiModalEdit');
    if (editModal) {
        editModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const form = editModal.querySelector('#editProdiForm');
            form.action = button.getAttribute('data-action');
            editModal.querySelector('#edit_jenjang').value = button.getAttribute('data-jenjang');
            editModal.querySelector('#edit_nama_prodi').value = button.getAttribute('data-nama');
            editModal.querySelector('#edit_deskripsi_prodi').value = button.getAttribute('data-deskripsi');
            editModal.querySelector('#edit_link_detail').value = button.getAttribute('data-link');
        });
    }
});
</script>

{{-- Script untuk membuka kembali Modal Tambah jika ada error validasi --}}
@if($errors->any())
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var addModal = new bootstrap.Modal(document.getElementById('prodiModal'), {});
        addModal.show();
    });
</script>
@endif
@endpush