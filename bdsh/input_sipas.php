<?php include "header.php";
?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
		<h4><center><u>PEMBUATAN SIPAS</u></center></h4><br>
				<form action="pilih_sipas.php" method="GET">
				<table style="color:black;" align="center">
					<tr>
						<td align="left" width="180">NOMOR PAS</td>
						<td align="left"><select name="id" required>
					    	<option value=""selected>[Pilih Nomor PAS]</option>
					    	<?php
					    	//$sql = mysql_query ("SELECT * FROM tabel_ms a, tabel_area b, tabel_pas c, tabel_pdm d where a.id_ms=c.id_ms and a.id_area=b.id_area and c.id_pas=d.id_pas and
					    	//(c.status_transfer='Sudah Ditransfer' or d.status_transfer='Sudah Ditransfer') and sipas_status is null order by c.id_pas DESC");
							$sql = mysql_query ("SELECT * FROM tabel_ms a, tabel_area b, tabel_pas c where a.id_ms=c.id_ms and a.id_area=b.id_area and (c.status_transfer='Sudah Ditransfer') and sipas_status is null order by c.id_pas DESC");
					      
					    	while($tampil=mysql_fetch_array($sql)){
					    	?>
					    	<option value="<?php echo $tampil['id_pas'];?>"><?php echo $tampil['no_pas'];?></option>
					    	<?php } ?>
					    	</select>
						</td>
					</tr>
					<tr>
						<td><br></td>
					</tr>
					<tr align="left" height="30">
						<td width="150"></td>
					<td><input type="submit" value="Buat SIPAS"></td>
				</tr>
				</table>
				</form>


<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script><!-- -->
<script src="jquery.dataTables.js"></s
cript>
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
