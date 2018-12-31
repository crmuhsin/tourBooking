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
	<title>RSM Tours - Hotels</title>
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
			<!--deals-->
			<section class="full">
				<h1>Most popular Hotels</h1>
				<div class="deals clearfix">
					

					<!--deal-->
					<?php
						$db= new Database();
						$fm= new Format();
						$query = "select * from tbl_hotel order by rand()";
						$post = $db->select($query);
						if($post){
							while($result = $post->fetch_assoc()){

					?>
					<article class="one-fourth">
						<figure><a href="hotel.php?id=<?php echo $result['id'];?>" title=""><img src="admin/<?php echo $result['image1'];?>" alt="" width="270" height="152" /></a></figure>
						<div class="details">
							<h1><a href="hotel.php?id=<?php echo $result['id'];?>"><?php echo $result['title'];?></a> 
								<span class="stars">
									<img src="images/ico/star.png" alt="" />
									<img src="images/ico/star.png" alt="" />
									<img src="images/ico/star.png" alt="" />
									<img src="images/ico/star.png" alt="" />
								</span>
							</h1>
							<span class="address"><?php echo $result['location'];?></span>
							<span class="rating"> <?php echo $result['userrating'];?> /10</span>
							<span class="price">Price per room per night from  </br><em>$ 50</em> </span>
							<div class="description">
								<span><?php echo $fm->textshorten($result['body'], 210); ?><a href="hotel.php?id=<?php echo $result['id'];?>">More info</a></span>
							</div>
							<a href="hotel.php?id=<?php echo $result['id'];?>" title="Book now" class="gradient-button">Book now</a>
						</div>
					</article>
					<?php } ?>
					<?php } else {
				echo "<script>window.location='error.php';</script>";
					}?>
					<!--//deal-->
					
				</div>
			</section>	
			<!--//deals-->
			
			<!--top destinations-->
			<section class="destinations clearfix last">
				<h1>Top destinations of Bangladesh</h1>
				
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
						<a href="location.php?id=<?php echo $result['id'];?>#hotels" title="View all" class="gradient-button">View all</a>
						
						<h5><a href="location.php?id=<?php echo $result['id'];?>"><?php echo $result['cityName'];?></a></h5>
						<span class="count">1529 Hotels</span>
						<div class="ribbon">
							<div class="half hotel">
								<a href="location.php?id=<?php echo $result['id'];?>#hotels" title="View all">
									<span class="small">from</span>
									<span class="price">&#36; 70</span>
								</a>
							</div>
							<div class="half flight">
								<a href="location.php?id=<?php echo $result['id'];?>#flights" title="View all">
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