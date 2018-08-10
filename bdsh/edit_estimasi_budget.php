<?php include "header.php";?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
		<h4><center><u>ISI PLAN BUDGET</u></center></h4><br>
			
				<?php
				$id_budget 		= $_GET['id_budget'];
				$id_proposal	= $_GET['id_proposal'];
				$sql 			= mysql_query("SELECT * FROM tabel_estimasi_budget WHERE id_estimasi_budget='$id_budget'");
				$sql1			= mysql_query("SELECT * FROM tabel_proposal WHERE id_proposal='$id_proposal'");
				$hasil 			= mysql_fetch_array($sql);
				$hasil1			= mysql_fetch_array($sql1);
				?>
				<table align="center" width="40%">
				<form action="" name="form1" method="POST" id="form_combo">
				<input type="hidden" name="id_budget"   value="<?php echo $id_budget;?>">
				<input type="hidden" name="id_proposal" value="<?php echo $id_proposal;?>">
				<tr height="30">
					<td align="left" width="250"><b>NAMA PROGRAM</b></td>
					<td align="left">: <?php echo $hasil1['nama_program'];?></td>
				</tr>
				<tr height="30">
					<td align="left" width="160"><b>TANGGAL PELAKSANAAN</b></td>
					<td align="left">: <?php 
										if($hasil1['akhir_pelaksanaan']<>""){
										echo tgl_indo($hasil1['mulai_pelaksanaan']).' s/d '.tgl_indo($hasil1['akhir_pelaksanaan']);
										}else{
										echo tgl_indo($hasil1['mulai_pelaksanaan']);
										}
									?>
					</td>
				</tr>
				<tr>
					<td><br><br></td>
				</tr>
				<tr height="30">
					<td align="left" width="160"><b>KETERANGAN BUDGET</b></td>
					<td align="left">: <?php echo $hasil['keterangan_budget'];?></td>
				</tr>
				<tr height="30">
					<td align="left"><b>JUMLAH</b></td>
					<td align="left">: <?php echo $hasil['jumlah_budget'];?></td>
				</tr>
				<tr height="30">
					<td align="left"><b>HARGA</b></td>
					<td align="left">: <?php echo number_format($hasil['harga_budget']);?></td>
				</tr>
				
				<?php if($hasil['pph']>0){
				$bagi = explode("-",$hasil['pph']);
				$pajak = $bagi[0];
				$jenis = $bagi[1]
				?>
				<tr height="30">
					<td align="left"><b><?php echo $jenis;?></b></td>
					<td align="left">:
					<?php 
					if($hasil['hari_budget']>=1){	
						$biaya 	= ($hasil['harga_budget']*$hasil['jumlah_budget']*$hasil['hari_budget']);
						if($jenis=="PPh"){
						$pph	= (($biaya * 100) / (100-$pajak))- $biaya ;
						}else{
						$pph	= $biaya / $pajak;
						}
						echo number_format($pph);
					}else{
						$biaya 	= ($hasil['harga_budget']*$hasil['jumlah_budget']);
						if($jenis=="PPh"){
						$pph	= (($biaya * 100) / (100-$pajak))- $biaya ;
						}else{
						$pph	= $biaya / $pajak;
						}
						echo number_format($pph);
					}
					?></td>
				</tr>
				<?php } ?>
				<?php if($hasil['ppn']>0){
				$bagi1 = explode("-",$hasil['ppn']);
				$pajak1 = $bagi1[0];
				?>
				<tr height="30">
					<td align="left"><b>PPN</b></td>
					<td align="left">:
					<?php 
					$biaya1 = ($hasil['harga_budget']*$hasil['jumlah_budget']);
					$ppn	= $biaya1/$pajak1 ;
					
					echo number_format($ppn);
					?></td>
				</tr>
				<?php } ?>
				<tr height="30">
					<td align="left"><b>TOTAL</b></td>
					<td align="left">: <?php echo number_format(($hasil['harga_budget']*$hasil['jumlah_budget'])+$pph+$ppn);?></td>
				</tr>
				<tr>
					<td><br></td>
				</tr>
				<tr height="30">
					<td align="left"><b>TANGGAL TRANSFER</b></td>
					<td align="left">: <input type="text" value="<?php echo $hasil['tgl_transfer'];?>" name="tanggal" id="waktu2" required></td>
				</tr>
				<tr height="30">
					<td align="left" width="180"><b>TIPE PEMBAYARAN</b></td>
					<td align="left">: <select name="tipe" required>
					    	<option value=""selected>[Pilih Tipe Pembayaran]</option>
					    	<option value="Pembayaran AO">Pembayaran AO</option>
							<option value="Pembayaran HO">Pembayaran HO</option>
					    </select>
					</td>
				</tr>
				<tr>
					<td><br></td>
				</tr>
				<tr height="30">
					<td></td>
					<td align="left"><input type="submit" name="simpan" value="SIMPAN"></form> <a href="javascript:history.back()"><input type="submit" value="KEMBALI"></a></td>
				</tr>
				</table>

				
<?php
$id_proposal 	= $_POST['id_proposal'];
$id_budget	= $_POST['id_budget'];
$tipe		= $_POST['tipe'];
$tanggal	= $_POST['tanggal'];

if(isset($_POST['simpan'])){
$cek 		= mysql_query("SELECT MONTH(mulai_pelaksanaan) AS bulan_awal, DAY(mulai_pelaksanaan) AS tgl_awal, YEAR(mulai_pelaksanaan) AS tahun_awal,
                           MONTH(akhir_pelaksanaan) AS bulan_akhir, DAY(akhir_pelaksanaan) AS tgl_akhir, YEAR(akhir_pelaksanaan) AS tahun_akhir
                           FROM tabel_proposal WHERE id_proposal='$id_proposal'");
$hasil_cek	= mysql_fetch_array($cek);
$bulan 	= $hasil_cek['bulan_awal'];
$tgl	= $hasil_cek['tgl_awal'];
$tahun	= $hasil_cek['tahun_awal'];

$bulan_akhir = $hasil_cek['bulan_akhir'];
$tgl_akhir	 = $hasil_cek['tgl_akhir'];
$tahun_akhir = $hasil_cek['tahun_akhir'];
	
	if($tgl_akhir<>""){
		$awal        = mktime(0,0,0,$bulan,$tgl-7,$tahun);
		$awal1       = date("Y-m-d", $awal);

		$akhir        = mktime(0,0,0,$bulan_akhir,$tgl_akhir-3,$tahun);
		$akhir1       = date("Y-m-d", $akhir);

		if(($tanggal>=$awal1) and ($tanggal<=$akhir1)){
			$sql = mysql_query ("UPDATE tabel_estimasi_budget SET `pembayaran` = '$tipe', `tgl_transfer` = '$tanggal' WHERE `tabel_estimasi_budget`.`id_estimasi_budget` = '$id_budget'");

			if($sql){
			echo "<script>alert('Data sudah tersimpan..')
			location.href='cek_pas.php?id_proposal=$id_proposal'</script>";
			}else{
			echo "<script>alert('Data gagal disimpan, silakan ulangi proses..')
			location.href='edit_estimasi_budget.sml?id_budget=$id_budget&id_proposal=$id_proposal'</script>";
			}
		}else{
			echo "<script>alert('Tanggal dibutuhkan PDM minimal H-7 sebelum awal program dan maksimal h-3 sebelum akhir program..')
			location.href='edit_estimasi_budget.sml?id_budget=$id_budget&id_proposal=$id_proposal'</script>";
		}
	}else{
		$awal        = mktime(0,0,0,$bulan,$tgl-7,$tahun);
		$awal1       = date("Y-m-d", $awal);

		$akhir        = mktime(0,0,0,$bulan,$tgl-3,$tahun);
		$akhir1       = date("Y-m-d", $akhir);

		if(($tanggal>=$awal1) and ($tanggal<=$akhir1)){
			$sql = mysql_query ("UPDATE tabel_estimasi_budget SET `pembayaran` = '$tipe', `tgl_transfer` = '$tanggal' WHERE `tabel_estimasi_budget`.`id_estimasi_budget` = '$id_budget'");

				if($sql){
				echo "<script>alert('Data sudah tersimpan..')
				location.href='cek_pas.php?id_proposal=$id_proposal'</script>";
				}else{
				echo "<script>alert('Data gagal disimpan, silakan ulangi proses..')
				location.href='edit_estimasi_budget.sml?id_budget=$id_budget&id_proposal=$id_proposal'</script>";
				}
		}else{
			echo "<script>alert('Tanggal dibutuhkan PDM minimal H-7 sebelum awal program dan maksimal h-3 sebelum akhir program..')
			location.href='edit_estimasi_budget.sml?id_budget=$id_budget&id_proposal=$id_proposal'</script>";
		}
	}
	
}
?>

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
