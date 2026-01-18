<?php

class AbsensiModel extends BaseModel
{
    protected $table = 'absensi';

    // Get attendance for a specific class and date
    public function getAbsensiByKelasTanggal($kelas_id, $tanggal)
    {
        $sql = "SELECT s.id as siswa_id, s.nis, s.nama_lengkap, a.status, a.keterangan, a.id as absensi_id
                FROM siswa s 
                LEFT JOIN absensi a ON s.id = a.siswa_id AND a.tanggal = ?
                WHERE s.kelas_id = ? AND s.status = 'aktif'
                ORDER BY s.nama_lengkap ASC";

        $stmt = $this->db->query($sql);
        $stmt->bind_param("si", $tanggal, $kelas_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // Check if attendance already exists for a student on a date
    public function checkExisting($siswa_id, $tanggal)
    {
        $stmt = $this->db->query("SELECT id FROM absensi WHERE siswa_id = ? AND tanggal = ?");
        $stmt->bind_param("is", $siswa_id, $tanggal);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res->fetch_assoc(); // Returns row or null
    }

    public function upsertAbsensi($siswa_id, $tanggal, $status, $keterangan)
    {
        $existing = $this->checkExisting($siswa_id, $tanggal);

        if ($existing) {
            // Update
            $sql = "UPDATE absensi SET status = ?, keterangan = ? WHERE id = ?";
            $stmt = $this->db->query($sql);
            $stmt->bind_param("ssi", $status, $keterangan, $existing['id']);
        } else {
            // Insert
            $sql = "INSERT INTO absensi (siswa_id, tanggal, status, keterangan) VALUES (?, ?, ?, ?)";
            $stmt = $this->db->query($sql);
            $stmt->bind_param("isss", $siswa_id, $tanggal, $status, $keterangan);
        }
        return $stmt->execute();
    }

    public function getRekapAbsensi($kelas_id, $bulan, $tahun)
    {
        // Complex query to pivot or aggregate status
        // For simplicity, just fetch raw and process in PHP or fetch specific counts
        $sql = "SELECT s.nama_lengkap, 
                SUM(CASE WHEN a.status = 'Hadir' THEN 1 ELSE 0 END) as hadir,
                SUM(CASE WHEN a.status = 'Sakit' THEN 1 ELSE 0 END) as sakit,
                SUM(CASE WHEN a.status = 'Izin' THEN 1 ELSE 0 END) as izin,
                SUM(CASE WHEN a.status = 'Alpha' THEN 1 ELSE 0 END) as alpha
                FROM siswa s
                LEFT JOIN absensi a ON s.id = a.siswa_id AND MONTH(a.tanggal) = ? AND YEAR(a.tanggal) = ?
                WHERE s.kelas_id = ? AND s.status = 'aktif'
                GROUP BY s.id
                ORDER BY s.nama_lengkap ASC";

        $stmt = $this->db->query($sql);
        $stmt->bind_param("iii", $bulan, $tahun, $kelas_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
