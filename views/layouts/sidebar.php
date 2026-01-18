<?php
$role = $_SESSION['role'] ?? 'guest';
$url = $_GET['url'] ?? '';

// Helper for active class
function isActive($keyword)
{
    global $url;
    if ($keyword == 'dashboard' && ($url == '' || $url == 'dashboard'))
        return 'active';
    if ($keyword != 'dashboard' && strpos($url, $keyword) === 0)
        return 'active';
    return '';
}
?>

<div class="sidebar d-flex flex-column">
    <a href="<?= BASE_URL ?>" class="d-flex align-items-center mb-4 text-decoration-none px-2">
        <div class="bg-primary rounded-3 d-flex align-items-center justify-content-center me-3"
            style="width: 40px; height: 40px; box-shadow: 0 4px 12px rgba(67, 97, 238, 0.4);">
            <i class="bi bi-mortarboard-fill text-white fs-4"></i>
        </div>
        <span class="fs-4 fw-bold text-dark" style="letter-spacing: -0.5px;">Sekolah<span
                class="text-primary">App</span></span>
    </a>

    <div class="mb-4 px-2">
        <div class="card bg-light border-0 p-3 rounded-4">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0 me-3">
                    <div class="bg-white rounded-circle p-2 shadow-sm">
                        <i class="bi bi-person-circle fs-4 text-primary"></i>
                    </div>
                </div>
                <div class="overflow-hidden">
                    <div class="small text-muted mb-0">Role Anda:</div>
                    <div class="fw-bold text-dark text-truncate text-uppercase small"><?= $role ?></div>
                </div>
            </div>
        </div>
    </div>

    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="<?= BASE_URL ?>" class="nav-link <?= isActive('dashboard') ?> bg-dashboard">
                <i class="bi bi-grid icon-dashboard"></i> Dashboard
            </a>
        </li>

        <?php if ($role == 'admin' || $role == 'guru'): ?>
            <li class="nav-item mt-3">
                <span class="text-uppercase text-muted fw-bold" style="font-size: 0.75rem; padding-left: 15px;">Data
                    Master</span>
            </li>
            <li>
                <a href="<?= BASE_URL ?>siswa" class="nav-link <?= isActive('siswa') ?> bg-master">
                    <i class="bi bi-people icon-master"></i> Data Siswa
                </a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>guru" class="nav-link <?= isActive('guru') ?> bg-master">
                    <i class="bi bi-person-badge icon-master"></i> Data Guru
                </a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>kelas" class="nav-link <?= isActive('kelas') ?> bg-master">
                    <i class="bi bi-building icon-master"></i> Data Kelas
                </a>
            </li>
        <?php endif; ?>

        <?php if ($role == 'admin'): ?>
            <li>
                <a href="<?= BASE_URL ?>mapel" class="nav-link <?= isActive('mapel') ?> bg-master">
                    <i class="bi bi-book icon-master"></i> Mata Pelajaran
                </a>
            </li>
        <?php endif; ?>

        <li class="nav-item mt-3">
            <span class="text-uppercase text-muted fw-bold" style="font-size: 0.75rem; padding-left: 15px;">Akademik &
                Poin</span>
        </li>
        <li>
            <a href="<?= BASE_URL ?>absensi" class="nav-link <?= isActive('absensi') ?> bg-akademik">
                <i class="bi bi-calendar-check icon-akademik"></i> Absensi
            </a>
        </li>
        <li>
            <a href="<?= BASE_URL ?>jadwal" class="nav-link <?= isActive('jadwal') ?> bg-akademik">
                <i class="bi bi-calendar3 icon-akademik"></i> Jadwal Pelajaran
            </a>
        </li>
        <li>
            <a href="<?= BASE_URL ?>prestasi" class="nav-link <?= isActive('prestasi') ?> bg-akademik">
                <i class="bi bi-trophy icon-akademik"></i> Prestasi Siswa
            </a>
        </li>
        <li>
            <a href="<?= BASE_URL ?>pelanggaran" class="nav-link <?= isActive('pelanggaran') ?> bg-akademik">
                <i class="bi bi-exclamation-triangle icon-akademik"></i> Pelanggaran
            </a>
        </li>

        <?php if ($role == 'admin' || $role == 'guru'): ?>
            <li class="nav-item mt-3">
                <span class="text-uppercase text-muted fw-bold"
                    style="font-size: 0.75rem; padding-left: 15px;">Laporan</span>
            </li>
            <li>
                <a href="<?= BASE_URL ?>laporan" class="nav-link <?= isActive('laporan') ?> bg-laporan">
                    <i class="bi bi-file-earmark-pdf icon-laporan"></i> Pusat Laporan
                </a>
            </li>
        <?php endif; ?>

        <?php if ($role == 'admin'): ?>
            <li class="nav-item mt-3">
                <span class="text-uppercase text-muted fw-bold"
                    style="font-size: 0.75rem; padding-left: 15px;">System</span>
            </li>
            <li>
                <a href="<?= BASE_URL ?>users" class="nav-link <?= isActive('users') ?> bg-system">
                    <i class="bi bi-person-gear icon-system"></i> User Management
                </a>
            </li>
        <?php endif; ?>
    </ul>

    <div class="mt-auto pt-3 border-top">
        <a href="<?= BASE_URL ?>auth/logout" class="nav-link text-danger">
            <i class="bi bi-box-arrow-right"></i> Logout
        </a>
    </div>
</div>