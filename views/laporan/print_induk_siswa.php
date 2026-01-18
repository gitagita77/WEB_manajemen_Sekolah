<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>
        <?= $title ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            color: #000;
            background-color: #fff;
        }

        @media print {
            .no-print {
                display: none !important;
            }

            @page {
                size: landscape;
                margin: 1cm;
            }

            body {
                margin: 0;
            }
        }

        .header-kop {
            border-bottom: 3px double #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .logo-kiri {
            position: absolute;
            left: 0;
            top: 0;
            width: 80px;
        }

        .kop-text h2 {
            font-size: 24px;
            margin: 0;
            font-weight: bold;
        }

        .kop-text h1 {
            font-size: 28px;
            margin: 5px 0;
            font-weight: bold;
        }

        .kop-text p {
            margin: 0;
            font-size: 14px;
        }

        .report-title {
            text-decoration: underline;
            font-weight: bold;
            font-size: 20px;
            margin-top: 20px;
            margin-bottom: 15px;
        }

        .info-header {
            width: 100%;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .table-laporan {
            width: 100%;
            border-collapse: collapse;
            font-size: 11px;
        }

        .table-laporan th,
        .table-laporan td {
            border: 1px solid #000 !important;
            padding: 5px !important;
            vertical-align: middle;
        }

        .table-laporan th {
            background-color: #f2f2f2 !important;
            font-weight: bold;
            text-align: center;
        }

        .ttd-container {
            margin-top: 40px;
            float: right;
            width: 300px;
            text-align: center;
        }

        .ttd-space {
            height: 80px;
        }

        .nama-kepala {
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: 0;
        }
    </style>
</head>

<body>

    <div class="fixed-top p-3 no-print bg-light border-bottom d-flex justify-content-between align-items-center">
        <strong>Pratinjau Laporan Data Induk Siswa</strong>
        <div>
            <button onclick="window.print()" class="btn btn-primary btn-sm"><i class="bi bi-printer"></i> Cetak / Simpan
                PDF</button>
            <button onclick="window.close()" class="btn btn-secondary btn-sm">Tutup</button>
        </div>
    </div>

    <div class="container-fluid mt-5 pt-4">
        <!-- KOP SURAT -->
        <div class="header-kop">
            <div class=" kop-text text-center">
                <h2>PEMERINTAH KOTA BANJARMASIN</h2>
                <h1>SMA NEGERI BANJARMASIN</h1>
                <p>Jl. Pendidikan No. 123, Kota Banjarmasin, Kode Pos 70121</p>
                <p>Telp: (0511) 1234567 | Email: info@smanbanjarmasin.sch.id | Website: www.smanbanjarmasin.sch.id</p>
            </div>
        </div>

        <div class="text-center">
            <div class="report-title">LAPORAN DATA INDUK SISWA</div>

            <table class="info-header mx-auto" style="width: auto;">
                <tr>
                    <td class="text-start pe-3">Tahun Ajaran</td>
                    <td>:</td>
                    <td class="ps-2 text-start">2025 / 2026</td>
                </tr>
                <tr>
                    <td class="text-start pe-3">Tanggal Cetak</td>
                    <td>:</td>
                    <td class="ps-2 text-start">
                        <?= date('d F Y') ?>
                    </td>
                </tr>
            </table>
        </div>

        <?php if (!empty($data)): ?>
            <table class="table table-laporan">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>NIS</th>
                        <th>NISN</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Agama</th>
                        <th>Alamat</th>
                        <th>RT/RW</th>
                        <th>Kelurahan</th>
                        <th>Kecamatan</th>
                        <th>Kode Pos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $i => $row): ?>
                        <tr>
                            <td class="text-center">
                                <?= $i + 1 ?>
                            </td>
                            <td class="text-center">
                                <?= $row['id'] ?>
                            </td>
                            <td class="text-center">
                                <?= $row['nis'] ?>
                            </td>
                            <td class="text-center">
                                <?= $row['nisn'] ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($row['nama_lengkap']) ?>
                            </td>
                            <td class="text-center">
                                <?= ($row['jenis_kelamin'] == 'L') ? 'Laki-laki' : 'Perempuan' ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($row['tempat_lahir']) ?>
                            </td>
                            <td class="text-center">
                                <?= date('d F Y', strtotime($row['tanggal_lahir'])) ?>
                            </td>
                            <td class="text-center">
                                <?= htmlspecialchars($row['agama']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($row['alamat']) ?>
                            </td>
                            <td class="text-center">
                                <?= htmlspecialchars($row['rt_rw']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($row['kelurahan']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($row['kecamatan']) ?>
                            </td>
                            <td class="text-center">
                                <?= htmlspecialchars($row['kode_pos']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="clearfix">
                <div class="ttd-container">
                    <p>Mengetahui,<br>Kepala SMA Negeri Banjarmasin</p>
                    <div class="ttd-space"></div>
                    <p class="nama-kepala">Nama Kepala Sekolah</p>
                    <p>NIP. 19xxxxxxxxxxxxxx</p>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-warning text-center">Data siswa tidak tersedia.</div>
        <?php endif; ?>
    </div>

</body>

</html>