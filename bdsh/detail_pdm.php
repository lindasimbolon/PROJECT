<?php include "header.php";?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
<h3>PERMOHONAN DANA MARKETING</h3>
<?php
$id = $_GET['id'];
$cek1 = mysql_fetch_array(mysql_query("SELECT * FROM tabel_pdm_detail a, tabel_pdm b, tabel_pas c WHERE a.id_pdm=b.id_pdm and b.id_pas=c.id_pas and a.id_pdm='$id'"));
?>
<table width="60%" align="center">
<tr>
	<td><br></td>
</tr>
<tr>
	<td align="left" width="20%">NO. PAS</td>
	<td align="left" width="1%">:</td>
	<td align="left"><?php echo $cek1['no_pas'];?></td>
</tr>
<tr>
	<td align="left" width="20%">NO. PDM</td>
	<td align="left" width="1%">:</td>
	<td align="left"><?php echo $cek1['id_pdm'];?></td>
</tr>
<tr>
	<td align="left" width="20%">TANGGAL DIBUTUHKAN</td>
	<td align="left" width="1%">:</td>
	<td align="left"><?php echo tgl_indo($cek1['tgl_butuh']);?></td>
</tr>
<tr>
	<td><br></td>
</tr>
</table>

		<table width="60%" align="center"  border="1">
		<form action="javascript:history.back()">
			<tr bgcolor="#928753" height="40">
				<td>NO</td>
				<td>KEPERLUAN</td>
				<td>BIAYA</td>
				<td>CATATAN</td>
			</tr>

				<?php
				$id = $_GET['id'];
				$i=0;
				$cek = mysql_query("SELECT * FROM tabel_pdm_detail a, tabel_pdm b, tabel_pas c WHERE a.id_pdm=b.id_pdm and b.id_pas=c.id_pas and a.id_pdm='$id'");
				while ($tampil=mysql_fetch_array($cek)){
				$total = $total + $tampil['jumlah_pdm'];
				$i++;
				?>
			<tr height="30">
				<td><?php echo $i;?></td>
				<td align="left"><?php echo $tampil['keperluan'];?></td>
				<td align="right"><?php echo number_format($tampil['jumlah_pdm']);?>,-</td>
				<td><?php echo $tampil['catatan'];?></td>
			</tr>
			<?php } ?>
			<tr height="30">
				<td colspan="2">TOTAL</td>
				<td align="right">Rp. <?php echo number_format($total);?>,-</td>
				<td></td>
			</tr>
		</table>
		<table width="60%" align="center">
			<tr>
				<td><br></td>
			</tr>
			<tr>
				<td colspan="5" align="left">&nbsp;<input type="submit" value="Kembali"></form>  
				<?php
				if($cek1['status_pdm']=="Disetujui"){
				?>
				<button style="margin-left:5%" onClick="print_d()">Print Document</button>
				<?php } ?>
				</td>
			</tr>
		</table>
		 <script>
				 function print_d(){
				   	window.open("print_pdm.php?id=<?php echo $cek1['id_pdm'];?>","_blank");
				 }
				 </script>
</header>

<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script><!-- -->
<script src="jquery.dataTables.js"></script>
<script>
$(document).ready(function() {
    $('#contoh').dataTable(); // Menjalankan plugin DataTables pada id contoh. id contoh merupakan tabel yang kita gunakan untuk menampilkan data
} );
</script>
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