<?php include '../config/config.php'; ?>
<?php require_once('../lib/Database.php'); ?>
<?php
    $db= new Database();

$cityId = $_POST["city_id"];
?>
	<option value="">Select Hotel</option>
<?php 
if(!empty($cityId)) {
	$query ="SELECT * FROM tbl_hotel WHERE cityId = $cityId";
    $read = $db->select($query);
    if ($read) {
    while ($hotel = $read->fetch_assoc()) {
?>


	<option value="<?php echo $hotel['id']; ?>"><?php echo $hotel['title']; ?></option>
<?php } } } ?>