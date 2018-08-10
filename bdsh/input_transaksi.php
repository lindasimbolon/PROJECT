<?php include "header.php";?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
	<h3>INPUT TRANSAKSI</h3>
		<form action="input_transaksi_simpan.sml" method="POST" enctype='multipart/form-data'>
		<table align="center" width="50%" border="0"><br>
		<?php
		$id = $_GET['id'];
		$sql = mysql_query("SELECT max(id_transaksi) as kode FROM tabel_dana_transaksi");
		$hasil = mysql_fetch_array($sql);
		$kode = $hasil['kode']+1;
		?>
			<tr align="left" height="30">
				<td width="250">ID TRANSAKSI</td>
				<td><input type="text" name="id" value="<?php echo $kode;?>" size="10" readonly></td>
				<input type="hidden" name="kode" value="<?php echo $id;?>" size="10" readonly>
			</tr>
			<tr align="left" height="30">
				<td>TANGGAL TRANSAKSI</td>
				<td><input type="text" name="tgl" size="20" id="waktu2" required></td>
			</tr>
			<tr align="left" height="30">
				<td>JENIS TRANSAKSI</td>
				<td><select name="jenis" required>
						<option value="" selected>[Pilih Jenis]</option>
						<option value="Penerimaan">Penerimaan</option>
						<option value="Pengeluaran">Pengeluaran</option>
					</select>
				</td>
			</tr>
			<tr align="left" height="30">
				<td>KETERANGAN</td>
				<td><textarea name="keterangan" required style="width:350px;height:100px;"></textarea></td>
			</tr>
			<tr align="left" height="30">
				<td>JUMLAH</td>
				<td><input type="text" name="jumlah" size="40" required></td>
			</tr>
			<tr align="left" height="60">
				<td>FILE TRANSAKSI / KWINTANSI / TANDA TRIMA</td>
				<td><input type="file" name="upload" required></td>
			</tr>
			<tr align="left" height="30">
				<td></td>
			</tr>
			<tr align="left" height="30">
				<td></td>
				<td><input type="submit" value="simpan"></td>
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
