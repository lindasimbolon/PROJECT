<?php
include "../koneksi.php";
error_reporting(1);

$id_proposal 	= $_GET['id'];
$sql 			= mysql_query("SELECT * FROM tabel_proposal a, tabel_cmr b, tabel_ao c where a.id_cmr=b.id_cmr and b.id_ao=c.id_ao and a.id_proposal='$id_proposal'");
$hasil 			= mysql_fetch_array($sql);

// buat no pas
$tahun		= substr($hasil['mulai_pelaksanaan'],2,2);
$tahun_cek	= substr($hasil['mulai_pelaksanaan'],0,4);
$bulan		= substr($hasil['mulai_pelaksanaan'],5,2);
$urut		= mysql_query ("SELECT max(substring(a.no_pas,11,3)+1) as no FROM `tabel_pas` a, tabel_cmr b, tabel_ao c WHERE a.id_cmr=b.id_cmr and c.id_ao=b.id_ao and 
			  YEAR(tgl_pelaksanaan)='$tahun_cek' and MONTH(tgl_pelaksanaan)='$bulan' and c.singkatan='$hasil[singkatan]' and (a.kategori='LOKAL' or a.kategori='LOKAL_RM' 
			  or a.kategori='LOKAL_GMO' or a.kategori='LOKAL_DIREKSI')");
$hasil_urut	= mysql_fetch_array($urut);

if($hasil_urut['no']==""){
$no_akhir = 1 ;
} else {
$no_akhir = $hasil_urut['no'];
}

$no_urut	= $no_akhir;
if($no_urut<10){
$no 	= "00".$no_urut;
} else {
$no 	= "0".$no_urut;
}

$ao			= $hasil['singkatan'];

$no_pas = "SML/".$tahun."/".$bulan."/".$no."/".$ao."/SMN";
// selesai buat no

$tgl_skg = date('Y-m-d');

$biaya_pas 	 		= mysql_query ("SELECT * FROM tabel_estimasi_budget where id_proposal='$id_proposal'");
while($total_pas 	= mysql_fetch_array($biaya_pas)){

	$bagi_pajak 		= explode("-",$total_pas['pph']);
	$pph	    		= $bagi_pajak[0];

	$bagi_ppn 			= explode("-",$total_pas['ppn']);
	$ppn	    		= $bagi_ppn[0];

	//total biaya diluar pph dan ppn
	$sub_total 	= $total_pas['harga_budget'] * $total_pas['jumlah_budget'];

	//total pph
	$sub_total_pph 	= (($sub_total* 100) / (100 - $pph)) - $sub_total;

	//total ppn			
	$sub_total_ppn		= ($sub_total / $ppn);
	if($sub_total_ppn==0){
	$sub_total_ppn		= 0 ;
	}else{
	$sub_total_ppn		= $sub_total_ppn;
	}
	$jumlah 	= $jumlah + $sub_total + $sub_total_pph + $sub_total_ppn; 
	$pdm		= $pdm + $sub_total;
}

//menampilkan bulan quartal proposal, total pengajuan dan ao pelaksana proposal
$cek_ao  			= mysql_fetch_array(mysql_query("SELECT a.jenis_proposal as jenis, c.nama_ao as ao, month(a.mulai_pelaksanaan) as bulan, year(a.mulai_pelaksanaan) as tahun 
					  from tabel_proposal a, tabel_cmr b, tabel_ao c where a.id_cmr=b.id_cmr and b.id_ao=c.id_ao and a.id_proposal='$id_proposal'"));

$tahun				= $cek_ao['tahun'];
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

//cek id_budget
$cek_budget = mysql_fetch_array(mysql_query("SELECT a.id_budget as id FROM tabel_budget a, tabel_quartal b where a.id_quartal=b.id_quartal and a.ao='".$nama_ao."' and 
			  a.tahun='".$tahun."' and b.nama_quartal='".$quartal."' and a.status='Disetujui'"));
$id_budget  = $cek_budget['id'];

//proses simpan PAS
$simpan 	= mysql_query ("INSERT INTO tabel_pas (no_pas,program,tgl_pelaksanaan,tgl_selesai,id_cmr,kategori,tgl_pengajuan,status_pas,total_pas,sisa_pdm,id_proposal,id_budget) 
		      VALUES ('$no_pas','$hasil[nama_program]','$hasil[mulai_pelaksanaan]','$hasil[akhir_pelaksanaan]','$hasil[id_cmr]','$hasil[jenis_proposal]','$tgl_skg','Pending',
		      '$jumlah','$pdm','$id_proposal','$id_budget')");
			  
//Update status tabel proposal			
$update_proposal = mysql_query ("UPDATE tabel_proposal SET status_pas='Sudah PAS' where id_proposal='$id_proposal'");

//Update penggunaan lokal di tabel_budget
$update_budget = mysql_query ("UPDATE tabel_budget SET penggunaan_lokal = penggunaan_lokal+'".$jumlah."' where id_budget='".$id_budget."'");


if(($simpan)and($update_proposal)and($update_budget)){
	
	//proses kirim email ke rm untuk persetujuan
	
	$message	= "Kepada Yth. Bapak Regional Manager,<br>
				  <br>
				  <br>
				  Melalui email ini kami sampaikan bahwa ada pengajuan PAS yang perlu persetujuan oleh Bapak Regional Manager.<br>
				  Untuk itu silakan anda masuk ke System PAS Online di alamat : <a href=pas.apachesml.co.id> http://pas.apachesml.co.id</a><br>
				  <br>
				  Atas perhatiannya kami ucapkan terima kasih.<br>
				  <br>
				  <br>
				  Regards, <br>
				  <br>
				  <br>
				  PAS ONLINE";
		
	$to			= 'gunadi@apachesml.co.id';
	$subject	="PENGAJUAN PAS";
	$headers 	= "MIME-Version: 1.0" . "\r\n";
	$headers 	.= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
							
	// More headers
	$headers .= 'From: <PAS ONLINE>' . "\r\n";
	$headers .= 'Bcc: willy@apachesml.co.id,frans@apachesml.co.id,rolina@apachesml.co.id' . "\r\n";
	@mail($to,$subject,$message,$headers);
	
	echo "<script>alert('Pas berhasil diajukan, terima kasih..')
	location.href='pas_pending.sml'</script>";
}else{
	echo "<script>alert('Pas gagal diajukan, terima kasih..')
	location.href='review_lokal.sml?id=$id_proposal'</script>";
}
?>