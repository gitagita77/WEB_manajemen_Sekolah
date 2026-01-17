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
        // BYPASS AUTHENTICATION AS REQUESTED
        return true;

        /* 
        // Original Auth Logic
        if (!isset($_SESSION['user_id'])) {
            $this->redirect('auth/login');
            return false;
        }

        if ($role && $_SESSION['role'] != $role && $_SESSION['role'] != 'admin') {
            // Admin usually has access to everything, or strictly check role
            // If user role doesn't match and not admin, redirect
             echo "Access Denied";
             exit;
        }
        return true;
        */
    }

    public function input($key)
    {
        return isset($_POST[$key]) ? trim($_POST[$key]) : null;
    }
}
