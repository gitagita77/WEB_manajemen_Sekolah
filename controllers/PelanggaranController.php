<?php

class PelanggaranController extends BaseController
{

    public function index()
    {
        $this->checkAuth(['admin', 'guru', 'siswa']);
        $model = $this->model('PelanggaranModel');

        $data = [
            'title' => 'Pelanggaran Siswa',
            'pelanggaran' => $model->getAllPelanggaran()
        ];

        $this->view('layouts/header', $data);
        $this->view('layouts/sidebar');
        $this->view('pelanggaran/index', $data);
        $this->view('layouts/footer');
    }

    public function create()
    {
        $this->checkAuth(['admin', 'guru']);
        $siswaModel = $this->model('SiswaModel');
        $pelanggaranModel = $this->model('PelanggaranModel');

        $data = [
            'title' => 'Tambah Pelanggaran',
            'siswa_list' => $siswaModel->getAllSiswa(),
            'preset' => $pelanggaranModel->getPresetPelanggaran()
        ];

        $this->view('layouts/header', $data);
        $this->view('layouts/sidebar');
        $this->view('pelanggaran/create', $data);
        $this->view('layouts/footer');
    }

    public function store()
    {
        $this->checkAuth(['admin', 'guru']);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $model = $this->model('PelanggaranModel');

            $data = [
                'siswa_id' => $this->input('siswa_id'),
                'tanggal' => $this->input('tanggal'),
                'pelanggaran' => $this->input('pelanggaran'),
                'kategori' => $this->input('kategori'),
                'poin' => $this->input('poin'),
                'sanksi' => $this->input('sanksi'),
                'keterangan' => $this->input('keterangan')
            ];

            if ($model->insertPelanggaran($data)) {
                $this->redirect('pelanggaran');
            } else {
                echo "<script>alert('Gagal menyimpan.'); window.history.back();</script>";
            }
        }
    }

    public function delete($id)
    {
        $this->checkAuth(['admin']);
        $model = $this->model('PelanggaranModel');
        $model->deletePelanggaran($id);
        $this->redirect('pelanggaran');
    }
}
