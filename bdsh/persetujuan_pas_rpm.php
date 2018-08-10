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
		<h4><center><u>PERSETUJUAN PAS</u></center></h4>
		
		<form action=""  method="post" >
			<?php
			$id_pas = $_GET['id'];
			?>
			<input type="hidden" name="id_pas" value="<?php echo $id_pas;?>">
			<table width="50%" align="center"><br>  
				<tr align="left" height="30">
					<td><b>Persetujuan PAS</b></td>
					<td><select name="persetujuan" required style="width:200px">
						<option value="" selected>[Pilih Persetujuan]</option>
						<option value="Disetujui">Disetujui</option>
						<option value="Direvisi">Direvisi</option>
						<option value="Ditolak">Ditolak</option>
					    </select>	
					</td>
				</tr>
				<tr align="left" height="30">
					<td><b>Keterangan</b></td>
					<td><textarea name="keterangan" style="height:100px;width:300px;"></textarea></td>
				</tr>
				<tr align="left" height="80">
					<td></td>
					<td><input type="submit" name="simpan" value="Simpan">&nbsp;&nbsp; <a href="javascript:history.back()"><img src="images/back.png" width="50px" height="28px"></a></td>
				</tr>
			</table>
		</form>
				
<!-- Proses Simpan Form Ini -->
<?php
$id_pas 		= $_POST['id_pas'];
$persetujuan	= $_POST['persetujuan'];
$keterangan		= $_POST['keterangan'];
$tgl			= date('Y-m-d');

if(isset($_POST['simpan'])){
	if($keterangan<>""){
		if ($persetujuan=="Disetujui"){
		$sql = mysql_query ("UPDATE tabel_pas SET `persetujuan_rpm` = '$persetujuan', `keterangan_rpm` = '$keterangan', tgl_persetujuan_rpm = '$tgl' WHERE `tabel_pas`.`id_pas` = '$id_pas'");

			if($sql){
			
						
				$message	= 	"Dear Ibu RMA,<br><br><br>
	
	
							Pengajuan PAS telah disetujui oleh RPM, dimohon untuk Ibu RMA untuk melakukan Validasi PAS<br>
							
							Silakan login untuk melakukan Validasi, Anda dapat mengakses sistem dengan alamat: <a href=pas.apachesml.co.id> https://pas.apachesml.co.id</a>
							<br><br>
							
							Atas perhatiannya kami ucapkan terima kasih.
							
							<br><br><br>
							
							Regards, <br>
							<br>
							<br>
							PAS ONLINE";
								
				$to= 'marisa@apachesml.co.id';
				$subject="PENGAJUAN PAS";
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
									
				// More headers
				$headers .= 'From: <PAS ONLINE>' . "\r\n";
				$headers .= 'Bcc: willy@apachesml.co.id,frans@apachesml.co.id,rolina@apachesml.co.id' . "\r\n";
				@mail($to,$subject,$message,$headers);
				
				
			echo "<script>alert('Data sudah tersimpan, terima kasih..')
			location.href='pas_pending.sml'</script>";
			}else{
			echo "<script>alert('Data gagal disimpan, silakan ulangi proses..')
			location.href='persetujuan_pas_rpm.php?id=$id_pas'</script>";
			}
		}else{
			
			$sql = mysql_query ("UPDATE tabel_pas SET `persetujuan_rpm` = '$persetujuan', `keterangan_rpm` = '$keterangan', status_pas='Ditolak', `tgl_persetujuan_rpm` = '$tgl' WHERE `tabel_pas`.`id_pas` = '$id_pas'");
			
			

			if($sql){
			//proses kirim email ke cmr untuk persetujuan pas di tolak
				$cek_email 	= mysql_query ("SELECT * FROM tabel_proposal a, tabel_cmr b, tabel_ao c, tabel_pas d, tabel_territory e WHERE e.nama_spv=a.nama_spv and a.id_proposal=d.id_proposal and b.id_ao=c.id_ao and a.id_cmr=b.id_cmr and d.id_pas='$id_pas'");
				$hasil_email 	= mysql_fetch_array($cek_email);
				$aca			= $hasil_email['email_aca'];
				$spv			= $hasil_email['email_spv'];
				$asm			= $hasil_email['email_asm'];
				
				$message	= 	"Dear Bapak CMR,<br><br><br>
	
	
							Kepada Bpk CMR PAS Anda $persetujuan.<br>
							
							Silakan login untuk melihat keterangan alasan mengapa $persetujuan
							PAS Anda, Anda dapat mengakses sistem dengan alamat: <a href=pas.apachesml.co.id> https://pas.apachesml.co.id</a>
							<br><br>
							
							Atas perhatiannya kami ucapkan terima kasih.
							
							<br><br><br>
							
							Regards, <br>
							<br>
							<br>
							PAS ONLINE";
								
				$to= $hasil_email['email_cmr'];
				$subject="PENGAJUAN PAS";
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
									
				// More headers
				$headers .= 'From: <PAS ONLINE>' . "\r\n";
				$headers .= 'Cc: '.$aca.','.$spv.','.$asm.''. "\r\n";
				$headers .= 'Bcc: willy@apachesml.co.id,frans@apachesml.co.id,rolina@apachesml.co.id' . "\r\n";
				@mail($to,$subject,$message,$headers);
				
			echo "<script>alert('Data sudah tersimpan, terima kasih..')
			location.href='pas_pending.sml'</script>";
			}else{
			echo "<script>alert('Data gagal disimpan, silakan ulangi proses..')
			location.href='persetujuan_pas_rpm.php?id=$id_pas'</script>";
			}
		}
	}else{
	echo "<script>alert('Kolom keterangan harus diisi, silakan ulangi kembali..')
		location.href='persetujuan_pas_rpm.php?id=$id_pas'</script>";
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
