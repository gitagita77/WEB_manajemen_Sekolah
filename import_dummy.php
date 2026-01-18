<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Dummy Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Import Dummy Data</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        // Database configuration
                        require_once __DIR__ . '/config/database.php';

                        // Create connection
                        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

                        // Check connection
                        if ($conn->connect_error) {
                            die("<div class='alert alert-danger'>Connection failed: " . $conn->connect_error . "</div>");
                        }

                        if (isset($_POST['import'])) {
                            echo "<div class='alert alert-info'>Memulai import data...</div>";

                            // Read SQL file
                            $sqlFile = __DIR__ . '/dummy_data.sql';

                            if (!file_exists($sqlFile)) {
                                echo "<div class='alert alert-danger'>File dummy_data.sql tidak ditemukan!</div>";
                            } else {
                                $sql = file_get_contents($sqlFile);

                                // Split into individual queries
                                $queries = array_filter(array_map('trim', explode(';', $sql)));

                                $success = 0;
                                $errors = 0;

                                foreach ($queries as $query) {
                                    if (empty($query) || strpos($query, '--') === 0)
                                        continue;

                                    if ($conn->query($query) === TRUE) {
                                        $success++;
                                    } else {
                                        $errors++;
                                        if ($errors <= 5) { // Show first 5 errors only
                                            echo "<div class='alert alert-warning small'>Error: " . $conn->error . "</div>";
                                        }
                                    }
                                }

                                echo "<div class='alert alert-success'>";
                                echo "<strong>Import Selesai!</strong><br>";
                                echo "Berhasil: $success queries<br>";
                                echo "Error: $errors queries";
                                echo "</div>";

                                // Show counts
                                $tables = ['users', 'kelas', 'siswa', 'mata_pelajaran', 'jadwal_kelas', 'absensi', 'poin_prestasi', 'poin_pelanggaran'];

                                echo "<h5 class='mt-4'>Jumlah Data per Tabel:</h5>";
                                echo "<table class='table table-bordered'>";
                                echo "<thead><tr><th>Tabel</th><th>Jumlah</th></tr></thead><tbody>";

                                foreach ($tables as $table) {
                                    $result = $conn->query("SELECT COUNT(*) as count FROM $table");
                                    $row = $result->fetch_assoc();
                                    echo "<tr><td>$table</td><td>" . $row['count'] . "</td></tr>";
                                }

                                echo "</tbody></table>";

                                echo "<div class='alert alert-info mt-3'>";
                                echo "<strong>Langkah Selanjutnya:</strong><br>";
                                echo "1. Kembali ke halaman <a href='index.php'>Dashboard</a><br>";
                                echo "2. Login dengan:<br>";
                                echo "&nbsp;&nbsp;&nbsp;- Admin: username=<code>admin</code>, password=<code>admin123</code><br>";
                                echo "&nbsp;&nbsp;&nbsp;- Guru: username=<code>guru1</code>, password=<code>guru123</code><br>";
                                echo "&nbsp;&nbsp;&nbsp;- Siswa: NIS=<code>2025001</code>, NISN=<code>0087654321</code>";
                                echo "</div>";
                            }
                        }

                        if (isset($_POST['import_additional'])) {
                            echo "<div class='alert alert-info'>Memulai import data tambahan...</div>";

                            $sqlFile = __DIR__ . '/additional_dummy_data.sql';

                            if (!file_exists($sqlFile)) {
                                echo "<div class='alert alert-danger'>File additional_dummy_data.sql tidak ditemukan!</div>";
                            } else {
                                $sql = file_get_contents($sqlFile);
                                $queries = array_filter(array_map('trim', explode(';', $sql)));

                                $success = 0;
                                $errors = 0;

                                foreach ($queries as $query) {
                                    if (empty($query) || strpos($query, '--') === 0)
                                        continue;

                                    if ($conn->query($query) === TRUE) {
                                        $success++;
                                    } else {
                                        $errors++;
                                    }
                                }

                                echo "<div class='alert alert-success'>";
                                echo "<strong>Import Data Tambahan Selesai!</strong><br>";
                                echo "Berhasil: $success queries<br>";
                                echo "Error: $errors queries";
                                echo "</div>";
                            }
                        }

                        if (isset($_POST['import_10_guru_siswa'])) {
                            echo "<div class='alert alert-info'>Memulai import 10 Guru & 10 Siswa...</div>";

                            $sqlFile = __DIR__ . '/add_10_guru_10_siswa.sql';

                            if (!file_exists($sqlFile)) {
                                echo "<div class='alert alert-danger'>File add_10_guru_10_siswa.sql tidak ditemukan!</div>";
                            } else {
                                $sql = file_get_contents($sqlFile);
                                $queries = array_filter(array_map('trim', explode(';', $sql)));

                                $success = 0;
                                $errors = 0;

                                foreach ($queries as $query) {
                                    if (empty($query) || strpos($query, '--') === 0 || strpos($query, 'SELECT') === 0)
                                        continue;

                                    if ($conn->query($query) === TRUE) {
                                        $success++;
                                    } else {
                                        $errors++;
                                        if ($errors <= 3) {
                                            echo "<div class='alert alert-warning small'>Error: " . $conn->error . "</div>";
                                        }
                                    }
                                }

                                echo "<div class='alert alert-success'>";
                                echo "<strong>Import 10 Guru & 10 Siswa Selesai!</strong><br>";
                                echo "Berhasil: $success queries<br>";
                                echo "Error: $errors queries<br><br>";
                                echo "<strong>Data yang ditambahkan:</strong><br>";
                                echo "✅ 10 Guru baru (guru10 - guru19)<br>";
                                echo "✅ 10 Siswa baru (tersebar di berbagai kelas)<br>";
                                echo "✅ Absensi hari ini untuk siswa baru<br>";
                                echo "✅ Sample prestasi & pelanggaran";
                                echo "</div>";

                                // Show updated counts
                                $result = $conn->query("SELECT COUNT(*) as count FROM users WHERE role='guru'");
                                $guru_count = $result->fetch_assoc()['count'];

                                $result = $conn->query("SELECT COUNT(*) as count FROM siswa WHERE status='aktif'");
                                $siswa_count = $result->fetch_assoc()['count'];

                                echo "<div class='alert alert-info'>";
                                echo "<strong>Total Data Sekarang:</strong><br>";
                                echo "👨‍🏫 Total Guru: <strong>$guru_count</strong><br>";
                                echo "👨‍🎓 Total Siswa: <strong>$siswa_count</strong>";
                                echo "</div>";
                            }
                        }

                        $conn->close();
                        ?>

                        <form method="POST" class="mt-4">
                            <div class="d-grid gap-2">
                                <button type="submit" name="import" class="btn btn-primary btn-lg">
                                    <i class="bi bi-download"></i> Import Dummy Data (30 Siswa)
                                </button>
                                <button type="submit" name="import_additional" class="btn btn-success btn-lg">
                                    <i class="bi bi-plus-circle"></i> Import Data Tambahan (50 Siswa Total)
                                </button>
                                <button type="submit" name="import_10_guru_siswa"
                                    class="btn btn-info btn-lg text-white">
                                    <i class="bi bi-people-fill"></i> Import 10 Guru & 10 Siswa Baru
                                </button>
                                <a href="index.php" class="btn btn-secondary">Kembali ke Dashboard</a>
                            </div>
                        </form>

                        <div class="alert alert-warning mt-4">
                            <strong>Catatan:</strong>
                            <ul class="mb-0">
                                <li>Pastikan database <code>manajemen_sekolah</code> sudah dibuat</li>
                                <li>Pastikan file <code>dummy_data.sql</code> ada di folder root</li>
                                <li>Import akan menambahkan data, tidak menghapus data yang sudah ada</li>
                                <li>Jika ingin reset, hapus semua data manual terlebih dahulu</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>