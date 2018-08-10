<?php
include "header.php";

$id = $_POST['id'];
$lampung = $_POST['lampung'];
$kotabumi = $_POST['kotabumi'];
$baturaja = $_POST['baturaja'];
$bengkulu = $_POST['bengkulu'];
$lubuklinggau = $_POST['lubuklinggau'];
$palembang = $_POST['palembang'];
$jambi = $_POST['jambi'];
$tgl = date("Y-m-d");

$sql = mysql_query ("UPDATE tabel_setting_dana SET ao1='$lampung', ao2='$kotabumi', ao3='$baturaja', ao4='$bengkulu', ao5='$lubuklinggau', ao6='$palembang', ao7='$jambi',tgl_setting='$tgl' where id_setting='$id'");

	if($sql){
	echo "<script>alert('Data berhasil diedit..')
	location.href='data_dana_awal.sml'</script>"; 
	} else {
	echo "<script>alert('Data gagal diedit..')
	location.href='data_dana_awal.sml'</script>"; 
	}
?>