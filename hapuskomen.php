<?php
session_start();
include("config.php");
$conn = new mysqli("localhost", "root", "", "avem");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['comment_id']) && isset($_SESSION['login_user']) && isset($_GET['page_id'])) {
  $comment_id = $_GET['comment_id'];
  $username = $_SESSION['login_user'];
  $page_id = $_GET['page_id'];

  $stmt = $conn->prepare("SELECT username FROM comments WHERE id = ?");
  $stmt->bind_param("i", $comment_id);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();

  if ($row['username'] == $username) {
    $stmt = $conn->prepare("DELETE FROM comments WHERE id = ?");
    $stmt->bind_param("i", $comment_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
      header("Location: welcome.php?page_id=$page_id#komentar");
      exit();
    } else {
      echo "Terjadi kesalahan saat menghapus komentar.";  
    }
  } else {
    echo "Anda tidak memiliki izin untuk menghapus komentar ini.";
  }

  $stmt->close();
} else {
  echo "ID komentar, sesi pengguna, atau page_id tidak ditemukan.";
}

$conn->close();
?>
