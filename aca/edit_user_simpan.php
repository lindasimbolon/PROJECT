<?php
include "header.php";

$username = $_POST['username'];
$level = $_POST['level'];
$status = $_POST['status'];
$hp = $_POST['hp'];
$email = $_POST['email'];
$ao = $_POST['ao'];


	$sql = mysql_query("UPDATE tabel_user SET level='$level', status='$status', hp='$hp', ao='$ao', email='$email' where username='$username'");

	if($sql){
		echo "<script>alert('User berhasil diedit..')
		location.href='data_user.sml'</script>";
	} else {
		echo "<script>alert('User gagal diedit..')
		location.href='data_user.sml'</script>";
	}

?>