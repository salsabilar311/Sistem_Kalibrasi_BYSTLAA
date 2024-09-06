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

                  <ul class="dropdown-menu nav-item dropdown-menu-end m-1">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Setting</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="#">Log Out</a></li>
                  </ul>
                </form>
              </div>
            </div>
          </nav>

          <div class="container-fluid m-4">
            <h4>Data Kalibrasi BYSTLAA</h4>
            
            <div class="row">
              <div class="col-6">
                <div class="card">
                  <div class="card-header">Data</div>
                  <div class="card-body">
                    hellaw
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="card">
                  <div class="card-header">
                    Input Data
                  </div>
                  <div class="card-body">
                    <form action="">
                      <div class="row">
                        <div class="col-2">No. Order</div>
                        <div class="col-4"><input type="text"></div>
                        <div class="col-2">Tempat</div>
                        <div class="col-4"><input type="text"></div>
                      </div>
                      <div class="row mt-2">
                        <div class="col-2">Nama Alat</div>
                        <div class="col-4"><input type="text"></div>
                        <div class="col-2">Tanggal</div>
                        <div class="col-4"><input type="date"></div>
                      </div>
                      <div class="row mt-2">
                        <div class="col-2">Merk</div>
                        <div class="col-4"><input type="text"></div>
                        <div class="col-2">Suhu</div>
                        <div class="col-4"><input type="text"></div>
                      </div>
                      <div class="row mt-2">
                        <div class="col-2">Tipe</div>
                        <div class="col-4"><input type="text"></div>
                        <div class="col-2">Kelembaban</div>
                        <div class="col-4"><input type="text"></div>
                      </div>
                      <div class="row mt-2">
                        <div class="col-2">No. Seri</div>
                        <div class="col-10"><input type="text"></div>
                      </div>
                      <div class="row mt-5">
                        <h6 for="" class="mb-3">Alat Kalibrasi</h6>
                        <div class="col-3">Resolusi</div>
                        <div class="col-9">
                          <input type="text" style="width: 100%">
                        </div>
                      </div>
                      <div class="row mt-2">
                        <div class="col-3">Alat standar</div>
                        <div class="col-9">
                          <input type="text" style="width: 100%">
                        </div>
                      </div>
                      <div class="row mt-2">
                        <div class="col-3">Metode Kalibrasi</div>
                        <div class="col-9">
                          <input type="text" style="width: 100%">
                        </div>
                      </div>
                    </form>
                  </div>
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
