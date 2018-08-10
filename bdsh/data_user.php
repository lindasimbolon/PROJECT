<?php include "header.php";?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
		<h3>DATA USER</h3>
		<table id="contoh" ><br>
			<thead >  
				<tr height="35" bgcolor="#2e9fd2" style="font-weight:bold;" align="center">
					<th width="5%">NO</th>
					<th width="20%">USERNAME</th>
					<th width="10%">LEVEL</th>
					<th width="10%">AREA OFFICE</th>
					<th width="10%">STATUS</th>
					<th width="10%">HANDPHONE</th>
					<th width="10%">EMAIL</th>
					<th width="10%">AKSI</th>
				</tr>
				</thead>
			<tbody>
				<?php
				$i=0;
				$sql1 = mysql_query ("SELECT * FROM tabel_user");
				while ($hasil1 = mysql_fetch_array($sql1)){
				$i++;
				?>
				<tr height="30">
					<td align="center"><?php echo $i;?></td>
					<td align="left"><?php echo $hasil1['username'];?></td>
					<td align="center"><?php echo $hasil1['level'];?></td>
					<td align="center"><?php echo $hasil1['ao'];?></td>
					<td align="center"><?php echo $hasil1['status'];?></td>
					<td align="center"><?php echo $hasil1['hp'];?></td>
					<td align="center"><?php echo $hasil1['email'];?></td>
					<td align="center">
					<a href="edit_user.sml?username=<?php echo $hasil1['username'];?>"><img src='images/ubah.png' width='12px' title='edit'></a>&nbsp;
					<a href="hapus_user.sml?username=<?php echo $hasil1['username'];?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><img src='images/hapus.png' width='12px' title='hapus'></a>
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
