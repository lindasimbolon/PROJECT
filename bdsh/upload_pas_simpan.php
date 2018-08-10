<?php
include "header.php";

$id= $_POST['id'];

$nama_file = $_FILES["upload"]["name"];
$acak      = rand(1,99);
$unik = $acak.$nama_file; 

$folder = "pas";
$tmp_name = $_FILES["upload"]["tmp_name"];
$name = $folder."/".$unik;

//kode untuk upload ke folder gambar
move_uploaded_file($tmp_name, $name);

	$sql = mysql_query ("UPDATE tabel_pas SET status_pas='Disetujui', file_pas='$unik' where id_pas='$id'");

if($sql){
echo "<script>alert('Upload pas yang sudah disetujui sudah berhasil')
location.href='lihat_file.sml?id=$id'</script>";
} else {
echo "<script>alert('Gagal disimpan')
location.href='lihat_file.sml?id=$id'</script>";
}
?>