<div class="main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark">Dashboard</h2>
            <p class="text-muted">Selamat datang di Sistem Manajemen Sekolah</p>
        </div>
        <div>
            <span class="badge bg-primary rounded-pill px-3 py-2"><?= date('d M Y') ?></span>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card stat-card p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="mb-0 opacity-75">Total Siswa</p>
                        <h3 class="fw-bold mb-0"><?= $stats['total_siswa'] ?? 0 ?></h3>
                    </div>
                    <div class="bg-white bg-opacity-25 p-3 rounded-circle">
                        <i class="bi bi-people fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card p-3 border-0 shadow-sm" style="background: linear-gradient(135deg, #10b981, #059669); color: white;">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="mb-0 opacity-75">Total Guru</p>
                        <h3 class="fw-bold mb-0"><?= $stats['total_guru'] ?? 0 ?></h3>
                    </div>
                    <div class="bg-white bg-opacity-25 p-3 rounded-circle">
                        <i class="bi bi-person-badge fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card p-3 border-0 shadow-sm" style="background: linear-gradient(135deg, #f59e0b, #d97706); color: white;">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="mb-0 opacity-75">Total Kelas</p>
                        <h3 class="fw-bold mb-0"><?= $stats['total_kelas'] ?? 0 ?></h3>
                    </div>
                    <div class="bg-white bg-opacity-25 p-3 rounded-circle">
                        <i class="bi bi-building fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Rankings Section -->
    <div class="row g-4">
        <!-- Top Prestasi -->
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0 text-primary">
                        <i class="bi bi-trophy-fill me-2"></i>Top 10 Siswa Berprestasi
                    </h5>
                    <a href="<?= BASE_URL ?>prestasi" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-premium mb-0 align-middle">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4">No</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th class="text-end pe-4">Poin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($top_prestasi)): ?>
                                    <?php foreach($top_prestasi as $i => $row): ?>
                                    <tr>
                                        <td class="ps-4">
                                            <?php if($i==0): ?><i class="bi bi-award-fill text-warning"></i>
                                            <?php elseif($i==1): ?><i class="bi bi-award-fill text-secondary"></i>
                                            <?php elseif($i==2): ?><i class="bi bi-award-fill text-danger"></i>
                                            <?php else: ?><span class="fw-bold text-muted"><?= $i+1 ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="fw-bold text-dark"><?= htmlspecialchars($row['nama_lengkap']) ?></div>
                                            <div class="small text-muted"><?= $row['nis'] ?></div>
                                        </td>
                                        <td><span class="badge bg-light text-dark border"><?= $row['nama_kelas'] ?></span></td>
                                        <td class="text-end pe-4"><span class="fw-bold text-primary"><?= $row['total_poin_prestasi'] ?></span></td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr><td colspan="4" class="text-center py-4 text-muted">Belum ada data prestasi.</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Top Pelanggaran -->
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0 text-danger">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>Top 10 Siswa (Poin Pelanggaran)
                    </h5>
                    <a href="<?= BASE_URL ?>pelanggaran" class="btn btn-sm btn-outline-danger">Lihat Semua</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-premium mb-0 align-middle">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4">No</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th class="text-end pe-4">Poin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($top_pelanggaran)): ?>
                                    <?php foreach($top_pelanggaran as $i => $row): ?>
                                    <tr>
                                        <td class="ps-4"><span class="fw-bold text-muted"><?= $i+1 ?></span></td>
                                        <td>
                                            <div class="fw-bold text-dark"><?= htmlspecialchars($row['nama_lengkap']) ?></div>
                                            <div class="small text-muted"><?= $row['nis'] ?></div>
                                        </td>
                                        <td><span class="badge bg-light text-dark border"><?= $row['nama_kelas'] ?></span></td>
                                        <td class="text-end pe-4"><span class="badge bg-danger"><?= $row['total_poin_pelanggaran'] ?></span></td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr><td colspan="4" class="text-center py-4 text-muted">Belum ada data pelanggaran.</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
