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
	if (!isset($_GET['delcityid']) || $_GET['delcityid'] == NULL) {
	    echo "<script>window.location='citylist.php';</script>";
	} else{
	    $cityid = $_GET['delcityid'];
		$query = "SELECT * FROM tbl_city WHERE id='$cityid'";
		$getdata = $db->select($query);
		if($getdata){
			while($delimg=$getdata->fetch_assoc()){
				$dellink1=$delimg['banner'];

				unlink($dellink1);


			}
		}

		$delquery= "DELETE FROM tbl_city WHERE id= '$cityid'";
		$deldata = $db->delete($delquery);
		if ($deldata) {
			echo "<script>alert('Information Deleted Successfully.');</script>";
			echo "<script>window.location='citylist.php';</script>";
		} else{
			echo "<script>alert('Information not Deleted.');</script>";
			echo "<script>window.location='citylist.php';</script>";
		}
	}

?>