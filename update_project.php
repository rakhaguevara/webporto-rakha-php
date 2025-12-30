<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

include "koneksi.php";

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: project.php");
    exit;
}

// Ambil data project
$query = mysqli_query($conn, "SELECT * FROM project WHERE id_project='$id'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    header("Location: project.php");
    exit;
}

// Ambil kategori
$kategori = mysqli_query($conn, "SELECT * FROM kategori");
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="./assets/framework/bootsrap/css/bootstrap.min.css">
    <!-- Boxicons -->
    <link rel="stylesheet" href="./assets/framework/boxicons/css/boxicons.min.css">
    <!-- Dashboard Style -->
    <link rel="stylesheet" href="assets/css/dashboard.css">
</head>

<body>

    <?php include 'layout/sidebar.php'; ?>

    <main class="main-content">

        <!-- Top Bar -->
        <div class="top-bar">
            <h1 class="top-bar-title">Edit Project</h1>
            <a href="project.php" class="btn btn-secondary btn-sm">
                <i class='bx bx-arrow-back'></i> Kembali
            </a>
        </div>

        <div class="content-area">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Edit Project</h3>
                </div>

                <div class="card-body">

                    <form method="POST" action="proses_update_project.php" enctype="multipart/form-data">

                        <input type="hidden" name="id_project" value="<?= $data['id_project']; ?>">

                        <!-- Judul -->
                        <div class="mb-3">
                            <label class="form-label">Judul Project</label>
                            <input type="text" name="judul_project"
                                class="form-control"
                                value="<?= htmlspecialchars($data['judul_project']); ?>"
                                required>
                        </div>

                        <!-- Kategori -->
                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <select name="kategori_project" class="form-control" required>
                                <option value="">-- Pilih Kategori --</option>
                                <?php while ($k = mysqli_fetch_assoc($kategori)) : ?>
                                    <option value="<?= $k['id_kategori']; ?>"
                                        <?= ($k['id_kategori'] == $data['kategori_project']) ? 'selected' : ''; ?>>
                                        <?= htmlspecialchars($k['nama_kategori']); ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="deksripsi"
                                class="form-control"
                                rows="4"
                                required><?= htmlspecialchars($data['deksripsi']); ?></textarea>
                        </div>

                        <!-- Tanggal -->
                        <div class="mb-3">
                            <label class="form-label">Tanggal Pembuatan</label>
                            <input type="date"
                                name="tanggal_pembuatan"
                                class="form-control"
                                value="<?= date('Y-m-d', strtotime($data['tanggal_pembuatan'])); ?>"
                                required>
                        </div>

                        <!-- Link -->
                        <div class="mb-3">
                            <label class="form-label">Link Project</label>
                            <input type="url"
                                name="link_project"
                                class="form-control"
                                value="<?= htmlspecialchars($data['link_project']); ?>"
                                required>
                        </div>

                        <!-- Gambar -->
                        <div class="mb-3">
                            <label class="form-label">Gambar Project</label>
                            <input type="file"
                                name="gambar"
                                class="form-control"
                                accept="image/*">
                            <small class="text-muted">
                                Kosongkan jika tidak ingin mengganti gambar
                            </small>

                            <div class="mt-2">
                                <p class="mb-1">Gambar saat ini:</p>
                                <img src="assets/img/<?= $data['gambar']; ?>"
                                    width="150"
                                    class="img-thumbnail">
                            </div>
                        </div>

                        <!-- Tombol -->
                        <div class="d-flex justify-content-end gap-2">
                            <a href="project.php" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">
                                <i class='bx bx-save'></i> Update Project
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>

    </main>

    <script src="./assets/framework/bootsrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>