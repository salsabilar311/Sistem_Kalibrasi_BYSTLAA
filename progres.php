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
            <h4>Progres Kalibrasi BYSTLAA</h4>

              <!-- table view progres kalibrasi -->
              <div class="row">
                <div class="card col-12 p-0 m-2" style="width: 99%;">
                  <div class="card-body">
                    <table class="table-bordered table-sm fs-6 p-0" style="width: 100%;" >
                      <thead class="text-white bg-dark text-center">
                        <tr>
                          <td>No</td>
                          <td>No. Order</td>
                          <td>Pemilik</td>
                          <td>Tanggal Kalibrasi</td>
                          <td>Progres</td>
                          <td>Action</td>
                        </tr>
                      </thead>
                      <tbody  class="text-center">
                      <?php
                        $data_kalibrasi = mysqli_query($conn, "SELECT d.detail_order, p.name_owner, d.tgl_kalibrasi, d.progres, d.id_tipe, d.id_merk
                                                                FROM detail d
                                                                INNER JOIN pemilik p ON d.region = p.region");
                        $row_number = 1;
                        while ($data=mysqli_fetch_array($data_kalibrasi)){
                          $progress_current = $data['progres'];
                          $progress_max = 1; // Default max
                      
                          // Tentukan progres maksimum berdasarkan tipe dan merk
                          if (
                              // Progres max 6
                              ($data['id_merk'] == 1 && $data['id_tipe'] == 1) ||
                              ($data['id_merk'] == 2 && $data['id_tipe'] == 3) ||
                              ($data['id_merk'] == 2 && $data['id_tipe'] == 4) ||
                              ($data['id_merk'] == 1 && $data['id_tipe'] == 5) ||
                              ($data['id_merk'] == 1 && $data['id_tipe'] == 6) ||
                              ($data['id_merk'] == 1 && $data['id_tipe'] == 7) ||
                              ($data['id_merk'] == 1 && $data['id_tipe'] == 8) ||
                              ($data['id_merk'] == 1 && $data['id_tipe'] == 9) ||
                              ($data['id_merk'] == 2 && $data['id_tipe'] == 15) ||
                              ($data['id_merk'] == 3 && $data['id_tipe'] == 16) ||
                              ($data['id_merk'] == 4 && $data['id_tipe'] == 18) ||
                              ($data['id_merk'] == 4 && $data['id_tipe'] == 19) ||
                              ($data['id_merk'] == 4 && $data['id_tipe'] == 20)
                          ) {
                              $progress_max = 6; // Maksimum 6
                          } elseif (
                              // Progres max 5
                              ($data['id_merk'] == 1 && $data['id_tipe'] == 2) ||
                              ($data['id_merk'] == 1 && $data['id_tipe'] == 10) ||
                              ($data['id_merk'] == 1 && $data['id_tipe'] == 11) ||
                              ($data['id_merk'] == 1 && $data['id_tipe'] == 12) ||
                              ($data['id_merk'] == 1 && $data['id_tipe'] == 13) ||
                              ($data['id_merk'] == 1 && $data['id_tipe'] == 14)
                          ) {
                              $progress_max = 5; // Maksimum 5
                          } elseif (
                              // Progres max 2
                              ($data['id_merk'] == 4 && $data['id_tipe'] == 14) ||
                              ($data['id_merk'] == 4 && $data['id_tipe'] == 17)
                          ) {
                              $progress_max = 2; // Maksimum 2
                          }
                      
                          // Hitung persentase progres
                          $progress_percentage = ($progress_current / $progress_max) * 100;
                      ?>
                          <tr>
                            <td><?= $row_number; ?></td>
                            <td><?= $data['detail_order']; ?></td>
                            <td><?= $data['name_owner']; ?></td>
                            <td><?= $data['tgl_kalibrasi']; ?></td>
                            <td>
                              <div class="progress" role="progressbar" aria-label="Basic Example" aria-valuenow="<?= $progress_percentage; ?>" aria-valuemin="0" aria-valuemax="100">
                                  <div class="progress-bar" style="width: <?= $progress_percentage; ?>%"></div>
                              </div>
                            </td>
                            <td>
                              <div class="btn d-flex justify-content-center gap-1 p-0">
                                <a href="detail_progres_kalibrasi.php?detail_order=<?= $data['detail_order']; ?>" class="btn btn-info">Detail</a>
                                <a href="delete.php" class="btn btn-danger">Delete</a>
                            </div>
                            </td>
                          </tr>
                      <?php
                      $row_number++;
                      } ?>
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

    <script>
      $(".sidebar ul li").on("click", function () {
        $(".sidebar ul li.active").removeClass("active");
        $(this).addClass("active");
      });
    </script>
  </body>
    </html>
