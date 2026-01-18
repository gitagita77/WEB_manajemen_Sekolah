<div class="main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark">Edit Mata Pelajaran</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= BASE_URL ?>mapel">Mata Pelajaran</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit -
                        <?= $mapel['nama_mapel'] ?>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card border-0 shadow-sm col-md-8">
        <div class="card-body p-4">
            <form action="<?= BASE_URL ?>mapel/update/<?= $mapel['id'] ?>" method="POST">

                <input type="hidden" name="tahun_ajaran" value="<?= $mapel['tahun_ajaran'] ?>">

                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Kode Mapel <span class="text-danger">*</span></label>
                        <input type="text" name="kode_mapel" class="form-control" value="<?= $mapel['kode_mapel'] ?>"
                            required>
                    </div>
                    <div class="col-md-8">
                        <label class="form-label">Nama Mata Pelajaran <span class="text-danger">*</span></label>
                        <input type="text" name="nama_mapel" class="form-control" value="<?= $mapel['nama_mapel'] ?>"
                            required>
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Kategori</label>
                        <select name="kategori" class="form-select">
                            <option value="umum" <?= $mapel['kategori'] == 'umum' ? 'selected' : '' ?>>Umum (Wajib A)</option>
                            <option value="jurusan" <?= $mapel['kategori'] == 'jurusan' ? 'selected' : '' ?>>Jurusan
                                (Peminatan)</option>
                            <option value="peminatan" <?= $mapel['kategori'] == 'peminatan' ? 'selected' : '' ?>>Lintas Minat
                            </option>
                            <option value="ekstrakurikuler" <?= $mapel['kategori'] == 'ekstrakurikuler' ? 'selected' : '' ?>
                                >Muatan Lokal</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Guru Pengampu</label>
                        <select name="guru_id" class="form-select">
                            <option value="">-- Pilih Guru --</option>
                            <?php foreach ($guru_list as $g): ?>
                                <option value="<?= $g['id'] ?>" <?= $mapel['guru_id'] == $g['id'] ? 'selected' : '' ?>>
                                    <?= $g['nama_lengkap'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Tingkat</label>
                        <select name="tingkat" class="form-select">
                            <option value="semua" <?= $mapel['tingkat'] == 'semua' ? 'selected' : '' ?>>Semua Tingkat</option>
                            <option value="X" <?= $mapel['tingkat'] == 'X' ? 'selected' : '' ?>>Kelas X</option>
                            <option value="XI" <?= $mapel['tingkat'] == 'XI' ? 'selected' : '' ?>>Kelas XI</option>
                            <option value="XII" <?= $mapel['tingkat'] == 'XII' ? 'selected' : '' ?>>Kelas XII</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Jurusan</label>
                        <select name="jurusan" class="form-select">
                            <option value="">Semua Jurusan</option>
                            <option value="IPA" <?= $mapel['jurusan'] == 'IPA' ? 'selected' : '' ?>>IPA</option>
                            <option value="IPS" <?= $mapel['jurusan'] == 'IPS' ? 'selected' : '' ?>>IPS</option>
                            <option value="BAHASA" <?= $mapel['jurusan'] == 'BAHASA' ? 'selected' : '' ?>>Bahasa</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Khusus Kelas (Opsional)</label>
                        <select name="kelas_id" class="form-select">
                            <option value="">-- Tidak Spesifik --</option>
                            <?php foreach ($kelas_list as $k): ?>
                                <option value="<?= $k['id'] ?>" <?= $mapel['kelas_id'] == $k['id'] ? 'selected' : '' ?>>
                                    <?= $k['nama_kelas'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label">Jam Per Minggu</label>
                        <input type="number" name="jam_per_minggu" class="form-control"
                            value="<?= $mapel['jam_per_minggu'] ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Semester</label>
                        <select name="semester" class="form-select">
                            <option value="tahunan" <?= $mapel['semester'] == 'tahunan' ? 'selected' : '' ?>>Tahunan (Genap &
                                Ganjil)</option>
                            <option value="ganjil" <?= $mapel['semester'] == 'ganjil' ? 'selected' : '' ?>>Ganjil</option>
                            <option value="genap" <?= $mapel['semester'] == 'genap' ? 'selected' : '' ?>>Genap</option>
                        </select>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Deskripsi / Kompetensi Dasar</label>
                    <textarea name="deskripsi" class="form-control" rows="2"><?= $mapel['deskripsi'] ?></textarea>
                </div>

                <div class="d-flex text-end">
                    <button type="submit" class="btn btn-primary px-4 me-2">Update Data</button>
                    <a href="<?= BASE_URL ?>mapel" class="btn btn-light px-4">Batal</a>
                </div>

            </form>
        </div>
    </div>
</div>