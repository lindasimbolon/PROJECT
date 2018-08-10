<?php include "header.php";?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
		<table id="contoh"><br>
			<thead >  
				<tr height="30" bgcolor="#2e9fd2" style="font-weight:bold;" align="center">
					<th width="10%">NO</th>
					<th width="30%">NAMA AREA OFFICE</th>
					<th width="10%">SINGKATAN</th>
					<th width="30%">NAMA ASM</th>
					<th width="30%">EMAIL ASM</th>
					<th width="30%">REGIONAL</th>
					<th width="30%">EMAIL RPM</th>
					<th width="10%">ACTION</th>
				</tr>
				</thead>
			<tbody>
				<?php
				$i=0;
				$sql1 = mysql_query ("SELECT * FROM tabel_ao order by id_ao ASC");
				while ($hasil1 = mysql_fetch_array($sql1)){
				$i++;
				?>
				<tr height="30">
					<td align="center"><?php echo $i;?></td>
					<td align="left"><?php echo $hasil1['nama_ao'];?></td>
					<td align="center"><?php echo $hasil1['singkatan'];?></td>
					<td align="center"><?php echo $hasil1['asm'];?></td>
					<td align="center"><?php echo $hasil1['email_asm'];?></td>
					<td align="center"><?php echo $hasil1['regional'];?></td>
					<td align="center"><?php echo $hasil1['email_rpm'];?></td>
					<td align="center">
					<a href="edit_ao.sml?id=<?php echo $hasil1['id_ao'];?>"><img src='images/ubah.png' width='12px' title='edit'></a>&nbsp;
					<a href="hapus_ao.sml?id=<?php echo $hasil1['id_ao'];?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><img src='images/hapus.png' width='12px' title='hapus'></a>
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
