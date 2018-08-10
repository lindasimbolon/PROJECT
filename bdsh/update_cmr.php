<?php
include "header.php";
		$id = $_POST['id'];
		$ao = $_POST['ao'];
		$nama = $_POST['nama'];
		$email= $_POST['email'];
		$hp=$_POST['hp'];
		
		$sql = mysql_query ("UPDATE tabel_cmr SET id_ao='$ao', nama_cmr='$nama', email_cmr='$email',hp_cmr='$hp' where id_cmr='$id'");
		
		if($sql){
			echo "<script>alert('Berhasil diedit')
			location.href='data_cmr.php'</script>";
		} else {
			echo "<script>alert('Gagal diedit')
			location.href='data_cmr.php'</script>";
		}
		?>