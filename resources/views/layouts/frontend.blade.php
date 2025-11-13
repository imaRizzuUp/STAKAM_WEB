<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'STAKAM - Sekolah Tinggi Agama Kristen Apollos Manado')</title>

    <link rel="icon" type="image/png" href="{{ asset('picture/logo/STAKAM_Logo.png') }}">
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Poppins', sans-serif; }
        
        .hero-bg-image { 
            background-image: linear-gradient(rgba(10, 30, 60, 0.75), rgba(10, 30, 60, 0.75)), url('{{ asset('picture/background/background.png') }}'); 
        }
        
        .swiper { overflow: visible !important; }
        .swiper-slide {
            transition: transform 0.4s ease, opacity 0.4s ease;
            transform: scale(0.85);
            opacity: 0.6;
        }
        .swiper-slide-active {
            transform: scale(1);
            opacity: 1;
        }
        .swiper-button-next, .swiper-button-prev {
            color: #2563eb; 
            width: 50px;
            height: 50px;
        }
        .swiper-button-next::after, .swiper-button-prev::after { font-size: 2rem !important; }
        .swiper-pagination-bullet { background-color: #d1d5db; }
        .swiper-pagination-bullet-active { background-color: #2563eb !important; }

        .tab-button.active {
            background-color: #2563eb; 
            color: white;
            box-shadow: 0 4px 14px 0 rgb(37 99 235 / 30%);
        }
        .line-clamp-2 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
        }
        .prose { max-width: 65ch; }
        .prose h1 { font-size: 2.25rem; font-weight: 800; margin-bottom: 1rem; }
        .prose h2 { font-size: 1.875rem; font-weight: 700; margin-bottom: 1rem; margin-top: 2rem; }
        .prose p { line-height: 1.75; margin-bottom: 1.5rem; }
        .prose ul { list-style-type: disc; padding-left: 2rem; margin-bottom: 1.5rem; }
        .prose ol { list-style-type: decimal; padding-left: 2rem; margin-bottom: 1.5rem; }
        .prose li { margin-bottom: 0.5rem; }
        .prose strong { font-weight: 600; }
        .prose blockquote { border-left: 4px solid #2563eb; padding-left: 1rem; margin-left: 0; font-style: italic; color: #4b5563; }
        .prose img { border-radius: 0.75rem; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1); }
    </style>
    @stack('styles')
</head>
<body class="bg-slate-50 text-gray-800">

    <header class="bg-white/80 backdrop-blur-sm shadow-lg fixed w-full top-0 z-50 transition-all duration-300">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="flex items-center text-2xl font-bold text-blue-800">
                <img src="{{ asset('picture/logo/STAKAM_Logo.png') }}" alt="Logo STAKAM" class="h-12 mr-3">
                <span class="bg-gradient-to-r from-blue-700 to-blue-900 bg-clip-text text-transparent">STAKAM</span>
            </a>
            <div class="hidden md:flex space-x-8 items-center font-medium">
                <a href="{{ url('/#hero') }}" class="text-gray-600 hover:text-blue-600 transition duration-300">Beranda</a>
                <a href="{{ url('/#profil') }}" class="text-gray-600 hover:text-blue-600 transition duration-300">Profil</a>
                <a href="{{ url('/#prodi') }}" class="text-gray-600 hover:text-blue-600 transition duration-300">Program Studi</a>
                <a href="{{ url('/#informasi') }}" class="text-gray-600 hover:text-blue-600 transition duration-300">Informasi</a>
                <a href="{{ url('/#pengurus') }}" class="text-gray-600 hover:text-blue-600 transition duration-300">Pimpinan</a>
                
                <a href="{{route('panduan.wifi')}}" class="text-gray-600 hover:text-blue-600 transition duration-300">Panduan Wi-Fi</a>
                
                <a href="{{ route('pendaftaran.form') }}" class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-5 py-2.5 rounded-full hover:shadow-lg hover:shadow-blue-500/40 transform hover:scale-105 transition-all duration-300">Pendaftaran</a>
            </div>
            <button id="mobile-menu-button" class="md:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" /></svg>
            </button>
        </nav>
        <div id="mobile-menu" class="hidden md:hidden bg-white px-6 pb-4">
            <a href="{{ url('/#hero') }}" class="block py-2 text-gray-600 hover:text-blue-600">Beranda</a>
            <a href="{{ url('/#profil') }}" class="block py-2 text-gray-600 hover:text-blue-600">Profil</a>
            <a href="{{ url('/#prodi') }}" class="block py-2 text-gray-600 hover:text-blue-600">Program Studi</a>
            <a href="{{ url('/#informasi') }}" class="block py-2 text-gray-600 hover:text-blue-600">Informasi</a>
            <a href="{{ url('/#pengurus') }}" class="block py-2 text-gray-600 hover:text-blue-600">Pimpinan</a>

            <a href="{{ route('panduan.wifi') }}" class="block py-2 text-gray-600 hover:text-blue-600">Panduan Wi-Fi</a>
            
            <a href="{{ route('pendaftaran.form') }}" class="block mt-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white text-center px-4 py-2 rounded-full hover:bg-blue-700">Pendaftaran</a>
        </div>
    </header>

    <main>
        @yield('content')
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
                        </div>
                    </div>
                </div>
                <div class="space-y-8">
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Tautan Cepat</h3>
                        <ul class="space-y-2">
                            <li><a href="{{ url('/#profil') }}" class="text-gray-400 hover:text-white transition-colors">Tentang Kami</a></li>
                            <li><a href="{{ url('/#prodi') }}" class="text-gray-400 hover:text-white transition-colors">Program Studi</a></li>
                            <li><a href="{{ url('/#pengurus') }}" class="text-gray-400 hover:text-white transition-colors">Pimpinan</a></li>
                            <li><a href="{{ route('pendaftaran.form') }}" class="text-gray-400 hover:text-white transition-colors">PMB Online</a></li>
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
                        <iframe src="http://googleusercontent.com/maps/google.com/0" 
                            class="w-full h-64 border-0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Peta Lokasi STAKAM Apollos Manado">
                        </iframe>
                    </div>
                </div>
            </div>
            <div class="mt-12 pt-8 border-t border-gray-700 text-center text-gray-500">
                <p>© {{ date('Y') }} STAKAM Apollos Manado. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('mobile-menu-button').addEventListener('click', function() {
                document.getElementById('mobile-menu').classList.toggle('hidden');
            });
        });
    </script>
    
    @stack('scripts')

</body>
</html>