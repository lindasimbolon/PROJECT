<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=pas_pending.xls");
include "../koneksi.php";
?>
		<center><h3>PAS PENDING</h3></center>
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
				include "fungsi_indotgl.php";
				$regional= $_GET['level'];
				$i=0;
				if($regional=="RPM WEST"){
				$sql1 = mysql_query ("SELECT * FROM tabel_cmr a, tabel_ao b, tabel_pas c
				where a.id_cmr=c.id_cmr and a.id_ao=b.id_ao and status_pas='Pending' and b.id_ao<>5 and b.id_ao<>6 and b.id_ao<>7 order by c.no_pas ASC ");
				}elseif($regional=="RPM EAST"){
				$sql1 = mysql_query ("SELECT * FROM tabel_cmr a, tabel_ao b, tabel_pas c
				where a.id_cmr=c.id_cmr and a.id_ao=b.id_ao and status_pas='Pending' and b.id_ao<>1 and b.id_ao<>2 and b.id_ao<>3 and b.id_ao<>4 order by c.no_pas ASC ");
				}else{
				$sql1 = mysql_query ("SELECT * FROM tabel_cmr a, tabel_ao b, tabel_pas c
				where a.id_cmr=c.id_cmr and a.id_ao=b.id_ao and status_pas ='Pending' order by no_pas ASC ");
				}
				while ($hasil1 = mysql_fetch_array($sql1)){
				$i++;
				
				
				?>
				<tr height="35">
					<td align="center"><?php echo $i;?></td>
					<td align="left"><?php echo $hasil1['no_pas'];?></td>
					<td align="left"><?php echo $hasil1['program'];?></td>
					<td align="center"><?php if ($hasil1['tgl_selesai']=="") {echo tgl_indo($hasil1['tgl_pelaksanaan']);} else {echo tgl_indo($hasil1['tgl_pelaksanaan']); echo" s/d "; echo tgl_indo($hasil1['tgl_pelaksanaan']);}?></td>
					<td align="center"><?php echo $hasil1['nama_cmr'];?></td>
					<td align="center"><?php echo $hasil1['singkatan'];?></td>
					<td align="right"><?php echo $hasil1['total_pas'];?></td>
					<td align="center">Pending</td>
					
				</tr>
				
				<?php } ?>
				<?php
				$sql = mysql_query ("SELECT sum(total_pas) as total from tabel_pas where status_pas='Pending'");
				$hasil = mysql_fetch_array($sql)
				?>
				<tr height="30">
					<td align="right" colspan="6"><b>TOTAL</b></td>
					<td align="right"><?php echo $hasil['total'];?></td>
				</tr>
			</table> 
<?php
exit()
?>
