<?php

class SiswaModel extends BaseModel
{
    protected $table = 'siswa';

    public function getAllSiswa()
    {
        // Only active students
        $sql = "SELECT s.*, k.nama_kelas 
                FROM siswa s 
                LEFT JOIN kelas k ON s.kelas_id = k.id 
                WHERE s.status = 'aktif' 
                ORDER BY s.nama_lengkap ASC";

        return $this->rawQuery($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getKelasList()
    {
        return $this->rawQuery("SELECT * FROM kelas WHERE status='aktif' ORDER BY nama_kelas ASC")->fetch_all(MYSQLI_ASSOC);
    }

    public function insertSiswa($data)
    {
        $sql = "INSERT INTO siswa (nis, nisn, nama_lengkap, jenis_kelamin, kelas_id, tempat_lahir, tanggal_lahir, alamat) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->query($sql);
        $stmt->bind_param(
            "ssssisss",
            $data['nis'],
            $data['nisn'],
            $data['nama_lengkap'],
            $data['jenis_kelamin'],
            $data['kelas_id'],
            $data['tempat_lahir'],
            $data['tanggal_lahir'],
            $data['alamat']
        );
        return $stmt->execute();
    }

    public function updateSiswa($id, $data)
    {
        $sql = "UPDATE siswa SET nis=?, nisn=?, nama_lengkap=?, jenis_kelamin=?, kelas_id=?, tempat_lahir=?, tanggal_lahir=?, alamat=? 
                WHERE id=?";
        $stmt = $this->db->query($sql);
        $stmt->bind_param(
            "ssssisssi",
            $data['nis'],
            $data['nisn'],
            $data['nama_lengkap'],
            $data['jenis_kelamin'],
            $data['kelas_id'],
            $data['tempat_lahir'],
            $data['tanggal_lahir'],
            $data['alamat'],
            $id
        );
        return $stmt->execute();
    }

    public function updateStatus($id, $status)
    {
        $stmt = $this->db->query("UPDATE siswa SET status = ? WHERE id = ?");
        $stmt->bind_param("si", $status, $id);
        return $stmt->execute();
    }
}
