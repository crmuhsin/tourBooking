<?php 
include '../lib/session.php';
Session::checkSession();
?>
<?php include '../config/config.php'; ?>
<?php include '../lib/Database.php'; ?>
<?php
    $db= new Database();
?>
<?php
	if (!isset($_GET['delhotelid']) || $_GET['delhotelid'] == NULL) {
	    echo "<script>window.location='hotellist.php';</script>";
	} else{
	    $hotelid = $_GET['delhotelid'];
		$query = "SELECT * FROM tbl_hotel WHERE id='$hotelid'";
		$getdata = $db->select($query);
		if($getdata){
			while($delimg=$getdata->fetch_assoc()){
				$dellink1=$delimg['image1'];
				$dellink2=$delimg['image2'];
				$dellink3=$delimg['image3'];
				$dellink4=$delimg['image4'];
				unlink($dellink1);
				unlink($dellink2);
				unlink($dellink3);
				unlink($dellink4);

			}
		}

		$delquery= "DELETE FROM tbl_hotel WHERE id= '$hotelid'";
		$deldata = $db->delete($delquery);
		if ($deldata) {
			echo "<script>alert('Information Deleted Successfully.');</script>";
			echo "<script>window.location='hotellist.php';</script>";
		} else{
			echo "<script>alert('Information not Deleted.');</script>";
			echo "<script>window.location='hotellist.php';</script>";
		}
	}

?>