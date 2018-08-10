<?php
include "header.php";

$no       = $_POST['no'];
$validasi = $_POST['validasi'];
$tgl	  = $_POST['tgl'];

if($validasi=="Ditolak"){
echo "<script>location.href='alasan.sml?id=$no&tgl=$tgl'</script>";
} else {
$sql = mysql_query ("UPDATE tabel_pas SET status_pas='Disetujui', tgl_disetujui='$tgl' where id_pas='$no'");
	if($sql){
	echo "<script>alert('Data pas sudah disetujui..')
	location.href='pas_valid.sml'</script>";
	} else {
	echo "<script>alert('Data pas gagal..')
	location.href='validasi_pas.sml'</script>";
	}
}
?>