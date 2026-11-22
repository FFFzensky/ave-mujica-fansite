<?php
require_once 'app_helpers.php';
require_login();
handle_logout_request();

require_once 'config.php';

$page_id = 2;
$comments = fetch_comments($conn, $page_id);
$conn->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wakaba Mutsumi | Ave Mujica</title>
  <link rel="stylesheet" href="Ave6.css">
</head>
<body style="--accent:#779977; --accent-2:#94B292; --accent-rgb:119,153,119; --accent-text:#A9C7A7;">
  <div class="main-container">
    <header class="site-header glass-card">
      <a class="brand" href="welcome.php">
        <img src="Logo.jpg" alt="Logo Ave Mujica">
        <div class="brand-copy">
          <span>Ave Mujica Fan Web</span>
          <strong>Wakaba Mutsumi</strong>
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
          <span class="eyebrow">Mortis • Rhythm Guitar</span>
          <h1>Wakaba Mutsumi</h1>
          <p>Wakaba Mutsumi adalah gitaris ritme Ave Mujica yang tampil dengan nama panggung Mortis.</p>

          <div class="member-meta">
            <span>Nama panggung: Mortis</span>
            <span>Posisi: Gitar ritme</span>
            <span>Sekolah: Tsukinomori</span>
          </div>

          <div class="hero-actions">
            <a class="primary-btn" href="#profil">Lihat profil</a>
            <a class="secondary-btn" href="#komentar">Tulis komentar</a>
          </div>
        </article>

        <aside class="hero-media glass-card">
          <img src="Mutsumi.Webp" alt="Wakaba Mutsumi">
        </aside>
      </section>

      <section class="content-grid" id="profil">
        <article class="content-card glass-card">
          <h2 class="section-title">Profil Karakter</h2>
          <div class="section-copy">
            <p>
              <a href="Mutsumi.php" class="member-color--mutsumi"><b>Wakaba Mutsumi (若葉 睦)</b></a>
              adalah siswi tahun pertama di Akademi Perempuan Tsukinomori. Dalam Ave Mujica,
              ia memakai nama panggung <b>Mortis</b> dan berperan sebagai gitaris ritme yang memberi
              lapisan suara yang halus tetapi tetap kuat.
            </p>

            <p>
              Mutsumi merupakan teman masa kecil
              <a href="Sakiko.php" class="member-color--sakiko"><b>Sakiko</b></a>,
              sehingga keberadaannya punya peran penting dalam hubungan antar karakter. Ia dikenal dengan rambut lurus
              abu-abu kehijauan, poni rata, dan mata keemasan yang memberi kesan mengantuk namun tajam.
            </p>

            <p>
              Gaya berpakaian Mutsumi cenderung rapi dan lembut. Ia sering tampil dengan nuansa yang elegan,
              selaras dengan citra siswa Tsukinomori. Dalam kehidupan sehari-hari, penampilannya terasa sederhana
              tetapi tetap berkelas.
            </p>

            <p>
              Selain itu, Mutsumi berasal dari keluarga terpandang. Ayahnya adalah komedian terkenal, sedangkan ibunya
              seorang aktris. Detail ini membuat latar belakangnya terasa istimewa, walaupun kepribadiannya sendiri
              justru tampak tenang dan tidak terlalu mencolok.
            </p>
          </div>
        </article>

        <aside class="side-card glass-card">
          <h2 class="section-title">Info Singkat</h2>
          <ul class="fact-list">
            <li>
              <span>Nama lengkap</span>
              <strong>Wakaba Mutsumi (若葉 睦)</strong>
            </li>
            <li>
              <span>Nama panggung</span>
              <strong>Mortis</strong>
            </li>
            <li>
              <span>Peran</span>
              <strong>Gitaris ritme Ave Mujica</strong>
            </li>
            <li>
              <span>Ciri khas</span>
              <strong>Tenang, misterius, keluarga terpandang, teman masa kecil Sakiko</strong>
            </li>
          </ul>

          <div class="side-note">
            Lihat member lain lewat daftar di bawah.
          </div>

          <div class="member-links">
            <a class="member-link member-link--uika" href="Uika.php">Misumi Uika</a>
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
            <p>Tulis pendapatmu tentang Wakaba Mutsumi.</p>
          </div>
          <button type="button" class="toggle-btn" data-comment-toggle>Tampilkan komentar</button>
        </div>

        <div class="comment-layout">
          <form class="comment-form" action="komen2.php" method="post">
            <label for="comment">Tulis komentar</label>
            <textarea id="comment" name="comment" placeholder="Tulis komentar kamu di sini..." required></textarea>
            <input type="hidden" name="page_id" value="<?= $page_id; ?>">
            <button type="submit">Kirim Komentar</button>
          </form>

          <div id="comments-container" class="comment-box is-hidden">
            <?php render_comments($comments, $page_id, 'hapuskomen2.php'); ?>
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