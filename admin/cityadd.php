<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php $userid = Session::get('userId');?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New City</h2>
        <div class="block">  
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cityname = mysqli_real_escape_string($db->link, $_POST['cityName']);
    $body = mysqli_real_escape_string($db->link, $_POST['body']);
    $understand = mysqli_real_escape_string($db->link, $_POST['understand']);
    $getaround = mysqli_real_escape_string($db->link, $_POST['getaround']);
    $getin = mysqli_real_escape_string($db->link, $_POST['getin']);
    $see = mysqli_real_escape_string($db->link, $_POST['see']);
    $do= mysqli_real_escape_string($db->link, $_POST['do']);
    $eat= mysqli_real_escape_string($db->link, $_POST['eat']);
    $buy= mysqli_real_escape_string($db->link, $_POST['buy']);
    $sleep= mysqli_real_escape_string($db->link, $_POST['sleep']);

    // $userid = mysqli_real_escape_string($db->link, $_POST['userid']);

    $permited  = array('jpg', 'jpeg', 'png', 'gif');

        
    //image1
    $file_name = $_FILES['banner']['name'];
    $file_size = $_FILES['banner']['size'];
    $file_temp = $_FILES['banner']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = "banner_".substr(md5(time()), 0, 7).substr(md5($file_temp), 0, 7).'.'.$file_ext;
    $uploaded_image1 = "upload/".$unique_image;
  
   if ($file_size >1048567) {
        echo "<span class='error'>Image Size should be less then 1MB! </span>";
    } 
    elseif (in_array($file_ext, $permited) === false) {
    echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
    } else{
        move_uploaded_file($file_temp, $uploaded_image1);
    }
    

    if($cityname == "" || $body == "" || $understand == "" || $getin == "" || $getaround == "" || $see == "" || $do == "" || $buy == "" || $eat == "" || $sleep == "" || $uploaded_image1 == "" ){
        echo "<span class='error'>Field must not be empty.</span>"; 
       } 
       else {
    
    $query = "INSERT INTO tbl_city(cityName, description, understand, getin, getaround, see, do, buy, eat, sleep, banner) VALUES('$cityname', '$body', '$understand','$getin','$getaround','$see', '$do', '$buy', '$eat','$sleep', '$uploaded_image1')";
    $inserted_rows = $db->insert($query);
    if ($inserted_rows) {
     echo "<span class='success'>Data Inserted Successfully.</span>";
        }else {
         echo "<span class='error'>Data Not Inserted !</span>";
        }
  }
}

?>      
         <form action="cityadd.php" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td><label>City Name</label></td>
                    <td><input type="text" name="cityName" placeholder="Enter City Name..." class="medium" /></td>
                </tr>
				<tr>
                    <td style="vertical-align: top; padding-top: 9px;"><label>Description</label></td>
                    <td><textarea name="body" class="tinymce"></textarea></td>
                </tr>
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;"><label>Understand</label></td>
                    <td><textarea name="understand" class="tinymce"></textarea></td>

                </tr>
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;"><label>Getin</label></td>
                    <td><textarea name="getin" class="tinymce"></textarea></td>

                </tr>          				
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;"><label>Getaround</label></td>
                    <td><textarea name="getaround" class="tinymce"></textarea></td>
                </tr>
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;"><label>See</label></td>
                    <td><textarea name="see" class="tinymce"></textarea></td>
                </tr>
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;"><label>Do</label></td>
                    <td><textarea name="do" class="tinymce"></textarea></td>
                </tr>
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;"><label>Buy</label></td>
                    <td><textarea name="buy" class="tinymce"></textarea></td>
                </tr> 
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;"><label>Eat</label></td>
                    <td><textarea name="eat" class="tinymce"></textarea></td>
                </tr>
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;"><label>Sleep</label></td>
                    <td><textarea name="sleep" class="tinymce"></textarea></td>
                </tr>          
                <tr>
                    <td><label>Upload Image</label></td>
                    <td><input type="file" name="banner" /></td>
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


