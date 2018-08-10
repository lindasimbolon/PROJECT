<?php include "header.php";
?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
		<h4><center><u>EDIT ESTIMASI PAS</u></center></h4>
				<form action="edit_estimasi_simpan.sml" name="form1" method="post" id="form_combo">
				<table width="50%"><br>  
				<?php
				$id = $_GET['id'];
				$no = $_GET['no'];
				$cek = mysql_query("SELECT * FROM tabel_estimasi WHERE id_estimasi='$id'");
				$hasil=mysql_fetch_array($cek);				
				?>
				<input type="hidden" name="id" value="<?php echo $hasil['id_estimasi'];?>">
				<input type="hidden" name="no" value="<?php echo $hasil['id_pas'];?>">
				<tr align="left" height="30">
					<td width="250">ITEMS</td>
					<td><input type="text" name="items" value="<?php echo $hasil['items'];?>" size="50" required></td>
				</tr>
				<tr align="left" height="30">
					<td width="150">KOTA</td>
					<td><input type="text" name="kota" value="<?php echo $hasil['kota'];?>" size="40" required></td>
				</tr>
				<tr align="left" height="30">
					<td width="150">JUMLAH</td>
					<td><input type="text" name="jumlah" size="20" value="<?php echo $hasil['jumlah'];?>" required></td>
				</tr>
				<tr align="left" height="30">
					<td width="150">HARGA/UNIT</td>
					<td><input type="text" name="harga" size="50" value="<?php echo $hasil['harga_unit'];?>" required></td>
				</tr>
				<tr align="left" height="30">
					<td width="150">HARI KERJA</td>
					<td><input type="text" name="hari" value="<?php echo $hasil['jml_hari'];?>" size="20"></td>
				</tr>
				<tr align="left" height="30">
					<td><br></td>
				</tr>
				<tr align="left" height="30">
					<td width="150"></td>
					<td><input type="submit" value="Ubah Estimasi"></td>
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
