<div class="main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark">Dashboard</h2>
            <p class="text-muted">Selamat datang di Sistem Manajemen Sekolah</p>
        </div>
        <div>
            <span class="badge bg-primary rounded-pill px-3 py-2"><?= date('d M Y') ?></span>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card p-4 border-0 shadow-sm"
                style="background: linear-gradient(135deg, #4361ee, #4895ef); color: white;">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="mb-1 opacity-75 fw-medium">Total Siswa</p>
                        <h2 class="fw-bold mb-0"><?= $stats['total_siswa'] ?? 0 ?></h2>
                    </div>
                    <div class="bg-white bg-opacity-20 p-3 rounded-4">
                        <i class="bi bi-people-fill fs-3"></i>
                    </div>
                </div>
                <div class="mt-3 small opacity-75">
                    <i class="bi bi-arrow-up-short"></i> Terdata di sistem
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-4 border-0 shadow-sm"
                style="background: linear-gradient(135deg, #10b981, #34d399); color: white;">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="mb-1 opacity-75 fw-medium">Total Guru</p>
                        <h2 class="fw-bold mb-0"><?= $stats['total_guru'] ?? 0 ?></h2>
                    </div>
                    <div class="bg-white bg-opacity-20 p-3 rounded-4">
                        <i class="bi bi-person-workspace fs-3"></i>
                    </div>
                </div>
                <div class="mt-3 small opacity-75">
                    <i class="bi bi-check-circle-fill me-1"></i> Aktif mengajar
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-4 border-0 shadow-sm"
                style="background: linear-gradient(135deg, #f59e0b, #fbbf24); color: white;">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="mb-1 opacity-75 fw-medium">Total Kelas</p>
                        <h2 class="fw-bold mb-0"><?= $stats['total_kelas'] ?? 0 ?></h2>
                    </div>
                    <div class="bg-white bg-opacity-20 p-3 rounded-4">
                        <i class="bi bi-door-open-fill fs-3"></i>
                    </div>
                </div>
                <div class="mt-3 small opacity-75">
                    <i class="bi bi-building me-1"></i> Ruang tersedia
                </div>
            </div>
        </div>
    </div>

    <!-- Row 2: Today's Attendance & Attendance Trend -->
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0">
                        <i class="bi bi-pie-chart-fill me-2 text-primary"></i>Absensi Hari Ini
                    </h5>
                    <p class="small text-muted mb-0"><?= date('d F Y') ?></p>
                </div>
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <?php
                    $total_absen = $absensi_today['total'] ?? 0;
                    $hadir = $absensi_today['hadir'] ?? 0;
                    $sakit = $absensi_today['sakit'] ?? 0;
                    $izin = $absensi_today['izin'] ?? 0;
                    $alpha = $absensi_today['alpha'] ?? 0;
                    ?>

                    <?php if ($total_absen > 0): ?>
                        <div style="position: relative; width: 100%; max-width: 220px;">
                            <canvas id="absensiChart"></canvas>
                            <div
                                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
                                <div style="font-size: 2.2rem; font-weight: bold; color: #333;"><?= $total_absen ?></div>
                                <div style="font-size: 0.8rem; color: #666; text-transform: uppercase;">Total</div>
                            </div>
                        </div>

                        <div class="mt-4 w-100 px-3">
                            <div class="d-flex justify-content-between align-items-center mb-1 small">
                                <span><i class="bi bi-circle-fill me-2" style="color: #20c997;"></i>Hadir</span>
                                <span class="fw-bold"><?= $hadir ?></span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-1 small">
                                <span><i class="bi bi-circle-fill me-2" style="color: #ff6b9d;"></i>Izin</span>
                                <span class="fw-bold"><?= $izin ?></span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-1 small">
                                <span><i class="bi bi-circle-fill me-2" style="color: #4299e1;"></i>Sakit</span>
                                <span class="fw-bold"><?= $sakit ?></span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center small">
                                <span><i class="bi bi-circle-fill me-2" style="color: #ffc107;"></i>Alfa</span>
                                <span class="fw-bold"><?= $alpha ?></span>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="text-center text-muted py-5">
                            <i class="bi bi-calendar-x fs-1 opacity-25"></i>
                            <p class="mt-3">Belum ada data absensi</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0">
                        <i class="bi bi-graph-up me-2 text-success"></i>Tren Kehadiran (7 Hari Terakhir)
                    </h5>
                </div>
                <div class="card-body">
                    <canvas id="trendChart" style="height: 300px;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Row 3: Class Distribution & Gender -->
    <div class="row g-4 mb-4">
        <div class="col-md-8">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0">
                        <i class="bi bi-bar-chart-fill me-2 text-warning"></i>Distribusi Siswa per Kelas
                    </h5>
                </div>
                <div class="card-body">
                    <canvas id="classChart" style="height: 300px;"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0">
                        <i class="bi bi-gender-ambiguous me-2 text-info"></i>Komposisi Gender
                    </h5>
                </div>
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <div style="width: 100%; max-width: 220px;">
                        <canvas id="genderChart"></canvas>
                    </div>
                    <div class="mt-4 w-100 px-3">
                        <?php
                        $lk = 0;
                        $pr = 0;
                        foreach ($gender_stats as $gs) {
                            if ($gs['jenis_kelamin'] == 'L')
                                $lk = $gs['total'];
                            if ($gs['jenis_kelamin'] == 'P')
                                $pr = $gs['total'];
                        }
                        ?>
                        <div class="d-flex justify-content-between align-items-center mb-1 small">
                            <span><i class="bi bi-gender-male me-2 text-primary"></i>Laki-laki</span>
                            <span class="fw-bold"><?= $lk ?></span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center small">
                            <span><i class="bi bi-gender-female me-2" style="color: #e83e8c;"></i>Perempuan</span>
                            <span class="fw-bold"><?= $pr ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Row 4: Calendar, Upcoming Schedule, & Recent Activity -->
    <div class="row g-4 mb-4">
        <!-- Calendar -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0">
                        <i class="bi bi-calendar3 me-2 text-primary"></i>Kalender
                    </h5>
                </div>
                <div class="card-body">
                    <div id="calendar-widget">
                        <div class="calendar-header d-flex justify-content-between align-items-center mb-3">
                            <span id="calendar-month-year" class="fw-bold text-dark"></span>
                            <div class="btn-group btn-group-sm">
                                <button type="button" class="btn btn-outline-secondary" id="prev-month"><i
                                        class="bi bi-chevron-left"></i></button>
                                <button type="button" class="btn btn-outline-secondary" id="next-month"><i
                                        class="bi bi-chevron-right"></i></button>
                            </div>
                        </div>
                        <table class="table table-sm table-borderless text-center calendar-table mb-0">
                            <thead>
                                <tr class="text-muted small">
                                    <th>S</th>
                                    <th>M</th>
                                    <th>T</th>
                                    <th>W</th>
                                    <th>T</th>
                                    <th>F</th>
                                    <th>S</th>
                                </tr>
                            </thead>
                            <tbody id="calendar-body">
                                <!-- Calendar content will be generated by JS -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Upcoming Schedule -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0">
                        <i class="bi bi-clock-history me-2 text-success"></i>Jadwal (<?= $upcoming_schedule['day'] ?>)
                    </h5>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        <?php if (!empty($upcoming_schedule['list'])): ?>
                            <?php foreach ($upcoming_schedule['list'] as $item): ?>
                                <li class="list-group-item d-flex align-items-center py-3 border-0 border-bottom">
                                    <div class="badge bg-light text-primary me-3 py-2 px-3" style="min-width: 60px;">
                                        Sesi <?= $item['sesi'] ?>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0 fw-bold"><?= $item['nama_mapel'] ?></h6>
                                        <small class="text-muted"><?= $item['nama_guru'] ?></small>
                                    </div>
                                    <i class="bi bi-chevron-right text-muted small"></i>
                                </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="text-center py-5 text-muted">
                                <i class="bi bi-journal-x fs-1 opacity-25"></i>
                                <p class="mt-2">Tidak ada jadwal hari ini</p>
                            </div>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="fw-bold mb-0">
                        <i class="bi bi-lightning-charge-fill me-2 text-warning"></i>Aktivitas Hari Ini
                    </h5>
                </div>
                <div class="card-body p-0 overflow-auto" style="max-height: 400px;">
                    <div class="timeline p-3">
                        <?php if (!empty($recent_activities)): ?>
                            <?php foreach ($recent_activities as $act):
                                $actColor = 'icon-system';
                                if ($act['type'] == 'absensi')
                                    $actColor = 'icon-akademik';
                                if ($act['type'] == 'siswa')
                                    $actColor = 'icon-master';
                                if ($act['type'] == 'prestasi')
                                    $actColor = 'icon-poin';
                                if ($act['type'] == 'pelanggaran')
                                    $actColor = 'icon-laporan';
                                ?>
                                <div class="d-flex mb-3">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="rounded-3 d-flex align-items-center justify-content-center <?= $actColor ?>"
                                            style="width: 48px; height: 48px; font-size: 1.2rem;">
                                            <i class="bi bi-activity"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="mb-0 small text-dark">
                                            <strong><?= htmlspecialchars($act['nama_lengkap']) ?></strong>
                                        </p>
                                        <p class="mb-0 text-muted" style="font-size: 0.85rem;"><?= $act['activity'] ?></p>
                                        <p class="mb-0 text-muted" style="font-size: 0.75rem;">
                                            <i class="bi bi-clock me-1"></i><?= date('H:i', strtotime($act['waktu'])) ?> • <span
                                                class="text-uppercase fw-bold"
                                                style="font-size: 0.7rem;"><?= ucfirst($act['type']) ?></span>
                                        </p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="text-center py-5 text-muted">
                                <i class="bi bi-activity fs-1 opacity-25"></i>
                                <p class="mt-2">Belum ada aktivitas</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Top Prestasi -->
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0 text-primary">
                    <i class="bi bi-trophy-fill me-2"></i>Top 10 Siswa Berprestasi
                </h5>
                <a href="<?= BASE_URL ?>prestasi" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-premium table-blue-head mb-0 align-middle">
                        <thead>
                            <tr>
                                <th class="ps-4">No</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th class="text-end pe-4">Poin</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($top_prestasi)): ?>
                                <?php foreach ($top_prestasi as $i => $row): ?>
                                    <tr>
                                        <td class="ps-4">
                                            <?php if ($i == 0): ?><i class="bi bi-award-fill text-warning"></i>
                                            <?php elseif ($i == 1): ?><i class="bi bi-award-fill text-secondary"></i>
                                            <?php elseif ($i == 2): ?><i class="bi bi-award-fill text-danger"></i>
                                            <?php else: ?><span class="fw-bold text-muted"><?= $i + 1 ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="fw-bold text-dark"><?= htmlspecialchars($row['nama_lengkap']) ?></div>
                                            <div class="small text-muted"><?= $row['nis'] ?></div>
                                        </td>
                                        <td><span class="badge bg-light text-dark border"><?= $row['nama_kelas'] ?></span></td>
                                        <td class="text-end pe-4"><span
                                                class="fw-bold text-primary"><?= $row['total_poin_prestasi'] ?></span></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">Belum ada data prestasi.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Top Pelanggaran -->
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0 text-danger">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>Top 10 Siswa (Poin Pelanggaran)
                </h5>
                <a href="<?= BASE_URL ?>pelanggaran" class="btn btn-sm btn-outline-danger">Lihat Semua</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-premium table-red-head mb-0 align-middle">
                        <thead>
                            <tr>
                                <th class="ps-4">No</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th class="text-end pe-4">Poin</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($top_pelanggaran)): ?>
                                <?php foreach ($top_pelanggaran as $i => $row): ?>
                                    <tr>
                                        <td class="ps-4"><span class="fw-bold text-muted"><?= $i + 1 ?></span></td>
                                        <td>
                                            <div class="fw-bold text-dark"><?= htmlspecialchars($row['nama_lengkap']) ?></div>
                                            <div class="small text-muted"><?= $row['nis'] ?></div>
                                        </td>
                                        <td><span class="badge bg-light text-dark border"><?= $row['nama_kelas'] ?></span></td>
                                        <td class="text-end pe-4"><span
                                                class="badge bg-danger"><?= $row['total_poin_pelanggaran'] ?></span></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">Belum ada data pelanggaran.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<style>
    .calendar-table th {
        padding: 10px 0 !important;
        background: transparent !important;
        color: #64748b !important;
        font-size: 0.8rem;
        border: none !important;
    }

    .calendar-table td {
        padding: 5px 0 !important;
        border: none !important;
        background: transparent !important;
    }

    .calendar-table td span {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        transition: all 0.2s;
        font-weight: 500;
        cursor: pointer;
        border-radius: 50%;
    }

    .calendar-table td span:hover:not(.bg-primary) {
        background-color: #eff6ff;
        color: var(--primary-color);
    }

    .calendar-table td span.bg-primary {
        background-color: var(--primary-color) !important;
        box-shadow: 0 4px 12px rgba(67, 97, 238, 0.4);
        color: white !important;
    }

    .calendar-header span {
        font-size: 1rem;
        letter-spacing: 0.5px;
    }
</style>

<script>
    // Initialize Attendance Donut Chart
    document.addEventListener('DOMContentLoaded', function () {
        // 1. Absensi Today (Donut)
        <?php if ($total_absen > 0): ?>
            const ctxAbsensi = document.getElementById('absensiChart');
            if (ctxAbsensi) {
                new Chart(ctxAbsensi, {
                    type: 'doughnut',
                    data: {
                        labels: ['Hadir', 'Izin', 'Sakit', 'Alfa'],
                        datasets: [{
                            data: [<?= $hadir ?>, <?= $izin ?>, <?= $sakit ?>, <?= $alpha ?>],
                            backgroundColor: ['#10b981', '#f59e0b', '#3b82f6', '#f43f5e'],
                            borderWidth: 0, cutout: '75%'
                        }]
                    },
                    options: { responsive: true, plugins: { legend: { display: false } } }
                });
            }
        <?php endif; ?>

        // 2. Trend Chart (Line)
        const ctxTrend = document.getElementById('trendChart');
        if (ctxTrend) {
            new Chart(ctxTrend, {
                type: 'line',
                data: {
                    labels: [<?php foreach ($attendance_trend as $t)
                        echo "'" . date('d/m', strtotime($t['tanggal'])) . "',"; ?>],
                    datasets: [{
                        label: 'Siswa Hadir',
                        data: [<?php foreach ($attendance_trend as $t)
                            echo $t['hadir'] . ","; ?>],
                        borderColor: '#10b981',
                        backgroundColor: 'rgba(16, 185, 129, 0.1)',
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } }
                }
            });
        }

        // 3. Class Distribution (Bar)
        const ctxClass = document.getElementById('classChart');
        if (ctxClass) {
            new Chart(ctxClass, {
                type: 'bar',
                data: {
                    labels: [<?php foreach ($student_per_class as $c)
                        echo "'" . $c['nama_kelas'] . "',"; ?>],
                    datasets: [{
                        label: 'Jumlah Siswa',
                        data: [<?php foreach ($student_per_class as $c)
                            echo $c['total'] . ","; ?>],
                        backgroundColor: '#3b82f6',
                        borderRadius: 6,
                        hoverBackgroundColor: '#2563eb'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } }
                }
            });
        }

        // 4. Gender Stats (Pie)
        const ctxGender = document.getElementById('genderChart');
        if (ctxGender) {
            new Chart(ctxGender, {
                type: 'pie',
                data: {
                    labels: ['Laki-laki', 'Perempuan'],
                    datasets: [{
                        data: [<?= $lk ?>, <?= $pr ?>],
                        backgroundColor: ['#3b82f6', '#f43f5e'],
                        borderWidth: 0,
                        hoverOffset: 10
                    }]
                },
                options: { responsive: true, plugins: { legend: { display: false } } }
            });
        }

        // 5. Interactive Calendar Logic
        let currentDate = new Date();
        const calendarBody = document.getElementById('calendar-body');
        const monthYearText = document.getElementById('calendar-month-year');

        function renderCalendar() {
            const year = currentDate.getFullYear();
            const month = currentDate.getMonth();
            const today = new Date();

            // Update header
            const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            monthYearText.textContent = `${monthNames[month]} ${year}`;

            // Clear body
            calendarBody.innerHTML = '';

            const firstDay = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();

            let date = 1;
            for (let i = 0; i < 6; i++) {
                let row = document.createElement('tr');
                for (let j = 0; j < 7; j++) {
                    let cell = document.createElement('td');
                    if (i === 0 && j < firstDay) {
                        cell.innerHTML = '';
                    } else if (date > daysInMonth) {
                        break;
                    } else {
                        const isToday = date === today.getDate() && month === today.getMonth() && year === today.getFullYear();
                        const activeClass = isToday ? 'bg-primary' : '';
                        cell.innerHTML = `<span class="${activeClass}">${date}</span>`;
                        date++;
                    }
                    row.appendChild(cell);
                }
                calendarBody.appendChild(row);
                if (date > daysInMonth) break;
            }
        }

        document.getElementById('prev-month')?.addEventListener('click', () => {
            currentDate.setMonth(currentDate.getMonth() - 1);
            renderCalendar();
        });

        document.getElementById('next-month')?.addEventListener('click', () => {
            currentDate.setMonth(currentDate.getMonth() + 1);
            renderCalendar();
        });

        renderCalendar();
    });
</script>