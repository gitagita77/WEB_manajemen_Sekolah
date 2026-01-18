-- ============================================
-- ADDITIONAL 10 GURU & 10 SISWA
-- Quick import untuk testing
-- ============================================

USE manajemen_sekolah;

-- ============================================
-- 10 GURU BARU
-- ============================================
INSERT INTO users (username, password, nama_lengkap, nip, jenis_kelamin, role, status, no_telepon, email, alamat) VALUES
('guru10', 'guru123', 'Kartika Dewi, S.Pd', '199304102016042010', 'P', 'guru', 'aktif', '081234567900', 'kartika.dewi@sekolah.sch.id', 'Jl. Orchid No. 12'),
('guru11', 'guru123', 'Lukman Hakim, S.Pd., M.Pd', '198812152017031011', 'L', 'guru', 'aktif', '081234567901', 'lukman.hakim@sekolah.sch.id', 'Jl. Jasmine No. 34'),
('guru12', 'guru123', 'Maya Sari, S.Si', '199205202018042012', 'P', 'guru', 'aktif', '081234567902', 'maya.sari@sekolah.sch.id', 'Jl. Lily No. 56'),
('guru13', 'guru123', 'Nugroho Santoso, S.Pd', '198909252019031013', 'L', 'guru', 'aktif', '081234567903', 'nugroho.santoso@sekolah.sch.id', 'Jl. Sunflower No. 78'),
('guru14', 'guru123', 'Oktavia Rahmawati, S.Pd', '199106302020042014', 'P', 'guru', 'aktif', '081234567904', 'oktavia.rahmawati@sekolah.sch.id', 'Jl. Daisy No. 90'),
('guru15', 'guru123', 'Putra Wijaya, S.Kom', '199003152021031015', 'L', 'guru', 'aktif', '081234567905', 'putra.wijaya@sekolah.sch.id', 'Jl. Poppy No. 23'),
('guru16', 'guru123', 'Qory Sandrina, S.Pd', '199208202022042016', 'P', 'guru', 'aktif', '081234567906', 'qory.sandrina@sekolah.sch.id', 'Jl. Violet No. 45'),
('guru17', 'guru123', 'Rahmat Hidayat, S.Pd.I', '198807102023031017', 'L', 'guru', 'aktif', '081234567907', 'rahmat.hidayat@sekolah.sch.id', 'Jl. Peony No. 67'),
('guru18', 'guru123', 'Sinta Maharani, S.S', '199304252024042018', 'P', 'guru', 'aktif', '081234567908', 'sinta.maharani@sekolah.sch.id', 'Jl. Carnation No. 89'),
('guru19', 'guru123', 'Taufan Nugraha, S.Pd.Jas', '199001152025031019', 'L', 'guru', 'aktif', '081234567909', 'taufan.nugraha@sekolah.sch.id', 'Jl. Magnolia No. 12');

-- ============================================
-- 10 SISWA BARU (Tersebar di berbagai kelas)
-- ============================================
INSERT INTO siswa (nis, nisn, nama_lengkap, jenis_kelamin, kelas_id, tempat_lahir, tanggal_lahir, alamat, status, total_poin_prestasi, total_poin_pelanggaran) VALUES
-- Kelas X IPA 1 (2 siswa)
('2025021', '0087654341', 'Arif Budiman', 'L', 1, 'Jakarta', '2009-01-20', 'Jl. Flamboyan No. 101', 'aktif', 0, 0),
('2025022', '0087654342', 'Bunga Lestari', 'P', 1, 'Bandung', '2009-03-15', 'Jl. Kamboja No. 102', 'aktif', 0, 0),

-- Kelas X IPA 2 (2 siswa)
('2025023', '0087654343', 'Candra Wijaya', 'L', 2, 'Surabaya', '2009-05-10', 'Jl. Cempaka No. 103', 'aktif', 0, 0),
('2025024', '0087654344', 'Dina Mariana', 'P', 2, 'Yogyakarta', '2009-07-25', 'Jl. Bougenville No. 104', 'aktif', 0, 0),

-- Kelas XI IPA 1 (2 siswa)
('2024016', '0077654336', 'Eko Prasetyo', 'L', 4, 'Semarang', '2008-02-12', 'Jl. Azalea No. 105', 'aktif', 0, 0),
('2024017', '0077654337', 'Fitri Handayani', 'P', 4, 'Malang', '2008-04-18', 'Jl. Gardenia No. 106', 'aktif', 0, 0),

-- Kelas XI IPA 2 (2 siswa)
('2024018', '0077654338', 'Galih Ramadhan', 'L', 5, 'Solo', '2008-06-22', 'Jl. Begonia No. 107', 'aktif', 0, 0),
('2024019', '0077654339', 'Hana Safitri', 'P', 5, 'Medan', '2008-08-30', 'Jl. Aster No. 108', 'aktif', 0, 0),

-- Kelas XII IPA 1 (2 siswa)
('2023021', '0067654341', 'Irfan Maulana', 'L', 7, 'Palembang', '2007-01-15', 'Jl. Zinnia No. 109', 'aktif', 0, 0),
('2023022', '0067654342', 'Jasmine Putri', 'P', 7, 'Makassar', '2007-03-20', 'Jl. Freesia No. 110', 'aktif', 0, 0);

-- ============================================
-- UPDATE: Assign new teachers to classes (optional)
-- ============================================
UPDATE kelas SET wali_kelas_id = 10 WHERE id = 2;  -- X IPA 2
UPDATE kelas SET wali_kelas_id = 11 WHERE id = 3;  -- X IPS 1

-- ============================================
-- SAMPLE ABSENSI untuk siswa baru (hari ini)
-- ============================================
INSERT INTO absensi (siswa_id, tanggal, status, keterangan) VALUES
-- Get IDs from newly inserted students (assuming auto-increment continues)
((SELECT id FROM siswa WHERE nis = '2025021'), CURDATE(), 'Hadir', ''),
((SELECT id FROM siswa WHERE nis = '2025022'), CURDATE(), 'Hadir', ''),
((SELECT id FROM siswa WHERE nis = '2025023'), CURDATE(), 'Hadir', ''),
((SELECT id FROM siswa WHERE nis = '2025024'), CURDATE(), 'Sakit', 'Demam'),
((SELECT id FROM siswa WHERE nis = '2024016'), CURDATE(), 'Hadir', ''),
((SELECT id FROM siswa WHERE nis = '2024017'), CURDATE(), 'Hadir', ''),
((SELECT id FROM siswa WHERE nis = '2024018'), CURDATE(), 'Hadir', ''),
((SELECT id FROM siswa WHERE nis = '2024019'), CURDATE(), 'Izin', 'Keperluan keluarga'),
((SELECT id FROM siswa WHERE nis = '2023021'), CURDATE(), 'Hadir', ''),
((SELECT id FROM siswa WHERE nis = '2023022'), CURDATE(), 'Hadir', '');

-- ============================================
-- SAMPLE PRESTASI untuk siswa baru
-- ============================================
INSERT INTO poin_prestasi (siswa_id, tanggal, prestasi, poin, keterangan) VALUES
((SELECT id FROM siswa WHERE nis = '2025021'), '2026-01-15', 'Juara 2 Lomba Coding', 40, 'Tingkat Kota'),
((SELECT id FROM siswa WHERE nis = '2024016'), '2026-01-10', 'Juara 1 Lomba Esai', 35, 'Tingkat Sekolah'),
((SELECT id FROM siswa WHERE nis = '2023021'), '2026-01-12', 'Ranking 3 Kelas', 10, 'Semester Ganjil');

-- ============================================
-- SAMPLE PELANGGARAN untuk siswa baru
-- ============================================
INSERT INTO poin_pelanggaran (siswa_id, tanggal, pelanggaran, kategori, poin, sanksi, keterangan) VALUES
((SELECT id FROM siswa WHERE nis = '2025024'), '2026-01-16', 'Terlambat masuk sekolah/upacara', 'ringan', 5, 'Teguran Lisan', 'Terlambat 12 menit'),
((SELECT id FROM siswa WHERE nis = '2024019'), '2026-01-14', 'Tidak memakai atribut seragam lengkap', 'ringan', 3, 'Teguran Lisan', 'Tidak pakai name tag');

-- ============================================
-- UPDATE TOTAL POIN
-- ============================================
UPDATE siswa s SET 
    total_poin_prestasi = (SELECT COALESCE(SUM(poin), 0) FROM poin_prestasi WHERE siswa_id = s.id),
    total_poin_pelanggaran = (SELECT COALESCE(SUM(poin), 0) FROM poin_pelanggaran WHERE siswa_id = s.id)
WHERE s.nis IN ('2025021', '2025022', '2025023', '2025024', '2024016', '2024017', '2024018', '2024019', '2023021', '2023022');

-- ============================================
-- VERIFICATION
-- ============================================
SELECT 'Total Guru' as Info, COUNT(*) as Jumlah FROM users WHERE role = 'guru'
UNION ALL
SELECT 'Total Siswa', COUNT(*) FROM siswa WHERE status = 'aktif'
UNION ALL
SELECT 'Absensi Hari Ini', COUNT(*) FROM absensi WHERE tanggal = CURDATE();

-- ============================================
-- DISPLAY NEW DATA
-- ============================================
SELECT '=== 10 GURU BARU ===' as Info;
SELECT username, nama_lengkap, nip, email 
FROM users 
WHERE username IN ('guru10', 'guru11', 'guru12', 'guru13', 'guru14', 'guru15', 'guru16', 'guru17', 'guru18', 'guru19')
ORDER BY username;

SELECT '=== 10 SISWA BARU ===' as Info;
SELECT nis, nama_lengkap, k.nama_kelas, total_poin_prestasi, total_poin_pelanggaran
FROM siswa s
LEFT JOIN kelas k ON s.kelas_id = k.id
WHERE s.nis IN ('2025021', '2025022', '2025023', '2025024', '2024016', '2024017', '2024018', '2024019', '2023021', '2023022')
ORDER BY s.nis;
