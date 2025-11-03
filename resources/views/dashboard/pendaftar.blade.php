@extends('layouts.app')

@section('title', 'Manajemen Pendaftar')

@section('konten')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 fw-bold mb-0">Manajemen Pendaftar</h1>
            <p class="text-secondary mb-0">Lihat, kelola, dan ubah status pendaftar.</p>
        </div>
        <div>
            <form method="GET" action="{{ route('dashboard.pendaftar') }}">
                <div class="input-group">
                    <select name="status" class="form-select" onchange="this.form.submit()">
                        <option value="">Semua Status</option>
                        <option value="Menunggu Verifikasi" {{ request('status') == 'Menunggu Verifikasi' ? 'selected' : '' }}>Menunggu Verifikasi</option>
                        <option value="Diterima" {{ request('status') == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                        <option value="Ditolak" {{ request('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>
            </form>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
    @endif


    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Nama Mahasiswa</th>
                            <th>Program Studi</th>
                            <th>Tanggal Daftar</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pendaftars as $pendaftar)
                        <tr>
                            <td>
                                <div class="fw-bold">{{ $pendaftar->nama_mahasiswa }}</div>
                                <small class="text-secondary">{{ $pendaftar->email }}</small>
                            </td>
                            <td>{{ $pendaftar->program_studi }} ({{ $pendaftar->program }})</td>
                            <td>{{ \Carbon\Carbon::parse($pendaftar->created_at)->isoFormat('D MMM YYYY') }}</td>
                            <td>
                                @php
                                    $statusColor = 'warning';
                                    if ($pendaftar->status == 'Diterima') $statusColor = 'success';
                                    if ($pendaftar->status == 'Ditolak') $statusColor = 'danger';
                                @endphp
                                <span class="badge bg-{{$statusColor}}-subtle text-{{$statusColor}}-emphasis">{{ $pendaftar->status }}</span>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-outline-info detail-btn" data-id="{{ $pendaftar->id }}" data-bs-toggle="modal" data-bs-target="#detailModal" title="Lihat Detail"><i class="bi bi-eye-fill"></i></button>
                                <button class="btn btn-sm btn-outline-secondary status-btn" data-id="{{ $pendaftar->id }}" data-bs-toggle="modal" data-bs-target="#statusModal" title="Ubah Status"><i class="bi bi-tag-fill"></i></button>
                                <form action="{{ route('dashboard.pendaftar.destroy', $pendaftar) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin ingin menghapus data pendaftar ini? Tindakan ini tidak dapat diurungkan.')" title="Hapus"><i class="bi bi-trash3-fill"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="text-center text-secondary py-4">Tidak ada data pendaftar.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
         
            <div class="mt-3">
                {{ $pendaftars->appends(request()->query())->links() }}
            </div>
        </div>
    </div>

    
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Pendaftar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="detailModalBody">
                    <div class="text-center my-5"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>
                </div>
            </div>
        </div>
    </div>

   
    <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusModalLabel">Ubah Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="statusForm" method="POST">
                    @csrf @method('PATCH')
                    <div class="modal-body">
                        <label for="statusSelect" class="form-label">Pilih status baru:</label>
                        <select name="status" id="statusSelect" class="form-select" required>
                            <option value="Menunggu Verifikasi">Menunggu Verifikasi</option>
                            <option value="Diterima">Diterima</option>
                            <option value="Ditolak">Ditolak</option>
                        </select>
                    </div>
                    <div class="modal-footer"><button type="submit" class="btn btn-primary">Simpan</button></div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const detailModal = document.getElementById('detailModal');
    const statusModal = document.getElementById('statusModal');


    detailModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const pendaftarId = button.getAttribute('data-id');
        const modalBody = document.getElementById('detailModalBody');
        modalBody.innerHTML = '<div class="text-center my-5"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>'; // Show loader

        fetch(`/dashboard/pendaftar/${pendaftarId}`)
            .then(response => response.json())
            .then(data => {
                let filesHtml = '';
                const files = {'Ijazah': data.file_ijazah, 'KTP': data.file_ktp, 'KK': data.file_kk, 'Pas Foto': data.file_pas_foto, 'KHS/Pindah': data.file_khs};
                for (const [key, value] of Object.entries(files)) {
                    if (value) {
                        filesHtml += `<li>${key}: <a href="/storage/${value}" target="_blank">Lihat File</a></li>`;
                    }
                }
                
                modalBody.innerHTML = `
                    <h5>${data.nama_mahasiswa}</h5>
                    <p class="text-secondary">${data.email} | ${data.hp}</p>
                    <hr>
                    <h6>Biodata</h6>
                    <ul class="list-unstyled">
                        <li><strong>NIK:</strong> ${data.nik_ktp}</li>
                        <li><strong>TTL:</strong> ${data.tempat_lahir}, ${data.tanggal_lahir}</li>
                        <li><strong>Alamat:</strong> ${data.alamat || '-'}</li>
                    </ul>
                    <h6>Data Akademik & Orang Tua</h6>
                    <ul class="list-unstyled">
                        <li><strong>Pilihan:</strong> ${data.program_studi} (${data.program})</li>
                        <li><strong>Lulus SMA:</strong> ${data.tahun_lulus_sma || '-'}</li>
                        <li><strong>Nama Ibu:</strong> ${data.nama_ibu}</li>
                        <li><strong>Nama Ayah:</strong> ${data.nama_ayah}</li>
                    </ul>
                    <h6>Berkas Terlampir</h6>
                    <ul>${filesHtml || '<li>Tidak ada berkas yang diupload.</li>'}</ul>
                `;
            });
    });

    statusModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const pendaftarId = button.getAttribute('data-id');
        const statusForm = document.getElementById('statusForm');
        statusForm.action = `/dashboard/pendaftar/${pendaftarId}/status`;
    });
});
</script>
@endpush