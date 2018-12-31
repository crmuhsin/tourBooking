<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php $userid = Session::get('userId');?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New bus</h2>
        <div class="block">  
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $companyName = mysqli_real_escape_string($db->link, $_POST['companyName']);
    $destination = mysqli_real_escape_string($db->link, $_POST['destination']);
    $leavingfrom = mysqli_real_escape_string($db->link, $_POST['leavingfrom']);
    $date = mysqli_real_escape_string($db->link, $_POST['dep_date']);
    $time = mysqli_real_escape_string($db->link, $_POST['time']);
    $acfare = mysqli_real_escape_string($db->link, $_POST['acfare']);
    $nonacfare = mysqli_real_escape_string($db->link, $_POST['nonacfare']);

    // $userid = mysqli_real_escape_string($db->link, $_POST['userid']);

    $permited  = array('jpg', 'jpeg', 'png', 'gif');

        
    //image1
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
    

    if($companyName == "" || $destination == "" || $leavingfrom == "" || $date == "" || $time== "" || $acfare="" || $nonacfare="" || 
        $uploaded_image1 == ""){
        echo "<span class='error'>Field must not be empty.</span>"; 
       } 
       else {
    
    $query = "INSERT INTO tbl_bus(companyName, destination, leavingfrom, dep_date, time, acfare, nonacfare, image) VALUES('$companyName', '$destination', '$leavingfrom', '$date', '$time', '$acfare','$nonacfare','$uploaded_image1')";
    $inserted_rows = $db->insert($query);
    if ($inserted_rows) {
     echo "<span class='success'>Data Inserted Successfully.</span>";
        }else {
         echo "<span class='error'>Data Not Inserted !</span>";
        }
  }
}

?>      
         <form action="busadd.php" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td><label>CompanyName</label></td>
                    <td><input type="text" name="companyName" placeholder="Enter Company Name..." class="medium" /></td>
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
                            <option value="<?php echo $result['id'];?>"><?php echo $result['cityName'];?></option>
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
                            <option value="<?php echo $result['id'];?>"><?php echo $result['cityName'];?></option>
                           <?php } } ?>
                         </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Departure date</label></td>
                    <td><input type="text" name="dep_date" placeholder="Enter leaving date..." class="medium"></td>
                    
                </tr>
              <tr>
                    <td><label>Departure Time</label></td>
                    <td><input type="text" name="time" placeholder="Enter leaving time..." class="medium" /></td>
                </tr>
                <tr>
                    <td><label>AC Fare</label></td>
                    <td><input type="text" name="acfare" class="medium" /></td>
                </tr>
                <tr>
                    <td><label>Non AC Fare</label></td>
                    <td><input type="text" name="nonacfare" class="medium" /></td>
                </tr>

                <tr>
                    <td><label>Upload Image</label></td>
                    <td><input type="file" name="image" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" Value="Save" /></td>
                </tr>
            </table>
            </form>
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


