<?php
include "header.php";

$no       = $_POST['no'];
$alasan   = $_POST['alasan'];
$tgl = $_POST['tgl'];


$sql = mysql_query ("UPDATE tabel_pas SET status_pas='Ditolak', `tgl_persetujuan` = '$tgl',`berita_ditolak` = '$alasan' WHERE `tabel_pas`.`id_pas` ='$no'");

	if($sql){
	echo "<script>alert('Data pas dengan persetujuan DITOLAK sudah berhasil disimpan..')
	location.href='data_pas.sml'</script>";
	} else {
	echo "<script>alert('Data pas gagal..')
	location.href='validasi_pas.sml'</script>";
	}

?>