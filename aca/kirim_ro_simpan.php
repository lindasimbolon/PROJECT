<?php
include "header.php";

$no       = $_POST['no'];
$tgl	  = $_POST['tgl'];


$sql = mysql_query ("UPDATE tabel_sipas SET tgl_kirimro='$tgl', status_sipas='Pending Kirim' where id_sipas='$no'");
	if($sql){
	echo "<script>alert('Data SIPAS sudah dikirim dari RO..')
	location.href='sipas_kro.sml'</script>";
	} else {
	echo "<script>alert('Terima SIPAS gagal..')
	location.href='kirim_ro.sml?id=$id'</script>";
	}

?>