<div class="main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark">Edit Guru</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= BASE_URL ?>guru">Data Guru</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit -
                        <?= $guru['nama_lengkap'] ?>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card border-0 shadow-sm col-md-8">
        <div class="card-body p-4">
            <form action="<?= BASE_URL ?>guru/update/<?= $guru['id'] ?>" method="POST">

                <h6 class="fw-bold text-primary mb-3">Informasi Akun</h6>
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Username <span class="text-danger">*</span></label>
                        <input type="text" name="username" class="form-control" required
                            value="<?= $guru['username'] ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Password <small class="text-muted">(Kosongkan jika tidak
                                ubah)</small></label>
                        <input type="password" name="password" class="form-control">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status Akun</label>
                    <select name="status" class="form-select">
                        <option value="aktif" <?= $guru['status'] == 'aktif' ? 'selected' : '' ?>>Aktif</option>
                        <option value="nonaktif" <?= $guru['status'] == 'nonaktif' ? 'selected' : '' ?>>Nonaktif</option>
                        <option value="pensiun" <?= $guru['status'] == 'pensiun' ? 'selected' : '' ?>>Pensiun</option>
                        <option value="pindah" <?= $guru['status'] == 'pindah' ? 'selected' : '' ?>>Pindah</option>
                    </select>
                </div>

                <h6 class="fw-bold text-primary mb-3 mt-4">Data Pribadi</h6>
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" name="nama_lengkap" class="form-control" required
                        value="<?= $guru['nama_lengkap'] ?>">
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">NIP</label>
                        <input type="text" name="nip" class="form-control" value="<?= $guru['nip'] ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select">
                            <option value="L" <?= $guru['jenis_kelamin'] == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                            <option value="P" <?= $guru['jenis_kelamin'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">No Telepon</label>
                        <input type="text" name="no_telepon" class="form-control" value="<?= $guru['no_telepon'] ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="<?= $guru['email'] ?>">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3"><?= $guru['alamat'] ?></textarea>
                </div>

                <div class="d-flex text-end">
                    <button type="submit" class="btn btn-primary px-4 me-2">Update Data</button>
                    <a href="<?= BASE_URL ?>guru" class="btn btn-light px-4">Batal</a>
                </div>

            </form>
        </div>
    </div>
</div>