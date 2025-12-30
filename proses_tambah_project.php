<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    /* ======================
       AMBIL DATA FORM
    ====================== */
    $judul     = mysqli_real_escape_string($conn, $_POST['judul_project']);
    $kategori  = $_POST['kategori_project'];
    $deksripsi = mysqli_real_escape_string($conn, $_POST['deksripsi']);
    $tanggal   = $_POST['tanggal_pembuatan'];
    $link      = mysqli_real_escape_string($conn, $_POST['link_project']);

    $tanggal_format = date('Y-m-d H:i:s', strtotime($tanggal));

    /* ======================
       VALIDASI FILE
    ====================== */
    if (!isset($_FILES['gambar']) || $_FILES['gambar']['error'] !== 0) {
        die("Upload gagal. Error code: " . ($_FILES['gambar']['error'] ?? 'File tidak ada'));
    }

    $gambar = $_FILES['gambar']['name'];
    $tmp    = $_FILES['gambar']['tmp_name'];
    $size   = $_FILES['gambar']['size'];

    // max 1MB
    if ($size > 1048576) {
        die("Ukuran gambar terlalu besar (maks 1MB)");
    }

    // validasi ekstensi
    $ext = strtolower(pathinfo($gambar, PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png'];

    if (!in_array($ext, $allowed)) {
        die("Format gambar harus JPG / JPEG / PNG");
    }

    /* ======================
       UPLOAD FILE
    ====================== */
    $nama_baru = time() . '_' . uniqid() . '.' . $ext;
    $folder = __DIR__ . "/assets/img/";


    if (!is_dir($folder)) {
        mkdir($folder, 0755, true);
    }

    if (move_uploaded_file($tmp, $folder . $nama_baru)) {

        $query = "INSERT INTO project 
        (kategori_project, judul_project, deksripsi, tanggal_pembuatan, gambar, link_project)
        VALUES 
        ('$kategori', '$judul', '$deksripsi', '$tanggal_format', '$nama_baru', '$link')";

        if (mysqli_query($conn, $query)) {
            header("Location: project.php?status=success");
            exit;
        } else {
            die("Gagal insert DB: " . mysqli_error($conn));
        }
    } else {
        die("Upload gagal");
    }

    /* ======================
       INSERT DATABASE
    ====================== */
    $query = "INSERT INTO project 
        (kategori_project, judul_project, deksripsi, tanggal_pembuatan, gambar, link_project)
        VALUES 
        ('$kategori', '$judul', '$deksripsi', '$tanggal_format', '$nama_baru', '$link')";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Project berhasil ditambahkan!');
                window.location.href='project.php';
              </script>";
    } else {
        die("Gagal insert DB: " . mysqli_error($conn));
    }
}
