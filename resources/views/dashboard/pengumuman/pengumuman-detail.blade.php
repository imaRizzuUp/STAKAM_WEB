@extends('layouts.frontend')

@section('title', $pengumuman->judul . ' - STAKAM')

@section('content')

<section class="py-20 pt-28 lg:pt-40 bg-white">
    <div class="container mx-auto px-6">
        <div class="grid lg:grid-cols-3 gap-8 lg:gap-12">

            <div class="lg:col-span-2 break-words min-w-0">
                
                <div class="mb-6">
                    <span class="bg-blue-100 text-blue-800 text-sm font-semibold px-3 py-1 rounded-full">Pengumuman</span>
                    <span class="text-gray-500 text-sm ml-4">Dipublikasikan pada {{ $pengumuman->created_at->format('d M Y') }}</span>
                </div>

                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-6 leading-tight">{{ $pengumuman->judul }}</h1>
                
                <p class="text-lg text-gray-600 italic border-l-4 border-blue-500 pl-4 py-2 mb-8">
                    {{ $pengumuman->deskripsi }}
                </p>

                {{-- [PERBAIKAN] Bungkus seluruh blok file dalam @if --}}
                @if($pengumuman->file_path)
                    <div class="mb-8">
                        <a href="{{ Storage::url($pengumuman->file_path) }}" download
                           class="inline-flex items-center bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg hover:bg-blue-700 transition duration-300">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                            Download File Lampiran
                        </a>
                    </div>

                    <div class="mb-8">
                        @if($pengumuman->file_type == 'pdf')
                            <h3 class="text-2xl font-bold text-gray-800 mb-4">Pratinjau Dokumen</h3>
                            {{-- Container ini akan diisi halaman PDF oleh PDF.js --}}
                            <div id="pdf-viewer-container" class="w-full">
                                </div>
                            {{-- Indikator loading untuk PDF.js --}}
                            <div id="pdf-loading" class="my-4 text-center text-gray-600">
                                <p>Memuat pratinjau dokumen...</p>
                            </div>

                        @elseif($pengumuman->file_type == 'image')
                            <h3 class="text-2xl font-bold text-gray-800 mb-4">Lampiran Gambar</h3>
                            <img src="{{ Storage::url($pengumuman->file_path) }}" 
                                 alt="{{ $pengumuman->judul }}" 
                                 class="w-full h-auto object-cover rounded-2xl shadow-lg">
                        @endif
                    </div>
                @endif
                {{-- [AKHIR PERBAIKAN] --}}

                @if($pengumuman->isi)
                    <div class="prose text-gray-800 max-w-none mt-8 @if($pengumuman->file_path) pt-8 border-t @endif">
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Keterangan Tambahan</h3>
                        {!! nl2br(e($pengumuman->isi)) !!}
                    </div>
                @endif
            </div>

            <div class="lg:col-span-1">
                <div class="bg-slate-50 p-6 rounded-2xl shadow-sm border border-slate-200/80 lg:sticky top-28">
                    <h3 class="text-2xl font-bold mb-6 text-gray-800">Pengumuman Lainnya</h3>
                    <div class="space-y-6">
                        
                        @forelse ($pengumumanLainnya as $item)
                            <a href="{{ route('pengumuman.show', $item) }}" class="flex group @if($item->file_type == 'image') gap-4 items-center @endif">
                                
                                @if($item->file_type == 'image')
                                    <img src="{{ Storage::url($item->file_path) }}" 
                                         alt="{{ $item->judul }}" 
                                         class="w-24 h-20 object-cover rounded-lg flex-shrink-0">
                                @endif

                                <div>
                                    <h4 class="font-semibold text-gray-800 group-hover:text-blue-700 transition-colors duration-300 line-clamp-3 leading-tight">
                                        {{ $item->judul }}
                                    </h4>
                                    <p class="text-sm text-gray-500 mt-1">{{ $item->created_at->format('d M Y') }}</p>
                                </div>
                            </a>
                        @empty
                            <p class="text-gray-500">Tidak ada pengumuman lainnya.</p>
                        @endforelse

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

@push('scripts')
{{-- Script PDF.js HANYA dimuat jika file_path ada DAN tipenya pdf --}}
@if($pengumuman->file_path && $pengumuman->file_type == 'pdf')
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.worker.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tentukan lokasi file worker PDF.js
            pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.worker.min.js';

            const url = '{{ Storage::url($pengumuman->file_path) }}';
            const container = document.getElementById('pdf-viewer-container');
            const loadingIndicator = document.getElementById('pdf-loading');
            
            // Mulai memuat dokumen PDF
            pdfjsLib.getDocument(url).promise.then(function(pdf) {
                loadingIndicator.textContent = `Merender ${pdf.numPages} halaman...`;
                
                const numPages = pdf.numPages;
                let pagesRendered = 0;

                // Loop untuk setiap halaman (dari 1 sampai total halaman)
                for (let pageNum = 1; pageNum <= numPages; pageNum++) {
                    
                    pdf.getPage(pageNum).then(function(page) {
                        
                        // Tentukan skala: buat agar pas dengan lebar kontainer
                        const containerWidth = container.offsetWidth; 
                        const originalViewport = page.getViewport({ scale: 1 });
                        const scale = containerWidth / originalViewport.width;
                        const viewport = page.getViewport({ scale: scale });

                        // Buat elemen <canvas> untuk halaman ini
                        const canvas = document.createElement('canvas');
                        const context = canvas.getContext('2d');
                        canvas.height = viewport.height;
                        canvas.width = viewport.width;

                        // Beri style pada canvas
                        canvas.style.display = 'block';
                        canvas.style.maxWidth = '100%';
                        canvas.style.height = 'auto';
                        canvas.style.marginBottom = '20px'; // Jarak antar halaman
                        canvas.style.boxShadow = '0 6px 15px rgba(0,0,0,0.15)';
                        canvas.style.borderRadius = '4px';

                        // Tambahkan canvas ke dalam div container
                        container.appendChild(canvas);

                        // Render halaman PDF ke dalam canvas
                        page.render({
                            canvasContext: context,
                            viewport: viewport
                        }).promise.then(function () {
                            pagesRendered++;
                            // Jika semua halaman sudah dirender, sembunyikan loading
                            if (pagesRendered === numPages) {
                                loadingIndicator.style.display = 'none';
                            }
                        });
                    });
                }
            }).catch(function (reason) {
                // Tangani error jika PDF gagal dimuat
                console.error('Error loading PDF: ' + reason);
                loadingIndicator.textContent = 'Gagal memuat pratinjau PDF.';
                loadingIndicator.style.color = 'red';
            });
        });
    </script>
@endif
@endpush