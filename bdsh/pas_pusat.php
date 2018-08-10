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
					
					?>
						<table width="98%" align="left" style="border:1px solid black;padding:5px 5px;margin:10px 5px;">  
						<input type="hidden" name="id" value="<?php echo $hasil['id_proposal'];?>">
						<tr height="10">
							<td width="22%" align="left"><b>Nomor PAS</b></td>
							<td width="1%">:</td>
							<td align="25%"><?php echo $hasil['no_pas'];?></td>
							<td width="5%"><input type="checkbox"></td>
							<td width="45%">SMN</td>
						</tr>
						
						<tr>
							<td align="left"><b>AMC</b></td>
							<td>:</td>
							<td  align="left"><?php echo substr($hasil['nama_ao'],12);?></td>
							<td width="5%"><input type="checkbox" checked></td>
							<td width="45%">KDM</td>
						</tr>
						<tr>
							<td align="left"><b>Ditunjukan Kepada</b></td>
							<td>:</td>
							<td align="left">Brand Manager</td>
						</tr>
						
						<tr>
							<td align="left"><b>CC</b></td>
							<td>:</td>
							<td align="left">Onny Pranata</td>
						</tr>
						
						<tr>
							<td align="left"></td>
							<td></td>
							<td align="left">Aris Moenadi</td>
						</tr>
						<tr>
							<td align="left"></td>
							<td></td>
							<td align="left">Mariah</td>
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
						<table width="98%" align="left">
						<tr>
							<td width="22%" align="left">1. Brand</td>
							<td width="1%">:</td>
							<td width="55%" align="left"><?php echo $hasil['brand'];?></td>
							<td width="5%">PIC</td>
							<td width="15%">: <?php echo $hasil['pic_program'];?></td>
						</tr>
						<tr>
							<td align="left">2. Nama Program</td>
							<td>:</td>
							<td align="left"><?php echo $hasil['nama_program'];?></td>
							<td width="5%">Contact</td>
							<td width="20%">: <?php echo $hasil['pic_contact'];?></td>
						</tr>
						<tr>
							<td align="left">3. Jenis Program</td>
							<td>:</td>
							<td align="left"><?php echo $hasil['jenis_program'];?></td>
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
						<tr>
							<td><br></td>
						</tr>
						</table>
						<!-- Tabel uraian -->
						<table width="90%" border="1" style="margin:5px 20px;border-collapse:collapse;">
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
								<td width="17%" align="left" valign="top">6. Tujuan Program</td>
								<td width="1%"  align="left" valign="top" >:</td>
								<td width="60%" align="left"><?php echo $hasil['tujuan_sasaran'];?></td>
							</tr>
							<tr  height="30">
								<td align="left">7. Target Program</td>
								<td align="left">:</td>
								<td align="left"><?php echo $hasil['target_program'];?></td>
							</tr>
							<tr  height="30">
								<td align="left" valign="top">8. Mekanisme Pelaksanaan</td>
								<td align="left" valign="top">:</td>
								<td align="left"><?php echo $hasil['mekanisme_pelaksanaan'];?></td>
							</tr>
						</table>
						<table>
							<tr>
									<td width="29%" align="left" valign="top">9. Penanggung Jawab</td>
									<td width="1%" align="left" valign="top">:</td>
									<td align="left"><input type="checkbox" name="penanggung_jawab[]" value="Promotion Team PT SML" <?php if (in_array("Promotion Team PT SML", $pj)){echo "Checked";}?> disabled/> Promotion Team PT SML</td>
									<td align="left"><input type="checkbox" name="penanggung_jawab[]" value="HO" <?php if (in_array("HO", $pj)){echo "Checked";}?> disabled/> HO
									</td>
								<tr>
									<td></td>
									<td></td>
									<td align="left"><input type="checkbox" name="penanggung_jawab[]" value="Merchandising Team" <?php if (in_array("Merchandising Team", $pj)){echo "Checked";}?> disabled/> Merchandising Team </td>
									<td align="left"><input type="checkbox" name="penanggung_jawab[]" value="Others" <?php if (in_array("Others", $pj)){echo "Checked";}?> disabled/> Others </td>
								</tr>
						</table><br>
						<table style="margin:0px 120px 0;">
							<tr>
								<td><u>ESTIMASI BIAYA</u></td>
							</tr>
						</table>
						<table width="80%" border='1' style="margin:0px 120px 10;border-collapse:collapse;">
									
									
									<tr align="center">
										<td width="5%" class="td"><b>No</b></td>
										<td width="20%" class="td"><b>Items</b></td>
										<td width="10%" class="td"><b>Titik</b></td>
										<td width="10%" class="td"><b>Satuan</b></td>
										<td width="15%" class="td"><b>Harga/Unit</b></td>
										<td width="20%" class="td"><b>Total (Rp.)</b></td>
										<td width="10%" class="td"><b>Sumber Dana</b></td>
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
									$sub_total_pph = (($sub_total* 100) / (100 - $pph)) - $sub_total;
									$jumlah = $jumlah + $sub_total + $sub_total_pph; 
									?>
									<tr align="center">
										<td class="td"><?php echo $no;?></td>
										<td class="td" align="left"><?php echo $hasil2['keterangan_budget'];?></td>
										<td class="td"><?php echo $hasil2['hari_budget'];?></td>
										<td class="td"><?php echo $hasil2['jumlah_budget'];?></td>
										<td align="right" class="td"><?php echo number_format($hasil2['harga_budget']);?></td>
										<td align="right"class="td" style="padding-right:5px"><?php echo number_format($sub_total);?></td>
										<td align="center" class="td">KDM</td>
									</tr>
									<?php if($hasil2['pph']>0){ ?>
									<tr>
										<td align="center"></td>
										<td align="left"><?php echo $jenis;?></td>
										<td align="center"></td>
										<td align="center"></td>
										<td align="center"></td>
										<td align="right" style="padding-right:5px"><?php echo number_format($sub_total_pph);?></td>
										<td align="center">KDM</td>
									</tr>
									<?php } ?>
									<?php } ?>
									<tr>
										<td colspan="5" class="td"><b>TOTAL</b></td>
										<td align="right" class="td" style="padding-right:5px"><b>Rp. <?php echo number_format($jumlah);?></b></td>
										<td align="center">KDM</td>
									</tr>
									
								</table><br>
						<table table style="margin:0px 120px 0;">
							<tr>
								<td><u>CASH ADVANCE REQUEST (CAR)</u></td>
							</tr>
						</table>
						<table width="80%" border='1' style="margin:0px 120px 10;border-collapse:collapse;">
							<tr align="center">
								<td width="10%" class="td"><b>NO</b></td>
								<td width="30%" class="td"><b>REQUEST DATE</b></td>
								<td width="30%" class="td"><b>VALUE(Rp)</b></td>
								<td width="30%" class="td"><b>REMARKS</b></td>
							</tr>
							<tr>
								<td align="center" class="td"><b><br></b></td>
								<td align="center" class="td"><b><?php echo $hasil3['tgl_permintaan'];?></b></td>
								<td align="right" class="td"><b><?php echo $hasil3['value'];?></b></td>
								<td class="td"><b><?php echo $hasil3['remarks'];?></b></td>
							</tr>
							<tr align="center">
								<td colspan="2" class="td"><b>TOTAL</b></td>
								<td class="td"><?php echo $total1;?></td>
								<td class="td"></td>
							</tr>
						</table>
						
						<table width="100%" align="left">
							<tr>
								<td width="22%" align="left"><b>OVERALL ACHIEVEMENT</b></td>
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
										<table width="95%" border="1" style="border-collapse:collapse;">
											
											<tr align="center">
												<td width="5%" class="td"><b>NO</b></td>
												<td width="25%" class="td"><b>BRAND</b></td>
												<td width="10%" class="td"><b>PACK</b></td>
												<td width="25%" class="td"><b>RETAIL BUYING PRICE</b></td>
												<td width="30%" class="td"><b>TOTAL</b></td>
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
												<td align="center" class="td"><?php echo $no3;?></td>
												<td class="td"><?php echo $hasil5['keterangan_omset'];?></td>
												<td align="center" class="td"><?php echo $hasil5['jumlah_omset'];?></td>
												<td align="right" class="td"><?php echo number_format($hasil5['harga_omset']);?></td>
												<td align="right" class="td"><?php echo number_format($sub_total2);?></td>
											</tr>
											<?php } ?>
											<tr>
												<td colspan="4" align="center" class="td"><b>TOTAL</b></td>
												<td align="right" class="td"><b>Rp. <?php echo number_format($jumlah2);?></b></td>
											</tr>
										</table>
									</td>
								</tr>
						</table>
						<table width="95%" align="right"  style="margin:5px;border:0px solid black;border-collapse:collapse;">
							<tr align="center">
								<td class="td" width="40%"></td>
								<td class="td" width="5%">&nbsp;&nbsp;</td>
								<td class="td" colspan="3" style="border:1px solid black;"> Prepared by,</td>
							</tr>
							<tr align="center">
								<td class="td"></td>
								<td class="td"><br><br><br></td>
								<td class="td" width="15%" style="border:1px solid black;"><img src="../cmr/ttd/<?php echo $hasil['singkatan']."_".$hasil['nama_cmr'].".PNG";?>" width="50px"></td>
								<td class="td" width="15%" style="border:1px solid black;"><img src="../cmr/ttd/<?php echo $hasil['singkatan']."_".$hasil['asm'].".PNG";?>" width="50px"></td>
								<td class="td" width="15%" style="border:1px solid black;"><img src="../cmr/ttd/RPM_<?php echo $hasil['nama_rpm'].".PNG";?>" width="50px"></td>
							</tr>
							<tr align="center">
								<td class="td"></td>
								<td class="td"></td>
								<td class="td" style="border:1px solid black;"><?php echo $hasil['nama_cmr'];?></td>
								<td class="td" style="border:1px solid black;"><?php echo $hasil['asm'];?></td>
								<td class="td" style="border:1px solid black;"><?php echo $hasil['nama_rpm'];?></td>
							</tr>
							<tr align="center">
								<td class="td"></td>
								<td class="td"></td>
								<td class="td" width="15%" style="border:1px solid black;">CMR</td>
								<td class="td" width="15%" style="border:1px solid black;">ASM</td>
								<td class="td" width="15%" style="border:1px solid black;">RPM</td>
							</tr>
						</table><br>
						<table width="95%" align="right"  style="margin:5px;border:0px solid black;border-collapse:collapse;">
							<tr align="center">
								<td class="td" width="40%" style="border:1px solid black;">Approved by,</td>
								<td class="td" width="5%">&nbsp;&nbsp;</td>
								<td class="td" width="45%"style="border:1px solid black;"> Acknowledged by,</td>
							</tr>
							<tr align="center">
								<td class="td" style="border:1px solid black;"></td>
								<td class="td"><br><br><br></td>
								<td class="td" style="border:1px solid black;"><img src="../cmr/ttd/RM.PNG" width="50px"></td>
							</tr>
							<tr align="center">
								<td class="td" style="border:1px solid black;">Indah Suryatini</td>
								<td class="td"></td>
								<td class="td" style="border:1px solid black;">Gunadi Harjono</td>
							</tr>
							<tr align="center">
								<td class="td" style="border:1px solid black;">Brand Manager</td>
								<td class="td"></td>
								<td class="td" style="border:1px solid black;">Regional Marketing Manager</td>
								</tr>
						</table><br>
						</td>
						</tr>
						</table>
					</td>
				</tr>
			</table>