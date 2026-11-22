<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $passwordInput = $_POST['password'];

    if ($username === '' || $passwordInput === '') {
        $_SESSION['error'] = "Username dan password wajib diisi.";
        header("location: Bikin.php");
        exit();
    }

    $check = $conn->prepare("SELECT id FROM akun WHERE username = ?");
    $check->bind_param("s", $username);
    $check->execute();
    $checkResult = $check->get_result();

    if ($checkResult->num_rows > 0) {
        $_SESSION['error'] = "Username sudah dipakai. Coba username lain.";
        header("location: Bikin.php");
        exit();
    }

    $password = password_hash($passwordInput, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO akun (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Akun berhasil dibuat. Silakan login.";
        header("location: login.php");
        exit();
    } else {
        $_SESSION['error'] = "Terjadi kesalahan. Silakan coba lagi.";
        header("location: Bikin.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi | Ave Mujica</title>
    <link rel="stylesheet" href="auth.css">
</head>
<body>
    <div class="auth-shell">
        <section class="auth-visual">
            <div class="auth-tag">Create New Account</div>

            <div class="auth-brand">
                <div class="auth-logo-wrap">
                    <img src="Logo.jpg" alt="Logo Ave Mujica">
                </div>
            </div>
        </section>

        <section class="auth-panel">
            <div class="auth-card">
                <h2>Registrasi</h2>
                <p class="subtext">Isi data di bawah untuk membuat akun baru.</p>

                <?php if (isset($_SESSION['error'])): ?>
                    <div class="message error">
                        <?php
                        echo htmlspecialchars($_SESSION['error'], ENT_QUOTES, 'UTF-8');
                        unset($_SESSION['error']);
                        ?>
                    </div>
                <?php endif; ?>

                <form method="post" action="Bikin.php" autocomplete="off">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <div class="input-wrap">
                            <input type="text" id="username" name="username" placeholder="Masukkan username" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-wrap">
                            <input type="password" id="password" name="password" placeholder="Masukkan password" required>
                        </div>
                    </div>

                    <button type="submit" class="auth-btn">Buat Akun</button>
                </form>

                <div class="auth-footer">
                    Sudah punya akun? <a href="login.php">Kembali ke login</a>
                </div>
            </div>
        </section>
    </div>
</body>
</html>