<?php
    include 'koneksi.php';
    $detail_order = $_GET["detail_order"];
    echo $detail_order;

    $sql = "SELECT m.nama_merk, t.nama_tipe
        FROM detail d
        INNER JOIN merk m ON d.id_merk = m.id_merk
        INNER JOIN tipe t ON d.id_tipe = t.id_tipe
        WHERE d.detail_order = '$detail_order';";
    $result=mysqli_query($conn, $sql);

    // Cek apakah query berhasil dijalankan dan ada hasilnya
    if (mysqli_num_rows($result) > 0) {
        // Loop melalui hasil dan tampilkan merk dan tipe
        while ($row = mysqli_fetch_assoc($result)) {
            $merk = $row['nama_merk'];
            $tipe =  $row['nama_tipe'];
            $page = $merk . "_" . $tipe . ".php";
            header('Location: ' . $page . '?detail_order=' . $detail_order);
            exit();
        }
    } else {
        echo "Tidak ada data yang ditemukan untuk no_order: " . $no_order;
    }
?>