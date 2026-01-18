<?php
require_once 'config/database.php';
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Find a valid mapel_id
$mapelRes = $conn->query("SELECT id FROM mata_pelajaran LIMIT 1");
$mapel = $mapelRes->fetch_assoc();
$mapel_id = $mapel ? $mapel['id'] : null;

if (!$mapel_id) {
    // If no mapel exists, create one dummy mapel so we can record attendance
    // But usually there should be one if we added academic data
    die("No mapel found. Please add a subject first.");
}

$date = date('Y-m-d');
$res = $conn->query("SELECT id FROM siswa LIMIT 10");
$count = 0;

while ($row = $res->fetch_assoc()) {
    $siswa_id = $row['id'];

    // Using simple INSERT. If already exists, we skip or update.
    // The previous error was FK related.
    $sql = "INSERT INTO absensi (siswa_id, mapel_id, tanggal, status, keterangan, metode_absen) 
            VALUES ($siswa_id, $mapel_id, '$date', 'hadir', 'Input otomatis', 'manual') 
            ON DUPLICATE KEY UPDATE status='hadir'";

    if ($conn->query($sql)) {
        $count++;
    } else {
        echo "Error: " . $conn->error . "\n";
    }
}

echo "✅ Berhasil menginput absensi 'hadir' untuk $count siswa pada tanggal $date untuk mapel_id $mapel_id.";
$conn->close();
?>