<?php
require_once 'config/database.php';
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 1. Add Kelas records
$classes = [
    ['X-IPA-2', 'X IPA 2', 'X', 'IPA', 22100110, 32],
    ['X-IPS-1', 'X IPS 1', 'X', 'IPS', 22100111, 30],
    ['XI-IPA-1', 'XI IPA 1', 'XI', 'IPA', 22100112, 30],
];

foreach ($classes as $c) {
    $stmt = $conn->prepare("INSERT INTO kelas (kode_kelas, nama_kelas, tingkat, jurusan, wali_kelas_id, kapasitas, tahun_ajaran, status) VALUES (?, ?, ?, ?, ?, ?, '2025/2026', 'aktif')");
    $stmt->bind_param("ssssii", $c[0], $c[1], $c[2], $c[3], $c[4], $c[5]);
    $stmt->execute();
    echo "✅ Class added: {$c[0]}\n";
}

// 2. Add Mata Pelajaran
$subjects = [
    ['MTK-X', 'Matematika Wajib', 'umum', 'X', '', 123456],
    ['FIS-X-IPA', 'Fisika', 'jurusan', 'X', 'IPA', 22100110],
    ['BIN-X', 'Bahasa Indonesia', 'umum', 'X', '', 22100111],
];

foreach ($subjects as $s) {
    $stmt = $conn->prepare("INSERT INTO mata_pelajaran (kode_mapel, nama_mapel, kategori, tingkat, jurusan, guru_id, semester, tahun_ajaran, jam_per_minggu, status) VALUES (?, ?, ?, ?, ?, ?, 'genap', '2025/2026', 4, 'aktif')");
    $stmt->bind_param("sssssi", $s[0], $s[1], $s[2], $s[3], $s[4], $s[5]);
    $stmt->execute();
    echo "✅ Subject added: {$s[1]}\n";
}

// 3. Add Jadwal Pelajaran (for class ID 1)
$schedules = [
    ['Senin', 1, 1, 1, 123456, 'R. 101'],
    ['Senin', 2, 1, 1, 123456, 'R. 101'],
    ['Selasa', 1, 2, 1, 22100110, 'Lab Fisika'],
    ['Selasa', 2, 2, 1, 22100110, 'Lab Fisika'],
];

foreach ($schedules as $j) {
    // Note: I'll use the first 3 subject IDs I just inserted.
    // Better to fetch them or just assume they are 1, 2, 3 if it's a fresh start.
    // For safety, I'll fetch the IDs.
    $mapel_res = $conn->query("SELECT id FROM mata_pelajaran WHERE kode_mapel = '{$j[2]}'");
    // Actually $j[2] is kode_mapel in my array logic, but $schedules array has subject index.
    // Wait, I used index in my logic below. Let's fix $schedules.
}

// Re-doing Jadwal with dynamic IDs
$conn->query("SET FOREIGN_KEY_CHECKS=0"); // To simplify dummy data insertion
$res_mapel = $conn->query("SELECT id, kode_mapel FROM mata_pelajaran");
$mapels = [];
while ($row = $res_mapel->fetch_assoc())
    $mapels[$row['kode_mapel']] = $row['id'];

$res_kelas = $conn->query("SELECT id, kode_kelas FROM kelas");
$kelas_ids = [];
while ($row = $res_kelas->fetch_assoc())
    $kelas_ids[$row['kode_kelas']] = $row['id'];

$schedules = [
    ['Senin', 1, 'MTK-X', 'X-IPA-1', 123456, 'R. 101'],
    ['Senin', 2, 'MTK-X', 'X-IPA-1', 123456, 'R. 101'],
    ['Selasa', 1, 'FIS-X-IPA', 'X-IPA-1', 22100110, 'Lab Fisika'],
    ['Selasa', 2, 'FIS-X-IPA', 'X-IPA-1', 22100110, 'Lab Fisika'],
];

foreach ($schedules as $j) {
    if (isset($mapels[$j[2]]) && isset($kelas_ids[$j[3]])) {
        $stmt = $conn->prepare("INSERT INTO jadwal_kelas (hari, sesi, mapel_id, kelas_id, guru_id, ruangan, tahun_ajaran, semester, status) VALUES (?, ?, ?, ?, ?, ?, '2025/2026', 'genap', 'aktif')");
        $stmt->bind_param("siiiis", $j[0], $j[1], $mapels[$j[2]], $kelas_ids[$j[3]], $j[4], $j[5]);
        $stmt->execute();
        echo "✅ Schedule added: {$j[0]} Sesi {$j[1]}\n";
    }
}

// 4. Add Absensi for today
$res_siswa = $conn->query("SELECT id FROM siswa");
$today = date('Y-m-d');
while ($s = $res_siswa->fetch_assoc()) {
    $status = (rand(0, 10) > 8) ? 'Izin' : 'Hadir';
    $conn->query("INSERT INTO absensi (siswa_id, tanggal, status, keterangan) VALUES ({$s['id']}, '{$today}', '{$status}', '')");
}
echo "✅ Attendance added for all students for today.\n";

$conn->query("SET FOREIGN_KEY_CHECKS=1");
$conn->close();
?>