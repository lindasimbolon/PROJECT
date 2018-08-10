<?php
include "header.php";

$id= $_GET['id'];

$cek = mysql_query("SELECT * FROM tabel_penggantian where id_penggantian='$id'");
$hasil = mysql_fetch_array($cek);

$sql1 = mysql_query ("UPDATE `sml_pas`.`tabel_sipas` SET `tgl_penggantian` = NULL, `status_sipas` = 'Selesai' WHERE `tabel_sipas`.`id_sipas` ='$hasil[id_sipas]'");
$sql = mysql_query ("DELETE FROM tabel_penggantian WHERE id_penggantian='$hasil[id_penggantian]'");

if(($sql)and($sql1)){
echo "<script>alert('Data berhasil dihapus')
location.href='sipas_penggantian.sml'</script>";
} else {
echo "<script>alert('Gagal disimpan')
location.href='sipas_penggantian.sml'</script>";
}
?>