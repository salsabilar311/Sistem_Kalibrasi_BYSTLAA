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
        $avg = number_format($rata_rata, 1) . " " . explode(' ', $range[0])[1]; // Tambahkan satuan pada rata-rata

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


    // if($result){
    //   echo "$besaran_ukur  ";
    //   echo "$range  ";
    //   echo "$standar  ";
    //   echo "$x1  ";
    //   echo "$x2  ";
    //   echo "$x3  ";
    //   echo "$x4  ";
    //   echo "$x5  ";
    //   echo "$x6  ";
    //   echo "$koreksi_standar  ";
    //   echo "$std_deviasi  ";
    //   echo "$rata_rata_koreksi  ";
    //   echo "$rata_rata  ";
    //   echo "$satuan ";
    // }
    // else{
    //   die(mysqli_error($conn));
    // }
  // input data to database
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
            <div class="row">
              <div class="col-6"><h4>Form Input Data Fluke 87 V</h4></div>
              <div class="col-6" style="text-align: right"><a href="input_pengukuran.php" class="btn btn-danger rounded-circle">X</a></div>
            </div>

            <!-- tabel pengukuran kalibrasi -->
            <!-- tampilkan hasil rata-rata -->
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
            </script>
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
                          <td class="text-end">100.0000 mV<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="100.0000 mV" readonly required></td>
                          <td><input type="text" style="width: 100px" id="x1-1" name="x1[]" oninput="calculateAVG(1)" required></td>
                          <td><input type="text" style="width: 100px" id="x2-1" name="x2[]" oninput="calculateAVG(1)" required></td>
                          <td><input type="text" style="width: 100px" id="x3-1" name="x3[]" oninput="calculateAVG(1)" required></td>
                          <td><input type="text" style="width: 100px" id="x4-1" name="x4[]" oninput="calculateAVG(1)" required></td>
                          <td><input type="text" style="width: 100px" id="x5-1" name="x5[]" oninput="calculateAVG(1)" required></td>
                          <td><input type="text" style="width: 100px" id="x6-1" name="x6[]" oninput="calculateAVG(1)" required></td>
                          <td id="avg-1">0<input type="hidden" name="rata_rata[]" data-row="1" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan DC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="600 mV" readonly required>
                          <td class="text-end">300.0000 mV<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="300.0000 mV" readonly required></td>
                          <td><input type="text" style="width: 100px" id="x1-2" name="x1[]" oninput="calculateAVG(2)" required></td>
                          <td><input type="text" style="width: 100px" id="x2-2" name="x2[]" oninput="calculateAVG(2)" required></td>
                          <td><input type="text" style="width: 100px" id="x3-2" name="x3[]" oninput="calculateAVG(2)" required></td>
                          <td><input type="text" style="width: 100px" id="x4-2" name="x4[]" oninput="calculateAVG(2)" required></td>
                          <td><input type="text" style="width: 100px" id="x5-2" name="x5[]" oninput="calculateAVG(2)" required></td>
                          <td><input type="text" style="width: 100px" id="x6-2" name="x6[]" oninput="calculateAVG(2)" required></td>
                          <td id="avg-2">0<input type="hidden" name="rata_rata[]" data-row="2" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>

                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan DC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="600 mV" readonly required>
                          <td class="text-end">500.000 mV<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="500.000 mV" readonly required></td>
                          <td><input type="text" style="width: 100px" id="x1-3" name="x1[]" oninput="calculateAVG(3)" required></td>
                          <td><input type="text" style="width: 100px" id="x2-3" name="x2[]" oninput="calculateAVG(3)" required></td>
                          <td><input type="text" style="width: 100px" id="x3-3" name="x3[]" oninput="calculateAVG(3)" required></td>
                          <td><input type="text" style="width: 100px" id="x4-3" name="x4[]" oninput="calculateAVG(3)" required></td>
                          <td><input type="text" style="width: 100px" id="x5-3" name="x5[]" oninput="calculateAVG(3)" required></td>
                          <td><input type="text" style="width: 100px" id="x6-3" name="x6[]" oninput="calculateAVG(3)"required></td>
                          <td id="avg-3">0<input type="hidden" name="rata_rata[]" data-row="3" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan DC" readonly required>
                          <td rowspan="3">6 V<input type="hidden" style="width: 100px" name="range[]" id="range" value="6 V" readonly required></td>
                          <td class="text-end">1.000 V<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="1.000 V" readonly required></td>
                          <td><input type="text" style="width: 100px" id="x1-4" name="x1[]" oninput="calculateAVG(4)" required></td>
                          <td><input type="text" style="width: 100px" id="x2-4" name="x2[]" oninput="calculateAVG(4)"required></td>
                          <td><input type="text" style="width: 100px" id="x3-4" name="x3[]" oninput="calculateAVG(4)"required></td>
                          <td><input type="text" style="width: 100px" id="x4-4" name="x4[]" oninput="calculateAVG(4)"required></td>
                          <td><input type="text" style="width: 100px" id="x5-4" name="x5[]" oninput="calculateAVG(4)"required></td>
                          <td><input type="text" style="width: 100px" id="x6-4" name="x6[]" oninput="calculateAVG(4)"required></td>
                          <td id="avg-4">0<input type="hidden" name="rata_rata[]" data-row="4" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan DC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="6 V" readonly required>
                          <td class="text-end">3.000 V<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="3.000 V" readonly required></td>
                          <td><input type="text" style="width: 100px" id="x1-5" name="x1[]" oninput="calculateAVG(5)" required></td>
                          <td><input type="text" style="width: 100px" id="x2-5" name="x2[]" oninput="calculateAVG(5)" required></td>
                          <td><input type="text" style="width: 100px" id="x3-5" name="x3[]" oninput="calculateAVG(5)" required></td>
                          <td><input type="text" style="width: 100px" id="x4-5" name="x4[]" oninput="calculateAVG(5)" required></td>
                          <td><input type="text" style="width: 100px" id="x5-5" name="x5[]" oninput="calculateAVG(5)" required></td>
                          <td><input type="text" style="width: 100px" id="x6-5" name="x6[]" oninput="calculateAVG(5)" required></td>
                          <td id="avg-5">0<input type="hidden" name="rata_rata[]" data-row="5" value="0" readonly></td>
                          <td class="text-end">0,1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan DC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="6 V" readonly required>
                          <td class="text-end">5.000 V<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="5.000 V" readonly required></td>
                          <td><input type="text" style="width: 100px" id="x1-6" name="x1[]" oninput="calculateAVG(6)" required></td>
                          <td><input type="text" style="width: 100px" id="x2-6" name="x2[]" oninput="calculateAVG(6)" required></td>
                          <td><input type="text" style="width: 100px" id="x3-6" name="x3[]" oninput="calculateAVG(6)" required></td>
                          <td><input type="text" style="width: 100px" id="x4-6" name="x4[]" oninput="calculateAVG(6)" required></td>
                          <td><input type="text" style="width: 100px" id="x5-6" name="x5[]" oninput="calculateAVG(6)" required></td>
                          <td><input type="text" style="width: 100px" id="x6-6" name="x6[]" oninput="calculateAVG(6)" required></td>
                          <td id="avg-6">0<input type="hidden" name="rata_rata[]" data-row="6" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan DC" readonly required>
                          <td rowspan="3">60 V<input type="hidden" style="width: 100px" name="range[]" id="range" value="60 V" readonly required></td>
                          <td class="text-end">10.000 V<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="10.000 V" readonly required></td>
                          <td><input type="text" style="width: 100px" id="x1-7" name="x1[]" oninput="calculateAVG(7)" required></td>
                          <td><input type="text" style="width: 100px" id="x2-7" name="x2[]" oninput="calculateAVG(7)" required></td>
                          <td><input type="text" style="width: 100px" id="x3-7" name="x3[]" oninput="calculateAVG(7)" required></td>
                          <td><input type="text" style="width: 100px" id="x4-7" name="x4[]" oninput="calculateAVG(7)" required></td>
                          <td><input type="text" style="width: 100px" id="x5-7" name="x5[]" oninput="calculateAVG(7)" required></td>
                          <td><input type="text" style="width: 100px" id="x6-7" name="x6[]" oninput="calculateAVG(7)" required></td>
                          <td id="avg-7">0<input type="hidden" name="rata_rata[]" data-row="7" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan DC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="60 V" readonly required>
                          <td class="text-end">30.000 V<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="30.000 V" readonly required></td>
                          <td><input type="text" style="width: 100px" id="x1-8" name="x1[]" oninput="calculateAVG(8)" required></td>
                          <td><input type="text" style="width: 100px" id="x2-8" name="x2[]" oninput="calculateAVG(8)" required></td>
                          <td><input type="text" style="width: 100px" id="x3-8" name="x3[]" oninput="calculateAVG(8)" required></td>
                          <td><input type="text" style="width: 100px" id="x4-8" name="x4[]" oninput="calculateAVG(8)" required></td>
                          <td><input type="text" style="width: 100px" id="x5-8" name="x5[]" oninput="calculateAVG(8)" required></td>
                          <td><input type="text" style="width: 100px" id="x6-8" name="x6[]" oninput="calculateAVG(8)" required></td>
                          <td id="avg-8">0<input type="hidden" name="rata_rata[]" data-row="8" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan DC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="60 V" readonly required>
                          <td class="text-end">50.000 V<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="50.000 V" readonly required></td>
                          <td><input type="text" style="width: 100px" id="x1-9" name="x1[]" oninput="calculateAVG(9)" required></td>
                          <td><input type="text" style="width: 100px" id="x2-9" name="x2[]" oninput="calculateAVG(9)" required></td>
                          <td><input type="text" style="width: 100px" id="x3-9" name="x3[]" oninput="calculateAVG(9)" required></td>
                          <td><input type="text" style="width: 100px" id="x4-9" name="x4[]" oninput="calculateAVG(9)" required></td>
                          <td><input type="text" style="width: 100px" id="x5-9" name="x5[]" oninput="calculateAVG(9)" required></td>
                          <td><input type="text" style="width: 100px" id="x6-9" name="x6[]" oninput="calculateAVG(9)" required></td>
                          <td id="avg-9">0<input type="hidden" name="rata_rata[]" data-row="9" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan DC" readonly required>
                          <td rowspan="3">600 V<input type="hidden" style="width: 100px" name="range[]" id="range" value="600 V" readonly required></td>
                          <td class="text-end">100.000 V<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="100.000 V" readonly required></td>
                          <td><input type="text" style="width: 100px" id="x1-10" name="x1[]" oninput="calculateAVG(10)" required></td>
                          <td><input type="text" style="width: 100px" id="x2-10" name="x2[]" oninput="calculateAVG(10)" required></td>
                          <td><input type="text" style="width: 100px" id="x3-10" name="x3[]" oninput="calculateAVG(10)" required></td>
                          <td><input type="text" style="width: 100px" id="x4-10" name="x4[]" oninput="calculateAVG(10)" required></td>
                          <td><input type="text" style="width: 100px" id="x5-10" name="x5[]" oninput="calculateAVG(10)" required></td>
                          <td><input type="text" style="width: 100px" id="x6-10" name="x6[]" oninput="calculateAVG(10)" required></td>
                          <td id="avg-10">0<input type="hidden" name="rata_rata[]" data-row="10" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan DC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="600 V" readonly required>
                          <td class="text-end">300.000 V<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="300.000 V" readonly required></td>
                          <td><input type="text" style="width: 100px" id="x1-11" name="x1[]" oninput="calculateAVG(11)" required></td>
                          <td><input type="text" style="width: 100px" id="x2-11" name="x2[]" oninput="calculateAVG(11)" required></td>
                          <td><input type="text" style="width: 100px" id="x3-11" name="x3[]" oninput="calculateAVG(11)" required></td>
                          <td><input type="text" style="width: 100px" id="x4-11" name="x4[]" oninput="calculateAVG(11)" required></td>
                          <td><input type="text" style="width: 100px" id="x5-11" name="x5[]" oninput="calculateAVG(11)" required></td>
                          <td><input type="text" style="width: 100px" id="x6-11" name="x6[]" oninput="calculateAVG(11)" required></td>
                          <td id="avg-11">0<input type="hidden" name="rata_rata[]" data-row="11" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan DC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="600 V" readonly required>
                          <td class="text-end">500.000 V<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="500.000 V" readonly required></td>
                          <td><input type="text" style="width: 100px" id="x1-12" name="x1[]" oninput="calculateAVG(12)" required></td>
                          <td><input type="text" style="width: 100px" id="x2-12" name="x2[]" oninput="calculateAVG(12)" required></td>
                          <td><input type="text" style="width: 100px" id="x3-12" name="x3[]" oninput="calculateAVG(12)" required></td>
                          <td><input type="text" style="width: 100px" id="x4-12" name="x4[]" oninput="calculateAVG(12)" required></td>
                          <td><input type="text" style="width: 100px" id="x5-12" name="x5[]" oninput="calculateAVG(12)" required></td>
                          <td><input type="text" style="width: 100px" id="x6-12" name="x6[]" oninput="calculateAVG(12)" required></td>
                          <td id="avg-12">0<input type="hidden" name="rata_rata[]" data-row="12" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan DC" readonly required>
                          <td rowspan="2">1000 V<input type="hidden" style="width: 100px" name="range[]" id="range" value="1000 V" readonly required></td>
                          <td class="text-end">700.000 V<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="700.000 V" readonly required></td>
                          <td><input type="text" style="width: 100px" id="x1-13" name="x1[]" oninput="calculateAVG(13)" required></td>
                          <td><input type="text" style="width: 100px" id="x2-13" name="x2[]" oninput="calculateAVG(13)" required></td>
                          <td><input type="text" style="width: 100px" id="x3-13" name="x3[]" oninput="calculateAVG(13)" required></td>
                          <td><input type="text" style="width: 100px" id="x4-13" name="x4[]" oninput="calculateAVG(13)" required></td>
                          <td><input type="text" style="width: 100px" id="x5-13" name="x5[]" oninput="calculateAVG(13)" required></td>
                          <td><input type="text" style="width: 100px" id="x6-13" name="x6[]" oninput="calculateAVG(13)" required></td>
                          <td id="avg-13">0<input type="hidden" name="rata_rata[]" data-row="13" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                        <tr class="text-center">
                          <input type="hidden" style="width: 100px" name="besaran_ukur[]" id="besaran_ukur" value="Tegangan DC" readonly required>
                          <input type="hidden" style="width: 100px" name="range[]" id="range" value="1000 V" readonly required>
                          <td class="text-end">1000.000 V<input type="hidden" style="width: 100px" name="standar[]" id="standar" value="1000.000 V" readonly required></td>
                          <td><input type="text" style="width: 100px" id="x1-14" name="x1[]" oninput="calculateAVG(14)" required></td>
                          <td><input type="text" style="width: 100px" id="x2-14" name="x2[]" oninput="calculateAVG(14)" required></td>
                          <td><input type="text" style="width: 100px" id="x3-14" name="x3[]" oninput="calculateAVG(14)" required></td>
                          <td><input type="text" style="width: 100px" id="x4-14" name="x4[]" oninput="calculateAVG(14)" required></td>
                          <td><input type="text" style="width: 100px" id="x5-14" name="x5[]" oninput="calculateAVG(14)" required></td>
                          <td><input type="text" style="width: 100px" id="x6-14" name="x6[]" oninput="calculateAVG(14)" required></td>
                          <td id="avg-14">0<input type="hidden" name="rata_rata[]" data-row="14" value="0" readonly></td>
                          <td class="text-end">0.1000 mV<input type="hidden" style="width: 100px" name="koreksi_standar[]" value="0.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="std_deviasi[]" value="1.1000 mV" readonly required></td>
                          <td class="text-end">1.1000 mV<input type="hidden" style="width: 100px" name="rata_rata_koreksi[]" value="1.1000 mV" readonly required></td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="btn pt-3 pb-0" style="float: right;">
                      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                      <a href="edit.html" class="btn btn-secondary">Edit</a>
                      <a href="delete.html" class="btn btn-danger">Clear</a>
                    </div>
                  </div>
                </form>
              </div>
              <!-- TEGANGAN DC -->

              <!-- TEGANGAN AC -->
              <div class="row">
                <div class="card p-0 m-2">
                  <div class="card-header fw-bold">Pengukuran Tegangan AC</div>
                  <form action="" method="POST">
                    <div class="card-body">
                  </form>
                  </div>
                </div>
              </div>
              <!-- TEGANGAN AC -->
