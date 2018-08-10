<?php
include "header.php";
$id          	= $_POST['id'];
$budget_lokal	= $_POST['budget_lokal'];
$budget_pusat 	= $_POST['budget_pusat'];
		
	$sql = mysql_query ("UPDATE tabel_budget SET budget_lokal='$budget_lokal',budget_pusat='$budget_pusat' where id_budget='$id'");

	if($sql){
	echo "<script>alert('Data berhasil diedit..')
	location.href='data_budget.sml'</script>"; 
	} else {
	echo "<script>alert('Data gagal diedit..')
	location.href='data_budget.sml'</script>"; 
	}
?>