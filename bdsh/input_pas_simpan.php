<?php
include "header.php";

$id= $_POST['id'];
$no = $_POST['no'];
$program = $_POST['program'];
$tgl1 = $_POST['tgl1'];
$tgl5 = $_POST['tgl5'];
$kategori = $_POST['kategori'];
$cmr = $_POST['cmr'];
$tgl = date('Y-m-d');

if ($tgl5=="") {
$sql = mysql_query ("INSERT INTO tabel_pas  (id_pas,no_pas,program,tgl_pelaksanaan,tgl_selesai,id_cmr,kategori,tgl_pengajuan,status_pas) VALUES ('$id','$no','$program','$tgl1','$tgl5','$cmr','$kategori','$tgl','Pending')");

	if($sql){
	echo "<script>alert('Data berhasil disimpan, sekarang silakan input estimasi biaya PAS..')
	location.href='lanjut_pas.sml?id=$id'</script>";
	} else {
	echo "<script>alert('Gagal disimpan')
	location.href='input_pas.sml?kategori=$kategori'</script>";
	}
}elseif($tgl5<$tgl1){
echo "<script>alert('Tanggal selesai tidak boleh kurang dari tanggal mulai..')
location.href='input_pas.sml?kategori=$kategori'</script>";
}  else {
	$sql = mysql_query ("INSERT INTO tabel_pas  (id_pas,no_pas,program,tgl_pelaksanaan,tgl_selesai,id_cmr,kategori,tgl_pengajuan,status_pas) VALUES ('$id','$no','$program','$tgl1','$tgl5','$cmr','$kategori','$tgl','Pending')");

	if($sql){
	echo "<script>alert('Data berhasil disimpan, sekarang silakan input estimasi biaya PAS..')
	location.href='lanjut_pas.sml?id=$id'</script>";
	} else {
	echo "<script>alert('Gagal disimpan')
	location.href='input_pas.sml?kategori=$kategori'</script>";
	}
}
?>