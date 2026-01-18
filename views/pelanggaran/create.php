<div class="main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark">Tambah Pelanggaran</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= BASE_URL ?>pelanggaran">Pelanggaran</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <form action="<?= BASE_URL ?>pelanggaran/store" method="POST" id="formPelanggaran">

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
                                <label class="form-label">Kategori <span class="text-danger">*</span></label>
                                <select name="kategori" class="form-select" id="kategoriSelect" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="ringan">Ringan (2-15 poin)</option>
                                    <option value="sedang">Sedang (15-50 poin)</option>
                                    <option value="berat">Berat (50-300+ poin)</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jenis Pelanggaran <span class="text-danger">*</span></label>
                            <input type="text" name="pelanggaran" id="pelanggaranInput" class="form-control"
                                placeholder="Pilih dari preset atau ketik manual" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Poin Pelanggaran <span class="text-danger">*</span></label>
                            <input type="number" name="poin" id="poinInput" class="form-control" min="1" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Sanksi <span class="text-danger">*</span></label>
                            <select name="sanksi" class="form-select" required>
                                <option value="Teguran Lisan">Teguran Lisan</option>
                                <option value="Teguran Tertulis">Teguran Tertulis</option>
                                <option value="Panggilan Orang Tua">Panggilan Orang Tua</option>
                                <option value="Surat Pernyataan">Surat Pernyataan</option>
                                <option value="Skorsing 1-3 Hari">Skorsing 1-3 Hari</option>
                                <option value="Skorsing 1 Minggu">Skorsing 1 Minggu</option>
                                <option value="Dikembalikan ke Orang Tua">Dikembalikan ke Orang Tua</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Keterangan</label>
                            <textarea name="keterangan" class="form-control" rows="3"
                                placeholder="Detail tambahan..."></textarea>
                        </div>

                        <div class="d-flex text-end">
                            <button type="submit" class="btn btn-danger px-4 me-2">Simpan Pelanggaran</button>
                            <a href="<?= BASE_URL ?>pelanggaran" class="btn btn-light px-4">Batal</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-danger text-white">
                    <h6 class="mb-0"><i class="bi bi-list-check me-2"></i>Preset Pelanggaran</h6>
                </div>
                <div class="card-body p-0" style="max-height: 600px; overflow-y: auto;">

                    <!-- Ringan -->
                    <div class="p-3 border-bottom bg-light">
                        <strong class="text-warning"><i class="bi bi-exclamation-circle me-1"></i>RINGAN</strong>
                    </div>
                    <?php foreach ($preset['ringan'] as $p): ?>
                        <div class="p-2 border-bottom preset-item" style="cursor: pointer;"
                            onclick="selectPreset('<?= addslashes($p['nama']) ?>', <?= $p['poin'] ?>, 'ringan')">
                            <div class="d-flex justify-content-between align-items-center">
                                <small>
                                    <?= $p['nama'] ?>
                                </small>
                                <span class="badge bg-warning text-dark">
                                    <?= $p['poin'] ?>
                                </span>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <!-- Sedang -->
                    <div class="p-3 border-bottom bg-light mt-2">
                        <strong class="text-orange"><i class="bi bi-exclamation-triangle me-1"></i>SEDANG</strong>
                    </div>
                    <?php foreach ($preset['sedang'] as $p): ?>
                        <div class="p-2 border-bottom preset-item" style="cursor: pointer;"
                            onclick="selectPreset('<?= addslashes($p['nama']) ?>', <?= $p['poin'] ?>, 'sedang')">
                            <div class="d-flex justify-content-between align-items-center">
                                <small>
                                    <?= $p['nama'] ?>
                                </small>
                                <span class="badge bg-orange text-white">
                                    <?= $p['poin'] ?>
                                </span>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <!-- Berat -->
                    <div class="p-3 border-bottom bg-light mt-2">
                        <strong class="text-danger"><i class="bi bi-x-octagon me-1"></i>BERAT</strong>
                    </div>
                    <?php foreach ($preset['berat'] as $p): ?>
                        <div class="p-2 border-bottom preset-item" style="cursor: pointer;"
                            onclick="selectPreset('<?= addslashes($p['nama']) ?>', <?= $p['poin'] ?>, 'berat')">
                            <div class="d-flex justify-content-between align-items-center">
                                <small>
                                    <?= $p['nama'] ?>
                                </small>
                                <span class="badge bg-danger">
                                    <?= $p['poin'] ?>
                                </span>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .preset-item:hover {
        background-color: #f8f9fa;
    }

    .bg-orange {
        background-color: #ff8c00 !important;
    }

    .text-orange {
        color: #ff8c00 !important;
    }
</style>

<script>
    function selectPreset(nama, poin, kategori) {
        document.getElementById('pelanggaranInput').value = nama;
        document.getElementById('poinInput').value = poin;
        document.getElementById('kategoriSelect').value = kategori;
    }
</script>