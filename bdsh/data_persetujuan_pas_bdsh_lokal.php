<?php 
include "header.php";
error_reporting(0);
?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
		<h3><b>PERSETUJUAN PAS</b></h3> 
		<?php //echo $_SESSION['level'];?>
		<div style="padding:3px;overflow:auto;width:auto;height:600px;border:0px solid grey;font-size:10px;">
		<table id="contoh" style="color:black;">
				<thead >
				<tr bgcolor="#2e9fd2" align="center" style="color:white;">
					<th width="3%">#</th>
					<th width="13%" >N0 PAS</th>
					<th width="22%">NAMA PROGRAM</th>
					<th width="15%">TGL PELAKSANAAN</th>
					<th width="10%">NAMA MS</th>
					<th width="5%">AREA OFFICE</th>
					<th width="10%">ESTIMASI BIAYA (Rp)</th>
					<th width="5%">ACTION</th>
				</tr>
				</thead>
			<tbody>
				<?php
				$i=0;
				$sql1 = mysql_query ("SELECT * FROM tabel_ms a, tabel_area b, tabel_pas c where a.id_ms=c.id_ms and a.id_area=b.id_area and persetujuan_am='Disetujui' and persetujuan_rms='Disetujui' and persetujuan_rm='Disetujui' and persetujuan_bdo='Disetujui' and (persetujuan_bdsh is NULL or persetujuan_bdsh='') and status_pas='Pending' order by no_pas DESC");
				while ($hasil1 = mysql_fetch_array($sql1)){
				$i++;
				?>
				<tr height="30">
					<td align="center"><?php echo $i;?></td>
					<td align="left"><?php echo $hasil1['no_pas'];?></td>
					<td align="left"><?php echo $hasil1['program'];?></td>
				 	<td align="center"><?php if (($hasil1['tgl_selesai']=="")or($hasil1['tgl_selesai']=="0000-00-00")) {echo tgl_indo($hasil1['tgl_pelaksanaan']);} else {echo tgl_indo($hasil1['tgl_pelaksanaan']); echo" s/d "; echo tgl_indo($hasil1['tgl_selesai']);}?></td>
					
					<td align="center"><?php echo $hasil1['nama_ms'];?></td>
					<td align="center"><?php echo $hasil1['singkatan'];?></td>
					<td align="right">Rp. <?php echo number_format($hasil1['total_pas']);?></td>
					
					<td align="center">
					<a href="detail_pas_bdsh.sml?id=<?php echo $hasil1['id_pas'];?>"><img src='images/detail.png' width='12px' title='lihat'></a>
					</td>
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