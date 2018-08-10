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
					$sql 	= mysql_query("SELECT * FROM tabel_pas d, tabel_proposal a, tabel_tipe_program b, tabel_jenis_program c where d.id_proposal=a.id_proposal and a.id_tipe_program=b.id_tipe_program and b.id_jenis_program=c.id_jenis_program 
						               and d.id_pas='$id'");
					$hasil 	= mysql_fetch_array($sql);
					$pj 	= explode(",",$hasil['penanggung_jawab']);
					$tanggal	= $hasil['mulai_pelaksanaan'];
					$date 		= new DateTime($tanggal);
					$week 		= $date->format("W");
					
					$tanggal1	= $hasil['akhir_pelaksanaan'];
					$date1 		= new DateTime($tanggal1);
					$week1 		= $date1->format("W");
					?>
						<table width="98%" align="left" style="border:1px solid silver;padding:5px 5px;margin:10px 10px;">  
						<input type="hidden" name="id" value="<?php echo $hasil['id_proposal'];?>">
						<tr height="10">
							<td width="12%" align="left">Nomor Pas</td>
							<td width="1%">:</td>
							<td width="70%" align="left"><?php echo $hasil['no_pas'];?></td>
						</tr>
						
						<tr height="30">
							<td colspan="3" align="left" style="border:1px solid silver;padding:5px 5px 0px 5px;font-size:0.8em;"><b><h5>PROGRAM DESCRIPTIONS</h5></b></td>
						</tr>
						<tr height="30">
							<td align="left">1. Brand</td>
							<td>:</td>
							<td align="left"><?php echo $hasil['brand'];?></td>
						</tr>
						<tr height="30">
							<td align="left">2. Nama Program</td>
							<td>:</td>
							<td align="left"><?php echo $hasil['nama_program'];?></td>
						</tr>
						<?php
						$pilih = $hasil['jenis_program'];
						?>
						<tr height="30">
							<td align="left">3. Jenis Program <?php echo $pilih;?></td>
							<td>:</td>
							<td align="left" colspan="2">
							<label id="kotak"><?php if($pilih=="DIRECT SELLING"){echo "&#x2713";}else{echo "&nbsp;&nbsp;";}?></label>&nbsp;<label>Direct Selling</label>
							&nbsp;&nbsp;&nbsp;&nbsp;<label id="kotak"><?php if($pilih=="EVENT"){echo "&#x2713";}else{echo "&nbsp;&nbsp;";}?></label>&nbsp;<label>Event</label>
							&nbsp;&nbsp;&nbsp;&nbsp;<label id="kotak"><?php if($pilih=="BRANDING"){echo "&#x2713";}else{echo "&nbsp;&nbsp;";}?></label>&nbsp;<label>Branding</label>
							&nbsp;&nbsp;&nbsp;&nbsp;<label id="kotak"><?php if($pilih=="TRADE PROMO"){echo "&#x2713";}else{echo "&nbsp;&nbsp;";}?></label>&nbsp;<label>Trade Promo</label></td>
						</tr>
						<tr height="30">
							<td align="left">4. Lokasi</td>
							<td>:</td>
							<td align="left">MPC &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $hasil['lokasi_territory'];?></td>
						</tr>
						<tr>
							<td align="left"></td>
							<td></td>
							<td align="left">Kab/Kec &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $hasil['lokasi_kecamatan'];?></td>
						</tr>
						</tr>
						<tr height="30">
							<td align="left"></td>
							<td></td>
							<td align="left">Titik Lokasi : <?php echo $hasil['lokasi'];?></td>
						</tr>
						<tr height="30">
							<td align="left">5. Periode Pelaksanaan</td>
							<td>:</td>
							<td align="left">Week&nbsp;&nbsp; &nbsp;: <?php if($week<>$week1){ ?>
							<?php echo $week;?> s/d <?php echo $week1; } else {echo $week;}?>
							</td>
						</tr>
						<tr height="30">
							<td align="left"></td>
							<td></td>
							<td align="left">Tanggal :<?php if($hasil['akhir_pelaksanaan']<>""){ ?> 
							<?php echo tgl_indo($hasil['mulai_pelaksanaan']);?> s/d <?php echo tgl_indo($hasil['akhir_pelaksanaan']); } else {?> <?php echo tgl_indo($hasil['mulai_pelaksanaan']);}?></td>
						</tr>
						<tr>
							<td><br></td>
						</tr>
						<tr height="30">
							<td colspan="3">
								
								<table width="100%">
								<tr height="30">
									<td width="15%" align="left" valign="top">6. Latar Belakang</td>
									<td width="1%"  align="left" valign="top" >:</td>
									<td  align="left"><?php echo $hasil['latar_belakang'];?></td>
								</tr>
								<tr height="30">
									<td align="left" valign="top">7. Tujuan Program</td>
									<td align="left" valign="top" >:</td>
									<td align="left"><?php echo $hasil['tujuan_sasaran'];?></td>
								</tr>
								<tr height="30">
									<td align="left" valign="top">8. Mekanisme Pelaksanaan</td>
									<td align="left" valign="top">:</td>
									<td align="left"><?php echo $hasil['mekanisme_pelaksanaan'];?></td>
								</tr>
								</table>
								<table>
									
									<tr>
										<td width="200" align="left">9. Estimasi Biaya</td>
										<td>:</td>
										<td colspan="2"></td>
									</tr>
								</table>
								<table border="1"  width="80%" style="margin: 0 200px;">
									<tr align="center">
										<td width="5%"><b>NO.</b></td>
										<td width="20%"><b>Item Non PPh</b></td>
										<td width="20%"><b>Item Unsur PPh</b></td>
										<td width="10%"><b>Jumlah</b></td>
										<td width="10%"><b>Harga/Unit</b></td>
										<td width="10%"><b>Total (Rp)</b></td>
										<td width="10%"><b>PPN (Rp)</b></td>
									</tr>
									<?php
									$i = 0 ;
									$cek1 = mysql_query ("SELECT * FROM tabel_estimasi_budget where id_proposal='$hasil[id_proposal]'");
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
										<td align="left"><?php if ($tampil1['jenis_item']=="NON-PPh"){echo $tampil1['keterangan_budget'];}?></td>
										<td align="left"><?php if ($tampil1['jenis_item']=="PPh"){echo $tampil1['keterangan_budget'];}?></td>
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
									<td align="left" valign="top">3. Target Distribusi</td>
									<td align="left" colspan='2'>:
										<table border="1" width="70%">
										<tr align="center">
											<td width="15%"><b>Brand</b></td>
											<td width="10%"><b>Outlet Universe</b></td>
											<td width="10%"><b>Outlet Terdistribusi (%)</b></td>
											<td width="10%"><b>Target Distribusi (%)</b></td>
										</tr>
										<?php
										$ia = 0 ;
										$cek3 = mysql_query ("SELECT * FROM tabel_estimasi_distribusi where id_proposal='$hasil[id_proposal]'");
										while($tampil3 = mysql_fetch_array($cek3)){
										$ia++;
										?>
										<?php if($tampil3['brand']<>""){ ?>
										<tr>
											<td><?php echo $tampil3['brand'];?></td>
											<td align="center"><?php echo $tampil3['outlet_universe'];?></td>
											<td align="right" style="padding-right:5px"><?php echo $tampil3['outlet_terdistribusi'];?></td>
											<td align="right" style="padding-right:5px"><?php echo $tampil3['target_distribusi'];?></td>
										</tr>
										<?php } } ?>
										</table>
									</td>
								</tr>
								<tr>
									<td align="left" valign="top">4. Target Sales</td>
									<td align="left" colspan='2'>:
										<table border="1" width="70%">
										<tr align="center">
											<td width="15%"><b>Brand</b></td>
											<td width="10%"><b>Jml (Bks)</b></td>
											<td width="10%"><b>Harga Per Bks (Rp)</b></td>
											<td width="10%"><b>Total (Rp)</b></td>
										</tr>
										<?php
										$i = 0 ;
										$cek2 = mysql_query ("SELECT * FROM tabel_estimasi_omset where id_proposal='$hasil[id_proposal]'");
										while($tampil2 = mysql_fetch_array($cek2)){
										$i++;
										$sub_total2 = $tampil2['harga_omset'] * $tampil2['jumlah_omset'];
										$jumlah2 = $jumlah2 + $sub_total2;
										?>
										<?php if ($tampil2['keterangan_omset']<>""){ ?>
										<tr>
											<td><?php echo $tampil2['keterangan_omset'];?></td>
											<td align="center"><?php echo $tampil2['jumlah_omset'];?></td>
											<td align="right" style="padding-right:5px"><?php echo number_format($tampil2['harga_omset']);?></td>
											<td align="right" style="padding-right:5px"><?php echo number_format($sub_total2);?></td>
										</tr>
										<?php } } ?>
										
										</table>
									</td>
								</tr>
								<tr>
									<td><br></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td align="left"><a href="javascript:history.back()"><input type="submit" value="Kembali"></a></td>
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