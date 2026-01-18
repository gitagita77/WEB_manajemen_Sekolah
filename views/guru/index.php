<div class="main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark">Data Guru</h2>
            <p class="text-muted">Manajemen data guru dan staf pengajar.</p>
        </div>
        <?php if ($_SESSION['role'] == 'admin'): ?>
            <a href="<?= BASE_URL ?>guru/create" class="btn btn-primary">
                <i class="bi bi-plus-lg me-2"></i>Tambah Guru
            </a>
        <?php endif; ?>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle datatable w-100">
                    <thead class="bg-light">
                        <tr>
                            <th>NIP</th>
                            <th>Nama Lengkap</th>
                            <th>L/P</th>
                            <th>Kontak</th>
                            <th>Status</th>
                            <?php if ($_SESSION['role'] == 'admin'): ?>
                                <th class="text-center" width="150">Aksi</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($guru as $g): ?>
                            <tr>
                                <td>
                                    <?= $g['nip'] ?? '-' ?>
                                </td>
                                <td>
                                    <div class="fw-bold">
                                        <?= $g['nama_lengkap'] ?>
                                    </div>
                                    <div class="small text-muted">@
                                        <?= $g['username'] ?>
                                    </div>
                                </td>
                                <td>
                                    <?= $g['jenis_kelamin'] ?>
                                </td>
                                <td>
                                    <div class="small"><i class="bi bi-telephone me-1"></i>
                                        <?= $g['no_telepon'] ?>
                                    </div>
                                    <div class="small"><i class="bi bi-envelope me-1"></i>
                                        <?= $g['email'] ?>
                                    </div>
                                </td>
                                <td><span class="badge bg-success">
                                        <?= $g['status'] ?>
                                    </span></td>
                                <?php if ($_SESSION['role'] == 'admin'): ?>
                                    <td class="text-center">
                                        <a href="<?= BASE_URL ?>guru/edit/<?= $g['id'] ?>"
                                            class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></a>
                                        <a href="<?= BASE_URL ?>guru/delete/<?= $g['id'] ?>"
                                            class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Hapus data guru ini?')"><i class="bi bi-trash"></i></a>
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