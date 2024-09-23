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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  </head>
  <body class="homepage">
    <div class="index">
      <div class="main-container d-flex">
        <div class="sidebar" id="side_nav">
          <div class="header-box px-2 pt-3 pb-4">
            <img src="assets/img/image 1.svg" alt="" />
            <!-- <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i class="fal fa-stream"></i></button> -->
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
                <a href="progres.php" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-chart-bar"></i> Form Progres Kalibrasi</a>
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
                  <a class="nav-link dropdown-toggle" style="align-items: end;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
            <h4>History Data Kalibrasi</h4>

            <!-- ALERT DATA BERHASIL DITAMBAHKAN -->
            <?php
              session_start();
              if(isset($_SESSION['status'])):
            ?>
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
              <strong>
                <?php
                  echo $_SESSION['status'];
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </strong>
            </div>
            <?php 
              session_destroy();
              endif
            ?>
            <!-- ALERT DATA BERHASIL DITAMBAHKAN -->

            <!-- table view progres kalibrasi -->
            <div class="row">
                <div class="card col-12 p-0 m-2" style="width: 99%;">
                  <div class="card-body">
                    <table class="table-bordered table-sm fs-6 p-0" style="width: 100%;" >
                      <thead class="text-white bg-dark text-center">
                        <tr>
                          <td>No</td>
                          <td>No. Order</td>
                          <td>Asal</td>
                          <td>No. Seri</td>
                          <td>Tanggal Masuk</td>
                          <td>Action</td>
                        </tr>
                      </thead>
                      <tbody  class="text-center">
                      <?php
                        $data_kalibrasi = mysqli_query($conn, "SELECT d.detail_order, p.name_owner, d.tgl_masuk, d.no_seri, d.id_merk, d.id_tipe, d.progres
                                                                FROM detail d
                                                                INNER JOIN pemilik p ON d.region = p.region");
                        $row_number = 1;
                        while ($data=mysqli_fetch_array($data_kalibrasi)):
                          // memeriksa jika pengukuran sudah selesai maka tidak ditampilkan di tabel
                          if (
                            // Progres 6
                            ($data['id_merk'] == 1 && $data['id_tipe'] == 1 && $data['progres'] == 6) ||
                            ($data['id_merk'] == 2 && $data['id_tipe'] == 3 && $data['progres'] == 6) ||
                            ($data['id_merk'] == 2 && $data['id_tipe'] == 4 && $data['progres'] == 6) ||
                            ($data['id_merk'] == 1 && $data['id_tipe'] == 5 && $data['progres'] == 6) ||
                            ($data['id_merk'] == 1 && $data['id_tipe'] == 6 && $data['progres'] == 6) ||
                            ($data['id_merk'] == 1 && $data['id_tipe'] == 7 && $data['progres'] == 6) ||
                            ($data['id_merk'] == 1 && $data['id_tipe'] == 8 && $data['progres'] == 6) ||
                            ($data['id_merk'] == 1 && $data['id_tipe'] == 9 && $data['progres'] == 6) ||
                            ($data['id_merk'] == 2 && $data['id_tipe'] == 15 && $data['progres'] == 6) ||
                            ($data['id_merk'] == 3 && $data['id_tipe'] == 16 && $data['progres'] == 6) ||
                            ($data['id_merk'] == 4 && $data['id_tipe'] == 18 && $data['progres'] == 6) ||
                            ($data['id_merk'] == 4 && $data['id_tipe'] == 19 && $data['progres'] == 6) ||
                            ($data['id_merk'] == 4 && $data['id_tipe'] == 20 && $data['progres'] == 6) ||
                            // Progres 5
                            ($data['id_merk'] == 1 && $data['id_tipe'] == 2 && $data['progres'] == 5) ||
                            ($data['id_merk'] == 1 && $data['id_tipe'] == 10 && $data['progres'] == 5) ||
                            ($data['id_merk'] == 1 && $data['id_tipe'] == 11 && $data['progres'] == 5) ||
                            ($data['id_merk'] == 1 && $data['id_tipe'] == 12 && $data['progres'] == 5) ||
                            ($data['id_merk'] == 1 && $data['id_tipe'] == 13 && $data['progres'] == 5) ||
                            ($data['id_merk'] == 1 && $data['id_tipe'] == 14 && $data['progres'] == 5) ||
                            // Progres 2
                            ($data['id_merk'] == 4 && $data['id_tipe'] == 14 && $data['progres'] == 17)
                        ):                       
                      ?>
                          <tr>
                            <td><?= $row_number; ?></td>
                            <td><?= $data['detail_order']; ?></td>
                            <td><?= $data['name_owner']; ?></td>
                            <td><?= $data['no_seri']; ?></td>
                            <td><?= $data['tgl_masuk']; ?></td>
                            <td>
                              <div class="btn p-0">
                                <a href="history_kalibrasi.php?detail_order=<?= $data['detail_order']; ?>" class="btn btn-primary">Detail</a>
                                <a href="sertifikat.php?detail_order=<?= $data['detail_order']; ?>" class="btn btn-secondary">Cetak</a>
                            </div>
                            </td>
                          </tr>
                      <?php
                      $row_number++;
                      endif;
                    endwhile; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              
          </div>
          
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!-- <script src="https://ajax.goggleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

    <!-- <script>
      $(".sidebar ul li").on("click", function () {
        $(".sidebar ul li.active").removeClass("active");
        $(this).addClass("active");
      });
    </script> -->
  </body>
</html>