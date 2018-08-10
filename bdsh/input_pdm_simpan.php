<?php
include "header.php";

$pas = $_POST['pas'];
$tgl = $_POST['tgl'];
$tgl1 = date('Y-m-d');

$sql = mysql_query("INSERT INTO tabel_pdm (id_pas,tgl_buat,tgl_butuh,status_pdm) VALUES ('$pas','$tgl1','$tgl','Pending')");
$cek = mysql_query ("SELECT * FROM tabel_pdm where id_pas='$pas'");
$hasil = mysql_fetch_array($cek);

if($sql){
echo "<script>alert('Data berhasil disimpan, silakan isi jumlah biayanya..')
location.href='pdm_lanjut.sml?id=$hasil[id_pdm]'</script>";
} else {
echo "<script>alert('Data gagal disimpan, silakan coba kembali..')
location.href='input_pdm.sml'</script>";
}

?>