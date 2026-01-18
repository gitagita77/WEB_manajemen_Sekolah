<?php
require_once 'config/database.php';
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check current data
$r = $conn->query('SELECT COUNT(*) as c FROM kelas');
echo "Kelas: " . $r->fetch_assoc()['c'] . "\n";

$r = $conn->query('SELECT COUNT(*) as c FROM users WHERE role="guru"');
echo "Guru: " . $r->fetch_assoc()['c'] . "\n";

$r = $conn->query('SELECT COUNT(*) as c FROM siswa');
echo "Siswa: " . $r->fetch_assoc()['c'] . "\n";
?>