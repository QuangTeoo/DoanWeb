<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "qlthuvien";
$conn = mysqli_connect($hostname, $username, $password,$dbname);
mysqli_set_charset($conn, 'utf8mb4'); # https://stackoverflow.com/a/279279/17131337
if (!$conn) {
    die("Không thể kết nối: " . mysqli_error($conn));
    exit();
}
?>