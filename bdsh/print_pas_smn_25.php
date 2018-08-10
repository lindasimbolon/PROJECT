<html>
<?php 
include "fungsi_indotgl.php";
include "../koneksi.php";
error_reporting(0);?>
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
					<?php $lokasi_kerja = $_SESSION['lokasi_kerja'];  ?>
					<?php 
					 
					$id 	= $_GET['id'];
					$username 	= $_GET['username'];
					$sql 	= mysql_query("SELECT * FROM tabel_proposal a, tabel_tipe_program b, tabel_jenis_program c, tabel_pas d, tabel_ms e, tabel_area f, tabel_user g where d.id_proposal=a.id_proposal and ((a.id_tipe_program=b.id_tipe_program and b.id_jenis_program=c.id_jenis_program) or (a.id_jenis_program=c.id_jenis_program)) and d.id_pas='".$id."' and d.id_ms=e.id_ms and d.id_ms=f.id_ms and f.singkatan=g.lokasi_kerja group by d.id_pas");
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
						<tr height="10">
							<td width="5%" align="left">Jenis Pilar</td>
							<td >:</td>
							<td align="left"><?php echo $hasil['jenis_program'];?></td>
						</tr>
						<tr height="10">
							<td width="12%" align="left">Nomor Pas</td>
							<td width="1%">:</td>
							<td width="70%" align="left"><?php echo $hasil['no_pas']; ?></td>
						</tr>
						<tr>
							<td align="left">Regional Office</td>
							<td>:</td>
							<td  align="left" colspan="2"><?php echo $hasil['regional_office']; ?></td>
						</tr>
						<tr>
							<td align="left">Area Office</td>
							<td>:</td>
							<td  align="left" colspan="2"><?php echo substr($hasil['area_office'],12);?></td>
						</tr>
						<tr>
							<td align="left">Brand</td>
							<td>:</td>
							<td align="left"><?php echo $hasil['brand'];?></td>
						</tr>
						<tr>
							<td align="left">Kategori Area</td>
							<td>:</td>
							<td align="left"><?php echo $hasil['kategori_area'];?></td>
						</tr>
						</table>
						<table>
						<tr>
							<td colspan="3" align="left" style="padding:0px 5px 0px 5px;font-size:10px;"><b>PROGRAM DESCRIPTIONS</b></td>
						</tr>
						</table>
						<table width="98%" align="left" style="border:1px solid black;padding:5px 5px;margin:10px 5px;">
						<tr>
							<td>
						<table  align="left">
						<tr height="30">
							<td align="left">1. Nama Program</td>
							<td>:</td>
							<td align="left" width="60%" colspan="2"><?php echo $hasil['program'];?></td>
						</tr>
						
						<tr height="30">
							<td align="left">2. Lokasi</td>
							<td>:</td>
							<td align="left">POS / Stock Point &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $hasil['lokasi_territory'];?></td>
						</tr>
						<tr>
							<td align="left">&nbsp;&nbsp;&nbsp;</td>
							<td></td>
							<td  width="90%" align="left">Kab/Kec &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $hasil['lokasi_kabupaten'];?> / <?php echo $hasil['lokasi_kecamatan'];?></td>
						</tr>
						</tr>
						<!--<tr height="30">
							<td align="left"></td>
							<td></td>
							<td align="left">Titik Lokasi : <?php echo $hasil['lokasi'];?></td>
						</tr>-->
						<tr height="30">
							<td align="left">3. Periode Pelaksanaan</td>
							<td>:</td>
							<td align="left">Start Week&nbsp;&nbsp; &nbsp;: <?php echo $hasil['week1'];?> End Week: <?php echo $hasil['week2'];?>
							</td>
						</tr>
						<!--<tr height="30">
							<td align="left"></td>
							<td></td>
							<td align="left">Tanggal :<?php if($hasil['akhir_pelaksanaan']<>""){ ?> 
							<?php echo tgl_indo($hasil['mulai_pelaksanaan']);?> s/d <?php echo tgl_indo($hasil['akhir_pelaksanaan']); } else {?> <?php echo tgl_indo($hasil['mulai_pelaksanaan']);}?></td>
						</tr>-->
						<tr>
							<td><br></td>
						</tr>
						</table>
						<table width="100%">
							<tr>
								<td width="21%" align="left" valign="top">4. Latar Belakang</td>
								<td width="1%"  align="left" valign="top" >:</td>
								<td width="70%" align="left" style="border:1px solid black"><?php echo $hasil['latar_belakang'];?></td>
							</tr>
							<tr>
								<td><br></td>
							</tr>
							<tr>
								<td width="21%" align="left" valign="top">5. Objective</td>
								<td width="1%"  align="left" valign="top" >:</td>
								<td width="70%" align="left"><?php echo $hasil['tujuan_sasaran'];?></td>
							</tr>
							<tr>
							<td><br></td>
							</tr>
							<tr >
								<td align="left" valign="top">6. Mekanisme Program</td>
								<td align="left" valign="top">:</td>
								<td align="left"><?php echo $hasil['mekanisme_pelaksanaan'];?></td>
							</tr>
							<tr>
								<td><br></td>
							</tr>
							<tr>
								<td align="left" valign="top">7. Estimasi Biaya</td>
								<td align="left" valign="top">:</td>
								<td width="5%" class="td">
								<!--<table border="1"  width="80%" style="margin: 0 0px;color:black;">-->
								<table border="1" width="100%" style="margin:0px 0px 0px;border-collapse:collapse;">
									<tr align="center">
										<td rowspan="2" width="5%"><b>NO.</b></td>
										<td rowspan="2" width="20%"><b>Item</b></td>
										<td rowspan="2" width="20%"><b>Category</b></td>
										<td rowspan="2" width="10%"><b>QTY</b></td>
										<td rowspan="2" width="10%"><b>Freq</b></td>
										<td rowspan="2" width="10%"><b>Harga / Unit</b></td>
										<td rowspan="2" width="10%"><b>Jenis Pembayaran</b></td>
										<td colspan="2"><b>Pajak</b></td>
										<td colspan="2"><b>PPH</b></td>
										<td colspan="2"><b>PPN</b></td>
										<td rowspan="2" width="10%"><b>Total Biaya</b></td>
										<td rowspan="2" width="10%"><b>Total Bayar</b></td>
									</tr>
									<tr>
										<td align="center" style="color:black"><b>Pihak Penerima</b></td>
										<td align="center" style="color:black"><b>Jenis Pajak</b></td>
									
										<td align="center" style="color:black"><b>(%)</b></td>
										<td align="center" style="color:black"><b>(Rp)</b></td>
									
										<td align="center" style="color:black"><b>(%)</b></td>
										<td align="center" style="color:black"><b>(Rp)</b></td>
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
										<td align="left"><?php echo $tampil1['keterangan_budget'];?></td>
										<td align="left"><?php echo $tampil1['kategori_budget'];?></td>
										<td align="center"><?php echo $tampil1['qty'];?></td>
										<td align="right" style="padding-right:5px"><?php echo number_format($tampil1['freq']);?></td>
										<td align="right" style="padding-right:5px"><?php echo number_format($tampil1['harga_budget']);?></td>
										<td align="right" style="padding-right:5px"><?php echo $tampil1['jenis_pembayaran'];?></td>
										<td align="right" style="padding-right:5px"><?php echo $tampil1['pihak_penerima'];?></td>
										<td align="right" style="padding-right:5px"><?php echo $tampil1['jenis_pajak'];?></td>
										<td align="right" style="padding-right:5px"><?php echo $tampil1['persen_pph'];?></td>
										<td align="right" style="padding-right:5px"><?php echo $tampil1['pph'];?></td>
										<td align="right" style="padding-right:5px"><?php echo $tampil1['persen_ppn'];?></td>
										<td align="right" style="padding-right:5px"><?php echo $tampil1['ppn'];?></td>
										<td align="right" style="padding-right:5px"><?php echo $tampil1['total_biaya'];?></td>
										<td align="right" style="padding-right:5px"><?php echo $tampil1['total_bayar'];?></td>
									</tr>
									<?php } ?>
									<?php
									$cek1 = mysql_query ("SELECT sum(ppn) as sumppn, sum(total_biaya) as sumtotalbiaya, sum(total_bayar) as sumtotalbayar FROM tabel_estimasi_budget where id_proposal='$hasil[id_proposal]'");
									while($tampil1 = mysql_fetch_array($cek1)){
									$jumlahbiaya 			= $tampil1['sumppn'] + $tampil1['sumtotalbiaya']; 
									$jumlahbayar 			= $tampil1['sumppn'] + $tampil1['sumtotalbayar']; 
									?>
									</tr>
									<!--<tr>
										<td colspan="13" align="left"><b>Agency Fee</b></td>
										<td align="right" style="padding-right:5px"><?php echo $tampil1['sumtotalbiaya'];?></td>
										<td align="right" style="padding-right:5px"><?php echo $tampil1['sumtotalbayar'];?></td>
									</tr>-->
									<tr>
										<td colspan="13" align="left"><b>Total Biaya (Rp)</b></td>
										<td align="right" style="padding-right:5px"><?php echo $tampil1['sumtotalbiaya'];?></td>
										<td align="right" style="padding-right:5px"><?php echo $tampil1['sumtotalbayar'];?></td>
									</tr>
									<?php } ?>
									<tr>
										<td colspan="13" align="left"><b>Total INC PPN</b></td>
										<td align="center" style="padding-right:5px"><?php echo number_format($jumlahbiaya);?></td>
										<td align="center" style="padding-right:5px"><?php echo number_format($jumlahbayar);?></td>
									</tr>
									</table><br>
								</td>
						</table>
						<table width="100%" align="left">
							<tr>
								<td width="22%" align="left"><b>9. Overall Achievement</b></td>
								<td width="1%"  align="left"></td>
								<td align="left"></td>
							</tr>
							<tr>
								<td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jenis Program</td>
								<td align="left">:</td>
								<td align="left"><?php echo $hasil['jenis_target']?></td>
							</tr>
							
							<tr>
									<td align="left" valign="top"></td>
									<td align="left" colspan='2'>
										<table border="1" width="90%" style="border-collapse:collapse;">
										<?php 
											$cari_target = mysql_fetch_array(mysql_query("SELECT distinct(nama_target) as nama FROM tabel_target WHERE id_proposal='$hasil[id_proposal]' and jenis_target='Target 1'"));
											$cari_target1 = mysql_fetch_array(mysql_query("SELECT distinct(nama_target) as nama FROM tabel_target WHERE id_proposal='$hasil[id_proposal]' and jenis_target='Target 2'"));
											$cari_target2 = mysql_fetch_array(mysql_query("SELECT distinct(nama_target) as nama FROM tabel_target WHERE id_proposal='$hasil[id_proposal]' and jenis_target='Target 3'"));
											
										?>
										<tr>
											<td align="center" width="15%" rowspan="2"><b>Brand</b></td>
											<td colspan="2" align="center"><b>&nbsp;Target Outlet </b></td>
											<td rowspan="2" align="center"><b>&nbsp;Target Selling </b></td>
											<td rowspan="2" align="center"><b>&nbsp;Tgt Cangkang / Slof </b></td>
											<td rowspan="2" align="center"><b>&nbsp;Tgt Cons Contact </b></td>
											<td rowspan="2" align="center"><b>&nbsp;Target Trial </b></td>
											<td rowspan="2" align="center"><b>&nbsp;Target Audience </b></td>
											<td rowspan="2" align="center"><b>&nbsp;Target Titik </b></td>
											
										</tr>
									
										<tr align="center">
											<td width="10%"><b>Current</b></td>
											<td width="10%"><b>Target</b></td>
										</tr>
										<?php
										$ia = 0 ;
										$cek3 = mysql_query ("SELECT distinct(nama_brand) FROM tabel_target where id_proposal='$hasil[id_proposal]'");
										while($tampil3 = mysql_fetch_array($cek3)){
										$ia++;
										$cari_t1 = mysql_fetch_array(mysql_query("SELECT * FROM tabel_target WHERE id_proposal='$hasil[id_proposal]' and jenis_target='Target 1' and nama_brand='".$tampil3['nama_brand']."'"));
										//$cari_t2 = mysql_fetch_array(mysql_query("SELECT current, target FROM tabel_target WHERE id_proposal='$hasil[id_proposal]' and jenis_target='Target 2' and nama_brand='".$tampil3['nama_brand']."'"));
										//$cari_t3 = mysql_fetch_array(mysql_query("SELECT current, target FROM tabel_target WHERE id_proposal='$hasil[id_proposal]' and jenis_target='Target 3' and nama_brand='".$tampil3['nama_brand']."'"));
										?>
										<tr>
											<td><?php echo $tampil3['nama_brand'];?></td>
											<td align="center"><?php echo $cari_t1['current']; ?></td>
											<td align="center"><?php echo $cari_t1['target'];?></td>
											<td align="center"><?php echo $cari_t1['target_selling']; ?></td>
											<td align="center"><?php echo $cari_t1['target_cangkang'];?></td>
											<td align="center"><?php echo $cari_t1['target_cons']; ?></td>
											<td align="center"><?php echo $cari_t1['target_trial'];?></td>
											<td align="center"><?php echo $cari_t1['target_audience'];?></td>
											<td align="center"><?php echo $cari_t1['target_titik'];?></td>
										</tr>
										<?php } ?>
									</table>
									</td>
								</tr>
							<tr>
								<td><br></td>
							</tr>
							<tr>
								<td align="left" valign="top">10. Target Sales</td>
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
								<td class="td" style="border:1px solid black;border-collapse:collapse;"><?php echo $hasil['lokasi_territory'];?></td>
								<td class="td" style="border:1px solid black;"><?php echo $hasil['lokasi_territory'];?></td>
								<td class="td" style="border:1px solid black;"><?php echo $hasil['regional_office'];?></td>
								<td class="td" style="border:1px solid black;border-collapse:collapse;"></td>
								<td class="td" style="border:1px solid black;border-collapse:collapse;"></td>
							</tr>
							<tr align="center">
								<td class="td" style="border:1px solid black;border-collapse:collapse;"><?php echo tgl_indo($hasil['tgl_persetujuan_asm']);?></td>
								<td class="td" style="border:1px solid black;"><?php echo tgl_indo($hasil['tgl_persetujuan_rpm']);?></td>
								<td class="td" style="border:1px solid black;"><?php echo tgl_indo($hasil['tgl_persetujuan_rm']);?></td>
								<td class="td" style="border:1px solid black;border-collapse:collapse;"></td>
								<td class="td" style="border:1px solid black;border-collapse:collapse;"></td>
							</tr>
							<tr align="center">
								<td class="td" style="border:1px solid black;border-collapse:collapse;">Diajukan Oleh,</td>
								<td class="td" colspan="2" align="center" style="border:1px solid black;border-collapse:collapse;">Diperiksa oleh,</td>
								<td class="td" colspan="2" align="center" style="border:1px solid black;border-collapse:collapse;">Disetujui oleh,</td>
							</tr>
							<tr align="center">
								
								<td class="td" width="14%" style="border:1px solid black;border-collapse:collapse;">
									<img src="../ms/ttd/<?php echo $hasil['singkatan']."_".$hasil['nama_am'].".png";?>" width="85px">
								</td>
								<td class="td" width="14%" style="border:1px solid black;border-collapse:collapse;">
									<img src="../ms/ttd/RMS_<?php echo $hasil['regional_office']."_".$hasil['nama_rms'].".png";?>" width="85px">
								</td>
								
								<td class="td" width="14%" style="border:1px solid black;border-collapse:collapse;">
									<img src="../ms/ttd/RM_<?php echo $hasil['regional_office']."_".$hasil['nama_rm'].".png";?>" width="85px">
								</td>
								<?php if($hasil['nominal']=='<10') { ?>
								<td class="td" width="18%" style="border:1px solid black;border-collapse:collapse;">
								</td>
								<?php }else{ ?>
								<td class="td" width="18%" style="border:1px solid black;border-collapse:collapse;">
									<!--<img src="../ms/ttd/HOZ_<?php echo $hasil['nama_hoz'].".png";?>" width="85px">-->
								</td>
								<?php } ?>
								<td class="td" width="15%" style="border:1px solid black;border-collapse:collapse;">
									<img src="../ms/ttd/BDM_<?php echo $hasil['nama_bdm'].".png";?>" width="85px">
								</td>
								
							</tr>
							<tr align="center">
								<td class="td" style="border:1px solid black;border-collapse:collapse;"><?php echo $hasil['nama_am']; ?></td>
								<td class="td" style="border:1px solid black;border-collapse:collapse;"><?php echo $hasil['nama_rms']; ?></td>
								<td class="td" style="border:1px solid black;border-collapse:collapse;"><?php echo $hasil['nama_rm']; ?></td>
							<?php if($hasil['nominal']=='<10'){ ?>
								<td class="td" style="border:1px solid black;border-collapse:collapse;"></td>
							<?php }elseif($hasil['nominal']=='>10'){ ?>
								<td class="td" style="border:1px solid black;border-collapse:collapse;"><?php echo $hasil['nama_hoz']; ?></td>
							<?php } ?>
								<td class="td" style="border:1px solid black;border-collapse:collapse;"><?php echo $hasil['nama_bdm']; ?></td>
							</tr>
							<?php if($hasil['nominal']=='<10'){ ?>
							<tr align="center">
								<td class="td" style="border:1px solid black;border-collapse:collapse;"><b>Area Manager</b></td>
								<td class="td" style="border:1px solid black;border-collapse:collapse;"><b>Regional Marketing Support</b></td>
								<td class="td" style="border:1px solid black;border-collapse:collapse;"><b>Regional Manager<s/b></td>
								<td class="td" style="border:1px solid black;border-collapse:collapse;"><b></b></td>
								<td class="td" style="border:1px solid black;border-collapse:collapse;"><b>BDM</b></td>
							</tr>
							<?php }elseif($hasil['nominal']=='>10'){ ?>
							<tr align="center">
								<td class="td" style="border:1px solid black;border-collapse:collapse;"><b>Area Manager</b></td>
								<td class="td" style="border:1px solid black;border-collapse:collapse;"><b>Regional Marketing Support</b></td>
								<td class="td" style="border:1px solid black;border-collapse:collapse;"><b>Regional Manager</b></td>
								<td class="td" style="border:1px solid black;border-collapse:collapse;"><b>Head Of Zone</b></td>
								<td class="td" style="border:1px solid black;border-collapse:collapse;"><b>BDM</b></td>
							</tr>
							<?php } ?>
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