# Aplikasi Manajemen Siswa (School Management System)

## Deskripsi
Aplikasi Manajemen Siswa berbasis web yang dibangun menggunakan PHP Native (Tanpa Framework) dan MySQL. Aplikasi ini dirancang untuk memudahkan pengelolaan data akademik, kesiswaan, absensi, dan monitoring perilaku siswa melalui sistem poin (prestasi dan pelanggaran).

## Fitur Utama
*   **Manajemen Data Master**: Siswa, Guru, Kelas, Mata Pelajaran, Tahun Ajaran.
*   **Akademik**: Jadwal Pelajaran, Pembagian Kelas.
*   **Kesiswaan**: 
    *   Pencatatan Poin Prestasi (Ranking).
    *   Pencatatan Poin Pelanggaran.
    *   Monitoring Disiplin & Sanksi.
*   **Absensi**: Absensi per mata pelajaran dan harian.
*   **Pelaporan**:
    *   Laporan Peringkat Siswa (Prestasi).
    *   Laporan Pelanggaran.
    *   Cetak Raport Poin.
    *   Export PDF untuk 20+ jenis laporan.
*   **Multi-Role**: Admin, Guru/Wali Kelas, Siswa.

## Struktur Database
Database terdiri dari tabel-tabel normalisasi untuk efisiensi data:
*   `users`, `siswa`, `kelas`, `mata_pelajaran` (Master Data)
*   `poin_prestasi`, `poin_pelanggaran` (Sistem Poin)
*   `absensi`, `jadwal_kelas` (Operasional Harian)

(Lihat file `ERD.md` untuk detail lengkap).

## Struktur Folder
```
/
├── config/         # Koneksi Database & Konfigurasi
├── core/           # Core MVC (Router, Model, Controller)
├── controllers/    # Logic Aplikasi per Modul
├── models/         # Query Database per Tabel
├── views/          # Tampilan (HTML/PHP)
├── assets/         # CSS, JS, Images
├── public/         # File publik (diakses browser secara langsung jika dikonfigurasi demikian)
└── index.php       # Entry Point
```

## Instalasi
1.  Pastikan XAMPP/Web Server sudah terinstall dengan PHP 8+.
2.  Import file `manajemen_sekolah.sql` ke database MySQL (misal: `db_sekolah`).
3.  Sesuaikan konfigurasi database di `config/database.php`.
4.  Akses aplikasi melalui browser (contoh: `localhost/WEB_manajemen_sekolah`).

## Konfigurasi Database
File: `config/database.php`
```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'db_sekolah'); // Sesuaikan nama database
```

## Hak Akses User
1.  **Admin**: Akses penuh ke seluruh modul, pengaturan sistem, dan master data.
2.  **Guru**: Akses manajemen kelas (jika Wali Kelas), input nilai/poin, absensi.
3.  **Siswa**: Melihat data pribadi, jadwal, riwayat poin, dan absensi.

## Catatan Teknis
*   **Architecture**: MVC (Model-View-Controller) sederhana.
*   **Database**: MySQLi dengan Prepared Statements untuk keamanan.
*   **Security**: Validasi input server-side, Session Management.
