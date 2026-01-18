-- ============================================
-- DUMMY DATA FOR SCHOOL MANAGEMENT SYSTEM
-- 10 records per table
-- ============================================

USE manajemen_sekolah;

-- Clear existing data (optional - uncomment if needed)
-- TRUNCATE TABLE poin_pelanggaran;
-- TRUNCATE TABLE poin_prestasi;
-- TRUNCATE TABLE absensi;
-- TRUNCATE TABLE jadwal_kelas;
-- TRUNCATE TABLE mata_pelajaran;
-- TRUNCATE TABLE siswa;
-- TRUNCATE TABLE kelas;
-- DELETE FROM users WHERE role = 'guru';

-- ============================================
-- 1. USERS (Admin & Guru) - 10 records
-- ============================================
INSERT INTO users (username, password, nama_lengkap, nip, jenis_kelamin, role, status, no_telepon, email, alamat) VALUES
('admin', 'admin123', 'Administrator Sistem', '198501012010011001', 'L', 'admin', 'aktif', '081234567890', 'admin@sekolah.sch.id', 'Jl. Pendidikan No. 1'),
('guru1', 'guru123', 'Dr. Ahmad Fauzi, S.Pd., M.Pd', '198203152006041001', 'L', 'guru', 'aktif', '081234567891', 'ahmad.fauzi@sekolah.sch.id', 'Jl. Mawar No. 12'),
('guru2', 'guru123', 'Siti Nurhaliza, S.Si., M.Si', '198505202007042002', 'P', 'guru', 'aktif', '081234567892', 'siti.nurhaliza@sekolah.sch.id', 'Jl. Melati No. 23'),
('guru3', 'guru123', 'Budi Santoso, S.Pd', '198712102009031003', 'L', 'guru', 'aktif', '081234567893', 'budi.santoso@sekolah.sch.id', 'Jl. Anggrek No. 45'),
('guru4', 'guru123', 'Dewi Lestari, S.Pd., M.Pd', '198904252010042004', 'P', 'guru', 'aktif', '081234567894', 'dewi.lestari@sekolah.sch.id', 'Jl. Kenanga No. 67'),
('guru5', 'guru123', 'Eko Prasetyo, S.Kom', '199001152011031005', 'L', 'guru', 'aktif', '081234567895', 'eko.prasetyo@sekolah.sch.id', 'Jl. Dahlia No. 89'),
('guru6', 'guru123', 'Fitri Handayani, S.Pd', '199106202012042006', 'P', 'guru', 'aktif', '081234567896', 'fitri.handayani@sekolah.sch.id', 'Jl. Tulip No. 34'),
('guru7', 'guru123', 'Hendra Wijaya, S.Pd', '198808102013031007', 'L', 'guru', 'aktif', '081234567897', 'hendra.wijaya@sekolah.sch.id', 'Jl. Sakura No. 56'),
('guru8', 'guru123', 'Indah Permata, S.S., M.Pd', '199203252014042008', 'P', 'guru', 'aktif', '081234567898', 'indah.permata@sekolah.sch.id', 'Jl. Lavender No. 78'),
('guru9', 'guru123', 'Joko Susilo, S.Pd.Jas', '198907152015031009', 'L', 'guru', 'aktif', '081234567899', 'joko.susilo@sekolah.sch.id', 'Jl. Teratai No. 90');

-- ============================================
-- 2. KELAS - 10 records
-- ============================================
INSERT INTO kelas (kode_kelas, nama_kelas, tingkat, jurusan, wali_kelas_id, kapasitas, tahun_ajaran, status) VALUES
('X-IPA-1', 'X IPA 1', 'X', 'IPA', 1, 32, '2025/2026', 'aktif'),
('X-IPA-2', 'X IPA 2', 'X', 'IPA', 2, 32, '2025/2026', 'aktif'),
('X-IPS-1', 'X IPS 1', 'X', 'IPS', 3, 30, '2025/2026', 'aktif'),
('XI-IPA-1', 'XI IPA 1', 'XI', 'IPA', 4, 30, '2025/2026', 'aktif'),
('XI-IPA-2', 'XI IPA 2', 'XI', 'IPA', 5, 30, '2025/2026', 'aktif'),
('XI-IPS-1', 'XI IPS 1', 'XI', 'IPS', 6, 28, '2025/2026', 'aktif'),
('XII-IPA-1', 'XII IPA 1', 'XII', 'IPA', 7, 28, '2025/2026', 'aktif'),
('XII-IPA-2', 'XII IPA 2', 'XII', 'IPA', 8, 28, '2025/2026', 'aktif'),
('XII-IPS-1', 'XII IPS 1', 'XII', 'IPS', 9, 26, '2025/2026', 'aktif'),
('XII-IPS-2', 'XII IPS 2', 'XII', 'IPS', 1, 26, '2025/2026', 'aktif');

-- ============================================
-- 3. SISWA - 30 records (10 per tingkat)
-- ============================================
INSERT INTO siswa (nis, nisn, nama_lengkap, jenis_kelamin, kelas_id, tempat_lahir, tanggal_lahir, alamat, status, total_poin_prestasi, total_poin_pelanggaran) VALUES
-- Kelas X IPA 1
('2025001', '0087654321', 'Andi Pratama', 'L', 1, 'Jakarta', '2009-03-15', 'Jl. Merdeka No. 10', 'aktif', 0, 0),
('2025002', '0087654322', 'Bella Safira', 'P', 1, 'Bandung', '2009-05-20', 'Jl. Sudirman No. 22', 'aktif', 0, 0),
('2025003', '0087654323', 'Citra Dewi', 'P', 1, 'Surabaya', '2009-07-12', 'Jl. Diponegoro No. 33', 'aktif', 0, 0),
('2025004', '0087654324', 'Dimas Aditya', 'L', 1, 'Yogyakarta', '2009-02-28', 'Jl. Gajah Mada No. 44', 'aktif', 0, 0),
('2025005', '0087654325', 'Eka Putri', 'P', 1, 'Semarang', '2009-09-05', 'Jl. Ahmad Yani No. 55', 'aktif', 0, 0),
('2025006', '0087654326', 'Fajar Ramadhan', 'L', 1, 'Malang', '2009-11-18', 'Jl. Veteran No. 66', 'aktif', 0, 0),
('2025007', '0087654327', 'Gita Savitri', 'P', 1, 'Solo', '2009-04-22', 'Jl. Pahlawan No. 77', 'aktif', 0, 0),
('2025008', '0087654328', 'Hadi Kusuma', 'L', 1, 'Medan', '2009-06-30', 'Jl. Pemuda No. 88', 'aktif', 0, 0),
('2025009', '0087654329', 'Intan Permatasari', 'P', 1, 'Palembang', '2009-08-14', 'Jl. Proklamasi No. 99', 'aktif', 0, 0),
('2025010', '0087654330', 'Joko Widodo', 'L', 1, 'Makassar', '2009-10-25', 'Jl. Kemerdekaan No. 100', 'aktif', 0, 0),

-- Kelas X IPA 2
('2025011', '0087654331', 'Kartika Sari', 'P', 2, 'Jakarta', '2009-01-10', 'Jl. Asia Afrika No. 11', 'aktif', 0, 0),
('2025012', '0087654332', 'Lukman Hakim', 'L', 2, 'Bandung', '2009-03-25', 'Jl. Braga No. 12', 'aktif', 0, 0),
('2025013', '0087654333', 'Maya Anggraini', 'P', 2, 'Surabaya', '2009-05-15', 'Jl. Tunjungan No. 13', 'aktif', 0, 0),
('2025014', '0087654334', 'Nanda Pratama', 'L', 2, 'Yogyakarta', '2009-07-20', 'Jl. Malioboro No. 14', 'aktif', 0, 0),
('2025015', '0087654335', 'Olivia Wijaya', 'P', 2, 'Semarang', '2009-09-08', 'Jl. Simpang Lima No. 15', 'aktif', 0, 0),

-- Kelas XI IPA 1
('2024001', '0077654321', 'Putri Maharani', 'P', 4, 'Jakarta', '2008-02-14', 'Jl. Gatot Subroto No. 21', 'aktif', 0, 0),
('2024002', '0077654322', 'Rizky Febrian', 'L', 4, 'Bandung', '2008-04-18', 'Jl. Dago No. 22', 'aktif', 0, 0),
('2024003', '0077654323', 'Sinta Dewi', 'P', 4, 'Surabaya', '2008-06-22', 'Jl. Pemuda No. 23', 'aktif', 0, 0),
('2024004', '0077654324', 'Taufik Hidayat', 'L', 4, 'Yogyakarta', '2008-08-30', 'Jl. Kaliurang No. 24', 'aktif', 0, 0),
('2024005', '0077654325', 'Uci Sanusi', 'P', 4, 'Semarang', '2008-10-12', 'Jl. Pandanaran No. 25', 'aktif', 0, 0),

-- Kelas XII IPA 1
('2023001', '0067654321', 'Vina Panduwinata', 'P', 7, 'Jakarta', '2007-01-05', 'Jl. Thamrin No. 31', 'aktif', 0, 0),
('2023002', '0067654322', 'Wahyu Nugroho', 'L', 7, 'Bandung', '2007-03-12', 'Jl. Cihampelas No. 32', 'aktif', 0, 0),
('2023003', '0067654323', 'Xena Maharani', 'P', 7, 'Surabaya', '2007-05-20', 'Jl. Basuki Rahmat No. 33', 'aktif', 0, 0),
('2023004', '0067654324', 'Yoga Pratama', 'L', 7, 'Yogyakarta', '2007-07-25', 'Jl. Affandi No. 34', 'aktif', 0, 0),
('2023005', '0067654325', 'Zahra Amelia', 'P', 7, 'Semarang', '2007-09-18', 'Jl. MT Haryono No. 35', 'aktif', 0, 0),

-- Kelas X IPS 1
('2025016', '0087654336', 'Agus Salim', 'L', 3, 'Malang', '2009-02-10', 'Jl. Ijen No. 16', 'aktif', 0, 0),
('2025017', '0087654337', 'Bunga Citra', 'P', 3, 'Solo', '2009-04-15', 'Jl. Slamet Riyadi No. 17', 'aktif', 0, 0),
('2025018', '0087654338', 'Cahyo Budi', 'L', 3, 'Medan', '2009-06-20', 'Jl. Sisingamangaraja No. 18', 'aktif', 0, 0),
('2025019', '0087654339', 'Dini Rahmawati', 'P', 3, 'Palembang', '2009-08-25', 'Jl. Sudirman No. 19', 'aktif', 0, 0),
('2025020', '0087654340', 'Edi Susanto', 'L', 3, 'Makassar', '2009-10-30', 'Jl. AP Pettarani No. 20', 'aktif', 0, 0);

-- ============================================
-- 4. MATA PELAJARAN - 15 records
-- ============================================
INSERT INTO mata_pelajaran (kode_mapel, nama_mapel, kategori, tingkat, jurusan, guru_id, kelas_id, semester, tahun_ajaran, jam_per_minggu, deskripsi, status) VALUES
('MTK-X', 'Matematika Wajib', 'umum', 'X', '', 1, NULL, 'tahunan', '2025/2026', 4, 'Matematika dasar untuk kelas X', 'aktif'),
('FIS-X-IPA', 'Fisika', 'jurusan', 'X', 'IPA', 2, NULL, 'tahunan', '2025/2026', 4, 'Fisika untuk IPA', 'aktif'),
('KIM-X-IPA', 'Kimia', 'jurusan', 'X', 'IPA', 3, NULL, 'tahunan', '2025/2026', 4, 'Kimia untuk IPA', 'aktif'),
('BIO-X-IPA', 'Biologi', 'jurusan', 'X', 'IPA', 4, NULL, 'tahunan', '2025/2026', 3, 'Biologi untuk IPA', 'aktif'),
('EKO-X-IPS', 'Ekonomi', 'jurusan', 'X', 'IPS', 5, NULL, 'tahunan', '2025/2026', 4, 'Ekonomi untuk IPS', 'aktif'),
('SOS-X-IPS', 'Sosiologi', 'jurusan', 'X', 'IPS', 6, NULL, 'tahunan', '2025/2026', 3, 'Sosiologi untuk IPS', 'aktif'),
('BIN-X', 'Bahasa Indonesia', 'umum', 'X', '', 7, NULL, 'tahunan', '2025/2026', 4, 'Bahasa Indonesia', 'aktif'),
('BING-X', 'Bahasa Inggris', 'umum', 'X', '', 8, NULL, 'tahunan', '2025/2026', 3, 'Bahasa Inggris', 'aktif'),
('PAI-X', 'Pendidikan Agama Islam', 'umum', 'X', '', 9, NULL, 'tahunan', '2025/2026', 2, 'PAI', 'aktif'),
('PJOK-X', 'Pendidikan Jasmani', 'umum', 'X', '', 1, NULL, 'tahunan', '2025/2026', 2, 'Olahraga', 'aktif'),
('SEJ-X', 'Sejarah Indonesia', 'umum', 'X', '', 2, NULL, 'tahunan', '2025/2026', 2, 'Sejarah', 'aktif'),
('PKN-X', 'Pendidikan Kewarganegaraan', 'umum', 'X', '', 3, NULL, 'tahunan', '2025/2026', 2, 'PKN', 'aktif'),
('SEN-X', 'Seni Budaya', 'umum', 'X', '', 4, NULL, 'tahunan', '2025/2026', 2, 'Seni', 'aktif'),
('TIK-X', 'Teknologi Informasi', 'peminatan', 'X', '', 5, NULL, 'tahunan', '2025/2026', 2, 'Komputer', 'aktif'),
('GEO-X-IPS', 'Geografi', 'jurusan', 'X', 'IPS', 6, NULL, 'tahunan', '2025/2026', 3, 'Geografi untuk IPS', 'aktif');

-- ============================================
-- 5. JADWAL KELAS - 20 records (Sample for X IPA 1)
-- ============================================
INSERT INTO jadwal_kelas (hari, sesi, mapel_id, kelas_id, guru_id, ruangan, tahun_ajaran, semester, status) VALUES
-- Senin
('Senin', 1, 1, 1, 1, 'R. 101', '2025/2026', 'genap', 'aktif'),
('Senin', 2, 1, 1, 1, 'R. 101', '2025/2026', 'genap', 'aktif'),
('Senin', 3, 2, 1, 2, 'Lab. Fisika', '2025/2026', 'genap', 'aktif'),
('Senin', 4, 2, 1, 2, 'Lab. Fisika', '2025/2026', 'genap', 'aktif'),
-- Selasa
('Selasa', 1, 3, 1, 3, 'Lab. Kimia', '2025/2026', 'genap', 'aktif'),
('Selasa', 2, 3, 1, 3, 'Lab. Kimia', '2025/2026', 'genap', 'aktif'),
('Selasa', 3, 4, 1, 4, 'Lab. Biologi', '2025/2026', 'genap', 'aktif'),
('Selasa', 4, 7, 1, 7, 'R. 101', '2025/2026', 'genap', 'aktif'),
-- Rabu
('Rabu', 1, 8, 1, 8, 'R. 101', '2025/2026', 'genap', 'aktif'),
('Rabu', 2, 8, 1, 8, 'R. 101', '2025/2026', 'genap', 'aktif'),
('Rabu', 3, 9, 1, 9, 'R. 101', '2025/2026', 'genap', 'aktif'),
('Rabu', 4, 10, 1, 1, 'Lapangan', '2025/2026', 'genap', 'aktif'),
-- Kamis
('Kamis', 1, 11, 1, 2, 'R. 101', '2025/2026', 'genap', 'aktif'),
('Kamis', 2, 12, 1, 3, 'R. 101', '2025/2026', 'genap', 'aktif'),
('Kamis', 3, 13, 1, 4, 'R. Seni', '2025/2026', 'genap', 'aktif'),
('Kamis', 4, 14, 1, 5, 'Lab. Komputer', '2025/2026', 'genap', 'aktif'),
-- Jumat
('Jumat', 1, 1, 1, 1, 'R. 101', '2025/2026', 'genap', 'aktif'),
('Jumat', 2, 7, 1, 7, 'R. 101', '2025/2026', 'genap', 'aktif'),
('Jumat', 3, 8, 1, 8, 'R. 101', '2025/2026', 'genap', 'aktif'),
('Jumat', 4, 4, 1, 4, 'Lab. Biologi', '2025/2026', 'genap', 'aktif');

-- ============================================
-- 6. ABSENSI - 50 records (Sample data)
-- ============================================
INSERT INTO absensi (siswa_id, tanggal, status, keterangan) VALUES
-- Tanggal 2026-01-15
(1, '2026-01-15', 'Hadir', ''),
(2, '2026-01-15', 'Hadir', ''),
(3, '2026-01-15', 'Sakit', 'Demam'),
(4, '2026-01-15', 'Hadir', ''),
(5, '2026-01-15', 'Hadir', ''),
(6, '2026-01-15', 'Hadir', ''),
(7, '2026-01-15', 'Izin', 'Keperluan keluarga'),
(8, '2026-01-15', 'Hadir', ''),
(9, '2026-01-15', 'Hadir', ''),
(10, '2026-01-15', 'Hadir', ''),
-- Tanggal 2026-01-16
(1, '2026-01-16', 'Hadir', ''),
(2, '2026-01-16', 'Hadir', ''),
(3, '2026-01-16', 'Sakit', 'Masih demam'),
(4, '2026-01-16', 'Hadir', ''),
(5, '2026-01-16', 'Hadir', ''),
(6, '2026-01-16', 'Alpha', ''),
(7, '2026-01-16', 'Hadir', ''),
(8, '2026-01-16', 'Hadir', ''),
(9, '2026-01-16', 'Hadir', ''),
(10, '2026-01-16', 'Hadir', ''),
-- Tanggal 2026-01-17
(1, '2026-01-17', 'Hadir', ''),
(2, '2026-01-17', 'Hadir', ''),
(3, '2026-01-17', 'Hadir', ''),
(4, '2026-01-17', 'Hadir', ''),
(5, '2026-01-17', 'Hadir', ''),
(6, '2026-01-17', 'Hadir', ''),
(7, '2026-01-17', 'Hadir', ''),
(8, '2026-01-17', 'Hadir', ''),
(9, '2026-01-17', 'Sakit', 'Flu'),
(10, '2026-01-17', 'Hadir', ''),
-- Additional dates for variety
(11, '2026-01-15', 'Hadir', ''),
(12, '2026-01-15', 'Hadir', ''),
(13, '2026-01-15', 'Hadir', ''),
(14, '2026-01-15', 'Hadir', ''),
(15, '2026-01-15', 'Hadir', ''),
(11, '2026-01-16', 'Hadir', ''),
(12, '2026-01-16', 'Hadir', ''),
(13, '2026-01-16', 'Hadir', ''),
(14, '2026-01-16', 'Izin', 'Acara keluarga'),
(15, '2026-01-16', 'Hadir', ''),
(11, '2026-01-17', 'Hadir', ''),
(12, '2026-01-17', 'Hadir', ''),
(13, '2026-01-17', 'Hadir', ''),
(14, '2026-01-17', 'Hadir', ''),
(15, '2026-01-17', 'Hadir', ''),
(16, '2026-01-17', 'Hadir', ''),
(17, '2026-01-17', 'Hadir', ''),
(18, '2026-01-17', 'Hadir', ''),
(19, '2026-01-17', 'Hadir', ''),
(20, '2026-01-17', 'Hadir', '');

-- ============================================
-- 7. POIN PRESTASI - 15 records
-- ============================================
INSERT INTO poin_prestasi (siswa_id, tanggal, prestasi, poin, keterangan) VALUES
(1, '2026-01-10', 'Juara 1 Olimpiade Matematika Tingkat Kota', 50, 'Kompetisi Matematika Se-Kota'),
(2, '2026-01-12', 'Juara 2 Lomba Karya Ilmiah', 40, 'Tingkat Provinsi'),
(4, '2026-01-08', 'Juara 1 Lomba Cerdas Cermat', 30, 'Tingkat Sekolah'),
(5, '2025-12-20', 'Ranking 1 Kelas Semester Ganjil', 20, 'Prestasi Akademik'),
(6, '2026-01-05', 'Juara 3 Lomba Pidato Bahasa Inggris', 25, 'Tingkat Kota'),
(7, '2025-12-15', 'Juara 1 Lomba Basket Antar Sekolah', 35, 'Tingkat Kota'),
(8, '2026-01-14', 'Ranking 2 Kelas Semester Ganjil', 15, 'Prestasi Akademik'),
(9, '2025-12-28', 'Juara 2 Lomba Desain Grafis', 30, 'Tingkat Provinsi'),
(10, '2026-01-11', 'Juara 1 Lomba Futsal', 30, 'Tingkat Sekolah'),
(11, '2026-01-09', 'Juara 3 Olimpiade Fisika', 40, 'Tingkat Provinsi'),
(12, '2025-12-22', 'Ketua OSIS Terpilih', 25, 'Kepemimpinan'),
(13, '2026-01-07', 'Juara 1 Lomba Puisi', 20, 'Tingkat Sekolah'),
(14, '2025-12-18', 'Juara 2 Lomba Tari Tradisional', 30, 'Tingkat Kota'),
(15, '2026-01-13', 'Ranking 3 Kelas Semester Ganjil', 10, 'Prestasi Akademik'),
(16, '2026-01-06', 'Juara 1 Lomba Robotika', 60, 'Tingkat Nasional');

-- ============================================
-- 8. POIN PELANGGARAN - 12 records
-- ============================================
INSERT INTO poin_pelanggaran (siswa_id, tanggal, pelanggaran, kategori, poin, sanksi, keterangan) VALUES
(3, '2026-01-15', 'Terlambat masuk sekolah/upacara', 'ringan', 5, 'Teguran Lisan', 'Terlambat 15 menit'),
(6, '2026-01-16', 'Tidak memakai atribut seragam lengkap', 'ringan', 3, 'Teguran Lisan', 'Tidak pakai dasi'),
(3, '2026-01-14', 'Seragam tidak rapi', 'ringan', 2, 'Teguran Lisan', 'Baju keluar'),
(9, '2026-01-17', 'Membuang sampah sembarangan', 'ringan', 5, 'Teguran Tertulis', 'Di koridor kelas'),
(6, '2026-01-10', 'Keluar kelas tanpa izin', 'sedang', 15, 'Panggilan Orang Tua', 'Saat jam pelajaran'),
(18, '2026-01-12', 'Tidak mengikuti upacara bendera', 'sedang', 25, 'Surat Pernyataan', 'Tanpa keterangan'),
(19, '2026-01-08', 'Makan/membeli makanan saat pelajaran', 'ringan', 3, 'Teguran Lisan', 'Makan di kelas'),
(20, '2026-01-11', 'Mengganggu kelas lain', 'sedang', 20, 'Teguran Tertulis', 'Membuat keributan'),
(3, '2026-01-09', 'Terlambat masuk sekolah/upacara', 'ringan', 5, 'Teguran Tertulis', 'Terlambat 20 menit - Pelanggaran ke-2'),
(6, '2026-01-13', 'Berhias berlebihan', 'ringan', 5, 'Teguran Lisan', 'Memakai makeup'),
(18, '2026-01-07', 'Mencoret-coret fasilitas sekolah', 'ringan', 10, 'Teguran Tertulis', 'Mencoret meja'),
(19, '2026-01-15', 'Membawa barang tidak terkait pelajaran', 'sedang', 15, 'Teguran Tertulis', 'Membawa mainan');

-- ============================================
-- UPDATE TOTAL POIN SISWA
-- ============================================
UPDATE siswa s SET 
    total_poin_prestasi = (SELECT COALESCE(SUM(poin), 0) FROM poin_prestasi WHERE siswa_id = s.id),
    total_poin_pelanggaran = (SELECT COALESCE(SUM(poin), 0) FROM poin_pelanggaran WHERE siswa_id = s.id);

-- ============================================
-- VERIFICATION QUERIES
-- ============================================
SELECT 'Users (Guru)' as Tabel, COUNT(*) as Jumlah FROM users WHERE role = 'guru'
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

-- ============================================
-- SAMPLE QUERIES TO TEST
-- ============================================
-- Top 10 Prestasi
SELECT s.nama_lengkap, k.nama_kelas, s.total_poin_prestasi 
FROM siswa s 
LEFT JOIN kelas k ON s.kelas_id = k.id 
WHERE s.total_poin_prestasi > 0 
ORDER BY s.total_poin_prestasi DESC 
LIMIT 10;

-- Top 10 Pelanggaran
SELECT s.nama_lengkap, k.nama_kelas, s.total_poin_pelanggaran 
FROM siswa s 
LEFT JOIN kelas k ON s.kelas_id = k.id 
WHERE s.total_poin_pelanggaran > 0 
ORDER BY s.total_poin_pelanggaran DESC 
LIMIT 10;

-- Jadwal Kelas X IPA 1
SELECT j.hari, j.sesi, m.nama_mapel, u.nama_lengkap as guru, j.ruangan
FROM jadwal_kelas j
LEFT JOIN mata_pelajaran m ON j.mapel_id = m.id
LEFT JOIN users u ON j.guru_id = u.id
WHERE j.kelas_id = 1
ORDER BY FIELD(j.hari, 'Senin','Selasa','Rabu','Kamis','Jumat'), j.sesi;
