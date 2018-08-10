<?php include "header.php";?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
	<div style="width:50%;">
		<?php
		$id = $_GET['id'];
		$sql2 = mysql_query ("SELECT * FROM tabel_pas where id_pas='$id'");
		$hasil = mysql_fetch_array($sql2);
		?>
		<h3>DETAIL ESTIMASI BIAYA NO. PAS &nbsp;<font color="blue"><?php echo $hasil['no_pas'];?></font><br>
		NAMA PROGRAM &nbsp;<font color="blue"><?php echo $hasil['program'];?></font></h3>
		<table border="1" width='100%' ><br>
				<tr align="center" height="30" bgcolor="#2e9fd2">
					<td width="5%">AKSI</td>
					<td width="20%">ITEMS</td>
					<td width="10%">KOTA</td>
					<td width="5%">JUMLAH</td>
					<td width="15%">HARGA/UNIT (Rp)</td>
					<td width="5%">HARI KERJA</td>
					<td width="15%">TOTAL (Rp)</td>
					
				</tr>
				<?php
				$ur = mysql_query("SELECT * FROM tabel_estimasi WHERE id_pas = $hasil[id_pas]");
				while($yes = mysql_fetch_array($ur)){
				$all = $all+$yes['total'];
				?>
				<tr height="25">
					<td align="center">
					<a href="hapus_estimasi1.sml?id=<?php echo $yes['id_estimasi'];?>&no=<?php echo $yes['id_pas'];?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><img src='images/hapus.png' width='12px' title='hapus'></a>
					<a href="edit_estimasi.sml?id=<?php echo $yes['id_estimasi'];?>&no=<?php echo $yes['id_pas'];?>"><img src='images/ubah.png' width='12px' title='edit'></a>
					</td>
					<td><?php echo $yes['items'];?></td>
					<td align="center"><?php echo $yes['kota'];?></td>
					<td align="center"><?php echo $yes['jumlah'];?></td>
					<td align="right"><?php echo number_format($yes['harga_unit']);?></td>
					<td align="center"><?php echo $yes['jml_hari'];?></td>
					<td align="right"><?php echo number_format($yes['total']);?></td>
					
				</tr>
				<?php } ?>
				<tr>
					<td colspan="6" style="padding:2px 2px 2px 15px; font-weight:bold;">TOTAL</td>
					<td align="right"><b>Rp. <?php echo number_format($all);?></b></td> 
				</tr>
				</table><br>
			<p align="left"><a href="javascript:history.go(-1)"><img src="images/back.png" width="80" height="40"></a> <a href="input_estimasi.sml?id=<?php echo $id;?>"><img src="images/input.png" width="80" height="40"></a></p>
		</div>

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
