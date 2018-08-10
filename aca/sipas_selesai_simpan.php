<?php
include "header.php";

$no       = $_POST['no'];
$kode 	  = $_POST['kode'];
$tgl	  = $_POST['tgl'];


$sql = mysql_query ("UPDATE tabel_sipas SET tgl_terimasipas='$tgl', status_sipas='Selesai' where id_sipas='$no'");
$sql1 = mysql_query ("UPDATE tabel_pas SET sipas_status='Selesai' where id_pas='$kode'");
	if(($sql)and($sql1)){
	echo "<script>alert('SIPAS sudah selesai..')
	location.href='sipas_ok.sml'</script>";
	} else {
	echo "<script>alert('Terima SIPAS gagal..')
	location.href='sipas_selesai.sml?id=$id'</script>";
	}

?>