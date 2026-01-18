<?php

class MapelController extends BaseController
{

    public function index()
    {
        $this->checkAuth(['admin']); // Usually admin manage subjects
        $model = $this->model('MapelModel');

        $data = [
            'title' => 'Mata Pelajaran',
            'mapel' => $model->getAllMapel()
        ];

        $this->view('layouts/header', $data);
        $this->view('layouts/sidebar');
        $this->view('mapel/index', $data);
        $this->view('layouts/footer');
    }

    public function create()
    {
        $this->checkAuth(['admin']);
        $guruModel = $this->model('GuruModel');
        $kelasModel = $this->model('KelasModel');

        $data = [
            'title' => 'Tambah Mata Pelajaran',
            'guru_list' => $guruModel->getAllGuru(),
            'kelas_list' => $kelasModel->getAllKelas()
        ];

        $this->view('layouts/header', $data);
        $this->view('layouts/sidebar');
        $this->view('mapel/create', $data);
        $this->view('layouts/footer');
    }

    public function store()
    {
        $this->checkAuth(['admin']);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $model = $this->model('MapelModel');

            $data = [
                'kode_mapel' => $this->input('kode_mapel'),
                'nama_mapel' => $this->input('nama_mapel'),
                'kategori' => $this->input('kategori'),
                'tingkat' => $this->input('tingkat'),
                'jurusan' => $this->input('jurusan'),
                'guru_id' => !empty($this->input('guru_id')) ? $this->input('guru_id') : null,
                'kelas_id' => !empty($this->input('kelas_id')) ? $this->input('kelas_id') : null,
                'semester' => $this->input('semester'),
                'tahun_ajaran' => $this->input('tahun_ajaran'),
                'jam_per_minggu' => $this->input('jam_per_minggu'),
                'deskripsi' => $this->input('deskripsi')
            ];

            if ($model->insertMapel($data)) {
                $this->redirect('mapel');
            } else {
                echo "<script>alert('Gagal menyimpan data.'); window.history.back();</script>";
            }
        }
    }

    public function edit($id)
    {
        $this->checkAuth(['admin']);
        $model = $this->model('MapelModel');
        $mapel = $model->getById($id);

        if (!$mapel)
            $this->redirect('mapel');

        $guruModel = $this->model('GuruModel'); // Reuse models

        // Quick hack: getting classes via raw query if model method not perfect or just new up KelasModel
        $kelasModel = $this->model('KelasModel');

        $data = [
            'title' => 'Edit Mata Pelajaran',
            'mapel' => $mapel,
            'guru_list' => $guruModel->getAllGuru(),
            'kelas_list' => $kelasModel->getAllKelas()
        ];

        $this->view('layouts/header', $data);
        $this->view('layouts/sidebar');
        $this->view('mapel/edit', $data);
        $this->view('layouts/footer');
    }

    public function update($id)
    {
        $this->checkAuth(['admin']);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $model = $this->model('MapelModel');

            $data = [
                'kode_mapel' => $this->input('kode_mapel'),
                'nama_mapel' => $this->input('nama_mapel'),
                'kategori' => $this->input('kategori'),
                'tingkat' => $this->input('tingkat'),
                'jurusan' => $this->input('jurusan'),
                'guru_id' => !empty($this->input('guru_id')) ? $this->input('guru_id') : null,
                'kelas_id' => !empty($this->input('kelas_id')) ? $this->input('kelas_id') : null,
                'semester' => $this->input('semester'),
                'tahun_ajaran' => $this->input('tahun_ajaran'),
                'jam_per_minggu' => $this->input('jam_per_minggu'),
                'deskripsi' => $this->input('deskripsi')
            ];

            if ($model->updateMapel($id, $data)) {
                $this->redirect('mapel');
            } else {
                echo "<script>alert('Gagal update data.'); window.history.back();</script>";
            }
        }
    }

    public function delete($id)
    {
        $this->checkAuth(['admin']);
        $model = $this->model('MapelModel');
        $model->query("UPDATE mata_pelajaran SET status='nonaktif' WHERE id=$id");
        $this->redirect('mapel');
    }
}
