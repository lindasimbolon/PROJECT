<?php
include "header.php";

$id= $_GET['id'];

$cek = mysql_query("SELECT * FROM tabel_sipas where id_sipas='$id'");
$hasil = mysql_fetch_array($cek);

$sql1 = mysql_query ("UPDATE tabel_pas SET sipas_status=NULL, status_pas='Disetujui' where id_pas='$hasil[id_pas]'");
$sql = mysql_query ("DELETE FROM tabel_sipas WHERE id_sipas='$hasil[id_sipas]'");

if(($sql)and($sql1)){
echo "<script>alert('Data berhasil dihapus')
location.href='data_sipas.sml'</script>";
} else {
echo "<script>alert('Gagal disimpan')
location.href='data_sipas.sml'</script>";
}
?>