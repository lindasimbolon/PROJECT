<?php
include "header.php";
		$id = $_POST['id'];
		$ao = $_POST['ao'];
		$nama = $_POST['nama'];
		$email= $_POST['email'];
		$hp=$_POST['hp'];
		
		$sql = mysql_query ("INSERT INTO tabel_cmr VALUES('$id','$ao','$nama','$email','$hp')");
		
		if($sql){
			echo "<script>alert('Berhasil disimpan')
			location.href='data_cmr.sml'</script>";
		} else {
			echo "<script>alert('Gagal disimpan')
			location.href='input_cmr.sml'</script>";
		}
		?>