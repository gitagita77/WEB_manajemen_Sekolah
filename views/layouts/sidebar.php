<div class="sidebar d-flex flex-column">
    <a href="<?= BASE_URL ?>" class="d-flex align-items-center mb-4 text-decoration-none">
        <span class="fs-4 fw-bold text-primary">Sekolah<span class="text-dark">App</span></span>
    </a>

    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="<?= BASE_URL ?>"
                class="nav-link <?= !isset($_GET['url']) || $_GET['url'] == '' || $_GET['url'] == 'dashboard' ? 'active' : '' ?>">
                <i class="bi bi-grid"></i> Dashboard
            </a>
        </li>

        <li class="nav-item mt-3">
            <span class="text-uppercase text-muted fw-bold" style="font-size: 0.75rem; padding-left: 15px;">Data
                Master</span>
        </li>
        <li>
            <a href="<?= BASE_URL ?>siswa"
                class="nav-link <?= (strpos($_GET['url'] ?? '', 'siswa') === 0 && strpos($_GET['url'] ?? '', 'laporan') === false) ? 'active' : '' ?>">
                <i class="bi bi-people"></i> Data Siswa
            </a>
        </li>
        <li>
            <a href="<?= BASE_URL ?>guru"
                class="nav-link <?= (strpos($_GET['url'] ?? '', 'guru') === 0) ? 'active' : '' ?>">
                <i class="bi bi-person-badge"></i> Data Guru
            </a>
        </li>
        <li>
            <a href="<?= BASE_URL ?>kelas"
                class="nav-link <?= (strpos($_GET['url'] ?? '', 'kelas') === 0) ? 'active' : '' ?>">
                <i class="bi bi-building"></i> Data Kelas
            </a>
        </li>
        <li>
            <a href="<?= BASE_URL ?>mapel"
                class="nav-link <?= (strpos($_GET['url'] ?? '', 'mapel') === 0) ? 'active' : '' ?>">
                <i class="bi bi-book"></i> Mata Pelajaran
            </a>
        </li>

        <li class="nav-item mt-3">
            <span class="text-uppercase text-muted fw-bold" style="font-size: 0.75rem; padding-left: 15px;">Akademik &
                Poin</span>
        </li>
        <li>
            <a href="<?= BASE_URL ?>absensi"
                class="nav-link <?= (strpos($_GET['url'] ?? '', 'absensi') === 0) ? 'active' : '' ?>">
                <i class="bi bi-calendar-check"></i> Absensi
            </a>
        </li>
        <li>
            <a href="<?= BASE_URL ?>jadwal"
                class="nav-link <?= (strpos($_GET['url'] ?? '', 'jadwal') === 0) ? 'active' : '' ?>">
                <i class="bi bi-calendar3"></i> Jadwal Pelajaran
            </a>
        </li>
        <li>
            <a href="<?= BASE_URL ?>prestasi"
                class="nav-link <?= (strpos($_GET['url'] ?? '', 'prestasi') === 0) ? 'active' : '' ?>">
                <i class="bi bi-trophy"></i> Prestasi Siswa
            </a>
        </li>
        <li>
            <a href="<?= BASE_URL ?>pelanggaran"
                class="nav-link <?= (strpos($_GET['url'] ?? '', 'pelanggaran') === 0) ? 'active' : '' ?>">
                <i class="bi bi-exclamation-triangle"></i> Pelanggaran
            </a>
        </li>

        <li class="nav-item mt-3">
            <span class="text-uppercase text-muted fw-bold"
                style="font-size: 0.75rem; padding-left: 15px;">Laporan</span>
        </li>
        <li>
            <a href="<?= BASE_URL ?>laporan"
                class="nav-link <?= (strpos($_GET['url'] ?? '', 'laporan') === 0) ? 'active' : '' ?>">
                <i class="bi bi-file-earmark-pdf"></i> Pusat Laporan
            </a>
        </li>

        <!-- Admin Only -->
        <li class="nav-item mt-3">
            <span class="text-uppercase text-muted fw-bold"
                style="font-size: 0.75rem; padding-left: 15px;">System</span>
        </li>
        <li>
            <a href="<?= BASE_URL ?>users"
                class="nav-link <?= (strpos($_GET['url'] ?? '', 'users') === 0) ? 'active' : '' ?>">
                <i class="bi bi-person-gear"></i> User Management
            </a>
        </li>
    </ul>

    <div class="mt-auto pt-3 border-top">
        <a href="<?= BASE_URL ?>auth/logout" class="nav-link text-danger">
            <i class="bi bi-box-arrow-right"></i> Logout
        </a>
    </div>
</div>