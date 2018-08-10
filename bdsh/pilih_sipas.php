<?php include "header.php";
error_reporting(0);
?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
		<h4><center><u>PEMBUATAN SIPAS</u></center></h4><br>
				<form action="pilih_sipas_simpan.php" method="POST">
				<?php
				$id_pas = $_GET['id'];
				$sql 	= mysql_query ("SELECT * FROM tabel_pas a, tabel_ms b, tabel_area c, tabel_proposal d WHERE a.id_ms=b.id_ms and c.id_area=b.id_area and 
							a.id_proposal=d.id_proposal and a.id_pas='$id_pas'");
				$tampil	= mysql_fetch_array($sql);
				$dana	= $tampil['total_pas'] - $tampil['sisa_pdm'];
				?>
				<table border="1" style="border:1px solid black" align="center" width="65%">
				<input type="hidden" name="id_pas" value="<?php echo $tampil['id_pas'];?>">
				<tr>
				<td><br>
				<table style="color:black;" align="center" width="95%">
					<tr>
						<td align="left" width="20%">AREA OFFICE</td>
						<td align="left">: <?php echo $tampil['area_office'];?></td>
					</tr>
					<tr>
						<td align="left">REALISASI PAS</td>
						<td align="left">: <?php echo $tampil['no_pas'];?></td>
					</tr>
					<tr>
						<td align="left">NAMA PROGRAM</td>
						<td align="left">: <?php echo $tampil['program'];?></td>
					</tr>
					<tr>
						<td align="left">PROGRAM BERAKHIR (WEEK)</td>
						<td align="left">: <?php echo $tampil['week2'];?></td>
					</tr>
				</table>
				<hr style="width:95%;border-color:black;">
				
				
				<table style="color:black;" width="95%" align="center">
					<tr>
						<td align="left">Realisasi sbb :
					</tr>
				</table>
				<table style="color:black;" width="95%" align="center">
				<?php
				$i=0;
				$estimasi = mysql_query ("SELECT * FROM tabel_estimasi_budget WHERE id_proposal='".$tampil['id_proposal']."'");
				while($result = mysql_fetch_array($estimasi)){
				$dana1 = $result['jumlah_budget'] * $result['harga_budget'];
				$total = $total + $dana1 ;
				$cek 	= $dana - $total ;
				$i++;
				?>
					<tr>
						<td align="left" width="3%"><input type="hidden" name="id_budget[]" value="<?php echo $result['id_estimasi_budget'];?>"><?php echo $i;?>.</td>
						<td align="left" width="57%"><input type="hidden" name="keterangan[]" value="<?php echo $result['keterangan_budget'];?>"><?php echo $result['keterangan_budget'];?></td>
						<td align="right" width="20%">Rp.</td>
						<td align="right"><input type="text" name="jumlah[]"></td>
						<td align="right">
							<select name="pph[]" id="name">
								<option value="" selected>[NON PPH/PPN]</option>
								<option value="2.5-PPh">PPh 21 - NPWP (2.5%)</option>
								<option value="3-PPh">PPh 21 - NON NPWP (3%)</option>
								<option value="2-PPh">PPh 23 - NPWP (2%)</option>
								<option value="4-PPh">PPh 23 - NON NPWP (4%)</option>
								<option value="10-PPh">PPh 4(2) (10%)</option>
								<option value="10-PPN">PPN (10%)</option>
							</select> 
						</td>
					</tr>
				<?php } ?>
				<tr>
					<td><br></td>
				</tr>
				<tr>
					<td></td>
					<td align="left"><input type="submit" value="Buat SIPAS"></td>
				</tr>
				</table><br>
				
				</td>
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
