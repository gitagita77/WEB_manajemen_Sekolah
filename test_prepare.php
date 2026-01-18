<?php
require_once 'config/database.php';
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$today = 'Senin';
$limit = 5;
$sql = "SELECT j.*, m.nama_mapel, u.nama_lengkap as nama_guru 
        FROM jadwal_kelas j
        JOIN mata_pelajaran m ON j.mapel_id = m.id
        JOIN users u ON j.guru_id = u.id
        WHERE j.hari = ? AND j.status = 'aktif'
        ORDER BY j.sesi ASC
        LIMIT ?";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
} else {
    echo "Prepare successful!\n";
}
?>