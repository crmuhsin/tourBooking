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
						<li><a href="#" title="Bangladesh">Bangladesh</a></li>
						<li><?php echo $_SESSION['hotelname'];?></li>                                       
					</ul><br />
					<!--//crumbs-->

<?php
			// echo	$_SESSION['bookingnumber']  .'<br />'	;
			// echo	$_SESSION['cmrid']   		.'<br />';
			// echo	$_SESSION['hotelname']   	.'<br />';
			// echo	$_SESSION['hotelid']   		.'<br />';
			// echo	date('Y m d', $_SESSION['check_in']).'<br />';
			// echo	date('Y m d', $_SESSION['check_out']).'<br />';
?>
					
					<!--top right navigation-->
					<ul class="top-right-nav">
						<li><a href="#" title="Back to results">Back to results</a></li>
						<li><a href="#" title="Change search">Change search</a></li>
					</ul>
					<!--//top right navigation-->
				</nav>
				<!--//breadcrumbs-->


	<?php
			$db= new Database();
			$fm= new Format();	
			$login = Session::get("custlogin");
		if ($login == true) {
	
			$query = "SELECT * FROM tbl_customer WHERE id = '$id' ";
			$customer = $db->select($query);
			if($customer){
				while($result = $customer->fetch_assoc()){
	?>	

				<!--three-fourth content-->
					<section class="three-fourth">
						<form id="booking" method="post" action="booking-step2.php?roomid=<?php echo $roomid;?>" class="booking">
							<fieldset>
								<h3><span>01 </span>Traveller info</h3>
								<div class="row twins">
									<div class="f-item">
										<label for="first_name">First name</label>
										<input type="text" value="<?php echo $result['fname']; ?>" id="first_name" name="first_name" required/>
									</div>
									<div class="f-item">
										<label for="last_name">Last name</label>
										<input type="text" value="<?php echo $result['lname']; ?>" id="last_name" name="last_name" required/>
									</div>
								</div>
								
								<div class="row twins">
									<div class="f-item">
										<label for="email">Email address</label>
										<input type="email" value="<?php echo $result['email']; ?>" id="email" name="email" required/>
									</div>
									<div class="f-item">
										<label for="confirm_email">Confirm email address</label>
										<input type="text" id="confirm_email" name="confirm_email" required/>
									</div>
									<span class="info">You will receive a confirmation email</span>
								</div>
								
								<div class="row twins">
									<div class="f-item">
										<label for="address">Street Address an Number</label>
										<input type="text" value="<?php echo $result['address']; ?>" id="address" name="address" required/>
									</div>
									<div class="f-item">
										<label for="city">Town / City</label>
										<input type="text" value="<?php echo $result['city']; ?>" id="city" name="city" required/>
									</div>
								</div>
								
								<div class="row twins">
									<div class="f-item">
										<label for="zip">ZIP Code</label>
										<input type="text" value="<?php echo $result['zip']; ?>" id="zip" name="zip" required/>
									</div>
									<div class="f-item">
										<label for="country">Country</label>
										<input type="text" value="<?php echo $result['country']; ?>" id="country" name="country" required/>
									</div>
								</div>
								<div class="row twins">
									<div class="f-item">
										<label for="phone">Phone</label>
										<input type="text" value="<?php echo $result['phone']; ?>" id="phone" name="phone" required/>
									</div>

								</div>
					

					<?php }}}else{ ?>


				<!--three-fourth content-->
					<section class="three-fourth">
						<form id="booking" method="post" action="booking-step2.php?roomid=<?php echo $roomid;?>" class="booking">
							<fieldset>
								<h3><span>01 </span>Traveller info</h3>
								<div class="row twins">
									<div class="f-item">
										<label for="first_name">First name</label>
										<input type="text" value="" id="first_name" name="first_name" required/>
									</div>
									<div class="f-item">
										<label for="last_name">Last name</label>
										<input type="text" value="" id="last_name" name="last_name" required/>
									</div>
								</div>
								
								<div class="row twins">
									<div class="f-item">
										<label for="email">Email address</label>
										<input type="email" value="" id="email" name="email" required/>
									</div>
									<div class="f-item">
										<label for="confirm_email">Confirm email address</label>
										<input type="text" id="confirm_email" name="confirm_email" required/>
									</div>
									<span class="info">You’ll receive a confirmation email</span>
								</div>
								
								<div class="row twins">
									<div class="f-item">
										<label for="address">Street Address an Number</label>
										<input type="text" value="" id="address" name="address" required/>
									</div>
									<div class="f-item">
										<label for="city">Town / City</label>
										<input type="text" value="" id="city" name="city" required/>
									</div>
								</div>
								
								<div class="row twins">
									<div class="f-item">
										<label for="zip">ZIP Code</label>
										<input type="text" value="" id="zip" name="zip" required/>
									</div>
									<div class="f-item">
										<label for="country">Country</label>
										<input type="text" value="" id="country" name="country" required/>
									</div>
								</div>
								<div class="row twins">
									<div class="f-item">
										<label for="phone">Phone</label>
										<input type="text" value="" id="phone" name="phone" required/>
									</div>

								</div>

						<?php } ?>


								<div class="row">
									<div class="f-item">
										<label>Special requirements: <span>(Not Guaranteed)</span></label>
										<textarea rows="10" cols="10" name="special"></textarea>
									</div>
									<span class="info">Please write your requests in English.</span>
								</div>
								<input type="submit" class="gradient-button" value="Proceed to next step" id="next-step" />
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
							<p><?php echo $_SESSION['datepicker_in'] = $_POST['datepicker_in'];?></p>
							<h6>Check-out Date</h6>
							<p><?php echo $_SESSION['datepicker_out'] = $_POST['datepicker_out'];?></p>
							<h6>Room(s)</h6>
							<p>1 night, 1 room, max. <?php echo $result['max'];?> people. </p>
						</div>
						<?php 
							$_SESSION['child_number'] = $_POST['child_number'];
							$_SESSION['adult_number'] = $_POST['adult_number'];
						?>
						<div class="price">
							<p class="total">Total Price:  $ <?php echo $_SESSION['tprice'] = 1.15*$result['price']*(($_SESSION['child_number']/2)+$_SESSION['adult_number']);?></p>
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