<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename= PROPOSAL AUTHORIZATION SUPPORT(PAS).xls");
include "../koneksi.php";
include "fungsi_indotgl.php";
?>
<html>
<head>
<style>
th{
    border: 1px solid black;
    border-collapse: collapse;
}
table,tr{
    border: 0px solid black;
    border-collapse: collapse;
}
.tr{
    border: 1px solid black;
    border-collapse: collapse;
}
.td {
	border-right: 0px solid black;
	border-left: 0px solid black;
    border-top: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
}
th {
    text-align: left;
}
</style>
</head>
<body>
<table align="center">
			<tr>
				<td colspan='20' class="tr">PROPOSAL AUTHORIZATION SUPPORT(PAS)</td>
			</tr>
			<tr>
				<td class="tr" colspan='2'>Nomor Pas</td>
				<td class="tr">:</td>
				<td class="tr" colspan='17'></td>
			</tr>
			<tr>
				<td class="tr" colspan='2'>Agent</td>
				<td class="tr">:</td>
				<td class="tr" colspan='17'></td>
			</tr>
			<tr>
				<td class="tr" colspan='2'>Ditunjukan Kepada</td>
				<td class="tr">:</td>
				<td class="tr" colspan='17'>Exlusive Agent Manager</td>
			</tr>
			<tr>
				<td class="tr" colspan='2'>CC</td>
				<td class="tr">:</td>
				<td class="tr" colspan='17'>Marketing Director</td>
			</tr>
			<tr>
				<td class="tr" colspan='20'>PROGRAM DESCRIPTIONS</td>
			</tr>
			<tr>
				<td class="tr">1.</td>
				<td class="tr">Brand</td>
				<td class="tr">:</td>
				<td class="tr" colspan='17'></td>
			</tr>
			<tr>
				<td class="tr">2.</td>
				<td class="tr">Nama Program</td>
				<td class="tr">:</td>
				<td class="tr" colspan='17'></td>
			</tr>
			<tr>
				<td class="tr">3.</td>
				<td class="tr">Jenis Program</td>
				<td class="tr">:</td>
				<td class="tr" colspan='17'></td>
			</tr>
			<tr>
				<td class="tr">4.</td>
				<td class="tr">Lokasi</td>
				<td class="tr">:</td>
				<td class="tr" colspan='17'></td>
			</tr>
			<tr>
				<td class="tr">5.</td>
				<td class="tr">Tanggal pelaksanaan</td>
				<td class="tr">:</td>
				<td class="tr" colspan='17'></td>
			</tr>
			<tr>
				<td class="tr" colspan='20'></td>
			</tr>
			<tr>
			    <td class="tr"></td>
			    <td class="tr" colspan='5' align="center">URAIAN AKTIVITAS</td>
			    <td class="tr" colspan='4' align="center">PELAKSANA</td>
			    <td class="tr" colspan='5' align="center">WAKTU PELAKSANAAN</td>
			    <td class="tr" colspan='5' align="center">LOKASI</td>
			    </td>
			</tr>
			<tr>
			    <td class="tr"></td>
			    <td class="tr" colspan='5'>test</td>
			    <td class="tr" colspan='4'></td>
			    <td class="tr" colspan='5'></td>	
			    <td class="tr" colspan='5'></td>	
			</tr>
			<tr>
				<td class="tr" colspan='20'></td>
			</tr>
			<tr> 
				<td class="tr">5.</td>
				<td class="tr">Tujuan Program</td>
				<td class="tr">:</td>
				<td class="tr" colspan='17'></td>
			</tr>
			<tr>
				<td class="tr">6.</td>
				<td class="tr">Target Program</td>
				<td class="tr">:</td>
				<td class="tr" colspan='17'></td>
			</tr>
			<tr>
				<td class="tr">7.</td>
				<td class="tr">Mekanisme pelaksanaan</td>
				<td class="tr">:</td>
				<td class="tr" colspan='17'></td>
			</tr>
			<tr>
				<td class="tr">8.</td>
				<td class="tr">Penanggung jawab</td>
				<td class="tr">:</td>
				<td class="tr"></td>
				<td class="tr" colspan='6'>Promotion Team PT SML</td>
				<td class="tr"></td>
				<td class="tr" colspan='9'>HO</td>
			</tr>
			<tr>
				<td class="tr"></td>
				<td class="tr" colspan='2'></td>
				<td class="tr"></td>
				<td class="tr" colspan='6'>Salesman Team</td>
				<td class="tr"></td>
				<td class="tr" colspan='9'>Others</td>
			</tr>
			<tr>
				<td class="tr" colspan='20'></td>
			</tr>
			<tr>
				<td class="tr"></td>
				<td class="tr" colspan='2'></td>
				<td class="tr" colspan='17'>Estimasi Biaya</td>
			</tr>
			<tr>
				<td class="tr"></td>
				<td class="tr" colspan='2'>
				<td class="tr" align="center">No</td>
				<td class="tr"colspan='2' align="center">Items</td>
				<td class="tr"colspan='3' align="center">Kota</td>
				<td class="tr"colspan='2' align="center">Jumlah</td>
				<td class="tr"colspan='3' align="center">Harga/Unit</td>
				<td class="tr" colspan='3' align="center">Hari kerja</td>
				<td class="tr" colspan='3' align="center">Total (Rp.)</td>
			</tr>
			<tr>
				<td class="tr"></td>
				<td class="tr" colspan='2'>
				<td class="tr">1.</td>
				<td class="tr" colspan='2'></td>
				<td class="tr" colspan='3'></td>	
				<td class="tr" colspan='2'></td>
				<td class="tr" colspan='3'></td>
				<td class="tr" colspan='3'></td>	
				<td class="tr" colspan='3'></td>  
			</tr>	
			<tr>
				<td class="tr" colspan='20'></td
			</tr>
			<tr>
				<td class="tr"</td>
				<td class="tr" colspan='2'></td>
				<td class="tr" colspan='17'>Cash Advance Request (CAR)</td>
			</tr>
			<tr>
				<td class="tr"></td>
				<td class="tr" colspan='2'></td>
				<td class="tr" align="center">No</td>
				<td class="tr" colspan='6' align="center">Items</td>
				<td class="tr" colspan='5' align="center">Kota</td>
				<td class="tr" colspan='5' align="center">Jumlah</td>
			</tr>
			<tr>
				<td class="tr"></td>
				<td class="tr" colspan='2'>
				<td class="tr">1.</td>
				<td class="tr" colspan='6'></td>
				<td class="tr" colspan='5'></td>	
				<td class="tr" colspan='5'></td>  
			</tr>	
			<tr>
				<td class="tr">
				<td class="tr" colspan='2'>
				<td class="tr"></td>
				<td class="tr" colspan='11'>Total</td>
				<td class="tr" colspan='5'></td> 
			</tr>	
			<tr>
				<td class="tr" colspan='20'></td>
			</tr>
			<tr>
				<td class="tr"></td>
				<td class="tr" colspan='2'></td>
				<td class="tr" colspan='17'>Non - Saleable Product</td>
			</tr>
			<tr>
				<td class="tr"></td>
				<td class="tr" colspan='2'></td>
				<td class="tr" align="center">No</td>
				<td class="tr" colspan='4' align="center">Brand/items</td>
				<td class="tr" colspan='4' align="center">Qty (pack)</td>
				<td class="tr" colspan='4' align="center">Rp/Pack</td>
				<td class="tr" colspan='4' align="center">Total Rp.</td>
			</tr>
			<tr>
				<td class="tr"></td>
				<td class="tr" colspan='2'>
				<td class="tr">1.</td>
				<td class="tr" colspan='4'></td>
				<td class="tr" colspan='4'></td>	
				<td class="tr" colspan='4'></td>
				<td class="tr" colspan='4'></td>   
			</tr>
			<tr>
				<td class="tr"></td>
				<td class="tr" colspan='19'>Overall Achievement</td>
			</tr>
			<tr>
				<td class="tr"></td>
				<td class="tr" colspan='2'>1. Target Audience</td>
				<td class="tr">:</td>
				<td class="tr" colspan='16'>org</td>
			</tr>
			<tr>
				<td class="tr"></td>
				<td class="tr" colspan='2'>2. Target Contact</td>
				<td class="tr">:</td>
				<td class="tr" colspan='16'>org</td>
			</tr>
			<tr>
				<td class="tr"></td>
				<td class="tr" colspan='2'>3. Target Sales</td>
				<td class="tr">:</td>
				<td class="tr" align="center">No</td>
				<td class="tr" colspan='4' align="center">Jenis Rokok</td>
				<td class="tr" colspan='4' align="center">Pack</td>
				<td class="tr" colspan='4' align="center">Retail Buying Price</td>
				<td class="tr" colspan='3' align="center">Total</td>
			</tr>
			<tr>
				<td class="tr"></td>
				<td class="tr" colspan='3'></td>
				<td class="tr"></td>
				<td class="tr" colspan='4'></td>	
				<td class="tr" colspan='4'></td>
				<td class="tr" colspan='4'></td>
				<td class="tr" colspan='3'></td> 
			</tr>	
			<tr>		
				<td class="tr"></td>
				<td class="tr" colspan='3'></td>
				<td class="tr"></td>
				<td class="tr" colspan='12'>Total</td>
				<td class="tr" colspan='3'></td>  
			</tr>
			<tr>
				<td class="tr" colspan='20'></td>
			</tr>
			<tr>
				<td class="tr"></td>
				<td class="tr" colspan='8' align="center">Acknowledged by,</td>
				<td class="tr"></td>
				<td class="tr" colspan='3' align="center">Commentary</td>
				<td class="tr"></td>
				<td class="tr" colspan='3' align="center">Disetujui</td>
				<td class="tr" colspan='3' align="center">Tidak disetujui</td>
			</tr>
			<tr>
				<td class="tr"></td>
				<td class="tr" colspan='3'></td>
				<td class="tr" colspan='5'><br><br><br></td>
				<td class="tr"></td>
				<td class="tr" colspan='10'></td>
			</tr>
			<tr>
				<td class="tr"></td>
				<td class="tr" colspan='3' align="center">ASM</td>
				<td class="tr" colspan='5' align="center">RPM</td>
				<td class="tr"></td>
				<td class="tr" colspan='10'></td>
			</tr>
			</tr>
			<tr>
				<td class="tr" colspan='20'></td>
			</tr>
			<tr>
				<td class="tr"></td>
				<td class="tr" colspan='5' align="center">Approved by,</td>
				<td class="tr">&nbsp;&nbsp;</td>
				<td class="tr" colspan='13'> Prepared by,</td>
			</tr>
			<tr>
				<td class="tr"></td>
				<td class="tr" colspan='5'></td>
				<td class="tr"><br><br><br></td>
				<td class="tr" colspan='4'></td>
				<td class="tr" colspan='3'></td>
				<td class="tr" colspan='3'></td>
				<td class="tr" colspan='3'></td>
			</tr>
			<tr>
				<td class="tr"></td>
				<td class="tr" colspan='5' align="center">Gunadi Harjono</td>
				<td class="tr"></td>
				<td class="tr" colspan='4'></td>
				<td class="tr" colspan='3'></td>
				<td class="tr" colspan='3'></td>
				<td class="tr" colspan='3'></td>
			</tr>
			<tr>
				<td class="tr"></td>
				<td class="tr" colspan='5' align="center">Regional Manager</td>
				<td class="tr"></td>
				<td class="tr" colspan='4' align="center">Admin Marketing</td>
				<td class="tr" colspan='3' align="center">ACA</td>
				<td class="tr" colspan='3' align="center">CMR</td>
				<td class="tr" colspan='3' align="center">SPV</td>
			</tr>
</table>
</body>	
</html>
<?php
exit()
?>