<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=sipas.xls");
include "../koneksi.php";
include "fungsi_indotgl.php";
?>
		<center><h3>SIPAS AO</h3></center>
		<table border="1">
				<tr bgcolor="#2e9fd2" align="center" height="30">
					<td>#</td>
					<td>N0 PAS</td>
					<td>NAMA PROGRAM</td>
					<td>AO</td>
					<td>ESTIMASI BIAYA</td>
					<td>JUMLAH PDM</td>
					<td>TOTAL BIAYA SIPAS</td>
					<td>KEMBALI KE HO</td>
					<td>TGL KIRIM AO</td>
					<td>TGL DITERIMA RO</td>
					<td>TGL KIRIM KE SMN</td>
					<td>TGL VALID SIPAS</td>
					<td>STATUS SIPAS</td>
				</tr>
				<?php
				$i=0;
				$sql1 = mysql_query ("SELECT * from tabel_sipas a, tabel_pas b, tabel_cmr c, tabel_ao d where a.id_pas=b.id_pas and b.id_cmr=c.id_cmr and c.id_ao=d.id_ao");
				while ($hasil1 = mysql_fetch_array($sql1)){
				
				$i++;
				
				?>
				<tr height="30">
					<td align="center"><?php echo $i;?></td>
					<td align="left"><?php echo $hasil1['no_pas'];?></td>
					<td align="left"><?php echo $hasil1['program'];?></td>
					<td align="center"><?php echo $hasil1['singkatan'];?></td>
					<td align="right"><?php echo $hasil1['total_pas'];?></td>
					<td align="right">
					<?php
					$coba1= mysql_query ("select * from tabel_pdm where id_pas='$hasil1[id_pas]' and status_pdm='Disetujui'");
					$pdm= mysql_fetch_array($coba1);
					$pdm1+=$pdm['total_pdm'];
					$sisa = $pdm['total_pdm']-$hasil1['jumlah_sipas'];
					if($sisa<=0){
					$sisa = 0;
					} else {
					$sisa=$sisa;
					}
					?>
					<?php echo $pdm['total_pdm'];?></td>
					<td align="right"><?php echo $hasil1['jumlah_sipas'];?></td>
					<td align="right"><?php echo $sisa;?></td>
					<td align="center"><?php echo tgl_indo($hasil1['tgl_kirimao']);?></td>
					<td align="center"><?php echo tgl_indo($hasil1['tgl_terimaro']);?></td>
					<td align="center"><?php echo tgl_indo($hasil1['tgl_kirimro']);?></td>
					<td align="center"><?php echo tgl_indo($hasil1['tgl_terimasipas']);?></td>
					<td align="center"><?php if($hasil1['status_sipas']=="Selesai"){echo "Selesai";}else{echo "Pending";}?></td>
					
				</tr>
				<?php } ?>
				
			</table> 
<?php
exit()
?>
