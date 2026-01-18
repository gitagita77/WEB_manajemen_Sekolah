<div class="main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark">Data Kelas</h2>
            <p class="text-muted">Manajemen data kelas dan wali kelas.</p>
        </div>
        <?php if ($_SESSION['role'] == 'admin'): ?>
            <a href="<?= BASE_URL ?>kelas/create" class="btn btn-primary">
                <i class="bi bi-plus-lg me-2"></i>Tambah Kelas
            </a>
        <?php endif; ?>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle datatable w-100">
                    <thead class="bg-light">
                        <tr>
                            <th>Kode</th>
                            <th>Nama Kelas</th>
                            <th>Tingkat</th>
                            <th>Jurusan</th>
                            <th>Wali Kelas</th>
                            <th>Kapasitas</th>
                            <?php if ($_SESSION['role'] == 'admin'): ?>
                                <th class="text-center" width="150">Aksi</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($kelas as $row): ?>
                            <tr>
                                <td><span class="badge bg-light text-dark border">
                                        <?= $row['kode_kelas'] ?>
                                    </span></td>
                                <td class="fw-bold">
                                    <?= $row['nama_kelas'] ?>
                                </td>
                                <td>
                                    <?= $row['tingkat'] ?>
                                </td>
                                <td>
                                    <?= $row['jurusan'] ?>
                                </td>
                                <td>
                                    <?= $row['wali_kelas'] ?? '<span class="text-muted fst-italic">Kosong</span>' ?>
                                </td>
                                <td>
                                    <?= $row['kapasitas'] ?> Siswa
                                </td>
                                <?php if ($_SESSION['role'] == 'admin'): ?>
                                    <td class="text-center">
                                        <a href="<?= BASE_URL ?>kelas/edit/<?= $row['id'] ?>"
                                            class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></a>
                                        <a href="<?= BASE_URL ?>kelas/delete/<?= $row['id'] ?>"
                                            class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Hapus data kelas ini?')"><i class="bi bi-trash"></i></a>
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