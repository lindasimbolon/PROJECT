<?php include "header.php";?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
<div>
<h3>DATA CETAK SIPAS</h3>
		<table style="color:black;" id="contoh">
				<thead >
				<tr bgcolor="#2e9fd2" align="center">
					<th width="3%">#</th>
					<th width="11%">N0 PAS</th>
					<th width="20%">NAMA PROGRAM</th>
					<th width="9%">ESTIMASI BIAYA</th>
					<th width="9%">TOTAL BIAYA SIPAS</th>
					<th width="5%">STATUS SIPAS</th>
					<th width="5%">CETAK</th>
				</tr>
				</thead>
			<tbody>
				<?php
				
				$i=0;
				$sql1 = mysql_query ("SELECT * from tabel_sipas a, tabel_pas b, tabel_ms c, tabel_area d where a.id_pas=b.id_pas and b.id_ms=c.id_ms and c.id_area=d.id_area and tgl_terimaro is null order by b.no_pas DESC");
				while ($hasil1 = mysql_fetch_array($sql1)){
				
				$i++;
				
				?>
				<tr height="30">
					<td align="center"><?php echo $i;?></td>
					<td align="left"><?php echo $hasil1['no_pas'];?></td>
					<td align="left"><?php echo $hasil1['program'];?></td>
					<td align="right"><?php echo number_format($hasil1['total_pas']);?></td>
					
					<td align="right">
					<?php 
					$sipas=mysql_query("SELECT sum(subtotal) as jumlah FROM tabel_sipas_detail where id_sipas='$hasil1[id_sipas]'");
					$tampil=mysql_fetch_array($sipas);
					
					echo number_format($tampil['jumlah']);
					?>
					</td>
					<td align="center"><?php if($hasil1['status_sipas']=="Pending"){echo "Pending";}
					elseif($hasil1['status_sipas']=="Pending RO"){echo "Pending RO";}
					elseif($hasil1['status_sipas']=="Pending Kirim"){echo "Pending Kirim";}
					elseif($hasil1['status_sipas']=="Selesai"){echo "Selesai";}
					elseif($hasil1['status_sipas']=="Sudah Diganti"){echo "Sudah Diganti";}?>
					</td>
					<td><a href="print_sipas.php?id=<?php echo $hasil1['id_sipas'];?>" target="_blank"><input type="submit" value="Cetak"></a></td>
					
				</tr>
				<?php } ?>
				
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
