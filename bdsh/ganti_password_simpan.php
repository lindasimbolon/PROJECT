<?php
include "header.php";

$username= $_POST['username'];
$username1= $_POST['username1'];
$lama= md5($_POST['lama']);

$baru1= $_POST['baru'];
$baru= md5($baru1);


$cek = mysql_query("SELECT * FROM tabel_user WHERE username='$username'");
$hasil=mysql_fetch_array($cek);

if($hasil['password']==$lama){

	if($baru1<>""){
		$sql = mysql_query("UPDATE tabel_user SET `username` = '$username1', `password` = '$baru' WHERE `tabel_user`.`username` = '$username'");
		
		if($sql){
		echo "<script>alert('Data berhasil diganti, silakan login kembali..')
		location.href='../keluar.sml'</script>";
		} else {
		echo "<script>alert('Gagal disimpan disini')
		location.href='ganti_password.sml'</script>";
		}
	} else {
		$sql = mysql_query("UPDATE tabel_user SET `username` = '$username1' WHERE `tabel_user`.`username` = '$username'");
		
		if($sql){
		echo "<script>alert('Data berhasil diganti, silakan login kembali..')
		location.href='../keluar.sml'</script>";
		} else {
		echo "<script>alert('Gagal disimpan')
		location.href='ganti_password.sml'</script>";
		}
	}
}else {
	echo "<script>alert('password lama anda salah..')
	location.href='ganti_password.sml'</script>";
}
?>