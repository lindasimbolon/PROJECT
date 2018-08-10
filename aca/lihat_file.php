<?php include "header.php";?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
	<div style="width:50%;">
		<?php
		$id = $_GET['id'];
		$sql2 = mysql_query ("SELECT * FROM tabel_pas where id_pas='$id'");
		$hasil = mysql_fetch_array($sql2);
		?>
		<h3>BERKAS FILE NO. PAS &nbsp;<font color="blue"><?php echo $hasil['no_pas'];?></font><br>
		NAMA PROGRAM &nbsp;<font color="blue"><?php echo $hasil['program'];?></font></h3>
		<table id="contoh"><br>
				<thead >
				<tr bgcolor="#2e9fd2" align="center">
					<th width="3%">#</th>
					<th width="13%">NAMA FILE</th>
					<th width="22%">FILE</th>
				</tr>
				</thead>
			<tbody> 
				<tr height="30">
					<td align="center">1</td>
					<td align="left">PROPOSAL</td>
					<td align="center"><a href="detail_proposal<?php if(($hasil['kategori']=="LOKAL")or($hasil['kategori']=="LOKAL_RM")or($hasil['kategori']=="LOKAL_GMO")or($hasil['kategori']=="LOKAL_DIREKSI")){echo "_lokal";}
										elseif(($hasil['kategori']=="PAS_<25")or($hasil['kategori']=="PAS_25_50")or($hasil['kategori']=="PAS_>50")){echo "_baru";}?>.sml?id=<?php echo $hasil['id_proposal'];?>">Lihat</a></td>
					
				</tr>
				<tr height="30">
					<td align="center">2</td>
					<td align="left">PAS</td>
					<td align="center"><a href="detail_pas_pengajuan<?php if(($hasil['kategori']=="LOKAL")or($hasil['kategori']=="LOKAL_RM")or($hasil['kategori']=="LOKAL_GMO")or($hasil['kategori']=="LOKAL_DIREKSI")){echo "_lokal";}
										elseif(($hasil['kategori']=="PAS_<25")or($hasil['kategori']=="PAS_25_50")or($hasil['kategori']=="PAS_>50")){echo "_baru";}?>.sml?id=<?php echo $hasil['id_pas'];?>">Lihat</a></td>
					
				</tr>
				<tr height="30">
					<td align="center">3</td>
					<td align="left">KOMENTAR PERSETUJUAN</td>
					<td align="center"><a href="komentar_pas.sml?id=<?php echo $hasil['id_pas'];?>">Lihat</a></td>
					
				</tr>
				<?php if(($hasil['kategori']=="PUSAT")or($hasil['kategori']=="PUSAT_KDM")or($hasil['kategori']=="LOKAL_GMO")or($hasil['kategori']=="LOKAL_DIREKSI")){?>
				<tr height="30">
					<td align="center">4</td>
					<td align="left">EMAIL PERSETUJUAN/IOM</td>
					<td align="center"><?php if ($hasil['file_iom']<>""){ echo "<a href='../administrator/iom/$hasil[file_iom]' target='_blank'>Lihat</a>";} else { echo "Belum Upload";}?></td>
					
				</tr>
				<?php } ?>
				<!--
				<tr height="30">
					<td align="center">5</td>
					<td align="left">DOWNLOAD PAS TANPA TANDA TANGAN</td>
					<td align="center"><a href="print_pas_kosong.sml?id=<?php echo $hasil['id_pas'];?>" target="_blank">Lihat</a></td>
					
				</tr>-->
				</tbody>
			</table>
			<p align="left"><a href="javascript:history.go(-1)"><img src="images/back.png" width="80" height="40"></a></p>
		</div>

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
