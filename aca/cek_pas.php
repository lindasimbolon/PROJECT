<?php include "header.php";
?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
		<h4><center><u>PLAN BUDGET PAS</u></center></h4><br>
				<form action="" name="form1" method="post" id="form_combo">
				<table border="1" align="center">
					<tr align="center" height="30" bgcolor="#999999">
						<td width="10%"><b>NO.</b></td>
						<td width="30%"><b>ESTIMASI</b></td>
						<td width="10%"><b>JUMLAH</b></td>
						<td width="10%"><b>HARGA</b></td>
						<td width="10%"><b>PEMBAYARAN</b></td>
						<td width="10%"><b>TANGGAL TTRANSFER</b></td>
						<td width="10%"><b>SUB TOTAL</b></td>
						<td width="5%"><b>AKSI</b></td>
					</tr>
					<?php
					$id_proposal = $_GET['id_proposal'];
					$i = 0 ;
					$cek1 = mysql_query ("SELECT * FROM tabel_estimasi_budget where id_proposal='$id_proposal'");
					while($tampil1 = mysql_fetch_array($cek1)){
					$i++;
					$sub_total = $tampil1['harga_budget'] * $tampil1['jumlah_budget'];
					$jumlah = $jumlah + $sub_total;
					
					?>
					<tr>
						<td align="center"><?php echo $i ;?></td>
						<td align="left"><?php echo $tampil1['keterangan_budget'];?></td>
						<td align="center"><?php echo $tampil1['jumlah_budget'];?></td>
						<td align="right" style="padding-right:5px"><?php echo number_format($tampil1['harga_budget']);?></td>
						<td><?php echo $tampil1['pembayaran'];?></td>
						<td><?php echo tgl_indo($tampil1['tgl_transfer']);?></td>
						<td align="right" style="padding-right:5px"><?php echo number_format($sub_total);?></td>
						<td><a href="edit_estimasi_budget.sml?id_budget=<?php echo $tampil1['id_estimasi_budget'];?>&id_proposal=<?php echo $tampil1['id_proposal'];?>"><img src="images/ubah.png"></a></td>
					</tr>
					<?php } ?>
					<tr>
						<td colspan="6" align="center"><b>TOTAL</b></td>
						<td align="right" style="padding-right:5px"><?php echo number_format($jumlah);?></td>
					</tr>
				</table><br>
				</form>
 <a href="simpan_pas.sml?id=<?php echo $id_proposal;?>" onclick="return confirm('Apakah plan budget sudah benar?, jika sudah benar PAS akan dibuat..')"><input type="submit" value="SIMPAN DAN BUAT PAS"></a>

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
