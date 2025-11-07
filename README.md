<div align="center">

# 🎓 STAKAM Web

### Website Resmi Sekolah Tinggi Agama Kristen Apollos Manado

![Logo STAKAM](public/picture/logo/STAKAM_Logo.png)

[![Laravel](https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5.x-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)](https://getbootstrap.com)
[![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com)

_Platform website modern untuk manajemen informasi dan pendaftaran mahasiswa STAKAM_

[Demo](#) · [Laporkan Bug](https://github.com/imaRizzuUp/STAKAM_WEB/issues) · [Request Fitur](https://github.com/imaRizzuUp/STAKAM_WEB/issues)

</div>

---

## 📋 Daftar Isi

-   [Tentang Proyek](#-tentang-proyek)
-   [Fitur Utama](#-fitur-utama)
-   [Tech Stack](#-tech-stack)
-   [Prasyarat](#-prasyarat)
-   [Instalasi](#-instalasi)
-   [Konfigurasi](#-konfigurasi)
-   [Penggunaan](#-penggunaan)
-   [Struktur Proyek](#-struktur-proyek)
-   [Database](#-database)
-   [Deployment](#-deployment)
-   [Kontribusi](#-kontribusi)
-   [Lisensi](#-lisensi)
-   [Kontak](#-kontak)

---

## 🎯 Tentang Proyek

Website resmi STAKAM (Sekolah Tinggi Agama Kristen Apollos Manado) adalah aplikasi web fullstack yang dibangun menggunakan Laravel 11. Proyek ini dirancang untuk memberikan informasi lengkap tentang institusi serta memfasilitasi proses pendaftaran mahasiswa baru secara online.

### Tujuan Proyek

-   🌐 Menyediakan platform informasi yang mudah diakses oleh calon mahasiswa
-   📝 Memudahkan proses pendaftaran mahasiswa baru secara online
-   ⚙️ Memberikan panel admin yang intuitif untuk manajemen konten website
-   📊 Mengelola data pendaftar dan program studi secara terpusat

---

## ✨ Fitur Utama

### 🎨 Landing Page Publik

-   ✅ Hero section yang dapat dikustomisasi
-   ✅ Profil institusi lengkap
-   ✅ Daftar program studi yang tersedia
-   ✅ Informasi pimpinan dan struktur organisasi
-   ✅ Testimoni dari mahasiswa
-   ✅ Responsif di semua perangkat

### 🔐 Panel Admin

-   ✅ Sistem autentikasi yang aman
-   ✅ Dashboard admin dengan statistik
-   ✅ CRUD lengkap untuk:
    -   Konten Hero
    -   Profil institusi
    -   Program Studi
    -   Data Pimpinan
    -   Testimoni
    -   Manajemen Pendaftar
-   ✅ Upload dan manajemen file/gambar
-   ✅ Ubah status pendaftar (Pending, Diterima, Ditolak)

### 📋 Sistem Pendaftaran

-   ✅ Formulir pendaftaran online lengkap
-   ✅ Upload dokumen pendukung
-   ✅ Generate nomor pendaftaran otomatis
-   ✅ Validasi data real-time
-   ✅ Notifikasi status pendaftaran

---

## 🛠 Tech Stack

### Backend

-   **Framework:** Laravel 11
-   **Language:** PHP 8.2+
-   **ORM:** Eloquent
-   **Authentication:** Laravel Breeze / Sanctum

### Frontend

-   **Landing Page:** Tailwind CSS
-   **Admin Panel:** Bootstrap 5
-   **Template Engine:** Blade
-   **Icons:** Font Awesome / Bootstrap Icons

### Database

-   **RDBMS:** MySQL / MariaDB
-   **Migration:** Laravel Migrations
-   **Seeding:** Laravel Seeders

### Tools & Utilities

-   **Package Manager:** Composer, NPM
-   **Build Tool:** Vite
-   **Version Control:** Git

---

## 📦 Prasyarat

Pastikan sistem Anda telah memenuhi persyaratan berikut:

-   **PHP** >= 8.2
-   **Composer** >= 2.x
-   **Node.js** >= 18.x & NPM >= 9.x
-   **MySQL** >= 8.0 atau **MariaDB** >= 10.5
-   **Web Server** (Apache/Nginx) atau **Local Development Environment** (XAMPP, Laragon, WAMP)

### Extension PHP yang Diperlukan

```bash
- BCMath
- Ctype
- Fileinfo
- JSON
- Mbstring
- OpenSSL
- PDO
- Tokenizer
- XML
```

---

## 🚀 Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/imaRizzuUp/STAKAM_WEB.git
cd STAKAM_WEB
```

### 2. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install JavaScript dependencies
npm install
```

### 3. Setup Environment

```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Konfigurasi Database

Edit file `.env` dan sesuaikan dengan konfigurasi database Anda:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=stakam_web
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Setup Database

**Opsi A: Menggunakan Migration & Seeder (Recommended)**

```bash
# Jalankan migrations
php artisan migrate

# Jalankan seeders untuk data awal
php artisan db:seed
```

**Opsi B: Import SQL File**

```bash
# Buat database terlebih dahulu
mysql -u root -p -e "CREATE DATABASE stakam_web;"

# Import file SQL (jika tersedia)
mysql -u root -p stakam_web < stakam_web.sql
```

### 6. Create Storage Link

```bash
php artisan storage:link
```

### 7. Build Assets

```bash
# Development
npm run dev

# Production
npm run build
```

### 8. Jalankan Development Server

```bash
php artisan serve
```

Aplikasi akan berjalan di `http://127.0.0.1:8000`

---

## ⚙️ Konfigurasi

### Environment Variables

Berikut adalah konfigurasi penting dalam file `.env`:

```env
# Application
APP_NAME="STAKAM Web"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

# Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=stakam_web
DB_USERNAME=root
DB_PASSWORD=

# Mail (Optional - untuk fitur email)
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="noreply@stakam.ac.id"
MAIL_FROM_NAME="${APP_NAME}"
```

### File Upload Configuration

Edit `config/filesystems.php` jika perlu menyesuaikan lokasi penyimpanan file:

```php
'public' => [
    'driver' => 'local',
    'root' => storage_path('app/public'),
    'url' => env('APP_URL').'/storage',
    'visibility' => 'public',
],
```

---

## 💻 Penggunaan

### Akses Aplikasi

| Halaman             | URL                                 | Deskripsi        |
| ------------------- | ----------------------------------- | ---------------- |
| **Landing Page**    | `http://127.0.0.1:8000/`            | Halaman publik   |
| **Login Admin**     | `http://127.0.0.1:8000/login`       | Halaman login    |
| **Dashboard Admin** | `http://127.0.0.1:8000/dashboard`   | Panel admin      |
| **Pendaftaran**     | `http://127.0.0.1:8000/pendaftaran` | Form pendaftaran |

### Default Credentials

```
Email    : admin@stakam.ac.id
Password : password
```

> ⚠️ **Penting:** Segera ubah password default setelah login pertama kali!

### Mengelola Konten Admin

1. Login ke panel admin
2. Navigasi ke menu yang ingin dikelola:
    - **Hero:** Kelola banner utama
    - **Profil:** Update informasi institusi
    - **Program Studi:** Tambah/edit program studi
    - **Pimpinan:** Kelola data pimpinan
    - **Testimoni:** Kelola testimoni mahasiswa
    - **Pendaftar:** Lihat dan kelola data pendaftar

---

## 📁 Struktur Proyek

```
stakam_web/
├── app/
│   ├── Http/
│   │   └── Controllers/      # Controllers
│   ├── Models/               # Eloquent Models
│   ├── Observers/            # Model Observers
│   └── Providers/            # Service Providers
├── config/                   # Configuration files
├── database/
│   ├── migrations/           # Database migrations
│   ├── seeders/              # Database seeders
│   └── factories/            # Model factories
├── public/
│   ├── picture/              # Uploaded images
│   └── index.php             # Entry point
├── resources/
│   ├── views/                # Blade templates
│   ├── css/                  # CSS files
│   └── js/                   # JavaScript files
├── routes/
│   ├── web.php               # Web routes
│   └── console.php           # Console routes
├── storage/                  # File storage
├── tests/                    # Tests
├── .env.example              # Environment template
├── composer.json             # PHP dependencies
├── package.json              # Node dependencies
└── vite.config.js            # Vite configuration
```

---

## 🗄️ Database

### Models & Tabel

| Model          | Tabel            | Deskripsi           |
| -------------- | ---------------- | ------------------- |
| `Admin`        | `admins`         | Data administrator  |
| `User`         | `users`          | Data pengguna       |
| `KontenHero`   | `konten_heroes`  | Konten hero section |
| `KontenProfil` | `konten_profils` | Profil institusi    |
| `ProgramStudi` | `program_studis` | Data program studi  |
| `Pimpinan`     | `pimpinans`      | Data pimpinan       |
| `Testimoni`    | `testimonis`     | Data testimoni      |
| `Pendaftar`    | `pendaftars`     | Data pendaftar      |

### Menjalankan Migration

```bash
# Jalankan semua migrations
php artisan migrate

# Rollback migration terakhir
php artisan migrate:rollback

# Reset dan jalankan ulang semua migrations
php artisan migrate:fresh

# Reset dan jalankan dengan seeder
php artisan migrate:fresh --seed
```

---

## 🚢 Deployment

### Persiapan Production

1. **Set environment ke production**

```env
APP_ENV=production
APP_DEBUG=false
```

2. **Optimize aplikasi**

```bash
# Cache configuration
php artisan config:cache

# Cache routes
php artisan route:cache

# Cache views
php artisan view:cache

# Optimize autoloader
composer install --optimize-autoloader --no-dev
```

3. **Build assets untuk production**

```bash
npm run build
```

4. **Set permission yang benar**

```bash
chmod -R 755 storage bootstrap/cache
```

### Deployment ke Shared Hosting

1. Upload semua file kecuali folder `node_modules`
2. Arahkan domain ke folder `public/`
3. Import database melalui phpMyAdmin
4. Edit file `.env` sesuai konfigurasi hosting
5. Jalankan `composer install --optimize-autoloader --no-dev`

### Deployment ke VPS (Ubuntu)

```bash
# Install dependencies
sudo apt update
sudo apt install php8.2 php8.2-fpm nginx mysql-server

# Clone project
git clone https://github.com/imaRizzuUp/STAKAM_WEB.git

# Setup seperti instalasi di atas

# Konfigurasi Nginx
sudo nano /etc/nginx/sites-available/stakam

# Restart services
sudo systemctl restart nginx
sudo systemctl restart php8.2-fpm
```

---

## 🤝 Kontribusi

Kontribusi sangat dihargai! Jika Anda ingin berkontribusi:

1. Fork repositori ini
2. Buat branch fitur baru (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

### Guidelines

-   Ikuti PSR-12 coding standard untuk PHP
-   Tulis kode yang clean dan well-documented
-   Sertakan test untuk fitur baru
-   Update dokumentasi jika diperlukan

---

## 📝 Lisensi

Didistribusikan di bawah lisensi MIT. Lihat file `LICENSE` untuk informasi lebih lanjut.

---

## 📞 Kontak

**STAKAM - Sekolah Tinggi Agama Kristen Apollos Manado**

-   🌐 Website: [stakam.ac.id](https://stakam.ac.id)
-   📧 Email: info@stakam.ac.id
-   📱 Telepon: (0431) XXXXXXX
-   📍 Alamat: Manado, Sulawesi Utara

**Project Repository:** [https://github.com/imaRizzuUp/STAKAM_WEB](https://github.com/imaRizzuUp/STAKAM_WEB)

---

<div align="center">

### ⭐ Jika proyek ini bermanfaat, berikan star!

Made with ❤️ by STAKAM Development Team

**[Back to Top](#-stakam-web)**

</div>
