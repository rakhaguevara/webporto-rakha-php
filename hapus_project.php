<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include "koneksi.php";

// Ambil ID dari URL
$id = $_GET['id'];

// Ambil nama gambar dari database
$query = mysqli_query($conn, "SELECT gambar FROM project WHERE id_project = '$id'");
$data = mysqli_fetch_array($query);
$gambar = $data['gambar'];

// Hapus gambar dari folder
$folder = "uploads/";
if (file_exists($folder . $gambar)) {
    unlink($folder . $gambar);
}

// Hapus data dari database
$delete = mysqli_query($conn, "DELETE FROM project WHERE id_project = '$id'");

if ($delete) {
    echo "<script>
            alert('Project berhasil dihapus!');
            window.location.href='project.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal menghapus project!');
            window.location.href='project.php';
          </script>";
}
