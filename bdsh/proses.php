<?php
include "header.php";
		$id = $_POST['id'];
		$head_office = $_POST['head_office'];
		$regional_office = $_POST['regional_office'];
		$area_office = $_POST['area_office'];
		$territory_office = $_POST['territory_office'];
		$singkatan = $_POST['singkatan'];
		$nama_am = $_POST['nama_am'];
		$email_am = $_POST['email_am'];
		$nama_rms = $_POST['nama_rms'];
		$email_rms = $_POST['email_rms'];
		$nama_aca = $_POST['nama_aca'];
		$email_aca = $_POST['email_aca'];
		$nama_kkm=$_POST['nama_kkm'];
		$email_kkm=$_POST['email_kkm'];
		
		$sql = mysql_query ("INSERT INTO tabel_area VALUES('$id','$head_office','$regional_office','$area_office','$territory_office','$singkatan','$nama_am','$email_am','$nama_rms','$email_rms','$nama_aca','$email_aca','$nama_kkm','$email_kkm')");
		
		if($sql){
			echo "<script>alert('Berhasil disimpan')
			location.href='data_ao.php'</script>";
		} else {
			echo "<script>alert('Gagal disimpan')
			location.href='data_ao.php'</script>";
		}
		?>