<?php 
  include 'koneksi.php';
  $detail_order = $_GET['detail_order'];

  // edit data to database
  if(isset($_POST['submit'])){
    $b_ukur = $_POST['besaran_ukur'];
    $range = $_POST['range'];
    $standar = $_POST['standar'];
    $x1 = $_POST['x1'];
    $x2 = $_POST['x2'];
    $x3 = $_POST['x3'];
    $x4 = $_POST['x4'];
    $x5 = $_POST['x5'];
    $x6 = $_POST['x6'];
    
    for($i = 0; $i < count($x1); $i++) {
      // hitung rata
      $rata_rata = ($x1[$i] + $x2[$i] + $x3[$i] + $x4[$i] + $x5[$i] + $x6[$i]) / 6;
      $avg = number_format($rata_rata, 1) . " " . explode(' ', $range[$i])[1];
      // echo "Detail order: " . $detail_order;
      // echo "Baris " . ($i + 1) . ":<br>";
      // echo "Besaran ukur: " . $b_ukur[$i] . "<br>";
      // echo "Range: " . $range[$i] . "<br>";
      // echo "Standar: " . $standar[$i] . "<br>";
      // echo "x1: " . $x1[$i] . "<br>";
      // echo "x2: " . $x2[$i] . "<br>";
      // echo "x3: " . $x3[$i] . "<br>";
      // echo "x4: " . $x4[$i] . "<br>";
      // echo "x5: " . $x5[$i] . "<br>";
      // echo "x6: " . $x6[$i] . "<br>";
      // echo "Rata-rata: " . $avg . "<br><br>";

      $sql = "UPDATE pengukuran
              SET x1 = '$x1[$i]', x2 = '$x2[$i]', x3 = '$x3[$i]', x4 = '$x4[$i]', x5 = '$x5[$i]', x6 = '$x6[$i]', rata_rata = '$avg'
              WHERE detail_order = '$detail_order' AND besaran_ukur = '$b_ukur[$i]' AND range_ = '$range[$i]' AND standar = '$standar[$i]'";

      $result = mysqli_query($conn, $sql);

      if(!$result){
        die("Query gagal: " . mysqli_error($conn));
      }
  }

  //   $sql = "UPDATE detail
  //           SET no_order = '$no_order',
  //           tgl_kalibrasi = '$tgl_kalibrasi',
  //           id_merk = '$merk',
  //           calibrator = '$calibrator',
  //           id_tipe = '$tipe',
  //           tgl_masuk = '$tgl_masuk',
  //           no_seri = '$no_seri',
  //           region = '$asal',
  //           tgl_sertifikat = '$tgl_sertifikat',
  //           detail_order = '$new_detail_order'
  //           WHERE no_order = '$no_order_from_detail'";
  //   $result=mysqli_query($conn, $sql);
  //   if($result){
  //     $_SESSION['status'] = "Data Berhasil Diubah";
  //     header('Location: data_kalibrasi.php');
  //     exit();
  //   }
  //   else{
  //     die(mysqli_error($conn));
  //   }
  }
  // edit data to database
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

            <!-- SCRIPT JAVASCRIPT (MENAMPILKAN RATA-RATA) -->
            <script>
              function calculateAVG(row) {
                  // Ambil nilai input x1 hingga x6
                  var x1 = parseFloat(document.getElementById('x1-' + row).value) || 0;
                  var x2 = parseFloat(document.getElementById('x2-' + row).value) || 0;
                  var x3 = parseFloat(document.getElementById('x3-' + row).value) || 0;
                  var x4 = parseFloat(document.getElementById('x4-' + row).value) || 0;
                  var x5 = parseFloat(document.getElementById('x5-' + row).value) || 0;
                  var x6 = parseFloat(document.getElementById('x6-' + row).value) || 0;

                  // Hitung rata-rata
                  var total = x1 + x2 + x3 + x4 + x5 + x6;
                  var average = total / 6;

                  // Tampilkan hasil rata-rata di elemen td
                  document.getElementById('avg-' + row).textContent = average.toFixed(1);
              }

              // function hapusSemuaInput() {
              //   // Seleksi semua elemen input dalam tabel (sesuaikan selector jika perlu)
              //   const semuaInput = document.querySelectorAll('input');

              //   // Hapus setiap elemen input yang ditemukan
              //   semuaInput.forEach(input => {
              //     input.parentNode.removeChild(input);
              //   });
              // }
            </script>
            <!-- SCRIPT JAVASCRIPT (MENAMPILKAN RATA-RATA) -->

            <!-- PENGUKURAN -->
              <div class="row">
                <div class="card p-0 m-2">
                  <form action="" method="POST">
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
                                                              
                            $row = 1;
                            while ($ukur = mysqli_fetch_array($pengukuran)):
                                echo "<tr>";
                                echo "<input type='hidden' name='besaran_ukur[]' value='" . $ukur['besaran_ukur'] . "' readonly>";
                                echo "<input type='hidden' name='range[]' value='" . $ukur['range_'] . "' readonly>";
                                echo "<input type='hidden' name='standar[]' value='" . $ukur['standar'] . "' readonly>";

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
                                    <td><input type='text' id='x1-$row' name='x1[]' value='" . $ukur['x1'] . "' class='form-control' oninput='calculateAVG($row)' required></td>
                                    <td><input type='text' id='x2-$row' name='x2[]' value='" . $ukur['x2'] . "' class='form-control' oninput='calculateAVG($row)' required></td>
                                    <td><input type='text' id='x3-$row' name='x3[]' value='" . $ukur['x3'] . "' class='form-control' oninput='calculateAVG($row)' required></td>
                                    <td><input type='text' id='x4-$row' name='x4[]' value='" . $ukur['x4'] . "' class='form-control' oninput='calculateAVG($row)' required></td>
                                    <td><input type='text' id='x5-$row' name='x5[]' value='" . $ukur['x5'] . "' class='form-control' oninput='calculateAVG($row)' required></td>
                                    <td><input type='text' id='x6-$row' name='x6[]' value='" . $ukur['x6'] . "' class='form-control' oninput='calculateAVG($row)' required></td>
                                    <td id='avg-" . $row . "'>" . $ukur['rata_rata'] . "<input type='hidden' name='rata_rata[]' data-row='" . $row . "' value='" . $ukur['rata_rata'] . "' readonly></td>
                                    <td>" . $ukur['koreksi_standar'] . "</td>
                                    <td>" . $ukur['std_dev'] . "</td>
                                    <td>" . $ukur['rata_rata_koreksi'] . "</td>
                                  </tr>";

                                // Simpan besaran_ukur dan range_ sebelumnya untuk perbandingan di baris berikutnya
                                $prev_besaran_ukur = $ukur['besaran_ukur'];
                                $prev_range = $ukur['range_'];
                                $row++;
                            endwhile;
                            ?>
                        </tbody>
                        </table>
                        <div class="d-grid gap-2 mt-2">
                          <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                          <!-- <button onclick="hapusSemuaInput()" class="btn btn-danger">Clear</button> -->
                        </div>
                      </div>
                  </form>
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
