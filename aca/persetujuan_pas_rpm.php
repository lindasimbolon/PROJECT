<?php include "header.php";?>

<script>tinymce.init({ selector:'textarea' });</script>
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
					<td><input type="submit" name="simpan" value="Simpan">&nbsp;&nbsp; <a href="detail_pas_rpm.sml?id=<?php echo $id_pas;?>"><img src="images/back.png" width="50px" height="28px"></a></td>
				</tr>
			</table>
		</form>
				
<!-- Proses Simpan Form Ini -->
<?php
$id_pas 	= $_POST['id_pas'];
$persetujuan	= $_POST['persetujuan'];
$keterangan	= $_POST['keterangan'];

if(isset($_POST['simpan'])){
$sql = mysql_query ("UPDATE `sml_pas`.`tabel_pas` SET `persetujuan_rpm` = '$persetujuan', `keterangan_rpm` = '$keterangan' WHERE `tabel_pas`.`id_pas` = '$id_pas'");

	if($sql){
	//proses kirim email ke rpm untuk persetujuan proposal
		$cek_regional = mysql_query ("SELECT * FROM tabel_pas a, tabel_cmr b, tabel_ao c WHERE a.id_cmr=b.id_cmr and b.id_ao=c.id_ao and a.id_pas='$id_pas'");
		$hasil_regional = mysql_fetch_array($cek_regional);
		
		
		$cek_info 	= mysql_query("SELECT * FROM tabel_info where id_info='10'");
		$hasil_info   	= mysql_fetch_array($cek_info);
		$message	= $hasil_info['info'];
						
		$to= 'frans@apachesml.com';
		$subject="PENGAJUAN PROPOSAL PAS";
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
							
		// More headers
		$headers .= 'From: <PAS ONLINE>' . "\r\n";
		$headers .= 'Cc: lindawati@apachesml.com;frans@apachesml.com' . "\r\n";
		@mail($to,$subject,$message,$headers);
		
	echo "<script>alert('Data sudah tersimpan, terima kasih..')
	location.href='data_persetujuan_pas_rpm.sml'</script>";
	}else{
	echo "<script>alert('Data gagal disimpan, silakan ulangi proses..')
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
