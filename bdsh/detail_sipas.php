<?php include "header.php";?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
<div>
<?php
$id = $_GET['id'];
$cek = mysql_query("SELECT * FROM tabel_sipas a, tabel_pas b where a.id_pas=b.id_pas and a.id_sipas='$id'");
$tampil = mysql_fetch_array($cek);
?>
<h3>DETAIL SIPAS  <font color='red'><?php echo $tampil['no_pas'];?></font></h3>
		<table align="center" width="70%" border="1"><br>
				<tr bgcolor="#2e9fd2" align="center" height="35">
					<th width="5%">#</th>
					<th width="35%" >KETERANGAN</th>
					<th width="10%">SATUAN/UNIT</th>
					<th width="10%">HARGA/UNIT</th>
					<th width="10%">HARI</th>
					<th width="10%">SUBTOTAL</th>
				</tr>
				</thead>
			<tbody>
				<?php
				$id = $_GET['id'];
				$i=0;
				$sql1 = mysql_query ("SELECT * FROM tabel_sipas a, tabel_pas b, tabel_sipas_detail c where a.id_pas=b.id_pas and a.id_sipas=c.id_sipas and c.id_sipas='$id'");
				while ($hasil1 = mysql_fetch_array($sql1)){
				if(($hasil1['jenis']=="Biaya")or($hasil1['jenis']=="")){
				$all = $all+$hasil1['subtotal'];
				} elseif($hasil1['jenis']=="Pph"){
				$all = $all-$hasil1['subtotal'];
				} 
				$i++;
				?>
				<tr height="30">
					<td align="center"><?php echo $i;?></td>
					<td align="left"><?php echo $hasil1['realisasi'];?></td>
					<td align="center"><?php echo $hasil1['satuan_sipas'];?></td>
					<td align="right"><?php echo number_format($hasil1['jumlah_dsipas']);?></td>
					<td align="center"><?php echo $hasil1['hari_sipas'];?></td>
					<td align="right"><?php echo number_format($hasil1['subtotal']);?></td>
				</tr>
				<?php } ?>
				<tr height="30">
					<td align="center" colspan="5">TOTAL</td>
					<td align="right">Rp. <?php echo number_format($all);?>,-</td>
				</tr>
				<tr>
					<td colspan="6" align="left"><a href="javascript:history.go(-1)"><img src="images/back.png" width="80" height="30"></a></td>
				</tr>
				</tbody>
			</table> 
			
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
