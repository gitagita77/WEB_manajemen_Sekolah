<?php

class PelanggaranModel extends BaseModel
{
    protected $table = 'poin_pelanggaran';

    public function getAllPelanggaran()
    {
        $sql = "SELECT p.*, s.nama_lengkap as nama_siswa, s.nis, k.nama_kelas 
                FROM poin_pelanggaran p
                LEFT JOIN siswa s ON p.siswa_id = s.id
                LEFT JOIN kelas k ON s.kelas_id = k.id
                ORDER BY p.tanggal DESC";
        return $this->rawQuery($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function insertPelanggaran($data)
    {
        $sql = "INSERT INTO poin_pelanggaran (siswa_id, tanggal, pelanggaran, kategori, poin, sanksi, keterangan) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->query($sql);
        $stmt->bind_param(
            "isssisss",
            $data['siswa_id'],
            $data['tanggal'],
            $data['pelanggaran'],
            $data['kategori'],
            $data['poin'],
            $data['sanksi'],
            $data['keterangan']
        );
        $res = $stmt->execute();

        if ($res) {
            $this->updateTotalPoin($data['siswa_id']);
        }
        return $res;
    }

    public function updateTotalPoin($siswa_id)
    {
        $sql = "UPDATE siswa SET total_poin_pelanggaran = (SELECT SUM(poin) FROM poin_pelanggaran WHERE siswa_id = ?) WHERE id = ?";
        $stmt = $this->db->query($sql);
        $stmt->bind_param("ii", $siswa_id, $siswa_id);
        $stmt->execute();
    }

    public function deletePelanggaran($id)
    {
        $check = $this->rawQuery("SELECT siswa_id FROM poin_pelanggaran WHERE id = $id")->fetch_assoc();
        if ($check) {
            $this->db->query("DELETE FROM poin_pelanggaran WHERE id = $id");
            $this->updateTotalPoin($check['siswa_id']);
            return true;
        }
        return false;
    }

    // Get preset violations
    public function getPresetPelanggaran()
    {
        return [
            'ringan' => [
                ['nama' => 'Terlambat masuk sekolah/upacara', 'poin' => 5],
                ['nama' => 'Tidak memakai atribut seragam lengkap', 'poin' => 3],
                ['nama' => 'Seragam tidak rapi', 'poin' => 2],
                ['nama' => 'Membuang sampah sembarangan', 'poin' => 5],
                ['nama' => 'Makan/membeli makanan saat pelajaran', 'poin' => 3],
                ['nama' => 'Berhias berlebihan', 'poin' => 5],
                ['nama' => 'Mencoret-coret fasilitas sekolah', 'poin' => 10],
            ],
            'sedang' => [
                ['nama' => 'Keluar kelas tanpa izin', 'poin' => 15],
                ['nama' => 'Menerima tamu saat jam sekolah tanpa izin', 'poin' => 20],
                ['nama' => 'Tidak mengikuti upacara bendera', 'poin' => 25],
                ['nama' => 'Membawa barang tidak terkait pelajaran', 'poin' => 15],
                ['nama' => 'Mengganggu kelas lain', 'poin' => 20],
                ['nama' => 'Merusak tanaman sekolah', 'poin' => 30],
            ],
            'berat' => [
                ['nama' => 'Membolos tanpa izin', 'poin' => 50],
                ['nama' => 'Berkelahi', 'poin' => 100],
                ['nama' => 'Merokok di lingkungan sekolah', 'poin' => 150],
                ['nama' => 'Memalsukan tanda tangan', 'poin' => 75],
                ['nama' => 'Membawa senjata tajam/bahan berbahaya', 'poin' => 200],
                ['nama' => 'Membawa/menggunakan konten pornografi', 'poin' => 250],
                ['nama' => 'Anggota organisasi terlarang', 'poin' => 300],
                ['nama' => 'Melakukan persekongkolan/kecurangan', 'poin' => 100],
            ]
        ];
    }
}
