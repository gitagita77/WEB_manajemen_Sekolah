<?php

class KelasController extends BaseController
{

    public function index()
    {
        $this->checkAuth(['admin', 'guru']);
        $model = $this->model('KelasModel');

        $data = [
            'title' => 'Data Kelas',
            'kelas' => $model->getAllKelas()
        ];

        $this->view('layouts/header', $data);
        $this->view('layouts/sidebar');
        $this->view('kelas/index', $data);
        $this->view('layouts/footer');
    }

    public function create()
    {
        $this->checkAuth(['admin']); // Only admin creates classes
        $model = $this->model('KelasModel');
        $data = [
            'title' => 'Tambah Kelas',
            'guru_list' => $model->getGuruList()
        ];

        $this->view('layouts/header', $data);
        $this->view('layouts/sidebar');
        $this->view('kelas/create', $data);
        $this->view('layouts/footer');
    }

    public function store()
    {
        $this->checkAuth(['admin']);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $model = $this->model('KelasModel');

            $data = [
                'kode_kelas' => $this->input('kode_kelas'),
                'nama_kelas' => $this->input('nama_kelas'),
                'tingkat' => $this->input('tingkat'),
                'jurusan' => $this->input('jurusan'),
                'wali_kelas_id' => !empty($this->input('wali_kelas_id')) ? $this->input('wali_kelas_id') : null,
                'kapasitas' => $this->input('kapasitas'),
                'tahun_ajaran' => $this->input('tahun_ajaran')
            ];

            if ($model->insertKelas($data)) {
                $this->redirect('kelas');
            } else {
                echo "<script>alert('Gagal menyimpan data.'); window.history.back();</script>";
            }
        }
    }

    public function edit($id)
    {
        $this->checkAuth(['admin']);
        $model = $this->model('KelasModel');
        $kelas = $model->getById($id);

        if (!$kelas)
            $this->redirect('kelas');

        $data = [
            'title' => 'Edit Kelas',
            'kelas' => $kelas,
            'guru_list' => $model->getGuruList()
        ];

        $this->view('layouts/header', $data);
        $this->view('layouts/sidebar');
        $this->view('kelas/edit', $data);
        $this->view('layouts/footer');
    }

    public function update($id)
    {
        $this->checkAuth(['admin']);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $model = $this->model('KelasModel');

            $data = [
                'kode_kelas' => $this->input('kode_kelas'),
                'nama_kelas' => $this->input('nama_kelas'),
                'tingkat' => $this->input('tingkat'),
                'jurusan' => $this->input('jurusan'),
                'wali_kelas_id' => !empty($this->input('wali_kelas_id')) ? $this->input('wali_kelas_id') : null,
                'kapasitas' => $this->input('kapasitas'),
                'tahun_ajaran' => $this->input('tahun_ajaran')
            ];

            if ($model->updateKelas($id, $data)) {
                $this->redirect('kelas');
            } else {
                echo "<script>alert('Gagal update data.'); window.history.back();</script>";
            }
        }
    }

    public function delete($id)
    {
        $this->checkAuth(['admin']);
        $model = $this->model('KelasModel');
        // Soft delete
        $model->query("UPDATE kelas SET status='nonaktif' WHERE id=$id");
        $this->redirect('kelas');
    }
}
