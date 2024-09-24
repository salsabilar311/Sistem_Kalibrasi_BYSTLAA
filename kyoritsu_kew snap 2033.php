<?php 
  include 'koneksi.php';
  session_start();
  $detail_order = $_GET['detail_order'];
  // YANG DIUBAH
  $periksa = mysqli_query($conn, "SELECT p.besaran_ukur
                                  FROM detail d
                                  INNER JOIN pengukuran p ON d.detail_order = p.detail_order
                                  WHERE d.detail_order = '$detail_order'");

  $arr = []; // Inisialisasi array untuk menyimpan besaran_ukur

  while ($ukur = mysqli_fetch_array($periksa)) {
      // Cek apakah besaran_ukur sudah ada di array
      if (!in_array($ukur['besaran_ukur'], $arr)) {
          $arr[] = $ukur['besaran_ukur']; // Tambahkan ke array jika belum ada
      }
  }
  // YANG DIUBAH

  // Tampilkan nilai-nilai yang unik
  // foreach ($arr as $besaran) {
  //     echo $besaran . "<br>"; // Atau sesuai format yang diinginkan
  // }

  // input data to database
  if(isset($_POST['submit'])){
    $besaran_ukur = $_POST['besaran_ukur'];
    $range = $_POST['range'];
    $standar = $_POST['standar'];
    $x1 = $_POST['x1'];
    $x2 = $_POST['x2'];
    $x3 = $_POST['x3'];
    $x4 = $_POST['x4'];
    $x5 = $_POST['x5'];
    $x6 = $_POST['x6'];
    $koreksi_standar = $_POST['koreksi_standar'];
    $std_deviasi = $_POST['std_deviasi'];
    $rata_rata_koreksi = $_POST['rata_rata_koreksi'];

    // Loop melalui data dan insert satu per satu
    foreach($standar as $index => $value):
        // Hitung rata-rata dari nilai x1 hingga x6
        $rata_rata = ($x1[$index] + $x2[$index] + $x3[$index] + $x4[$index] + $x5[$index] + $x6[$index]) / 6;
        $avg = number_format($rata_rata, 1) . " " . explode(' ', $range[$index])[1]; // Tambahkan satuan pada rata-rata

        // Query untuk insert setiap data pengukuran
        $sql = "INSERT INTO pengukuran (detail_order, besaran_ukur, range_, standar, x1, x2, x3, x4, x5, x6, rata_rata, koreksi_standar, std_dev, rata_rata_koreksi)
                VALUES ('$detail_order', '$besaran_ukur[$index]', '$range[$index]', '$standar[$index]', '$x1[$index]', '$x2[$index]', '$x3[$index]', '$x4[$index]', '$x5[$index]', '$x6[$index]', '$avg', '$koreksi_standar[$index]', '$std_deviasi[$index]', '$rata_rata_koreksi[$index]')";

        // Execute query untuk insert data
        $result = mysqli_query($conn, $sql);

        // Jika ada error pada query, hentikan proses dan tampilkan error
        if (!$result) {
          die(mysqli_error($conn));
        }
      endforeach;

    // Tambah progres setelah semua data berhasil disimpan
    $updateProgres = "UPDATE detail SET progres = progres + 1 WHERE detail_order = '$detail_order'";
    mysqli_query($conn, $updateProgres);
    
    $_SESSION['status'] = "Data Berhasil Ditambahkan";
    header('Location: input_pengukuran.php');
    exit();
}
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
              <li class=""><a href="index.php" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-home"></i> Beranda</a></li>
              <li class=""><a href="data_kalibrasi.php" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-table"></i> Form Data Kalibrasi</a></li>
              <li class=""><a href="input_pengukuran.php" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-keyboard"></i> Form Input Kalibrasi</a></li>
              <li class=""><a href="progres.php" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-chart-bar"></i> Form Progres Kalibrasi</a></li>
              <li class=""><a href="analisis.php" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-diagnoses"></i> Analisis Kalibrasi</a></li>
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
            <div class="row">
              <div class="col-6"><h4>Form Input Data Kyoritsu Kew Snap 2033</h4></div>
              <div class="col-6" style="text-align: right"><a href="input_pengukuran.php" class="btn btn-danger rounded-circle">X</a></div>              
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

              function hapusSemuaInput() {
                // Seleksi semua elemen input dalam tabel (sesuaikan selector jika perlu)
                const semuaInput = document.querySelectorAll('input');

                // Hapus setiap elemen input yang ditemukan
                semuaInput.forEach(input => {
                  input.parentNode.removeChild(input);
                });
              }
            </script>
            <!-- SCRIPT JAVASCRIPT (MENAMPILKAN RATA-RATA) -->
            
            <!-- YANG DIUBAH -->
            <!-- TABEL PENGUKURAN KALIBRASI -->

            <!-- END ARUS DC -->
            <?php
              if (!in_array('Arus DC', $arr) || empty($arr)):
            ?>
            <!-- ARUS DC -->
            <div class="row">
              <div class="card p-0 m-2">
                <form action="" method="POST">
                  <div class="card-header fw-bold">Pengukuran Arus DC</div>
                  <div class="card-body">
                    <table class="table-bordered table-sm fs-6" style="width: 100%">
                      <thead class="text-white bg-dark text-center">
                        <tr>
                          <td rowspan="2">Besaran Ukur</td>
                          <td rowspan="2">Range</td>
                          <td rowspan="2">Standar</td>
                          <td colspan="10">uut</td>
                        </tr>
                        <tr>
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
                        <tr class="text-center">
                          <td rowspan="8">Arus DC<input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Arus DC" readonly required></td>
                          <td rowspan="3">2 A<input type="hidden" style="width: 100px" name="range[]" id="range" value="2 A" readonly required></td>
                          <td class="text-end">2.00000 A<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="2.00000 A" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-1" name="x1[]" oninput="calculateAVG(1)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-1" name="x2[]" oninput="calculateAVG(1)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-1" name="x3[]" oninput="calculateAVG(1)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-1" name="x4[]" oninput="calculateAVG(1)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-1" name="x5[]" oninput="calculateAVG(1)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-1" name="x6[]" oninput="calculateAVG(1)" required></td>
                          <td id="avg-1">0<input type="hidden" name="rata_rata[]" data-row="1" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Arus DC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="2 A" readonly required>
                          <td class="text-end">5.00000 A<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="5.00000 A" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-2" name="x1[]" oninput="calculateAVG(2)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-2" name="x2[]" oninput="calculateAVG(2)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-2" name="x3[]" oninput="calculateAVG(2)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-2" name="x4[]" oninput="calculateAVG(2)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-2" name="x5[]" oninput="calculateAVG(2)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-2" name="x6[]" oninput="calculateAVG(2)" required></td>
                          <td id="avg-2">0<input type="hidden" name="rata_rata[]" data-row="2" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Arus DC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="2 A" readonly required>
                          <td class="text-end">10.0000 A<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="10.0000 A" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-3" name="x1[]" oninput="calculateAVG(3)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-3" name="x2[]" oninput="calculateAVG(3)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-3" name="x3[]" oninput="calculateAVG(3)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-3" name="x4[]" oninput="calculateAVG(3)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-3" name="x5[]" oninput="calculateAVG(3)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-3" name="x6[]" oninput="calculateAVG(3)" required></td>
                          <td id="avg-3">0<input type="hidden" name="rata_rata[]" data-row="3" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Arus DC" readonly required>
                          <td rowspan="4">40 A<input type="hidden" style="width: 100px" name="range[]" id="range" value="40 A" readonly required></td>
                          <td class="text-end">20.0000 A<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="20.0000 A" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-4" name="x1[]" oninput="calculateAVG(4)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-4" name="x2[]" oninput="calculateAVG(4)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-4" name="x3[]" oninput="calculateAVG(4)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-4" name="x4[]" oninput="calculateAVG(4)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-4" name="x5[]" oninput="calculateAVG(4)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-4" name="x6[]" oninput="calculateAVG(4)" required></td>
                          <td id="avg-4">0<input type="hidden" name="rata_rata[]" data-row="4" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Arus DC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="40 A" readonly required>
                          <td class="text-end">50.0000 A<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="50.0000 A" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-5" name="x1[]" oninput="calculateAVG(5)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-5" name="x2[]" oninput="calculateAVG(5)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-5" name="x3[]" oninput="calculateAVG(5)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-5" name="x4[]" oninput="calculateAVG(5)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-5" name="x5[]" oninput="calculateAVG(5)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-5" name="x6[]" oninput="calculateAVG(5)" required></td>
                          <td id="avg-5">0<input type="hidden" name="rata_rata[]" data-row="5" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Arus DC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="40 A" readonly required>
                          <td class="text-end">100.000 A<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="100.000 A" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-6" name="x1[]" oninput="calculateAVG(6)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-6" name="x2[]" oninput="calculateAVG(6)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-6" name="x3[]" oninput="calculateAVG(6)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-6" name="x4[]" oninput="calculateAVG(6)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-6" name="x5[]" oninput="calculateAVG(6)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-6" name="x6[]" oninput="calculateAVG(6)" required></td>
                          <td id="avg-6">0<input type="hidden" name="rata_rata[]" data-row="6" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Arus DC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="40 A" readonly required>
                          <td class="text-end">200.000 A<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="200.000 A" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-7" name="x1[]" oninput="calculateAVG(7)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-7" name="x2[]" oninput="calculateAVG(7)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-7" name="x3[]" oninput="calculateAVG(7)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-7" name="x4[]" oninput="calculateAVG(7)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-7" name="x5[]" oninput="calculateAVG(7)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-7" name="x6[]" oninput="calculateAVG(7)" required></td>
                          <td id="avg-7">0<input type="hidden" name="rata_rata[]" data-row="7" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Arus DC" readonly required>
                          <td rowspan="1">400 A<input type="hidden" style="width: 100px" name="range[]" id="range" value="400 A" readonly required></td>
                          <td class="text-end">300.000 A<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="300.000 A" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-8" name="x1[]" oninput="calculateAVG(8)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-8" name="x2[]" oninput="calculateAVG(8)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-8" name="x3[]" oninput="calculateAVG(8)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-8" name="x4[]" oninput="calculateAVG(8)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-8" name="x5[]" oninput="calculateAVG(8)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-8" name="x6[]" oninput="calculateAVG(8)" required></td>
                          <td id="avg-8">0<input type="hidden" name="rata_rata[]" data-row="8" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="btn pt-3 pb-1" style="float: right;">
                      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                      <button onclick="hapusSemuaInput()" class="btn btn-danger">Clear</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- ARUS DC -->
            <?php
              endif;
            ?>
            <!-- END ARUS DC -->

            <!-- END ARUS AC -->
            <?php
              if (!in_array('Arus AC', $arr) || empty($arr)):
            ?>
            <!-- ARUS AC -->
            <div class="row">
              <div class="card p-0 m-2">
                <form action="" method="POST">
                  <div class="card-header fw-bold">Pengukuran Arus AC</div>
                  <div class="card-body">
                    <table class="table-bordered table-sm fs-6" style="width: 100%">
                      <thead class="text-white bg-dark text-center">
                        <tr>
                          <td rowspan="2">Besaran Ukur</td>
                          <td rowspan="2">Range</td>
                          <td rowspan="2">Standar</td>
                          <td colspan="10">uut</td>
                        </tr>
                        <tr>
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
                      <tr class="text-center">
                          <td rowspan="8">Arus AC<input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Arus AC" readonly required></td>
                          <td rowspan="3">2 A<input type="hidden" style="width: 100px" name="range[]" id="range" value="2 A" readonly required></td>
                          <td class="text-end">2.00000 A<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="2.00000 A" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-9" name="x1[]" oninput="calculateAVG(9)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-9" name="x2[]" oninput="calculateAVG(9)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-9" name="x3[]" oninput="calculateAVG(9)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-9" name="x4[]" oninput="calculateAVG(9)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-9" name="x5[]" oninput="calculateAVG(9)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-9" name="x6[]" oninput="calculateAVG(9)" required></td>
                          <td id="avg-9">0<input type="hidden" name="rata_rata[]" data-row="9" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Arus AC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="2 A" readonly required>
                          <td class="text-end">5.00000 A<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="5.00000 A" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-10" name="x1[]" oninput="calculateAVG(10)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-10" name="x2[]" oninput="calculateAVG(10)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-10" name="x3[]" oninput="calculateAVG(10)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-10" name="x4[]" oninput="calculateAVG(10)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-10" name="x5[]" oninput="calculateAVG(10)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-10" name="x6[]" oninput="calculateAVG(10)" required></td>
                          <td id="avg-10">0<input type="hidden" name="rata_rata[]" data-row="10" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Arus AC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="2 A" readonly required>
                          <td class="text-end">10.0000 A<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="10.0000 A" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-11" name="x1[]" oninput="calculateAVG(11)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-11" name="x2[]" oninput="calculateAVG(11)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-11" name="x3[]" oninput="calculateAVG(11)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-11" name="x4[]" oninput="calculateAVG(11)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-11" name="x5[]" oninput="calculateAVG(11)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-11" name="x6[]" oninput="calculateAVG(11)" required></td>
                          <td id="avg-11">0<input type="hidden" name="rata_rata[]" data-row="11" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Arus AC" readonly required>
                          <td rowspan="4">40 A<input type="hidden" style="width: 100px" name="range[]" id="range" value="40 A" readonly required></td>
                          <td class="text-end">20.0000 A<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="20.0000 A" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-12" name="x1[]" oninput="calculateAVG(12)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-12" name="x2[]" oninput="calculateAVG(12)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-12" name="x3[]" oninput="calculateAVG(12)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-12" name="x4[]" oninput="calculateAVG(12)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-12" name="x5[]" oninput="calculateAVG(12)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-12" name="x6[]" oninput="calculateAVG(12)" required></td>
                          <td id="avg-12">0<input type="hidden" name="rata_rata[]" data-row="12" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Arus AC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="40 A" readonly required>
                          <td class="text-end">50.0000 A<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="50.0000 A" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-13" name="x1[]" oninput="calculateAVG(13)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-13" name="x2[]" oninput="calculateAVG(13)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-13" name="x3[]" oninput="calculateAVG(13)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-13" name="x4[]" oninput="calculateAVG(13)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-13" name="x5[]" oninput="calculateAVG(13)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-13" name="x6[]" oninput="calculateAVG(13)" required></td>
                          <td id="avg-13">0<input type="hidden" name="rata_rata[]" data-row="13" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Arus AC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="40 A" readonly required>
                          <td class="text-end">100.000 A<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="100.000 A" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-14" name="x1[]" oninput="calculateAVG(14)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-14" name="x2[]" oninput="calculateAVG(14)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-14" name="x3[]" oninput="calculateAVG(14)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-14" name="x4[]" oninput="calculateAVG(14)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-14" name="x5[]" oninput="calculateAVG(14)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-14" name="x6[]" oninput="calculateAVG(14)" required></td>
                          <td id="avg-14">0<input type="hidden" name="rata_rata[]" data-row="14" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Arus AC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="40 A" readonly required>
                          <td class="text-end">200.000 A<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="200.000 A" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-15" name="x1[]" oninput="calculateAVG(15)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-15" name="x2[]" oninput="calculateAVG(15)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-15" name="x3[]" oninput="calculateAVG(15)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-15" name="x4[]" oninput="calculateAVG(15)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-15" name="x5[]" oninput="calculateAVG(15)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-15" name="x6[]" oninput="calculateAVG(15)" required></td>
                          <td id="avg-15">0<input type="hidden" name="rata_rata[]" data-row="15" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Arus AC" readonly required>
                          <td rowspan="1">400 A<input type="hidden" style="width: 100px" name="range[]" id="range" value="40 A" readonly required></td>
                          <td class="text-end">300.000 A<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="300.000 A" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-16" name="x1[]" oninput="calculateAVG(16)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-16" name="x2[]" oninput="calculateAVG(16)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-16" name="x3[]" oninput="calculateAVG(16)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-16" name="x4[]" oninput="calculateAVG(16)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-16" name="x5[]" oninput="calculateAVG(16)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-16" name="x6[]" oninput="calculateAVG(16)" required></td>
                          <td id="avg-16">0<input type="hidden" name="rata_rata[]" data-row="16" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="btn pt-3 pb-1" style="float: right;">
                      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                      <button onclick="hapusSemuaInput()" class="btn btn-danger">Clear</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- ARUS AC -->
            <?php
              endif;
            ?>
            <!-- END ARUS AC -->

            <!-- TABEL PENGUKURAN KALIBRASI -->
                                      
          </div>                               
        </div>
                                
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!-- googleapis -->
    <!-- <script src="https://ajax.goggleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

    <!-- <script>
      $(".sidebar ul li").on("click", function () {
        $(".sidebar ul li.active").removeClass("active");
        $(this).addClass("active");
      });
    </script> -->
  </body>
</html>                       