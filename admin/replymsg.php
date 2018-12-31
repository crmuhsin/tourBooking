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
    $to       = $_POST['to'];
    $from     = $fm->validation($_POST['fromEmail']);
    $subject  = $fm->validation($_POST['subject']);
    $message  = $fm->validation($_POST['message']);
    $sendmail = mail($to, $subject, $message, $from);
    if ($sendmail) {
       echo "<span class='success'>Mail Sent Successfully.</span>";
        }else {
         echo "<span class='error'>Error: Not Sent!</span>";
        }
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
                    <td><label>To</label></td>
                    <td><input type="text" name="to" value="<?php echo $result['email'];?>"></td>
                </tr>
                <tr>
                    <td><label>From</label></td>
                    <td><input type="text" name="fromEmail" placeholder="Enter email..." class="medium" /></td>
                </tr>
                <tr>
                    <td><label>Subject</label></td>
                    <td><input type="text" name="subject" placeholder="Enter subject..." class="medium" /></td>
                </tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr>
                    <td><label>Reply Message</label></td>
                    <td><textarea name="message" class="tinymce"></textarea></td>
                </tr>

				<tr>
                    <td></td>
                    <td><input type="submit" name="submit" Value="Send" /></td>
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