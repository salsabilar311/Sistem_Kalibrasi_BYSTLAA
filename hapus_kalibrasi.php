<?php

include('koneksi.php');

//get id
$id = $_GET['id'];

// Cek apakah ada data di tabel pengukuran dengan detail_order yang sama
$cek_pengukuran = "SELECT COUNT(*) AS jumlah FROM pengukuran WHERE detail_order = '$id'";
$result_cek = mysqli_query($conn, $cek_pengukuran);
$row = mysqli_fetch_assoc($result_cek);

if ($row['jumlah'] > 0) {
    // Jika ada data di tabel pengukuran, hapus terlebih dahulu
    $query_pengukuran = "DELETE FROM pengukuran WHERE detail_order = '$id'";
    $result_pengukuran = mysqli_query($conn, $query_pengukuran);
}

// Hapus data dari tabel detail
$query_detail = "DELETE FROM detail WHERE detail_order = '$id'";
$result_detail = mysqli_query($conn, $query_detail);

if($result_detail){
    header("location: data_kalibrasi.php");
} else {
    die(mysqli_error($conn));
}

?>