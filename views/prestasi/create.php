<div class="main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark">Tambah Prestasi</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= BASE_URL ?>prestasi">Prestasi Siswa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <form action="<?= BASE_URL ?>prestasi/store" method="POST">

                        <div class="mb-3">
                            <label class="form-label">Pilih Siswa <span class="text-danger">*</span></label>
                            <select name="siswa_id" class="form-select" required>
                                <option value="">-- Pilih Siswa --</option>
                                <?php foreach ($siswa_list as $s): ?>
                                    <option value="<?= $s['id'] ?>">
                                        <?= $s['nama_lengkap'] ?> (
                                        <?= $s['nis'] ?>) -
                                        <?= $s['nama_kelas'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Tanggal <span class="text-danger">*</span></label>
                                <input type="date" name="tanggal" class="form-control" value="<?= date('Y-m-d') ?>"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Poin <span class="text-danger">*</span></label>
                                <input type="number" name="poin" class="form-control" min="1" value="10" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jenis Prestasi <span class="text-danger">*</span></label>
                            <input type="text" name="prestasi" class="form-control"
                                placeholder="Contoh: Juara 1 Olimpiade Matematika" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Keterangan</label>
                            <textarea name="keterangan" class="form-control" rows="3"
                                placeholder="Detail tambahan..."></textarea>
                        </div>

                        <div class="d-flex text-end">
                            <button type="submit" class="btn btn-primary px-4 me-2">Simpan Prestasi</button>
                            <a href="<?= BASE_URL ?>prestasi" class="btn btn-light px-4">Batal</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm bg-light">
                <div class="card-body">
                    <h6 class="fw-bold mb-3"><i class="bi bi-lightbulb text-warning me-2"></i>Panduan Poin Prestasi</h6>
                    <ul class="small mb-0">
                        <li class="mb-2"><strong>Akademik (5-50 poin):</strong> Juara kelas, olimpiade, lomba karya
                            ilmiah</li>
                        <li class="mb-2"><strong>Non-Akademik (5-100 poin):</strong> Olahraga, seni, keagamaan,
                            kepemimpinan</li>
                        <li class="mb-2"><strong>Tingkat Sekolah:</strong> 5-20 poin</li>
                        <li class="mb-2"><strong>Tingkat Kota/Kab:</strong> 20-50 poin</li>
                        <li class="mb-2"><strong>Tingkat Provinsi:</strong> 50-80 poin</li>
                        <li><strong>Tingkat Nasional/Internasional:</strong> 80-100+ poin</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>