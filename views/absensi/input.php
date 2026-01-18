<div class="main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark">Input Absensi</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= BASE_URL ?>absensi">Absensi</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Input</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form action="" method="GET" class="row g-3 align-items-end">
                <input type="hidden" name="url" value="absensi/inputForm"> <!-- For routing if needed -->
                <div class="col-md-4">
                    <label class="form-label fw-bold">Pilih Kelas</label>
                    <select name="kelas_id" class="form-select" required onchange="this.form.submit()">
                        <option value="">-- Pilih Kelas --</option>
                        <?php foreach ($kelas_list as $k): ?>
                            <option value="<?= $k['id'] ?>" <?= $selected_kelas == $k['id'] ? 'selected' : '' ?>>
                                <?= $k['nama_kelas'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="<?= $selected_tanggal ?>" required
                        onchange="this.form.submit()">
                </div>
                <div class="col-md-4">
                    <div class="text-muted small">Pilih Kelas dan Tanggal untuk memuat daftar siswa.</div>
                </div>
            </form>
        </div>
    </div>

    <?php if ($selected_kelas): ?>
        <form action="<?= BASE_URL ?>absensi/store" method="POST">
            <input type="hidden" name="kelas_id" value="<?= $selected_kelas ?>">
            <input type="hidden" name="tanggal" value="<?= $selected_tanggal ?>">

            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <h5 class="fw-bold">Input Kehadiaran -
                            <?= date('d M Y', strtotime($selected_tanggal)) ?>
                        </h5>
                        <div>
                            <button type="button" class="btn btn-sm btn-outline-success" onclick="markAll('Hadir')">Semua
                                Hadir</button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle w-100">
                            <thead class="bg-light text-center">
                                <th width="50">No</th>
                                <th class="text-start">Nama Siswa</th>
                                <th width="300">Status</th>
                                <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (empty($attendance_data)):
                                    // Fallback if no students in class
                                    echo '<tr><td colspan="4" class="text-center p-4">Tidak ada siswa di kelas ini.</td></tr>';
                                else:
                                    $no = 1;
                                    foreach ($attendance_data as $row):
                                        ?>
                                        <tr>
                                            <td class="text-center">
                                                <?= $no++ ?>
                                            </td>
                                            <td>
                                                <div class="fw-bold">
                                                    <?= $row['nama_lengkap'] ?>
                                                </div>
                                                <div class="small text-muted">
                                                    <?= $row['nis'] ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group w-100" role="group">
                                                    <input type="radio" class="btn-check" name="status[<?= $row['siswa_id'] ?>]"
                                                        id="hadir_<?= $row['siswa_id'] ?>" value="Hadir" <?= ($row['status'] == 'Hadir' || empty($row['status'])) ? 'checked' : '' ?>>
                                                    <label class="btn btn-outline-success btn-sm"
                                                        for="hadir_<?= $row['siswa_id'] ?>">H</label>

                                                    <input type="radio" class="btn-check" name="status[<?= $row['siswa_id'] ?>]"
                                                        id="sakit_<?= $row['siswa_id'] ?>" value="Sakit"
                                                        <?= ($row['status'] == 'Sakit') ? 'checked' : '' ?>>
                                                    <label class="btn btn-outline-warning btn-sm"
                                                        for="sakit_<?= $row['siswa_id'] ?>">S</label>

                                                    <input type="radio" class="btn-check" name="status[<?= $row['siswa_id'] ?>]"
                                                        id="izin_<?= $row['siswa_id'] ?>" value="Izin" <?= ($row['status'] == 'Izin') ? 'checked' : '' ?>>
                                                    <label class="btn btn-outline-info btn-sm"
                                                        for="izin_<?= $row['siswa_id'] ?>">I</label>

                                                    <input type="radio" class="btn-check" name="status[<?= $row['siswa_id'] ?>]"
                                                        id="alpha_<?= $row['siswa_id'] ?>" value="Alpha"
                                                        <?= ($row['status'] == 'Alpha') ? 'checked' : '' ?>>
                                                    <label class="btn btn-outline-danger btn-sm"
                                                        for="alpha_<?= $row['siswa_id'] ?>">A</label>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="text" name="keterangan[<?= $row['siswa_id'] ?>]"
                                                    class="form-control form-control-sm" placeholder="Keterangan..."
                                                    value="<?= $row['keterangan'] ?>">
                                            </td>
                                        </tr>
                                    <?php endforeach; endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4 text-end">
                        <button type="submit" class="btn btn-primary px-5">Simpan Absensi</button>
                    </div>
                </div>
            </div>
        </form>

        <script>
            function markAll(status) {
                const radios = document.querySelectorAll('input[value="' + status + '"]');
                radios.forEach(radio => radio.checked = true);
            }
        </script>
    <?php endif; ?>
</div>