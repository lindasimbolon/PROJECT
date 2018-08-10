<?php
include "header.php";

$id = $_POST['id'];
$no = $_POST['no'];
$items= $_POST['items'];
$kota = $_POST['kota'];
$jumlah = $_POST['jumlah'];
$harga = $_POST['harga'];
$hari = $_POST['hari'];

$total = $jumlah * $harga * $hari;
$total1 = $jumlah * $harga;


$cek = mysql_query ("select * from tabel_estimasi where id_estimasi = $id");
$hasil = mysql_fetch_array($cek);

$pertama = mysql_query ("UPDATE tabel_pas SET total_pas=total_pas-$hasil[total] WHERE id_pas = $hasil[id_pas]");

if($hari<>0){
	$sql = mysql_query ("UPDATE tabel_estimasi SET items='$items',kota='$kota',jumlah='$jumlah',harga_unit='$harga',jml_hari='$hari',total='$total' where id_estimasi='$id'");
	$sql1 = mysql_query ("UPDATE tabel_pas SET total_pas=total_pas+'$total' where id_pas='$hasil[id_pas]'");
	
	if(($sql)and($sql1)){
	echo "<script>alert('Data berhasil disimpan')
	location.href='detail_biaya.sml?id=$hasil[id_pas]'</script>";
	}else{
	echo "<script>alert('Data gagal disimpan')
	location.href='detail_biaya.sml?id=$hasil[id_pas]'</script>";
	}
} else {
	$sql = mysql_query ("UPDATE tabel_estimasi SET items='$items',kota='$kota',jumlah='$jumlah',harga_unit='$harga',jml_hari='$hari',total='$total1' where id_estimasi='$id'");
	$sql1 = mysql_query ("UPDATE tabel_pas SET total_pas=total_pas+'$total1' where id_pas='$hasil[id_pas]'");
	
	if(($sql)and($sql1)){
	echo "<script>alert('Data berhasil disimpan')
	location.href='detail_biaya.sml?id=$hasil[id_pas]'</script>";
	} else {
	echo "<script>alert('Data gagal disimpan')
	location.href='detail_biaya.sml?id=$hasil[id_pas]'</script>";
	}
}



?>