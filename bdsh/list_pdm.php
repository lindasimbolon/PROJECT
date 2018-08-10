<?php include "header.php";
error_reporting(0);
?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
<h3>LIST INPUT TRANSFER</h3>
<div style="font-size:10px;">
<!--<p align="left"><a href="../administrator/excel_pdm_ao.php?ao=<?php echo $_SESSION[ao];?>" target="_blank"><img src="../administrator/images/excel.png" width="30"> Excport to Excel</a></p> -->
		<table style="color:black;" id="contoh">
				<thead >
				<tr bgcolor="#2e9fd2" align="center">
					<th width="5%">#</th>
					<th width="13%" >N0 PAS</th>
					<th width="20%" >NAMA PROGRAM</th>
					<th width="10%">TGL PENGAJUAN</th>
					<th width="10%">TGL DIBUTUHKAN</th>
					<th width="10%">NILAI DANA</th>
					<th width="10%">UPDATE</th>
					<!-- <th width="10%">DETAIL TRANSFER</th> -->
				</tr>
				</thead>
			<tbody>
				<?php
				
				$i=0;
				$sql1 = mysql_query ("SELECT * FROM tabel_pas a,tabel_proposal b,tabel_estimasi_budget c where a.id_proposal=b.id_proposal and b.id_proposal=c.id_proposal and a.status_pas='Disetujui' and (a.status_transfer='' or a.status_transfer is null) group by a.id_pas order by a.id_pas DESC");
				while ($hasil1 = mysql_fetch_array($sql1)){
				$i++;
				
				?>
				<?php
				//$sql1= mysql_query ("SELECT * FROM tabel_pas.a, table_pdm b WHERE (a.id_pas=b.id_pas or NOT EXISTS (SELECT * FROM tabel_pdm WHERE tabel_pas.id_pas = tabel_pdm.id_pas))");
				//$sql1= mysql_query ("SELECT * FROM tabel_pas, table_pdm WHERE NOT EXISTS (SELECT * FROM tabel_pdm WHERE tabel_pas.id_pas = tabel_pdm.id_pas)");
				?>
				
				<tr height="30">
					<td align="center"><?php echo $i;?></td>
					<td align="center"><?php echo $hasil1['no_pas'];?></td>
					<td align="center"><?php echo $hasil1['program'];?></td>
					<td align="center"><?php echo tgl_indo($hasil1['tgl_pengajuan']);?></td>
					<td align="center"><?php echo tgl_indo($hasil1['tgl_transfer']);?></td>
					<td align="right">Rp. <?php echo number_format($hasil1['total_pas']);?></a></td>
					<td align="center"><a href="input_bukti_transfer.sml?id=<?php echo $hasil1['id_pas'];?>">Transfer</a></td>
					<!-- <td align="center"><a href="detail_pdm.sml?id=<?php echo $hasil1['id_pdm'];?>">Lihat</a></td> -->
					
				</tr>
				<?php } ?>
				
				</tbody>
			</table> 
</div>
</div>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script><!-- -->
<script src="jquery.dataTables.js"></script>
<script>
$(document).ready(function() {
    $('#contoh').dataTable(); // Menjalankan plugin DataTables pada id contoh. id contoh merupakan tabel yang kita gunakan untuk menampilkan data
} );
</script>
<script>
$(document).ready(function() {
    $('#contoh2').dataTable(); // Menjalankan plugin DataTables pada id contoh. id contoh merupakan tabel yang kita gunakan untuk menampilkan data
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
				height: '50',
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