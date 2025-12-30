<?php
session_start();
include 'layout/sidebar.php';
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="./assets/framework/bootsrap/css/bootstrap.min.css">
    <!-- Boxicons -->
    <link rel="stylesheet" href="./assets/framework/boxicons/css/boxicons.min.css">
    <!-- Admin Style -->
    <link rel="stylesheet" href="assets/css/dashboard.css">

</head>

<body>

    <!-- Sidebar Overlay (for mobile) -->

    <!-- ===== MAIN CONTENT ===== -->
    <main class="main-content">

        <!-- Top Bar -->
        <div class="top-bar">
            <div style="display: flex; align-items: center; gap: 15px;">
                <button class="mobile-menu-btn" id="mobileMenuBtn">
                    <i class='bx bx-menu'></i>
                </button>
                <h1 class="top-bar-title">Dashboard</h1>
            </div>
            <div class="top-bar-actions">
                <a href="logout.php" class="btn-logout" style="text-decoration: none;">
                    <i class='bx bx-log-out'></i>
                    Logout
                </a>
            </div>
        </div>


        <div class="content-area">


            <div class="page-header">
                <h2 class="page-title">Selamat Datang, <?= $_SESSION['username'] ?>! 👋</h2>
                <div class="breadcrumb">
                    <a href="dashboard.php">Home</a> / Dashboard
                </div>
            </div>


            <div class="stats-grid">


                <div class="stat-card card-blue">
                    <?php
                    $qProject = mysqli_query($conn, "SELECT COUNT(id_project) AS total FROM project");
                    $project = mysqli_fetch_assoc($qProject);
                    ?>
                    <div class="stat-card-header">
                        <div>
                            <h1 class="stat-number"><?= $project['total']; ?></h1>
                            <p class="stat-label">Total Project</p>
                        </div>
                        <div class="stat-icon">
                            <i class='bx bxs-briefcase'></i>
                        </div>
                    </div>
                </div>


                <div class="stat-card card-green">
                    <?php
                    $qKategori = mysqli_query($conn, "SELECT COUNT(id_kategori) AS total FROM kategori");
                    $kategori = mysqli_fetch_assoc($qKategori);
                    ?>
                    <div class="stat-card-header">
                        <div>
                            <h1 class="stat-number"><?= $kategori['total']; ?></h1>
                            <p class="stat-label">Kategori</p>
                        </div>
                        <div class="stat-icon">
                            <i class='bx bxs-category'></i>
                        </div>
                    </div>
                </div>

                <!-- TOTAL FOTO -->
                <div class="stat-card card-orange">
                    <?php
                    $qFoto = mysqli_query($conn, "SELECT COUNT(id) AS total FROM photos");
                    $foto = mysqli_fetch_assoc($qFoto);
                    ?>
                    <div class="stat-card-header">
                        <div>
                            <h1 class="stat-number"><?= $foto['total']; ?></h1>
                            <p class="stat-label">Total Foto</p>
                        </div>
                        <div class="stat-icon">
                            <i class='bx bxs-image'></i>
                        </div>
                    </div>
                </div>

            </div>

            <!-- You can add more content here -->

        </div>

    </main>

    </div>

    <!-- JavaScript -->
    <script src="../assets/framework/bootsrap/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sidebar Toggle
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const toggleIcon = sidebarToggle.querySelector('i');

        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');

            // Change icon
            if (sidebar.classList.contains('collapsed')) {
                toggleIcon.classList.remove('bx-chevron-left');
                toggleIcon.classList.add('bx-chevron-right');
            } else {
                toggleIcon.classList.remove('bx-chevron-right');
                toggleIcon.classList.add('bx-chevron-left');
            }
        });

        // Mobile Menu
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        mobileMenuBtn.addEventListener('click', () => {
            sidebar.classList.toggle('show');
            sidebarOverlay.classList.toggle('show');
        });

        sidebarOverlay.addEventListener('click', () => {
            sidebar.classList.remove('show');
            sidebarOverlay.classList.remove('show');
        });
    </script>

</body>

</html>