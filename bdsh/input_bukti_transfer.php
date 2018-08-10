<?php include "header.php";?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
		<h4><center><u>INPUT TRANSFER DANA PAS</u></center></h4>
				<form action="input_bukti_transfer_simpan.sml" method="post" enctype="multipart/form-data">
				<table style="color:black;" width="50%" align="center"><br>  
				<?php
				$id_pdm = $_GET['id'];
				$sql = mysql_query("SELECT max(id_bukti_transfer) as kode FROM tabel_bukti_transfer");
				$hasil = mysql_fetch_array($sql);
				$kode = $hasil['kode']+1;
				$cek = mysql_query("SELECT * FROM tabel_pas a,tabel_proposal b,tabel_estimasi_budget c where a.id_proposal=b.id_proposal and b.id_proposal=c.id_proposal and a.id_pas='$id_pdm'");
				$tampil = mysql_fetch_array($cek);
				?>
				<input type="hidden" name="id" value="<?php echo $kode;?>">
				<input type="hidden" name="id_pdm" value="<?php echo $id_pdm;?>">
				<input type="hidden" name="id_pas" value="<?php echo $tampil['id_pas'];?>">
				<tr align="left" height="30">
					<td width="250">NO PAS</td>
					<td><input type="text" name="no_pas" value="<?php echo $tampil['no_pas'];?>" size="30" readonly></td>
				</tr>
				<tr align="left" height="50">
					<td width="150">NILAI DANA</td>
					<td><input type="text" value="Rp. <?php echo number_format($tampil['total_pas']);?>" size="30" readonly></td>
				</tr>
				
				<tr align="left" height="50">
					<td>TANGGAL TRANSFER</td>
					<td><input type="text" name="tanggal_kirim" value="" size="30"  id="brothergiez" required placeholder=" Isi dengan tanggal kirim..">
					</td>
				</tr>
				<tr align="left" height="50">
					<td width="150">JUMLAH DANA TRANSFER</td>
					<td><input type="text" name="jumlah_dana" value="" size="50" required placeholder=" Isi dengan dana yang dikirim.."></td>
				</tr>
				<tr align="left" height="50">
					<td>LAMPIRAN BUKTI TRANSFER</td>
					<td><input type="file" name="file"> <font color="red">*File Lampiran Harus .jpeg</font></td>
				</tr>
				<tr>
					<td><br></td>
				</tr>
				<tr align="left" height="30">
					<td width="150"></td>
					<td><input type="submit" value="Simpan"></td>
				</tr>
				</table>
				</form>


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