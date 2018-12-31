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
	<title>RSM Tours - Buses</title>
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
			$("#form3").show();
			$(".f-item:nth-child(4)").addClass("active");
			$(".f-item:nth-child(4) span").addClass("checked");
		});		
	</script>
</head>
<body>
	
<?php include 'inc/header.php';?>
	
	
<?php include 'inc/slider.php';?>
	

	
	<!--main-->
	<div class="main" role="main">		
		<div class="wrap clearfix">
		<!--deals-->
		<section class="full">
			<h1>Most popular Buses</h1>
			<div class="deals clearfix">
			<?php
				$squery= "SELECT * FROM tbl_bus";
				$cpost= $db->select($squery);
				if ($cpost) {
				    while ($iresult = $cpost->fetch_assoc()) {
			?>



				<!--deal-->
				<article class="one-fourth">
					<figure><a href="bus.php?id=<?php echo $iresult['id'] ; ?>" title=""><img src="admin/<?php echo $iresult['image'] ; ?>" alt="" width="270" height="152" /></a></figure>
					<div class="details">
						<h1><?php echo $iresult['companyName'] ; ?></h1>
						<span class="price">
						 <p>AC Fare starts from: $<?php echo $iresult['acfare'] ; ?></p> 
						 <p>Non AC Fare starts from: $<?php echo $iresult['nonacfare'] ; ?></p>
						</span>
						
						<a href="bus.php?id=<?php echo $iresult['id'] ; ?>" title="Book now" class="gradient-button">Book now</a>
					</div>
				</article>
				<!--//deal-->
		
		<?php } } ?>

			</div>
		</section>	
		<!--//deals-->
		
		<!--top destinations-->
		<section class="destinations clearfix last">
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
								<a href="flights.php" title="View all">
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