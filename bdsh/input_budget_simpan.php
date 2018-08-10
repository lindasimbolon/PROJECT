<?php
include "header.php";
		
		if(isset($_POST['BALIKAPUA'])){
			$regional 	= "BALIKAPUA";
			$tahun		=$_POST['tahun'];
			$quartal	=$_POST['quartal'];
			$balikapua		= $_POST['balikapua'];
			$count			= count($balikapua);
			$budget_top_down_balikapua	=$_POST['budget_top_down_balikapua'];
			$budget_bottom_up_balikapua	=$_POST['budget_bottom_up_balikapua'];
	
			$cek_data = mysql_fetch_array(mysql_query("SELECT * FROM tabel_budget WHERE id_quartal='$quartal' and tahun='$tahun' and regional='$regional'"));
			
			if($cek_data['id_budget']==""){
				$sql = "INSERT INTO tabel_budget (`regional`,`area_office`,`id_quartal`,`tahun`,`budget_top_down`,`budget_bottom_up`,`status`) VALUES " ;
				for( $i=0; $i < $count; $i++ )
				{
					$sql .= "('{$regional}','{$balikapua[$i]}','{$quartal}','{$tahun}','{$budget_top_down_balikapua[$i]}','{$budget_bottom_up_balikapua[$i]}','Disetujui')";
					$sql .= ",";
				}
				$sql = rtrim($sql,",");
				$insert = mysql_query($sql);
							
				
				if($insert){
				
					//proses kirim email ke spv untuk validasi
					$message	= "Kepada Yth. Bapak Regional Manager,<br><br><br>

									Dengan hormat,<br>
									Melalui email ini dimohon untuk Persetujuan Budget PAS yang diajukan Oleh RPM.<br><br>
									
									silakan login untuk melakukan Persetujuan Budget PAS: <a href=pas.apachesml.co.id> http://pas.apachesml.co.id</a>
									<br><br>
									
									Atas perhatiannya kami ucapkan terima kasih.
									
									<br><br><br>
									
									Regards, <br>
									<br>
									<br>
									PAS ONLINE";
							
					$to= 'testing@apachesml.co.id';
					$subject="PENGAJUAN BUDGET PAS";
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
							
					// More headers
					$headers .= 'From: <PAS ONLINE>' . "\r\n";
					$headers .= 'Bcc: testing@apachesml.co.id,testing@apachesml.co.id,testing@apachesml.co.id' . "\r\n";
					@mail($to,$subject,$message,$headers);
				
					echo "<script>alert('Berhasil disimpan..')
					location.href='data_budget.sml'</script>";
				} else {
					echo "<script>alert('Gagal disimpan')
					location.href='input_budget.sml'</script>";
				}
			}else{
					echo "<script>alert('Data budget sudah ada, Tahun ".$tahun." dan Quartal ".$quartal.", silakan ulangi kembali untuk Tahun dan atau Quartal yang berbeda..')
					location.href='input_budget.sml'</script>";
			}
			
		}
			
		elseif (isset($_POST['JAKARTA'])) {
			$regional 	= "JAKARTA";
			$tahun		=$_POST['tahun'];
			$quartal	=$_POST['quartal'];
			
			$jakarta		= $_POST['jakarta'];
			$count			= count($jakarta);
			$budget_top_down_jkrta	=$_POST['budget_top_down_jkrta'];
			$budget_bottom_up_jkrta	=$_POST['budget_bottom_up_jkrta'];
			
			$cek_data = mysql_fetch_array(mysql_query("SELECT * FROM tabel_budget WHERE id_quartal='$quartal' and tahun='$tahun' and regional='$regional'"));
			
			if($cek_data['id_budget']==""){
				$sql = "INSERT INTO tabel_budget (`regional`,`area_office`,`id_quartal`,`tahun`,`budget_top_down`,`budget_bottom_up`,`status`) VALUES " ;
				for( $i=0; $i < $count; $i++ )
				{
					$sql .= "('{$regional}','{$jakarta[$i]}','{$quartal}','{$tahun}','{$budget_top_down_jkrta[$i]}','{$budget_bottom_up_jkrta[$i]}','Disetujui')";
					$sql .= ",";
				}
				$sql = rtrim($sql,",");
				$insert = mysql_query($sql);
							
				
				if($insert){
				
					//proses kirim email ke spv untuk validasi
					$message	= "Kepada Yth. Bapak Regional Manager,<br><br><br>

									Dengan hormat,<br>
									Melalui email ini dimohon untuk Persetujuan Budget PAS yang diajukan Oleh RPM.<br><br>
									
									silakan login untuk melakukan Persetujuan Budget PAS: <a href=pas.apachesml.co.id> http://pas.apachesml.co.id</a>
									<br><br>
									
									Atas perhatiannya kami ucapkan terima kasih.
									
									<br><br><br>
									
									Regards, <br>
									<br>
									<br>
									PAS ONLINE";
							
					$to= 'testing@apachesml.co.id';
					$subject="PENGAJUAN BUDGET PAS";
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
							
					// More headers
					$headers .= 'From: <PAS ONLINE>' . "\r\n";
					$headers .= 'Bcc: testing@apachesml.co.id,testing@apachesml.co.id,testing@apachesml.co.id' . "\r\n";
					@mail($to,$subject,$message,$headers);
				
					echo "<script>alert('Berhasil disimpan..')
					location.href='data_budget.sml'</script>";
				} else {
					echo "<script>alert('Gagal disimpan')
					location.href='input_budget.sml'</script>";
				}
			}else{
					echo "<script>alert('Data budget sudah ada, Tahun ".$tahun." dan Quartal ".$quartal.", silakan ulangi kembali untuk Tahun dan atau Quartal yang berbeda..')
					location.href='input_budget.sml'</script>";
			}
			
		}
		 elseif (isset($_POST['JAWA_TIMUR'])) {
			$regional 	= "JAWA TIMUR";
			$tahun		=$_POST['tahun'];
			$quartal	=$_POST['quartal'];
			
			$jawa_timur		= $_POST['jawa_timur'];
			$count			= count($jawa_timur);
			$budget_top_down_jatimur	=$_POST['budget_top_down_jatimur'];
			$budget_bottom_up_jatimur	=$_POST['budget_bottom_up_jatimur'];
			
			$cek_data = mysql_fetch_array(mysql_query("SELECT * FROM tabel_budget WHERE id_quartal='$quartal' and tahun='$tahun' and regional='$regional'"));
			
			if($cek_data['id_budget']==""){
				$sql = "INSERT INTO tabel_budget (`regional`,`area_office`,`id_quartal`,`tahun`,`budget_top_down`,`budget_bottom_up`,`status`) VALUES " ;
				for( $i=0; $i < $count; $i++ )
				{
					$sql .= "('{$regional}','{$jawa_timur[$i]}','{$quartal}','{$tahun}','{$budget_top_down_jatimur[$i]}','{$budget_bottom_up_jatimur[$i]}','Disetujui')";
					$sql .= ",";
				}
				$sql = rtrim($sql,",");
				$insert = mysql_query($sql);
							
				
				if($insert){
				
					//proses kirim email ke spv untuk validasi
					$message	= "Kepada Yth. Bapak Regional Manager,<br><br><br>

									Dengan hormat,<br>
									Melalui email ini dimohon untuk Persetujuan Budget PAS yang diajukan Oleh RPM.<br><br>
									
									silakan login untuk melakukan Persetujuan Budget PAS: <a href=pas.apachesml.co.id> http://pas.apachesml.co.id</a>
									<br><br>
									
									Atas perhatiannya kami ucapkan terima kasih.
									
									<br><br><br>
									
									Regards, <br>
									<br>
									<br>
									PAS ONLINE";
							
					$to= 'testing@apachesml.co.id';
					$subject="PENGAJUAN BUDGET PAS";
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
							
					// More headers
					$headers .= 'From: <PAS ONLINE>' . "\r\n";
					$headers .= 'Bcc: testing@apachesml.co.id,testing@apachesml.co.id,testing@apachesml.co.id' . "\r\n";
					@mail($to,$subject,$message,$headers);
				
					echo "<script>alert('Berhasil disimpan..')
					location.href='data_budget.sml'</script>";
				} else {
					echo "<script>alert('Gagal disimpan')
					location.href='input_budget.sml'</script>";
				}
			}else{
					echo "<script>alert('Data budget sudah ada, Tahun ".$tahun." dan Quartal ".$quartal.", silakan ulangi kembali untuk Tahun dan atau Quartal yang berbeda..')
					location.href='input_budget.sml'</script>";
			}
			
		}
		elseif (isset($_POST['MEDAN'])) {
			$regional 	= "MEDAN";
			$tahun		=$_POST['tahun'];
			$quartal	=$_POST['quartal'];
			
			$medan		= $_POST['medan'];
			$count			= count($medan);
			$budget_top_down_medan	=$_POST['budget_top_down_medan'];
			$budget_bottom_up_medan	=$_POST['budget_bottom_up_medan'];
			
			$cek_data = mysql_fetch_array(mysql_query("SELECT * FROM tabel_budget WHERE id_quartal='$quartal' and tahun='$tahun' and regional='$regional'"));
			
			if($cek_data['id_budget']==""){
				$sql = "INSERT INTO tabel_budget (`regional`,`area_office`,`id_quartal`,`tahun`,`budget_top_down`,`budget_bottom_up`,`status`) VALUES " ;
				for( $i=0; $i < $count; $i++ )
				{
					$sql .= "('{$regional}','{$medan[$i]}','{$quartal}','{$tahun}','{$budget_top_down_medan[$i]}','{$budget_bottom_up_medan[$i]}','Disetujui')";
					$sql .= ",";
				}
				$sql = rtrim($sql,",");
				$insert = mysql_query($sql);
							
				
				if($insert){
				
					//proses kirim email ke spv untuk validasi
					$message	= "Kepada Yth. Bapak Regional Manager,<br><br><br>

									Dengan hormat,<br>
									Melalui email ini dimohon untuk Persetujuan Budget PAS yang diajukan Oleh RPM.<br><br>
									
									silakan login untuk melakukan Persetujuan Budget PAS: <a href=pas.apachesml.co.id> http://pas.apachesml.co.id</a>
									<br><br>
									
									Atas perhatiannya kami ucapkan terima kasih.
									
									<br><br><br>
									
									Regards, <br>
									<br>
									<br>
									PAS ONLINE";
							
					$to= 'testing@apachesml.co.id';
					$subject="PENGAJUAN BUDGET PAS";
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
							
					// More headers
					$headers .= 'From: <PAS ONLINE>' . "\r\n";
					$headers .= 'Bcc: testing@apachesml.co.id,testing@apachesml.co.id,testing@apachesml.co.id' . "\r\n";
					@mail($to,$subject,$message,$headers);
				
					echo "<script>alert('Berhasil disimpan..')
					location.href='data_budget.sml'</script>";
				} else {
					echo "<script>alert('Gagal disimpan')
					location.href='input_budget.sml'</script>";
				}
			}else{
					echo "<script>alert('Data budget sudah ada, Tahun ".$tahun." dan Quartal ".$quartal.", silakan ulangi kembali untuk Tahun dan atau Quartal yang berbeda..')
					location.href='input_budget.sml'</script>";
			}
			
		}
		elseif (isset($_POST['LAMPUNG'])) {
			$regional 	= "LAMPUNG";
			$tahun		=$_POST['tahun'];
			$quartal	=$_POST['quartal'];
			
			$lampung		= $_POST['lampung'];
			$count			= count($lampung);
			$budget_top_down_lampung	=$_POST['budget_top_down_lampung'];
			$budget_bottom_up_lampung	=$_POST['budget_bottom_up_lampung'];
			
			$cek_data = mysql_fetch_array(mysql_query("SELECT * FROM tabel_budget WHERE id_quartal='$quartal' and tahun='$tahun' and regional='$regional'"));
			
			if($cek_data['id_budget']==""){
				$sql = "INSERT INTO tabel_budget (`regional`,`area_office`,`id_quartal`,`tahun`,`budget_top_down`,`budget_bottom_up`,`status`) VALUES " ;
				for( $i=0; $i < $count; $i++ )
				{
					$sql .= "('{$regional}','{$lampung[$i]}','{$quartal}','{$tahun}','{$budget_top_down_lampung[$i]}','{$budget_bottom_up_lampung[$i]}','Disetujui')";
					$sql .= ",";
				}
				$sql = rtrim($sql,",");
				$insert = mysql_query($sql);
							
				
				if($insert){
				
					//proses kirim email ke spv untuk validasi
					$message	= "Kepada Yth. Bapak Regional Manager,<br><br><br>

									Dengan hormat,<br>
									Melalui email ini dimohon untuk Persetujuan Budget PAS yang diajukan Oleh RPM.<br><br>
									
									silakan login untuk melakukan Persetujuan Budget PAS: <a href=pas.apachesml.co.id> http://pas.apachesml.co.id</a>
									<br><br>
									
									Atas perhatiannya kami ucapkan terima kasih.
									
									<br><br><br>
									
									Regards, <br>
									<br>
									<br>
									PAS ONLINE";
							
					$to= 'testing@apachesml.co.id';
					$subject="PENGAJUAN BUDGET PAS";
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
							
					// More headers
					$headers .= 'From: <PAS ONLINE>' . "\r\n";
					$headers .= 'Bcc: testing@apachesml.co.id,testing@apachesml.co.id,testing@apachesml.co.id' . "\r\n";
					@mail($to,$subject,$message,$headers);
				
					echo "<script>alert('Berhasil disimpan..')
					location.href='data_budget.sml'</script>";
				} else {
					echo "<script>alert('Gagal disimpan')
					location.href='input_budget.sml'</script>";
				}
			}else{
					echo "<script>alert('Data budget sudah ada, Tahun ".$tahun." dan Quartal ".$quartal.", silakan ulangi kembali untuk Tahun dan atau Quartal yang berbeda..')
					location.href='input_budget.sml'</script>";
			}
			
		}
		elseif (isset($_POST['JAWA_BARAT'])) {
			$regional 	= "JAWA BARAT";
			$tahun		=$_POST['tahun'];
			$quartal	=$_POST['quartal'];
			
			$jawa_barat		= $_POST['jawa_barat'];
			$count			= count($jawa_barat);
			$budget_top_down_jabarat	=$_POST['budget_top_down_jabarat'];
			$budget_bottom_up_jabarat	=$_POST['budget_bottom_up_jabarat'];
			
			$cek_data = mysql_fetch_array(mysql_query("SELECT * FROM tabel_budget WHERE id_quartal='$quartal' and tahun='$tahun' and regional='$regional'"));
			
			if($cek_data['id_budget']==""){
				$sql = "INSERT INTO tabel_budget (`regional`,`area_office`,`id_quartal`,`tahun`,`budget_top_down`,`budget_bottom_up`,`status`) VALUES " ;
				for( $i=0; $i < $count; $i++ )
				{
					$sql .= "('{$regional}','{$jawa_barat[$i]}','{$quartal}','{$tahun}','{$budget_top_down_jabarat[$i]}','{$budget_bottom_up_jabarat[$i]}','Disetujui')";
					$sql .= ",";
				}
				$sql = rtrim($sql,",");
				$insert = mysql_query($sql);
							
				
				if($insert){
				
					//proses kirim email ke spv untuk validasi
					$message	= "Kepada Yth. Bapak Regional Manager,<br><br><br>

									Dengan hormat,<br>
									Melalui email ini dimohon untuk Persetujuan Budget PAS yang diajukan Oleh RPM.<br><br>
									
									silakan login untuk melakukan Persetujuan Budget PAS: <a href=pas.apachesml.co.id> http://pas.apachesml.co.id</a>
									<br><br>
									
									Atas perhatiannya kami ucapkan terima kasih.
									
									<br><br><br>
									
									Regards, <br>
									<br>
									<br>
									PAS ONLINE";
							
					$to= 'testing@apachesml.co.id';
					$subject="PENGAJUAN BUDGET PAS";
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
							
					// More headers
					$headers .= 'From: <PAS ONLINE>' . "\r\n";
					$headers .= 'Bcc: testing@apachesml.co.id,testing@apachesml.co.id,testing@apachesml.co.id' . "\r\n";
					@mail($to,$subject,$message,$headers);
				
					echo "<script>alert('Berhasil disimpan..')
					location.href='data_budget.sml'</script>";
				} else {
					echo "<script>alert('Gagal disimpan')
					location.href='input_budget.sml'</script>";
				}
			}else{
					echo "<script>alert('Data budget sudah ada, Tahun ".$tahun." dan Quartal ".$quartal.", silakan ulangi kembali untuk Tahun dan atau Quartal yang berbeda..')
					location.href='input_budget.sml'</script>";
			}
			
		}
		elseif (isset($_POST['INTIM'])) {
			$regional 	= "INTIM";
			$tahun		=$_POST['tahun'];
			$quartal	=$_POST['quartal'];
			
			$intim		= $_POST['intim'];
			$count			= count($intim);
			$budget_top_down_intim	=$_POST['budget_top_down_intim'];
			$budget_bottom_up_itim	=$_POST['budget_bottom_up_itim'];
			
			$cek_data = mysql_fetch_array(mysql_query("SELECT * FROM tabel_budget WHERE id_quartal='$quartal' and tahun='$tahun' and regional='$regional'"));
			
			if($cek_data['id_budget']==""){
				$sql = "INSERT INTO tabel_budget (`regional`,`area_office`,`id_quartal`,`tahun`,`budget_top_down`,`budget_bottom_up`,`status`) VALUES " ;
				for( $i=0; $i < $count; $i++ )
				{
					$sql .= "('{$regional}','{$intim[$i]}','{$quartal}','{$tahun}','{$budget_top_down_intim[$i]}','{$budget_bottom_up_itim[$i]}','Disetujui')";
					$sql .= ",";
				}
				$sql = rtrim($sql,",");
				$insert = mysql_query($sql);
							
				
				if($insert){
				
					//proses kirim email ke spv untuk validasi
					$message	= "Kepada Yth. Bapak Regional Manager,<br><br><br>

									Dengan hormat,<br>
									Melalui email ini dimohon untuk Persetujuan Budget PAS yang diajukan Oleh RPM.<br><br>
									
									silakan login untuk melakukan Persetujuan Budget PAS: <a href=pas.apachesml.co.id> http://pas.apachesml.co.id</a>
									<br><br>
									
									Atas perhatiannya kami ucapkan terima kasih.
									
									<br><br><br>
									
									Regards, <br>
									<br>
									<br>
									PAS ONLINE";
							
					$to= 'testing@apachesml.co.id';
					$subject="PENGAJUAN BUDGET PAS";
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
							
					// More headers
					$headers .= 'From: <PAS ONLINE>' . "\r\n";
					$headers .= 'Bcc: testing@apachesml.co.id,testing@apachesml.co.id,testing@apachesml.co.id' . "\r\n";
					@mail($to,$subject,$message,$headers);
				
					echo "<script>alert('Berhasil disimpan..')
					location.href='data_budget.sml'</script>";
				} else {
					echo "<script>alert('Gagal disimpan')
					location.href='input_budget.sml'</script>";
				}
			}else{
					echo "<script>alert('Data budget sudah ada, Tahun ".$tahun." dan Quartal ".$quartal.", silakan ulangi kembali untuk Tahun dan atau Quartal yang berbeda..')
					location.href='input_budget.sml'</script>";
			}
			
		}
		?>