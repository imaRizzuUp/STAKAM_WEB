<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Pendaftaran' }} - STAKAM</title>

    <link rel="icon" type="image/png" href="{{ asset('picture/logo/STAKAM_Logo.png') }}">

    {{-- Google Fonts: Inter --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Bootstrap CSS & Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }
        .form-header {
            border-bottom: 2px solid #dee2e6;
            padding-bottom: 1.5rem;
            margin-bottom: 2rem;
        }
        .form-header img {
            max-height: 80px;
        }
        .card-header {
            background-color: #2563eb;
            color: white;
            font-weight: 600;
        }
    </style>
</head>
<body>

    <div class="container my-5">
        <div class="form-header text-center">
            <img src="{{ asset('picture/logo/STAKAM_Logo.png') }}" alt="Logo STAKAM" class="mb-3">
            <h1 class="h3 fw-bold">SEKOLAH TINGGI AGAMA KRISTEN APOLLOS MANADO (STAKAM)</h1>
            <p class="text-secondary">Jl. Raya Manado-Tomohon Kompleks Perum Pertamina Winangun Kota Manado</p>
        </div>

        <h2 class="text-center fw-bold mb-4">FORMULIR PENDAFTARAN MAHASISWA BARU/LANJUTAN</h2>

        {{-- PENTING: enctype untuk upload file --}}
        <form action="{{ route('pendaftaran.proses') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            {{-- Bagian Pilihan Program Studi --}}
            <div class="card shadow-sm mb-4">
                <div class="card-header">
                    <i class="bi bi-mortarboard-fill me-2"></i>Pilihan Program
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="program" class="form-label">Program</label>
                            <select class="form-select" id="program" name="program" required>
                                <option value="Strata Satu" selected>Strata Satu (S1)</option>
                                <option value="Magister">Magister (S2)</option>
                                <option value="Doktor">Doktor (S3)</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="program_studi" class="form-label">Program Studi</label>
                            <select class="form-select" id="program_studi" name="program_studi" required>
                                <option value="Pendidikan Agama Kristen">Pendidikan Agama Kristen (PAK)</option>
                                <option value="Teologi">Teologi</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Bagian A: Biodata --}}
            <div class="card shadow-sm mb-4">
                <div class="card-header">
                    <i class="bi bi-person-fill me-2"></i>A. BIODATA MAHASISWA
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        {{-- Isi semua field biodata di sini --}}
                        <div class="col-12"><label class="form-label">Nama Mahasiswa</label><input type="text" class="form-control" name="nama_mahasiswa" required></div>
                        <div class="col-md-6"><label class="form-label">Tempat Lahir</label><input type="text" class="form-control" name="tempat_lahir" required></div>
                        <div class="col-md-6"><label class="form-label">Tanggal Lahir</label><input type="date" class="form-control" name="tanggal_lahir" required></div>
                        <div class="col-md-6"><label class="form-label">Jenis Kelamin</label><select class="form-select" name="jenis_kelamin"><option value="Laki-laki">Laki-laki</option><option value="Perempuan">Perempuan</option></select></div>
                        <div class="col-md-6"><label class="form-label">Agama</label><input type="text" class="form-control" name="agama" required></div>
                        <div class="col-12"><label class="form-label">NIK KTP</label><input type="text" class="form-control" name="nik_ktp" required></div>
                        <div class="col-12"><label class="form-label">Alamat (Jalan, Dusun, RT/RW, Kel/Desa, Kec)</label><textarea class="form-control" name="alamat" rows="3"></textarea></div>
                        <div class="col-md-6"><label class="form-label">Kode Pos</label><input type="text" class="form-control" name="kode_pos"></div>
                        <div class="col-md-6"><label class="form-label">Jenis Tinggal</label><select class="form-select" name="jenis_tinggal"><option>Bersama Orang Tua / Wali</option><option>Kost</option><option>Panti Asuhan</option><option>Lainnya</option></select></div>
                        <div class="col-md-6"><label class="form-label">Telepon</label><input type="tel" class="form-control" name="telepon"></div>
                        <div class="col-md-6"><label class="form-label">HP</label><input type="tel" class="form-control" name="hp" required></div>
                        <div class="col-12"><label class="form-label">Email</label><input type="email" class="form-control" name="email" required></div>
                        <div class="col-md-6"><label class="form-label">Asal Gereja</label><input type="text" class="form-control" name="asal_gereja"></div>
                        <div class="col-md-6"><label class="form-label">Tahun Lulus SMA/SMK</label><input type="number" class="form-control" name="tahun_lulus" placeholder="Contoh: 2023"></div>
                        <hr class="my-4">
                        <h5 class="fw-bold">Data Orang Tua</h5>
                        <div class="col-12"><label class="form-label">Nama Ibu</label><input type="text" class="form-control" name="nama_ibu" required></div>
                        <div class="col-md-6"><label class="form-label">Pekerjaan Ibu</label><input type="text" class="form-control" name="pekerjaan_ibu"></div>
                        <div class="col-12"><label class="form-label">Nama Ayah</label><input type="text" class="form-control" name="nama_ayah" required></div>
                        <div class="col-md-6"><label class="form-label">Pekerjaan Ayah</label><input type="text" class="form-control" name="pekerjaan_ayah"></div>
                    </div>
                </div>
            </div>

            {{-- Bagian B: Pendidikan --}}
            <div class="card shadow-sm mb-4">
                <div class="card-header">
                     <i class="bi bi-book-fill me-2"></i>B. RIWAYAT PENDIDIKAN
                </div>
                <div class="card-body p-4">
                     {{-- SD --}}
                     <div class="row g-3 mb-3 align-items-center">
                        <div class="col-md-2 fw-bold">SD</div>
                        <div class="col-md-6"><input type="text" class="form-control" name="nama_sekolah_sd" placeholder="Nama Sekolah"></div>
                        <div class="col-md-4"><input type="number" class="form-control" name="tahun_lulus_sd" placeholder="Tahun Lulus"></div>
                     </div>
                     {{-- SMP --}}
                     <div class="row g-3 mb-3 align-items-center">
                        <div class="col-md-2 fw-bold">SMP</div>
                        <div class="col-md-6"><input type="text" class="form-control" name="nama_sekolah_smp" placeholder="Nama Sekolah"></div>
                        <div class="col-md-4"><input type="number" class="form-control" name="tahun_lulus_smp" placeholder="Tahun Lulus"></div>
                     </div>
                     {{-- SMA/SMK --}}
                     <div class="row g-3 align-items-center">
                        <div class="col-md-2 fw-bold">SMA/SMK</div>
                        <div class="col-md-6"><input type="text" class="form-control" name="nama_sekolah_sma" placeholder="Nama Sekolah"></div>
                        <div class="col-md-4"><input type="number" class="form-control" name="tahun_lulus_sma" placeholder="Tahun Lulus"></div>
                     </div>
                </div>
            </div>

            {{-- Bagian C: Persyaratan --}}
            <div class="card shadow-sm mb-4">
                 <div class="card-header">
                     <i class="bi bi-file-earmark-check-fill me-2"></i>C. UPLOAD PERSYARATAN
                </div>
                <div class="card-body p-4">
                    <p class="text-secondary">Silakan upload dokumen yang diperlukan dalam format PDF atau JPG/PNG (maksimal 2MB per file).</p>
                    <div class="row g-3">
                        <div class="col-md-6"><label class="form-label">Fotocopy Ijazah SMA/SMK</label><input type="file" class="form-control" name="file_ijazah" accept=".pdf,.jpg,.jpeg,.png"></div>
                        <div class="col-md-6"><label class="form-label">Fotocopy KTP</label><input type="file" class="form-control" name="file_ktp" accept=".pdf,.jpg,.jpeg,.png"></div>
                        <div class="col-md-6"><label class="form-label">Fotocopy KK</label><input type="file" class="form-control" name="file_kk" accept=".pdf,.jpg,.jpeg,.png"></div>
                        <div class="col-md-6"><label class="form-label">Pas Foto</label><input type="file" class="form-control" name="file_pas_foto" accept=".jpg,.jpeg,.png"></div>
                        <div class="col-12"><label class="form-label">Kartu Hasil Studi / Surat Pindah (untuk mahasiswa pindahan)</label><input type="file" class="form-control" name="file_khs" accept=".pdf,.jpg,.jpeg,.png"></div>
                    </div>
                </div>
            </div>

             <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" value="" id="persetujuan" required>
                <label class="form-check-label" for="persetujuan">
                    Saya menyatakan bahwa semua data yang saya isi adalah benar dan dapat dipertanggungjawabkan.
                </label>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg"><i class="bi bi-send-fill me-2"></i>Kirim Pendaftaran</button>
            </div>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>