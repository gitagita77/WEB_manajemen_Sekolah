<?php

class MapelModel extends BaseModel
{
    protected $table = 'mata_pelajaran';

    public function getAllMapel()
    {
        $sql = "SELECT m.*, u.nama_lengkap as nama_guru, k.nama_kelas 
                FROM mata_pelajaran m 
                LEFT JOIN users u ON m.guru_id = u.id 
                LEFT JOIN kelas k ON m.kelas_id = k.id 
                WHERE m.status = 'aktif' 
                ORDER BY m.nama_mapel ASC";
        return $this->rawQuery($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function insertMapel($data)
    {
        $sql = "INSERT INTO mata_pelajaran (kode_mapel, nama_mapel, kategori, tingkat, jurusan, guru_id, kelas_id, semester, tahun_ajaran, jam_per_minggu, deskripsi) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->query($sql);
        $stmt->bind_param(
            "ssssssissis",
            $data['kode_mapel'],
            $data['nama_mapel'],
            $data['kategori'],
            $data['tingkat'],
            $data['jurusan'],
            $data['guru_id'],
            $data['kelas_id'],
            $data['semester'],
            $data['tahun_ajaran'],
            $data['jam_per_minggu'],
            $data['deskripsi']
        );
        return $stmt->execute();
    }

    public function updateMapel($id, $data)
    {
        $sql = "UPDATE mata_pelajaran SET kode_mapel=?, nama_mapel=?, kategori=?, tingkat=?, jurusan=?, guru_id=?, kelas_id=?, semester=?, tahun_ajaran=?, jam_per_minggu=?, deskripsi=? 
                WHERE id=?";
        $stmt = $this->db->query($sql);
        $stmt->bind_param(
            "ssssssissisi",
            $data['kode_mapel'],
            $data['nama_mapel'],
            $data['kategori'],
            $data['tingkat'],
            $data['jurusan'],
            $data['guru_id'],
            $data['kelas_id'],
            $data['semester'],
            $data['tahun_ajaran'],
            $data['jam_per_minggu'],
            $data['deskripsi'],
            $id
        );
        return $stmt->execute();
    }
}
