<?php include "header.php";?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
		<table id="contoh"><br>
				<thead >
				<tr height="35" bgcolor="#2e9fd2" style="font-weight:bold;" align="center">
					<th width="5%">NO</th>
					<th width="20%">NAMA CMR</th>
					<th width="20%">EMAIL CMR</th>
					<th width="10%">HP CMR</th>
					<th width="15%">AREA OFFICE</th>
					<th width="15%">NAMA ASM</th>
					<th width="10%">ACTION</th>
				</tr>
				</thead>
			<tbody>
				<?php
				$i=0;
				$sql1 = mysql_query ("SELECT * FROM tabel_cmr a, tabel_ao b where a.id_ao=b.id_ao order by a.id_ao ASC");
				while ($hasil1 = mysql_fetch_array($sql1)){
				$i++;
				?>
				<tr height="30">
					<td align="center"><?php echo $i;?></td>
					<td align="left"><?php echo $hasil1['nama_cmr'];?></td>
					<td align="center"><?php echo $hasil1['email_cmr'];?></td>
					<td align="center"><?php echo $hasil1['hp_cmr'];?></td>
					<td align="center"><?php echo $hasil1['nama_ao'];?></td>
					<td align="center"><?php echo $hasil1['asm'];?></td>
					<td align="center">
					<a href="edit_cmr.sml?id=<?php echo $hasil1['id_cmr'];?>"><img src='images/ubah.png' width='12px' title='edit'></a>&nbsp;
					<a href="hapus_cmr.sml?id=<?php echo $hasil1['id_cmr'];?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><img src='images/hapus.png' width='12px' title='hapus'></a>
					</td>
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
