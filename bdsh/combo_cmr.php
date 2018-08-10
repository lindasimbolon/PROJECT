
<script language='javascript'>

function showCmr()

{

<?php

// membaca semua propinsi

$query = "SELECT * FROM tabel_ao ORDER BY id_ao ASC";

$hasil = mysql_query($query);

// membuat if untuk masing-masing pilihan propinsi beserta isi option untuk combobox kedua

while ($data = mysql_fetch_array($hasil))

{

$ao = $data['id_ao'];

// membuat IF untuk masing-masing propinsi

echo "if (document.form1.ao.value == \"".$ao."\")";

echo "{";

// membuat option kota untuk masing-masing propinsi

$query2 = "SELECT * FROM tabel_cmr WHERE id_ao = '$ao' ORDER BY id_cmr ASC";

$hasil2 = mysql_query($query2);

$content = "document.getElementById('cmr').innerHTML = \"";

while ($data2 = mysql_fetch_array($hasil2))

{

$content .= "<option value='".$data2['id_cmr']."'>".$data2['nama_cmr']."</option>";

}

$content .= "\"";

echo $content;

echo "}\n";

}

?>

}

</script>