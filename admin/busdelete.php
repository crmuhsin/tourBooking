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
	if (!isset($_GET['delbusid']) || $_GET['delbusid'] == NULL) {
	    echo "<script>window.location='buslist.php';</script>";
	} else{
	    $busid = $_GET['delbusid'];
		$query = "SELECT * FROM tbl_bus WHERE id='$busid'";
		$getdata = $db->select($query);
		if($getdata){
			while($delimg=$getdata->fetch_assoc()){
				$dellink1=$delimg['image'];

				unlink($dellink1);


			}
		}

		$delquery= "DELETE FROM tbl_bus WHERE id= '$busid'";
		$deldata = $db->delete($delquery);
		if ($deldata) {
			echo "<script>alert('Information Deleted Successfully.');</script>";
			echo "<script>window.location='buslist.php';</script>";
		} else{
			echo "<script>alert('Information not Deleted.');</script>";
			echo "<script>window.location='buslist.php';</script>";
		}
	}

?>