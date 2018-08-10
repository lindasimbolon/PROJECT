<?php include "header.php";?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
		<h3>DATA USER</h3>
		<form action="input_user_simpan.php" method="POST">
		<table><br>
			<tr align="left" height="30">
				<td width="150">USERNAME</td>
				<td><input type="text" name="username" value="" required size="50"></td>
			</tr>
			<tr align="left" height="30">
				<td width="150">PASSWORD</td>
				<td><input type="password" name="password" value="" size="50" required></td>
			</tr>
			<tr align="left" height="30">
				<td width="150">LEVEL</td>
				<td><select name="level" required style="height:30px;">
						<option value="" selected style="height:25px;">[Pilih Level]</option>
						<option value="Administrator" style="height:25px;">Administrator</option>
						<option value="Direksi" style="height:25px;">Direksi</option>
						<option value="RPM WEST" style="height:25px;">RPM WEST</option>
						<option value="RPM EAST" style="height:25px;">RPM EAST</option>
						<option value="ASM" style="height:25px;">ASM</option>
						<option value="RCA" style="height:25px;">RCA</option>
						<option value="F&A" style="height:25px;">F&A </option>
						<option value="Admin RO" style="height:25px;">Admin RO</option>
						<option value="Admin AO" style="height:25px;">Admin AO</option>
						<option value="CMR" style="height:25px;">CMR</option>
					</select>
				</td>
			</tr>
			<tr align="left" height="30">
				<td width="150">NO HP</td>
				<td><input type="text" name="hp" value="" size="50"></td>
			</tr>
			<tr align="left" height="30">
				<td width="150">EMAIL</td>
				<td><input type="text" name="email" value="" size="50"></td>
			</tr>
			<tr align="left" height="30">
				<td>HO/RO/AREA OFFICE</td>
				<td><select name="ao" required>
						<option value="" selected>[Pilih Tempat]</option>
						<option value="HO">HO</option>
						<option value="RO">RO</option>
						<option value="AO1">AO1</option>
						<option value="AO2">AO2</option>
						<option value="AO3">AO3</option>
						<option value="AO4">AO4</option>
						<option value="AO5">AO5</option>
						<option value="AO6">AO6</option>
						<option value="AO7">AO7</option>
					</select>
				</td>
			</tr>
			<tr  align="left">
				<td width="150"></td>
				<td></td>
			</tr>
			<tr  align="left" height="30">
				<td width="150"></td>
				<td ><input type="submit" value="Simpan"></td>
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
