<?php
mysql_connect("localhost","sml_pas","pas123");
mysql_select_db("sml_pas");

$id_proposal = $_GET['id'];
$sql 		= mysql_query("SELECT * FROM tabel_proposal a, tabel_cmr b, tabel_ao c where a.id_cmr=b.id_cmr and b.id_ao=c.id_ao and a.id_proposal='$id_proposal'");
$hasil 		= mysql_fetch_array($sql);
$ao		= $hasil['singkatan'];
//buat no pas
$tahun		= date('y');
$tahun_cek	= date('Y');
$bulan		= date('m');
$urut		= mysql_query ("SELECT count(a.id_pas) as id FROM `tabel_pas` a, tabel_cmr b, tabel_ao c WHERE a.id_cmr=b.id_cmr and c.id_ao=b.id_ao and YEAR(tgl_pengajuan)='$tahun_cek' 
			and MONTH(tgl_pengajuan)='$bulan' and c.singkatan='$hasil[singkatan]' and a.kategori='LOKAL'");
$hasil_urut	= mysql_fetch_array($urut);
$no_urut	= $hasil_urut['id']+1;
if($no_urut<10){
$no 	= "00".$no_urut;
} else {
$no 	= "0".$no_urut;
}

$no_pas = "SML/".$tahun."/".$bulan."/".$no."/".$ao."/SMN";
$tgl_skg = date('Y-m-d');

$biaya_pas 	= mysql_query ("SELECT sum(sub_total_budget) as jumlah FROM tabel_estimasi_budget where id_proposal='$id_proposal'");
$total_pas 	= mysql_fetch_array($biaya_pas);

$simpan 	= mysql_query ("INSERT INTO tabel_pas (no_pas,program,tgl_pelaksanaan,tgl_selesai,id_cmr,kategori,tgl_pengajuan,status_pas,total_pas,sisa_pdm,id_proposal) 
		        VALUES ('$no_pas','$hasil[nama_program]','$hasil[mulai_pelaksanaan]','$hasil[akhir_pelaksanaan]','$hasil[id_cmr]','LOKAL','$tgl_skg','Pending',
		        '$total_pas[jumlah]','$total_pas[jumlah]','$id_proposal')");
$update_proposal = mysql_query ("UPDATE tabel_proposal SET status_pas='Sudah PAS' where id_proposal='$id_proposal'");

if($simpan){
	//proses kirim email ke asm untuk persetujuan
	$cek_info = mysql_query ("SELECT * FROM tabel_info WHERE id_info=7 ");
	$hasil_info = mysql_fetch_array($cek_info);
	$message=$hasil_info['info'];
							
	$cekemail = mysql_query("SELECT email_spv as email FROM tabel_territory where nama_territory='$hasil[lokasi_territory]'");
	$tampil   = mysql_fetch_array($cekemail);
							
	$to= $tampil['email'];
	$subject="PENGAJUAN PAS";
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
							
	// More headers
	$headers .= 'From: <PAS ONLINE>' . "\r\n";
	$headers .= 'Cc: lindawati@apachesml.com;frans@apachesml.com' . "\r\n";
	@mail($to,$subject,$message,$headers);
	
	echo "<script>alert('Pas berhasil diajukan, terima kasih..')
	location.href='data_pas.sml'</script>";
}else{
	echo "<script>alert('Pas gagal diajukan, terima kasih..')
	location.href='review_lokal.sml?id=$id_proposal'</script>";
}
?>