@extends('layouts.frontend')

@section('title', 'STAKAM - Sekolah Tinggi Agama Kristen Apollos Manado')

@section('content')

    <section id="hero" class="hero-bg-image bg-cover bg-center h-screen flex items-end">
        <div class="container mx-auto px-6 w-full flex items-end justify-between">
            <div class="text-left pb-16 md:w-1/2 text-white">
                <h1 class="text-4xl md:text-6xl font-extrabold mb-4 leading-tight text-white shadow-lg">{{ $hero->judul_utama }}</h1>
                <p class="text-lg md:text-xl mb-8 opacity-90">{{ $hero->deskripsi }}</p>
                <div class="flex flex-col sm:flex-row justify-start space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="#prodi" class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-8 py-3 rounded-full text-lg font-semibold hover:shadow-xl hover:shadow-blue-500/40 transform hover:scale-105 transition-all duration-300">Lihat Program Studi</a>
                    <a href="{{ route('pendaftaran.form') }}" class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-full text-lg font-semibold hover:bg-white/10 backdrop-blur-sm transition duration-300">Pendaftaran</a>
                </div>
            </div> 
            <div class="hidden md:flex md:w-1/2 justify-center items-end">
                <img src="{{ $hero->gambar_utama ? Storage::url($hero->gambar_utama) : asset('picture/icon/hero-foto.png') }}" 
                     alt="Mahasiswa atau Pimpinan STAKAM" 
                     class="max-h-[100vh]">
            </div>
        </div>
    </section>

    
    <section id="profil" class="py-20 bg-gradient-to-b from-white to-slate-100">
         <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-16 items-center">
                <div>
                <img src="{{ $profil->gambar_profil ? Storage::url($profil->gambar_profil) : 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?q=80&w=2070&auto=format&fit=crop' }}" 
                    alt="Kampus STAKAM" 
                    class="rounded-2xl shadow-2xl shadow-blue-500/20">
                </div>
                <div>
                    <h2 class="text-4xl font-extrabold mb-6 bg-gradient-to-r from-blue-700 to-blue-900 bg-clip-text text-transparent">{{ $profil->judul }}</h2>
                    <p class="text-gray-600 mb-4 leading-relaxed">{{ $profil->paragraf_satu }}</p>
                    <p class="text-gray-600 mb-8 leading-relaxed">{{ $profil->paragraf_dua }}</p>
                    <div class="mt-20 grid grid-cols-1 gap-y-16 sm:grid-cols-3 sm:gap-x-6 sm:gap-y-0">
                        <div class="relative bg-white pt-12 pb-6 px-4 rounded-xl shadow-xl shadow-blue-500/10 text-center">
                            <img src="{{ asset('picture/icon/icon-Akreditasi.png') }}" alt="Ikon Akreditasi" class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 h-20 w-auto">
                            <div><h3 class="font-bold text-blue-800 text-xl">{{ $profil->kartu1_judul }}</h3><p class="text-sm text-gray-600 mt-1">{{ $profil->kartu1_deskripsi }}</p></div>
                        </div>
                        <div class="relative bg-white pt-12 pb-6 px-4 rounded-xl shadow-xl shadow-blue-500/10 text-center">
                            <img src="{{ asset('picture/icon/dosen.png') }}" alt="Ikon Dosen" class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 h-24 w-auto">
                            <div><h3 class="font-bold text-blue-800 text-xl">{{ $profil->kartu2_judul }}</h3><p class="text-sm text-gray-600 mt-1">{{ $profil->kartu2_deskripsi }}</p></div>
                        </div>
                        <div class="relative bg-white pt-12 pb-6 px-4 rounded-xl shadow-xl shadow-blue-500/10 text-center">
                            <img src="{{ asset('picture/icon/buku.png') }}" alt="Ikon Lingkungan Belajar" class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 h-20 w-auto">
                            <div><h3 class="font-bold text-blue-800 text-xl">{{ $profil->kartu3_judul }}</h3><p class="text-sm text-gray-600 mt-1">{{ $profil->kartu3_deskripsi }}</p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="prodi" class="py-20 overflow-hidden bg-slate-100">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-extrabold bg-gradient-to-r from-blue-700 to-blue-900 bg-clip-text text-transparent">Program Studi Unggulan</h2>
                <p class="text-gray-600 mt-4 max-w-2xl mx-auto">Pilihlah jenjang pendidikan yang sesuai dengan panggilan dan tujuan pelayanan Anda.</p>
            </div>
        </div>
        <div class="relative">
            <div class="swiper prodi-slider">
                <div class="swiper-wrapper">
                    @forelse ($programStudi as $prodi)
                    <div class="swiper-slide h-auto bg-white p-8 rounded-2xl shadow-lg border border-slate-200 flex flex-col">
                       @php
                         $badgeColor = 'blue';
                         if ($prodi->jenjang == 'Magister') $badgeColor = 'green';
                         if ($prodi->jenjang == 'Doktor') $badgeColor = 'purple';
                       @endphp
                       <span class="bg-{{$badgeColor}}-100 text-{{$badgeColor}}-800 text-sm font-semibold px-3 py-1 rounded-full self-start">{{ $prodi->jenjang }}</span>
                       <h3 class="text-2xl font-bold mt-4 mb-2">{{ $prodi->nama_prodi }}</h3>
                       <p class="text-gray-600 mb-4 flex-grow">{{ $prodi->deskripsi }}</p>
                       <a href="{{ $prodi->link_detail ?? '#' }}" class="font-semibold text-{{$badgeColor}}-600 hover:text-{{$badgeColor}}-800 mt-auto group">
                         Pelajari Lebih Lanjut <span class="group-hover:ml-2 transition-all">→</span>
                       </a>
                    </div>
                    @empty
                    <div class="text-center w-full py-10"><p class="text-gray-500">Program studi akan segera tersedia.</p></div>
                    @endforelse
                </div>
                <div class="swiper-button-prev hidden md:flex"></div>
                <div class="swiper-button-next hidden md:flex"></div>
            </div>
            <div class="swiper-pagination mt-12 relative"></div>
        </div>
    </section>


    <section id="audensi" class="py-20 bg-gradient-to-br from-blue-700 via-blue-800 to-slate-900 text-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-extrabold">Apa Kata Mereka?</h2>
                <p class="mt-4 max-w-2xl mx-auto opacity-80">Pengalaman dan kesaksian dari mahasiswa, alumni, dan mitra pelayanan kami.</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($testimonis as $testimoni)
                <div class="bg-white/10 backdrop-blur-sm p-8 rounded-2xl border border-white/20">
                    <p class="italic mb-6">"{{ $testimoni->testimoni }}"</p>
                    <div class="flex items-center">
                        <div>
                            <p class="font-bold">{{ $testimoni->nama }}</p>
                            <p class="text-sm opacity-80">{{ $testimoni->jabatan }}</p>
                        </div>
                    </div>
                </div>
                @empty
                <div class="lg:col-span-3 text-center text-white/70"><p>Jadilah yang pertama memberikan testimoni!</p></div>
                @endforelse
            </div>
        </div>
    </section>

    <section id="pengurus" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-extrabold bg-gradient-to-r from-blue-700 to-blue-900 bg-clip-text text-transparent">Jajaran Pimpinan STAKAM</h2>
                <p class="text-gray-600 mt-4 max-w-2xl mx-auto">Dipimpin oleh para akademisi dan hamba Tuhan yang berintegritas dan berdedikasi.</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                @forelse ($pimpinan as $p)
                <div class="flex flex-col items-center group">
                    <img src="{{ Storage::url($p->foto) }}" alt="{{ $p->nama }}" class="w-32 h-32 rounded-full mb-4 object-cover shadow-lg group-hover:scale-110 transition-transform duration-300">
                    <h4 class="font-bold text-lg">{{ $p->nama }}</h4>
                    <p class="text-blue-600 font-semibold">{{ $p->jabatan }}</p>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-500"><p>Data pimpinan akan segera diperbarui.</p></div>
                @endforelse
            </div>
        </div>
    </section>

    <section id="informasi" class="py-20 bg-slate-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-extrabold bg-gradient-to-r from-blue-700 to-blue-900 bg-clip-text text-transparent">Informasi & Tautan</h2>
                <p class="text-gray-600 mt-4 max-w-2xl mx-auto">Tetap terhubung dengan pengumuman terbaru, berita kampus, dan akses cepat ke sumber daya penting.</p>
            </div>

            <div class="grid lg:grid-cols-3 gap-12">
                
                <div class="lg:col-span-2">
                    <div class="mb-8 flex items-center bg-slate-200/60 p-1.5 rounded-full w-full max-w-sm">
                        <button data-tab-target="#pengumuman" class="tab-button active flex-1 py-2.5 px-4 text-sm font-semibold rounded-full focus:outline-none transition-all duration-300">
                            Pengumuman
                        </button>
                        <button data-tab-target="#berita" class="tab-button flex-1 py-2.5 px-4 text-sm font-semibold rounded-full focus:outline-none transition-all duration-300">
                            Berita Kampus
                        </button>
                    </div>

                    <div class="space-y-6">
                       <div id="pengumuman" class="tab-panel active">
                            <div class="space-y-8">
                                
                                @forelse ($pengumumans as $p)
                                    <a href="{{ route('pengumuman.show', $p) }}" class="flex flex-col md:flex-row items-center gap-6 group bg-white p-6 rounded-2xl shadow-sm hover:shadow-xl hover:shadow-blue-500/10 border border-transparent hover:border-slate-200 transition-all duration-300">
                                        
                                        @if($p->file_type == 'image')
                                        <div class="w-full md:w-40 h-40 flex-shrink-0">
                                            <img src="{{ Storage::url($p->file_path) }}" alt="{{ $p->judul }}" class="w-full h-full object-cover rounded-xl">
                                        </div>
                                        @elseif($p->file_type == 'pdf')
                                        <div class="w-full md:w-40 h-40 flex-shrink-0 bg-slate-100 rounded-xl flex items-center justify-center">
                                            <svg class="w-16 h-16 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                        </div>
                                        @endif

                                        <div class="flex-grow">
                                            <p class="text-sm font-semibold text-blue-600 mb-1">{{ $p->created_at->format('d M Y') }}</p>
                                            <h3 class="text-xl font-bold text-gray-800 group-hover:text-blue-700 transition-colors duration-300 mb-2 leading-tight">{{ $p->judul }}</h3>
                                            <p class="text-gray-600 text-sm leading-relaxed line-clamp-2">{{ $p->deskripsi }}</p>
                                        </div>
                                    </a>
                                @empty
                                    <div class="bg-white p-8 rounded-2xl text-center text-gray-500"><p>Belum ada pengumuman terbaru.</p></div>
                                @endforelse

                            </div>
                        </div>

                        <div id="berita" class="tab-panel hidden">
                           <div class="space-y-8">
                                @forelse ($beritas as $berita)
                                  <a href="{{ route('berita.show', $berita) }}" class="flex flex-col md:flex-row items-center gap-6 group bg-white p-6 rounded-2xl shadow-sm hover:shadow-xl hover:shadow-blue-500/10 border border-transparent hover:border-slate-200 transition-all duration-300">
                                        @if($berita->gambar)
                                        <div class="w-full md:w-40 h-40 flex-shrink-0">
                                            <img src="{{ Storage::url($berita->gambar) }}" alt="Gambar Berita" class="w-full h-full object-cover rounded-xl">
                                        </div>
                                        @endif
                                        <div class="flex-grow">
                                            <p class="text-sm font-semibold text-green-600 mb-1">{{ $berita->kategori ?? 'Berita' }} • {{ $berita->created_at->format('d M Y') }}</p>
                                            <h3 class="text-xl font-bold text-gray-800 group-hover:text-blue-700 transition-colors duration-300 mb-2 leading-tight">{{ $berita->judul }}</h3>
                                            <p class="text-gray-600 text-sm leading-relaxed line-clamp-2">{{ $berita->excerpt }}</p>
                                        </div>
                                    </a>
                                @empty
                                     <div class="bg-white p-8 rounded-2xl text-center text-gray-500"><p>Belum ada berita terbaru.</p></div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-1">
                    <div class="bg-white p-8 rounded-2xl shadow-lg border border-slate-200/80 sticky top-28">
                        <h3 class="text-2xl font-bold mb-6 text-gray-800">Tautan Penting</h3>
                        <ul class="space-y-4">
                            @php
                                $links = [
                                    ['name' => 'Sistem Informasi Akademik (SIAKAD)', 'url' => '#'],
                                    ['name' => 'Perpustakaan Digital', 'url' => '#'],
                                    ['name' => 'Jurnal Ilmiah Apollos', 'url' => '#'],
                                    ['name' => 'Kalender Akademik 2025/2026', 'url' => '#'],
                                    ['name' => 'E-Learning STAKAM', 'url' => '#'],
                                    ['name' => 'Panduan Pendaftaran Online', 'url' => '#'],
                                    ['name' => 'Beasiswa dan Bantuan Studi', 'url' => '#'],
                                ];
                            @endphp
                            
                            @foreach ($links as $link)
                            <li>
                                <a href="{{ $link['url'] }}" class="flex justify-between items-center p-4 rounded-lg bg-slate-50 hover:bg-blue-50 group transition-colors duration-300">
                                    <span class="font-semibold text-gray-700 group-hover:text-blue-700">{{ $link['name'] }}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 group-hover:text-blue-600 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let prodiSwiper = null;
        function initOrDestroySwiper() {
            if (prodiSwiper !== null) {
                prodiSwiper.destroy(true, true);
                prodiSwiper = null;
            }
            prodiSwiper = new Swiper('.prodi-slider', {
                effect: 'coverflow', grabCursor: true, centeredSlides: true,
                slidesPerView: 1, loop: true,
                coverflowEffect: { rotate: 0, stretch: 60, depth: 150, modifier: 1, slideShadows: false },
                autoplay: { delay: 2999, disableOnInteraction: false },
                pagination: { el: '.swiper-pagination', clickable: true },
                navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
                breakpoints: { 640: { slidesPerView: 1 }, 768: { slidesPerView: 2 }, 1024: { slidesPerView: 3 } }
            });
        }
        initOrDestroySwiper();
        window.addEventListener('resize', initOrDestroySwiper);

        const tabs = document.querySelectorAll('.tab-button');
        const panels = document.querySelectorAll('.tab-panel');
        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                tabs.forEach(item => item.classList.remove('active'));
                panels.forEach(panel => panel.classList.add('hidden'));
                
                tab.classList.add('active');
                const targetPanel = document.querySelector(tab.dataset.tabTarget);
                if (targetPanel) {
                    targetPanel.classList.remove('hidden');
                }
            });
        });

        if (window.location.hash === '#informasi-berita') {
            document.getElementById('informasi').scrollIntoView({ behavior: 'smooth' });
            const beritaTabButton = document.querySelector('button[data-tab-target="#berita"]');
            if (beritaTabButton) {
                beritaTabButton.click();
            }
        }
    });
</script>
@endpush