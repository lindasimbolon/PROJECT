<?php include "header.php";
?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
		<h4><center><u>INPUT PAS</u></center></h4><br>
				<form action="cek_pas.sml" name="form1" method="get" id="form_combo">
				<table align="center">
				<tr>
					<td align="left" width="180">NAMA PROPOSAL PAS</td>
					<td align="left"><select name="id_proposal">
					    	<option value=""selected>[Pilih Nama Proposal PAS]</option>
					    	<?php
					    	$sql = mysql_query ("SELECT * FROM tabel_proposal where status_pas='Belum PAS' and jenis_proposal='LOKAL_DIREKSI'");
					    	while($tampil=mysql_fetch_array($sql)){
					    	?>
					    	<option value="<?php echo $tampil['id_proposal'];?>"><?php echo $tampil['nama_program'];?></option>
					    	<?php } ?>
					    </select>
					</td>
				</tr>
				<tr>
					<td><br></td>
				</tr>
				<tr height="30">
					<td></td>
					<td align="left"><input type="submit" value="Buat PAS"></td>
				</tr>
				</table>
				</form>


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
