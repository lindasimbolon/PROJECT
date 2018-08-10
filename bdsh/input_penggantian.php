<?php include "header.php";
?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
		<h4><center><u>INPUT PENGGANTIAN SIPAS</u></center></h4>
				<form action="input_penggantian_simpan.sml" name="form1" method="post" id="form_combo">
				<table width="60%" align="center"><br>  
				
				    <?php    
					// Koneksi  
					$result = mysql_query("SELECT * FROM tabel_pas a, tabel_sipas b where a.id_pas=b.id_pas and b.status_sipas='Selesai' and (a.status_pas='Disetujui' or a.status_pas='Selesai') order by no_pas ASC ");  
					
					$jsArray = "var prdName = new Array();var prdName = new Array();\n";  
					echo '<tr align=left height=30><td>NO. PAS</td><td><select name="no" onchange="document.getElementById(\'prd_name\').value = prdName[this.value]">';  
					echo '<option>[Pilih NO PAS]</option>';  
					while ($row = mysql_fetch_array($result)) {  
						echo '<option value="' . $row['id_sipas'] . '">' . $row['no_pas'] . '</option>';  
						$jsArray .= "prdName['" . $row['id_sipas'] . "'] = '" . addslashes($row['program']) . "';\n";  
					}  
					echo '</select></td></tr>'; 
					?>  
					  
					<tr align="left" height="30">
						<td>NAMA PROGRAM</td>
						<td><input type="text" name="prod_name" id="prd_name" size="80"/></td>
					</tr>
					
					<script type="text/javascript">  
					<?php echo $jsArray; ?>  
					</script> 
				
				<tr align="left" height="30">
					<td>TGL PENGGANTIAN</td>
					<td><input type="text" name="tgl" id="brothergiez" required></td>
				</tr>
				<tr align="left" height="30">
					<td>TOTAL PENGGANTIAN</td>
					<td><input type="text" name="total" required></td>
				</tr>
				<tr align="left" height="30">
					<td width="150"></td>
					<td><input type="submit" value="Simpan" onclick="return confirm('Apakah anda yakin ingin menyimpan data ini?..')"></td>
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
