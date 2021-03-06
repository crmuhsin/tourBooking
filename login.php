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
	<title>RSM Tours</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen,projection,print" />
	<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" />
	<link rel="shortcut icon" href="images/favicon.ico" />
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/css3-mediaqueries.js"></script>
	<script type="text/javascript" src="js/sequence.jquery-min.js"></script>
	<script type="text/javascript" src="js/jquery.uniform.min.js"></script>
	<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
	<script type="text/javascript" src="js/sequence.js"></script>
	<script type="text/javascript" src="js/selectnav.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	<script type="text/javascript">	
		$(document).ready(function(){
			$(".form").hide();
			$(".form:first").show();
			$(".f-item:first").addClass("active");
			$(".f-item:first span").addClass("checked");
		});
	</script>
</head>
<body>
	
<?php include 'inc/header.php';?>
	
	
<?php include 'inc/slider.php';?>
	
	


	
	<!--main-->
	<div class="main" role="main">
		<div class="wrap clearfix">
			<!--latest offers-->
			
			<section class="offers clearfix full">
				<h1>Explore our latest offers</h1>
				
				<!--column-->
				<article class="one-fourth">
					<figure><a href="#" title=""><img src="images/uploads/img.jpg" alt="" width="270" height="152" /></a></figure>
					<div class="details">
						<h4>Winter beach escapes 30% off</h4>
						<a href="#" title="Explore our deals" class="gradient-button">Explore our deals</a>
					</div>
				</article>
				<!--//column-->
				
				<!--column-->
				<article class="one-fourth">
					<figure><a href="#" title=""><img src="images/uploads/img.jpg" alt="" width="270" height="152" /></a></figure>
					<div class="details">
						<h4>Spend New Year‘s Eve in Paris</h4>
						<a href="#" title="More info" class="gradient-button">More info</a>
					</div>
				</article>
				<!--//column-->
				
				<!--column-->
				<article class="one-fourth">
					<figure><a href="#" title=""><img src="images/uploads/img.jpg" alt="" width="270" height="152" /></a></figure>
					<div class="details">
						<h4>Skiing weekends in the Alpes</h4>
						<a href="#" title="Explore our deals" class="gradient-button">Explore our deals</a>
					</div>
				</article>
				<!--//column-->
				
				<!--column-->
				<article class="one-fourth last">
					<figure><a href="#" title=""><img src="images/uploads/img.jpg" alt="" width="270" height="152" /></a></figure>
					<div class="details">
						<h4>Our weekly top offer: Thailand</h4>
						<a href="#" title="More info" class="gradient-button">More info</a>
					</div>
				</article>
				<!--//column-->
			</section>
			<!--//latest offers-->
			
			<!--top destinations-->
			<section class="destinations clearfix full">
				<h1>Top destinations around the world</h1>
				
						
			<!--column-->
			<?php
			$db= new Database();
			$fm= new Format();
			$query = "select * from tbl_city";
			$city = $db->select($query);
			if($city){
				while($result = $city->fetch_assoc()){


			?>
				<article class="one-fourth">
					<figure><a href="location.php?id=<?php echo $result['id'];?>" title=""><img src="admin/<?php echo $result['banner'];?>" alt="" width="270" height="152" /></a></figure>
					<div class="details">
						<a href="location.php?id=<?php echo $result['id'];?>" title="View all" class="gradient-button">View all</a>
						<h5><a href="location.php?id=<?php echo $result['id'];?>"><?php echo $result['cityName'];?></a></h5>
						<span class="count">1529 Hotels</span>
						<div class="ribbon">
							<div class="half hotel">
								<a href="hotels.php" title="View all">
									<span class="small">from</span>
									<span class="price">&#36; 70</span>
								</a>
							</div>
							<div class="half flight">
								<a href="buses.php" title="View all">
									<span class="small">from</span>
									<span class="price">&#36; 150</span>
								</a>
							</div>
						</div>
					</div>
				</article>
				<!--//column-->
					<?php } ?>
					<?php } else {
				echo "<script>window.location='error.php';</script>";
					}?>

			</section>
			<!--//top destinations-->
			
			
			<!--info boxes-->
			<section class="boxes clearfix">
				<!--column-->
				<article class="one-fourth">
					<h2>Handpicked Hotels</h2>
					<p>All RSM Tours Hotels fulfil strict selection criteria. Each hotel is chosen individually and inclusion cannot be bought. </p>
				</article>
				<!--//column-->
				
				<!--column-->
				<article class="one-fourth">
					<h2>Detailed Descriptions</h2>
					<p>To give you an accurate impression of the hotel, we endeavor to publish transparent, balanced and precise hotel descriptions. </p>
				</article>
				<!--//column-->
				
				<!--column-->
				<article class="one-fourth">
					<h2>Exclusive Knowledge</h2>
					<p>We’ve done our research. Our scouts are always busy finding out more about our hotels, the surroundings and activities on offer nearby.</p>
				</article>
				<!--//column-->
				
				<!--column-->
				<article class="one-fourth last">
					<h2>Passionate Service</h2>
					<p>RSM Tourss’s team will cater to your special requests. We offer expert and passionate advice for finding the right hotel. </p>
				</article>
				<!--//column-->
				
				<!--column-->
				<article class="one-fourth">
					<h2>Best Price Guarantee</h2>
					<p>We offer the best hotels at the best prices. If you find the same room category on the same dates cheaper elsewhere, we will refund the difference. Guaranteed, and quickly. </p>
				</article>
				<!--//column-->
				
				<!--column-->
				<article class="one-fourth">
					<h2>Secure Booking</h2>
					<p>RSM Tours reservation system is secure and your credit card and personal information is encrypted.<br />We work to high standards and guarantee your privacy. </p>
				</article>
				<!--//column-->
				
				<!--column-->
				<article class="one-fourth">
					<h2>Benefits for Hoteliers</h2>
					<p>We provide a cost-effective model, a network of over 5000 partners and a personalised account management service to help you optimise your revenue.</p>
				</article>
				<!--//column-->
				
				<!--column-->
				<article class="one-fourth last">
					<h2>Any Questions?</h2>
					<p>Call us on <em>01521-204608</em> for individual, tailored advice for your perfect stay or <a href="contact.php" title="Contact">send us a message</a> with your hotel booking query.<br /><br /></p>
				</article>
				<!--//column-->
			</section>
			<!--//info boxes-->
		</div>
	</div>
	<!--//main-->
	
	
<?php include 'inc/footer.php';?>
		
	<div class="lightbox" style="display:block;">
		<div class="lb-wrap">
			<a href="#" class="close">x</a>
			<div class="lb-content">
<?php
$login = Session::get("custlogin");
if ($login == true) {
	echo "<script>window.location='index.php';</script>";
}
?>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) 
{
	    $email 		= mysqli_real_escape_string($db->link, $_POST['email']);
	    $pass 		= mysqli_real_escape_string($db->link, $_POST['pass']);
	    if (empty($email) || empty($pass)) {
			$msg = "<span class='error'>Fields must not be empty.<br></span>";
			echo $msg;
	    } 
	    // echo $email."<br>";
	    // 	    echo $pass."<br>";


		$maiquery = "SELECT * FROM tbl_customer WHERE email = '$email' AND pass ='$pass' ";
		$result= $db->select($maiquery);
		if ($result!=false) {
			$value = $result->fetch_assoc();
			Session::set("custlogin", true);
			Session::set("cmrId", $value['id']);
			Session::set("cmrEmail", $value['email']);

			echo "<script>window.location='index.php';</script>";
		}else{
			$msg = "<span class='error'>Email or password Not matched.<br></span>";
			echo $msg;
		}
	}

?>
				<form action="" method="post">
					<h1>Log in</h1>
					<div class="f-item">
						<label for="email">E-mail address</label>
						<input type="email" id="email" name="email" />
					</div>
					<div class="f-item">
						<label for="password">Password</label>
						<input type="password" id="password" name="pass" />
					</div>
					<div class="f-item checkbox">
						<input type="checkbox" id="remember_me" name="checkbox" />
						<label for="remember_me">Remember me next time</label>
					</div>
					<p><a href="#" title="Forgot password?">Forgot password?</a><br />
					Dont have an account yet? <a href="register.php" title="Sign up">Sign up.</a></p>
					<input type="submit" id="login" name="login" value="login" class="gradient-button"/>
				</form>
			</div>
		</div>
	</div>
	
	<script>
		// Initiate selectnav function
		selectnav();
	</script>

</body>
</html>