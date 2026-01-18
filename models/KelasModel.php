<?php

class KelasModel extends BaseModel
{
    protected $table = 'kelas';

    public function getAllKelas()
    {
        // Query with wali kelas name
        $sql = "SELECT k.*, u.nama_lengkap as wali_kelas 
                FROM kelas k 
                LEFT JOIN users u ON k.wali_kelas_id = u.id 
                WHERE k.status = 'aktif' 
                ORDER BY k.tingkat DESC, k.nama_kelas ASC";
        return $this->rawQuery($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getGuruList()
    {
        return $this->rawQuery("SELECT id, nama_lengkap FROM users WHERE role = 'guru' AND status = 'aktif' ORDER BY nama_lengkap ASC")->fetch_all(MYSQLI_ASSOC);
    }

    public function insertKelas($data)
    {
        $sql = "INSERT INTO kelas (kode_kelas, nama_kelas, tingkat, jurusan, wali_kelas_id, kapasitas, tahun_ajaran) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->query($sql);
        $stmt->bind_param(
            "ssssiss",
            $data['kode_kelas'],
            $data['nama_kelas'],
            $data['tingkat'],
            $data['jurusan'],
            $data['wali_kelas_id'],
            $data['kapasitas'],
            $data['tahun_ajaran']
        );
        return $stmt->execute();
    }

    public function updateKelas($id, $data)
    {
        $sql = "UPDATE kelas SET kode_kelas=?, nama_kelas=?, tingkat=?, jurusan=?, wali_kelas_id=?, kapasitas=?, tahun_ajaran=?
                WHERE id=?";
        $stmt = $this->db->query($sql);
        $stmt->bind_param(
            "ssssissi",
            $data['kode_kelas'],
            $data['nama_kelas'],
            $data['tingkat'],
            $data['jurusan'],
            $data['wali_kelas_id'],
            $data['kapasitas'],
            $data['tahun_ajaran'],
            $id
        );
        return $stmt->execute();
    }
}
