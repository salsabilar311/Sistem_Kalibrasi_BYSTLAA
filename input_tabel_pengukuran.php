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