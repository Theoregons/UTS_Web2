<?php 
    require 'function.php';
    $mahasiswa = query("SELECT * FROM data_mhs");
    
    if(isset($_POST["submit"])){  
      if(tambah($_POST) > 0 ){
          // echo "berhasil diubah";
      } else {
          // echo "Gagal diubah"; 
      }
    }

    if(isset($_POST["update"])){  
      if(ubah($_POST) > 0 ){
          echo "berhasil diubah";
      } else {
          echo "Gagal diubah"; 
      }
  }
  
    // if(isset($_POST["cari"])){  
    //   $mahasiswa = cari($_POST["keyword"]);
    // }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Arsha Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">UTS WEB 2</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">Data</a></li>
          <li><a class="nav-link scrollto" href="#contact">Tambah</a></li> 
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Informasi Buku Telepon Online</h1>
          <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione itaque vel, quaerat repudiandae iste illum placeat facilis! Expedita dolor.</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
           </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
 
    <!-- ======= About Us Section ======= -->
    <section id="about" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Data Telepon</h2>
          <p>Telusuri daftar lengkap nomor telepon yang dapat Anda lihat di sini.</p>
        </div>

        <div class="row">
          <?php foreach ($mahasiswa as $mhs) : ?>
            <div class="col-lg-6 my-3" data-aos="zoom-in" data-aos-delay="100">
              <div class="member d-flex align-items-start">
                <div class="pic"><img src="img/<?=$mhs['gambar']?>" class="img-fluid" alt=""></div>
                <div class="member-info">
                  <h4><?= $mhs['nama']; ?></h4>
                  <span>Nim : <?= $mhs['nim']; ?></span>
                  <p>Email : <?= $mhs['email']; ?></p>
                  <div class="social gap-2">
                    <a href=""><i class="ri-phone-fill"></i></a><?= $mhs['notlp']; ?> 
                  </div>
                  <div class="mt-3">  
                      <a href="ubah.php?id=<?=$mhs['id'];?>" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Edit
                      </a>   |
                      <a href="hapus.php?id=<?=$mhs['id'];?>">Hapus</a>
                  </div>
                </div>
              </div>
            </div> 
          <?php endforeach; ?> 
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="" method="post" class="php-email-form" enctype="multipart/form-data"> 
          <div class="modal-body">
                    <input type="hidden" name="id" id="id" required value="<?= $mhs["id"] ?>"> 
                    <div class="form-group my-3">
                        <label for="">NIM : </label>
                        <input class="form-control" type="text" name="nim" id="nim" required value="<?= $mhs["nim"] ?>">
                    </div>
                    <div class="form-group my-3">
                        <label for="">Nama : </label>
                        <input class="form-control" type="text" name="nama" id="nama" required value="<?= $mhs["nama"] ?>">
                    </div>
                    <div class="form-group my-3">
                        <label for="">Email : </label>
                        <input class="form-control" type="text" name="email" id="email" required value="<?= $mhs["email"] ?>">
                    </div>
                    <div class="form-group my-3">
                        <label for="">Jurusan : </label>
                        <input class="form-control" type="text" name="notlp" id="notlp" required value="<?= $mhs["notlp"] ?>">
                    </div>
                    <input type="hidden" name="gambar" id="gambar" required value="<?= $mhs["gambar"] ?>">                     
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-primary" type="update" name="update">Simpan</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="row">
          <div class="col-lg-9 text-center text-lg-start">
            <h3>Action</h3>
            <p> Perbarui informasi kontak Anda dengan mudah! Isi formulir di bawah ini untuk menambahkan nomor telepon baru Anda</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#contact">Call To Action</a>
          </div>
        </div>

      </div>
    </section><!-- End Cta Section -->
 
   
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Tambah Data Telepon</h2>
          <p>Perbarui informasi kontak Anda dengan mudah! Isi formulir di bawah ini untuk menambahkan nomor telepon baru Anda</p>
        </div>

        <div class="row"> 
              <div class="col-lg-12 mt-5 mt-lg-0 d-flex align-items-stretch">
                <form action="" method="post"  class="php-email-form" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="name">Foto</label>
                    <input type="file" class="form-control" name="gambar" id="" required>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="name">Nama</label>
                      <input type="text" name="nama" class="form-control" id="" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="name">NIM</label>
                      <input type="text" class="form-control" name="nim" id="" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="name">Nomor Telepon</label>
                    <input type="number" class="form-control" name="notlp" id="" required>
                  </div>
                  <div class="form-group"> 
                      <label for="name">Email</label>
                      <input type="email" class="form-control" name="email" id="email" required> 
                  </div>
                  <div class="my-3">
                    <div class="loading">Loading</div>
                    <!-- <div class="error-message"></div> -->
                    <div class="sent-message bg-success text-white p-3 text-center rounded-2">Tersimpan! Cek daftar kontak Anda sekarang.!</div>
                  </div>
                  <div class="text-center"><button type="submit" name="submit">Simpan Data</button></div>
                </form>
              </div>
        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
 

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Arsha</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script> 

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>