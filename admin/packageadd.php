<?php include 'inc/header.php';?>
<script>
function getHotel(val) {
    $.ajax({
    type: "POST",
    url: "get_hotel.php",
    data:'city_id='+val,
    success: function(data){
        $("#hotel-list").html(data);
    }
    });
}

</script>





<?php include 'inc/sidebar.php';?>
<?php $userid = Session::get('userId');?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Package</h2>
        <div class="block">  
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $season = mysqli_real_escape_string($db->link, $_POST['season']);
    $hotelId = mysqli_real_escape_string($db->link, $_POST['hotelId']);
    $cityId = mysqli_real_escape_string($db->link, $_POST['cityId']);
    $Packname = mysqli_real_escape_string($db->link, $_POST['Packname']);
    $Packprice = mysqli_real_escape_string($db->link, $_POST['Packprice']);
    $Detail = mysqli_real_escape_string($db->link, $_POST['Detail']);
   
    // $userid = mysqli_real_escape_string($db->link, $_POST['userid']);

    $permited  = array('jpg', 'jpeg', 'png', 'gif');

        
    //image1
    $file_name = $_FILES['Pic1']['name'];
    $file_size = $_FILES['Pic1']['size'];
    $file_temp = $_FILES['Pic1']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 7).substr(md5($file_temp), 0, 7).'.'.$file_ext;
    $uploaded_image1 = "upload/".$unique_image;
  
   if ($file_size >1048567) {
        echo "<span class='error'>Image Size should be less then 1MB! </span>";
    } 
    elseif (in_array($file_ext, $permited) === false) {
    echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
    } else{
        move_uploaded_file($file_temp, $uploaded_image1);
    }
    


    //image2
    $file_name = $_FILES['Pic2']['name'];
    $file_size = $_FILES['Pic2']['size'];
    $file_temp = $_FILES['Pic2']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 7).substr(md5($file_temp), 0, 7).'.'.$file_ext;
    $uploaded_image2 = "upload/".$unique_image;
  
   if ($file_size >1048567) {
        echo "<span class='error'>Image Size should be less then 1MB! </span>";
    } 
    elseif (in_array($file_ext, $permited) === false) {
    echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
    } else{
        move_uploaded_file($file_temp, $uploaded_image2);
    }


    //image3
    $file_name = $_FILES['Pic3']['name'];
    $file_size = $_FILES['Pic3']['size'];
    $file_temp = $_FILES['Pic3']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 7).substr(md5($file_temp), 0, 7).'.'.$file_ext;
    $uploaded_image3 = "upload/".$unique_image;
  
   if ($file_size >1048567) {
        echo "<span class='error'>Image Size should be less then 1MB! </span>";
    } 
    elseif (in_array($file_ext, $permited) === false) {
    echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
    } else{
        move_uploaded_file($file_temp, $uploaded_image3);
    }
    
    if($season == "" || $hotelId == "" || $cityId == "" || $Packname == "" || $Packprice == "" || $Detail == "" ||              $uploaded_image1 == "" || $uploaded_image2 == "" || $uploaded_image3 == ""){
        echo "<span class='error'>Field must not be empty.</span>"; 
       } 
       else {
    
    $query = "INSERT INTO tbl_package(season, hotelId, cityId, Packname, Packprice, Pic1, Pic2, Pic3, Detail) VALUES('$season', '$hotelId', '$cityId', '$Packname', '$Packprice', '$uploaded_image1','$uploaded_image2','$uploaded_image3','$Detail')";
    $inserted_rows = $db->insert($query);
    if ($inserted_rows) {
     echo "<span class='success'>Data Inserted Successfully.</span>";
        }else {
         echo "<span class='error'>Data Not Inserted !</span>";
        }
  }
}

?>      
         <form action="packageadd.php" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td><label>Season</label></td>
                    <td>
                        <select id="select" name="season">
                            <option>Select season</option>
                            <option value="summer">Summer</option>
                            <option value="winter">Winter</option>
                        <select>
                    </td>
                </tr>
				<tr>
                    <td><label>City Name</label></td>
                    <td>
                        <select name="cityId" onChange="getHotel(this.value);">
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
                    <td><label>Hotel Name</label></td>
                    <td>
                        <select name="hotelId" id="hotel-list">
                            <option>Select Hotel</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Package Name</label></td>
                    <td><input type="text" name="Packname" placeholder="Enter Package Name..." class="medium" /></td>
                </tr>
                <tr>
                    <td><label>Package Price</label></td>
                    <td><input type="text" name="Packprice" placeholder="$" class="medium" /></td>
                </tr>
				
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;"><label>Detail</label></td>
                    <td><textarea name="Detail" class="tinymce"></textarea></td>
                </tr>
                           				            
                <tr>
                    <td><label>Upload Image 1</label></td>
                    <td><input type="file" name="Pic1" /></td>
                </tr>
                <tr>
                    <td><label>Upload Image 2</label></td>
                    <td><input type="file" name="Pic2" /></td>
                </tr>
                <tr>
                    <td><label>Upload Image 3</label></td>
                    <td><input type="file" name="Pic3" /></td>
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


