<?php
include "header.php";

$username = $_POST['username'];
$pass = $_POST['password'];
$password = md5($pass);
$level = $_POST['level'];
$hp = $_POST['hp'];
$ao = $_POST['ao'];
$email = $_POST['email'];

$cek = mysql_query("SELECT * FROM tabel_user WHERE username='$username'");
$hasil = mysql_fetch_array($cek);
if ($hasil['username']==$username){
	echo "<script>alert('User sudah ada..')
		location.href='data_user.sml'</script>"; 
} else {
	$sql = mysql_query("INSERT INTO tabel_user VALUES ('$username','$password','$level','Aktif','$hp','$ao','$email')");

	if($sql){
		echo "<script>alert('User berhasil ditambah..')
		location.href='data_user.sml'</script>";
	} else {
		echo "<script>alert('User gagal ditambah..')
		location.href='data_user.sml'</script>";
	}
}
?>