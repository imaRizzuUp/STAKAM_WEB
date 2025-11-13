@extends('layouts.frontend')

@section('title', 'Panduan Koneksi Wi-Fi - STAKAM')

@section('content')

<section class="py-20 pt-28 lg:pt-40 bg-white">
    <div class="container mx-auto px-6">
        <div class="max-w-3xl mx-auto">
            
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4 leading-tight">
                    Panduan Koneksi Wi-Fi Kampus
                </h1>
                <p class="text-lg text-gray-600">
                    Cara terhubung ke jaringan internet STAKAM (Captive Portal).
                </p>
            </div>

            <div class="prose text-gray-800 max-w-none bg-slate-50 p-6 md:p-10 rounded-2xl shadow-sm border border-slate-200/80">
                
                <p>Wi-Fi di lingkungan STAKAM menggunakan sistem autentikasi dua langkah untuk keamanan. Anda perlu memasukkan kata sandi Wi-Fi (kunci WPA2) terlebih dahulu, kemudian login melalui halaman portal.</p>

                <h2>Langkah 1: Sambungkan ke Jaringan Wi-Fi</h2>
                <ol>
                    <li>Buka pengaturan <strong>Wi-Fi</strong> di perangkat Anda (HP, Laptop, dll.).</li>
                    <li>
                        Cari dan pilih nama jaringan (SSID): 
                        <strong class="bg-blue-100 text-blue-800 px-2 py-1 rounded">STAKAM_WIFI</strong>
                    </li>
                    <li>
                        Saat diminta, masukkan kata sandi jaringan:
                        <strong class="bg-blue-100 text-blue-800 px-2 py-1 rounded">StakamJaya2025!</strong>
                    </li>
                    <li>Klik "Sambungkan" atau "Join".</li>
                </ol>

                <h2>Langkah 2: Login ke Halaman Portal</h2>
                <p>Setelah terhubung, halaman login (portal) akan muncul secara otomatis di browser atau jendela pop-up.</p>
                
                <img src="{{ asset('picture/contoh/halaman-login-wifi.png') }}" alt="Contoh Halaman Login Wi-Fi" class="w-full rounded-lg shadow-md border">

                <ul>
                    <li>
                        <strong>Username:</strong> Masukkan <strong>NIM</strong> Anda (Contoh: 2311001).
                    </li>
                    <li>
                        <strong>Password:</strong> Masukkan password yang sama dengan <strong>akun SIAKAD</strong> Anda.
                    </li>
                </ul>
                <p>Setelah berhasil login di portal, Anda akan terhubung ke internet.</p>

                <h2>Troubleshooting (Jika Gagal)</h2>
                <blockquote>
                    <strong>Halaman login tidak muncul otomatis?</strong>
                    <p class="mt-2">Jika halaman login tidak muncul, buka browser Anda (Chrome, Safari, dll.) dan coba kunjungi situs web apa saja (contoh: <strong>google.com</strong>). Ini biasanya akan memicu halaman login untuk tampil.</p>
                </blockquote>
                
                <p>Jika Anda masih mengalami kendala koneksi atau lupa password akun, silakan hubungi tim IT Support STAKAM di Ruang Administrasi.</p>

            </div>

        </div>
    </div>
</section>

@endsection