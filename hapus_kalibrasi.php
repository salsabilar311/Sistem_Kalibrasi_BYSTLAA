<?php

include('koneksi.php');

//get id
$id = $_GET['id'];

$query = "DELETE FROM detail WHERE detail_order = '$id'";
$result = mysqli_query($conn, $query);

if($result){
    header("location: data_kalibrasi.php");
} else {
    die(mysqli_error($conn));
}

?>