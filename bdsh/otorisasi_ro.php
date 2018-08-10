<?php include "header.php";
?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
		<h4><center><u>OTORISASI PDM <?php echo $_SESSION['ao'];?></u></center></h4>
				<form action="otorisasi_ro_simpan.sml" name="order" method="post">
				<table width="50%" align="center"><br>  
				<?php
				$id = $_GET['id'];
				$sql = mysql_query("SELECT * FROM tabel_pdm a, tabel_pas b where a.id_pas=b.id_pas and id_pdm='$id'");
				$hasil = mysql_fetch_array($sql);
				?>
				<tr align="left" height="30">
					<td width="20">ID PDM</td>
					<td><input type="text" name="id" value="<?php echo $hasil['id_pdm'];?>" size="10" readonly></td>
				</tr>
				
				<tr align="left" height="30">
					<td width="150">NO PAS</td>
					<td><input type="text" value="<?php echo $hasil['no_pas'];?>" disabled size="50">
				</tr>
				<tr align="left" height="30">
					<td width="200">NAMA PROGRAM</td>
					<td><textarea  disabled style="width:380px;height:100px;"><?php echo $hasil['program'];?></textarea></td>
				</tr>
				<tr align="left" height="30">
					<td width="200">JUMLAH PDM</td>
					<td><input type="text"  value="Rp. <?php echo number_format($hasil['total_pdm']);?>" disabled size="50"></td>
				</tr>
				<tr align="left" height="30">
					<td width="200">TGL DIBUTUHKAN</td>
					<td><input type="text" name="tgl" value="<?php echo $hasil['tgl_butuh'];?>" disabled size="20"></td>
				</tr>
				<tr align="left" height="30">
					<td width="200">OTORISASI</td>
					<td><select name="otorisasi" required>
							<option value="" selected>[Pilih Otorisasi]</option>
							<option value="Disetujui">Disetujui</option>
							<option value="Ditolak">Ditolak</option>
						</select>
					</td>
				</tr>
				<tr align="left" height="30">
					<td width="150"></td>
					<td><input type="submit" value="Simpan"></td>
				</tr>
				</table>
				</form>




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
