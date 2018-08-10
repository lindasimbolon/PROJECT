<?php 
mysql_connect("localhost","sml_pas","pas123");
mysql_select_db("sml_pas");

$jenis = $_GET['jenis'];
$kota = mysql_query("SELECT * FROM tabel_tipe_program WHERE id_jenis_program='$jenis' order by id_tipe_program ASC");
echo "<option>-- Pilih Tipe Program --</option>";
while($k = mysql_fetch_array($kota)){
    echo "<option value=\"".$k['id_tipe_program']."\">".$k['tipe_program']." - ".$k['sub_tipe_program']."</option>\n";
}


?>
