<?php include "header.php";
?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head"><br><br>
<form>
    <table  width="50%" align="center" cellpadding="0" cellspacing="1"  bgcolor="#000" align="left" style="border:0px solid silver;padding:50px;">
		<?php
			$id_proposal= $_GET['id'];
			$cek  = mysql_query ("SELECT * FROM tabel_proposal where id_proposal='$id_proposal'");
			$tampil	= mysql_fetch_array($cek);
			?>
        <tr>
			 <td colspan="3" height="50" align="center"  bgcolor="#000"><font color="white"><h4><b>KOLOM KOMENTAR PERSETUJUAN PROPOSAL</b></h4></font></td>
		</tr>
		<tr>
			 <td  bgcolor="white"></td>
			 <td></td>
			 <td></td>
		</tr>
		<!-- KOMENTAR ASM -->
		<?php
		if($tampil['jenis_proposal']<>"LOKAL_DIREKSI"){
		?>	
		<tr>
			<td align="left">&nbsp;<u><h4><strong>ASM</strong></h4></u></td>
		</tr>
		<tr>
			<td width="3%" align="left"><b>Komentar</b></td>
			<td width="1%">:</td>
			<td width="46%" align="left" height="10"><?php echo $tampil['keterangan_asm'];?></td>
		</tr>
		<tr>
			<td align="left"><b>Tanggal</b></td>
			<td>:</td>
			<td align="left" height="10"><?php echo tgl_indo($tampil['tgl_persetujuan_asm']);?></td>
		</tr>
		<?php } ?>
		<!-- SELESAI KOMENTAR ASM -->	
		<?php
		if(($tampil['jenis_proposal']=="LOKAL_RM")or($tampil['jenis_proposal']=="LOKAL_GMO")or($tampil['jenis_proposal']=="LOKAL_DIREKSI")or($tampil['jenis_proposal']=="PUSAT_KDM")){
		?>		
		<!-- KOMENTAR RMA -->
		<tr>
			<td align="left">&nbsp;<u><h4><strong>RMA</strong></h4></u></td>
		</tr>
		<tr>
			<td width="3%" align="left"><b>Komentar</b></td>
			<td width="1%">:</td>
			<td width="46%" align="left" height="10"><?php echo $tampil['keterangan_rma'];?></td>
		</tr>
		<tr>
			<td align="left"><b>Tanggal</b></td>
			<td>:</td>
			<td align="left" height="10"><?php echo tgl_indo($tampil['tgl_persetujuan_rma']);?></td>
		</tr>
		<?php } ?>
		<!-- SELESAI KOMENTAR RMA -->
		<!-- KOMENTAR RPM -->
		<?php
		if($tampil['jenis_proposal']<>"LOKAL_DIREKSI"){
		?>	
		<tr>
			<td align="left">&nbsp;<u><h4><strong>RPM</strong></h4></u></td>
		</tr>
		<tr>
			<td width="3%" align="left"><b>Komentar</b></td>
			<td width="1%">:</td>
			<td width="46%" align="left" height="10"><?php echo $tampil['keterangan_rpm'];?></td>
		</tr>
		<tr>
			<td align="left"><b>Tanggal</b></td>
			<td>:</td>
			<td align="left" height="10"><?php echo tgl_indo($tampil['tgl_persetujuan_rpm']);?></td>
		</tr>
		<?php } ?>
		<!-- SELESAI KOMENTAR RPM -->
		<?php
		if(($tampil['jenis_proposal']=="PUSAT_KDM")or($tampil['jenis_proposal']=="LOKAL_DIREKSI")){
		?>
		<!-- KOMENTAR RM -->
		<tr>
			<td align="left">&nbsp;<u><h4><strong>RM</strong></h4></u></td>
		</tr>
		<tr>
			<td width="3%" align="left"><b>Komentar</b></td>
			<td width="1%">:</td>
			<td width="46%" align="left" height="10"><?php echo $tampil['keterangan_rm'];?></td>
		</tr>
		<tr>
			<td align="left"><b>Tanggal</b></td>
			<td>:</td>
			<td align="left" height="10"><?php echo tgl_indo($tampil['tgl_persetujuan_rm']);?></td>
		</tr>
		<?php } ?>
		<!-- SELESAI KOMENTAR RM -->
		<tr>
			<td align="left"></td>
			<td></td>
			<td align="right" height="10"><a href="javascript:history.go(-1)"><img src="images/back.png" align="right" width="70" height="40"></a></td>
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