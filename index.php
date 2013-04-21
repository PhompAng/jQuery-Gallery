<html>
<head>
	<title>Gallery</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:100,300' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="http://jquery-ui.googlecode.com/svn/tags/latest/ui/jquery.effects.core.js"></script>
	<script type="text/javascript" src="http://jquery-ui.googlecode.com/svn/tags/latest/ui/jquery.effects.slide.js"></script>
	<script type="text/javascript" src="jquery.exif.js"></script>
</head>
<body>
	<?php
	$file_count = array();
   	for($i=1; $i<=4; $i++) { //$i = number of folder
   		$dir = "alb" . $i;
   		$file_count[$i] = count(glob("{$dir}/*.jpg")); //count img in folder
   	}
	?>
	<div id="nav"><img id="back"src="back.png"></div>


	<div class="albumthumb" id="1">
		<img class="imgalbumthumb" src="alb1/img15.jpg">
		<p>Nature</p>
	</div>
	<div id="album1">
		<div id="thumbcontainer">
			<?php
				for($j = 1; $j <= $file_count[1]; $j++) {
    				echo "<img class='thumb' exif='true' src='alb1/img" .  $j . ".jpg'>";
    			}
    		?>
    		<div id="vr"></div>
    	</div>
	</div> 

	<div class="albumthumb" id="2">
		<img class="imgalbumthumb" src="alb2/img5.jpg">
		<p>Landscape</p>
	</div>
	<div id="album2">
		<div id="thumbcontainer">
			<?php
				for($j = 1; $j <= $file_count[2]; $j++) {
					echo "<img class='thumb' exif='true' src='alb2/img" .  $j . ".jpg'>";
    			}
    		?>
    		<div id="vr"></div>
    	</div>
	</div>

	<div class="albumthumb" id="3">
		<img class="imgalbumthumb" src="alb3/img1.jpg">
		<p>Miscellneous</p>
	</div>
	<div id="album3">
		<div id="thumbcontainer">
			<?php
				for($j = 1; $j <= $file_count[3]; $j++) {
    				echo "<img class='thumb' exif='true' src='alb3/img" .  $j . ".jpg'>";
    			}
    		?>
    	<div id="vr"></div>
    	</div>
	</div>

	<div class="albumthumb" id="4">
		<img class="imgalbumthumb" src="alb4/img14.jpg">
		<p>Aquarium</p>
	</div>
	<div id="album4">
		<div id="thumbcontainer">
			<?php
				for($j = 1; $j <= $file_count[4]; $j++) {
    				echo "<img class='thumb' exif='true' src='alb4/img" .  $j . ".jpg'>";
    			}
    		?>
    		<div id="vr"></div>
    	</div>
	</div>

	<div id="fullcontainer"></div>

	<script>
	/*
	for(var i = 1; i < 7; i++) {
		for(var j = 1; j < 12; j++) {
			$("#album"+i).append("<img class='thumb' src='alb"+i+"/img"+j+".jpg'>");
		}
	} */

	$(".albumthumb").click( function() {
		var id = $(this).attr('id'); //get id of .albthumb
		$(".albumthumb").hide('slide', {direction: 'left'}, 1000);
		$("#album"+id).show();
		$("#album"+id).children().show('slide', {direction: 'left'}, 1000);
		$("#fullcontainer").fadeIn(500);
	});

	$("#nav").click( function () {
		$('[id^="album"]').hide();
		$(".albumthumb").show('slide', {direction: 'left'}, 1000);
		$("#fullcontainer").hide('slide', {direction: 'left'}, 1000);
		$("#fullcontainer").empty();
	});

	$(".thumb").click( function () {
		var model = $(this).exif('Model');
		var exposuretime = $(this).exif('ExposureTime');
		var fnumber = $(this).exif('FNumber');
		var iso = $(this).exif('ISOSpeedRatings');
		var focallenght = $(this).exif('FocalLength');
		var software = $(this).exif('Software');

		if (model == "") { model = "N/A";}
		if (exposuretime == "") { exposuretime = "N/A";}
		if (fnumber == "") { fnumber = "N/A";}
		if (iso == "") { iso = "N/A";}
		if (focallenght == "") { focallenght = "N/A";}
		if (software == "") { software = "N/A";}

		$("#fullcontainer").empty();
		$(this).clone().appendTo("#fullcontainer");
		$("<div id='exif'><pre class='l'>" + 
		"Model: " + model + "</pre><pre class='r'>ExposureTime: " + exposuretime + "</pre><br><pre class='l'>" +
		"FNumber: " + fnumber + "</pre><pre class='r'>ISO: " + iso + "</pre><br><pre class='l'>" +
		"FocalLength: " + focallenght + "</pre><pre class='r'>Software: " + software + "</pre></div>").appendTo("#fullcontainer");
		$("#fullcontainer").children().removeClass("thumb").addClass("full").hide();
		$(".full").fadeIn("slow");
	});

	$("body").delegate("#exif", "mouseenter mouseleave",
	function (event) {
		if (event.type == 'mouseenter') {
			$(this).fadeOut("slow");
		} else {
			$(this).delay(700).fadeIn("slow"); //fix double fade
		}
	});
	</script>
</body>
</html>