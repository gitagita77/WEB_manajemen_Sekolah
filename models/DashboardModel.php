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
}
