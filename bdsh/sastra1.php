<?php include "header.php";?>
<body>
<?php include "menu.php";?>
<!-- Header -->
<header id="head">
 
<div style="font-size:12px;">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript">
 
$(function() {
 
    $(".search_button").click(function() {
        // getting the value that user typed
        var searchString    = $("#search_box").val();
        var searchString2   = $("#filter_box").val();
        // forming the queryString
        var data            = 'search='+ searchString2 + '&tahun=' + searchString;
         
        // if searchString is not empty
        if(searchString && searchString2) {
            // ajax call
            $.ajax({
                type: "POST",
                //url: "sastra_db.php?filter="+searchString"&year="+searchString2,
                url: "sastra_db.php",
                data: data,
                beforeSend: function(html) { // this happens before actual call
                    $("#results").html(''); 
                    $("#searchresults").show();
                    $(".word").html(searchString);
               },		
               success: function(html){ // this happens after we get results
                    $("#results").show();
                    $("#results").append(html);
              }
            });    
        }
        return false;
    });
});
</script>

</head>
<body>
<div id="container">
<div style="margin:20px auto; text-align: center;">
<form method="post" action="sastra_db.php">
    <select required id="filter_box" class="filter_box" name="filter">
	<option value="">Select Filter:</option>
	<option value="WEEK">WEEK</option>
	<option value="MONTH">MONTH</option>
	<option value="YEAR">YEAR</option>
    </select>
    <select required name="search" id="search_box" class='search_box'>
	<option value="">Select Year:</option>
	<?php
	include "../koneksi.php";
	$sql= "SELECT DISTINCT (YEAR(tgl_pelaksanaan)) AS tahun FROM tabel_pas";
	$query = mysql_query($sql);
	        while($row = mysql_fetch_array($query)){
		echo "<option value=" .$row['tahun']. ">" .$row['tahun']. "</option>";
	}
	?>
    </select>

    <input type="submit" value="Search" class="search_button" /><br />
</form>
</div>
<div>
 
<div id="searchresults">Search results :</div>
<ul id="results" class="update">
</ul>
 
</div>
</div>
   
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