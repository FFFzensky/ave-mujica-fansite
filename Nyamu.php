<?php
require_once 'app_helpers.php';
require_login();
handle_logout_request();

require_once 'config.php';

$page_id = 4;
$comments = fetch_comments($conn, $page_id);
$conn->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Yuutenji Nyamu | Ave Mujica</title>
  <link rel="stylesheet" href="Ave6.css">
</head>
<body style="--accent:#AA4477; --accent-2:#C86495; --accent-rgb:170,68,119; --accent-text:#E389B2;">
  <div class="main-container">
    <header class="site-header glass-card">
      <a class="brand" href="welcome.php">
        <img src="Logo.jpg" alt="Logo Ave Mujica">
        <div class="brand-copy">
          <span>Ave Mujica Fan Web</span>
          <strong>Yuutenji Nyamu</strong>
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
          <span class="eyebrow">Amoris • Drum</span>
          <h1>Yuutenji Nyamu</h1>
          <p>Yuutenji Nyamu adalah drummer Ave Mujica yang tampil dengan nama panggung Amoris.</p>

          <div class="member-meta">
            <span>Nama panggung: Amoris</span>
            <span>Posisi: Drum</span>
            <span>Sekolah: Hanasakigawa</span>
          </div>

          <div class="hero-actions">
            <a class="primary-btn" href="#profil">Lihat profil</a>
            <a class="secondary-btn" href="#komentar">Tulis komentar</a>
          </div>
        </article>

        <aside class="hero-media glass-card">
          <img src="Nyamu.Webp" alt="Yuutenji Nyamu">
        </aside>
      </section>

      <section class="content-grid" id="profil">
        <article class="content-card glass-card">
          <h2 class="section-title">Profil Karakter</h2>
          <div class="section-copy">
            <p>
              <a href="Nyamu.php" class="member-color--nyamu"><b>Yuutenji Nyamu (祐天寺 にゃむ)</b></a>
              adalah karakter dalam waralaba BanG Dream! yang dalam Ave Mujica memakai nama panggung
              <b>Amoris</b>. Ia berperan sebagai drummer dan menjadi salah satu sosok yang paling mudah menarik perhatian.
            </p>

            <p>
              Secara visual, Nyamu memiliki rambut bob pendek berwarna ungu lembut dan mata merah muda yang besar,
              sehingga ekspresinya terasa sangat khas. Dibanding member lain, penampilan Nyamu punya kesan yang lebih
              glamor dan playful.
            </p>

            <p>
              Dalam keseharian, ia sering tampil dengan palet warna monokromatik yang elegan,
              ditambah aksesori yang memberi kesan mewah. Saat keluar rumah, ia juga sering menggunakan topi
              dan kacamata hitam sebagai penyamaran.
            </p>

            <p>
              Sebagai Amoris, Nyamu memakai topeng renda yang menutupi sebagian besar bagian atas wajah.
              Kostumnya penuh dengan detail merah, hitam, mutiara, dan elemen formal yang memberi aura panggung
              yang berani, mencolok, dan sangat teatrikal.
            </p>
          </div>
        </article>

        <aside class="side-card glass-card">
          <h2 class="section-title">Info Singkat</h2>
          <ul class="fact-list">
            <li>
              <span>Nama lengkap</span>
              <strong>Yuutenji Nyamu (祐天寺 にゃむ)</strong>
            </li>
            <li>
              <span>Nama panggung</span>
              <strong>Amoris</strong>
            </li>
            <li>
              <span>Peran</span>
              <strong>Drummer Ave Mujica</strong>
            </li>
            <li>
              <span>Ciri khas</span>
              <strong>Glamor, playful, mencolok, aura panggung yang kuat</strong>
            </li>
          </ul>

          <div class="side-note">
            Lihat member lain lewat daftar di bawah.
          </div>

          <div class="member-links">
            <a class="member-link member-link--uika" href="Uika.php">Misumi Uika</a>
            <a class="member-link member-link--mutsumi" href="Mutsumi.php">Wakaba Mutsumi</a>
            <a class="member-link member-link--umiri" href="Umiri.php">Yahata Umiri</a>
            <a class="member-link member-link--sakiko" href="Sakiko.php">Togawa Sakiko</a>
          </div>
        </aside>
      </section>

      <section class="comment-card glass-card" id="komentar">
        <div class="comment-head">
          <div>
            <h2 class="section-title">Komentar</h2>
            <p>Tulis pendapatmu tentang Yuutenji Nyamu.</p>
          </div>
          <button type="button" class="toggle-btn" data-comment-toggle>Tampilkan komentar</button>
        </div>

        <div class="comment-layout">
          <form class="comment-form" action="komen4.php" method="post">
            <label for="comment">Tulis komentar</label>
            <textarea id="comment" name="comment" placeholder="Tulis komentar kamu di sini..." required></textarea>
            <input type="hidden" name="page_id" value="<?= $page_id; ?>">
            <button type="submit">Kirim Komentar</button>
          </form>

          <div id="comments-container" class="comment-box is-hidden">
            <?php render_comments($comments, $page_id, 'hapuskomen4.php'); ?>
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