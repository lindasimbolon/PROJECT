<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=pas_all.xls");
include "../koneksi.php";
?>
		<center><h3>ALL PAS</h3></center>
		<table border="1" width="100%">
			<tr bgcolor="#2e9fd2" align="center" height="40">
				<td width="3%">#</td>
				<td width="10%" >N0 PAS</td>
				<td width="25%">NAMA PROGRAM</td>
				<td width="15%">TGL PELAKSANAAN</td>
				<td width="10%">NAMA CMR</td>
				<td width="5%">AREA OFFICE</td>
				<td width="10%">ESTIMASI BIAYA (Rp)</td>
				<td width="5%">STATUS PAS</td>
				</tr>
		
				<?php
				include "../koneksi.php";
				include "fungsi_indotgl.php";
				$i=0;
				$sql1 = mysql_query ("SELECT c.id_pas, c.no_pas, c.program, c.tgl_pelaksanaan, c.tgl_selesai, a.nama_cmr, b.singkatan, c.total_pas, c.status_pas  FROM tabel_cmr a, tabel_ao b, tabel_pas c
				where a.id_cmr=c.id_cmr and a.id_ao=b.id_ao order by no_pas ASC ");
				while ($hasil1 = mysql_fetch_array($sql1)){
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
					<td align="center"><?php if ($hasil1['status_pas']=="Pending"){echo"Pending";} elseif($hasil1['status_pas']=="Disetujui"){echo " Disetujui";}
					elseif ($hasil1['status_pas']=="Selesai"){ echo "Disetujui";}else {echo "Ditolak";}?></td>
					
				</tr>
				<?php } ?>
			</table> 
<?php
exit()
?>
