<!DOCTYPE html>
<!--[if IE 7 ]>    <html class="ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 	 ]>   <html class="ie" lang="en"> <![endif]-->
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="HandheldFriendly" content="True">
	<title>RSM Tours - Contact</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen,projection,print" />
	<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" />
	<link rel="shortcut icon" href="images/favicon.ico" />
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
	<script type="text/javascript" src="js/css3-mediaqueries.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript" src="js/jquery.uniform.min.js"></script>
	<script type="text/javascript" src="js/infobox.js"></script>
	<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
	<script type="text/javascript" src="js/validation.js"></script>
	<script type="text/javascript" src="js/selectnav.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	
	<script type="text/javascript">
	function initialize() {
		var secheltLoc = new google.maps.LatLng(49.47216, -123.76307);

		var myMapOptions = {
			 zoom: 15
			,center: secheltLoc
			,mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		var theMap = new google.maps.Map(document.getElementById("map_canvas"), myMapOptions);


		var marker = new google.maps.Marker({
			map: theMap,
			draggable: true,
			position: new google.maps.LatLng(49.47216, -123.76307),
			visible: true
		});

		var boxText = document.createElement("div");
		boxText.innerHTML = "<strong>RSM Tours</strong><br>1400 Pennsylvania Ave,<br>Washington DC";

		var myOptions = {
			 content: boxText
			,disableAutoPan: false
			,maxWidth: 0
			,pixelOffset: new google.maps.Size(-140, 0)
			,zIndex: null
			,closeBoxURL: ""
			,infoBoxClearance: new google.maps.Size(1, 1)
			,isHidden: false
			,pane: "floatPane"
			,enableEventPropagation: false
		};

		google.maps.event.addListener(marker, "click", function (e) {
			ib.open(theMap, this);
		});

		var ib = new InfoBox(myOptions);
		ib.open(theMap, marker);
	}
</script>
</head>
<body onload="initialize()">
	
<?php include 'inc/header.php';?>
	
	
	<!--main-->
	<div class="main" role="main">		
		<div class="wrap clearfix">
			<!--main content-->
			<div class="content clearfix">
				<!--breadcrumbs-->
				<nav role="navigation" class="breadcrumbs clearfix">
					<!--crumbs-->
					<ul class="crumbs">
						<li><a href="#" title="Home">Home</a></li> 
						<li>Contact</li>                                       
					</ul>
					<!--//crumbs-->
				</nav>
				<!--//breadcrumbs-->

				<!--three-fourth content-->
				<section class="three-fourth">
					<h1>Contact us</h1>
					<!--map-->
					<div class="map-wrap">
						<div class="gmap" id="map_canvas"></div>
					</div>
					<!--//map-->
				</section>	
				<!--three-fourth content-->
				
				<!--sidebar-->
				<aside class="right-sidebar lower">
					<!--contact form-->
					<article class="default">
						<h2>Send us a message</h2>
						<form action="" id="contact-form" method="post">
							<fieldset>
								<div class="f-item">
									<label for="name">Your name</label>
									<input type="text" id="name" name="name" value="" required="required" />
								</div>
								<div class="f-item">
									<label for="email">Your e-mail</label>
									<input type="email" id="email" name="email" value="" required="required"  />
								</div>
								<div class="f-item">
									<label for="message">Your message</label>
									<textarea id="message" rows="10" cols="10"></textarea>
								</div>
								<input type="submit" value="Send" id="submit" name="submit" class="gradient-button" />
							</fieldset>
						</form>
					</article>
					<!--//contact form-->
					
					<!--contact info-->
					<article class="default">
						<h2>Or contact us directly</h2>
						<p class="phone-green">01521-204608</p>
						<p class="email-green"><a href="#">rsmtours@ymail.com</a></p>
					</article>
					<!--//contact info-->
				</aside>
				<!--//sidebar-->
			</div>
			<!--//main content-->
		</div>
	</div>
	<!--//main-->
	
	
<?php include 'inc/footer.php';?>
	
	<script>
		// Initiate selectnav function
		selectnav();
	</script>
</body>
</html>