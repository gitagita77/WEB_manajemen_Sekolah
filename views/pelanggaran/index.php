<div class="main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark">Pelanggaran Siswa</h2>
            <p class="text-muted">Catatan pelanggaran dan sanksi siswa.</p>
        </div>
        <?php if ($_SESSION['role'] != 'siswa'): ?>
            <a href="<?= BASE_URL ?>pelanggaran/create" class="btn btn-danger">
                <i class="bi bi-plus-lg me-2"></i>Tambah Pelanggaran
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
                            <th>Pelanggaran</th>
                            <th>Kategori</th>
                            <th>Poin</th>
                            <th>Sanksi</th>
                            <?php if ($_SESSION['role'] == 'admin'): ?>
                                <th width="80">Aksi</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pelanggaran as $row): ?>
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
                                    <?= $row['pelanggaran'] ?>
                                </td>
                                <td>
                                    <?php
                                    $badge = 'secondary';
                                    if ($row['kategori'] == 'ringan')
                                        $badge = 'warning';
                                    elseif ($row['kategori'] == 'sedang')
                                        $badge = 'orange';
                                    elseif ($row['kategori'] == 'berat')
                                        $badge = 'danger';
                                    ?>
                                    <span class="badge bg-<?= $badge ?> text-uppercase">
                                        <?= $row['kategori'] ?>
                                    </span>
                                </td>
                                <td><span class="badge bg-danger">-
                                        <?= $row['poin'] ?>
                                    </span></td>
                                <td class="small">
                                    <?= $row['sanksi'] ?>
                                </td>
                                <?php if ($_SESSION['role'] == 'admin'): ?>
                                    <td class="text-center">
                                        <a href="<?= BASE_URL ?>pelanggaran/delete/<?= $row['id'] ?>"
                                            class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Hapus pelanggaran ini?')"><i class="bi bi-trash"></i></a>
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