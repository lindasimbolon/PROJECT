<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=pdm.xls");
include "../koneksi.php";
?>
		<center><h3>DATA PDM</h3></center>
		<table border="1" width="100%">
			<tr bgcolor="#2e9fd2" align="center" height="40">
					<th width="5%">#</th>
					<th width="13%">N0 PAS</th>
					<th width="13%">NAMA PROGRAM</th>
					<th width="10%">AREA OFFICE</th>
					<th width="10%">TGL PENGAJUAN</th>
					<th width="10%">TGL DIBUTUHKAN</th>
					<th width="10%">DANA PDM</th>
				</tr>
		
				<?php
				include "fungsi_indotgl.php";
				$regional = $_GET['level'];
				$i=0;
				if($regional=="RPM WEST"){
				$sql1 = mysql_query ("SELECT * FROM tabel_pdm a, tabel_pas b, tabel_cmr c, tabel_ao d where a.id_pas=b.id_pas and b.id_cmr=c.id_cmr and c.id_ao=d.id_ao and status_pdm='Disetujui' and d.id_ao<>5 and d.id_ao<>6 and d.id_ao<>7 ");	
				}elseif($regional=="RPM EAST"){
				$sql1 = mysql_query ("SELECT * FROM tabel_pdm a, tabel_pas b, tabel_cmr c, tabel_ao d where a.id_pas=b.id_pas and b.id_cmr=c.id_cmr and c.id_ao=d.id_ao and status_pdm='Disetujui' and d.id_ao<>1 and d.id_ao<>2 and d.id_ao<>3 and d.id_ao<>4");
				}else{
				$sql1 = mysql_query ("SELECT * FROM tabel_pdm a, tabel_pas b, tabel_cmr c, tabel_ao d where a.id_pas=b.id_pas and b.id_cmr=c.id_cmr and c.id_ao=d.id_ao and status_pdm='Disetujui'");
				}
				while ($hasil1 = mysql_fetch_array($sql1)){
				$i++;
				
				
				?>
				<tr height="35">
					<td align="center"><?php echo $i;?></td>
					<td align="left"><?php echo $hasil1['no_pas'];?></td>
					<td align="left"><?php echo $hasil1['program'];?></td>
					<td align="center"><?php echo $hasil1['singkatan'];?></td>
					<td align="center"><?php echo tgl_indo($hasil1['tgl_buat']);?></td>
					<td align="center"><?php echo tgl_indo($hasil1['tgl_butuh']);?></td>
					<td align="right"><?php echo $hasil1['total_pdm'];?></a></td>
					
					
				</tr>
				
				<?php } ?>
				
			</table> 
<?php
exit()
?>
