<?php
include "header.php";

$no       = $_POST['no'];
$tgl	  = $_POST['tgl'];


$sql = mysql_query ("UPDATE tabel_sipas SET tgl_terimaro='$tgl', status_sipas='Pending RO' where id_sipas='$no'");
	if($sql){
	echo "<script>alert('Data SIPAS sudah diterima RO..')
	location.href='sipas_tro.sml'</script>";
	} else {
	echo "<script>alert('Terima SIPAS gagal..')
	location.href='terima_ro.sml?id=$id'</script>";
	}

?>