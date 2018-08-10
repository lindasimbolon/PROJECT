<?php include "header.php";?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
<div style="font-size:11px;">
<h3>DATA SIPAS RO KIRIM</h3>
<!-- <p align="left"><a href="excel_sipas_kro.php" target="_blank"><img src="images/excel.png" width="30"> Export to Excel</a></p> -->
		<table id="contoh">
				<thead >
				<tr bgcolor="#2e9fd2" align="center">
					<th width="3%">#</th>
					<th width="12%" >N0 PAS</th>
					<th width="20%">NAMA PROGRAM</th>
					<th width="5%">AREA OFFICE</th>
					<th width="9%">ESTIMASI BIAYA</th>
					<th width="9%">JUMLAH PDM</th>
					<th width="9%">TOTAL BIAYA SIPAS</th>
					<th width="9%">KEMBALI KE HO</th>
					<th width="9%">TGL KIRIM AO</th>
					<th width="9%">TGL DITERIMA RO</th>
					<th width="9%">TGL KIRIM KE SMN</th>
					<th width="9%">TGL VALID SIPAS</th>
					<th width="9%">TGL PENGGANTIAN</th>
					<th width="7%">STATUS SIPAS</th>
				</tr>
				</thead>
			<tbody>
				<?php
				
				$i=0;
				$ao = $_SESSION['ao'];
				$sql1 = mysql_query ("SELECT * FROM tabel_sipas a, tabel_pas b, tabel_cmr c, tabel_ao d
							WHERE b.id_cmr=c.id_cmr AND c.id_ao=d.id_ao AND a.id_pas=b.id_pas AND a.status_sipas='Pending kirim'  and d.singkatan='$ao'");
				//$sql1 = mysql_query ("SELECT * from tabel_sipas a, tabel_pas b where a.id_pas=b.id_pas and tgl_kirimro<>'' and status_sipas='Pending kirim'");
				while ($hasil1 = mysql_fetch_array($sql1)){
				$sisa = $hasil1['total_pas']-$hasil1['jumlah_sipas'];
				if($sisa<=0){
				$sisa = 0;
				} else {
				$sisa=$sisa;
				}
				$i++;
				
				?>
				<tr height="30">
					<td align="center"><?php echo $i;?></td>
					<td align="left"><?php echo $hasil1['no_pas'];?></td>
					<td align="left"><?php echo $hasil1['program'];?></td>
					<td align="center"><?php echo $hasil1['singkatan'];?></td>
					<td align="right"><?php echo number_format($hasil1['total_pas']);?></td>
					<td align="right">
					<?php
					$coba1= mysql_query ("select * from tabel_pdm where id_pas='$hasil1[id_pas]' and status_pdm='Disetujui'");
					$pdm= mysql_fetch_array($coba1);
					$pdm1+=$pdm['total_pdm'];
					$sisa = $pdm['total_pdm']-$hasil1['jumlah_sipas'];
					if($sisa<=0){
					$sisa = 0;
					} else {
					$sisa=$sisa;
					}
					?>
					<?php echo number_format($pdm['total_pdm']);?></td>
					<td align="right"><!--<a href="detail_sipas.sml?id=<?php echo $hasil1['id_sipas'];?>">!--><?php echo number_format($hasil1['jumlah_sipas']);?></td>
					<td align="right"><?php echo number_format($sisa);?></td>
					<td align="center"><?php echo tgl_indo($hasil1['tgl_kirimao']);?></td>
					<td align="center"><?php echo tgl_indo($hasil1['tgl_terimaro']);?></td>
					<td align="center"><?php echo tgl_indo($hasil1['tgl_kirimro']);?></td>
					<td align="center"></td>
					<td align="center"><?php echo tgl_indo($hasil1['tgl_penggantian']);?></td>
					<td align="center"><?php if($hasil1['status_sipas']=="Disetujui"){echo "Disetujui";}else{echo "Pending";}?></td>
					
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
