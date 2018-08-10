<?php
include "header.php";

$id = $_POST['id'];
$no = $_POST['no'];
$program = $_POST['program'];
$tgl1= $_POST['tgl1'];
$tgl5= $_POST['tgl5'];
$cmr= $_POST['cmr'];

if($tgl5<>""){
	if($tgl5<$tgl1){
	echo "<script>alert('Tanggal selesai tidak boleh lebih dahulu dari tanggal mulai pelaksanaan..')
	location.href='edit_pas.sml?id=$id'</script>";
	} else {
	$sql = mysql_query ("UPDATE tabel_pas SET no_pas = '$no', program='$program', tgl_pelaksanaan='$tgl1', tgl_selesai='$tgl5',id_cmr='$cmr' where id_pas ='$id'");
		if($sql){
		echo "<script>alert('Data PAS berhasil di ubah..')
		location.href='data_pas.sml'</script>";
		} else {
		echo "<script>alert('Data PAS gagal di ubah..')
		location.href='data_pas.sml'</script>";
		}
	} 
	
}else{
	$sql = mysql_query ("UPDATE tabel_pas SET no_pas = '$no', program='$program', tgl_pelaksanaan='$tgl1', tgl_selesai=NULL,id_cmr='$cmr' where id_pas ='$id'");
		if($sql){
		echo "<script>alert('Data PAS berhasil di ubah..')
		location.href='data_pas.sml'</script>";
		} else {
		echo "<script>alert('Data PAS gagal di ubah..')
		location.href='data_pas.sml'</script>";
		}
	}
?>