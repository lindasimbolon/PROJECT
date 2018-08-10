<?php
include "header.php";

$id = $_POST['id'];
$lampung = $_POST['lampung'];
$kotabumi = $_POST['kotabumi'];
$baturaja = $_POST['baturaja'];
$bengkulu = $_POST['bengkulu'];
$lubuklinggau = $_POST['lubuklinggau'];
$palembang = $_POST['palembang'];
$jambi = $_POST['jambi'];
$quartal = $_POST['quartal'];
$tahun = $_POST['tahun'];
$tgl = date("Y-m-d");

$cek = mysql_query("SELECT * FROM tabel_setting_dana WHERE id_quartal='$quartal' and tahun='$tahun'");
$hasil = mysql_fetch_array($cek);

if ($hasil['id_setting']==""){
$sql = mysql_query ("INSERT INTO tabel_setting_dana VALUES('$id','$lampung','$kotabumi','$baturaja','$bengkulu','$lubuklinggau','$palembang','$jambi','$quartal','$tahun','$tgl','Open')");
$sql1 = mysql_query ("INSERT INTO tabel_dana (id_quartal,tahun,id_ao,dana_awal,total_dana,status) VALUES('$quartal','$tahun','1','$lampung','$lampung','Open')");
$sql2 = mysql_query ("INSERT INTO tabel_dana (id_quartal,tahun,id_ao,dana_awal,total_dana,status) VALUES('$quartal','$tahun','2','$kotabumi','$kotabumi','Open')");
$sql3 = mysql_query ("INSERT INTO tabel_dana (id_quartal,tahun,id_ao,dana_awal,total_dana,status) VALUES('$quartal','$tahun','3','$baturaja','$baturaja','Open')");
$sql4 = mysql_query ("INSERT INTO tabel_dana (id_quartal,tahun,id_ao,dana_awal,total_dana,status) VALUES('$quartal','$tahun','4','$bengkulu','$bengkulu','Open')");
$sql5 = mysql_query ("INSERT INTO tabel_dana (id_quartal,tahun,id_ao,dana_awal,total_dana,status) VALUES('$quartal','$tahun','5','$lubuklinggau','$lubuklinggau','Open')");
$sql6 = mysql_query ("INSERT INTO tabel_dana (id_quartal,tahun,id_ao,dana_awal,total_dana,status) VALUES('$quartal','$tahun','6','$palembang','$palembang','Open')");
$sql7 = mysql_query ("INSERT INTO tabel_dana (id_quartal,tahun,id_ao,dana_awal,total_dana,status) VALUES('$quartal','$tahun','7','$jambi','$jambi','Open')");

	if(($sql)and($sql1)and($sql2)and($sql3)and($sql4)and($sql5)and($sql6)and($sql7)){
	echo "<script>alert('Data berhasil disimpan..')
	location.href='data_dana_awal.sml'</script>"; 
	} else {
	echo "<script>alert('Data gagal disimpan..')
	location.href='input_dana_awal.sml'</script>"; 
	}
}else {
echo "<script>alert('Dana sudah disetting sebelumnya..')
location.href='data_dana_awal.sml'</script>"; 
}
?>