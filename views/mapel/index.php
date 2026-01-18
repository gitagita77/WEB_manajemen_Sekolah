<div class="main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark">Data Mata Pelajaran</h2>
            <p class="text-muted">Manajemen kurikulum dan pengajar.</p>
        </div>
        <a href="<?= BASE_URL ?>mapel/create" class="btn btn-primary">
            <i class="bi bi-plus-lg me-2"></i>Tambah Mapel
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle datatable w-100">
                    <thead class="bg-light">
                        <tr>
                            <th>Kode</th>
                            <th>Mata Pelajaran</th>
                            <th>Guru Pengampu</th>
                            <th>Tingkat/Kelas</th>
                            <th>Jam/Minggu</th>
                            <th class="text-center" width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($mapel as $row): ?>
                            <tr>
                                <td><span class="badge bg-light text-dark border">
                                        <?= $row['kode_mapel'] ?>
                                    </span></td>
                                <td>
                                    <div class="fw-bold">
                                        <?= $row['nama_mapel'] ?>
                                    </div>
                                    <div class="small text-muted text-uppercase">
                                        <?= $row['kategori'] ?>
                                    </div>
                                </td>
                                <td>
                                    <?= $row['nama_guru'] ?? '<span class="text-muted fst-italic">Belum diset</span>' ?>
                                </td>
                                <td>
                                    <?php if ($row['kelas_id']): ?>
                                        <span class="badge bg-info text-dark">
                                            <?= $row['nama_kelas'] ?>
                                        </span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">
                                            <?= $row['tingkat'] ?> -
                                            <?= $row['jurusan'] ?? 'Semua' ?>
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?= $row['jam_per_minggu'] ?> JP
                                </td>
                                <td class="text-center">
                                    <a href="<?= BASE_URL ?>mapel/edit/<?= $row['id'] ?>"
                                        class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></a>
                                    <a href="<?= BASE_URL ?>mapel/delete/<?= $row['id'] ?>"
                                        class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Hapus mapel ini?')"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>