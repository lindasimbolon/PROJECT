<?php include "header.php";?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
	<h3>INPUT DANA AWAL</h3>
		<form action="input_dana_awal_simpan.sml" method="POST">
		<table align="center" width="50%" border="0"><br>
		<?php
		$sql = mysql_query("SELECT max(id_setting) as kode FROM tabel_setting_dana");
		$hasil = mysql_fetch_array($sql);
		$kode = $hasil['kode']+1;
		?>
			<tr align="left" height="30">
				<td width="250">ID PENGATURAN</td>
				<td><input type="text" name="id" value="<?php echo $kode;?>" size="10" readonly></td>
			</tr>
			<tr align="left" height="30">
				<td>AO LAMPUNG</td>
				<td><input type="text" name="lampung" size="40" required></td>
			</tr>
			<tr align="left" height="30">
				<td>AO KOTABUMI</td>
				<td><input type="text" name="kotabumi" size="40" required></td>
			</tr>
			<tr align="left" height="30">
				<td>AO BATURAJA</td>
				<td><input type="text" name="baturaja" size="40" required></td>
			</tr>
			<tr align="left" height="30">
				<td>AO BENGKULU</td>
				<td><input type="text" name="bengkulu" size="40" required></td>
			</tr>
			<tr align="left" height="30">
				<td>AO LUBUKLINGGAU</td>
				<td><input type="text" name="lubuklinggau" size="40" required></td>
			</tr>
			<tr align="left" height="30">
				<td>AO PALEMBANG</td>
				<td><input type="text" name="palembang" size="40" required></td>
			</tr>
			<tr align="left" height="30">
				<td>AO JAMBI</td>
				<td><input type="text" name="jambi" size="40" required></td>
			</tr>
			<tr align="left" height="30">
				<td>QUARTAL</td>
				<td><select name="quartal" required>
						<option value="" selected>[Pilih]</option>
					<?php
					$sql1 = mysql_query ("SELECT * FROM tabel_quartal");
					while($hasil1 = mysql_fetch_array($sql1)){
					?>
						<option value="<?php echo $hasil1['id_quartal'];?>"><?php echo $hasil1['id_quartal'];?></option>
					<?php } ?>
					</select>
				</td>
			</tr>
			<tr align="left" height="30">
				<td>TAHUN</td>
				<td><input type="text" name="tahun" size="10" required></td>
			</tr>
			<tr align="left" height="30">
				<td></td>
			</tr>
			<tr align="left" height="30">
				<td></td>
				<td><input type="submit" value="simpan"></td>
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
