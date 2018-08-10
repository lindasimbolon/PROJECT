<?php include "header.php";?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
<link rel="stylesheet" href="css/datatables/datatables.css">
    <style>	
    th.dt-center, td.dt-center 
        { text-align: center; }
    .table-striped tbody tr:nth-child(odd) td,
    .table-striped tbody tr:nth-child(odd) th {
        background-color: #E0E0E0;
    }
    </style>
	<div style="padding:3px;overflow:auto;width:auto;height:auto;font-size:10px;">
	<h3><b> DATA BUDGET </b></h3>
		<table id="contoh" class="datatable table table-striped table-bordered" style="color:black;"><br>
			<thead >  
				<tr bgcolor="#2e9fd2" style="font-weight:bold;" align="center">
					<th width="5%"rowspan="2">NO</th>
					<th width="10%" style="border-left:1px black solid;" rowspan="2">REGIONAL OFFICE</th>
					<th width="10%" style="border-left:1px black solid;" rowspan="2">AREA OFFICE</th>
					<th width="5%"  style="border-left:1px black solid;" rowspan="2">QUARTAL</th>
					<th width="5%"  style="border-left:1px black solid;" rowspan="2">YEAR</th>
					<th style="border-left:1px black solid;" colspan="3">BUDGET TOP DOWN</th>
					<th style="border-left:1px black solid;" colspan="3">BUDGET BOTTOM UP</th>
					
				</tr>
				<tr  bgcolor="#2e9fd2" style="font-weight:bold;" align="center">
					<th width="10%" style="border-left:1px black solid;">BUDGET TOP DOWN</th>
					<th width="10%" style="border-left:1px black solid;">BUDGET USE</th>
					<th width="10%" style="border-left:1px black solid;">REMAINING BUDGET</th>
					<th width="10%" style="border-left:1px black solid;">BUDGET BOTTOM UP</th>
					<th width="10%" style="border-left:1px black solid;">BUDGET USE</th>
					<th width="10%" style="border-left:1px black solid;">REMAINING BUDGET</th>
					
				</tr>
			</thead>
			<tbody>
				<?php
				$i=0;
				$sql1 = mysql_query ("SELECT * FROM tabel_budget a, tabel_quartal b where a.id_quartal=b.id_quartal order by nama_quartal DESC");
				while ($hasil1 = mysql_fetch_array($sql1)){
				$i++;
				?>
				<tr height="30">
					<td align="center"><?php echo $i;?></td>
					<td align="left"   style="border-left:1px black solid;">REGIONAL <?php echo $hasil1['regional'];?></td>
					<td align="left"   style="border-left:1px black solid;"><?php echo $hasil1['area_office'];?></td>
					<td align="center" style="border-left:1px black solid;"><?php echo $hasil1['nama_quartal'];?></td>
					<td align="center" style="border-left:1px black solid;"><?php echo $hasil1['tahun'];?></td>
					<td align="right"  style="border-left:1px black solid;"><?php echo number_format($hasil1['budget_top_down']);?></td>
					<td align="right"  style="border-left:1px black solid;"><?php echo number_format($hasil1['penggunaan_budget_top_down']);?></td>
					<td align="right"  style="border-left:1px black solid;"><font color="green"><?php echo number_format($hasil1['budget_top_down']-$hasil1['penggunaan_budget_top_down']);?></font></td>
					<td align="right"  style="border-left:1px black solid;"><?php echo number_format($hasil1['budget_bottom_up']);?></td>
					<td align="right"  style="border-left:1px black solid;"><?php echo number_format($hasil1['penggunaan_budget_bottom_up']);?></td>
					<td align="right"  style="border-left:1px black solid;"><font color="green"><?php echo number_format($hasil1['budget_bottom_up']-$hasil1['penggunaan_budget_bottom_up']);?></font></td>
					
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>


<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script><!-- -->
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
