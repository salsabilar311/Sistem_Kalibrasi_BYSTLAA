<?php
include "koneksi.php";

$merkId = $_GET['id'];

$query_tipe = mysqli_query($conn, "SELECT * FROM tipe WHERE id_merk = '$merkId'");

while ($data = mysqli_fetch_array($query_tipe)) {
    ?>
    <!-- echo "<option value='" . $data['id_tipe'] . "'>" . $data['nama_tipe'] . "</option>"; -->
    <option value="<?php echo $data['id_tipe']?>"><?php echo $data['nama_tipe']?></option>
<?php
}
?>