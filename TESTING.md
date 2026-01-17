# Skenario Testing Manual - Manajemen Sekolah

Berikut adalah skenario pengujian untuk memastikan fitur utama aplikasi berjalan dengan baik.

## 1. Login & Autentikasi
*   **Case**: Akses halaman Dashboard tanpa Login.
    *   **Saat Ini**: Di-bypass (Langsung masuk).
    *   **Ekspektasi (Production)**: Redirect ke halaman Login.
    *   **Ekspektasi (Dev)**: Langsung tampil Dashboard.

## 2. Manajemen Siswa (CRUD)
*   **Case**: Tambah Siswa Baru
    *   Klik menu "Data Siswa" -> "Tambah Siswa".
    *   Isi form (NIS, Nama, Kelas wajib diisi).
    *   Klik Simpan.
    *   **Hasil**: Data muncul di tabel list siswa.
*   **Case**: Edit Siswa
    *   Klik tombol pensil pada salah satu siswa.
    *   Ubah Nama atau Kelas.
    *   Klik Update.
    *   **Hasil**: Data di tabel berubah sesuai input.
*   **Case**: Validasi Input
    *   Coba kosongkan Nama Lengkap saat tambah siswa.
    *   **Hasil**: Muncul alert/pesan error "Data tidak lengkap".

## 3. Dashboard Ranking
*   **Case**: Verifikasi Ranking
    *   Pastikan tabel "Top 10 Siswa Berprestasi" menampilkan siswa dengan `total_poin_prestasi` tertinggi.
    *   Pastikan tabel "Top 10 Pelanggaran" menampilkan siswa dengan `total_poin_pelanggaran` tertinggi.

## 4. Pelaporan
*   **Case**: Generate Laporan
    *   Masuk menu "Pusat Laporan".
    *   Pilih "Data Seluruh Siswa".
    *   **Hasil**: Tab baru terbuka menampilkan tabel data siswa siap cetak (Kop Surat + TTD).
*   **Case**: Print PDF
    *   Tekan tombol "Cetak / Simpan PDF".
    *   **Hasil**: Dialog print browser muncul (Preview PDF rapi tanpa tombol navigasi).

## 5. Keamanan Data
*   **Case**: SQL Injection Test
    *   Input karakter `' OR '1'='1` pada field Nama.
    *   **Hasil**: Data tersimpan sebagai string literal (aman), tidak merusak query karena menggunakan Prepared Statements.
