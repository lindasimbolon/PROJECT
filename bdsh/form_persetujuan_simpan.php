<?php include "header.php";?>

<script>tinymce.init({ selector:'textarea' });</script>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
		<h4><center><u>PERSETUJUAN PDM</u></center></h4>
		
		<form action=""  method="post" >
			<?php
			$id_pdm = $_GET['id'];
			?>
			<input type="hidden" name="id_pdm" value="<?php echo $id_pdm;?>">
			<table width="50%" align="center"><br>  
				<tr align="left" height="30">
					<td><b>Persetujuan PDM</b></td>
					<td><select name="persetujuan" required style="width:200px">
						<option value="" selected>[Pilih Persetujuan]</option>
						<option value="Disetujui">Disetujui</option>
						<option value="Ditolak">Ditolak</option>
					    </select>	
					</td>
				</tr>
				<tr align="left" height="30">
					<td><b>Keterangan</b></td>
					<td><textarea name="keterangan"></textarea></td>
				</tr>
				<tr align="left" height="80">
					<td></td>
					<td><input type="submit" name="simpan" value="Simpan">&nbsp;&nbsp; <a href="javascript:history.back()"><img src="images/back.png" width="50px" height="28px"></a></td>
				</tr>
			</table>
		</form>
				
<!-- Proses Simpan Form Ini -->
<?php
$id_pdm 	= $_POST['id_pdm'];
$persetujuan	= $_POST['persetujuan'];
$keterangan	= $_POST['keterangan'];
$tgl		= date('Y-m-d');

if(isset($_POST['simpan'])){
	if($keterangan<>""){
		if ($persetujuan=="Disetujui"){
		$sql = mysql_query ("UPDATE tabel_pdm SET `persetujuan_rpm` = '$persetujuan', `keterangan_rpm` = '$keterangan', tgl_persetujuan_rpm = '$tgl' WHERE `tabel_pdm`.`id_pdm` = '$id_pdm'");

		if($sql){
		//proses kirim email ke rpm untuk persetujuan proposal
			$cek_regional = mysql_query ("SELECT * FROM tabel_pas a, tabel_cmr b, tabel_ao c, tabel_pdm d WHERE a.id_pas=d.id_pas and a.id_cmr=b.id_cmr and 
					b.id_ao=c.id_ao and d.id_pdm='$id_pdm'");
			$hasil_regional = mysql_fetch_array($cek_regional);
			
			
			$message	= "Dear Ibu RMA,<br><br><br>

					Kepada Ibu RMA dimohon untuk Validasi PDM yang diajukan dari CMR.<br><br>
					
					silakan login untuk melakukan Validasi PDM: <a href=pas.apachesml.co.id> http://pas.apachesml.co.id</a>
					<br><br>
					
					Atas perhatiannya kami ucapkan terima kasih.
					
					<br><br><br>
					
					Regards, <br>
					<br>
					<br>
					PAS ONLINE";
							
			$to= 'marisa@apachesml.com';
			$subject="PENGAJUAN PDM";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
								
			// More headers
			$headers .= 'From: <PAS ONLINE>' . "\r\n";
			$headers .= 'Cc: gunadi@apachesml.co.id' . "\r\n";
			$headers .= 'Bcc: willy@apachesml.co.id,frans@apachesml.co.id,rolina@apachesml.co.id' . "\r\n";
			@mail($to,$subject,$message,$headers);
			
		echo "<script>alert('Data sudah tersimpan, terima kasih..')
		location.href='persetujuan_pdm.sml'</script>";
		}else{
		echo "<script>alert('Data gagal disimpan, silakan ulangi proses..')
		location.href='form_persetujuan_simpan.sml?id=$id_pdm'</script>";
		}
	}else{
	$sql = mysql_query ("UPDATE tabel_pdm SET `persetujuan_rpm` = '$persetujuan', `keterangan_rpm` = '$keterangan', tgl_persetujuan_rpm = '$tgl', status_pdm='Ditolak' WHERE `tabel_pdm`.`id_pdm` = '$id_pdm'");
	$cek	= mysql_fetch_array(mysql_query("SELECT * FROM tabel_pdm where id_pdm='$id_pdm'"));
	$sql1	= mysql_query("UPDATE tabel_pas SET sisa_pdm = sisa_pdm + '".$cek['total_pdm']."' WHERE id_pas = '".$cek['id_pas']."'");
			
			if(($sql)and($sql1)){
		//proses kirim email ke rpm untuk persetujuan proposal
			$cek_regional = mysql_query ("SELECT * FROM tabel_pas a, tabel_cmr b, tabel_ao c, tabel_pdm d WHERE a.id_pas=d.id_pas and a.id_cmr=b.id_cmr and 
					b.id_ao=c.id_ao and d.id_pdm='$id_pdm'");
			$hasil_regional = mysql_fetch_array($cek_regional);
			$email_cmr 	= $hasil_regional['email_cmr'];
			$email_aca  = $hasil_regional['email_aca'];
			
			$message	= "Dear CMR,<br><br><br>

					Melalui email ini kami menginformasikan bahwa PDM yang diajukan dari CMR Ditolak.<br><br>
					
					silakan login untuk melihat keterangan PDM yang ditolak: <a href=pas.apachesml.co.id> http://pas.apachesml.co.id</a>
					<br><br>
					
					Atas perhatiannya kami ucapkan terima kasih.
					
					<br><br><br>
					
					Regards, <br>
					<br>
					<br>
					PAS ONLINE";
							
			$to= $email_cmr;
			$subject="PDM DITOLAK";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
								
			// More headers
			$headers .= 'From: <PAS ONLINE>' . "\r\n";
			$headers .= 'Cc: '.$email_aca.'' . "\r\n";
			$headers .= 'Bcc: willy@apachesml.co.id,frans@apachesml.co.id,rolina@apachesml.co.id' . "\r\n";
			@mail($to,$subject,$message,$headers);
			
		echo "<script>alert('Data sudah tersimpan, terima kasih..')
		location.href='persetujuan_pdm.sml'</script>";
		}else{
		echo "<script>alert('Data gagal disimpan, silakan ulangi proses..')
		location.href='form_persetujuan_simpan.sml?id=$id_pdm'</script>";
		}
	}
}else{
	echo "<script>alert('Kolom keterangan harus diisi, silakan ulangi kembali..')
		location.href='form_persetujuan_simpan.sml?id=$id_pdm'</script>";
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
