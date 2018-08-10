<?php
include "header.php";
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$singkatan = $_POST['singkatan'];
		$asm=$_POST['asm'];
		$email_asm=$_POST['email_asm'];
		$regional=$_POST['regional'];
		$email_rpm=$_POST['email_rpm'];
		
		$sql = mysql_query ("INSERT INTO tabel_ao VALUES('$id','$nama','$singkatan','$asm','$email_asm','$regional','$email_rpm')");
		
		if($sql){
			echo "<script>alert('Berhasil disimpan')
			location.href='data_ao.php'</script>";
		} else {
			echo "<script>alert('Gagal disimpan')
			location.href='data_ao.php'</script>";
		}
		?>