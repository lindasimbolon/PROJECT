<?php
include "header.php";

$id = $_GET['id'];
$quartal = $_GET['quartal'];
$tahun = $_GET['tahun'];

$sql = mysql_query ("DELETE FROM tabel_setting_dana where id_setting='$id'");
$sql1 = mysql_query ("DELETE FROM tabel_dana where id_quartal='$quartal' and tahun='$tahun'");

	if($sql){
	echo "<script>alert('Data berhasil dihapus..')
	location.href='data_dana_awal.sml'</script>"; 
	} else {
	echo "<script>alert('Data gagal dihapus..')
	location.href='data_dana_awal.sml'</script>"; 
	}
?>