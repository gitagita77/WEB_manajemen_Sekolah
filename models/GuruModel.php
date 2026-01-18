<?php

class GuruModel extends BaseModel
{
    protected $table = 'users';

    public function getAllGuru()
    {
        return $this->rawQuery("SELECT * FROM users WHERE role = 'guru' AND status != 'nonaktif' ORDER BY nama_lengkap ASC")->fetch_all(MYSQLI_ASSOC);
    }

    public function insertGuru($data)
    {
        $sql = "INSERT INTO users (username, password, nama_lengkap, nip, jenis_kelamin, role, status, no_telepon, email, alamat) 
                VALUES (?, ?, ?, ?, ?, 'guru', 'aktif', ?, ?, ?)";
        $stmt = $this->db->query($sql);
        $stmt->bind_param(
            "sssssssss",
            $data['username'],
            $data['password'],
            $data['nama_lengkap'],
            $data['nip'],
            $data['jenis_kelamin'],
            $data['no_telepon'],
            $data['email'],
            $data['alamat']
        );
        return $stmt->execute();
    }

    public function updateGuru($id, $data)
    {
        // Build query dynamically depending on if password is changed
        if (!empty($data['password'])) {
            $sql = "UPDATE users SET username=?, password=?, nama_lengkap=?, nip=?, jenis_kelamin=?, no_telepon=?, email=?, alamat=?, status=? WHERE id=?";
            $stmt = $this->db->query($sql);
            $stmt->bind_param(
                "sssssssssi",
                $data['username'],
                $data['password'],
                $data['nama_lengkap'],
                $data['nip'],
                $data['jenis_kelamin'],
                $data['no_telepon'],
                $data['email'],
                $data['alamat'],
                $data['status'],
                $id
            );
        } else {
            $sql = "UPDATE users SET username=?, nama_lengkap=?, nip=?, jenis_kelamin=?, no_telepon=?, email=?, alamat=?, status=? WHERE id=?";
            $stmt = $this->db->query($sql);
            $stmt->bind_param(
                "ssssssssi",
                $data['username'],
                $data['nama_lengkap'],
                $data['nip'],
                $data['jenis_kelamin'],
                $data['no_telepon'],
                $data['email'],
                $data['alamat'],
                $data['status'],
                $id
            );
        }
        return $stmt->execute();
    }
}
