<div class="main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark">Edit Jadwal</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= BASE_URL ?>jadwal">Jadwal Pelajaran</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card border-0 shadow-sm col-md-8">
        <div class="card-body p-4">
            <form action="<?= BASE_URL ?>jadwal/update/<?= $jadwal['id'] ?>" method="POST">

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Hari <span class="text-danger">*</span></label>
                        <select name="hari" class="form-select" required>
                            <option value="Senin" <?= $jadwal['hari'] == 'Senin' ? 'selected' : '' ?>>Senin</option>
                            <option value="Selasa" <?= $jadwal['hari'] == 'Selasa' ? 'selected' : '' ?>>Selasa</option>
                            <option value="Rabu" <?= $jadwal['hari'] == 'Rabu' ? 'selected' : '' ?>>Rabu</option>
                            <option value="Kamis" <?= $jadwal['hari'] == 'Kamis' ? 'selected' : '' ?>>Kamis</option>
                            <option value="Jumat" <?= $jadwal['hari'] == 'Jumat' ? 'selected' : '' ?>>Jumat</option>
                            <option value="Sabtu" <?= $jadwal['hari'] == 'Sabtu' ? 'selected' : '' ?>>Sabtu</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jam Ke- (Sesi) <span class="text-danger">*</span></label>
                        <select name="sesi" class="form-select" required>
                            <?php for ($i = 1; $i <= 10; $i++): ?>
                                <option value="<?= $i ?>" <?= $jadwal['sesi'] == $i ? 'selected' : '' ?>>Jam Ke-
                                    <?= $i ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Kelas <span class="text-danger">*</span></label>
                        <select name="kelas_id" class="form-select" required>
                            <option value="">-- Pilih Kelas --</option>
                            <?php foreach ($kelas_list as $k): ?>
                                <option value="<?= $k['id'] ?>" <?= $jadwal['kelas_id'] == $k['id'] ? 'selected' : '' ?>>
                                    <?= $k['nama_kelas'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Mata Pelajaran <span class="text-danger">*</span></label>
                        <select name="mapel_id" class="form-select" required>
                            <option value="">-- Pilih Mapel --</option>
                            <?php foreach ($mapel_list as $m): ?>
                                <option value="<?= $m['id'] ?>" <?= $jadwal['mapel_id'] == $m['id'] ? 'selected' : '' ?>>
                                    <?= $m['nama_mapel'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Guru Pengajar <span class="text-danger">*</span></label>
                        <select name="guru_id" class="form-select" required>
                            <option value="">-- Pilih Guru --</option>
                            <?php foreach ($guru_list as $g): ?>
                                <option value="<?= $g['id'] ?>" <?= $jadwal['guru_id'] == $g['id'] ? 'selected' : '' ?>>
                                    <?= $g['nama_lengkap'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Ruangan</label>
                        <input type="text" name="ruangan" class="form-control" value="<?= $jadwal['ruangan'] ?>"
                            required>
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label">Semester</label>
                        <select name="semester" class="form-select">
                            <option value="genap" <?= $jadwal['semester'] == 'genap' ? 'selected' : '' ?>>Genap</option>
                            <option value="ganjil" <?= $jadwal['semester'] == 'ganjil' ? 'selected' : '' ?>>Ganjil</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tahun Ajaran</label>
                        <input type="text" name="tahun_ajaran" class="form-control"
                            value="<?= $jadwal['tahun_ajaran'] ?>">
                    </div>
                </div>

                <div class="d-flex text-end">
                    <button type="submit" class="btn btn-primary px-4 me-2">Update Jadwal</button>
                    <a href="<?= BASE_URL ?>jadwal" class="btn btn-light px-4">Batal</a>
                </div>

            </form>
        </div>
    </div>
</div>