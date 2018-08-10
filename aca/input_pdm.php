<?php include "header.php";
?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
		<h4><center><u>INPUT PDM <?php echo $_SESSION['ao'];?></u></center></h4>
				<form action="input_pdm_simpan.sml" name="order" method="post">
				<table width="50%" align="center"><br>  
				
				
				
				<tr align="left" height="30">
					<td width="150">NO PAS</td>
					<td><input type="text" id="input1" disabled size="50">&nbsp;&nbsp;
					<input type="hidden" name="pas" id="input5"  size="50">
					<img src="images/detail.png" onclick="window.open('pas.php', 'winpopup', 'toolbar=yes,statusbar=yes,menubar=yes,resizable=yes,scrollbars=yes,width=1200,height=800');" style="cursor:pointer"></td>
				</tr>
				<tr align="left" height="30">
					<td width="200">NAMA PROGRAM</td>
					<td><textarea  id="input2" disabled style="width:380px;height:100px;"></textarea></td>
				</tr>
				<tr align="left" height="30">
					<td width="200">ESTIMASI</td>
					<td><input type="text"  id="input3" disabled size="50"></td>
				</tr>
				<tr align="left" height="30">
					<td width="200">CMR</td>
					<td><input type="text"  id="input4" disabled size="50"></td>
				</tr>
				<tr align="left" height="30">
					<td width="200">TGL DIBUTUHKAN</td>
					<td><input type="text" name="tgl" id="brothergiez" required size="20"></td>
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
