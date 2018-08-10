<?php include "header.php";?>
<body>
<!-- Header -->
<header id="head">
<h3>DATA ALL PAS <?php echo $_SESSION['ao'];?></h3>
		<table id="contoh">
				<thead>
				<tr bgcolor="#2e9fd2" align="center">
					<th width="3%">#</th>
					<th width="13%" >N0 PAS</th>
					<th width="22%">NAMA PROGRAM</th>
					<th width="15%">TGL PELAKSANAAN</th>
					<th width="10%">NAMA CMR</th>
					<th width="10%">ESTIMASI BIAYA (Rp)</th>
					<th width="5%">STATUS PAS</th>
					<th width="7%">PILIH DATA</th>
				</tr>
				</thead>
			<tbody>
				<?php
				$ao = $_SESSION['ao'];
				$i=0;
				$sql1 = mysql_query ("SELECT * FROM tabel_cmr a, tabel_ao b, tabel_pas c
				where a.id_cmr=c.id_cmr and a.id_ao=b.id_ao and singkatan='$ao' and status_pas ='Disetujui' and sisa_pdm>0 order by c.id_pas DESC ");
				while ($hasil1 = mysql_fetch_array($sql1)){
				$i++;
				
				?>
				<tr height="30">
					<td align="center"><?php echo $i;?></td>
					<td align="left"><?php echo $hasil1['no_pas'];?></td>
					<td align="left"><?php echo $hasil1['program'];?></td>
					<td align="center"><?php if ($hasil1['tgl_selesai']=="") {echo tgl_indo($hasil1['tgl_pelaksanaan']);}elseif ($hasil1['tgl_selesai']=="0000-00-00") {echo tgl_indo($hasil1['tgl_pelaksanaan']);} else {echo tgl_indo($hasil1['tgl_pelaksanaan']); echo" s/d "; echo tgl_indo($hasil1['tgl_selesai']);}?></td>
					<td align="center"><?php echo $hasil1['nama_cmr'];?></td>
					<td align="right">Rp. <?php echo number_format($hasil1['total_pas']);?></td>
					<td align="center"><?php if ($hasil1['status_pas']=="Pending"){ echo "<font color=blue>Pending</font>";} elseif ($hasil1['status_pas']=="Disetujui"){ echo "<font color=green>Disetujui</font>";}else { echo "<font color=red>Ditolak</font>";}?></td>
					<td align="center"><a href="#" onclick="window.opener.document.getElementById('input5').value ='<?php echo $hasil1['id_pas'];?>';window.opener.document.getElementById('input1').value ='<?php echo $hasil1['no_pas'];?>';window.opener.document.getElementById('input2').value ='<?php echo $hasil1['program'];?>';window.opener.document.getElementById('input3').value = '<?php echo "Rp.";?> <?php echo number_format($hasil1['total_pas']);?>';window.opener.document.getElementById('input4').value ='<?php echo $hasil1['nama_cmr'];?>';window.close();/*window.opener.document.location='refresh.html'*/;"><img src="images/tambah.gif"></a></td>
											
					
				</tr>
				<?php } ?>
				
				</tbody>
			</table> 


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
