<?php 
include 'lib/session.php'; 
Session::init();
?>

<?php include 'config/config.php'; ?>
<?php include 'lib/Database.php'; ?>
<?php include 'helpers/Format.php'; ?>
<?php
    $db= new Database();
    $fm= new Format();
?>

<?php 

$uquery = "SELECT * FROM tbl_theme WHERE id = '1' ";
$themes = $db->select($uquery); 
while ($result = $themes->fetch_assoc()) {

	if ($result['theme'] == 'default') {?>
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen,projection,print" />
	
	<?php }elseif ($result['theme'] == 'black') {?>
		<link rel="stylesheet" href="css/theme-black.css" type="text/css" media="screen,projection,print" />
	
	<?php }elseif ($result['theme'] == 'blue') {?>
		<link rel="stylesheet" href="css/theme-blue.css" type="text/css" media="screen,projection,print" />
	
	<?php }elseif ($result['theme'] == 'orange') {?>
		<link rel="stylesheet" href="css/theme-orange.css" type="text/css" media="screen,projection,print" />
	
	<?php }elseif ($result['theme'] == 'pink') {?>
		<link rel="stylesheet" href="css/theme-pink.css" type="text/css" media="screen,projection,print" />
	
	<?php }elseif ($result['theme'] == 'purple') {?>
		<link rel="stylesheet" href="css/theme-purple.css" type="text/css" media="screen,projection,print" />
	
	<?php }elseif ($result['theme'] == 'strawberry') {?>
		<link rel="stylesheet" href="css/theme-strawberry.css" type="text/css" media="screen,projection,print" />?>


	<?php }elseif ($result['theme'] == 'yellow') {?>
		<link rel="stylesheet" href="css/theme-yellow.css" type="text/css" media="screen,projection,print" />
	<?php } } ?>


	<!--header-->
	<header>
		<div class="wrap clearfix">
			<!--logo-->
			<h1 class="logo"><a href="index.php" title="RSM Tours - home"><img src="images/txt/logo.png" alt="RSM Tours" /></a></h1>
			<!--//logo-->
			
			<!--ribbon-->
			<div class="ribbon">
				<nav>
					<ul class="profile-nav">
						<li class="active"><a href="#" title="My Account">My Account</a></li>

						<?php $email=Session::get('cmrEmail'); ?>
						
						<?php if (isset($email)) {
						
						 echo $email;
						}
						?>

	<?php
    if (isset($_GET['cid'])) {
    	Session::destroy();

    }?>


			<div class="login">
		   	<?php
				$login = Session::get("custlogin");
				if ($login == false) { ?>
		   			<li><a href="login.php" title="Login">Login</a></li>
				
				<?php
			}
			else
				{?>
		   			<li><a href="?cid=<?php Session::get('cmrId');?>" title="Logout">Logout</a></li>	
					<li><a href="my_account.php" title="Settings">Settings</a></li>

		   		<?php } ?>

		   </div>

						



					</ul>
					<ul class="lang-nav">
						<li class="active"><a href="#" title="English">English</a></li>
<!-- 						<li><a href="#" title="বাংলা">বাংলা</a></li>
 -->
					</ul>
					<ul class="currency-nav">
						<li class="active"><a href="#" title="US Dollar">USD</a></li>
<!-- 						<li><a href="#" title="Taka">BDT</a></li>
 -->					</ul>
				</nav>
			</div>
			<!--//ribbon-->
			
			<!--search-->
			<div class="search">
				<form id="search-form" method="get" action="search-form">
					<input type="search" placeholder="Search entire site here" name="site_search" id="site_search" /> 
					<input type="submit" id="submit-site-search" value="submit-site-search" name="submit-site-search"/>
				</form>
			</div>
			<!--//search-->
			
			<!--contact-->
			<div class="contact">
				<span>24/7 Support number</span>
				<span class="number">01521-204608</span>
			</div>
			<!--//contact-->
		</div>
		
		<!--main navigation-->
		<nav class="main-nav" role="navigation" id="nav">
			<ul class="wrap">
				<li><a href="index.php" title="Home">Home</a></li>
				<li><a href="hotels.php" title="Hotels">Hotels</a></li>
				<li><a href="buses.php" title="Transport">Transport</a></li>
				<li><a href="#" title="Packages">Packages</a></li>

				<li><a href="#" title="Cruises">Cruises</a></li>
				<li><a href="#" title="Car rental">Car rental</a></li>
				<li><a href="#" title="Hot deals">Hot deals</a></li>

				<li><a href="#" title="Get inspired">Get inspired</a></li>
				<li><a href="#" title="Travel guides">Travel guides</a>
					<ul>
						<li><a href="location.php">Location Details</a></li>
					</ul>
				</li>
			</ul>
		</nav>
		<!--//main navigation-->
	</header>
	<!--//header-->