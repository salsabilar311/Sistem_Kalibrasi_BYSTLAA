<?php
include "koneksi.php";

$merkId = $_GET['id']; // Ambil id_merk dari request
$tipeSebelumnya = isset($_GET['selected_tipe']) ? $_GET['selected_tipe'] : ''; // Ambil id_tipe yang dipilih sebelumnya (jika ada)

// Query untuk mendapatkan tipe berdasarkan id_merk
$query_tipe = mysqli_query($conn, "SELECT * FROM tipe WHERE id_merk = '$merkId'");

// Loop melalui hasil query dan tampilkan opsi
while ($data = mysqli_fetch_array($query_tipe)) {
    // Cek apakah tipe ini adalah tipe yang dipilih sebelumnya
    $selected = ($data['id_tipe'] == $tipeSebelumnya) ? 'selected' : ''; 
    ?>
    <option value="<?php echo $data['id_tipe']; ?>" <?php echo $selected; ?>><?php echo $data['nama_tipe']; ?></option>
    <?php
}
?>
