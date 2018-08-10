<?php
include "header.php";
		$id = $_GET['id'];
		
		$sql = mysql_query ("DELETE FROM tabel_ao where id_ao='$id'");
		
		if($sql){
			echo "<script>alert('Berhasil dihapus')
			location.href='data_ao.sml'</script>";
		} else {
			echo "<script>alert('Gagal dihapus')
			location.href='data_ao.sml'</script>";
		}
		?>