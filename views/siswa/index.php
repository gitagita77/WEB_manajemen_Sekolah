<div class="main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark">Data Siswa</h2>
            <p class="text-muted">Manajemen data siswa aktif.</p>
        </div>
        <a href="<?= BASE_URL ?>siswa/create" class="btn btn-primary">
            <i class="bi bi-plus-lg me-2"></i>Tambah Siswa
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle datatable w-100">
                    <thead class="bg-light">
                        <tr>
                            <th>NIS / NISN</th>
                            <th>Nama Lengkap</th>
                            <th>L/P</th>
                            <th>Kelas</th>
                            <th>Poin (Prestasi/Pelanggaran)</th>
                            <th class="text-center" width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($siswa as $s): ?>
                            <tr>
                                <td>
                                    <div class="fw-bold">
                                        <?= $s['nis'] ?>
                                    </div>
                                    <div class="small text-muted">
                                        <?= $s['nisn'] ?>
                                    </div>
                                </td>
                                <td>
                                    <?= $s['nama_lengkap'] ?>
                                </td>
                                <td>
                                    <?= $s['jenis_kelamin'] ?>
                                </td>
                                <td>
                                    <span class="badge"
                                        style="background-color: var(--primary-light); color: var(--primary-color); border: 1px solid rgba(67, 97, 238, 0.1);">
                                        <?= $s['nama_kelas'] ?? '-' ?>
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <div class="badge d-flex align-items-center gap-1"
                                            style="background-color: #ecfdf5; color: #059669; border: 1px solid #d1fae5;">
                                            <i class="bi bi-award-fill"></i> <?= $s['total_poin_prestasi'] ?>
                                        </div>
                                        <div class="badge d-flex align-items-center gap-1"
                                            style="background-color: #fef2f2; color: #dc2626; border: 1px solid #fee2e2;">
                                            <i class="bi bi-exclamation-octagon-fill"></i>
                                            <?= $s['total_poin_pelanggaran'] ?>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="<?= BASE_URL ?>siswa/edit/<?= $s['id'] ?>"
                                            class="btn btn-sm btn-light text-primary"
                                            style="padding: 6px 10px; border: 1px solid #e2e8f0;">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a href="<?= BASE_URL ?>siswa/delete/<?= $s['id'] ?>"
                                            class="btn btn-sm btn-light text-danger"
                                            style="padding: 6px 10px; border: 1px solid #e2e8f0;"
                                            onclick="return confirm('Yakin ingin menghapus siswa ini?')">
                                            <i class="bi bi-trash3"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>