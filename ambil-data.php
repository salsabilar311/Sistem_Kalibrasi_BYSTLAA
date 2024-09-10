<?php
include 'koneksi.php';
// Pastikan koneksi database sudah dibuat

$merkId = $_GET['id'];

$query_tipe = mysqli_query($conn, "SELECT * FROM tipe WHERE id_merk = '$merkId'");

while ($data = mysqli_fetch_array($query_tipe)) {
    echo "<option value='" . $data['id_tipe'] . "'>" . $data['nama_tipe'] . "</option>";
}