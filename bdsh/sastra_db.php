<div style="font-size:14px;width:100%; padding-left: 20%;padding-right:20%">
<style type="text/css">
td, th {
    padding: 5px;
}
</style>
<?php
//if we got something through $_POST
if (isset($_POST['search'])) {
    // here you would normally include some database connection
    include('../koneksi.php');
    // never trust what user wrote! We must ALWAYS sanitize user input
    $word1 = mysql_real_escape_string($_POST['tahun']);
    $word2 = mysql_real_escape_string($_POST['search']);
    $word1 = htmlentities($word1);
    $word2 = htmlentities($word2);
    // build your search query to the database
    //$sql = "SELECT id_pas, no_pas FROM tabel_pas WHERE no_pas LIKE '$word2%' and tgl_pelaksanaan LIKE '$word1%'  ORDER BY no_pas LIMIT 10";
    //$sql = "SELECT id_pas, no_pas FROM tabel_pas WHERE no_pas LIKE '$word2%' AND (year(tgl_pelaksanaan)= '$word1') ORDER BY no_pas";
    if($word2 =="WEEK"){
	    $sql = "SELECT COUNT(a.`id_pas`) AS total, SUM(total_pas) AS total2, WEEK(tgl_pelaksanaan,2) AS WEEK, SUM(b.`total_pdm`) AS total_pdm, 
		SUM(c.`jumlah_sipas`) AS jumlah_sipas
		FROM tabel_pas a, tabel_pdm b, tabel_sipas c
		WHERE YEAR(tgl_pelaksanaan) = '$word1' AND a.`id_pas` = b.`id_pas` AND c.`id_pas` = a.`id_pas` GROUP BY WEEK(tgl_pelaksanaan,2)";
			echo "
			    <table id='contoh'  width='100%' align='center' style='box-shadow: 10px 30px 90px 1px #888888;'>
			    <thead >
				<tr bgcolor='#2e9fd2' align='center'>
					<th>WEEK</th>
					<th>TOTAL PAS</th>
					<th>ESTIMASI BIAYA</th>
					<th>TOTAL PDM</th>
					<th>TOTAL SIPAS</th>
			        </tr>
			    </thead>
			    ";
			    $query = mysql_query($sql);
			        while($row = mysql_fetch_array($query)){
				echo "<tr> <td>" .$row['WEEK']. "</td> <td>" .$row['total']. "</td> <td align='right'>" .number_format($row['total2']). "</td>
				<td align='right'>" .number_format($row['total_pdm']). "</td> <td align='right'>" .number_format($row['jumlah_sipas']). "</td> </tr>";
			}
			echo "
			</table>
			";
    }elseif($word2 =="MONTH"){
	    $sql = "SELECT COUNT(a.`id_pas`) AS total, SUM(total_pas) AS total2, MONTH(tgl_pelaksanaan) AS MONTH, SUM(b.`total_pdm`) AS total_pdm, 
		SUM(c.`jumlah_sipas`) AS jumlah_sipas
		FROM tabel_pas a, tabel_pdm b, tabel_sipas c
		WHERE YEAR(tgl_pelaksanaan) = '$word1' AND a.`id_pas` = b.`id_pas` AND c.`id_pas` = a.`id_pas` GROUP BY MONTH(tgl_pelaksanaan)
			ORDER BY MONTH(tgl_pelaksanaan)";
			echo "
			    <table id='contoh'  width='100%' style='box-shadow: 10px 1px 90px 1px #888888;'>
			    <thead >
				<tr bgcolor='#2e9fd2' align='center'>
					<th>MONTH</th>
					<th>TOTAL PAS</th>
					<th>ESTIMASI BIAYA</th>
					<th>TOTAL PDM</th>
					<th>TOTAL SIPAS</th>
			        </tr>
			    </thead>
			    ";
			    $query = mysql_query($sql);
			        while($row = mysql_fetch_array($query)){
				echo "<tr> <td>" .$row['MONTH']. "</td> <td>" .$row['total']. "</td> <td align='right'>" .number_format($row['total2']). "</td>
				<td align='right'>" .number_format($row['total_pdm']). "</td> <td align='right'>" .number_format($row['jumlah_sipas']). "</td></tr>";
			}
			echo "
			</table>
			";
    }elseif($word2 =="YEAR"){
	    $sql = "SELECT COUNT(a.`id_pas`) AS total, SUM(total_pas) AS total2, YEAR(tgl_pelaksanaan) AS YEAR, SUM(b.`total_pdm`) AS total_pdm, 
		SUM(c.`jumlah_sipas`) AS jumlah_sipas
		FROM tabel_pas a, tabel_pdm b, tabel_sipas c
		WHERE YEAR(tgl_pelaksanaan) = '$word1' AND a.`id_pas` = b.`id_pas` AND c.`id_pas` = a.`id_pas` GROUP BY YEAR(tgl_pelaksanaan)";
			echo "
			    <table id='contoh'  width='100%' style='box-shadow: 10px 1px 90px 1px #888888;'>
			    <thead >
				<tr bgcolor='#2e9fd2' align='center'>
					<th>YEAR</th>
					<th>TOTAL PAS</th>
					<th>ESTIMASI BIAYA</th>
					<th>TOTAL PDM</th>
					<th>TOTAL SIPAS</th>
			        </tr>
			    </thead>
			    ";
			    $query = mysql_query($sql);
			        while($row = mysql_fetch_array($query)){
				echo "<tr> <td>" .$row['YEAR']. "</td> <td>" .$row['total']. "</td> <td align='right'>" .number_format($row['total2']). "</td>
				<td align='right'>" .number_format($row['total_pdm']). "</td> <td align='right'>" .number_format($row['jumlah_sipas']). "</td> </tr>";
			}
			echo "
			</table>
			";
    }
    // get results
    
}
?>
</div>