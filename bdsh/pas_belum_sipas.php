<?php include "header.php";?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
<div style="padding:3px;overflow:auto;width:auto;height:550px;font-size:10px;">
		<h3>PAS BELUM SIPAS</h3>
		<table style="color:black;" id="contoh">
				<thead >
				<tr bgcolor="#2e9fd2" align="center">
					<th width="5%">#</th>
					<th width="10%" >N0 PAS</th>
					<th width="25%">NAMA PROGRAM</th>
					<th width="10%">AO</th>
					<th width="15%">NAMA CMR</th>
					<th width="15%">ESTIMASI BUDGET (RP)</th>
					<th width="10%">STATUS SIPAS</th>
				</tr>
				</thead>
			<tbody>
				<?php
				
				$i=0;
				$sql1 = mysql_query ("SELECT * FROM tabel_pas a, tabel_ms b, tabel_area c where a.id_ms=b.id_ms and c.id_area=b.id_area and a.sipas_status is null order by no_pas DESC");
				while ($hasil1 = mysql_fetch_array($sql1)){
				$i++;
				
				?>
				<tr height="30">
					<td align="center"><?php echo $i;?></td>
					<td align="left"><?php echo $hasil1['no_pas'];?></td>
					<td align="left"><?php echo $hasil1['program'];?></td>
					<td align="center"><?php echo $hasil1['singkatan'];?></td>
					<td align="center"><?php echo $hasil1['nama_ms'];?></td>
				 	<td align="right"><?php echo number_format($hasil1['total_pas']);?></td>
					<td align="center">BELUM SIPAS</td>
					
				</tr>
				<?php } ?>
				
				</tbody>
			</table> 
</div>

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
