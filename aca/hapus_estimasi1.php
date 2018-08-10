<?php
include "header.php";

$id= $_GET['id'];
$no= $_GET['no'];

$cek=mysql_query("SELECT * FROM tabel_estimasi where id_estimasi='$id'");
$hasil=mysql_fetch_array($cek);

$sql = mysql_query ("DELETE FROM tabel_estimasi WHERE id_estimasi='$hasil[id_estimasi]'");
$sql1 = mysql_query ("UPDATE tabel_pas  SET total_pas = total_pas - $hasil[total] WHERE id_pas='$no'");

if(($sql)and($sql1)){
echo "<script>
location.href='detail_biaya.sml?id=$no'</script>";
} else {
echo "<script>alert('Gagal disimpan')
location.href='detail_biaya.sml?id=$no'</script>";
}
?>