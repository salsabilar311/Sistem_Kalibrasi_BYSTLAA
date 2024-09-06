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
                <a href="data.php" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-table"></i> Form Data Kalibrasi</a>
              </li>
              <li class="">
                <a href="input.php" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-keyboard"></i> Form Input Kalibrasi</a>
              </li>
              <li class="">
                <a href="progress.php" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-chart-bar"></i> Form Progress Kalibrasi</a>
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
                    <li><a class="dropdown-item" href="#">Log Out</a></li>
                  </ul>
                </form>
              </div>
            </div>
          </nav>

          <div class="container-fluid p-4">
            <h4>Input Kalibrasi BYSTLAA</h4>
            
            <div class="row">
              <div class="card col-10 p-0 m-2" style="width: 99%;">
              <form action="input_aksi.php" method="POST">
                  <div class="card-header fw-bold">Detail Alat yang diukur</div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-2">Calibrator</div>
                      <div class="col-4">
                        <select class= "p-1" name="calibrator" id="calibrator">
                          <option value="k1">K1</option>
                          <option value="k2">K2</option>
                        </select>
                      </div>
                      <div class="col-2">Tempat Kalibrasi</div>
                      <div class="col-4">BYSTLAA</div>
                    </div>

                    <div class="row mt-2">
                      <div class="col-2">No. Order</div>
                      <div class="col-4"><input type="text" name="no_order"></div>
                      <div class="col-2">Tanggal Kalibrasi</div>
                      <div class="col-4">
                        <input type="date" name="tgl_kalibrasi">
                      </div>
                    </div>

                    <div class="row mt-2"> 
                      <div class="col-2">Nama Alat</div>
                      <div class="col-4">
                        : Digital Multimeter
                      </div>
                      <div class="col-2">Resolusi</div>
                      <div class="col-4">: Multi Resolusi</div>
                    </div>

                    <div class="row mt-2">
                      <div class="col-2">Merk Alat</div>
                      <div class="col-4">
                      <select class="p-1" name="id_merk" id="id_merk" onchange="tipe()" >
                          <?php
                          include "koneksi.php";

                          $query = mysqli_query($conn, "select * from merk");
                          while($data = mysqli_fetch_array($query)){
                                                    
                          ?>
                          <option value="<?php echo $data['id_merk']?>"><?php echo $data['id_merk']?></option>
                          
                          <?php
                          }
                          ?>
                      </select>
                      </div>
                      <div class="col-2">Suhu</div>
                      <div class="col-4">(23 ± 1.3)°C</div>
                    </div>

                    <div class="row mt-2">
                      <div class="col-2">Tipe</div>
                      <div class="col-4">
                        <select class="p-1" name="id_tipe" id="id_tipe">
                        </select>
                        <script>
                          function tipe(){
                            var id_merk = $('#id_merk').val();
                            $('#id_tipe').load("ambil-data.php?id="+id_merk+"");
                          }
                        </script>
                       
                      </div>
                      <div class="col-2">Kelembaban</div>
                      <div class="col-4">(57 ± 3.1) %</div>
                    </div>
                    
                    <div class="row mt-2">
                      <div class="col-2">Identitas Pemilik</div>
                      <div class="col-4"><input type="text" name="identitas_pemilik"></div>
                      <div class="col-2"></div>
                      <div class="col-4" style="float: right;">
                      <button class="btn btn-secondary btn-sm" type="submit" name="submit">Submit form</button>
                      </div>
                    </div>

                    <div class="row mt-2">
                      <div class="col-2">Alat standar</div>
                      <div class="col-4">
                        : Precision Multi Product Calibration Transmille, 3041A
                      </div>
                    </div>

                    <div class="row mt-2">
                      <div class="col-2">Metoda kalibrasi</div>
                      <div class="col-4">: Perbandingan langsung</div>
                    </div>
                    
                  </div>
                </div>
              </form>
                
              </div>


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
                          <td rowspan="10">Tegangan DC</td>
                          <td rowspan="2">400mV</td>
                          <td class="text-end">100,0000mV</td>
                          <td><input type="text" style="width: 100px"></td>
                          <td><input type="text" style="width: 100px"></td>
                          <td><input type="text" style="width: 100px"></td>
                          <td><input type="text" style="width: 100px"></td>
                          <td><input type="text" style="width: 100px"></td>
                          <td><input type="text" style="width: 100px"></td>
                          <td class="text-end">100,0000mV</td>
                          <td class="text-end">0,1000mV</td>
                          <td class="text-end">1,1000mV</td>
                          <td class="text-end">1,1000mV</td>
                        </tr>
                        <tr class="text-center">
                          <td class="text-end">300,0000mV</td>
                          <td><input type="text" style="width: 100px"></td>
                          <td><input type="text" style="width: 100px"></td>
                          <td><input type="text" style="width: 100px"></td>
                          <td><input type="text" style="width: 100px"></td>
                          <td><input type="text" style="width: 100px"></td>
                          <td><input type="text" style="width: 100px"></td>
                          <td class="text-end">100,0000mV</td>
                          <td class="text-end">0,1000mV</td>
                          <td class="text-end">1,1000mV</td>
                          <td class="text-end">1,1000mV</td>
                        </tr>
                        <tr class="text-center">
                          <td rowspan="2">4V</td>
                          <td class="text-end">1,0000V</td>
                          <td><input type="text" style="width: 100px"></td>
                          <td><input type="text" style="width: 100px"></td>
                          <td><input type="text" style="width: 100px"></td>
                          <td><input type="text" style="width: 100px"></td>
                          <td><input type="text" style="width: 100px"></td>
                          <td><input type="text" style="width: 100px"></td>
                          <td class="text-end">100,0000mV</td>
                          <td class="text-end">0,1000mV</td>
                          <td class="text-end">1,1000mV</td>
                          <td class="text-end">1,1000mV</td>
                        </tr>
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
