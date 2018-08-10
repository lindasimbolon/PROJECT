<?php
include "header.php";
		$id = $_GET['id'];
		
		$sql = mysql_query ("DELETE FROM tabel_budget where id_budget='$id'");
		
		if($sql){
			echo "<script>alert('Berhasil dihapus')
			location.href='data_budget.sml'</script>";
		} else {
			echo "<script>alert('Gagal dihapus')
			location.href='data_budget.sml'</script>";
		}
		?>