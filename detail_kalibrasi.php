<?php 
  include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Kalibrasi - BYSTLAA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
  </head>
  <body class="homepage">
    <div class="index">
      <div class="main-container d-flex">
        <div class="sidebar" id="side_nav">
          <div class="header-box px-2 pt-3 pb-4">
            <img src="assets/img/image 1.svg" alt="" />
            <!-- <a class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i class="fal fa-stream"></i></a> -->
          </div>

          <div class="menu">
            <ul class="list-unstyled pt-3">
              <li class="">
                <a href="index.php" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-home"></i> Beranda</a>
              </li>
              <li class="">
                <a href="data_kalibrasi.php" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-table"></i> Form Data Kalibrasi</a>
              </li>
              <li class="">
                <a href="input_pengukuran.php" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-keyboard"></i> Form Input Pengukuran</a>
              </li>
              <li class="">
                <a href="progress.php" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-chart-bar"></i> Form Progres Kalibrasi</a>
              </li>
              <li class="">
                <a href="analisis.php" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-diagnoses"></i> Analisis Kalibrasi</a>
              </li>
            </ul>
          </div>


          <!-- <hr class="h-color mx-2" /> -->
        </div>
        

        <div class="content">
          <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex ms-auto p-2" role="profile">
                  <a class="nav-link dropdown-toggle" style="align-items: end;" href="#" role="a" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user-circle"></i>
                  </a>

                  <ul class="dropdown-menu nav-item dropdown-menu-end m-2">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Setting</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="log-in.php">Log Out</a></li>
                  </ul>
                </form>
              </div>
            </div>
          </nav>

          <div class="container-fluid p-4">
            <!-- header -->
            <div class="row">
              <div class="col-6"><h4>Detail Data Kalibrasi BYSTLAA</h4></div>
              <div class="col-6" style="text-align: right"><a href="data_kalibrasi.php" class="btn btn-danger rounded-circle">X</a></div>
            </div>

              <!-- tabel data kalibrasi -->
              <div class="row">
                <div class="card col-10 p-0 m-2" style="width: 99%;">
                  <div class="card-body">
                    <!-- no order -->
                    <?php
                      $detail_order = $_GET['detail_order'];
                      $query = "SELECT d.no_order, d.detail_order, m.nama_merk, t.nama_tipe, d.no_seri, d.tgl_kalibrasi, p.name_owner, d.calibrator, d.tgl_masuk, d.tgl_sertifikat 
                                FROM detail d
                                INNER JOIN merk m ON d.id_merk = m.id_merk
                                INNER JOIN tipe t ON d.id_tipe = t.id_tipe
                                INNER JOIN pemilik p ON d.region = p.region
                                WHERE d.detail_order = '$detail_order'";
                      $result = mysqli_query($conn, $query);
                      if ($data = mysqli_fetch_assoc($result)) {
                    ?>
                      <div class="row">
                        <div class="col-2">No. Order</div>
                        <div class="col-4"><?php echo ": " .$data['no_order']; ?></div>
                      </div>

                      <!-- detail order -->
                      <div class="row mt-2">
                        <div class="col-2">Detail Order</div>
                        <div class="col-4"><?php echo ": " .$data['detail_order']; ?></div>
                      </div>

                      <!-- nama alat -->
                      <div class="row mt-2">
                        <div class="col-2">Nama Alat</div>
                        <div class="col-4">: Digital multimeter</div>
                      </div>

                      <!-- merk -->
                      <div class="row mt-2">
                        <div class="col-2">Merk</div>
                        <div class="col-4"><?php echo ": " .$data['nama_merk']; ?></div>
                      </div>

                      <!-- tipe -->
                      <div class="row mt-2">
                        <div class="col-2">Tipe</div>
                        <div class="col-4"><?php echo ": " .$data['nama_tipe']; ?></div>
                      </div>

                      <!-- no seri -->
                      <div class="row mt-2">
                        <div class="col-2">No. Seri</div>
                        <div class="col-4"><?php echo ": " .$data['no_seri']; ?></div>
                      </div>

                      <!-- resolusi -->
                      <div class="row mt-2">
                        <div class="col-2">Resolusi</div>
                        <div class="col-4">: Multi resolusi</div>
                      </div>

                      <!-- alat standar -->
                      <div class="row mt-2">
                        <div class="col-2">Alat standar</div>
                        <div class="col-6">: Precision Multi Product Calibration Transmille, 3041A</div>
                      </div>
                      
                      <!-- metode kalibrasi -->
                      <div class="row mt-2">
                        <div class="col-2">Metode Kalibrasi</div>
                        <div class="col-4">: Perbandingan Langsung</div>
                      </div>

                      <!-- tempat -->
                      <div class="row mt-2">
                        <div class="col-2">Tempat</div>
                        <div class="col-4">: BYSTLAA</div>
                      </div>

                      <!-- tgl kalibrasi -->
                      <div class="row mt-2">
                        <div class="col-2">Tanggal Kalibrasi</div>
                        <div class="col-4"><?php echo ": " .$data['tgl_kalibrasi']; ?></div>
                      </div>

                      <!-- suhu -->
                      <div class="row mt-2">
                        <div class="col-2">Suhu</div>
                        <div class="col-4">: (23  ± 1.3)°С</div>
                      </div>
                      
                      <!-- kelembapan -->
                      <div class="row mt-2">
                        <div class="col-2">Kelembapan</div>
                        <div class="col-4">: (55± 3,1) %</div>
                      </div>

                      <!-- asal -->
                      <div class="row mt-2">
                        <div class="col-2">Asal</div>
                        <div class="col-4"><?php echo ": " .$data['name_owner']; ?></div>
                      </div>

                      <!-- kalibrator -->
                      <div class="row mt-2">
                        <div class="col-2">Kalibrator</div>
                        <div class="col-4"><?php echo ": " .$data['calibrator']; ?></div>
                      </div>

                      <!-- tgl masuk -->
                      <div class="row mt-2">
                        <div class="col-2">Tanggal Masuk</div>
                        <div class="col-4"><?php echo ": " .$data['tgl_masuk']; ?></div>
                      </div>

                      <!-- tgl sertifikat -->
                      <div class="row mt-2">
                        <div class="col-2">Tanggal Sertifikat</div>
                        <div class="col-4"><?php echo ": " .$data['tgl_sertifikat']; ?></div>
                      </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
              
          </div>
          
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!-- <script src="https://ajax.goggleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

    <script>
      $(".sidebar ul li").on("click", function () {
        $(".sidebar ul li.active").removeClass("active");
        $(this).addClass("active");
      });
    </script>
  </body>
    </html>
