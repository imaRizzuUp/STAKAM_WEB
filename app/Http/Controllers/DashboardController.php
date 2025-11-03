<?php

namespace App\Http\Controllers;

use App\Models\Pimpinan;
use App\models\Pendaftar;
use App\models\Testimoni;
use App\Models\KontenHero;
use App\Models\KontenProfil;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        
        $jumlahProdi = ProgramStudi::count();
        $jumlahPimpinan = Pimpinan::count();
        $jumlahTestimoni = Testimoni::count();
        $jumlahPendaftar = Pendaftar::count();

        $pendaftarTerbaru = Pendaftar::latest()->take(5)->get();
      
        $stats = [
            'prodi' => $jumlahProdi,
            'pimpinan' => $jumlahPimpinan,
            'testimoni' => $jumlahTestimoni,
            'pendaftar' => $jumlahPendaftar,
        ];
        
       
        return view('dashboard.index', [
            'title' => 'Dashboard Admin',
            'stats' => $stats,
            'pendaftarTerbaru' => $pendaftarTerbaru,
        ]);
    }


    public function KontenHero() {
        $konten = KontenHero::firstOrCreate(
            ['id' => 1],
            [
                'judul_utama' => 'Membentuk Hamba Tuhan & Pemimpin Kristen Unggul',
                'deskripsi' => 'Menjadi terang dan garam dunia melalui pendidikan teologi yang Alkitabiah, relevan, dan transformatif di STAKAM Apollos Manado.'
            ]
        );

        return view('dashboard.kontenHero', [
            'title' => 'Manajemen Konten Hero',
            'konten' => $konten
        ]);
    }

    public function updateKontenHero(Request $request)
    {
       
        $validatedData = $request->validate([
            'judul_utama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar_utama' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'gambar_latar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

       
        $konten = KontenHero::find(1);

        $konten->judul_utama = $validatedData['judul_utama'];
        $konten->deskripsi = $validatedData['deskripsi'];

       
        if ($request->hasFile('gambar_utama')) {
            
            if ($konten->gambar_utama) {
                Storage::delete('public/' . $konten->gambar_utama);
            }
           
            $path = $request->file('gambar_utama')->store('hero', 'public');
            $konten->gambar_utama = $path;
        }
        
       
        if ($request->hasFile('gambar_latar')) {
            if ($konten->gambar_latar) {
                Storage::delete('public/' . $konten->gambar_latar);
            }
            $path = $request->file('gambar_latar')->store('hero', 'public');
            $konten->gambar_latar = $path;
        }

        $konten->save();

        return back()->with('success', 'Konten hero berhasil diperbarui!');
    }

    
    // konten profil
    public function kontenProfil()
    {
        $konten = KontenProfil::firstOrCreate(['id' => 1]);

        return view('dashboard.kontenProfil', [
            'title' => 'Manajemen Konten Profil',
            'konten' => $konten
        ]);
    }

    public function updateKontenProfil(Request $request)
    {
        $konten = KontenProfil::find(1);

        $validatedData = $request->validate([
            'judul_profil' => 'required|string|max:255',
            'paragraf_satu' => 'nullable|string',
            'paragraf_dua' => 'nullable|string',
            'gambar_profil' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'kartu1_judul' => 'required|string|max:255',
            'kartu1_deskripsi' => 'required|string|max:255',
            'kartu2_judul' => 'required|string|max:255',
            'kartu2_deskripsi' => 'required|string|max:255',
            'kartu3_judul' => 'required|string|max:255',
            'kartu3_deskripsi' => 'required|string|max:255',
        ]);

        if ($request->hasFile('gambar_profil')) {
            if ($konten->gambar_profil) {
                Storage::delete('public/' . $konten->gambar_profil);
            }
            $path = $request->file('gambar_profil')->store('profil', 'public');
            $konten->gambar_profil = $path;
        }

        $konten->judul = $request->judul_profil;
        $konten->paragraf_satu = $request->paragraf_satu;
        $konten->paragraf_dua = $request->paragraf_dua;
        $konten->kartu1_judul = $request->kartu1_judul;
        $konten->kartu1_deskripsi = $request->kartu1_deskripsi;
        $konten->kartu2_judul = $request->kartu2_judul;
        $konten->kartu2_deskripsi = $request->kartu2_deskripsi;
        $konten->kartu3_judul = $request->kartu3_judul;
        $konten->kartu3_deskripsi = $request->kartu3_deskripsi;

        $konten->save();

        return back()->with('success', 'Konten profil berhasil diperbarui!');
    }


    // program studi
    public function programStudi()
    {
        $programStudi = ProgramStudi::orderBy('id')->get();
        return view('dashboard.programStudi', [
            'title' => 'Manajemen Program Studi',
            'programStudi' => $programStudi
        ]);
    }

    public function storeProgramStudi(Request $request)
    {
        $validatedData = $request->validate([
            'jenjang' => 'required|string',
            'nama_prodi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'link_detail' => 'nullable|url',
        ]);

        ProgramStudi::create($validatedData);
        return back()->with('success', 'Program studi baru berhasil ditambahkan!');
    }

    public function updateProgramStudi(Request $request, ProgramStudi $programStudi)
    {
        $validatedData = $request->validate([
            'jenjang' => 'required|string',
            'nama_prodi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'link_detail' => 'nullable|url',
        ]);

        $programStudi->update($validatedData);
        return back()->with('success', 'Program studi berhasil diperbarui!');
    }

    public function destroyProgramStudi(ProgramStudi $programStudi)
    {
        $programStudi->delete();
        return back()->with('success', 'Program studi berhasil dihapus!');
    }



    // pimpinan
    public function pimpinan()
    {
        return view('dashboard.pimpinan', [
            'title' => 'Manajemen Pimpinan',
            'pimpinan' => Pimpinan::all()
        ]);
    }


    public function storePimpinan(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $path = $request->file('foto')->store('pimpinan', 'public');
        $validatedData['foto'] = $path;

        Pimpinan::create($validatedData);
        return back()->with('success', 'Data pimpinan baru berhasil ditambahkan!');
    }

    public function updatePimpinan(Request $request, Pimpinan $pimpinan)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($pimpinan->foto) {
                Storage::delete('public/' . $pimpinan->foto);
            }
            $path = $request->file('foto')->store('pimpinan', 'public');
            $validatedData['foto'] = $path;
        }

        $pimpinan->update($validatedData);
        return back()->with('success', 'Data pimpinan berhasil diperbarui!');
    }

    public function destroyPimpinan(Pimpinan $pimpinan)
    {
        if ($pimpinan->foto) {
            Storage::delete('public/' . $pimpinan->foto);
        }
        
        $pimpinan->delete();
        return back()->with('success', 'Data pimpinan berhasil dihapus!');
    }


    // testimoni
      public function testimoni()
    {
        return view('dashboard.testimoni', [
            'title' => 'Manajemen Testimoni',
            'testimonis' => Testimoni::all()
        ]);
    }

   
    public function storeTestimoni(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'testimoni' => 'required|string',
        ]);

        Testimoni::create($validatedData);
        return back()->with('success', 'Testimoni baru berhasil ditambahkan!');
    }

   
    public function updateTestimoni(Request $request, Testimoni $testimoni)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'testimoni' => 'required|string',
        ]);

        $testimoni->update($validatedData);
        return back()->with('success', 'Testimoni berhasil diperbarui!');
    }

   
    public function destroyTestimoni(Testimoni $testimoni)
    {
        $testimoni->delete();
        return back()->with('success', 'Testimoni berhasil dihapus!');
    }


    // pendaftar
    public function pendaftar(Request $request)
    {
        $query = Pendaftar::latest(); 

       
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        return view('dashboard.pendaftar', [
            'title' => 'Manajemen Pendaftar',
            'pendaftars' => $query->paginate(10), 
        ]);
    }

    public function detailPendaftar(Pendaftar $pendaftar)
    {
       
        return response()->json($pendaftar);
    }

    public function updateStatusPendaftar(Request $request, Pendaftar $pendaftar)
    {
        $request->validate(['status' => 'required|string']);
        $pendaftar->update(['status' => $request->status]);
        return back()->with('success', 'Status pendaftar berhasil diubah!');
    }

    public function destroyPendaftar(Pendaftar $pendaftar)
    {
        
        $filesToDelete = ['file_ijazah', 'file_ktp', 'file_kk', 'file_pas_foto', 'file_khs'];
        foreach ($filesToDelete as $file) {
            if ($pendaftar->$file) {
                Storage::delete('public/' . $pendaftar->$file);
            }
        }
        $pendaftar->delete();
        return back()->with('success', 'Data pendaftar berhasil dihapus!');
    }
}
