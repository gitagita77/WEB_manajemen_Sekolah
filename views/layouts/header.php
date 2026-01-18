<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'Manajemen Sekolah' ?></title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables -->
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <style>
        :root {
            --primary-color: #4361ee;
            --primary-light: #eef2ff;
            --secondary-color: #3f37c9;
            --success-color: #10b981;
            --danger-color: #ef4444;
            --warning-color: #f59e0b;
            --info-color: #3b82f6;
            --sidebar-width: 280px;
            --bg-body: #f8fafc;
            --card-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.04), 0 4px 6px -2px rgba(0, 0, 0, 0.02);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-body);
            color: #1e293b;
        }

        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: #fff;
            box-shadow: 4px 0 24px rgba(0, 0, 0, 0.03);
            padding: 24px;
            z-index: 1000;
            overflow-y: auto;
            border-right: 1px solid #f1f5f9;
        }

        .main-content {
            margin-left: var(--sidebar-width);
            padding: 40px;
        }

        .card {
            border: 1px solid #f1f5f9;
            border-radius: 16px;
            box-shadow: var(--card-shadow);
            transition: transform 0.2s, box-shadow 0.2s;
            background: #fff;
        }

        .card:hover {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05), 0 10px 10px -5px rgba(0, 0, 0, 0.02);
        }

        .stat-card {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
        }

        /* Nav links Enhancement */
        .nav-link {
            color: #64748b;
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            font-weight: 500;
            transition: all 0.2s;
        }

        .nav-link i {
            margin-right: 14px;
            font-size: 1.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            background: #f8fafc;
            border-radius: 10px;
            transition: all 0.2s;
        }

        .nav-link:hover {
            color: var(--primary-color);
            background-color: var(--primary-light);
        }

        .nav-link:hover i {
            background: #fff;
            color: var(--primary-color);
        }

        .nav-link.active {
            background-color: var(--primary-color);
            color: #fff;
            box-shadow: 0 10px 15px -3px rgba(67, 97, 238, 0.3);
        }

        .nav-link.active i {
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
        }

        /* Table Header - Premium Look */
        .table:not(.calendar-table) thead th {
            border: none;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            text-transform: uppercase;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            padding: 16px 20px;
            vertical-align: middle;
        }

        .table-red-head thead th {
            background: linear-gradient(135deg, #f43f5e, #e11d48) !important;
        }

        .table-blue-head thead th {
            background: linear-gradient(135deg, #3b82f6, #2563eb) !important;
        }

        .table:not(.calendar-table) thead th:first-child {
            border-top-left-radius: 12px;
        }

        .table:not(.calendar-table) thead th:last-child {
            border-top-right-radius: 12px;
        }

        /* Search & Length Inputs */
        .dataTables_filter input,
        .dataTables_length select {
            border: 2px solid #eef2ff !important;
            border-radius: 10px !important;
            padding: 8px 12px !important;
            transition: all 0.2s;
        }

        .dataTables_filter input:focus,
        .dataTables_length select:focus {
            border-color: var(--primary-color) !important;
            box-shadow: 0 0 0 4px rgba(67, 97, 238, 0.1) !important;
            outline: none;
        }

        .table:not(.calendar-table) tbody tr {
            background-color: #fff;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
            transition: all 0.2s;
        }

        .table:not(.calendar-table) tbody tr:hover {
            transform: scale(1.005);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            background-color: #fcfdfe !important;
        }

        .table:not(.calendar-table) tbody td {
            padding: 16px 20px;
            border-top: 1px solid #f1f5f9;
            border-bottom: 1px solid #f1f5f9;
        }

        .table:not(.calendar-table) tbody td:first-child {
            border-left: 1px solid #f1f5f9;
            border-top-left-radius: 12px;
            border-bottom-left-radius: 12px;
        }

        .table:not(.calendar-table) tbody td:last-child {
            border-right: 1px solid #f1f5f9;
            border-top-right-radius: 12px;
            border-bottom-right-radius: 12px;
        }

        /* Badges */
        .badge {
            padding: 6px 12px;
            font-weight: 600;
            border-radius: 8px;
        }

        /* Buttons Enhancement */
        .btn {
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.2s;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border: none;
            box-shadow: 0 4px 6px -1px rgba(67, 97, 238, 0.2);
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(67, 97, 238, 0.3);
        }

        /* Icon Colors - More Vibrancy */
        .icon-dashboard {
            color: #3b82f6;
            background: #eff6ff !important;
        }

        .icon-master {
            color: #10b981;
            background: #ecfdf5 !important;
        }

        .icon-akademik {
            color: #8b5cf6;
            background: #f5f3ff !important;
        }

        .icon-poin {
            color: #f59e0b;
            background: #fffbeb !important;
        }

        .icon-laporan {
            color: #f43f5e;
            background: #fff1f2 !important;
        }

        .icon-system {
            color: #64748b;
            background: #f8fafc !important;
        }

        .nav-link:hover .icon-dashboard {
            background: #3b82f6 !important;
            color: #fff !important;
        }

        .nav-link:hover .icon-master {
            background: #10b981 !important;
            color: #fff !important;
        }

        .nav-link:hover .icon-akademik {
            background: #8b5cf6 !important;
            color: #fff !important;
        }

        .nav-link:hover .icon-poin {
            background: #f59e0b !important;
            color: #fff !important;
        }

        .nav-link:hover .icon-laporan {
            background: #f43f5e !important;
            color: #fff !important;
        }

        .nav-link:hover .icon-system {
            background: #64748b !important;
            color: #fff !important;
        }

        .nav-link.active.bg-dashboard {
            background-color: #3b82f6;
            box-shadow: 0 10px 15px -3px rgba(59, 130, 246, 0.3);
        }

        .nav-link.active.bg-master {
            background-color: #10b981;
            box-shadow: 0 10px 15px -3px rgba(16, 185, 129, 0.3);
        }

        .nav-link.active.bg-akademik {
            background-color: #8b5cf6;
            box-shadow: 0 10px 15px -3px rgba(139, 92, 246, 0.3);
        }

        .nav-link.active.bg-laporan {
            background-color: #f43f5e;
            box-shadow: 0 10px 15px -3px rgba(244, 63, 94, 0.3);
        }

        /* More colorful card variants */
        .card-grad-blue {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: white;
            border: none;
        }

        .card-grad-emerald {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            border: none;
        }

        .card-grad-indigo {
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            color: white;
            border: none;
        }

        .card-grad-amber {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: white;
            border: none;
        }

        .card-grad-rose {
            background: linear-gradient(135deg, #f43f5e, #e11d48);
            color: white;
            border: none;
        }

        .card-grad-violet {
            background: linear-gradient(135deg, #8b5cf6, #7c3aed);
            color: white;
            border: none;
        }

        /* Table Enhancements */
        .table-primary-row {
            border-left: 4px solid #3b82f6;
        }

        .table-success-row {
            border-left: 4px solid #10b981;
        }

        .table-warning-row {
            border-left: 4px solid #f59e0b;
        }

        .table-danger-row {
            border-left: 4px solid #f43f5e;
        }
    </style>
</head>

<body>