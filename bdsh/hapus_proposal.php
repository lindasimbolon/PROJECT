<?php
include "header.php";
		$id 	= $_GET['id'];
		$cek 	= mysql_query ("SELECT * FROM tabel_proposal where id_proposal = '$id'");
		$hasil 	= mysql_fetch_array($cek);
		$folder	= './upload/';
		
		//hapus file upload dari folder upload
		unlink($folder.'/'.$hasil['file1']);
		unlink($folder.'/'.$hasil['file2']);
		unlink($folder.'/'.$hasil['file3']);
		
		$sql = mysql_query ("DELETE FROM tabel_proposal where id_proposal='$id'");
		
		if($sql){
			echo "<script>alert('Berhasil dihapus')
			location.href='data_proposal.sml'</script>";
		} else {
			echo "<script>alert('Gagal dihapus')
			location.href='data_proposal.sml'</script>";
		}
		?>