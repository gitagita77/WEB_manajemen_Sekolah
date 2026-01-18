-- ============================================
-- ADDITIONAL DUMMY DATA - 10 RECORDS PER TABLE
-- For comprehensive testing and reporting
-- ============================================

USE manajemen_sekolah;

-- ============================================
-- ADDITIONAL SISWA DATA (to reach 40+ total)
-- ============================================
INSERT INTO siswa (nis, nisn, nama_lengkap, jenis_kelamin, kelas_id, tempat_lahir, tanggal_lahir, alamat, status, total_poin_prestasi, total_poin_pelanggaran) VALUES
-- Kelas XI IPA 2
('2024006', '0077654326', 'Abdul Rahman', 'L', 5, 'Jakarta', '2008-01-15', 'Jl. Kuningan No. 26', 'aktif', 0, 0),
('2024007', '0077654327', 'Bella Anastasia', 'P', 5, 'Bandung', '2008-03-20', 'Jl. Setiabudhi No. 27', 'aktif', 0, 0),
('2024008', '0077654328', 'Chandra Wijaya', 'L', 5, 'Surabaya', '2008-05-25', 'Jl. Darmo No. 28', 'aktif', 0, 0),
('2024009', '0077654329', 'Diana Puspita', 'P', 5, 'Yogyakarta', '2008-07-30', 'Jl. Seturan No. 29', 'aktif', 0, 0),
('2024010', '0077654330', 'Eko Saputra', 'L', 5, 'Semarang', '2008-09-12', 'Jl. Pemuda No. 30', 'aktif', 0, 0),

-- Kelas XI IPS 1
('2024011', '0077654331', 'Fania Rahmadani', 'P', 6, 'Malang', '2008-02-18', 'Jl. Soekarno Hatta No. 31', 'aktif', 0, 0),
('2024012', '0077654332', 'Gilang Ramadhan', 'L', 6, 'Solo', '2008-04-22', 'Jl. Dr. Radjiman No. 32', 'aktif', 0, 0),
('2024013', '0077654333', 'Hana Maulida', 'P', 6, 'Medan', '2008-06-28', 'Jl. Gatot Subroto No. 33', 'aktif', 0, 0),
('2024014', '0077654334', 'Irfan Hakim', 'L', 6, 'Palembang', '2008-08-15', 'Jl. Jenderal Sudirman No. 34', 'aktif', 0, 0),
('2024015', '0077654335', 'Julia Perez', 'P', 6, 'Makassar', '2008-10-20', 'Jl. Urip Sumoharjo No. 35', 'aktif', 0, 0),

-- Kelas XII IPA 2
('2023006', '0067654326', 'Kevin Sanjaya', 'L', 8, 'Jakarta', '2007-02-10', 'Jl. Rasuna Said No. 36', 'aktif', 0, 0),
('2023007', '0067654327', 'Lina Marlina', 'P', 8, 'Bandung', '2007-04-15', 'Jl. Pasteur No. 37', 'aktif', 0, 0),
('2023008', '0067654328', 'Muhammad Rizki', 'L', 8, 'Surabaya', '2007-06-20', 'Jl. Raya Darmo No. 38', 'aktif', 0, 0),
('2023009', '0067654329', 'Nadia Safitri', 'P', 8, 'Yogyakarta', '2007-08-25', 'Jl. Colombo No. 39', 'aktif', 0, 0),
('2023010', '0067654330', 'Omar Sharif', 'L', 8, 'Semarang', '2007-10-30', 'Jl. Pahlawan No. 40', 'aktif', 0, 0),

-- Kelas XII IPS 1
('2023011', '0067654331', 'Putri Ayu', 'P', 9, 'Malang', '2007-01-12', 'Jl. Veteran No. 41', 'aktif', 0, 0),
('2023012', '0067654332', 'Qori Sandioriva', 'P', 9, 'Solo', '2007-03-18', 'Jl. Brigjen Sudiarto No. 42', 'aktif', 0, 0),
('2023013', '0067654333', 'Reza Rahadian', 'L', 9, 'Medan', '2007-05-22', 'Jl. Imam Bonjol No. 43', 'aktif', 0, 0),
('2023014', '0067654334', 'Salsabila Adriani', 'P', 9, 'Palembang', '2007-07-28', 'Jl. Kapten A. Rivai No. 44', 'aktif', 0, 0),
('2023015', '0067654335', 'Taufik Rahman', 'L', 9, 'Makassar', '2007-09-15', 'Jl. Perintis Kemerdekaan No. 45', 'aktif', 0, 0),

-- Kelas XII IPS 2
('2023016', '0067654336', 'Umi Kalsum', 'P', 10, 'Jakarta', '2007-02-20', 'Jl. Menteng No. 46', 'aktif', 0, 0),
('2023017', '0067654337', 'Vino G Bastian', 'L', 10, 'Bandung', '2007-04-25', 'Jl. Cipaganti No. 47', 'aktif', 0, 0),
('2023018', '0067654338', 'Wulan Guritno', 'P', 10, 'Surabaya', '2007-06-30', 'Jl. Mayjen Sungkono No. 48', 'aktif', 0, 0),
('2023019', '0067654339', 'Xavier Nugroho', 'L', 10, 'Yogyakarta', '2007-08-12', 'Jl. Gejayan No. 49', 'aktif', 0, 0),
('2023020', '0067654340', 'Yuki Kato', 'P', 10, 'Semarang', '2007-10-18', 'Jl. Gajah Mada No. 50', 'aktif', 0, 0);

-- ============================================
-- ADDITIONAL PRESTASI DATA (to reach 25+ total)
-- ============================================
INSERT INTO poin_prestasi (siswa_id, tanggal, prestasi, poin, keterangan) VALUES
(17, '2026-01-15', 'Juara 1 Lomba Debat Bahasa Indonesia', 35, 'Tingkat Provinsi'),
(18, '2025-12-10', 'Juara 2 Olimpiade Biologi', 45, 'Tingkat Provinsi'),
(19, '2026-01-03', 'Juara 3 Lomba Fotografi', 20, 'Tingkat Kota'),
(20, '2025-12-25', 'Ranking 1 Kelas Semester Ganjil', 20, 'Prestasi Akademik'),
(21, '2026-01-08', 'Juara 1 Lomba Vlog Kreatif', 25, 'Tingkat Sekolah'),
(22, '2025-12-18', 'Juara 2 Lomba Menulis Cerpen', 30, 'Tingkat Kota'),
(23, '2026-01-12', 'Juara 1 Lomba Badminton', 30, 'Tingkat Sekolah'),
(24, '2025-12-28', 'Juara 3 Olimpiade Kimia', 40, 'Tingkat Provinsi'),
(25, '2026-01-06', 'Ranking 2 Kelas Semester Ganjil', 15, 'Prestasi Akademik'),
(26, '2025-12-20', 'Juara 1 Lomba Tahfidz Quran', 50, 'Tingkat Provinsi');

-- ============================================
-- ADDITIONAL PELANGGARAN DATA (to reach 22+ total)
-- ============================================
INSERT INTO poin_pelanggaran (siswa_id, tanggal, pelanggaran, kategori, poin, sanksi, keterangan) VALUES
(21, '2026-01-14', 'Terlambat masuk sekolah/upacara', 'ringan', 5, 'Teguran Lisan', 'Terlambat 10 menit'),
(22, '2026-01-13', 'Tidak memakai atribut seragam lengkap', 'ringan', 3, 'Teguran Lisan', 'Tidak pakai topi'),
(23, '2026-01-12', 'Membuang sampah sembarangan', 'ringan', 5, 'Teguran Tertulis', 'Di kantin'),
(24, '2026-01-11', 'Makan/membeli makanan saat pelajaran', 'ringan', 3, 'Teguran Lisan', 'Makan di kelas'),
(25, '2026-01-10', 'Keluar kelas tanpa izin', 'sedang', 15, 'Teguran Tertulis', 'Ke kantin saat jam pelajaran'),
(26, '2026-01-09', 'Seragam tidak rapi', 'ringan', 2, 'Teguran Lisan', 'Baju tidak dimasukkan'),
(27, '2026-01-08', 'Berhias berlebihan', 'ringan', 5, 'Teguran Lisan', 'Memakai aksesoris berlebihan'),
(28, '2026-01-07', 'Mencoret-coret fasilitas sekolah', 'ringan', 10, 'Teguran Tertulis', 'Mencoret dinding toilet'),
(29, '2026-01-16', 'Tidak mengikuti upacara bendera', 'sedang', 25, 'Surat Pernyataan', 'Bolos upacara'),
(30, '2026-01-15', 'Mengganggu kelas lain', 'sedang', 20, 'Panggilan Orang Tua', 'Ribut di koridor');

-- ============================================
-- ADDITIONAL ABSENSI DATA (100+ records total)
-- ============================================
INSERT INTO absensi (siswa_id, tanggal, status, keterangan) VALUES
-- Tanggal 2026-01-13 (Senin)
(1, '2026-01-13', 'Hadir', ''),
(2, '2026-01-13', 'Hadir', ''),
(3, '2026-01-13', 'Hadir', ''),
(4, '2026-01-13', 'Hadir', ''),
(5, '2026-01-13', 'Sakit', 'Flu'),
(6, '2026-01-13', 'Hadir', ''),
(7, '2026-01-13', 'Hadir', ''),
(8, '2026-01-13', 'Hadir', ''),
(9, '2026-01-13', 'Hadir', ''),
(10, '2026-01-13', 'Hadir', ''),
(11, '2026-01-13', 'Hadir', ''),
(12, '2026-01-13', 'Hadir', ''),
(13, '2026-01-13', 'Hadir', ''),
(14, '2026-01-13', 'Hadir', ''),
(15, '2026-01-13', 'Hadir', ''),
(16, '2026-01-13', 'Hadir', ''),
(17, '2026-01-13', 'Hadir', ''),
(18, '2026-01-13', 'Hadir', ''),
(19, '2026-01-13', 'Hadir', ''),
(20, '2026-01-13', 'Hadir', ''),

-- Tanggal 2026-01-14 (Selasa)
(1, '2026-01-14', 'Hadir', ''),
(2, '2026-01-14', 'Hadir', ''),
(3, '2026-01-14', 'Hadir', ''),
(4, '2026-01-14', 'Hadir', ''),
(5, '2026-01-14', 'Sakit', 'Masih flu'),
(6, '2026-01-14', 'Hadir', ''),
(7, '2026-01-14', 'Hadir', ''),
(8, '2026-01-14', 'Alpha', ''),
(9, '2026-01-14', 'Hadir', ''),
(10, '2026-01-14', 'Hadir', ''),
(11, '2026-01-14', 'Hadir', ''),
(12, '2026-01-14', 'Hadir', ''),
(13, '2026-01-14', 'Hadir', ''),
(14, '2026-01-14', 'Izin', 'Sakit gigi'),
(15, '2026-01-14', 'Hadir', ''),
(16, '2026-01-14', 'Hadir', ''),
(17, '2026-01-14', 'Hadir', ''),
(18, '2026-01-14', 'Hadir', ''),
(19, '2026-01-14', 'Hadir', ''),
(20, '2026-01-14', 'Hadir', ''),

-- Additional students for variety
(21, '2026-01-17', 'Hadir', ''),
(22, '2026-01-17', 'Hadir', ''),
(23, '2026-01-17', 'Hadir', ''),
(24, '2026-01-17', 'Hadir', ''),
(25, '2026-01-17', 'Hadir', ''),
(26, '2026-01-17', 'Hadir', ''),
(27, '2026-01-17', 'Hadir', ''),
(28, '2026-01-17', 'Hadir', ''),
(29, '2026-01-17', 'Hadir', ''),
(30, '2026-01-17', 'Hadir', ''),
(31, '2026-01-17', 'Hadir', ''),
(32, '2026-01-17', 'Hadir', ''),
(33, '2026-01-17', 'Hadir', ''),
(34, '2026-01-17', 'Hadir', ''),
(35, '2026-01-17', 'Hadir', ''),
(36, '2026-01-17', 'Hadir', ''),
(37, '2026-01-17', 'Hadir', ''),
(38, '2026-01-17', 'Hadir', ''),
(39, '2026-01-17', 'Hadir', ''),
(40, '2026-01-17', 'Hadir', '');

-- ============================================
-- ADDITIONAL JADWAL for other classes
-- ============================================
INSERT INTO jadwal_kelas (hari, sesi, mapel_id, kelas_id, guru_id, ruangan, tahun_ajaran, semester, status) VALUES
-- Jadwal untuk Kelas X IPA 2
('Senin', 1, 1, 2, 1, 'R. 102', '2025/2026', 'genap', 'aktif'),
('Senin', 2, 2, 2, 2, 'Lab. Fisika', '2025/2026', 'genap', 'aktif'),
('Senin', 3, 3, 2, 3, 'Lab. Kimia', '2025/2026', 'genap', 'aktif'),
('Senin', 4, 7, 2, 7, 'R. 102', '2025/2026', 'genap', 'aktif'),
('Selasa', 1, 4, 2, 4, 'Lab. Biologi', '2025/2026', 'genap', 'aktif'),
('Selasa', 2, 8, 2, 8, 'R. 102', '2025/2026', 'genap', 'aktif'),
('Selasa', 3, 9, 2, 9, 'R. 102', '2025/2026', 'genap', 'aktif'),
('Selasa', 4, 10, 2, 1, 'Lapangan', '2025/2026', 'genap', 'aktif'),

-- Jadwal untuk Kelas X IPS 1
('Senin', 1, 1, 3, 1, 'R. 103', '2025/2026', 'genap', 'aktif'),
('Senin', 2, 5, 3, 5, 'R. 103', '2025/2026', 'genap', 'aktif'),
('Senin', 3, 6, 3, 6, 'R. 103', '2025/2026', 'genap', 'aktif'),
('Senin', 4, 7, 3, 7, 'R. 103', '2025/2026', 'genap', 'aktif'),
('Selasa', 1, 15, 3, 6, 'R. 103', '2025/2026', 'genap', 'aktif'),
('Selasa', 2, 8, 3, 8, 'R. 103', '2025/2026', 'genap', 'aktif'),
('Selasa', 3, 9, 3, 9, 'R. 103', '2025/2026', 'genap', 'aktif'),
('Selasa', 4, 10, 3, 1, 'Lapangan', '2025/2026', 'genap', 'aktif');

-- ============================================
-- UPDATE TOTAL POIN SISWA (RECALCULATE)
-- ============================================
UPDATE siswa s SET 
    total_poin_prestasi = (SELECT COALESCE(SUM(poin), 0) FROM poin_prestasi WHERE siswa_id = s.id),
    total_poin_pelanggaran = (SELECT COALESCE(SUM(poin), 0) FROM poin_pelanggaran WHERE siswa_id = s.id);

-- ============================================
-- COMPREHENSIVE REPORT QUERIES
-- ============================================

-- REPORT 1: Daftar Semua Siswa Aktif
SELECT 
    s.nis,
    s.nisn,
    s.nama_lengkap,
    s.jenis_kelamin,
    k.nama_kelas,
    s.tempat_lahir,
    s.tanggal_lahir,
    s.alamat,
    s.total_poin_prestasi,
    s.total_poin_pelanggaran
FROM siswa s
LEFT JOIN kelas k ON s.kelas_id = k.id
WHERE s.status = 'aktif'
ORDER BY k.tingkat DESC, k.nama_kelas, s.nama_lengkap;

-- REPORT 2: Daftar Semua Guru
SELECT 
    u.nip,
    u.nama_lengkap,
    u.jenis_kelamin,
    u.no_telepon,
    u.email,
    u.alamat,
    u.status
FROM users u
WHERE u.role = 'guru'
ORDER BY u.nama_lengkap;

-- REPORT 3: Daftar Kelas dengan Wali Kelas
SELECT 
    k.kode_kelas,
    k.nama_kelas,
    k.tingkat,
    k.jurusan,
    u.nama_lengkap as wali_kelas,
    k.kapasitas,
    (SELECT COUNT(*) FROM siswa WHERE kelas_id = k.id AND status = 'aktif') as jumlah_siswa,
    k.tahun_ajaran
FROM kelas k
LEFT JOIN users u ON k.wali_kelas_id = u.id
WHERE k.status = 'aktif'
ORDER BY k.tingkat DESC, k.nama_kelas;

-- REPORT 4: Ranking Prestasi Top 50
SELECT 
    s.nis,
    s.nama_lengkap,
    k.nama_kelas,
    s.total_poin_prestasi,
    COUNT(p.id) as jumlah_prestasi
FROM siswa s
LEFT JOIN kelas k ON s.kelas_id = k.id
LEFT JOIN poin_prestasi p ON s.id = p.siswa_id
WHERE s.total_poin_prestasi > 0
GROUP BY s.id
ORDER BY s.total_poin_prestasi DESC
LIMIT 50;

-- REPORT 5: Ranking Pelanggaran Top 50
SELECT 
    s.nis,
    s.nama_lengkap,
    k.nama_kelas,
    s.total_poin_pelanggaran,
    COUNT(p.id) as jumlah_pelanggaran
FROM siswa s
LEFT JOIN kelas k ON s.kelas_id = k.id
LEFT JOIN poin_pelanggaran p ON s.id = p.siswa_id
WHERE s.total_poin_pelanggaran > 0
GROUP BY s.id
ORDER BY s.total_poin_pelanggaran DESC
LIMIT 50;

-- REPORT 6: Siswa dengan Peringatan (Poin Pelanggaran > 50)
SELECT 
    s.nis,
    s.nama_lengkap,
    k.nama_kelas,
    s.total_poin_pelanggaran,
    CASE 
        WHEN s.total_poin_pelanggaran >= 100 THEN 'SANGAT TINGGI - Panggilan Orang Tua'
        WHEN s.total_poin_pelanggaran >= 75 THEN 'TINGGI - Surat Pernyataan'
        WHEN s.total_poin_pelanggaran >= 50 THEN 'SEDANG - Pembinaan Wali Kelas'
        ELSE 'RENDAH'
    END as tingkat_peringatan
FROM siswa s
LEFT JOIN kelas k ON s.kelas_id = k.id
WHERE s.total_poin_pelanggaran > 50
ORDER BY s.total_poin_pelanggaran DESC;

-- REPORT 7: Rekap Absensi Per Siswa (Januari 2026)
SELECT 
    s.nis,
    s.nama_lengkap,
    k.nama_kelas,
    SUM(CASE WHEN a.status = 'Hadir' THEN 1 ELSE 0 END) as hadir,
    SUM(CASE WHEN a.status = 'Sakit' THEN 1 ELSE 0 END) as sakit,
    SUM(CASE WHEN a.status = 'Izin' THEN 1 ELSE 0 END) as izin,
    SUM(CASE WHEN a.status = 'Alpha' THEN 1 ELSE 0 END) as alpha,
    COUNT(a.id) as total_hari
FROM siswa s
LEFT JOIN kelas k ON s.kelas_id = k.id
LEFT JOIN absensi a ON s.id = a.siswa_id AND MONTH(a.tanggal) = 1 AND YEAR(a.tanggal) = 2026
WHERE s.status = 'aktif'
GROUP BY s.id
ORDER BY k.nama_kelas, s.nama_lengkap;

-- REPORT 8: Jadwal Mengajar Per Guru
SELECT 
    u.nama_lengkap as nama_guru,
    m.nama_mapel,
    k.nama_kelas,
    j.hari,
    j.sesi,
    j.ruangan
FROM jadwal_kelas j
LEFT JOIN users u ON j.guru_id = u.id
LEFT JOIN mata_pelajaran m ON j.mapel_id = m.id
LEFT JOIN kelas k ON j.kelas_id = k.id
WHERE j.status = 'aktif'
ORDER BY u.nama_lengkap, FIELD(j.hari, 'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'), j.sesi;

-- REPORT 9: Daftar Mata Pelajaran dengan Guru Pengampu
SELECT 
    m.kode_mapel,
    m.nama_mapel,
    m.kategori,
    m.tingkat,
    m.jurusan,
    u.nama_lengkap as guru_pengampu,
    m.jam_per_minggu,
    m.semester
FROM mata_pelajaran m
LEFT JOIN users u ON m.guru_id = u.id
WHERE m.status = 'aktif'
ORDER BY m.tingkat, m.kategori, m.nama_mapel;

-- REPORT 10: Detail Prestasi Per Siswa
SELECT 
    s.nis,
    s.nama_lengkap,
    k.nama_kelas,
    p.tanggal,
    p.prestasi,
    p.poin,
    p.keterangan
FROM poin_prestasi p
LEFT JOIN siswa s ON p.siswa_id = s.id
LEFT JOIN kelas k ON s.kelas_id = k.id
ORDER BY p.tanggal DESC, p.poin DESC;

-- ============================================
-- VERIFICATION - Final Count
-- ============================================
SELECT 'Users (Admin+Guru)' as Tabel, COUNT(*) as Jumlah FROM users
UNION ALL
SELECT 'Kelas', COUNT(*) FROM kelas
UNION ALL
SELECT 'Siswa', COUNT(*) FROM siswa
UNION ALL
SELECT 'Mata Pelajaran', COUNT(*) FROM mata_pelajaran
UNION ALL
SELECT 'Jadwal Kelas', COUNT(*) FROM jadwal_kelas
UNION ALL
SELECT 'Absensi', COUNT(*) FROM absensi
UNION ALL
SELECT 'Poin Prestasi', COUNT(*) FROM poin_prestasi
UNION ALL
SELECT 'Poin Pelanggaran', COUNT(*) FROM poin_pelanggaran;
