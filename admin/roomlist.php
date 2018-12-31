<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Room List</h2>
       
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th width="5%">No.</th>
					<th width="15%">Hotel Name</th>
					<th width="15%">Room Type</th>
					<th width="7%">Price</th>
					<th width="8%">Max</th>
					<th width="8%">Booking State</th>
					<th width="9%">Image5</th>
					<th width="9%">Image6</th>
					<th width="9%">Image7</th>
					<th width="15%">Action</th>
					</tr>
			</thead>
			<tbody>
				<?php
				$query= "SELECT tbl_room.*, tbl_hotel.title FROM tbl_room
							INNER JOIN tbl_hotel
							ON tbl_hotel.id = tbl_room.hotelId
							ORDER By tbl_hotel.title DESC";
				$post= $db->select($query);
				if ($post) {
					$i=0;
					while ($result = $post->fetch_assoc()) {
						$i++;
				?>

				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><a href="roomedit.php?editroomid=<?php echo $result['id'];?>"><?php echo $result['title'];?></a></td>
					
					<td><?php echo $result['type'];?></td>
					<td>$<?php echo $result['price'];?></td>
					<td><?php echo $result['max'];?></td>

					<td>
						<?php 
							$booked=$result['booked'];
							if ($booked==0) {
								echo "Non-Booked";
							}else{
								echo "Booked";
							}
						?>
					</td>
					
					<td><img src="<?php echo $result['image5'];?>" height="30px" width="60px"/></td>
					<td><img src="<?php echo $result['image6'];?>" height="30px" width="60px"/></td>
					<td><img src="<?php echo $result['image7'];?>" height="30px" width="60px"/></td>
					
					
					

					<td>
						<a href="roomview.php?viewroomid=<?php echo $result['id'];?>">
							View
						</a>

<?php if (Session::get('userRole')=='0') {?>
						 || 
						<a href="roomedit.php?editroomid=<?php echo $result['id'];?>">
							Edit
						</a>
						 || 
						<a onclick="return confirm('Are you sure to Delete?');" href="roomdelete.php?delroomid=<?php echo $result['id'];?>">
							Delete
						</a> <?php } ?>
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
