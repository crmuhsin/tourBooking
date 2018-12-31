<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
if (!isset($_GET['edithotelid']) || $_GET['edithotelid'] == NULL) {
    echo "<script>window.location='hotellist.php';</script>";
} else{
    $hotelid = $_GET['edithotelid'];
}

?>
<?php $userid = Session::get('userId');?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Hotel Information</h2>
         
<?php
$squery= "SELECT * FROM tbl_hotel WHERE id = '$hotelid'";
$hpost= $db->select($squery);
if ($hpost) {
    while ($iresult = $hpost->fetch_assoc()) {
        $uploaded_image1 = $iresult['image1'];
        $uploaded_image2 = $iresult['image2'];
        $uploaded_image3 = $iresult['image3'];
        $uploaded_image4 = $iresult['image4'];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = mysqli_real_escape_string($db->link, $_POST['title']);
    $cityId = mysqli_real_escape_string($db->link, $_POST['cityId']);
    $body = mysqli_real_escape_string($db->link, $_POST['body']);
    $tags = mysqli_real_escape_string($db->link, $_POST['tags']);
    $location = mysqli_real_escape_string($db->link, $_POST['location']);
    $userrating = mysqli_real_escape_string($db->link, $_POST['userrating']);
    $author = mysqli_real_escape_string($db->link, $_POST['author']);
    // $userid = mysqli_real_escape_string($db->link, $_POST['userid']);



    $permited  = array('jpg', 'jpeg', 'png', 'gif');

        
    //image1
    if ($_FILES['image1']['name']) {
        
    $file_name = $_FILES['image1']['name'];
    $file_size = $_FILES['image1']['size'];
    $file_temp = $_FILES['image1']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = "hotel1_".substr(md5(time()), 0, 7).substr(md5($file_temp), 0, 7).'.'.$file_ext;
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
    if ($_FILES['image2']['name']) {

    $file_name = $_FILES['image2']['name'];
    $file_size = $_FILES['image2']['size'];
    $file_temp = $_FILES['image2']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = "hotel2_".substr(md5(time()), 0, 7).substr(md5($file_temp), 0, 7).'.'.$file_ext;
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
    if ($_FILES['image3']['name']) {
        
    $file_name = $_FILES['image3']['name'];
    $file_size = $_FILES['image3']['size'];
    $file_temp = $_FILES['image3']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = "hotel3_".substr(md5(time()), 0, 7).substr(md5($file_temp), 0, 7).'.'.$file_ext;
    $uploaded_image3 = "upload/".$unique_image;
  
   if ($file_size >1048567) {
        echo "<span class='error'>Image Size should be less then 1MB! </span>";
    } 
    elseif (in_array($file_ext, $permited) === false) {
    echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
    } else{
        move_uploaded_file($file_temp, $uploaded_image3);
    }}




    //image4
    if ($_FILES['image4']['name']) {
        
    $file_name = $_FILES['image4']['name'];
    $file_size = $_FILES['image4']['size'];
    $file_temp = $_FILES['image4']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = "hotel4_".substr(md5(time()), 0, 7).substr(md5($file_temp), 0, 7).'.'.$file_ext;
    $uploaded_image4 = "upload/".$unique_image;
  
   if ($file_size >1048567) {
        echo "<span class='error'>Image Size should be less then 1MB! </span>";
    } 
    elseif (in_array($file_ext, $permited) === false) {
    echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
    } else{
        move_uploaded_file($file_temp, $uploaded_image4);
    }}




 if (!empty($uploaded_image1))
        {
    if($title == "" || $cityId == "" || $body == "" || $author == "" || $tags == "" || $location == "" || $userrating == ""){
        echo "<span class='error'>Field must not be empty.</span>"; 
       } else{
       
    
    $query="UPDATE tbl_hotel
            SET 
            cityId          ='$cityId',
            title           ='$title',
            body            ='$body',
            image1          ='$uploaded_image1',
            image2          ='$uploaded_image2',
            image3          ='$uploaded_image3',
            image4          ='$uploaded_image4',
            location        ='$location',
            author          ='$author',
            tags            ='$tags',
            userrating      ='$userrating',
            userid          ='$userid'
            WHERE id        ='$hotelid' ";
    $updated_row = $db->update($query);
    if ($updated_row) {
     echo "<span class='success'>Information Updated Successfully.
     </span>";
        }else {
         echo "<span class='error'>Information Not Updated !</span>";
        }
 }}  else{
    $query="UPDATE tbl_hotel
            SET 
            cityId          ='$cityId',
            title           ='$title',
            body            ='$body',
            location        ='$location',
            author          ='$author',
            tags            ='$tags',
            userrating      ='$userrating',
            userid          ='$userid'
            WHERE id        ='$hotelid' ";
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
                $query= "SELECT * FROM tbl_hotel WHERE id= '$hotelid' ";
                $gethotel= $db->select($query);
                  while ($hotelresult = $gethotel->fetch_assoc()) {
        ?>
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td><label>Title</label></td>
                    <td><input type="text" name="title" value="<?php echo $hotelresult['title'] ; ?>" class="medium" /></td>
                </tr>
				<tr>
                    <td><label>City</label></td>
                    <td>
                        <select id="select" name="cityId">
                            <option>Select City</option>
                            <?php
                            $r = "SELECT * FROM tbl_city";
                            $read = $db->select($r);
                            if ($read) {
                            while ($result = $read->fetch_assoc()) {
                         ?>
                            <option 
                            <?php
                            if ($hotelresult['cityId']== $result['id']){ ?>
                                selected="selected"
                            <?php } ?>  value="<?php echo $result['id'];?>"><?php echo $result['cityName'];?></option>
                           <?php } } ?>
                         </select>
                    </td>
                </tr>
				<tr>
                    <td style="vertical-align: top; padding-top: 9px;"><label>Content</label></td>
                    <td><textarea name="body" class="tinymce">
                    <?php echo $hotelresult['body'] ; ?>
                    </textarea></td>
                </tr>
                <tr>
                    <td><label>Address</label></td>
                    <td><input type="text" name="location" value="<?php echo $hotelresult['location'] ; ?>" class="medium" /></td>
                </tr>
                <tr>
                    <td><label>Tags</label></td>
                    <td><input type="text" name="tags" value="<?php echo $hotelresult['tags'] ; ?>" class="medium" /></td>
                </tr>
                <tr>
                    <td><label>Author</label></td>
                    <td><input type="text" name="author" value="<?php echo $hotelresult['author'] ; ?>" /></td>
                    <td><?php Session::get('userId');?></td>

                </tr>                           
                <tr>
                    <td><label>User Ratings</label></td>
                    <td><input type="text" name="userrating" value="<?php echo $hotelresult['userrating'] ; ?>" class="medium" /></td>
                </tr>          				
            
                <tr>
                    <td></td>
                    <td><img src="<?php echo $hotelresult['image1'] ; ?>" height="80px" width="200px" /></td>
                </tr>

                <tr>
                    <td><label>Upload Image 1</label></td>
                    <td><input type="file" name="image1" /></td>
                </tr>

                <tr>
                    <td></td>
                    <td><img src="<?php echo $hotelresult['image2'] ; ?>" height="80px" width="200px" /></td>
                </tr>

                <tr>
                    <td><label>Upload Image 2</label></td>
                    <td><input type="file" name="image2" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><img src="<?php echo $hotelresult['image3'] ; ?>" height="80px" width="200px" /></td>
                </tr>

                <tr>
                    <td><label>Upload Image 3</label></td>
                    <td><input type="file" name="image3" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><img src="<?php echo $hotelresult['image4'] ; ?>" height="80px" width="200px" /></td>
                </tr>

                <tr>
                    <td><label>Upload Image 4</label></td>
                    <td><input type="file" name="image4" /></td>
                </tr>
                

                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" Value="Save" /></td>
                </tr>
            </table>
            </form>
            <?php } ?>
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


