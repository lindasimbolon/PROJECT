<?php include "header.php";?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
<div style="padding:3px;overflow:auto;width:auto;height:550px;">
		<h2><b>DATA PERSETUJUAN PROPOSAL RPM</b></h2>
<div style="font-size:10px;">	
		<table id="contoh">
			<thead>  
				<tr height="35" bgcolor="#2e9fd2" style="font-weight:bold;" align="center">
				    <th width="5%">NO</th>
				    <th width="5%">AREA OFFICE</th>
				    <th width="10%">CMR</th>
					<th width="20%">NAMA PROGRAM</th>
					<th width="10%">PROPOSAL PAS</th>
					<th width="17%">TANGGAL PROGRAM</th>
					<th width="5%">PERSETUJUAN ASM</th>
					<th width="5%">VERIFIKASI RMA</th>
					<th width="5%">PERSETUJUAN RPM</th>
					<th width="5%">PERSETUJUAN RM</th>
					<th width="10%">TANGGAL INPUT</th>
					<th width="5%">ACTION</th>
				</tr>
			</thead>
			<tbody> 
				<?php
				$i=0;
				$regional = $_SESSION['regional'];
				$sql1 = mysql_query ("SELECT * FROM tabel_proposal a, tabel_cmr b, tabel_ao d, tabel_user e	where e.regional=d.regional and a.id_cmr=b.id_cmr and d.id_ao=b.id_ao and 
				persetujuan_rma = 'Disetujui' and persetujuan_rpm is null and e.regional='".$regional."' and ((jenis_proposal='PAS_<25')or (jenis_proposal='PAS_25_50')or (jenis_proposal='PAS_>50')or(jenis_proposal='PUSAT_KDM')) order by a.id_proposal DESC ");
				while ($hasil1 = mysql_fetch_array($sql1)){
				$i++;
				?>
				<tr height="30">
					<td align="center"><?php echo $i;?></td>
					<td align="center"><?php echo $hasil1['singkatan'];?></td>
					<td align="center"><?php echo $hasil1['nama_cmr'];?></td>
					<td align="left"  ><?php echo substr($hasil1['nama_program'],0,20);?> <a href="detail_proposal<?php if(($hasil1['jenis_proposal']=='LOKAL')or($hasil1['jenis_proposal']=='LOKAL_RM')or($hasil1['jenis_proposal']=='LOKAL_GMO')or
					($hasil1['jenis_proposal']=='LOKAL_DIREKSI')){echo "_lokal";}elseif($hasil1['jenis_proposal']=='PUSAT_KDM'){echo "_kdm";}else{echo "_baru";}?>_rpm.sml?id=<?php echo $hasil1['id_proposal'];?>">[....]</a></td>
					<td align="center">
					<?php 
					if (($hasil1['jenis_proposal']=="LOKAL")or($hasil1['jenis_proposal']=="LOKAL_RM")or($hasil1['jenis_proposal']=="LOKAL_GMO")or($hasil1['jenis_proposal']=="LOKAL_DIREKSI")or
						($hasil1['jenis_proposal']=="PAS_<25")or($hasil1['jenis_proposal']=="PAS_25_50")or($hasil1['jenis_proposal']=="PAS_>50")){
					echo "SMN";
					}else {
					echo "KDM";
					}?>
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
					<td align="center"><?php if ($hasil1['persetujuan_asm']==""){echo Pending;}else {echo $hasil1['persetujuan_asm'];}?></td>
					<td align="center"><?php if ($hasil1['persetujuan_rma']==""){echo Pending;}else {echo $hasil1['persetujuan_rma'];}?></td>
					<td align="center"><?php if ($hasil1['persetujuan_rpm']==""){echo Pending;}else {echo $hasil1['persetujuan_rpm'];}?></td>
						<td align="center"><?php if($hasil1['jenis_proposal']=="PUSAT_KDM"){if ($hasil1['persetujuan_rm']==""){ echo Pending;}else { echo $hasil1['persetujuan_rm'];}}?></td>
					<td align="center"><?php echo tgl_indo($hasil1['tgl_input']);?></td>
					<td align="center">
					<a href="detail_proposal<?php if(($hasil1['jenis_proposal']=='LOKAL')or($hasil1['jenis_proposal']=='LOKAL_RM')or($hasil1['jenis_proposal']=='LOKAL_GMO')or
					($hasil1['jenis_proposal']=='LOKAL_DIREKSI')){echo "_lokal";}elseif($hasil1['jenis_proposal']=='PUSAT_KDM'){echo "_kdm";}else{echo "_baru";}?>_rpm.sml?id=<?php echo $hasil1['id_proposal'];?>"><img src='images/detail.png' width='12px' title='detail'></a>&nbsp;
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