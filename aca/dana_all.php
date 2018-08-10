<?php include "header.php";?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
		<h3>DANA MARKETING</h3>
		<table id="contoh" ><br>
			<thead >  
				<tr height="35" bgcolor="#2e9fd2" style="font-weight:bold;" align="center">
					<th width="5%">NO</th>
					<th width="15%">AREA OFFICE</th>
					<th width="10%">QUARTAL</th>
					<th width="10%">TAHUN</th>
					<th width="10%">SALDO AWAL</th>
					<th width="10%">PEMASUKKAN</th>
					<th width="10%">PENGELUARAN</th>
					<th width="10%">TOTAL DANA</th>
					<th width="5%">STATUS</th>
					<th width="5%">JURNAL</th>
					<th width="10%">AKSI</th>
				</tr>
				</thead>
			<tbody>
				<?php
				$i=0;
				$sql1 = mysql_query ("SELECT * FROM tabel_dana a, tabel_ao b where a.id_ao=b.id_ao");
				while ($hasil1 = mysql_fetch_array($sql1)){
				$i++;
				?>
				<tr height="30">
					<td align="center"><?php echo $i;?></td>
					<td align="left"><?php echo $hasil1['nama_ao'];?></td>
					<td align="center"><?php echo $hasil1['id_quartal'];?></td>
					<td align="center"><?php echo $hasil1['tahun'];?></td>
					<td align="right">Rp. <?php echo number_format($hasil1['dana_awal']);?></td>
					<td align="right">Rp. <?php echo number_format($hasil1['penerimaan']);?></td>
					<td align="right">Rp. <?php echo number_format($hasil1['pengeluaran']);?></td>
					<td align="right">Rp. <?php echo number_format($hasil1['total_dana']);?></td>
					<td align="center"><?php echo $hasil1['status'];?></td>
					<td align="center"><a href="jurnal.php?id=<?php echo $hasil1['id_dana'];?>">Lihat</a></td>
					<td align="center"><?php if($hasil1['status']=="Open"){?><a href="input_transaksi.php?id=<?php echo $hasil1['id_dana'];?>">Input Transaksi</a><?php ;}else { echo "-";}?></td>
					
				</tr>
				<?php } ?>
					</tbody>


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
