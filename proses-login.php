<?php
session_start();
include "koneksi.php";

if (!isset($_POST['login'])) {
    header("Location: login.php");
    exit;
}

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$query = mysqli_query(
    $conn,
    "SELECT * FROM admin WHERE username='$username' AND password='$password' LIMIT 1"
);

if (mysqli_num_rows($query) === 1) {
    $_SESSION['admin'] = true;
    $_SESSION['username'] = $username;

    header("Location: dashboard.php");
    exit;
} else {
    $_SESSION['error'] = "Username atau password salah";
    header("Location: login.php");
    exit;
}
