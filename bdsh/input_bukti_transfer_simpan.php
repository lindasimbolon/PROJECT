<?php
include "header.php";
$id 		= $_POST['id'];
$id_pdm		= $_POST['id_pdm'];
$id_pas		= $_POST['id_pas'];
$no_pas 	= $_POST['no_pas'];
$no_rek_tujuan 	= $_POST['no_rek_tujuan'];
$tanggal_kirim 	= $_POST['tanggal_kirim'];
$jumlah_dana 	= $_POST['jumlah_dana'];
$file		= $_POST['file'];
	
// Baca lokasi file sementar dan nama file dari form (upload)
$lokasi_file 	= $_FILES['file']['tmp_name'];
$nama_file   	= $_FILES['file']['name'];

// Tentukan folder untuk menyimpan file
$folder 	= "./f_a/file/Bukti_transfer_".$id."_".$tanggal_kirim;
$unik 		= "Bukti_transfer_".$id."_".$tanggal_kirim;

if(move_uploaded_file($_FILES['file']['tmp_name'], $folder)){
$sql = mysql_query ("INSERT INTO tabel_bukti_transfer VALUES('$id','$no_rek_tujuan','$no_pas','$tanggal_kirim','$jumlah_dana','$unik','$id_pdm', '$id_pas')");
//$sql1= mysql_query ("UPDATE tabel_pdm SET status_transfer='Sudah Ditransfer' WHERE id_pdm='$id_pdm'");
$sql1= mysql_query ("UPDATE tabel_pas SET status_transfer='Sudah Ditransfer' WHERE id_pas='$id_pas'");

		if(($sql)and($sql1)){
			$cek_regional = mysql_query ("SELECT * FROM tabel_pas a, tabel_cmr b, tabel_ao c, tabel_pdm d WHERE a.id_pas=d.id_pas and a.id_cmr=b.id_cmr and 
						b.id_ao=c.id_ao and d.id_pdm='$id_pdm'");
			$hasil_regional = mysql_fetch_array($cek_regional);
				$email_admin    = $hasil_regional['email_admin'];
				$email_rpm		= $hasil_regional['email_rpm'];
				$email_aca		= $hasil_regional['email_aca'];
				 
				$message	= "Dear Admin Marketing,<br><br><br>

						Melalui email ini kami informasikan bahwa ada PDM yang sudah ditransfer.<br><br>
						
						silakan login untuk melihat bukti transfernya: <a href=pas.apachesml.co.id> http://pas.apachesml.co.id</a>
						<br><br>
						
						Atas perhatiannya kami ucapkan terima kasih.
						
						<br><br><br>
						
						Regards, <br>
						<br>
						<br>
						PAS ONLINE";
								
				$to= $email_admin;
				$subject="TRANSFER PDM";
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
									
				// More headers
				$headers .= 'From: <PAS ONLINE>' . "\r\n";
				$headers .= 'Cc: testing@apachesml.co.id,testing@apachesml.co.id,'.$email_rpm.','.$email_aca.'' . "\r\n";
				$headers .= 'Bcc: testing@apachesml.co.id,testing@apachesml.co.id,testing@apachesml.co.id' . "\r\n";
				@mail($to,$subject,$message,$headers);
			
			echo "<script>alert('Berhasil disimpan')
			location.href='data_bukti_transfer.php'</script>";
		} else {
			echo "<script>alert('Gagal disimpan')
			location.href='data_bukti_transfer.php'</script>";
		}
}else {
	echo "<script>alert('Gagal..')
	location.href='input_bukti_transfer.php'</script>";
	}
?>