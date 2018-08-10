<?php include "header.php";?>

<script>
tinymce.init({ 
selector:'textarea' 
toolbar: false,
menubar: false
});</script>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
		<h4><center><u>VERIFIKASI PROPOSAL</u></center></h4>
		
		<form action=""  method="post" >
			<?php
			$id_proposal = $_GET['id'];
			?>
			<input type="hidden" name="id_proposal" value="<?php echo $id_proposal;?>">
			<table width="50%" align="center"><br>  
				<tr align="left" height="30">
					<td><b>Verifikasi Proposal</b></td>
					<td><select name="persetujuan" required style="width:200px">
						<option value="" selected>[Pilih Verifikasi]</option>
						<option value="Disetujui">Disetujui</option>
						<option value="Direvisi">Direvisi</option>
						<!--<option value="Ditolak">Ditolak</option>-->
					    </select>	
					</td>
				</tr>
				<tr align="left" height="30">
					<td><b>Keterangan</b></td>
					<td><textarea name="keterangan" style="height:100px;width:300px;"></textarea></td>
				</tr>
				<tr align="left" height="80">
					<td></td>
					<td><input type="submit" name="simpan" value="Simpan">&nbsp;&nbsp; <a href="javascript:history.back(-1)"><img src="images/back.png" width="50px" height="28px"></a></td>
				</tr>
			</table>
		</form>
				
<!-- Proses Simpan Form Ini -->
<?php
$id_proposal 	= $_POST['id_proposal'];
$persetujuan	= $_POST['persetujuan'];
$keterangan		= $_POST['keterangan'];
$tgl			= date('Y-m-d');

if(isset($_POST['simpan'])){
	if($keterangan<>""){
	if($persetujuan=="Disetujui"){
		$sql = mysql_query ("UPDATE tabel_proposal SET `persetujuan_rma` = '$persetujuan', `keterangan_rma` = '$keterangan', tgl_persetujuan_rma='$tgl' WHERE `tabel_proposal`.`id_proposal` = '$id_proposal'");
	
		if($sql){
			
			//proses kirim email ke rpm untuk persetujuan proposal
			$cek_regional = mysql_query ("SELECT * FROM tabel_proposal a, tabel_cmr b, tabel_ao c WHERE a.id_cmr=b.id_cmr and b.id_ao=c.id_ao and a.id_proposal='$id_proposal'");
			$hasil_regional = mysql_fetch_array($cek_regional);
			
			if($hasil_regional['jenis_proposal']=="LOKAL_DIREKSI"){
					$message	= "Kepada Yth. Regional Manager,<br>
								<br>
								<br>
							    Melalui email ini kami sampaikan bahwa ada pengajuan proposal dan membutuhkan persetujuan dari Regional Manager.<br>
							    Untuk itu silakan anda masuk ke System PAS Online di alamat : <a href=pas.apachesml.co.id> http://pas.apachesml.co.id</a><br>
							    <br>
							    Atas perhatiannya kami ucapkan terima kasih.<br>
							    <br>
							    <br>
							    Regards, <br>
							    <br>
							    <br>
							    PAS ONLINE";
						   
					$to			= 'susilo@apachesml.co.id';
					$subject	= "PROPOSAL PAS";
					$headers 	= "MIME-Version: 1.0" . "\r\n";
					$headers   .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
										
					// More headers
					$headers .= 'From: <PAS ONLINE>' . "\r\n";
					$headers .= 'Bcc: willy@apachesml.co.id,frans@apachesml.co.id,rolina@apachesml.co.id' . "\r\n";
					@mail($to,$subject,$message,$headers);
			}else{
				if($hasil_regional['regional']=="WEST"){
				$cek_info 	= mysql_query("SELECT * FROM tabel_info where id_info='3'");
				}else{
				$cek_info 	= mysql_query("SELECT * FROM tabel_info where id_info='4'");
				}
				$hasil_info   	= mysql_fetch_array($cek_info);
				$message	= $hasil_info['info'];
								
				$to			= $hasil_regional['email_rpm'];
				$subject	= "PENGAJUAN PROPOSAL PAS";
				$headers 	= "MIME-Version: 1.0" . "\r\n";
				$headers   .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
									
				// More headers
				$headers .= 'From: <PAS ONLINE>' . "\r\n";
				$headers .= 'Bcc: willy@apachesml.co.id,frans@apachesml.co.id,rolina@apachesml.co.id' . "\r\n";
				@mail($to,$subject,$message,$headers);
			}
			
		echo "<script>alert('Data sudah tersimpan, terima kasih..')
		location.href='data_proposal_rma.php'</script>";
		}else{
		echo "<script>alert('Data gagal disimpan, silakan ulangi proses..')
		location.href='persetujuan_proposal_rma.php?id=$id_proposal'</script>";
		}
	}else{
		//jika persetujuan direvisi atau ditolak
		$sql = mysql_query ("UPDATE tabel_proposal SET `persetujuan_rma` = '$persetujuan', `keterangan_rma` = '$keterangan', tgl_persetujuan_rma='$tgl' WHERE `tabel_proposal`.`id_proposal` = '$id_proposal'");
	
		if($sql){
			
			//proses kirim email ke cmr untuk persetujuan proposal direvisi atau ditolak
			$cek_email 	= mysql_query ("SELECT * FROM tabel_proposal a, tabel_cmr b WHERE a.id_cmr=b.id_cmr and a.id_proposal='$id_proposal'");
			$hasil_email = mysql_fetch_array($cek_email);
			
			$message	= 	"Dear Bapak CMR,<br>
							<br>
							<br>
							Kepada Bpk CMR Proposal PAS Anda ".$persetujuan.".<br>
							Silakan login untuk melihat keterangan alasan mengapa ".$persetujuan." Proposal PAS Anda, Anda dapat mengakses sistem dengan alamat: <a href=pas.apachesml.co.id> http://pas.apachesml.co.id</a><br>
							<br>
							<br>
							Atas perhatiannya kami ucapkan terima kasih.<br>
							<br>
							<br>
							Regards, <br>
							<br>
							<br>
							PAS ONLINE";
							
			$to			= $hasil_email['email_cmr'];
			$subject	="PENGAJUAN PROPOSAL PAS";
			$headers 	= "MIME-Version: 1.0" . "\r\n";
			$headers   .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
								
			// More headers
			$headers .= 'From: <PAS ONLINE>' . "\r\n";
			$headers .= 'Cc: '.$spv.'' . "\r\n";
			$headers .= 'Bcc: willy@apachesml.co.id,frans@apachesml.co.id,rolina@apachesml.co.id' . "\r\n";
			@mail($to,$subject,$message,$headers);
			
		echo "<script>alert('Data sudah tersimpan, terima kasih..')
		location.href='data_perpos_rma.php'</script>";
		}else{
		echo "<script>alert('Data gagal disimpan, silakan ulangi proses..')
		location.href='persetujuan_proposal_rma.php?id=$id_proposal'</script>";
		}
	}
}else{
echo "<script>alert('Kolom keterangan harus diisi, silakan ulangi kembali..')
		location.href='persetujuan_proposal_rma.php?id=$id_proposal'</script>";
}
}
?>

<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script><!-- -->
<script src="jquery.dataTables.js"></script>
<script>
$(document).ready(function() {
    $('#contoh').dataTable(); // Menjalankan plugin DataTables pada id contoh. id contoh merupakan tabel yang kita gunakan untuk menampilkan data
} );
</script>

	</header>
	<!-- /Header -->
<?php include "footer.php";?>    
<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="assets/js/modernizr-latest.js"></script> 
	<script type='text/javascript' src='assets/js/jquery.min.js'></script>
    <script type='text/javascript' src='assets/js/fancybox/jquery.fancybox.pack.js'></script>
    
    <script type='text/javascript' src='assets/js/jquery.mobile.customized.min.js'></script>
    <script type='text/javascript' src='assets/js/jquery.easing.1.3.js'></script> 
    <script type='text/javascript' src='assets/js/camera.min.js'></script> 
    <script src="assets/js/bootstrap.min.js"></script> 
	<script src="assets/js/custom.js"></script>
    <script>
		jQuery(function(){
			
			jQuery('#camera_wrap_4').camera({
                transPeriod: 500,
                time: 3000,
				height: '600',
				loader: 'false',
				pagination: true,
				thumbnails: false,
				hover: false,
                playPause: false,
                navigation: false,
				opacityOnGrid: false,
				imagePath: 'assets/images/'
			});

		});
      
	</script>


</body>
</html>
