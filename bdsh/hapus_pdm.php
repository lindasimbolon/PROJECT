<?php
include "header.php";

$id= $_GET['id'];

$cek = mysql_query("SELECT * FROM tabel_pdm where id_pdm='$id'");
$hasil = mysql_fetch_array($cek);

$sql1 = mysql_query ("UPDATE tabel_pas SET sisa_pdm=sisa_pdm+$hasil[total_pdm] where id_pas='$hasil[id_pas]'");
$sql = mysql_query ("DELETE FROM tabel_pdm WHERE id_pdm='$hasil[id_pdm]'");

if(($sql)and($sql1)){
echo "<script>alert('Data berhasil dihapus')
location.href='data_pdm.sml'</script>";
} else {
echo "<script>alert('Gagal disimpan')
location.href='data_pdm.sml'</script>";
}
?>