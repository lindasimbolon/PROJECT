<?php include "header.php";?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
<link rel="stylesheet" href="css/datatables/datatables.css">
    <style>	
    th.dt-center, td.dt-center 
        { text-align: center; }
    .table-striped tbody tr:nth-child(odd) td,
    .table-striped tbody tr:nth-child(odd) th {
        background-color: #E0E0E0;
    }
    </style>
<div style="padding:3px;overflow:auto;width:auto;height:550px;font-size:10px;">
<h4><center><u>LAPORAN TRANSFER</u></center></h4>
		<table style="color:black;" id="contoh" class="datatable table table-striped table-bordered"><br>
			<thead >  
				<tr height="30" bgcolor="#2e9fd2" style="font-weight:bold;" align="center">
					<th width="10%">NO</th>
					<th width="20%">NO PAS</th>
					<th width="15%">TANGGAL TRANSFER</th>
					<th width="15%">JUMLAH TRANSFER (IDR)</th>
					<th width="15%">FILE</th>
				</tr>
				</thead>
			<tbody>
				<?php
				$i=0;
				$sql1 = mysql_query ("SELECT * FROM tabel_bukti_transfer order by id_bukti_transfer ASC");
				while ($hasil1 = mysql_fetch_array($sql1)){
				$i++;
				?>
				<tr height="30">
					<td align="center"><?php echo $i;?></td>
					<td align="left"><?php echo $hasil1['no_pas'];?></td>
					<td align="center"><?php echo tgl_indo($hasil1['tanggal_kirim']);?></td>
					<td align="right"><?php echo number_format($hasil1['jumlah_dana']);?></td>
					<td align="center"><a href="../f_a/file/<?php echo $hasil1['file'];?>" target="_blank">Lihat File</a></td>
					
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
