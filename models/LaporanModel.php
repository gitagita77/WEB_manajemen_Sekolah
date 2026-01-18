<?php

class LaporanModel extends BaseModel
{

    public function getReportData($code)
    {
        $limit = isset($_GET['limit']) ? $_GET['limit'] : 100;

        switch ($code) {
            case 'SISWA_ALL':
                return $this->rawQuery("SELECT * FROM siswa WHERE status='aktif' ORDER BY nama_lengkap ASC")->fetch_all(MYSQLI_ASSOC);

            case 'GURU_ALL':
                return $this->rawQuery("SELECT * FROM users WHERE role='guru' ORDER BY nama_lengkap ASC")->fetch_all(MYSQLI_ASSOC);

            case 'KELAS_ALL':
                return $this->rawQuery("SELECT k.*, u.nama_lengkap as wali_kelas FROM kelas k LEFT JOIN users u ON k.wali_kelas_id = u.id ORDER BY k.tingkat, k.nama_kelas")->fetch_all(MYSQLI_ASSOC);

            case 'RANKING_PRESTASI':
                return $this->rawQuery("SELECT s.nis, s.nama_lengkap, k.nama_kelas, s.total_poin_prestasi FROM siswa s LEFT JOIN kelas k ON s.kelas_id = k.id WHERE s.total_poin_prestasi > 0 ORDER BY s.total_poin_prestasi DESC LIMIT 50")->fetch_all(MYSQLI_ASSOC);

            case 'RANKING_PELANGGARAN':
                return $this->rawQuery("SELECT s.nis, s.nama_lengkap, k.nama_kelas, s.total_poin_pelanggaran FROM siswa s LEFT JOIN kelas k ON s.kelas_id = k.id WHERE s.total_poin_pelanggaran > 0 ORDER BY s.total_poin_pelanggaran DESC LIMIT 50")->fetch_all(MYSQLI_ASSOC);

            case 'SISWA_WARNING':
                return $this->rawQuery("SELECT s.nis, s.nama_lengkap, k.nama_kelas, s.total_poin_pelanggaran FROM siswa s LEFT JOIN kelas k ON s.kelas_id = k.id WHERE s.total_poin_pelanggaran > 50 ORDER BY s.total_poin_pelanggaran DESC")->fetch_all(MYSQLI_ASSOC);

            case 'MAPEL_ALL':
                return $this->rawQuery("SELECT m.*, u.nama_lengkap as guru_pengampu FROM mata_pelajaran m LEFT JOIN users u ON m.guru_id = u.id")->fetch_all(MYSQLI_ASSOC);

            case 'ABSENSI_PREMIUM':
                $data = [];
                $res = $this->rawQuery("SELECT a.*, s.nama_lengkap, s.nis FROM absensi a JOIN siswa s ON a.siswa_id = s.id ORDER BY a.tanggal DESC, s.nama_lengkap ASC LIMIT $limit");
                $data['list'] = $res->fetch_all(MYSQLI_ASSOC);

                // Stats
                $statsRes = $this->rawQuery("SELECT 
                    SUM(CASE WHEN status='Hadir' THEN 1 ELSE 0 END) as hadir,
                    SUM(CASE WHEN status='Izin' THEN 1 ELSE 0 END) as izin,
                    SUM(CASE WHEN status='Sakit' THEN 1 ELSE 0 END) as sakit,
                    SUM(CASE WHEN status='Alpha' THEN 1 ELSE 0 END) as alpha,
                    COUNT(*) as total
                    FROM absensi");
                $data['stats'] = $statsRes->fetch_assoc();
                return $data;

            case 'DATA_INDUK_SISWA':
                return $this->rawQuery("SELECT s.*, k.nama_kelas 
                                      FROM siswa s 
                                      LEFT JOIN kelas k ON s.kelas_id = k.id 
                                      WHERE s.status='aktif' 
                                      ORDER BY s.nama_lengkap ASC")->fetch_all(MYSQLI_ASSOC);

            case 'SISWA_PER_KELAS':
                return $this->rawQuery("SELECT k.nama_kelas, s.nis, s.nama_lengkap, s.jenis_kelamin 
                                      FROM siswa s 
                                      JOIN kelas k ON s.kelas_id = k.id 
                                      ORDER BY k.nama_kelas, s.nama_lengkap")->fetch_all(MYSQLI_ASSOC);

            case 'DAFTAR_ALUMNI':
                return $this->rawQuery("SELECT nis, nama_lengkap, tahun_keluar as angkatan 
                                      FROM siswa WHERE status='alumni' ORDER BY tahun_keluar DESC, nama_lengkap ASC")->fetch_all(MYSQLI_ASSOC);

            case 'JADWAL_SEKOLAH':
                return $this->rawQuery("SELECT j.hari, j.sesi, m.nama_mapel, k.nama_kelas, u.nama_lengkap as guru 
                                      FROM jadwal_kelas j 
                                      JOIN mata_pelajaran m ON j.mapel_id = m.id 
                                      JOIN kelas k ON j.kelas_id = k.id 
                                      JOIN users u ON j.guru_id = u.id 
                                      ORDER BY FIELD(j.hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'), j.sesi ASC")->fetch_all(MYSQLI_ASSOC);

            case 'ABSENSI_HARIAN':
                return $this->rawQuery("SELECT a.tanggal, s.nama_lengkap, k.nama_kelas, a.status, a.keterangan 
                                      FROM absensi a 
                                      JOIN siswa s ON a.siswa_id = s.id 
                                      JOIN kelas k ON s.kelas_id = k.id 
                                      WHERE a.tanggal = CURDATE()")->fetch_all(MYSQLI_ASSOC);

            case 'ABSENSI_BULANAN':
                return $this->rawQuery("SELECT s.nama_lengkap, 
                                      SUM(CASE WHEN a.status='hadir' THEN 1 ELSE 0 END) as hadir,
                                      SUM(CASE WHEN a.status='sakit' THEN 1 ELSE 0 END) as sakit,
                                      SUM(CASE WHEN a.status='izin' THEN 1 ELSE 0 END) as izin,
                                      SUM(CASE WHEN a.status='alfa' THEN 1 ELSE 0 END) as alfa
                                      FROM siswa s 
                                      LEFT JOIN absensi a ON s.id = a.siswa_id 
                                      WHERE MONTH(a.tanggal) = MONTH(CURDATE()) OR a.tanggal IS NULL
                                      GROUP BY s.id")->fetch_all(MYSQLI_ASSOC);

            case 'DETAIL_PRESTASI':
                return $this->rawQuery("SELECT s.nama_lengkap, p.nama_prestasi, p.tingkat, p.poin, p.tanggal 
                                      FROM poin_prestasi p 
                                      JOIN siswa s ON p.siswa_id = s.id 
                                      ORDER BY p.tanggal DESC")->fetch_all(MYSQLI_ASSOC);

            case 'DETAIL_PELANGGARAN':
                return $this->rawQuery("SELECT s.nama_lengkap, pl.kategori_pelanggaran, pl.jenis_pelanggaran, pl.poin, pl.tanggal 
                                      FROM poin_pelanggaran pl 
                                      JOIN siswa s ON pl.siswa_id = s.id 
                                      ORDER BY pl.tanggal DESC")->fetch_all(MYSQLI_ASSOC);

            case 'STAT_GENDER':
                return $this->rawQuery("SELECT jenis_kelamin, COUNT(*) as jumlah FROM siswa GROUP BY jenis_kelamin")->fetch_all(MYSQLI_ASSOC);

            case 'LOG_AKTIVITAS':
                return $this->rawQuery("SELECT created_at as waktu, activity, ip_address FROM activity_logs ORDER BY created_at DESC LIMIT 100")->fetch_all(MYSQLI_ASSOC);

            case 'SURAT_PERINGATAN':
                return $this->rawQuery("SELECT s.nis, s.nama_lengkap, k.nama_kelas, s.total_poin_pelanggaran, 
                                      CASE 
                                        WHEN s.total_poin_pelanggaran >= 100 THEN 'SP 3 (DO)'
                                        WHEN s.total_poin_pelanggaran >= 75 THEN 'SP 2'
                                        WHEN s.total_poin_pelanggaran >= 50 THEN 'SP 1'
                                        ELSE 'Peringatan Lisan'
                                      END as status_sp
                                      FROM siswa s 
                                      JOIN kelas k ON s.kelas_id = k.id 
                                      WHERE s.total_poin_pelanggaran >= 25")->fetch_all(MYSQLI_ASSOC);

            case 'KARTU_POIN':
                return $this->rawQuery("SELECT s.nis, s.nama_lengkap, s.total_poin_prestasi as poin_plus, s.total_poin_pelanggaran as poin_minus,
                                      (s.total_poin_prestasi - s.total_poin_pelanggaran) as skor_akhir
                                      FROM siswa s ORDER BY skor_akhir DESC")->fetch_all(MYSQLI_ASSOC);

            case 'ABSENSI_GURU':
                return $this->rawQuery("SELECT u.nama_lengkap as guru, COUNT(a.id) as total_hadir 
                                      FROM users u 
                                      LEFT JOIN absensi a ON u.id = a.guru_id 
                                      WHERE u.role='guru' 
                                      GROUP BY u.id")->fetch_all(MYSQLI_ASSOC);

            case 'STAT_POIN_KELAS':
                return $this->rawQuery("SELECT k.nama_kelas, AVG(s.total_poin_prestasi) as rata_prestasi, AVG(s.total_poin_pelanggaran) as rata_pelanggaran 
                                      FROM kelas k 
                                      JOIN siswa s ON k.id = s.kelas_id 
                                      GROUP BY k.id")->fetch_all(MYSQLI_ASSOC);

            default:
                // Return generic empty or maybe a message
                return [];
        }
    }
}
