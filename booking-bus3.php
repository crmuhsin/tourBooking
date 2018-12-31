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
	<title>RSM Tours - Booking</title>
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
	<script type="text/javascript">
		function printpage()
			{window.print()}
	</script>
</head>
<body>
	
<?php include 'inc/header.php';

	$id = Session::get("cmrId");
	if (!isset($_GET['busid']) || $_GET['busid']==NULL){
		echo "<script>window.location='error.php';</script>";
	} else {
		$busid = $_GET['busid'];
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

				<!--three-fourth content-->
					<section class="three-fourth">
						<form id="booking" method="post" action="booking" class="booking">
							<fieldset>
								<h3><span>03 </span>Confirmation</h3>
								<div class="text-wrap">
									<a href="#" class="gradient-button print" title="Print booking" onclick="printpage()">Print booking</a>
									<p>Thank you. Your booking is now confirmed.</p>
								</div>
								
								<h3>Traveller info</h3>
								<div class="text-wrap">
									<div class="output">
										<p>Booking number:</p>
										<p><?php echo session_id();?></p>
										<p>Fist name: </p>
										<p> <?php echo $_SESSION['first_name'];?></p>
										<p>Last name: </p>
										<p><?php echo $_SESSION['last_name'];?></p>
										<p>E-mail address: </p>
										<p><?php echo $_SESSION['email'];?></p>
										<p>Street Address and number:</p>
										<p><?php echo $_SESSION['address'];?></p>
										<p>Town / City: </p>
										<p><?php echo $_SESSION['city'];?></p>
										<p>ZIP code: </p>
										<p><?php echo $_SESSION['zip'];?></p>
										<p>Country:</p>
										<p><?php echo $_SESSION['country'];?></p>
										<p>Phone:</p>
										<p><?php echo $_SESSION['phone'];?></p>
									</div>
								</div>
							
								<h3>Special requirements</h3>
								<div class="text-wrap">
									<p><?php if(isset($_SESSION['special'])){echo $_SESSION['special'];}else{echo "None";}?></p>
								</div>
								
								<h3>Payment</h3>
								<div class="text-wrap">
									<p>You have now confirmed and guaranteed your booking by credit card.<br />All payments are to be made at the hotel during your stay, unless otherwise stated in the hotel policies or in the room conditions.<br />Please note that your credit card may be pre-authorised prior to your arrival. </p>
									<p><strong class="dark">This hotel accepts the following forms of payment:</strong></p>
									<p>American Express, Visa, MasterCard</p>
								</div>
								
								<h3>Don’t forget</h3>
								<div class="text-wrap">
									<p>You can change or cancel your booking via our online self service tool myrsmtours:<br />
									<a href="index.php" class="turqouise-link">Cancel Booking</a></p><br />
									<p><strong>We wish you a pleasant stay</strong><br /><i>your rsmtours team</i></p>
								</div>
							</fieldset>
						</form>
					
					</section>
				<!--//three-fourth content-->
			

				<!--right sidebar-->
				<aside class="right-sidebar">
					<!--Booking details-->

			<?php
				$squery= "SELECT *, (SELECT cityName FROM tbl_city WHERE tbl_bus.destination=tbl_city.id) AS destination, (SELECT cityName FROM tbl_city WHERE tbl_bus.leavingfrom=tbl_city.id) AS leavingfrom FROM tbl_bus WHERE id =$busid";
				$cpost= $db->select($squery);
				if ($cpost) {
				    while ($iresult = $cpost->fetch_assoc()) {
			?>

					<article class="booking-details clearfix">
						<h1><?php echo $iresult['companyName'];?></h1>
						<span class="address">From <?php echo $iresult['leavingfrom'];?> To <?php echo $iresult['destination'];?></span>
						<div class="booking-info">
							<h6>Leaving From</h6>
							<p><?php echo $iresult['leavingfrom'];?></p>
							<h6>Destination</h6>
							<p><?php echo $iresult['destination'];?></p>
							<h6>Travel Date</h6>
							<p><?php echo $_SESSION['traveldate'];?></p>
							<h6>Travel Time</h6>
							<p>10:00 am</p>

						</div>

						<div class="price">
							<p class="total">Total Price:  $ <?php echo 1.15*$iresult['nonacfare']*$_SESSION['seats'];?></p>
							<p>VAT (15%) included</p>
						</div>
					</article>
					<!--//Booking details-->
					<?php } } ?>
					
					<!--Need Help Booking?-->
					<article class="default clearfix">
						<h2>Need Help Booking?</h2>
						<p>Call our customer services team on the number below to speak to one of our advisors who will help you with all of your holiday needs.</p>
						<p class="number">01521-204608</p>
					</article>
					<!--//Need Help Booking?-->
				</aside>
				<!--//right sidebar-->
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