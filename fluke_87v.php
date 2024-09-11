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
            <h4>Input Pengukuran Kalibrasi</h4>

            <!-- button no order -->
            <div class="dropdown">
              <a class="btn btn-primary dropdown-toggle" style="width: 200px;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                No. Order
              </a>
              <ul class="dropdown-menu">
                <?php
                  $data_kalibrasi = mysqli_query($conn, "SELECT * FROM detail");
                  foreach($data_kalibrasi as $row) {
                ?>
                <li><a class="dropdown-item" href="#"><?php echo $row['detail_order']; ?></a></li>
                <?php } ?>
              </ul>
            </div>

            <!-- tabel pengukuran kalibrasi -->
            <div class="row">
                <div class="card p-0 m-2">
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
                          <td rowspan="14">Tegangan DC</td>
                          <td rowspan="3">600 mV</td>
                          <td class="text-end">100,0000 mV</td>
                          <td><input type="text" style="width: 100px"></td>
                          <td><input type="text" style="width: 100px"></td>
                          <td><input type="text" style="width: 100px"></td>
                          <td><input type="text" style="width: 100px"></td>
                          <td><input type="text" style="width: 100px"></td>
                          <td><input type="text" style="width: 100px"></td>
                          <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                          <td class="text-end">0,1000mV</td>
                          <td class="text-end">1,1000mV</td>
                          <td class="text-end">1,1000mV</td>
                        </tr>
                        <tr class="text-center">
                          <td class="text-end">300,000 mV</td>
                          <td><input type="text" style="width: 100px"></td>
                          <td><input type="text" style="width: 100px"></td>
                          <td><input type="text" style="width: 100px"></td>
                          <td><input type="text" style="width: 100px"></td>
                          <td><input type="text" style="width: 100px"></td>
                          <td><input type="text" style="width: 100px"></td>
                          <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                          <td class="text-end">0,1000mV</td>
                          <td class="text-end">1,1000mV</td>
                          <td class="text-end">1,1000mV</td>
                        </tr>
                        <tr class="text-center">
                            <td class="text-end">500,000 mV</td>
                            <td><input type="text" style="width: 100px"></td>
                            <td><input type="text" style="width: 100px"></td>
                            <td><input type="text" style="width: 100px"></td>
                            <td><input type="text" style="width: 100px"></td>
                            <td><input type="text" style="width: 100px"></td>
                            <td><input type="text" style="width: 100px"></td>
                            <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                            <td class="text-end">0,1000mV</td>
                            <td class="text-end">1,1000mV</td>
                            <td class="text-end">1,1000mV</td>
                        </tr>     
                        <tr class="text-center">
                          <td rowspan="3">6 V</td>
                          <td class="text-end">1,000 V</td>
                          <td><input type="text" style="width: 100px"></td>
                          <td><input type="text" style="width: 100px"></td>
                          <td><input type="text" style="width: 100px"></td>
                          <td><input type="text" style="width: 100px"></td>
                          <td><input type="text" style="width: 100px"></td>
                          <td><input type="text" style="width: 100px"></td>
                          <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                          <td class="text-end">0,1000mV</td>
                          <td class="text-end">1,1000mV</td>
                          <td class="text-end">1,1000mV</td>
                        </tr>
                        <tr class="text-center">
                            <td class="text-end">3,000 V</td>
                            <td><input type="text" style="width: 100px"></td>
                            <td><input type="text" style="width: 100px"></td>
                            <td><input type="text" style="width: 100px"></td>
                            <td><input type="text" style="width: 100px"></td>
                            <td><input type="text" style="width: 100px"></td>
                            <td><input type="text" style="width: 100px"></td>
                            <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                            <td class="text-end">0,1000mV</td>
                            <td class="text-end">1,1000mV</td>
                            <td class="text-end">1,1000mV</td>
                          </tr>
                          <tr class="text-center">
                            <td class="text-end">5,000 V</td>
                            <td><input type="text" style="width: 100px"></td>
                            <td><input type="text" style="width: 100px"></td>
                            <td><input type="text" style="width: 100px"></td>
                            <td><input type="text" style="width: 100px"></td>
                            <td><input type="text" style="width: 100px"></td>
                            <td><input type="text" style="width: 100px"></td>
                            <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                            <td class="text-end">0,1000mV</td>
                            <td class="text-end">1,1000mV</td>
                            <td class="text-end">1,1000mV</td>
                          </tr>
                          <tr class="text-center">
                            <td rowspan="3">60 V</td>
                            <td class="text-end">10,000 V</td>
                            <td><input type="text" style="width: 100px"></td>
                            <td><input type="text" style="width: 100px"></td>
                            <td><input type="text" style="width: 100px"></td>
                            <td><input type="text" style="width: 100px"></td>
                            <td><input type="text" style="width: 100px"></td>
                            <td><input type="text" style="width: 100px"></td>
                            <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                            <td class="text-end">0,1000mV</td>
                            <td class="text-end">1,1000mV</td>
                            <td class="text-end">1,1000mV</td>
                          </tr>
                          <tr class="text-center">
                              <td class="text-end">30,000 V</td>
                              <td><input type="text" style="width: 100px"></td>
                              <td><input type="text" style="width: 100px"></td>
                              <td><input type="text" style="width: 100px"></td>
                              <td><input type="text" style="width: 100px"></td>
                              <td><input type="text" style="width: 100px"></td>
                              <td><input type="text" style="width: 100px"></td>
                              <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                              <td class="text-end">0,1000mV</td>
                              <td class="text-end">1,1000mV</td>
                              <td class="text-end">1,1000mV</td>
                            </tr>
                            <tr class="text-center">
                              <td class="text-end">50,000 V</td>
                              <td><input type="text" style="width: 100px"></td>
                              <td><input type="text" style="width: 100px"></td>
                              <td><input type="text" style="width: 100px"></td>
                              <td><input type="text" style="width: 100px"></td>
                              <td><input type="text" style="width: 100px"></td>
                              <td><input type="text" style="width: 100px"></td>
                              <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                              <td class="text-end">0,1000mV</td>
                              <td class="text-end">1,1000mV</td>
                              <td class="text-end">1,1000mV</td>
                            </tr>
                            <tr class="text-center">
                                <td rowspan="3">600 V</td>
                                <td class="text-end">100,000 V</td>
                                <td><input type="text" style="width: 100px"></td>
                                <td><input type="text" style="width: 100px"></td>
                                <td><input type="text" style="width: 100px"></td>
                                <td><input type="text" style="width: 100px"></td>
                                <td><input type="text" style="width: 100px"></td>
                                <td><input type="text" style="width: 100px"></td>
                                <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                <td class="text-end">0,1000mV</td>
                                <td class="text-end">1,1000mV</td>
                                <td class="text-end">1,1000mV</td>
                              </tr>
                              <tr class="text-center">
                                  <td class="text-end">300,000 V</td>
                                  <td><input type="text" style="width: 100px"></td>
                                  <td><input type="text" style="width: 100px"></td>
                                  <td><input type="text" style="width: 100px"></td>
                                  <td><input type="text" style="width: 100px"></td>
                                  <td><input type="text" style="width: 100px"></td>
                                  <td><input type="text" style="width: 100px"></td>
                                  <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                  <td class="text-end">0,1000mV</td>
                                  <td class="text-end">1,1000mV</td>
                                  <td class="text-end">1,1000mV</td>
                                </tr>
                                <tr class="text-center">
                                  <td class="text-end">500,000 V</td>
                                  <td><input type="text" style="width: 100px"></td>
                                  <td><input type="text" style="width: 100px"></td>
                                  <td><input type="text" style="width: 100px"></td>
                                  <td><input type="text" style="width: 100px"></td>
                                  <td><input type="text" style="width: 100px"></td>
                                  <td><input type="text" style="width: 100px"></td>
                                  <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                  <td class="text-end">0,1000mV</td>
                                  <td class="text-end">1,1000mV</td>
                                  <td class="text-end">1,1000mV</td>
                                </tr>
                                <tr class="text-center">
                                    <td rowspan="2">1000 V</td>
                                    <td class="text-end">700,000 V</td>
                                    <td><input type="text" style="width: 100px"></td>
                                    <td><input type="text" style="width: 100px"></td>
                                    <td><input type="text" style="width: 100px"></td>
                                    <td><input type="text" style="width: 100px"></td>
                                    <td><input type="text" style="width: 100px"></td>
                                    <td><input type="text" style="width: 100px"></td>
                                    <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                    <td class="text-end">0,1000mV</td>
                                    <td class="text-end">1,1000mV</td>
                                    <td class="text-end">1,1000mV</td>
                                  </tr>
                                  <tr class="text-center">
                                      <td class="text-end">1000,000 V</td>
                                      <td><input type="text" style="width: 100px"></td>
                                      <td><input type="text" style="width: 100px"></td>
                                      <td><input type="text" style="width: 100px"></td>
                                      <td><input type="text" style="width: 100px"></td>
                                      <td><input type="text" style="width: 100px"></td>
                                      <td><input type="text" style="width: 100px"></td>
                                      <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                      <td class="text-end">0,1000mV</td>
                                      <td class="text-end">1,1000mV</td>
                                      <td class="text-end">1,1000mV</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="btn pt-3 pb-0" style="float: right;">
                              <a href="input.html" class="btn btn-primary ">Submit</a>
                              <a href="edit.html" class="btn btn-secondary ">Edit</a>
                              <a href="delete.html" class="btn btn-danger " >Clear</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- TEGANGAN DC -->
                      
                      <div class="row">
                        <div class="card p-0 m-2">
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
                                  <td rowspan="14">Tegangan AC</td>
                                  <td rowspan="3">600 mV</td>
                                  <td class="text-end">100,000 mV</td>
                                  <td><input type="text" style="width: 100px"></td>
                                  <td><input type="text" style="width: 100px"></td>
                                  <td><input type="text" style="width: 100px"></td>
                                  <td><input type="text" style="width: 100px"></td>
                                  <td><input type="text" style="width: 100px"></td>
                                  <td><input type="text" style="width: 100px"></td>
                                  <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                  <td class="text-end">0,1000mV</td>
                                  <td class="text-end">1,1000mV</td>
                                  <td class="text-end">1,1000mV</td>
                                </tr>
                                <tr class="text-center">
                                  <td class="text-end">300,000 V</td>
                                  <td><input type="text" style="width: 100px"></td>
                                  <td><input type="text" style="width: 100px"></td>
                                  <td><input type="text" style="width: 100px"></td>
                                  <td><input type="text" style="width: 100px"></td>
                                  <td><input type="text" style="width: 100px"></td>
                                  <td><input type="text" style="width: 100px"></td>
                                  <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                  <td class="text-end">0,1000mV</td>
                                  <td class="text-end">1,1000mV</td>
                                  <td class="text-end">1,1000mV</td>
                                </tr>
                                <tr class="text-center">
                                    <td class="text-end">500,000 V</td>
                                    <td><input type="text" style="width: 100px"></td>
                                    <td><input type="text" style="width: 100px"></td>
                                    <td><input type="text" style="width: 100px"></td>
                                    <td><input type="text" style="width: 100px"></td>
                                    <td><input type="text" style="width: 100px"></td>
                                    <td><input type="text" style="width: 100px"></td>
                                    <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                    <td class="text-end">0,1000mV</td>
                                    <td class="text-end">1,1000mV</td>
                                    <td class="text-end">1,1000mV</td>
                                  </tr>
                                
                                <tr class="text-center">
                                  <td rowspan="3">6V</td>
                                  <td class="text-end">1,00000 V</td>
                                  <td><input type="text" style="width: 100px"></td>
                                  <td><input type="text" style="width: 100px"></td>
                                  <td><input type="text" style="width: 100px"></td>
                                  <td><input type="text" style="width: 100px"></td>
                                  <td><input type="text" style="width: 100px"></td>
                                  <td><input type="text" style="width: 100px"></td>
                                  <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                  <td class="text-end">0,1000mV</td>
                                  <td class="text-end">1,1000mV</td>
                                  <td class="text-end">1,1000mV</td>
                                </tr>
                                <tr class="text-center">
                                    <td class="text-end">3,0000 V</td>
                                    <td><input type="text" style="width: 100px"></td>
                                    <td><input type="text" style="width: 100px"></td>
                                    <td><input type="text" style="width: 100px"></td>
                                    <td><input type="text" style="width: 100px"></td>
                                    <td><input type="text" style="width: 100px"></td>
                                    <td><input type="text" style="width: 100px"></td>
                                    <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                    <td class="text-end">0,1000mV</td>
                                    <td class="text-end">1,1000mV</td>
                                    <td class="text-end">1,1000mV</td>
                                  </tr>
                                  <tr class="text-center">
                                    <td class="text-end">5,0000 V</td>
                                    <td><input type="text" style="width: 100px"></td>
                                    <td><input type="text" style="width: 100px"></td>
                                    <td><input type="text" style="width: 100px"></td>
                                    <td><input type="text" style="width: 100px"></td>
                                    <td><input type="text" style="width: 100px"></td>
                                    <td><input type="text" style="width: 100px"></td>
                                    <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                    <td class="text-end">0,1000mV</td>
                                    <td class="text-end">1,1000mV</td>
                                    <td class="text-end">1,1000mV</td>
                                  </tr>
                                  <tr class="text-center">
                                    <td rowspan="3">60 V</td>
                                    <td class="text-end">10,0000 V</td>
                                    <td><input type="text" style="width: 100px"></td>
                                    <td><input type="text" style="width: 100px"></td>
                                    <td><input type="text" style="width: 100px"></td>
                                    <td><input type="text" style="width: 100px"></td>
                                    <td><input type="text" style="width: 100px"></td>
                                    <td><input type="text" style="width: 100px"></td>
                                    <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                    <td class="text-end">0,1000mV</td>
                                    <td class="text-end">1,1000mV</td>
                                    <td class="text-end">1,1000mV</td>
                                  </tr>
                                  <tr class="text-center">
                                      <td class="text-end">30,000 V</td>
                                      <td><input type="text" style="width: 100px"></td>
                                      <td><input type="text" style="width: 100px"></td>
                                      <td><input type="text" style="width: 100px"></td>
                                      <td><input type="text" style="width: 100px"></td>
                                      <td><input type="text" style="width: 100px"></td>
                                      <td><input type="text" style="width: 100px"></td>
                                      <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                      <td class="text-end">0,1000mV</td>
                                      <td class="text-end">1,1000mV</td>
                                      <td class="text-end">1,1000mV</td>
                                    </tr>
                                    <tr class="text-center">
                                      <td class="text-end">50,000 V</td>
                                      <td><input type="text" style="width: 100px"></td>
                                      <td><input type="text" style="width: 100px"></td>
                                      <td><input type="text" style="width: 100px"></td>
                                      <td><input type="text" style="width: 100px"></td>
                                      <td><input type="text" style="width: 100px"></td>
                                      <td><input type="text" style="width: 100px"></td>
                                      <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                      <td class="text-end">0,1000mV</td>
                                      <td class="text-end">1,1000mV</td>
                                      <td class="text-end">1,1000mV</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td rowspan="3">600 V</td>
                                        <td class="text-end">100,000 V</td>
                                        <td><input type="text" style="width: 100px"></td>
                                        <td><input type="text" style="width: 100px"></td>
                                        <td><input type="text" style="width: 100px"></td>
                                        <td><input type="text" style="width: 100px"></td>
                                        <td><input type="text" style="width: 100px"></td>
                                        <td><input type="text" style="width: 100px"></td>
                                        <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                        <td class="text-end">0,1000mV</td>
                                        <td class="text-end">1,1000mV</td>
                                        <td class="text-end">1,1000mV</td>
                                      </tr>
                                      <tr class="text-center">
                                          <td class="text-end">300,00 V</td>
                                          <td><input type="text" style="width: 100px"></td>
                                          <td><input type="text" style="width: 100px"></td>
                                          <td><input type="text" style="width: 100px"></td>
                                          <td><input type="text" style="width: 100px"></td>
                                          <td><input type="text" style="width: 100px"></td>
                                          <td><input type="text" style="width: 100px"></td>
                                          <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                          <td class="text-end">0,1000mV</td>
                                          <td class="text-end">1,1000mV</td>
                                          <td class="text-end">1,1000mV</td>
                                        </tr>
                                        <tr class="text-center">
                                          <td class="text-end">500,00 V</td>
                                          <td><input type="text" style="width: 100px"></td>
                                          <td><input type="text" style="width: 100px"></td>
                                          <td><input type="text" style="width: 100px"></td>
                                          <td><input type="text" style="width: 100px"></td>
                                          <td><input type="text" style="width: 100px"></td>
                                          <td><input type="text" style="width: 100px"></td>
                                          <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                          <td class="text-end">0,1000mV</td>
                                          <td class="text-end">1,1000mV</td>
                                          <td class="text-end">1,1000mV</td>
                                        </tr>
                                        <tr class="text-center">
                                            <td rowspan="2">1000 V</td>
                                            <td class="text-end">700,00 V</td>
                                            <td><input type="text" style="width: 100px"></td>
                                            <td><input type="text" style="width: 100px"></td>
                                            <td><input type="text" style="width: 100px"></td>
                                            <td><input type="text" style="width: 100px"></td>
                                            <td><input type="text" style="width: 100px"></td>
                                            <td><input type="text" style="width: 100px"></td>
                                            <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                            <td class="text-end">0,1000mV</td>
                                            <td class="text-end">1,1000mV</td>
                                            <td class="text-end">1,1000mV</td>
                                          </tr>
                                          <tr class="text-center">
                                              <td class="text-end">1000,00 V</td>
                                              <td><input type="text" style="width: 100px"></td>
                                              <td><input type="text" style="width: 100px"></td>
                                              <td><input type="text" style="width: 100px"></td>
                                              <td><input type="text" style="width: 100px"></td>
                                              <td><input type="text" style="width: 100px"></td>
                                              <td><input type="text" style="width: 100px"></td>
                                              <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                              <td class="text-end">0,1000mV</td>
                                              <td class="text-end">1,1000mV</td>
                                              <td class="text-end">1,1000mV</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="btn pt-3 pb-0" style="float: right;">
                                      <a href="input.html" class="btn btn-primary ">Submit</a>
                                      <a href="edit.html" class="btn btn-secondary ">Edit</a>
                                      <a href="delete.html" class="btn btn-danger " >Clear</a>
                                  </div>
                                    </div>
                                    </div>
                                    </div>

                                      <div class="row">
                                        <div class="card p-0 m-2">
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
                                                    <td rowspan="6">Arus DC</td>
                                                    <td>500 μA</td>
                                                    <td class="text-end">400,000 μA</td>
                                                    <td><input type="text" style="width: 100px"></td>
                                                    <td><input type="text" style="width: 100px"></td>
                                                    <td><input type="text" style="width: 100px"></td>
                                                    <td><input type="text" style="width: 100px"></td>
                                                    <td><input type="text" style="width: 100px"></td>
                                                    <td><input type="text" style="width: 100px"></td>
                                                    <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                                    <td class="text-end">0,1000mV</td>
                                                    <td class="text-end">1,1000mV</td>
                                                    <td class="text-end">1,1000mV</td>
                                                  </tr>
                                                  <tr class="text-center">
                                                    <td>5000 μA</td>
                                                    <td class="text-end">4000,000 μA</td>
                                                    <td><input type="text" style="width: 100px"></td>
                                                    <td><input type="text" style="width: 100px"></td>
                                                    <td><input type="text" style="width: 100px"></td>
                                                    <td><input type="text" style="width: 100px"></td>
                                                    <td><input type="text" style="width: 100px"></td>
                                                    <td><input type="text" style="width: 100px"></td>
                                                    <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                                    <td class="text-end">0,1000mV</td>
                                                    <td class="text-end">1,1000mV</td>
                                                    <td class="text-end">1,1000mV</td>
                                                  </tr>
                                                  <tr class="text-center">
                                                      <td>50 mA</td>
                                                      <td class="text-end">40,000 mA</td>
                                                      <td><input type="text" style="width: 100px"></td>
                                                      <td><input type="text" style="width: 100px"></td>
                                                      <td><input type="text" style="width: 100px"></td>
                                                      <td><input type="text" style="width: 100px"></td>
                                                      <td><input type="text" style="width: 100px"></td>
                                                      <td><input type="text" style="width: 100px"></td>
                                                      <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                                      <td class="text-end">0,1000mV</td>
                                                      <td class="text-end">1,1000mV</td>
                                                      <td class="text-end">1,1000mV</td>
                                                    </tr>
                                                  
                                                  <tr class="text-center">
                                                    <td>400 mA</td>
                                                    <td class="text-end">350,000 mA</td>
                                                    <td><input type="text" style="width: 100px"></td>
                                                    <td><input type="text" style="width: 100px"></td>
                                                    <td><input type="text" style="width: 100px"></td>
                                                    <td><input type="text" style="width: 100px"></td>
                                                    <td><input type="text" style="width: 100px"></td>
                                                    <td><input type="text" style="width: 100px"></td>
                                                    <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                                    <td class="text-end">0,1000mV</td>
                                                    <td class="text-end">1,1000mV</td>
                                                    <td class="text-end">1,1000mV</td>
                                                  </tr>
                                                  <tr class="text-center">
                                                      <td>5 A</td>
                                                      <td class="text-end">4,000 A</td>
                                                      <td><input type="text" style="width: 100px"></td>
                                                      <td><input type="text" style="width: 100px"></td>
                                                      <td><input type="text" style="width: 100px"></td>
                                                      <td><input type="text" style="width: 100px"></td>
                                                      <td><input type="text" style="width: 100px"></td>
                                                      <td><input type="text" style="width: 100px"></td>
                                                      <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                                      <td class="text-end">0,1000mV</td>
                                                      <td class="text-end">1,1000mV</td>
                                                      <td class="text-end">1,1000mV</td>
                                                    </tr>
                                                    <tr class="text-center">
                                                      <td>10 A</td>
                                                      <td class="text-end">9,000 A</td>
                                                      <td><input type="text" style="width: 100px"></td>
                                                      <td><input type="text" style="width: 100px"></td>
                                                      <td><input type="text" style="width: 100px"></td>
                                                      <td><input type="text" style="width: 100px"></td>
                                                      <td><input type="text" style="width: 100px"></td>
                                                      <td><input type="text" style="width: 100px"></td>
                                                      <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                                      <td class="text-end">0,1000mV</td>
                                                      <td class="text-end">1,1000mV</td>
                                                      <td class="text-end">1,1000mV</td>
                                                    </tr>
                                              </tbody>
                                              </table>
                                            <div class="btn pt-3 pb-0" style="float: right;">
                                              <a href="input.html" class="btn btn-primary ">Submit</a>
                                              <a href="edit.html" class="btn btn-secondary ">Edit</a>
                                              <a href="delete.html" class="btn btn-danger " >Clear</a>
                                          </div>
                                            </div>
                                            </div>
                                            </div>
                                            <div class="row">
                                                <div class="card p-0 m-2">
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
                                                            <td rowspan="6">Arus AC</td>
                                                            <td>500 μA</td>
                                                            <td class="text-end">400,000 μA</td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                                            <td class="text-end">0,1000mV</td>
                                                            <td class="text-end">1,1000mV</td>
                                                            <td class="text-end">1,1000mV</td>
                                                          </tr>
                                                          <tr class="text-center">
                                                            <td>5000 μA</td>
                                                            <td class="text-end">4000,000 μA</td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                                            <td class="text-end">0,1000mV</td>
                                                            <td class="text-end">1,1000mV</td>
                                                            <td class="text-end">1,1000mV</td>
                                                          </tr>
                                                          <tr class="text-center">
                                                              <td>50 mA</td>
                                                              <td class="text-end">40,000 mA</td>
                                                              <td><input type="text" style="width: 100px"></td>
                                                              <td><input type="text" style="width: 100px"></td>
                                                              <td><input type="text" style="width: 100px"></td>
                                                              <td><input type="text" style="width: 100px"></td>
                                                              <td><input type="text" style="width: 100px"></td>
                                                              <td><input type="text" style="width: 100px"></td>
                                                              <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                                              <td class="text-end">0,1000mV</td>
                                                              <td class="text-end">1,1000mV</td>
                                                              <td class="text-end">1,1000mV</td>
                                                            </tr>
                                                          
                                                          <tr class="text-center">
                                                            <td>400 mA</td>
                                                            <td class="text-end">350,000 mA</td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                                            <td class="text-end">0,1000mV</td>
                                                            <td class="text-end">1,1000mV</td>
                                                            <td class="text-end">1,1000mV</td>
                                                          </tr>
                                                          <tr class="text-center">
                                                              <td>5 A</td>
                                                              <td class="text-end">4,000 A</td>
                                                              <td><input type="text" style="width: 100px"></td>
                                                              <td><input type="text" style="width: 100px"></td>
                                                              <td><input type="text" style="width: 100px"></td>
                                                              <td><input type="text" style="width: 100px"></td>
                                                              <td><input type="text" style="width: 100px"></td>
                                                              <td><input type="text" style="width: 100px"></td>
                                                              <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                                              <td class="text-end">0,1000mV</td>
                                                              <td class="text-end">1,1000mV</td>
                                                              <td class="text-end">1,1000mV</td>
                                                            </tr>
                                                            <tr class="text-center">
                                                              <td>10 A</td>
                                                              <td class="text-end">9,000 A</td>
                                                              <td><input type="text" style="width: 100px"></td>
                                                              <td><input type="text" style="width: 100px"></td>
                                                              <td><input type="text" style="width: 100px"></td>
                                                              <td><input type="text" style="width: 100px"></td>
                                                              <td><input type="text" style="width: 100px"></td>
                                                              <td><input type="text" style="width: 100px"></td>
                                                              <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                                              <td class="text-end">0,1000mV</td>
                                                              <td class="text-end">1,1000mV</td>
                                                              <td class="text-end">1,1000mV</td>
                                                            </tr>
                                                      </tbody>
                                                      </table>
                                                    <div class="btn pt-3 pb-0" style="float: right;">
                                                      <a href="input.html" class="btn btn-primary ">Submit</a>
                                                      <a href="edit.html" class="btn btn-secondary ">Edit</a>
                                                      <a href="delete.html" class="btn btn-danger " >Clear</a>
                                                  </div>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="card p-0 m-2">
                                                  <div class="card-header fw-bold">Pengukuran Resistansi</div>
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
                                                          <td rowspan="7">Resistansi</td>
                                                          <td rowspan="2">600 Ω</td>
                                                          <td class="text-end">10,00 Ω</td>
                                                          <td><input type="text" style="width: 100px"></td>
                                                          <td><input type="text" style="width: 100px"></td>
                                                          <td><input type="text" style="width: 100px"></td>
                                                          <td><input type="text" style="width: 100px"></td>
                                                          <td><input type="text" style="width: 100px"></td>
                                                          <td><input type="text" style="width: 100px"></td>
                                                          <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                                          <td class="text-end">0,1000mV</td>
                                                          <td class="text-end">1,1000mV</td>
                                                          <td class="text-end">1,1000mV</td>
                                                        </tr>
                                                        <tr class="text-center">
                                                          <td class="text-end">100,00 Ω</td>
                                                          <td><input type="text" style="width: 100px"></td>
                                                          <td><input type="text" style="width: 100px"></td>
                                                          <td><input type="text" style="width: 100px"></td>
                                                          <td><input type="text" style="width: 100px"></td>
                                                          <td><input type="text" style="width: 100px"></td>
                                                          <td><input type="text" style="width: 100px"></td>
                                                          <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                                          <td class="text-end">0,1000mV</td>
                                                          <td class="text-end">1,1000mV</td>
                                                          <td class="text-end">1,1000mV</td>
                                                        </tr>
                                                        <tr class="text-center">
                                                            <td rowspan="1">6 KΩ</td>
                                                            <td class="text-end">1,0000 Ω</td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                                            <td class="text-end">0,1000mV</td>
                                                            <td class="text-end">1,1000mV</td>
                                                            <td class="text-end">1,1000mV</td>
                                                          </tr>
                                                          <tr class="text-center">
                                                            <td rowspan="1">60 KΩ</td>
                                                            <td class="text-end">10,000 Ω</td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                                            <td class="text-end">0,1000mV</td>
                                                            <td class="text-end">1,1000mV</td>
                                                            <td class="text-end">1,1000mV</td>
                                                          </tr>
                                                          <tr class="text-center">
                                                            <td rowspan="1">600 KΩ</td>
                                                            <td class="text-end">100,00 Ω</td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                                            <td class="text-end">0,1000mV</td>
                                                            <td class="text-end">1,1000mV</td>
                                                            <td class="text-end">1,1000mV</td>
                                                          </tr>
                                                          <tr class="text-center">
                                                            <td rowspan="1">6 MΩ</td>
                                                            <td class="text-end">1,0000 MΩ</td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                                            <td class="text-end">0,1000mV</td>
                                                            <td class="text-end">1,1000mV</td>
                                                            <td class="text-end">1,1000mV</td>
                                                          </tr>
                                                          <tr class="text-center">
                                                            <td rowspan="1">50 MΩ</td>
                                                            <td class="text-end">10,0000 MΩ</td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                                            <td class="text-end">0,1000mV</td>
                                                            <td class="text-end">1,1000mV</td>
                                                            <td class="text-end">1,1000mV</td>
                                                          </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="btn pt-3 pb-0" style="float: right;">
                                                      <a href="input.html" class="btn btn-primary ">Submit</a>
                                                      <a href="edit.html" class="btn btn-secondary ">Edit</a>
                                                      <a href="delete.html" class="btn btn-danger " >Clear</a>
                                                  </div>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="card p-0 m-2">
                                                  <div class="card-header fw-bold">Pengukuran Frequensi</div>
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
                                                          <td rowspan="12">Frequensi</td>
                                                          <td rowspan="3">199,99 Hz</td>
                                                          <td class="text-end">20,000 Hz</td>
                                                          <td><input type="text" style="width: 100px"></td>
                                                          <td><input type="text" style="width: 100px"></td>
                                                          <td><input type="text" style="width: 100px"></td>
                                                          <td><input type="text" style="width: 100px"></td>
                                                          <td><input type="text" style="width: 100px"></td>
                                                          <td><input type="text" style="width: 100px"></td>
                                                          <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                                          <td class="text-end">0,1000mV</td>
                                                          <td class="text-end">1,1000mV</td>
                                                          <td class="text-end">1,1000mV</td>
                                                        </tr>
                                                        <tr class="text-center">
                                                            <td class="text-end">100,000 Hz</td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                                            <td class="text-end">0,1000mV</td>
                                                            <td class="text-end">1,1000mV</td>
                                                            <td class="text-end">1,1000mV</td>
                                                          </tr>
                                                          <tr class="text-center">
                                                            <td class="text-end">180,000 Hz</td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                                            <td class="text-end">0,1000mV</td>
                                                            <td class="text-end">1,1000mV</td>
                                                            <td class="text-end">1,1000mV</td>
                                                          </tr>
                                                        <tr class="text-center">
                                                            <td rowspan="3">1999,9 Hz</td>
                                                            <td class="text-end">200,000 Hz</td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                                            <td class="text-end">0,1000mV</td>
                                                            <td class="text-end">1,1000mV</td>
                                                            <td class="text-end">1,1000mV</td>
                                                          </tr>
                                                          <tr class="text-center">
                                                            <td class="text-end">1000,0 Hz</td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                                            <td class="text-end">0,1000mV</td>
                                                            <td class="text-end">1,1000mV</td>
                                                            <td class="text-end">1,1000mV</td>
                                                          </tr>
                                                          <tr class="text-center">
                                                            <td class="text-end">1800,0 Hz</td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                                            <td class="text-end">0,1000mV</td>
                                                            <td class="text-end">1,1000mV</td>
                                                            <td class="text-end">1,1000mV</td>
                                                          </tr>
                                                          <tr class="text-center">
                                                            <td rowspan="3">19,999 KHz</td>
                                                            <td class="text-end">2,0000 KHz</td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                                            <td class="text-end">0,1000mV</td>
                                                            <td class="text-end">1,1000mV</td>
                                                            <td class="text-end">1,1000mV</td>
                                                          </tr>
                                                          <tr class="text-center">
                                                            <td class="text-end">10,0000 KHz</td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                                            <td class="text-end">0,1000mV</td>
                                                            <td class="text-end">1,1000mV</td>
                                                            <td class="text-end">1,1000mV</td>
                                                          </tr>
                                                          <tr class="text-center">
                                                            <td class="text-end">18,0000 KHz</td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                                            <td class="text-end">0,1000mV</td>
                                                            <td class="text-end">1,1000mV</td>
                                                            <td class="text-end">1,1000mV</td>
                                                          </tr>
                                                          <tr class="text-center">
                                                            <td rowspan="3">199,99 KHz</td>
                                                            <td class="text-end">20,0000 KHz</td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                                            <td class="text-end">0,1000mV</td>
                                                            <td class="text-end">1,1000mV</td>
                                                            <td class="text-end">1,1000mV</td>
                                                          </tr>
                                                          <tr class="text-center">
                                                            <td class="text-end">100,00 KHz</td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                                            <td class="text-end">0,1000mV</td>
                                                            <td class="text-end">1,1000mV</td>
                                                            <td class="text-end">1,1000mV</td>
                                                          </tr>
                                                          <tr class="text-center">
                                                            <td class="text-end">180,00 KHz</td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px"></td>
                                                            <td><input type="text" style="width: 100px; text-align: right" value="0" readonly></td>
                                                            <td class="text-end">0,1000mV</td>
                                                            <td class="text-end">1,1000mV</td>
                                                            <td class="text-end">1,1000mV</td>
                                                          </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="btn pt-3 pb-0" style="float: right;">
                                                      <a href="input.html" class="btn btn-primary ">Submit</a>
                                                      <a href="edit.html" class="btn btn-secondary ">Edit</a>
                                                      <a href="delete.html" class="btn btn-danger " >Clear</a>
                                                  </div>
                                                  </div>
                                                </div>
                                              </div>
                                              
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
