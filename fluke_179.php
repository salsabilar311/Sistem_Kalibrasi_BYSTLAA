<?php 
  include 'koneksi.php';
  $detail_order = $_GET['detail_order'];

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
    foreach($standar as $index => $value) {
        // Hitung rata-rata dari nilai x1 hingga x6
        $rata_rata = ($x1[$index] + $x2[$index] + $x3[$index] + $x4[$index] + $x5[$index] + $x6[$index]) / 6;
        $avg = number_format($rata_rata, 1) . " " . explode(' ', $range[$index])[1]; // Tambahkan satuan pada rata-rata

        // Query untuk insert setiap data pengukuran
        $sql = "INSERT INTO pengukuran (detail_order, besaran_ukur, range_, standar, x1, x2, x3, x4, x5, x6, rata_rata, koreksi_standar, std_dev, rata_rata_koreksi)
                VALUES ('$detail_order', '$besaran_ukur[$index]', '$range[$index]', '$standar[$index]', '$x1[$index]', '$x2[$index]', '$x3[$index]', '$x4[$index]', '$x5[$index]', '$x6[$index]', '$avg', '$koreksi_standar[$index]', '$std_deviasi[$index]', '$rata_rata_koreksi[$index]')";

        // Execute query untuk insert data
        $result = mysqli_query($conn, $sql);

        // Jika ada error pada query, hentikan proses dan tampilkan error
        if(!$result){
            die('Error: '. mysqli_error($conn));
        }
    }

    // Tampilkan pesan sukses jika semua data berhasil disimpan
    echo "Semua data berhasil disimpan ke database.";
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
              <div class="col-6"><h4>Form Input Data Fluke 179</h4></div>
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
            
            <!-- TABEL PENGUKURAN KALIBRASI -->
            <!-- TEGANGAN DC -->
            <div class="row">
              <div class="card p-0 m-2">
                <form action="" method="POST">
                  <div class="card-header fw-bold">Pengukuran Tegangan DC</div>
                  <div class="card-body">
                    <table class="table-bordered table-sm fs-6" style="width: 100%">
                      <thead class="text-white bg-dark text-center">
                        <tr>
                          <td rowspan="2">Besaran Ukur</td>
                          <td rowspan="2">Range</td>
                          <td rowspan="2">Standar</td>
                          <td colspan="12">uut</td>
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
                        <!-- TEGANGAN DC -->
                        <tr class="text-center">
                          <td rowspan="14">Tegangan DC<input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan DC" readonly required></td>
                          <td rowspan="3">600 mV<input type="hidden" style="width: 100px" name="range[]" id="range" value="600 mV" readonly required></td>
                          <td class="text-end">100.000 mV<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="100.000 mV" readonly required></td>
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
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan DC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="600 mV" readonly required>
                          <td class="text-end">0.300000 V<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="0.300000 V" readonly required></td>
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
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan DC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="600 mV" readonly required>
                          <td class="text-end">0.500000 V<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="0.500000 V" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-3" name="x1[]" oninput="calculateAVG(3)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-3" name="x2[]" oninput="calculateAVG(3)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-3" name="x3[]" oninput="calculateAVG(3)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-3" name="x4[]" oninput="calculateAVG(3)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-3" name="x5[]" oninput="calculateAVG(3)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-3" name="x6[]" oninput="calculateAVG(3)"required></td>
                          <td id="avg-3">0<input type="hidden" name="rata_rata[]" data-row="3" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan DC" readonly required>
                          <td rowspan="3">6 V<input type="hidden" style="width: 100px" name="range[]" id="range" value="6 V" readonly required></td>
                          <td class="text-end">1.000000 V<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="1.000000 V" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-4" name="x1[]" oninput="calculateAVG(4)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-4" name="x2[]" oninput="calculateAVG(4)"required></td>
                          <td><input type="text" style="width: 50px" id="x3-4" name="x3[]" oninput="calculateAVG(4)"required></td>
                          <td><input type="text" style="width: 50px" id="x4-4" name="x4[]" oninput="calculateAVG(4)"required></td>
                          <td><input type="text" style="width: 50px" id="x5-4" name="x5[]" oninput="calculateAVG(4)"required></td>
                          <td><input type="text" style="width: 50px" id="x6-4" name="x6[]" oninput="calculateAVG(4)"required></td>
                          <td id="avg-4">0<input type="hidden" name="rata_rata[]" data-row="4" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan DC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="6 V" readonly required>
                          <td class="text-end">3.00000 V<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="3.00000 V" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-5" name="x1[]" oninput="calculateAVG(5)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-5" name="x2[]" oninput="calculateAVG(5)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-5" name="x3[]" oninput="calculateAVG(5)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-5" name="x4[]" oninput="calculateAVG(5)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-5" name="x5[]" oninput="calculateAVG(5)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-5" name="x6[]" oninput="calculateAVG(5)" required></td>
                          <td id="avg-5">0<input type="hidden" name="rata_rata[]" data-row="5" value="0" readonly></td>
                          <td class="text-end">0,1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan DC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="6 V" readonly required>
                          <td class="text-end">5.00000 V<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="5.00000 V" readonly required></td>
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
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan DC" readonly required>
                          <td rowspan="3">60 V<input type="hidden" style="width: 100px" name="range[]" id="range" value="60 V" readonly required></td>
                          <td class="text-end">10.00000 V<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="10.00000 V" readonly required></td>
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
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan DC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="60 V" readonly required>
                          <td class="text-end">30.0000 V<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="30.0000 V" readonly required></td>
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
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan DC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="60 V" readonly required>
                          <td class="text-end">50.0000 V<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="50.0000 V" readonly required></td>
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
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan DC" readonly required>
                          <td rowspan="3">600 V<input type="hidden" style="width: 100px" name="range[]" id="range" value="600 V" readonly required></td>
                          <td class="text-end">100.0000 V<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="100.0000 V" readonly required></td>
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
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan DC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="600 V" readonly required>
                          <td class="text-end">300.000 V<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="300.000 V" readonly required></td>
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
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan DC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="600 V" readonly required>
                          <td class="text-end">500.000 V<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="500.000 V" readonly required></td>
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
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan DC" readonly required>
                          <td rowspan="2">1000 V<input type="hidden" style="width: 100px" name="range[]" id="range" value="1000 V" readonly required></td>
                          <td class="text-end">700.000 V<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="700.000 V" readonly required></td>
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
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan DC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="1000 V" readonly required>
                          <td class="text-end">1000.000 V<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="1000.000 V" readonly required></td>
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
            <!-- TEGANGAN DC -->

            <!-- TEGANGAN AC -->
            <div class="row">
              <div class="card p-0 m-2">
                <form action="" method="POST">
                  <div class="card-header fw-bold">Pengukuran Tegangan AC</div>
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
                          <td rowspan="14">Tegangan AC<input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan AC" readonly required></td>
                          <td rowspan="3">600 mV<input type="hidden" style="width: 100px" name="range[]" id="range" value="600 mV" readonly required></td>
                          <td class="text-end">100.000 mV<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="100.000 mV" readonly required></td>
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
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan AC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="600 mV" readonly required>
                          <td class="text-end">0.30000 V<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="0.30000 V" readonly required></td>
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
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan AC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="600 mV" readonly required>
                          <td class="text-end">0.50000 V<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="0.50000 V" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-17" name="x1[]" oninput="calculateAVG(17)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-17" name="x2[]" oninput="calculateAVG(17)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-17" name="x3[]" oninput="calculateAVG(17)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-17" name="x4[]" oninput="calculateAVG(17)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-17" name="x5[]" oninput="calculateAVG(17)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-17" name="x6[]" oninput="calculateAVG(17)" required></td>
                          <td id="avg-17">0<input type="hidden" name="rata_rata[]" data-row="17" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan AC" readonly required>
                          <td rowspan="3">6 V<input type="hidden" style="width: 100px" name="range[]" id="range" value="6 V" readonly required></td>
                          <td class="text-end">1.00000 V<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="1.00000 V" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-18" name="x1[]" oninput="calculateAVG(18)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-18" name="x2[]" oninput="calculateAVG(18)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-18" name="x3[]" oninput="calculateAVG(18)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-18" name="x4[]" oninput="calculateAVG(18)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-18" name="x5[]" oninput="calculateAVG(18)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-18" name="x6[]" oninput="calculateAVG(18)" required></td>
                          <td id="avg-18">0<input type="hidden" name="rata_rata[]" data-row="18" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan AC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="6 V" readonly required>
                          <td class="text-end">3.0000 V<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="3.0000 V" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-19" name="x1[]" oninput="calculateAVG(19)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-19" name="x2[]" oninput="calculateAVG(19)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-19" name="x3[]" oninput="calculateAVG(19)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-19" name="x4[]" oninput="calculateAVG(19)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-19" name="x5[]" oninput="calculateAVG(19)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-19" name="x6[]" oninput="calculateAVG(19)" required></td>
                          <td id="avg-19">0<input type="hidden" name="rata_rata[]" data-row="19" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan AC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="6 V" readonly required>
                          <td class="text-end">5.0000 V<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="5.0000 V" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-20" name="x1[]" oninput="calculateAVG(20)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-20" name="x2[]" oninput="calculateAVG(20)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-20" name="x3[]" oninput="calculateAVG(20)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-20" name="x4[]" oninput="calculateAVG(20)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-20" name="x5[]" oninput="calculateAVG(20)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-20" name="x6[]" oninput="calculateAVG(20)" required></td>
                          <td id="avg-20">0<input type="hidden" name="rata_rata[]" data-row="20" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan AC" readonly required>
                          <td rowspan="3">60 V<input type="hidden" style="width: 100px" name="range[]" id="range" value="60 V" readonly required></td>
                          <td class="text-end">10.0000 V<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="10.0000 V" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-21" name="x1[]" oninput="calculateAVG(21)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-21" name="x2[]" oninput="calculateAVG(21)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-21" name="x3[]" oninput="calculateAVG(21)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-21" name="x4[]" oninput="calculateAVG(21)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-21" name="x5[]" oninput="calculateAVG(21)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-21" name="x6[]" oninput="calculateAVG(21)" required></td>
                          <td id="avg-21">0<input type="hidden" name="rata_rata[]" data-row="21" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan AC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="60 V" readonly required>
                          <td class="text-end">30.000 V<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="30.000 V" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-22" name="x1[]" oninput="calculateAVG(22)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-22" name="x2[]" oninput="calculateAVG(22)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-22" name="x3[]" oninput="calculateAVG(22)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-22" name="x4[]" oninput="calculateAVG(22)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-22" name="x5[]" oninput="calculateAVG(22)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-22" name="x6[]" oninput="calculateAVG(22)" required></td>
                          <td id="avg-22">0<input type="hidden" name="rata_rata[]" data-row="22" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan AC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="60 V" readonly required>
                          <td class="text-end">50.000 V<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="50.000 V" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-23" name="x1[]" oninput="calculateAVG(23)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-23" name="x2[]" oninput="calculateAVG(23)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-23" name="x3[]" oninput="calculateAVG(23)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-23" name="x4[]" oninput="calculateAVG(23)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-23" name="x5[]" oninput="calculateAVG(23)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-23" name="x6[]" oninput="calculateAVG(23)" required></td>
                          <td id="avg-23">0<input type="hidden" name="rata_rata[]" data-row="23" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan AC" readonly required>
                          <td rowspan="3">600 V<input type="hidden" style="width: 100px" name="range[]" id="range" value="600 V" readonly required></td>
                          <td class="text-end">100.000 V<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="100.000 V" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-24" name="x1[]" oninput="calculateAVG(24)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-24" name="x2[]" oninput="calculateAVG(24)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-24" name="x3[]" oninput="calculateAVG(24)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-24" name="x4[]" oninput="calculateAVG(24)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-24" name="x5[]" oninput="calculateAVG(24)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-24" name="x6[]" oninput="calculateAVG(24)" required></td>
                          <td id="avg-24">0<input type="hidden" name="rata_rata[]" data-row="24" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan AC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="600 V" readonly required>
                          <td class="text-end">300.00 V<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="300.00 V" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-25" name="x1[]" oninput="calculateAVG(25)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-25" name="x2[]" oninput="calculateAVG(25)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-25" name="x3[]" oninput="calculateAVG(25)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-25" name="x4[]" oninput="calculateAVG(25)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-25" name="x5[]" oninput="calculateAVG(25)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-25" name="x6[]" oninput="calculateAVG(25)" required></td>
                          <td id="avg-25">0<input type="hidden" name="rata_rata[]" data-row="25" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan AC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="600 V" readonly required>
                          <td class="text-end">500.00 V<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="500.00 V" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-26" name="x1[]" oninput="calculateAVG(26)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-26" name="x2[]" oninput="calculateAVG(26)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-26" name="x3[]" oninput="calculateAVG(26)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-26" name="x4[]" oninput="calculateAVG(26)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-26" name="x5[]" oninput="calculateAVG(26)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-26" name="x6[]" oninput="calculateAVG(26)" required></td>
                          <td id="avg-26">0<input type="hidden" name="rata_rata[]" data-row="26" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan AC" readonly required>
                          <td rowspan="2">1000 V<input type="hidden" style="width: 100px" name="range[]" id="range" value="1000 V" readonly required></td>
                          <td class="text-end">700.00 V<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="700.00 V" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-27" name="x1[]" oninput="calculateAVG(27)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-27" name="x2[]" oninput="calculateAVG(27)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-27" name="x3[]" oninput="calculateAVG(27)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-27" name="x4[]" oninput="calculateAVG(27)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-27" name="x5[]" oninput="calculateAVG(27)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-27" name="x6[]" oninput="calculateAVG(27)" required></td>
                          <td id="avg-27">0<input type="hidden" name="rata_rata[]" data-row="27" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan AC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="1000 V" readonly required>
                          <td class="text-end">1000.00 V<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="1000.00 V" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-28" name="x1[]" oninput="calculateAVG(28)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-28" name="x2[]" oninput="calculateAVG(28)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-28" name="x3[]" oninput="calculateAVG(28)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-28" name="x4[]" oninput="calculateAVG(28)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-28" name="x5[]" oninput="calculateAVG(28)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-28" name="x6[]" oninput="calculateAVG(28)" required></td>
                          <td id="avg-28">0<input type="hidden" name="rata_rata[]" data-row="28" value="0" readonly></td>
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
            <!-- TEGANGAN AC -->

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
                          <td rowspan="6">Arus DC<input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Arus DC" readonly required></td>
                          <td rowspan="3">6 A<input type="hidden" style="width: 100px" name="range[]" id="range" value="6 A" readonly required></td>
                          <td class="text-end">50.0000 mA<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="50.0000 mA" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-29" name="x1[]" oninput="calculateAVG(29)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-29" name="x2[]" oninput="calculateAVG(29)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-29" name="x3[]" oninput="calculateAVG(29)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-29" name="x4[]" oninput="calculateAVG(29)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-29" name="x5[]" oninput="calculateAVG(29)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-29" name="x6[]" oninput="calculateAVG(29)" required></td>
                          <td id="avg-29">0<input type="hidden" name="rata_rata[]" data-row="29" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Arus DC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="6 A" readonly required>
                          <td class="text-end">0.300000 A<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="0.300000 A" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-30" name="x1[]" oninput="calculateAVG(30)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-30" name="x2[]" oninput="calculateAVG(30)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-30" name="x3[]" oninput="calculateAVG(30)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-30" name="x4[]" oninput="calculateAVG(30)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-30" name="x5[]" oninput="calculateAVG(30)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-30" name="x6[]" oninput="calculateAVG(30)" required></td>
                          <td id="avg-30">0<input type="hidden" name="rata_rata[]" data-row="30" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Arus DC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="6 A" readonly required>
                          <td class="text-end">2.000000 A<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="2.000000 A" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-31" name="x1[]" oninput="calculateAVG(31)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-31" name="x2[]" oninput="calculateAVG(31)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-31" name="x3[]" oninput="calculateAVG(31)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-31" name="x4[]" oninput="calculateAVG(31)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-31" name="x5[]" oninput="calculateAVG(31)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-31" name="x6[]" oninput="calculateAVG(31)" required></td>
                          <td id="avg-31">0<input type="hidden" name="rata_rata[]" data-row="31" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Arus DC" readonly required>
                          <td rowspan="3">10 A<input type="hidden" style="width: 100px" name="range[]" id="range" value="10 A" readonly required></td>
                          <td class="text-end">5.00000 A<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="5.00000 A" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-32" name="x1[]" oninput="calculateAVG(32)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-32" name="x2[]" oninput="calculateAVG(32)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-32" name="x3[]" oninput="calculateAVG(32)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-32" name="x4[]" oninput="calculateAVG(32)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-32" name="x5[]" oninput="calculateAVG(32)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-32" name="x6[]" oninput="calculateAVG(32)" required></td>
                          <td id="avg-32">0<input type="hidden" name="rata_rata[]" data-row="32" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Arus DC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="10 A" readonly required>
                          <td class="text-end">7.00000 A<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="7.00000 A" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-33" name="x1[]" oninput="calculateAVG(33)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-33" name="x2[]" oninput="calculateAVG(33)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-33" name="x3[]" oninput="calculateAVG(33)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-33" name="x4[]" oninput="calculateAVG(33)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-33" name="x5[]" oninput="calculateAVG(33)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-33" name="x6[]" oninput="calculateAVG(33)" required></td>
                          <td id="avg-33">0<input type="hidden" name="rata_rata[]" data-row="33" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Arus DC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="10 A" readonly required>
                          <td class="text-end">9.00000 A<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="9.00000 A" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-34" name="x1[]" oninput="calculateAVG(34)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-34" name="x2[]" oninput="calculateAVG(34)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-34" name="x3[]" oninput="calculateAVG(34)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-34" name="x4[]" oninput="calculateAVG(34)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-34" name="x5[]" oninput="calculateAVG(34)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-34" name="x6[]" oninput="calculateAVG(34)" required></td>
                          <td id="avg-34">0<input type="hidden" name="rata_rata[]" data-row="34" value="0" readonly></td>
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
                          <td rowspan="6">Arus AC<input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Arus AC" readonly required></td>
                          <td rowspan="4">6 A<input type="hidden" style="width: 100px" name="range[]" id="range" value="6 A" readonly required></td>
                          <td class="text-end">50.000 mA<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="50.000 mA" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-35" name="x1[]" oninput="calculateAVG(35)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-35" name="x2[]" oninput="calculateAVG(35)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-35" name="x3[]" oninput="calculateAVG(35)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-35" name="x4[]" oninput="calculateAVG(35)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-35" name="x5[]" oninput="calculateAVG(35)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-35" name="x6[]" oninput="calculateAVG(35)" required></td>
                          <td id="avg-35">0<input type="hidden" name="rata_rata[]" data-row="35" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Arus AC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="6 A" readonly required>
                          <td class="text-end">0.30000 A<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="0.30000 A" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-36" name="x1[]" oninput="calculateAVG(36)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-36" name="x2[]" oninput="calculateAVG(36)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-36" name="x3[]" oninput="calculateAVG(36)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-36" name="x4[]" oninput="calculateAVG(36)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-36" name="x5[]" oninput="calculateAVG(36)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-36" name="x6[]" oninput="calculateAVG(36)" required></td>
                          <td id="avg-36">0<input type="hidden" name="rata_rata[]" data-row="36" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Arus AC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="6 A" readonly required>
                          <td class="text-end">2.00000 A<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="2.00000 A" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-37" name="x1[]" oninput="calculateAVG(37)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-37" name="x2[]" oninput="calculateAVG(37)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-37" name="x3[]" oninput="calculateAVG(37)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-37" name="x4[]" oninput="calculateAVG(37)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-37" name="x5[]" oninput="calculateAVG(37)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-37" name="x6[]" oninput="calculateAVG(37)" required></td>
                          <td id="avg-37">0<input type="hidden" name="rata_rata[]" data-row="37" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Arus AC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="6 A" readonly required>
                          <td class="text-end">5.0000 A<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="5.0000 A" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-38" name="x1[]" oninput="calculateAVG(38)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-38" name="x2[]" oninput="calculateAVG(38)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-38" name="x3[]" oninput="calculateAVG(38)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-38" name="x4[]" oninput="calculateAVG(38)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-38" name="x5[]" oninput="calculateAVG(38)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-38" name="x6[]" oninput="calculateAVG(38)" required></td>
                          <td id="avg-38">0<input type="hidden" name="rata_rata[]" data-row="38" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Arus AC" readonly required>
                          <td rowspan="3">10 A<input type="hidden" style="width: 100px" name="range[]" id="range" value="10 A" readonly required></td>
                          <td class="text-end">7.0000 A<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="7.0000 A" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-39" name="x1[]" oninput="calculateAVG(39)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-39" name="x2[]" oninput="calculateAVG(39)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-39" name="x3[]" oninput="calculateAVG(39)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-39" name="x4[]" oninput="calculateAVG(39)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-39" name="x5[]" oninput="calculateAVG(39)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-39" name="x6[]" oninput="calculateAVG(39)" required></td>
                          <td id="avg-39">0<input type="hidden" name="rata_rata[]" data-row="39" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Arus AC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="10 A" readonly required>
                          <td class="text-end">9.0000 A<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="9.0000 A" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-40" name="x1[]" oninput="calculateAVG(40)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-40" name="x2[]" oninput="calculateAVG(40)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-40" name="x3[]" oninput="calculateAVG(40)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-40" name="x4[]" oninput="calculateAVG(40)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-40" name="x5[]" oninput="calculateAVG(40)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-40" name="x6[]" oninput="calculateAVG(40)" required></td>
                          <td id="avg-40">0<input type="hidden" name="rata_rata[]" data-row="40" value="0" readonly></td>
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

            <!-- RESISTANSI -->
            <div class="row">
              <div class="card p-0 m-2">
                <form action="" method="POST">
                  <div class="card-header fw-bold">Pengukuran Resistensi</div>
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
                          <td rowspan="7">Resistansi<input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Resistensi" readonly required></td>
                          <td rowspan="2">600 Ω<input type="hidden" style="width: 100px" name="range[]" id="range" value="600 Ω" readonly required></td>
                          <td class="text-end">10.197 Ω<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="10.197 Ω" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-41" name="x1[]" oninput="calculateAVG(41)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-41" name="x2[]" oninput="calculateAVG(41)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-41" name="x3[]" oninput="calculateAVG(41)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-41" name="x4[]" oninput="calculateAVG(41)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-41" name="x5[]" oninput="calculateAVG(41)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-41" name="x6[]" oninput="calculateAVG(41)" required></td>
                          <td id="avg-41">0<input type="hidden" name="rata_rata[]" data-row="41" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Resistensi" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="600 Ω" readonly required>
                          <td class="text-end">100.220 Ω<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="100.220 Ω" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-42" name="x1[]" oninput="calculateAVG(42)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-42" name="x2[]" oninput="calculateAVG(42)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-42" name="x3[]" oninput="calculateAVG(42)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-42" name="x4[]" oninput="calculateAVG(42)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-42" name="x5[]" oninput="calculateAVG(42)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-42" name="x6[]" oninput="calculateAVG(42)" required></td>
                          <td id="avg-42">0<input type="hidden" name="rata_rata[]" data-row="42" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Resistensi" readonly required>
                          <td rowspan="1">6 KΩ<input type="hidden" style="width: 100px" name="range[]" id="range" value="6 KΩ" readonly required></td>
                          <td class="text-end">1.000218 Ω<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="1.000218 Ω" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-43" name="x1[]" oninput="calculateAVG(43)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-43" name="x2[]" oninput="calculateAVG(43)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-43" name="x3[]" oninput="calculateAVG(43)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-43" name="x4[]" oninput="calculateAVG(43)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-43" name="x5[]" oninput="calculateAVG(43)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-43" name="x6[]" oninput="calculateAVG(43)" required></td>
                          <td id="avg-43">0<input type="hidden" name="rata_rata[]" data-row="43" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Resistensi" readonly required>
                          <td rowspan="1">60 KΩ<input type="hidden" style="width: 100px" name="range[]" id="range" value="60 KΩ" readonly required></td>
                          <td class="text-end">10.00028 Ω<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="10.00028 Ω" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-44" name="x1[]" oninput="calculateAVG(44)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-44" name="x2[]" oninput="calculateAVG(44)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-44" name="x3[]" oninput="calculateAVG(44)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-44" name="x4[]" oninput="calculateAVG(44)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-44" name="x5[]" oninput="calculateAVG(44)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-44" name="x6[]" oninput="calculateAVG(44)" required></td>
                          <td id="avg-44">0<input type="hidden" name="rata_rata[]" data-row="44" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Resistensi" readonly required>
                          <td rowspan="1">600 KΩ<input type="hidden" style="width: 100px" name="range[]" id="range" value="600 KΩ" readonly required></td>
                          <td class="text-end">100.0042 Ω<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="100.0042 Ω" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-45" name="x1[]" oninput="calculateAVG(45)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-45" name="x2[]" oninput="calculateAVG(45)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-45" name="x3[]" oninput="calculateAVG(45)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-45" name="x4[]" oninput="calculateAVG(45)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-45" name="x5[]" oninput="calculateAVG(45)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-45" name="x6[]" oninput="calculateAVG(45)" required></td>
                          <td id="avg-45">0<input type="hidden" name="rata_rata[]" data-row="45" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Resistensi" readonly required>
                          <td rowspan="1">6 MΩ<input type="hidden" style="width: 100px" name="range[]" id="range" value="6 MΩ" readonly required></td>
                          <td class="text-end">0.999960 MΩ<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="0.999960 MΩ" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-46" name="x1[]" oninput="calculateAVG(46)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-46" name="x2[]" oninput="calculateAVG(46)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-46" name="x3[]" oninput="calculateAVG(46)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-46" name="x4[]" oninput="calculateAVG(46)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-46" name="x5[]" oninput="calculateAVG(46)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-46" name="x6[]" oninput="calculateAVG(46)" required></td>
                          <td id="avg-46">0<input type="hidden" name="rata_rata[]" data-row="46" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Resistensi" readonly required>
                          <td rowspan="1">50 MΩ<input type="hidden" style="width: 100px" name="range[]" id="range" value="50 MΩ" readonly required></td>
                          <td class="text-end">10.00152 MΩ<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="10.00152 MΩ" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-47" name="x1[]" oninput="calculateAVG(47)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-47" name="x2[]" oninput="calculateAVG(47)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-47" name="x3[]" oninput="calculateAVG(47)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-47" name="x4[]" oninput="calculateAVG(47)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-47" name="x5[]" oninput="calculateAVG(47)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-47" name="x6[]" oninput="calculateAVG(47)" required></td>
                          <td id="avg-47">0<input type="hidden" name="rata_rata[]" data-row="47" value="0" readonly></td>
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
            <!-- RESISTENSI -->

            <!-- FREKUENSI -->
            <div class="row">
              <div class="card p-0 m-2">
                <form action="" method="POST">
                  <div class="card-header fw-bold">Pengukuran Frekuensi</div>
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
                          <td rowspan="12">Frekuensi<input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Frekuensi" readonly required></td>
                          <td rowspan="1">99.99 Hz<input type="hidden" style="width: 100px" name="range[]" id="range" value="99.99 Hz" readonly required></td>
                          <td class="text-end">50 Hz<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="50 Hz" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-48" name="x1[]" oninput="calculateAVG(48)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-48" name="x2[]" oninput="calculateAVG(48)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-48" name="x3[]" oninput="calculateAVG(48)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-48" name="x4[]" oninput="calculateAVG(48)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-48" name="x5[]" oninput="calculateAVG(48)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-48" name="x6[]" oninput="calculateAVG(48)" required></td>
                          <td id="avg-48">0<input type="hidden" name="rata_rata[]" data-row="48" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Frekuensi" readonly required>
                          <td rowspan="2">999.9 Hz<input type="hidden" style="width: 100px" name="range[]" id="range" value="999.9 Hz" readonly required></td>
                          <td class="text-end">100 Hz<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="100 Hz" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-49" name="x1[]" oninput="calculateAVG(49)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-49" name="x2[]" oninput="calculateAVG(49)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-49" name="x3[]" oninput="calculateAVG(49)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-49" name="x4[]" oninput="calculateAVG(49)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-49" name="x5[]" oninput="calculateAVG(49)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-49" name="x6[]" oninput="calculateAVG(49)" required></td>
                          <td id="avg-49">0<input type="hidden" name="rata_rata[]" data-row="49" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Frekuensi" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="999.99 Hz" readonly required>
                          <td class="text-end">500 Hz<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="500 Hz" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-50" name="x1[]" oninput="calculateAVG(50)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-50" name="x2[]" oninput="calculateAVG(50)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-50" name="x3[]" oninput="calculateAVG(50)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-50" name="x4[]" oninput="calculateAVG(50)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-50" name="x5[]" oninput="calculateAVG(50)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-50" name="x6[]" oninput="calculateAVG(50)" required></td>
                          <td id="avg-50">0<input type="hidden" name="rata_rata[]" data-row="50" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Frekuensi" readonly required>
                          <td rowspan="2">9.999 KHz<input type="hidden" style="width: 100px" name="range[]" id="range" value="9.999 KHz" readonly required></td>
                          <td class="text-end">1000 Hz<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="1000 Hz" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-51" name="x1[]" oninput="calculateAVG(51)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-51" name="x2[]" oninput="calculateAVG(51)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-51" name="x3[]" oninput="calculateAVG(51)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-51" name="x4[]" oninput="calculateAVG(51)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-51" name="x5[]" oninput="calculateAVG(51)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-51" name="x6[]" oninput="calculateAVG(51)" required></td>
                          <td id="avg-51">0<input type="hidden" name="rata_rata[]" data-row="51" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Frekuensi" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="9.999 KHz" readonly required>
                          <td class="text-end">5000 Hz<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="5000 Hz" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-52" name="x1[]" oninput="calculateAVG(52)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-52" name="x2[]" oninput="calculateAVG(52)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-52" name="x3[]" oninput="calculateAVG(52)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-52" name="x4[]" oninput="calculateAVG(52)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-52" name="x5[]" oninput="calculateAVG(52)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-52" name="x6[]" oninput="calculateAVG(52)" required></td>
                          <td id="avg-52">0<input type="hidden" name="rata_rata[]" data-row="52" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Frekuensi" readonly required>
                          <td rowspan="2">99.99 KHz<input type="hidden" style="width: 100px" name="range[]" id="range" value="99.99 KHz" readonly required></td>
                          <td class="text-end">10000 Hz<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="10000 Hz" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-53" name="x1[]" oninput="calculateAVG(53)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-53" name="x2[]" oninput="calculateAVG(53)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-53" name="x3[]" oninput="calculateAVG(53)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-53" name="x4[]" oninput="calculateAVG(53)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-53" name="x5[]" oninput="calculateAVG(53)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-53" name="x6[]" oninput="calculateAVG(53)" required></td>
                          <td id="avg-53">0<input type="hidden" name="rata_rata[]" data-row="53" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Frekuensi" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="99.99 KHz" readonly required></td>
                          <td class="text-end">50000 Hz<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="50000 Hz" readonly required></td>
                          <td><input type="text" style="width: 50px" id="x1-54" name="x1[]" oninput="calculateAVG(54)" required></td>
                          <td><input type="text" style="width: 50px" id="x2-54" name="x2[]" oninput="calculateAVG(54)" required></td>
                          <td><input type="text" style="width: 50px" id="x3-54" name="x3[]" oninput="calculateAVG(54)" required></td>
                          <td><input type="text" style="width: 50px" id="x4-54" name="x4[]" oninput="calculateAVG(54)" required></td>
                          <td><input type="text" style="width: 50px" id="x5-54" name="x5[]" oninput="calculateAVG(54)" required></td>
                          <td><input type="text" style="width: 50px" id="x6-54" name="x6[]" oninput="calculateAVG(54)" required></td>
                          <td id="avg-54">0<input type="hidden" name="rata_rata[]" data-row="54" value="0" readonly></td>
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
            <!-- FREKUENSI -->
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