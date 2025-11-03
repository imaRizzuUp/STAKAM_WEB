<?php

namespace App\Http\Controllers;

use App\Models\Pimpinan;
use App\models\Testimoni;
use App\Models\KontenHero;
use App\Models\KontenProfil;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        
        $hero = KontenHero::firstOrCreate(
            ['id' => 1],
            [
                'judul_utama' => 'Membentuk Hamba Tuhan & Pemimpin Kristen Unggul',
                'deskripsi' => 'Menjadi terang dan garam dunia melalui pendidikan teologi yang Alkitabiah, relevan, dan transformatif di STAKAM Apollos Manado.',
                'gambar_utama' => null, 
                'gambar_latar' => null,  
            ]
        );

        $profil = KontenProfil::firstOrCreate(
            ['id' => 1],
            [
                'judul' => 'Selamat Datang di STAKAM',
                'paragraf_satu' => 'Sekolah Tinggi Agama Kristen Apollos Manado (STAKAM) adalah lembaga pendidikan tinggi teologi yang berkomitmen untuk memperlengkapi para mahasiswa dengan pengetahuan Alkitab yang mendalam, karakter rohani yang kokoh, dan keterampilan pelayanan yang efektif.',
                'paragraf_dua' => 'Dengan visi untuk menghasilkan lulusan yang berdampak bagi gereja dan masyarakat, kami mengintegrasikan keunggulan akademik dengan pembinaan spiritual yang intensif.',
                'gambar_profil' => null,
                'kartu1_judul' => 'Akreditasi',
                'kartu1_deskripsi' => 'Terakreditasi BAN-PT',
                'kartu2_judul' => 'Dosen Kompeten',
                'kartu2_deskripsi' => 'Praktisi & Akademisi Ahli',
                'kartu3_judul' => 'Lingkungan Belajar',
                'kartu3_deskripsi' => 'Kondusif & Spiritual',
            ]
        );

        
         if (ProgramStudi::count() === 0) {
            ProgramStudi::insert([
                [
                    'jenjang' => 'Sarjana',
                    'nama_prodi' => 'S1 Pendidikan Agama Kristen',
                    'deskripsi' => 'Mempersiapkan calon guru agama Kristen yang profesional dan berkarakter.',
                    'link_detail' => '#',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'jenjang' => 'Sarjana',
                    'nama_prodi' => 'S1 Teologi',
                    'deskripsi' => 'Membekali mahasiswa dengan pemahaman teologi yang mendalam untuk pelayanan.',
                    'link_detail' => '#',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'jenjang' => 'Magister',
                    'nama_prodi' => 'S2 Pendidikan Agama Kristen',
                    'deskripsi' => 'Program lanjut untuk menjadi pemimpin dan inovator pendidikan Kristen.',
                    'link_detail' => '#',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'jenjang' => 'Magister',
                    'nama_prodi' => 'S2 Teologi',
                    'deskripsi' => 'Memperdalam kajian teologi secara kritis dan konstruktif untuk tantangan zaman.',
                    'link_detail' => '#',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'jenjang' => 'Doktor',
                    'nama_prodi' => 'S3 Teologi',
                    'deskripsi' => 'Menghasilkan teolog dan peneliti Kristen yang orisinal dan kontributif.',
                    'link_detail' => '#',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
        
        
        $programStudi = ProgramStudi::all();


        
        if (Pimpinan::count() === 0) {
            Pimpinan::insert([
                [
                    'nama' => 'Pdt. Herry Dahlan, M.Th, M.Mis',
                    'jabatan' => 'Ketua',
                    'foto' => 'picture/pimpinan_stakam/Herry-Dahlan.png',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama' => 'Dr. Alfrets Daleno, M.Pdk',
                    'jabatan' => 'Wakil Ketua I',
                    'foto' => 'picture/pimpinan_stakam/Alfrets-Daleno.png',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama' => 'Dr. Trevor Watulingas, M.Pdk',
                    'jabatan' => 'Wakil Ketua II',
                    'foto' => 'picture/pimpinan_stakam/Trevor-Watulingas.png',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nama' => 'Dr. Royke Rumangkang',
                    'jabatan' => 'Wakil Ketua III',
                    'foto' => 'picture/pimpinan_stakam/Royke-Rumangkang.png',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
        

    $pimpinan = Pimpinan::all();
    

if (Testimoni::count() === 0) {
        Testimoni::insert([
            [
                'nama' => 'Maria Lumentut',
                'jabatan' => 'Alumni S1 Teologi, 2022',
                'testimoni' => 'STAKAM tidak hanya memberi saya ilmu, tetapi juga membentuk karakter saya sebagai hamba Tuhan. Dosen-dosennya sangat membimbing dan komunitasnya begitu hangat.',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'nama' => 'Pdt. Yohanes Simanjuntak',
                'jabatan' => 'Mahasiswa S2 PAK',
                'testimoni' => 'Studi S2 di STAKAM membuka wawasan saya lebih luas. Diskusi di kelas sangat mendalam dan relevan dengan tantangan pelayanan yang saya hadapi saat ini.',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'nama' => 'Dr. (Cand.) Sarah T.',
                'jabatan' => 'Mahasiswi S3 Teologi',
                'testimoni' => 'Sebagai pendidik, saya bangga bisa melanjutkan studi di program doktoral STAKAM. Riset saya didukung penuh dan saya bisa berkontribusi bagi ilmu teologi.',
                'created_at' => now(), 'updated_at' => now(),
            ],
        ]);
    }
    $testimonis = Testimoni::all();

    return view('welcome', [ 
        'hero' => $hero,
        'profil' => $profil,
        'programStudi' => $programStudi,
        'pimpinan' => $pimpinan,
        'testimonis' => $testimonis, 
    ]);

    }

    public function formPendaftaran()
    {
        return view('pendaftaran.form', [
            'title' => 'Formulir Pendaftaran Mahasiswa Baru'
        ]);
    }


    public function prosesPendaftaran(Request $request)
    {
        
        dd($request->all());
    }
}
