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
        <h2>Add New Room</h2>
        <div class="block">  
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $hotelId = mysqli_real_escape_string($db->link, $_POST['hotelId']);
    $type = mysqli_real_escape_string($db->link, $_POST['type']);
    $price = mysqli_real_escape_string($db->link, $_POST['price']);
    $booked = mysqli_real_escape_string($db->link, $_POST['booked']);
    $max = mysqli_real_escape_string($db->link, $_POST['max']);
    // $userid = mysqli_real_escape_string($db->link, $_POST['userid']);

    $permited  = array('jpg', 'jpeg', 'png', 'gif');

        
    //image1
    $file_name = $_FILES['image5']['name'];
    $file_size = $_FILES['image5']['size'];
    $file_temp = $_FILES['image5']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = "room5_".substr(md5(time()), 0, 7).substr(md5($file_temp), 0, 7).'.'.$file_ext;
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
    $file_name = $_FILES['image6']['name'];
    $file_size = $_FILES['image6']['size'];
    $file_temp = $_FILES['image6']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = "room6_".substr(md5(time()), 0, 7).substr(md5($file_temp), 0, 7).'.'.$file_ext;
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
    $file_name = $_FILES['image7']['name'];
    $file_size = $_FILES['image7']['size'];
    $file_temp = $_FILES['image7']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = "room7_".substr(md5(time()), 0, 7).substr(md5($file_temp), 0, 7).'.'.$file_ext;
    $uploaded_image3 = "upload/".$unique_image;
  
   if ($file_size >1048567) {
        echo "<span class='error'>Image Size should be less then 1MB! </span>";
    } 
    elseif (in_array($file_ext, $permited) === false) {
    echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
    } else{
        move_uploaded_file($file_temp, $uploaded_image3);
    }

    if($hotelId == "" || $type == "" || $price == "" || $max == "" || $booked == "" || $uploaded_image1 == "" || $uploaded_image2 == "" || $uploaded_image3 == ""){
        echo "<span class='error'>Field must not be empty.</span>"; 
       } 
       else {
    
    $query = "INSERT INTO tbl_room(hotelId, type, price, max, booked, image5, image6, image7) VALUES('$hotelId', '$type', '$price', '$max', '$booked', '$uploaded_image1','$uploaded_image2','$uploaded_image3')";
    $inserted_rows = $db->insert($query);
    if ($inserted_rows) {
     echo "<span class='success'>Data Inserted Successfully.</span>";
        }else {
         echo "<span class='error'>Data Not Inserted !</span>";
        }
  }
}

?>      
         <form action="roomadd.php" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td><label>Type</label></td>
                    <td><input type="text" name="type" placeholder="Enter Type..." class="medium" /></td>
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
                    <td><label>Price</label></td>
                    <td><input type="text" name="price" placeholder="Enter price..." class="medium" /></td>
                </tr>
                <tr>
                    <td><label>Max</label></td>
                    <td><input type="text" name="max" placeholder="Enter max..." class="medium" /></td>
                </tr>
                <tr>
                    <td><label>Current State</label></td>
                    <td>
                        <select id="select" name="booked">

                            <option value="0">Non-Booked</option>
                            <option value="1">Booked</option>

                         </select>
                    </td>
                </tr>            
                <tr>
                    <td><label>Upload Image 1</label></td>
                    <td><input type="file" name="image5" /></td>
                </tr>
                <tr>
                    <td><label>Upload Image 2</label></td>
                    <td><input type="file" name="image6" /></td>
                </tr>
                <tr>
                    <td><label>Upload Image 3</label></td>
                    <td><input type="file" name="image7" /></td>
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


