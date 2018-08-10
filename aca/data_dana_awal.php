<?php include "header.php";?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
		<h3>SETTING DANA AWAL</h3>
		<table id="contoh" ><br>
			<thead >  
				<tr height="35" bgcolor="#2e9fd2" style="font-weight:bold;" align="center">
					<th width="5%">NO</th>
					<th width="7%">QUARTAL</th>
					<th width="10%">TAHUN</th>
					<th width="10%">AO1</th>
					<th width="10%">AO2</th>
					<th width="10%">AO3</th>
					<th width="10%">AO4</th>
					<th width="10%">AO5</th>
					<th width="10%">AO6</th>
					<th width="10%">AO7</th>
					<th width="10%">STATUS</th>
					<th width="8%">ACTION</th>
				</tr>
				</thead>
			<tbody>
				<?php
				$i=0;
				$sql1 = mysql_query ("SELECT * FROM tabel_setting_dana ");
				while ($hasil1 = mysql_fetch_array($sql1)){
				$i++;
				?>
				<tr height="30">
					<td align="center"><?php echo $i;?></td>
					<td align="center"><?php echo $hasil1['id_quartal'];?></td>
					<td align="center"><?php echo $hasil1['tahun'];?></td>
					<td align="right">Rp. <?php echo number_format($hasil1['ao1']);?></td>
					<td align="right">Rp. <?php echo number_format($hasil1['ao2']);?></td>
					<td align="right">Rp. <?php echo number_format($hasil1['ao3']);?></td>
					<td align="right">Rp. <?php echo number_format($hasil1['ao4']);?></td>
					<td align="right">Rp. <?php echo number_format($hasil1['ao5']);?></td>
					<td align="right">Rp. <?php echo number_format($hasil1['ao6']);?></td>
					<td align="right">Rp. <?php echo number_format($hasil1['ao7']);?></td>
					<td align="center"><?php if($hasil1['status']=="Open"){ ?><a href="closing.sml?id=<?php echo $hasil1['id_setting'];?>&quartal=<?php echo $hasil1['id_quartal'];?>&tahun=<?php echo $hasil1['tahun'];?>" onclick="return confirm('Apakah anda yakin ingin closing dana?..')">Open</a><?php ;}else 
					{ ?><a href="open.sml?id=<?php echo $hasil1['id_setting'];?>&quartal=<?php echo $hasil1['id_quartal'];?>&tahun=<?php echo $hasil1['tahun'];?>" onclick="return confirm('Apakah anda yakin ingin membuka kembali dana yang sudah di closing?..')">Closing</a><?php ;}?></td>
					<td align="center">
					<a href="edit_dana.sml?id=<?php echo $hasil1['id_setting'];?>&quartal=<?php echo $hasil1['id_quartal'];?>&tahun=<?php echo $hasil1['tahun'];?>"><img src='images/ubah.png' width='12px' title='edit'></a>&nbsp;
					<a href="hapus_dana.sml?id=<?php echo $hasil1['id_setting'];?>&quartal=<?php echo $hasil1['id_quartal'];?>&tahun=<?php echo $hasil1['tahun'];?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><img src='images/hapus.png' width='12px' title='hapus'></a>
					</td>
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
