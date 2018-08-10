<?php
include "header.php";
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$singkatan = $_POST['singkatan'];
		$asm=$_POST['asm'];
		
		$sql = mysql_query ("UPDATE tabel_ao SET nama_ao='$nama',singkatan='$singkatan',asm='$asm' where id_ao='$id'");
		
		if($sql){
			echo "<script>alert('Berhasil diedit')
			location.href='data_ao.sml'</script>";
		} else {
			echo "<script>alert('Gagal diedit')
			location.href='data_ao.sml'</script>";
		}
		?>