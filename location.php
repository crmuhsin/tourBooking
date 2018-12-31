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
	<title>RSM Tours - Location</title>
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

<?php
$db= new Database();
$fm= new Format();
$query = "SELECT * FROM `tbl_city` WHERE `id` = $id";
$city = $db->select($query);
if($city){
while($result = $city->fetch_assoc()){

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
	<li><a href="#" title="Travel guides">Travel guides</a></li>
	<li><?php echo $result['cityName'];?></li>                                       
</ul>
<!--//crumbs-->

</nav>
<!--//breadcrumbs-->

<!--three-fourth content-->
<section class="three-fourth">

<h1><?php echo $result['cityName'];?></h1>

<!--inner navigation-->
<nav class="inner-nav">
	<ul>
		<li><a href="#general_info" title="General information">General Information</a></li>
		<li><a href="#sports_and_nature" title="Sports and nature">Understand</a></li>
		<li><a href="#nightlife" title="Nightlife">Get In</a></li>
		<li><a href="#culture" title="Culture and history">Get Around</a></li>
		
		<li><a href="#hotels" title="Hotels">Hotels</a></li>
		<li><a href="#flights" title="Buses">Buses</a></li>
		<li><a href="#flight_and_hotel" title="Flight + Hotel">Flight + Hotel</a></li>
		<li><a href="#self_catering" title="Self-catering">Self-catering</a></li>
		<li><a href="#cruise" title="Cruise">Cruise</a></li>
		<li><a href="#car_rental" title="Car rental">Car rental</a></li>
	</ul>
</nav>
<!--//inner navigation-->

<!--General information-->
<section id="general_info" class="tab-content">
	<article>
		<h1><?php echo $result['cityName'];?></h1>
		<figure class="left_pic"><img src="admin/<?php echo $result['banner'];?>" alt="Things to do - London general" /></figure>
		<?php echo $result['description'];?>
	
		<table>

			<tr>
				<th>Country</th>
				<td>Bangladesh</td>
			</tr>
			<tr>
				<th>Division</th>
				<td><?php echo $result['division'];?></td>
			</tr>
			<tr>
				<th>Area</th>
				<td><?php echo $result['area'];?> sq km</td>
			</tr>
			<tr>
				<th>Time zone</th>
				<td>GMT (UTC+6)</td>
			</tr>
			<tr>
				<th>Languages spoken</th>
				<td>বাংলা</td>
			</tr>
			<tr>
				<th>Currency</th>
				<td>Taka</td>
			</tr>
			<tr>
				<th>Visa requirements</th>
				<td>No Visa needed</td>
			</tr>
		</table>
	</article>
</section>
<!--//General information-->

<!--Sports and nature-->
<section id="sports_and_nature" class="tab-content">
	<article>
		<h1>Understand</h1>
		<figure class="left_pic"><img src="admin/<?php echo $result['banner'];?>" alt="Things to do - London Sports and nature" /></figure>
		<?php echo $result['understand'];?>
	</article>
</section>
<!--//Sports and nature-->

<!--Nightlife-->
<section id="nightlife" class="tab-content">
	<article>
		<h1>Nightlife</h1>
		<figure class="left_pic"><img src="admin/<?php echo $result['banner'];?>" alt="Things to do - London Nightlife" /></figure>
		<?php echo $result['getin'];?>
	</article>
</section>
<!--//Nightlife-->

<!--Culture and history-->
<section id="culture" class="tab-content">
	<article>
		<h1>Culture and history</h1>
		<figure class="left_pic"><img src="admin/<?php echo $result['banner'];?>" alt="Things to do - London general" /></figure>
		<?php echo $result['getaround'];?>
	</article>
</section>
<!--//Culture and history-->

<!--Hotels-->
<section id="hotels" class="tab-content">
	<div class="deals">
		<!--deal-->
		<?php
		$db= new Database();
		$fm= new Format();
		$query = "SELECT tbl_hotel.*, tbl_hotel.id AS hid, tbl_city.id AS cid FROM tbl_hotel 
			INNER JOIN tbl_city 
			ON tbl_hotel.cityId = tbl_city.id 
			WHERE tbl_city.id = $id
			ORDER By rand() DESC ";
		$post = $db->select($query);
		if($post){
			while($result = $post->fetch_assoc()){
					$GLOBALS['cityId']=$result['cityId'];

		?>
		<article class="full-width">			
			
			<figure><a href="hotel.php?id=<?php echo $result['hid'];?>" title=""><img src="admin/<?php echo $result['image1'];?>" alt="" width="270" height="152" /></a></figure>
			<div class="details">
				<h1><a href="hotel.php?id=<?php echo $result['hid'];?>"><?php echo $result['title'];?></a>
					<span class="stars">
						<img src="images/ico/star.png" alt="" />
						<img src="images/ico/star.png" alt="" />
						<img src="images/ico/star.png" alt="" />
						<img src="images/ico/star.png" alt="" />
					</span>
				</h1>
				<span class="address"><?php echo $result['location'];?></span>
				<span class="rating"> <?php echo $result['userrating'];?> /10</span>
				<span class="price">Price per room per night from  <em>$ 50</em> </span>
				<div class="description">
					<p><?php echo $fm->textshorten($result['body'], 210); ?><a href="hotel.php?id=<?php echo $result['hid'];?>">More info</a></p>
				</div>
				<a href="hotel.php?id=<?php echo $result['hid'];?>" title="Book now" class="gradient-button">Book now</a>
			</div>
		</article>
					<?php } ?>
					<?php } else {
				echo "No Hotel Available.";
					}?>
		<!--//deal-->
		
		
		<!--bottom navigation-->
		<div class="bottom-nav">
			<!--back up button-->
			<a href="#" class="scroll-to-top" title="Scroll to Top">Scroll to Top</a> 
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
<!--//Hotels-->

<!--Flights-->
<section id="flights" class="tab-content">
	<div class="deals">
			<?php
				$squery= "SELECT id, destination, (SELECT cityName FROM tbl_city WHERE tbl_city.id=tbl_bus.destination) AS descity, leavingfrom, (SELECT cityName FROM tbl_city WHERE tbl_city.id=tbl_bus.leavingfrom) AS levcity, companyName, dep_date,image, time, acfare, nonacfare FROM tbl_bus WHERE tbl_bus.leavingfrom=$id";
				$cpost= $db->select($squery);
				if ($cpost) {
				    while ($iresult = $cpost->fetch_assoc()) {
			?>

		<!--deal-->
		<article class="full-width">
			<figure><a href="bus.php?id=<?php echo $iresult['id'] ; ?>" title=""><img src="admin/<?php echo $iresult['image'] ; ?>" alt="" width="270" height="152" /></a></figure>
			<div class="details">
				<h1><?php echo $iresult['companyName'] ; ?></h1>
				<span class="price">
					<p>AC Fare<em>$<?php echo $iresult['acfare'] ; ?></em></p> 
					<p>Non AC Fare<em>$<?php echo $iresult['nonacfare'] ; ?></em> </p>
				</span>
				<div class="description">
					<p>Every Monday, Wednesday and Saturday <a href="bus.php?id=<?php echo $iresult['id'] ; ?>">More info</a></p>
				</div>
				<a href="booking-step1.php" title="Book now" class="gradient-button">Book now</a>
			</div>
		</article>
		<!--//deal-->
		<?php }}else{?>
				<article class="full-width">
					<h1>    No Bus Available From This City.</h1>
				</article>
				<?php } ?>
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

<!--Package-->
<section id="flight_and_hotel" class="tab-content">
	<div class="deals">
		<!--deal-->
		<article class="full-width">
			<figure><a href="hotel.php" title=""><img src="images/uploads/img.jpg" alt="" width="270" height="152" /></a></figure>
			<div class="details">
				<h1>Best ipsum hotel 
					<span class="stars">
						<img src="images/ico/star.png" alt="" />
						<img src="images/ico/star.png" alt="" />
						<img src="images/ico/star.png" alt="" />
						<img src="images/ico/star.png" alt="" />
					</span>
				</h1>
				<span class="address">London  •  <a href="#">Show on map</a></span>
				<span class="rating"> 8 /10</span>
				<span class="price">Price per person from  <em>$ 500</em> </span>
				<div class="description">
					<p>4 Nights, Self Catering from London Southend with EasyJet Airlines<br />on 25th January 2013 <a href="hotel.php">More info</a></p>
				</div>
				<a href="hotel.php" title="Book now" class="gradient-button">Book now</a>
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
				<span><a href="#">&gt;</a></span>
				<span><a href="#">Last page</a></span>
			</div>
			<!--//pager-->
		</div>
		<!--//bottom navigation-->
	</div>
</section>
<!--//Flight+Hotel-->

<!--Self Catering-->
<section id="self_catering" class="tab-content">
	<div class="deals">
		<!--deal-->
		<article class="full-width">
			<figure><a href="hotel.php" title=""><img src="images/uploads/img.jpg" alt="" width="270" height="152" /></a></figure>
			<div class="details">
				<h1>Prime Apartment 
					<span class="stars">
						<img src="images/ico/star.png" alt="" />
						<img src="images/ico/star.png" alt="" />
						<img src="images/ico/star.png" alt="" />
						<img src="images/ico/star.png" alt="" />
					</span>
				</h1>
				<span class="address">London  •  <a href="#">Show on map</a></span>
				<span class="rating"> 8 /10</span>
				<span class="price">Price per room per night from  <em>$ 50</em> </span>
				<div class="description">
					<p>Overlooking the Aqueduct and Nature Park, Lorem Ipsum Hotel is situated 5 minutes’ walk from London’s Zoological Gardens and a metro station. <a href="hotel.php">More info</a></p>
				</div>
				<a href="hotel.php" title="Book now" class="gradient-button">Book now</a>
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
				<span><a href="#">&gt;</a></span>
				<span><a href="#">Last page</a></span>
			</div>
			<!--//pager-->
		</div>
		<!--//bottom navigation-->
	</div>
</section>
<!--//Self Catering-->

<!--Cruise-->
<section id="cruise" class="tab-content">
	<div class="deals">
		<!--deal-->
		<article class="full-width">
			<figure><a href="#" title=""><img src="images/uploads/img.jpg" alt="" width="270" height="152" /></a></figure>
			<div class="details">
				<h1>Royal Caribbean
					<span class="stars">
						<img src="images/ico/star.png" alt="" />
						<img src="images/ico/star.png" alt="" />
						<img src="images/ico/star.png" alt="" />
						<img src="images/ico/star.png" alt="" />
					</span>
				</h1>
				<span class="address">London  •  <a href="#">Show on map</a></span>
				<span class="rating"> 8 /10</span>
				<span class="price">Price per person from  <em>$ 500</em> </span>
				<div class="description">
					<p>San Juan, Charlotte Amalie, Philipsburg, Castries, Basseterre, Ponta Delgada, Southampton<br /><a href="hotel.php">More info</a><br />&nbsp;<br /></p>
				</div>
				<a href="hotel.php" title="Book now" class="gradient-button">Book now</a>
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
				<span><a href="#">&gt;</a></span>
				<span><a href="#">Last page</a></span>
			</div>
			<!--//pager-->
		</div>
		<!--//bottom navigation-->
	</div>
</section>
<!--//Cruise-->

<!--Car rental-->
<section id="car_rental" class="tab-content">
	<div class="deals">
		<!--deal-->
		<article class="full-width">
			<figure><a href="#" title=""><img src="images/uploads/img.jpg" alt="" width="270" height="152" /></a></figure>
			<div class="details">
				<h1>Mini</h1>
				<span class="price">Price per day from  <em>$ 50</em> </span>
				<div class="description">
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. <a href="hotel.php">More info</a></p>
				</div>
				<a href="hotel.php" title="Book now" class="gradient-button">Book now</a>
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
				<span><a href="#">&gt;</a></span>
				<span><a href="#">Last page</a></span>
			</div>
			<!--//pager-->
		</div>
		<!--//bottom navigation-->
	</div>
</section>
<!--//Car rental-->

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

<!--Popular hotels in the area-->
<article class="default clearfix">
	<h2>Popular hotels in the area</h2>
	<?php
		$querypopular = "SELECT * FROM tbl_hotel WHERE cityId = '$cityId' order by rand() limit 4";
		$popularhotel = $db->select($querypopular);
		if($popularhotel){
		while($rresult = $popularhotel->fetch_assoc()){
	?>	

	<ul class="popular-hotels">
		<li>
			<a href="#">
				<h3><a href="hotel.php?id=<?php echo $rresult['id'];?>"><?php echo $rresult['title'];?></a>
					<span class="stars">
						<img src="images/ico/star.png" alt="" />
						<img src="images/ico/star.png" alt="" />
						<img src="images/ico/star.png" alt="" />
						<img src="images/ico/star.png" alt="" />
					</span>
				</h3>
				<p>From <span class="price">$ 100 <small>/ per night</small></span></p>
				<span class="rating"> <?php echo $rresult['userrating'];?> /10</span>
			</a>
		</li>
	</ul>
	<?php } } else { echo "No popular hotel available.";}?>
	
	<a href="#" title="Show all" class="show-all">Show all</a>	
</article>
<!--//Popular hotels in the area-->

<!--Deal of the day-->
<article class="default clearfix">
	<h2>Deal of the day</h2>
	<div class="deal-of-the-day">
		<?php
		$querydeal = "SELECT * FROM tbl_hotel WHERE cityId = '$cityId' order by rand() limit 1";
		$dealhotel = $db->select($querydeal);
		if($dealhotel){
		while($deal = $dealhotel->fetch_assoc()){
			?>
		<a href="hotel.php?id=<?php echo $deal['id'];?>">
			<figure><img src="admin/<?php echo $deal['image1'];?>" alt="" width="230" height="130" /></figure>
			<h3><?php echo $deal['title'];?>
				<span class="stars">
					<img src="images/ico/star.png" alt="" />
					<img src="images/ico/star.png" alt="" />
					<img src="images/ico/star.png" alt="" />
					<img src="images/ico/star.png" alt="" />
				</span>
			</h3>
			<p>From <span class="price">$ 100 <small>/ per night</small></span></p>
			<span class="rating"> <?php echo $deal['userrating'];?> /10</span>
		</a>
		
	</div>
</article>
<!--//Deal of the day-->
<?php } } else { echo "No Deal.";}
?>

</div>
<!--//main content-->
</div>
</div>
<!--//main-->
	<?php } ?>
					<?php } else {
				echo "<script>window.location='error.php';</script>";
					}?>
	
<?php include 'inc/footer.php';?>
	
	<script>
		// Initiate selectnav function
		selectnav();
	</script>
</body>
</html>