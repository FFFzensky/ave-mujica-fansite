<?php
require_once 'app_helpers.php';
require_login();
handle_logout_request();

require_once 'config.php';

$page_id = 3;
$comments = fetch_comments($conn, $page_id);
$conn->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Yahata Umiri | Ave Mujica</title>
  <link rel="stylesheet" href="Ave6.css">
</head>
<body style="--accent:#23252B; --accent-2:#3A3D45; --accent-rgb:35,37,43; --accent-text:#D2D7E0;">
  <div class="main-container">
    <header class="site-header glass-card">
      <a class="brand" href="welcome.php">
        <img src="Logo.jpg" alt="Logo Ave Mujica">
        <div class="brand-copy">
          <span>Ave Mujica Fan Web</span>
          <strong>Yahata Umiri</strong>
        </div>
      </a>

      <nav class="site-nav">
        <a href="welcome.php">Beranda</a>
        <a href="#profil">Profil</a>
        <a href="#komentar">Komentar</a>
      </nav>

      <div class="header-right">
        <div class="user-badge">Login sebagai <strong><?= h($_SESSION['login_user']) ?></strong></div>
        <form class="header-actions" method="post">
          <button type="submit" name="logout">Logout</button>
        </form>
      </div>
    </header>

    <main>
      <section class="hero">
        <article class="hero-copy glass-card">
          <span class="eyebrow">Timoris • Bass</span>
          <h1>Yahata Umiri</h1>
          <p>Yahata Umiri adalah bassis Ave Mujica yang tampil dengan nama panggung Timoris.</p>

          <div class="member-meta">
            <span>Nama panggung: Timoris</span>
            <span>Posisi: Bass</span>
            <span>Sekolah: Hanasakigawa</span>
          </div>

          <div class="hero-actions">
            <a class="primary-btn" href="#profil">Lihat profil</a>
            <a class="secondary-btn" href="#komentar">Tulis komentar</a>
          </div>
        </article>

        <aside class="hero-media glass-card">
          <img src="Umiri.Webp" alt="Yahata Umiri">
        </aside>
      </section>

      <section class="content-grid" id="profil">
        <article class="content-card glass-card">
          <h2 class="section-title">Profil Karakter</h2>
          <div class="section-copy">
            <p>
              <a href="Umiri.php" class="member-color--umiri"><b>Yahata Umiri (八幡 海鈴)</b></a>
              adalah siswi tahun pertama di Sekolah Menengah Putri Hanasakigawa. Dalam Ave Mujica,
              ia memakai nama panggung <b>Timoris</b> dan berperan sebagai bassis yang memberi fondasi kuat pada musik grup.
            </p>

            <p>
              Umiri juga diketahui sekelas dengan
              <a href="Uika.php" class="member-color--uika"><b>Uika</b></a>.
              Ia punya penampilan yang tegas, dengan rambut hitam sebahu, poni lurus, dan mata pirus yang tajam.
              Visual ini membuat Umiri terasa modern, kuat, dan mudah dibedakan dari member lain.
            </p>

            <p>
              Dalam gaya kasual, Umiri sering tampil dengan nuansa yang lebih edgy dan modern,
              seperti jaket hitam, atasan merah, rok pendek, dan sepatu bot. Penampilannya terasa simpel,
              tetapi tetap punya karakter yang kuat.
            </p>

            <p>
              Sebagai Timoris, ia memakai masker renda yang menutupi area mulut dan hidung.
              Kostumnya dipenuhi detail hitam, merah, dan emas, lengkap dengan aksen formal serta sentuhan panggung
              yang membuat auranya terlihat lebih berani dan profesional.
            </p>
          </div>
        </article>

        <aside class="side-card glass-card">
          <h2 class="section-title">Info Singkat</h2>
          <ul class="fact-list">
            <li>
              <span>Nama lengkap</span>
              <strong>Yahata Umiri (八幡 海鈴)</strong>
            </li>
            <li>
              <span>Nama panggung</span>
              <strong>Timoris</strong>
            </li>
            <li>
              <span>Peran</span>
              <strong>Bassis Ave Mujica</strong>
            </li>
            <li>
              <span>Ciri khas</span>
              <strong>Tegas, modern, visual tajam, punya aura kuat</strong>
            </li>
          </ul>

          <div class="side-note">
            Lihat member lain lewat daftar di bawah.
          </div>

          <div class="member-links">
            <a class="member-link member-link--uika" href="Uika.php">Misumi Uika</a>
            <a class="member-link member-link--mutsumi" href="Mutsumi.php">Wakaba Mutsumi</a>
            <a class="member-link member-link--nyamu" href="Nyamu.php">Yuutenji Nyamu</a>
            <a class="member-link member-link--sakiko" href="Sakiko.php">Togawa Sakiko</a>
          </div>
        </aside>
      </section>

      <section class="comment-card glass-card" id="komentar">
        <div class="comment-head">
          <div>
            <h2 class="section-title">Komentar</h2>
            <p>Tulis pendapatmu tentang Yahata Umiri.</p>
          </div>
          <button type="button" class="toggle-btn" data-comment-toggle>Tampilkan komentar</button>
        </div>

        <div class="comment-layout">
          <form class="comment-form" action="komen3.php" method="post">
            <label for="comment">Tulis komentar</label>
            <textarea id="comment" name="comment" placeholder="Tulis komentar kamu di sini..." required></textarea>
            <input type="hidden" name="page_id" value="<?= $page_id; ?>">
            <button type="submit">Kirim Komentar</button>
          </form>

          <div id="comments-container" class="comment-box is-hidden">
            <?php render_comments($comments, $page_id, 'hapuskomen3.php'); ?>
          </div>
        </div>
      </section>
    </main>

    <footer class="site-footer glass-card">
      <p>&copy; 2024 Ave Mujica</p>
      <a href="welcome.php">Kembali ke halaman utama</a>
    </footer>
  </div>

  <script src="app.js"></script>
</body>
</html>