<?php
include "header.php";

$id = $_GET['id'];
$quartal = $_GET['quartal'];
$tahun = $_GET['tahun'];

$sql = mysql_query ("UPDATE tabel_setting_dana SET status='Open' where id_setting='$id'");
$sql1 = mysql_query ("UPDATE tabel_dana SET status='Open' where id_quartal='$quartal' and tahun='$tahun'");

	if($sql){
	echo "<script>alert('Data sudah dibuka kembali..')
	location.href='data_dana_awal.sml'</script>"; 
	} else {
	echo "<script>alert('Data gagal dibuka kembali..')
	location.href='data_dana_awal.sml'</script>"; 
	}
?>