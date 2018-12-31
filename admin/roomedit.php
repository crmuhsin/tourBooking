<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
if (!isset($_GET['editroomid']) || $_GET['editroomid'] == NULL) {
    echo "<script>window.location='roomlist.php';</script>";
} else{
    $roomid = $_GET['editroomid'];
}

?>
<?php $userid = Session::get('userId');?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Room Information</h2>
         
<?php
$squery= "SELECT * FROM tbl_room WHERE id = '$roomid'";
$hpost= $db->select($squery);
if ($hpost) {
    while ($iresult = $hpost->fetch_assoc()) {
        $uploaded_image1 = $iresult['image5'];
        $uploaded_image2 = $iresult['image6'];
        $uploaded_image3 = $iresult['image7'];


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

    $hotelId = mysqli_real_escape_string($db->link, $_POST['hotelId']);
    $type = mysqli_real_escape_string($db->link, $_POST['type']);
    $price = mysqli_real_escape_string($db->link, $_POST['price']);
    $booked = mysqli_real_escape_string($db->link, $_POST['booked']);
    $max = mysqli_real_escape_string($db->link, $_POST['max']);
    // $userid = mysqli_real_escape_string($db->link, $_POST['userid']);



    $permited  = array('jpg', 'jpeg', 'png', 'gif');

        
    //image1
    if ($_FILES['image5']['name']) {
        
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
    }
    


    //image2
    if ($_FILES['image6']['name']) {

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
    }


    //image3
    if ($_FILES['image7']['name']) {
        
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
    }}

 if (!empty($uploaded_image1) && !empty($uploaded_image2) && !empty($uploaded_image3))
        {
    if($hotelId == "" || $type == "" || $price == "" || $booked == "" || $max == ""){
        echo "<span class='error'>Field must not be empty.</span>"; 
       } else{
       
    
    $query="UPDATE tbl_room
            SET 
            hotelId         ='$hotelId',
            type            ='$type',
            price           ='$price',
            booked          ='$booked',
            max             ='$max',
            image5          ='$uploaded_image1',
            image6          ='$uploaded_image2',
            image7          ='$uploaded_image3'
            
            WHERE id        ='$roomid' ";
    $updated_row = $db->update($query);
    if ($updated_row) {
     echo "<span class='success'>Information Updated Successfully.
     </span>";
        }else {
         echo "<span class='error'>Information Not Updated !</span>";
        }
 }}
}

}}
?>      <div class="block"> 
        <?php
                $query= "SELECT * FROM tbl_room WHERE id = '$roomid'";
                $getroom= $db->select($query);
                if($getroom){
                    while ($roomresult = $getroom->fetch_assoc()) {
        ?>
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td><label>Type</label></td>
                    <td><input type="text" name="type" value="<?php echo $roomresult['type'] ; ?>" class="medium" /></td>
                </tr>

                <tr>
                    <td><label>Hotel Name</label></td>
                    <td>
                        <select id="select" name="hotelId">
                            <option>Select Hotel</option>
                            <?php
                            $r = "SELECT * FROM tbl_hotel";
                            $read = $db->select($r);
                            if ($read) {
                            while ($result = $read->fetch_assoc()) {
                         ?>
                            <option 
                            <?php
                            if ($roomresult['hotelId']== $result['id']){ ?>
                                selected="selected"
                            <?php } ?>  value="<?php echo $result['id'];?>"><?php echo $result['title'];?></option>
                           <?php } } ?>
                         </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Price</label></td>
                    <td><input type="text" name="price" value="<?php echo $roomresult['price'] ; ?>" class="medium" /></td>
                </tr>
                <tr>
                    <td><label>Max</label></td>
                    <td><input type="text" name="max" value="<?php echo $roomresult['max'] ; ?>" class="medium" /></td>
                </tr>
                <tr>
                    <td><label>Current State</label></td>
                    <td>
                        <select id="select" name="booked">
                            <?php $b = $roomresult['booked'] ; 
                                if ($b=0) { ?>
                            
                            <option value="0">Non-Booked</option>
                                <?php }else{?>
                            <option value="1">Booked</option>
                                <?php }?>
                         </select>
                    </td>
                </tr>                         
                 <tr>
                    <td></td>
                    <td><img src="<?php echo $roomresult['image5'] ; ?>" height="80px" width="200px" /></td>
                </tr>

                <tr>
                    <td><label>Upload Image 1</label></td>
                    <td><input type="file" name="image5" /></td>
                </tr>

                <tr>
                    <td></td>
                    <td><img src="<?php echo $roomresult['image6'] ; ?>" height="80px" width="200px" /></td>
                </tr>

                <tr>
                    <td><label>Upload Image 2</label></td>
                    <td><input type="file" name="image6" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><img src="<?php echo $roomresult['image7'] ; ?>" height="80px" width="200px" /></td>
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
            <?php }} ?>
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


