<?php

class DashboardController extends BaseController
{

    public function index()
    {
        // Authenticate (Currently Bypassed)
        $this->checkAuth();

        $model = $this->model('DashboardModel');

        $data = [
            'stats' => $model->getStats(),
            'top_prestasi' => $model->getTopPrestasi(10),
            'top_pelanggaran' => $model->getTopPelanggaran(10),
            'title' => 'Dashboard'
        ];

        $this->view('layouts/header', $data);
        $this->view('layouts/sidebar');
        $this->view('dashboard/index', $data);
        $this->view('layouts/footer');
    }
}
