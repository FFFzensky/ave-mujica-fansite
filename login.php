<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Ave Mujica</title>
    <link rel="stylesheet" href="auth.css">
</head>
<body>
    <div class="auth-shell">
        <section class="auth-visual">
            <div class="auth-tag">Ave Mujica Fan Web</div>

            <div class="auth-brand">
                <div class="auth-logo-wrap">
                    <img src="Logo.jpg" alt="Logo Ave Mujica">
                </div>
            </div>
        </section>

        <section class="auth-panel">
            <div class="auth-card">
                <h2>Login</h2>
                <p class="subtext">Masukkan username dan password untuk masuk ke web.</p>

                <?php if (isset($_SESSION['success'])): ?>
                    <div class="message success">
                        <?php
                        echo htmlspecialchars($_SESSION['success'], ENT_QUOTES, 'UTF-8');
                        unset($_SESSION['success']);
                        ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($_SESSION['error'])): ?>
                    <div class="message error">
                        <?php
                        echo htmlspecialchars($_SESSION['error'], ENT_QUOTES, 'UTF-8');
                        unset($_SESSION['error']);
                        ?>
                    </div>
                <?php endif; ?>

                <form method="post" action="Au.php" autocomplete="off">
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

                    <button type="submit" class="auth-btn">Masuk Sekarang</button>
                </form>

                <div class="auth-footer">
                    Belum punya akun? <a href="Bikin.php">Buat akun di sini</a>
                </div>
            </div>
        </section>
    </div>
</body>
</html>