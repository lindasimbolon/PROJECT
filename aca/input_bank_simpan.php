<?php
include "header.php";

$id = $_POST['id'];
$nama_b = $_POST['nama_b'];
$nama_r = $_POST['nama_r'];
$no_r = $_POST['no_r'];
$area = $_POST['area'];

$cek = mysql_query("SELECT * FROM tabel_bank where id_ao='$area' or no_rek='$no_r'");
$hasil = mysql_fetch_array($cek);

if($hasil['id_bank']==""){
	$sql = mysql_query ("INSERT INTO tabel_bank VALUES ('$id','$nama_b','$no_r','$nama_r','$area')");

	if($sql){
	echo "<script>alert('Data berhasil disimpan')
	location.href='data_bank.sml'</script>";
	} else {
	echo "<script>alert('Data gagal disimpan')
	location.href='input_bank.sml'</script>";
	}
} else {
echo "<script>alert('Data sudah ada')
	location.href='data_bank.sml'</script>";
	}
?>