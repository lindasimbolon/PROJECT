<?php
include "header.php";

$id= $_POST['id'];

$nama_file = $_FILES["upload"]["name"];
$acak      = rand(1,99);
$unik = $acak.$nama_file; 

$folder = "iom";
$tmp_name = $_FILES["upload"]["tmp_name"];
$name = $folder."/".$unik;

//kode untuk upload ke folder gambar
move_uploaded_file($tmp_name, $name);

	$sql = mysql_query ("UPDATE tabel_pas SET file_iom='$unik' where id_pas='$id'");

if($sql){
echo "<script>alert('Upload IOM sudah berhasil')
location.href='lihat_file.sml?id=$id'</script>";
} else {
echo "<script>alert('Gagal disimpan')
location.href='lihat_file.sml?id=$id'</script>";
}
?>