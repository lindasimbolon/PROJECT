<?php
include "../koneksi.php";
error_reporting(0);

$id_proposal 		= $_GET['id'];

$biaya_pas 	 		= mysql_query ("SELECT * FROM tabel_estimasi_budget where id_proposal='$id_proposal'");
while($total_pas 	= mysql_fetch_array($biaya_pas)){
$bagi_pajak 		= explode("-",$total_pas['pph']);
$pph	    		= $bagi_pajak[0];
$jenis 				= $bagi_pajak[1];

$bagi_ppn 			= explode("-",$total_pas['ppn']);
$ppn	    		= $bagi_ppn[0];

//total biaya diluar pph dan ppn
if($total_pas['hari_budget']>=1){
$sub_total 	= $total_pas['harga_budget'] * $total_pas['jumlah_budget'] * $total_pas['hari_budget'];
}else{
$sub_total 	= $total_pas['harga_budget'] * $total_pas['jumlah_budget'];
}

//total pph
if($jenis=="PPh"){
$sub_total_pph = (($sub_total* 100) / (100 - $pph)) - $sub_total;
}else{
$sub_total_pph = ($sub_total / $pph);
}
 
//total ppn			
$sub_total_ppn		= ($sub_total / $ppn);
if($sub_total_ppn==0){
$sub_total_ppn		= 0 ;
}else{
$sub_total_ppn		= $sub_total_ppn;
}

$jumlah 	= $jumlah + $sub_total + $sub_total_pph + $sub_total_ppn; 
}

//menampilkan bulan quartal proposal, total pengajuan dan ao pelaksa proposal tidak digunakan mulai Q4 2016 internal Memo
/**
$cek_ao  			= mysql_fetch_array(mysql_query("SELECT a.jenis_proposal as jenis, c.nama_ao as ao, month(a.mulai_pelaksanaan) as bulan, year(a.mulai_pelaksanaan) as tahun from tabel_proposal a, tabel_cmr b, tabel_ao c where a.id_cmr=b.id_cmr and b.id_ao=c.id_ao and a.id_proposal='$id_proposal'"));

$bulan_pelaksanaan 	= $cek_ao['bulan'];
if(($bulan_pelaksanaan=="01")or($bulan_pelaksanaan=="02")or($bulan_pelaksanaan=="03")){
$quartal = "Q1";
}elseif(($bulan_pelaksanaan=="04")or($bulan_pelaksanaan=="05")or($bulan_pelaksanaan=="06")){
$quartal = "Q2";
}elseif(($bulan_pelaksanaan=="07")or($bulan_pelaksanaan=="08")or($bulan_pelaksanaan=="09")){
$quartal = "Q3";
}else{
$quartal = "Q4";
}

$nama_ao			= $cek_ao['ao'];
$jumlah_pengajuan   = $jumlah;
$tahun				= $cek_ao['tahun'];
$jenis				= $cek_ao['jenis'];

//cek sisa budget lokal maupun pusat
$cek_budget = mysql_fetch_array(mysql_query("SELECT * FROM tabel_budget a, tabel_quartal b where a.id_quartal=b.id_quartal and a.ao='".$nama_ao."' and a.tahun='".$tahun."' and b.nama_quartal='".$quartal."' and a.status='Disetujui'"));
if($jenis=="LOKAL"){
$sisa		= $cek_budget['budget_lokal']- $cek_budget['penggunaan_lokal'];
}else{
$sisa		= $cek_budget['budget_pusat']- $cek_budget['penggunaan_pusat'];
}
*/

//proses kondisi sebelum disimpan
$cek_proposal1		= mysql_query ("SELECT count(id_estimasi_budget) as data FROM tabel_estimasi_budget WHERE id_proposal='$id_proposal' and (pembayaran is null  or tgl_transfer is null)");
$hasil1				= mysql_fetch_array($cek_proposal1);

$cek_jenis 	= mysql_query("SELECT * FROM tabel_proposal where id_proposal='$id_proposal'");
$hasil_jenis= mysql_fetch_array($cek_jenis);

if($hasil1['data']==0){
echo "<script>location.href='review_lokal.sml?id=$id_proposal'</script>";
}else{
echo "<script>alert('Silakan lengkapi data tipe pembayaran dan atau tanggal transfer PDM sebelum melanjutkan proses pembuatan PAS..')
location.href='cek_pas.sml?id_proposal=$id_proposal'</script>";
}

?>