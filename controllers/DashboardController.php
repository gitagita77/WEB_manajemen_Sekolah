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
            'absensi_today' => $model->getAbsensiToday(),
            'student_per_class' => $model->getStudentPerClass(),
            'attendance_trend' => $model->getAttendanceTrend(),
            'gender_stats' => $model->getGenderStats(),
            'upcoming_schedule' => $model->getUpcomingSchedule(5),
            'recent_activities' => $model->getRecentActivities(10),
            'title' => 'Dashboard'
        ];

        $this->view('layouts/header', $data);
        $this->view('layouts/sidebar');
        $this->view('dashboard/index', $data);
        $this->view('layouts/footer');
    }
}
