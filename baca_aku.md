# Website Sekolah Tinggi Agama Kristen Apollos Manado (STAKAM)

![Logo STAKAM](public/picture/logo/STAKAM_Logo.png)

Ini adalah repositori untuk website resmi STAKAM yang dibangun menggunakan **Laravel 11**. Proyek ini mencakup halaman landing page publik yang informatif dan panel admin yang fungsional untuk manajemen konten.

## Fitur Utama

- **Landing Page Dinamis:** Menampilkan informasi lengkap tentang STAKAM yang semua kontennya dapat dikelola melalui panel admin.
- **Panel Admin:** Area khusus yang dilindungi otentikasi untuk mengelola:
  - **Konten Halaman:** Hero, Profil, Program Studi, Pimpinan, dan Testimoni.
  - **Manajemen Pendaftar:** Melihat daftar calon mahasiswa, detailnya, mengubah status, dan menghapus data.
  - **CRUD Penuh:** Fungsionalitas Tambah, Lihat, Edit, dan Hapus untuk data dinamis (Program Studi, Pimpinan, Testimoni).
- **Sistem Otentikasi:** Halaman login dan fungsi logout yang aman untuk admin.
- **Formulir Pendaftaran Online:** Halaman pendaftaran lengkap untuk calon mahasiswa baru dengan upload file dan pembuatan nomor pendaftaran otomatis.

## Teknologi yang Digunakan

- **Backend:** PHP 8.2, Laravel 11
- **Frontend:**
  - Landing Page: Tailwind CSS
  - Admin Panel & Form: Bootstrap 5
- **Database:** MySQL / MariaDB
- **Tooling:** Composer

---

## Prasyarat (Requirements)

Pastikan lingkungan pengembangan Anda telah terinstal:
- PHP >= 8.2
- Composer
- Database Server (seperti XAMPP, Laragon, WAMP yang sudah termasuk MySQL/MariaDB)

---

## Panduan Instalasi dan Setup

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di komputer lokal Anda.

### 1. Clone Repositori

Buka terminal atau command prompt, navigasi ke direktori kerja Anda, dan clone repositori ini.
```bash
git clone [URL_REPOSITORI_ANDA]
cd stakam_web
2. Install Dependensi PHP

Jalankan Composer untuk menginstal semua package PHP yang dibutuhkan oleh Laravel.

code
Bash
download
content_copy
expand_less
composer install
3. Konfigurasi Environment

Salin file .env.example menjadi file .env baru. File ini akan menyimpan semua konfigurasi rahasia Anda.

code
Bash
download
content_copy
expand_less
cp .env.example .env

Setelah itu, buat kunci enkripsi unik untuk aplikasi Anda.

code
Bash
download
content_copy
expand_less
php artisan key:generate
4. Konfigurasi Database

Buka file .env yang baru dibuat dan sesuaikan pengaturan database sesuai dengan lingkungan lokal Anda.

code
Env
download
content_copy
expand_less
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=stakam_web  # Pastikan nama ini sama dengan database yang akan Anda buat
DB_USERNAME=root        # Ganti dengan username database Anda
DB_PASSWORD=            # Ganti dengan password database Anda (kosongkan jika tidak ada)
5. Import Database

Buat sebuah database baru di server database Anda (misalnya melalui phpMyAdmin) dengan nama yang sama persis seperti yang Anda atur di DB_DATABASE (contoh: stakam_web).

Setelah itu, import file stakam_web.sql yang sudah tersedia di root folder proyek ke dalam database yang baru Anda buat.

Cara via Command Line (opsional):

code
Bash
download
content_copy
expand_less
# Ganti [USERNAME] dan [NAMA_DATABASE] sesuai pengaturan Anda
mysql -u [USERNAME] -p [NAMA_DATABASE] < stakam_web.sql

# Contoh:
mysql -u root -p stakam_web < stakam_web.sql

Anda juga sangat disarankan untuk melakukan import ini melalui antarmuka grafis seperti phpMyAdmin dengan fitur "Import".

6. Buat Symbolic Link untuk Storage

Perintah ini sangat penting agar file yang diupload oleh admin (seperti foto pimpinan dan berkas pendaftar) dapat diakses oleh publik. Jalankan perintah ini hanya satu kali.

code
Bash
download
content_copy
expand_less
php artisan storage:link
7. Jalankan Server Development

Sekarang Anda siap untuk menjalankan server pengembangan internal Laravel.

code
Bash
download
content_copy
expand_less
php artisan serve

Aplikasi Anda akan berjalan dan dapat diakses melalui URL yang ditampilkan, biasanya http://127.0.0.1:8000.

Akses dan Kredensial

Landing Page: http://127.0.0.1:8000/

Halaman Login Admin: http://127.0.0.1:8000/login

Kredensial Login Default:

Email: admin@stakam.ac.id

Password: password

Catatan: Kredensial ini dibuat oleh seeder. Anda dapat mengubahnya dengan mengedit data di tabel users pada database Anda, atau dengan membuat fitur manajemen user di masa mendatang.

code
Code
download
content_copy
expand_less