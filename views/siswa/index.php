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
                                <td><span class="badge bg-light text-dark border">
                                        <?= $s['nama_kelas'] ?? '-' ?>
                                    </span></td>
                                <td>
                                    <span class="badge bg-success" title="Prestasi">
                                        <?= $s['total_poin_prestasi'] ?>
                                    </span>
                                    <span class="badge bg-danger" title="Pelanggaran">
                                        <?= $s['total_poin_pelanggaran'] ?>
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="<?= BASE_URL ?>siswa/edit/<?= $s['id'] ?>"
                                        class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></a>
                                    <a href="<?= BASE_URL ?>siswa/delete/<?= $s['id'] ?>"
                                        class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Yakin ingin menghapus siswa ini?')"><i
                                            class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>