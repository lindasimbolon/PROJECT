<?php include "header.php";?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#east").click(function(){
        $("#east1").show();
         $("#west1").hide();
         $("#west").hide();
    });
    $("#west").click(function(){
        $("#west1").show();
        $("#east1").hide();
        $("#east").hide();
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
				<table width="30%" align="center">  
					<input type="hidden" name="username" value="<?php echo $_SESSION['username'];?>">
					<tr align="left">
						<td width="150"><b>JENIS REGIONAL</b></td>
						<td><button id="east">East</button>
						    <button id="west">West</button> 
						    &nbsp;<a href="">Reload</a>
									
						</td>
						<td></td>
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
					                for ($x = $thn_skr; $x >= 2010; $x--) {
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
							<option value="">- Pilih Quartal -</option>
							<option value="Q1">Q1</option>
							<option value="Q2">Q2</option>
							<option value="Q3">Q3</option>
							<option value="Q4">Q4</option>
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
				
					<table  id="west1" align="center" width="30%" style="display:none">
					
					
						<tr height="30">
							<td width="150" style="border-style: solid;border-width: thin"><b>NAMA AO</b></td>
							<td style="border-style: solid;border-width: thin"><b>BUDGET LOKAL</b></td>
							<td style="border-style: solid;border-width: thin"><b>BUDGET PUSAT</b></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="west_ao[]" value="AO LAMPUNG"><b>AO LAMPUNG</b></td>
							<td><input type="text" name="west_budget_lokal[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="west_budget_pusat[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="west_ao[]" value="AO KOTABUMI"><b>AO KOTABUMI</b></td>
							<td><input type="text" name="west_budget_lokal[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="west_budget_pusat[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="west_ao[]" value="AO BATURAJA"><b>AO BATURAJA</b></td>
							<td><input type="text" name="west_budget_lokal[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="west_budget_pusat[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="west_ao[]" value="AO BENGKULU"><b>AO BENGKULU</b></td>
							<td><input type="text" name="west_budget_lokal[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="west_budget_pusat[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr>
						 	<td><br></td>
						</tr>
						<tr align="left">
							<td></td>
							<td><input type="submit" value="Simpan" name="west"></td>
						</tr>
					</table>

					<table  id="east1" align="center" width="30%" style="display:none">
						<tr height="30">
							<td width="150" style="border-style: solid;border-width: thin"><b>NAMA AO</b></td>
							<td style="border-style: solid;border-width: thin"><b>BUDGET LOKAL</b></td>
							<td style="border-style: solid;border-width: thin"><b>BUDGET PUSAT</b></td>
						</tr>
						<tr height="30">
						  	<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="east_ao[]" value="AO LAHAT"><b>AO LAHAT</b></td>
							<td><input type="text" name="east_budget_lokal[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="east_budget_pusat[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="east_ao[]" value="AO PALEMBANG"><b>AO PALEMBANG</b></td>
							<td><input type="text" name="east_budget_lokal[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="east_budget_pusat[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr height="30">
							<td align="left" style="border-style: solid;border-width: thin;padding:3px"><input type="hidden" name="east_ao[]" value="AO JAMBI"><b>AO JAMBI</b></td>
							<td><input type="text" name="east_budget_lokal[]" onkeypress="return isNumberKey(event)"></td>
							<td><input type="text" name="east_budget_pusat[]" onkeypress="return isNumberKey(event)"></td>
						</tr>
						<tr>
						 	<td><br></td>
						 	<td></td>
						 	<td></td>
						</tr>
						<tr align="left">
							<td></td>
							<td><input type="submit" value="Simpan" name="east"></td>
							<td></td>
						</tr>
					</table>
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
