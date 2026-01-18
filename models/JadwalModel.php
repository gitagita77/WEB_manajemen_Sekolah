<?php

class JadwalModel extends BaseModel
{
    protected $table = 'jadwal_kelas';

    public function getAllJadwal($kelas_id = null)
    {
        $sql = "SELECT j.*, m.nama_mapel, k.nama_kelas, u.nama_lengkap as nama_guru 
                FROM jadwal_kelas j 
                LEFT JOIN mata_pelajaran m ON j.mapel_id = m.id 
                LEFT JOIN kelas k ON j.kelas_id = k.id 
                LEFT JOIN users u ON j.guru_id = u.id 
                WHERE j.status = 'aktif'";

        if ($kelas_id) {
            $sql .= " AND j.kelas_id = " . intval($kelas_id);
        }

        $sql .= " ORDER BY FIELD(j.hari, 'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'), j.sesi ASC";

        return $this->rawQuery($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function insertJadwal($data)
    {
        $sql = "INSERT INTO jadwal_kelas (hari, sesi, mapel_id, kelas_id, guru_id, ruangan, tahun_ajaran, semester) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->query($sql);
        $stmt->bind_param(
            "siiiisss",
            $data['hari'],
            $data['sesi'],
            $data['mapel_id'],
            $data['kelas_id'],
            $data['guru_id'],
            $data['ruangan'],
            $data['tahun_ajaran'],
            $data['semester']
        );
        return $stmt->execute();
    }

    public function updateJadwal($id, $data)
    {
        $sql = "UPDATE jadwal_kelas SET hari=?, sesi=?, mapel_id=?, kelas_id=?, guru_id=?, ruangan=?, tahun_ajaran=?, semester=? 
                WHERE id=?";
        $stmt = $this->db->query($sql);
        $stmt->bind_param(
            "siiiisssi",
            $data['hari'],
            $data['sesi'],
            $data['mapel_id'],
            $data['kelas_id'],
            $data['guru_id'],
            $data['ruangan'],
            $data['tahun_ajaran'],
            $data['semester'],
            $id
        );
        return $stmt->execute();
    }
}
