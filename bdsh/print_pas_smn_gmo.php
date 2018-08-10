<html>
<?php 
include "fungsi_indotgl.php";
include "../koneksi.php";
error_reporting(1);?>
<head>
<title style="font-size:8px">PAS ONLINE</title>
	<style>
	p{
		line-height:10px;
		font-family:calibri;
		font-size:10px;
		text-align: justify;
	}
	body{
		font-family:calibri;
		font-size:10px;
	}
	td{
		font-family:calibri;
		font-size:10px;
	}
	#lingkaran {
		width			: auto;
		padding			: 5px;
		border-radius	: 100%;
		border 			: 2px solid red;
		text-align		: center;
    }
	#kotak {
		padding			: 2px 10px;
		border 			: 2px solid black;
		text-align		: center;
     }
	</style>
</head>
<body>
		<form action="data_proposal.sml" method="POST">
			<table width="100%" align="center" style="border:1px solid black;">
				<tr>
					<td colspan="2" align="center" style="padding:5px 5px 0px 5px;font-size:14px;"><b>PROPOSAL AUTHORIZATION SUPPORT (PAS)</b></td>
				</tr>
				<tr>
					<td>
					<?php 
					 
					$id 	= $_GET['id'];
					$sql 	= mysql_query("SELECT a.id_proposal,d.no_pas,f.nama_ao,a.brand,d.program,c.jenis_program,a.lokasi_territory,a.lokasi_kecamatan,a.lokasi,a.mulai_pelaksanaan,a.akhir_pelaksanaan,
							  a.latar_belakang,a.tujuan_sasaran,a.mekanisme_pelaksanaan,a.target_audience,a.target_contact,d.tgl_persetujuan_asm,d.tgl_persetujuan_rm,e.nama_cmr,f.asm,f.nama_rpm,f.singkatan
							  FROM tabel_pas d, tabel_proposal a, tabel_tipe_program b, tabel_jenis_program c, tabel_cmr e, tabel_ao f where a.id_cmr=e.id_cmr 
							  and e.id_ao=f.id_ao and d.id_proposal=a.id_proposal and a.id_tipe_program=b.id_tipe_program and b.id_jenis_program=c.id_jenis_program and d.id_pas='$id'");
					$hasil 	= mysql_fetch_array($sql);
					$pj 	= explode(",",$hasil['penanggung_jawab']);
					$tanggal	= $hasil['mulai_pelaksanaan'];
					$date 		= new DateTime($tanggal);
					$week 		= $date->format("W");
					
					if($hasil['akhir_pelaksanaan']<>''){
					$tanggal1	= $hasil['akhir_pelaksanaan'];
					$date1 		= new DateTime($tanggal1);
					$week1 		= $date1->format("W");
					}else{
					$week1 		= $week;
					}
					?>
						<table width="98%" align="left" style="border:1px solid black;padding:5px 5px;margin:10px 5px;">  
						<input type="hidden" name="id" value="<?php echo $hasil['id_proposal'];?>">
						<tr>
							<td width="22%" align="left">Nomor PAS</td>
							<td width="1%">:</td>
							<td align="60%" colspan="2"><?php echo $hasil['no_pas'];?></td>
						</tr>
						<tr>
							<td align="left">RMC</td>
							<td>:</td>
							<td  align="left" colspan="2">SML</td>
						</tr>
						<tr>
							<td align="left">AMC</td>
							<td>:</td>
							<td  align="left" colspan="2"><?php echo substr($hasil['nama_ao'],12);?></td>
						</tr>
						<tr>
							<td align="left">Ditunjukan Kepada</td>
							<td>:</td>
							<td align="left" colspan="2">RUDI SUTANTO</td>
						</tr>
						<tr>
							<td align="left">CC</td>
							<td>:</td>
							<td align="left" colspan="2">IWAN BUDI WIRATMANA</td>
						</tr>
						<tr>
							<td align="left"></td>
							<td></td>
							<td align="left" colspan="2">GUMIRA DINANSYAH</td>
						</tr>
						<tr>
							<td align="left"></td>
							<td></td>
							<td align="left" colspan="2">CHARISNA</td>
						</tr>
						</table>
						<table>
						<tr>
							<td colspan="3" align="left" style="padding:0px 5px 0px 5px;font-size:12px;"><b>PROGRAM DESCRIPTIONS</b></td>
						</tr>
						</table>
						<table width="98%" align="left" style="border:1px solid black;padding:5px 5px;margin:10px 5px;">
						<tr>
							<td>
						<table  align="left">
						<tr>
							<td align="left" width="18%">1. Brand</td>
							<td width="1%">:</td>
							<td align="left" width="60%" colspan="2"><?php echo $hasil['brand'];?></td>
						</tr>
						<tr>
							<td align="left">2. Nama Program</td>
							<td>:</td>
							<td align="left" colspan="2"><?php echo $hasil['program'];?></td>
						</tr>
						<?php
						$pilih = $hasil['jenis_program'];
						
						?>
						<tr>
							<td align="left">3. Jenis Program</td>
							<td>:</td>
							<td align="left" colspan="2">
							<label id="kotak"><?php if($pilih=="DIRECT SELLING"){echo "&#x2713";}else{echo "&nbsp;&nbsp;";}?></label>&nbsp;<label>Direct Selling</label>
							&nbsp;&nbsp;&nbsp;&nbsp;<label id="kotak"><?php if($pilih=="EVENT"){echo "&#x2713";}else{echo "&nbsp;&nbsp;";}?></label>&nbsp;<label>Event</label>
							&nbsp;&nbsp;&nbsp;&nbsp;<label id="kotak"><?php if($pilih=="BRANDING"){echo "&#x2713";}else{echo "&nbsp;&nbsp;";}?></label>&nbsp;<label>Branding</label>
							&nbsp;&nbsp;&nbsp;&nbsp;<label id="kotak"><?php if($pilih=="TRADE PROMO"){echo "&#x2713";}else{echo "&nbsp;&nbsp;";}?></label>&nbsp;<label>Trade Promo</label></td>
						</tr>
						<tr>
							<td align="left">4. Lokasi</td>
							<td>:</td>
							<td align="left" width="6%">MPC</td>
							<td align="left">: <?php echo $hasil['lokasi_territory'];?></td>
						</tr>
						<tr>
							<td align="left"></td>
							<td></td>
							<td align="left">Kab/Kec</td>
							<td>: <?php echo $hasil['lokasi_kecamatan'];?></td>
						</tr>
						<tr>
							<td align="left"></td>
							<td></td>
							<td align="left">Titik Lokasi</td>
							<td>:  <?php echo $hasil['lokasi'];?></td>
						</tr>
						<tr>
							<td align="left">5. Periode Pelaksanaan</td>
							<td>:</td>
							<td align="left">Week </td>
							<td align="left">: <?php if($week>$week1){echo $week.'s/d'.$week1;} else {echo $week;}?></td>
						</tr>
						<tr height="20">
							<td align="left"></td>
							<td></td>
							<td align="left">Tanggal</td>
							<td>: <?php if($hasil['akhir_pelaksanaan']<>""){ ?> 
							<?php echo tgl_indo($hasil['mulai_pelaksanaan']);?> s/d <?php echo tgl_indo($hasil['akhir_pelaksanaan']); } else {?> <?php echo tgl_indo($hasil['mulai_pelaksanaan']);}?></td>
						</tr>
						<tr>
							<td><br></td>	
						</tr>
						</table>
						<table width="100%">
							<tr>
								<td width="21%" align="left" valign="top">6. Latar Belakang</td>
								<td width="1%"  align="left" valign="top" >:</td>
								<td width="70%" align="left"><?php echo $hasil['latar_belakang'];?></td>
							</tr>
							<tr>
								<td><br></td>
							</tr>
							<tr>
								<td width="21%" align="left" valign="top">7. Tujuan Program</td>
								<td width="1%"  align="left" valign="top" >:</td>
								<td width="70%" align="left"><?php echo $hasil['tujuan_sasaran'];?></td>
							</tr>
							<tr>
							<td><br></td>
							</tr>
							<tr >
								<td align="left" valign="top">8. Mekanisme Pelaksanaan</td>
								<td align="left" valign="top">:</td>
								<td align="left"><?php echo $hasil['mekanisme_pelaksanaan'];?></td>
							</tr>
							<tr>
								<td><br></td>
							</tr>
							<tr>
								<td align="left" valign="top">9. Estimasi Biaya</td>
								<td align="left" valign="top">:</td>
								<td width="5%" class="td">
									<table border="1" width="100%" style="margin:0px 0px 0px;border-collapse:collapse;">
										<tr align="center">
										<td width="5%">NO</td>
										<td width="20%" class="td">Item non Pph</td>
										<td width="20%" class="td">Item unsur Pph</td>
										<td width="5%" class="td">Jumlah</td>
										<td width="10%" class="td">Harga/Unit</td>
										<td width="10%" class="td">Total (Rp.)</td>
										<td width="10%" class="td">PPN (Rp.)</td>
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
									</table>
								</td>
						</table>
						<table width="100%" align="left">
							<tr>
								<td width="22%" align="left"><b>Overall Achievement</b></td>
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
								<td align="left" valign="top">:</td>
								<td class="td">
									<table width="90%" border="1" style="border-collapse:collapse;">
										<tr align="center">
											<td width="25%" rowspan="2" class="td">Brand</td>
											<td width="15%" rowspan="2" class="td">Outlet Universe</td>
											<td colspan="2" class="td">Outlet terdistribusi (%)</td>
											<td width="25%" rowspan="2" class="td">Target Distribusi (%)</td>
										</tr>
										<tr  align="center">
											<td width="10%">( % )</td>
											<td width="10%">( Qty )</td>
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
											<td align="right" style="padding-right:5px"><?php echo $tampil3['outlet_terdistribusi2'];?></td>
											<td align="right" style="padding-right:5px"><?php echo $tampil3['target_distribusi'];?></td>
										</tr>
										<?php } }?>
									</table>
								</td>
							</tr>
							<tr>
								<td><br></td>
							</tr>
							<tr>
								<td align="left" valign="top">4. Target Sales</td>
								<td align="left" valign="top">:</td>
								<td class="td">
									<table width="90%" border="1" style="border-collapse:collapse;">
										<tr align="center">
											<td width="25%" class="td">Brand</td>
											<td width="15%" class="td">Jml (bks)</td>
											<td width="25%" class="td">Harga per bks (Rp)</td>
											<td width="25%" class="td">Total (Rp)</td>
										</tr>
											<?php
												$no3=0;
												$sql5=mysql_query("SELECT * FROM tabel_estimasi_omset where id_proposal='$hasil[id_proposal]'");
												while($hasil5=mysql_fetch_array($sql5)){
												$no3++;
												$sub_total2 = $hasil5['harga_omset'] * $hasil5['jumlah_omset'];
												$jumlah2 = $jumlah2 + $sub_total2;
											?>
										<?php if($hasil5['keterangan_omset']<>""){ ?>
										<tr>
											<td class="td"><?php echo $hasil5['keterangan_omset'];?></td>
											<td align="center" class="td"><?php echo $hasil5['jumlah_omset'];?></td>
											<td align="right" class="td"><?php echo number_format($hasil5['harga_omset']);?></td>
											<td align="right" class="td"><?php echo number_format($sub_total2);?></td>
										</tr>
										<?php } } ?>
									</table>
								</td>
							</tr>
						</table>
						<table width="98%" align="right" style="margin:5px;border:0px solid black;border-collapse:collapse;">
							<tr align="center">
								<td><br></td>
								<td></td>
							</tr>
							<tr align="center">
								<td class="td" colspan="2" style="border:1px solid black;border-collapse:collapse;"><?php echo $hasil['lokasi_territory'];?>, <?php echo tgl_indo($hasil['tgl_persetujuan_asm']);?></td>
								<td class="td" colspan="2" style="border-top:1px solid black;">BANDAR LAMPUNG, <?php echo tgl_indo($hasil['tgl_persetujuan_rm']);?></td>
								<td class="td" colspan="2" style="border:1px solid black;border-collapse:collapse;"></td>
							</tr>
							<tr align="center">
								<td class="td" colspan="2" style="border:1px solid black;border-collapse:collapse;">Diajukan Oleh,</td>
								<td class="td" colspan="2" align="center" style="border:1px solid black;border-collapse:collapse;">Diperiksa oleh,</td>
								<td class="td" colspan="2" align="center" style="border:1px solid black;border-collapse:collapse;">Disetujui oleh,</td>
							</tr>
							<tr align="center">
								<td class="td" width="15%" style="border:1px solid black;border-collapse:collapse;">
									<img src="../cmr/ttd/<?php echo $hasil['singkatan']."_".$hasil['nama_cmr'].".PNG";?>" width="85px">
								</td>
								<td class="td" width="15%" style="border:1px solid black;border-collapse:collapse;">
									<img src="../cmr/ttd/<?php echo $hasil['singkatan']."_".$hasil['asm'].".PNG";?>" width="85px">
								</td>
								<td class="td" width="15%" style="border:1px solid black;border-collapse:collapse;">
									<img src="../cmr/ttd/RPM_<?php echo $hasil['nama_rpm'].".PNG";?>" width="85px">
								</td>
								
								<td class="td" width="15%" style="border:1px solid black;border-collapse:collapse;">
									<img src="../cmr/ttd/DIREKSI_Gunadi Harjono.PNG" width="85px">
								</td>
								<td class="td" width="15%" style="border:1px solid black;border-collapse:collapse;"><br><br><br></td>
								<td class="td" width="15%" style="border:1px solid black;border-collapse:collapse;"><br><br><br></td>
								
							</tr>
							<tr align="center">
								<td class="td" style="border:1px solid black;border-collapse:collapse;"><?php echo $hasil['nama_cmr'];?></td>
								<td class="td" style="border:1px solid black;border-collapse:collapse;"><?php echo $hasil['asm'];?></td>
								<td class="td" style="border:1px solid black;border-collapse:collapse;"><?php echo $hasil['nama_rpm'];?></td>
								<td class="td" style="border:1px solid black;border-collapse:collapse;">GUNADI HARJONO</td>
								<td class="td" style="border:1px solid black;border-collapse:collapse;"></td>
								<td class="td" style="border:1px solid black;border-collapse:collapse;"></td>
								
							</tr>
							<tr align="center">
								<td class="td" style="border:1px solid black;border-collapse:collapse;"><b>CMR</b></td>
								<td class="td" style="border:1px solid black;border-collapse:collapse;"><b>ASM</b></td>
								<td class="td" style="border:1px solid black;border-collapse:collapse;"><b>RPM</b></td>
								<td class="td" style="border:1px solid black;border-collapse:collapse;"><b>RM</b></td>
								<td class="td" style="border:1px solid black;border-collapse:collapse;"><b>GMO</b></td>
								<td class="td" style="border:1px solid black;border-collapse:collapse;"><b>BDM</b></td>
								
							</tr>
						</table><br>
						
						
					</td>
				</tr>
			</table>
<script>
	window.load = print_d();
	function print_d(){
	window.print();
	}
</script>			
		</form>

</body>
</html>