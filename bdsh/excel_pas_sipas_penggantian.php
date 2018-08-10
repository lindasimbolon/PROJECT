<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=pas_sipas_penggantian_all.xls");
include "../koneksi.php";
include "fungsi_indotgl.php";
?>
		<center><h3>LAPORAN PAS, PDM, SIPAS DAN PENGGANTIAN DANA</h3></center>
		<table border="1" width="100%">
			<tr bgcolor="#2e9fd2" align="center" height="40">
					<td width="3%">#</td>
					<td width="13%">N0 PAS</td>
					<td width="26%">NAMA PROGRAM</td>
					<td width="14%">TGL PELAKSANAAN</td>
					<td width="9%">NAMA CMR</td>
					<td width="5%">AREA OFFICE</td>
					<td width="10%">ESTIMASI BIAYA (Rp.)</td>
					<td width="10%">PERMINTAAN DANA MARKETING (Rp.)</td>
					<td width="10%">REALISASI PAS (Rp.)</td>
					<td width="10%">PENGGANTIAN DANA (Rp.)</td>
					<td width="9%">AGING PAS</td>
				</tr>
		
				<?php
				
				$i=0;
				
				$sql1 = mysql_query ("SELECT * FROM tabel_cmr a, tabel_ao b, tabel_pas c
				where a.id_cmr=c.id_cmr and a.id_ao=b.id_ao and (status_pas='Disetujui' or status_pas='Selesai') order by c.id_pas DESC ");
				
				while ($hasil1 = mysql_fetch_array($sql1)){
				$total+=$hasil1['total_pas'];
				$i++;
				?>
				<tr height="30">
					<td align="center"><?php echo $i;?></td>
					<td align="left"><?php echo $hasil1['no_pas'];?></td>
					<td align="left"><?php echo $hasil1['program'];?></td>
					<td align="center"><?php if ($hasil1['tgl_selesai']=="") {echo tgl_indo($hasil1['tgl_pelaksanaan']);}elseif ($hasil1['tgl_selesai']=="0000-00-00") {echo tgl_indo($hasil1['tgl_pelaksanaan']);} else {echo tgl_indo($hasil1['tgl_pelaksanaan']); echo" s/d "; echo tgl_indo($hasil1['tgl_selesai']);}?></td>
					<td align="center"><?php echo $hasil1['nama_cmr'];?></td>
					<td align="center"><?php echo $hasil1['singkatan'];?></td>
					<td align="right"><?php echo $hasil1['total_pas'];?></td>
					
					<td align="right">
					<?php
					$coba1= mysql_query ("select * from tabel_pdm where id_pas='$hasil1[id_pas]' and status_pdm='Disetujui'");
					while($pdm= mysql_fetch_array($coba1)){
					$pdm1+=$pdm['total_pdm'];
					?>
					<?php echo $pdm['total_pdm'];?>
					<?php } ?></td>
					
					<td align="right">
					<?php
					$coba= mysql_query ("select * from tabel_sipas where id_pas='$hasil1[id_pas]' and (status_sipas='Selesai' or status_sipas='Sudah Diganti')");
					while($sipas= mysql_fetch_array($coba)){
					$sipas1+=$sipas['jumlah_sipas'];
					?>
					<?php echo $sipas['jumlah_sipas'];?>
					<?php } ?></td>
					
					<td align="right">
					<?php
					$a= mysql_query ("select * from tabel_sipas a, tabel_penggantian b where a.id_sipas=b.id_sipas and a.id_pas='$hasil1[id_pas]' and a.status_sipas='Sudah Diganti'");
					while($b= mysql_fetch_array($a)){
					$b1+=$b['total_penggantian'];
					?>
					<?php echo $b['total_penggantian'];?>
					<?php } ?></td>
					
					<td align="right">
					<?php
					$hari = date('Y-m-d');
					if(($hasil1['tgl_pelaksanaan']>=$hari) or ($hasil1['tgl_selesai']>=$hari)){
					echo "-";
					} else {
						if(($hasil1['tgl_selesai']=="")or($hasil1['tgl_selesai']=="0000-00-00")){
						  $date1=$hasil1['tgl_pelaksanaan'];
						  $date2=date('Y-m-d');
						  $datetime1 = new DateTime($date1);
						  $datetime2 = new DateTime($date2);
						  $difference = $datetime1->diff($datetime2);
						  $angka1= $difference->days; 
						  $angka = $angka1 + 1;
						 	if($hasil1['status_pas']=='Disetujui'){
								echo "$angka Hari";
								} else {
								echo "-";
								}
						 } else {
						  $date1=$hasil1['tgl_selesai'];
						  $date2=date('Y-m-d');
						  $datetime1 = new DateTime($date1);
						  $datetime2 = new DateTime($date2);
						  $difference = $datetime1->diff($datetime2);
						  $angka1= $difference->days; 
						  $angka = $angka1 + 1;
						  	if($hasil1['status_pas']=='Disetujui'){
								echo "$angka Hari";
								} else {
								echo "-";
								}
						 }
					}
					?> 
					</td>
				
				</tr>
				<?php } ?>
				
				
			</table> 
<?php
exit()
?>
