<?php 
include "header.php";
error_reporting(0);
?>

<script>tinymce.init({ selector:'textarea' });</script>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
		<h4><center><u>PERSETUJUAN PAS</u></center></h4>
		
		<form action=""  method="post" >
			<?php
			$id_pas = $_GET['id'];
			?>
			<input type="hidden" name="id_pas" value="<?php echo $id_pas;?>">
			<table width="50%" align="center" style="color:black;"><br>  
				<tr align="left" height="30">
					<td><b>Persetujuan PAS</b></td>
					<td><select name="persetujuan" class="form-control" required style="width:200px">
						<option value="" selected>[Pilih Persetujuan]</option>
						<option value="Disetujui">Disetujui</option>
						<option value="Direvisi">Direvisi</option>
						<option value="Ditolak">Ditolak</option>
					    </select>	
					</td>
				</tr>
				<tr align="left" height="30">
					<td><br><b>Keterangan</b></td>
					<td><br><textarea name="keterangan"></textarea></td>
				</tr>
				<tr align="left" height="80">
					<td></td>
					<td><input type="submit" name="simpan" value="Simpan">&nbsp;&nbsp; <a href="javascript:history.back()"><img src="images/back.png" width="50px" height="28px"></a></td>
				</tr>
			</table>
		</form>
				
<!-- Proses Simpan Form Ini -->
<?php
$id_pas 	= $_POST['id_pas'];
$persetujuan	= $_POST['persetujuan'];
$keterangan	= $_POST['keterangan'];
$tgl		= date('Y-m-d');

if(isset($_POST['simpan'])){
	if($keterangan<>""){
		if ($persetujuan=="Disetujui"){
		$sql = mysql_query ("UPDATE tabel_pas SET `persetujuan_bdsh` = '$persetujuan', `keterangan_bdsh` = '$keterangan', tgl_persetujuan_bdsh = '$tgl' WHERE `tabel_pas`.`id_pas` = '$id_pas'");

			if($sql){
			//proses cek email untuk persetujuan PAS ke SMN atau PAS Lokal Disetujui
				/*$cek_regional = mysql_query ("SELECT * FROM tabel_pas a, tabel_cmr b, tabel_ao c WHERE a.id_cmr=b.id_cmr and b.id_ao=c.id_ao and a.id_pas='$id_pas'");
				$hasil_regional = mysql_fetch_array($cek_regional);
				
				if(($hasil_regional['kategori']=="LOKAL_GMO")or($hasil_regional['kategori']=="LOKAL_DIREKSI")or($hasil_regional['kategori']=="PUSAT_KDM")){
				$cek_info 	= mysql_query("SELECT * FROM tabel_info where id_info='11'");
				$hasil_info   	= mysql_fetch_array($cek_info);
				$message	= $hasil_info['info'];
								
				$to= 'marisa@apachesml.co.id';
				$subject="PENGAJUAN PAS";
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
									
				// More headers
				$headers .= 'From: <PAS ONLINE>' . "\r\n";
				$headers .= 'Cc: gunadi@apachesml.co.id' . "\r\n";
				$headers .= 'Bcc: willy@apachesml.co.id,frans@apachesml.co.id,rolina@apachesml.co.id' . "\r\n";
				@mail($to,$subject,$message,$headers);
				}else{
				$lokal = mysql_query("UPDATE tabel_pas SET tgl_disetujui='".$tgl."', status_pas='Disetujui' where id_pas='".$id_pas."'");
				
				$cek_email1 	= mysql_query ("SELECT * FROM tabel_proposal a, tabel_cmr b, tabel_ao c, tabel_pas d, tabel_territory e WHERE e.nama_spv=a.nama_spv and a.id_proposal=d.id_proposal and b.id_ao=c.id_ao and a.id_cmr=b.id_cmr and d.id_pas='$id_pas'");
				$hasil_email1 	= mysql_fetch_array($cek_email1);
				$aca1			= $hasil_email1['email_aca'];
				$spv1			= $hasil_email1['email_spv'];
				$asm1			= $hasil_email1['email_asm'];
				$rpm1			= $hasil_email1['email_rpm'];
				
				$message1	= 	"Dear Bapak CMR,<br><br><br>
							
							Kepada Bpk CMR PAS LOKAL Anda sudah Disetujui hingga Regional Manager<br>
							
							Silakan login untuk melihat status PAS Anda, Anda dapat mengakses sistem dengan alamat: <a href=pas.apachesml.co.id> http://pas.apachesml.co.id</a>
							<br><br>
							
							Atas perhatiannya kami ucapkan terima kasih.
							
							<br><br><br>
							
							Regards, <br>
							<br>
							<br>
							PAS ONLINE";
								
				$to1= $hasil_email1['email_cmr'];
				$subject1="PENGAJUAN PAS";
				$headers1 = "MIME-Version: 1.0" . "\r\n";
				$headers1 .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
									
				// More headers
				$headers1 .= 'From: <PAS ONLINE>' . "\r\n";
				$headers1.= 'Cc: '.$aca1.','.$spv1.','.$asm1.','.$rpm1.',marisa@apachesml.co.id'. "\r\n";
				$headers1 .= 'Bcc: willy@apachesml.co.id,frans@apachesml.co.id,rolina@apachesml.co.id'. "\r\n";
				@mail($to1,$subject1,$message1,$headers1);
						
				}*/
			echo "<script>alert('Data sudah tersimpan, terima kasih..')
			location.href='pas_pending.sml'</script>";
			}else{
			echo "<script>alert('Data gagal disimpan, silakan ulangi proses..')
			location.href='persetujuan_pas_rm.php?id=$id_pas'</script>";
			}
		}elseif ($persetujuan=="Direvisi"){
		$sql = mysql_query ("UPDATE tabel_pas SET `persetujuan_bdsh` = '$persetujuan', `keterangan_bdsh` = '$keterangan', tgl_persetujuan_bdsh = '$tgl', status_pas='Direvisi' WHERE `tabel_pas`.`id_pas` = '$id_pas'");

			if($sql){
			//proses cek email untuk persetujuan PAS ke SMN atau PAS Lokal Disetujui
				/*$cek_regional = mysql_query ("SELECT * FROM tabel_pas a, tabel_cmr b, tabel_ao c WHERE a.id_cmr=b.id_cmr and b.id_ao=c.id_ao and a.id_pas='$id_pas'");
				$hasil_regional = mysql_fetch_array($cek_regional);
				
				if(($hasil_regional['kategori']=="LOKAL_GMO")or($hasil_regional['kategori']=="LOKAL_DIREKSI")or($hasil_regional['kategori']=="PUSAT_KDM")){
				$cek_info 	= mysql_query("SELECT * FROM tabel_info where id_info='11'");
				$hasil_info   	= mysql_fetch_array($cek_info);
				$message	= $hasil_info['info'];
								
				$to= 'marisa@apachesml.co.id';
				$subject="PENGAJUAN PAS";
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
									
				// More headers
				$headers .= 'From: <PAS ONLINE>' . "\r\n";
				$headers .= 'Cc: gunadi@apachesml.co.id' . "\r\n";
				$headers .= 'Bcc: willy@apachesml.co.id,frans@apachesml.co.id,rolina@apachesml.co.id' . "\r\n";
				@mail($to,$subject,$message,$headers);
				}else{
				$lokal = mysql_query("UPDATE tabel_pas SET tgl_disetujui='".$tgl."', status_pas='Disetujui' where id_pas='".$id_pas."'");
				
				$cek_email1 	= mysql_query ("SELECT * FROM tabel_proposal a, tabel_cmr b, tabel_ao c, tabel_pas d, tabel_territory e WHERE e.nama_spv=a.nama_spv and a.id_proposal=d.id_proposal and b.id_ao=c.id_ao and a.id_cmr=b.id_cmr and d.id_pas='$id_pas'");
				$hasil_email1 	= mysql_fetch_array($cek_email1);
				$aca1			= $hasil_email1['email_aca'];
				$spv1			= $hasil_email1['email_spv'];
				$asm1			= $hasil_email1['email_asm'];
				$rpm1			= $hasil_email1['email_rpm'];
				
				$message1	= 	"Dear Bapak CMR,<br><br><br>
							
							Kepada Bpk CMR PAS LOKAL Anda sudah Disetujui hingga Regional Manager<br>
							
							Silakan login untuk melihat status PAS Anda, Anda dapat mengakses sistem dengan alamat: <a href=pas.apachesml.co.id> http://pas.apachesml.co.id</a>
							<br><br>
							
							Atas perhatiannya kami ucapkan terima kasih.
							
							<br><br><br>
							
							Regards, <br>
							<br>
							<br>
							PAS ONLINE";
								
				$to1= $hasil_email1['email_cmr'];
				$subject1="PENGAJUAN PAS";
				$headers1 = "MIME-Version: 1.0" . "\r\n";
				$headers1 .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
									
				// More headers
				$headers1 .= 'From: <PAS ONLINE>' . "\r\n";
				$headers1.= 'Cc: '.$aca1.','.$spv1.','.$asm1.','.$rpm1.',marisa@apachesml.co.id'. "\r\n";
				$headers1 .= 'Bcc: willy@apachesml.co.id,frans@apachesml.co.id,rolina@apachesml.co.id'. "\r\n";
				@mail($to1,$subject1,$message1,$headers1);
						
				}*/
			echo "<script>alert('Data sudah tersimpan, terima kasih..')
			location.href='pas_pending.sml'</script>";
			}else{
			echo "<script>alert('Data gagal disimpan, silakan ulangi proses..')
			location.href='persetujuan_pas_rm.php?id=$id_pas'</script>";
			}
		}else{
			$sql = mysql_query ("UPDATE tabel_pas SET `persetujuan_bdsh` = 'Ditolak', `keterangan_bdsh` = '$keterangan', status_pas='Ditolak', tgl_persetujuan_bdsh = '$tgl' WHERE `tabel_pas`.`id_pas` = '$id_pas'");
		
			/*
			$cek_uang 	= mysql_query("SELECT a.total_pas, c.nama_ao, month(a.tgl_pelaksanaan) as bulan, year(a.tgl_pelaksanaan) as tahun, a.kategori FROM tabel_pas a, tabel_cmr b, tabel_ao c WHERE a.id_cmr=b.id_cmr and b.id_ao=c.id_ao and a.id_pas='$id_pas'");
			$cek_tampil	= mysql_fetch_array($cek_uang);
			
			//cek quartal
			$bulan_pelaksanaan 	= $cek_tampil['bulan'];
			if(($bulan_pelaksanaan=="01")or($bulan_pelaksanaan=="02")or($bulan_pelaksanaan=="03")){
			$quartal = "1";
			}elseif(($bulan_pelaksanaan=="04")or($bulan_pelaksanaan=="05")or($bulan_pelaksanaan=="06")){
			$quartal = "2";
			}elseif(($bulan_pelaksanaan=="07")or($bulan_pelaksanaan=="08")or($bulan_pelaksanaan=="09")){
			$quartal = "3";
			}else{
			$quartal = "4";
			}
			//cek tahun
			$tahun		= $cek_tampil['tahun'];
			
			//kondisi kategori
			if($cek_tampil['kategori']=="LOKAL"){
				$sql2	= mysql_query("UPDATE tabel_budget SET penggunaan_lokal = penggunaan_lokal - '".$cek_tampil['total_pas']."' WHERE ao='".$cek_tampil['nama_ao']."' and id_quartal='$quartal' and tahun='$tahun'")
			} else {
				$sql2	= mysql_query("UPDATE tabel_budget SET penggunaan_pusat = penggunaan_pusat - '".$cek_tampil['total_pas']."' WHERE ao='".$cek_tampil['nama_ao']."' and id_quartal='$quartal' and tahun='$tahun'")
			}
			*/
			if($sql){
			//proses kirim email ke cmr untuk persetujuan pas di tolak
				/*$cek_email 	= mysql_query ("SELECT * FROM tabel_proposal a, tabel_cmr b, tabel_ao c, tabel_pas d, tabel_territory e WHERE e.nama_spv=a.nama_spv and a.id_proposal=d.id_proposal and b.id_ao=c.id_ao and a.id_cmr=b.id_cmr and d.id_pas='$id_pas'");
				$hasil_email 	= mysql_fetch_array($cek_email);
				$aca			= $hasil_email['email_aca'];
				$spv			= $hasil_email['email_spv'];
				$asm			= $hasil_email['email_asm'];
				$rpm			= $hasil_email['email_rpm'];
				
				if($hasil_regional['kategori']=="LOKAL_DIREKSI"){
				$message	= 	"Dear Bapak RPM,<br><br><br>
							
							Kepada Bpk RPM PAS Anda Ditolak.<br>
							
							Silakan login untuk melihat keterangan alasan mengapa Ditolak PAS Anda, Anda dapat mengakses sistem dengan alamat: <a href=pas.apachesml.co.id> http://pas.apachesml.co.id</a>
							<br><br>
							
							Atas perhatiannya kami ucapkan terima kasih.
							
							<br><br><br>
							
							Regards, <br>
							<br>
							<br>
							PAS ONLINE";
								
				$to= $hasil_email['email_rpm'];
				$subject="PENGAJUAN PAS";
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
									
				// More headers
				$headers .= 'From: <PAS ONLINE>' . "\r\n";
				$headers .= 'Cc: '.$rpm.''. "\r\n";
				$headers .= 'Bcc: willy@apachesml.co.id,frans@apachesml.co.id,rolina@apachesml.co.id'. "\r\n";
				@mail($to,$subject,$message,$headers);
				}else{
				$message	= 	"Dear Bapak CMR,<br><br><br>
							
							Kepada Bpk CMR PAS Anda Ditolak.<br>
							
							Silakan login untuk melihat keterangan alasan mengapa Ditolak
							PAS Anda, Anda dapat mengakses sistem dengan alamat: <a href=pas.apachesml.co.id> http://pas.apachesml.co.id</a>
							<br><br>
							
							Atas perhatiannya kami ucapkan terima kasih.
							
							<br><br><br>
							
							Regards, <br>
							<br>
							<br>
							PAS ONLINE";
								
				$to= $hasil_email['email_cmr'];
				$subject="PENGAJUAN PAS";
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
									
				// More headers
				$headers .= 'From: <PAS ONLINE>' . "\r\n";
				$headers .= 'Cc: '.$aca.','.$spv.','.$asm.','.$rpm.''. "\r\n";
				$headers .= 'Bcc: willy@apachesml.co.id,frans@apachesml.co.id,rolina@apachesml.co.id'. "\r\n";
				@mail($to,$subject,$message,$headers);
				}*/
				
			echo "<script>alert('Data sudah tersimpan, terima kasih..')
			location.href='pas_pending.sml'</script>";
			}else{
			echo "<script>alert('Data gagal disimpan, silakan ulangi proses..')
			location.href='persetujuan_pas_rm.php?id=$id_pas'</script>";
			}
		}
	}else{
	echo "<script>alert('Kolom keterangan harus diisi, silakan ulangi kembali..')
		location.href='persetujuan_pas_rm.php?id=$id_pas'</script>";
	}
	
}
?>

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
