<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    $userid = Session::get('userId');
    $userrole = Session::get('userRole');

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Change Password</h2>
        <div class="block"> 
<?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $oldpassword= $fm->validation(md5($_POST['oldpassword']));
            $newpassword= $fm->validation(md5($_POST['newpassword']));

            $oldpassword = mysqli_real_escape_string($db->link, $oldpassword);
            $newpassword = mysqli_real_escape_string($db->link, $newpassword);

            $query = "SELECT * FROM tbl_user WHERE id = '$userid' AND password = '$oldpassword'";
            $result = $db->select($query);  
            
            if ($result != false) {
                    //$value = $result->fetch_assoc();

             $query=" UPDATE tbl_user
             SET 
             password     = '$newpassword'
             WHERE id = '$userid'";
             $updated_row = $db->update($query);
             if ($updated_row) {
             echo "<span class='success'>Password Updated Successfully.
             </span>";
                }else {
                 echo "<span class='error'>Password Not Updated !</span>";
                    }
                }
            else{
                echo "<span class='error'>Password not matched!</span>";
                
            }
        }

        ?>      
         <form method="post" action="changepassword.php">
            <table class="form">                    
                <tr>
                    <td>
                        <label>Old Password</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Enter Old Password..."  name="oldpassword" class="medium" />
                    </td>
                </tr>
                 <tr>
                    <td>
                        <label>New Password</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Enter New Password..." name="newpassword" class="medium" />
                    </td>
                </tr>
                 
                
                 <tr>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>