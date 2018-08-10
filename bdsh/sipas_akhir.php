<?php include "header.php";
?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
		<?php
		$id = $_GET['id'];
		$cek = mysql_query ("SELECT * from tabel_sipas a, tabel_pas b where a.id_pas=b.id_pas and a.id_sipas='$id'");
		$hasil = mysql_fetch_array($cek);
		?>
		<h4><center><u>INPUT BIAYA SIPAS &nbsp;<a href="#">NO. PAS <?php echo $hasil['no_pas'];?></a></u></center></h4>
				<form action="sipas_simpan.sml" name="form1" method="post" id="form_combo">
				<table width="50%"><br>  
				<?php
				$id = $_GET['id'];
				$lihat=mysql_query("SELECT max(id_sipas_detail) as kode FROM tabel_sipas_detail");
				$tampil = mysql_fetch_array($lihat);
				$kode=$tampil['kode']+1;
				?>
				<input type="hidden" name="id" value="<?php echo $kode;?>">
				<input type="hidden" name="no" value="<?php echo $id;?>">
				<tr align="left" height="30">
					<td width="250">ITEMS</td>
					<td><input type="text" name="items" size="50" required></td>
				</tr>
				
				<tr align="left" height="30">
					<td width="150">JUMLAH</td>
					<td><input type="text" name="jumlah" size="20" required></td>
				</tr>
				<tr align="left" height="30">
					<td width="150">HARGA/UNIT</td>
					<td><input type="text" name="harga" size="50" required></td>
				</tr>
				<tr align="left" height="30">
					<td width="150">HARI KERJA</td>
					<td><input type="text" name="hari" size="20"></td>
				</tr>
				<tr align="left" height="30">
					<td><br></td>
				</tr>
				<tr align="left" height="30">
					<td width="150"></td>
					<td><input type="submit" value="Tambah Estimasi"></td>
				</tr>
				</table>
				</form>
				<table border="1" width='70%' ><br>
				<tr align="center" height="30" bgcolor="#2e9fd2">
					<td width="5%">AKSI</td>
					<td width="20%">ITEMS</td>
					<td width="5%">JUMLAH</td>
					<td width="15%">HARGA/UNIT (Rp)</td>
					<td width="5%">HARI KERJA</td>
					<td width="15%">TOTAL</td>
					
				</tr>
				<?php
				$ur = mysql_query("SELECT * FROM tabel_sipas_detail a, tabel_sipas b WHERE a.id_sipas=b.id_sipas and a.id_sipas ='".$_GET['id']."'");
				while($yes = mysql_fetch_array($ur)){
				$all = $all+$yes['subtotal'];
				?>
				<tr>
					<td align="center">
					<a href="hapus_detail_sipas.sml?id=<?php echo $yes['id_sipas_detail'];?>&no=<?php echo $yes['id_sipas'];?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><img src='images/hapus.png' width='12px' title='hapus'></a>
					</td>
					<td><?php echo $yes['realisasi'];?></td>
					<td align="center"><?php echo number_format($yes['satuan_sipas']);?></td>
					<td align="right"><?php echo number_format($yes['jumlah_dsipas']);?></td>
					<td align="center"><?php echo $yes['hari_sipas'];?></td>
					<td align="right"><?php echo number_format($yes['subtotal']);?></td>
					
				</tr>
				<?php } ?>
				<tr>
					<td colspan="5" style="padding:2px 2px 2px 15px; font-weight:bold;">TOTAL</td>
					<td align="right">Rp. <?php echo number_format($all);?></td> 
				</tr>
				</table><br>
				<p align="left" height="30"><a href="selesai_sipas.sml"><img src="images/back.jpg" width="50"> Selesai</a></p>


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
