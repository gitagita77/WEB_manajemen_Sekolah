<div class="main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark">Jadwal Pelajaran</h2>
            <p class="text-muted">Jadwal kegiatan belajar mengajar.</p>
        </div>

        <?php if ($_SESSION['role'] == 'admin'): ?>
            <a href="<?= BASE_URL ?>jadwal/create" class="btn btn-primary">
                <i class="bi bi-plus-lg me-2"></i>Tambah Jadwal
            </a>
        <?php endif; ?>
    </div>

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form action="" method="GET" class="row g-3 align-items-center">
                <div class="col-auto">
                    <label class="col-form-label fw-bold">Filter Kelas:</label>
                </div>
                <div class="col-auto">
                    <select name="kelas_id" class="form-select" onchange="this.form.submit()">
                        <option value="">-- Semua Kelas --</option>
                        <?php foreach ($kelas_list as $k): ?>
                            <option value="<?= $k['id'] ?>" <?= $selected_kelas == $k['id'] ? 'selected' : '' ?>>
                                <?= $k['nama_kelas'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-auto">
                    <input type="hidden" name="url" value="jadwal">
                    <!-- Note: If using index.php routing with $_GET['url'], the form action usually points to root and hidden input carries 'url' if needed, or proper rewriting. Here simple GET param 'kelas_id' appends. -->
                </div>
            </form>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle w-100">
                    <thead class="bg-light text-center">
                        <tr>
                            <th>Hari</th>
                            <th>Jam Ke-</th>
                            <th>Waktu (Est)</th>
                            <th>Kelas</th>
                            <th>Mata Pelajaran</th>
                            <th>Guru</th>
                            <th>Ruangan</th>
                            <?php if ($_SESSION['role'] == 'admin'): ?>
                                <th width="100">Aksi</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $current_day = '';
                        if (empty($jadwal)): ?>
                            <tr>
                                <td colspan="8" class="text-center p-5 text-muted">Belum ada jadwal untuk kelas ini.</td>
                            </tr>
                        <?php else:
                            foreach ($jadwal as $row):
                                ?>
                                <tr>
                                    <td class="fw-bold bg-white text-center">
                                        <?php
                                        if ($current_day != $row['hari']) {
                                            echo $row['hari'];
                                            $current_day = $row['hari'];
                                        }
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $row['sesi'] ?>
                                    </td>
                                    <td class="text-center text-muted small">
                                        <?php
                                        // Simple estimation: 07:00 start + (sesi-1)*45 mins
                                        $start_min = 420 + ($row['sesi'] - 1) * 45;
                                        $end_min = $start_min + 45;
                                        echo sprintf("%02d:%02d - %02d:%02d", floor($start_min / 60), $start_min % 60, floor($end_min / 60), $end_min % 60);
                                        ?>
                                    </td>
                                    <td class="text-center"><span class="badge bg-info text-dark">
                                            <?= $row['nama_kelas'] ?>
                                        </span></td>
                                    <td>
                                        <div class="fw-bold">
                                            <?= $row['nama_mapel'] ?>
                                        </div>
                                    </td>
                                    <td>
                                        <?= $row['nama_guru'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $row['ruangan'] ?>
                                    </td>
                                    <?php if ($_SESSION['role'] == 'admin'): ?>
                                        <td class="text-center">
                                            <a href="<?= BASE_URL ?>jadwal/edit/<?= $row['id'] ?>"
                                                class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                                            <a href="<?= BASE_URL ?>jadwal/delete/<?= $row['id'] ?>"
                                                class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Hapus jadwal ini?')"><i class="bi bi-trash"></i></a>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>