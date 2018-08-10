<?php
include "../koneksi.php";
include "fungsi_indotgl.php";
error_reporting(1);
?>
<html>
<head>
<title>PAS ONLINE</title>
	<style>
	p{
		line-height:5px;
	}
	body{
		font-size:10px;
		font-family:calibri;
	}
	td{
	font-size:10px;
		font-family:calibri;
	}
	</style>
</head>
<body>
<div style="font-family:calibri;font-size:8px;">
			<?php
				
				$id_pdm = $_GET['id'];
				$sql1 	= mysql_query ("SELECT * FROM tabel_pdm a,tabel_pas b, tabel_cmr c, tabel_ao d WHERE a.id_pas=b.id_pas and b.id_cmr=c.id_cmr and 
							c.id_ao=d.id_ao and a.id_pdm='$id_pdm'");
				$tampil1	= mysql_fetch_array($sql1);
				$dana	= $tampil1['total_pas'] - $tampil1['sisa_pdm'];
				?>
				
				<table border="1" style="border:1px solid black" align="center" width="100%">
				<tr>
				<td><br>
				
				<table align="center" width="95%">
					<tr>
						<td align="left" colspan="2" width="25%"><b>PT. SURYA MUSTIKA LAMPUNG</b></td>
						<td width="40%"></td>
						<td align="left" width="10%">NO. PAS</td>
						<td width="20%">: <?php echo $tampil1['no_pas'];?></td>
					</tr>
					<tr>
						<td align="left" colspan="2" ><?php echo $tampil1['nama_ao'];?></td>
						<td align="left"></td>
						<td align="left">NO. PDM</td>
						<td align="left">: <?php echo $tampil1['id_pdm'];?></td>
					</tr>
					<tr>
						<td align="left" colspan="2" ></td>
						<td align="center"><font size="3px"><b>PERMINTAAN DANA MARKETING</b></font></td>
						<td align="left"></td>
						<td align="left"></td>
					</tr>
				</table>
				
				<table width="95%" align="center">
				<tr>
					<td><br></td>
				</tr>
					<tr>
						<td align="left" width="50%">Tanggal Dibutuhkan: <?php echo tgl_indo($tampil1['tgl_butuh']);?></td>
						<td width="20%"></td>
						<td align="right" width="20%"></td>
						<td align="right" ></td>
					</tr>
					
				</table>
				
				<table width="95%" align="center" border="1" style="border-collapse: collapse;">
				
					<tr align="center">
						<td width="5%">NO</td>
						<td width="35%">KEPERLUAN</td>
						<td width="25%">Rp.</td>
						<td width="25%">CATATAN</td>
						
					</tr>
						<?php
						$id = $_GET['id'];
						$i=0;
						$cek = mysql_query("SELECT * FROM tabel_pdm_detail a, tabel_pdm b, tabel_pas c WHERE a.id_pdm=b.id_pdm and b.id_pas=c.id_pas and a.id_pdm='$id'");
						while ($tampil=mysql_fetch_array($cek)){
						$total = $total + $tampil['jumlah_pdm'];
						$i++;
						?>
					<tr>
						<td align="center" width="3%"><?php echo $i;?></td>
						<td align="left" width="57%"><?php echo $tampil['keperluan'];?></td>
						<td align="right" width="28%"><?php echo number_format($tampil['jumlah_pdm']);?>,-</td>
						<td align="right" ><?php echo $tampil['catatan'];?></td>
					</tr>
					<?php } ?>
					<tr>
				<td align="right" colspan="2">JUMLAH</td>
				<td align="right"><?php echo number_format($total);?>,-</td>
				<td></td>
			</tr>
				</table><br><br>
				
				
				<table align="center" width="95%" style="border:0px solid black;border-collapse:collapse;" >
					
					<tr align="center">
						<td></td>
						<td>Pemohon,</td>
						<td></td>
						<td colspan="3">Menyetujui,</td>
						<td></td>
						<td colspan="3">Diperiksa Oleh,<td>
						<td colspan="3">Disetujui,</td>
						<td></td>
					</tr>
					<tr align="center">
						<td></td>
						<td><br></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr align="center">
						<td></td>
						<td><img src="../cmr/ttd/<?php echo $tampil1['singkatan']."_".$tampil1['nama_cmr'].".PNG";?>" width="60px"></td>
						<td></td>
						<td><img src="../cmr/ttd/<?php echo $tampil1['singkatan']."_".$tampil1['nama_aca'].".PNG";?>" width="60px"></td>
						<td></td>
						<td><img src="../cmr/ttd/RPM_<?php echo $tampil1['nama_rpm'].".PNG";?>" width="60px"></td>
						<td></td>
						<td><img src="../cmr/ttd/RMA_Marisa Oktaverina.PNG" width="60px"></td>
						<td></td>
						<td><img src="../cmr/ttd/RCA_F. YASMAN GEA.PNG" width="60px"></td>
						<td></td>
						<td><img src="../cmr/ttd/FA_Erni Kustiana.PNG" width="60px"></td>
						<td></td>
						<td><img src="../cmr/ttd/DIREKSI_Gunadi Harjono.PNG" width="60px"></td>
						<td></td>
					</tr>
					<tr align="center">
						<td></td>
						<td valign="bottom"><?php echo $tampil1['nama_cmr'];?></td>
						<td></td>
						<td valign="bottom"><?php echo $tampil1['nama_aca'];?></td>
						<td></td>
						<td valign="bottom"><?php echo $tampil1['nama_rpm'];?></td>
						<td></td>
						<td valign="bottom">Marisa Oktaverina</td>
						<td></td>
						<td valign="bottom">F. YASMAN GEA</td>
						<td></td>
						<td valign="bottom">Erni Kustiana</td>
						<td></td>
						<td valign="bottom">Gunadi Harjono</td>
						<td></td>
					</tr>
					<tr align="center" height="10px">
						<td></td>
						<td style="border-top:1px solid black">CMR</td>
						<td>&nbsp;</td>
						<td style="border-top:1px solid black">ACA</td>
						<td>&nbsp;</td>
						<td style="border-top:1px solid black">RPM</td>
						<td>&nbsp;</td>
						<td style="border-top:1px solid black">RMA</td>
						<td>&nbsp;</td>
						<td style="border-top:1px solid black">RCA</td>
						<td>&nbsp;</td>
						<td style="border-top:1px solid black">FINANCE</td>
						<td>&nbsp;</td>
						<td style="border-top:1px solid black">DIREKSI</td>
						<td>&nbsp;</td>
					</tr>
					
					
				</table>
				<br>
				</td>
				</tr>
				</table>
				
				  <script>
					  window.load = print_d();
					  function print_d(){
					   window.print();
					  }
				 </script>
				
				</div>
		</div>		 

</body>
</html>
