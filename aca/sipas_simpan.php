<?php
include "header.php";

$id= $_POST['id'];
$no = $_POST['no'];
$items = $_POST['items'];
$jumlah= $_POST['jumlah'];
$harga = $_POST['harga'];
$hari = $_POST['hari'];

if($hari<>""){
$total = $jumlah*$harga*$hari;
} else {
$total = $jumlah*$harga;
}			
$sql1=mysql_query("UPDATE tabel_sipas SET jumlah_sipas=jumlah_sipas+'$total' Where id_sipas='$no'");
$sql = mysql_query ("INSERT INTO tabel_sipas_detail VALUES ('$id','$no','$items','$jumlah','$harga','$hari','$total')");

if(($sql)and($sql1)){
echo "<script>
location.href='sipas_akhir.sml?id=$no'</script>";
} else {
echo "<script>alert('Gagal disimpan')
location.href='sipas_akhir.sml?id=$no'</script>";
}
?>