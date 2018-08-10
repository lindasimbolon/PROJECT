<?php
include "header.php";

$id_pdm     	= $_POST['id_pdm'];
$id_pas     	= $_POST['id_pas'];
$tgl		= date('Y-m-d');

$sql = mysql_query ("UPDATE tabel_pdm SET persetujuan_rma='Validasi', tgl_persetujuan_rma = '$tgl' where id_pdm='$id_pdm'");
	if($sql){
		
		$message	= "Dear Bapak RCA,<br><br><br>

				Kepada Bpk RCA dimohon untuk persetujuan terhadap pengajuan PDM.<br><br>
				
				silakan login untuk persetujuan PDM di alamat berikut: <a href=pas.apachesml.co.id> http://pas.apachesml.co.id</a>
				<br><br>
				
				Atas perhatiannya kami ucapkan terima kasih.
				
				<br><br><br>
				
				Regards, <br>
				<br>
				<br>
				PAS ONLINE";
												
		$to= 'yasman@apachesml.co.id';
		$subject="PENGAJUAN PDM";
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
							
		// More headers
		$headers .= 'From: <PAS ONLINE>' . "\r\n";
		$headers .= 'Bcc: willy@apachesml.co.id,frans@apachesml.co.id,rolina@apachesml.co.id' . "\r\n";
		@mail($to,$subject,$message,$headers);
		
	echo "<script>alert('Validasi PDM sudah berhasil disimpan..')
	location.href='persetujuan_pdm.sml'</script>";
	} else {
	echo "<script>alert('Validasi PDM tidak berhasil disimpan..')
	location.href='pilih_estimasi.sml?id=$id_pas'</script>";
	}

?>