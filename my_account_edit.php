<?php 
include 'config/config.php'; 
require_once('lib/Database.php'); 
require_once('lib/session.php'); 

$db= new Database();
$id = $_POST["id"];
$action = $_POST["action"];
if(empty($id)||empty($action)){
	echo "<script>window.location='error.php';</script>";

}
if(!empty($action)) {
   switch($action){
	  case "save_fname":	
	  	$fname =mysqli_real_escape_string($db->link, $_POST["new_fname"]);   
		$query ="UPDATE tbl_customer SET fname = '$fname' WHERE id = '$id' ";
	    $result = $db->update($query);
	    if($result){ 	?>
		<label><?php echo $fname; ?></label>
		<?php } 	
	  break; 
	  case "save_lname":	
	  	$lname =mysqli_real_escape_string($db->link, $_POST["new_lname"]);   
		$query ="UPDATE tbl_customer SET lname = '$lname' WHERE id = '$id' ";
	    $result = $db->update($query);
	    if($result){ 	?>
		<label><?php echo $lname; ?></label>
		<?php } 	
	  break; 
	  case "save_email":	
	  	$email =mysqli_real_escape_string($db->link, $_POST["new_email"]);   
		$query ="UPDATE tbl_customer SET email = '$email' WHERE id = '$id' ";
	    $result = $db->update($query);
	    if($result){ 	?>
		<label><?php echo $email; ?></label>
		<?php } 	
	  break; 
	  case "save_pass":	
	  	$pass =mysqli_real_escape_string($db->link, $_POST["new_pass"]);   
		$query ="UPDATE tbl_customer SET pass = '$pass' WHERE id = '$id' ";
	    $result = $db->update($query);
	    if($result){ 	?>
		<label><?php echo $pass; ?></label>
		<?php } 	
	  break; 
	  case "save_address":	
	  	$address =mysqli_real_escape_string($db->link, $_POST["new_address"]);   
		$query ="UPDATE tbl_customer SET address = '$address' WHERE id = '$id' ";
	    $result = $db->update($query);
	    if($result){ 	?>
		<label><?php echo $address; ?></label>
		<?php } 	
	  break; 
	  case "save_city":	
	  	$city =mysqli_real_escape_string($db->link, $_POST["new_city"]);   
		$query ="UPDATE tbl_customer SET city = '$city' WHERE id = '$id' ";
	    $result = $db->update($query);
	    if($result){ 	?>
		<label><?php echo $city; ?></label>
		<?php } 	
	  break; 
	  case "save_zip":	
	  	$zip =mysqli_real_escape_string($db->link, $_POST["new_zip"]);   
		$query ="UPDATE tbl_customer SET zip = '$zip' WHERE id = '$id' ";
	    $result = $db->update($query);
	    if($result){ 	?>
		<label><?php echo $zip; ?></label>
		<?php } 	
	  break; 
	  case "save_country":	
	  	$country =mysqli_real_escape_string($db->link, $_POST["new_country"]);   
		$query ="UPDATE tbl_customer SET country = '$country' WHERE id = '$id' ";
	    $result = $db->update($query);
	    if($result){ 	?>
		<label><?php echo $country; ?></label>
		<?php } 	
	  break; 
	  case "save_phone":	
	  	$phone =mysqli_real_escape_string($db->link, $_POST["new_phone"]);   
		$query ="UPDATE tbl_customer SET phone = '$phone' WHERE id = '$id' ";
	    $result = $db->update($query);
	    if($result){ 	?>
		<label><?php echo $phone; ?></label>
		<?php } 	
	  break; 

	  case "save_review":	
	  	$cmrid = $_POST['cmrid'];
	  	$user_rating =mysqli_real_escape_string($db->link, $_POST["user_rating"]);
	  	$pros =mysqli_real_escape_string($db->link, $_POST["pros"]);
	  	$con =mysqli_real_escape_string($db->link, $_POST["con"]);   
  if($user_rating == "" || $pros == "" || $con == ""){
        echo "<span class='error'>Field must not be empty.</span>"; 
       } 
       else {
		$query ="INSERT INTO tbl_review(cmrid,hotelid,rating,pros,con) VALUES('$cmrid','$id','$user_rating','$pros','$con') ";
	    $result = $db->insert($query);
	    if($result){ 	?>

			<div>Your review is sent. We will review that and publish later.</div>

		<?php } }	
	  break; 

	}
}
?>
