<html>
<?php
include "fungsi_indotgl.php";
include "../koneksi.php";
error_reporting(1);
?>
<head>
<title style="font-size:8px">PAS ONLINE</title>
	<style>
	p{
		line-height:10px;
		text-align: justify; 
	}
	
	</style>
</head>
<body>
<div style="font-family:calibri;font-size:0.7em;">
		<form action="data_proposal.sml" method="POST">
			<?php
			$id_proposal 	= $_GET['id'];
			$cek 		= mysql_query ("SELECT * FROM tabel_proposal a, tabel_cmr b, tabel_tipe_program c, tabel_ao d, tabel_jenis_program e where a.id_cmr=b.id_cmr and 
					     c.id_tipe_program=a.id_tipe_program and d.id_ao=b.id_ao and a.id_proposal='$id_proposal' and c.id_jenis_program=e.id_jenis_program");
			$tampil		= mysql_fetch_array($cek);
			$pj 		= explode(",",$tampil['penanggung_jawab']);
			?>
				
				<input type="hidden" name="username" value="<?php echo $_SESSION['username'];?>">
				<div align="left" style="margin-left:50px;margin-right:50px;">
				<center><h4><b><?php echo $tampil['nama_program'];?></b></h4></center>
				<hr style="border-color:black;">
				
				<p align="left"><b>I. DESKRIPSI PROGRAM</b></p>
				<p align="left"><b>1.1 BRAND</b> : </p>
				<p align="left"><?php echo $tampil['brand'];?></p>
				
				<p align="left"><b>1.2 NAMA PROGRAM</b> : </p>
				<p align="left"><?php echo $tampil['nama_program'];?></p>
				
				<p align="left"><b>1.3 JENIS PROGRAM</b> : </p>
				<p align="left"><?php echo $tampil['jenis_program'];?></p>
				
				<p align="left"><b>1.4 TYPE PROGRAM</b> : </p>
				<p align="left"><?php echo $tampil['tipe_program'];?></p>
				
				<p align="left"><b>1.5 LOKASI</b> : </p>
				<p align="left"><?php echo $tampil['lokasi'];?>, <b>MPC</b>. <?php echo $tampil['lokasi_territory'];?>, <b>KEC</b>. <?php echo $tampil['lokasi_kecamatan'];?>, <b>KAB</b>. <?php echo $tampil['lokasi_kabupaten'];?></p>
				
				<p align="left"><b>1.6 KATEGORI AREA</b> : </p>
				<p align="left"><?php echo $tampil['kategori_area'];?></p>
				
				<p align="left"><b>1.7 TANGGAL PELAKSANAAN</b> : </p>
				<p align="left"> 
					<?php 
					if($tampil['akhir_pelaksanaan']<>""){
					echo tgl_indo($tampil['mulai_pelaksanaan']).' s/d '.tgl_indo($tampil['akhir_pelaksanaan']);
					}else{
					echo tgl_indo($tampil['mulai_pelaksanaan']);
					}?>
				</p>
				
				<p align="left"><b>1.8 MULAI WEEK</b> : <?php echo $tampil['week1'];?> <b>AKHIR WEEK</b> : <?php echo $tampil['week2'];?></p><br>
				
				<p align="left"><b>II. URAIAN PROGRAM</b></p>
				
				<p align="left"><b>2.1 LATAR BELAKANG</b> : </p>
				<?php echo $tampil['latar_belakang'];?>
				
				<p align="left"><b>2.2 OBJECTIVE</b> : </p>
				<?php echo $tampil['tujuan_sasaran'];?>
				
				<p align="left"><b>2.3 MEKANISME PROGRAM</b> : </p>
				<?php echo $tampil['mekanisme_pelaksanaan'];?><br>
				
				<p><strong>III. ESTIMASI BUDGET</strong></p>
					<table border="1" style="border-collapse:collapse;font-size:0.7em;">
					<tr align="center">
						<td width="5%"><b>NO.</b></td>
						<td width="25%"><b>Item Non PPh</b></td>
						<td width="25%"><b>Item Unsur PPh</b></td>
						<td width="5%"><b>Jumlah</b></td>
						<td width="10%"><b>Harga/Unit</b></td>
						<td width="10%"><b>Total (Rp)</b></td>
						<td width="10%"><b>PPN (Rp)</b></td>
					</tr>
					<?php
					$i = 0 ;
					$cek1 = mysql_query ("SELECT * FROM tabel_estimasi_budget where id_proposal='$id_proposal'");
					while($tampil1 = mysql_fetch_array($cek1)){
					$i++;
					$bagi_pph 	= explode("-",$tampil1['pph']);
					$pph	    = $bagi_pph[0];
					$jenis_pph  = $bagi_pph[1];
					
					$bagi_ppn = explode("-",$tampil1['ppn']);
					$ppn	    = $bagi_ppn[0];
					$jenis_ppn  = $bagi_ppn[1];
					
					$total_dasar 		= $tampil1['harga_budget'] * $tampil1['jumlah_budget'];
					
					$total_pph 			= ((($total_dasar * 100) / (100 - $pph)) - $total_dasar);
					$sub_total_dan_pph	= $total_dasar + $total_pph ;
					
					$sub_total_ppn		= ($total_dasar / $ppn);
					
					$total_dan_pph		= $total_dan_pph + $sub_total_dan_pph;
					$total_ppn			= $total_ppn + $sub_total_ppn;
					
					$jumlah 			= $total_dan_pph + $total_ppn; 
					?>
					<tr>
						<td align="center"><?php echo $i ;?></td>
						<td><?php if ($tampil1['jenis_item']=="NON-PPh"){echo $tampil1['keterangan_budget'];}?></td>
						<td><?php if ($tampil1['jenis_item']=="PPh"){echo $tampil1['keterangan_budget'];}?></td>
						<td align="center"><?php echo $tampil1['jumlah_budget'];?></td>
						<td align="right" style="padding-right:5px"><?php echo number_format($tampil1['harga_budget']);?></td>
						<td align="right" style="padding-right:5px"><?php echo number_format($sub_total_dan_pph);?></td>
						<td align="right" style="padding-right:5px"><?php echo number_format($sub_total_ppn);?></td>
					</tr>
					<?php } ?>
					<tr>
						<td colspan="5" rowspan="2" align="left"><b>Total Biaya (Rp)</b></td>
						<td align="right" style="padding-right:5px"><?php echo number_format($total_dan_pph);?></td>
						<td align="right" style="padding-right:5px"><?php echo number_format($total_ppn);?></td>
					</tr>
					<tr>
						<td align="right" colspan="2" style="padding-right:5px"><?php echo number_format($jumlah);?></td>
					</tr>
					</table>
				<br>
				<p><strong>IV. OVERALL ACHIEVEMENT</strong></p>
				
				<p align="left"><b>4.1 JENIS PROGRAM</b> : <?php echo $tampil['jenis_target'];?></p>
					<table border="1" style="border-collapse:collapse;font-size:0.7em;" width="75%">
						<?php 
							$cari_target = mysql_fetch_array(mysql_query("SELECT distinct(nama_target) as nama FROM tabel_target WHERE id_proposal='$id_proposal' and jenis_target='Target 1'"));
							$cari_target1 = mysql_fetch_array(mysql_query("SELECT distinct(nama_target) as nama FROM tabel_target WHERE id_proposal='$id_proposal' and jenis_target='Target 2'"));
							$cari_target2 = mysql_fetch_array(mysql_query("SELECT distinct(nama_target) as nama FROM tabel_target WHERE id_proposal='$id_proposal' and jenis_target='Target 3'"));
							
						?>
						<tr>
							<td align="center" width="15%" rowspan="2"><b>Brand</b></td>
							<td colspan="2"><b>&nbsp;Target : <?php echo $cari_target['nama'];?></b></td>
							<td colspan="2"><b>&nbsp;Target : <?php echo $cari_target1['nama'];?></b></td>
							<td colspan="2"><b>&nbsp;Target : <?php echo $cari_target2['nama'];?></b></td>
						</tr>
					
						<tr align="center">
							<td width="10%"><b>Current</b></td>
							<td width="10%"><b>Target</b></td>
							<td width="10%"><b>Current</b></td>
							<td width="10%"><b>Target</b></td>
							<td width="10%"><b>Current</b></td>
							<td width="10%"><b>Target</b></td>
						</tr>
						<?php
						$ia = 0 ;
						$cek3 = mysql_query ("SELECT distinct(nama_brand) FROM tabel_target where id_proposal='$id_proposal'");
						while($tampil3 = mysql_fetch_array($cek3)){
						$ia++;
						$cari_t1 = mysql_fetch_array(mysql_query("SELECT current, target FROM tabel_target WHERE id_proposal='$id_proposal' and jenis_target='Target 1' and nama_brand='".$tampil3['nama_brand']."'"));
						$cari_t2 = mysql_fetch_array(mysql_query("SELECT current, target FROM tabel_target WHERE id_proposal='$id_proposal' and jenis_target='Target 2' and nama_brand='".$tampil3['nama_brand']."'"));
						$cari_t3 = mysql_fetch_array(mysql_query("SELECT current, target FROM tabel_target WHERE id_proposal='$id_proposal' and jenis_target='Target 3' and nama_brand='".$tampil3['nama_brand']."'"));
						?>
						<tr>
							<td><?php echo $tampil3['nama_brand'];?></td>
							<td align="center"><?php echo $cari_t1['current']; ?></td>
							<td align="center"><?php echo $cari_t1['target'];?></td>
							<td align="center"><?php echo $cari_t2['current']; ?></td>
							<td align="center"><?php echo $cari_t2['target'];?></td>
							<td align="center"><?php echo $cari_t3['current']; ?></td>
							<td align="center"><?php echo $cari_t3['target'];?></td>
						</tr>
						<?php } ?>
					</table>
				<br>
				
				<p align="left"><b>4.2 TARGET SALES</b> : </p>
					<table border="1" width="75%" style="border-collapse:collapse;font-size:0.7em;">
					<tr align="center">
						<td width="5%"><b>NO.</b></td>
						<td width="15%"><b>Brand</b></td>
						<td width="10%"><b>Jml (Bks)</b></td>
						<td width="10%"><b>Harga Per Bks (Rp)</b></td>
						<td width="10%"><b>Sub Total (Rp)</b></td>
					</tr>
					<?php
					$i = 0 ;
					$cek2 = mysql_query ("SELECT * FROM tabel_estimasi_omset where id_proposal='$id_proposal'");
					while($tampil2 = mysql_fetch_array($cek2)){
					$i++;
					$sub_total2 = $tampil2['harga_omset'] * $tampil2['jumlah_omset'];
					$jumlah2 = $jumlah2 + $sub_total2;
					
					?>
					<!--perubahan-->
					<?php
					if($tampil2['keterangan_omset']<>""){
					?>
					<!--perubahan selesai-->
					<tr>
						<td align="center"><?php echo $i ;?></td>
						<td><?php echo $tampil2['keterangan_omset'];?></td>
						<td align="center"><?php echo $tampil2['jumlah_omset'];?></td>
						<td align="right" style="padding-right:5px"><?php echo number_format($tampil2['harga_omset']);?></td>
						<td align="right" style="padding-right:5px"><?php echo number_format($sub_total2);?></td>
					</tr>
					<!--perubahan--><?php }} ?><!--perubahan selesai-->
					<tr>
						<td colspan="4" align="center"><b>TOTAL</b></td>
						<!--perubahan--><td align="right" style="padding-right:5px"><?php if($jumlah2<>0){echo number_format($jumlah2);}?></td><!--perubahan selesai-->
					</tr>
					</table>
				<br>
					
				<p><strong>V. COST RATIO</strong></p>
				<?php 
				$cost = ($jumlah / $jumlah2) * 100;
				echo 'Cost Ratio = '.number_format($cost,2).' %';
				?>
				<br><br>
				<table style="font-family:calibri;font-size:0.7em;" align="left" cellpadding="0" cellspacing="0">
				<tr>
					<td><b><?php echo $tampil['lokasi_territory'];?></b>,</td>
					<td></td>
					<td><b><?php echo tgl_indo($tampil['tgl_persetujuan_rpm']);?><b></td>
				</tr>
				<tr>
					<td width="50"><b>Yang membuat</b></td>
					<td width="10"></td>
					<td width="50"></td>
					<td width="100"><b>Menyetujui,</b></td>
					<td width="20"></td>
					<td width="100"><b>Mengetahui,</b></td>
				</tr>
				<tr>
					<td><img src="../cmr/ttd/<?php echo $tampil['singkatan']."_".$tampil['nama_cmr'].".PNG";?>" width="50px"></td>
					<td></td>
					<td></td>
					<td><img src="../cmr/ttd/<?php echo $tampil['singkatan']."_".$tampil['asm'].".PNG";?>" width="50px"></td>
					<td></td>
					<td><img src="../cmr/ttd/RPM_<?php echo $tampil['nama_rpm'].".PNG";?>" width="60px"></td>
					<td></td>
				</tr>
				<tr>
					<td><b><?php echo $tampil['nama_cmr'];?></b></td>
					<td></td>
					<td></td>
					<td><b><?php echo $tampil['asm'];?></b></td>
					<td></td>
					<td><b><?php echo $tampil['nama_rpm'];?></b></td>
					<td></td>
				</tr>
				
				<tr height="10px">
					<td style="border-top:1px black solid"><b>CMR</b></td>
					<td></td>
					<td></td>
					<td style="border-top:1px black solid"><b>ASM</b></td>
					<td></td>
					<td style="border-top:1px black solid"><b>RPM</b></td>
				</tr>
				</table>
				
				  <script>
					  window.load = print_d();
					  function print_d(){
					   window.print();
					  }
				 </script>
				
				</div>
				</form>
		</div>		 

</body>
</html>
