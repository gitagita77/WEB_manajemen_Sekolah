<?php
require_once 'config/database.php';
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$sql = "(SELECT 'absensi' as type, a.status as activity, s.nama_lengkap, a.created_at as waktu
         FROM absensi a 
         JOIN siswa s ON a.siswa_id = s.id)
        UNION ALL
        (SELECT 'prestasi' as type, p.nama_prestasi as activity, s.nama_lengkap, p.created_at as waktu
         FROM poin_prestasi p 
         JOIN siswa s ON p.siswa_id = s.id)
        UNION ALL
        (SELECT 'pelanggaran' as type, pl.kategori_pelanggaran as activity, s.nama_lengkap, pl.created_at as waktu
         FROM poin_pelanggaran pl 
         JOIN siswa s ON pl.siswa_id = s.id)
        ORDER BY waktu DESC
        LIMIT 10";

$res = $conn->query($sql);
if (!$res) {
    die("Query failed: " . $conn->error);
} else {
    echo "Query successful!\n";
}
?>