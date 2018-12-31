<!DOCTYPE html>
<!--[if IE 7 ]>    <html class="ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 	 ]>    <html class="ie" lang="en"> <![endif]-->
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="HandheldFriendly" content="True">
	<title>RSM Tours - Error</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen,projection,print" />
	<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" />
	<link rel="shortcut icon" href="images/favicon.ico" />
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/css3-mediaqueries.js"></script>
	<script type="text/javascript" src="js/jquery.uniform.min.js"></script>
	<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
	<script type="text/javascript" src="js/selectnav.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
</head>
<body>
	
<?php include 'inc/header.php';?>
	
	
	<!--main-->
	<div class="main" role="main">		
		<div class="wrap clearfix">
			<!--main content-->
			<div class="content clearfix">
				<section class="error">
					<!--Error type-->
					<div class="error-type">
						<h1>404</h1>
						<p>Page not found</p>
					</div>
					<!--//Error type-->
					
					<!--Error content-->
					<div class="error-content">
						<h2>Whoops, you are in the middle of nowhere.</h2>
						<h3>Don’t worry. You’ve probably made a wrong turn somewhwere.</h3>
						<ul>
							<li>If you typed in the address, check your spelling. Could just be a typo.</li>
							<li>If you followed a link, it’s probably broken. Please <a href="contact.php">contact us</a> and we’ll fix it.</li>
							<li>If you’re not sure what you’re looking for, go back to <a href="index.php">homepage</a>.</li>
						</ul>
					</div>
					<!--//Error content-->
				</section>
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