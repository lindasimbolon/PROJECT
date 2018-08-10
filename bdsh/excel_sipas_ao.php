<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=sipas_ao.xls");
include "../koneksi.php";
include "fungsi_indotgl.php";
?>
		<center><h3>SIPAS AO</h3></center>
		<table border="1" width="100%">
			<tr bgcolor="#2e9fd2" align="center" height="40">
				<td width="3%">#</td>
					<td width="12%">N0 PAS</td>
					<td width="20%">NAMA PROGRAM</td>
					<td width="9%">ESTIMASI BIAYA (Rp)</td>
					<td width="9%">DANA PDM (Rp)</td>
					<td width="9%">TOTAL BIAYA SIPAS (Rp)</td>
					<td width="9%">KEMBALI KE HO (Rp)</td>
					<td width="9%">TGL KIRIM AO</td>
					<td width="9%">TGL DITERIMA RO</td>
					<td width="9%">TGL KIRIM KE SMN</td>
					<td width="9%">TGL VALID SIPAS</td>
					<td width="7%">STATUS SIPAS</td>
				</tr>
		
				<?php
				$i=0;
				$ao = $_GET['ao'];
				$sql1 = mysql_query ("SELECT * from tabel_sipas a, tabel_pas b, tabel_cmr c, tabel_pdm e,tabel_ao d where  b.id_cmr=c.id_cmr and c.id_ao=d.id_ao and a.id_pas=b.id_pas and
				a.tgl_kirimao<>'' and a.status_sipas='Pending' and d.singkatan='$ao' and b.id_pas=e.id_pas");
				while ($hasil1 = mysql_fetch_array($sql1)){
				
				$i++;
				?>
				<tr height="30">
					<td align="center"><?php echo $i;?></td>
					<td align="left"><?php echo $hasil1['no_pas'];?></td>
					<td align="left"><?php echo $hasil1['program'];?></td>
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
					<td align="center">Belum Terima</td>
					<td align="center">Belum Terima</td>
					<td align="center">Belum Terima</td>
					<td align="center"><?php if($hasil1['status_sipas']=="Disetujui"){echo "Disetujui";}else{echo "Pending";}?></td>
					
				</tr>
				
				<?php } ?>
				
				
			</table> 
<?php
exit()
?>
