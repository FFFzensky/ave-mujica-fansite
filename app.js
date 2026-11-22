document.addEventListener("DOMContentLoaded", function () {
  initMusicPlayer();
  initGallery();
  initCommentToggle();
  initCountdown();
});

function initMusicPlayer() {
  const select = document.getElementById("songSelection");
  const video = document.getElementById("albumVideo");
  const source = document.getElementById("videoSource");

  if (!select || !video || !source) return;

  function updateSongAndImage() {
    const selectedOption = select.options[select.selectedIndex];
    const videoSrc = selectedOption.getAttribute("data-video") || selectedOption.value;
    source.src = videoSrc;
    video.load();
  }

  window.updateSongAndImage = updateSongAndImage;
  window.playMusic = function () {
    video.play();
  };
  window.pauseMusic = function () {
    video.pause();
  };
  window.rewindMusic = function () {
    video.currentTime = Math.max(0, video.currentTime - 5);
  };

  updateSongAndImage();
  select.addEventListener("change", updateSongAndImage);
}

function initGallery() {
  const slider = document.querySelector(".gallery-slider");
  const items = Array.from(document.querySelectorAll("[data-gallery-item]"));
  const modal = document.getElementById("galleryModal");

  if (!slider || !items.length || !modal) return;

  const modalImg = modal.querySelector(".gallery-modal__image");
  const modalCaption = modal.querySelector(".gallery-modal__caption");
  const modalDialog = modal.querySelector(".gallery-modal__dialog");
  const btnClose = modal.querySelector("[data-close-gallery]");
  const btnPrev = modal.querySelector("[data-prev-gallery]");
  const btnNext = modal.querySelector("[data-next-gallery]");

  let currentIndex = 0;
  let isDown = false;
  let startX = 0;
  let scrollLeft = 0;
  let touchStartX = 0;

  function openModal(index) {
    currentIndex = index;
    const item = items[currentIndex];
    modalImg.src = item.getAttribute("href");
    modalImg.alt = item.dataset.caption || "Gallery image";
    modalCaption.textContent = item.dataset.caption || "";
    modal.classList.add("is-open");
    document.body.classList.add("modal-open");
  }

  function closeModal() {
    modal.classList.remove("is-open");
    document.body.classList.remove("modal-open");
  }

  function showPrev() {
    currentIndex = (currentIndex - 1 + items.length) % items.length;
    openModal(currentIndex);
  }

  function showNext() {
    currentIndex = (currentIndex + 1) % items.length;
    openModal(currentIndex);
  }

  items.forEach((item, index) => {
    item.addEventListener("click", function (e) {
      e.preventDefault();
      openModal(index);
    });
  });

  btnClose.addEventListener("click", closeModal);
  btnPrev.addEventListener("click", showPrev);
  btnNext.addEventListener("click", showNext);

  modal.addEventListener("click", function (e) {
    if (!modalDialog.contains(e.target)) {
      closeModal();
    }
  });

  document.addEventListener("keydown", function (e) {
    if (!modal.classList.contains("is-open")) return;
    if (e.key === "Escape") closeModal();
    if (e.key === "ArrowLeft") showPrev();
    if (e.key === "ArrowRight") showNext();
  });

  slider.addEventListener("mousedown", function (e) {
    isDown = true;
    slider.classList.add("dragging");
    startX = e.pageX - slider.offsetLeft;
    scrollLeft = slider.scrollLeft;
  });

  slider.addEventListener("mouseleave", function () {
    isDown = false;
    slider.classList.remove("dragging");
  });

  slider.addEventListener("mouseup", function () {
    isDown = false;
    slider.classList.remove("dragging");
  });

  slider.addEventListener("mousemove", function (e) {
    if (!isDown) return;
    e.preventDefault();
    const x = e.pageX - slider.offsetLeft;
    const walk = (x - startX) * 1.2;
    slider.scrollLeft = scrollLeft - walk;
  });

  modalDialog.addEventListener("touchstart", function (e) {
    touchStartX = e.changedTouches[0].screenX;
  }, { passive: true });

  modalDialog.addEventListener("touchend", function (e) {
    const touchEndX = e.changedTouches[0].screenX;
    const delta = touchEndX - touchStartX;
    if (Math.abs(delta) < 40) return;
    if (delta > 0) showPrev();
    else showNext();
  }, { passive: true });
}

function initCommentToggle() {
  const btn = document.querySelector("[data-comment-toggle]");
  const container = document.getElementById("comments-container");

  if (!btn || !container) return;

  btn.addEventListener("click", function () {
    const isHidden = container.classList.toggle("is-hidden");
    btn.textContent = isHidden ? "Tampilkan komentar" : "Sembunyikan komentar";
  });
}

function initCountdown() {
  const countdown = document.getElementById("countdown");
  if (!countdown) return;

  const konserDate = new Date("June 8, 2024 20:00:00").getTime();

  const timer = setInterval(function () {
    const now = new Date().getTime();
    const distance = konserDate - now;

    if (distance < 0) {
      clearInterval(timer);
      countdown.textContent = "Konser telah dimulai!";
      return;
    }

    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

    countdown.textContent = `${days} Hari ${hours} Jam ${minutes} Menit ${seconds} Detik`;
  }, 1000);
}