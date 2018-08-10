<?php
include "header.php";

$id= $_GET['id'];

$sql = mysql_query ("DELETE FROM tabel_cmr WHERE id_cmr='$id'");

if($sql){
echo "<script>
location.href='data_cmr.sml'</script>";
} else {
echo "<script>alert('Gagal disimpan')
location.href='data_cmr.sml'</script>";
}
?>