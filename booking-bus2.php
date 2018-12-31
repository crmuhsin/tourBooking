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
	
<?php

   $_SESSION['first_name']= $first_name = mysqli_real_escape_string($db->link, $_POST['first_name']);
   $_SESSION['last_name']=    $last_name = mysqli_real_escape_string($db->link, $_POST['last_name']);
   $_SESSION['email']=    $email = mysqli_real_escape_string($db->link, $_POST['email']);
    $confirm_email = mysqli_real_escape_string($db->link, $_POST['confirm_email']);
   $_SESSION['address']=    $address = mysqli_real_escape_string($db->link, $_POST['address']);
   $_SESSION['city']=    $city = mysqli_real_escape_string($db->link, $_POST['city']);
   $_SESSION['zip']=    $zip= mysqli_real_escape_string($db->link, $_POST['zip']);
   $_SESSION['country']=    $country= mysqli_real_escape_string($db->link, $_POST['country']);
   $_SESSION['phone']=    $phone= mysqli_real_escape_string($db->link, $_POST['phone']);
   $_SESSION['special']=    mysqli_real_escape_string($db->link, $_POST['special']);
?>	

<?php

	$bookingnumber = session_id();
	$traveldate = $_SESSION['traveldate'];
    $price = $_SESSION['tprice'];

    $query = "INSERT INTO tbl_booking_bus(bookingnumber, cmrid, busid, traveldate, price) VALUES('$bookingnumber', '$id', '$busid', STR_TO_DATE('$traveldate', '%m/%d/%Y'), '$price')";
    $inserted_rows = $db->insert($query);
    if ($inserted_rows) {
     echo "<span class='success'>Data Inserted Successfully.</span>";
        }else {
         echo "<span class='error'>Data Not Inserted !</span>";
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
						<form id="booking" method="post" action="booking-bus3.php?busid=<?php echo $_GET['busid'];?>" class="booking">
							<fieldset>
								<h3><span>02 </span>Payment</h3>
								<div class="row twins">
									<div class="f-item">
										<label>Card type</label>
										<select required>
											<option>Select card type</option>
											<option selected="selected">Mastercard</option>
											<option>Visa</option>
											<option>American Express</option>
										</select>
									</div>
									<div class="f-item">
										<label for="card_number">Card number</label>
										<input type="number" id="card_number" name="card_number" value="9" required/>
									</div>
								</div>
								
								<div class="row triplets">
									<div class="f-item">
										<label for="card_holder">Name on card</label>
										<input type="text" id="card_holder" name="card_holder" value="<?php echo $_SESSION['first_name'];?>" required/>
									</div>
									<div class="f-item datepicker">
										<label for="expiration_date">Expiration Date </label>
										<div class="datepicker-wrap"><input type="text" id="expiration_date" name="expiration_date" value="<?php echo $_SESSION['traveldate'];?>" required/></div>
									</div>

								</div>

								<div class="row">
									<div class="f-item checkbox">
										<input type="checkbox" name="check" id="check" value="ch1" />
										<label>Yes, I have read and I agree to the <a href="#">booking conditions</a>.</label>
									</div>
								</div>
								<hr />
								<input type="submit" class="gradient-button" value="Submit booking" id="next-step" />
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