<?php include "header.php";
?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
		<h4><center><u>Ganti Password</u></center></h4>
				<form action="ganti_password_simpan.sml" name="form1" method="post">
				<table width="40%" align="center"><br>  
					<?php 
					$username = $_SESSION['username'];
					
					$sql = mysql_query("SELECT * FROM tabel_user where username='$username'");
					$hasil = mysql_fetch_array($sql);
					?>
					<tr align="left" height="30">
						<td>USERNAME</td>
						<td><input type="text" name="username1" value="<?php echo $hasil['username'];?>" size="50"/>
						<input type="hidden" name="username" value="<?php echo $hasil['username'];?>" size="50"/></td>
					</tr>
					<tr align="left" height="30">
						<td>PASSWORD LAMA</td>
						<td><input type="password" name="lama" placeholder="isi dengan password lama anda.." required size="50"/></td>
					</tr>
					<tr align="left" height="30">
						<td>PASSWORD BARU</td>
						<td><input type="password" name="baru" placeholder="isi dengan password baru anda.." size="50"/></td>
					</tr>
					<tr align="left" height="30">
						<td></td>
						<td><input type="submit" value="Simpan"/></td>
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
