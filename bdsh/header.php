<?php
session_start();
error_reporting(0);
if (($_SESSION['level'] == "SECTION HEAD")and isset($_SESSION['username']) and isset($_SESSION['lokasi_kerja'])){
include "../koneksi.php";
include "fungsi_indotgl.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="free-educational-responsive-web-template-webEdu">
	<meta name="author" content="webThemez.com">
	<title>PAS ONLINE</title>
	<link rel="favicon" href="assets/images/favicon.png">
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css"> 
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen"> 
	<link rel="stylesheet" href="assets/css/style.css">
    	<link rel='stylesheet' id='camera-css'  href='assets/css/camera.css' type='text/css' media='all'> 
    	
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->

	<link rel="stylesheet" href="jquery.dataTables.css">
	 <script src="datetimepicker_css.js" type="text/javascript"></script>
  	    <link type="text/css" href="css/jquery-ui-1.8.6.custom.css" rel="stylesheet" />	
	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.6.custom.min.js"></script>
		<script type="text/javascript">
		jQuery(function($){
		$.datepicker.regional['vi'] = {
			closeText: 'Tutup',
			prevText: 'Sebelum',
			nextText: 'Sesudah',
			currentText: 'Sekarang',
			monthNames: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
			'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
			monthNamesShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
			'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
			dayNames: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&acute;at', 'Sabtu'],
			dayNamesShort: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sbt'],
			dayNamesMin: ['Mg', 'Sn', 'Sl', 'Rb', 'Km', 'Jm', 'Sb' ],
			dateFormat: 'yy-mm-dd',
			firstDay: 0,
			isRTL: false,
			showMonthAfterYear: false,
			changeMonth: true,
			changeYear: true,
			yearSuffix: ''};
		$.datepicker.setDefaults($.datepicker.regional['vi']);
	  	$(function(){
				$('#brothergiez').datepicker({
					inline: true
				});
				$('#waktu').datepicker({
					inline: true
				});
				$('#waktu1').datepicker({
					inline: true
				});
				$('#waktu2').datepicker({
					inline: true
				});
				$('#transfer').datepicker({
					inline: true
				});
	    });
       });
</script>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
var htmlobjek;
$(document).ready(function(){
  //apabila terjadi event onchange terhadap object <select id=propinsi>
  $("#jenis").change(function(){
    var jenis = $("#jenis").val();
    $.ajax({
        url: "ambiltipe.php",
        data: "jenis="+jenis,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#tipe").html(msg);
        }
    });
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
<script type="text/javascript" src="tinymce/tinymce.min.js"></script>


</head>

<?php

} else {

    echo "<script>alert('Anda tidak bisa mengakses halaman ini..')
	location.href='../index.sml'</script>";
}
?>