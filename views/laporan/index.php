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
        <div class="card mb-5 border-0 shadow-sm" style="border-radius: 20px;">
            <div class="card-header bg-white border-0 py-3 ps-4" style="border-left: 5px solid var(--primary-color);">
                <h5 class="fw-bold text-dark mb-0 d-flex align-items-center">
                    <i class="bi bi-collection-play-fill me-2 text-primary"></i>
                    <?= $cat ?>
                </h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <?php foreach ($list as $rep):
                        $iconColor = '#3b82f6'; // Default blue
                        if (strpos($rep['name'], 'Absensi') !== false)
                            $iconColor = '#8b5cf6'; // Purple
                        if (strpos($rep['name'], 'Siswa') !== false)
                            $iconColor = '#10b981'; // Emerald
                        if (strpos($rep['name'], 'Guru') !== false)
                            $iconColor = '#06b6d4'; // Cyan
                        if (strpos($rep['name'], 'Prestasi') !== false)
                            $iconColor = '#f59e0b'; // Amber
                        if (strpos($rep['name'], 'Pelanggaran') !== false)
                            $iconColor = '#f43f5e'; // Rose
                        if (strpos($rep['name'], 'Peringatan') !== false)
                            $iconColor = '#e11d48'; // Red
                        if (strpos($rep['name'], 'Statistik') !== false)
                            $iconColor = '#6366f1'; // Indigo
                        ?>
                        <div class="col-md-3">
                            <div class="d-grid">
                                <a href="<?= BASE_URL ?>laporan/view_report?code=<?= $rep['code'] ?>" target="_blank"
                                    class="report-btn d-block p-4 rounded-4 text-decoration-none transition-all"
                                    onmouseover="this.style.boxShadow='0 12px 20px -5px <?= $iconColor ?>30'; this.style.borderColor='<?= $iconColor ?>';"
                                    onmouseout="this.style.boxShadow='0 4px 6px -1px rgba(0, 0, 0, 0.05)'; this.style.borderColor='#f1f5f9';">
                                    <div class="report-icon-wrapper mb-3 rounded-3 d-flex align-items-center justify-content-center"
                                        style="background-color: <?= $iconColor ?>15;">
                                        <i class="bi bi-file-earmark-pdf-fill fs-3" style="color: <?= $iconColor ?>;"></i>
                                    </div>
                                    <span class="d-block text-dark fw-bold mb-1">
                                        <?= $rep['name'] ?>
                                    </span>
                                    <small class="text-muted d-block small">Klik untuk pratinjau</small>
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
    .report-btn {
        background-color: #fff;
        border: 1px solid #f1f5f9;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .report-icon-wrapper {
        width: 50px;
        height: 50px;
        background-color: var(--primary-light);
        transition: all 0.2s;
    }

    .report-btn:hover {
        transform: translateY(-5px);
        border-color: var(--primary-color);
        box-shadow: 0 10px 15px -3px rgba(67, 97, 238, 0.1);
    }

    .report-btn:hover .report-icon-wrapper {
        transform: scale(1.1);
    }

    .report-btn:hover .report-icon-wrapper i {
        /* Keep dynamic colors on hover */
    }

    .transition-all {
        transition: all 0.2s ease-in-out;
    }
</style>