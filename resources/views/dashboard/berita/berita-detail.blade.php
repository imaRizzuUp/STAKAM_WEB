@extends('layouts.frontend')

@section('title', $berita->judul . ' - STAKAM')

@section('content')

    <section class="py-20 pt-40 bg-white"> {{-- pt-40 untuk memberi ruang bagi header fixed --}}
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-3 gap-12">

                <div class="lg:col-span-2 break-words min-w-0">

                    @if($berita->gambar)
                        <img src="{{ Storage::url($berita->gambar) }}" 
                             alt="{{ $berita->judul }}" 
                             class="w-full h-auto max-h-[500px] object-cover rounded-2xl shadow-lg mb-8">
                    @endif

                    <div class="mb-6 flex items-center space-x-4">
                        <span class="bg-blue-100 text-blue-800 text-sm font-semibold px-3 py-1 rounded-full">{{ $berita->kategori ?? 'Berita' }}</span>
                        <span class="text-gray-500 text-sm">Dipublikasikan pada {{ $berita->created_at->format('d M Y') }}</span>
                    </div>

                    <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-8 leading-tight">{{ $berita->judul }}</h1>
                    
                    <p class="text-lg text-gray-600 italic border-l-4 border-blue-500 pl-4 py-2 mb-8">
                        {{ $berita->excerpt }}
                    </p>

                    <div class="prose text-gray-800 max-w-none">
                        {{-- 
                            PENTING: 
                            Jika 'isi' Anda mengandung HTML (dari Rich Text Editor), gunakan: {!! $berita->isi !!}
                            Jika 'isi' Anda hanya teks biasa, gunakan: {{ $berita->isi }}
                            
                            ASUMSI: Anda menggunakan teks biasa dengan line break.
                            Fungsi nl2br() mengubah \n menjadi <br>
                        --}}
                        
                        @if($berita->isi)
                            {!! nl2br(e($berita->isi)) !!}
                        @else
                            {{-- Jika 'isi' kosong, tampilkan excerpt lagi --}}
                            <p>{{ $berita->excerpt }}</p>
                        @endif
                    </div>
                </div>

                <div class="lg:col-span-1">
                    <div class="bg-slate-50 p-6 rounded-2xl shadow-sm border border-slate-200/80 sticky top-28">
                        <h3 class="text-2xl font-bold mb-6 text-gray-800">Berita Lainnya</h3>
                        <div class="space-y-6">
                            @forelse ($beritaLainnya as $item)
                                <a href="{{ route('berita.show', $item) }}" class="flex group @if($item->gambar) gap-4 items-center @endif">
                                    @if($item->gambar)
                                        <img src="{{ Storage::url($item->gambar) }}" 
                                             alt="{{ $item->judul }}" 
                                             class="w-24 h-20 object-cover rounded-lg flex-shrink-0">
                                    @endif
                                    <div>
                                        <h4 class="font-semibold text-gray-800 group-hover:text-blue-700 transition-colors duration-300 line-clamp-2 leading-tight">
                                            {{ $item->judul }}
                                        </h4>
                                        <p class="text-sm text-gray-500 mt-1">{{ $item->created_at->format('d M Y') }}</p>
                                    </div>
                                </a>
                            @empty
                                <p class="text-gray-500">Tidak ada berita lainnya.</p>
                            @endforelse
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection