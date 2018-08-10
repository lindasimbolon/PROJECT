<?php include "header.php";
?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
		<h4><center><u>EDIT PLAN BUDGET</u></center></h4><br>
				<form action="" name="form1" method="POST" id="form_combo">
				<?php
				$id_budget 	= $_GET['id_budget'];
				$id_proposal	= $_GET['id_proposal'];
				$sql 		= mysql_query("SELECT * FROM tabel_estimasi_budget WHERE id_estimasi_budget='$id_budget'");
				$hasil 		= mysql_fetch_array($sql);
				?>
				<table align="center" width="30%">
				<input type="hidden" name="id_budget" value="<?php echo $id_budget;?>">
				<input type="hidden" name="id_proposal" value="<?php echo $id_proposal;?>">
				<tr height="30">
					<td align="left" width="160"><b>KETERANGAN BUDGET</b></td>
					<td align="left"><?php echo $hasil['keterangan_budget'];?></td>
				</tr>
				<tr height="30">
					<td align="left"><b>JUMLAH</b></td>
					<td align="left"><?php echo $hasil['jumlah_budget'];?></td>
				</tr>
				<tr height="30">
					<td align="left"><b>HARGA</b></td>
					<td align="left"><?php echo number_format($hasil['harga_budget']);?></td>
				</tr>
				<tr height="30">
					<td align="left"><b>TOTAL</b></td>
					<td align="left"><?php echo number_format($hasil['harga_budget']*$hasil['jumlah_budget']);?></td>
				</tr>
				<tr height="30">
					<td align="left"><b>TANGGAL TRANSFER</b></td>
					<td align="left"><input type="text" name="tanggal" id="waktu2"></td>
				</tr>
				<tr height="30">
					<td align="left" width="180"><b>TIPE PEMBAYARAN</b></td>
					<td align="left"><select name="tipe">
					    	<option value=""selected>[Pilih Tipe Pembayaran]</option>
					    	<option value="Pemabayaran HO">Pembayaran HO</option>
					    	<option value="Pemabayaran AO">Pembayaran AO</option>
					    </select>
					</td>
				</tr>
				<tr>
					<td><br></td>
				</tr>
				<tr height="30">
					<td></td>
					<td align="left"><input type="submit" name="simpan" value="SIMPAN"></td>
				</tr>
				</table>
				</form>
				
<?php
$id_proposal 	= $_POST['id_proposal'];
$id_budget	= $_POST['id_budget'];
$tipe		= $_POST['tipe'];
$tanggal	= $_POST['tanggal'];

if(isset($_POST['simpan'])){
$sql = mysql_query ("UPDATE `sml_pas`.`tabel_estimasi_budget` SET `pembayaran` = '$tipe', `tgl_transfer` = '$tanggal' WHERE `tabel_estimasi_budget`.`id_estimasi_budget` = '$id_budget'");

	if($sql){
	echo "<script>alert('Data sudah tersimpan..')
	location.href='cek_pas.php?id_proposal=$id_proposal'</script>";
	}else{
	echo "<script>alert('Data gagal disimpan, silakan ulangi proses..')
	location.href='edit_estimasi_budget.sml?id_budget=$id_budget&id_proposal=$id_proposal'</script>";
	}
}
?>

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
