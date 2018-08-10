<?php
include "header.php";
error_reporting(1);
		$id = $_GET['id'];
		
		$cek = mysql_query ("SELECT * FROM tabel_pas where id_pas='$id'");
		$hasil = mysql_fetch_array($cek);
		
		unlink("pas/".$hasil['file_pas']);
		unlink("iom/".$hasil['file_iom']);
		$sql = mysql_query ("DELETE FROM tabel_pas where id_pas='$hasil[id_pas]'");
		
		if($sql){
			echo "<script>
			location.href='javascript:history.go(-1)'</script>";
		} else {
			echo "<script>
			location.href='data_pas.sml'</script>";
		}
		?>
