<?php
include "header.php";
		
		if(isset($_POST['west'])){
			$regional 	= "WEST";
			$tahun		=$_POST['tahun'];
			$quartal	=$_POST['quartal'];
			
			$west_ao		= $_POST['west_ao'];
			$count			= count($west_ao);
			$west_budget_lokal	=$_POST['west_budget_lokal'];
			$west_budget_pusat	=$_POST['west_budget_pusat'];
			
			$sql = "INSERT INTO tabel_budget (`regional`,`ao`,`quartal`, `tahun`,`budget_lokal`,`budget_pusat`) VALUES " ;
			for( $i=0; $i < $count; $i++ )
			{
				$sql .= "('{$regional}','{$west_ao[$i]}','{$quartal}','{$tahun}','{$west_budget_lokal[$i]}','{$west_budget_pusat[$i]}')";
				$sql .= ",";
			}
			$sql = rtrim($sql,",");
			$insert = mysql_query($sql);
						
			
			if($insert){
				echo "<script>alert('Berhasil disimpan')
				location.href='data_budget.sml'</script>";
			} else {
				echo "<script>alert('Gagal disimpan')
				location.href='input_budget.sml'</script>";
			}
		} else {
			$regional 	= "EAST";
			$tahun		=$_POST['tahun'];
			$quartal	=$_POST['quartal'];
			
			$east_ao		= $_POST['east_ao'];
			$count			= count($east_ao);
			$east_budget_lokal	=$_POST['east_budget_lokal'];
			$east_budget_pusat	=$_POST['east_budget_pusat'];
			
			$sql = "INSERT INTO tabel_budget (`regional`,`ao`,`quartal`, `tahun`,`budget_lokal`,`budget_pusat`) VALUES " ;
			for( $i=0; $i < $count; $i++ )
			{
				$sql .= "('{$regional}','{$east_ao[$i]}','{$quartal}','{$tahun}','{$east_budget_lokal[$i]}','{$east_budget_pusat[$i]}')";
				$sql .= ",";
			}
			$sql = rtrim($sql,",");
			$insert = mysql_query($sql);
						
			
			if($insert){
				echo "<script>alert('Berhasil disimpan')
				location.href='data_budget.sml'</script>";
			} else {
				echo "<script>alert('Gagal disimpan')
				location.href='input_budget.sml'</script>";
			}
		}
		?>