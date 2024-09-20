<?php 
  include 'koneksi.php';
  $detail_order = $_GET['detail_order'];
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
            <!-- header -->
            <div class="row">
              <div class="col-6"><h4>Edit Data Pengukuran</h4></div>
              <div class="col-6" style="text-align: right"><a href="detail_progres_kalibrasi.php?detail_order=<?php echo $detail_order; ?>" class="btn btn-danger rounded-circle">X</a></div>
            </div>

            <!-- PENGUKURAN -->
              <div class="row">
                <div class="card p-0 m-2">
                <div class="card-header fw-bold">Data Pengukuran</div>
                  <div class="card-body">
                    <table class="table-bordered table-sm fs-6" style="width: 100%">
                      <thead class="text-white bg-dark text-center">
                        <tr>
                          <td>Besaran Ukur</td>
                          <td>Range</td>
                          <td>Standar</td>
                          <td>x1</td>
                          <td>x2</td>
                          <td>x3</td>
                          <td>x4</td>
                          <td>x5</td>
                          <td>x6</td>
                          <td>RATA-RATA</td>
                          <td>KOREKSI STANDAR</td>
                          <td>STD DEVIASI</td>
                          <td>RATA-RATA + KOREKSI</td>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        // Variabel untuk menyimpan besaran_ukur dan range_ sebelumnya
                        $prev_besaran_ukur = '';
                        $prev_range = '';

                        // Query untuk mengambil data pengukuran
                        $pengukuran = mysqli_query($conn, "SELECT p.besaran_ukur, p.range_, p.standar, p.x1, p.x2, p.x3, p.x4, p.x5, p.x6, p.rata_rata, p.koreksi_standar, p.std_dev, p.rata_rata_koreksi
                                                          FROM detail d
                                                          INNER JOIN pengukuran p ON d.detail_order = p.detail_order
                                                          WHERE d.detail_order = '$detail_order'");

                        while ($ukur = mysqli_fetch_array($pengukuran)) {
                            echo "<tr>";

                            // Jika besaran_ukur berubah, tampilkan dengan rowspan
                            if ($ukur['besaran_ukur'] != $prev_besaran_ukur) {
                                // Hitung jumlah baris yang memiliki besaran_ukur yang sama
                                $besaran_ukur_rowspan_query = "SELECT COUNT(*) as count FROM pengukuran 
                                                              WHERE besaran_ukur = '" . $ukur['besaran_ukur'] . "' 
                                                              AND detail_order = '$detail_order'";
                                $besaran_ukur_rowspan_result = mysqli_fetch_assoc(mysqli_query($conn, $besaran_ukur_rowspan_query));
                                $besaran_ukur_rowspan = $besaran_ukur_rowspan_result['count'];

                                // Tampilkan besaran_ukur dengan rowspan
                                echo "<td rowspan='$besaran_ukur_rowspan'>" . $ukur['besaran_ukur'] . "</td>";

                                // Reset prev_range karena besaran_ukur baru
                                $prev_range = '';
                            }

                            // Jika range_ berbeda dari sebelumnya, cek apakah perlu rowspan
                            if ($ukur['range_'] != $prev_range) {
                                // Hitung berapa banyak baris yang memiliki range_ yang sama dalam besaran_ukur yang sama
                                $range_rowspan_query = "SELECT COUNT(*) as count FROM pengukuran 
                                                        WHERE besaran_ukur = '" . $ukur['besaran_ukur'] . "' 
                                                        AND range_ = '" . $ukur['range_'] . "' 
                                                        AND detail_order = '$detail_order'";
                                $range_rowspan_result = mysqli_fetch_assoc(mysqli_query($conn, $range_rowspan_query));
                                $range_rowspan = $range_rowspan_result['count'];

                                // Jika ada lebih dari satu baris dengan range_ yang sama, gunakan rowspan
                                if ($range_rowspan > 1) {
                                    echo "<td rowspan='$range_rowspan'>" . $ukur['range_'] . "</td>";
                                } else {
                                    echo "<td>" . $ukur['range_'] . "</td>";
                                }
                            }

                            // Tampilkan kolom lainnya pada setiap baris
                            echo "
                                <td>" . $ukur['standar'] . "</td>
                                <td>" . $ukur['x1'] . "</td>
                                <td>" . $ukur['x2'] . "</td>
                                <td>" . $ukur['x3'] . "</td>
                                <td>" . $ukur['x4'] . "</td>
                                <td>" . $ukur['x5'] . "</td>
                                <td>" . $ukur['x6'] . "</td>
                                <td>" . $ukur['rata_rata'] . "</td>
                                <td>" . $ukur['koreksi_standar'] . "</td>
                                <td>" . $ukur['std_dev'] . "</td>
                                <td>" . $ukur['rata_rata_koreksi'] . "</td>
                              </tr>";

                            // Simpan besaran_ukur dan range_ sebelumnya untuk perbandingan di baris berikutnya
                            $prev_besaran_ukur = $ukur['besaran_ukur'];
                            $prev_range = $ukur['range_'];
                        }
                        ?>
                    </tbody>
                    </table>
                  </div>
                </div>
              </div>
            <!-- PENGUKURAN -->

          
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
