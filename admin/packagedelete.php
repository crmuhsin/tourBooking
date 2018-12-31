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
	if (!isset($_GET['delpackageid']) || $_GET['delpackageid'] == NULL) {
	    echo "<script>window.location='packagelist.php';</script>";
	} else{
	    $packageid = $_GET['delpackageid'];
		$query = "SELECT * FROM tbl_package WHERE Packid='$packageid'";
		$getdata = $db->select($query);
		if($getdata){
			while($delimg=$getdata->fetch_assoc()){
				$dellink1=$delimg['Pic1'];
				$dellink2=$delimg['Pic2'];
				$dellink3=$delimg['Pic3'];
				unlink($dellink1);
				unlink($dellink2);
				unlink($dellink3);
				unlink($dellink4);

			}
		}

		$delquery= "DELETE FROM tbl_package WHERE Packid= '$packageid'";
		$deldata = $db->delete($delquery);
		if ($deldata) {
			echo "<script>alert('Information Deleted Successfully.');</script>";
			echo "<script>window.location='packagelist.php';</script>";
		} else{
			echo "<script>alert('Information not Deleted.');</script>";
			echo "<script>window.location='packagelist.php';</script>";
		}
	}

?>