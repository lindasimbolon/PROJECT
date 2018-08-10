<?php include "header.php";
include "../koneksi.php";
?>

<script>tinymce.init({ selector:'textarea' });</script>
<body>
<?php include "menu.php";?>
<!-- Header -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#tambah").click(function(){
       $("#sampai").fadeIn("slow");
        $("#tambah").hide();
        $("#keterangan1").hide();
    });
});
$(document).ready(function(){
    $("#tutup").click(function(){
       $("#tambah").fadeIn("slow");
       $("#keterangan1").fadeIn("slow");
        $("#sampai").hide();
        $("#waktu2").val("");
    });
});
</script>

<header id="head">
			<?php
				include "../koneksi.php";
				$id_pas	= $_GET['id'];
				$id_pdm = $_GET['id_pdm'];
				$sql		= mysql_query("SELECT * FROM tabel_pas where id_pas = $id_pas");

				$tampil		= mysql_fetch_array($sql);
				$id_proposal = $tampil['id_proposal'];
			?>
		<h4><center><u>REVISI BUDGET</u></center></h4>
		<br><br>
		
		<form action="edit_pdm_simpan.sml"  method="post" enctype="multipart/form-data">
		<input type="hidden" name="id_proposal" value="<?php echo $id_proposal;?>">
		<input type="hidden" name="id_pas" value="<?php echo $id_pas;?>">
		<input type="hidden" name="id_pdm" value="<?php echo $id_pdm;?>"> 
			<table id="box" align="center">
						<tr align="center" bgcolor="#227788">
  							<td rowspan="2" style="border:1px solid black;padding:5px;color:white"><b>Jenis Item</b></td>
  							<td rowspan="2" style="border:1px solid black;padding:5px;color:white"><b>Nama Item</b></td>
  							<td rowspan="2" style="border:1px solid black;padding:5px;color:white"><b>Harga Dasar</b></td>
  							<td rowspan="2" style="border:1px solid black;padding:5px;color:white"><b>Unit</b></td>
  							<td colspan="2" align="center" style="border:1px solid black;padding:5px;color:white"><b>Pajak</b></td>
  							<!--<td rowspan="2" style="border:1px solid black;padding:5px;color:white"><b>Aksi</b></td>-->
						</tr>
						<tr align="center" bgcolor="#227788">
							  <td style="border:1px solid black;color:white"><b>PPh</b></td>
							  <td style="border:1px solid black;color:white"><b>PPN</b></td>
						</tr>
						<?php
						$i = 0 ;
						$cek1 = mysql_query ("SELECT * FROM tabel_estimasi_budget where id_proposal='$id_proposal'");
						while($tampil1 = mysql_fetch_array($cek1)){
						$i++;
						$bagi_pph 	= explode("-",$tampil1['pph']);
						$pph	    = $bagi_pph[0];
						$jenis_pph  = $bagi_pph[1];
						
						$bagi_ppn = explode("-",$tampil1['ppn']);
						$ppn	    = $bagi_ppn[0];
						$jenis_ppn  = $bagi_ppn[1];
						
						$total_dasar 		= $tampil1['harga_budget'] * $tampil1['jumlah_budget'];
						
						$total_pph 			= ((($total_dasar * 100) / (100 - $pph)) - $total_dasar);
						$sub_total_dan_pph	= $total_dasar + $total_pph ;
						
						$sub_total_ppn		= ($total_dasar / $ppn);
						
						$total_dan_pph		= $total_dan_pph + $sub_total_dan_pph;
						$total_ppn			= $total_ppn + $sub_total_ppn;
						
						$jumlah 			= $total_dan_pph + $total_ppn; 
						?>
						<tr>
							<td style="border:1px solid black;"><select name="jenis[]" id="name">
									<option value="<?php echo $tampil1['jenis_item'];?>" selected><?php echo $tampil1['jenis_item'];?></option>
									<option value="NON-PPh">NON-PPh</option>
									<option value="PPh">PPh</option>
								  </select>
							</td>
							<td style="border:1px solid black;"><input name="keterangan_budget[]" type="text" id="name" size="35px" value="<?php echo $tampil1['keterangan_budget'];?>" required></td>
							<td style="border:1px solid black;"><input onkeypress="return isNumberKey(event)" name="harga_budget[]"  value="<?php echo $tampil1['harga_budget'];?>" type="text" id="name" required></td>
							<td style="border:1px solid black;"><input onkeypress="return isNumberKey(event)" name="jumlah_budget[]" value="<?php echo $tampil1['jumlah_budget'];?>" type="text" id="name" size="10px" required></td>
							<td style="border:1px solid black;"><select name="pph[]" id="name">
									<option value="<?php echo $tampil1['pph'];?>" selected><?php echo $tampil1['pph'];?></option>
									<option value="2.5-PPh">PPh 21 - NPWP (2.5%)</option>
									<option value="3-PPh">PPh 21 - NON NPWP (3%)</option>
									<option value="2-PPh">PPh 23 - NPWP (2%)</option>
									<option value="4-PPh">PPh 23 - NON NPWP (4%)</option>
									<option value="10-PPh">PPh 4(2) (10%)</option>
									<option value=""></option>
								</select>
							</td>
							<td style="border:1px solid black;"><select name="ppn[]" id="name">
									<option value="<?php echo $tampil1['ppn'];?>" selected><?php echo $tampil1['ppn'];?></option>
									<option value="10-PPN">PPN (10%)</option>
								  </select>
							</td><!--
							<?php
								if ($i==1) {?>
									<td style="border:1px solid black;" align="center"><img src="images/tambah.png" style="width:30px" id="add"></td>
								<?php
								}
								else
								{?>
									<td style="border:1px solid black;" align="center"><img src="images/hapus.png" style="width:30px" id="remove"></td>
								<?php }?>
										 <input onkeypress="return isNumberKey(event)" name="sub_total_budget[]" type="text" id="name" required> -->
						</tr>
						<?php } ?>
					</table>
						<tr align="center">
						<td><br><br></td>
				        	<td colspan="7"><input type="submit" value="Revisi Budget">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="pdm_ditolak.sml"><img src="images/back.png" width="50px" height="28px"></a></td>
                			
	          			</tr>
			


<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script><!-- -->
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

<!-- estimasi buget -->
<script>
$(document).ready(function(){
   
	$('#add').click(function(){
	var inp = $('#box');
	var i = $('input').size() + 1;
	$('<tr id="box' + i +'"><td style="border:1px solid black;"><select name="jenis[]" id="name"><option value="" selected></option><option value="NON-PPh">NON-PPh</option><option value="PPh">PPh</option></select></td><td style="border:1px solid black;"><input type="text" size="35px" id="name" name="keterangan_budget[]" required/></td><td style="border:1px solid black;"><input onkeypress="return isNumberKey(event)" type="text" id="name" name="harga_budget[]"/></td><td style="border:1px solid black;"><input onkeypress="return isNumberKey(event)"  type="text" id="name" name="jumlah_budget[]" size="10px" /></td><td style="border:1px solid black;"><select name="pph[]" id="name"><option value="" selected></option><option value="2.5-PPh">PPh 21 - NPWP (2.5%)</option><option value="3-PPh">PPh 21 - NON NPWP (3%)</option><option value="2-PPh">PPh 23 - NPWP (2%)</option><option value="4-PPh">PPh 23 - NON NPWP (4%)</option><option value="10-PPh">PPh 4(2) (10%)</option></select></td><td style="border:1px solid black;"><select name="ppn[]" id="name"><option value="" selected></option><option value="10-PPN">PPN (10%)</option></select></td><td style="border:1px solid black;" align="center"><a href="javascript:void(0)" id="remove"><img src="images/hapus.png" style="width:30px"></a></td></tr>').appendTo(inp);
	i++;
	});
	$("#box").on('click','#remove',function(){
        $(this).parent().parent().remove();
    });
	
	
});
</script>

<!-- estimasi omset -->
<script>
$(document).ready(function(){
	$('#add1').click(function(){
	var inp = $('#box1');
	var i = $('input1').size() + 1;
	$('<tr id="box1' + i +'"><td style="border:1px solid black;"><select name="brand_omset[]" id="name1"><option value="" selected></option><?php mysql_connect("localhost","sml","sda@apache2016");mysql_select_db("sml_sistem_v1");	$cek=mysql_query("SELECT * FROM tabel_brand order by nama_brand ASC");while($brand=mysql_fetch_array($cek)){?><option value="<?php echo $brand['nama_brand'];?>"><?php echo $brand['nama_brand'];?></option><?php } ?></select></td><td style="border:1px solid black;"><input onkeypress="return isNumberKey(event)" type="text" id="name1" name="jumlah_omset[]"/></td><td style="border:1px solid black;"><input onkeypress="return isNumberKey(event)" type="text"  id="name1" name="harga_omset[]"/></td><td style="border:1px solid black;" align="center"><a href="javascript:void(0)" id="remove1"><img src="images/hapus.png" style="width:30px"></a></td></tr>').appendTo(inp);
	i++;
	});
	$("#box1").on('click','#remove1',function(){
        $(this).parent().parent().remove();
    });
});
</script>

<!-- estimasi distribusi -->
<script>
$(document).ready(function(){
	$('#add2').click(function(){
	var inp = $('#box2');
	var i = $('input2').size() + 1;
	$('<tr id="box2' + i +'"><td style="border:1px solid black;"><select name="brand[]" id="name2"><option value="" selected></option><?php mysql_connect("localhost","sml","sda@apache2016");mysql_select_db("sml_sistem_v1");	$cek=mysql_query("SELECT * FROM tabel_brand order by nama_brand ASC");while($brand=mysql_fetch_array($cek)){?><option value="<?php echo $brand['nama_brand'];?>"><?php echo $brand['nama_brand'];?></option><?php } ?></select></td><td style="border:1px solid black;"><input type="text" id="name2" name="outlet_universe[]"/></td><td style="border:1px solid black;"><input type="text"  id="name2" name="outlet_terdistribusi[]"/></td><td style="border:1px solid black;"><input type="text"  id="name2" name="target_distribusi[]"/></td><td style="border:1px solid black;" align="center"><a href="javascript:void(0)" id="remove2"><img src="images/hapus.png" style="width:30px"></a></td></tr>').appendTo(inp);
	i++;
	});
	$("#box2").on('click','#remove2',function(){
        $(this).parent().parent().remove();
    });
});
</script>

</body>
</html>
