<?php
require_once 'app_helpers.php';
require_login();
handle_logout_request();

require_once 'config.php';

$page_id = 5;
$comments = fetch_comments($conn, $page_id);
$conn->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Togawa Sakiko | Ave Mujica</title>
  <link rel="stylesheet" href="Ave6.css">
</head>
<body style="--accent:#7799CC; --accent-2:#9DBAE8; --accent-rgb:119,153,204; --accent-text:#AECBFF;">
  <div class="main-container">
    <header class="site-header glass-card">
      <a class="brand" href="welcome.php">
        <img src="Logo.jpg" alt="Logo Ave Mujica">
        <div class="brand-copy">
          <span>Ave Mujica Fan Web</span>
          <strong>Togawa Sakiko</strong>
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
          <span class="eyebrow">Oblivionis • Keyboard & Composer</span>
          <h1>Togawa Sakiko</h1>
          <p>Togawa Sakiko adalah produser, komposer, dan keyboardist Ave Mujica dengan nama panggung Oblivionis.</p>

          <div class="member-meta">
            <span>Nama panggung: Oblivionis</span>
            <span>Posisi: Keyboard & komposer</span>
            <span>Peran: Produser Ave Mujica</span>
          </div>

          <div class="hero-actions">
            <a class="primary-btn" href="#profil">Lihat profil</a>
            <a class="secondary-btn" href="#komentar">Tulis komentar</a>
          </div>
        </article>

        <aside class="hero-media glass-card">
          <img src="Sakiko.Webp" alt="Togawa Sakiko">
        </aside>
      </section>

      <section class="content-grid" id="profil">
        <article class="content-card glass-card">
          <h2 class="section-title">Profil Karakter</h2>
          <div class="section-copy">
            <p>
              <a href="Sakiko.php" class="member-color--sakiko"><b>Togawa Sakiko (豊川 祥子)</b></a>
              adalah siswi tahun pertama yang dikenal sebagai sosok penting di dalam Ave Mujica.
              Ia memakai nama panggung <b>Oblivionis</b> dan berperan sebagai produser, komposer, sekaligus keyboardist.
            </p>

            <p>
              Sakiko punya hubungan masa kecil yang kuat dengan
              <a href="Mutsumi.php" class="member-color--mutsumi"><b>Mutsumi</b></a>
              dan
              <a href="Uika.php" class="member-color--uika"><b>Uika</b></a>.
              Hal ini membuat posisinya terasa sentral, bukan hanya dalam musik, tetapi juga dalam cerita.
            </p>

            <p>
              Secara visual, Sakiko memiliki rambut biru muda panjang dan mata keemasan yang memberi kesan tenang,
              cerdas, dan berwibawa. Dalam keseharian pun, ia sering tampil rapi dan elegan, sesuai dengan citra
              karakter yang punya kelas tersendiri.
            </p>

            <p>
              Saat tampil sebagai Oblivionis, ia memakai topeng renda hitam asimetris dengan detail bunga gladioli.
              Kostumnya memadukan warna merah, hitam, putih, dan aksen biru yang membuat penampilannya sangat khas,
              anggun, dan terasa seperti pusat dari panggung itu sendiri.
            </p>
          </div>
        </article>

        <aside class="side-card glass-card">
          <h2 class="section-title">Info Singkat</h2>
          <ul class="fact-list">
            <li>
              <span>Nama lengkap</span>
              <strong>Togawa Sakiko (豊川 祥子)</strong>
            </li>
            <li>
              <span>Nama panggung</span>
              <strong>Oblivionis</strong>
            </li>
            <li>
              <span>Peran</span>
              <strong>Produser, komposer, dan keyboardist Ave Mujica</strong>
            </li>
            <li>
              <span>Ciri khas</span>
              <strong>Elegan, berkelas, sentral dalam grup, aura kuat</strong>
            </li>
          </ul>

          <div class="side-note">
            Lihat member lain lewat daftar di bawah.
          </div>

          <div class="member-links">
            <a class="member-link member-link--uika" href="Uika.php">Misumi Uika</a>
            <a class="member-link member-link--mutsumi" href="Mutsumi.php">Wakaba Mutsumi</a>
            <a class="member-link member-link--umiri" href="Umiri.php">Yahata Umiri</a>
            <a class="member-link member-link--nyamu" href="Nyamu.php">Yuutenji Nyamu</a>
          </div>
        </aside>
      </section>

      <section class="comment-card glass-card" id="komentar">
        <div class="comment-head">
          <div>
            <h2 class="section-title">Komentar</h2>
            <p>Tulis pendapatmu tentang Togawa Sakiko.</p>
          </div>
          <button type="button" class="toggle-btn" data-comment-toggle>Tampilkan komentar</button>
        </div>

        <div class="comment-layout">
          <form class="comment-form" action="komen5.php" method="post">
            <label for="comment">Tulis komentar</label>
            <textarea id="comment" name="comment" placeholder="Tulis komentar kamu di sini..." required></textarea>
            <input type="hidden" name="page_id" value="<?= $page_id; ?>">
            <button type="submit">Kirim Komentar</button>
          </form>

          <div id="comments-container" class="comment-box is-hidden">
            <?php render_comments($comments, $page_id, 'hapuskomen5.php'); ?>
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