<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STAKAM - Sekolah Tinggi Agama Kristen Apollos Manado</title>

    <link rel="icon" type="image/png" href="picture/logo/STAKAM_Logo.png">
    
    
    <script src="https://cdn.tailwindcss.com"></script>
    
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Poppins', sans-serif; }
        
        .hero-bg-image { 
            background-image: linear-gradient(rgba(10, 30, 60, 0.75), rgba(10, 30, 60, 0.75)), url('picture/background/background.png'); 
        }
        
        .swiper {
            overflow: visible !important;
        }

        .swiper-slide {
            transition: transform 0.4s ease, opacity 0.4s ease;
            transform: scale(0.85);
            opacity: 0.6;
        }

        .swiper-slide-active {
            transform: scale(1);
            opacity: 1;
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: #2563eb; 
            width: 50px;
            height: 50px;
        }
        .swiper-button-next::after,
        .swiper-button-prev::after {
            font-size: 2rem !important;
        }

        .swiper-pagination-bullet { background-color: #d1d5db; }
        .swiper-pagination-bullet-active { background-color: #2563eb !important; }
    </style>
</head>
<body class="bg-slate-50 text-gray-800">

    <header class="bg-white/80 backdrop-blur-sm shadow-lg fixed w-full top-0 z-50 transition-all duration-300">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="#" class="flex items-center text-2xl font-bold text-blue-800">
                <img src="picture/logo/STAKAM_Logo.png" alt="Logo STAKAM" class="h-12 mr-3">
                <span class="bg-gradient-to-r from-blue-700 to-blue-900 bg-clip-text text-transparent">STAKAM</span>
            </a>
            <div class="hidden md:flex space-x-8 items-center font-medium">
                <a href="#hero" class="text-gray-600 hover:text-blue-600 transition duration-300">Beranda</a>
                <a href="#profil" class="text-gray-600 hover:text-blue-600 transition duration-300">Profil</a>
                <a href="#prodi" class="text-gray-600 hover:text-blue-600 transition duration-300">Program Studi</a>
                <a href="#pengurus" class="text-gray-600 hover:text-blue-600 transition duration-300">Pimpinan</a>
                <a href="{{ route('pendaftaran.form') }}" class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-5 py-2.5 rounded-full hover:shadow-lg hover:shadow-blue-500/40 transform hover:scale-105 transition-all duration-300">Pendaftaran</a>
            </div>
            <button id="mobile-menu-button" class="md:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" /></svg>
            </button>
        </nav>
        <div id="mobile-menu" class="hidden md:hidden bg-white px-6 pb-4">
            <a href="#hero" class="block py-2 text-gray-600 hover:text-blue-600">Beranda</a>
            <a href="#profil" class="block py-2 text-gray-600 hover:text-blue-600">Profil</a>
            <a href="#prodi" class="block py-2 text-gray-600 hover:text-blue-600">Program Studi</a>
            <a href="#pengurus" class="block py-2 text-gray-600 hover:text-blue-600">Pimpinan</a>
            <a href="{{ route('pendaftaran.form') }}" class="block mt-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white text-center px-4 py-2 rounded-full hover:bg-blue-700">Pendaftaran</a>
        </div>
    </header>

    <main>
        
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
                                <img src="picture/icon/icon-Akreditasi.png" alt="Ikon Akreditasi" class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 h-20 w-auto">
                                <div>
                                    <h3 class="font-bold text-blue-800 text-xl">{{ $profil->kartu1_judul }}</h3>
                                    <p class="text-sm text-gray-600 mt-1">{{ $profil->kartu1_deskripsi }}</p>
                                </div>
                            </div>
                            
                            <div class="relative bg-white pt-12 pb-6 px-4 rounded-xl shadow-xl shadow-blue-500/10 text-center">
                                <img src="picture/icon/dosen.png" alt="Ikon Dosen" class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 h-24 w-auto">
                                <div>
                                    <h3 class="font-bold text-blue-800 text-xl">{{ $profil->kartu2_judul }}</h3>
                                    <p class="text-sm text-gray-600 mt-1">{{ $profil->kartu2_deskripsi }}</p>
                                </div>
                            </div>
                           
                            <div class="relative bg-white pt-12 pb-6 px-4 rounded-xl shadow-xl shadow-blue-500/10 text-center">
                                <img src="picture/icon/buku.png" alt="Ikon Lingkungan Belajar" class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 h-20 w-auto">
                                <div>
                                    <h3 class="font-bold text-blue-800 text-xl">{{ $profil->kartu3_judul }}</h3>
                                    <p class="text-sm text-gray-600 mt-1">{{ $profil->kartu3_deskripsi }}</p>
                                </div>
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
          <p class="text-gray-600 mt-4 max-w-2xl mx-auto">
            Pilihlah jenjang pendidikan yang sesuai dengan panggilan dan tujuan pelayanan Anda.
          </p>
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
              Pelajari Lebih Lanjut <span class="group-hover:ml-2 transition-all">&rarr;</span>
            </a>
          </div>
        @empty
          <div class="text-center w-full py-10">
              <p class="text-gray-500">Program studi akan segera tersedia.</p>
          </div>
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
                    <div class="lg:col-span-3 text-center text-white/70">
                        <p>Jadilah yang pertama memberikan testimoni!</p>
                    </div>
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
            <div class="col-span-full text-center text-gray-500">
                Data pimpinan akan segera diperbarui.
            </div>
            @endforelse
            </div>
        </div>
    </section>
    </main>

    <footer class="bg-gradient-to-t from-slate-900 to-gray-800 text-white py-16">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                <div class="space-y-8">
                    <div>
                        <h3 class="text-xl font-bold mb-4">STAKAM Apollos</h3>
                        <p class="text-gray-400">Membentuk dan memperlengkapi pemimpin Kristen untuk melayani Tuhan dan sesama.</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Media Sosial</h3>
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-400 hover:text-white transition-colors"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg></a>
                            <a href="#" class="text-gray-400 hover:text-white transition-colors"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06...etc" clip-rule="evenodd" /></svg></a>
                        </div>
                    </div>
                </div>
                <div class="space-y-8">
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Tautan Cepat</h3>
                        <ul class="space-y-2">
                            <li><a href="#profil" class="text-gray-400 hover:text-white transition-colors">Tentang Kami</a></li>
                            <li><a href="#prodi" class="text-gray-400 hover:text-white transition-colors">Program Studi</a></li>
                            <li><a href="#pengurus" class="text-gray-400 hover:text-white transition-colors">Pimpinan</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">PMB Online</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Kontak Kami</h3>
                        <ul class="space-y-3 text-gray-400">
                            <li class="flex items-start"><svg class="w-5 h-5 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg><span>Winangun Satu, Kota Manado</span></li>
                            <li class="flex items-start"><svg class="w-5 h-5 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                <div>
                                    <a href="tel:0431824477" class="hover:text-white transition-colors">0431-824477</a>, <a href="tel:+6285240508881" class="hover:text-white transition-colors">085240508881</a>, <a href="tel:+6281354580965" class="hover:text-white transition-colors">081354580965</a>
                                </div>
                            </li>
                            <li class="flex items-center"><svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg><a href="mailto:info@stakam.ac.id" class="hover:text-white transition-colors">info@stakam.ac.id</a></li>
                        </ul>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Lokasi Kami</h3>
                    <div class="overflow-hidden rounded-lg shadow-lg">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d388.7643826277563!2d124.84076896750598!3d1.443986550685484!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x328774a20fa81539%3A0x5685bd0ae1e63c8e!2sSekolah%20Tinggi%20Agama%20Kristen%20Apollos%2C%20Winangun%20Satu%2C%20Kec.%20Malalayang%2C%20Kota%20Manado%2C%20Sulawesi%20Utara!5e0!3m2!1sid!2sid!4v1761904019657!5m2!1sid!2sid" 
                            class="w-full h-64 border-0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Peta Lokasi STAKAM Apollos Manado">
                        </iframe>
                    </div>
                </div>
            </div>
            <div class="mt-12 pt-8 border-t border-gray-700 text-center text-gray-500">
                <p>&copy; 2025 STAKAM Apollos Manado. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
       
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });

      
        let prodiSwiper = null;
        function initOrDestroySwiper() {
            if (prodiSwiper !== null) {
                prodiSwiper.destroy(true, true);
                prodiSwiper = null;
            }
            prodiSwiper = new Swiper('.prodi-slider', {
                effect: 'coverflow',
                grabCursor: true,
                centeredSlides: true,
                slidesPerView: 1,
                loop: true,
                coverflowEffect: {
                    rotate: 0,
                    stretch: 60,
                    depth: 150,
                    modifier: 1,
                    slideShadows: false,
                },
                autoplay: {
                    delay: 2999,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                breakpoints: {
                    640: { slidesPerView: 1 },
                    768: { slidesPerView: 2 },
                    1024: { slidesPerView: 3 }
                }
            });
        }
        document.addEventListener('DOMContentLoaded', initOrDestroySwiper);
        window.addEventListener('resize', initOrDestroySwiper);
    </script>

</body>
</html>