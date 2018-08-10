<?php include "header.php";?>
<body>
<?php include "menu.php";?>
<!-- Header -->

		<?php
				$id = $_GET['id'];
				$cek = mysql_query("SELECT * FROM tabel_pas WHERE id_pas='$id'");
				$hasil=mysql_fetch_array($cek);				
				?>

				
				<h4><center>UPLOAD PAS VALIDASI</center></h4>
				<form action="upload_pas_simpan.sml" method="post" enctype='multipart/form-data'>
				<table align="center"><br>
				<input type="hidden" name="id" value="<?php echo $hasil['id_pas'];?>">
				<tr>
					<td width="150">UPLOAD PAS</td>
					<td><input type="file" name="upload" required></td>
				</tr>
				<tr>
					<td><br></td>
				</tr>
				<tr>
					<td width="150"></td>
					<td><input type="submit" value="Upload"></td>
				</tr>
				</table>
				</form>


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


			