<?php
session_start();
include "koneksi.php";


$error = "";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, 
    "SELECT * FROM admin WHERE username='$username' AND password='$password'"
    );


    if(mysqli_num_rows($query) === 1) {
        $_SESSION['admin'] = $username;
        header("Location: dashboard.php");
        exit;
    
    }else{
        $error = "Username atau password salah";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="assets/framework/bootsrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body class="d-flex justify-content-center align-items-center" style="min-height:100vh;">

<div class="card p-4" style="width:350px;">
    <h4 class="mb-3 text-center">Admin Login</h4>

    <?php if ($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button name="login" class="btn btn-dark w-100">Login</button>
    </form>
</div>

</body>
</html>