<?php
include "header.php";
$id_pas	= $_GET['id'];
$tgl		= date('Y-m-d');

$sql1 		= mysql_query("SELECT * FROM tabel_proposal a, tabel_cmr b, tabel_ao c, tabel_pas d where a.id_proposal=d.id_proposal and a.id_cmr=b.id_cmr and b.id_ao=c.id_ao and d.id_pas='$id_pas'");
$hasil 		= mysql_fetch_array($sql1);
$ao		= $hasil['singkatan'];

//buat no pas
$tahun		= date('y');
$tahun_cek	= date('Y');
$bulan		= date('m');
$urut		= mysql_query ("SELECT max(substring(a.no_pas,11,3)+1) as no FROM `tabel_pas` a, tabel_cmr b, tabel_ao c WHERE a.id_cmr=b.id_cmr and c.id_ao=b.id_ao and YEAR(tgl_validasi_aca)='$tahun_cek' 
			and MONTH(tgl_validasi_aca)='$bulan' and c.singkatan='$hasil[singkatan]' and a.kategori='LOKAL'");
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

$no_pas = "SML/".$tahun."/".$bulan."/".$no."/".$ao."/SMN";


$sql = mysql_query ("UPDATE tabel_pas SET no_pas='$no_pas', `validasi_aca` = 'Valid', tgl_validasi_aca='$tgl' WHERE `tabel_pas`.`id_pas` = '$id_pas'");

	if($sql){
	//proses kirim email ke aca untuk persetujuan pas
		$cek_email = mysql_query ("SELECT * FROM tabel_pas d, tabel_proposal a, tabel_cmr b, tabel_ao c WHERE d.id_proposal=a.id_proposal and a.id_cmr=b.id_cmr and b.id_ao=c.id_ao and 
		d.id_pas='$id_pas'");
		$hasil_email= mysql_fetch_array($cek_email);
		
		
		$cek_info 	= mysql_query("SELECT * FROM tabel_info where id_info='8'");
		$hasil_info   	= mysql_fetch_array($cek_info);
		$message	= $hasil_info['info'];
						
		$to= $hasil_email['email_asm'];
		$subject="PENGAJUAN PAS";
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
							
		// More headers
		$headers .= 'From: <PAS ONLINE>' . "\r\n";
		$headers .= 'Bcc: willy@apachesml.co.id,frans@apachesml.co.id,rolina@apachesml.co.id' . "\r\n";
		@mail($to,$subject,$message,$headers);
		
	echo "<script>alert('Data sudah tersimpan, terima kasih..')
	location.href='data_validasi_pas_aca_lokal.sml'</script>";
	}else{
	echo "<script>alert('Data gagal disimpan, silakan ulangi proses..')
	location.href='detail_pas_aca_lokal.sml?id=$id_pas'</script>";
	}

?>