<?php

class PrestasiController extends BaseController
{

    public function index()
    {
        $this->checkAuth(['admin', 'guru', 'siswa']);
        $model = $this->model('PrestasiModel');

        $data = [
            'title' => 'Prestasi Siswa',
            'prestasi' => $model->getAllPrestasi()
        ];

        $this->view('layouts/header', $data);
        $this->view('layouts/sidebar');
        $this->view('prestasi/index', $data);
        $this->view('layouts/footer');
    }

    public function create()
    {
        $this->checkAuth(['admin', 'guru']);
        $siswaModel = $this->model('SiswaModel');

        $data = [
            'title' => 'Tambah Prestasi',
            'siswa_list' => $siswaModel->getAllSiswa() // Helper needed in SiswaModel
        ];

        $this->view('layouts/header', $data);
        $this->view('layouts/sidebar');
        $this->view('prestasi/create', $data);
        $this->view('layouts/footer');
    }

    public function store()
    {
        $this->checkAuth(['admin', 'guru']);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $model = $this->model('PrestasiModel');

            $data = [
                'siswa_id' => $this->input('siswa_id'),
                'tanggal' => $this->input('tanggal'),
                'prestasi' => $this->input('prestasi'),
                'poin' => $this->input('poin'),
                'keterangan' => $this->input('keterangan')
            ];

            if ($model->insertPrestasi($data)) {
                $this->redirect('prestasi');
            } else {
                echo "<script>alert('Gagal menyimpan.'); window.history.back();</script>";
            }
        }
    }

    public function delete($id)
    {
        $this->checkAuth(['admin']);
        $model = $this->model('PrestasiModel');
        $model->deletePrestasi($id);
        $this->redirect('prestasi');
    }
}
