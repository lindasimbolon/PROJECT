<?php
include "header.php";


$id_cmr			= $_POST['id_cmr'];
$brand			= $_POST['brand'];
$nama_program		= $_POST['nama_program'];
$id_tipe_program  	= $_POST['id_tipe_program'];
$lokasi 		= $_POST['lokasi'];
$lokasi_territory	= $_POST['lokasi_territory'];
$lokasi_kecamatan	= $_POST['lokasi_kecamatan'];
$mulai_pelaksanaan	= $_POST['mulai_pelaksanaan'];
$akhir_pelaksanaan	= $_POST['akhir_pelaksanaan'];
$uraian_aktivitas	= $_POST['uraian_aktivitas'];
$tujuan_sasaran  	= $_POST['tujuan_sasaran'];
$mekanisme_pelaksanaan 	= $_POST['mekanisme_pelaksanaan'];
$penanggung_jawab	= $_POST['penanggung_jawab'];
$pj="";
foreach($penanggung_jawab as $entry){
$pj .= $entry.",";
}

$pic_program  		= $_POST['pic_program'];
$pic_contact	  	= $_POST['pic_contact'];
$target_program  	= $_POST['target_program'];
$target_audience	= $_POST['target_audience'];
$target_contact		= $_POST['target_contact'];

$tgl_input		= date('Y-m-d');
$username		= $_POST['username'];

//cari id proposal terakhir
$cek 			= mysql_query ("SELECT max(id_proposal) as id_proposal FROM tabel_proposal");
$hasil			= mysql_fetch_array($cek);
$id_proposal 		= $hasil['id_proposal']+1;

//data untuk insert tabel_estimasi_budget
$keterangan_budget	= $_POST ['keterangan_budget'];
$jumlah_budget		= $_POST ['jumlah_budget'];
$harga_budget		= $_POST ['harga_budget'];
$pembayaran		= $_POST ['pembayaran'];
$sub_total_budget	= $_POST ['sub_total_budget'];
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

//Buat konfigurasi upload file
$file1		  	= $_POST['file1'];
//Folder tujuan upload file
$eror			= false;
$folder			= './upload/';
//type file yang bisa diupload
$file_type		= array('jpg','jpeg','xls','xlsx','ppt','pptx');
//tukuran maximum file yang dapat diupload
$max_size		= 10000000; // 10MB



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
				$sql1 = mysql_query ("INSERT INTO `sml_pas`.`tabel_proposal` (`id_proposal`, `id_cmr`, `brand`, `nama_program`, `id_tipe_program`, `lokasi`, `lokasi_territory`, `lokasi_kecamatan`, 
				`mulai_pelaksanaan`, `akhir_pelaksanaan`, `uraian_aktivitas`, `tujuan_sasaran`, `mekanisme_pelaksanaan`, `penanggung_jawab`, `pic_program`, `pic_contact`, `target_program`, 
				`target_audience`, `target_contact`, `tgl_input`, `username`) VALUES ('$id_proposal','$id_cmr','$brand','$nama_program', '$id_tipe_program', '$lokasi', '$lokasi_territory', 
				'$lokasi_kecamatan', '$mulai_pelaksanaan', '$akhir_pelaksanaan', '$uraian_aktivitas', '$tujuan_sasaran', '$mekanisme_pelaksanaan','$pj','$pic_program', 
				'$pic_contact', '$target_program','$target_audience', '$target_contact', '$tgl_input', '$username')");
				
					if($sql1){
						$file_name	= $_FILES['file1']['name'];
						$file_size	= $_FILES['file1']['size'];
						//cari extensi file dengan menggunakan fungsi explode
						$explode	= explode('.',$file_name);
						$extensi	= $explode[count($explode)-1];
						$unik		= "File 1_".$nama_program."_".$file_name ;
						
						//check apakah type file sudah sesuai
						if(!in_array($extensi,$file_type)){
							$eror   = true;
							$pesan .= '- Type file yang anda upload tidak sesuai<br />';
						}
						if($file_size > $max_size){
							$eror   = true;
							$pesan .= '- Ukuran file melebihi batas maximum<br />';
						}
						//check ukuran file apakah sudah sesuai
					
						if($eror == true){
							echo '<div id="eror">'.$pesan.'</div>';
						}
						else{
							//mulai memproses upload file
							if(move_uploaded_file($_FILES['file1']['tmp_name'], $folder.$unik)){
								$simpan = mysql_query ("UPDATE tabel_proposal SET file1='$unik' WHERE id_proposal='$id_proposal'");
							}
						}	
						//insert ke tabel_estimasi_budget
						$sql   = "INSERT INTO `sml_pas`.`tabel_estimasi_budget` (`keterangan_budget`, `jumlah_budget`, `harga_budget`, `sub_total_budget`, `id_proposal`) VALUES ";
						for( $i=0; $i < $count; $i++ )
						{
							$sql .= "('{$keterangan_budget[$i]}','{$jumlah_budget[$i]}','{$harga_budget[$i]}','{$sub_total_budget[$i]}','{$id_proposal}')";
							$sql .= ",";
						}
						$sql = rtrim($sql,",");
						$insert = mysql_query($sql);
					
					
						//insert ke tabel_estimasi_omset
						$sql2   = "INSERT INTO `sml_pas`.`tabel_estimasi_omset` (`keterangan_omset`, `jumlah_omset`, `harga_omset`, `sub_total_omset`, `id_proposal`) VALUES ";
						for( $ia=0; $ia < $count1; $ia++ )
						{
							$sql2 .= "('{$keterangan_omset[$ia]}','{$jumlah_omset[$ia]}','{$harga_omset[$ia]}','{$sub_total_omset[$ia]}','{$id_proposal}')";
							$sql2 .= ",";
						}
						$sql2 = rtrim($sql2,",");
						$insert2 = mysql_query($sql2);
					
							if (($insert)and($insert2)){
							
							//proses kirim email ke asm untuk persetujuan
							$cek_info = mysql_query ("SELECT * FROM tabel_info WHERE id_info=5 ");
							$hasil_info = mysql_fetch_array($cek_info);
							$message=$hasil_info['info'];
							
							$cekemail = mysql_query("SELECT email_spv as email FROM tabel_territory where nama_territory='$lokasi_territory'");
							$tampil   = mysql_fetch_array($cekemail);
							
							$to= $tampil['email'];
							$subject="PENGAJUAN PROPOSAL PAS";
							$headers = "MIME-Version: 1.0" . "\r\n";
							$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
							
							// More headers
							$headers .= 'From: <PAS ONLINE>' . "\r\n";
							$headers .= 'Cc: lindawati@apachesml.com;frans@apachesml.com' . "\r\n";
							@mail($to,$subject,$message,$headers);
							
							echo "<script>alert('Proposal berhasil diajukan, silakan pilih menu data proposal untuk melihat status proposal anda..')
							location.href='data_proposal.php'</script>";
							} else {
							echo "<script>alert('Proposal gagal diajukan, silakan ajukan kembali..')
							location.href='input_proposal.php'</script>";
							}
						} else {
						echo "<script>alert('Gagal disimpan')
						location.href='input_proposal.php'</script>";
						}
						
		//batas jika tgl akhir lebih dari 1 hari
		}else {
		echo "<script>alert('Tanggal selesai minimal 1 hari sesudah tanggal mulai acara!!, silakan isi kembali..')
		location.href='input_proposal.php'</script>";
		}
	//batas jika ada tanggal akhir	
	} else {
	//mulai tanggl tidak ada tgl akhir	
			
			$sql1 = mysql_query ("INSERT INTO `sml_pas`.`tabel_proposal` (`id_proposal`, `id_cmr`, `brand`, `nama_program`, `id_tipe_program`, `lokasi`, `lokasi_territory`, `lokasi_kecamatan`, 
				`mulai_pelaksanaan`, `uraian_aktivitas`, `tujuan_sasaran`, `mekanisme_pelaksanaan`, `penanggung_jawab`, `pic_program`, `pic_contact`, `target_program`, 
				`target_audience`, `target_contact`, `tgl_input`, `username`) VALUES ('$id_proposal','$id_cmr','$brand','$nama_program', '$id_tipe_program', '$lokasi', '$lokasi_territory', 
				'$lokasi_kecamatan', '$mulai_pelaksanaan', '$uraian_aktivitas', '$tujuan_sasaran', '$mekanisme_pelaksanaan','$pj','$pic_program', 
				'$pic_contact', '$target_program','$target_audience', '$target_contact', '$tgl_input', '$username')");
				
			
			if($sql1){
				$file_name	= $_FILES['file1']['name'];
				$file_size	= $_FILES['file1']['size'];
				//cari extensi file dengan menggunakan fungsi explode
				$explode	= explode('.',$file_name);
				$extensi	= $explode[count($explode)-1];
				$unik		= "File 1_".$nama_program."_".$file_name ;
						
				//check apakah type file sudah sesuai
				if(!in_array($extensi,$file_type)){
					$eror   = true;
					$pesan .= '- Type file yang anda upload tidak sesuai<br />';
				}
				if($file_size > $max_size){
					$eror   = true;
					$pesan .= '- Ukuran file melebihi batas maximum<br />';
				}
				//check ukuran file apakah sudah sesuai
					
				if($eror == true){
					echo '<div id="eror">'.$pesan.'</div>';
				}
				else{
					//mulai memproses upload file
					if(move_uploaded_file($_FILES['file1']['tmp_name'], $folder.$unik)){
						$simpan = mysql_query ("UPDATE tabel_proposal SET file1='$unik' WHERE id_proposal='$id_proposal'");
					}
				}	
				//insert ke tabel_estimasi_budget
				$sql   = "INSERT INTO `sml_pas`.`tabel_estimasi_budget` (`keterangan_budget`, `jumlah_budget`, `harga_budget`, `sub_total_budget`, `id_proposal`) VALUES ";
				for( $i=0; $i < $count; $i++ )
				{
					$sql .= "('{$keterangan_budget[$i]}','{$jumlah_budget[$i]}','{$harga_budget[$i]}','{$sub_total_budget[$i]}','{$id_proposal}')";
					$sql .= ",";
				}
				$sql = rtrim($sql,",");
				$insert = mysql_query($sql);
			
			
				//insert ke tabel_estimasi_omset
				$sql2   = "INSERT INTO `sml_pas`.`tabel_estimasi_omset` (`keterangan_omset`, `jumlah_omset`, `harga_omset`, `sub_total_omset`, `id_proposal`) VALUES ";
				for( $ia=0; $ia < $count1; $ia++ )
				{
					$sql2 .= "('{$keterangan_omset[$ia]}','{$jumlah_omset[$ia]}','{$harga_omset[$ia]}','{$sub_total_omset[$ia]}','{$id_proposal}')";
					$sql2 .= ",";
				}
				$sql2 = rtrim($sql2,",");
				$insert2 = mysql_query($sql2);
			
					if (($insert)and($insert2)){
							
							//proses kirim email ke asm untuk persetujuan
							$cek_info = mysql_query ("SELECT * FROM tabel_info WHERE id_info=2 ");
							$hasil_info = mysql_fetch_array($cek_info);
							$message=$hasil_info['info'];
							
							$cekemail = mysql_query("SELECT email_spv as email FROM tabel_territory where nama_territory='$lokasi_territory'");
							$tampil   = mysql_fetch_array($cekemail);
							
							$to= $tampil['email'];
							$subject="PENGAJUAN PROPOSAL PAS";
							$headers = "MIME-Version: 1.0" . "\r\n";
							$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
							
							// More headers
							$headers .= 'From: <PAS ONLINE>' . "\r\n";
							$headers .= 'Cc: lindawati@apachesml.com;frans@apachesml.com' . "\r\n";
							@mail($to,$subject,$message,$headers);
							
							echo "<script>alert('Proposal berhasil diajukan, silakan pilih menu data proposal untuk melihat status proposal anda..')
							location.href='data_proposal.php'</script>";
							} else {
							echo "<script>alert('Proposal gagal diajukan, silakan ajukan kembali..')
							location.href='data_proposal.php'</script>";
							}
			} else {
			echo "<script>alert('Gagal disimpan disini..')
			location.href='input_proposal.php'</script>";
			}
		}	
		
} else {
echo "<script>alert('Pengajuan proposal harus minimal 14 hari sebelum pelaksanaan dari hari ini!!, Silakan input kembali..')
location.href='input_proposal.php'</script>";
}
?>