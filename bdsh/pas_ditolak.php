<?php include "header.php";?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
<link rel="stylesheet" href="css/datatables/datatables.css">
    <style>
    .table-striped tbody tr:nth-child(odd) td,
    .table-striped tbody tr:nth-child(odd) th {
        background-color: #E0E0E0;
    }
    </style>
<div style="padding:3px;overflow:auto;width:auto;height:550px;">
<h3><b>PAS DITOLAK</b></h3>
<div style="font-size:10px;">
<!--
<p align="left"><a href="excel_pas_ditolak.php" target="_blank"><img src="images/excel.png" width="30"> Export to Excel</a></p>
-->
		<table style="color:black;" id="contoh" class="datatable table table-striped">
				<thead >
				<tr bgcolor="#2e9fd2" align="center" style="color:white;">
					<th rowspan="2" width="3%">#</th>
					<th rowspan="2" width="10%" >N0 PAS</th>
					<th rowspan="2" width="20%">NAMA PROGRAM</th>
					<th colspan="2" style="border-left:1px solid black">CREATE BY</th>
					<th colspan="8" style="border-left:1px solid black">REVIEW</th>
					<th colspan="2" style="border-left:1px solid black">APPROVAL</th>
					<th rowspan="2" style="border-left:1px solid black" width="5%">KOMENTAR</th>
					<th rowspan="2" width="5%">DETAIL</th>
				</tr>
				<tr bgcolor="#2e9fd2" align="center" style="color:white;">
					<th width="3%" style="border-left:1px solid black">AM</th>
					<th width="5%">TANGGAL</th>
					<th width="3%" style="border-left:1px solid black">RMS</th>
					<th width="5%">TANGGAL</th>
					<th width="3%" style="border-left:1px solid black">RM</th>
					<th width="4%">TANGGAL</th>
					<th width="3%" style="border-left:1px solid black">BDO</th>
					<th width="4%">TANGGAL</th>
					<th width="40%" style="border-left:1px solid black">HEAD OF ZONE</th>
					<th width="2%">TANGGAL</th>
					<th width="3%" style="border-left:1px solid black">BDM</th>
					<th width="5%">TANGGAL</th>
				</tr>
				</thead>

			<tbody>

				<?php
				$i=0;
				$sql1 = mysql_query ("SELECT * FROM tabel_ms a, tabel_area b, tabel_pas c where a.id_ms=c.id_ms and a.id_area=b.id_area and status_pas ='Ditolak' order by c.no_pas ASC ");
				while ($hasil1 = mysql_fetch_array($sql1)){
				$i++;
				?>

				<tr height="30">
					<td align="center"><?php echo $i;?></td>
					<td align="left"><?php echo $hasil1['no_pas'];?></td>
					<td align="left"><?php echo substr($hasil1['program'],0,30);?> ....</td>
					
					<td align="center" style="border-left:1px solid black">
						<?php 
						if($hasil1['kategori']<>"LOKAL_DIREKSI"){
						if ($hasil1['persetujuan_am']==""){
							echo "<img src='images/minus.png' width='25px' height='25px'>";
						}elseif($hasil1['persetujuan_am']=="Disetujui"){
							echo "<img src='images/check.png' width='25px' height='25px'>";
						}elseif($hasil1['persetujuan_am']=="Direvisi"){
							echo "<img src='images/revisi.gif' width='25px' height='25px'>";
						}else{
							echo "<img src='images/cross.png' width='25px' height='25px'>";
						}
						}
						?>
					</td>
					<td align="center">
						<?php 
						if($hasil1['kategori']<>"LOKAL_DIREKSI"){
							echo tgl_indo($hasil1['tgl_persetujuan_am']);
						}
						?>
					</td>
					<td align="center" style="border-left:1px solid black">
						<?php 
						if($hasil1['kategori']<>"LOKAL_DIREKSI"){
							if ($hasil1['persetujuan_rms']==""){
								echo "<img src='images/minus.png' width='25px' height='25px'>";
							}elseif($hasil1['persetujuan_rms']=="Disetujui"){
								echo "<img src='images/check.png' width='25px' height='25px'>";
							}elseif($hasil1['persetujuan_rms']=="Direvisi"){
								echo "<img src='images/revisi.gif' width='25px' height='25px'>";
							}else{  
								echo "<img src='images/cross.png' width='25px' height='25px'>";
							}
						}
						?>
					</td>
					<td align="center">
						<?php 
							if($hasil1['kategori']<>"LOKAL_DIREKSI"){
							echo tgl_indo($hasil1['tgl_persetujuan_rms']);
							}
						?>
					</td>
					<td align="center" style="border-left:1px solid black">
						<?php 
						if((($hasil1['kategori']<>"PAS_<25")or($hasil1['kategori']<>"PAS_25_50")or($hasil1['kategori']<>"PAS_>50")) and ($hasil1['tgl_pengajuan']>='2017-03-27')){
							if ($hasil1['persetujuan_rm']==""){
								echo "<img src='images/minus.png' width='25px' height='25px'>";
							}elseif($hasil1['persetujuan_rm']=="Disetujui"){
								echo "<img src='images/check.png' width='25px' height='25px'>";
							}elseif($hasil1['persetujuan_rm']=="Direvisi"){
								echo "<img src='images/revisi.gif' width='25px' height='25px'>";
							}else{
								echo "<img src='images/cross.png' width='25px' height='25px'>";
							}
						}
						?>
					</td>
					<td>
						<?php 
						if((($hasil1['kategori']<>"PAS_<25")or($hasil1['kategori']<>"PAS_25_50")or($hasil1['kategori']<>"PAS_>50")) and ($hasil1['tgl_pengajuan']>='2017-03-27')){
							echo tgl_indo($hasil1['tgl_persetujuan_rm']);
						}
						?>
					</td>
					<td align="center" style="border-left:1px solid black">
						<?php 
						if((($hasil1['kategori']<>"PAS_<25")or($hasil1['kategori']<>"PAS_25_50")or($hasil1['kategori']<>"PAS_>50")) and ($hasil1['tgl_pengajuan']>='2017-03-27')){
							if ($hasil1['persetujuan_bdo']==""){
								echo "<img src='images/minus.png' width='25px' height='25px'>";
							}elseif($hasil1['persetujuan_bdo']=="Disetujui"){
								echo "<img src='images/check.png' width='25px' height='25px'>";
							}elseif($hasil1['persetujuan_bdo']=="Direvisi"){
								echo "<img src='images/revisi.gif' width='25px' height='25px'>";
							}else{
								echo "<img src='images/cross.png' width='25px' height='25px'>";
							}
						}
						?>
					</td>
					<td>
						<?php 
						if((($hasil1['kategori']<>"PAS_<25")or($hasil1['kategori']<>"PAS_25_50")or($hasil1['kategori']<>"PAS_>50")) and ($hasil1['tgl_pengajuan']>='2017-03-27')){
							echo tgl_indo($hasil1['tgl_persetujuan_bdo']);
						}
						?>
					</td>
					<td align="center" style="border-left:1px solid black">
						<?php 
							if ($hasil1['persetujuan_head_of_zone']==""){
								echo "<img src='images/minus.png' width='25px' height='25px'>";
							}elseif($hasil1['persetujuan_head_of_zone']=="Disetujui"){
								echo "<img src='images/check.png' width='25px' height='25px'>";
							}elseif($hasil1['persetujuan_head_of_zone']=="Direvisi"){
								echo "<img src='images/revisi.gif' width='25px' height='25px'>";
							}else{ 
								echo "<img src='images/cross.png' width='25px' height='25px'>";
							}
						?>
					</td>
					<td align="center">
						<?php 
							echo tgl_indo($hasil1['tgl_persetujuan_head_of_zone']);
						?>
					</td>
					<td align="center" style="border-left:1px solid black">
						<?php 
							if ($hasil1['persetujuan_bdm']==""){
								echo "<img src='images/minus.png' width='25px' height='25px'>";
							}elseif($hasil1['persetujuan_bdm']=="Disetujui"){
								echo "<img src='images/check.png' width='25px' height='25px'>";
							}elseif($hasil1['persetujuan_bdm']=="Direvisi"){
								echo "<img src='images/revisi.gif' width='25px' height='25px'>";
							}else{
								echo "<img src='images/cross.png' width='25px' height='25px'>";
							}
						?>
					</td>
					<td align="center">
					<?php if(($hasil1['kategori']=="LOKAL_GMO")or($hasil1['kategori']=="LOKAL_DIREKSI")){?>
					<?php echo tgl_indo($hasil1['tgl_disetujui']);?>
					<?php }?>
					</td>
					
					<td align="center" style="border-left:1px solid black"><a href="komentar_pas.sml?id=<?php echo $hasil1['id_pas'];?>">Lihat</a></td>
					<td align="center"><a href="detail_pas_pengajuan_baru<?php if(($hasil1['kategori']=="LOKAL")or($hasil1['kategori']=="LOKAL_RM")or($hasil1['kategori']=="LOKAL_GMO")or($hasil1['kategori']=="LOKAL_DIREKSI")){echo "_lokal";}?>.sml?id=<?php echo $hasil1['id_pas'];?>"><img src="images/detail.png"></a></td>
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
