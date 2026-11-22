<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM akun WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['login_user'] = $username;
            header("location: welcome.php");
            exit();
        } else {
            $_SESSION['error'] = "Password salah";
        }
    } else {
        $_SESSION['error'] = "Username tidak ditemukan";
    }
    header("location: login.php");
    exit();
}
?>
