<?php
include "header.php";

$id_pas		= $_POST['id_pas'];
$tgl		= date('Y-m-d');
$cek_id		= mysql_query("SELECT max(id_sipas) as id FROM tabel_sipas");
$hasil		= mysql_fetch_array($cek_id);
$id_sipas	= $hasil['id'] + 1;

$id_budget	= $_POST['id_budget'];
$keterangan	= $_POST['keterangan'];
$jumlah		= $_POST['jumlah'];
$pph		= $_POST['pph'];
$count		= count($keterangan);

$simpan		= mysql_query("INSERT INTO tabel_sipas (`id_sipas`,`id_pas`,`tgl_kirimao`,`status_sipas`) VALUES ('$id_sipas','$id_pas','$tgl','Pending')");
$update		= mysql_query("UPDATE tabel_pas SET sipas_status='Pending' where id_pas='$id_pas'");

if(($simpan)and($update)){
	$sql   = "INSERT INTO tabel_sipas_detail (`id_sipas_detail`, `id_sipas`, `realisasi`, `jenis`, `satuan_sipas`, `jumlah_dsipas`, `hari_sipas`, `subtotal`) VALUES ";
	for( $i=0; $i < $count; $i++ )
	{
	$sql .= "('{NULL}','{$id_sipas}','{$keterangan[$i]}','{$pph[$i]}','{NULL}','{NULL}','{NULL}','{$jumlah[$i]}')";
	$sql .= ",";
	}
	$sql = rtrim($sql,",");
	$insert = mysql_query($sql);
	
	if($insert){
	echo "<script>alert('SIPAS berhasil dibuat, silakan Cetak SIPAS yang sudah dibuat..')
	location.href='data_cetak_sipas.php'</script>";
	} else {
	echo "<script>alert('SIPAS gagal diajukan, silakan ajukan kembali..')
	location.href='input_sipas.php'</script>";
	}
} else {
	echo "no";
}
?>