<?php include "header.php";?>
<body>
<?php include "menu.php";?>
<!-- Header -->

<header id="head">
		
			<?php
			$id_proposal 	= $_GET['id'];
			$cek 		= mysql_query ("SELECT * FROM tabel_proposal a, tabel_cmr b, tabel_tipe_program c, tabel_ao d, tabel_jenis_program e where a.id_cmr=b.id_cmr and 
					     c.id_tipe_program=a.id_tipe_program and d.id_ao=b.id_ao and a.id_proposal='$id_proposal' and c.id_jenis_program=e.id_jenis_program");
			$tampil		= mysql_fetch_array($cek);
			$pj 		= explode(",",$tampil['penanggung_jawab']);
			?>
				
				<input type="hidden" name="username" value="<?php echo $_SESSION['username'];?>">
				<div align="left" style="margin-left:50px;margin-right:50px;">
				<center><h3><b><?php echo $tampil['nama_program'];?></b></h3></center>
				<hr style="border-color:black;">
				
				<p align="left"><b>I. DESKRIPSI PROGRAM</b></p>
				<p align="left"><b>&nbsp;&nbsp; 1.1 BRAND</b> : </p>
				<p align="left">&nbsp;&nbsp;<?php echo $tampil['brand'];?></p><br>
				
				<p align="left"><b>&nbsp;&nbsp; 1.2 NAMA PROGRAM</b> : </p>
				<p align="left">&nbsp;&nbsp; <?php echo $tampil['nama_program'];?></p><br>
				
				<p align="left"><b>&nbsp;&nbsp; 1.3 JENIS PROGRAM</b> : </p>
				<p align="left">&nbsp;&nbsp; <?php echo $tampil['jenis_program'];?></p><br>
				
				<p align="left"><b>&nbsp;&nbsp; 1.4 TYPE PROGRAM</b> : </p>
				<p align="left">&nbsp;&nbsp; <?php echo $tampil['tipe_program'];?></p><br>
				
				<p align="left">&nbsp;&nbsp; <b>1.5 LOKASI</b> : </p>
				<p align="left">&nbsp;&nbsp; <?php echo $tampil['lokasi'];?> </p>
					<p align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Territory</b> : </p>
					<p align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $tampil['lokasi_territory'];?> </p>
					<p align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Kecamatan:</b> : </p>
					<p align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $tampil['lokasi_kecamatan'];?></p><br>
				
				<p align="left"><b>&nbsp;&nbsp; 1.6 TANGGAL PELAKSANAAN</b> : </p>
				<p align="left">&nbsp;&nbsp; 
					<?php 
					if($tampil['akhir_pelaksanaan']<>"0000-00-00"){
					echo tgl_indo($tampil['mulai_pelaksanaan']).' s/d '.tgl_indo($tampil['akhir_pelaksanaan']);
					}else{
					echo tgl_indo($tampil['mulai_pelaksanaan']);
					}?>
				</p><br>
				
				<p align="left"><b>&nbsp;&nbsp; 1.7 URAIAN AKTIVITAS</b> : </p>
				<p align="left">&nbsp;&nbsp; <?php echo $tampil['uraian_aktivitas'];?></p><br>
				
				
				<p align="left"><b>II. URAIAN PROGRAM</b></p>
				<p align="left"><b>&nbsp;&nbsp; 2.1 TUJUAN DAN SASARAN</b> : </p>
				<?php echo $tampil['tujuan_sasaran'];?><br>
				
				<p align="left"><b>&nbsp;&nbsp; 2.2 MEKANISME PELAKSANAAN</b> : </p>
				<?php echo $tampil['mekanisme_pelaksanaan'];?><br>
				
				<p align="left"><b>&nbsp;&nbsp; 2.3 PENANGGUNG JAWAB</b> : </p>
				<p align="left">&nbsp;&nbsp;
					    <input type="checkbox" name="penanggung_jawab[]" value="HO" <?php if (in_array("HO", $pj)){echo "Checked";}?> disabled/> HO &nbsp;&nbsp;
					    <input type="checkbox" name="penanggung_jawab[]" value="Promotion Team PT SML" <?php if (in_array("Promotion Team PT SML", $pj)){echo "Checked";}?> disabled/> Promotion Team PT SML &nbsp;&nbsp;
					    <input type="checkbox" name="penanggung_jawab[]" value="Salesman Team" <?php if (in_array("Salesman Team", $pj)){echo "Checked";}?> disabled/> Salesman Team &nbsp;&nbsp;
					    <input type="checkbox" name="penanggung_jawab[]" value="Merchandising Team" <?php if (in_array("Merchandising", $pj)){echo "Checked";}?> disabled/> Merchandising Team &nbsp;&nbsp;
					    <input type="checkbox" name="penanggung_jawab[]" value="Others" <?php if (in_array("Others", $pj)){echo "Checked";}?> disabled/> Others
				</p><br>
				
				<p align="left"><b>&nbsp;&nbsp; 2.4 PIC PROGRAM</b> : </p>
				<p align="left">&nbsp;&nbsp;<?php echo $tampil['pic_program'];?></p><br>
				
				<p align="left"><b>&nbsp;&nbsp; 2.5 CONTACT PIC</b> : </p>
				<p align="left">&nbsp;&nbsp;<?php echo $tampil['pic_contact'];?></p><br>
				
				<p><strong>III. RINCIAN BUDGET</strong></p>
					<table border="1">
					<tr align="center">
						<td width="10%"><b>NO.</b></td>
						<td width="40%"><b>Estimasi</b></td>
						<td width="10%"><b>Jumlah</b></td>
						<td width="10%"><b>Harga</b></td>
						<td width="10%"><b>Sub Total</b></td>
					</tr>
					<?php
					$i = 0 ;
					$cek1 = mysql_query ("SELECT * FROM tabel_estimasi_budget where id_proposal='$id_proposal'");
					while($tampil1 = mysql_fetch_array($cek1)){
					$i++;
					$sub_total = $tampil1['harga_budget'] * $tampil1['jumlah_budget'];
					$jumlah = $jumlah + $sub_total;
					
					?>
					<tr>
						<td align="center"><?php echo $i ;?></td>
						<td><?php echo $tampil1['keterangan_budget'];?></td>
						<td align="center"><?php echo $tampil1['jumlah_budget'];?></td>
						<td align="right" style="padding-right:5px"><?php echo number_format($tampil1['harga_budget']);?></td>
						<td align="right" style="padding-right:5px"><?php echo number_format($sub_total);?></td>
					</tr>
					<?php } ?>
					<tr>
						<td colspan="4" align="center"><b>TOTAL</b></td>
						<td align="right" style="padding-right:5px"><?php echo number_format($jumlah);?></td>
					</tr>
					</table>
				<br>
				<p><strong>IV. RINCIAN TARGET</strong></p>
				<p align="left"><b>&nbsp;&nbsp; 4.1 TARGET PROGRAM</b> : </p>
				<p align="left">&nbsp;&nbsp;<?php echo $tampil['target_program'];?></p><br>
				
				<p align="left"><b>&nbsp;&nbsp; 4.2 TARGET AUDIENCE</b> : </p>
				<p align="left">&nbsp;&nbsp;<?php echo $tampil['target_audience'];?></p><br>
				
				<p align="left"><b>&nbsp;&nbsp; 4.3 TARGET CONTACT</b> : </p>
				<p align="left">&nbsp;&nbsp;<?php echo $tampil['target_contact'];?></p><br>
				
				<p align="left"><b>&nbsp;&nbsp; 4.4 TARGET SALES</b> : </p>
					<table border="1">
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
					<tr>
						<td align="center"><?php echo $i ;?></td>
						<td><?php echo $tampil2['keterangan_omset'];?></td>
						<td align="center"><?php echo $tampil2['jumlah_omset'];?></td>
						<td align="right" style="padding-right:5px"><?php echo number_format($tampil2['harga_omset']);?></td>
						<td align="right" style="padding-right:5px"><?php echo number_format($sub_total2);?></td>
					</tr>
					<?php } ?>
					<tr>
						<td colspan="4" align="center"><b>TOTAL</b></td>
						<td align="right" style="padding-right:5px"><?php echo number_format($jumlah2);?></td>
					</tr>
					</table>
				<br>
				
				
				<p><strong>V. COST RATIO</strong></p>
				<?php 
				$cost = ($jumlah / $jumlah2) * 100;
				echo 'Cost Ratio = '.number_format($cost,2).' %';
				?>
				<br><br>
					
				<p><strong>VI. LAMPIRAN FILE</strong></p>
				<p align="left">&nbsp;&nbsp;<?php if($tampil['file1']<>""){ echo "<a href='upload/$tampil[file1]'>Download</a>";}else{echo "Tidak Ada File";}?></p><br>
				
				
				<tr align="left">
					<td></td>
					<td><a href="data_perpos_asm.sml"><input type="submit" value="Kembali"></a> <a href="persetujuan_proposal_asm.sml?id=<?php echo $tampil['id_proposal'];?>"><input type="submit" value="Persetujuan"></a></td>
				</tr>
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
