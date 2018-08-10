<?php
include "header.php";

$id = $_GET['id'];

$sql = mysql_query ("DELETE FROM tabel_bank where id_bank='$id'");

if($sql){
echo "<script>alert('Data berhasil dihapus')
location.href='data_bank.sml'</script>";
} else {
echo "<script>alert('Data gagal dihapus')
location.href='data_bank.sml'</script>";
}

?>