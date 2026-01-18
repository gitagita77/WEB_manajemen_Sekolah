<div class="main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark">Absensi Harian</h2>
            <p class="text-muted">Lihat data kehadiran siswa.</p>
        </div>
        <div>
            <?php if ($_SESSION['role'] != 'siswa'): ?>
                <a href="<?= BASE_URL ?>absensi/inputForm" class="btn btn-primary">
                    <i class="bi bi-pencil-square me-2"></i>Input Absensi
                </a>
            <?php endif; ?>
        </div>
    </div>

    <div class="card border-0 shadow-sm mb-4 overflow-hidden" style="border-radius: 20px;">
        <div class="card-header bg-white border-0 py-3 ps-4" style="border-left: 5px solid #8b5cf6;">
            <h5 class="fw-bold text-dark mb-0">
                <i class="bi bi-filter-right me-1 text-primary"></i> Filter Presensi
            </h5>
        </div>
        <div class="card-body bg-light bg-opacity-50 p-4">
            <form action="" method="GET" class="row g-4 align-items-end">
                <div class="col-md-4">
                    <label class="form-label fw-bold text-muted small text-uppercase">Pilih Kelas</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0"><i class="bi bi-building"></i></span>
                        <select name="kelas_id" class="form-select border-start-0 ps-0" required>
                            <option value="">-- Semua Kelas --</option>
                            <?php foreach ($kelas_list as $k): ?>
                                <option value="<?= $k['id'] ?>" <?= $selected_kelas == $k['id'] ? 'selected' : '' ?>>
                                    <?= $k['nama_kelas'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold text-muted small text-uppercase">Tanggal</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0"><i class="bi bi-calendar-event"></i></span>
                        <input type="date" name="tanggal" class="form-control border-start-0 ps-0"
                            value="<?= $selected_tanggal ?>" required>
                    </div>
                </div>
                <div class="col-md-2">
                    <input type="hidden" name="url" value="absensi">
                    <button type="submit" class="btn btn-primary w-100 py-2 shadow-sm">
                        <i class="bi bi-search me-2"></i>Cari Data
                    </button>
                </div>
            </form>
        </div>
    </div>

    <?php if ($selected_kelas): ?>
        <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 20px;">
            <div class="card-body p-0">
                <div class="p-4 d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0 text-dark">
                        <i class="bi bi-table me-2 text-primary"></i>Rekap Kehadiran - <span
                            class="text-primary"><?= date('d M Y', strtotime($selected_tanggal)) ?></span>
                    </h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle w-100 mb-0">
                        <thead>
                            <tr>
                                <th width="100" class="ps-4">No</th>
                                <th>Siswa</th>
                                <th>Status</th>
                                <th class="pe-4">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($attendance_data)): ?>
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-5">
                                        <i class="bi bi-inbox fs-1 d-block opacity-25 mb-2"></i>
                                        Belum ada data absensi untuk kelas dan tanggal ini.
                                    </td>
                                </tr>
                            <?php else:
                                $no = 1;
                                foreach ($attendance_data as $row):
                                    $statusColor = '#64748b'; // Default
                                    $icon = 'bi-dash-circle';
                                    if ($row['status'] == 'Hadir') {
                                        $statusColor = '#10b981';
                                        $icon = 'bi-check-circle-fill';
                                    } elseif ($row['status'] == 'Sakit') {
                                        $statusColor = '#3b82f6';
                                        $icon = 'bi-plus-circle-fill';
                                    } elseif ($row['status'] == 'Izin') {
                                        $statusColor = '#f59e0b';
                                        $icon = 'bi-envelope-fill';
                                    } elseif ($row['status'] == 'Alpha') {
                                        $statusColor = '#f43f5e';
                                        $icon = 'bi-x-circle-fill';
                                    }
                                    ?>
                                    <tr>
                                        <td class="ps-4 fw-bold text-muted"><?= $no++ ?></td>
                                        <td>
                                            <div class="fw-bold text-dark"><?= $row['nama_lengkap'] ?></div>
                                            <div class="small text-muted"><?= $row['nis'] ?></div>
                                        </td>
                                        <td>
                                            <span class="badge d-inline-flex align-items-center gap-1"
                                                style="background-color: <?= $statusColor ?>15; color: <?= $statusColor ?>; border: 1px solid <?= $statusColor ?>30;">
                                                <i class="bi <?= $icon ?>"></i> <?= $row['status'] ?? 'Belum Diabsen' ?>
                                            </span>
                                        </td>
                                        <td class="pe-4">
                                            <span class="text-muted small"><?= $row['keterangan'] ?: '-' ?></span>
                                        </td>
                                    </tr>
                                <?php endforeach; endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>