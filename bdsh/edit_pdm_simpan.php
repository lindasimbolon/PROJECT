<?php
include "../koneksi.php";

//variabel menampung data yang di postkan
$id_proposal			= $_POST['id_proposal'];
$id_pas					= $_POST['id_pas'];
$id_pdm					= $_POST['id_pdm'];

//data untuk insert tabel_estimasi_budget
$jenis					= $_POST ['jenis'];
$keterangan_budget		= $_POST ['keterangan_budget'];
$harga_budget			= $_POST ['harga_budget'];
$jumlah_budget			= $_POST ['jumlah_budget'];
$pph					= $_POST ['pph'];
$ppn					= $_POST ['ppn'];
$count 					= count($keterangan_budget);





						//delete tabel_estimasi_budet dan tabel_estimasi_omset
						$budget = mysql_query ("DELETE FROM tabel_estimasi_budget where id_proposal='$id_proposal'");


						//insert ke tabel_estimasi_budget
						$sql   = "INSERT INTO tabel_estimasi_budget (`keterangan_budget`, `jumlah_budget`, `harga_budget`, `pph`,`ppn`,`id_proposal`,`jenis_item`) VALUES ";
						for( $i=0; $i < $count; $i++ )
						{
							$sql .= "('{$keterangan_budget[$i]}','{$jumlah_budget[$i]}','{$harga_budget[$i]}','{$pph[$i]}','{$ppn[$i]}','{$id_proposal}','{$jenis[$i]}')";
							$sql .= ",";
						}
						$sql = rtrim($sql,",");
						$insert = mysql_query($sql);



							if ($insert){
						//update total pas dan pdm
						$sql_total = mysql_query("SELECT * FROM tabel_proposal WHERE id_proposal='$id_proposal'");
						$hasil_sql_total = mysql_fetch_array($sql_total);

						if($hasil_sql_total['jenis_proposal']<>"PUSAT_KDM"){
						$biaya_pas 	 		= mysql_query ("SELECT * FROM tabel_estimasi_budget where id_proposal='$id_proposal'");
						$jumlah = 0;
						$pdm = 0;
						while($total_pas 	= mysql_fetch_array($biaya_pas)){

							$bagi_pajak 		= explode("-",$total_pas['pph']);
							$pph	    		= $bagi_pajak[0];

							$bagi_ppn 			= explode("-",$total_pas['ppn']);
							$ppn	    		= $bagi_ppn[0];

							//total biaya diluar pph dan ppn
							$sub_total 	= $total_pas['harga_budget'] * $total_pas['jumlah_budget'];

							//total pph
							$sub_total_pph 	= (($sub_total* 100) / (100 - $pph)) - $sub_total;

							//total ppn
							$sub_total_ppn		= ($sub_total / $ppn);
							if($sub_total_ppn==0){
							$sub_total_ppn		= 0 ;
							}else{
							$sub_total_ppn		= $sub_total_ppn;
							}
							$jumlah 	= $jumlah + $sub_total + $sub_total_pph + $sub_total_ppn;
							$pdm		= $pdm + $sub_total;
						}
					}else{
						$biaya_pas 	 		= mysql_query ("SELECT * FROM tabel_estimasi_budget where id_proposal='$id_proposal'");
						while($total_pas 	= mysql_fetch_array($biaya_pas)){

							if(($total_pas['pph']<>"")and($total_pas['ppn']<>"")){
								$bagi_pajak 	= explode("-",$total_pas['pph']);
								$pph	    	= $bagi_pajak[0];

								$bagi_ppn 		= explode("-",$total_pas['ppn']);
								$ppn	    	= $bagi_ppn[0];

								//total biaya diluar pph dan ppn
								$sub_total 	= $total_pas['harga_budget'] * $total_pas['jumlah_budget'] * $total_pas['hari_budget'];
								$pdm		= $pdm + $sub_total;
								//total pph
								$sub_total_pph 	= (($sub_total* 100) / (100 - $pph)) - $sub_total;
								//total ppn
								$sub_total_ppn		= ($sub_total / $ppn);
								//total all
								$jumlah 	= $jumlah + $sub_total + $sub_total_pph + $sub_total_ppn;

							}elseif($total_pas['pph']<>""){
								$bagi_pajak 	= explode("-",$total_pas['pph']);
								$pph	    	= $bagi_pajak[0];
								$jenis 			= $bagi_pajak[1];
								//total biaya diluar pph dan ppn
								$sub_total 	= $total_pas['harga_budget'] * $total_pas['jumlah_budget'] * $total_pas['hari_budget'];
								$pdm		= $pdm + $sub_total;
								//total pph
								if($jenis=="PPh"){
								$sub_total_pph = (($sub_total* 100) / (100 - $pph)) - $sub_total;
								}else{
								$sub_total_pph = ($sub_total / $pph);
								}
								//total all
								$jumlah 	= $jumlah + $sub_total + $sub_total_pph;
							}elseif($total_pas['ppn']<>""){
								$bagi_ppn 		= explode("-",$total_pas['ppn']);
								$ppn	    	= $bagi_ppn[0];
								//total biaya diluar pph dan ppn
								$sub_total 	= $total_pas['harga_budget'] * $total_pas['jumlah_budget'] * $total_pas['hari_budget'];
								$pdm		= $pdm + $sub_total;
								//total ppn
								$sub_total_ppn		= ($sub_total / $ppn);
								//total all
								$jumlah 	= $jumlah + $sub_total + $sub_total_ppn;
							}else{
								//total biaya diluar pph dan ppn
								$sub_total 	= $total_pas['harga_budget'] * $total_pas['jumlah_budget'] * $total_pas['hari_budget'];
								$jumlah 	= $jumlah + $sub_total + $sub_total_ppn;
								$pdm		= $pdm + $sub_total;
							}
						}
					}
						$update_pas	   = mysql_query("UPDATE tabel_pas SET total_pas='$jumlah', sisa_pdm='$pdm' where id_pas='$id_pas'");
						//cari status persetujuan
						$cari 			= mysql_query("SELECT * FROM tabel_pdm where id_pdm = $id_pdm");
						$lihat 			= mysql_fetch_array($cari);
						//cari status persetujuan
						$status_aca = $lihat['persetujuan_aca'];
						$status_rpm = $lihat['persetujuan_rpm'];
						$status_rma = $lihat['persetujuan_rma'];
						$status_rca = $lihat['persetujuan_rca'];
						$status_finance = $lihat['persetujuan_finance'];

						switch ($lihat['status_pdm']=="Ditolak") {
							case(($status_aca=="Disetujui") and ($status_rpm=="Disetujui") and ($status_rma=="Validasi") and ($status_rca=="Disetujui") and ($status_finance=="Ditolak")):
								$user = "finance";
								$email = "gunadi@apachesml.co.id";
								$nama = "Direksi";
								$komentar = "Data PDM yang ditolak sudah di update oleh RPM silahkan lihat di menu PDM";

								$id_pdm			= $_POST['id_pdm'];
								$tgl_revisi 	= date('Y-m-d');
								$update_status	= mysql_query("UPDATE tabel_pdm set komentar_finance='$komentar', persetujuan_finance='Disetujui',tgl_persetujuan_finance='$tgl_revisi', status_pdm = 'Pending' where id_pdm = $id_pdm");
								if ($update_status) {
									echo "<script>alert('PDM Berhasil direvisi..')
									location.href='pdm_ditolak.sml?id=$id_pas'</script>";
								}else {
									echo "<script>alert('PDM gagal direvisi, silakan ulangi kembali..')
									location.href='edit_pdm.sml?id=$id_pas'</script>";
								}
								break;
							case(($status_aca=="Disetujui") and ($status_rpm=="Disetujui") and ($status_rma=="Validasi") and ($status_rca=="Ditolak") and ($status_finance=="")):
								$user 		= "rca";
								$email 		= "erni@apachesml.co.id";
								$nama 		= "Deputy Finance";
								$komentar 	= "Data PDM yang ditolak sudah di update oleh RPM silahkan lihat di menu PDM";

								$id_pdm			= $_POST['id_pdm'];
								$tgl_revisi 	= date('Y-m-d');
								$update_status	=mysql_query("UPDATE tabel_pdm set keterangan_rca='$komentar', persetujuan_rca='Disetujui',tgl_persetujuan_rca='$tgl_revisi', status_pdm = 'Pending' where id_pdm = $id_pdm");
								
								if ($update_status) {
									echo "<script>alert('PDM Berhasil direvisi..')
									location.href='pdm_ditolak.sml?id=$id_pas'</script>";
								}else {
									echo "<script>alert('PDM gagal direvisi, silakan ulangi kembali..')
									location.href='edit_pdm.sml?id=$id_pas'</script>";
								}
								break;
							case(($status_aca=="Disetujui") and ($status_rpm=="Disetujui") and ($status_rma=="Belum Validasi") and ($status_rca=="") and ($status_finance=="")):
								$user = "rma";
								$email = "yasman@apachesml.co.id";
								$nama = "Deputy Accounting";
								$komentar = "Data PDM yang ditolak sudah di update oleh RPM silahkan lihat di menu PDM";

								$id_pdm					= $_POST['id_pdm'];
								$tgl_revisi = date('Y-m-d');
								$update_status=mysql_query("UPDATE tabel_pdm set keterangan_rma='$komentar', persetujuan_rma='Disetujui',tgl_persetujuan_rma='$tgl_revisi', status_pdm = 'Pending' where id_pdm = $id_pdm");
								if ($update_status) {
									echo "<script>alert('PDM Berhasil direvisi..')
									location.href='pdm_ditolak.sml?id=$id_pas'</script>";
								}else {
									echo "<script>alert('PDM gagal direvisi, silakan ulangi kembali..')
									location.href='edit_pdm.sml?id=$id_pas'</script>";
								}
								break;
							case(($status_aca=="Disetujui") and ($status_rpm=="Ditolak") and ($status_rma=="") and ($status_rca=="") and ($status_finance=="")):
								$user = "rpm";
								$email = "marisa@apachesml.co.id";
								$nama = "RMA";
								$komentar = "Data PDM yang ditolak sudah di update oleh RPM silahkan lihat di menu PDM";

								$id_pdm					= $_POST['id_pdm'];
								$tgl_revisi = date('Y-m-d');
								$update_status=mysql_query("UPDATE tabel_pdm set keterangan_rpm='$komentar', persetujuan_rpm='Disetujui',tgl_persetujuan_rpm='$tgl_revisi', status_pdm = 'Pending' where id_pdm = $id_pdm");
								if ($update_status) {
									echo "<script>alert('PDM Berhasil direvisi..')
									location.href='pdm_ditolak.sml?id=$id_pas'</script>";
								}else {
									echo "<script>alert('PDM gagal direvisi, silakan ulangi kembali..')
									location.href='edit_pdm.sml?id=$id_pas'</script>";
								}
								break;
							default:
								$user = "aca";
								$email_cek1 = mysql_fetch_array(mysql_query("SELECT email_rpm as rpm FROM `tabel_pas` a, tabel_cmr b, tabel_ao c WHERE a.id_cmr=b.id_cmr and b.id_ao=c.id_ao and a.id_pas='$id_pas'"));
								$email = $email_cek1['rpm'];
								$nama  = "RPM";
								$id_pdm					= $_POST['id_pdm'];
								$komentar = "Data PDM yang ditolak sudah di update oleh RPM silahkan lihat di menu PDM";

								$tgl_revisi = date('Y-m-d');
								$update_status=mysql_query("UPDATE tabel_pdm set komentar_aca='$komentar', persetujuan_aca='Disetujui',tgl_persetujuan_aca='$tgl_revisi', status_pdm = 'Pending' where id_pdm = $id_pdm");
								if ($update_status) {
									echo "<script>alert('PDM Berhasil direvisi..')
									location.href='pdm_ditolak.sml?id=$id_pas'</script>";
								}else {
									echo "<script>alert('PDM gagal direvisi, silakan ulangi kembali..')
									location.href='edit_pdm.sml?id=$id_pas'</script>";
								}
						}





							//update total pdm dan delete pdm detail
							$update_pdm		   = mysql_query("UPDATE tabel_pdm SET total_pdm=0 where id_pdm='$id_pdm'");
							$delete_pdm_detail = mysql_query("DELETE FROM tabel_pdm_detail where id_pdm='$id_pdm'");

							//isi pdm detail update
							$estimasi = mysql_query("SELECT * FROM tabel_estimasi_budget where id_proposal = $id_proposal");
							while ($hasil_estimasi=mysql_fetch_array($estimasi)) {
							$query 		= mysql_query("SELECT * FROM tabel_estimasi_budget where id_estimasi_budget = '".$hasil_estimasi['id_estimasi_budget']."'");
							$hasil 		= mysql_fetch_array($query);

							if($hasil['hari_budget']>0){
							$sub_total 	= $hasil['harga_budget'] * $hasil['jumlah_budget'] * $hasil['hari_budget'];
							}else{
							$sub_total 	= $hasil['harga_budget'] * $hasil['jumlah_budget'];
							}
							$jumlah 	= $jumlah + $sub_total;

							$simpan2	= mysql_query("INSERT INTO tabel_pdm_detail (`id_pdm`,`id_estimasi_budget`,`keperluan`,`jumlah_pdm`) VALUES ('$id_pdm',
									'$hasil[id_estimasi_budget]','$hasil[keterangan_budget]','$sub_total')");
							$simpan3	= mysql_query("UPDATE tabel_pdm SET total_pdm = total_pdm + $sub_total WHERE id_pdm='$id_pdm'");
							$simpan4	= mysql_query("UPDATE tabel_pas SET sisa_pdm = sisa_pdm - $sub_total WHERE id_pas='$id_pas'");
							}



							$message="Dear $nama,
										<br><br>
									Melalui email ini kami informasikan ada pengajuan PDM yang sudah di revisi oleh RPM.
									<br>
									Dimohon untuk persetujuan PDM, silakan masuk ke dalam sistem dengan alamat: <a href=pas.apachesml.co.id> http://pas.apachesml.co.id</a>
										<br><br>

									Atas perhatiannya kami ucapkan terima kasih.

									<br><br><br>

									Regards, <br>
									<br>
									<br>
									PAS ONLINE";


							$to= $email;
							$subject="PENGAJUAN PDM";
							$headers = "MIME-Version: 1.0" . "\r\n";
							$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

							// More headers
							$headers .= 'From: <PAS ONLINE>' . "\r\n";
							$headers .= 'Bcc: willy@apachesml.co.id,frans@apachesml.co.id,rolina@apachesml.co.id' . "\r\n";
							@mail($to,$subject,$message,$headers);
						}




/**} else {
echo "<script>alert('Pengajuan proposal harus minimal 14 hari sebelum pelaksanaan dari hari ini!!, Silakan input kembali..')
location.href='edit_proposal_lokal.sml?id=$id_proposal'</script>";
}
*/
?>
