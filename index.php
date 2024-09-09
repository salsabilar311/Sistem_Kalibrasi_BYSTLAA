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
            <h4>Kalibrasi BYSTLAA</h4>
            <div class="row">
              <div class="col-8 m-0 p-0">
                <div class="card">
                  <div class="card-header fw-bold">Progress Kalibrasi</div>
                  <table class="table table-sm table-bordered mt-3">
                      <thead class="bg-dark text-white text-center">
                        <tr><th>No</th>
                        <th>Tgl. Masuk</th>
                        <th>Asal</th>
                        <th>Jumlah</th>
                        <th>Progress</th>
                        <th>Estimasi Selesai</th>
                        <th>Details</th>
                      </tr></thead>
                      <tbody>
                        <tr><td class="text-center">1</td>
                        <td class="text-center">10-12-2023</td>
                        <td>Daop 1 Jakarta</td>
                        <td class="text-center">10</td>
                        <td>
                          <div class="progress" role="progressbar" aria-label="Basic Example" aria-valuenow="25%" aria-valuemin="0%" aria-valuemax="100%">
                            <div class="progress-bar" style="width: 50%"></div>
                          </div>
                        </td>
                        <td class="text-center">14-12-2023</td>
                        <td>Shipment</td>
                      </tr></tbody>
                      <tbody>
                        <tr><td class="text-center">2</td>
                        <td class="text-center">10-12-2023</td>
                        <td>Daop 2 Bandung</td>
                        <td class="text-center">20</td>
                        <td>
                          <div class="progress" role="progressbar" aria-label="Basic Example" aria-valuenow="25%" aria-valuemin="0%" aria-valuemax="100%">
                            <div class="progress-bar" style="width: 75%"></div>
                          </div>
                        </td>
                        <td class="text-center">14-12-2023</td>
                        <td>Shipment</td>
                      </tr></tbody>
                      <tbody>
                        <tr><td class="text-center">2</td>
                        <td class="text-center">10-12-2023</td>
                        <td>Daop 2 Bandung</td>
                        <td class="text-center">20</td>
                        <td>
                          <div class="progress" role="progressbar" aria-label="Basic Example" aria-valuenow="25%" aria-valuemin="0%" aria-valuemax="100%">
                            <div class="progress-bar" style="width: 75%"></div>
                          </div>
                        </td>
                        <td class="text-center">14-12-2023</td>
                        <td>Shipment</td>
                      </tr></tbody>
                      <tbody>
                        <tr><td class="text-center">2</td>
                        <td class="text-center">10-12-2023</td>
                        <td>Daop 2 Bandung</td>
                        <td class="text-center">20</td>
                        <td>
                          <div class="progress" role="progressbar" aria-label="Basic Example" aria-valuenow="25%" aria-valuemin="0%" aria-valuemax="100%">
                            <div class="progress-bar" style="width: 75%"></div>
                          </div>
                        </td>
                        <td class="text-center">14-12-2023</td>
                        <td>Shipment</td>
                      </tr></tbody>
                      <tbody>
                        <tr><td class="text-center">2</td>
                        <td class="text-center">10-12-2023</td>
                        <td>Daop 2 Bandung</td>
                        <td class="text-center">20</td>
                        <td>
                          <div class="progress" role="progressbar" aria-label="Basic Example" aria-valuenow="25%" aria-valuemin="0%" aria-valuemax="100%">
                            <div class="progress-bar" style="width: 75%"></div>
                          </div>
                        </td>
                        <td class="text-center">14-12-2023</td>
                        <td>Shipment</td>
                      </tr></tbody>
                    </table><div class="card-body">
                    
                  </div>
                </div>
              </div>
              <div class="col-4 m-0 p-0">
                <div class="card">
                  <div class="card-header fw-bold">Jumlah Kalibrasi Per Bulan</div>
                  <div class="card-body">
                    <div>
                      <canvas id="myChart1" style="padding: 20px; height: 40px; display: block; box-sizing: border-box; width: 74px;" width="148" height="80"></canvas>
                    </div>
    
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
                    <script>
                      var ctx1 = document.getElementById("myChart1");
    
                      new Chart(ctx1, {
                        type: "line",
                        data: {
                          labels: [
                            "Jan",
                            "Feb",
                            "Mar",
                            "Apr",
                            "Mei",
                            "Jun",
                            "Jul",
                            "Ags",
                            "Sep",
                            "Okt",
                            "Nov",
                            "Des",
                          ],
                          datasets: [
                            {
                              label: "Hasil Kalibrasi Multimeter",
                              data: [12, 19, 3, 5, 2, 3, 7, 8, 10, 25, 17, 20],
                              borderWidth: 1,
                            },
                          ],
                        },
                        options: {
                          scales: {
                            y: {
                              beginAtZero: true,
                            },
                          },
                        },
                      });
                    </script>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-6 m-0 p-0">
                <!-- history kalibrasi -->
                <div class="card">
                  <div class="card-header fw-bold">History Kalibrasi</div>
                  <div class="card-body">
                    <table class="table table-sm table-bordered">
                      <thead class="bg-dark text-center text-white">
                        <tr>
                          <th>No</th>
                          <th>Asal</th>
                          <th>Merk</th>
                          <th>Tipe</th>
                          <th>Serial</th>
                          <th>Tanggal Kalibrasi</th>
                          <th>Details</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr><td class="text-center">1</td>
                        <td>Daop 4 Semarang</td>
                        <td class="text-center">SANWA</td>
                        <td class="text-center">CD901</td>
                        <td class="text-center">1234901882</td>
                        <td class="text-center">12-04-2023</td>
                        <td class="text-center">
                          <a href="#" class="btn btn-dark text-decoration-none">
                            Lihat Hasil
                          </a>
                        </td>
                      </tr></tbody>
                      <tbody>
                        <tr><td class="text-center">2</td>
                        <td>Daop 4 Semarang</td>
                        <td class="text-center">SANWA</td>
                        <td class="text-center">CD901</td>
                        <td class="text-center">1234901882</td>
                        <td class="text-center">12-04-2023</td>
                        <td class="text-center">
                          <a href="#" class="btn btn-dark text-decoration-none">
                            Lihat Hasil
                          </a>
                      </tr></tbody>
                      <tbody>
                        <tr><td class="text-center">3</td>
                        <td>Daop 4 Semarang</td>
                        <td class="text-center">SANWA</td>
                        <td class="text-center">CD901</td>
                        <td class="text-center">1234901882</td>
                        <td class="text-center">12-04-2023</td>
                        <td class="text-center">
                          <a href="#" class="btn btn-dark text-decoration-none">
                            Lihat Hasil
                          </a>
                      </tr></tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-6 m-0 p-0">
                <div class="card">
                  <div class="card-header fw-bold">Grafik Kalibrasi Daop/Divre</div>
                  <div class="card-body">
                    <div>
                      <canvas id="myChart" style="padding: 20px; height: 40px; display: block; box-sizing: border-box; width: 74px;" width="148" height="80"></canvas>
                    </div>
    
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
                    <script>
                      const ctx = document.getElementById("myChart");
    
                      new Chart(ctx, {
                        type: "bar",
                        data: {
                          labels: [
                            "Divre I",
                            "Divre II",
                            "Divre III",
                            "Divre IV",
                            "Daop 1",
                            "Daop 2",
                            "Daop 3",
                            "Daop 4",
                            "Daop 5",
                            "Daop 6",
                            "Daop 7",
                            "Daop 8",
                            "Daop 9",
                          ],
                          datasets: [
                            {
                              label: "Hasil Kalibrasi Multimeter",
                              data: [12, 19, 3, 5, 2, 3],
                              borderWidth: 1,
                            },
                          ],
                        },
                        options: {
                          scales: {
                            y: {
                              beginAtZero: true,
                            },
                          },
                        },
                      });
                    </script>
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
<html>
