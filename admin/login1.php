<?php 
include '/lib/session.php';
Session::checkSession();
?>
<?php include 'config/config.php'; ?>
<?php include 'lib/Database.php'; ?>
<?php include 'Format.php'; ?>


<!DOCTYPE html>
<html>
<head>
<title>Tourism Management Admin Panel</title>
<link rel="shortcut icon" href="favicon.ico"/>


<link href="style.css" rel="stylesheet" type="text/css" media="all"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--js--> 
<script type="text/javascript" src="clockp.js"></script>
<script type="text/javascript" src="clockh.js"></script> 
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="ddaccordion.js"></script>
<script type="text/javascript">
ddaccordion.init({
	headerclass: "submenuheader", //Shared CSS class name of headers group
	contentclass: "submenu", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["suffix", "<img src='images/plus.gif' class='statusicon' />", "<img src='images/minus.gif' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})
</script>

<script type="text/javascript" src="jconfirmaction.jquery.js"></script>
<script type="text/javascript">
	
	$(document).ready(function() {
		$('.ask').jConfirmAction();
	});
	
</script>

<script language="javascript" type="text/javascript" src="niceforms.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="niceforms-default.css" />

</head>
<!--header-->
<!--sticky-->



<?php
if (isset($_GET['action']) && $_GET['action'] == "logout") {
    Session::destroy();
}
    $username = Session::get('username');
    $usertype = Session::get('usertype');
?>

<body>

<div id="main_container">

	<div class="header">
    <div class="logo"><a href="#"><img src="images/logo.png" alt="" title="" border="0" /></a></div>
    
    <div class="right_header">Welcome Admin, <a href="../index.php" target="_blank">Visit site</a> | <a href="viewenquiry.php" class="messages">Messages</a> | <a href="?action=logout">Logout</a></div>
    <div id="clock_a"></div>
    </div>

    	<div class="main_content">
    
            <div class="menu">
            <ul>
            <li><a class="current" href="index.php">Admin Home</a></li>
            <li>
            	<a href="">Manage Users</a>  
			<?php if($usertype=="Admin"){?>
				<ul>
                    <li><a href="adduser.php" title="">Add User</a></li>
                    <li><a href="updateuser.php" title="">Update User</a></li>
                    <li><a href="deleteuser.php" title="">Delete User</a></li>
                </ul>
            </li>
            <?php }?>

            <li>
            	<a href="">Manage Category</a>
			<?php if($usertype=="Admin"){?>
				<ul>
					<li><a href="addcategory.php">Add Category</a></li>
                    <li><a href="updatecategory.php" title="">Update Category</a></li>
                    <li><a href="deletecategory.php" title="">Delete Category</a></li>
                    <li><a href="viewcategory.php" title="">View Category</a></li>
                </ul>
            </li>
            <?php }?>

            <li>
            	<a href="">Manage SubCategory</a>
			<?php if($usertype=="Admin"){?>
				<ul>
					<li><a href="addsubcategory.php">Add SubCategory</a></li>
                    <li><a href="updatesubcategory.php" title="">Update SubCategory</a></li>
                    <li><a href="deletesubcategory.php" title="">Delete SubCategory</a></li>
                    <li><a href="viewsubcategory.php" title="">View SubCategory</a></li>
                </ul>
            </li>
            <?php }?>

            <li>
            	<a href="">Manage Packages</a>  
			<?php if($usertype=="Admin"){?>
				<ul>
                    <li><a href="addpackage.php" title="">Add Package</a></li>
                    <li><a href="updatepackage.php" title="">Update Package</a></li>
                    <li><a href="deletepackage.php" title="">Delete Package</a></li>
                    <li><a href="viewpackage.php" title="">View Package</a></li>
                </ul>
            </li>
            <?php }?>

            <li>
            	<a href="">Manage Advertisement</a>  
			<?php if($usertype=="Admin"){?>
				<ul>
                    <li><a href="addadvertisement.php" title="">Add Advertisement</a></li>
                    <li><a href="deleteadvertisement.php" title="">Delete Advertisement</a></li>
                    <li><a href="viewadvertisement.php" title="">View Advertisement</a></li>
                </ul>
            </li>
            <?php }?>

            
        </div>