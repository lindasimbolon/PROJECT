<?php include "header.php";?>

<script>tinymce.init({ selector:'textarea' });</script>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
		<h4><center><u>PERSETUJUAN PROPOSAL</u></center></h4>
		
		<form action=""  method="post" >
			<?php
			$id_proposal = $_GET['id'];
			?>
			<input type="hidden" name="id_proposal" value="<?php echo $id_proposal;?>">
			<table width="50%" align="center"><br>  
				<tr align="left" height="30">
					<td><b>Persetujuan Proposal</b></td>
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
					<td><textarea name="keterangan"></textarea></td>
				</tr>
				<tr align="left" height="80">
					<td></td>
					<td><input type="submit" name="simpan" value="Simpan">&nbsp;&nbsp; <a href="detail_proposal_rpm.sml?id=<?php echo $id_proposal;?>"><img src="images/back.png" width="50px" height="28px"></a></td>
				</tr>
			</table>
		</form>
				
<!-- Proses Simpan Form Ini -->
<?php
$id_proposal 	= $_POST['id_proposal'];
$persetujuan	= $_POST['persetujuan'];
$keterangan	= $_POST['keterangan'];
$tgl		= date('Y-m-d');

if(isset($_POST['simpan'])){
	if($keterangan<>""){
	$sql = mysql_query ("UPDATE `sml_pas`.`tabel_proposal` SET `persetujuan_rpm` = '$persetujuan', `keterangan_rpm` = '$keterangan', `tgl_persetujuan_rpm` = '$tgl', `status_pas` = 'Belum PAS' WHERE `tabel_proposal`.`id_proposal` = '$id_proposal'");

		if($sql){
		//proses kirim email ke rpm untuk persetujuan proposal
			$cek_email 	= mysql_query ("SELECT * FROM tabel_proposal a, tabel_cmr b where a.id_cmr=b.id_cmr and a.id_proposal='$id_proposal'");
			$hasil_email 	= mysql_fetch_array($cek_email);
			
			$cek_info 	= mysql_query ("SELECT * FROM tabel_info WHERE id_info='6'");
			$hasil_info   	= mysql_fetch_array($cek_info);
			$message	= $hasil_info['info'];
							
			$to= $hasil_email['email_cmr'];
			$subject="PROPOSAL PAS";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
								
			// More headers
			$headers .= 'From: <PAS ONLINE>' . "\r\n";
			$headers .= 'Cc: lindawati@apachesml.com;frans@apachesml.com' . "\r\n";
			@mail($to,$subject,$message,$headers);
			
		echo "<script>alert('Data sudah tersimpan, terima kasih..')
		location.href='data_perpos_rpm.php'</script>";
		}else{
		echo "<script>alert('Data gagal disimpan, silakan ulangi proses..')
		location.href='persetujuan_proposal_rpm.php?id=$id_proposal'</script>";
		}
	}else{
	echo "<script>alert('Kolom keterangan harus diisi, silakan ulangi kembali..')
		location.href='persetujuan_proposal_rpm.php?id=$id_proposal'</script>";
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
