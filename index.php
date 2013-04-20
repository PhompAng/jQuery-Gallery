<html>
<head>
	<title>Gallery</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:100,300' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="http://jquery-ui.googlecode.com/svn/tags/latest/ui/jquery.effects.core.js"></script>
	<script src="http://jquery-ui.googlecode.com/svn/tags/latest/ui/jquery.effects.slide.js"></script>
</head>
<body>
	<?php
	$file_count = array();
   	for($i=1; $i<=6; $i++) { //$i = number of folder
   		$dir = "alb" . $i;
   		$file_count[$i] = count(glob("{$dir}/*.jpg")); //count img in folder
   	}
	?>
	<div id="nav"><img id="back"src="back.png"></div>


	<div class="albumthumb" id="1">
		<img class="imgalbumthumb" src="alb1/img4.jpg">
		<p>Album1</p>
	</div>
	<div id="album1">
		<div id="thumbcontainer">
			<?php
				for($j = 1; $j <= $file_count[1]; $j++) {
    				echo "<img class='thumb' src='alb1/img" .  $j . ".jpg'>";
    			}
    		?>
    		<div id="vr"></div>
    	</div>
	</div> 

	<div class="albumthumb" id="2">
		<img class="imgalbumthumb" src="alb1/img5.jpg">
		<p>Album2</p>
	</div>
	<div id="album2">
		<div id="thumbcontainer">
			<?php
				for($j = 1; $j <= $file_count[2]; $j++) {
					echo "<img class='thumb' src='alb2/img" .  $j . ".jpg'>";
    			}
    		?>
    		<div id="vr"></div>
    	</div>
	</div>

	<div class="albumthumb" id="3">
		<img class="imgalbumthumb" src="alb1/img11.jpg">
		<p>Album3</p>
	</div>
	<div id="album3">
		<div id="thumbcontainer">
			<?php
				for($j = 1; $j <= $file_count[3]; $j++) {
    				echo "<img class='thumb' src='alb3/img" .  $j . ".jpg'>";
    			}
    		?>
    	<div id="vr"></div>
    	</div>
	</div>

	<div class="albumthumb" id="4">
		<img class="imgalbumthumb" src="alb1/img7.jpg">
		<p>Album4</p>
	</div>
	<div id="album4">
		<div id="thumbcontainer">
			<?php
				for($j = 1; $j <= $file_count[4]; $j++) {
    				echo "<img class='thumb' src='alb4/img" .  $j . ".jpg'>";
    			}
    		?>
    		<div id="vr"></div>
    	</div>
	</div>

	<div class="albumthumb" id="5">
		<img class="imgalbumthumb" src="alb1/img3.jpg">
		<p>Album5</p>
	</div>
	<div id="album5">
		<div id="thumbcontainer">
			<?php
				for($j = 1; $j <= $file_count[5]; $j++) {
    				echo "<img class='thumb' src='alb5/img" .  $j . ".jpg'>";
    			}
    		?>
    		<div id="vr"></div>
    	</div>
	</div>

	<div class="albumthumb" id="6">
		<img class="imgalbumthumb" src="alb1/img9.jpg">
		<p>Album6</p>
	</div>
	<div id="album6">
		<div id="thumbcontainer">
			<?php
				for($j = 1; $j <= $file_count[6]; $j++) {
    				echo "<img class='thumb' src='alb6/img" .  $j . ".jpg'>";
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
		$("#fullcontainer").empty();
		$(this).clone().appendTo("#fullcontainer");
		$("<div id='exif'></div>").appendTo("#fullcontainer"); //TODO add support exif
		$("#fullcontainer").children().removeClass("thumb").addClass("full").hide();
		$(".full").fadeIn("slow");
	});
	</script>
</body>
</html>