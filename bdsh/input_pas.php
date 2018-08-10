<?php include "header.php";
?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
		<h4><center><u>INPUT PAS</u></center></h4>
				<form action="input_pas_simpan.sml" name="form1" method="post" id="form_combo">
				<table width="50%" align="center"><br>  
				<?php
				include "combo_cmr.php";
				$kategori = $_GET['kategori'];
				$sql = mysql_query("SELECT max(id_pas) as kode FROM tabel_pas");
				$hasil = mysql_fetch_array($sql);
				$kode = $hasil['kode']+1;
				?>
				<input type="hidden" name="id" value="<?php echo $kode;?>" readonly size="5">
				<input type="hidden" name="kategori" value="<?php echo $kategori;?>" readonly size="5">
				<tr align="left" height="30">
					<td width="250">NO PAS</td>
					<td><input type="text" name="no" size="30"></td>
				</tr>
				<tr align="left" height="30">
					<td width="150">NAMA PROGRAM</td>
					<td><input type="text" name="program" value="" size="50"></td>
				</tr>
				<tr align="left" height="30">
					<td width="150">TGL PELAKSANAAN</td>
					<td><input type="text" name="tgl1" id="brothergiez" required size='20'> s/d 
					<input type="text" name="tgl5" id="waktu2"  size='20'></td>
				</tr>
				<tr align="left" height="30">
					<td width="150">AREA OFFICE</td>
					<td><select name="ao" required onchange="showCmr()">
							<option value="" selected>[Pilih Area Office]</option>
						<?php
						$sql1 = mysql_query ("SELECT * FROM tabel_ao order by id_ao");
						while($hasil1=mysql_fetch_array($sql1)){
						?>
							<option value="<?php echo $hasil1['id_ao'];?>"><?php echo $hasil1['nama_ao'];?></option>
						<?php } ?>
						</select>
					</td>
				</tr>
				<tr align="left" height="30">
					<td width="150">NAMA CMR</td>
					<td><select name="cmr" id="cmr" required>
							<option value="" selected>[Pilih CMR]</option>
						</select>
					</td>
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
