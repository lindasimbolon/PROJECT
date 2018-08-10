<?php 
include "header.php";

$no = $_POST['no'];
$kode = $_POST['kode'];
$jumlah=0;
$date = $_POST['tgl'];

$cek = mysql_query("INSERT INTO tabel_sipas (id_sipas,id_pas,jumlah_sipas,tgl_kirimao,status_sipas) VALUES ('$kode','$no','$jumlah','$date','Pending')");		
$sql = mysql_query("UPDATE tabel_pas SET sipas_status='Proses' where id_pas='$no'");
if(($cek)and($sql)){
echo "<script>alert('Silakan masukkan biaya sipas..')
location.href='sipas_akhir.sml?id=$kode'</script>";
} else {
echo "<script>alert('data gagal disimpan, silakan coba lagi..')
location.href='input_sipas.sml'</script>";
}