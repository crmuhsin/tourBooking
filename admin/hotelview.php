<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
if (!isset($_GET['viewhotelid']) || $_GET['viewhotelid'] == NULL) {
    echo "<script>window.location='hotellist.php';</script>";
} else{
    $hotelid = $_GET['viewhotelid'];
}

?>
<?php $userid = Session::get('userId');?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>View Information</h2>
         
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "<script>window.location='hotellist.php';</script>";

}
?>      <div class="block"> 
        <?php
                $query= "SELECT * FROM tbl_hotel WHERE id= '$hotelid' ORDER By id DESC";
                $getinfo= $db->select($query);
                  while ($inforesult = $getinfo->fetch_assoc()) {
        ?>
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td><label>Title</label></td><td></td>
                    <td><?php echo $inforesult['title'] ; ?></td>
                </tr>
				<tr>
                    <td><label>City</label></td><td></td>
                    <td>
                        <select id="select" name="cat">
                            <option>Select City</option>
                            <?php
                            $r = "SELECT * FROM tbl_city";
                            $read = $db->select($r);
                            if ($read) {
                            while ($result = $read->fetch_assoc()) {
                         ?>
                            <option 
                            <?php
                            if ($inforesult['cityId'] == $result['id']){ ?>
                                selected="selected"
                            <?php } ?>  value="<?php echo $result['id'];?>"><?php echo $result['cityName'];?></option>
                           <?php } } ?>
                         </select>
                    </td>
                </tr>
				<tr>
                    <td style="vertical-align: top; padding-top: 9px;"><label>Content</label></td><td></td>
                    <td><?php echo $inforesult['body'] ; ?></td>
                </tr>

                <tr>
                    <td><label>Tags</label></td><td></td>
                    <td><?php echo $inforesult['tags'] ; ?></td>
                </tr>
                <tr>
                    <td><label>Author</label></td><td></td>
                    <td><?php echo $inforesult['author'] ; ?></td>

                </tr>  
                <tr>
                    <td><label>Address</label></td><td></td>
                    <td><?php echo $inforesult['location'] ; ?></td>
                </tr>
                <tr>
                    <td><label>User Rating</label></td><td></td>
                    <td><?php echo $inforesult['userrating'] ; ?></td>

                </tr>       

            				
            
                <tr>
                    <td><label>Image1</label></td><td></td>
                    <td>
                        <img src="<?php echo $inforesult['image1'] ; ?>" height="100px" width="250px" />
                    </td>
                </tr>
                <tr>
                    <td><label>Image2</label></td><td></td>
                    <td>
                        <img src="<?php echo $inforesult['image2'] ; ?>" height="100px" width="250px" />
                    </td>
                </tr>
                <tr>
                    <td><label>Image3</label></td><td></td>
                    <td>
                        <img src="<?php echo $inforesult['image3'] ; ?>" height="100px" width="250px" />
                    </td>
                </tr>
                <tr>
                    <td><label>Image4</label></td><td></td>
                    <td>
                        <img src="<?php echo $inforesult['image4'] ; ?>" height="100px" width="250px" />
                    </td>
                </tr>
                <tr>
                    <td></td><td></td>
                    <td><input type="submit" name="submit" Value="Ok" /></td>
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


