<?php include "header.php";
error_reporting(0);
?>
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
<div style="padding:3px;overflow:auto;width:auto;height:auto;font-size:10px;">
<h3>LAPORAN PAS, TRANSFER, SIPAS</h3>
<p align="left"><a href="../admin/excel_pas_laporan.php" target="_blank"><img src="../administrator/images/excel.png" width="30"> Export to Excel</a></p>
		<table style="color:black;" id="contoh"  width="100%" class="datatable table table-striped table-bordered">
				<thead >
				<tr bgcolor="#2e9fd2" align="center">
					<th width="2%">#</th>
					<th width="13%">N0 PAS</th>
					<th width="26%">NAMA PROGRAM</th>
					<th width="5%">AREA OFFICE</th>
					<th width="10%">DANA PAS (Rp.)</th>
					<th width="10%">DANA TRANSFER (Rp.)</th>
					<th width="10%">REALISASI PAS (Rp.)</th>
					<th width="15%">SISA DANA (Rp.)</th>
					<th width="10%">PENGEMBALIAN DANA (Rp.)</th>
					
				</tr>
				</thead>
			<tbody>
				<?php
				//$ao = $_SESSION['ao'];
				$i=0;
				$sql1 = mysql_query ("SELECT * FROM tabel_ms a, tabel_area b, tabel_pas c, tabel_sipas d
				where c.id_pas=d.id_pas and a.id_ms=c.id_ms and a.id_area=b.id_area and (status_pas='Disetujui' or status_pas='Selesai') order by c.id_pas DESC ");
				//where a.id_cmr=c.id_cmr and a.id_ao=b.id_ao and (status_pas='Disetujui' or status_pas='Selesai' or status_pas = 'Pending') order by c.id_pas DESC ");
				while ($hasil1 = mysql_fetch_array($sql1)){
				
				$i++;
                ?>
				<tr height=30>
					<td align="center"><?php echo $i;?></td>
					<td align="left"><?php echo $hasil1['no_pas'];?></td>
					<td align="left"><?php echo $hasil1['program'];?></td>
					<td align="center"><?php echo $hasil1['singkatan'];?></td>
					<td align="right"><?php echo number_format($hasil1['total_pas']);?></td>
					
					<!-- TOTAL PDM -->
					<td align="right">
						<?php
						//$coba1= mysql_query ("select * from tabel_pdm where id_pas='$hasil1[id_pas]' and status_pdm='Disetujui'");
						//$coba1= mysql_query ("select * from tabel_bukti_transfer a, tabel_pas b where a.no_pas='$hasil1[no_pas]' and a.no_pas=b.no_pas and b.status_pas='Disetujui'");
						$coba1= mysql_query ("SELECT * FROM `tabel_pas` LEFT JOIN `tabel_bukti_transfer` ON `tabel_bukti_transfer`.no_pas=`tabel_pas`.no_pas where `tabel_pas`.id_pas='$hasil1[id_pas]'");
						while($pdma= mysql_fetch_array($coba1)){
						//$pdm1+=$pdm['total_pdm'];
						$pdmab+=$pdma['jumlah_dana'];
						?>
						<?php echo number_format($pdma['jumlah_dana']);?>
						<?php } ?>
					</td>
					
					<!-- TOTAL SIPAS -->
					<td align="right">
						<?php
						$coba= mysql_query ("select sum(subtotal) as total from tabel_sipas a, tabel_sipas_detail b where a.id_sipas=b.id_sipas and a.id_pas='$hasil1[id_pas]'");
						while($sipas= mysql_fetch_array($coba)){
						$sipas1+=$sipas['total'];
						?>
						<?php echo number_format($sipas['total']);?>
						<?php } ?>
					</td>
					
					<!-- SISA DANA -->
					<td align="right">
						<?php
						//$coba1= mysql_query ("SELECT * FROM `tabel_pas` LEFT JOIN `tabel_bukti_transfer` ON `tabel_bukti_transfer`.no_pas=`tabel_pas`.`no_pas` LEFT JOIN `tabel_sipas` ON `tabel_sipas`.id_pas=`tabel_pas`.`id_pas` LEFT JOIN `tabel_sipas_detail` ON `tabel_sipas`.id_sipas=`tabel_sipas_detail`.`id_sipas` LEFT JOIN `tabel_pengembalian` ON `tabel_sipas`.`id_sipas`=`tabel_pengembalian`.`id_sipas` where `tabel_pas`.id_pas='$hasil1[id_pas]'");
						$querysisadana=mysql_query("SELECT `tabel_pas`.`id_pas`, `tabel_pas`.`no_pas`, `tabel_bukti_transfer`.`jumlah_dana`, sum(`tabel_sipas_detail`.`subtotal`) as `subtotal` FROM `tabel_pas` LEFT JOIN `tabel_bukti_transfer` ON `tabel_bukti_transfer`.no_pas=`tabel_pas`.`no_pas` LEFT JOIN `tabel_sipas` ON `tabel_sipas`.id_pas=`tabel_pas`.`id_pas` LEFT JOIN `tabel_sipas_detail` ON `tabel_sipas`.id_sipas=`tabel_sipas_detail`.`id_sipas` LEFT JOIN `tabel_pengembalian` ON `tabel_sipas`.`id_sipas`=`tabel_pengembalian`.`id_sipas` where `tabel_pas`.id_pas='$hasil1[id_pas]' group by `tabel_bukti_transfer`.jumlah_dana ASC");
						while($sisadana= mysql_fetch_array($querysisadana)){
						$total1=$sisadana['subtotal'];
						$total2=$sisadana['jumlah_dana'];
						$total5=$total2-$total1;
						$total6+=$total2-$total1;
						?>
						<?php echo number_format($total5);?>
						<?php } ?>
					</td>
				
					<!-- PENGEMBALIAN KE FINANCE -->
					<td align="right">
						<?php
						$coba1= mysql_query ("SELECT `tabel_pas`.`id_pas`, `tabel_pas`.`no_pas`, `tabel_bukti_transfer`.`jumlah_dana`, sum(`tabel_sipas_detail`.`subtotal`) as `subtotal`, `tabel_pengembalian`.jumlah_pengembalian FROM `tabel_pas` LEFT JOIN `tabel_bukti_transfer` ON `tabel_bukti_transfer`.no_pas=`tabel_pas`.`no_pas` LEFT JOIN `tabel_sipas` ON `tabel_sipas`.id_pas=`tabel_pas`.`id_pas` LEFT JOIN `tabel_sipas_detail` ON `tabel_sipas`.id_sipas=`tabel_sipas_detail`.`id_sipas` LEFT JOIN `tabel_pengembalian` ON `tabel_sipas`.`id_sipas`=`tabel_pengembalian`.`id_sipas` where `tabel_pas`.id_pas='$hasil1[id_pas]' group by `tabel_bukti_transfer`.jumlah_dana ASC");
						while($pdmb= mysql_fetch_array($coba1)){
						$pdm1a+=$pdmb['jumlah_pengembalian'];
						?>
						<?php echo number_format($pdmb['jumlah_pengembalian']);?>
						<?php } ?>
					</td>
					
					
				</tr>
				<?php } ?>
				</tbody>
				<tfoot>
				<tr  align="right">
					<td colspan="4" bgcolor="#923611" align="right"><b>TOTAL BIAYA</b></td>
					<td bgcolor="#2e9fd2" align="right"> <?php echo number_format($pdmab);?></td>
					<td bgcolor="#2e9fd2" align="right"> <?php echo number_format($sipas1);?></td>
					<td bgcolor="#2e9fd2" align="right"> <?php echo number_format($total6);?></td>
					<td bgcolor="#2e9fd2" width="10%" align="right"> <?php echo number_format($total5);?></td>
					<td bgcolor="#2e9fd2" width="10%" align="right"> <?php echo number_format($pdm1a);?></td>
					
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


<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script><!-- -->
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
