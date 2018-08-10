<?php 
include "header.php";

$no = $_POST['no'];
$date2 = date('Y-m-d');
$date1= $_POST['tgl'];
$total = $_POST['total'];

$cek = mysql_query("INSERT INTO tabel_penggantian (id_sipas,tgl_input_penggantian,tgl_penggantian,total_penggantian) VALUES ('$no','$date2','$date1','$total')");	
$cek1 = mysql_query("UPDATE tabel_sipas SET tgl_penggantian='$date1', status_sipas='Sudah Diganti' where id_sipas='$no'");

if(($cek)and($cek1)){
echo "<script>alert('Data penggantian sudah disimpan..')
location.href='sipas_penggantian.sml'</script>";
} else {
echo "<script>alert('data gagal disimpan, silakan coba lagi..')
location.href='input_penggantian.sml'</script>";
}