<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
<?php
if (isset($_GET['seenid'])) {
	$seenid = $_GET['seenid'];

   $query = "UPDATE tbl_contact
                SET status='1' 
                WHERE id='$seenid'";
    $updatedrow = $db->update($query);
    if($updatedrow){
        echo "<span class='success'>Message Seen !!!</span>";
    }
}

if(isset($_GET['delid'])){
	$delid = $_GET['delid'];
	$delquery = "DELETE from tbl_contact where id='$delid'";
	$deldata = $db->delete($delquery);

	if($deldata){
        echo "<span class='success'>Message Deleted Successfully.</span>";
    }else{
          echo "<span class='error'>Message not Deleted!!</span>";   
    }

}

?>

                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="6%">Serial No.</th>
							<th width="12%">Name</th>
							<th width="12%">Email</th>
							<th width="35%">Message</th>
							<th width="15%">Date</th>
							<th width="20%">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$query= "select * from tbl_contact where status='0' order by id desc";
					$message= $db->select($query);
					if ($message) {
						$i=0;
						while ($result = $message->fetch_assoc()) {
							$i++;
					?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['firstname']." ".$result['lastname'];?></td>
							<td><?php echo $result['email'];?></td>
							<td><?php echo $fm->textshorten($result['body'], 50); ?></td>
							<td><?php echo $fm->formatDate($result['date']);?></td>
						
							<td>
								<a href="viewmsg.php?msgid=<?php echo $result['id'];?>">View</a> || 
								<a href="replymsg.php?msgid=<?php echo $result['id'];?>">Reply</a> || 
								<a onclick="return confirm('Do You See the Message??');"href="?seenid=<?php echo $result['id'];?>">Seen</a>
							</td>
						</tr>
						<?php } }?>
					</tbody>
				</table>
               </div>
            </div>
    


        <div class="box round first grid">
                <h2>Seen Message</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="6%">Serial No.</th>
							<th width="12%">Name</th>
							<th width="12%">Email</th>
							<th width="35%">Message</th>
							<th width="15%">Date</th>
							<th width="20%">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$query= "select * from tbl_contact where status='1' order by id desc";
					$message= $db->select($query);
					if ($message) {
						$i=0;
						while ($result = $message->fetch_assoc()) {
							$i++;
					?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['firstname']." ".$result['lastname'];?></td>
							<td><?php echo $result['email'];?></td>
							<td><?php echo $fm->textshorten($result['body'], 50); ?></td>
							<td><?php echo $fm->formatDate($result['date']);?></td>
	
							<td>
								<a href="viewmsg.php?msgid=<?php echo $result['id'];?>">View</a> || 
								<a onclick="return confirm('Are you sure to Delete?');" href="?delid=<?php echo $result['id'];?>">Delete</a>
							</td>
						</tr>
						<?php } }?>
					</tbody>
				</table>
               </div>
            </div>
    </div>


<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
