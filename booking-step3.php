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
	if (!isset($_GET['roomid']) || $_GET['roomid']==NULL){
		echo "<script>window.location='error.php';</script>";
	} else {
		$roomid = $_GET['roomid'];
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
						<li><?php echo $_SESSION['hotelname'];?></li>                                       
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
						<form id="booking" method="post" action="pdf.php" class="booking">
						
						<input type="hidden" name="sid" value="<?php echo session_id();?>" />
						<input type="hidden" name="f_name" value="<?php echo $_SESSION['first_name'];?>" />
						<input type="hidden" name="l_name" value="<?php echo $_SESSION['last_name'];?>" />
						<input type="hidden" name="email" value="<?php echo $_SESSION['email'];?>" />
						<input type="hidden" name="address" value="<?php echo $_SESSION['address'];?>" />
						<input type="hidden" name="city" value="<?php echo $_SESSION['city'];?>" />
						<input type="hidden" name="zip" value="<?php echo $_SESSION['zip'];?>" />
						<input type="hidden" name="country" value="<?php echo $_SESSION['country'];?>" />
						<input type="hidden" name="phone" value="<?php echo $_SESSION['phone'];?>" />
						<input type="hidden" name="datein" value="<?php echo $_SESSION['datepicker_in'];?>" />
						<input type="hidden" name="dateout" value="<?php echo $_SESSION['datepicker_out'];?>" />
						<input type="hidden" name="c_number" value="<?php echo $_SESSION['child_number'];?>" />
						<input type="hidden" name="a_number" value="<?php echo $_SESSION['adult_number'];?>" />

							<fieldset>
								<h3><span>03 </span>Confirmation</h3>
								<div class="text-wrap">

								<input type="submit" class="gradient-button print" value="Print booking" id="next-step" />

									<p>Thank you. Your booking is now confirmed. </p>
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
				$query= "SELECT tbl_room.*, tbl_hotel.* FROM tbl_room
							INNER JOIN tbl_hotel
							ON tbl_hotel.id = tbl_room.hotelId
							WHERE tbl_room.id = $roomid";
				$post= $db->select($query);
				if ($post) {

					while ($result = $post->fetch_assoc()) {

				?>

					<article class="booking-details clearfix">
						<h1><?php echo $result['title'];?> 
							<span class="stars">
								<img src="images/ico/star.png" alt="" />
								<img src="images/ico/star.png" alt="" />
								<img src="images/ico/star.png" alt="" />
								<img src="images/ico/star.png" alt="" />
							</span>
						</h1>
						<span class="address"><?php echo $result['location'];?></span>
						<span class="rating"> <?php echo $result['userrating'];?> /10</span>
						<div class="booking-info">
							<h6>Rooms</h6>
							<p><?php echo $result['type'];?></p>
							<h6>Room Description</h6>
							<p><?php echo $result['type'];?></p>
							<h6>Check-in Date</h6>
							<p><?php echo $_SESSION['datepicker_in'];?></p>
							<h6>Check-out Date</h6>
							<p><?php echo $_SESSION['datepicker_out'];?></p>
							<h6>Room(s)</h6>
							<p>1 night, 1 room, max. <?php echo $result['max'];?> people. </p>
						</div>

						<div class="price">
							<p class="total">Total Price:  $ <?php echo 1.15*$result['price']*(($_SESSION['child_number']/2)+$_SESSION['adult_number']);?></p>
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