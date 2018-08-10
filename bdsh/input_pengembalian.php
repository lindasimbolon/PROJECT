<?php include "header.php";?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
		<h4><center><u>INPUT PENGEMBALIAN SISA DANA</u></center></h4><br>
				<form action="input_pengembalian_simpan.sml" method="post" enctype="multipart/form-data" autocomplete="off">
				<table style="color:black;" width="50%" align="center"><br>  
				<tr align="left" height="30">
					<td width="250">NO PAS</td>
					<td><select name="id_sipas" required style="padding:5px">
							<option value="" selected>[Pilih Nomor PAS Sudah SIPAS]</option>
							<?php
								$ao 			= $_SESSION['ao'];
								//$sql			= mysql_query("SELECT d.id_sipas, a.no_pas, sum(b.jumlah_dana - d.subtotal) as sisa FROM tabel_pas a, tabel_bukti_transfer b, tabel_sipas c, 
												 // tabel_sipas_detail d WHERE a.id_pas=b.id_pas and c.id_sipas=d.id_sipas and a.no_pas like '%$ao%' 
												 // GROUP BY a.no_pas");
								//$sql			= mysql_query("SELECT c.id_sipas, a.no_pas, b.jumlah_dana - sum(d.subtotal) as sisa FROM tabel_pas a, tabel_bukti_transfer b, tabel_sipas c, tabel_sipas_detail d WHERE a.id_pas=b.id_pas and a.id_pas=c.id_pas and c.id_sipas=d.id_sipas and a.no_pas like '%$ao%' GROUP BY a.no_pas");
								$sql			= mysql_query("SELECT c.id_sipas, a.no_pas, b.jumlah_dana - sum(d.subtotal) as sisa FROM tabel_pas a, tabel_bukti_transfer b, tabel_sipas c, tabel_sipas_detail d WHERE a.id_pas=b.id_pas and a.id_pas=c.id_pas and c.id_sipas=d.id_sipas GROUP BY a.no_pas");
								while($hasil	= mysql_fetch_array($sql)){
								if($hasil['sisa']>0){
									$cek = mysql_query ("SELECT * FROM tabel_pengembalian where id_sipas='$hasil[id_sipas]'");
									$hasil_cek = mysql_fetch_array($cek);
									if($hasil_cek['id_sipas']==""){
							?>
							<option value="<?php echo $hasil['id_sipas'];?>"><?php echo $hasil['no_pas'];?></option>
							<?php } } } ?>
						</select>
					</td>
				</tr>
				<tr align="left" height="50">
					<td width="150">NO REK TUJUAN</td>
					<td><input type="text" name="no_rek" value="" size="50" placeholder=" Isi dengan no rek_tujuan.." required></td>
				</tr>
				<tr align="left" height="50">
					<td width="150">JUMLAH PENGEMBALIAN</td>
					<td><input type="text"  name="jumlah" size="30" placeholder="Isi dengan jumlah pengembalian" required></td>
				</tr>
				<tr align="left" height="50">
					<td>TANGGAL KIRIM</td>
					<td><input type="text" name="tanggal_kirim" value="" size="30"  id="brothergiez" placeholder="Isi dengan tanggal kirim.." required>
					</td>
				</tr>
				
				<tr align="left" height="50">
					<td>LAMPIRAN BUKTI PENGEMBALIAN DANA</td>
					<td><input type="file" name="file" required> </td>
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