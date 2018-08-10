<?php
include "header.php";

$id_proposal			= $_POST['id_proposal'];
$id_cmr					= $_POST['id_cmr'];
$brand					= $_POST['brand'];
$nama_program			= strtoupper($_POST['nama_program']);
$id_tipe_program  		= $_POST['id_tipe_program'];
$lokasi 				= strtoupper($_POST['lokasi']);
$lokasi_territory		= $_POST['lokasi_territory'];
$lokasi_kecamatan		= strtoupper($_POST['lokasi_kecamatan']);
$mulai_pelaksanaan		= $_POST['mulai_pelaksanaan'];
$akhir_pelaksanaan		= $_POST['akhir_pelaksanaan'];
$uraian_aktivitas		= strtoupper($_POST['uraian_aktivitas']);
$tujuan_sasaran  		= $_POST['tujuan_sasaran'];
$mekanisme_pelaksanaan 	= $_POST['mekanisme_pelaksanaan'];
$nama_spv				= $_POST['nama_spv'];
$penanggung_jawab		= $_POST['penanggung_jawab'];
$pj="";
foreach($penanggung_jawab as $entry){
$pj .= $entry.",";
}

$pic_program  		= strtoupper($_POST['pic_program']);
$pic_contact	  	= $_POST['pic_contact'];
$target_program  	= strtoupper($_POST['target_program']);
$target_audience	= $_POST['target_audience'];
$target_contact		= $_POST['target_contact'];

$tgl_input		= date('Y-m-d');
$username		= $_POST['username'];

//data untuk insert tabel_estimasi_budget
$keterangan_budget	= $_POST ['keterangan_budget'];
$jumlah_budget		= $_POST ['jumlah_budget'];
$harga_budget		= $_POST ['harga_budget'];
$hari_budget		= $_POST ['hari_budget'];
$pph			= $_POST ['pph'];
$pembayaran		= $_POST ['pembayaran'];
$count 			= count($keterangan_budget);

//data untuk insert tabel_estimasi_omset
$keterangan_omset	= $_POST ['keterangan_omset'];
$jumlah_omset		= $_POST ['jumlah_omset'];
$harga_omset		= $_POST ['harga_omset'];
$sub_total_omset	= $_POST ['sub_total_omset'];
$count1			= count($keterangan_omset);

//kondisi filter pengajuan tanggal proposal harus min. 14 hari sebelumnya
$tgl_mulai		= explode("-",$mulai_pelaksanaan);
$tgl_awal		= $tgl_mulai[2];
$bln_awal		= $tgl_mulai[1];
$thn_awal		= $tgl_mulai[0];
$tgl_sekarang		= explode ("-",date('Y-m-d'));
$tgl_skg		= $tgl_sekarang[2];
$bln_skg		= $tgl_sekarang[1];
$thn_skg		= $tgl_sekarang[0];
$awal			= GregorianToJD ($bln_awal,$tgl_awal,$thn_awal);
$sekarang		= GregorianToJD ($bln_skg,$tgl_skg,$thn_skg);
$kondisi1		= $awal - $sekarang ;

/**Buat konfigurasi upload file
$file1		  	= $_POST['file1'];
//Folder tujuan upload file
$eror			= false;
$folder			= './upload/';
//type file yang bisa diupload
$file_type		= array('jpg','jpeg','xls','xlsx','ppt','pptx');
//tukuran maximum file yang dapat diupload
$max_size		= 10000000; // 10MB
*/

if ($kondisi1>13){
	//kondisi filter pengajuan tanggal selesai harus minimal 1 hari sesudah tanggal mulai
	$tgl_mulai	= $mulai_pelaksanaan;
	$tgl_selesai	= $akhir_pelaksanaan;
	$tgl_akhir	= explode("-",$akhir_pelaksanaan);
	$tgl_sls	= $tgl_akhir[2];
	$bln_sls	= $tgl_akhir[1];
	$thn_sls	= $tgl_akhir[0];
	$awal		= GregorianToJD ($bln_awal,$tgl_awal,$thn_awal);
	$selesai	= GregorianToJD ($bln_sls,$tgl_sls,$thn_sls);
	$kondisi2	= $selesai - $awal;
	
	//query sql jika tanggal akhir terisi atau acara lebih dari 1 hari
	if($tgl_selesai<>""){
		if($kondisi2>0){
				//insert ke tabel_proposal
				$budget = mysql_query ("DELETE FROM tabel_estimasi_budget where id_proposal='$id_proposal'");
				$omset = mysql_query ("DELETE FROM tabel_estimasi_omset where id_proposal='$id_proposal'");
				
				 $sql1 = mysql_query ("UPDATE `sml_pas`.`tabel_proposal` SET `id_cmr` = '$id_cmr', `brand` = '$brand', `nama_program` = '$nama_program', `id_tipe_program` = '$id_tipe_program', 
				 `lokasi` = '$lokasi', `lokasi_territory` = '$lokasi_territory', `lokasi_kecamatan` = '$lokasi_kecamatan', `mulai_pelaksanaan` = '$mulai_pelaksanaan', `akhir_pelaksanaan` = '$akhir_pelaksanaan',
				  `uraian_aktivitas` = '$uraian_aktivitas', `tujuan_sasaran` = '$tujuan_sasaran', `mekanisme_pelaksanaan` = '$mekanisme_pelaksanaan', `penanggung_jawab` = '$pj', `pic_program` = '$pic_program',
				   `pic_contact` = '$pic_contact', `target_program` = '$target_program', `target_audience` = '$target_audience', `target_contact` = '$target_contact', `tgl_input` = '$tgl_input', `username` = '$username',
				    `nama_spv` = '$nama_spv' WHERE `tabel_proposal`.`id_proposal` = '$id_proposal'");
				    
				  $update = mysql_query("UPDATE tabel_pas SET status_pas='Disetujui' WHERE id_proposal='$id_proposal'");
				
					if(($sql1)and($budget)and($omset)and($update)){
						
						//insert ke tabel_estimasi_budget
						$sql   = "INSERT INTO `sml_pas`.`tabel_estimasi_budget` (`keterangan_budget`, `jumlah_budget`, `harga_budget`, `hari_budget`,`pph`,`id_proposal`) VALUES ";
						for( $i=0; $i < $count; $i++ )
						{
							$sql .= "('{$keterangan_budget[$i]}','{$jumlah_budget[$i]}','{$harga_budget[$i]}','{$hari_budget[$i]}','{$pph[$i]}','{$id_proposal}')";
							$sql .= ",";
						}
						$sql = rtrim($sql,",");
						$insert = mysql_query($sql);
					
					
						//insert ke tabel_estimasi_omset
						$sql2   = "INSERT INTO `sml_pas`.`tabel_estimasi_omset` (`keterangan_omset`, `jumlah_omset`, `harga_omset`, `id_proposal`) VALUES ";
						for( $ia=0; $ia < $count1; $ia++ )
						{
							$sql2 .= "('{$keterangan_omset[$ia]}','{$jumlah_omset[$ia]}','{$harga_omset[$ia]}','{$id_proposal}')";
							$sql2 .= ",";
						}
						$sql2 = rtrim($sql2,",");
						$insert2 = mysql_query($sql2);
					
							if (($insert)and($insert2)){
							
							$biaya_pas 	 = mysql_query ("SELECT * FROM tabel_estimasi_budget where id_proposal='$id_proposal'");
							while($total_pas = mysql_fetch_array($biaya_pas)){
							$bagi_pajak 	= explode("-",$total_pas['pph']);
							$pph	    	= $bagi_pajak[0];
							$sub_total 	= $total_pas['harga_budget'] * $total_pas['jumlah_budget'] * $total_pas['hari_budget'];
							$sub_total_pph 	= ($sub_total * $pph)/100;
							$jumlah 	= $jumlah + $sub_total + $sub_total_pph; 
							}
							
							$update1 = mysql_query("UPDATE tabel_pas SET total_pas='$jumlah', sisa_pdm='$jumlah' WHERE id_proposal='$id_proposal'");
							
							$message= 	"Dear CMR,<br><br><br>

									Melalui email ini kami informasi bahwa ada persetujuan PAS sudah disetujui dengan adanya revisi dari PT. SMN/KDM.
									Untuk melihat PAS yang sudah disetujui silakan login di alamat berikut: <a href=pas.apachesml.co.id> http://pas.apachesml.co.id</a>
									
									Atas perhatiannya kami ucapkan terima kasih.
									
									<br><br><br>
									
									Regards, <br>
									<br>
									<br>
									PAS ONLINE";
							
							$cekemail = mysql_query("SELECT * FROM tabel_proposal a, tabel_cmr b, tabel_ao c, tabel_territory d where a.id_cmr=b.id_cmr and b.id_ao=c.id_ao 
							and a.nama_spv=d.nama_spv and a.id_proposal='$id_proposal'");
							$tampil   = mysql_fetch_array($cekemail);
							$email_rpm = $tampil['email_rpm'];
							$email_asm = $tampil['email_asm'];
							$email_aca = $tampil['email_aca'];
							$email_spv = $tampil['email_spv'];
							
							$to= $tampil['email'];
							$subject="PAS DISETUJUI";
							$headers = "MIME-Version: 1.0" . "\r\n";
							$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
							
							// More headers
							$headers .= 'From: <PAS ONLINE>' . "\r\n";
							$headers .= 'Cc: gunadi@apachesml.co.id,'.$email_rpm.','.$email_asm.','.$email_aca.','.$email_spv.'' . "\r\n";
							$headers .= 'Bcc: willy@apachesml.co.id,frans@apachesml.co.id,rolina@apachesml.co.id' . "\r\n";
							@mail($to,$subject,$message,$headers);
							
							echo "<script>alert('PAS sudah direvisi..')
							location.href='pas_valid.sml'</script>";
							} else {
							echo "<script>alert('PAS gagal direvisi')
							location.href='pas_revisi.sml?id=$id_proposal'</script>";
							}
						} else {
						echo "<script>alert('Gagal disimpan disini')
						location.href='pas_revisi.sml?id=$id_proposal'</script>";
						}
						
		//batas jika tgl akhir lebih dari 1 hari
		}else {
		echo "<script>alert('Tanggal selesai minimal 1 hari sesudah tanggal mulai acara!!, silakan isi kembali..')
		location.href='pas_revisi.sml?id=$id_proposal'</script>";
		}
	//batas jika ada tanggal akhir	
	} else {
	//mulai tanggl tidak ada tgl akhir	
			
			//insert ke tabel_proposal
				$budget = mysql_query ("DELETE FROM tabel_estimasi_budget where id_proposal ='$id_proposal'");
				$omset = mysql_query ("DELETE FROM tabel_estimasi_omset where id_proposal ='$id_proposal'");
				$sql1 = mysql_query ("UPDATE tabel_proposal SET id_cmr='$id_cmr', `brand`='$brand', `nama_program`='$nama_program', `id_tipe_program`='$id_tipe_program',
				 `lokasi`='$lokasi', `lokasi_territory`='$lokasi_territory',  `lokasi_kecamatan`='$lokasi_kecamatan', `mulai_pelaksanaan`='$mulai_pelaksanaan', 
				 `uraian_aktivitas`='$uraian_aktivitas', `tujuan_sasaran`='$tujuan_sasaran', `mekanisme_pelaksanaan`='$mekanisme_pelaksanaan', `penanggung_jawab`= '$pj', `pic_program`= '$pic_program', 
				 `pic_contact`='$pic_contact', `target_program`='$target_program',`target_audience`='$target_audience', `target_contact`='$target_contact', `tgl_input`= '$tgl_input', `username`='$username', 
				 `nama_spv`='$nama_spv' where id_proposal='$id_proposal'");
				 
				 $update = mysql_query("UPDATE tabel_pas SET status_pas='Disetujui' WHERE id_proposal='$id_proposal'");
			
			if(($sql1)and($budget)and($omset)and($update)){
						
						//insert ke tabel_estimasi_budget
						$sql   = "INSERT INTO `sml_pas`.`tabel_estimasi_budget` (`keterangan_budget`, `jumlah_budget`, `harga_budget`, `hari_budget`,`pph`,`id_proposal`) VALUES ";
						for( $i=0; $i < $count; $i++ )
						{
							$sql .= "('{$keterangan_budget[$i]}','{$jumlah_budget[$i]}','{$harga_budget[$i]}','{$hari_budget[$i]}','{$pph[$i]}','{$id_proposal}')";
							$sql .= ",";
						}
						$sql = rtrim($sql,",");
						$insert = mysql_query($sql);
					
					
						//insert ke tabel_estimasi_omset
						$sql2   = "INSERT INTO `sml_pas`.`tabel_estimasi_omset` (`keterangan_omset`, `jumlah_omset`, `harga_omset`, `id_proposal`) VALUES ";
						for( $ia=0; $ia < $count1; $ia++ )
						{
							$sql2 .= "('{$keterangan_omset[$ia]}','{$jumlah_omset[$ia]}','{$harga_omset[$ia]}','{$id_proposal}')";
							$sql2 .= ",";
						}
						$sql2 = rtrim($sql2,",");
						$insert2 = mysql_query($sql2);
					
							if (($insert)and($insert2)){
							
							$biaya_pas 	 = mysql_query ("SELECT * FROM tabel_estimasi_budget where id_proposal='$id_proposal'");
							while($total_pas = mysql_fetch_array($biaya_pas)){
							$bagi_pajak 	= explode("-",$total_pas['pph']);
							$pph	    	= $bagi_pajak[0];
							$sub_total 	= $total_pas['harga_budget'] * $total_pas['jumlah_budget'] * $total_pas['hari_budget'];
							$sub_total_pph 	= ($sub_total * $pph)/100;
							$jumlah 	= $jumlah + $sub_total + $sub_total_pph; 
							}
							
							$update1 = mysql_query("UPDATE tabel_pas SET total_pas='$jumlah', sisa_pdm='$jumlah' WHERE id_proposal='$id_proposal'");
							
							$message= 	"Dear CMR,<br><br><br>

									Melalui email ini kami informasi bahwa ada persetujuan PAS sudah disetujui dengan adanya revisi dari PT. SMN/KDM.
									Untuk melihat PAS yang sudah disetujui silakan login di alamat berikut: <a href=pas.apachesml.co.id> http://pas.apachesml.co.id</a>
									
									Atas perhatiannya kami ucapkan terima kasih.
									
									<br><br><br>
									
									Regards, <br>
									<br>
									<br>
									PAS ONLINE";
							
							$cekemail = mysql_query("SELECT * FROM tabel_proposal a, tabel_cmr b, tabel_ao c, tabel_territory d where a.id_cmr=b.id_cmr and b.id_ao=c.id_ao 
							and a.nama_spv=d.nama_spv and a.id_proposal='$id_proposal'");
							$tampil   = mysql_fetch_array($cekemail);
							$email_rpm = $tampil['email_rpm'];
							$email_asm = $tampil['email_asm'];
							$email_aca = $tampil['email_aca'];
							$email_spv = $tampil['email_spv'];
							
							$to= $tampil['email'];
							$subject="PAS DISETUJUI";
							$headers = "MIME-Version: 1.0" . "\r\n";
							$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
							
							// More headers
							$headers .= 'From: <PAS ONLINE>' . "\r\n";
							$headers .= 'Cc: gunadi@apachesml.co.id,'.$email_rpm.','.$email_asm.','.$email_aca.','.$email_spv.'' . "\r\n";
							$headers .= 'Bcc: willy@apachesml.co.id,frans@apachesml.co.id,rolina@apachesml.co.id' . "\r\n";
							@mail($to,$subject,$message,$headers);
							
							echo "<script>alert('PAS sudah direvisi..')
							location.href='pas_valid.sml'</script>";
							} else {
							echo "<script>alert('PAS gagal direvisi')
							location.href='pas_revisi.sml?id=$id_proposal'</script>";
							}
						} else {
						echo "<script>alert('Gagal disimpan')
						location.href='pas_revisi.sml?id=$id_proposal'</script>";
						}
		}	
		
} else {
echo "<script>alert('Pengajuan proposal harus minimal 14 hari sebelum pelaksanaan dari hari ini!!, Silakan input kembali..')
location.href='pas_revisi.sml?id=$id_proposal'</script>";
}

?>