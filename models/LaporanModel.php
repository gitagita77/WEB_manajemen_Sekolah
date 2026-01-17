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

            default:
                // Return generic empty or maybe a message
                return [];
        }
    }
}
