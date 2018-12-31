<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
if (!isset($_GET['msgid']) || $_GET['msgid'] == NULL) {
echo"<script>window.location = 'inbox.php';</script>";
} else{
    $id = $_GET['msgid'];
}

?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>View Message</h2>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
echo"<script>window.location = 'inbox.php';</script>";
}
?>        
 <div class="block">       
         <form action="" method="post">
               <?php
                    $query= "select * from tbl_contact where id ='$id'";
                    $message= $db->select($query);
                    if ($message) {
                        while ($result = $message->fetch_assoc()) {
                    ?>
            <table class="form">
                <tr>
                    <td><label>Name</label></td>
                    <td><?php echo $result['firstname']." ".$result['lastname'];?></td>
                </tr>
                 <tr>
                    <td><label>Email</label></td>
                    <td><?php echo $result['email'];?></td>
                </tr>
                 <tr>
                    <td><label>Date</label></td>
                    <td><?php echo $fm->formatDate($result['date']);?></td>
                </tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr>
                    <td><label>Message</label></td>
                    <td><?php echo $result['body']; ?></td>
                </tr>

				<tr>
                    <td></td>
                    <td><input type="submit" name="submit" Value="Ok" /></td>
                </tr>
            </table>
            <?php } }?>
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