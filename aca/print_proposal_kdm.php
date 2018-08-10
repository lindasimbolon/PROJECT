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
			$cek 		= mysql_query ("SELECT * FROM tabel_proposal a, tabel_cmr b, tabel_ao d where a.id_cmr=b.id_cmr and 
					     d.id_ao=b.id_ao and a.id_proposal='$id_proposal'");
			$tampil		= mysql_fetch_array($cek);
			$pj 		= explode(",",$tampil['penanggung_jawab']);
			?>
				
				<input type="hidden" name="username" value="<?php echo $_SESSION['username'];?>">
				<div align="left" >
				<center><h4><b><?php echo $tampil['nama_program'];?></b></h4></center>
				<hr style="border-color:black;">
				
				<p align="left"><b>I. DESKRIPSI PROGRAM</b></p>
				<p align="left"><b>1.1 BRAND</b> : </p>
				<p align="left"><?php echo $tampil['brand'];?></p>
				
				<p align="left"><b>1.2 NAMA PROGRAM</b> : </p>
				<p align="left"><?php echo $tampil['nama_program'];?></p>
				
				<p align="left"><b>1.3 JENIS PROGRAM</b> : </p>
				<p align="left"><?php echo $tampil['jenis_program_pusat'];?></p>
								
				<p align="left"><b>1.4 LOKASI</b> : </p>
				<p align="left"><?php echo $tampil['lokasi'];?>, <b>MPC</b>. <?php echo $tampil['lokasi_territory'];?>, <b>KEC</b>. <?php echo $tampil['lokasi_kecamatan'];?></p>
				
				<p align="left"><b>1.5 TANGGAL PELAKSANAAN</b> : </p>
				<p align="left">
					<?php 
					if($tampil['akhir_pelaksanaan']<>""){
					echo tgl_indo($tampil['mulai_pelaksanaan']).' s/d '.tgl_indo($tampil['akhir_pelaksanaan']);
					}else{
					echo tgl_indo($tampil['mulai_pelaksanaan']);
					}?>
				</p>
				
				<p align="left"><b>1.6 URAIAN AKTIVITAS</b> : </p>
				<p align="left"><?php echo $tampil['uraian_aktivitas'];?></p>
				
				<p>&nbsp; </p>
				<p align="left"><b>II. URAIAN PROGRAM</b></p>
				<p align="left"><b>2.1 TUJUAN DAN SASARAN</b> : </p>
				<?php echo $tampil['tujuan_sasaran'];?>
				
				<p align="left"><b>2.2 MEKANISME PELAKSANAAN</b> : </p>
				<?php echo $tampil['mekanisme_pelaksanaan'];?>
				
				<p align="left"><b>2.3 PENANGGUNG JAWAB</b> : </p>
				<p align="left">
					    <input type="checkbox" name="penanggung_jawab[]" value="HO" <?php if (in_array("HO", $pj)){echo "Checked";}?> disabled/> HO &nbsp;&nbsp;
					    <input type="checkbox" name="penanggung_jawab[]" value="Promotion Team PT SML" <?php if (in_array("Promotion Team PT SML", $pj)){echo "Checked";}?> disabled/> Promotion Team PT SML &nbsp;&nbsp;
					    <input type="checkbox" name="penanggung_jawab[]" value="Salesman Team" <?php if (in_array("Salesman Team", $pj)){echo "Checked";}?> disabled/> Salesman Team &nbsp;&nbsp;
					    <input type="checkbox" name="penanggung_jawab[]" value="Merchandising Team" <?php if (in_array("Merchandising", $pj)){echo "Checked";}?> disabled/> Merchandising Team &nbsp;&nbsp;
					    <input type="checkbox" name="penanggung_jawab[]" value="Others" <?php if (in_array("Others", $pj)){echo "Checked";}?> disabled/> Others
				</p>
				
				<p align="left"><b>2.4 PIC PROGRAM</b> : </p>
				<p align="left"><?php echo $tampil['pic_program'];?></p>
				
				<p align="left"><b>2.5 CONTACT PIC</b> : </p>
				<p align="left"><?php echo $tampil['pic_contact'];?></p>
				<br>
				<p><strong>III. RINCIAN BUDGET</strong></p>
					<table style="border-collapse:collapse;font-size:0.7em;" width="75%" border="1">
					<tr align="center">
						<td width="10%"><b>NO.</b></td>
						<td width="40%"><b>Items</b></td>
						<td width="10%"><b>Jumlah</b></td>
						<td width="10%"><b>Harga</b></td>
						<td width="10%"><b>Titik/Hari</b></td>
						<td width="10%"><b>Sub Total</b></td>
					</tr>
					<?php
					
					$i = 0 ;
					$cek1 = mysql_query ("SELECT * FROM tabel_estimasi_budget where id_proposal='$id_proposal'");
					while($tampil1 = mysql_fetch_array($cek1)){
					$i++;
					$bagi_pajak = explode("-",$tampil1['pph']);
					$pph	    = $bagi_pajak[0];
					$jenis	    = $bagi_pajak[1];
					$sub_total = $tampil1['harga_budget'] * $tampil1['jumlah_budget'];
					
					//perubahan 
					if($jenis=="PPh"){
					$sub_total_pph = (($sub_total* 100) / (100 - $pph)) - $sub_total;
					}else{
					$sub_total_pph = ($sub_total / $pph);
					}
					//perubahan selesai
					$jumlah = $jumlah + $sub_total + $sub_total_pph; 
					
					?>
					<tr>
						<td align="center"><?php echo $i ;?></td>
						<td><?php echo $tampil1['keterangan_budget'];?></td>
						<td align="center"><?php echo $tampil1['jumlah_budget'];?></td>
						<td align="right" style="padding-right:5px"><?php echo number_format($tampil1['harga_budget']);?></td>
						<td align="center"><?php echo $tampil1['hari_budget'];?></td>
						<td align="right" style="padding-right:5px"><?php echo number_format($sub_total);?></td>
					</tr>
					<?php if($tampil1['pph']>0){ ?>
					<tr>
						<td align="center"></td>
						<td align="left"><?php echo $jenis;?></td>
						<td align="center"></td>
						<td align="center"></td>
						<td align="center"></td>
						<td align="right" style="padding-right:5px"><?php echo number_format($sub_total_pph);?></td>
					</tr>
					<?php } ?>
					<?php } ?>
					<tr>
						<td colspan="5" align="center"><b>TOTAL</b></td>
						<td align="right" style="padding-right:5px"><?php echo number_format($jumlah);?></td>
					</tr>
					</table>
				<br>
				<p><strong>IV. RINCIAN TARGET</strong></p>
				<p align="left"><b>4.1 TARGET PROGRAM</b> : </p>
				<p align="left"><?php echo $tampil['target_program'];?></p>
				
				<p align="left"><b>4.2 TARGET AUDIENCE</b> : </p>
				<p align="left"><?php echo $tampil['target_audience'];?></p>
				
				<p align="left"><b>4.3 TARGET CONTACT</b> : </p>
				<p align="left"><?php echo $tampil['target_contact'];?></p>
				
				<p align="left"><b>4.4 TARGET SALES</b> : </p>
					<table style="border-collapse:collapse;font-size:0.7em;" width="75%" border="1">
					<tr align="center">
						<td width="10%"><b>NO.</b></td>
						<td width="40%"><b>Estimasi</b></td>
						<td width="10%"><b>Jumlah</b></td>
						<td width="10%"><b>Harga</b></td>
						<td width="10%"><b>Sub Total</b></td>
					</tr>
					<?php
					
					$i = 0 ;
					$cek2 = mysql_query ("SELECT * FROM tabel_estimasi_omset where id_proposal='$id_proposal'");
					while($tampil2 = mysql_fetch_array($cek2)){
					$i++;
					$sub_total2 = $tampil2['harga_omset'] * $tampil2['jumlah_omset'];
					$jumlah2 = $jumlah2 + $sub_total2;
					?>
					<?php if($tampil2['keterangan_omset']<>""){?>
					<tr>
						<td align="center"><?php echo $i ;?></td>
						<td align="left"><?php echo $tampil2['keterangan_omset'];?></td>
						<td align="center"><?php echo $tampil2['jumlah_omset'];?></td>
						<td align="right"><?php echo number_format($tampil2['harga_omset']);?></td>
						<td align="right"><?php echo number_format($sub_total2);?></td>
					</tr>
					<?php } }?>
					<tr>
						<td colspan="4" align="center"><b>TOTAL</b></td>
						<td align="right"><?php if($tampil2['keterangan_omset']<>""){echo number_format($jumlah2);}?></td>
					</tr>
					</table>
					
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
					<td width="50"></td>
					<td width="70"><b>Menyetujui,</b></td>
					<td width="20"></td>
					<td width="70"><b>Mengetahui,</b></td>
				</tr>
				<tr>
					<td><img src="../cmr/ttd/<?php echo $tampil['singkatan']."_".$tampil['nama_cmr'].".PNG";?>" width="50px"></td>
					<td></td>
					<td><img src="../cmr/ttd/<?php echo $tampil['singkatan']."_".$tampil['asm'].".PNG";?>" width="50px"></td>
					<td></td>
					<td><img src="../cmr/ttd/RPM_<?php echo $tampil['nama_rpm'].".PNG";?>" width="60px"></td>
					<td></td>
					<td><img src="../cmr/ttd/RM.PNG" width="60px"></td>
					<td></td>
				</tr>
				<tr>
					<td><b><?php echo $tampil['nama_cmr'];?></b></td>
					<td></td>
					<td><b><?php echo $tampil['asm'];?></b></td>
					<td></td>
					<td><b><?php echo $tampil['nama_rpm'];?></b></td>
					<td></td>
					<td><b>GUNADI H.</b></td>
					<td></td>
				</tr>
				
				<tr height="10px">
					<td style="border-top:1px black solid"><b>CMR</b></td>
					<td></td>
					<td style="border-top:1px black solid"><b>ASM</b></td>
					<td></td>
					<td style="border-top:1px black solid"><b>RPM</b></td>
					<td></td>
					<td style="border-top:1px black solid"><b>RM</b></td>
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
