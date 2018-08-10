<?php 
include "../koneksi.php";

$jenis = $_GET['jenis'];
$kota = mysql_query("SELECT * FROM tabel_tipe_program WHERE id_jenis_program='$jenis' order by id_tipe_program ASC");
echo "<option>-- Pilih Tipe Program --</option>";
while($k = mysql_fetch_array($kota)){
?>

<option value="<?php echo $k['id_tipe_program'];?>"><?php echo $k['tipe_program'];?> - <?php echo $k['sub_tipe_program'];?> </option>

<?php } ?>