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

              <div class="row">
                <div class="card col-10 p-0 m-2" style="width: 99%;">
                  <form action="input_kalibrasi.php" method="POST">
                    <div class="card-header fw-bold">Edit Data Kalibrasi</div>
                      <div class="card-body">
                      <?php
                        $detail_order = $_GET['detail_order'];
                        $query = "SELECT d.no_order, d.detail_order, m.nama_merk, t.nama_tipe, d.no_seri, d.tgl_kalibrasi, p.name_owner, d.calibrator, d.tgl_masuk, d.tgl_sertifikat, d.region 
                                  FROM detail d
                                  INNER JOIN merk m ON d.id_merk = m.id_merk
                                  INNER JOIN tipe t ON d.id_tipe = t.id_tipe
                                  INNER JOIN pemilik p ON d.region = p.region
                                  WHERE d.detail_order = '$detail_order'";
                        $result = mysqli_query($conn, $query);
                        if ($data = mysqli_fetch_assoc($result)) {
                      ?>
                        <!-- no order DAN tgl kalibrasi -->
                        <div class="row">
                          <div class="col-2">No. Order</div>
                          <div class="col-4"><input type="text" name="no_order" style="width: 100px;" value="<?php echo $data['no_order']; ?>"></div>
                          <div class="col-2">Tanggal Kalibrasi</div>
                          <div class="col-4"><input type="date" name="tgl_kalibrasi" value="<?php echo $data['tgl_kalibrasi']; ?>"></div>
                        </div> 

                        <!-- merk DAN kalibrator -->
                        <div class="row mt-2">
                          <div class="col-2">Merk</div>
                          <div class="col-4"><select class= "p-1" name="merk" id="merk" value="<?php echo $data['nama_merk']; ?>">
                            <option value="fluke" <?php if ($data['nama_merk'] == 'Fluke') echo 'selected'; ?>>Fluke</option>
                            <option value="sanwa" <?php if ($data['nama_merk'] == 'Sanwa') echo 'selected'; ?>>Sanwa</option>
                            <option value="krisbow" <?php if ($data['nama_merk'] == 'Krisbow') echo 'selected'; ?>>Krisbow</option>
                            <option value="kyoritsu" <?php if ($data['nama_merk'] == 'Kyoritsu') echo 'selected'; ?>>Kyoritsu</option>
                          </select></div>
                          <div class="col-2">Kalibrator</div>
                          <div class="col-4"><select class="p-1" name="kalibrator" id="kalibrator">
                            <option value="k1" <?php if ($data['calibrator'] == 'K1') echo 'selected'; ?>>K1</option>
                            <option value="k2" <?php if ($data['calibrator'] == 'K2') echo 'selected'; ?>>K2</option>
                          </select></div>
                        </div>

                        <!-- tipe DAN tgl masuk -->
                        <div class="row mt-2">
                          <div class="col-2">Tipe</div>
                          <div class="col-4"><select class="p-1" name="tipe" id="tipe">
                            <option value="179">179</option>
                          </select></div>
                          <div class="col-2">Tanggal Masuk</div>
                          <div class="col-4"><input type="date" name="tgl_masuk" id="tgl_masuk" value="<?php echo $data['tgl_masuk']; ?>"></div>
                        </div>

                        <!-- no seri DAN tgl sertifikat-->
                        <div class="row mt-2">
                          <div class="col-2">No. Seri</div>
                          <div class="col-4"><input type="text" name="no_seri" style="width: 50%;" value="<?php echo $data['no_seri']; ?>"></div>
                          <div class="col-2">Tanggal Sertifikat</div>
                          <div class="col-4"><input type="date" name="tgl_sertifikat" id="tgl_sertifikat" value="<?php echo $data['tgl_sertifikat']; ?>"></div>
                        </div>

                        <!-- asal -->
                        <div class="row mt-2">
                          <div class="col-2">Asal</div>
                          <div class="col-4"><select class="p-1" name="asal" id="asal">
                            <option value="bpstl" <?php if ($data['region'] == 'BPSTL') echo 'selected'; ?>>BPSTL</option>
                            <option value="bystlaa" <?php if ($data['region'] == 'BYSTLAA') echo 'selected'; ?>>BYSTLAA</option>
                            <option value="laa_d1" <?php if ($data['region'] == 'LAA D1') echo 'selected'; ?>>LAA D1</option>
                            <option value="laa_d6" <?php if ($data['region'] == 'LAA D6') echo 'selected'; ?>>LAA D6</option>
                            <option value="stl_d1" <?php if ($data['region'] == 'STL D1') echo 'selected'; ?>>STL D1</option>
                            <option value="stl_d2" <?php if ($data['region'] == 'STL D2') echo 'selected'; ?>>STL D2</option>
                            <option value="stl_d3" <?php if ($data['region'] == 'STL D3') echo 'selected'; ?>>STL D3</option>
                            <option value="stl_d4" <?php if ($data['region'] == 'STL D4') echo 'selected'; ?>>STL D4</option>
                            <option value="stl_d5" <?php if ($data['region'] == 'STL D5') echo 'selected'; ?>>STL D5</option>
                            <option value="stl_d6" <?php if ($data['region'] == 'STL D6') echo 'selected'; ?>>STL D6</option>
                            <option value="stl_d7" <?php if ($data['region'] == 'STL D7') echo 'selected'; ?>>STL D7</option>
                            <option value="stl_d8" <?php if ($data['region'] == 'STL D8') echo 'selected'; ?>>STL D8</option>
                            <option value="stl_d9" <?php if ($data['region'] == 'STL D9') echo 'selected'; ?>>STL D9</option>
                            <option value="stl_dI" <?php if ($data['region'] == 'STL DI') echo 'selected'; ?>>STL DI</option>
                            <option value="stl_dII" <?php if ($data['region'] == 'STL DII') echo 'selected'; ?>>STL DII</option>
                            <option value="stl_dIII" <?php if ($data['region'] == 'STL DIII') echo 'selected'; ?>>STL DIII</option>
                            <option value="stl_dIV" <?php if ($data['region'] == 'STL DIV') echo 'selected'; ?>>STL DIV</option>
                          </select></div>
                          <div class="col-6" style="text-align: right;">
                            <a href="edit_kalibrasi.php" class="btn btn-primary">Simpan</a>
                            <a href="data_kalibrasi.php" class="btn btn-secondary">Batal</a>
                          </div>
                        <?php } ?>
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
