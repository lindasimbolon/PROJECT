	<?php include "../koneksi.php";?>
<style>
#kotak {
	padding		: 2px 10px;
	border 		: 2px solid black;
	text-align	: center;
}
</style>
	<table width="80%" align="center" style="border:1px solid black;">
				<tr>
					<td colspan="2" align="center" style="padding:5px 5px 0px 5px;font-size:14px;"><b>PROPOSAL AUTHORIZATION SUPPORT (PAS)</b></td>
				</tr>
				<tr>
					<td>
					<?php 
					$id 	= $hasil1['id_pas'];
					$sql 	= mysql_query("SELECT * FROM tabel_pas d, tabel_proposal a, tabel_tipe_program b, tabel_jenis_program c, tabel_cmr e,
						  tabel_ao f where a.id_cmr=e.id_cmr and e.id_ao=f.id_ao and d.id_proposal=a.id_proposal and a.id_tipe_program=b.id_tipe_program and b.id_jenis_program=c.id_jenis_program 
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
						<table width="98%" align="left" style="border:1px solid black;padding:5px 5px;margin:10px 5px;">  
						<input type="hidden" name="id" value="<?php echo $hasil['id_proposal'];?>">
						<tr height="10">
							<td width="22%" align="left">Nomor PAS</td>
							<td width="1%">:</td>
							<td colspan="2" align="left"><?php echo $hasil['no_pas'];?></td>
						</tr>
						
						<tr>
							<td align="left">AMC</td>
							<td>:</td>
							<td  align="left" colspan="2"><?php echo substr($hasil['nama_ao'],12);?></td>
						</tr>
						<tr>
							<td align="left">Ditunjukan Kepada</td>
							<td>:</td>
							<td align="left" colspan="2">Direksi</td>
						</tr>
						<tr>
							<td align="left">CC</td>
							<td>:</td>
							<td align="left" colspan="2">BDM</td>
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
							<td align="left" colspan="2"><?php echo $hasil['nama_program'];?></td>
						</tr>
						<?php
						$pilihan = $hasil['jenis_program'];
						if(($pilihan=="EVENT")or($pilihan=="SPONSHORSHIP")or($pilihan=="CONSUMER PROMO")){
						$pilih = "EVENT";
						}elseif(($pilihan=="POSM")or($pilihan=="MERCHANDISE")){
						$pilih= "BRANDING";
						}elseif($pilihan=="TRADE PROMO"){
						$pilih= "TRADE PROMO";
						}else{
						$pilih= "DIRECT SELLING";
						}
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
							<td align="left">: <?php echo $hasil['lokasi_kecamatan'];?></td>
						</tr>
						<tr>
							<td align="left"></td>
							<td></td>
							<td align="left">Titik Lokasi</td>
							<td align="left">:  <?php echo $hasil['lokasi'];?></td>
						</tr>
						<tr>
							<td><br></td>
						</tr>
						<tr>
							<td align="left">5. Periode Pelaksanaan</td>
							<td>:</td>
							<td align="left">Week </td>
							<td align="left">: <?php if($week<>$week1){ ?>
							<?php echo $week;?> s/d <?php echo $week1; } else {echo $week;}?></td>
						</tr>
						<tr>
							<td align="left"></td>
							<td></td>
							<td align="left">Tanggal</td>
							<td align="left">: <?php if($hasil['akhir_pelaksanaan']<>""){ ?> 
							<?php echo tgl_indo($hasil['mulai_pelaksanaan']);?> s/d <?php echo tgl_indo($hasil['akhir_pelaksanaan']); } else {?> <?php echo tgl_indo($hasil['mulai_pelaksanaan']);}?></td>
						</tr>
						<tr>
							<td><br></td>
						</tr>
						</table>
						
						<table width="100%">
							<tr height="30">
								<td width="21%" align="left" valign="top">6. Latar Belakang</td>
								<td width="1%"  align="left" valign="top" >:</td>
								<td width="70%" align="left"><?php echo $hasil['latar_belakang'];?></td>
							</tr>
							<tr>
								<td><br></td>
							</tr>
							<tr height="30">
								<td width="21%" align="left" valign="top">7. Tujuan Program</td>
								<td width="1%"  align="left" valign="top" >:</td>
								<td width="70%" align="left"><?php echo $hasil['tujuan_sasaran'];?></td>
							</tr>
							<tr>
								<td><br></td>
							</tr>
							<tr  height="30">
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
											<td width="25%" class="td">Brand</td>
											<td width="15%" class="td">Outlet Universe</td>
											<td width="25%" class="td">Outlet terdistribusi (%)</td>
											<td width="25%" class="td">Target Distribusi (%)</td>
										</tr>
											<?php
										$ia = 0 ;
										$cek3 = mysql_query ("SELECT * FROM tabel_estimasi_distribusi where id_proposal='$hasil[id_proposal]'");
										while($tampil3 = mysql_fetch_array($cek3)){
										$ia++;
										?>
										<tr>
											<td><?php echo $tampil3['brand'];?></td>
											<td align="center"><?php echo $tampil3['outlet_universe'];?></td>
											<td align="right" style="padding-right:5px"><?php echo $tampil3['outlet_terdistribusi'];?></td>
											<td align="right" style="padding-right:5px"><?php echo $tampil3['target_distribusi'];?></td>
										</tr>
										<?php } ?>
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
										<tr>
											<td class="td"><?php echo $hasil5['keterangan_omset'];?></td>
											<td align="center" class="td"><?php echo $hasil5['jumlah_omset'];?></td>
											<td align="right" class="td"><?php echo number_format($hasil5['harga_omset']);?></td>
											<td align="right" class="td"><?php echo number_format($sub_total2);?></td>
										</tr>
										<?php } ?>
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
								<td class="td" style="border-top:0px solid black;"></td>
								<td class="td" colspan="2" style="border:1px solid black;border-collapse:collapse;">BANDAR LAMPUNG, <?php echo tgl_indo($hasil['tgl_persetujuan_rm']);?></td>
							</tr>
							<tr align="center">
								<td class="td" colspan="2" style="border:1px solid black;border-collapse:collapse;">Diajukan Oleh,</td>
								<td class="td" style="border-top:0px solid black;"></td>
								<td class="td" align="center" style="border:1px solid black;border-collapse:collapse;">Diperiksa oleh,</td>
								<td class="td" align="center" style="border:1px solid black;border-collapse:collapse;">Disetujui oleh,</td>
							</tr>
							<?php
							$id 	= $hasil1['id_pas'];
							$sql1 	= mysql_query("SELECT f.singkatan, e.nama_cmr, f.asm, f.nama_rpm, d.persetujuan_rm, d.persetujuan_rpm, d.persetujuan_asm FROM tabel_pas d, tabel_proposal a, tabel_tipe_program b, tabel_jenis_program c, tabel_cmr e,
								  tabel_ao f where a.id_cmr=e.id_cmr and e.id_ao=f.id_ao and d.id_proposal=a.id_proposal and a.id_tipe_program=b.id_tipe_program and b.id_jenis_program=c.id_jenis_program 
											   and d.id_pas='$id'");
							$hasil1 	= mysql_fetch_array($sql1);
							?> 
							<tr align="center">
								<td class="td" width="20%" style="border:1px solid black;border-collapse:collapse;">
									<img src="../cmr/ttd/<?php echo $hasil1['singkatan']."_".$hasil1['nama_cmr'].".PNG";?>" width="85px">
								</td>
							
								<td class="td" width="20%" style="border:1px solid black;border-collapse:collapse;">
								<?php
								if($hasil1['persetujuan_asm']=='Disetujui'){
								?>
									<img src="../cmr/ttd/<?php echo $hasil1['singkatan']."_".$hasil1['asm'].".PNG";?>" width="85px">
								<?php } ?>
								</td>
								<td class="td" width="9%"><br><br><br></td>
								<td class="td" width="20%" style="border:1px solid black;border-collapse:collapse;">
								<?php
								if($hasil1['persetujuan_rpm']=='Disetujui'){
								?>
									<img src="../cmr/ttd/RPM_<?php echo $hasil1['nama_rpm'].".PNG";?>" width="85px">
								<?php } ?>
								</td>
								
								<td class="td" width="20%" style="border:1px solid black;border-collapse:collapse;">
								<?php
								if($hasil1['persetujuan_rm']=='Disetujui'){
								?>
									<img src="../cmr/ttd/DIREKSI_Gunadi Harjono.PNG" width="85px">
								<?php } ?>
								</td>
							</tr>
							<tr align="center">
								<td class="td" style="border:1px solid black;border-collapse:collapse;"><?php echo $hasil['nama_cmr'];?></td>
								<td class="td" style="border:1px solid black;border-collapse:collapse;"><?php echo $hasil['asm'];?></td>
								<td class="td"></td>
								<td class="td" style="border:1px solid black;border-collapse:collapse;"><?php echo $hasil['nama_rpm'];?></td>
								<td class="td" style="border:1px solid black;border-collapse:collapse;">GUNADI HARJONO</td>
							</tr>
							<tr align="center">
								<td class="td" style="border:1px solid black;border-collapse:collapse;"><b>CMR</b></td>
								<td class="td" style="border:1px solid black;border-collapse:collapse;"><b>ASM</b></td>
								<td class="td"></td>
								<td class="td" style="border:1px solid black;border-collapse:collapse;"><b>RPM</b></td>
								<td class="td" style="border:1px solid black;border-collapse:collapse;"><b>RM</b></td>
							</tr>
						</table><br>
						
						
					</td>
				</tr>
			</table>