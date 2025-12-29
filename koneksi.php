<?php
$servernameku = "localhost";
$username = "root";
$dbname = "webporto";
$password = "";

// connection db
$conn = mysqli_connect($servernameku, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


?>