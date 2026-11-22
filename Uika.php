<?php
require_once 'app_helpers.php';
require_login();
handle_logout_request();

require_once 'config.php';

$page_id = 1;
$comments = fetch_comments($conn, $page_id);
$conn->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Misumi Uika | Ave Mujica</title>
  <link rel="stylesheet" href="Ave6.css">
</head>
<body style="--accent:#BB9955; --accent-2:#D5B57A; --accent-rgb:187,153,85; --accent-text:#E2C992;">
  <div class="main-container">
    <header class="site-header glass-card">
      <a class="brand" href="welcome.php">
        <img src="Logo.jpg" alt="Logo Ave Mujica">
        <div class="brand-copy">
          <span>Ave Mujica Fan Web</span>
          <strong>Misumi Uika</strong>
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
          <span class="eyebrow">Doloris • Main Vocal & Guitar</span>
          <h1>Misumi Uika</h1>
          <p>Misumi Uika adalah vokalis utama dan gitaris utama Ave Mujica dengan nama panggung Doloris.</p>

          <div class="member-meta">
            <span>Nama panggung: Doloris</span>
            <span>Posisi: Vokal & gitar utama</span>
            <span>Sekolah: Hanasakigawa</span>
          </div>

          <div class="hero-actions">
            <a class="primary-btn" href="#profil">Lihat profil</a>
            <a class="secondary-btn" href="#komentar">Tulis komentar</a>
          </div>
        </article>

        <aside class="hero-media glass-card">
          <img src="UikaMisumi.Webp" alt="Misumi Uika">
        </aside>
      </section>

      <section class="content-grid" id="profil">
        <article class="content-card glass-card">
          <h2 class="section-title">Profil Karakter</h2>
          <div class="section-copy">
            <p>
              <a href="Uika.php" class="member-color--uika"><b>Misumi Uika (三角 初華)</b></a>
              adalah siswi tahun pertama di SMA Putri Hanasakigawa. Ia dikenal sebagai gitaris, vokalis,
              penulis lirik, dan komposer untuk sumimi. Dalam Ave Mujica, Uika memakai nama panggung
              <b>Doloris</b> dan menjadi vokalis sekaligus gitaris utama yang memberi warna sangat kuat pada identitas grup.
            </p>

            <p>
              Uika juga punya hubungan penting dengan
              <a href="Sakiko.php" class="member-color--sakiko"><b>Sakiko</b></a>
              karena mereka adalah teman masa kecil. Secara visual, Uika memiliki rambut pirang platinum sepanjang bahu
              dan mata lavender yang membuat tampilannya terasa lembut, anggun, dan mudah dikenali.
            </p>

            <p>
              Sebagai Doloris, ia memakai topeng renda hitam asimetris yang menutupi sebagian besar area atas wajahnya,
              menyisakan mata sebagai fokus utama. Bunga yang tergambar pada topengnya adalah marigold. Kostumnya memadukan
              warna hitam, putih, merah, dan aksen emas, sehingga tampilannya terasa dramatis tetapi tetap elegan.
            </p>

            <p>
              Di luar penampilan panggung, gaya Uika juga tetap menarik. Ia sering tampil dengan pakaian yang sederhana
              namun bersih, seperti kaus V-neck putih, celana high waist warna krem, topi hitam, dan kacamata hitam
              saat keluar. Kesan yang muncul adalah karakter yang tenang, stylish, dan punya identitas kuat.
            </p>
          </div>
        </article>

        <aside class="side-card glass-card">
          <h2 class="section-title">Info Singkat</h2>
          <ul class="fact-list">
            <li>
              <span>Nama lengkap</span>
              <strong>Misumi Uika (三角 初華)</strong>
            </li>
            <li>
              <span>Nama panggung</span>
              <strong>Doloris</strong>
            </li>
            <li>
              <span>Peran</span>
              <strong>Vokalis utama dan gitaris utama Ave Mujica</strong>
            </li>
            <li>
              <span>Ciri khas</span>
              <strong>Lembut, anggun, misterius, teman masa kecil Sakiko</strong>
            </li>
          </ul>

          <div class="side-note">
            Lihat member lain lewat daftar di bawah.
          </div>

          <div class="member-links">
            <a class="member-link member-link--mutsumi" href="Mutsumi.php">Wakaba Mutsumi</a>
            <a class="member-link member-link--umiri" href="Umiri.php">Yahata Umiri</a>
            <a class="member-link member-link--nyamu" href="Nyamu.php">Yuutenji Nyamu</a>
            <a class="member-link member-link--sakiko" href="Sakiko.php">Togawa Sakiko</a>
          </div>
        </aside>
      </section>

      <section class="comment-card glass-card" id="komentar">
        <div class="comment-head">
          <div>
            <h2 class="section-title">Komentar</h2>
            <p>Tulis pendapatmu tentang Misumi Uika.</p>
          </div>
          <button type="button" class="toggle-btn" data-comment-toggle>Tampilkan komentar</button>
        </div>

        <div class="comment-layout">
          <form class="comment-form" action="komen1.php" method="post">
            <label for="comment">Tulis komentar</label>
            <textarea id="comment" name="comment" placeholder="Tulis komentar kamu di sini..." required></textarea>
            <input type="hidden" name="page_id" value="<?= $page_id; ?>">
            <button type="submit">Kirim Komentar</button>
          </form>

          <div id="comments-container" class="comment-box is-hidden">
            <?php render_comments($comments, $page_id, 'hapuskomen1.php'); ?>
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