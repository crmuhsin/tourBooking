<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
if (!isset($_GET['editcityid']) || $_GET['editcityid'] == NULL) {
     echo "<script>window.location='citylist.php';</script>";
} else{
   $cityid = $_GET['editcityid'];
}

?>
<?php $userid = Session::get('userId');?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Update City Information</h2>
         
<?php
$squery= "SELECT * FROM tbl_city WHERE id = '$cityid'";
$cpost= $db->select($squery);
if ($cpost) {
    while ($iresult = $cpost->fetch_assoc()) {
       $uploaded_image1 = $iresult['banner'];



if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    
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
    if ($_FILES['banner']['name']) {
        
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
    }

 if (!empty($uploaded_image1))
        {
    if($cityname == "" || $body == "" || $understand == "" || $getin == "" || $getaround == "" || $see == "" || $do == "" || $buy == "" || $eat == "" || $sleep == ""){
        echo "<span class='error'>Field must not be empty.</span>"; 
       } else{
    $query="UPDATE tbl_city
            SET 
            cityName        ='$cityname',
            description     ='$body',
            understand      ='$understand',
            getin           ='$getin',
            getaround       ='$getaround',
            see             ='$see',
            do              ='$do',
            buy             ='$buy',
            eat             ='$eat',
            sleep           ='$sleep',
            banner          ='$uploaded_image1'
            WHERE id        ='$cityid' ";
    $updated_row = $db->update($query);
    if ($updated_row) {
     echo "<span class='success'>Information Updated Successfully.
     </span>";
        }else {
         echo "<span class='error'>Information Not Updated !</span>";
        }
    }
}  
}
}}
?>      <div class="block"> 
        <?php
            $query= "SELECT * FROM tbl_city WHERE id= '$cityid' ";
            $getcity= $db->select($query);
            if ($getcity) {
              while ($cityresult = $getcity->fetch_assoc()) {
        ?>
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td><label>City Name</label></td>
                    <td><input type="text" name="cityName" value="<?php echo $cityresult['cityName'] ; ?>" class="medium" /></td>
                </tr>
				
				<tr>
                    <td style="vertical-align: top; padding-top: 9px;"><label>Description</label></td>
                    <td><textarea name="body" class="tinymce">
                    <?php echo $cityresult['description'] ; ?>
                    </textarea></td>
                </tr>
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;"><label>Understand</label></td>
                    <td><textarea name="understand" class="tinymce">
                    <?php echo $cityresult['understand'] ; ?>
                    </textarea></td>
                </tr>
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;"><label>Getin</label></td>
                    <td><textarea name="getin" class="tinymce">
                    <?php echo $cityresult['getin'] ; ?>
                    </textarea></td>
                </tr>
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;"><label>Getaround</label></td>
                    <td><textarea name="getaround" class="tinymce">
                    <?php echo $cityresult['getaround'] ; ?>
                    </textarea></td>
                </tr>                   
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;"><label>See</label></td>
                    <td><textarea name="see" class="tinymce">
                    <?php echo $cityresult['see'] ; ?>
                    </textarea></td>
                </tr> 
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;"><label>Do</label></td>
                    <td><textarea name="do" class="tinymce">
                    <?php echo $cityresult['do'] ; ?>
                    </textarea></td>
                </tr>
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;"><label>Buy</label></td>
                    <td><textarea name="buy" class="tinymce">
                    <?php echo $cityresult['buy'] ; ?>
                    </textarea></td>
                </tr>        				
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;"><label>Eat</label></td>
                    <td><textarea name="eat" class="tinymce">
                    <?php echo $cityresult['eat'] ; ?>
                    </textarea></td>
                </tr>
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;"><label>Sleep</label></td>
                    <td><textarea name="sleep" class="tinymce">
                    <?php echo $cityresult['sleep'] ; ?>
                    </textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><img src="<?php echo $cityresult['banner'] ; ?>" height="80px" width="200px" /></td>
                </tr>

                <tr>
                    <td><label>Upload Image 1</label></td>
                    <td><input type="file" name="banner" /></td>
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


