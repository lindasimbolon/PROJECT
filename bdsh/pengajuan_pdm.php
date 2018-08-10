<?php include "header.php";?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
<h3>DATA PDM</h3>
		<table id="contoh">
				<thead >
				<tr bgcolor="#2e9fd2" align="center">
					<th width="5%">#</th>
					<th width="13%">N0 PAS</th>
					<th width="25%">NAMA PROGRAM</th>
					<th width="10%">AREA OFFICE</th>
					<th width="10%">ESTIMASI</th>
					<th width="10%">TGL DIBUTUHKAN</th>
					<th width="10%">DANA PDM</th>
					<th width="8%">OTORISASI ASM</th>
					<th width="8%">DETAIL BIAYA</th>
				</tr>
				</thead>
			<tbody>
				<?php
				$ao = $_SESSION['ao'];
				$i=0;
				$sql1 = mysql_query ("SELECT * FROM tabel_pdm a, tabel_pas b, tabel_cmr c, tabel_ao d where 
				b.id_cmr=c.id_cmr and c.id_ao=d.id_ao and a.id_pas=b.id_pas and b.persetujuan_rpm='Disetujui' and otorisasi_ro is NULL");
				while ($hasil1 = mysql_fetch_array($sql1)){
				$i++;
				
				?>
				<tr height="30">
					<td align="center"><?php echo $i;?></td>
					<td align="left"><?php echo $hasil1['no_pas'];?></td>
					<td align="left"><?php echo $hasil1['program'];?></td>
					<td align="center"><?php echo $hasil1['singkatan'];?></td>
					<td align="right">Rp. <?php echo number_format($hasil1['total_pas']) ;?></td>
					<td align="center"><?php echo tgl_indo($hasil1['tgl_butuh']);?></td>
					<td align="right">Rp. <?php echo number_format($hasil1['total_pdm']);?></a></td>
					<td align="center"><a href="otorisasi_ro.sml?id=<?php echo $hasil1['id_pdm'];?>"><input type="submit" value="otorisasi"></a></td>
					<td align="center"><a href="detail_pdm.php?id=<?php echo $hasil1['id_pdm'];?>">Lihat</a></td>
					
				</tr>
				<?php } ?>
				
				</tbody>
			</table> 


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
	
	
	<script type='text/javascript'>
//<![CDATA[
$(document).ready(function() {
    // Menentukan elemen yang dijadikan sticky yaitu .menu
    var stickyNavTop = $('.navbar').offset().top; 
    var stickyNav = function(){
        var scrollTop = $(window).scrollTop();  
        // Kondisi jika discroll maka menu akan selalu diatas, dan sebaliknya        
        if (scrollTop > stickyNavTop) { 
              $('.navbar').css({'position': 'fixed', 'top':0, 'z-index':2, 'width':'100%'});
        } else {
            $('.navbar').css({ 'position': 'relative' });
        }
    };
    // Jalankan fungsi
    stickyNav();
    $(window).scroll(function() {
        stickyNav();
    });
});
//]]>
</script>
</body>
</html>
