# Website Sekolah

Website Sekolah berbasis CodeIgniter 3 dengan Tailwind CSS yang modern, responsive, dan mobile-friendly.

## Fitur Utama

### Frontend (Halaman Publik)
- **Homepage dengan:**
  - Slider foto otomatis
  - Berita terbaru
  - Statistik jumlah siswa
  - Profil guru
  - Kontak & Google Maps
- **Menu Navigasi:**
  - Dashboard
  - Profil (Visi Misi, Sejarah, Struktur Organisasi, Keunggulan)
  - Berita Sekolah
  - Galeri (Foto & Video)
  - Prestasi (Siswa, Guru, Sekolah)
  - Download
  - Link Aplikasi
  - Kontak
- **Responsive Design** - Tampil sempurna di mobile, tablet, dan desktop

### Backend (Admin Panel)
- Dashboard admin dengan statistik lengkap
- Manajemen Slider
- Manajemen Berita
- Manajemen Data Guru
- Manajemen Statistik Siswa
- Manajemen Profil Sekolah (Visi Misi, Sejarah, dll)
- Manajemen Galeri (Foto & Video)
- Manajemen Prestasi
- Manajemen Download
- Manajemen Link Aplikasi
- Manajemen Kontak
- Pengaturan Website

## Teknologi yang Digunakan
- **Backend:** CodeIgniter 3.1.13 (PHP)
- **Frontend:** Tailwind CSS (via CDN)
- **Database:** MySQL
- **JavaScript:** Vanilla JS
- **Icons:** Font Awesome 6

## Instalasi

### Persyaratan Sistem
- PHP >= 7.2
- MySQL >= 5.6
- Apache/Nginx dengan mod_rewrite
- Composer (opsional)

### Langkah Instalasi

1. **Clone/Download Repository**
   ```bash
   git clone https://github.com/RizkyFauzy0/websitesekolah.git
   cd websitesekolah
   ```

2. **Import Database**
   - Buat database baru dengan nama `websitesekolah`
   - Import file `database.sql` ke database tersebut
   ```sql
   CREATE DATABASE websitesekolah;
   USE websitesekolah;
   SOURCE database.sql;
   ```

3. **Konfigurasi Database**
   Edit file `application/config/database.php`:
   ```php
   $db['default'] = array(
       'hostname' => 'localhost',
       'username' => 'root',        // Sesuaikan dengan username MySQL Anda
       'password' => '',            // Sesuaikan dengan password MySQL Anda
       'database' => 'websitesekolah',
   );
   ```

4. **Konfigurasi Base URL**
   Edit file `application/config/config.php`:
   ```php
   $config['base_url'] = 'http://localhost/websitesekolah/';
   // Atau sesuaikan dengan URL Anda
   ```

5. **Set Permission untuk Upload Folder**
   ```bash
   chmod -R 777 assets/uploads/
   ```

6. **Akses Website**
   - Frontend: `http://localhost/websitesekolah/`
   - Admin Panel: `http://localhost/websitesekolah/admin`
   - Login Default:
     - Username: `admin`
     - Password: `admin123`

## Struktur Folder

```
websitesekolah/
├── application/
│   ├── controllers/       # Controllers untuk frontend & admin
│   ├── models/           # Models untuk database
│   ├── views/            # Views (templates)
│   │   ├── admin/        # Views admin panel
│   │   └── public/       # Views frontend
│   ├── config/           # Konfigurasi CodeIgniter
│   └── core/             # Core controllers (MY_Controller)
├── assets/
│   ├── css/              # Custom CSS
│   ├── js/               # Custom JavaScript
│   └── uploads/          # Folder upload gambar/file
├── system/               # CodeIgniter system files
├── database.sql          # File SQL database
└── index.php             # Entry point
```

## Penggunaan

### Login Admin
1. Akses `http://localhost/websitesekolah/admin`
2. Login dengan kredensial default (admin/admin123)
3. Ganti password setelah login pertama (recommended)

### Mengelola Konten

#### Menambah Slider
1. Login ke admin panel
2. Klik menu "Slider"
3. Klik "Tambah Slider"
4. Upload gambar, isi judul & deskripsi
5. Atur urutan dan status aktif
6. Klik "Simpan"

#### Menambah Berita
1. Login ke admin panel
2. Klik menu "Berita"
3. Klik "Tambah Berita"
4. Isi form (judul, konten, gambar, tanggal)
5. Slug akan dibuat otomatis
6. Klik "Simpan"

#### Mengelola Profil Sekolah
1. Klik menu profil yang ingin diedit (Visi Misi, Sejarah, dll)
2. Edit konten menggunakan text editor
3. Upload gambar jika diperlukan
4. Klik "Simpan"

### Customization

#### Mengubah Logo & Nama Sekolah
1. Login ke admin
2. Klik menu "Pengaturan"
3. Upload logo baru
4. Ubah nama sekolah, tagline, dll
5. Klik "Simpan"

#### Mengubah Warna Tema
Edit file `application/views/public/layouts/header.php` dan sesuaikan class Tailwind CSS.

#### Menambah Menu
Edit file `application/views/public/layouts/header.php` untuk menambah item menu.

## Keamanan

- CSRF Protection: Aktif
- XSS Filtering: Implementasi manual dengan `htmlspecialchars()`
- Password Hashing: Menggunakan `password_hash()` PHP
- SQL Injection: Dicegah dengan CodeIgniter Query Builder

### Best Practices
1. Ganti password default admin
2. Backup database secara berkala
3. Update CodeIgniter ke versi terbaru
4. Set permission folder dengan benar
5. Gunakan HTTPS di production

## Troubleshooting

### Error 404 / URL tidak berfungsi
- Pastikan mod_rewrite Apache aktif
- Cek file `.htaccess` di root folder
- Cek konfigurasi `base_url` di `config.php`

### Upload Gambar Gagal
- Cek permission folder `assets/uploads/`
- Pastikan folder exists
- Cek max upload size di `php.ini`

### Database Connection Error
- Cek kredensial database di `application/config/database.php`
- Pastikan MySQL service berjalan
- Pastikan database sudah dibuat

## Lisensi

MIT License - Silakan gunakan untuk keperluan apapun.

## Kontribusi

Pull requests are welcome! Untuk perubahan besar, silakan buka issue terlebih dahulu.

## Support

Jika ada pertanyaan atau butuh bantuan:
- Email: support@example.com
- GitHub Issues: [Create an issue](https://github.com/RizkyFauzy0/websitesekolah/issues)

## Changelog

### Version 1.0.0 (2026-01-05)
- Initial release
- Complete frontend & backend features
- Responsive design
- Security features implemented

---

Dikembangkan dengan ❤️ menggunakan CodeIgniter 3 & Tailwind CSS

