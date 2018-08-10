<?php
include "header.php";

$id= $_POST['id'];
$no = $_POST['no'];
$items = $_POST['items'];
$kota = $_POST['kota'];
$jumlah= $_POST['jumlah'];
$harga = $_POST['harga'];
$hari = $_POST['hari'];

if($hari<>""){
$total = $jumlah*$harga*$hari;
} else {
$total = $jumlah*$harga;
}			

$sql = mysql_query ("INSERT INTO tabel_estimasi VALUES ('$id','$no','$items','$kota','$jumlah','$harga','$hari','$total')");

$sql1=mysql_query("UPDATE tabel_pas SET total_pas=total_pas+'$total' Where id_pas='$no'");



if(($sql)and($sql1)){
echo "<script>
location.href='input_estimasi.sml?id=$no'</script>";
} else {
echo "<script>alert('Gagal disimpan')
location.href='input_estimasi.sml?id=$no'</script>";
}
?>