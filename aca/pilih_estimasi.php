<?php include "header.php";
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#tutup").click(function(){
        $("#pas").hide();
		$("#tutup").hide();
		$("#lihat").show();
    });
    $("#lihat").click(function(){
        $("#pas").show();
		$("#lihat").hide();
		$("#tutup").show();
    });
});
</script>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
		<h4><center><u>PERMINTAAN DANA MARKETING</u></center></h4><br> 
				<?php
				$id = $_GET['id'];
				$sql1 = mysql_query("SELECT * FROM tabel_pas a, tabel_pdm b where a.id_pas=b.id_pas and b.id_pdm='$id'");
				$hasil1 = mysql_fetch_array($sql1);
				?>
				<form action="form_persetujuan_simpan.sml" method="GET">
				<table width="60%" align="center"><br>  
				<input type="hidden" name="id" value="<?php echo $hasil1['id_pdm'];?>">
				<tr align="left" height="30">
					<td width="200"><b>NO PAS&nbsp;</b></td>
					<td width="60"><input type="text" value="<?php echo $hasil1['no_pas'];?>" size="28" readonly></td>
					<td width="70" align="right"></td>
					<td></td>
				</tr>
				<tr align="left" height="30">
					<td width="200"><b>ESTIMASI BIAYA</b></td>
					<td ><input type="text" value="Rp. <?php echo number_format($hasil1['total_pas']);?>" readonly size="20"></td>
					<td width='200' align="right"><b>SISA PENGAJUAN PDM&nbsp;</b></td>
					<td ><input type="text" value="Rp. <?php echo number_format($hasil1['sisa_pdm']);?>" readonly size="30"></td>
				</tr>
				<tr align="left" height="30">
					<td width="200"><b>NAMA PROGRAM</b></td>
					<td  colspan="3"><input type="text" value="<?php echo $hasil1['program'];?>" readonly size="90"></td>
				</tr>
				<tr>
					<td><br></td>
				</tr> 
				<tr>
					<td><br></td>
				</tr>
				</table>
				<table width="60%" border="1" align="center">
				<?php
				$i=0;
				if($hasil1['id_proposal']<>""){
				?>
				<tr height="30">
					<td width="5px"><b>NO</b></td>
					<td width="25px"><b>KETERANGAN BUDGET</b></td>
					<td width="10px"><b>JUMLAH</b></td>
					<td width="10px"><b>TANGGAL TRANSFER</b></td>
				</tr>
				<!-- dari sini -->
				<?php
				$ao = $_SESSION['ao'];
				$cek_estimasi = mysql_query ("SELECT * FROM tabel_pdm a, tabel_pdm_detail b where a.id_pdm=b.id_pdm and a.id_pdm='$id' and status_pdm='Pending'");
				while($tampil = mysql_fetch_array($cek_estimasi)){
				$i++;
				$total = $total + $tampil['jumlah_pdm'];
				?>
				<tr>
					
					<td><?php echo $i;?></td>
					<td align="left"><?php echo $tampil['keperluan'];?></td>
					<td align="right" style="padding-right:5px"><?php echo number_format($tampil['jumlah_pdm']);?></td>
					<td><?php echo tgl_indo($tampil['tgl_butuh']);?></td>
				</tr>
				
				<?php } ?>
				<tr>
					<td colspan="2">TOTAL PDM</td>
					<td align="right" style="padding-right:5px"><?php echo number_format($total);?></td>
				</tr>
				<?php } ?>
				<!-- sampe sini -->
				</table>
				
				<table width="60%" align="center">
				<tr>
					<td><br></td>
				</tr>
				<tr>
					<td align="left"><input type="submit" value="Persetujuan PDM"> &nbsp;&nbsp;<a href="javascript:history.back()"><img src="images/back.png" width="50px" height="25px"></a></td>
				</tr>
				
				</table>
				</form>
				<table width="60%" align="center">
				<tr>
					<td><br></td>
				</tr>
				<tr>
					<td align="left"><button id="lihat">Lihat PAS</button><button id="tutup" style="display:none">Tutup PAS</button></td>
				</tr>
				<tr>
					<td><br></td>
				</tr>
				</table>
			
			<div id="pas" style="display:none">
			<?php
			$id1 = $hasil1['id_pas'];
			$pas = mysql_fetch_array(mysql_query("SELECT * FROM tabel_pas where id_pas='$id1'"));
			
			if(($pas['kategori']=="LOKAL_RM")or($pas['kategori']=="LOKAL_GMO")or($pas['kategori']=="LOKAL_DIREKSI")or($pas['kategori']=="LOKAL")){
			include "pas_lokal.php";
			}else{
			include "pas_pusat.php";
			}
			?>
			</div>
				
				
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