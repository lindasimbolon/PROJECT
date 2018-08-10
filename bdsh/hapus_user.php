<?php
include "header.php";

$username = $_GET['username'];

$sql = mysql_query("DELETE FROM tabel_user WHERE username='$username'");

if($sql){
	echo "<script>alert('User berhasil dihapus..')
	location.href='data_user.sml'</script>";
} else {
	echo "<script>alert('User gagal dihapus..')
	location.href='data_user.sml'</script>";
}

?>