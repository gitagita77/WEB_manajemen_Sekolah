<?php

class JadwalController extends BaseController
{

    public function index()
    {
        $this->checkAuth(['admin', 'guru', 'siswa']);
        $model = $this->model('JadwalModel');
        $kelasModel = $this->model('KelasModel');

        $kelas_id = null;
        if (isset($_GET['kelas_id']) && !empty($_GET['kelas_id'])) {
            $kelas_id = $_GET['kelas_id'];
        } else if ($_SESSION['role'] == 'siswa' && isset($_SESSION['kelas_id'])) {
            $kelas_id = $_SESSION['kelas_id'];
        }

        $data = [
            'title' => 'Jadwal Pelajaran',
            'jadwal' => $model->getAllJadwal($kelas_id),
            'kelas_list' => $kelasModel->getAllKelas(),
            'selected_kelas' => $kelas_id
        ];

        $this->view('layouts/header', $data);
        $this->view('layouts/sidebar');
        $this->view('jadwal/index', $data);
        $this->view('layouts/footer');
    }

    public function create()
    {
        $this->checkAuth(['admin']);
        $mapelModel = $this->model('MapelModel');
        $kelasModel = $this->model('KelasModel');
        $guruModel = $this->model('GuruModel');

        $data = [
            'title' => 'Tambah Jadwal',
            'mapel_list' => $mapelModel->getAllMapel(),
            'kelas_list' => $kelasModel->getAllKelas(),
            'guru_list' => $guruModel->getAllGuru()
        ];

        $this->view('layouts/header', $data);
        $this->view('layouts/sidebar');
        $this->view('jadwal/create', $data);
        $this->view('layouts/footer');
    }

    public function store()
    {
        $this->checkAuth(['admin']);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $model = $this->model('JadwalModel');

            $data = [
                'hari' => $this->input('hari'),
                'sesi' => $this->input('sesi'),
                'mapel_id' => $this->input('mapel_id'),
                'kelas_id' => $this->input('kelas_id'),
                'guru_id' => $this->input('guru_id'), // Normally auto-filled from mapel, but editable
                'ruangan' => $this->input('ruangan'),
                'tahun_ajaran' => $this->input('tahun_ajaran'),
                'semester' => $this->input('semester')
            ];

            if ($model->insertJadwal($data)) {
                $this->redirect('jadwal');
            } else {
                echo "<script>alert('Gagal menyimpan data.'); window.history.back();</script>";
            }
        }
    }

    public function edit($id)
    {
        $this->checkAuth(['admin']);
        $model = $this->model('JadwalModel');
        $jadwal = $model->getById($id);

        if (!$jadwal)
            $this->redirect('jadwal');

        // Load dependencies
        $mapelModel = $this->model('MapelModel');
        $kelasModel = $this->model('KelasModel');
        $guruModel = $this->model('GuruModel');

        $data = [
            'title' => 'Edit Jadwal',
            'jadwal' => $jadwal,
            'mapel_list' => $mapelModel->getAllMapel(),
            'kelas_list' => $kelasModel->getAllKelas(),
            'guru_list' => $guruModel->getAllGuru()
        ];

        $this->view('layouts/header', $data);
        $this->view('layouts/sidebar');
        $this->view('jadwal/edit', $data);
        $this->view('layouts/footer');
    }

    public function update($id)
    {
        $this->checkAuth(['admin']);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $model = $this->model('JadwalModel');

            $data = [
                'hari' => $this->input('hari'),
                'sesi' => $this->input('sesi'),
                'mapel_id' => $this->input('mapel_id'),
                'kelas_id' => $this->input('kelas_id'),
                'guru_id' => $this->input('guru_id'),
                'ruangan' => $this->input('ruangan'),
                'tahun_ajaran' => $this->input('tahun_ajaran'),
                'semester' => $this->input('semester')
            ];

            if ($model->updateJadwal($id, $data)) {
                $this->redirect('jadwal');
            } else {
                echo "<script>alert('Gagal update data.'); window.history.back();</script>";
            }
        }
    }

    public function delete($id)
    {
        $this->checkAuth(['admin']);
        $model = $this->model('JadwalModel');
        $model->delete($id); // Hard delete for schedule usually fine, or status update
        $this->redirect('jadwal');
    }
}
