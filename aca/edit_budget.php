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
		<<h4><center><u>EDIT DATA BUDGET</u></center></h4>
			
				
				<?php
				$id = $_GET['id'];
				$sql = mysql_query("SELECT * FROM tabel_budget where id_budget='$id'");
				$hasil = mysql_fetch_array($sql);
				?>
				
			<form action="update_budget.sml" method="post">
			<table width="50%" align="center"><br> 
			<input type="hidden" name="id" value="<?php echo $id;?>">
			<tr align="left">
						<td>QUARTAL</td>
						<td><select name="quartal" style="width:120px" disabled>
							<option value="">- Pilih Quartal -</option>
							<option value="<?php echo $hasil['quartal'];?>" selected><?php echo $hasil['quartal'];?></option>
							<option value="Q1">Q1</option>
							<option value="Q2">Q2</option>
							<option value="Q3">Q3</option>
							<option value="Q4">Q4</option>
							</select>
						</td>
						<td></td>
						</tr>
						<tr>
						</tr>
						<tr>
					 	<td><br></td>
					</tr>
						<tr align="left">
						<td>TAHUN</td>
					        <td><select name="tahun" style="width:120px" disabled>
					                <option value="">- Pilih Tahun --</option>
					                <option value="<?php echo $hasil['tahun'];?>" selected><?php echo $hasil['tahun'];?></option>
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
			<tr align="left" height="30">
				<td>BUDGET LOKAL</td>
				<td><input type="text" name="budget_lokal" size="40"  value="<?php echo $hasil['budget_lokal'];?>" required></td>
			</tr>
			<tr>
			<td><br></td>
			</tr>
			<tr align="left" height="30">
				<td>BUDGET PUSAT</td>
				<td><input type="text" name="budget_pusat" size="40" value="<?php echo $hasil['budget_pusat'];?>" required></td>
			</tr>
			<tr>
			<td><br></td>
			</tr>
			<tr align="left" height="30">
				<td></td>
				<td><input type="submit" value="Edit Budget"></td>
			</tr>
		</table>
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
