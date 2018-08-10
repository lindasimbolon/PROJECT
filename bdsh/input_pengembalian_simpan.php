<?php
include "header.php";
$id_sipas		= $_POST['id_sipas'];
$no_rek		 	= $_POST['no_rek'];
$jumlah 	 	= $_POST['jumlah'];
$tanggal_kirim 	= $_POST['tanggal_kirim'];
$file			= $_POST['file'];
	
// Baca lokasi file sementar dan nama file dari form (upload)
$lokasi_file 	= $_FILES['file']['tmp_name'];
$nama_file   	= $_FILES['file']['name'];

// Tentukan folder untuk menyimpan file
$folder 	= "file/Bukti_transfer_".$id_sipas."_".$nama_file;
$unik 		= "Bukti_transfer_".$id_sipas."_".$nama_file;

if(move_uploaded_file($_FILES['file']['tmp_name'], $folder)){
$sql = mysql_query ("INSERT INTO tabel_pengembalian (id_sipas,no_rek,tgl_kirim,jumlah_pengembalian,file) VALUES('$id_sipas','$no_rek','$tanggal_kirim','$jumlah','$unik')");

		if($sql){
			/**
				$message	= "Dear Ibu Deputy Manager Finance,<br><br><br>

						Melalui email ini kami informasikan bahwa ada pengembalian sisa PDM yang sudah ditransfer.<br><br>
						
						silakan login untuk melakukan validasi dan melihat bukti transfernya: <a href=pas.apachesml.co.id> http://pas.apachesml.co.id</a>
						<br><br>
						
						Atas perhatiannya kami ucapkan terima kasih.
						
						<br><br><br>
						
						Regards, <br>
						<br>
						<br>
						PAS ONLINE";
								
				$to		 	= 'erni@apachesml.co.id';
				$subject	= "PENGEMBALIAN SISA PDM";
				$headers 	= "MIME-Version: 1.0" . "\r\n";
				$headers   .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
									
				// More headers
				$headers .= 'From: <PAS ONLINE>' . "\r\n";
				$headers .= 'Cc: marisa@apachesml.co.id' . "\r\n";
				$headers .= 'Bcc: willy@apachesml.co.id,frans@apachesml.co.id,rolina@apachesml.co.id' . "\r\n";
				@mail($to,$subject,$message,$headers);
			*/
			echo "<script>alert('Berhasil disimpan')
			location.href='data_pengembalian.php'</script>";
		} else {
			echo "<script>alert('Gagal disimpan')
			location.href='input_pengembalian.php'</script>";
		}
}else {
	echo "<script>alert('Gagal..')
	location.href='input_pengembalian.php'</script>";
	}
?>