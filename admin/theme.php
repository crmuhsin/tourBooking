<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Change Theme</h2>
               <div class="block copyblock"> 
                <?php
                if ($_SERVER['REQUEST_METHOD']=='POST') {
                    $theme = mysqli_real_escape_string($db->link, $_POST['theme']);
                    $query = "UPDATE tbl_theme 
                                SET theme = '$theme' 
                                WHERE id = '1' ";
                            $updatedrow = $db->update($query);
                            if($updatedrow){
                                echo "<span class='success'>Theme Changed.</span>";
                            }else{
                                echo "<span class='error'>Theme not Changed.</span>"; 
                            }
                        }
                    $uquery = "SELECT * FROM tbl_theme WHERE id = '1' ";
                    $themes = $db->select($uquery); 
                    while ($result = $themes->fetch_assoc()) {
                    ?>
                 <form action="" method="post">
                    <table class="form">                    
                        <tr>
                            <td>
                                <input <?php if ($result['theme'] == 'default') { echo "checked"; }?> type="radio" name="theme" id="default" value="default" /><label for="default">Default</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input <?php if ($result['theme'] == 'black') { echo "checked"; }?> type="radio" name="theme" id="black" value="black" /><label for="black">Black</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input <?php if ($result['theme'] == 'blue') { echo "checked"; }?> type="radio" name="theme" id="blue" value="blue" /><label for="blue">Blue</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input <?php if ($result['theme'] == 'orange') { echo "checked"; }?> type="radio" name="theme" id="orange" value="orange" /><label for="orange">Orange</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input <?php if ($result['theme'] == 'pink') { echo "checked"; }?> type="radio" name="theme" id="pink" value="pink" /><label for="pink">Pink</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input <?php if ($result['theme'] == 'purple') { echo "checked"; }?> type="radio" name="theme" id="purple" value="purple" /><label for="purple">Purple</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input <?php if ($result['theme'] == 'strawberry') { echo "checked"; }?> type="radio" name="theme" id="strawberry" value="strawberry" /><label for="strawberry">Strawberry</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input <?php if ($result['theme'] == 'yellow') { echo "checked"; }?> type="radio" name="theme" id="yellow" value="yellow" /><label for="yellow">Yellow</label>
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Change Theme" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>