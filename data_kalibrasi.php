<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Kalibrasi - BYSTLAA</title>
    <!-- DESAIN -->
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

          <div class="container-fluid p-4">
            <div class="row mt-2">
              <div class="col-4"><h4>Data Kalibrasi BYSTLAA</h4></div>

              <div class="col-8" style="text-align: right;">
                <a href="edit_kalibrasi.php" class="btn btn-primary">Input Kalibrasi</a>
              </div>
            </div>
            
            <!-- form kalibrasi -->
              <div class="row">
                <div class="card p-0 m-2">           
                  <div class="card-body">
                    <table class="table-bordered table-sm fs-6" style="width: 100%">
                      <thead class="text-white bg-dark text-center">
                        <!-- header tabel -->
                        <tr>
                          <td>No. Order</td>
                          <td>Nama Alat</td>
                          <td>Merk</td>
                          <td>Tipe</td>
                          <td>No. Seri</td>
                          <td>Asal</td>
                          <td>Tanggal Kalibrasi</td>
                          <td>Action</td>
                        </tr>
                      </thead>
                      <!-- isi tabel -->
                      <tbody>
                        <td>No. Order</td>
                        <td>Nama Alat</td>
                        <td>Merk</td>
                        <td>Tipe</td>
                        <td>No. Seri</td>
                        <td>Asal</td>
                        <td>Tanggal Kalibrasi</td>
                        <td>
                          <div class="btn p-0">
                            <a href="edit_kalibrasi.php" class="btn btn-secondary">Edit</a>
                            <a href="edit.php" class="btn btn-danger">Delete</a>
                            <a href="detail_kalibrasi.php" class="btn btn-info" >Detail</a>
                          </div>
                        </td>
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
