<?php include "header.php";?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
<div style="padding:3px;overflow:auto;width:auto;height:550px;">
<h2><b>PROPOSAL DITOLAK</b></h2>
<div style="font-size:10px;">
		<table id="contoh">
			<thead >  
				<tr height="35" bgcolor="#2e9fd2" style="font-weight:bold;" align="center">
				    <th rowspan="2" width="5%">NO</th>
				    <th rowspan="2" width="5%">AREA OFFICE</th>
				    <th rowspan="2" width="15%">CMR</th>
					<th rowspan="2" width="20%">NAMA PROGRAM</th>
					<th rowspan="2" width="15%">TANGGAL PROGRAM</th>
					<th colspan="2" width="5%" style="border-left:1px solid black;">PERSETUJUAN</th>
					<th colspan="2" width="5%" style="border-left:1px solid black;">VERIFIKASI</th>
					<th colspan="4" width="5%" style="border-left:1px solid black;">PERSETUJUAN</th>
					<th rowspan="2" width="10%" style="border-left:1px solid black;">KOMENTAR</th>
					<th rowspan="2" width="5%" style="border-left:1px solid black;">ACTION</th>
				</tr>
				<tr height="35" bgcolor="#2e9fd2" style="font-weight:bold;" align="center">
				   	<th width="5%" style="border-left:1px solid black">ASM</th>
					<th width="5%">TANGGAL</th>
					<th width="5%" style="border-left:1px solid black">RMA</th>
					<th width="5%">TANGGAL</th>
					<th width="5%" style="border-left:1px solid black;">RPM</th>
					<th width="5%">TANGGAL</th>
					<th width="5%" style="border-left:1px solid black;">RM</th>
					<th width="5%">TANGGAL</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$i=0;
				$ao = $_SESSION['ao'];
				$sql1 = mysql_query ("SELECT * FROM `tabel_proposal` a, tabel_cmr b, tabel_ao c WHERE a.id_cmr=b.id_cmr and 
				b.id_ao=c.id_ao and c.singkatan='$ao' and (`persetujuan_asm` = 'Ditolak' or `persetujuan_rpm`='Ditolak' or `persetujuan_rma` = 'Ditolak' or `persetujuan_rm`='Ditolak') order by a.id_proposal DESC");
				while ($hasil1 = mysql_fetch_array($sql1)){
				$i++;
				?>
				<tr height="30">
					<td align="center"><?php echo $i;?></td>
					<td align="center"><?php echo $hasil1['singkatan'];?></td>
					<td align="center"><?php echo $hasil1['nama_cmr'];?></td>
					<td align="left">
					<?php echo substr($hasil1['nama_program'],0,20);?> <a href="detail_proposal<?php if(($hasil1['jenis_proposal']=='LOKAL')or($hasil1['jenis_proposal']=='LOKAL_RM')or($hasil1['jenis_proposal']=='LOKAL_GMO')or
					($hasil1['jenis_proposal']=='LOKAL_DIREKSI')){echo "_lokal";}elseif($hasil1['jenis_proposal']=='PUSAT_KDM'){echo "_kdm";}?>.sml?id=<?php echo $hasil1['id_proposal'];?>">[...]</a>
					</td>
					<td align="center">
					<?php 
					if($hasil1['akhir_pelaksanaan']<>""){
					echo tgl_indo($hasil1['mulai_pelaksanaan']).' <b>s/d</b> ' .tgl_indo($hasil1['akhir_pelaksanaan']);
					} else{
					echo tgl_indo($hasil1['mulai_pelaksanaan']);
					}
					?>
					</td>
					<!-- ASM -->
					<td align="center" style="border-left:1px solid black;">
						<?php 
						if($hasil1['jenis_proposal']<>"LOKAL_DIREKSI"){
							if($hasil1['persetujuan_asm']=="Ditolak"){ echo "<img src='images/cross.png' width='25px height='25px'>";}
							elseif($hasil1['persetujuan_asm']=="Disetujui"){ echo "<img src='images/check.png' width='25px height='25px'>";}
							else{echo "<img src='images/minus.png' width='25px height='25px'>";}
						}?>
					</td>
					<td align="center">
						<?php 
						if($hasil1['jenis_proposal']<>"LOKAL_DIREKSI"){
						echo tgl_indo($hasil1['tgl_persetujuan_asm']);
						}?>
					</td>
					<!-- RMA -->
					<td align="center" style="border-left:1px solid black;">
					<?php 
					if(($hasil1['jenis_proposal']<>"LOKAL")and($hasil1['jenis_proposal']<>"PUSAT")){
						if($hasil1['persetujuan_rma']=="Ditolak"){ echo "<img src='images/cross.png' width='25px height='25px'>";}
						elseif($hasil1['persetujuan_rma']=="Disetujui"){ echo "<img src='images/check.png' width='25px height='25px'>";}
						else{echo "<img src='images/minus.png' width='25px height='25px'>";
						}
					}
					?></td>
					<td align="center">
					<?php 
					if(($hasil1['jenis_proposal']<>"LOKAL")and($hasil1['jenis_proposal']<>"PUSAT")){echo tgl_indo($hasil1['tgl_persetujuan_rma']);
					}?>
					</td>
					<!-- RPM -->
					<td align="center" style="border-left:1px solid black;">
						<?php 
						if($hasil1['jenis_proposal']<>"LOKAL_DIREKSI"){
							if($hasil1['persetujuan_rpm']=="Ditolak"){ echo "<img src='images/cross.png' width='25px height='25px'>";}
							elseif($hasil1['persetujuan_rpm']=="Disetujui"){ echo "<img src='images/check.png' width='25px height='25px'>";}
							else{echo "<img src='images/minus.png' width='25px height='25px'>";}
						}?>
					</td>
					<td align="center">
						<?php 
						if($hasil1['jenis_proposal']<>"LOKAL_DIREKSI"){
						echo tgl_indo($hasil1['tgl_persetujuan_rpm']);
						}
						?>
					</td>
					<!-- RM -->
					<td align="center" style="border-left:1px solid black;">
						<?php 
						if(($hasil1['jenis_proposal']=="PUSAT_KDM")or($hasil1['jenis_proposal']=="LOKAL_DIREKSI")){
							if ($hasil1['persetujuan_rm']=="Ditolak"){ echo "<img src='images/cross.png' width='25px' height='25px'";}
							elseif ($hasil1['persetujuan_rm']=="Disetujui") { echo "<img src='images/check.png' width='25px' height='25px'";}
							else { echo "<img src='images/minus.png' width='25px' height='25px'";} 
						}?>
					</td>
					<td align="center">
						<?php 
						if(($hasil1['jenis_proposal']=="PUSAT_KDM")or($hasil1['jenis_proposal']=="LOKAL_DIREKSI")){
						echo tgl_indo($hasil1['tgl_persetujuan_rm']);
						} 
						?>
					</td>
					<td align="center" style="border-left:1px solid black;"><a href="komentar_proposal.sml?id=<?php echo $hasil1['id_proposal'];?>">Lihat</a></td>
					<td align="center" style="border-left:1px solid black;">
					
					<a href="detail_proposal<?php if(($hasil1['jenis_proposal']=='LOKAL')or($hasil1['jenis_proposal']=='LOKAL_RM')or($hasil1['jenis_proposal']=='LOKAL_GMO')or
					($hasil1['jenis_proposal']=='LOKAL_DIREKSI')){echo "_lokal";}elseif($hasil1['jenis_proposal']=='PUSAT_KDM'){echo "_kdm";}?>.sml?id=<?php echo $hasil1['id_proposal'];?>"><img src='images/detail.png' width='12px' title='detail'></a>&nbsp;
					<!--<a href="edit_proposal.sml?id=<?php echo $hasil1['id_proposal'];?>"><img src='images/ubah.png' width='12px' title='edit'></a>&nbsp;-->
					
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
