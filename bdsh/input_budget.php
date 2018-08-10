<?php include "header.php";?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#BALIKAPUA").click(function(){
        $("#BALIKAPUA1").show();
         $("#JAKARTA1").hide();
         $("#JAKARTA").hide();
		 $("#JAWA_TENGAH1").hide();
         $("#JAWA_TENGAH").hide();
		 $("#JAWA_TIMUR1").hide();
         $("#JAWA_TIMUR").hide();
		 $("#MEDAN1").hide();
		 $("#MEDAN").hide();
		 $("#LAMPUNG1").hide();
		 $("#LAMPUNG").hide();
		 $("#JAWA_BARAT1").hide();
         $("#JAWA_BARAT").hide();
		 $("#INTIM1").hide();
         $("#INTIM").hide();
    });
    $("#JAKARTA").click(function(){
        $("#JAKARTA1").show();
        $("#BALIKAPUA1").hide();
        $("#BALIKAPUA").hide();
		 $("#JAWA_TENGAH1").hide();
         $("#JAWA_TENGAH").hide();
		$("#JAWA_TIMUR1").hide();
         $("#JAWA_TIMUR").hide();
		 $("#MEDAN1").hide();
		 $("#MEDAN").hide();
		 $("#LAMPUNG1").hide();
		 $("#LAMPUNG").hide();
		 $("#JAWA_BARAT1").hide();
         $("#JAWA_BARAT").hide();
		 $("#INTIM1").hide();
         $("#INTIM").hide();
    });
	$("#JAWA_TENGAH").click(function(){
        $("#JAWA_TENGAH1").show();
         $("#JAKARTA1").hide();
         $("#JAKARTA").hide();
		 $("#BALIKAPUA1").hide();
         $("#BALIKAPUA").hide();
		 $("#JAWA_TIMUR1").hide();
         $("#JAWA_TIMUR").hide();
		 $("#MEDAN1").hide();
		 $("#MEDAN").hide();
		 $("#LAMPUNG1").hide();
		 $("#LAMPUNG").hide();
		 $("#JAWA_BARAT1").hide();
         $("#JAWA_BARAT").hide();
		 $("#INTIM1").hide();
         $("#INTIM").hide();
    });
	
	$("#JAWA_TIMUR").click(function(){
        $("#JAWA_TIMUR1").show();
		 $("#JAWA_TENGAH1").hide();
         $("#JAWA_TENGAH").hide();
         $("#JAKARTA1").hide();
         $("#JAKARTA").hide();
		 $("#BALIKAPUA1").hide();
         $("#BALIKAPUA").hide();
		 $("#MEDAN1").hide();
		 $("#MEDAN").hide();
		 $("#LAMPUNG1").hide();
		 $("#LAMPUNG").hide();
		 $("#JAWA_BARAT1").hide();
         $("#JAWA_BARAT").hide();
		 $("#INTIM1").hide();
         $("#INTIM").hide();
    });
	$("#MEDAN").click(function(){
        $("#MEDAN1").show();
        $("#JAWA_TENGAH1").hide();
         $("#JAWA_TENGAH").hide();
		 $("#JAWA_TIMUR1").hide();
         $("#JAWA_TIMUR").hide();
         $("#JAKARTA1").hide();
         $("#JAKARTA").hide();
		 $("#BALIKAPUA1").hide();
         $("#BALIKAPUA").hide();
		 $("#LAMPUNG1").hide();
		 $("#LAMPUNG").hide();
		 $("#JAWA_BARAT1").hide();
         $("#JAWA_BARAT").hide();
		 $("#INTIM1").hide();
         $("#INTIM").hide();
    });
	$("#LAMPUNG").click(function(){
        $("#LAMPUNG1").show();
        $("#MEDAN1").hide();
        $("#MEDAN").hide();
		 $("#JAWA_TENGAH1").hide();
         $("#JAWA_TENGAH").hide();
		 $("#JAWA_TIMUR1").hide();
         $("#JAWA_TIMUR").hide();
         $("#JAKARTA1").hide();
         $("#JAKARTA").hide();
		 $("#BALIKAPUA1").hide();
         $("#BALIKAPUA").hide();
		 $("#JAWA_BARAT1").hide();
         $("#JAWA_BARAT").hide();
		 $("#INTIM1").hide();
         $("#INTIM").hide();
    });
	$("#JAWA_BARAT").click(function(){
        $("#JAWA_BARAT1").show();
         $("#MEDAN1").hide();
         $("#MEDAN").hide();
		 $("#JAWA_TENGAH1").hide();
         $("#JAWA_TENGAH").hide();
		 $("#JAWA_TIMUR1").hide();
         $("#JAWA_TIMUR").hide();
         $("#JAKARTA1").hide();
         $("#JAKARTA").hide();
		 $("#BALIKAPUA1").hide();
         $("#BALIKAPUA").hide();
		 $("#LAMPUNG1").hide();
         $("#LAMPUNG").hide();
		 $("#INTIM1").hide();
         $("#INTIM").hide();
    });
	$("#INTIM").click(function(){
        $("#INTIM1").show();
		 $("#MEDAN1").hide();
         $("#MEDAN").hide();
         $("#JAWA_TENGAH1").hide();
         $("#JAWA_TENGAH").hide();
		 $("#JAWA_TIMUR1").hide();
         $("#JAWA_TIMUR").hide();
		 $("#JAKARTA1").hide();
         $("#JAKARTA").hide();
		  $("#BALIKAPUA1").hide();
         $("#BALIKAPUA").hide();
		 $("#LAMPUNG1").hide();
         $("#LAMPUNG").hide();
		  $("#JAWA_BARAT1").hide();
         $("#JAWA_BARAT").hide();
    });
});
</script>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
		<h4><center><u>INPUT BUDGET MARKETING</u></center></h4><br>
		      <form action="input_budget_simpan.sml" method="post" enctype="multipart/form-data">
				<form action="" method="post">
				<table style="color:black;" width="30%" align="center">  
					<input type="hidden" name="username" value="<?php echo $_SESSION['username'];?>">
					
					<tr align="left">
						<td width="150"><b>REGIONAL</b></td>
						<td><button id="BALIKAPUA">BALIKAPUA</button>
						    <button id="JAKARTA">JAKARTA</button> 
							<button id="JAWA_TENGAH">JAWA TENGAH</button><br><br> 
							<button id="JAWA_TIMUR">JAWA TIMUR</button>
							<button id="MEDAN">MEDAN</button>
							<button id="LAMPUNG">LAMPUNG</button> <br><br>
							<button id="JAWA_BARAT">JAWA BARAT</button> 
							<button id="INTIM">&nbsp;&nbsp;INTIM&nbsp;&nbsp;</button> 
						    &nbsp;<a href="">Reload</a>
									
						</td>
						
					</tr>
					<tr>
					 	<td><br></td>
					</tr>
					<tr align="left">
						<td><b>TAHUN</b></td>
					        <td><select name="tahun" style="width:120px" required>
					                <option value="">- Pilih Tahun --</option>
					                <?php
					                $thn_skr = date('Y');
					                for ($x = $thn_skr; $x >= 2018; $x--) {
					                ?>
					                    <option value="<?php echo $x ?>"><?php echo $x ?></option>
					                <?php
					                }
					                ?>
					            </select>
					        </td>
					        <td></td>
					</tr>
					<tr>
					 	<td><br></td>
					</tr>
					<tr align="left" >
						<td><b>QUARTAL</b></td>
						<td><select name="quartal" style="width:120px" required>
							<option value="" selected>- Pilih Quartal -</option>
							<?php
							$cek_data	   = mysql_query("SELECT * FROM tabel_quartal order by id_quartal ASC");
							while($quartal = mysql_fetch_array($cek_data)){
							?>
							<option value="<?php echo $quartal['id_quartal'];?>"><?php echo $quartal['nama_quartal'];?></option>
							<?php } ?>
							</select>
						</td>
						<td></td>
					</tr>
				<table>
					<script>
				
				function isNumberKey(evt){
				 var charCode = (evt.which) ? evt.which : event.keyCode;
				 if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
				 return false;
				 return true;
				}
				</script>
				<br>
				
					<table  style="color:black;" id="BALIKAPUA1" hidden align="center" width="38%" style="display:none">
					
						<tr height="30">
							<td width="300" align='center' style="border-style: solid;border-width: thin"><b>NAMA AO</b></td>
							<td style="border-style: solid;border-width: thin"><b>&nbsp;BUDGET TOP DOWN</b></td>
							<td style="border-style: solid;border-width: thin"><b>&nbsp;BUDGET BOTTOM UP</b></td>
						</tr>
						<tr height="30">
						  	<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="balikapua[]" value="AREA OFFICE BALI"><b>AO BALI</b></td>
							<td><input type="text" name="budget_top_down_balikapua[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_balikapua[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="balikapua[]" value="AREA OFFICE SAMARINDA"><b>AO SAMARINDA</b></td>
							<td><input type="text" name="budget_top_down_balikapua[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_balikapua[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="balikapua[]" value="AREA OFFICE MATARAM"><b>AO MATARAM</b></td>
							<td><input type="text" name="budget_top_down_balikapua[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_balikapua[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
						  	<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="balikapua[]" value="AREA OFFICE BANJARMASIN"><b>AO BANJARMASIN</b></td>
							<td><input type="text" name="budget_top_down_balikapua[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_balikapua[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="balikapua[]" value="AREA OFFICE TARAKAN"><b>AO TARAKAN</b></td>
							<td><input type="text" name="budget_top_down_balikapua[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_balikapua[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="balikapua[]" value="AREA OFFICE PAPUA"><b>AO PAPUA</b></td>
							<td><input type="text" name="budget_top_down_balikapua[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_balikapua[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr>
						 	<td><br></td>
						</tr>
						
						<tr align="left	">
							<td></td>
							<td><input ALIGN type="submit" value="Simpan" name="BALIKAPUA"></td>
						</tr>
					</table>
						
						<tr>
						 	<td><br></td>
						</tr>
					<table  style="color:black;" id="JAKARTA1" hidden align="center" width="38%" style="display:none">
					<tr height="30">
							<td width="380" align='center' style="border-style: solid;border-width: thin"><b>AREA OFFICE</b></td>
							<td style="border-style: solid;border-width: thin"><b>&nbsp;BUDGET TOP DOWN</b></td>
							<td style="border-style: solid;border-width: thin"><b>&nbsp;BUDGET BOTTOM UP</b></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="jakarta[]" value="AREA OFFICE JAKARTA 1"><b>AO JAKARTA 1</b></td>
							<td><input type="text" name="budget_top_down_jkrta[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_jkrta[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="jakarta[]" value="AREA OFFICE JAKARTA 2"><b>AO JAKARTA 2</b></td>
							<td><input type="text" name="budget_top_down_jkrta[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_jkrta[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="jakarta[]" value="AREA OFFICE KARAWANG"><b>AO KARAWANG</b></td>
							<td><input type="text" name="budget_top_down_jkrta[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_jkrta[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="jakarta[]" value="AREA OFFICE TANGERANG"><b>AO TANGERANG</b></td>
							<td><input type="text" name="budget_top_down_jkrta[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_jkrta[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
							<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="jakarta[]" value="AREA OFFICE BEKASI"><b>AO BEKASI</b></td>
							<td><input type="text" name="budget_top_down_jkrta[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_jkrta[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="jakarta[]" value="AREA OFFICE BOGOR"><b>AO BOGOR</b></td>
							<td><input type="text" name="budget_top_down_jkrta[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_jkrta[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="jakarta[]" value="AREA OFFICE SERANG"><b>AO SERANG</b></td>
							<td><input type="text" name="budget_top_down_jkrta[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_jkrta[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr>
						 	<td><br></td>
						 	<td></td>
						 	<td></td>
						</tr>
						<tr align="left">
							<td></td>
							<td><input type="submit" value="Simpan" name="JAKARTA"></td>
							<td></td>
						</tr>
					</table>
					<tr>
						 	<td><br></td>
						</tr>
					<table  style="color:black;" hidden id="JAWA_TENGAH1" align="center" width="38%" style="display:none">
						<tr height="30">
							<td align="center" width="380" style="border-style: solid;border-width: thin"><b>AREA OFFICE</b></td>
							<td style="border-style: solid;border-width: thin"><b>&nbsp;BUDGET TOP DOWN</b></td>
							<td style="border-style: solid;border-width: thin"><b>&nbsp;BUDGET BOTTOM UP</b></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="jawa_tengah[]" value="AREA OFFICE SEMARANG"><b>AO SEMARANG</b></td>
							<td><input type="text" name="budget_top_down_jatengah[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_jatengah[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="jawa_tengah[]" value="AREA OFFICE TEGAL"><b>AO TEGAL</b></td>
							<td><input type="text" name="budget_top_down_jatengah[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_jatengah[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="jawa_tengah[]" value="AREA OFFICE PURWOKERTO"><b>AO PURWOKERTO</b></td>
							<td><input type="text" name="budget_top_down_jatengah[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_jatengah[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="jawa_tengah[]" value="AREA OFFICE BLORA"><b>AO BLORA</b></td>
							<td><input type="text" name="budget_top_down_jatengah[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_jatengah[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="jawa_tengah[]" value="AREA OFFICE YOGYAKARTA"><b>AO YOGYAKARTA</b></td>
							<td><input type="text" name="budget_top_down_jatengah[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_jatengah[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="jawa_tengah[]" value="AO SOLO"><b>AO SOLO</b></td>
							<td><input type="text" name="budget_top_down_jatengah[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_jatengah[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr>
						 	<td><br></td>
						</tr>
						<tr align="left">
							<td></td>
							<td><input type="submit" value="Simpan" name="JAWA_TENGAH"></td>
						</tr>
					</table>
					
					<tr>
						 	<td><br></td>
						</tr>
					<table  style="color:black;" hidden id="JAWA_TIMUR1" align="center" width="38%" style="display:none">
					
						<tr height="30">
							<td align="center" width="380" style="border-style: solid;border-width: thin"><b>AREA OFFICE</b></td>
							<td style="border-style: solid;border-width: thin"><b>&nbsp;BUDGET TOP DOWN</b></td>
							<td style="border-style: solid;border-width: thin"><b>&nbsp;BUDGET BOTTOM UP</b></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="jawa_timur[]" value="AREA OFFICE SURABAYA"><b>AO SURABAYA</b></td>
							<td><input type="text" name="budget_top_down_jatimur[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_jatimur[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="jawa_timur[]" value="AREA OFFICE PAMEKASAN"><b>AO PAMEKASAN</b></td>
							<td><input type="text" name="budget_top_down_jatimur[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_jatimur[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="jawa_timur[]" value="AREA OFFICE TUBAN"><b>AO TUBAN</b></td>
							<td><input type="text" name="budget_top_down_jatimur[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_jatimur[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="jawa_timur[]" value="AREA OFFICE MADIUN"><b>AO MADIUN</b></td>
							<td><input type="text" name="budget_top_down_jatimur[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_jatimur[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="jawa_timur[]" value="AREA OFFICE MALANG"><b>AO MALANG</b></td>
							<td><input type="text" name="budget_top_down_jatimur[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_jatimur[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="jawa_timur[]" value="AREA OFFICE KEDIRI"><b>AO KEDIRI</b></td>
							<td><input type="text" name="budget_top_down_jatimur[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_jatimur[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="jawa_timur[]" value="AREA OFFICE JEMBER"><b>AO JEMBER</b></td>
							<td><input type="text" name="budget_top_down_jatimur[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_jatimur[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="jawa_timur[]" value="AREA OFFICE PROBOLINGGO"><b>AO PROBOLINGGO</b></td>
							<td><input type="text" name="budget_top_down_jatimur[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_jatimur[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr>
						 	<td><br></td>
						</tr>
						<tr align="left">
							<td></td>
							<td><input type="submit" value="Simpan" name="JAWA_TIMUR"></td>
						</tr>
					</table>
					
					<tr>
						 	<td><br></td>
						</tr>
					<table  style="color:black;" hidden id="MEDAN1" align="center" width="38%" style="display:none">
					
					
						<tr height="30">
							<td width="380" align="center" style="border-style: solid;border-width: thin"><b>AREA OFFICE</b></td>
							<td style="border-style: solid;border-width: thin"><b>&nbsp;BUDGET TOP DOWN</b></td>
							<td style="border-style: solid;border-width: thin"><b>&nbsp;BUDGET BOTTOM UP</b></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="medan[]" value="AREA OFFICE MEDAN"><b>AO MEDAN</b></td>
							<td><input type="text" name="budget_top_down_medan[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_medan[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="medan[]" value="AREA OFFICE LANGSA"><b>AO LANGSA</b></td>
							<td><input type="text" name="budget_top_down_medan[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_medan[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="medan[]" value="AREA OFFICE P.SIANTAR"><b>AO P.SIANTAR</b></td>
							<td><input type="text" name="budget_top_down_medan[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_medan[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="medan[]" value="AREA OFFICE PEKAN BARU"><b>AO PEKAN BARU</b></td>
							<td><input type="text" name="budget_top_down_medan[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_medan[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="medan[]" value="AREA OFFICE PADANG"><b>AO PADANG</b></td>
							<td><input type="text" name="budget_top_down_medan[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_medan[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr>
						 	<td><br></td>
						</tr>
						<tr align="left">
							<td></td>
							<td><input type="submit" value="Simpan" name="MEDAN"></td>
						</tr>
					</table>
					
					<tr>
						 	<td><br></td>
						</tr>
					<table  style="color:black;" hidden id="LAMPUNG1" align="center" width="38%" style="display:none">
					
						<tr height="30">
							<td width="380" align="center" style="border-style: solid;border-width: thin"><b>AREA OFFICE</b></td>
							<td style="border-style: solid;border-width: thin"><b>&nbsp;BUDGET TOP DOWN</b></td>
							<td style="border-style: solid;border-width: thin"><b>&nbsp;BUDGET BOTTOM UP</b></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="lampung[]" value="AREA OFFICE LAMPUNG"><b>AO LAMPUNG</b></td>
							<td><input type="text" name="budget_top_down_lampung[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_lampung[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="lampung[]" value="AREA OFFICE KOTABUMI"><b>AO KOTABUMI</b></td>
							<td><input type="text" name="budget_top_down_lampung[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_lampung[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="lampung[]" value="AREA OFFICE BATURAJA"><b>AO BATURAJA</b></td>
							<td><input type="text" name="budget_top_down_lampung[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_lampung[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="lampung[]" value="AREA OFFICE BENGKULU"><b>AO BENGKULU</b></td>
							<td><input type="text" name="budget_top_down_lampung[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_lampung[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="lampung[]" value="AREA OFFICE LAHAT"><b>AO LAHAT</b></td>
							<td><input type="text" name="budget_top_down_lampung[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_lampung[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="lampung[]" value="AREA OFFICE PALEMBANG"><b>AO PALEMBANG</b></td>
							<td><input type="text" name="budget_top_down_lampung[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_lampung[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="lampung[]" value="AREA OFFICE JAMBI"><b>AO JAMBI</b></td>
							<td><input type="text" name="budget_top_down_lampung[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_lampung[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr>
						 	<td><br></td>
						</tr>
						<tr align="left">
							<td></td>
							<td><input type="submit" value="Simpan" name="LAMPUNG"></td>
						</tr>
					</table>
					
					<tr>
						 	<td><br></td>
						</tr>
					<table  style="color:black;" hidden id="JAWA_BARAT1" align="center" width="38%" style="display:none">
					
					
						<tr height="30">
							<td width="380" align="center" style="border-style: solid;border-width: thin"><b>AREA OFFICE</b></td>
							<td style="border-style: solid;border-width: thin"><b>&nbsp;BUDGET TOP DOWN</b></td>
							<td style="border-style: solid;border-width: thin"><b>&nbsp;BUDGET BOTTOM UP</b></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="jawa_barat[]" value="AREA OFFICE CIREBON"><b>AO LAMPUNG</b></td>
							<td><input type="text" name="budget_top_down_jabarat[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_jabarat[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="jawa_barat[]" value="AREA OFFICE MAJALENGKA"><b>AO KOTABUMI</b></td>
							<td><input type="text" name="budget_top_down_jabarat[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_jabarat[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="jawa_barat[]" value="AREA OFFICE SUBANG"><b>AO BATURAJA</b></td>
							<td><input type="text" name="budget_top_down_jabarat[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_jabarat[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="jawa_barat[]" value="AREA OFFICE CIANJUR"><b>AO BENGKULU</b></td>
							<td><input type="text" name="budget_top_down_jabarat[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_jabarat[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="jawa_barat[]" value="AREA OFFICE TASIKMALAYA"><b>AO KOTABUMI</b></td>
							<td><input type="text" name="budget_top_down_jabarat[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_jabarat[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="jawa_barat[]" value="AREA OFFICE BANDUNG"><b>AO BATURAJA</b></td>
							<td><input type="text" name="budget_top_down_jabarat[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_jabarat[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr>
						 	<td><br></td>
						</tr>
						<tr align="left">
							<td></td>
							<td><input type="submit" value="Simpan" name="JAWA_BARAT"></td>
						</tr>
					</table>
					
					<tr>
						 	<td><br></td>
						</tr>
					<table  style="color:black;" hidden id="INTIM1" align="center" width="38%" style="display:none">
					
					
						<tr height="30">
							<td width="380" align="center" style="border-style: solid;border-width: thin"><b>AREA OFFICE</b></td>
							<td style="border-style: solid;border-width: thin"><b>&nbsp;BUDGET TOP DOWN</b></td>
							<td style="border-style: solid;border-width: thin"><b>&nbsp;BUDGET BOTTOM UP</b></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="intim[]" value="AREA OFFICE MANADO"><b>AO MANADO</b></td>
							<td><input type="text" name="budget_top_down_intim[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_itim[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="intim[]" value="AREA OFFICE GORONTALO"><b>AO GORONTALO</b></td>
							<td><input type="text" name="budget_top_down_intim[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_itim[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="intim[]" value="AREA OFFICE MAKASAR"><b>AO MAKASAR</b></td>
							<td><input type="text" name="budget_top_down_intim[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_itim[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="intim[]" value="AREA OFFICE TERNATE"><b>AO TERNATE</b></td>
							<td><input type="text" name="budget_top_down_intim[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="budget_bottom_up_itim[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr>
						 	<td><br></td>
						</tr>
						<tr align="left">
							<td></td>
							<td><input type="submit" value="Simpan" name="INTIM"></td>
						</tr>
					</table>
					
					<tr>
						 	<td><br></td>
						</tr>
				</div>
				</form> 
</header>
<?php include "footer.php";?>  
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
