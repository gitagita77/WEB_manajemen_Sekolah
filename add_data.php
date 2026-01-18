<?php
require_once 'config/database.php';
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 1. Insert 1 Class with a valid wali_kelas_id (123456)
$kelas_sql = "INSERT INTO kelas (kode_kelas, nama_kelas, tingkat, jurusan, wali_kelas_id, kapasitas, tahun_ajaran, status) 
              VALUES ('X-IPA-1', 'X IPA 1', 'X', 'IPA', 123456, 32, '2025/2026', 'aktif')";

if ($conn->query($kelas_sql)) {
    $kelas_id = $conn->insert_id;
    echo "✅ Class 'X IPA 1' created with ID: $kelas_id\n";

    // 2. Insert 10 Students assigned to this class
    $students = [
        ['2025001', '0087654321', 'Andi Pratama', 'L'],
        ['2025002', '0087654322', 'Bella Safira', 'P'],
        ['2025003', '0087654323', 'Citra Dewi', 'P'],
        ['2025004', '0087654324', 'Dimas Aditya', 'L'],
        ['2025005', '0087654325', 'Eka Putri', 'P'],
        ['2025006', '0087654326', 'Fajar Ramadhan', 'L'],
        ['2025007', '0087654327', 'Gita Savitri', 'P'],
        ['2025008', '0087654328', 'Hadi Kusuma', 'L'],
        ['2025009', '0087654329', 'Intan Permatasari', 'P'],
        ['2025010', '0087654330', 'Joko Widodo', 'L']
    ];

    foreach ($students as $s) {
        $stmt = $conn->prepare("INSERT INTO siswa (nis, nisn, nama_lengkap, jenis_kelamin, kelas_id, tempat_lahir, tanggal_lahir, alamat, status) VALUES (?, ?, ?, ?, ?, 'Jakarta', '2009-01-01', 'Jl. Contoh No. 1', 'aktif')");
        $stmt->bind_param("ssssi", $s[0], $s[1], $s[2], $s[3], $kelas_id);
        if ($stmt->execute()) {
            echo "✅ Student inserted: {$s[2]}\n";
        } else {
            echo "❌ Error student {$s[2]}: " . $stmt->error . "\n";
        }
    }
} else {
    echo "❌ Error classes: " . $conn->error . "\n";
}

$conn->close();
?>