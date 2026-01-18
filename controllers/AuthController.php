<?php

class AuthController extends BaseController
{

    public function login()
    {
        if (isset($_SESSION['user_id']) || isset($_SESSION['siswa_id'])) {
            $this->redirect('dashboard');
        }

        $this->view('auth/login');
    }

    public function authenticate()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $model = $this->model('AuthModel');
            $type = $_POST['login_type']; // 'user' or 'siswa'

            if ($type == 'guru') {
                $username = $_POST['username'];
                $password = $_POST['password'];

                $user = $model->checkUser($username, $password);
                if ($user) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['nama'] = $user['nama_lengkap'];
                    $_SESSION['role'] = $user['role'];
                    $_SESSION['is_logged_in'] = true;
                    $this->redirect('dashboard');
                } else {
                    $this->flash('Username atau Password salah!', 'danger');
                    $this->redirect('auth/login');
                }

            } else if ($type == 'siswa') {
                $nis = $_POST['nis'];
                $nisn = $_POST['nisn'];

                $siswa = $model->checkSiswa($nis, $nisn);
                if ($siswa) {
                    $_SESSION['siswa_id'] = $siswa['id'];
                    $_SESSION['nama'] = $siswa['nama_lengkap'];
                    $_SESSION['role'] = 'siswa';
                    $_SESSION['kelas_id'] = $siswa['kelas_id']; // Useful for filtering
                    $_SESSION['is_logged_in'] = true;
                    $this->redirect('dashboard');
                } else {
                    $this->flash('NIS atau NISN salah!', 'danger');
                    $this->redirect('auth/login');
                }
            }
        }
    }

    public function logout()
    {
        session_destroy();
        $this->redirect('auth/login');
    }

    // Helper for flash messages (simple implementation)
    public function flash($message, $type = 'info')
    {
        $_SESSION['flash'] = [
            'message' => $message,
            'type' => $type
        ];
    }
}
