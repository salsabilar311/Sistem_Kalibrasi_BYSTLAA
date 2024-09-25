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
            <h4>Dashboard</h4>

            <!-- INFORMASI TOTAL KALIBRASI -->
            <div class="row g-3">
              <!-- MENGHITUNG TOTAL KALIBRASI -->
              <?php
                $sql = "SELECT d.detail_order FROM detail d";
                $result = mysqli_query($conn, $sql);
       
                $total_kalibrasi = 0;

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $total_kalibrasi++;
                    }
                }
              ?>
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-primary text-white mb-3" style="min-height: 130px;"> <!-- Atur min-height sesuai kebutuhan -->
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>Total Kalibrasi</div>
                                <div class="display-4"><?php echo $total_kalibrasi ?></div> <!-- Angka besar -->
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="progres.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                  <!-- MENGHITUNG KALIBRASI YANG MASIH DALAM PROSES -->
                  <?php
                      $data_kalibrasi = mysqli_query($conn, "SELECT d.detail_order, p.name_owner, d.tgl_masuk, d.no_seri, d.id_merk, d.id_tipe, d.progres
                                                              FROM detail d
                                                              INNER JOIN pemilik p ON d.region = p.region");
                      $kalibrasi_proses = 0;
                      while ($data=mysqli_fetch_array($data_kalibrasi)):
                        // memeriksa jika pengukuran sudah selesai maka tidak ditampilkan di tabel
                        if (!(
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
                          ($data['id_merk'] == 4 && $data['id_tipe'] == 17 && $data['progres'] == 2)
                      )){
                        $kalibrasi_proses++;
                      }
                    endwhile;                      
                    ?>
                    <div class="card bg-warning text-white mb-3" style="min-height: 130px;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>Kalibrasi yang Berlangsung</div>
                                <div class="display-4"><?php echo $kalibrasi_proses ?></div> <!-- Angka besar -->
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="input_pengukuran.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                  <!-- MENGHITUNG KALIBRASI YANG TELAH SELESAI -->
                  <?php
                    $kalibrasi_selesai = 0;
                    $data_kalibrasi = mysqli_query($conn, "SELECT d.detail_order, p.name_owner, d.tgl_masuk, d.no_seri, d.id_merk, d.id_tipe, d.progres
                                                            FROM detail d
                                                            INNER JOIN pemilik p ON d.region = p.region");
                    $row_number = 1;
                    while ($data=mysqli_fetch_array($data_kalibrasi)):
                      if(
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
                        ($data['id_merk'] == 4 && $data['id_tipe'] == 17 && $data['progres'] == 2)
                      ){
                        $kalibrasi_selesai++;
                      }
                    endwhile;
                  ?>
                    <div class="card bg-success text-white mb-3" style="min-height: 130px;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>Kalibrasi Selesai</div>
                                <div class="display-4"><?php echo $kalibrasi_selesai ?></div> <!-- Angka besar -->
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="analisis.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END INFORMASI TOTAL KALIBRASI -->

            <!-- CHART -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <div class="row">

                <!-- CHART JUMLAH KALIBRASI PERBULAN -->
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area me-1"></i>
                            Jumlah Kalibrasi Per Bulan
                        </div>
                        <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>

                        <?php
                          // Array untuk semua bulan
                          $all_months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

                          // Query untuk mengambil data hasil kalibrasi dan bulan dari database
                          $sql = "SELECT DATE_FORMAT(tgl_kalibrasi, '%b') AS bulan, COUNT(*) AS jumlah_kalibrasi 
                                  FROM detail
                                  GROUP BY MONTH(tgl_kalibrasi) 
                                  ORDER BY MONTH(tgl_kalibrasi)";
                          $result = mysqli_query($conn, $sql);

                          // Inisialisasi array untuk menyimpan data jumlah kalibrasi per bulan
                          $kalibrasi_per_bulan = array_fill(0, 12, 0); // Array 12 elemen, default 0

                          // Looping hasil query untuk mengisi jumlah kalibrasi ke dalam array
                          while ($row = mysqli_fetch_assoc($result)) {
                              $index_bulan = array_search($row['bulan'], $all_months);  // Cari index bulan
                              if ($index_bulan !== false) {
                                  $kalibrasi_per_bulan[$index_bulan] = $row['jumlah_kalibrasi'];  // Set nilai jumlah kalibrasi
                              }
                          }

                          // Encode data dalam format JSON untuk digunakan di JavaScript
                          $all_months_json = json_encode($all_months);
                          $kalibrasi_per_bulan_json = json_encode($kalibrasi_per_bulan);
                        ?>
                        <script>
                          // Ambil data bulan dan jumlah kalibrasi dari PHP
                          var bulan = <?php echo $all_months_json; ?>;
                          var jumlahKalibrasi = <?php echo $kalibrasi_per_bulan_json; ?>;

                          var ctx1 = document.getElementById("myAreaChart");
                          new Chart(ctx1, {
                            type: "line",
                            data: {
                              labels: bulan,  // Menggunakan data bulan dari PHP
                              datasets: [
                                {
                                  label: "Hasil Kalibrasi Multimeter",
                                  data: jumlahKalibrasi,  // Menggunakan data jumlah kalibrasi dari PHP
                                  borderWidth: 1,
                                  borderColor: 'rgba(75, 192, 192, 1)',
                                  backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                },
                              ],
                            },
                            options: {
                              scales: {
                                y: {
                                  beginAtZero: true,
                                },
                              },
                            },
                          });
                        </script>
                    </div>
                </div>
                <!-- END CHART JUMLAH KALIBRASI PERBULAN -->

                <!-- CHART KALIBRASI PER WILAYAH -->
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Grafik Kalibrasi Daop/Divre
                        </div>
                        <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                        <?php
                          include 'koneksi.php';

                          // Daftar semua region yang ingin ditampilkan
                          $all_regions = [
                              'BPSTL', 'BYSTLAA', 'LAA D1', 'LAA D6', 'STL D1', 'STL D2', 'STL D3', 'STL D4', 
                              'STL D5', 'STL D6', 'STL D7', 'STL D8', 'STL D9', 'STL DI', 'STL DII', 'STL DIII', 'STL DIV'
                          ];

                          // Query untuk mengambil data region dan menghitung jumlah per region
                          $sql = "SELECT region, COUNT(*) AS jumlah_region 
                                  FROM detail 
                                  GROUP BY region";
                          $result = mysqli_query($conn, $sql);

                          // Inisialisasi array untuk menyimpan jumlah data per region
                          $jumlah_per_region = array_fill(0, count($all_regions), 0); // Isi dengan 0 untuk semua region

                          // Looping hasil query untuk mengisi jumlah kalibrasi berdasarkan region yang ada di database
                          while ($row = mysqli_fetch_assoc($result)) {
                              $index_region = array_search($row['region'], $all_regions);  // Cari index region
                              if ($index_region !== false) {
                                  $jumlah_per_region[$index_region] = $row['jumlah_region'];  // Set nilai jumlah kalibrasi
                              }
                          }

                          // Encode data dalam format JSON untuk digunakan di JavaScript
                          $all_regions_json = json_encode($all_regions);
                          $jumlah_per_region_json = json_encode($jumlah_per_region);
                        ?>
                        <script>
                          // Ambil data region dan jumlah region dari PHP
                          var regions = <?php echo $all_regions_json; ?>;
                          var jumlahRegion = <?php echo $jumlah_per_region_json; ?>;

                          var ctx1 = document.getElementById("myBarChart");
                          new Chart(ctx1, {
                            type: "bar",  // Menggunakan bar chart
                            data: {
                              labels: regions,  // Menggunakan data region dari PHP
                              datasets: [
                                {
                                  label: "Hasil Kalibrasi Multimeter",
                                  data: jumlahRegion,  // Menggunakan data jumlah region dari PHP
                                  borderWidth: 1,
                                  backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                  borderColor: 'rgba(75, 192, 192, 1)',
                                },
                              ],
                            },
                            options: {
                              scales: {
                                y: {
                                  beginAtZero: true,  // Skala y dimulai dari 0
                                },
                              },
                            },
                          });
                        </script>
                    </div>
                </div>
                <!-- END CHART KALIBRASI PER WILAYAH -->
            </div>
            <!-- END CHART -->
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
<html>