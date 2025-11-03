@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('konten')
    
    {{-- Baris Selamat Datang --}}
    <div class="mb-4">
        <h1 class="h3 mb-1 fw-bold">Selamat Datang, Admin STAKAM!</h1>
        <p class="text-secondary">Kelola semua konten landing page STAKAM dari sini.</p>
    </div>

    {{-- Kartu Statistik Utama --}}
    <div class="row g-4 mb-4">
        
        {{-- Kartu Pendaftar (Sekarang Aktif) --}}
        <div class="col-md-6 col-xl-3">
            <div class="card h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="bg-primary text-white rounded-3 d-flex align-items-center justify-content-center me-3" style="width: 48px; height: 48px;">
                        <i class="bi bi-person-plus-fill fs-4"></i>
                    </div>
                    <div>
                        <h2 class="fw-bold mb-0">{{ $stats['pendaftar'] ?? 0 }}</h2>
                        <small class="text-secondary">Total Pendaftar</small>
                    </div>
                </div>
            </div>
        </div>

        {{-- Kartu Program Studi --}}
        <div class="col-md-6 col-xl-3">
            <div class="card h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="bg-success text-white rounded-3 d-flex align-items-center justify-content-center me-3" style="width: 48px; height: 48px;">
                        <i class="bi bi-mortarboard-fill fs-4"></i>
                    </div>
                    <div>
                        <h2 class="fw-bold mb-0">{{ $stats['prodi'] }}</h2>
                        <small class="text-secondary">Total Program Studi</small>
                    </div>
                </div>
            </div>
        </div>

        {{-- Kartu Pimpinan --}}
        <div class="col-md-6 col-xl-3">
            <div class="card h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="bg-warning text-white rounded-3 d-flex align-items-center justify-content-center me-3" style="width: 48px; height: 48px;">
                        <i class="bi bi-person-workspace fs-4"></i>
                    </div>
                    <div>
                        <h2 class="fw-bold mb-0">{{ $stats['pimpinan'] }}</h2>
                        <small class="text-secondary">Jumlah Pimpinan</small>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Kartu Testimoni --}}
        <div class="col-md-6 col-xl-3">
            <div class="card h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="bg-info text-white rounded-3 d-flex align-items-center justify-content-center me-3" style="width: 48px; height: 48px;">
                        <i class="bi bi-chat-quote-fill fs-4"></i>
                    </div>
                    <div>
                        <h2 class="fw-bold mb-0">{{ $stats['testimoni'] }}</h2>
                        <small class="text-secondary">Total Testimoni</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Konten Utama (Grid) --}}
    <div class="row g-4">
        
        {{-- Kolom Kiri: Pendaftar Terbaru (Sekarang Aktif) --}}
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-transparent border-0 pt-3 d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold"><i class="bi bi-people-fill me-2 text-primary"></i>Pendaftar Terbaru</h5>
                    <a href="{{ route('dashboard.pendaftar') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th>Program Studi Pilihan</th>
                                    <th>Tanggal Daftar</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pendaftarTerbaru as $pendaftar)
                                <tr>
                                    <td>{{ $pendaftar->nama_mahasiswa }}</td>
                                    <td>{{ $pendaftar->program_studi }}</td>
                                    <td>{{ $pendaftar->created_at->format('d M Y') }}</td>
                                    <td>
                                        @php
                                            $statusColor = 'warning';
                                            if ($pendaftar->status == 'Diterima') $statusColor = 'success';
                                            if ($pendaftar->status == 'Ditolak') $statusColor = 'danger';
                                        @endphp
                                        <span class="badge bg-{{$statusColor}}-subtle text-{{$statusColor}}-emphasis">{{ $pendaftar->status }}</span>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-secondary py-3">Belum ada pendaftar baru.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Kolom Kanan: Akses Cepat --}}
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-transparent border-0 pt-3">
                    <h5 class="fw-bold"><i class="bi bi-lightning-charge-fill me-2 text-primary"></i>Akses Cepat</h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('dashboard.pendaftar') }}" class="btn btn-outline-primary text-start"><i class="bi bi-card-checklist me-2"></i>Kelola Pendaftar</a>
                        <hr class="my-1">
                        <a href="{{ route('dashboard.kontenHero') }}" class="btn btn-outline-secondary text-start"><i class="bi bi-window-desktop me-2"></i>Edit Halaman Hero</a>
                        <a href="{{ route('dashboard.kontenProfil') }}" class="btn btn-outline-secondary text-start"><i class="bi bi-file-person-fill me-2"></i>Edit Halaman Profil</a>
                        <a href="{{ route('dashboard.programStudi') }}" class="btn btn-outline-secondary text-start"><i class="bi bi-mortarboard-fill me-2"></i>Kelola Program Studi</a>
                        <a href="{{ route('dashboard.pimpinan') }}" class="btn btn-outline-secondary text-start"><i class="bi bi-person-workspace me-2"></i>Kelola Pimpinan</a>
                        <a href="{{ route('dashboard.testimoni') }}" class="btn btn-outline-secondary text-start"><i class="bi bi-chat-quote-fill me-2"></i>Kelola Testimoni</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection