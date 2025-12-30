<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

  <!--  👇 Bootstrap code file 👇-->
  <link rel="stylesheet" href="./assets/framework/bootsrap/css/bootstrap.min.css" />
  <!--  👇 box icons code file 👇-->
  <link rel="stylesheet" href="./assets/framework/boxicons/css/boxicons.min.css" />
  <!--  👇 swiper JS css code file 👇-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

  <!-- 👇 css code file 👇 -->
  <link rel="stylesheet" href="assets/css/global.css" />

  <title> Portfolio Rakha Dzikra</title>
</head>

<body>
  <!-- WRAPPER UTAMA UNTUK SEMUA KONTEN (KECUALI FOOTER) -->
  <div class="main-content">

    <!-- navbar start -->
    <?php include "layout/navbar.html"; ?>
    <!-- navbar end -->

    <!-- header start -->
    <section class="header-section" id="header">
      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-md-6">
            <p class="text-orange fw-semibold">Rakha Dzikra Guevara</p>
            <h1 class="header-title text-uppercase fw-bold mb-5">creative designed <br class="d-none d-md-block" />based in Pekanbaru</h1>

            <a href="#portfolio" class="header-skill d-inline-flex align-items-center gap-2 fs-5"> Web Development <i class="bx bx-right-arrow-alt"></i></a><br />
            <a href="#skills" class="header-skill d-inline-flex align-items-center gap-2 fs-5"> Mobile Development <i class="bx bx-right-arrow-alt"></i></a><br />
            <a href="#highlights" class="header-skill d-inline-flex align-items-center gap-2 fs-5"> Highlights Photography <i class="bx bx-right-arrow-alt"></i></a>

            <div class="d-flex align-items-center gap-4 mt-5 mb-3">
              <div class="d-flex align-items-center gap-2">
                <h2 class="header-skill fw-bold mb-0">03+</h2>
                <p class="text-secondary fs-7 mb-0">
                  Years of <br />
                  Experience
                </p>
              </div>
              <div class="d-flex align-items-center gap-2">
                <h2 class="header-skill fw-bold mb-0">00k</h2>
                <p class="text-secondary fs-7 mb-0">
                  Happy <br />
                  Costumers
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <img src="assets/img/rakha.jpg" class="header-image" alt="" />
          </div>
        </div>
      </div>
    </section>
    <!-- header end -->

    <!-- portfolio start -->
    <section class="portfolio-section" id="portfolio">
      <div class="container">
        <p class="text-orange fw-semibold" id="portfolio">Portfolio</p>
        <h2 class="section-title">project gallery</h2>

        <div class="swiper portfolio-swiper">
          <div class="swiper-wrapper">
            <?php
            $sql = "
  SELECT 
    project.*,
    kategori.nama_kategori
  FROM project
  JOIN kategori 
    ON project.kategori_project = kategori.id_kategori
  ORDER BY project.id_project ASC
  ";

            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>

              <div class="swiper-slide">
                <div class="card portfolio-card">
                  <div class="card-body">

                    <img src="assets/img/<?= $row['gambar']; ?>"
                      class="portfolio-image"
                      alt="<?= $row['judul_project']; ?>">

                    <h6 class="portfolio-title">
                      <?= $row['judul_project']; ?>
                    </h6>

                    <p class="portfolio-category">
                      <?= $row['nama_kategori']; ?>
                    </p>

                    <p class="portfolio-desc">
                      <?= $row['deksripsi']; ?>
                    </p>

                    <a href="<?= $row['link_project']; ?>"
                      target="_blank"
                      class="portfolio-link">
                      View project →
                    </a>

                  </div>
                </div>
              </div>

            <?php
            }
            ?>

          </div>
        </div>

        <div class="d-flex align-items-center justify-content-end gap-3">
          <button class="btn btn-light d-flex align-items-center justify-content-center btn-prev">
            <i class="bx bx-left-arrow-alt fs-5"></i>
          </button>
          <button class="btn btn-light d-flex align-items-center justify-content-center btn-next">
            <i class="bx bx-right-arrow-alt fs-5"></i>
          </button>
        </div>
      </div>
    </section>
    <!-- portfolio end -->

    <!-- SKILLS START -->
    <section class="skills-section" id="skills">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6 pb-5">
            <p class="text-orange fw-semibold">Skills</p>
            <h2 class="section-title text-white mb-5">Proggraming skills</h2>

            <div class="mb-3">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <p class="text-white text-uppercase fw-semibold mb-0">HTML 5</p>
                <p class="text-white text-uppercase mb-0">80%</p>
              </div>
              <div class="progress-bar">
                <span class="progress" style="width: 80%"></span>
              </div>
            </div>
            <div class="mb-3">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <p class="text-white text-uppercase fw-semibold mb-0">CSS</p>
                <p class="text-white text-uppercase mb-0">70%</p>
              </div>
              <div class="progress-bar">
                <span class="progress" style="width: 70%"></span>
              </div>
            </div>
            <div class="mb-3">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <p class="text-white text-uppercase fw-semibold mb-0">Javascript</p>
                <p class="text-white text-uppercase mb-0">65%</p>
              </div>
              <div class="progress-bar">
                <span class="progress" style="width: 65%"></span>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between mb-2">
              <p class="text-white text-uppercase fw-semibold mb-0">PYTHON</p>
              <p class="text-white text-uppercase mb-0">30%</p>
            </div>
            <div class="progress-bar">
              <span class="progress" style="width: 30%"></span>
            </div>
          </div>
        </div>
      </div>
  </div>
  </section>
  <!-- SKILLS END -->

  <!-- working periode start -->
  <section class="timeline-section" id="timeline">
    <div class="container">
      <p class="text-orange fw-semibold">Timeline</p>
      <h2 class="section-title">CERTIFICATE LICENSE</h2>

      <div class="row py-3 border-bottom">
        <div class="col md-4"> March 21, 2023 - today</div>
        <div class="col md-4"><a href="https://www.freecodecamp.org/certification/fcc9833abd3-dba0-42f1-8ef5-795cbafb659b/responsive-web-design " target="_blank" class="certificate">Responsive Web Design Certificate</a>
        </div>
        <div class="col md-4">Freecodecamp </div>
      </div>

      <div class="row py-3 border-bottom">
        <div class="col md-4">June 20, 2022 - today</div>
        <div class="col md-4"><a href="https://codepolitan.com/c/UOUJHNJ/" target="_blank" class="certificate">Basic Javascript Course</a> </div>
        <div class="col md-4">Codepolitan</div>
      </div>

      <div class="row py-3 border-bottom">
        <div class="col md-4">June 19, 2022 - today</div>
        <div class="col md-4"><a href="https://codepolitan.com/c/NXTOVAK/" target="_blank" class="certificate">Basic HTML & CSS Course</a> </div>
        <div class="col md-4">Codepolitan</div>
      </div>


    </div>
  </section>
  <!-- working periode end-->

  <!-- NEWS START -->
  <section class="portfolio-section" id="highlights">
    <div class="container">
      <p class="text-orange fw-semibold">Highlights</p>
      <h2 class="section-title">Photography</h2>

      <div class="swiper portfolio-swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="card">
              <div class="card-body">
                <img src="assets/img/IMG_8291.JPG" alt="" class="card-img-top rounded mb-3" />
                <h6 class="fw-semibold">COMING SOON</h6>
                <p class="text-secondary fs-7">COMING SOON</p>
                <a href="#" class="text-orange"> Coming soon</a>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="card">
              <div class="card-body">
                <img src="assets/img/IMG_8624.JPG" alt="" class="card-img-top rounded mb-3" />
                <h6 class="fw-semibold">COMING SOON</h6>
                <p class="text-secondary fs-7">COMING SOON</p>
                <a href="#" class="text-orange"> Coming soon</a>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="card">
              <div class="card-body">
                <img src="assets/img/IMG_8623.JPG" alt="" class="card-img-top rounded mb-3" />
                <h6 class="fw-semibold">COMING SOON</h6>
                <p class="text-secondary fs-7">COMING SOON</p>
                <a href="#" class="text-orange"> Coming soon</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="d-flex align-items-center justify-content-end gap-3">
        <button class="btn btn-light d-flex align-items-center justify-content-center btn-prev">
          <i class="bx bx-left-arrow-alt fs-5"></i>
        </button>
        <button class="btn btn-light d-flex align-items-center justify-content-center btn-next">
          <i class="bx bx-right-arrow-alt fs-5"></i>
        </button>
      </div>
    </div>
  </section>
  <!-- NEWS END -->

  <!-- CONTACTS START -->
  <section class="portfolio-section" id="contact">
    <div class="container">
      <div class="row align-item-center justify-content-between">
        <div class="col-md-6">
          <p class="text-orange fw-semibold">Contact</p>
          <h2 class="section-title">get in touch</h2>
          <p class="text-secondary mb-3">Web ini masi belum aktif ya, cuman website statis yang akan terus di update, TERIMAKASI SUDA BERKUNJUNG</p>

          <div class="d-flex align-items-center gap-2 mb-3">
            <i class="bx bx-map-pin text-orange fs-5"></i>
            <div class="mb-0">9812 Pekanbaru, Riau</div>
          </div>

          <div class="d-flex align-items-center gap-2 mb-3">
            <i class="bx bx-phone-call text-orange fs-5"></i>
            <div class="mb-0">+62 821 2528 2005</div>
          </div>

          <div class="d-flex align-items-center gap-2 mb-3">
            <i class="bx bx-envelope text-orange fs-5"></i>
            <div class="mb-0"> rakha.guevara2505@gmail.com</div>
          </div>

          <div class="d-flex align-items-center gap-2 mb-3">
            <i class="bx bx-globe text-orange fs-5"></i>
            <div class="mb-0">@rakhaguevara</div>
          </div>
        </div>
        <div class="col-md-5">
          <form action="#">
            <input type="text" name="name" placeholder="name" class="form-control rounded-0 mb-2" />
          </form>
          <form action="#">
            <input type="email" name="email" placeholder="email" class="form-control rounded-0 mb-2" />
          </form>
          <textarea name="body" id="body" cols="30" rows="3" placeholder="message" class="form-control rounded-0 mb-3"></textarea>

          <button class="btn btn-orange w-100 rounded-0">Submit</button>
        </div>
      </div>
    </div>
  </section>
  <!-- CONTACTS END -->

  </div>
  <!-- END OF main-content -->

  <!-- Footer start - DI LUAR main-content, TAPI MASIH DI DALAM body -->
  <?php include "layout/footer.html"; ?>
  <!-- footer end -->

  <!-- 👇 swiper JS code file 👇 -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

  <!-- 👇 javascript Bootstrap code file 👇 -->
  <script src="./assets/framework/bootsrap/js/bootstrap.bundle.min.js"></script>
  <!-- 👇 javascript code file 👇 -->
  <script src="./assets/js/index.js"></script>

  <!-- swiper js code -->
  <script>
    var swiper = new Swiper(".portfolio-swiper", {
      spaceBetween: 24,
      navigation: {
        nextEl: ".btn-next",
        prevEl: ".btn-prev",
      },
      breakpoints: {
        0: {
          slidesPerView: 1, // HP
        },
        576: {
          slidesPerView: 2, // Tablet
        },
        992: {
          slidesPerView: 3, // Desktop
        },
      },
    });
  </script>

</body>

</html>