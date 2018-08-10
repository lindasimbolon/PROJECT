<?php 
include "header.php";
error_reporting(0);
?>
<style>
#kotak {
	padding		: 2px 10px;
	border 		: 2px solid black;
	text-align	: center;
}
</style>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
		<h4><center><u>REVIEW PAS</u></center></h4>
	
				
				<table width="90%" align="center" style="color:black;">
				<tr>
					<td colspan="2" align="center" style="padding:5px 5px 0px 5px;font-size:1.2em;"><b>PROPOSAL AUTHORIZATION SUPPORT (PAS)</b></td>
				</tr>
				<tr>
					<td>
					<?php 
					 
					$id 	= $_GET['id'];
					$sql 	= mysql_query("SELECT * FROM tabel_proposal a, tabel_tipe_program b, tabel_jenis_program c, tabel_pas d, tabel_ms e, tabel_area f, tabel_estimasi_budget g where a.id_proposal=g.id_proposal and  d.id_proposal=a.id_proposal and ((a.id_tipe_program=b.id_tipe_program and b.id_jenis_program=c.id_jenis_program) or (a.id_jenis_program=c.id_jenis_program)) and d.id_pas='$id' and d.id_ms=e.id_ms and d.id_ms=f.id_ms");
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
					<table width="98%" align="left" style="border:1px solid silver;padding:5px 5px;margin:10px 10px;color:black;">  
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
						<!--
						<tr>
							<td align="left">Ditunjukan Kepada</td>
							<td>:</td>
							<td align="left">RM SML</td>
						</tr>
						<tr>
							<td align="left">CC</td>
							<td>:</td>
							<td align="left">RUDI SUTANTO</td>
						</tr>
						<tr>
							<td align="left"></td>
							<td></td>
							<td align="left">GUMIRA DINANSYAH</td>
						</tr>
						<tr>
							<td align="left"></td>
							<td></td>
							<td align="left">CHARISNA</td>
						</tr>
						-->
						<tr height="30">
							<td colspan="3" align="left" style="border:1px solid silver;padding:5px 5px 0px 5px;font-size:0.8em;"><b><h5>PROGRAM DESCRIPTIONS</h5></b></td>
						</tr>
						
						<tr height="30">
							<td align="left">1. Nama Program</td>
							<td>:</td>
							<td align="left" width="60%" colspan="2"><?php echo $hasil['program'];?></td>
						</tr>
						
						<tr height="30">
							<td align="left">2. Lokasi</td>
							<td>:</td>
							<td align="left">MPC &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $hasil['lokasi_territory'];?></td>
						</tr>
						<tr>
							<td align="left"></td>
							<td></td>
							<td align="left">Kab/Kec &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $hasil['lokasi_kabupaten'];?> / <?php echo $hasil['lokasi_kecamatan'];?></td>
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
						<tr height="30">
							<td colspan="3">
								
						<table width="100%" style="color:black;">
									<tr height="30">
									<td width="15%" align="left" valign="top">4. Latar Belakang</td>
									<td width="1%"  align="left" valign="top" >:</td>
									<td align="left" style="border:1px solid black"><?php echo $hasil['latar_belakang'];?></td>
								</tr>
								<tr height="30">
									<td align="left" valign="top">5. Objective</td>
									<td align="left" valign="top" >:</td>
									<td align="left"><?php echo $hasil['tujuan_sasaran'];?></td>
								</tr>
								<tr >
									<td align="left" valign="top">6. Mekanisme Pelaksanaan</td>
									<td align="left" valign="top">:</td>
									<td align="left"><?php echo $hasil['mekanisme_pelaksanaan'];?></td>
								</tr>
						</table><br>
						<table>
									<tr>
										<td width="200" align="left">7. Estimasi Biaya</td>
										<td>:</td>
										<td colspan="2">Tanggal Dana Dibutuhkan : <?php echo tgl_indo($hasil['tgl_transfer'])?></td>
									</tr>
						</table>
						<table border="1"  width="80%" style="margin: 0 200px;color:black;">
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
									//$bagi_pph 	= explode("-",$tampil1['pph']);
									//$pph	    = $bagi_pph[0];
									//$jenis_pph  = $bagi_pph[1];
									
									//$bagi_ppn = explode("-",$tampil1['ppn']);
									//$ppn	    = $bagi_ppn[0];
									//$jenis_ppn  = $bagi_ppn[1];
									
									//$total_dasar 		= $tampil1['harga_budget'] * $tampil1['jumlah_budget'];
									
									//$total_pph 			= ((($total_dasar * 100) / (100 - $pph)) - $total_dasar);
									//$sub_total_dan_pph	= $total_dasar + $total_pph ;
									
									//$sub_total_ppn		= ($total_dasar / $ppn);
									
									//$total_dan_pph		= $total_dan_pph + $sub_total_dan_pph;
									//$total_ppn			= $total_ppn + $sub_total_ppn;
									
									//$jumlah 			= $total_dan_pph + $total_ppn; 
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
									$cek1 = mysql_query ("SELECT sum(ppn) as sumppn, sum(total_biaya) as sumtotalbiaya, sum(total_bayar) as sumtotalbayar, sum(agensi_fee_biaya) as sumagensifeebiaya, sum(agensi_fee_bayar) as sumagensifeebayar  FROM tabel_estimasi_budget where id_proposal='$hasil[id_proposal]'");
									while($tampil1 = mysql_fetch_array($cek1)){
									$jumlahbiayanonppn 		= $tampil1['sumtotalbiaya'] + $tampil1['sumagensifeebiaya']; 
									$jumlahbayarnonppn 		= $tampil1['sumtotalbayar'] + $tampil1['sumagensifeebayar'];
									$jumlahbiaya 			= $tampil1['sumppn'] + $tampil1['sumtotalbiaya'] + $tampil1['sumagensifeebiaya']; 
									$jumlahbayar 			= $tampil1['sumppn'] + $tampil1['sumtotalbayar'] + $tampil1['sumagensifeebayar']; 
									 
									?>
									</tr>
									<!--<tr>
										<td colspan="13" align="left"><b>Agency Fee</b></td>
										<td align="right" style="padding-right:5px"><?php echo $tampil1['sumtotalbiaya'];?></td>
										<td align="right" style="padding-right:5px"><?php echo $tampil1['sumtotalbayar'];?></td>
									</tr>-->
									<tr>
										<td colspan="13" align="left"><b>Agensi Fee (Rp)</b></td>
										<td align="right" style="padding-right:5px"><?php echo $tampil1['sumagensifeebiaya'];?></td>
										<td align="right" style="padding-right:5px"><?php echo $tampil1['sumagensifeebayar'];?></td>
									</tr>
									
									<tr>
										<td colspan="13" align="left"><b>Total Biaya (Rp)</b></td>
										<td align="right" style="padding-right:5px"><?php echo $jumlahbiayanonppn;?></td>
										<td align="right" style="padding-right:5px"><?php echo $jumlahbayarnonppn;?></td>
									</tr>
									<?php } ?>
									<tr>
										<td colspan="13" align="left"><b>Total INC PPN</b></td>
										<td align="right" style="padding-right:5px"><?php echo number_format($jumlahbiaya);?></td>
										<td align="right" style="padding-right:5px"><?php echo number_format($jumlahbayar);?></td>
									</tr>
									</table><br>
														
						<table width="100%" align="left" style="color:black;">
								<tr>
									<td width="15%" align="left"><b>8. Overall Achievement</b></td>
									<td width="1%" align="left"></td>
									<td align="left"></td>
								</tr>
								<tr>
									<td align="left">Jenis Program</td>
									<td align="left">:</td>
									<td align="left"><?php echo $hasil['jenis_target']?></td>
								</tr>
								
								<tr>
									<td align="left" valign="top"></td>
									<td align="left" colspan='2'>
										<table border="1" width="80%" style="color:black;">
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
									<td align="left" valign="top">9. Target Sales</td>
									<td align="left" colspan='2'>:
										<table border="1" width="70%" style="color:black;">
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
										<?php if($tampil2['keterangan_omset']<>""){ ?>
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
									<td><br></td>
								</tr>
						</table>
						<!--<table width="100%" align="left">
						<tr>
							<td width="15%" align="left"></td>
							<td width="1%"  align="left"></td>
							<td align="left"><b><h4><u>Plan Permintaan Dana Marketing</u></h4></b></td>
						</tr>
						</table>
				<table border="1" align="center" width="70%" style="color:black;">
						<tr align="center" height="30" bgcolor="#999999">
						<td width="10%"><b>NO.</b></td>
						<td width="25%"><b>ESTIMASI / ITEM</b></td>
						<?php
						$id_proposal = $hasil['id_proposal'];
						$sql = mysql_fetch_array(mysql_query("SELECT * FROM tabel_proposal WHERE id_proposal='$id_proposal'"));
						if($sql['jenis_proposal']=="PUSAT"){
						?>
						<td width="5%"><b>TITIK</b></td>
						<?php } ?>
						<td width="10%"><b>JUMLAH</b></td>
						<td width="10%"><b>HARGA</b></td>
						<td width="10%"><b>TIPE PEMBAYARAN</b></td>
						<td width="10%"><b>TANGGAL TRANSFER</b></td>
						<td width="10%"><b>SUB TOTAL</b></td>
						
					</tr>
					<?php
					$id_proposal = $hasil['id_proposal'];
					$i = 0 ;
					$cek1 = mysql_query ("SELECT * FROM tabel_estimasi_budget where id_proposal='$id_proposal'");
					while($tampil1 = mysql_fetch_array($cek1)){
					$i++;
					$bagi_pajak = explode("-",$tampil1['pph']);
					$pph	    = $bagi_pajak[0];
					$jenis	    = $bagi_pajak[1];
					
					$bagi_pajak1 	= explode("-",$tampil1['ppn']);
					$ppn	    	= $bagi_pajak1[0];
					$jenis1    		= $bagi_pajak1[1];
					
					if($tampil1['hari_budget']<>""){
					$sub_total = $tampil1['harga_budget'] * $tampil1['jumlah_budget'] * $tampil1['hari_budget'];
					}else{
					$sub_total = $tampil1['harga_budget'] * $tampil1['jumlah_budget'];
					}
					$sub_total_pph = (($sub_total* 100) / (100 - $pph)) - $sub_total;
					$sub_total_ppn = ($sub_total/$ppn);
					
					$jumlah1 = $jumlah1 + $sub_total + $sub_total_pph + $sub_total_ppn; 
					
					?>
					<tr>
						<td align="center"><?php echo $i ;?></td>
						<td align="left"><?php echo $tampil1['keterangan_budget'];?></td>
						<?php
						if($sql['jenis_proposal']=="PUSAT"){
						?>
						<td align="center"><?php echo $tampil1['hari_budget'];?></td>
						<?php } ?>
						<td align="center"><?php echo $tampil1['jumlah_budget'];?></td>
						<td align="right" style="padding-right:5px"><?php echo number_format($tampil1['harga_budget']);?></td>
						<td><?php echo $tampil1['pembayaran'];?></td>
						<td><?php echo tgl_indo($tampil1['tgl_transfer']);?></td>
						<td align="right" style="padding-right:5px"><?php echo number_format($sub_total);?></td>
					</tr>
					<?php if($tampil1['pph']>0){ ?>
					<tr>
						<td align="center"></td>
						<td align="left"><?php echo $jenis;?></td>
						<td align="center"></td>
						<td align="center"></td>
						<?php
						if($sql['jenis_proposal']=="PUSAT"){
						?>
						<td align="center"></td>
						<?php } ?>
						<td align="center"></td>
						<td align="center"></td>
						<td align="right" style="padding-right:5px"><?php echo number_format($sub_total_pph);?></td>
					</tr>
					<?php } ?>
					<?php if($tampil1['ppn']>0){ ?>
					<tr>
						<td align="center"></td>
						<td align="left"><?php echo $jenis1;?></td>
						<td align="center"></td>
						<td align="center"></td>
						<?php
						if($sql['jenis_proposal']=="PUSAT"){
						?>
						<td align="center"><?php echo $tampil1['hari_budget'];?></td>
						<?php } ?>
						<td align="center"></td>
						<td align="center"></td>
						<td align="right" style="padding-right:5px"><?php echo number_format($sub_total_ppn);?></td>
					</tr>
					<?php } ?>
					<?php } ?>
					<?php 
					$id_proposal1 = $hasil['id_proposal'];
					$sql1 = mysql_fetch_array(mysql_query("SELECT * FROM tabel_proposal WHERE id_proposal='$id_proposal1'"));
					if($sql1['jenis_proposal']=="PUSAT"){	
					$a=7;
					}else{ 
					$a=6;
					}?>
					<tr>
						<td colspan="<?php echo $a;?>" align="center"><b>TOTAL</b></td>
						<td align="right" style="padding-right:5px"><?php echo number_format($jumlah1);?></td>
					</tr>
					
				</table>-->
				<br>
							</td>
							
						</tr>
						<?php 
						$level = $_SESSION['level'];
						?>
						<tr>
									<td></td>
									<td></td>
									<td align="left"><a href='javascript:history.back()'><input type="submit" value="Kembali"></a>

									<?php
									$sql_cek 	= mysql_query("SELECT * FROM tabel_pas where id_pas='$id'");
									$hasil_cek 	= mysql_fetch_array($sql_cek);
									?>
									
									</td>									
									<!--<a href='persetujuan_pas_hoz.sml?id=<?php echo $hasil[id_pas];?>'><input type="submit" value="Persetujuan"></a>--></td>
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