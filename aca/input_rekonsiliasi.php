<?php include "header.php";?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
		<h3>INPUT LAPORAN REKONSILIASI DANA MARKETING</h3>
		<form action="input_rekonsiliasi_simpan.php" method="POST">
		<table><br>
			<tr align="left" height="30">
				<td colspan="2">SALDO BANK PERTANGGAL</td>
				<td><input type="text" name="saldo" value="" required size="30"></td>
			</tr>
			<tr align="left" height="30">
				<td colspan="2">1. PERINCIAN PENERIMAAN:</td>
			</tr>
			<tr  align="left" height="30">
				<td width="50"></td>
				<td width="300">A. DANA LAIN-LAIN</td>
				<td></td>
			</tr>
			<tr  align="left" height="30">
				<td width="50"></td>
				<td width="200">1. SALDO AWAL BANK MARKETING</td>
				<td><input type="text" name="awal"></td>
			</tr>
			<tr  align="left" height="30">
				<td width="50"></td>
				<td width="200">2. PENDAPATAN JASA GIRO</td>
				<td><input type="text" name="jasa"></td>
			</tr>
			<tr  align="left" height="30">
				<td width="50"></td>
				<td width="200">3. BIAYA BANK</td>
				<td><input type="text" name="biaya_bank"></td>
			</tr>
			<tr  align="left" height="30">
				<td width="50"></td>
				<td width="200">TOTAL</td>
				<td><input type="text" name="total"></td>
			</tr>
			<tr  align="left" height="30">
				<td width="50"></td>
				<td width="200"></td>
				<td></td>
			</tr>
			<tr  align="left" height="30">
				<td width="50"></td>
				<td width="200">B. DANA MARKETING DARI HO</td>
				<td></td>
			</tr>
			<tr  align="left" height="30">
				<td width="50"></td>
				<td width="200">1.</td>
				<td><input type="text" name="1"></td>
			</tr>
			<tr  align="left" height="30">
				<td width="50"></td>
				<td width="200">2.</td>
				<td><input type="text" name="2"></td>
			</tr>
			<tr  align="left" height="30">
				<td width="50"></td>
				<td width="200">TOTAL</td>
				<td><input type="text" name="total"></td>
			</tr>
			<tr  align="left">
				<td></td>
				<td><br></td>
			</tr>
			<tr align="left" height="30">
				<td colspan="2">2. PERINCIAN PENGELUARAN:</td>
			</tr>
			<tr  align="left" height="30">
				<td width="50"></td>
				<td width="300">DANA MARKETING</td>
				<td></td>
			</tr>
			<tr  align="left" height="30">
				<td width="50"></td>
				<td width="200">1. KAS MARKETING TUNAI</td>
				<td><input type="text" name="awal"></td>
			</tr>
			<tr  align="left" height="30">
				<td width="50"></td>
				<td width="200">2</td>
				<td><input type="text" name="jasa"></td>
			</tr>
			
			<tr  align="left" height="30">
				<td width="50"></td>
				<td width="200">TOTAL</td>
				<td><input type="text" name="total"></td>
			</tr>
			<tr  align="left" height="30">
				<td width="50"></td>
				<td width="200"></td>
				<td><input type="text" name="total"></td>
			</tr>
			<tr  align="left">
				<td></td>
				<td><BR></td>
			</tr>
			<tr  align="left" height="30">
				<td></td>
				<td></td>
				<td ><input type="submit" value="Simpan"></td>
			</tr>
		</table>
		</form>

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
