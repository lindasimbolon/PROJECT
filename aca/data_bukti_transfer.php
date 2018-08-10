<?php include "header.php";?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
<h4><center><u>LAPORAN PDM</u></center></h4>
		<table id="contoh"><br>
			<thead >  
				<tr height="30" bgcolor="#2e9fd2" style="font-weight:bold;" align="center">
					<th width="10%">NO</th>
					<th width="20%">NO PAS</th>
					<th width="15%">NO REK TUJUAN</th>
					<th width="15%">TANGGAL KIRIM</th>
					<th width="15%">JUMLAH DANA (IDR)</th>
					<th width="15%">FILE</th>
					<!--<th width="10%">ACTION</th>-->
				</tr>
				</thead>
			<tbody>
				<?php
				$i=0;
				$ao = $_SESSION['ao'];
				$sql1 = mysql_query ("SELECT * FROM tabel_bukti_transfer a, tabel_pas b, tabel_cmr c, tabel_ao d where a.no_pas=b.no_pas
				and b.id_cmr=c.id_cmr and c.id_ao=d.id_ao and d.singkatan='$ao' order by id_bukti_transfer ASC");
				while ($hasil1 = mysql_fetch_array($sql1)){
				$i++;
				?>
				<tr height="30">
					<td align="center"><?php echo $i;?></td>
					<td align="left"><?php echo $hasil1['no_pas'];?></td>
					<td align="center"><?php echo $hasil1['no_rek_tujuan'];?></td>
					<td align="center"><?php echo tgl_indo($hasil1['tanggal_kirim']);?></td>
					<td align="right"><?php echo number_format($hasil1['jumlah_dana']);?></td>
					<td align="center"><a href="../f_a/file/<?php echo $hasil1['file'];?>" target="_blank">Lihat File</a></td>
					<!--<td align="center">
					<a href="hapus_bukti_transfer.sml?id=<?php echo $hasil1['id_bukti_transfer'];?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><img src='images/hapus.png' width='12px' title='hapus'></a>
					</td>-->
				</tr>
				<?php } ?>
					</tbody>

<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script><!-- -->
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
