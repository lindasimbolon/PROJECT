<?php include "header.php";
?>
<style>
#kotak {
	padding		: 2px 10px;
	border 		: 2px solid black;
	text-align	: center;
}
p{
	line-height: 15px;
	text-align: justify;
}
</style>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
		<h4><center><u>REVIEW PAS</u></center></h4>
	
				
				<table width="90%" align="center">
				<tr>
					<td colspan="2" align="center" style="padding:5px 5px 0px 5px;font-size:1.2em;"><b>PROPOSAL AUTHORIZATION SUPPORT (PAS)</b></td>
				</tr>
				<tr>
					<td>
					<?php 
					$id 	= $_GET['id'];
					$sql 	= mysql_query("SELECT * FROM tabel_pas d, tabel_proposal a where d.id_proposal=a.id_proposal and d.id_pas='$id'");
					$hasil 	= mysql_fetch_array($sql);
					$pj 	= explode(",",$hasil['penanggung_jawab']);
					
					?>
						<table width="98%" align="left" style="border:1px solid silver;padding:5px 5px;margin:10px 10px;">  
						<input type="hidden" name="id" value="<?php echo $hasil['id_proposal'];?>">
						<tr height="10">
							<td width="12%" align="left">Nomor Pas</td>
							<td width="1%">:</td>
							<td width="70%" align="left"><?php echo $hasil['no_pas'];?></td>
						</tr>
						
						<tr>
							<td colspan="3" align="left" style="border:1px solid silver;padding:5px 5px 0px 5px;font-size:0.8em;"><b>PROGRAM DESCRIPTIONS</b></td>
						</tr>
						<tr>
							<td align="left">1. Brand</td>
							<td>:</td>
							<td align="left"><?php echo $hasil['brand'];?></td>
						</tr>
						<tr>
							<td align="left">2. Nama Program</td>
							<td>:</td>
							<td align="left"><?php echo $hasil['nama_program'];?></td>
						</tr>
						<tr>
							<td align="left">3. Jenis Program</td>
							<td>:</td>
							<td align="left"><?php echo $hasil['jenis_program_pusat'];?></td>
						</tr>
						<tr>
							<td align="left">4. Lokasi</td>
							<td>:</td>
							<td align="left"><?php echo $hasil['lokasi'];?>, <b>MPC.</b> <?php echo $hasil['lokasi_territory'];?>, <b>KEC. </b><?php echo $hasil['lokasi_kecamatan'];?></td>
						</tr>
						<tr>
							<td align="left">5. Tanggal Pelaksanaan</td>
							<td>:</td>
							<td align="left"><?php if($hasil['akhir_pelaksanaan']<>""){ ?> 
							<?php echo tgl_indo($hasil['mulai_pelaksanaan']);?> s/d <?php echo tgl_indo($hasil['akhir_pelaksanaan']); } else {?> <?php echo tgl_indo($hasil['mulai_pelaksanaan']);}?></td>
						</tr>
						
						<tr style="border:1px solid silver;">
							<td colspan="3">
								<!-- Tabel uraian -->
								<table width="70%" border="1" style="margin:10px 20px;">
									<tr align="center">
										<td width="25%" class="td"><b>URAIAN AKTIVITAS</b></td>
										<td width="25%" class="td"><b>PELAKSANA</b></td>
										<td width="25%" class="td"><b>WAKTU PELAKSANAAN</b></td>
										<td width="25%" class="td"><b>LOKASI</b></td>
									</tr>
									<tr>
										<td width="25%" class="td"><?php echo $hasil['uraian_aktivitas'];?></td>
										<td width="25%" align="center" class="td">Team SML</td>
										<td width="25%" align="center" class="td"><?php if($hasil['akhir_pelaksanaan']<>""){ ?> <?php echo tgl_indo($hasil['mulai_pelaksanaan']);?> s/d 
										<?php echo tgl_indo($hasil['akhir_pelaksanaan']); } else {?> <?php echo tgl_indo($hasil['mulai_pelaksanaan']);}?></td>
										<td width="25%" align="center" class="td"><?php echo $hasil['lokasi'];?></td>
									</tr>
								</table>
								<table width="100%">
								<tr height="30">
									<td width="15%" align="left" valign="top">6. Tujuan Program</td>
									<td width="1%"  align="left" valign="top" >:</td>
									<td align="left"><?php echo $hasil['tujuan_sasaran'];?></td>
								</tr>
								<tr height="30">
									<td align="left">7. Target Program</td>
									<td align="left">:</td>
									<td align="left"><?php echo $hasil['target_program'];?></td>
								</tr>
								<tr height="30">
									<td align="left" valign="top">8. Mekanisme Pelaksanaan</td>
									<td align="left" valign="top">:</td>
									<td align="left"><?php echo $hasil['mekanisme_pelaksanaan'];?></td>
								</tr>
								</table>
								<table width="70%">
								<tr>
									<td width="22%" align="left" valign="top">9. Penanggung Jawab</td>
									<td width="1%"  align="left" valign="top">:</td>
									<td width="20%" align="left"><input type="checkbox" name="penanggung_jawab[]" value="Promotion Team PT SML" <?php if (in_array("Promotion Team PT SML", $pj)){echo "Checked";}?> disabled/> Promotion Team PT SML</td>
									<td align="left"><input type="checkbox" name="penanggung_jawab[]" value="HO" <?php if (in_array("HO", $pj)){echo "Checked";}?> disabled/> HO
									</td>
								<tr>
									<td></td>
									<td></td>
									<td align="left"><input type="checkbox" name="penanggung_jawab[]" value="Merchandising Team" <?php if (in_array("Merchandising Team", $pj)){echo "Checked";}?> disabled/> Merchandising Team </td>
									<td align="left"><input type="checkbox" name="penanggung_jawab[]" value="Others" <?php if (in_array("Others", $pj)){echo "Checked";}?> disabled/> Others </td>
								</tr>
								</table><br>
								<table>
									
									<tr>
										<td width="100"></td>
										<td width="100"></td>
										<td colspan="2"><u>ESTIMASI BIAYA</u></td>
									</tr>
								</table>
								<table width="80%" border="1" style="margin:10px 200px;">
									
									
									<tr align="center" height="30">
										<td width="5%" class="td"><b>NO</b></td>
										<td width="20%" class="td"><b>ITEMS</b></td>
										<td width="20%" class="td"><b>KOTA</b></td>
										<td width="10%" class="td"><b>JUMLAH</b></td>
										<td width="10%" class="td"><b>HARGA/UNIT</b></td>
										<td width="10%" class="td"><b>HARI KERJA</b></td>
										<td width="15%" class="td"><b>TOTAL</b></td>
										<td width="15%" class="td"><b>SUMBER DANA</b></td>
									</tr>
									<?php
									$no=0;
									$sql2=mysql_query("SELECT * FROM tabel_estimasi_budget where id_proposal='$hasil[id_proposal]'");
									while($hasil2=mysql_fetch_array($sql2)){
									$no++;
									$bagi_pajak = explode("-",$hasil2['pph']);
									$pph	    = $bagi_pajak[0];
									$jenis	    = $bagi_pajak[1];
									$sub_total = $hasil2['harga_budget'] * $hasil2['jumlah_budget'] * $hasil2['hari_budget'];
									//perubahan 
									if($jenis=="PPh"){
									$sub_total_pph = (($sub_total* 100) / (100 - $pph)) - $sub_total;
									}else{
									$sub_total_pph = ($sub_total / $pph);
									}
									//perubahan selesai
									$jumlah = $jumlah + $sub_total + $sub_total_pph; 
									?>
									<tr align="center">
										<td class="td"><?php echo $no;?></td>
										<td class="td" align="left"><?php echo $hasil2['keterangan_budget'];?></td>
										<td class="td"><?php echo $hasil['lokasi_territory'];?></td>
										<td class="td"><?php echo $hasil2['jumlah_budget'];?></td>
										<td align="right" class="td"><?php echo number_format($hasil2['harga_budget']);?></td>
										<td class="td"><?php echo $hasil2['hari_budget'];?></td>
										<td align="right"class="td" style="padding-right:5px"><?php echo number_format($sub_total);?></td>
										<td>KDM</td>
									</tr>
									<?php if($hasil2['pph']>0){ ?>
									<tr>
										<td align="center"></td>
										<td align="left"><?php echo $jenis;?></td>
										<td align="center"></td>
										<td align="center"></td>
										<td align="center"></td>
										<td align="center"></td>
										<td align="right" style="padding-right:5px"><?php echo number_format($sub_total_pph);?></td>
										<td></td>
									</tr>
									<?php } ?>
									<?php } ?>
									<tr align="right">
										<td colspan="6" class="td"><b>TOTAL</b></td>
										<td class="td" style="padding-right:5px"><b>Rp. <?php echo number_format($jumlah);?></b></td>
										<td></td>
									</tr>
									
								</table><br>
								<table>
									
									<tr>
										<td width="100"></td>
										<td width="100"></td>
										<td colspan="2"><u>CASH ADVANCE REQUEST (CAR)</u></td>
									</tr>
								</table>
								<table width="70%" border='1' style="margin:10px 200px;">
									<tr align="center">
										<td width="3%" class="td"><b>NO</b></td>
										<td width="20%" class="td"><b>REQUEST DATE</b></td>
										<td width="10%" class="td"><b>VALUE(Rp)</b></td>
										<td width="20%" class="td"><b>REMARKS</b></td>
									</tr>
									
									<tr>
										<td align="center" class="td"><b><?php echo $no1;?></b></td>
										<td align="center" class="td"><b><?php echo $hasil3['tgl_permintaan'];?></b></td>
										<td align="right" class="td"><b><?php echo $hasil3['value'];?></b></td>
										<td class="td"><b><?php echo $hasil3['remarks'];?></b></td>
									</tr>
									<tr align="center">
										<td colspan="2" class="td"><b>TOTAL</b></td>
										<td class="td"><?php echo $total1;?></td>
										<td class="td"></td>
									</tr>
								</table><br>
								<table>
									
									<tr>
										<td width="100"></td>
										<td width="100"></td>
										<td colspan="2"><u>Non - Saleable Product</u></td>
									</tr>
								</table>
								<table width="70%" border='1' style="margin:10px 200px;">
									<tr align="center">
										<td width="3%" class="td"><b>NO</b></td>
										<td width="20%" class="td"><b>BRAND / ITEM</b></td>
										<td width="10%" class="td"><b>QTY (PACK)</b></td>
										<td width="20%" class="td"><b>Rp. / PACK</b></td>
										<td width="20%" class="td"><b>TOTAL Rp.</b></td>
									</tr>
									
									<tr>
										<td align="center" class="td"><b><?php echo $no1;?></b></td>
										<td align="center" class="td"><b><?php echo $hasil3['tgl_permintaan'];?></b></td>
										<td align="right" class="td"><b><?php echo $hasil3['value'];?></b></td>
										<td class="td"><b><?php echo $hasil3['remarks'];?></b></td>
										<td class="td"><b><?php echo $hasil3['remarks'];?></b></td>
									</tr>
									
									<tr align="center">
										<td colspan="4" class="td"><b>TOTAL</b></td>
										<td class="td"><?php echo $total1;?></td>
										
									</tr>
								</table><br>
								
								<table width="100%" align="left">
								<tr>
									<td width="15%" align="left"><b>OVERALL ACHIEVEMENT</b></td>
									<td width="1%"  align="left"></td>
									<td align="left"></td>
								</tr>
								<tr>
									<td align="left">1. Target Audience</td>
									<td align="left">:</td>
									<td align="left"><?php echo $hasil['target_audience']?></td>
								</tr>
								<tr>
									<td align="left">2. Target Contact</td>
									<td align="left">:</td>
									<td align="left"><?php echo $hasil['target_contact']?></td>
								</tr>
								<tr>
									<td align="left" valign="top">3. Target Sales</td>
									<td align="left" colspan='2'>:
										<table width="70%" border="1">
											
											<tr align="center">
												<td width="10%" class="td"><b>PACK</b></td>
												<td width="20%" class="td"><b>RETAIL BUYING PRICE</b></td>
												<td width="30%" class="td"><b>TOTAL</b></td>
												<td width="25%" class="td"><b>BRAND</b></td>
											</tr>
											<?php
											$no3=0;
											$sql5=mysql_query("SELECT * FROM tabel_estimasi_omset where id_proposal='$hasil[id_proposal]'");
											while($hasil5=mysql_fetch_array($sql5)){
											$no3++;
											$sub_total1 = $hasil5['harga_omset'] * $hasil5['jumlah_omset'];
											$jumlah2 = $jumlah2 + $sub_total1;
											?>
											<?php if($hasil5['keterangan_omset']<>""){ ?>
											<tr>
												<td align="center" class="td"><?php echo $hasil5['jumlah_omset'];?></td>
												<td align="right" class="td"><?php echo number_format($hasil5['harga_omset']);?></td>
												<td align="right" class="td"><?php echo number_format($sub_total1);?></td>

												<td class="td"><?php echo $hasil5['keterangan_omset'];?></td>
											</tr>
											<?php } } ?>
											<tr>
												<td colspan="2" align="center" class="td"><b>TOTAL</b></td>
												<td align="right" class="td"><b>Rp. <?php if($jumlah2>0){echo number_format($jumlah2);}?></b></td>
												<td></td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td><br></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td align="left">
									<a href='javascript:history.back(-1)'><input type="submit" value="Kembali"></a> 
									<?php 
									if((($hasil['kategori']=='PUSAT_KDM')or($hasil['kategori']=='PUSAT'))and($hasil['file_iom']<>'')){
									echo "<a href='print_pas_pusat.sml?id=$hasil[id_pas]' target='_blank'><button style='margin-left:5%;'>Print PAS</button></a>";
									}else{
									echo "";
									}
									?>
									</td>
								</tr>
								<tr>
									<td><br></td>
								</tr>
								</table>
							</td>
							
						</tr>
						
						</table>
					</td>
				</tr>
				
			</table>
 			
 	
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
