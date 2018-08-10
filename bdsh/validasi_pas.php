<?php include "header.php";
?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
		<h4><center><u>VALIDASI PAS</u></center></h4>
				<form action="validasi_pas_simpan.sml" name="form1" method="post" id="form_combo">
				<table width="50%" align="center"><br>  
				<tr align="left" height="30">
					<td width="200">NO PAS</td>
					<td><select name="no" required>
							<option value="" selected>[Pilih Pas]</option>
						<?php
						$sql1 = mysql_query ("SELECT * FROM tabel_cmr a, tabel_ao b, tabel_pas c
						where a.id_cmr=c.id_cmr and a.id_ao=b.id_ao and status_pas='Pending' order by c.no_pas ASC ");	
						while ($hasil1 = mysql_fetch_array($sql1)){
						?>
						<option value="<?php echo $hasil1['id_pas'];?>"><?php echo $hasil1['no_pas'];?></option>
						<?php } ?>
						</select>
					</td>
				</tr>
				<tr align="left" height="30">
					<td>PILIH PERSETUJUAN</td>
					<td><select name="validasi" required>
							<option value="" selected>Pending</option>
							<option value="Disetujui">Disetujui</option>
							<option value="Ditolak">Ditolak</option>
						</select>
					</td>
				</tr>
				<tr align="left" height="30">
					<td>TGL PERSETUJUAN</td>
					<td><input type="text" name="tgl" id="brothergiez" required></td>
				</tr>
				<tr align="left" height="30">
					<td width="150"></td>
					<td><input type="submit" value="Simpan"></td>
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
