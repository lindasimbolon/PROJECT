<?php include "header.php";?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
	<div style="padding:3px;overflow:auto;width:auto;height:auto;font-size:10px;">
	<h3>DATA PENGEMBALIAN SISA PDM</h3>
		<table id="contoh"><br>
			<thead >  
				<tr bgcolor="#2e9fd2" style="font-weight:bold;" align="center">
					<th width="5%"  rowspan="2" width="5%">NO</th>
					<th width="10%" rowspan="2" style="border-left:1px black solid;"><b>NO. PAS</b></th>
					<th width="10%" rowspan="2" style="border-left:1px black solid;"><b>NO. REKENING</b></th>
					<th width="10%"	rowspan="2" style="border-left:1px black solid;"><b>TANGGAL KIRIM</b></th>
					<th width="10%"	rowspan="2" style="border-left:1px black solid;"><b>JUMLAH PENGEMBALIAN</b></th>
					<th colspan="2" style="border-left:1px black solid;"><b>VALIDASI FINANCE</b></th>
					<th width="5%"  rowspan="2" style="border-left:1px black solid;"><b>FILE</b></th>
					<th width="10%"  rowspan="2" style="border-left:1px black solid;"><b>STATUS</b></th>
				</tr>
				<tr bgcolor="#2e9fd2">
					<th width="10%"  style="border-left:1px black solid;"><b>VALIDASI</b></th>
					<th width="10%"  style="border-left:1px black solid;"><b>TANGGAL</b></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$i=0;
				$ao = $_SESSION['ao'];
				$sql1 = mysql_query ("SELECT * FROM tabel_pengembalian a, tabel_sipas b, tabel_pas c where a.id_sipas=b.id_sipas and b.id_pas=c.id_pas and c.no_pas like '%$ao%'");
				while ($hasil1 = mysql_fetch_array($sql1)){
				$i++;
				?>
				<tr height="30">
					<td align="center"><?php echo $i;?></td>
					<td align="left"   style="border-left:1px black solid;"><?php echo $hasil1['no_pas'];?></td>
					<td align="center"   style="border-left:1px black solid;"><?php echo $hasil1['no_rek'];?></td>
					<td align="center"  style="border-left:1px black solid;"><?php echo tgl_indo($hasil1['tgl_kirim']);?></td>
					<td align="right"  style="border-left:1px black solid;"><?php echo number_format($hasil1['jumlah_pengembalian']);?></td>
					<td align="center"  style="border-left:1px black solid;"><?php if($hasil1['validasi_fa']==""){echo "Belum Divalidasi";}else{echo $hasil1['validasi_fa'];}?></td>
					<td align="center"  style="border-left:1px black solid;"><?php echo tgl_indo($hasil1['tgl_validasi']);?></td>
					<td align="center"  style="border-left:1px black solid;"><a href="file/<?php echo $hasil1['file'];?>" target="_blank">Lihat</a></td>
					<td align="center"  style="border-left:1px black solid;"><?php if ($hasil1['status_pengembalian']==""){echo "PENDING";}else{echo $hasil1['status_pengembalian'];}?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>


<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script><!-- -->
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
