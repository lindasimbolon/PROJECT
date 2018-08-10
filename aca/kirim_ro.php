<?php include "header.php";
?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
		<h4><center><u>KIRIM SIPAS DARI RO</u></center></h4>
				<form action="kirim_ro_simpan.sml" name="form1" method="post" id="form_combo">
				<table width="50%" align="center"><br>  
				<tr align="left" height="30">
					<td width="150">NO PAS</td>
					
					<?php
					$id = $_GET['id'];
					$sql = mysql_query ("SELECT * FROM tabel_pas a, tabel_sipas b where a.id_pas=b.id_pas and id_sipas='$id'");
					$hasil = mysql_fetch_array($sql);
					?>
					<input type="hidden" name="no" value="<?php echo $hasil['id_sipas'];?>" readonly size="40">
					<td><input type="text" value="<?php echo $hasil['no_pas'];?>" readonly size="40"></td>
				</tr>
				
				<tr align="left" height="30">
					<td>TGL KIRIM SIPAS</td>
					<td><input type="text" name="tgl" id="brothergiez" required></td>
				</tr>
				<tr align="left" height="30">
					<td width="150"></td>
					<td><input type="submit" value="KIRIM SIPAS"></td>
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
