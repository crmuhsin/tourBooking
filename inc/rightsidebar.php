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
	<?php
		
		
		$querypopular = "SELECT * FROM tbl_hotel WHERE cityId = '$cityId' order by rand() limit 4";
		$popularhotel = $db->select($querypopular);
		if($popularhotel){
		while($rresult = $popularhotel->fetch_assoc()){
	?>	
	<h2>Popular hotels in the area</h2>

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
