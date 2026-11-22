<?php
session_start();
include("config.php");
$conn = new mysqli("localhost", "root", "", "avem");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['comment']) && isset($_SESSION['login_user']) && isset($_POST['page_id'])) {
  $comment = $conn->real_escape_string($_POST['comment']);
  $username = $_SESSION['login_user'];
  $page_id = intval($_POST['page_id']);
  date_default_timezone_set('Asia/Jakarta');
  $created_at = date("Y-m-d H:i:s");

  $stmt = $conn->prepare("INSERT INTO comments (username, comment, created_at, page_id) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("sssi", $username, $comment, $created_at, $page_id);
  $stmt->execute();

  if ($stmt->affected_rows > 0) {
    header("Location: welcome.php?page_id=$page_id#komentar");
    exit();
  } else {
    echo "Terjadi kesalahan saat mengirim komentar.";
  }

  $stmt->close();
} else {
  echo "Komentar atau sesi pengguna tidak ditemukan.";
}

$conn->close();
?>
