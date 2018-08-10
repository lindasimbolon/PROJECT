<?php include "header.php";?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
<div style="padding:3px;overflow:auto;width:auto;height:550px;">
<h3>PAS DITOLAK</h3>
<div style="font-size:10px;">
<!--
<p align="left"><a href="excel_pas_ditolak.php" target="_blank"><img src="images/excel.png" width="30"> Export to Excel</a></p>
-->
		<table id="contoh">
			<thead >
				<tr bgcolor="#2e9fd2" align="center">
					<th rowspan="2" width="3%">#</th>
					<th rowspan="2" width="10%" >N0 PAS</th>
					<th rowspan="2" width="20%">NAMA PROGRAM</th>
					<th rowspan="2" width="10%">JENIS PAS</th>
					<!--<th colspan="2" style="border-left:1px solid black">VALIDASI</th>-->
					<th colspan="14" style="border-left:1px solid black">PERSETUJUAN</th>
					<th rowspan="2" style="border-left:1px solid black" width="5%">KOMENTAR</th>
					<th rowspan="2" width="5%">DETAIL</th>
				</tr>
				<tr bgcolor="#2e9fd2" align="center">
					<!--
					<th width="5%" style="border-left:1px solid black">SPV</th>
					<th width="5%">TANGGAL</th>
					
					<th width="5%" style="border-left:1px solid black">ACA</th>
					<th width="5%">TANGGAL</th>-->
					<th width="5%" style="border-left:1px solid black">ASM</th>
					<th width="5%">TANGGAL</th>
					<th width="5%" style="border-left:1px solid black">RPM</th>
					<th width="5%">TANGGAL</th>
					<th width="5%" style="border-left:1px solid black">RMA</th>
					<th width="5%">TANGGAL</th>
					<th width="5%" style="border-left:1px solid black">DRM</th>
					<th width="5%">TANGGAL</th>
					<th width="5%" style="border-left:1px solid black">RM</th>
					<th width="5%">TANGGAL</th>
					<th width="5%" style="border-left:1px solid black">SMN</th>
					<th width="5%">TANGGAL</th>
					<th width="5%" style="border-left:1px solid black">KDM</th>
					<th width="5%">TANGGAL</th>
				</tr>
				</thead>

			<tbody>

				<?php
				$i=0;
				$ao = $_SESSION['ao'];
				$sql1 = mysql_query ("SELECT * FROM tabel_cmr a, tabel_ao b, tabel_pas c
						where a.id_cmr=c.id_cmr and a.id_ao=b.id_ao and b.singkatan='$ao' and status_pas ='Ditolak' order by c.no_pas ASC ");
				while ($hasil1 = mysql_fetch_array($sql1)){
				$i++;
				?>

				<tr height="30">
					<td align="center"><?php echo $i;?></td>
					<td align="left"><?php echo $hasil1['no_pas'];?></td>
					<td align="left"><?php echo substr($hasil1['program'],0,30);?> ....</td>
					<td align="center">
						<?php 
						if(($hasil1['kategori']=="PUSAT")or($hasil1['kategori']=="PUSAT_KDM")){
						echo "KDM";
						}else{
						echo "SMN";
						}
						?>
					</td>
					<!--
					<td align="center" style="border-left:1px solid black">
					<?php
					if($hasil1['kategori']=="PUSAT"){
					if ($hasil1['validasi_spv']=="Valid"){echo "<img src='images/check.png' width='25px' height='25px'>";}
					else{echo "<img src='images/minus.png' width='25px' height='25px'>";}
					}
					?>
					</td>
				 	<td align="center">
					<?php 
					if($hasil1['kategori']=="PUSAT"){
					echo tgl_indo($hasil1['tgl_validasi_spv']);
					}
					?>
					
					</td> 
					<td align="center" style="border-left:1px solid black">
						<?php 
						if(($hasil1['kategori']=="PUSAT_KDM")or($hasil1['kategori']=="PUSAT")or($hasil1['kategori']=="LOKAL")){
						if ($hasil1['validasi_aca']=="Valid"){echo "<img src='images/check.png' width='25px' height='25px'>";}
						else{echo "<img src='images/minus.png' width='25px' height='25px'>";}
						}
						?>
					</td>
					<td align="center">
						<?php 
						if(($hasil1['kategori']=="PUSAT_KDM")or($hasil1['kategori']=="PUSAT")or($hasil1['kategori']=="LOKAL")){
							echo tgl_indo($hasil1['tgl_validasi_aca']);
						}
						?>
					</td>-->
					<td align="center" style="border-left:1px solid black">
						<?php 
						if($hasil1['kategori']<>"LOKAL_DIREKSI"){
						if ($hasil1['persetujuan_asm']==""){echo "<img src='images/minus.png' width='25px' height='25px'>";}
						elseif($hasil1['persetujuan_asm']=="Disetujui"){echo "<img src='images/check.png' width='25px' height='25px'>";}
						else{ echo "<img src='images/cross.png' width='25px' height='25px'>";}
						}
						?>
					</td>
					<td align="center">
						<?php 
						if($hasil1['kategori']<>"LOKAL_DIREKSI"){
							echo tgl_indo($hasil1['tgl_persetujuan_asm']);
						}
						?>
					</td>
					<td align="center" style="border-left:1px solid black">
						<?php 
						if($hasil1['kategori']<>"LOKAL_DIREKSI"){
							if ($hasil1['persetujuan_rpm']==""){echo "<img src='images/minus.png' width='25px' height='25px'>";}
							elseif($hasil1['persetujuan_rpm']=="Disetujui"){echo "<img src='images/check.png' width='25px' height='25px'>";}
							else{ echo "<img src='images/cross.png' width='25px' height='25px'>";}
						}
						?>
					</td>
					<td align="center">
						<?php 
							if($hasil1['kategori']<>"LOKAL_DIREKSI"){
							echo tgl_indo($hasil1['tgl_persetujuan_rpm']);
							}
						?>
					</td>
					<td align="center" style="border-left:1px solid black">
						<?php 
						if((($hasil1['kategori']<>"PAS_<25")or($hasil1['kategori']<>"PAS_25_50")or($hasil1['kategori']<>"PAS_>50")) and ($hasil1['tgl_pengajuan']>='2017-03-27')){
							if ($hasil1['persetujuan_rma']==""){echo "<img src='images/minus.png' width='25px' height='25px'>";}
							elseif($hasil1['persetujuan_rma']=="Disetujui"){echo "<img src='images/check.png' width='25px' height='25px'>";}
							else{ echo "<img src='images/cross.png' width='25px' height='25px'>";}
						}
						?>
					</td>
					<td>
						<?php 
						if((($hasil1['kategori']<>"PAS_<25")or($hasil1['kategori']<>"PAS_25_50")or($hasil1['kategori']<>"PAS_>50")) and ($hasil1['tgl_pengajuan']>='2017-03-27')){
							echo tgl_indo($hasil1['tgl_persetujuan_rma']);
						}
						?>
					</td>
					<td align="center" style="border-left:1px solid black">
						<?php 
						if((($hasil1['kategori']<>"PAS_<25")or($hasil1['kategori']<>"PAS_25_50")or($hasil1['kategori']<>"PAS_>50")) and ($hasil1['tgl_pengajuan']>='2017-03-27')){
							if ($hasil1['persetujuan_drm']==""){echo "<img src='images/minus.png' width='25px' height='25px'>";}
							elseif($hasil1['persetujuan_drm']=="Disetujui"){echo "<img src='images/check.png' width='25px' height='25px'>";}
							else{ echo "<img src='images/cross.png' width='25px' height='25px'>";}
						}
						?>
					</td>
					<td>
						<?php 
						if((($hasil1['kategori']<>"PAS_<25")or($hasil1['kategori']<>"PAS_25_50")or($hasil1['kategori']<>"PAS_>50")) and ($hasil1['tgl_pengajuan']>='2017-03-27')){
							echo tgl_indo($hasil1['tgl_persetujuan_drm']);
						}
						?>
					</td>
					<td align="center" style="border-left:1px solid black">
						<?php 
							if ($hasil1['persetujuan_rm']==""){echo "<img src='images/minus.png' width='25px' height='25px'>";}
							elseif($hasil1['persetujuan_rm']=="Disetujui"){echo "<img src='images/check.png' width='25px' height='25px'>";}
							else{ echo "<img src='images/cross.png' width='25px' height='25px'>";}
						?>
					</td>
					<td align="center">
						<?php 
							echo tgl_indo($hasil1['tgl_persetujuan_rm']);
						?>
					</td>
					<td align="center" style="border-left:1px solid black">
						<?php if(($hasil1['kategori']=="LOKAL_GMO")or($hasil1['kategori']=="LOKAL_DIREKSI")){?>
							<?php if(($hasil1['kategori']=="LOKAL_GMO")or($hasil1['kategori']=="LOKAL_DIREKSI")){
							if (($hasil1['status_pas']=="Pending")or($hasil1['status_pas']=="")){echo "<img src='images/minus.png' width='25px' height='25px'>";}
							elseif($hasil1['status_pas']=="Disetujui"){echo "<img src='images/check.png' width='25px' height='25px'>";}
							elseif($hasil1['berita_ditolak']<>""){ echo "<img src='images/cross.png' width='25px' height='25px'>";}
						}?>
						<?php }?>
					</td>
					<td align="center">
					<?php if(($hasil1['kategori']=="LOKAL_GMO")or($hasil1['kategori']=="LOKAL_DIREKSI")){?>
					<?php echo tgl_indo($hasil1['tgl_disetujui']);?>
					<?php }?>
					</td>
					<td align="center" style="border-left:1px solid black">
						<?php if(($hasil1['kategori']=="PUSAT")or($hasil1['kategori']=="PUSAT_KDM")){?>
							<?php if(($hasil1['kategori']=="LOKAL_GMO")or($hasil1['kategori']=="LOKAL_DIREKSI")){
							if (($hasil1['status_pas']=="Pending")or($hasil1['status_pas']=="")){echo "<img src='images/minus.png' width='25px' height='25px'>";}
							elseif($hasil1['status_pas']=="Disetujui"){echo "<img src='images/check.png' width='25px' height='25px'>";}
							elseif($hasil1['berita_ditolak']<>""){ echo "<img src='images/cross.png' width='25px' height='25px'>";}
						}?>
						<?php }?>
					</td>
					<td align="center">
					<?php if(($hasil1['kategori']=="PUSAT")or($hasil1['kategori']=="PUSAT_KDM")){?>
					<?php echo tgl_indo($hasil1['tgl_disetujui']);?>
					<?php }?>
					</td>
					<td align="center" style="border-left:1px solid black"><a href="komentar_pas.sml?id=<?php echo $hasil1['id_pas'];?>">Lihat</a></td>
					<td align="center"><a href="detail_pas_pengajuan<?php if(($hasil1['kategori']=="LOKAL")or($hasil1['kategori']=="LOKAL_RM")or($hasil1['kategori']=="LOKAL_GMO")or($hasil1['kategori']=="LOKAL_DIREKSI")){echo "_lokal";}?>.sml?id=<?php echo $hasil1['id_pas'];?>"><img src="images/detail.png"></a></td>
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
