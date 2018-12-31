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
	if (!isset($_GET['delroomid']) || $_GET['delroomid'] == NULL) {
	    echo "<script>window.location='roomlist.php';</script>";
	} else{
	    $roomid = $_GET['delroomid'];
		$query = "SELECT * FROM tbl_room WHERE id='$roomid'";
		$getdata = $db->select($query);
		if($getdata){
			while($delimg=$getdata->fetch_assoc()){
				$dellink1=$delimg['image5'];
				$dellink2=$delimg['image6'];
				$dellink3=$delimg['image7'];
				unlink($dellink1);
				unlink($dellink2);
				unlink($dellink3);
				

			}
		}

		$delquery= "DELETE FROM tbl_room WHERE id= '$roomid'";
		$deldata = $db->delete($delquery);
		if ($deldata) {
			echo "<script>alert('Information Deleted Successfully.');</script>";
			echo "<script>window.location='roomlist.php';</script>";
		} else{
			echo "<script>alert('Information not Deleted.');</script>";
			echo "<script>window.location='roomlist.php';</script>";
		}
	}

?>