<?php
mysql_connect("localhost","sml_pas","pas123");
mysql_select_db("sml_pas");

$id_proposal = $_GET['id'];

$cek_proposal 	= mysql_query ("SELECT sum(sub_total_budget) as jumlah FROM tabel_estimasi_budget WHERE id_proposal='$id_proposal' group by id_proposal");
$hasil		= mysql_fetch_array($cek_proposal);

if($hasil['jumlah']<=4500000){
echo "<script>location.href='review_lokal.sml?id=$id_proposal'</script>";
} else {
echo "<script>location.href='review_pusat.sml?id=$id_proposal'</script>";
}
?>