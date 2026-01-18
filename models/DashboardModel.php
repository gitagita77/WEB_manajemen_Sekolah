<?php

class DashboardModel extends BaseModel
{

    public function getStats()
    {
        $stats = [];

        $res = $this->rawQuery("SELECT COUNT(*) as total FROM siswa WHERE status = 'aktif'");
        $stats['total_siswa'] = $res->fetch_assoc()['total'];

        $res = $this->rawQuery("SELECT COUNT(*) as total FROM users WHERE role = 'guru' AND status = 'aktif'");
        $stats['total_guru'] = $res->fetch_assoc()['total'];

        $res = $this->rawQuery("SELECT COUNT(*) as total FROM kelas WHERE status = 'aktif'");
        $stats['total_kelas'] = $res->fetch_assoc()['total'];

        return $stats;
    }

    public function getTopPrestasi($limit = 5)
    {
        $sql = "SELECT s.nama_lengkap, s.nis, s.total_poin_prestasi, k.nama_kelas 
                FROM siswa s 
                LEFT JOIN kelas k ON s.kelas_id = k.id 
                ORDER BY s.total_poin_prestasi DESC 
                LIMIT ?";
        $stmt = $this->db->query($sql);
        $stmt->bind_param("i", $limit);
        $stmt->execute();
        $result = $stmt->get_result();

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function getTopPelanggaran($limit = 5)
    {
        $sql = "SELECT s.nama_lengkap, s.nis, s.total_poin_pelanggaran, k.nama_kelas 
                FROM siswa s 
                LEFT JOIN kelas k ON s.kelas_id = k.id 
                ORDER BY s.total_poin_pelanggaran DESC 
                LIMIT ?";
        $stmt = $this->db->query($sql);
        $stmt->bind_param("i", $limit);
        $stmt->execute();
        $result = $stmt->get_result();

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function getAbsensiToday()
    {
        $today = date('Y-m-d');
        $sql = "SELECT 
                    SUM(CASE WHEN status = 'Hadir' THEN 1 ELSE 0 END) as hadir,
                    SUM(CASE WHEN status = 'Sakit' THEN 1 ELSE 0 END) as sakit,
                    SUM(CASE WHEN status = 'Izin' THEN 1 ELSE 0 END) as izin,
                    SUM(CASE WHEN status = 'Alpha' THEN 1 ELSE 0 END) as alpha,
                    COUNT(*) as total
                FROM absensi 
                WHERE tanggal = ?";
        $stmt = $this->db->query($sql);
        $stmt->bind_param("s", $today);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getStudentPerClass()
    {
        $sql = "SELECT k.nama_kelas, COUNT(s.id) as total 
                FROM kelas k 
                LEFT JOIN siswa s ON k.id = s.kelas_id 
                GROUP BY k.id";
        return $this->rawQuery($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getAttendanceTrend()
    {
        $sql = "SELECT tanggal, 
                    SUM(CASE WHEN status = 'Hadir' THEN 1 ELSE 0 END) as hadir
                FROM absensi 
                WHERE tanggal >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)
                GROUP BY tanggal 
                ORDER BY tanggal ASC";
        return $this->rawQuery($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getGenderStats()
    {
        $sql = "SELECT jenis_kelamin, COUNT(*) as total 
                FROM siswa 
                GROUP BY jenis_kelamin";
        return $this->rawQuery($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getUpcomingSchedule($limit = 5)
    {
        $hari = date('l'); // Current day in English
        $hari_indo = [
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu',
            'Sunday' => 'Minggu'
        ];

        $today = $hari_indo[$hari];

        // Logic: If today is Sunday or Saturday, show Monday's schedule instead
        $target_day = $today;
        if ($today == 'Minggu' || $today == 'Sabtu') {
            $target_day = 'Senin';
        }

        $sql = "SELECT j.*, m.nama_mapel, u.nama_lengkap as nama_guru 
                FROM jadwal_kelas j
                JOIN mata_pelajaran m ON j.mapel_id = m.id
                JOIN users u ON j.guru_id = u.id
                WHERE j.hari = ? AND j.status = 'aktif'
                ORDER BY j.sesi ASC
                LIMIT ?";
        $stmt = $this->db->query($sql);
        $stmt->bind_param("si", $target_day, $limit);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        return [
            'day' => $target_day,
            'list' => $result
        ];
    }

    public function getRecentActivities($limit = 5)
    {
        $sql = "SELECT * FROM (
                    SELECT 'absensi' as type, a.status as activity, s.nama_lengkap, a.created_at as waktu
                    FROM absensi a 
                    JOIN siswa s ON a.siswa_id = s.id
                    UNION ALL
                    SELECT 'prestasi' as type, p.nama_prestasi as activity, s.nama_lengkap, p.created_at as waktu
                    FROM poin_prestasi p 
                    JOIN siswa s ON p.siswa_id = s.id
                    UNION ALL
                    SELECT 'pelanggaran' as type, pl.kategori_pelanggaran as activity, s.nama_lengkap, pl.created_at as waktu
                    FROM poin_pelanggaran pl 
                    JOIN siswa s ON pl.siswa_id = s.id
                ) as combined_activities
                ORDER BY waktu DESC
                LIMIT ?";
        $stmt = $this->db->query($sql);
        $stmt->bind_param("i", $limit);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
