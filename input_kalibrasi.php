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
                    <li><a class="dropdown-item" href="#">Log Out</a></li>
                  </ul>
                </form>
              </div>
            </div>
          </nav>

          <div class="container-fluid p-4">

              <div class="row">
                <div class="card col-10 p-0 m-2" style="width: 99%;">
                  <form action="input_kalibrasi.php" method="POST">
                    <div class="card-header fw-bold">Input Data Kalibrasi</div>
                      <div class="card-body">
                        <!-- no order DAN tgl kalibrasi -->
                        <div class="row">
                          <div class="col-2">No. Order</div>
                          <div class="col-4"><input type="text" name="no_order" style="width: 100px;"></div>
                          <div class="col-2">Tanggal Kalibrasi</div>
                          <div class="col-4"><input type="date" name="tgl_kalibrasi"></div>
                        </div> 

                        <!-- merk DAN kalibrator -->
                        <div class="row mt-2">
                          <div class="col-2">Merk</div>
                          <div class="col-4"><select class= "p-1" name="merk" id="merk">
                            <option value="fluke">Fluke</option>
                            <option value="sanwa">Sanwa</option>
                            <option value="krisbow">Krisbow</option>
                            <option value="kyoritsu">Kyoritsu</option>
                          </select></div>
                          <div class="col-2">Kalibrator</div>
                          <div class="col-4"><select class="p-1" name="kalibrator" id="kalibrator">
                            <option value="k1">K1</option>
                            <option value="k2">K2</option>
                          </select></div>
                        </div>

                        <!-- tipe DAN tgl masuk -->
                        <div class="row mt-2">
                          <div class="col-2">Tipe</div>
                          <div class="col-4"><select class="p-1" name="tipe" id="tipe">
                            <option value="179">179</option>
                          </select></div>
                          <div class="col-2">Tanggal Masuk</div>
                          <div class="col-4"><input type="date" name="tgl_masuk" id="tgl_masuk"></div>
                        </div>

                        <!-- no seri DAN tgl sertifikat-->
                        <div class="row mt-2">
                          <div class="col-2">No. Seri</div>
                          <div class="col-4"><input type="text" name="no_seri" style="width: 50%;"></div>
                          <div class="col-2">Tanggal Sertifikat</div>
                          <div class="col-4"><input type="date" name="tgl_sertifikat" id="tgl_sertifikat"></div>
                        </div>

                        <!-- asal -->
                        <div class="row mt-2">
                          <div class="col-2">Asal</div>
                          <div class="col-4"><select class="p-1" name="asal" id="asal">
                            <option value="stl_d1">STL-D1</option>
                          </select></div>
                          <div class="col-6" style="text-align: right;">
                            <a href="edit_kalibrasi.php" class="btn btn-primary">Simpan</a>
                            <a href="data_kalibrasi.php" class="btn btn-secondary">Batal</a>
                          </div>
                        </div>

                  </form>
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
