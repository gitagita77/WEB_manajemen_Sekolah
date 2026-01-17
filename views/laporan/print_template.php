<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>
        <?= $title ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }

        /* Print Styles */
        @media print {
            .no-print {
                display: none !important;
            }

            @page {
                margin: 2cm;
            }
        }

        .header-kop {
            border-bottom: 3px double black;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body class="bg-white">

    <div class="fixed-top p-3 no-print bg-light border-bottom d-flex justify-content-between align-items-center">
        <strong>Mode Cetak Laporan</strong>
        <div>
            <button onclick="window.print()" class="btn btn-primary btn-sm"><i class="bi bi-printer"></i> Cetak / Simpan
                PDF</button>
            <button onclick="window.close()" class="btn btn-secondary btn-sm">Tutup</button>
        </div>
    </div>

    <div class="container mt-5 pt-4">
        <!-- KOP SURAT -->
        <div class="header-kop text-center">
            <h4 class="mb-0 text-uppercase fw-bold">Pemerintah Provinsi Jawa Tengah</h4>
            <h2 class="mb-0 fw-bold">SMA NEGERI CONTOH SYSTEM</h2>
            <p class="mb-0 small">Jl. Pendidikan No. 123, Kota Belajar, Kode Pos 54321</p>
            <p class="mb-0 small">Telp: (021) 1234567 | Email: info@smancontoh.sch.id | Website: www.smancontoh.sch.id
            </p>
        </div>

        <h4 class="text-center fw-bold mb-4 text-uppercase">
            <?= $report_name ?>
        </h4>

        <?php if (!empty($data)): ?>
            <table class="table table-bordered table-striped border-dark align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th width="50">No</th>
                        <?php
                        // Get headers from first row keys
                        $headers = array_keys($data[0]);
                        foreach ($headers as $h):
                            // Beautify header
                            $h_label = ucwords(str_replace('_', ' ', $h));
                            ?>
                            <th>
                                <?= $h_label ?>
                            </th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $i => $row): ?>
                        <tr>
                            <td class="text-center">
                                <?= $i + 1 ?>
                            </td>
                            <?php foreach ($row as $cell): ?>
                                <td>
                                    <?= htmlspecialchars($cell) ?>
                                </td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="mt-5 d-flex justify-content-end">
                <div class="text-center">
                    <p class="mb-5">Kota Belajar,
                        <?= date('d F Y') ?><br>Kepala Sekolah,
                    </p>
                    <br><br>
                    <p class="fw-bold text-decoration-underline mb-0">H. AHMAD STUDI, M.Pd</p>
                    <p>NIP. 19800101 200001 1 001</p>
                </div>
            </div>

        <?php else: ?>
            <div class="alert alert-warning text-center">Data laporan tidak ditemukan atau kosong.</div>
        <?php endif; ?>
    </div>

</body>

</html>