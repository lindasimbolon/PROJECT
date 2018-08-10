<?php
include "header.php";
$id = $_GET['id'];
echo "<script>alert('Input estimasi PAS sudah selesai..')
location.href='detail_biaya.sml?id=$id'</script>";

?>