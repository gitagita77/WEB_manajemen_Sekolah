<?php

class SiswaController extends BaseController
{

    public function index()
    {
        $this->checkAuth();
        $model = $this->model('SiswaModel');

        $data = [
            'title' => 'Data Siswa',
            'siswa' => $model->getAllSiswa()
        ];

        $this->view('layouts/header', $data);
        $this->view('layouts/sidebar');
        $this->view('siswa/index', $data);
        $this->view('layouts/footer');
    }

    public function create()
    {
        $this->checkAuth();
        // Need list of classes for dropdown
        $kelasModel = $this->model('BaseModel'); // Or specific KelasModel
        // Hack: using direct query wrapper if BaseModel supports it or I just make a KelasModel.
        // Let's use a quick query via the SiswaModel for convenience or create KelasModel later.
        // For now, I'll assume SiswaModel has a getKelasList method.
        $model = $this->model('SiswaModel');

        $data = [
            'title' => 'Tambah Siswa',
            'kelas_list' => $model->getKelasList()
        ];

        $this->view('layouts/header', $data);
        $this->view('layouts/sidebar');
        $this->view('siswa/create', $data);
        $this->view('layouts/footer');
    }

    public function store()
    {
        $this->checkAuth();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $model = $this->model('SiswaModel');

            // Collect data
            $data = [
                'nis' => $this->input('nis'),
                'nisn' => $this->input('nisn'),
                'nama_lengkap' => $this->input('nama_lengkap'),
                'jenis_kelamin' => $this->input('jenis_kelamin'),
                'kelas_id' => $this->input('kelas_id'),
                'tempat_lahir' => $this->input('tempat_lahir'),
                'tanggal_lahir' => $this->input('tanggal_lahir'),
                'alamat' => $this->input('alamat')
            ];

            // Basic validation
            if (empty($data['nis']) || empty($data['nama_lengkap'])) {
                // Return error (simplified)
                echo "<script>alert('Data tidak lengkap!'); window.history.back();</script>";
                return;
            }

            if ($model->insertSiswa($data)) {
                $this->redirect('siswa');
            } else {
                echo "<script>alert('Gagal menyimpan data.'); window.history.back();</script>";
            }
        }
    }

    public function edit($id)
    {
        $this->checkAuth();
        $model = $this->model('SiswaModel');

        $siswa = $model->getById($id);
        if (!$siswa) {
            $this->redirect('siswa');
        }

        $data = [
            'title' => 'Edit Siswa',
            'siswa' => $siswa,
            'kelas_list' => $model->getKelasList()
        ];

        $this->view('layouts/header', $data);
        $this->view('layouts/sidebar');
        $this->view('siswa/edit', $data);
        $this->view('layouts/footer');
    }

    public function update($id)
    {
        $this->checkAuth();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $model = $this->model('SiswaModel');

            $data = [
                'nis' => $this->input('nis'),
                'nisn' => $this->input('nisn'),
                'nama_lengkap' => $this->input('nama_lengkap'),
                'jenis_kelamin' => $this->input('jenis_kelamin'),
                'kelas_id' => $this->input('kelas_id'),
                'tempat_lahir' => $this->input('tempat_lahir'),
                'tanggal_lahir' => $this->input('tanggal_lahir'),
                'alamat' => $this->input('alamat')
            ];

            if ($model->updateSiswa($id, $data)) {
                $this->redirect('siswa');
            } else {
                echo "<script>alert('Gagal update data.'); window.history.back();</script>";
            }
        }
    }

    public function delete($id)
    {
        $this->checkAuth();
        $model = $this->model('SiswaModel');
        // Soft delete logic? Table has 'status'. The prompt says "Soft delete jika tabel memiliki is_active/deleted_at".
        // Table `siswa` has `status` ENUM('aktif','alumni', etc).
        // I will update status to 'keluar' or similar, or just DELETE if strict CRUD.
        // SQL says "status ENUM('aktif','alumni','pindah','keluar','dropout')".
        // I'll set it to 'keluar'.

        $model->updateStatus($id, 'keluar');
        $this->redirect('siswa');
    }
}
