﻿<!DOCTYPE html>
<!--[if IE 7 ]>    <html class="ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 	 ]>    <html class="ie" lang="en"> <![endif]-->
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="HandheldFriendly" content="True">
	<title>RSM Tours - Search Results Bus</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen,projection,print" />
<!-- 	<link rel="stylesheet" href="css/theme-strawberry.css" type="text/css" media="screen,projection,print" />
 -->	<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" />
	<link rel="shortcut icon" href="images/favicon.ico" />
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/css3-mediaqueries.js"></script>
	<script type="text/javascript" src="js/jquery.uniform.min.js"></script>
	<script type="text/javascript" src="js/jquery.raty.min.js"></script>
	<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
	<script type="text/javascript" src="js/selectnav.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		$('dt').each(function() {
			var tis = $(this), state = false, answer = tis.next('dd').hide().css('height','auto').slideUp();
			tis.click(function() {
				state = !state;
				answer.slideToggle(state);
				tis.toggleClass('active',state);
			});
		});
		
		$('.view-type li:first-child').addClass('active');
		
		$('#star').raty({
			score    : 3,
			click: function(score, evt) {
			alert('ID: ' + $(this).attr('id') + '\nscore: ' + score + '\nevent: ' + evt);
		  }
		});
		
		
	});
		

	</script>
</head>
<body>
	
<?php include 'inc/header.php';?>
<?php 
	if (!isset($_GET['search']) || $_GET['search']==NULL){
		echo "<script>window.location='error.php';</script>";
	} else {
		$search = $_GET['search'];
	}
?>
	
	
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
						<li><a href="#" title="Hotels">Hotels</a></li>
						<li><a href="#" title="United Kingdom">United Kingdom</a></li>
						<li><a href="#" title="London">London</a></li>  
						<li>Search results</li>                                       
					</ul>
					<!--//crumbs-->
					
					<!--top right navigation-->
					<ul class="top-right-nav">
						<li><a href="#" title="Back to results">Back to results</a></li>
						<li><a href="#" title="Change search">Change search</a></li>
					</ul>
					<!--//top right navigation-->
				</nav>
				<!--//breadcrumbs-->

				<!--sidebar-->
				<?php include 'inc/search_result_sidebar_bus.php';?>
				<!--sidebar-->


			
				<!--three-fourth content-->
					<section class="three-fourth">
						<div class="sort-by">
							<h3>Sort by</h3>
							<ul class="sort">
								<li>Stops <a href="#" title="ascending" class="ascending">ascending</a><a href="#" title="descending" class="descending">descending</a></li>
								<li>Price <a href="#" title="ascending" class="ascending">ascending</a><a href="#" title="descending" class="descending">descending</a></li>
								<li>Duration <a href="#" title="ascending" class="ascending">ascending</a><a href="#" title="descending" class="descending">descending</a></li>
							</ul>
							
							<ul class="view-type">
								<li class="grid-view"><a href="#" title="grid view">grid view</a></li>
								<li class="list-view"><a href="#" title="list view">list view</a></li>
							</ul>
						</div>
						
						<div class="deals clearfix flights">
							
							<!--deal-->
							<article class="one-fourth">
								<div class="details">
									<h1>AB 5047 MUC- LHR</h1>
									<div class="f-wrap">
										<h5>Airline</h5>
										<div class="flight-info">Lufthansa</div>
									</div>
									<div class="f-wrap">
										<h5>Departure</h5>
										<div class="flight-info">22:00 Friday, 5 April<br /><strong>Franz Josef Strauss</strong>  (MUC),  Munich  - Germany </div>
									</div>
									<div class="f-wrap">
										<h5>Arrival</h5>
										<div class="flight-info">23:00 Friday, 5 April<br /><strong>Luton International</strong>  (LTN),  London  - United Kingdom </div>
									</div>	
									<div class="f-wrap last">
										<h5>Duration of trip:</h5>
										<div class="flight-info">2 hours 00 minutes </div>
									</div>
									<span class="price">Price per passenger  <em>$ 50</em> </span>
									<div class="description">
										<p>1 Passenger. Airline's fare per passenger Tax included Service fees not included</p>
									</div>
									<a href="booking-step1.php" title="Book now" class="gradient-button">Book now</a>
								</div>
							</article>
							<!--//deal-->
							
							<!--bottom navigation-->
							<div class="bottom-nav">
								<!--back up button-->
								<a href="#" class="scroll-to-top" title="Back up">Back up</a> 
								<!--//back up button-->
								
								<!--pager-->
								<div class="pager">
									<span><a href="#">First page</a></span>
									<span><a href="#">&lt;</a></span>
									<span class="current">1</span>
									<span><a href="#">2</a></span>
									<span><a href="#">3</a></span>
									<span><a href="#">4</a></span>
									<span><a href="#">5</a></span>
									<span><a href="#">6</a></span>
									<span><a href="#">7</a></span>
									<span><a href="#">8</a></span>
									<span><a href="#">&gt;</a></span>
									<span><a href="#">Last page</a></span>
								</div>
								<!--//pager-->
							</div>
							<!--//bottom navigation-->
						</div>
					</section>
				<!--//three-fourth content-->
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