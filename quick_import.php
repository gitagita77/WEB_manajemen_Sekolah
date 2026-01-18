<?php
// Quick import script - Run once to add 10 guru and 10 siswa
require_once __DIR__ . '/config/database.php';

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Starting import...\n\n";

// Read SQL file
$sql = file_get_contents(__DIR__ . '/add_10_guru_10_siswa.sql');

// Execute multi-query
if ($conn->multi_query($sql)) {
    echo "✅ Import started successfully!\n";

    // Process all results
    do {
        if ($result = $conn->store_result()) {
            $result->free();
        }
    } while ($conn->more_results() && $conn->next_result());

    echo "\n✅ Import completed!\n\n";

    // Show counts
    $result = $conn->query("SELECT COUNT(*) as count FROM users WHERE role='guru'");
    $guru_count = $result->fetch_assoc()['count'];

    $result = $conn->query("SELECT COUNT(*) as count FROM siswa WHERE status='aktif'");
    $siswa_count = $result->fetch_assoc()['count'];

    echo "📊 Total Data:\n";
    echo "   👨‍🏫 Guru: $guru_count\n";
    echo "   👨‍🎓 Siswa: $siswa_count\n\n";

    echo "✅ Data berhasil ditambahkan!\n";
    echo "   - 10 Guru baru (guru10 - guru19)\n";
    echo "   - 10 Siswa baru\n";
    echo "   - Absensi hari ini\n";
    echo "   - Sample prestasi & pelanggaran\n";

} else {
    echo "❌ Error: " . $conn->error . "\n";
}

$conn->close();
?>