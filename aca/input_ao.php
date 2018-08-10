<?php include "header.php";?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
		<h4><center><u>INPUT AREA OFFICE</u></center></h4>
				<form action="proses.sml" method="post">
				<table width="50%" align="center"><br>  
				<?php
				$sql = mysql_query("SELECT max(id_ao) as kode FROM tabel_ao");
				$hasil = mysql_fetch_array($sql);
				$kode = $hasil['kode']+1;
				?>
				<tr align="left" height="30">
					<td width="250">ID AREA OFFICE</td>
					<td><input type="text" name="id" value="<?php echo $kode;?>" readonly size="5"></td>
				</tr>
				<tr align="left" height="30">
					<td width="150">NAMA AREA OFFICE</td>
					<td><input type="text" name="nama" value="" size="50"></td>
				</tr>
				<tr align="left" height="30">
					<td width="150">SINGKATAN</td>
					<td><input type="text" name="singkatan" value="" size="10"></td>
				</tr>
				<tr align="left" height="30">
					<td width="150">NAMA ASM</td>
					<td><input type="text" name="asm" value="" size="50"></td>
				</tr>
				<tr align="left" height="30">
					<td width="150">EMAIL ASM</td>
					<td><input type="text" name="email_asm" value="" size="50"></td>
				</tr>
				<tr align="left" height="30">
					<td>REGIONAL</td>
					<td><select name="regional" style="width:150px" required>
					<option value="">- Pilih Regional -</option>
					<option value="WEST">WEST</option>
					<option value="EAST">EAST</option>
					</select>
					</td>
					<td></td>
				</tr>
				<tr align="left" height="30">
					<td width="150">EMAIL RPM</td>
					<td><input type="text" name="email_rpm" value="" size="50"></td>
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
