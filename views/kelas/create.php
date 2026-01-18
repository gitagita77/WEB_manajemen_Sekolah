<div class="main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark">Tambah Kelas</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= BASE_URL ?>kelas">Data Kelas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card border-0 shadow-sm col-md-8">
        <div class="card-body p-4">
            <form action="<?= BASE_URL ?>kelas/store" method="POST">

                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Kode Kelas <span class="text-danger">*</span></label>
                        <input type="text" name="kode_kelas" class="form-control" placeholder="X-IPA-1" required>
                    </div>
                    <div class="col-md-8">
                        <label class="form-label">Nama Kelas <span class="text-danger">*</span></label>
                        <input type="text" name="nama_kelas" class="form-control" placeholder="X IPA 1" required>
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Tingkat</label>
                        <select name="tingkat" class="form-select" required>
                            <option value="X">X (Sepuluh)</option>
                            <option value="XI">XI (Sebelas)</option>
                            <option value="XII">XII (Dua Belas)</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jurusan</label>
                        <select name="jurusan" class="form-select">
                            <option value="IPA">IPA / MIPA</option>
                            <option value="IPS">IPS / IIS</option>
                            <option value="BAHASA">Bahasa</option>
                            <option value="UMUM">Umum</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Wali Kelas</label>
                    <select name="wali_kelas_id" class="form-select">
                        <option value="">-- Pilih Wali Kelas --</option>
                        <?php foreach ($guru_list as $guru): ?>
                            <option value="<?= $guru['id'] ?>">
                                <?= $guru['nama_lengkap'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label">Kapasitas</label>
                        <input type="number" name="kapasitas" class="form-control" value="30">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tahun Ajaran</label>
                        <input type="text" name="tahun_ajaran" class="form-control"
                            value="<?= date('Y') . '/' . (date('Y') + 1) ?>" placeholder="2025/2026">
                    </div>
                </div>

                <div class="d-flex text-end">
                    <button type="submit" class="btn btn-primary px-4 me-2">Simpan Data</button>
                    <a href="<?= BASE_URL ?>kelas" class="btn btn-light px-4">Batal</a>
                </div>

            </form>
        </div>
    </div>
</div>