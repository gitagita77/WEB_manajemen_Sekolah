<?php

class PrestasiModel extends BaseModel
{
    protected $table = 'poin_prestasi';

    public function getAllPrestasi()
    {
        $sql = "SELECT p.*, s.nama_lengkap as nama_siswa, s.nis, k.nama_kelas 
                FROM poin_prestasi p
                LEFT JOIN siswa s ON p.siswa_id = s.id
                LEFT JOIN kelas k ON s.kelas_id = k.id
                ORDER BY p.tanggal DESC";
        return $this->rawQuery($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function insertPrestasi($data)
    {
        // Insert record
        $sql = "INSERT INTO poin_prestasi (siswa_id, tanggal, prestasi, poin, keterangan) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->query($sql);
        $stmt->bind_param(
            "issis",
            $data['siswa_id'],
            $data['tanggal'],
            $data['prestasi'],
            $data['poin'],
            $data['keterangan']
        );
        $res = $stmt->execute();

        if ($res) {
            // Update total points in siswa table
            $this->updateTotalPoin($data['siswa_id']);
        }
        return $res;
    }

    public function updateTotalPoin($siswa_id)
    {
        // Recalculate total
        $sql = "UPDATE siswa SET total_poin_prestasi = (SELECT SUM(poin) FROM poin_prestasi WHERE siswa_id = ?) WHERE id = ?";
        $stmt = $this->db->query($sql);
        $stmt->bind_param("ii", $siswa_id, $siswa_id);
        $stmt->execute();
    }

    public function deletePrestasi($id)
    {
        // Get siswa_id before delete to update total later
        $check = $this->rawQuery("SELECT siswa_id FROM poin_prestasi WHERE id = $id")->fetch_assoc();
        if ($check) {
            $this->db->query("DELETE FROM poin_prestasi WHERE id = $id"); // Hard delete is fine for logs or soft delete
            $this->updateTotalPoin($check['siswa_id']);
            return true;
        }
        return false;
    }
}
