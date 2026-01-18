<?php

class GuruController extends BaseController
{

    public function index()
    {
        $this->checkAuth(['admin', 'guru']); // Admin and Guru can view the list
        $model = $this->model('GuruModel');

        $data = [
            'title' => 'Data Guru',
            'guru' => $model->getAllGuru()
        ];

        $this->view('layouts/header', $data);
        $this->view('layouts/sidebar');
        $this->view('guru/index', $data);
        $this->view('layouts/footer');
    }

    public function create()
    {
        $this->checkAuth(['admin']);
        $data = ['title' => 'Tambah Guru'];

        $this->view('layouts/header', $data);
        $this->view('layouts/sidebar');
        $this->view('guru/create', $data);
        $this->view('layouts/footer');
    }

    public function store()
    {
        $this->checkAuth(['admin']);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $model = $this->model('GuruModel');

            // Basic validation
            if ($_POST['password'] !== $_POST['password_confirm']) {
                echo "<script>alert('Password tidak cocok!'); window.history.back();</script>";
                return;
            }

            $data = [
                'username' => $this->input('username'),
                'password' => $this->input('password'), // Ideally hash this!
                'nama_lengkap' => $this->input('nama_lengkap'),
                'nip' => $this->input('nip'),
                'jenis_kelamin' => $this->input('jenis_kelamin'),
                'no_telepon' => $this->input('no_telepon'),
                'email' => $this->input('email'),
                'alamat' => $this->input('alamat')
            ];

            if ($model->insertGuru($data)) {
                $this->redirect('guru');
            } else {
                echo "<script>alert('Gagal menyimpan data.'); window.history.back();</script>";
            }
        }
    }

    public function edit($id)
    {
        $this->checkAuth(['admin']);
        $model = $this->model('GuruModel');
        $guru = $model->getById($id);

        if (!$guru)
            $this->redirect('guru');

        $data = [
            'title' => 'Edit Guru',
            'guru' => $guru
        ];

        $this->view('layouts/header', $data);
        $this->view('layouts/sidebar');
        $this->view('guru/edit', $data);
        $this->view('layouts/footer');
    }

    public function update($id)
    {
        $this->checkAuth(['admin']);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $model = $this->model('GuruModel');

            $data = [
                'username' => $this->input('username'),
                'password' => $this->input('password'), // If empty, model handles it
                'nama_lengkap' => $this->input('nama_lengkap'),
                'nip' => $this->input('nip'),
                'jenis_kelamin' => $this->input('jenis_kelamin'),
                'no_telepon' => $this->input('no_telepon'),
                'email' => $this->input('email'),
                'alamat' => $this->input('alamat'),
                'status' => $this->input('status')
            ];

            if ($model->updateGuru($id, $data)) {
                $this->redirect('guru');
            } else {
                echo "<script>alert('Gagal update data.'); window.history.back();</script>";
            }
        }
    }

    public function delete($id)
    {
        $this->checkAuth(['admin']);
        $model = $this->model('GuruModel');
        // Soft delete implied by model query, but let's do soft delete update
        $this->db = new Database(); // Direct DB access if needed, or query through model
        $model->query("UPDATE users SET status = 'nonaktif' WHERE id = $id");
        $this->redirect('guru');
    }
}
