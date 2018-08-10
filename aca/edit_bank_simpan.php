<?php
include "header.php";

$id = $_POST['id'];
$nama_b = $_POST['nama_b'];
$nama_r = $_POST['nama_r'];
$no_r = $_POST['no_r'];

$sql = mysql_query ("UPDATE tabel_bank SET nama_bank='$nama_b', no_rek='$no_r', nama_rek='$nama_r' where id_bank='$id'");

if($sql){
echo "<script>alert('Data berhasil diedit')
location.href='data_bank.sml'</script>";
} else {
echo "<script>alert('Data gagal diedit')
location.href='input_bank.sml'</script>";
}

?>