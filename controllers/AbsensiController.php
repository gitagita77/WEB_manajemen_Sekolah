<?php

class AbsensiController extends BaseController
{

    public function index()
    {
        $this->checkAuth(['admin', 'guru', 'siswa']);
        $kelasModel = $this->model('KelasModel');
        $absensiModel = $this->model('AbsensiModel');

        // Defaults
        $tanggal = isset($_GET['tanggal']) ? $_GET['tanggal'] : date('Y-m-d');
        $kelas_id = isset($_GET['kelas_id']) ? $_GET['kelas_id'] : '';

        // If Role is Siswa, force show their own data? 
        // Or if Siswa, show generic list of their class is fine usually, but personal history is better.
        // Let's stick to Class View for Admin/Guru.

        if ($_SESSION['role'] == 'guru') {
            // Maybe default to a class they manage? For now just pick first or let them choose.
        }

        $attendance_data = [];
        if ($kelas_id) {
            $attendance_data = $absensiModel->getAbsensiByKelasTanggal($kelas_id, $tanggal);
        }

        $data = [
            'title' => 'Absensi Harian',
            'kelas_list' => $kelasModel->getAllKelas(),
            'attendance_data' => $attendance_data,
            'selected_kelas' => $kelas_id,
            'selected_tanggal' => $tanggal
        ];

        $this->view('layouts/header', $data);
        $this->view('layouts/sidebar');
        $this->view('absensi/index', $data);
        $this->view('layouts/footer');
    }

    // Form to Input/Edit Absensi
    public function inputForm()
    {
        $this->checkAuth(['admin', 'guru']);
        $kelasModel = $this->model('KelasModel');
        $absensiModel = $this->model('AbsensiModel');

        $tanggal = isset($_GET['tanggal']) ? $_GET['tanggal'] : date('Y-m-d');
        $kelas_id = isset($_GET['kelas_id']) ? $_GET['kelas_id'] : '';

        $attendance_data = [];
        if ($kelas_id) {
            $attendance_data = $absensiModel->getAbsensiByKelasTanggal($kelas_id, $tanggal);
        }

        $data = [
            'title' => 'Input Absensi',
            'kelas_list' => $kelasModel->getAllKelas(),
            'attendance_data' => $attendance_data,
            'selected_kelas' => $kelas_id,
            'selected_tanggal' => $tanggal
        ];

        $this->view('layouts/header', $data);
        $this->view('layouts/sidebar');
        $this->view('absensi/input', $data);
        $this->view('layouts/footer');
    }

    public function store()
    {
        $this->checkAuth(['admin', 'guru']);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $absensiModel = $this->model('AbsensiModel');

            $kelas_id = $_POST['kelas_id'];
            $tanggal = $_POST['tanggal'];
            $status = $_POST['status']; // Array [siswa_id => status]
            $keterangan = $_POST['keterangan']; // Array [siswa_id => ket]

            foreach ($status as $siswa_id => $st) {
                $ket = isset($keterangan[$siswa_id]) ? $keterangan[$siswa_id] : '';
                $absensiModel->upsertAbsensi($siswa_id, $tanggal, $st, $ket);
            }

            // Redirect back to input or index
            echo "<script>alert('Absensi berhasil disimpan!'); window.location.href='" . BASE_URL . "absensi/inputForm?kelas_id=$kelas_id&tanggal=$tanggal';</script>";
        }
    }
}
