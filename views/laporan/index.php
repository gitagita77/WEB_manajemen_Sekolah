<div class="main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark">Pusat Laporan</h2>
            <p class="text-muted">Generate dan cetak laporan sekolah.</p>
        </div>
    </div>

    <?php
    $categories = [];
    foreach ($reports as $rep) {
        $categories[$rep['category']][] = $rep;
    }
    ?>

    <?php foreach ($categories as $cat => $list): ?>
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-header bg-white border-0 py-3">
                <h5 class="fw-bold text-primary mb-0">
                    <?= $cat ?>
                </h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <?php foreach ($list as $rep): ?>
                        <div class="col-md-3">
                            <div class="d-grid">
                                <a href="<?= BASE_URL ?>laporan/view_report?code=<?= $rep['code'] ?>" target="_blank"
                                    class="btn btn-outline-secondary text-start p-3 position-relative overflow-hidden report-btn">
                                    <i class="bi bi-file-text fs-4 mb-2 d-block"></i>
                                    <span class="d-block text-truncate fw-semibold">
                                        <?= $rep['name'] ?>
                                    </span>
                                    <small class="text-muted d-block mt-1">Klik untuk cetak</small>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<style>
    .report-btn:hover {
        background-color: #f8f9fa;
        border-color: var(--primary-color);
        color: var(--primary-color);
    }
</style>