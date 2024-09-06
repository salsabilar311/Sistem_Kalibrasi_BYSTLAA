<?php 
include 'koneksi.php';
include 'input.php';
 

$calibrator = $_POST['calibrator'];
$no_order = $_POST['no_order'];
$id_merk = $_POST['id_merk'];
$id_tipe = $_POST['id_tipe'];
$identitas_pemilik = $_POST['identitas_pemilik'];
$tgl_kalibrasi = $_POST['tgl_kalibrasi'];

echo($calibrator);
echo($no_order);
echo($id_merk);
echo($id_tipe);
echo($identitas_pemilik);
echo($tgl_kalibrasi);


$query= mysqli_query($conn,"INSERT INTO detail VALUES('','$calibrator','$no_order','$id_merk','$id_tipe','$identitas_pemilik','$tgl_kalibrasi')");
// mysqli_query($conn,"insert into detail values('','K2','234','2','2','bystlaa','21-09-2023')");

// header("location:fluke87.php");

 
?>