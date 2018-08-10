<?php include "header.php";?>
<body>
<?php include "menu.php";?>
<!-- Header -->

<header id="head">
<div style="font-family:calibri;">
		
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
					<p align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Kecamatan</b> : </p>
					<p align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $tampil['lokasi_kecamatan'];?></p><br>
				
				<p align="left"><b>&nbsp;&nbsp; 1.6 TANGGAL PELAKSANAAN</b> : </p>
				<p align="left">&nbsp;&nbsp; 
					<?php 
					if($tampil['akhir_pelaksanaan']<>""){
					echo tgl_indo($tampil['mulai_pelaksanaan']).' s/d '.tgl_indo($tampil['akhir_pelaksanaan']);
					}else{
					echo tgl_indo($tampil['mulai_pelaksanaan']);
					}?>
				</p><br>
				
				<p align="left"><b>II. URAIAN PROGRAM</b></p>
				
				<p align="left"><b>&nbsp;&nbsp; 2.1 LATAR BELAKANG</b> : </p>
				<?php echo $tampil['latar_belakang'];?><br>
				
				<p align="left"><b>&nbsp;&nbsp; 2.2 TUJUAN DAN SASARAN</b> : </p>
				<?php echo $tampil['tujuan_sasaran'];?><br>
				
				<p align="left"><b>&nbsp;&nbsp; 2.3 MEKANISME PELAKSANAAN</b> : </p>
				<?php echo $tampil['mekanisme_pelaksanaan'];?><br>
				
				<p><strong>III. RINCIAN BUDGET</strong></p>
					<table border="1"  width="70%">
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
				<p><strong>IV. RINCIAN TARGET</strong></p>
				
				<p align="left"><b>&nbsp;&nbsp; 4.1 TARGET AUDIENCE</b> : </p>
				<p align="left">&nbsp;&nbsp;<?php echo $tampil['target_audience'];?></p><br>
				
				<p align="left"><b>&nbsp;&nbsp; 4.2 TARGET CONTACT</b> : </p>
				<p align="left">&nbsp;&nbsp;<?php echo $tampil['target_contact'];?></p><br>
				
				<p align="left"><b>&nbsp;&nbsp; 4.3 TARGET DISTRIBUSI</b> : </p>
					<table border="1" width="54%">
					<tr align="center">
						<td width="5%"><b>NO.</b></td>
						<td width="15%"><b>Brand</b></td>
						<td width="10%"><b>Outlet Universe</b></td>
						<?php
						if(($tampil['jenis_proposal']=="LOKAL_RM")or($tampil['jenis_proposal']=="LOKAL_GMO")or($tampil['jenis_proposal']=="LOKAL_DIREKSI")){
						?>
						<td width="12%"><b>Outlet Terdistribusi (%)</b></td>
						<td width="12%"><b>Outlet Terdistribusi (Qty)</b></td>
						<?php } else { ?>
						<td width="10%"><b>Outlet Terdistribusi (%)</b></td>
						<?php } ?>
						<td width="10%"><b>Target Distribusi (%)</b></td>
					</tr>
					<?php
					$ia = 0 ;
					$cek3 = mysql_query ("SELECT * FROM tabel_estimasi_distribusi where id_proposal='$id_proposal'");
					while($tampil3 = mysql_fetch_array($cek3)){
					$ia++;
					?>
					<!--perubahan-->
					<?php
					if($tampil3['brand']<>""){
					?>
					<!--perubahan selesai-->
					<tr>
						<td align="center"><?php echo $ia ;?></td>
						<td><?php echo $tampil3['brand'];?></td>
						<td align="center"><?php echo $tampil3['outlet_universe'];?></td>
						<?php
						if(($tampil['jenis_proposal']=="LOKAL_RM")or($tampil['jenis_proposal']=="LOKAL_GMO")or($tampil['jenis_proposal']=="LOKAL_DIREKSI")){
						?>
						<td align="right" style="padding-right:5px"><?php echo $tampil3['outlet_terdistribusi'];?></td>
						<td align="right" style="padding-right:5px"><?php echo $tampil3['outlet_terdistribusi2'];?></td>
						<?php } else { ?>
						<td align="right" style="padding-right:5px"><?php echo $tampil3['outlet_terdistribusi'];?></td>
						<?php } ?>
						<td align="right" style="padding-right:5px"><?php echo $tampil3['target_distribusi'];?></td>
					</tr>
					<!--perubahan--> <?php }} ?><!--perubahan selesai-->
					</table>
				<br>
				
				<p align="left"><b>&nbsp;&nbsp; 4.4 TARGET SALES</b> : </p>
					<table border="1" width="50%">
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
					
				<p><strong>VI. LAMPIRAN FILE</strong></p>
				<p align="left">&nbsp;&nbsp;<?php if($tampil['file1']<>""){ echo "<a href='../cmr/upload/$tampil[file1]'>Lihat file..</a>";}else{echo "Tidak Ada File";}?></p><br>
				
				
				<tr align="left">
					<td></td>
					<td><a href = "javascript:history.back()"><input type="submit" value="Kembali"></a>  
					<!-- Proposal SMN lama -->
						<?php 
						if(($tampil['persetujuan_rpm']=="Disetujui")and($tampil['jenis_proposal']=='LOKAL')){
						?>
						<a href="print_proposal_lokal.php?id=<?php echo $id_proposal;?>" target="_blank"><button>Print Document</button></a>
						<?php } ?>
						<!-- Proposal PAS SMN RM -->
						<?php 
						if(($tampil['persetujuan_rpm']=="Disetujui")and($tampil['jenis_proposal']=='LOKAL_RM')){
						?>
						<a href="print_proposal_smn_rm.php?id=<?php echo $id_proposal;?>" target="_blank"><button>Print Document</button></a>
						<?php } ?>
						<!-- Proposal PAS SMN GMO -->
						<?php 
						if(($tampil['persetujuan_rpm']=="Disetujui")and($tampil['jenis_proposal']=='LOKAL_GMO')){
						?>
						<a href="print_proposal_smn_gmo.php?id=<?php echo $id_proposal;?>" target="_blank"><button>Print Document</button></a>
						<?php } ?>
						<!-- Proposal PAS SMN DIREKSI -->
						<?php 
						if(($tampil['persetujuan_rm']=="Disetujui")and($tampil['jenis_proposal']=='LOKAL_DIREKSI')){
						?>
						<a href="print_proposal_smn_direksi.php?id=<?php echo $id_proposal;?>" target="_blank"><button>Print Document</button></a>
						<?php } ?>
					</td>
				</tr>
				</div>
				
				<!--
				 <script>
				 function print_d(){
				   	window.open("cek_print_proposal_lokal.php?id=<?php echo $id_proposal;?>","_blank");
				 }
				 </script>
				 -->
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