<?php include "header.php";?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head" style="width:65%">
		<h3></h3>
		<table id="contoh" ><br>
			<thead >  
				<tr height="35" bgcolor="#2e9fd2" style="font-weight:bold;" align="center">
					<th width="5%">NO</th>
					<th width="10%">TANGGAL</th>
					<th width="20%">KETERANGAN</th>
					<th width="10%">PENERIMAAN</th>
					<th width="10%">PENGELUARAN</th>
					<th width="10%">SALDO</th>
				</tr>
				</thead>
			<tbody>
				<?php
				$i=0;
				$id=$_GET['id'];
				$sql1 = mysql_query ("SELECT * FROM tabel_dana_transaksi a, tabel_history b where a.id_transaksi=b.id_transaksi and a.id_dana='$id' order by id_history ASC");
				while ($hasil1 = mysql_fetch_array($sql1)){
				$i++;
				?>
				<tr height="30">
					<td align="center"><?php echo $i;?></td>
					<td align="center"><?php echo $hasil1['tanggal'];?></td>
					<td align="left"><?php echo $hasil1['ket_history'];?></td>
					<td align="right"><?php if ($hasil1['masuk']<>"") { ?>Rp. <?php echo number_format($hasil1['masuk']);} else{ echo "-";}?></td>
					<td align="right"><?php if ($hasil1['keluar']<>"") { ?>Rp. <?php echo number_format($hasil1['keluar']);} else{ echo "-";}?></td>
					<td align="right">Rp. <?php echo number_format($hasil1['total']);?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
<p align="left"><a href="javascript:history.go(-1)"><img src="images/back.png" width="80" height="30"></a></p>

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
