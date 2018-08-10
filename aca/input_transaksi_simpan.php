<?php
include "header.php";

$id=$_POST['id'];
$kode=$_POST['kode'];
$tgl=$_POST['tgl'];
$jenis = $_POST['jenis'];
$keterangan = $_POST['keterangan'];
$jumlah = $_POST['jumlah'];


$nama_file = $_FILES["upload"]["name"];
$acak      = rand(1,99);
$unik = $acak.$nama_file; 

$folder = "transaksi";
$tmp_name = $_FILES["upload"]["tmp_name"];
$name = $folder."/".$unik;

//kode untuk upload ke folder gambar
move_uploaded_file($tmp_name, $name);

if($jenis=="Penerimaan"){
$sql1=mysql_query("UPDATE tabel_dana SET penerimaan=penerimaan+$jumlah,total_dana=total_dana+$jumlah WHERE id_dana='$kode'");
$cek = mysql_query ("SELECT * FROM tabel_dana where id_dana=$kode");
$hasil = mysql_fetch_array($cek);
$sql2 = mysql_query ("INSERT INTO tabel_history (id_transaksi,tanggal,ket_history,masuk,total) VALUES('$id','$tgl','$keterangan','$jumlah','$hasil[total_dana]')");
$sql = mysql_query ("INSERT INTO tabel_dana_transaksi VALUES('$id','$kode','$tgl','$jenis','$keterangan','$jumlah','$unik')");

	if(($sql)and($sql1)and($sql2)){
		echo "<script>alert('Transaksi sudah disimpan..')
		location.href='dana_all.sml'</script>"; 
		} else {
		echo "<script>alert('transaksi gagal disimpan..')
		location.href='input_transaksi.sml?id=$kode'</script>"; 
		} 
} else {

$sql1=mysql_query("UPDATE tabel_dana SET pengeluaran=pengeluaran+$jumlah,total_dana=total_dana-$jumlah WHERE id_dana='$kode'");
$cek = mysql_query ("SELECT * FROM tabel_dana where id_dana=$kode");
$hasil = mysql_fetch_array($cek);
$sql2 = mysql_query ("INSERT INTO tabel_history (id_transaksi,tanggal,ket_history,keluar,total) VALUES('$id','$tgl','$keterangan','$jumlah','$hasil[total_dana]')");
$sql = mysql_query ("INSERT INTO tabel_dana_transaksi VALUES('$id','$kode','$tgl','$jenis','$keterangan','$jumlah','$unik')");

	if(($sql)and($sql1)and($sql2)){
		echo "<script>alert('Transaksi sudah disimpan..')
		location.href='dana_all.sml'</script>"; 
		} else {
		echo "<script>alert('transaksi gagal disimpan..')
		location.href='input_transaksi.sml?id=$kode'</script>"; 
		} 
}
?>