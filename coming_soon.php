<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Coming Soon</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="./assets/framework/bootsrap/css/bootstrap.min.css">
    <!-- Boxicons -->
    <link rel="stylesheet" href="./assets/framework/boxicons/css/boxicons.min.css">
    <!-- Dashboard Style -->
    <link rel="stylesheet" href="assets/css/dashboard.css">

    <style>
        .coming-soon {
            min-height: 70vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .coming-card {
            max-width: 500px;
            padding: 40px;
            border-radius: 12px;
            background: #fff;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
        }

        .coming-icon {
            font-size: 64px;
            color: #0d6efd;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <?php include 'layout/sidebar.php'; ?>

    <main class="main-content">

        <!-- Top Bar -->
        <div class="top-bar">
            <h1 class="top-bar-title">Coming Soon</h1>
            <a href="dashboard.php" class="btn btn-secondary btn-sm">
                <i class='bx bx-arrow-back'></i> Kembali
            </a>
        </div>

        <div class="content-area coming-soon">
            <div class="coming-card">
                <div class="coming-icon">
                    <i class='bx bx-time-five'></i>
                </div>
                <h2 class="mb-3">Fitur Segera Hadir</h2>
                <p class="text-muted mb-4">
                    Fitur ini sedang dalam tahap pengembangan dan akan segera tersedia
                    pada update berikutnya.
                </p>
                <a href="dashboard.php" class="btn btn-primary">
                    Kembali ke Dashboard
                </a>
            </div>
        </div>

    </main>

    <script src="./assets/framework/bootsrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>

