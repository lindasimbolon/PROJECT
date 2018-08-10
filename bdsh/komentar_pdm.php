<?php include "header.php";
?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head"><br><br>
<div style="font-size:10px;">
<form>
    <table  width="50%" align="center" border="1"  cellpadding="0" cellspacing="1"  bgcolor="#000" style="border:0px solid silver;padding:50px;">
		<?php
			$id_pdm= $_GET['id'];
			$cek  = mysql_query ("SELECT * FROM tabel_pdm where id_pdm='$id_pdm'");
			$tampil	= mysql_fetch_array($cek);
			?>
        <tr>
			 <td  height="50" align="center"  bgcolor="#000"><font  color="white">
			 <h4><b>KOLOM KOMENTAR PERSETUJUAN PDM</b></font></td></h4>
		</tr>
		<tr>
			 <td  bgcolor="white"><table width="100%"  border="0" align="center" cellpadding="5"  cellspacing="0">
		</tr>
		<tr>
			<tr>
				<td width="2%" align="left">&nbsp;<u><h4><strong>ACA</strong></h4></u></td>
			</tr>
			<tr>
				<td width="12%" valign="top"><b>Komentar &nbsp;&nbsp; :</td></b>
				<td width="100%" align="left" height="10"><?php echo $tampil['komentar_aca'];?><?php echo tgl_indo($tampil['tgl_persetujuan_aca']);?></td>
			</tr>	
		</tr>
		<tr>
			<tr>
				<td width="2%" align="left">&nbsp;<u><h4><strong>RPM</strong></td></h4></u>
			</tr>
			<tr>
				<td width="12%" valign="top"><b>Komentar &nbsp;&nbsp; :</td></b>
				<td width="100%" align="left" height="10"><?php echo $tampil['keterangan_rpm'];?><?php echo tgl_indo($tampil['tgl_persetujuan_rpm']);?></td>
			</tr>	
		</tr>
		<tr>
			<tr>
				<td width="2%" align="left">&nbsp;<u><h4><strong>RCA</strong></td></h4></u>
			</tr>
			<tr>
				<td width="12%" valign="top"><b>Komentar &nbsp;&nbsp; :</td></b>
				<td width="100%" align="left" height="10"><?php echo $tampil['keterangan_rca'];?><?php echo tgl_indo($tampil['tgl_persetujuan_rca']);?></td>
			</tr>	
		</tr>
		<tr>
			<tr>
				<td width="2%" align="left">&nbsp;<u><h4><strong>FINANCE</strong></td></h4></u>
			</tr>
			<tr>
				<td width="12%" valign="top"><b>Komentar &nbsp;&nbsp; :</td></b>
				<td width="100%" align="left" height="10"><?php echo $tampil['komentar_finance'];?><?php echo tgl_indo($tampil['tgl_persetujuan_finance']);?></td>
			</tr>	
		</tr>
		<tr>
			<tr>
				<td width="2%" align="left">&nbsp;<u><h4><strong>DIREKSI</strong></td></h4></u>
			</tr>
			<tr>
				<td width="12%" valign="top"><b>Komentar &nbsp;&nbsp; :</td></b>
				<td width="80%" align="left" height="10"><?php echo $tampil['komentar_direksi'];?><?php echo tgl_indo($tampil['tgl_persetujuan_direksi']);?><br><br><a href="javascript:history.go(-1)"><img src="images/back.png" align="right" width="80" height="55"></a></td>
					
			</tr>
		</tr>
	</table>
</form>
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