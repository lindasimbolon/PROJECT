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
   
  $('<div id="box' + i +'"><input type="text" size="50px" id="name" name="keterangan_budget[]" required/> <input onkeypress="return isNumberKey(event)" type="text" id="name" name="jumlah_budget[]"   /> <input onkeypress="return isNumberKey(event)"  type="text" id="name" name="harga_budget[]" /> <input onkeypress="return isNumberKey(event)" type="text"  id="name" name="sub_total_budget[]" />&nbsp;<img src="images/hapus.png" style="width:30px" id="remove"></tr></table> </div>').appendTo(inp);
  

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
		<h4><center><u>INPUT PROPOSAL</u></center></h4>
		
		<form action="input_proposal_simpan.sml"  method="post" enctype="multipart/form-data">
				<table width="85%" align="center"><br>  
				<tr align="left" height="30">
					<td><b>NAMA CMR</b></td>
					<td><select name="id_cmr" required style="width:200px">
						<option value="" selected>PILIH NAMA CMR</option>
						<?php
						$sql1 = mysql_query ("select * from tabel_cmr");
						while ($hasil1 = mysql_fetch_array($sql1)){
						?>	
						<option value="<?php echo $hasil1['id_cmr'];?>"><?php echo $hasil1['nama_cmr'];?></option>
						<?php } ?>
					    </select>	
					</td>
				</tr>
				<tr align="left" height="30">
					<td><b>I. DESKRIPSI PROGRAM</b></td>
				</tr>
				<tr align="left" height="30">
					<td><b>&nbsp;&nbsp; 1.1 BRAND</b></td>
					<td><select name="brand" required>
					    	<option value="" selected>Pilih Brand</option>
					    <?php
					    	mysql_connect("localhost","sml_sistem","sda@2015");
					  	mysql_select_db("sml_sistem_v1");
						$sql2 = mysql_query ("SELECT * FROM tabel_brand");
						while($brand=mysql_fetch_array($sql2)){
					    ?>
					    	<option value="<?php echo $brand['nama_brand'];?>"><?php echo $brand['nama_brand'];?></option>
					    <?php } ?>
					    </select>
					</td>
				</tr>
				<tr align="left" height="50">
					<td width="250"><b>&nbsp;&nbsp; 1.2 NAMA PROGRAM</b></td>
					<td><input type="text" name="nama_program" value="" size="100"  placeholder=" Isi dengan nama program.."></td>
				</tr>
				<tr align="left" height="50">
					<td width="250"><b>&nbsp;&nbsp; 1.3 JENIS PROGRAM</b></td>
					<td><select name="id_jenis_program" id="jenis">
						<option value="" required selected>Pilih Jenis Program</option>
						<?php
						mysql_connect("localhost","sml_pas","pas123");
						mysql_select_db("sml_pas");
						$sql3 = mysql_query ("select * from tabel_jenis_program");
						while ($hasil3 = mysql_fetch_array($sql3)){
						?>	
						<option value="<?php echo $hasil3['id_jenis_program'];?>"><?php echo $hasil3['jenis_program'];?></option>
						<?php } ?>
					    </select>	
					</td>
				</tr>
				<tr align="left" height="30">
					<td><b>&nbsp;&nbsp; 1.4 TYPE PROGRAM</b></td>
					<td><select name="id_tipe_program" id="tipe">
						<option value="" required selected>Pilih Tipe Program</option>
					    </select>	
					</td>
				</tr>
				<tr align="left" height="50">
					<td width="250"><b>&nbsp;&nbsp; 1.5 LOKASI</b></td>
					<td><input type="text" name="lokasi" value="" size="50"  placeholder=" Isi dengan lokasi.."> 
					&nbsp;&nbsp;<b>TERRITORY / MPC </b><select name="lokasi_territory" required><option value="" selected>Pilih Territory/MPC</option>
					<?php
					mysql_connect("localhost","sml_sistem","sda@2015");
					mysql_select_db("sml_sistem_v1");
					$sql4 = mysql_query ("SELECT * FROM tabel_territory");
					while($mpc=mysql_fetch_array($sql4)){
					?>
					<option value="<?php echo $mpc['nama_territory'];?>"><?php echo $mpc['nama_territory'];?>
					<?php } ?>
					</select>&nbsp;&nbsp; <b>KECAMATAN</b> <input type="text" name="lokasi_kecamatan" size="45" placeholder="Isi dengan kecamatan..">
					</td>
				</tr>
				<tr align="left" height="50">
					<td><b>&nbsp;&nbsp; 1.6 TANGGAL PELAKSANAAN</b></td>
					<td><input type="text" name="mulai_pelaksanaan" value="" size="28"  id="brothergiez" required placeholder=" Isi dengan tanggal pelaksanaan..">
					    <button id="tambah">Tanggal Selesai Jika Lebih dari 1 Hari</button><div id="sampai" style="display:none;" ><input type="text" name="akhir_pelaksanaan" value="" size="28"  id="waktu2"  placeholder=" Isi dengan tanggal selesai.."></div>
					</td>
				</tr>
				<tr align="left" height="50">
					<td><b>&nbsp;&nbsp; 1.7 URAIAN AKTIVITAS</b></td>
					<td><input type="text" name="uraian_aktivitas" value="" size="50"  required placeholder=" Isi dengan uraian aktivitas.."></td>
				</tr>
				<tr>
				 	<td><br></td>
				</tr>
				<tr align="left" height="30">
					<td><b>II. URAIAN PROGRAM</b></td>
				</tr>
				<tr>
				 	<td><br></td>
				</tr>
				<tr align="left" height="50">
					<td valign="top"><strong>&nbsp;&nbsp; 2.1 TUJUAN DAN SASARAN</strong></td>
					<td><textarea name="tujuan_sasaran" ></textarea></td>
				</tr>
				<tr align="left" height="50">
					<td valign="top"><b>&nbsp;&nbsp; 2.2 MEKANISME PELAKSANAAN</b></td>
					<td><textarea name="mekanisme_pelaksanaan" ></textarea></td>
				</tr>
				<tr align="left" height="50">
					<td><strong>&nbsp;&nbsp; 2.3 PENANGGUNG JAWAB</strong></td>
					<td><input type="checkbox" name="penanggung_jawab[]" value="HO" /> HO &nbsp;&nbsp;
					    <input type="checkbox" name="penanggung_jawab[]" value="Promotion Team PT SML" /> Promotion Team PT SML &nbsp;&nbsp;
					    <input type="checkbox" name="penanggung_jawab[]" value="Salesman Team" /> Salesman Team &nbsp;&nbsp;
					    <input type="checkbox" name="penanggung_jawab[]" value="Merchandising Team" /> Merchandising Team &nbsp;&nbsp;
					    <input type="checkbox" name="penanggung_jawab[]" value="Others" /> Others
					</td>
				</tr>
				
				<tr align="left" height="50">
					<td><strong>&nbsp;&nbsp; 2.4 PIC PROGRAM</strong></td>
					<td><input type="text" name="pic_program" value="" size="50"  placeholder=" Isi dengan pic program.."></td>
				</tr>
				
				<tr align="left" height="50">
					<td><strong>&nbsp;&nbsp; 2.5 CONTACT PIC</strong></td>
					<td><input type="text" name="pic_contact" value="" size="50"  placeholder=" Isi dengan contact pic.."></td>
				</tr>
				
				<tr align="left" height="50">
					<td><b>III. RINCIAN BUDGET </b></td>
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
					<td valign="top"><strong></strong></td>
					<td><div id="box">
							<table>
							   <tr>
							       <td width="390"><b>Estimasi</b></td>
							       <td width="162"><b>Jumlah</b></td>
							       <td width="130"><b>Harga</b></td>
							       <!-- <td width="150"><b>Jenis Pembayaran</b></td> -->
							       <td><b>Sub Total</b></td>
							   </tr>
							</table>
							<input name="keterangan_budget[]" type="text" id="name" size="50px" required>
							<input onkeypress="return isNumberKey(event)" name="jumlah_budget[]"  type="text" id="name" required>
							<input onkeypress="return isNumberKey(event)" name="harga_budget[]"  type="text" id="name" required>
							<!-- <select name="pembayaran[]" id="name" required>
								<option value="" selected>Pilih Pembayaran</option>
								<option value="Pembayaran HO">Pembayaran HO</option>
								<option value="Pembayaran AO">Pembayaran AO</option>
							</select> -->
							<input onkeypress="return isNumberKey(event)" name="sub_total_budget[]" type="text" id="name" required>
							<img src="images/tambah.png" style="width:30px" id="add"></td>
					     </div>
					</td>
				</tr>
				<tr>
				 	<td><br></td>
				</tr>
				<tr align="left" height="30">
					<td><b>IV. RINCIAN TARGET </b></td>
				</tr>
				<tr align="left" height="30">
					<td><b>&nbsp;&nbsp; 4.1 TARGET PROGRAM</b></td>
					<td><input type="text" name="target_program" value="" size="30"  placeholder=" Isi dengan target program.."></td>
				</tr>
				<tr>
				 	<td><br></td>
				</tr>
				<tr align="left" height="30">
					<td><b>&nbsp;&nbsp; 4.2 TARGET AUDIENCE</b></td>
					<td><input type="text" name="target_audience" value="" size="30"  placeholder=" Isi dengan target audience.."></td>
				</tr>
				<tr>
				 	<td><br></td>
				</tr>
				<tr align="left" height="30">
					<td><b>&nbsp;&nbsp; 4.3 TARGET CONTACT</b></td>
					<td><input type="text" name="target_contact" value="" size="30"  placeholder=" Isi dengan target contact.."></td>
				</tr>
				<tr>
				 	<td><br></td>
				</tr>
				 <tr align="left" height="50">
					<td valign="top"><strong>&nbsp;&nbsp; 4.4 TARGET SALES</strong></td>
					<td><div id="box1">
							<table>
							   <tr>
							       <td width="390"><b>Estimasi</b></td>
							       <td width="162"><b>Jumlah</b></td>
							       <td width="170"><b>Harga</b></td>
							       <td><b>Sub Total</b></td>
							   </tr>
							</table>
							<input name="keterangan_omset[]" type="text" id="name1" size="50px">
							<input onkeypress="return isNumberKey(event)" name="jumlah_omset[]"   	type="text" id="name1" >
							<input onkeypress="return isNumberKey(event)" name="harga_omset[]"    	type="text" id="name1" >
							<input onkeypress="return isNumberKey(event)" name="sub_total_omset[]" 	type="text" id="name1" >
							<img src="images/tambah.png" style="width:30px" id="add1"></td>
					     </div>
					</td>
				</tr>
				<tr>
				 	<td><br></td>
				</tr>
				<tr align="left" >
					<td><strong>V. COST RATIO</b></td>
					<td><i><font size="2" color="green">Sudah tersimpan otomatis dan dapat dilihat pada menu proposal ketika proposal berhasil disimpan.</font></i></td>
				</tr>
				<tr>
				 	<td><br></td>
				</tr>
				<tr align="left" height="30">
					<td><strong>VI. LAMPIRAN FILE</b></td>
					
				</tr>
				<tr align="left" height="30">
					<td><b>&nbsp;&nbsp; FILE 1</b></td>
					<td><input type="file" name="file1"> (Format file: .jpg/.xlsx/.ppt)</td>
				</tr>
				<!--
				<tr align="left" height="30">
					<td><b>&nbsp;&nbsp; FILE 2</b></td>
					<td><input type="file" name="file2"> (Format file: .jpg/.xlsx/.ppt)</td>
				</tr>
				<tr align="left" height="30">
					<td><b>&nbsp;&nbsp; FILE 3</b></td>
					<td><input type="file" name="file3"> (Format file: .jpg/.xlsx/.ppt)</td>
				</tr>
				-->
				<input type="hidden" name="username" value="<?php echo $_SESSION['username'];?>">
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
