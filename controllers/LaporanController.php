<?php

class LaporanController extends BaseController
{

    public function index()
    {
        $this->checkAuth();

        $data = [
            'title' => 'Pusat Laporan',
            'reports' => $this->getReportList()
        ];

        $this->view('layouts/header', $data);
        $this->view('layouts/sidebar');
        $this->view('laporan/index', $data);
        $this->view('layouts/footer');
    }

    public function view_report()
    {
        $this->checkAuth();
        $code = isset($_GET['code']) ? $_GET['code'] : '';

        $model = $this->model('LaporanModel');
        $reportData = $model->getReportData($code); // Handles logic for all 20 reports

        // Render print view
        $data = [
            'title' => 'Laporan - ' . $code,
            'report_name' => $this->getReportName($code),
            'data' => $reportData,
            'code' => $code
        ];

        $this->view('laporan/print_template', $data);
    }

    private function getReportList()
    {
        return [
            ['code' => 'SISWA_ALL', 'name' => 'Data Seluruh Siswa', 'category' => 'Master'],
            ['code' => 'SISWA_PER_KELAS', 'name' => 'Data Siswa Per Kelas', 'category' => 'Master'],
            ['code' => 'GURU_ALL', 'name' => 'Data Guru Lengkap', 'category' => 'Master'],
            ['code' => 'KELAS_ALL', 'name' => 'Daftar Kelas & Wali Kelas', 'category' => 'Master'],
            ['code' => 'MAPEL_ALL', 'name' => 'Daftar Mata Pelajaran', 'category' => 'Master'],

            ['code' => 'JADWAL_SEKOLAH', 'name' => 'Jadwal Pelajaran Sekolah', 'category' => 'Akademik'],
            ['code' => 'ABSENSI_HARIAN', 'name' => 'Laporan Absensi Harian', 'category' => 'Akademik'],
            ['code' => 'ABSENSI_BULANAN', 'name' => 'Rekap Absensi Bulanan', 'category' => 'Akademik'],
            ['code' => 'ABSENSI_GURU', 'name' => 'Kehadiran Guru', 'category' => 'Akademik'],

            ['code' => 'RANKING_PRESTASI', 'name' => 'Top 50 Siswa Berprestasi', 'category' => 'Kesiswaan'],
            ['code' => 'RANKING_PELANGGARAN', 'name' => 'Top 50 Poin Pelanggaran', 'category' => 'Kesiswaan'],
            ['code' => 'DETAIL_PRESTASI', 'name' => 'Detail Riwayat Prestasi', 'category' => 'Kesiswaan'],
            ['code' => 'DETAIL_PELANGGARAN', 'name' => 'Detail Riwayat Pelanggaran', 'category' => 'Kesiswaan'],
            ['code' => 'SISWA_WARNING', 'name' => 'Siswa Dalam Pengawasan (Poin > 50)', 'category' => 'Kesiswaan'],

            ['code' => 'STAT_GENDER', 'name' => 'Statistik Siswa per Gender', 'category' => 'Statistik'],
            ['code' => 'STAT_POIN_KELAS', 'name' => 'Rata-rata Poin Per Kelas', 'category' => 'Statistik'],

            ['code' => 'LOG_AKTIVITAS', 'name' => 'Log Aktivitas Sistem', 'category' => 'System'],
            ['code' => 'DAFTAR_ALUMNI', 'name' => 'Daftar Alumni', 'category' => 'Master'],
            ['code' => 'SURAT_PERINGATAN', 'name' => 'Draft Surat Peringatan', 'category' => 'Administrasi'],
            ['code' => 'KARTU_POIN', 'name' => 'Kartu Poin Siswa', 'category' => 'Administrasi'],
        ];
    }

    private function getReportName($code)
    {
        foreach ($this->getReportList() as $rep) {
            if ($rep['code'] == $code)
                return $rep['name'];
        }
        return 'Laporan';
    }
}
