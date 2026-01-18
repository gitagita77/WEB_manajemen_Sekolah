<?php

class BaseController
{
    public function __construct()
    {
        // Start session if not already started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function view($view, $data = [])
    {
        // Extract data keys to variables
        extract($data);

        $viewFile = __DIR__ . '/../views/' . $view . '.php';
        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            die("View file $view does not exist.");
        }
    }

    public function model($model)
    {
        require_once __DIR__ . '/../models/' . $model . '.php';
        return new $model();
    }

    public function redirect($url)
    {
        header("Location: " . BASE_URL . $url);
        exit;
    }

    // Authentication Check
    public function checkAuth($role = null)
    {
        if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
            $this->redirect('auth/login');
            return false;
        }

        if ($role) {
            // If user has a role session (admin/guru/siswa) check it
            $currentRole = isset($_SESSION['role']) ? $_SESSION['role'] : '';

            // If role is array, check if current role is in array
            if (is_array($role)) {
                if (!in_array($currentRole, $role) && $currentRole != 'admin') {
                    // Redirect to unauthorized or dashboard
                    echo "Access Denied";
                    exit;
                }
            } else {
                if ($currentRole != $role && $currentRole != 'admin') {
                    echo "Access Denied";
                    exit;
                }
            }
        }
        return true;
    }

    public function input($key)
    {
        return isset($_POST[$key]) ? trim($_POST[$key]) : null;
    }
}
