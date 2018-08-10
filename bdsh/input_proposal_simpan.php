<?php
include "header.php";

//variabel menampung data yang di postkan
$id_cmr					= $_POST['id_cmr'];
$brand_program			= $_POST['brand_program'];
$nama_program			= strtoupper($_POST['nama_program']);
$id_tipe_program  		= $_POST['id_tipe_program'];
$lokasi 				= strtoupper($_POST['lokasi']);
$lokasi_territory		= $_POST['lokasi_territory'];
$lokasi_kecamatan		= strtoupper($_POST['lokasi_kecamatan']);
$mulai_pelaksanaan		= $_POST['mulai_pelaksanaan'];
$akhir_pelaksanaan		= $_POST['akhir_pelaksanaan'];
$latar_belakang			= $_POST['latar_belakang'];
$tujuan_sasaran  		= $_POST['tujuan_sasaran'];
$mekanisme_pelaksanaan 	= $_POST['mekanisme_pelaksanaan'];
$nama_spv				= $_POST['nama_spv'];
$target_audience		= $_POST['target_audience'];
$target_contact			= $_POST['target_contact'];
$tgl_input				= date('Y-m-d');
$username				= $_POST['username'];
$jenis_proposal			= $_POST['jenis_proposal'];
//$ao					= $_POST['ao'];

//cari id proposal terakhir
$cek 					= mysql_query ("SELECT max(id_proposal) as id_proposal FROM tabel_proposal");
$hasil					= mysql_fetch_array($cek);
$id_proposal 			= $hasil['id_proposal']+1;

//data untuk insert tabel_estimasi_budget
$jenis					= $_POST ['jenis'];
$keterangan_budget		= $_POST ['keterangan_budget'];
$harga_budget			= $_POST ['harga_budget'];
$jumlah_budget			= $_POST ['jumlah_budget'];
$pph					= $_POST ['pph'];
$ppn					= $_POST ['ppn'];
$count 					= count($keterangan_budget);
$tgl_transfer			= $_POST ['tgl_transfer'];

//data untuk insert tabel_estimasi_omset
$brand_omset			= $_POST ['brand_omset'];
$jumlah_omset			= $_POST ['jumlah_omset'];
$harga_omset			= $_POST ['harga_omset'];
$count1					= count($brand_omset);

//data untuk insert tabel_estimasi_distribusi
$brand					= $_POST ['brand'];
$outlet_universe		= $_POST ['outlet_universe'];
$outlet_terdistribusi1	= $_POST ['outlet_terdistribusi1'];
$outlet_terdistribusi2	= $_POST ['outlet_terdistribusi2'];
$target_distribusi		= $_POST ['target_distribusi'];
$count2					= count($brand);

//kondisi filter pengajuan tanggal proposal harus min. 14 hari sebelumnya
$tgl_mulai				= explode("-",$mulai_pelaksanaan);
$tgl_awal				= $tgl_mulai[2];
$bln_awal				= $tgl_mulai[1];
$thn_awal				= $tgl_mulai[0];
$tgl_sekarang			= explode ("-",date('Y-m-d'));
$tgl_skg				= $tgl_sekarang[2];
$bln_skg				= $tgl_sekarang[1];
$thn_skg				= $tgl_sekarang[0];
$awal					= GregorianToJD ($bln_awal,$tgl_awal,$thn_awal);
$sekarang				= GregorianToJD ($bln_skg,$tgl_skg,$thn_skg);
$kondisi1				= $awal - $sekarang ;

//Buat konfigurasi upload file
$file1		  			= $_POST['file1'];
//Folder tujuan upload file
$eror					= false;
$folder					= './upload/';
//type file yang bisa diupload
$file_type				= array('jpg','jpeg','JPG','JPEG','xls','xlsx','ppt','pptx');
//tukuran maximum file yang dapat diupload
$max_size				= 10000000; // 10MB


//if ($kondisi1>13){
	//kondisi filter pengajuan tanggal selesai harus minimal 1 hari sesudah tanggal mulai program
	$tgl_mulai			= $mulai_pelaksanaan;
	$tgl_selesai		= $akhir_pelaksanaan;
	$tgl_akhir			= explode("-",$akhir_pelaksanaan);
	$tgl_sls			= $tgl_akhir[2];
	$bln_sls			= $tgl_akhir[1];
	$thn_sls			= $tgl_akhir[0];
	$awal				= GregorianToJD ($bln_awal,$tgl_awal,$thn_awal);
	$selesai			= GregorianToJD ($bln_sls,$tgl_sls,$thn_sls);
	$kondisi2			= $selesai - $awal;
	
	//query cek tanggal akhir terisi atau acara lebih dari 1 hari
	if($tgl_selesai<>""){
		if($kondisi2>0){
				//insert ke tabel_proposal
				$sql1 = mysql_query ("INSERT INTO tabel_proposal (`id_proposal`,id_cmr,`brand`, `nama_program`, `id_tipe_program`, `lokasi`, `lokasi_territory`, `lokasi_kecamatan`, 
				`mulai_pelaksanaan`, `akhir_pelaksanaan`, `latar_belakang`,`tujuan_sasaran`, `mekanisme_pelaksanaan`, `target_audience`, `target_contact`, `tgl_input`, `username`,nama_spv,`jenis_proposal`) VALUES 
				('$id_proposal','$id_cmr','$brand_program','$nama_program', '$id_tipe_program', '$lokasi', '$lokasi_territory','$lokasi_kecamatan', '$mulai_pelaksanaan', '$akhir_pelaksanaan', 
				'$latar_belakang','$tujuan_sasaran', '$mekanisme_pelaksanaan', '$target_audience', '$target_contact', '$tgl_input', '$username','$nama_spv', '$jenis_proposal')");
				
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
						//check ukuran file apakah sudah sesuai
						if($file_size > $max_size){
							$eror   = true;
							$pesan .= '- Ukuran file melebihi batas maximum<br />';
						}
										
						if($eror == true){
							echo '<div id="eror">'.$pesan.'</div>';
						}else{
							//mulai memproses upload file
							if(move_uploaded_file($_FILES['file1']['tmp_name'], $folder.$unik)){
								$simpan = mysql_query ("UPDATE tabel_proposal SET file1='$unik' WHERE id_proposal='$id_proposal'");
							}
						}
						
						//insert ke tabel_estimasi_budget
						$sql   = "INSERT INTO tabel_estimasi_budget (`keterangan_budget`, `jumlah_budget`, `harga_budget`, `pph`,`ppn`,`id_proposal`,`jenis_item`,tgl_transfer) VALUES ";
						for( $i=0; $i < $count; $i++ )
						{
							$sql .= "('{$keterangan_budget[$i]}','{$jumlah_budget[$i]}','{$harga_budget[$i]}','{$pph[$i]}','{$ppn[$i]}','{$id_proposal}','{$jenis[$i]}','{$tgl_transfer}')";
							$sql .= ",";
						}
						$sql = rtrim($sql,",");
						$insert = mysql_query($sql);
					
						//insert ke tabel_estimasi_omset
						$sql2   = "INSERT INTO tabel_estimasi_omset (`keterangan_omset`, `jumlah_omset`, `harga_omset`, `id_proposal`) VALUES ";
						for( $ia=0; $ia < $count1; $ia++ )
						{
							$sql2 .= "('{$brand_omset[$ia]}','{$jumlah_omset[$ia]}','{$harga_omset[$ia]}','{$id_proposal}')";
							$sql2 .= ",";
						}
						$sql2 = rtrim($sql2,",");
						$insert2 = mysql_query($sql2);
						
						//insert ke tabel_estimasi_distribusi
						$sql3   = "INSERT INTO tabel_estimasi_distribusi (`brand`, `outlet_universe`, `outlet_terdistribusi`,`outlet_terdistribusi2`, `target_distribusi`, `id_proposal`) VALUES ";
						for( $ib=0; $ib < $count2; $ib++ )
						{
							$sql3 .= "('{$brand[$ib]}','{$outlet_universe[$ib]}','{$outlet_terdistribusi1[$ib]}','{$outlet_terdistribusi2[$ib]}','{$target_distribusi[$ib]}','{$id_proposal}')";
							$sql3 .= ",";
						}
						$sql3 = rtrim($sql3,",");
						$insert3 = mysql_query($sql3);
					
							if (($insert)and($insert2)and($insert3)){
							$message	= "Dear Ibu Regional Marketing Admin,<br>
										   <br>
										   <br>
										   Melalui email ini kami sampaikan bahwa ada pengajuan proposal yang harus diverifikasi oleh Ibu Regional Marketing Admin.<br>
										   Untuk itu silakan anda masuk ke System PAS Online di alamat : <a href=pas.apachesml.co.id> http://pas.apachesml.co.id</a><br>
										   <br>
										   Atas perhatiannya kami ucapkan terima kasih.<br>
										   <br>
										   <br>
										   Regards, <br>
										   <br>
										   <br>
										   PAS ONLINE";
						   
								$to			= 'marisa@apachesml.co.id';
								$subject	= "PROPOSAL PAS";
								$headers 	= "MIME-Version: 1.0" . "\r\n";
								$headers   .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
													
								// More headers
								$headers .= 'From: <PAS ONLINE>' . "\r\n";
								$headers .= 'Bcc: willy@apachesml.co.id,frans@apachesml.co.id,rolina@apachesml.co.id' . "\r\n";
								@mail($to,$subject,$message,$headers);
							
							echo "<script>alert('Proposal berhasil diajukan, silakan lihat status proposal anda..')
							location.href='proposal_pending.php'</script>";
							} else {
							echo "<script>alert('Proposal gagal diajukan, silakan ajukan kembali..')
							location.href='input_proposal.php'</script>";
							}
						}else{
						echo "<script>alert('Gagal disimpan')
						location.href='input_proposal.php'</script>";
						}
						
		//batas jika tgl akhir lebih dari 1 hari
		}else {
		echo "<script>alert('Tanggal selesai minimal 1 hari sesudah tanggal mulai acara!!, silakan isi kembali..')
		location.href='input_proposal_lokal.php'</script>";
		}
	//batas jika ada tanggal akhir	
	}else{
	
	//proses jika tidak ada tgl akhir	
			$sql1 = mysql_query ("INSERT INTO tabel_proposal (`id_proposal`,`id_cmr`, `brand`, `nama_program`, `id_tipe_program`, `lokasi`, `lokasi_territory`, `lokasi_kecamatan`, 
				`mulai_pelaksanaan`, `latar_belakang`, `tujuan_sasaran`, `mekanisme_pelaksanaan`, `target_audience`, `target_contact`, `tgl_input`, `username`,`nama_spv`,`jenis_proposal`) VALUES 
				('$id_proposal','$id_cmr','$brand_program','$nama_program', '$id_tipe_program', '$lokasi', '$lokasi_territory','$lokasi_kecamatan', '$mulai_pelaksanaan',  
				'$latar_belakang','$tujuan_sasaran', '$mekanisme_pelaksanaan', '$target_audience', '$target_contact', '$tgl_input', '$username','$nama_spv','$jenis_proposal')");
				
			
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
				//check ukuran file apakah sudah sesuai
				if($file_size > $max_size){
					$eror   = true;
					$pesan .= '- Ukuran file melebihi batas maximum<br />';
				}
				
				if($eror == true){
					echo '<div id="eror">'.$pesan.'</div>';
				}else{
					//mulai memproses upload file
					if(move_uploaded_file($_FILES['file1']['tmp_name'], $folder.$unik)){
						$simpan = mysql_query ("UPDATE tabel_proposal SET file1='$unik' WHERE id_proposal='$id_proposal'");
					}
				}	
				//insert ke tabel_estimasi_budget
						$sql   = "INSERT INTO tabel_estimasi_budget (`keterangan_budget`, `jumlah_budget`, `harga_budget`, `pph`,`ppn`,`id_proposal`,`jenis_item`,tgl_transfer) VALUES ";
						for( $i=0; $i < $count; $i++ )
						{
							$sql .= "('{$keterangan_budget[$i]}','{$jumlah_budget[$i]}','{$harga_budget[$i]}','{$pph[$i]}','{$ppn[$i]}','{$id_proposal}','{$jenis[$i]}','{$tgl_transfer}')";
							$sql .= ",";
						}
						$sql = rtrim($sql,",");
						$insert = mysql_query($sql);
					
					
						//insert ke tabel_estimasi_omset
						$sql2   = "INSERT INTO tabel_estimasi_omset (`keterangan_omset`, `jumlah_omset`, `harga_omset`, `id_proposal`) VALUES ";
						for( $ia=0; $ia < $count1; $ia++ )
						{
							$sql2 .= "('{$brand_omset[$ia]}','{$jumlah_omset[$ia]}','{$harga_omset[$ia]}','{$id_proposal}')";
							$sql2 .= ",";
						}
						$sql2 = rtrim($sql2,",");
						$insert2 = mysql_query($sql2);
						
						//insert ke tabel_estimasi_distribusi
						$sql3   = "INSERT INTO tabel_estimasi_distribusi (`brand`, `outlet_universe`, `outlet_terdistribusi`,`outlet_terdistribusi2`, `target_distribusi`, `id_proposal`) VALUES ";
						for( $ib=0; $ib < $count2; $ib++ )
						{
							$sql3 .= "('{$brand[$ib]}','{$outlet_universe[$ib]}','{$outlet_terdistribusi1[$ib]}','{$outlet_terdistribusi2[$ib]}','{$target_distribusi[$ib]}','{$id_proposal}')";
							$sql3 .= ",";
						}
						$sql3 = rtrim($sql3,",");
						$insert3 = mysql_query($sql3);
						
					if (($insert)and($insert2)and($insert3)){
							$message	= "Dear Ibu Regional Marketing Admin,<br>
										   <br>
										   <br>
										   Melalui email ini kami sampaikan bahwa ada pengajuan proposal yang harus diverifikasi oleh Ibu Regional Marketing Admin.<br>
										   Untuk itu silakan anda masuk ke System PAS Online di alamat : <a href=pas.apachesml.co.id> http://pas.apachesml.co.id</a><br>
										   <br>
										   Atas perhatiannya kami ucapkan terima kasih.<br>
										   <br>
										   <br>
										   Regards, <br>
										   <br>
										   <br>
										   PAS ONLINE";
						   
								$to			= 'marisa@apachesml.co.id';
								$subject	= "PROPOSAL PAS";
								$headers 	= "MIME-Version: 1.0" . "\r\n";
								$headers   .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
													
								// More headers
								$headers .= 'From: <PAS ONLINE>' . "\r\n";
								$headers .= 'Bcc: willy@apachesml.co.id,frans@apachesml.co.id,rolina@apachesml.co.id' . "\r\n";
								@mail($to,$subject,$message,$headers);
							
							
							echo "<script>alert('Proposal berhasil diajukan, silakan lihat status proposal anda..')
							location.href='proposal_pending.php'</script>";
							} else {
							echo "<script>alert('Proposal gagal diajukan, silakan ajukan kembali..')
							location.href='input_proposal.php'</script>";
							}
			} else {
			echo "<script>alert('Gagal disimpan disini..')
			location.href='input_proposal.php'</script>";
			}
		}	
		
/**}else {
echo "<script>alert('Pengajuan proposal harus minimal 14 hari sebelum pelaksanaan dari hari ini!!, Silakan input kembali..')
location.href='input_proposal_lokal.php'</script>";
}
*/
?>