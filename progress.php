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
                <a href="progress.php" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-chart-bar"></i> Form Progres Kalibrasi</a>
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
                    <li><a class="dropdown-item" href="#">Log Out</a></li>
                  </ul>
                </form>
              </div>
            </div>
          </nav>

          <div class="container-fluid p-4">
            <h4>Progress Kalibrasi BYSTLAA</h4>
            
            <!-- <div class="row">
                <div class="card col-10 p-0 m-2" style="width: 99%;">
                  <div class="card-header fw-bold">Detail Alat yang diukur</div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-2">No. Order</div>
                      <div class="col-4">
                        <input type="text">
                      </div>
                      <div class="col-2">Tempat Kalibrasi</div>
                      <div class="col-4">BYSTLAA</div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-2">Nama Alat</div>
                      <div class="col-4">
                        <input type="text">
                      </div>
                      <div class="col-2">Tanggal Kalibrasi</div>
                      <div class="col-4">
                        <input type="date">
                      </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-2">Merk Alat</div>
                      <div class="col-4">
                        <input type="text">
                      </div>
                      <div class="col-2">Suhu</div>
                      <div class="col-4">(23 ± 1.3)°C</div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-2">Tipe</div>
                      <div class="col-4">
                        <input type="text">
                      </div>
                      <div class="col-2">Kelembaban</div>
                      <div class="col-4">(57 ± 3.1) %</div>
                    </div>
                    
                    <div class="row mt-2">
                      
                      <div class="col-2">Identitas Pemilik</div>
                      <div class="col-4"><input type="text"></div>
                      <div class="col-2">Resolusi</div>
                      <div class="col-4">: Multi Resolusi</div>
                      
                          
                    </div>
                    <div class="row mt-2">
                      <div class="col-2">Alat standar</div>
                      <div class="col-10">
                        : Precision Multi Product Calibration Transmille, 3041A
                      </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-2">Metoda kalibrasi</div>
                      <div class="col-10">: Perbandingan langsung</div>
                    </div>
                    
                  </div>
                </div>
              </div> -->

              <div class="row">
                <div class="card col-12 p-0 m-2" style="width: 99%;">
                  <div class="card-header fw-bold">Progress Kalibrasi</div>
                  <div class="card-body">
                    <table class="table-bordered table-sm fs-6 p-0" style="width: 100%;" >
                      <thead class="text-white bg-dark text-center">
                        <tr>
                          <td>No</td>
                          <td>No. Order</td>
                          <td>Identitas Pemilik</td>
                          <td>Tgl_Masuk</td>
                          <td>Keterangan</td>
                          <td>Action</td>
                        </tr>
                      </thead>
                      <tbody  class="text-center">
                        <tr>
                        <td>1</td>
                        <td>12345</td>
                        <td>Balai Yasa</td>
                        <td>11/9/2023</td>
                        <td>-</td>
                        <td>
                          <div class="btn p-0">
                            <a href="input.php" class="btn btn-primary btn-md">Input</a>
                            <a href="edit.php" class="btn btn-secondary ">Edit</a>
                            <a href="delete.php" class="btn btn-danger " >Delete</a>
                        </div>
                        </td>
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

    <script>
      $(".sidebar ul li").on("click", function () {
        $(".sidebar ul li.active").removeClass("active");
        $(this).addClass("active");
      });
    </script>
  </body>
    </html>
