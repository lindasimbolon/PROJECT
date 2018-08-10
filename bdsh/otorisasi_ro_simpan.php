<?php
include "header.php";

$id = $_POST['id'];
$otorisasi = $_POST['otorisasi'];


if($otorisasi=='Disetujui'){
$sql = mysql_query ("UPDATE tabel_pdm SET otorisasi_ro='$otorisasi', status_pdm='Disetujui' WHERE id_pdm='$id'");

	if ($sql){
	echo "<script>alert('otorisasi sudah disimpan..')
	location.href='data_pdm.sml'</script>";
	} else {
	echo "<script>alert('otorisasi gagal disimpan..')
	location.href='otorisasi_ro.sml?id=$id'</script>";
	}
} else {
	$cek = mysql_query ("SELECT * FROM tabel_pdm where id_pdm='$id'");
	$hasil = mysql_fetch_array($cek);

	$sql = mysql_query ("UPDATE tabel_pdm SET otorisasi_ro='$otorisasi' WHERE id_pdm='$id'");
	$sql1 = mysql_query ("UPDATE tabel_pas SET sisa_pdm=sisa_pdm+$hasil[total_pdm] WHERE id_pas='$hasil[id_pas]'");

	if (($sql)and($sql1)){
	echo "<script>alert('otorisasi sudah disimpan..')
	location.href='data_pdm.sml'</script>";
	} else {
	echo "<script>alert('otorisasi gagal disimpan..')
	location.href='otorisasi_asm.sml?id=$id'</script>";
	}
}

?>