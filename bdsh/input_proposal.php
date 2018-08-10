<?php include "header.php";?>

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
	
	<h4><center><u>INPUT PROPOSAL PAS SMN - DIREKSI ( > Rp. 50,000,000 )</u></center></h4>
	<form action="input_proposal_simpan.sml"  method="post" enctype="multipart/form-data" autocomplete="off">
		<table width="85%" align="center"><br>  
		<input type="hidden" name="jenis_proposal" value="LOKAL_DIREKSI">
			<tr align="left" height="30">
				<td><b>NAMA CMR</b></td>
				<td><select name="id_cmr" required style="width:200px;padding:5px">
						<option value="" selected>[ PILIH NAMA CMR ]</option>
						<?php
							$singkatan = $_SESSION['ao'];
							$sql = mysql_query ("select * from tabel_cmr where id_ao <>'' order by id_ao ASC");
							while ($hasil = mysql_fetch_array($sql)){
						?>	
						<option value="<?php echo $hasil['id_cmr'];?>"><?php echo $hasil['nama_cmr'];?></option>
						<?php } ?>
					  </select>	
				</td>
			</tr>
			<tr align="left" height="50">
				<td><b>NAMA SUPERVISOR</b></td>
				<td><select name="nama_spv" required style="width:250px;padding:5px">
						<option value="" selected>[ PILIH NAMA SUPERVISOR ]</option>
						<?php
							$singkatan = $_SESSION['ao'];
							$spv = mysql_query ("select * from tabel_territory");
							while ($hasil_spv = mysql_fetch_array($spv)){
						?>	
						<option value="<?php echo $hasil_spv['nama_spv'];?>"><?php echo $hasil_spv['nama_spv'];?></option>
						<?php } ?>
					</select>	
				</td>
			</tr>
			<tr align="left" height="30">
				<td><b>I. DESKRIPSI PROGRAM</b></td>
			</tr>
			<tr align="left" height="30">
				<td><b>&nbsp;&nbsp; 1.1 BRAND</b></td>
				<td><select name="brand_program" style="width:250px;padding:5px" required>
						<option value="">[ PILIH BRAND ]</option>
						<option value="APACHE FILTER">APACHE FILTER</option>
						<option value="APACHE KRETEK">APACHE KRETEK</option>
						<option value="APACHE BLACKGOLD">APACHE BLACKGOLD</option>
						<option value="APACHE EXOTIC">APACHE EXOTIC</option>
						<option value="APACHE EXCLUSIVE">APACHE EXCLUSIVE</option>
						<option value="APACHE">APACHE</option>
						<option value="EXTREME">EXTREME</option>
					</select>
				</td>
			</tr>
			<tr align="left" height="50">
				<td width="250"><b>&nbsp;&nbsp; 1.2 NAMA PROGRAM</b></td>
				<td><input type="text" name="nama_program" value="" size="100"  placeholder=" Isi dengan nama program.."></td>
			</tr>
			<tr align="left" height="50">
				<td width="250"><b>&nbsp;&nbsp; 1.3 JENIS PROGRAM</b></td>
				<td><select name="id_jenis_program" id="jenis" style="width:250px;padding:5px">
						<option value="" required selected>[ PILIH JENIS PROGRAM ]</option>
						<?php
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
				<td><select name="id_tipe_program" id="tipe" style="padding:5px">
						<option value="" required selected>[ PILIH TIPE PROGRAM ]</option>
					</select>	
				</td>
			</tr>
			<tr align="left" height="50">
				 <td width="250">&nbsp;&nbsp; <b>1.5 TERRITORY</b></td>
				 <td><select name="lokasi_territory" required style="width:250px;padding:5px">
						<option value="" selected>[ Pilih Territory ]</option>
						<?php
							$sql4 = mysql_query ("SELECT * FROM tabel_territory GROUP BY nama_territory");
							while($mpc=mysql_fetch_array($sql4)){
						?>
						<option value="<?php echo $mpc['nama_territory'];?>"><?php echo $mpc['nama_territory'];?>
						<?php } ?>
					</select>&nbsp;&nbsp; 
				</td>
			</tr>
			<tr align="left" height="30">
				<td width="250">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>KECAMATAN</b></td>
				<td><input type="text" name="lokasi_kecamatan" size="45" placeholder="Isi dengan kecamatan.." value="" required></td>
			</tr>
			<tr align="left" height="30">
				<td width="250"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; LOKASI</b></td>
				<td><input type="text" name="lokasi" value="" size="50"  required placeholder="Isi lokasi program.."></td>
			</tr>
			<tr align="left" height="50">
				<td><b>&nbsp;&nbsp; 1.6 TANGGAL PELAKSANAAN</b></td>
				<td><input type="text" name="mulai_pelaksanaan" value="" size="28"  id="brothergiez" required placeholder=" Isi dengan tanggal pelaksanaan..">
				&nbsp;&nbsp;&nbsp;&nbsp;
				<img src="images/tambah.png" id="tambah" width="30px"> &nbsp;&nbsp;&nbsp;&nbsp;
				<p id="keterangan1"><font color="green"><i> *) klik tombol (+) jika program Lebih dari 1 hari..</i></font></p>
				<div id="sampai" style="display:none;" >
					<input type="text" name="akhir_pelaksanaan" value="" size="28"  id="waktu2"  placeholder=" Isi dengan tanggal selesai..">
					&nbsp;&nbsp;&nbsp;&nbsp;
					<img src="images/cross.png" width="30px" id="tutup">
					<font color="green"><i> *) klik tombol (X) jika ingin tetap 1 hari..</i></font>
				</div>
				</td>
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
				<td valign="top"><strong>&nbsp;&nbsp; 2.1 LATAR BELAKANG</strong></td>
				<td><textarea name="latar_belakang" ></textarea></td>
			</tr>
			<tr>
				<td><br></td>
			</tr>
			<tr align="left" height="50">
				<td valign="top"><strong>&nbsp;&nbsp; 2.2 TUJUAN DAN SASARAN</strong></td>
				<td><textarea name="tujuan_sasaran" ></textarea></td>
			</tr>
			<tr>
				<td><br></td>
			</tr>
			<tr align="left" height="50">
				<td valign="top"><b>&nbsp;&nbsp; 2.3 MEKANISME PELAKSANAAN</b></td>
				<td><textarea name="mekanisme_pelaksanaan" ></textarea></td>
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
				<td>
					<table border="1" id="box">
						<tr align="center" bgcolor="#227788">
							<td rowspan="2" style="border:1px solid black;padding:5px;color:white"><b>Jenis Item</b></td>
							<td rowspan="2" style="border:1px solid black;padding:5px;color:white"><b>Nama Item</b></td>
							<td rowspan="2" style="border:1px solid black;padding:5px;color:white"><b>Harga Dasar</b></td>
							<td rowspan="2" style="border:1px solid black;padding:5px;color:white"><b>Unit</b></td>
							<td colspan="2" align="center" style="border:1px solid black;padding:5px;color:white"><b>Pajak</b></td>
							<td rowspan="2" style="border:1px solid black;padding:5px;color:white"><b>Aksi</b></td>
						</tr>
						<tr align="center" bgcolor="#227788">
							<td style="border:1px solid black;color:white"><b>PPh</b></td>
							<td style="border:1px solid black;color:white"><b>PPN</b></td>
						</tr>
						<tr>
							<td style="border:1px solid black;"><select name="jenis[]" id="name" required>
									<option value="" selected></option>
									<option value="NON-PPh">NON-PPh</option>
									<option value="PPh">PPh</option>
								</select>
							</td>
							<td style="border:1px solid black;"><input name="keterangan_budget[]" type="text" id="name" size="35px" required></td>
							<td style="border:1px solid black;"><input onkeypress="return isNumberKey(event)" name="harga_budget[]"   type="text" id="name" required></td>
							<td style="border:1px solid black;"><input onkeypress="return isNumberKey(event)" name="jumlah_budget[]"  type="text" id="name" size="10px" required></td>
							<td style="border:1px solid black;"><select name="pph[]" id="name">
									<option value="" selected></option>
									<option value="2.5-PPh">PPh 21 - NPWP (2.5%)</option>
									<option value="3-PPh">PPh 21 - NON NPWP (3%)</option>
									<option value="2-PPh">PPh 23 - NPWP (2%)</option>
									<option value="4-PPh">PPh 23 - NON NPWP (4%)</option>
									<option value="10-PPh">PPh 4(2) (10%)</option>
								</select>
							</td>
							<td style="border:1px solid black;"><select name="ppn[]" id="name">
									<option value="" selected></option>
									<option value="10-PPN">PPN (10%)</option>
								</select>
							</td>
							<td style="border:1px solid black;" align="center"><img src="images/tambah.png" style="width:30px" id="add"></td>
										<!-- <input onkeypress="return isNumberKey(event)" name="sub_total_budget[]" type="text" id="name" required> -->
						</tr>
						
					</table>
					
				</td>
			</tr>
			<tr>
				<td><br></td>
			</tr>
			<tr align="left" height="30">
				<td width="250">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>TANGGAL TRANSFER PDM</b></td>
				<td><input type="text" name="tgl_transfer" size="20" id="transfer" required></td>
			</tr>
			<tr>
			 	<td><br></td>
			</tr>
			<tr align="left" height="30">
				<td><b>IV. RINCIAN TARGET </b></td>
			</tr>
			<tr>
			 	<td><br></td>
			</tr>
			<tr align="left" height="30">
				<td><b>&nbsp;&nbsp; 4.1 TARGET AUDIENCE / OUTLET</b></td>
				<td><input type="text" name="target_audience" value="" size="30"  placeholder=" Isi dengan target audience.." required></td>
			</tr>
			<tr>
			 	<td><br></td>
			</tr>
			<tr align="left" height="30">
				<td><b>&nbsp;&nbsp; 4.2 TARGET CONTACT</b></td>
				<td><input type="text" name="target_contact" value="" size="30"  placeholder=" Isi dengan target contact.."></td>
			</tr>
			<tr>
			 	<td><br></td>
			</tr>
			<tr align="left" height="50">
				<td valign="top"><strong>&nbsp;&nbsp; 4.3 TARGET DISTRIBUSI</strong></td>
				<td>
					<table border="1" id="box2">
						<tr bgcolor="#227788" align="center">
							<td style="border:1px solid black;padding:5px;color:white" rowspan="2"><b>Brand</b></td>
							<td style="border:1px solid black;padding:5px;color:white" rowspan="2"><b>Outlet Universe</b></td>
							<td style="border:1px solid black;padding:5px;color:white" colspan="2"><b>Outlet Terdistribusi</b></td>
							<td style="border:1px solid black;padding:5px;color:white" rowspan="2"><b>Target Distribusi (%)</b></td>
							<td style="border:1px solid black;padding:5px;color:white" rowspan="2"><b>Aksi</b></td>
							<!-- <td><b>Sub Total</b></td> -->
						</tr>
						<tr bgcolor="#227788" align="center">
							<td style="border:1px solid black;padding:5px;color:white"><b>( % )</b></td>
							<td style="border:1px solid black;padding:5px;color:white"><b>( Qty )</b></td>
						</tr>
						<tr>
							<td><select name="brand[]" id="name2">
									<option value="" selected></option>
									<?php
										mysql_connect("localhost","sml","sda@apache2016");
										mysql_select_db("sml_sistem_v1");
										$cek=mysql_query("SELECT * FROM tabel_brand order by nama_brand ASC");
										while($brand=mysql_fetch_array($cek)){
									?>
										<option value="<?php echo $brand['nama_brand'];?>"><?php echo $brand['nama_brand'];?></option>
									<?php } ?>
								</select>
							</td>
							<td><input name="outlet_universe[]" type="text" id="name2"></td>
							<td><input name="outlet_terdistribusi1[]" type="text" id="name2"></td>
							<td><input name="outlet_terdistribusi2[]" type="text" id="name2"></td>
							<td><input name="target_distribusi[]" 	type="text" id="name2"></td>
							<td align="center"><img src="images/tambah.png" style="width:30px" id="add2"></td>
							<!-- <input onkeypress="return isNumberKey(event)" name="sub_total_omset[]" type="text" id="name1" > -->
						</tr>
					</table>
				</td>
			</tr>
			<tr>
			 	<td><br></td>
			</tr>
			<tr align="left" height="50">
				<td valign="top"><strong>&nbsp;&nbsp; 4.4 TARGET SALES</strong></td>
				<td>
						<table border="1" id="box1">
							<tr bgcolor="#227788" align="center">
								<td style="border:1px solid black;padding:5px;color:white"><b>Brand</b></td>
								<td style="border:1px solid black;padding:5px;color:white"><b>Jml (bks)</b></td>
								<td style="border:1px solid black;padding:5px;color:white"><b>Harga per bks (Rp)</b></td>
								<td style="border:1px solid black;padding:5px;color:white"><b>Aksi</b></td>
							    <!-- <td><b>Sub Total</b></td> -->
							</tr>
							<tr>
								<td><select name="brand_omset[]" id="name1">
										<option value="" selected></option>
										<?php
											$cek=mysql_query("SELECT * FROM tabel_brand order by nama_brand ASC");
											while($brand=mysql_fetch_array($cek)){
										?>
										<option value="<?php echo $brand['nama_brand'];?>"><?php echo $brand['nama_brand'];?></option>
										<?php } ?>
									</select>
								</td>
								<td><input onkeypress="return isNumberKey(event)" name="jumlah_omset[]" type="text" id="name1"></td>
								<td><input onkeypress="return isNumberKey(event)" name="harga_omset[]"  type="text" id="name1"></td>
								<td align="center"><img src="images/tambah.png" style="width:30px" id="add1"></td>
								<!-- <input onkeypress="return isNumberKey(event)" name="sub_total_omset[]" 	type="text" id="name1" > -->
							</tr>
						</table>
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
				<td><b>&nbsp;&nbsp; FILE</b></td>
				<td><input type="file" name="file1"> (Format file: .jpg/ .xlsx/ .ppt/ .rar)</td>
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
	$('<tr id="box1' + i +'"><td style="border:1px solid black;"><select name="brand_omset[]" id="name1"><option value="" selected></option><?php mysql_connect("localhost","root","");mysql_select_db("sml_sistem_v1");$cek=mysql_query("SELECT * FROM tabel_brand order by nama_brand ASC");while($brand=mysql_fetch_array($cek)){?><option value="<?php echo $brand['nama_brand'];?>"><?php echo $brand['nama_brand'];?></option><?php } ?></select></td><td style="border:1px solid black;"><input onkeypress="return isNumberKey(event)" type="text" id="name1" name="jumlah_omset[]"/></td><td style="border:1px solid black;"><input onkeypress="return isNumberKey(event)" type="text"  id="name1" name="harga_omset[]"/></td><td style="border:1px solid black;" align="center"><a href="javascript:void(0)" id="remove1"><img src="images/hapus.png" style="width:30px"></a></td></tr>').appendTo(inp);
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
	$('<tr id="box2' + i +'"><td style="border:1px solid black;"><select name="brand[]" id="name2"><option value="" selected></option><?php mysql_connect("localhost","root","");mysql_select_db("sml_sistem_v1");$cek=mysql_query("SELECT * FROM tabel_brand order by nama_brand ASC");while($brand=mysql_fetch_array($cek)){?><option value="<?php echo $brand['nama_brand'];?>"><?php echo $brand['nama_brand'];?></option><?php } ?></select></td><td style="border:1px solid black;"><input type="text" id="name2" name="outlet_universe[]"/></td><td style="border:1px solid black;"><input type="text"  id="name2" name="outlet_terdistribusi1[]"/></td><td style="border:1px solid black;"><input type="text"  id="name2" name="outlet_terdistribusi2[]"/></td><td style="border:1px solid black;"><input type="text"  id="name2" name="target_distribusi[]"/></td><td style="border:1px solid black;" align="center"><a href="javascript:void(0)" id="remove2"><img src="images/hapus.png" style="width:30px"></a></td></tr>').appendTo(inp);
	i++;
	});
	$("#box2").on('click','#remove2',function(){
        $(this).parent().parent().remove();
    });
});
</script>

</body>
</html>
