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
	<title>RSM Tours - Bus</title>
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



<?php 
	if (!isset($_GET['id']) || $_GET['id']==NULL){
		header("Location:error.php");
	} else {
		$id = $_GET['id'];
	}

?>
	
	
	<!--main-->
	<div class="main" role="main">		
		<div class="wrap clearfix">
			<!--main content-->
			<div class="content clearfix">


<!--three-fourth content-->
<section class="three-fourth">

<!--Flights-->
<section id="flights" class="full">
	<div class="deals">
			<?php
				$squery= "SELECT *, (SELECT cityName FROM tbl_city WHERE tbl_bus.destination=tbl_city.id) AS destination, (SELECT cityName FROM tbl_city WHERE tbl_bus.leavingfrom=tbl_city.id) AS leavingfrom FROM tbl_bus WHERE id =$id";
				$cpost= $db->select($squery);
				if ($cpost) {
				    while ($iresult = $cpost->fetch_assoc()) {
			?>
		<!--deal-->


		<article class="full-width">
			<figure><a href="#" title=""><img src="admin/<?php echo $iresult['image'] ; ?>" alt="" width="270" height="304" /></a></figure>
			<div class="details">
				<h1><?php echo $iresult['companyName'];?></h1>
				<span class="price">Price per person <em>$ <?php echo $iresult['nonacfare'];?></em> </span>
				<br>
				<div class="description">
					<p>From <?php echo $iresult['leavingfrom'];?> To <?php echo $iresult['destination'];?><p><a href="#">More info</a></p></p>
				</div>


				<form action="booking-bus1.php?busid=<?php echo $iresult['id'];?>" method="post" >

					
					<div class="column" style="min-height: 60px;">
						<div class="f-item datepicker">
							<label>Travel Date</label>
							<div class="datepicker-wrap"><input type="text" placeholder="" id="datepicker_in" name="datepicker_in" /></div>
						</div>
					</div>

					<h6>.</h6>
					<div class="column">
						<div class="f-item datepicker">
							<label>Number of seats</label>
							<input type="number" name="seats" id="seats_<?php echo $iresult['id'];?>" style="width:140px" value="0" min="0" max="10" onchange="myFunction()" />
							<input type="hidden" name="s_price" id="s_price_<?php echo $iresult['id'];?>" value="<?php echo $iresult['nonacfare'];?>" />
						</div>
					</div>
					<h1>.</h1>
<script> 
function myFunction() {
    var sQty = document.getElementById("seats_<?php echo $iresult['id'];?>").value;

	var sPrice=document.getElementById("s_price_<?php echo $iresult['id'];?>").value;

    var sTotal =  sQty * sPrice;               

    var Total =  parseFloat(sTotal);               
    var vTotal =  (Total * 1.15).toFixed(2);             

    document.getElementById("grandtotal_<?php echo $iresult['id'];?>").innerHTML = Total;
    document.getElementById("grandvtotal_<?php echo $iresult['id'];?>").innerHTML = vTotal;

}

</script>
					<div class="column">
						<div class="f-item datepicker">
							Total Price(Without VAT): $ <span id="grandtotal_<?php echo $iresult['id'];?>">0.00</span>
						</div>
					</div>

					<div class="column">
						<div class="f-item datepicker">
							Total Price(With VAT): $ <span id="grandvtotal_<?php echo $iresult['id'];?>">0.00</span>
						</div>
					</div>

						<input type="submit" class="gradient-button" title="Book" value="Book">
			</form>


			</div>
		</article>
		<!--//deal-->
		<?php } } ?>
		
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
				<span><a href="#">&gt;</a></span>
				<span><a href="#">Last page</a></span>
			</div>
			<!--//pager-->
		</div>
		<!--//bottom navigation-->
	</div>
</section>
<!--//Flights-->
	
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