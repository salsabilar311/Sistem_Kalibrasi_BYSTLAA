<?php 
  include 'koneksi.php';
  $detail_order = $_GET['detail_order'];

  // edit data to database
  if(isset($_POST['submit'])){
    $no_order=$_POST['no_order'];
    $tgl_kalibrasi=$_POST['tgl_kalibrasi'];
    $merk=$_POST['merk'];
    $calibrator=$_POST['calibrator'];
    $tipe=$_POST['tipe'];
    $tgl_masuk=$_POST['tgl_masuk'];
    $no_seri=$_POST['no_seri'];
    $asal=$_POST['asal']; 
    $tgl_sertifikat=$_POST['tgl_sertifikat'];
    $parts = explode('-', $detail_order);
    $no_order_from_detail = trim($parts[0]);

    $sql = "UPDATE detail
            SET no_order = '$no_order',
            tgl_kalibrasi = '$tgl_kalibrasi',
            id_merk = '$merk',
            calibrator = '$calibrator',
            id_tipe = '$tipe',
            tgl_masuk = '$tgl_masuk',
            no_seri = '$no_seri',
            region = '$asal',
            tgl_sertifikat = '$tgl_sertifikat'
            WHERE no_order = '$no_order_from_detail'";
    $result=mysqli_query($conn, $sql);
    if($result){
      header('Location: data_kalibrasi.php');
      exit();
    }
    else{
      die(mysqli_error($conn));
    }
  }
  // edit data to database
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
                  <form action="" method="POST">
                    <div class="card-header fw-bold">Edit Data Kalibrasi</div>
                      <div class="card-body">
                      <?php
                        $query = "SELECT d.no_order, d.detail_order, m.nama_merk, t.nama_tipe, d.no_seri, d.tgl_kalibrasi, p.name_owner, d.calibrator, d.tgl_masuk, d.tgl_sertifikat, d.region, d.id_merk 
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
                          <div class="col-4"><input type="text" name="no_order" style="width: 100px;" value="<?php echo $data['no_order']; ?>" readonly></div>
                          <div class="col-2">Tanggal Kalibrasi</div>
                          <div class="col-4"><input type="date" name="tgl_kalibrasi" value="<?php echo $data['tgl_kalibrasi']; ?>"></div>
                        </div> 

                        <!-- merk DAN kalibrator -->
                        <div class="row mt-2">
                          <div class="col-2">Merk</div>
                          <div class="col-4"><select class= "p-1" name="merk" id="merk">
                            <option value="1" <?php if ($data['id_merk'] == '1') echo 'selected'; ?>>Fluke</option>
                            <option value="2" <?php if ($data['id_merk'] == '2') echo 'selected'; ?>>Sanwa</option>
                            <option value="3" <?php if ($data['id_merk'] == '3') echo 'selected'; ?>>Krisbow</option>
                            <option value="4" <?php if ($data['id_merk'] == '4') echo 'selected'; ?>>Kyoritsu</option>
                          </select></div>
                          <div class="col-2">Kalibrator</div>
                          <div class="col-4"><select class="p-1" name="calibrator" id="calibrator">
                            <option value="K1" <?php if ($data['calibrator'] == 'K1') echo 'selected'; ?>>K1</option>
                            <option value="K2" <?php if ($data['calibrator'] == 'K2') echo 'selected'; ?>>K2</option>
                          </select></div>
                        </div>

                        <!-- tipe DAN tgl masuk -->
                        <div class="row mt-2">
                          <div class="col-2">Tipe</div>
                          <div class="col-4"><select class="p-1" name="tipe" id="tipe">
                            <option value="19">19</option>
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
                            <option value="BPSTL" <?php if ($data['region'] == 'BPSTL') echo 'selected'; ?>>BPSTL</option>
                            <option value="BYSTLAA" <?php if ($data['region'] == 'BYSTLAA') echo 'selected'; ?>>BYSTLAA</option>
                            <option value="LAA D1" <?php if ($data['region'] == 'LAA D1') echo 'selected'; ?>>LAA D1</option>
                            <option value="LAA D6" <?php if ($data['region'] == 'LAA D6') echo 'selected'; ?>>LAA D6</option>
                            <option value="STL D1" <?php if ($data['region'] == 'STL D1') echo 'selected'; ?>>STL D1</option>
                            <option value="STL D2" <?php if ($data['region'] == 'STL D2') echo 'selected'; ?>>STL D2</option>
                            <option value="STL D3" <?php if ($data['region'] == 'STL D3') echo 'selected'; ?>>STL D3</option>
                            <option value="STL D4" <?php if ($data['region'] == 'STL D4') echo 'selected'; ?>>STL D4</option>
                            <option value="STL D5" <?php if ($data['region'] == 'STL D5') echo 'selected'; ?>>STL D5</option>
                            <option value="STL D6" <?php if ($data['region'] == 'STL D6') echo 'selected'; ?>>STL D6</option>
                            <option value="STL D7" <?php if ($data['region'] == 'STL D7') echo 'selected'; ?>>STL D7</option>
                            <option value="STL D8" <?php if ($data['region'] == 'STL D8') echo 'selected'; ?>>STL D8</option>
                            <option value="STL D9" <?php if ($data['region'] == 'STL D9') echo 'selected'; ?>>STL D9</option>
                            <option value="STL DI" <?php if ($data['region'] == 'STL DI') echo 'selected'; ?>>STL DI</option>
                            <option value="STL DII" <?php if ($data['region'] == 'STL DII') echo 'selected'; ?>>STL DII</option>
                            <option value="STL DIII" <?php if ($data['region'] == 'STL DIII') echo 'selected'; ?>>STL DIII</option>
                            <option value="STL DIV" <?php if ($data['region'] == 'STL DIV') echo 'selected'; ?>>STL DIV</option>
                          </select></div>
                          <div class="col-6" style="text-align: right;">
                            <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
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