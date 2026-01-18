<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Manajemen Sekolah</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #4361ee 0%, #3f37c9 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 100%;
            max-width: 450px;
        }

        .card-header {
            background: #fff;
            border-bottom: 1px solid #eee;
            padding: 20px;
            text-align: center;
        }

        .nav-tabs .nav-link {
            color: #6c757d;
            border: none;
            border-bottom: 2px solid transparent;
            padding: 10px 20px;
            font-weight: 600;
        }

        .nav-tabs .nav-link.active {
            color: #4361ee;
            border-bottom: 2px solid #4361ee;
            background: transparent;
        }

        .form-control {
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #dee2e6;
        }

        .form-control:focus {
            border-color: #4361ee;
            box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.15);
        }

        .btn-login {
            background-color: #4361ee;
            border: none;
            padding: 12px;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .btn-login:hover {
            background-color: #3f37c9;
            transform: translateY(-2px);
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card login-card">
                    <div class="card-header">
                        <h4 class="fw-bold text-primary mb-0">Sekolah<span class="text-dark">App</span></h4>
                        <p class="text-muted small mb-0">Silahkan login untuk melanjutkan</p>
                    </div>

                    <div class="card-body p-4">

                        <?php if (isset($_SESSION['flash'])): ?>
                            <div class="alert alert-<?= $_SESSION['flash']['type'] ?> alert-dismissible fade show"
                                role="alert">
                                <?= $_SESSION['flash']['message'] ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php unset($_SESSION['flash']); ?>
                        <?php endif; ?>

                        <ul class="nav nav-tabs nav-justified mb-4" id="loginTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="guru-tab" data-bs-toggle="tab"
                                    data-bs-target="#guru" type="button" role="tab">Guru / Admin</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="siswa-tab" data-bs-toggle="tab" data-bs-target="#siswa"
                                    type="button" role="tab">Siswa</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="loginTabContent">
                            <!-- Login Guru -->
                            <div class="tab-pane fade show active" id="guru" role="tabpanel">
                                <form action="<?= BASE_URL ?>auth/authenticate" method="POST">
                                    <input type="hidden" name="login_type" value="guru">

                                    <div class="mb-3">
                                        <label class="form-label text-muted small fw-bold">USERNAME</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0"><i
                                                    class="bi bi-person"></i></span>
                                            <input type="text" name="username" class="form-control border-start-0"
                                                placeholder="Masukkan username" required>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label text-muted small fw-bold">PASSWORD</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0"><i
                                                    class="bi bi-lock"></i></span>
                                            <input type="password" name="password" class="form-control border-start-0"
                                                placeholder="Masukkan password" required>
                                        </div>
                                    </div>

                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary btn-login text-white">MASUK
                                            SEKARANG</button>
                                    </div>
                                </form>
                            </div>

                            <!-- Login Siswa -->
                            <div class="tab-pane fade" id="siswa" role="tabpanel">
                                <form action="<?= BASE_URL ?>auth/authenticate" method="POST">
                                    <input type="hidden" name="login_type" value="siswa">

                                    <div class="mb-3">
                                        <label class="form-label text-muted small fw-bold">NIS</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0"><i
                                                    class="bi bi-card-heading"></i></span>
                                            <input type="text" name="nis" class="form-control border-start-0"
                                                placeholder="Nomor Induk Siswa" required>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label text-muted small fw-bold">NISN</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0"><i
                                                    class="bi bi-key"></i></span>
                                            <input type="text" name="nisn" class="form-control border-start-0"
                                                placeholder="NISN (sebagai password)" required>
                                        </div>
                                    </div>

                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary btn-login text-white">MASUK SEBAGAI
                                            SISWA</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="text-center mt-4 text-white-50 small">
                    &copy; 2026 Manajemen Sekolah. All rights reserved.
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>