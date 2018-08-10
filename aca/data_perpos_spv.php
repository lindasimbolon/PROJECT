<?php include "header.php";?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
		<h2><b>DATA VALIDASI SUPERVISOR</b></h2>
		<table id="contoh">
			<thead >  
				<tr height="35" bgcolor="#2e9fd2" style="font-weight:bold;" align="center">
				        <th width="5%">NO</th>
				        <th width="5%">AREA OFFICE</th>
				        <th width="10%">CMR</th>
					<th width="20%">NAMA PROGRAM</th>
					<th width="5%">TIPE PROGRAM</th>
					<th width="10%">TANGGAL PROGRAM</th>
					<th width="10%">ESTIMASI BUDGET (IDR)</th>
					<th width="10%">ESTIMASI OMSET (IDR)</th>
					<th width="5%">VALIDASI SPV</th>
					<th width="5%">PERSETUJUAN ASM</th>
					<th width="5%">PERSETUJUAN RPM</th>
					<th width="5%">TANGGAL INPUT</th>
					<th width="5%">ACTION</th>
				</tr>
				</thead>
			<tbody>
				<?php
				$ao = $_SESSION['ao'];
				$i=0;
				$sql1 = mysql_query ("SELECT * FROM tabel_proposal a, tabel_cmr b, tabel_tipe_program c, tabel_ao d
				where a.id_cmr=b.id_cmr and c.id_tipe_program=a.id_tipe_program and d.id_ao=b.id_ao and validasi_spv is null and d.singkatan='$ao'order by a.id_proposal DESC ");
				while ($hasil1 = mysql_fetch_array($sql1)){
				$i++;
				?>
				<tr height="30">
					<td align="center"><?php echo $i;?></td>
					<td align="center"><?php echo $hasil1['singkatan'];?></td>
					<td align="center"><?php echo $hasil1['nama_cmr'];?></td>
					<td align="left">
					<?php echo substr($hasil1['nama_program'],0,20);?> <a href="detail_proposal_spv.sml?id=<?php echo $hasil1['id_proposal'];?>">[....]</a>
					</td>
					<td align="center"><?php echo $hasil1['tipe_program'];?></td>
					<td align="center">
					<?php 
					if($hasil1['akhir_pelaksanaan']<>"0000-00-00"){
					echo tgl_indo($hasil1['mulai_pelaksanaan']).' <b>s/d</b> ' .tgl_indo($hasil1['akhir_pelaksanaan']);
					} else{
					echo tgl_indo($hasil1['mulai_pelaksanaan']);
					}
					?>
					</td>
					<td align="right">
					<?php 
					$cek_budget = mysql_query ("select sum(sub_total_budget) as budget from tabel_estimasi_budget where id_proposal='".$hasil1['id_proposal']."'");
					$budget = mysql_fetch_array($cek_budget);
					echo number_format($budget['budget']);
					?>
					</td>
					<td align="right">
					<?php 
					$cek_omset = mysql_query ("select sum(sub_total_omset) as omset from tabel_estimasi_omset where id_proposal='".$hasil1['id_proposal']."'");
					$omset = mysql_fetch_array($cek_omset);
					echo number_format($omset['omset']);
					?>
					</td>
					<td align="center"><?php if ($hasil1['validasi_spv']==""){ echo Pending;}else { echo $hasil1['validasi_spv'];}?></td>
					<td align="center"><?php if ($hasil1['persetujuan_asm']==""){ echo Pending;}else { echo $hasil1['persetujuan_asm'];}?></td>
					<td align="center"><?php if ($hasil1['persetujuan_rpm']==""){ echo Pending;}else { echo $hasil1['persetujuan_rpm'];}?></td>
					<td align="center"><?php echo tgl_indo($hasil1['tgl_input']);?></td>
					<td align="center">
					<a href="detail_proposal_spv.sml?id=<?php echo $hasil1['id_proposal'];?>"><img src='images/detail.png' width='12px' title='detail'></a>&nbsp;
					
					</td>
				</tr>
				<?php } ?>
					</tbody>


<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script><!-- -->
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
