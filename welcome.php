<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    exit();
}

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("location: login.php");
    exit();
}

$welcome_message = "Selamat Datang di Dunia Ave Mujica, " . $_SESSION['login_user'] . "!";
$page_id = 0;
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ave Mujica</title>
  <link rel="stylesheet" href="Ave4.css">
</head>
<body>
  <div class="main-container">
    <header>
      <h1>
        <a href="welcome.php">
          <img src="Logo.jpg" alt="LOGO AVE MUJICA">
        </a>
      </h1>
      <nav>
        <a href="https://bang-dream.com/avemujica" target="_blank">Tentang</a>
        <a href="#musik">Musik</a>
        <a href="#galeri">Galeri</a>
        <a href="#personil">Kontak</a>
        <a href="#komentar">Komentar</a>
      </nav>
    </header>

    <main>
      <section class="welcome-banner">
        <div class="welcome-copy">
          <span class="eyebrow"><?php echo htmlspecialchars($welcome_message, ENT_QUOTES, 'UTF-8'); ?></span>
          <h2>Welcome to the world of Ave Mujica.</h2>
          <p>Website ini berisi profil, musik, galeri, dan komentar tentang Ave Mujica.</p>
        </div>
        <div class="welcome-media">
          <img src="Logo.jpg" alt="Ave Mujica Logo">
        </div>
      </section>

      <section class="bio">
        <div class="bio-container">
          <div class="bio-text">
            <h2>Biodata</h2>
            <p>
              <a href="https://bandori.fandom.com/wiki/Ave_Mujica" target="_blank" title="Ave Mujica">
                <span style="color:#d56795;"><b>Ave Mujica</b></span>
              </a>
              adalah band beranggotakan perempuan di BanG Dream! Franchise.
              Grup ini beranggotakan lima orang, yaitu
              <a href="Uika.php" title="Uika"><span style="color:#BB9955;"><b>Misumi Uika (Doloris)</b></span></a>
              pada gitar utama dan vokal,
              <a href="Mutsumi.php" title="Mutsumi"><span style="color:#779977;"><b>Wakaba Mutsumi (Mortis)</b></span></a>
              pada gitar rythm,
              <a href="Umiri.php" title="Umiri"><span style="color:#7aa6c5;"><b>Yahata Umiri (Timoris)</b></span></a>
              pada bass,
              <a href="Nyamu.php" title="Nyamu"><span style="color:#AA4477;"><b>Yuutenji Nyamu (Amoris)</b></span></a>
              pada drum, dan
              <a href="Sakiko.php" title="Sakiko"><span style="color:#7799CC;"><b>Togawa Sakiko (Oblivionis)</b></span></a>
              pada keyboard.
            </p>

            <p>
              Ave Mujica adalah sebuah band yang dibentuk oleh Sakiko setelah bubarnya CRYCHIC.
              Awalnya Sakiko menghubungi Mutsumi, Uika, dan Umiri untuk bergabung, lalu Nyamu tertarik
              untuk ikut bergabung setelah melihat daya tarik grup tersebut.
            </p>

            <p>
              Sebagian besar anggota Ave Mujica bersekolah di Akademi Putri Tsukinomori, yaitu Uika,
              Mutsumi, dan Sakiko. Sedangkan Umiri dan Nyamu bersekolah di Hanasakigawa Girls' High School.
              Keunikan tiap karakter inilah yang membuat Ave Mujica terasa kuat, intens, dan sangat berkarakter.
            </p>
          </div>

          <div class="bio-image">
            <img src="AveMujica.JPEG" alt="Ave Mujica">
          </div>
        </div>
      </section>

      <section class="musik" id="musik">
        <h2>Music Video</h2>
        <div id="band-info">
          <select id="songSelection">
            <option value="KnB2.mp4" data-video="KnB2.mp4">Kuro no Birthday</option>
            <option value="Deep.mp4" data-video="Deep.mp4">Futatsu no Tsuki ~Deep Into The Forest~</option>
            <option value="Choir.mp4" data-video="Choir.mp4">Choir 'S' Choir</option>
            <option value="Kami.mp4" data-video="Kami.mp4">Kamisama Baka</option>
            <option value="Masq.mp4" data-video="Masq.mp4">Mas?uerade Rhapsody Re?uest</option>
            <option value="Subarashiki.mp4" data-video="Subarashiki.mp4">Subarashiki sekai demo dokonimonai basho</option>
            <option value="Angles.mp4" data-video="Angles.mp4">Angles</option>
            <option value="Symbol.mp4" data-video="Symbol.mp4">Symbol I : △</option>
          </select>

          <div class="media-controls">
            <button type="button" onclick="playMusic()">Play</button>
            <button type="button" onclick="pauseMusic()">Pause</button>
            <button type="button" onclick="rewindMusic()">Rewind 5s</button>
          </div>

          <video id="albumVideo" controls>
            <source id="videoSource" type="video/mp4">
            Browser kamu tidak mendukung video.
          </video>
        </div>
      </section>

      <section class="galeri" id="galeri">
        <h2>Gallery</h2>

        <div class="gallery-slider">
          <div class="gallery-track">
            <a href="AveMujicaPersonil.jpeg" class="gallery-card" data-gallery-item data-caption="Ave Mujica Personil">
              <img src="AveMujicaPersonil.jpeg" alt="Ave Mujica Personil">
              <div class="gallery-info">
                <strong>Personil Ave Mujica</strong>
                <span>Foto grup seluruh member.</span>
              </div>
            </a>

            <a href="AveMujica1.jpg" class="gallery-card" data-gallery-item data-caption="Ave Mujica Visual 1">
              <img src="AveMujica1.jpg" alt="Ave Mujica 1">
              <div class="gallery-info">
                <strong>Stage Visual</strong>
                <span>Nuansa teatrikal yang kuat.</span>
              </div>
            </a>

            <a href="AveM.jpg" class="gallery-card" data-gallery-item data-caption="Ave Mujica Visual 2">
              <img src="AveM.jpg" alt="Ave Mujica 2">
              <div class="gallery-info">
                <strong>Performance Shot</strong>
                <span>Tampilan yang lebih dramatis dan fokus.</span>
              </div>
            </a>

            <a href="AveM2.jpg" class="gallery-card" data-gallery-item data-caption="Ave Mujica Visual 3">
              <img src="AveM2.jpg" alt="Ave Mujica 3">
              <div class="gallery-info">
                <strong>Promotional Image</strong>
                <span>Cocok untuk highlight utama halaman.</span>
              </div>
            </a>
          </div>
        </div>
      </section>

      <section class="personil" id="personil">
        <h2>Sosial Media Member Ave Mujica</h2>
        <ul>
          <li><a href="https://www.instagram.com/sasakirico_official/" target="_blank">Sasaki Rico</a></li>
          <li><a href="https://twitter.com/Watase_Yuzuki" target="_blank">Watase Yuzuki</a></li>
          <li><a href="https://www.instagram.com/mei_okada0519/" target="_blank">Okada Mei</a></li>
          <li><a href="https://www.instagram.com/akaneyonezawa.banu/?igshid=YmMyMTA2M2Y%3D" target="_blank">Akane Yonezawa</a></li>
          <li><a href="https://twitter.com/Kanon_Takao" target="_blank">Takao Kanon</a></li>
        </ul>
      </section>

      <section class="Konser">
        <h2>Jadwal Konser Ave Mujica Berikutnya</h2>
        <div id="timer" class="timer">
          <a href="https://bang-dream.com/events/avemujica_2nd" target="_blank">
            <img src="Konser.jpg" alt="Album Cover">
          </a>
          <p>(Klik foto di atas untuk info lebih lanjut)</p>
          <p>Kanagawa performance</p>
          <p>Date: Saturday, June 8, 2024, doors open at 17:00 / performance starts at 18:00 (scheduled)</p>
          <p>Venue: Kanagawa Prefectural Hall, Large Hall</p>
          <p id="countdown">Loading...</p>
        </div>
      </section>

      <section class="Komentar">
        <h2>Kirim Komentar di sini</h2>
        <div class="chatbox">
          <form action="komen.php" method="post">
            <label for="comment">Komentar:</label>
            <textarea id="comment" name="comment" required></textarea>
            <input type="hidden" name="page_id" value="<?php echo $page_id; ?>">
            <input type="submit" value="Kirim Komentar">
          </form>
        </div>
      </section>

      <section class="display-comments">
        <h2 id="komentar">Komentar</h2>
        <button type="button" data-comment-toggle>Tampilkan komentar</button>

        <div id="comments-container" class="is-hidden">
          <?php
          include("config.php");
          $conn = new mysqli("localhost", "root", "", "avem");

          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }

          $sql = "SELECT id, username, comment, created_at FROM comments WHERE page_id = ? ORDER BY created_at DESC";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("i", $page_id);
          $stmt->execute();
          $result = $stmt->get_result();

          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  echo "<p><strong>" . htmlspecialchars($row["username"]) . "</strong>: " . htmlspecialchars($row["comment"]);
                  echo " <span>(" . date("d-m-Y H:i:s", strtotime($row["created_at"])) . ")</span>";

                  if (isset($_SESSION['login_user']) && $_SESSION['login_user'] == $row["username"]) {
                      echo " <a href='hapuskomen.php?comment_id=" . $row["id"] . "&page_id=$page_id' style='color:#ffb2d0;'>Hapus</a>";
                  }

                  echo "</p>";
              }
          } else {
              echo "<p>Belum ada komentar.</p>";
          }

          $stmt->close();
          $conn->close();
          ?>
        </div>
      </section>
    </main>

    <form action="" method="post">
      <button type="submit" name="logout"><b>Logout</b></button>
    </form>

    <footer>
      <p>&copy; 2024 Ave Mujica</p>
    </footer>
  </div>

  <div class="gallery-modal" id="galleryModal">
    <div class="gallery-modal__dialog">
      <button class="gallery-modal__close" type="button" data-close-gallery aria-label="Tutup">✕</button>

      <div class="gallery-modal__image-wrap">
        <button class="gallery-modal__nav gallery-modal__nav--prev" type="button" data-prev-gallery aria-label="Sebelumnya">‹</button>
        <img src="" alt="" class="gallery-modal__image">
        <button class="gallery-modal__nav gallery-modal__nav--next" type="button" data-next-gallery aria-label="Berikutnya">›</button>
      </div>

      <p class="gallery-modal__caption"></p>
    </div>
  </div>

  <script src="app.js"></script>
</body>
</html>