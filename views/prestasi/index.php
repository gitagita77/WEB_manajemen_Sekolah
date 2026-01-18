<div class="main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark">Prestasi Siswa</h2>
            <p class="text-muted">Catatan prestasi dan penghargaan siswa.</p>
        </div>
        <?php if ($_SESSION['role'] != 'siswa'): ?>
            <a href="<?= BASE_URL ?>prestasi/create" class="btn btn-primary">
                <i class="bi bi-plus-lg me-2"></i>Tambah Prestasi
            </a>
        <?php endif; ?>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle datatable w-100">
                    <thead class="bg-light">
                        <tr>
                            <th>Tanggal</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Prestasi</th>
                            <th>Poin</th>
                            <th>Keterangan</th>
                            <?php if ($_SESSION['role'] == 'admin'): ?>
                                <th width="80">Aksi</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($prestasi as $row): ?>
                            <tr>
                                <td>
                                    <?= date('d/m/Y', strtotime($row['tanggal'])) ?>
                                </td>
                                <td>
                                    <?= $row['nis'] ?>
                                </td>
                                <td class="fw-bold">
                                    <?= $row['nama_siswa'] ?>
                                </td>
                                <td><span class="badge bg-info text-dark">
                                        <?= $row['nama_kelas'] ?>
                                    </span></td>
                                <td>
                                    <?= $row['prestasi'] ?>
                                </td>
                                <td><span class="badge bg-success">+
                                        <?= $row['poin'] ?>
                                    </span></td>
                                <td>
                                    <?= $row['keterangan'] ?>
                                </td>
                                <?php if ($_SESSION['role'] == 'admin'): ?>
                                    <td class="text-center">
                                        <a href="<?= BASE_URL ?>prestasi/delete/<?= $row['id'] ?>"
                                            class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Hapus prestasi ini?')"><i class="bi bi-trash"></i></a>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>