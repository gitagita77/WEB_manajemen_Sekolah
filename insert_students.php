<?php
require_once 'config/database.php';
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 1. Insert 10 Classes first (needed for students)
$kelas_sql = "INSERT IGNORE INTO kelas (id, kode_kelas, nama_kelas, tingkat, jurusan, wali_kelas_id, kapasitas, tahun_ajaran, status) VALUES
(1, 'X-IPA-1', 'X IPA 1', 'X', 'IPA', 1, 32, '2025/2026', 'aktif'),
(2, 'X-IPA-2', 'X IPA 2', 'X', 'IPA', 2, 32, '2025/2026', 'aktif'),
(3, 'X-IPS-1', 'X IPS 1', 'X', 'IPS', 3, 30, '2025/2026', 'aktif'),
(4, 'XI-IPA-1', 'XI IPA 1', 'XI', 'IPA', 4, 30, '2025/2026', 'aktif'),
(5, 'XI-IPA-2', 'XI IPA 2', 'XI', 'IPA', 5, 30, '2025/2026', 'aktif'),
(6, 'XI-IPS-1', 'XI IPS 1', 'XI', 'IPS', 6, 28, '2025/2026', 'aktif'),
(7, 'XII-IPA-1', 'XII IPA 1', 'XII', 'IPA', 7, 28, '2025/2026', 'aktif'),
(8, 'XII-IPA-2', 'XII IPA 2', 'XII', 'IPA', 8, 28, '2025/2026', 'aktif'),
(9, 'XII-IPS-1', 'XII IPS 1', 'XII', 'IPS', 9, 26, '2025/2026', 'aktif'),
(10, 'XII-IPS-2', 'XII IPS 2', 'XII', 'IPS', 1, 26, '2025/2026', 'aktif')";

if ($conn->query($kelas_sql)) {
    echo "✅ 10 Classes inserted.\n";
} else {
    echo "❌ Error classes: " . $conn->error . "\n";
}

// 2. Insert 10 Students
$siswa_sql = "INSERT IGNORE INTO siswa (nis, nisn, nama_lengkap, jenis_kelamin, kelas_id, tempat_lahir, tanggal_lahir, alamat, status, total_poin_prestasi, total_poin_pelanggaran) VALUES
('2025001', '0087654321', 'Andi Pratama', 'L', 1, 'Jakarta', '2009-03-15', 'Jl. Merdeka No. 10', 'aktif', 0, 0),
('2025002', '0087654322', 'Bella Safira', 'P', 1, 'Bandung', '2009-05-20', 'Jl. Sudirman No. 22', 'aktif', 0, 0),
('2025003', '0087654323', 'Citra Dewi', 'P', 1, 'Surabaya', '2009-07-12', 'Jl. Diponegoro No. 33', 'aktif', 0, 0),
('2025004', '0087654324', 'Dimas Aditya', 'L', 1, 'Yogyakarta', '2009-02-28', 'Jl. Gajah Mada No. 44', 'aktif', 0, 0),
('2025005', '0087654325', 'Eka Putri', 'P', 1, 'Semarang', '2009-09-05', 'Jl. Ahmad Yani No. 55', 'aktif', 0, 0),
('2025006', '0087654326', 'Fajar Ramadhan', 'L', 1, 'Malang', '2009-11-18', 'Jl. Veteran No. 66', 'aktif', 0, 0),
('2025007', '0087654327', 'Gita Savitri', 'P', 1, 'Solo', '2009-04-22', 'Jl. Pahlawan No. 77', 'aktif', 0, 0),
('2025008', '0087654328', 'Hadi Kusuma', 'L', 1, 'Medan', '2009-06-30', 'Jl. Pemuda No. 88', 'aktif', 0, 0),
('2025009', '0087654329', 'Intan Permatasari', 'P', 1, 'Palembang', '2009-08-14', 'Jl. Proklamasi No. 99', 'aktif', 0, 0),
('2025010', '0087654330', 'Joko Widodo', 'L', 1, 'Makassar', '2009-10-25', 'Jl. Kemerdekaan No. 100', 'aktif', 0, 0)";

if ($conn->query($siswa_sql)) {
    echo "✅ 10 Students inserted.\n";
} else {
    echo "❌ Error students: " . $conn->error . "\n";
}

$conn->close();
?>