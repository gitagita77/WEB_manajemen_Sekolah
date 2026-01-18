<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>
        <?= $title ?>
    </title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12pt;
            color: #333;
            line-height: 1.5;
            margin: 0;
            padding: 20px;
            background: #fff;
        }

        .container {
            width: 100%;
            max-width: 900px;
            margin: auto;
        }

        /* Header */
        .header {
            text-align: center;
            border-bottom: 3px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
            position: relative;
        }

        .header img {
            position: absolute;
            left: 0;
            top: 0;
            height: 80px;
        }

        .header h2 {
            margin: 0;
            font-size: 16pt;
            text-transform: uppercase;
        }

        .header h3 {
            margin: 0;
            font-size: 14pt;
            text-transform: uppercase;
        }

        .header p {
            margin: 5px 0 0;
            font-size: 10pt;
            font-style: italic;
        }

        /* Report Title */
        .report-title {
            text-align: center;
            margin-bottom: 20px;
        }

        .report-title h1 {
            margin: 0;
            font-size: 18pt;
            text-decoration: underline;
            text-transform: uppercase;
        }

        .report-title p {
            margin: 5px 0 0;
            font-size: 12pt;
        }

        /* Meta Data */
        .meta-box {
            border: 1px solid #ddd;
            background: #f9f9f9;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
        }

        .meta-box table {
            width: 100%;
        }

        .meta-box td {
            font-size: 11pt;
        }

        .meta-box td:first-child {
            width: 150px;
            font-weight: bold;
        }

        /* Stats Section */
        .stats-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            gap: 15px;
        }

        .stat-box {
            flex: 1;
            border-top: 5px solid;
            padding: 15px;
            text-align: center;
            background: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            border-radius: 4px;
            border-left: 1px solid #eee;
            border-right: 1px solid #eee;
            border-bottom: 1px solid #eee;
            transition: transform 0.2s;
        }

        .stat-box h4 {
            margin: 0;
            font-size: 24pt;
            color: #333;
            line-height: 1;
        }

        .stat-box p {
            margin: 10px 0 0;
            font-size: 9pt;
            text-transform: uppercase;
            font-weight: bold;
            color: #666;
            letter-spacing: 1px;
        }

        /* Matching Image Colors */
        .stat-hadir {
            border-top-color: #28a745;
        }

        /* Green */
        .stat-izin {
            border-top-color: #17a2b8;
        }

        /* Cyan */
        .stat-sakit {
            border-top-color: #ffc107;
        }

        /* Yellow/Orange */
        .stat-alpha {
            border-top-color: #dc3545;
        }

        /* Red */

        .summary-info {
            margin-bottom: 25px;
            font-size: 11pt;
            padding: 15px;
            background: #fcfcfc;
            border-radius: 8px;
            border: 1px solid #f0f0f0;
        }

        .summary-info table {
            width: 100%;
            max-width: 400px;
        }

        .summary-info td {
            padding: 4px 0;
        }

        .summary-info td:first-child {
            font-weight: bold;
            width: 200px;
            color: #444;
        }

        /* Table */
        table.data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            border: 1px solid #e0e0e0;
        }

        table.data-table th {
            background: #34495e;
            color: white;
            padding: 14px 10px;
            text-align: left;
            font-size: 9pt;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: 1px solid #2c3e50;
        }

        table.data-table td {
            padding: 12px 10px;
            border: 1px solid #e0e0e0;
            font-size: 10pt;
            vertical-align: middle;
        }

        table.data-table tr:nth-child(even) {
            background: #f8fafc;
        }

        .badge {
            padding: 5px 12px;
            border-radius: 50px;
            font-size: 8pt;
            font-weight: bold;
            text-transform: uppercase;
            display: inline-block;
            min-width: 60px;
            text-align: center;
        }

        .badge-hadir {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .badge-izin {
            background: #d1ecf1;
            color: #0c5460;
            border: 1px solid #bee5eb;
        }

        .badge-sakit {
            background: #fff3cd;
            color: #856404;
            border: 1px solid #ffeeba;
        }

        .badge-alpha {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }


        /* Notes Box */
        .notes-box {
            background: #fffaf0;
            border: 1px solid #ffeeba;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 30px;
            font-size: 9pt;
        }

        .notes-box h5 {
            margin: 0 0 10px;
            font-size: 10pt;
        }

        .notes-box ul {
            margin: 0;
            padding-left: 20px;
        }

        /* Footer / Signature */
        .footer-sign {
            float: right;
            width: 300px;
            text-align: center;
            margin-top: 20px;
        }

        .footer-sign p {
            margin: 0;
        }

        .sign-space {
            height: 80px;
        }

        .sign-name {
            font-weight: bold;
            text-decoration: underline;
        }

        .print-footer {
            position: fixed;
            bottom: 10px;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 8pt;
            color: #999;
        }

        @media print {
            body {
                padding: 0;
            }

            .btn-print {
                display: none;
            }

            @page {
                margin: 1cm;
            }
        }

        .btn-print {
            position: fixed;
            top: 20px;
            right: 20px;
            background: #4a5568;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            font-family: sans-serif;
        }

        .btn-print:hover {
            background: #2d3748;
        }
    </style>
</head>

<body onload="window.print()">
    <a href="javascript:void(0)" onclick="window.print()" class="btn-print">Cetak Laporan</a>

    <div class="container">
        <!-- Letterhead -->
        <div class="header">
            <!-- Placeholder for logo -->
            <div
                style="position: absolute; left: 0; top: 0; width: 80px; height: 80px; background: #eee; border-radius: 50%; border: 1px solid #ccc; display: flex; align-items: center; justify-content: center; font-size: 8pt; font-weight: bold; text-align: center;">
                LOGO</div>
            <h2>PEMERINTAH KOTA BANJARMASIN</h2>
            <h3>SMA NEGERI BANJARMASIN</h3>
            <p>Jl. Pendidikan No. 123, Kota Banjarmasin, Kalimantan Selatan, 70121</p>
        </div>

        <div class="report-title">
            <h1>
                <?= $report_name ?>
            </h1>
            <p>Sistem Informasi Manajemen Sekolah</p>
        </div>

        <div class="meta-box">
            <table>
                <tr>
                    <td>Jenis Laporan</td>
                    <td>: Laporan Absensi Seluruh Siswa</td>
                </tr>
                <tr>
                    <td>Tanggal Cetak</td>
                    <td>:
                        <?= date('d M Y H:i') ?> WITA
                    </td>
                </tr>
            </table>
        </div>

        <?php
        $stats = $data['stats'];
        $list = $data['list'];
        $total = $stats['total'];
        $p_hadir = ($total > 0) ? round(($stats['hadir'] / $total) * 100, 2) : 0;
        ?>

        <div class="stats-container">
            <div class="stat-box stat-hadir">
                <h4>
                    <?= $stats['hadir'] ?>
                </h4>
                <p>Hadir</p>
            </div>
            <div class="stat-box stat-izin">
                <h4>
                    <?= $stats['izin'] ?>
                </h4>
                <p>Izin</p>
            </div>
            <div class="stat-box stat-sakit">
                <h4>
                    <?= $stats['sakit'] ?>
                </h4>
                <p>Sakit</p>
            </div>
            <div class="stat-box stat-alpha">
                <h4>
                    <?= $stats['alpha'] ?>
                </h4>
                <p>Alpha</p>
            </div>
        </div>

        <div class="summary-info">
            <table>
                <tr>
                    <td>Total Record Tercatat</td>
                    <td>:
                        <?= $total ?> records
                    </td>
                </tr>
                <tr>
                    <td>Persentase Kehadiran</td>
                    <td>:
                        <?= $p_hadir ?>%
                    </td>
                </tr>
            </table>
        </div>

        <table class="data-table">
            <thead>
                <tr>
                    <th width="30">No</th>
                    <th>Nama Siswa</th>
                    <th>Tanggal</th>
                    <th width="80">Jam Masuk</th>
                    <th width="80">Jam Pulang</th>
                    <th width="100">Status</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($list)): ?>
                    <?php foreach ($list as $i => $row): ?>
                        <tr>
                            <td align="center">
                                <?= $i + 1 ?>
                            </td>
                            <td>
                                <strong>
                                    <?= $row['nama_lengkap'] ?>
                                </strong><br>
                                <small>NIS:
                                    <?= $row['nis'] ?>
                                </small>
                            </td>
                            <td>
                                <?= date('d-m-Y', strtotime($row['tanggal'])) ?>
                            </td>
                            <td align="center">
                                <?= ($row['status'] == 'Hadir') ? '08:00' : '-' ?>
                            </td>
                            <td align="center">
                                <?= ($row['status'] == 'Hadir') ? '16:00' : '-' ?>
                            </td>
                            <td>
                                <span class="badge badge-<?= strtolower($row['status']) ?>">
                                    <?= $row['status'] ?>
                                </span>
                            </td>
                            <td>
                                <?= $row['keterangan'] ?: '-' ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" align="center">Belum ada data absensi.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="notes-box">
            <h5>Catatan:</h5>
            <ul>
                <li>HADIR: Siswa datang tepat waktu dan mengikuti kegiatan belajar.</li>
                <li>IZIN: Siswa tidak hadir dengan alasan yang sah dan diketahui orang tua/wali.</li>
                <li>SAKIT: Siswa tidak hadir karena kondisi kesehatan (disertai surat sakit).</li>
                <li>ALPHA: Siswa tidak hadir tanpa keterangan yang jelas kepada pihak sekolah.</li>
            </ul>
        </div>

        <div class="footer-sign">
            <p>Banjarmasin,
                <?= date('d M Y') ?>
            </p>
            <p>Kepala SMA Negeri Banjarmasin</p>
            <div class="sign-space"></div>
            <p class="sign-name">Nama Kepala Sekolah</p>
            <p>NIP. 19xxxxxxxxxxxxxx</p>
        </div>

        <div class="print-footer">
            Dicetak otomatis oleh Sistem Manajemen Sekolah Terpadu - Halaman 1
        </div>
    </div>
</body>

</html>