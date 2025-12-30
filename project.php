<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include "koneksi.php";
include 'layout/sidebar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Project</title>

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
                <h1 class="top-bar-title">Project</h1>
            </div>
            <div class="top-bar-actions">
                <a href="logout.php" class="btn-logout" style="text-decoration: none;">
                    <i class='bx bx-log-out'></i>
                    Logout
                </a>
            </div>
        </div>

        <!-- Content Area -->
        <div class="content-area">

            <!-- Page Header -->
            <div class="page-header">
                <h2 class="page-title">Kelola Project</h2>
                <div class="breadcrumb">
                    <a href="dashboard.php">Home</a> / Project
                </div>
            </div>

            <!-- Card -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Project</h3>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">
                        <i class='bx bx-plus'></i> Tambah Project
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul Project</th>
                                    <th>Kategori</th>
                                    <th>Tanggal</th>
                                    <th>Gambar</th>
                                    <th>Link</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $query = mysqli_query($conn, "SELECT p.*, k.nama_kategori 
                                                                  FROM project p 
                                                                  JOIN kategori k ON p.kategori_project = k.id_kategori 
                                                                  ORDER BY p.id_project DESC");

                                while ($data = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $data['judul_project']; ?></td>
                                        <td><span class="badge bg-primary"><?= $data['nama_kategori']; ?></span></td>
                                        <td><?= date('d/m/Y', strtotime($data['tanggal_pembuatan'])); ?></td>
                                        <td>
                                            <img src="assets/img/<?= $data['gambar']; ?>" width="80" class="img-thumbnail">

                                        </td>
                                        <td>
                                            <a href="<?= $data['link_project']; ?>" target="_blank" class="text-primary">
                                                <i class='bx bx-link-external'></i> Link
                                            </a>
                                        </td>
                                        <td>
                                            <a href="update_project.php?id=<?= $data['id_project']; ?>" class="btn btn-sm btn-warning">
                                                <i class='bx bx-edit'></i> Edit
                                            </a>
                                            <a href="hapus_project.php?id=<?= $data['id_project']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                                <i class='bx bx-trash'></i> Hapus
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </main>

    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="tambahModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" action="proses_tambah_project.php" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="mb-3">
                            <label class="form-label">Judul Project</label>
                            <input type="text" name="judul_project" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <select name="kategori_project" class="form-control" required>
                                <option value="">-- Pilih Kategori --</option>
                                <?php
                                $kat = mysqli_query($conn, "SELECT * FROM kategori");
                                while ($k = mysqli_fetch_array($kat)) {
                                    echo "<option value='{$k['id_kategori']}'>{$k['nama_kategori']}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Deksripsi</label>
                            <textarea name="deksripsi" class="form-control" rows="4" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Pembuatan</label>
                            <input type="date" name="tanggal_pembuatan" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Link Project</label>
                            <input type="url" name="link_project" class="form-control" placeholder="https://example.com" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Gambar</label>
                            <input type="file" name="gambar" class="form-control" accept="image/*" required>
                            <small class="text-danger">Max 1MB (PNG/JPG)</small>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="./assets/framework/bootsrap/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sidebar Toggle
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const toggleIcon = sidebarToggle.querySelector('i');

        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');

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