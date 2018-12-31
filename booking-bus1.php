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
						<form id="booking" method="post" action="booking-bus2.php?busid=<?php echo $busid;?>" class="booking">
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
						<form id="booking" method="post" action="booking-bus2.php?busid=<?php echo $busid;?>" class="booking">
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
							<p><?php echo $_SESSION['traveldate'] = $_POST['datepicker_in'];?></p>
							<h6>Travel Time</h6>
							<p>10:00 am</p>

						</div>
						<?php 
							$_SESSION['seats'] = $_POST['seats'];
						?>
						<div class="price">
							<p class="total">Total Price:  $ <?php echo $_SESSION['tprice'] = 1.15*$iresult['nonacfare']*$_SESSION['seats'];?></p>
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