<?php include "header.php";?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
		<h4><center><u>EDIT CMR</u></center></h4>
				<form action="update_cmr.sml" method="post">
				<table width="50%" align="center"><br> 
				<?php
				$id = $_GET['id'];
				$sql = mysql_query("SELECT * FROM tabel_cmr a, tabel_ao b where a.id_ao=b.id_ao and a.id_cmr='$id'");
				$hasil = mysql_fetch_array($sql);
				?>
				<tr align="left" height="30">
					<td width="250">ID CMR</td>
					<td><input type="text" name="id" value="<?php echo $hasil['id_cmr'];?>" readonly size="5"></td>
				</tr>
				<tr align="left" height="30">
					<td width="150">NAMA AREA OFFICE</td>
					<td><select name="ao" required style="height:30px;">
							<option value="<?php echo $hasil['id_ao'];?>" selected style="height:25px;"><?php echo $hasil['nama_ao'];?></option>
							<?php 
							$cek = mysql_query("SELECT * FROM tabel_ao order by id_ao");
							while ($tampil=mysql_fetch_array($cek)){
							?>
							<option value="<?php echo $tampil['id_ao'];?>" style="height:25px;"><?php echo $tampil['nama_ao'];?></option>
							<?php } ?>
						</select>
					</td>
				</tr>
				<tr align="left" height="30">
					<td width="150">NAMA CMR</td>
					<td><input type="text" name="nama" value="<?php echo $hasil['nama_cmr'];?>" size="50" required></td>
				</tr>
				<tr align="left" height="30">
					<td width="150">EMAIL CMR</td>
					<td><input type="text" name="email" value="<?php echo $hasil['email_cmr'];?>" size="50" required></td>
				</tr>
				<tr align="left" height="30">
					<td width="150">HP CMR</td>
					<td><input type="text" name="hp" value="<?php echo $hasil['hp_cmr'];?>" size="50" ></td>
				</tr>
				<tr align="left" height="30">
					<td width="150"></td>
					<td><input type="submit" value="Update"></td>
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
