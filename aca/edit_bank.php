<?php include "header.php";?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
		<h3>EDIT DATA BANK</h3>
		<form action="edit_bank_simpan.php" method="POST">
		<table><br>
		<?php
		$id = $_GET['id'];
		$sql = mysql_query ("SELECT * FROM tabel_bank a, tabel_ao b where a.id_ao=b.id_ao and id_bank='$id'");
		$hasil = mysql_fetch_array($sql);
		?>
			<tr align="left" height="30">
				<td width="200">ID BANK</td>
				<td><input type="text" name="id" value="<?php echo $hasil['id_bank'];?>" readonly size="10"></td>
			</tr>
			<tr align="left" height="30">
				<td width="150">NAMA BANK</td>
				<td><select name="nama_b" required>
						<option value="<?php echo $hasil['nama_bank'];?>" selected><?php echo $hasil['nama_bank'];?></option>
						<option value="BCA">BCA</option>
						<option value="BNI">BNI</option>
						<option value="BRI">BRI</option>
						<option value="MANDIRI">MANDIRI</option>
						<option value="DANAMON">DANAMON</option>
					</select>
				</td>
			</tr>
			<tr align="left" height="30">
				<td width="150">NAMA REKENING</td>
				<td><input type="text" name="nama_r" value="<?php echo $hasil['nama_rek'];?>" value="" size="50" required></td>
			</tr>
			<tr align="left" height="30">
				<td width="150">NO REKENING</td>
				<td><input type="text" name="no_r" value="<?php echo $hasil['no_rek'];?>" size="50" required></td>
			</tr>
			<tr align="left" height="30">
				<td width="150">AREA OFFICE</td>
				<td><select name="area" disabled>
						<option value="<?php echo $hasil['id_ao'];?>" selected><?php echo $hasil['nama_ao'];?></option>
					<?php
					$sql1 = mysql_query ("SELECT * FROM tabel_ao");
					while($hasil1=mysql_fetch_array($sql1)){
					?>
						<option value="<?php echo $hasil1['id_ao'];?>"><?php echo $hasil1['nama_ao'];?></option>
					<?php } ?>
					</select>
				</td>
			</tr>
			<tr  align="left">
				<td width="150"></td>
				<td></td>
			</tr>
			<tr  align="left" height="30">
				<td width="150"></td>
				<td ><input type="submit" value="Edit Bank"></td>
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
