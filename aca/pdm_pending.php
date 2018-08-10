<?php include "header.php";?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
<div style="padding:3px;overflow:auto;width:auto;height:630px;">
<h3>DATA PDM PENDING / STATUS</h3>
<!--<p align="left"><a href="../administrator/excel_pdm_ao.php?ao=<?php echo $_SESSION[ao];?>" target="_blank"><img src="../administrator/images/excel.png" width="30"> Excport to Excel</a></p> -->
<div style="font-size:8px;">
		<table id="contoh"> 
				<thead >
				<tr bgcolor="#2e9fd2" align="center">
					<th width="3%">#</th>
					<th width="10%" >N0 PAS</th>
					<th width="22%" >NAMA PROGRAM</th>
					<th width="5%">PERSETUJUAN ACA</th>
					<th width="5%">TGL PERSETUJUAN</th>
					<th width="5%">PERSETUJUAN RPM</th>
					<th width="5%">TGL PERSETUJUAN</th>
					<th width="5%">VALIDASI RMA</th>
					<th width="5%">TGL VALIDASI</th>
					<th width="5%">PERSETUJUAN RCA</th>
					<th width="5%">TGL PERSETUJUAN</th>
					<th width="5%">PERSETUJUAN FINANCE</th>
					<th width="5%">TGL PERSETUJUAN</th>
					<th width="5%">PERSETUJUAN DIREKSI</th>
					<th width="5%">TGL PERSETUJUAN</th>
					<th width="5%">STATUS TRANSFER</th>
					<!-- <th width="10%">DETAIL PDM</th> -->
				</tr>
				</thead>
			<tbody>
				<?php
				$ao = $_SESSION['ao'];
				$i=0;
				$sql1 = mysql_query ("SELECT a.status_pdm,a.status_transfer,b.no_pas, b.program, a.persetujuan_aca, a.persetujuan_rpm, a.persetujuan_rma, a.persetujuan_rca, a.persetujuan_finance, a.persetujuan_direksi, a.status_transfer, 
				a.tgl_persetujuan_aca, a.tgl_persetujuan_rpm, a.tgl_persetujuan_rma, a.tgl_persetujuan_rca, a.tgl_persetujuan_finance, a.tgl_persetujuan_direksi FROM tabel_pdm a, tabel_pas b, tabel_cmr c, tabel_ao d where a.id_pas=b.id_pas and b.id_cmr=c.id_cmr and 
				c.id_ao=d.id_ao and d.singkatan='$ao' order by id_pdm DESC");
				while ($hasil1 = mysql_fetch_array($sql1)){
				$i++;
				?>
				<tr height="30">
					<td align="center"><?php echo $i;?></td>
					<td align="left"><?php echo $hasil1['no_pas'];?></td>
					<td align="left"><?php echo substr($hasil1['program'],0,15);?>..</td>
					<td align="center"><?php if ($hasil1['persetujuan_aca']=="Disetujui"){echo "<img src='images/check.png' width='25px' height='25px'>";}elseif ($hasil1['persetujuan_aca']=="Ditolak"){echo "<img src='images/cross.png' width='25px' height='25px'>";}else{echo "<img src='images/minus.png' width='25px' height='25px'>";}?></td>
					<td align="center"><?php echo tgl_indo($hasil1['tgl_persetujuan_aca']);?></td>
					<td align="center"><?php if ($hasil1['persetujuan_rpm']=="Disetujui"){echo "<img src='images/check.png' width='25px' height='25px'>";}elseif ($hasil1['persetujuan_rpm']=="Ditolak"){echo "<img src='images/cross.png' width='25px' height='25px'>";}else{echo "<img src='images/minus.png' width='25px' height='25px'>";}?></td>
					<td align="center"><?php echo tgl_indo($hasil1['tgl_persetujuan_rpm']);?></td>
					<td align="center"><?php if ($hasil1['persetujuan_rma']==""){echo "<img src='images/minus.png' width='25px' height='25px'>";}else{echo "<img src='images/check.png' width='25px' height='25px'>";}?></td>
					<td align="center"><?php echo tgl_indo($hasil1['tgl_persetujuan_rma']);?></td>
					<td align="center"><?php if ($hasil1['persetujuan_rca']=="Disetujui"){echo "<img src='images/check.png' width='25px' height='25px'>";}elseif ($hasil1['persetujuan_rca']=="Ditolak"){echo "<img src='images/cross.png' width='25px' height='25px'>";}else{echo "<img src='images/minus.png' width='25px' height='25px'>";}?></td>
					<td align="center"><?php echo tgl_indo($hasil1['tgl_persetujuan_rca']);?></td>
					<td align="center"><?php if ($hasil1['persetujuan_finance']=="Disetujui"){echo "<img src='images/check.png' width='25px' height='25px'>";}elseif ($hasil1['persetujuan_finance']=="Ditolak"){echo "<img src='images/cross.png' width='25px' height='25px'>";}else{echo "<img src='images/minus.png' width='25px' height='25px'>";}?></td>
					<td align="center"><?php echo tgl_indo($hasil1['tgl_persetujuan_finance']);?></td>
					<td align="center"><?php if ($hasil1['persetujuan_direksi']=="Disetujui"){echo "<img src='images/check.png' width='25px' height='25px'>";}elseif ($hasil1['persetujuan_direksi']=="Ditolak"){echo "<img src='images/cross.png' width='25px' height='25px'>";}else{echo "<img src='images/minus.png' width='25px' height='25px'>";}?></td>
					<td align="center"><?php echo tgl_indo($hasil1['tgl_persetujuan_direksi']);?></td>
					<td align="center">
						<?php 
						if(($hasil1['status_pdm']=="Disetujui")and($hasil1['status_transfer']=="Sudah Ditransfer")){
						echo "Sudah Ditransfer";
						}elseif(($hasil1['status_pdm']=="Disetujui")and($hasil1['status_transfer']=="")){
						echo "Belum Ditransfer";
						}elseif($hasil1['status_pdm']=="Pending"){
						echo "Pending";
						}else{
						echo "-";
						}?>
					</td>
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