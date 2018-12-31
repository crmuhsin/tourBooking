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
	<title>RSM Tours - My account</title>
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
	
<?php 
	include 'inc/header.php';

	if (!Session::get("cmrId") || Session::get("cmrId")==NULL){
		echo "<script>window.location='error.php';</script>";
	} else {
		$id = Session::get("cmrId");
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
						<li><a href="#" title="My Account">My Account</a></li>                                    
					</ul>
					<!--//crumbs-->
				
				</nav>
				<!--//breadcrumbs-->

				<!--three-fourth content-->
				<section class="three-fourth">
				
					<h1>My account</h1>
					
					<!--inner navigation-->
					<nav class="inner-nav">
						<ul>
							<li><a href="#MyBookings" title="My Bookings">My Bookings</a></li>
							<li><a href="#MyReviews" title="My Reviews">My Reviews</a></li>
							<li><a href="#MySettings" title="Settings">Settings</a></li>
						</ul>
					</nav>
					<!--//inner navigation-->

<!--My Bookings-->
<section id="MyBookings" class="tab-content">
	
			<?php 
				$query = "SELECT tbl_booking.*, (SELECT type FROM tbl_room WHERE tbl_room.id = tbl_booking.roomid) AS type, (SELECT title FROM tbl_hotel WHERE tbl_hotel.id = tbl_booking.hotelid) AS title FROM tbl_booking WHERE cmrid = $id";

				$book = $db->select($query);
				if($book){
					while($rresult = $book->fetch_assoc()){
			?>	
	<!--booking-->
	<article class="bookings">
		<h1><a href="#"><?php echo $rresult['title'];?></a></h1>
		<div class="b-info">
			<table>
				<tr>
					<th>Booking number</th>
					<td><?php echo $rresult['bookingnumber'];?></td>
				</tr>
				<tr>
					<th>Room</th>
					<td><?php echo $rresult['type'];?></td>
				</tr>
				<tr>
					<th>Check-in Date</th>
					<td><?php echo $rresult['checkin'];?></td>
				</tr>
				<tr>
					<th>Check-out Date</th>
					<td><?php echo $rresult['checkout'];?></td>
				</tr>
				<tr>
					<th>Total Price:</th>
					<td><strong>$ <?php echo $rresult['totalprice'];?></strong></td>
				</tr>
			</table>
		</div>
		
		<div class="actions">
			<a href="#" class="gradient-button">Change booking</a>
			<a href="#" class="gradient-button">Cancel booking</a>
			<a href="#" class="gradient-button">View confirmation</a>
			<a href="#" class="gradient-button">Print confirmation</a>
		</div>
	</article>
	<!--//booking-->
	<?php } } else{?>
	<article class="bookings">
		<h1><?php echo "No Booking Yet."; ?></h1>
	</article>
	<?php } ?>
</section>
<!--//My Bookings-->
					
					
<!--MyReviews-->
<section id="MyReviews" class="tab-content">
<?php
$query= "SELECT id, (SELECT title FROM tbl_hotel WHERE tbl_review.hotelid=tbl_hotel.id) AS hotelname, rating, pros, con FROM tbl_review WHERE tbl_review.cmrid=$id";
$post= $db->select($query);
if ($post) {
	while ($presult = $post->fetch_assoc()) {
?>	
	<article class="myreviews">
		<h1>Your review of <?php echo $presult['hotelname'];?></h1>
		<div class="score">
			<span class="achieved"><?php echo $presult['rating'];?> </span>
			<span> / 10</span>
		</div>
		<div class="reviews">
			<div class="pro"><p><?php echo $presult['pros'];?></p></div>
			<div class="con"><p><?php echo $presult['con'];?></p></div>
		</div>
	</article>
	<?php } } else{?>
	<article class="myreviews">
		<h1><?php echo "No Booking Yet."; ?></h1>
	</article>
	<?php } ?></section>
<!--//MyReviews-->

<!--MySettings-->

<script>

function callCrudAction(action,id) {
	var queryString;
	switch(action) {
		case "save_fname":
			queryString = 'action='+action+'&id='+id+'&new_fname='+ $("#new_fname").val();
		break;
		case "save_lname":
			queryString = 'action='+action+'&id='+id+'&new_lname='+ $("#new_lname").val();
		break;
		case "save_email":
			queryString = 'action='+action+'&id='+id+'&new_email='+ $("#new_email").val();
		break;
		case "save_pass":
			queryString = 'action='+action+'&id='+id+'&new_pass='+ $("#new_pass").val();
		break;
		case "save_address":
			queryString = 'action='+action+'&id='+id+'&new_address='+ $("#new_address").val();
		break;
		case "save_city":
			queryString = 'action='+action+'&id='+id+'&new_city='+ $("#new_city").val();
		break;
		case "save_country":
			queryString = 'action='+action+'&id='+id+'&new_country='+ $("#new_country").val();
		break;
		case "save_zip":
			queryString = 'action='+action+'&id='+id+'&new_zip='+ $("#new_zip").val();
		break;
		case "save_phone":
			queryString = 'action='+action+'&id='+id+'&new_phone='+ $("#new_phone").val();
		break;
	}	 
	jQuery.ajax({
	url: "my_account_edit.php",
	data: queryString,
	type: "POST",
	success:function(data){
		switch(action) {
			case "save_fname":
				$("#fname").html(data);
			break;
			case "save_lname":
				$("#lname").html(data);
			break;
			case "save_email":
				$("#email").html(data);
			break;
			case "save_pass":
				$("#pass").html(data);
			break;
			case "save_address":
				$("#address").html(data);
			break;
			case "save_city":
				$("#city").html(data);
			break;
			case "save_zip":
				$("#zip").html(data);
			break;
			case "save_country":
				$("#country").html(data);
			break;
			case "save_phone":
				$("#phone").html(data);
			break;
		}
	},
	error:function (){}
	});
}
</script>
					
<section id="MySettings" class="tab-content">
<article class="mysettings">
	<h1>Personal details</h1>
	<table>
		<?php
		$db= new Database();
		$fm= new Format();	

		$query = "SELECT * FROM tbl_customer WHERE id = '$id' ";
		$customer = $db->select($query);
		if($customer){
			while($result = $customer->fetch_assoc()){	?>	

		<tr>
			<th>First name:</th>
			<td >
				
				<!--edit fields-->
				<label id="fname"><?php echo $result['fname']; ?></label>
				<div class="edit_field" id="field1">
					<label for="new_fname">Your new first name:</label>
					<input type="text" name="new_fname" id="new_fname"/>


					<input type="submit" value="save" class="gradient-button" id="submit1" onClick="callCrudAction('save_fname','<?php echo $result['id']; ?>')"/>

					<a href="#">Cancel</a>
				</div>
				<!--//edit fields-->
			</td>
			<td><a href="#field1" class="gradient-button edit">Edit</a></td>
		</tr>
		<tr>
			<th>Last name:</th>
			<td>
				<!--edit fields-->
				<label id="lname"><?php echo $result['lname']; ?></label>
				<div class="edit_field" id="field2">
					<label for="new_lname">Your new last name:</label>
					<input type="text" id="new_lname"/>
					<input type="submit" value="save" class="gradient-button" id="submit2" onClick="callCrudAction('save_lname','<?php echo $result['id']; ?>')"/>
					<a href="#">Cancel</a>
				</div>
				<!--//edit fields-->
			</td>
			<td><a href="#field2" class="gradient-button edit">Edit</a></td>
		</tr>
		<tr>
			<th>E-mail address: </th>
			<td>
				<!--edit fields-->
				<label id="email"><?php echo $result['email']; ?></label>
				<div class="edit_field" id="field3">
					<label for="new_email">Your new email:</label>
					<input type="text" id="new_email"/>
					<input type="submit" value="save" class="gradient-button" id="submit3" onClick="callCrudAction('save_email','<?php echo $result['id']; ?>')"/>
					<a href="#">Cancel</a>
				</div>
				<!--//edit fields-->
			</td>
			<td><a href="#field3" class="gradient-button edit">Edit</a></td>
		</tr>
		<tr>
			<th>Password: </th>
			<td>
				<!--edit fields-->
				<label id="pass"><?php echo $result['pass']; ?></label>
				<div class="edit_field" id="field4">
					<label for="new_pass">Your new password:</label>
					<input type="password" id="new_pass"/>
					<input type="submit" value="save" class="gradient-button" id="submit4" onClick="callCrudAction('save_pass','<?php echo $result['id']; ?>')"/>
					<a href="#">Cancel</a>
				</div>
				<!--//edit fields-->
			</td>
			<td><a href="#field4" class="gradient-button edit">Edit</a></td>
		</tr>
		<tr>
			<th>Street Address and number:</th>
			<td>
				<!--edit fields-->
				<label id="address"><?php echo $result['address']; ?></label>
				<div class="edit_field" id="field5">
					<label for="new_address">Your new address:</label>
					<input type="text" id="new_address"/>
					<input type="submit" value="save" class="gradient-button" id="submit5" onClick="callCrudAction('save_address','<?php echo $result['id']; ?>')"/>
					<a href="#">Cancel</a>
				</div>
				<!--//edit fields-->
			</td>
			<td><a href="#field5" class="gradient-button edit">Edit</a></td>
		</tr>
		
		<tr>
			<th>Town / City: </th>
			<td>
				<!--edit fields-->
				<label id="city"><?php echo $result['city']; ?></label>
				<div class="edit_field" id="field6">
					<label for="new_city">Your new city:</label>
					<input type="text" id="new_city"/>
					<input type="submit" value="save" class="gradient-button" id="submit6" onClick="callCrudAction('save_city','<?php echo $result['id']; ?>')"/>
					<a href="#">Cancel</a>
				</div>
				<!--//edit fields-->
			</td>
			<td><a href="#field6" class="gradient-button edit">Edit</a></td>
		</tr>
		
		<tr>
			<th>ZIP code:</th>
			<td>
				<!--edit fields-->
				<label id="zip"><?php echo $result['zip']; ?></label>
				<div class="edit_field" id="field7">
					<label for="new_zip">Your new ZIP code:</label>
					<input type="text" id="new_zip"/>
					<input type="submit" value="save" class="gradient-button" id="submit7" onClick="callCrudAction('save_zip','<?php echo $result['id']; ?>')"/>
					<a href="#">Cancel</a>
				</div>
				<!--//edit fields-->
			</td>
			<td><a href="#field7" class="gradient-button edit">Edit</a></td>
		</tr>
		
		<tr>
			<th>Country:</th>
			<td>
				<!--edit fields-->
				<label id="country"><?php echo $result['country']; ?></label>
				<div class="edit_field" id="field8">
					<label for="new_country">Your new country:</label>
					<input type="text" id="new_country"/>
					<input type="submit" value="save" class="gradient-button" id="submit8" onClick="callCrudAction('save_country','<?php echo $result['id']; ?>')"/>
					<a href="#">Cancel</a>
				</div>
				<!--//edit fields-->
			</td>
			<td><a href="#field8" class="gradient-button edit">Edit</a></td>
		</tr>
		<tr>
			<th>Phone:</th>
			<td>
				<!--edit fields-->
				<label id="phone"><?php echo $result['phone']; ?></label>
				<div class="edit_field" id="field9">
					<label for="new_phone">Your new phone:</label>
					<input type="text" id="new_phone"/>
					<input type="submit" value="save" class="gradient-button" id="submit9" onClick="callCrudAction('save_phone','<?php echo $result['id']; ?>')"/>
					<a href="#">Cancel</a>
				</div>
				<!--//edit fields-->
			</td>
			<td><a href="#field9" class="gradient-button edit">Edit</a></td>
		</tr>
			<?php } }?>

	</table>

</article>
</section>
<!--//MySettings-->
					
				</section>
				<!--//three-fourth content-->
				
				<!--sidebar-->
				<aside class="right-sidebar">

					<!--Need Help Booking?-->
					<article class="default clearfix">
						<h2>Need Help Booking?</h2>
						<p>Call our customer services team on the number below to speak to one of our advisors who will help you with all of your holiday needs.</p>
						<p class="number">01521-204608</p>
					</article>
					<!--//Need Help Booking?-->
					
					<!--Why Book with us?-->
					<article class="default clearfix">
						<h2>Why Book with us?</h2>
						<h3>Low rates</h3>
						<p>Get the best rates, or get a refund.<br />No booking fees. Save money!</p>
						<h3>Largest Selection</h3>
						<p>140,000+ hotels worldwide<br />130+ airlines<br />Over 3 million guest reviews</p>
						<h3>We’re Always Here</h3>
						<p>Call or email us, anytime<br />Get 24-hour support before, during, and after your trip</p>
					</article>
					<!--//Why Book with us?-->
					
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