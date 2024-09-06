<?php
include "koneksi.php";

$id = $_GET['id'];
$query = mysqli_query($conn, "select * from tipe where id_merk = '$id'");

while($data = mysqli_fetch_array($query)){
  ?>

  <option value="<?php echo $data['id_tipe']?>"><?php echo $data['id_tipe']?></option>

<?php
}
?>