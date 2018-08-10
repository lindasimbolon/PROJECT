<?php include "header.php";?>

<script>tinymce.init({ selector:'textarea' });</script>
<body>
<?php include "menu.php";?>
<!-- Header -->

<!-- estimasi buget -->
<script>

$(document).ready(function(){
   
  $('#add').click(function(){
   
  var inp = $('#box');
   
  var i = $('input').size() + 1;
   
  $('<div id="box' + i +'"><input type="text" size="50px" id="name" name="keterangan_budget[]" required/> <input onkeypress="return isNumberKey(event)" type="text" id="name" name="jumlah_budget[]" /> <input onkeypress="return isNumberKey(event)" type="text" id="name" name="harga_budget[]" /> <input onkeypress="return isNumberKey(event)" type="text" id="name" name="sub_total_budget[]" />&nbsp;<img src="images/hapus.png" style="width:30px" id="remove"></tr></table> </div>').appendTo(inp);
   
  i++;
   
  });
   
   
  $('body').on('click','#remove',function(){
   
  $(this).parent('div').remove();
   
  });
   
});
</script>
<!-- estimasi omset -->
<script>

$(document).ready(function(){
   
  $('#add1').click(function(){
   
  var inp = $('#box1');
   
  var i = $('input1').size() + 1;
   
  $('<div id="box1' + i +'"><input type="text" size="50px"  id="name1" name="keterangan_omset[]"/> <input onkeypress="return isNumberKey(event)" type="text" id="name1" name="jumlah_omset[]"/> <input onkeypress="return isNumberKey(event)" type="text"  id="name1" name="harga_omset[]"/> <input onkeypress="return isNumberKey(event)" type="text"  id="name1" name="sub_total_omset[]" />&nbsp;<img src="images/hapus.png" style="width:30px" id="remove1"></tr></table> </div>').appendTo(inp);
   
  i++;
   
  });
   
   
  $('body').on('click','#remove1',function(){
   
  $(this).parent('div').remove();
   
  });
   
});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("button").click(function(){
       $("#sampai").fadeIn("slow");
        $("#tambah").hide();
    });
});
</script>

<header id="head">
		<h4><center><u>EDIT PROPOSAL</u></center></h4>
				<form action="update_proposal.sml" name="form1" method="post" id="form_combo">
				<table width="50%" align="center"><br>  
				<?php
				$id = $_GET['id'];
				$sql1 = mysql_query ("SELECT * FROM tabel_proposal a, tabel_cmr b, tabel_tipe_program c, tabel_ao d
				where a.id_cmr=b.id_cmr and c.id_tipe_program=a.id_tipe_program and d.id_ao=b.id_ao order by a.id_proposal DESC ");
				while ($hasil1 = mysql_fetch_array($sql1)){
				?>
				<input type="hidden" name="id_proposal" value="<?php echo $id;?>" readonly size="5">
				<tr align="left" height="30">
					<td><b>NAMA CMR</b></td>
					<td><select name="id_cmr" required style="width:200px">
						<option value="" selected>PILIH NAMA CMR</option>
						<?php
						$sql = mysql_query ("select * from tabel_cmr");
						while ($hasil2 = mysql_fetch_array($sql)){
						?>	
						<option value="<?php echo $hasil2['id_cmr'];?>"><?php echo $hasil2['nama_cmr'];?></option>
						<?php } ?>
					    </select>	
					</td>
				</tr>
				<tr align="left" height="50">
					<td width="200" valign="top"><b>NAMA PROGRAM</b></td>
					<td><input type="textarea" name="nama_program" size="30" value="<?php echo $hasil['nama_program'];?>"></td>
				</tr>
				<tr align="left" height="50">
					<td width="200" valign="top"><b>I. PENDAHULUAN</b></td>
					<td><input type="textarea" name="pendahuluan" size="30" value="<?php echo $hasil['pendahuluan'];?>"></td>
				</tr>
				<tr align="left" height="80">
					<td valign="top"><strong>II. TUJUAN DAN SASARAN</strong></td>
					<td><input type="textarea" name="tujuan_sasaran" size="30" value="<?php echo $hasil['tujuan_sasaran'];?>"></td>
				</tr>
				<tr align="left" height="30">
					<td><b>III. PROGRAM</b></td>
				</tr>
				<tr align="left" height="30">
					<td><b>&nbsp;&nbsp; 3.1 BENTUK PROGRAM</b></td>
					<td><select name="id_tipe_program" >
						<option value="" required selected>Pilih Bentuk Program</option>
						<?php
						$sql1 = mysql_query ("select * from tabel_tipe_program");
						while ($hasil = mysql_fetch_array($sql1)){
						?>	
						<option value="<?php echo $hasil['id_tipe_program'];?>"><?php echo $hasil['tipe_program'];?></option>
						<?php } ?>
					    </select>	
					</td>
				</tr>
				<tr align="left" height="30">
					<td><b>&nbsp;&nbsp; 3.2 TITIK PROGRAM</b></td>
					<td><input type="textarea" name="p_titik_program" size="30" value="<?php echo $hasil['p_titik_program'];?>"></td>
				</tr>
				<tr align="left" height="80">
					<td><b>&nbsp;&nbsp; 3.3 TANGGAL PROGRAM</b></td>
					<td><input type="text" name="p_mulai_program" value="" size="28"  id="brothergiez" required placeholder=" Isi dengan tanggal program..">
					    <button id="tambah">Tanggal Selesai Jika Lebih dari 1 Hari</button><div id="sampai" style="display:none;" ><input type="text" name="p_akhir_program" value="" size="28"  id="waktu2"  placeholder=" Isi dengan tanggal selesai.."></div>
					</td>
				</tr>
				<tr>
					<td><br></td>
				</tr>
				<tr align="left" height="50">
					<td valign="top"><b>&nbsp;&nbsp; 3.4 MEKANISME PROGRAM</b></td>
					<td><input type="textarea" name="p_mekanisme_program" size="30" value="<?php echo $hasil['p_mekanisme_program'];?>"></td>
				</tr>
				<tr>
				 	<td><br></td>
				</tr>
				<script>
				
				function isNumberKey(evt){
				 var charCode = (evt.which) ? evt.which : event.keyCode;
				 if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
				 return false;
				 return true;
				}
				</script>
				<tr align="left" height="50">
					<td valign="top"><strong>IV. ESTIMASI BUDGET</strong></td>
					<td><div id="box">
							<table>
							   <tr>
							       <td width="390"><b>Estimasi</b></td>
							       <td width="162"><b>Jumlah</b></td>
							       <td width="170"><b>Harga</b></td>
							       <td><b>Sub Total</b></td>
							   </tr>
							</table>
					<input name="keterangan_budget[]" type="text" id="name" size="50px" value="<?php echo $hasil['keterangan_budget'];?>">
					<input onkeypress="return isNumberKey(event)" name="jumlah_budget[]"  type="text" id="name" value="<?php echo $hasil['jumlah_budget'];?>">
					<input onkeypress="return isNumberKey(event)" name="harga_budget[]"   type="text" id="name" value="<?php echo $hasil['harga_budget'];?>">
					<input onkeypress="return isNumberKey(event)" name="sub_total_budget[]" type="text" id="name" value="<?php echo $hasil['sub_total_budget'];?>">
					<img src="images/tambah.png" style="width:30px" id="add"></td>
					     </div>
					</td>
				</tr>
				<tr>
				 	<td><br></td>
				</tr>
				 <tr align="left" height="50">
					<td valign="top"><strong>V. ESTIMASI OMSET</strong></td>
					<td><div id="box1">
							<table>
							   <tr>
							       <td width="390"><b>Estimasi</b></td>
							       <td width="162"><b>Jumlah</b></td>
							       <td width="170"><b>Harga</b></td>
							       <td><b>Sub Total</b></td>
							   </tr>
							</table>
					<input name="keterangan_omset[]" type="text" id="name1" size="50px" value="<?php echo $hasil['keterangan_omset'];?>">
					<input onkeypress="return isNumberKey(event)" name="jumlah_omset[]" type="text" id="name1" value="<?php echo $hasil['jumlah_omset'];?>">
					<input onkeypress="return isNumberKey(event)" name="harga_omset[]"  type="text" id="name1" value="<?php echo $hasil['harga_omset'];?>">
					<input onkeypress="return isNumberKey(event)" name="sub_total_omset[]" type="text" id="name1" value="<?php echo $hasil['sub_total_omset'];?>">
					<img src="images/tambah.png" style="width:30px" id="add1"></td>
					     </div>
					</td>
				</tr>
				<tr>
				 	<td><br></td>
				</tr>
				<tr align="left">
					<td valign="top"><strong>VI. TARGET</strong></td>
					<td><input type="textarea" name="p_mekanisme_program" size="30" value="<?php echo $hasil['target_program'];?>"></td>
				</tr>
				<tr>
				 	<td><br></td>
				</tr>
				<tr align="left">
					<td><strong>VII. COST RATIO</b></td>
					<td><i><font size="2" color="green">Sudah tersimpan otomatis dan dapat dilihat pada menu proposal ketika proposal berhasil disimpan.</font></i></td>
				</tr>
				<tr>
				 	<td><br></td>
				</tr>
				<tr align="left">
					<td valign="top"><strong>VIII. SUSUNAN PANITIA</strong></td>
					<td><input type="textarea" name="susunan_panitia" size="30" value="<?php echo $hasil['susunan_panitia'];?>"></td>
				</tr>
				<tr>
				 	<td><br></td>
				</tr>
				<tr align="left">
					<td valign="top"><strong>IX. PENUTUP</strong></td>
					<td><input type="textarea" name="penutup" size="30" value="<?php echo $hasil['penutup'];?>"></td>
					<td><textarea name="penutup" ></textarea></td>
				</tr>
				<tr>
				 	<td><br></td>
				</tr>
				<tr align="left">
					<td></td>
					<td><input type="submit" value="Simpan"></td>
				</tr>
				</table>
				</form>


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
</body>
</html>
