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
	<title>RSM Tours - Search results</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen,projection,print" />
	<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" />
	<link rel="shortcut icon" href="images/favicon.ico" />
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/css3-mediaqueries.js"></script>
	<script type="text/javascript" src="js/jquery.uniform.min.js"></script>
	<script type="text/javascript" src="js/jquery.raty.min.js"></script>
	<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
	<script type="text/javascript" src="js/selectnav.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		$('dt').each(function() {
			var tis = $(this), state = false, answer = tis.next('dd').hide().css('height','auto').slideUp();
			tis.click(function() {
				state = !state;
				answer.slideToggle(state);
				tis.toggleClass('active',state);
			});
		});
		
		$('.view-type li:first-child').addClass('active');
		
		$('#star').raty({
			score    : 3,
			click: function(score, evt) {
			alert('ID: ' + $(this).attr('id') + '\nscore: ' + score + '\nevent: ' + evt);
		  }
		});	
		
	});
	
	$(window).load(function () {
	var maxHeight = 0;
			
	$(".three-fourth .one-fourth").each(function(){
	if ($(this).height() > maxHeight) { maxHeight = $(this).height(); }
	});
	$(".three-fourth .one-fourth").height(maxHeight);	
	});	

	</script>
</head>
<body>
	
<?php include 'inc/header.php';?>

<?php 
	if (!isset($_GET['search']) || $_GET['search']==NULL){
		echo "<script>window.location='error.php';</script>";
	} else {
		$search = $_GET['search'];
	}

	$destination = Session::get('destination');
	
	$query = "SELECT * FROM tbl_city WHERE cityName = '$destination'";
		$city = $db->select($query);
		if($city){
		while($rcid = $city->fetch_assoc()){
					$id = $rcid['id'];
			}
		}
		else{
			$id=0;
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
						<li><a href="#" title="<?php echo ucfirst(strtolower($destination)); ?>">Search results for <?php echo ucfirst(strtolower($destination)); ?></a></li>
						<li></li>                                       
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

				<!--sidebar-->
				<?php include 'inc/search_result_sidebar.php';?>
				<!--sidebar-->

			
				<!--three-fourth content-->
					<section class="three-fourth">
						<div class="sort-by">
							<h3>Sort by</h3>
							<ul class="sort">
								<li>Popularity <a href="#" title="ascending" class="ascending">ascending</a><a href="#" title="descending" class="descending">descending</a></li>
								<li>Price <a href="#" title="ascending" class="ascending">ascending</a><a href="#" title="descending" class="descending">descending</a></li>
								<li>Stars <a href="#" title="ascending" class="ascending">ascending</a><a href="#" title="descending" class="descending">descending</a></li>
								<li>Rating <a href="#" title="ascending" class="ascending">ascending</a><a href="#" title="descending" class="descending">descending</a></li>
							</ul>
							
							<ul class="view-type">
								<li class="grid-view"><a href="#" title="grid view">grid view</a></li>
								<li class="list-view"><a href="#" title="list view">list view</a></li>
								<li class="location-view"><a href="#" title="location view">location view</a></li>
							</ul>
						</div>
						
						<div class="deals clearfix">
							<h1><?php echo "Search results for '".ucfirst(strtolower($destination))."'"; ?></h1>

							
							<!--deal-->
							<?php
								$db= new Database();
								$fm= new Format();
								$query = "SELECT tbl_hotel.*, tbl_hotel.id AS hid, tbl_city.id AS cid FROM tbl_hotel 
									INNER JOIN tbl_city 
									ON tbl_hotel.cityId = tbl_city.id 
									WHERE tbl_city.id = $id
									ORDER By rand()";
								$post = $db->select($query);
								if($post){
									while($result = $post->fetch_assoc()){
							?>	

							<article class="one-fourth">
								<figure><a href="hotel.php?id=<?php echo $result['hid'];?>" title=""><img src="admin/<?php echo $result['image1'];?>" alt="" width="270" height="152" /></a></figure>
								<div class="details">
								<h1><a href="hotel.php?id=<?php echo $result['hid'];?>"><?php echo $result['title'];?>		</a>
									<span class="stars">
									<img src="images/ico/star.png" alt="" />
									<img src="images/ico/star.png" alt="" />
									<img src="images/ico/star.png" alt="" />
									<img src="images/ico/star.png" alt="" />
									<img src="images/ico/star.png" alt="" />
									</span>
								</h1>
								<span class="address"><?php echo $result['location'];?>  •  <a href="#">Show on map</a></span>
								<span class="rating"> <?php echo $result['userrating'];?> /10</span>
								<span class="price">Price per room per night from  <em>$ 50</em> </span>

								<div class="description">
									<p><?php echo $fm->textshorten($result['body'], 210); ?><a href="hotel.php?id=<?php echo $result['hid'];?>">More info</a></p>
								</div>
								<a href="hotel.php?id=<?php echo $result['hid'];?>" title="Book now" class="gradient-button">Book now</a>
								</div>
							</article>
							<?php } ?>
							<?php } else { ?>
							<article class="full">

								<div class="details">
								<h1>
							<?php 
							echo "No Destination Matched Your Search!!!";
							}?>
						</h1>
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
									<span><a href="#">6</a></span>
									<span><a href="#">7</a></span>
									<span><a href="#">8</a></span>
									<span><a href="#">&gt;</a></span>
									<span><a href="#">Last page</a></span>
								</div>
								<!--//pager-->
							</div>
							<!--//bottom navigation-->
						</div>
					</section>
				<!--//three-fourth content-->
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