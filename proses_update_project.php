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
    $id_project = $_POST['id_project'];

    $judul     = mysqli_real_escape_string($conn, $_POST['judul_project']);
    $kategori  = $_POST['kategori_project'];
    $deksripsi = mysqli_real_escape_string($conn, $_POST['deksripsi']);
    $tanggal   = $_POST['tanggal_pembuatan'];
    $link      = mysqli_real_escape_string($conn, $_POST['link_project']);

    $tanggal_format = date('Y-m-d H:i:s', strtotime($tanggal));

    /* ======================
       AMBIL DATA GAMBAR LAMA
    ====================== */
    $old = mysqli_query($conn, "SELECT gambar FROM project WHERE id_project='$id_project'");
    $oldData = mysqli_fetch_assoc($old);
    $gambar_lama = $oldData['gambar'];

    $folder = __DIR__ . "/assets/img/";
    $gambar_baru = $gambar_lama; // default pakai gambar lama

    /* ======================
       JIKA UPLOAD GAMBAR BARU
    ====================== */
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === 0) {

        $tmp  = $_FILES['gambar']['tmp_name'];
        $size = $_FILES['gambar']['size'];
        $ext  = strtolower(pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION));

        if ($size > 1048576) {
            die("Ukuran gambar terlalu besar (maks 1MB)");
        }

        if (!in_array($ext, ['jpg', 'jpeg', 'png'])) {
            die("Format gambar harus JPG / JPEG / PNG");
        }

        $gambar_baru = time() . '_' . uniqid() . '.' . $ext;

        if (!is_dir($folder)) {
            mkdir($folder, 0755, true);
        }

        if (move_uploaded_file($tmp, $folder . $gambar_baru)) {
            // hapus gambar lama
            if ($gambar_lama && file_exists($folder . $gambar_lama)) {
                unlink($folder . $gambar_lama);
            }
        } else {
            die("Upload gambar baru gagal");
        }
    }

    /* ======================
       UPDATE DATABASE
    ====================== */
    $query = "UPDATE project SET
        kategori_project   = '$kategori',
        judul_project      = '$judul',
        deksripsi          = '$deksripsi',
        tanggal_pembuatan  = '$tanggal_format',
        gambar             = '$gambar_baru',
        link_project       = '$link'
        WHERE id_project   = '$id_project'
    ";

    if (mysqli_query($conn, $query)) {
        header("Location: project.php?status=updated");
        exit;
    } else {
        die("Gagal update DB: " . mysqli_error($conn));
    }
}
