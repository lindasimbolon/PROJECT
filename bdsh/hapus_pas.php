<?php
include "../koneksi.php";

$id= $_GET['id'];

$cek = mysql_query("SELECT * FROM tabel_pas where id_pas='$id'");
$hasil = mysql_fetch_array($cek);
$total_pas = $hasil['total_pas'];
$kategori=explode('_', $hasil['kategori']);
$hasil_kat=$kategori[0];
if ($hasil_kat=='LOKAL') {
	$sql1 = mysql_query ("UPDATE tabel_budget SET penggunaan_lokal=penggunaan_lokal-$total_pas where id_budget='$hasil[id_budget]'");
}
else
{
	$sql1 = mysql_query ("UPDATE tabel_budget SET penggunaan_pusat=penggunaan_pusat-$total_pas where id_budget='$hasil[id_budget]'");
}

$sql = mysql_query ("DELETE FROM tabel_pas WHERE id_pas='$hasil[id_pas]'");

if(($sql)and($sql1)){
echo "<script>alert('Data berhasil dihapus')
location.href='pas_valid.sml'</script>";
} else {
echo "<script>alert('Gagal disimpan')
location.href='pas_valid.sml'</script>";
}
?> 