<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_username = $_POST['new_username'];
    $new_password = $_POST['new_password'];

    $stmt = $conn->prepare("SELECT * FROM akun WHERE username = ?");
    $stmt->bind_param("s", $new_username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        $stmt = $conn->prepare("INSERT INTO akun (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $new_username, $new_password);
        if ($stmt->execute()) {
            $_SESSION['login_user'] = $new_username;
            header("location: Login.php");
            exit();
        } else {
            $_SESSION['error'] = "Error creating account";
            header("location: register.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Username Sudah ada";
        header("location: register.php");
        exit();
    }
}
?>
