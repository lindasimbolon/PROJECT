<?php include "header.php";
?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
		<h3><center><u>PLAN PENGGUNAAN DANA MARKETING (PDM)</u></center></h3><br>
				<form action="" name="form1" method="post" id="form_combo">
				<table border="1" align="center">
					<tr align="center" height="30" bgcolor="#999999">
						<td width="10%"><b>NO.</b></td>
						<td width="25%"><b>ESTIMASI / ITEM</b></td>
						<?php
						$id_proposal = $_GET['id_proposal'];
						$sql = mysql_fetch_array(mysql_query("SELECT * FROM tabel_proposal WHERE id_proposal='$id_proposal'"));
						if($sql['jenis_proposal']=="PUSAT"){
						?>
						<td width="5%"><b>TITIK</b></td>
						<?php } ?>
						<td width="10%"><b>JUMLAH</b></td>
						<td width="10%"><b>HARGA</b></td>
						
						<td width="10%"><b>TIPE PEMBAYARAN</b></td>
						<td width="10%"><b>TANGGAL TRANSFER</b></td>
						<td width="10%"><b>SUB TOTAL</b></td>
						<td width="5%"><b>AKSI</b></td>
					</tr>
					<?php
					$id_proposal = $_GET['id_proposal'];
					$i = 0 ;
					$cek1 = mysql_query ("SELECT * FROM tabel_estimasi_budget where id_proposal='$id_proposal'");
					while($tampil1 = mysql_fetch_array($cek1)){
					$i++;
					$bagi_pajak = explode("-",$tampil1['pph']);
					$pph	    = $bagi_pajak[0];
					$jenis	    = $bagi_pajak[1];
					
					$bagi_pajak1 	= explode("-",$tampil1['ppn']);
					$ppn	    	= $bagi_pajak1[0];
					$jenis1    		= $bagi_pajak1[1];
					
					if($tampil1['hari_budget']<>""){
					$sub_total = $tampil1['harga_budget'] * $tampil1['jumlah_budget'] * $tampil1['hari_budget'];
					}else{
					$sub_total = $tampil1['harga_budget'] * $tampil1['jumlah_budget'];
					}
					if($jenis=="PPh"){
					$sub_total_pph = (($sub_total* 100) / (100 - $pph)) - $sub_total;
					}else{
					$sub_total_pph = ($sub_total / $pph);
					}
					//perubahan selesai
					
					$jumlah = $jumlah + $sub_total + $sub_total_pph + $sub_total_ppn; 
					
					?>
					<tr>
						<td align="center"><?php echo $i ;?></td>
						<td align="left"><?php echo $tampil1['keterangan_budget'];?></td>
						<?php
						if($sql['jenis_proposal']=="PUSAT"){
						?>
						<td align="center"><?php echo $tampil1['hari_budget'];?></td>
						<?php } ?>
						<td align="center"><?php echo $tampil1['jumlah_budget'];?></td>
						<td align="right" style="padding-right:5px"><?php echo number_format($tampil1['harga_budget']);?></td>
						<td><?php echo $tampil1['pembayaran'];?></td>
						<td><?php echo tgl_indo($tampil1['tgl_transfer']);?></td>
						<td align="right" style="padding-right:5px"><?php echo number_format($sub_total);?></td>
						<td><a href="edit_estimasi_budget.sml?id_budget=<?php echo $tampil1['id_estimasi_budget'];?>&id_proposal=<?php echo $tampil1['id_proposal'];?>"><img src="images/ubah.png"></a></td>
					</tr>
					<?php if($tampil1['pph']>0){ ?>
					<tr>
						<td align="center"></td>
						<td align="left"><?php echo $jenis;?></td>
						<td align="center"></td>
						<td align="center"></td>
						<?php
						if($sql['jenis_proposal']=="PUSAT_KDM"){
						?>
						<td align="center"></td>
						<?php } ?>
						<td align="center"></td>
						<td align="center"></td>
						<td align="right" style="padding-right:5px"><?php echo number_format($sub_total_pph);?></td>
						<td align="center"></td>
					</tr>
					<?php } ?>
					<?php if($tampil1['ppn']>0){ ?>
					<tr>
						<td align="center"></td>
						<td align="left"><?php echo $jenis1;?></td>
						<td align="center"></td>
						<td align="center"></td>
						<?php
						if($sql['jenis_proposal']=="PUSAT_KDM"){
						?>
						<td align="center"><?php echo $tampil1['hari_budget'];?></td>
						<?php } ?>
						<td align="center"></td>
						<td align="center"></td>
						<td align="right" style="padding-right:5px"><?php echo number_format($sub_total_ppn);?></td>
						<td align="center"></td>
					</tr>
					<?php } ?>
					<?php } ?>
					<?php 
					$id_proposal1 = $_GET['id_proposal'];
					$sql1 = mysql_fetch_array(mysql_query("SELECT * FROM tabel_proposal WHERE id_proposal='$id_proposal1'"));
					if($sql1['jenis_proposal']=="PUSAT"){	
					$a=7;
					}else{ 
					$a=6;
					}?>
					<tr>
						<td colspan="<?php echo $a;?>" align="center"><b>TOTAL</b></td>
						<td align="right" style="padding-right:5px"><?php echo number_format($jumlah);?></td>
						<td align="center"></td>
					</tr>
				</table><br>
				</form>
 <a href="simpan_pas.sml?id=<?php echo $id_proposal;?>" onclick="return confirm('Apakah plan budget sudah benar?, jika sudah benar PAS akan dibuat..')"><input type="submit" value="SIMPAN DAN BUAT PAS"></a>&nbsp;&nbsp;
 <a href="javascript:history.back()"><input type="submit" value="KEMBALI"></a>

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