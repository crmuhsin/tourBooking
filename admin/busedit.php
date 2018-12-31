<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
if (!isset($_GET['editbusid']) || $_GET['editbusid'] == NULL) {
    echo "<script>window.location='buslist.php';</script>";
} else{
    $busid = $_GET['editbusid'];
}

?>
<?php $userid = Session::get('userId');?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Update bus Information</h2>
         
<?php
$squery= "SELECT * FROM tbl_bus WHERE id = '$busid'";
$cpost= $db->select($squery);
if ($cpost) {
    while ($iresult = $cpost->fetch_assoc()) {
        $uploaded_image1 = $iresult['image'];



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $companyname = mysqli_real_escape_string($db->link, $_POST['companyName']);
    $destination = mysqli_real_escape_string($db->link, $_POST['destination']);
    $leavingfrom = mysqli_real_escape_string($db->link, $_POST['leavingfrom']);
    $dep_date = mysqli_real_escape_string($db->link, $_POST['dep_date']);
    $time = mysqli_real_escape_string($db->link, $_POST['time']);
    $acfare= mysqli_real_escape_string($db->link, $_POST['acfare']);
    $nonacfare= mysqli_real_escape_string($db->link, $_POST['nonacfare']);
    


    $permited  = array('jpg', 'jpeg', 'png', 'gif');

        
    //image1
    if ($_FILES['image']['name']) {
        
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];


    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = "bus_".substr(md5(time()), 0, 7).substr(md5($file_temp), 0, 7).'.'.$file_ext;
    $uploaded_image1 = "upload/".$unique_image;
  
   if ($file_size >1048567) {
        echo "<span class='error'>Image Size should be less then 1MB! </span>";
    } 
    elseif (in_array($file_ext, $permited) === false) {
    echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
    } else{
        move_uploaded_file($file_temp, $uploaded_image1);
    }
    }

 if (!empty($uploaded_image1))
        {
    if($companyname == "" || $destination == "" || $leavingfrom == "" || $dep_date=="" || $time == "" || $acfare == "" || $nonacfare == ""){
        echo "<span class='error'>Field must not be empty.</span>"; 
       } else{
       
    
    $query="UPDATE tbl_bus
            SET 
            companyName     ='$companyname',
            destination     ='$destination',
            leavingfrom     ='$leavingfrom',
            dep_date        ='$dep_date',
            time            ='$time',
            acfare          ='$acfare',
            nonacfare       ='$nonacfare'
            WHERE id        ='$busid' ";
    $updated_row = $db->update($query);
    if ($updated_row) {
     echo "<span class='success'>Information Updated Successfully.
     </span>";
        }else {
         echo "<span class='error'>Information Not Updated !</span>";
        }
 }}  else{
    $query="UPDATE tbl_bus
            SET 
            companyName     ='$companyname',
            destination     ='$destination',
            leavingfrom     ='$leavingfrom',
            dep_date        ='$dep_date',
            time            ='$time',
            acfare          ='$acfare',
            nonacfare       ='$nonacfare',
            image           ='$uploaded_image1'
            WHERE id        ='$busid' ";
    $updated_row = $db->update($query);
    if ($updated_row) {
     echo "<span class='success'>Information Updated Successfully.
     </span>";
        }else {
         echo "<span class='error'>Information Not Updated !</span>";
}
}

}}}
?>      <div class="block"> 
        <?php
                $query= "SELECT * FROM tbl_bus WHERE id= '$busid' ";
                $getbus= $db->select($query);
                if ($getbus) {
                  while ($busresult = $getbus->fetch_assoc()) {
        ?>
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td><label>Company Name</label></td>
                    <td><input type="text" name="companyName" value="<?php echo $busresult['companyName'] ; ?>" class="medium" /></td>
                </tr>
                
                <tr>
                    <td><label>Destination</label></td>
                    <td>
                        <select id="select" name="destination">
                            <option>Select City</option>
                            <?php
                            $r = "SELECT * FROM tbl_city";
                            $read = $db->select($r);
                            if ($read) {
                            while ($result = $read->fetch_assoc()) {
                         ?>
                            <option 
                            <?php
                            if ($busresult['destination']== $result['id']){ ?>
                                selected="selected"
                            <?php } ?>  value="<?php echo $result['id'];?>"><?php echo $result['cityName'];?></option>
                           <?php } } ?>
                         </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Leaving From</label></td>
                    <td>
                        <select id="select" name="leavingfrom">
                            <option>Select City</option>
                            <?php
                            $r = "SELECT * FROM tbl_city";
                            $read = $db->select($r);
                            if ($read) {
                            while ($result = $read->fetch_assoc()) {
                         ?>
                            <option 
                            <?php
                            if ($busresult['leavingfrom']== $result['id']){ ?>
                                selected="selected"
                            <?php } ?>  value="<?php echo $result['id'];?>"><?php echo $result['cityName'];?></option>
                           <?php } } ?>
                         </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Departure Date</label></td>
                    <td><input type="text" name="dep_date" value="<?php echo $busresult['dep_date'] ; ?>" class="medium" /></td>
                </tr>
                                   
                <tr>
                    <td><label>Departure Time</label></td>
                    <td><input type="text" name="time" value="<?php echo $busresult['time'] ; ?>" class="medium" /></td>
                </tr> 
                <tr>
                    <td><label>AC Fare</label></td>
                    <td>$<input type="text" name="acfare" value="<?php echo $busresult['acfare'] ; ?>" class="medium" /></td>
                </tr>
                <tr>
                    <td><label>No AC Fare</label></td>
                    <td>$<input type="text" name="nonacfare" value="<?php echo $busresult['nonacfare'] ; ?>" class="medium" /></td>
                </tr>                       
                
                <tr>
                    <td></td>
                    <td><img src="<?php echo $busresult['image'] ; ?>" height="80px" width="200px" /></td>
                </tr>

                <tr>
                    <td><label>Upload Image 1</label></td>
                    <td><input type="file" name="image" /></td>
                </tr>

                
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" Value="Save" /></td>
                </tr>
            </table>
            </form>
            <?php } } ?>
        </div>
    </div>
</div>

<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


