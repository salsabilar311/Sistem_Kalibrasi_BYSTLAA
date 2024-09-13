<?php 
  include 'koneksi.php';

  // input data to database
  if(isset($_POST['submit'])){
    $no_order=$_POST['no_order'];
    $tgl_kalibrasi=$_POST['tgl_kalibrasi'];
    $merk=$_POST['id_merk'];
    $calibrator=$_POST['calibrator'];
    $tipe=$_POST['id_tipe'];
    $tgl_masuk=$_POST['tgl_masuk'];
    $no_seri=$_POST['no_seri'];
    $asal=$_POST['asal']; 
    $tgl_sertifikat=$_POST['tgl_sertifikat'];

    $sql = "INSERT INTO detail (no_order, tgl_kalibrasi, id_merk, calibrator, id_tipe, tgl_masuk, no_seri, region, tgl_sertifikat, detail_order)
        VALUES ('$no_order', '$tgl_kalibrasi', '$merk', '$calibrator', '$tipe', '$tgl_masuk', '$no_seri', '$asal', '$tgl_sertifikat',
        CONCAT('$no_order', '-', '$calibrator', '-BYSTLAA-', YEAR('$tgl_kalibrasi')))";
    $result=mysqli_query($conn, $sql);
    if($result){
      header('Location: data_kalibrasi.php');
      exit();
    }
    else{
      die(mysqli_error($conn));
    }
  }
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
                <a href="input_pengukuran.php" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-keyboard"></i> Form Input Kalibrasi</a>
              </li>
              <li class="">
                <a href="progres.php" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-chart-bar"></i> Form Progress Kalibrasi</a>
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
            <h4>Input Kalibrasi BYSTLAA</h4>
            
            <div class="row">
              <div class="card col-10 p-0 m-2" style="width: 99%;">
              <form action="" method="POST">
                  <div class="card-header fw-bold">Detail Alat yang diukur</div>
                  <div class="card-body">
                    <!-- no order DAN tgl kalibrasi -->
                    <div class="row">
                      <!-- no random untuk no order -->
                      <?php
                        $no_order = mt_rand(1, 999);
                      ?>
                      <div class="col-2">No. Order</div>
                      <div class="col-4"><input type="text" name="no_order" style="width: 100px;" value="<?php echo $no_order; ?>" required></div>
                      <div class="col-2">Tanggal Kalibrasi</div>
                      <div class="col-4"><input type="date" name="tgl_kalibrasi" required></div>
                    </div>

                    <!-- merk DAN kalibrator -->
                    <div class="row mt-2">
                      <div class="col-2">Merk</div>
                      <div class="col-4"><select class="p-1" name="id_merk" id="id_merk" onchange="tipe()" required>
                        <?php
                          $query = mysqli_query($conn, "select * from merk");
                          while($data = mysqli_fetch_array($query)){                    
                        ?>
                        <option value="<?php echo $data['id_merk']?>"><?php echo $data['nama_merk']?></option>
                        <?php
                        }
                        ?>
                      </select>
                      </div>
                      <div class="col-2">Kalibrator</div>
                      <div class="col-4"><select class="p-1" name="calibrator" id="calibrator" required>
                        <?php
                          $query_k = mysqli_query($conn, "SELECT * FROM kalibrator");
                          while($data = mysqli_fetch_array($query_k)){
                        ?>
                        <option value="<?php echo $data['calibrator']?>"><?php echo $data['calibrator']?></option>
                        <?php
                          }
                        ?>
                      </select></div>
                      </div>

                      <!-- tipe DAN tgl masuk -->
                      <div class="row mt-2">
                        <div class="col-2">Tipe</div>
                        <div class="col-4"><select class="p-1" name="id_tipe" id="id_tipe" required></select>
                        <script>
                            function tipe() {
                                var id_merk = $('#id_merk').val();
                                // Reset dropdown with default option
                                $('#id_tipe').html('<select></select>');
                                
                                // Load new options from server and append to the dropdown
                                $.get("ambil-data.php?id=" + id_merk, function(data) {
                                    $('#id_tipe').append(data);
                                });
                            }

                            // Initialize default option when the page loads
                            $(document).ready(function() {
                                // Pada saat halaman pertama kali dimuat, kita akan mengambil id_merk yang aktif
                                var id_merk = $('#id_merk').val();
                                
                                // Memuat opsi tipe yang sesuai dengan id_merk yang aktif
                                $.get("ambil-data.php?id=" + id_merk, function(data) {
                                    $('#id_tipe').html(data); // Isi dropdown tipe dengan hasil query
                                });
                            });
                          </script>
                        </div>
                        <div class="col-2">Tanggal Masuk</div>
                        <div class="col-4"><input type="date" name="tgl_masuk" id="tgl_masuk" required></div>
                      </div>
                       
                      <!-- no seri DAN tgl sertifikat -->
                      <div class="row mt-2">
                          <div class="col-2">No. Seri</div>
                          <div class="col-4"><input type="text" name="no_seri" style="width: 50%;" required></div>
                          <div class="col-2">Tanggal Sertifikat</div>
                          <div class="col-4"><input type="date" name="tgl_sertifikat" id="tgl_sertifikat" required></div>
                      </div>

                      <!-- asal -->
                      <div class="row mt-2">
                        <div class="col-2">Asal</div>
                        <div class="col-4"><select class="p-1" name="asal" id="asal" required>
                        <?php
                            $query_asal = mysqli_query($conn, "SELECT * FROM pemilik");
                            while($data = mysqli_fetch_array($query_asal)){
                          ?>
                          <option value="<?php echo $data['region']?>"><?php echo $data['region']?></option>
                          <?php
                            }
                        ?>
                        </select></div>
                        <div class="col-6" style="text-align: right;">
                          <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
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

    <!-- <script>
      $(".sidebar ul li").on("click", function () {
        $(".sidebar ul li.active").removeClass("active");
        $(this).addClass("active");
      });
    </script> -->
  </body>
</html>
