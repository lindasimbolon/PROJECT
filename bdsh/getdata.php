$get = $_GET['q'];
$tahun = $_GET['tahun'];
<table id="contoh"  width="100%">
				<thead >
				<tr bgcolor="#2e9fd2" align="center">
					<th width="2%">#</th>
					<th width="13%">N0 PAS</th>
					<th width="26%">NAMA PROGRAM</th>
					<th width="14%">TGL PELAKSANAAN</th>
					<th width="9%">NAMA CMR</th>
					<th width="5%">AREA OFFICE</th>
					<th width="10%">ESTIMASI BIAYA (Rp.)</th>
					
				</tr>
				</thead>
				<tbody>
				<?php
				
				$i=0;
				$sql1 = mysql_query ("SELECT * FROM tabel_cmr a, tabel_ao b, tabel_pas c
				where a.id_cmr=c.id_cmr and a.id_ao=b.id_ao and (status_pas='Disetujui' or status_pas='Selesai') order by c.id_pas DESC  limit 10");
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
					<td align="right"><a href="detail_biaya.sml?id=<?php echo $hasil1['id_pas'];?>"><?php echo number_format($hasil1['total_pas']);?></a></td>
					
					<td align="right">
					<?php
					$coba1= mysql_query ("select * from tabel_pdm where id_pas='$hasil1[id_pas]' and status_pdm='Disetujui'");
					while($pdm= mysql_fetch_array($coba1)){
					$pdm1+=$pdm['total_pdm'];
					?>
					<?php echo number_format($pdm['total_pdm']);?>
					<?php } ?></td>
					
					<td align="right">
					<?php
					$coba= mysql_query ("select * from tabel_sipas where id_pas='$hasil1[id_pas]' and (status_sipas='Selesai' or status_sipas='Sudah Diganti')");
					while($sipas= mysql_fetch_array($coba)){
					$sipas1+=$sipas['jumlah_sipas'];
					?>
					<?php echo number_format($sipas['jumlah_sipas']);?>
					<?php } ?></td>
					
					<td align="right">
					<?php
					$a= mysql_query ("select * from tabel_sipas a, tabel_penggantian b where a.id_sipas=b.id_sipas and a.id_pas='$hasil1[id_pas]' and a.status_sipas='Sudah Diganti'");
					while($b= mysql_fetch_array($a)){
					$b1+=$b['total_penggantian'];
					?>
					<?php echo number_format($b['total_penggantian']);?>
					<?php } ?></td>
					
				
				</tr>
				<?php } ?>
				
				</tbody>
				</table>