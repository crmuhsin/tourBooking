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
	<title>RSM Tours - Package</title>
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
			$("#form5").show();
			$(".f-item:nth-child(6)").addClass("active");
			$(".f-item:nth-child(6) span").addClass("checked");
		});	
	</script>
</head>
<body>
	
<?php include 'inc/header.php';?>
	
	
<?php include 'inc/slider.php';?>

	<!--<div class="main" role="main">-->		
		<div  class="main" >
		<div class="wrap clearfix">

		<!-- Winter Packages -->	

			<section class="full">
				<h1>Our Packages in Winter</h1>
				<div class="deals clearfix">

				
					<?php
					$squery="SELECT tbl_package.hotelId, tbl_package.Packprice, tbl_package.Packid, tbl_package.season, tbl_hotel.title, tbl_city.cityName
					FROM tbl_package
					INNER JOIN tbl_hotel
					ON tbl_hotel.id=tbl_package.hotelId
					INNER JOIN tbl_city
					ON tbl_city.id=tbl_package.cityId
					WHERE tbl_package.season = 'Winter'";
					$cpost= $db->select($squery);
					if ($cpost) {
					    while ($iresult = $cpost->fetch_assoc()) {
				?>

					<article class="one-fourth">
						<figure><a href="package.php?id=<?php echo $iresult['Packid'];?>" title=""><img src="images/uploads/img.jpg" alt="" width="270" height="152" /></a></figure>
						<div class="details">
							<h1><?php echo $iresult['season']." in ".$iresult['title']?> 
								<span class="stars">
									<img src="images/ico/star.png" alt="" />
									<img src="images/ico/star.png" alt="" />
									<img src="images/ico/star.png" alt="" />
									<img src="images/ico/star.png" alt="" />
								</span>
							</h1>
							<span class="address"><?php echo $iresult['cityName'];?>  •  <a href="#">Show on map</a></span>
							<span class="rating"> 8 /10</span>
							<span class="price">Price<em><?php echo "$". $iresult['Packprice']; ?></em> </span>
							<div class="description">
								<p>4 Nights, Self Catering in <?php echo $iresult['cityName'];?><br />on 15th March 2017 <a href="hotel.php">More info</a></p>
							</div>
							<a href="package.php?id=<?php echo $iresult['Packid'];?>" title="Book now" class="gradient-button">Book now</a>

						</div>
					</article>

					<?php } }?>
				</div>
			</section>
		<!-- Winter Packages -->	

		<!-- Summer Packages -->	
			<section class="full">
				<h1>Our Packages in Summer</h1>
				<div class="deals clearfix">

				
					<?php
					$squery="SELECT tbl_package.hotelId, tbl_package.Packprice, tbl_package.Packid, tbl_package.season, tbl_hotel.title, tbl_city.cityName
					FROM tbl_package
					INNER JOIN tbl_hotel
					ON tbl_hotel.id=tbl_package.hotelId
					INNER JOIN tbl_city
					ON tbl_city.id=tbl_package.cityId
					WHERE tbl_package.season = 'Summer'";
					$cpost= $db->select($squery);
					if ($cpost) {
					    while ($iresult = $cpost->fetch_assoc()) {
				?>

					<article class="one-fourth">
						<figure><a href="hotel.php" title=""><img src="images/uploads/img.jpg" alt="" width="270" height="152" /></a></figure>
						<div class="details">
							<h1><?php echo $iresult['season']." in ".$iresult['title']?> 
								<span class="stars">
									<img src="images/ico/star.png" alt="" />
									<img src="images/ico/star.png" alt="" />
									<img src="images/ico/star.png" alt="" />
									<img src="images/ico/star.png" alt="" />
								</span>
							</h1>
							<span class="address"><?php echo $iresult['cityName'];?>  •  <a href="#">Show on map</a></span>
							<span class="rating"> 8 /10</span>
							<span class="price">Price<em><?php echo "$". $iresult['Packprice']; ?></em> </span>
							<div class="description">
								<p>4 Nights, Self Catering in <?php echo $iresult['cityName'];?><br />on 15th March 2017 <a href="hotel.php">More info</a></p>
							</div>
							<a href="package.php?id=<?php echo $iresult['Packid'];?>" title="Book now" class="gradient-button">Book now</a>

						</div>
					</article>

					<?php } }?>
				</div>
			</section>
		<!-- Summer Packages -->	


			
	 </div>
	</div>
	
<?php include 'inc/footer.php';?>
	
	<script>
		// Initiate selectnav function
		selectnav();
	</script>
</body>
</html>