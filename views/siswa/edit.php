<div class="main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark">Edit Siswa</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= BASE_URL ?>siswa">Data Siswa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit -
                        <?= $siswa['nama_lengkap'] ?>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card border-0 shadow-sm col-md-8">
        <div class="card-body p-4">
            <form action="<?= BASE_URL ?>siswa/update/<?= $siswa['id'] ?>" method="POST">

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">NIS <span class="text-danger">*</span></label>
                        <input type="text" name="nis" class="form-control" required value="<?= $siswa['nis'] ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">NISN</label>
                        <input type="text" name="nisn" class="form-control" value="<?= $siswa['nisn'] ?>">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" name="nama_lengkap" class="form-control" required
                        value="<?= $siswa['nama_lengkap'] ?>">
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select" required>
                            <option value="L" <?= $siswa['jenis_kelamin'] == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                            <option value="P" <?= $siswa['jenis_kelamin'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Kelas</label>
                        <select name="kelas_id" class="form-select">
                            <option value="">-- Pilih Kelas --</option>
                            <?php foreach ($kelas_list as $k): ?>
                                <option value="<?= $k['id'] ?>" <?= $siswa['kelas_id'] == $k['id'] ? 'selected' : '' ?>>
                                    <?= $k['nama_kelas'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control"
                            value="<?= $siswa['tempat_lahir'] ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control"
                            value="<?= $siswa['tanggal_lahir'] ?>">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3"><?= $siswa['alamat'] ?></textarea>
                </div>

                <div class="d-flex text-end">
                    <button type="submit" class="btn btn-primary px-4 me-2">Update Data</button>
                    <a href="<?= BASE_URL ?>siswa" class="btn btn-light px-4">Batal</a>
                </div>

            </form>
        </div>
    </div>
</div>