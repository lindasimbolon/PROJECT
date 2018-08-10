<?php
include "header.php";
$id_proposal 	= $_GET['id'];

$sql = mysql_query ("UPDATE `sml_pas`.`tabel_proposal` SET `validasi_spv` = 'Valid' WHERE `tabel_proposal`.`id_proposal` = '$id_proposal'");

	if($sql){
	//proses kirim email ke rpm untuk persetujuan proposal
		$cek_email = mysql_query ("SELECT * FROM tabel_proposal a, tabel_cmr b, tabel_ao c WHERE a.id_cmr=b.id_cmr and b.id_ao=c.id_ao and a.id_proposal='$id_proposal'");
		$hasil_email= mysql_fetch_array($cek_email);
		
		
		$cek_info 	= mysql_query("SELECT * FROM tabel_info where id_info='7'");
		$hasil_info   	= mysql_fetch_array($cek_info);
		$message	= $hasil_info['info'];
						
		$to= $hasil_email['email_aca'];
		$subject="PENGAJUAN PROPOSAL PAS";
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
							
		// More headers
		$headers .= 'From: <PAS ONLINE>' . "\r\n";
		$headers .= 'Cc: lindawati@apachesml.com;frans@apachesml.com' . "\r\n";
		@mail($to,$subject,$message,$headers);
		
	echo "<script>alert('Data sudah tersimpan, terima kasih..')
	location.href='data_perpos_spv.php'</script>";
	}else{
	echo "<script>alert('Data gagal disimpan, silakan ulangi proses..')
	location.href='detail_proposal_spv.php?id=$id_proposal'</script>";
	}

?>