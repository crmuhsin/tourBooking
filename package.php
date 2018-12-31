<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="HandheldFriendly" content="True">
	<title>RSM Tours - Package information</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen,projection,print" />
	<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" />
	<link rel="shortcut icon" href="images/favicon.ico" />
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/css3-mediaqueries.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript" src="js/infobox.js"></script>
	<script type="text/javascript" src="js/jquery.uniform.min.js"></script>
	<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
	<script type="text/javascript" src="js/selectnav.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	<script type="text/javascript">
	function initialize() {
		var secheltLoc = new google.maps.LatLng(49.47216, -123.76307);

		var myMapOptions = {
			 zoom: 15
			,center: secheltLoc
			,mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		var theMap = new google.maps.Map(document.getElementById("map_canvas"), myMapOptions);


		var marker = new google.maps.Marker({
			map: theMap,
			draggable: true,
			position: new google.maps.LatLng(49.47216, -123.76307),
			visible: true
		});

		var boxText = document.createElement("div");
		boxText.innerHTML = "<strong>Best ipsum hotel</strong><br />1400 Pennsylvania Ave,<br />Washington DC<br />www.bestipsumhotel.com";

		var myOptions = {
			 content: boxText
			,disableAutoPan: false
			,maxWidth: 0
			,pixelOffset: new google.maps.Size(-140, 0)
			,zIndex: null
			,closeBoxURL: ""
			,infoBoxClearance: new google.maps.Size(1, 1)
			,isHidden: false
			,pane: "floatPane"
			,enableEventPropagation: false
		};

		google.maps.event.addListener(marker, "click", function (e) {
			ib.open(theMap, this);
		});

		var ib = new InfoBox(myOptions);
		ib.open(theMap, marker);
	}
</script>
</head>
<body>
		
<?php include 'inc/header.php';?>
<?php 
	if (!isset($_GET['id']) || $_GET['id']==NULL){
		echo "<script>window.location='error.php';</script>";
	} else {
		$id = $_GET['id'];
	}

	if (!Session::get("cmrId") || Session::get("cmrId")==NULL){
		$cmrid = 0;
	} else {
		$cmrid = Session::get("cmrId");
	}
?>
<?php
	/*$_SESSION['check_in']   	= $_POST['datepicker_in'];
	$_SESSION['check_out']   	= $_POST['datepicker_out'];
	$_SESSION['child_number']   = $_POST['child_number'];
	$_SESSION['adult_number']   = $_POST['adult_number'];*/
?>
	
	<!--main-->
	<div class="main" role="main">		
		<div class="wrap clearfix">
			<!--main content-->
			<div class="content clearfix">
	<?php
			$db= new Database();
			$fm= new Format();

			$query= "SELECT * FROM tbl_package WHERE Packid = $id";
			$package = $db->select($query);
			if($package){
			while($result = $package->fetch_assoc()){
					$cityId=$result['cityId'];
	?>	

				<!--breadcrumbs-->
				<nav role="navigation" class="breadcrumbs clearfix">
					<!--crumbs-->
					<ul class="crumbs">
						<li><a href="#" title="Home">Home</a></li>
						<li><a href="#" title="Hotels">Hotels</a></li>
						<?php $query= "SELECT cityName FROM tbl_city WHERE id = $cityId";
							$city = $db->select($query);
							if($city){
							while($aresult = $city->fetch_assoc()){ ?>
						<li><a href="#" title="Bangladesh">Bangladesh</a></li>
						<li><a href="#" title="<?php echo $aresult['cityName'];?>"><?php echo $aresult['cityName'];?></a></li>  
						<?php } } ?>
						<li>Search results</li>                                       
					</ul>
					<!--//crumbs-->
					
					<!--top right navigation-->
					<ul class="top-right-nav">
						<li><a href="search_results.php" title="Back to results">Back to results</a></li>
						<li><a href="#" title="Change search">Change search</a></li>
					</ul>
					<!--//top right navigation-->
				</nav>
				<!--//breadcrumbs-->

				<!--hotel three-fourth content-->
				<section class="three-fourth">
					<!--gallery-->
					<section class="gallery" id="crossfade">
						<img src="admin/<?php echo $result['Pic1'];?>" alt="" width="850" height="531" />
						<img src="admin/<?php echo $result['Pic1'];?>" alt="" width="850" height="531" />	
						<img src="admin/<?php echo $result['Pic1'];?>" alt="" width="850" height="531" />
					</section>
					<!--//gallery-->
				
					<!--inner navigation-->
					<nav class="inner-nav">
						<ul>
							<li class="availability"><a href="#availability" title="Availability">Availability</a></li>
							<li class="description"><a href="#description" title="Description">Description</a></li>
							<li class="facilities"><a href="#facilities" title="Facilities">Facilities</a></li>
							<li class="location"><a href="#location" title="Location">Location</a></li>
						</ul>
					</nav>
					<!--//inner navigation-->


					<!--availability-->
					<section id="availability" class="tab-content">
					<article>
	
					<h1>Room types</h1>


			<?php 
				$query = "SELECT tbl_hotel.*, tbl_room.*,tbl_room.id AS roomid FROM tbl_hotel
					INNER JOIN tbl_room
					ON tbl_hotel.id = tbl_room.hotelId
					WHERE tbl_hotel.id= $id ORDER By rand() ";

				$room = $db->select($query);
				if($room){
					while($rresult = $room->fetch_assoc()){
			?>	

					<ul class="room-types">
					<!--room-->


					<h1>Availability</h1>


				<form action="booking-step1.php?roomid=<?php echo $rresult['roomid'];?>" method="post" >

					
					<div class="column" style="min-height: 60px;">
						<div class="f-item datepicker">
							<label>Check in Date</label>
							<div class="datepicker-wrap"><input type="text" placeholder="" id="datepicker_in" name="datepicker_in" /></div>
						</div>
					</div>
					<div class="column twins">
						<div class="f-item datepicker">
							<label>Check out Date</label>
							<div class="datepicker-wrap"><input type="text" placeholder="" id="datepicker_out" name="datepicker_out" /></div>
						</div>
					</div>

				<ul >
					<h1>Who?</h1>
					<div class="column">
						<div class="f-item datepicker">
							<label>Children</label>
							<input type="number" name="child_number" id="child_number_<?php echo $rresult['id'];?>" style="width:140px" value="0" min="0" max="10" onchange="myFunction()" />
							<input type="hidden" name="c_price" id="c_price_<?php echo $rresult['id'];?>" value="<?php echo $rresult['price'];?>" />
						</div>
					</div>
					<div class="column twins">
						<div class="f-item datepicker">
							<label>Adults</label>
							<input type="number" name="adult_number" id="adult_number_<?php echo $rresult['id'];?>" style="width:140px" value="0" min="0" max="10" onchange="myFunction()" />
							<input type="hidden" name="a_price" id="a_price_<?php echo $rresult['id'];?>" value="<?php echo $rresult['price'];?>" />
						</div>
					</div>
				</ul>
<script> 
function myFunction() {
    var aQty = document.getElementById("adult_number_<?php echo $rresult['id'];?>").value;
    var cQty = document.getElementById("child_number_<?php echo $rresult['id'];?>").value;

	var aPrice=document.getElementById("a_price_<?php echo $rresult['id'];?>").value;
	var cPrice=document.getElementById("c_price_<?php echo $rresult['id'];?>").value;

    var aTotal =  aQty * aPrice;               
    var cTotal =  (cQty * cPrice * 0.5).toFixed(2);               

    var Total =  parseFloat(aTotal) + parseFloat(cTotal);               
    var vTotal =  (Total * 1.15).toFixed(2);             

    document.getElementById("grandtotal_<?php echo $rresult['id'];?>").innerHTML = Total;
    document.getElementById("grandvtotal_<?php echo $rresult['id'];?>").innerHTML = vTotal;

}

</script>
				<h1><br>
					<div>Total Price(Without VAT):  BDT <span id="grandtotal_<?php echo $rresult['id'];?>"></span></div>
				</h1>
				<h1>
					<div>Total Price(With VAT):     BDT <span id="grandvtotal_<?php echo $rresult['id'];?>"></span></div>
				</h1>
				
	
					<li>
					<figure class="left"><img src="admin/<?php echo $rresult['image5'];?>" alt="" width="270" height="152" /><a href="admin/<?php echo $rresult['image5'];?>" class="image-overlay" rel="prettyPhoto[gallery1]"></a></figure>
					<div class="meta" style="width:30%">
					<h2><?php echo $rresult['type'];?></h2>
					<p>Prices are per room<br />20 % VAT Included in price</p>
					<p>Non-refundable<br />Full English breakfast $ 24.80 </p>
					<a href="javascript:void(0)" title="more info" class="more-info">+ more info</a>
					</div>

					<div class="room-information" style="width:25%">
					<div class="row">
					<span class="first">Max:</span>
					<span class="second">
					
						<?php
						$i = $rresult['max'];
						 for (;  $i>0;$i-- ) { ?>
						<img src="images/ico/person.png" alt="" />
						<?php } ?>
					</span>
					</div>
					<div class="row">
					<span class="first">Price:</span>
					<span class="second"><span style="font-size:1em">$<?php echo $rresult['price'];?></span></span>
					</div>
					<div class="row">
					<span class="first">Rooms:</span>
					<span class="second">01</span>
					</div>
					<input type="submit" class="gradient-button" title="Book" value="Book">
					</div>
					<hr>

					<div class="more-information">
					<p>Stylish and individually designed room featuring a satellite TV, mini bar and a 24-hour room service menu.</p>
					<p><strong>Room Facilities:</strong> Safety Deposit Box, Air Conditioning, Desk, Ironing Facilities, Seating Area, Heating, Shower, Bath, Hairdryer, Toilet, Bathroom, Pay-per-view Channels, TV, Telephone</p>
					<p><strong>Bed Size(s):</strong> 1 Double </p>
					<p><strong>Room Size:</strong>  16 square metres</p>
					</div>
					<figure class="left"><img src="admin/<?php echo $rresult['image6'];?>" alt="" width="150" height="90" /><a href="admin/<?php echo $rresult['image6'];?>" class="image-overlay" rel="prettyPhoto[gallery1]"></a></figure>

					<figure class="left"><img src="admin/<?php echo $rresult['image7'];?>" alt="" width="150" height="90" /><a href="admin/<?php echo $rresult['image7'];?>" class="image-overlay" rel="prettyPhoto[gallery1]"></a></figure>					
					</li>
					<!--//room-->

					
					</form>
					<br>
					</ul>

	    <?php  
				$hotelquery= "SELECT * FROM tbl_hotel
				WHERE id= $cityId";
	            $hotelpost= $db->select($hotelquery);
	            if($hotelpost){
	            	while($hotelresult = $hotelpost->fetch_assoc()){;
		?>
		<?php 
				$_SESSION['bookingnumber'] 	= session_id();
				$_SESSION['cmrid']   		= $cmrid;
				$_SESSION['hotelname']   	= $hotelresult['title'];
				$_SESSION['hotelid']   		= $id;

				} }else{echo "No Room Available.";} 
		?>
		<?php }}?>


					</article>
					</section>
					<!--//availability-->
					
					<!--description-->
					<section id="description" class="tab-content">
						<article>
							<h1>General</h1>
							<div class="text-wrap">	
								<p><?php echo $result['body']; ?></p>
							</div>
							
							<h1>Check-in</h1>
							<div class="text-wrap">	
								<p>From 15:00 hours </p>
							</div>
							
							<h1>Check-out</h1>
							<div class="text-wrap">	
								<p>Untill 12:00 hours </p>
							</div>
							
							<h1>Cancellation / Prepayment</h1>
							<div class="text-wrap">	
								<p>Cancellation and prepayment policies vary according to room type. Please check the <a href="#">room conditions</a> when selecting your room. </p>
							</div>
							
							<h1>Children and extra beds</h1>
							<div class="text-wrap">	
								<p><strong>Free!</strong> All children under 8 years stay free of charge when using existing beds.<br /><strong>Free!</strong> All children under 2 years stay free of charge for children’s cots/cribs.<br /><br />All older children or adults are charged USD 40 per person per night for extra beds.<br />The maximum number of extra beds/children’s cots permitted in a room is 1.<br />Any type of extra bed or child’s cot/crib is upon request and needs to be confirmed by management.<br />Supplements are not calculated automatically in the total costs and will have to be paid for separately when checking out.</p>
							</div>
							
							<h1>Pets</h1>
							<div class="text-wrap">	
								<p>Pets are allowed. Charges may be applicable.</p>
							</div>
							
							<h1>Accepted credit cards</h1>
							<div class="text-wrap">	
								<p>American Express, Visa, Euro/Mastercard, Diners Club<br />The hotel reserves the right to pre-authorise credit cards prior to arrival.</p>
							</div>
						</article>
					</section>
					<!--//description-->
					
					<!--facilities-->
					<section id="facilities" class="tab-content">
						<article>
							<h1>Facilities</h1>
							<div class="text-wrap">	
								<ul class="three-col">
									<li>Kitchenette</li>
									<li>Ironing board</li>
									<li>Catering services</li>
									<li>Beachfront</li>
									<li>Hotspots</li>
									<li>Exhibition/convention floor</li>
									<li>Restaurant</li>
									<li>Room service - full menu</li>
									<li>Courtyard</li>
									<li>Lounges/bars</li>
									<li>Laundry/Valet service</li>
									<li>Airport Shuttle Service</li>
									<li>Complimentary breakfast</li>
									<li>Valet cleaning</li>
									<li>Car hire</li>
								</ul>
							</div>
							
							<h1>Activities</h1>
							<div class="text-wrap">	
								<p>Tennis court, Sauna, Fitness centre, Massage </p>
							</div>
							
							<h1>Internet</h1>
							<div class="text-wrap">	
								<p><strong>Free!</strong> WiFi is available in all areas and is free of charge. </p>
							</div>
							
							<h1>Parking</h1>
							<div class="text-wrap">	
								<p>Private parking is possible at a location nearby (reservation is not needed) and costs USD 28.80 per day.</p>
							</div>
						</article>
					</section>
					<!--//facilities-->
					
					<!--location-->
					<section id="location" class="tab-content">
						<article>
							<!--map-->
								<h1>Location</h1>
								<h1><?php echo $result['title']; ?></h1>
								<h2><?php echo $result['location']; ?></h2>
							<!--//map-->
						</article>
					</section>
					<!--//location-->
					
					<!--reviews-->
					<section id="reviews" class="tab-content">
						<article>
							<h1>Hotel Score and Score Breakdown</h1>
							<div class="score">
								<span class="achieved"><?php echo $result['userrating']; ?> </span>
								<span> / 10</span>
								<p class="info">Based on 782 reviews</p>
								<p class="disclaimer">Guest reviews are written by our customers <strong>after their stay</strong> at <?php echo $result['title']; ?>.</p>
							</div>
							
							<dl class="chart">
								<dt>Clean</dt>
								<dd><span id="data-one" style="width:80%;">8&nbsp;&nbsp;&nbsp;</span></dd>
								<dt>Comfort</dt>
								<dd><span id="data-two" style="width:60%;">6&nbsp;&nbsp;&nbsp;</span></dd>
								<dt>Location</dt>
								<dd><span id="data-three" style="width:80%;">8&nbsp;&nbsp;&nbsp;</span></dd>
								<dt>Staff</dt>
								<dd><span id="data-four" style="width:100%;">10&nbsp;&nbsp;&nbsp;</span></dd>
								<dt>Services</dt>
								<dd><span id="data-five" style="width:70%;">7&nbsp;&nbsp;&nbsp;</span></dd>
								<dt>Value for money</dt>
								<dd><span id="data-six" style="width:90%;">9&nbsp;&nbsp;&nbsp;</span></dd>
							</dl>
						</article>

<script>

function callCrudAction(action,cmrid) {
	var queryString;
	switch(action) {
		case "save_review":
			queryString = 'action='+action+'&cmrid='+cmrid+'&user_rating='+ $("#user_rating").val()+'&pros='+ $("#positive").val()+'&con='+ $("#negative").val()+'&id=<?php echo $id;?>';
		break;
	}	 
	jQuery.ajax({
	url: "my_account_edit.php",
	data: queryString,
	type: "POST",
	success:function(data){
		switch(action) {
			case "save_review":
				$("#your_review").html(data);
				$("#comment-list-box").append(data);

			break;
		}
		$("#positive").val('');
		$("#negative").val('');
		$("#user_rating").val('');
	},
	error:function (){}
	});
}
</script>

			<article>

<?php if ($cmrid==0) { ?>
				<h1>You can also give your review about <?php echo $result['title'];?>. To do this Register <a href="register.php">here</a>.</h1>
				<?php}else{?>

				<h1>Your Review:</h1>
				<ul class="reviews">
					<table>
					<tr></tr>
					<tr>
						<td><span style="width:200px;">Your Rating:</span>
						<input type="number" name="user_rating" min="1" max="10" value="1" id="user_rating"/></td>
					</tr>
					<tr>				
						<td ><div class="pro"><p>
							<textarea name="pro" id="positive" cols="80" rows="1"></textarea></p>
						</div></td>
					</tr>
					<tr>
						<td><div class="con"><p>
							<textarea name="con" id="negative" cols="80" rows="1"></textarea></p>
						</div></td>
						
					</tr>
					<tr><td><input type="reset" value="Review" class="gradient-button" onClick="callCrudAction('save_review','<?php echo $cmrid;?>')"/></td></tr>
					</table>
				</ul>
				<?php } ?>

			</article>

						<article>
							<h1>Guest reviews</h1>
							<ul class="reviews">

								<!--review-->
								
								<li id="your_review"></li>
								
								<!--//review-->
<?php
$query= "SELECT id, (SELECT fname FROM tbl_customer WHERE tbl_customer.id=tbl_review.cmrid) AS fname, (SELECT country FROM tbl_customer WHERE tbl_customer.id=tbl_review.cmrid) AS country, rating, pros, con FROM tbl_review WHERE tbl_review.hotelid=$id";
$post= $db->select($query);
if ($post) {
	while ($presult = $post->fetch_assoc()) {
?>								
								<!--review-->
								
		<li>
			<figure class="left"><img src="images/uploads/avatar.jpg" alt="avatar" /></figure>
			<address><span><?php echo $presult['fname'];?></span><br />Solo Traveller<br /><?php echo $presult['country'];?><br />22/06/2012</address>
			<div class="pro"><p><?php echo $presult['pros'];?></p></div>
			<div class="con"><p><?php echo $presult['con'];?></p></div>
		</li>
		<?php }  }else{ echo "No review found.";} ?>
								
								<!--//review-->
								
								
							</ul>
						</article>
					</section>
					<!--//reviews-->
					
					<!--things to do-->
					<section id="things-to-do" class="tab-content">
						<article>
				<?php
				$query= "SELECT * FROM tbl_city
						 WHERE id ='$cityId'";
				$post= $db->select($query);
				if ($post) {
					while ($cresult = $post->fetch_assoc()) {
				?>
							<h1><?php echo $cresult['cityName'];?></h1>
							<figure class="left_pic"><img src="admin/<?php echo $cresult['banner'];?>" alt="Things to do - London general" /></figure>
							<?php echo $cresult['do'];?>
							<hr />
							<a href="#" class="gradient-button right" title="Read more">Read more</a>
				<?php } }?>

						</article>
					</section>
					<!--//things to do-->
				</section>
				<!--//hotel content-->
				
				<!--sidebar-->
				<aside class="right-sidebar">
					<!--hotel details-->
					<article class="hotel-details clearfix">
						<?php  
							$hotelquery= "SELECT * FROM tbl_hotel
						    WHERE id = $id";
				            $hotelpost= $db->select($hotelquery);
				            if ($hotelpost) {
					        while ($hotelresult = $hotelpost->fetch_assoc()){
						?>
						<h1><?php echo $hotelresult['title']; ?>
							<?php }}?>
							<span class="stars">
								<img src="images/ico/star.png" alt="" />
								<img src="images/ico/star.png" alt="" />
								<img src="images/ico/star.png" alt="" />
								<img src="images/ico/star.png" alt="" />
							</span>
						</h1>
						<?php 
							$query= "SELECT * FROM tbl_city
						    WHERE id ='$cityId'";
				            $post= $db->select($query);
				            if ($post) {
					        while ($cresult = $post->fetch_assoc()){
						?>
						<span class="address"><?php echo $cresult['cityName']; ?></span>
						<?php }}?>
						<div class="description">
							<p><?php echo $fm->textshorten($result['Detail'], 350); ?></p>
						</div>
						<div class="tags">
							<ul>
								<li><a href="#" title="Wellness">Wellness</a></li>
								<li><a href="#" title="Last minute">Last minute</a></li>
								<li><a href="#" title="Thailand">Thailand</a></li>
								<li><a href="#" title="SPA">SPA</a></li>
								<li><a href="#" title="Romantic">Romantic</a></li>
							</ul>
						</div>
					</article>
					<!--//hotel details-->
					
					<!--testimonials-->
					<article class="testimonials clearfix">
						<blockquote>Loved the staff and the location was just amazing... Perfect!” </blockquote>
						<span class="name">- Jane Doe, Solo Traveller</span>
					</article>
					<!--//testimonials-->
					



<!--Need Help Booking?-->
<article class="default clearfix">
	<h2>Need Help Booking?</h2>
	<p>Call our customer services team on the number below to speak to one of our advisors who will help you with all of your holiday needs.</p>
	<p class="number">01828-036401</p>
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
		
		
		$querypopular = "SELECT * FROM tbl_hotel WHERE cityId = $cityId order by rand() limit 4";
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

				
			</aside>
				<!--//sidebar-->
				<?php }}else {echo "<script>window.location='error.php';</script>";}?>
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