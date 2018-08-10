<?php
include "header.php";

$id= $_GET['id'];
$no= $_GET['no'];

$cek=mysql_query("SELECT * FROM tabel_sipas_detial where id_sipas_detail='$id'");
$hasil=mysql_fetch_array($cek);

$sql1 = mysql_query ("UPDATE tabel_sipas  SET jumlah_sipas = jumlah_sipas - $hasil[subtotal] WHERE id_sipas='$no'");
$sql = mysql_query ("DELETE FROM tabel_sipas_detail WHERE id_sipas_detail='$hasil[id_si]'");

if(($sql1)and($sql)){
echo "<script>
location.href='sipas_akhir.sml?id=$no'</script>";
} else {
echo "<script>alert('Gagal disimpan')
location.href='sipas_akhir.sml?id=$no'</script>";
}
?>