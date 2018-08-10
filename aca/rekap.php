<?php include "header.php";?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
<div style="font-size:12px;">
<h3>LAPORAN PAS, PDM, SIPAS DAN PENGGANTIAN DANA</h3>
<p align="left"><a href="excel_pas_sipas_penggantian.php" target="_blank"><img src="images/excel.png" width="30"> Export to Excel</a></p>
		<table id="contoh"  width="100%">
				<thead >
				<tr bgcolor="#2e9fd2" align="center">
					<th width="2%">#</th>
					<th width="13%">N0 PAS</th>
					<th width="26%">NAMA PROGRAM</th>
					<th width="14%">TGL PELAKSANAAN</th>
					<th width="9%">NAMA CMR</th>
					<th width="5%">AREA OFFICE</th>
					<th width="10%">ESTIMASI BIAYA (Rp.)</th>
					<th width="10%">PERMINTAAN DANA MARKETING (Rp.)</th>
					<th width="10%">REALISASI PAS (Rp.)</th>
					<th width="10%">PENGGANTIAN DANA (Rp.)</th>
					<th width="9%">AGING PAS</th>
					
				</tr>
				</thead>
			<tbody>
				<?php
				
				$i=0;
				$sql1 = mysql_query ("SELECT * FROM tabel_cmr a, tabel_ao b, tabel_pas c
				where a.id_cmr=c.id_cmr and a.id_ao=b.id_ao and (status_pas='Disetujui' or status_pas='Selesai') order by c.id_pas DESC ");
				while ($hasil1 = mysql_fetch_array($sql1)){
				$total+=$hasil1['total_pas'];
				$i++;
				?>
				<tr height="30">
					<td align="center"><?php echo $i;?></td>
					<td align="left"><?php echo $hasil1['no_pas'];?></td>
					<td align="left"><?php echo $hasil1['program'];?></td>
					<td align="center"><?php if ($hasil1['tgl_selesai']=="") {echo tgl_indo($hasil1['tgl_pelaksanaan']);}elseif ($hasil1['tgl_selesai']=="0000-00-00") {echo tgl_indo($hasil1['tgl_pelaksanaan']);} else {echo tgl_indo($hasil1['tgl_pelaksanaan']); echo" s/d "; echo tgl_indo($hasil1['tgl_selesai']);}?></td>
					<td align="center"><?php echo $hasil1['nama_cmr'];?></td>
					<td align="center"><?php echo $hasil1['singkatan'];?></td>
					<td align="right"><a href="detail_biaya.sml?id=<?php echo $hasil1['id_pas'];?>"><?php echo number_format($hasil1['total_pas']);?></a></td>
					
					<td align="right">
					<?php
					$coba1= mysql_query ("select * from tabel_pdm where id_pas='$hasil1[id_pas]' and status_pdm='Disetujui'");
					while($pdm= mysql_fetch_array($coba1)){
					$pdm1+=$pdm['total_pdm'];
					?>
					<?php echo number_format($pdm['total_pdm']);?>
					<?php } ?></td>
					
					<td align="right">
					<?php
					$coba= mysql_query ("select * from tabel_sipas where id_pas='$hasil1[id_pas]' and (status_sipas='Selesai' or status_sipas='Sudah Diganti')");
					while($sipas= mysql_fetch_array($coba)){
					$sipas1+=$sipas['jumlah_sipas'];
					?>
					<?php echo number_format($sipas['jumlah_sipas']);?>
					<?php } ?></td>
					
					<td align="right">
					<?php
					$a= mysql_query ("select * from tabel_sipas a, tabel_penggantian b where a.id_sipas=b.id_sipas and a.id_pas='$hasil1[id_pas]' and a.status_sipas='Sudah Diganti'");
					while($b= mysql_fetch_array($a)){
					$b1+=$b['total_penggantian'];
					?>
					<?php echo number_format($b['total_penggantian']);?>
					<?php } ?></td>
					
					<td align="right">
					<?php
					$hari = date('Y-m-d');
					if(($hasil1['tgl_pelaksanaan']>=$hari) or ($hasil1['tgl_selesai']>=$hari)){
					echo "-";
					} else {
						if(($hasil1['tgl_selesai']=="")or($hasil1['tgl_selesai']=="0000-00-00")){
						  $date1=$hasil1['tgl_pelaksanaan'];
						  $date2=date('Y-m-d');
						  $datetime1 = new DateTime($date1);
						  $datetime2 = new DateTime($date2);
						  $difference = $datetime1->diff($datetime2);
						  $angka1= $difference->days; 
						  $angka = $angka1 + 1;
						 	if($hasil1['status_pas']=='Disetujui'){
								echo "$angka Hari";
								} else {
								echo "-";
								}
						 } else {
						  $date1=$hasil1['tgl_selesai'];
						  $date2=date('Y-m-d');
						  $datetime1 = new DateTime($date1);
						  $datetime2 = new DateTime($date2);
						  $difference = $datetime1->diff($datetime2);
						  $angka1= $difference->days; 
						  $angka = $angka1 + 1;
						  	if($hasil1['status_pas']=='Disetujui'){
								echo "$angka Hari";
								} else {
								echo "-";
								}
						 }
					}
					?> 
					</td>
				
				</tr>
				<?php } ?>
				
				</tbody>
				<tfoot>
				<tr  align="right">
					<td colspan="6" bgcolor="#923611" align="right"><b>TOTAL BIAYA</b></td>
					<td bgcolor="#2e9fd2" align="right">Rp. <?php echo number_format($total);?></td>
					<td bgcolor="#2e9fd2" align="right">Rp. <?php echo number_format($pdm1);?></td>
					<td bgcolor="#2e9fd2" align="right">Rp. <?php echo number_format($sipas1);?></td>
					<td bgcolor="#2e9fd2" align="right">Rp. <?php echo number_format($b1);?></td>
					<td bgcolor="#2e9fd2" align="right"></td>
					<!--<td align="right">Rp. <?php echo number_format($sisa1);?></td>-->
				</tr>
				<!--
				<?php
				$sisa=$pdm1-$sipas1;
				if($sisa<=0){
				$sisa = 0;
				} else {
				$sisa = $sisa;
				}
				?>
				<tr  align="right">
					<td colspan="7" bgcolor="#923611" align="right"><b>SISA DANA PDM/BS</b></td>
					<td colspan="2" bgcolor="#2e9fd2" align="right">Rp. <?php echo number_format($sisa);?></td>
				</tr>
				-->
				</tfoot>
			</table> 


<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script><!-- -->
<script src="jquery.dataTables.js"></script>
<script>
$(document).ready(function() {
    $('#contoh').dataTable(); // Menjalankan plugin DataTables pada id contoh. id contoh merupakan tabel yang kita gunakan untuk menampilkan data
} );
</script>
		</div>			
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
