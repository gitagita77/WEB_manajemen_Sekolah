<?php
require_once 'config/database.php';
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "--- Users ---\n";
$res = $conn->query("SELECT id, username, role FROM users");
while ($row = $res->fetch_assoc()) {
    echo "{$row['id']}: {$row['username']} ({$row['role']})\n";
}

echo "\n--- Kelas ---\n";
$res = $conn->query("SELECT id, kode_kelas FROM kelas");
while ($row = $res->fetch_assoc()) {
    echo "{$row['id']}: {$row['kode_kelas']}\n";
}

echo "\n--- Siswa ---\n";
$res = $conn->query("SELECT id, nama_lengkap FROM siswa");
while ($row = $res->fetch_assoc()) {
    echo "{$row['id']}: {$row['nama_lengkap']}\n";
}
?>