<?php include "header.php";
?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
		<h4><center><u>INPUT SIPAS</u></center></h4>
				<form action="input_sipas_lanjut.sml" name="form1" method="post" id="form_combo">
				<table width="60%" align="center"><br>  
				
				    <?php    
					// Koneksi  
					
					$result = mysql_query("SELECT * FROM tabel_pas where status_pas='Disetujui' and sipas_status IS NULL order by no_pas ASC");  
					$jsArray = "var prdName = new Array();var prdName = new Array();\n";  
					echo '<tr align=left height=30><td>NO. PAS</td><td><select name="no" onchange="document.getElementById(\'prd_name\').value = prdName[this.value]">';  
					echo '<option>[Pilih NO PAS]</option>';  
					while ($row = mysql_fetch_array($result)) {  
						echo '<option value="' . $row['id_pas'] . '">' . $row['no_pas'] . '</option>';  
						$jsArray .= "prdName['" . $row['id_pas'] . "'] = '" . addslashes($row['program']) . "';\n";  
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
				<?php
				$cek = mysql_query ("SELECT max(id_sipas) as kode from tabel_sipas");
				$hasil=mysql_fetch_array($cek);
				$kode = $hasil['kode']+1;
				?>
				<input type="hidden" name="kode" value="<?php echo $kode;?>">
				<tr align="left" height="30">
					<td>TGL KIRIM SIPAS</td>
					<td><input type="text" name="tgl" id="brothergiez" required></td>
				</tr>
				<tr align="left" height="30">
					<td width="150"></td>
					<td><input type="submit" value="Input Sipas" onclick="return confirm('Apakah anda yakin ingin membuat SIPAS dengan NO PAS yang dipilih?..')"></td>
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
