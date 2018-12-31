<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Hotel List</h2>
       
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th width="4%">No.</th>
					<th width="10%">Title</th>
					<th width="14%">Description</th>
					<th width="7%">City</th>
					<th width="8%">Image1</th>
					<th width="8%">Image2</th>
					<th width="8%">Image3</th>
					<th width="8%">Image4</th>
					<th width="8%">Address</th>
					<th width="6%">Author</th>
					<th width="5%">Tags</th>
					<th width="4%">User Ratings</th>
					<th width="12%">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$query= "SELECT tbl_hotel.*, tbl_city.cityName FROM tbl_hotel
							INNER JOIN tbl_city
							ON tbl_hotel.cityId = tbl_city.id
							ORDER By tbl_hotel.title DESC";
				$post= $db->select($query);
				if ($post) {
					$i=0;
					while ($result = $post->fetch_assoc()) {
						$i++;
				?>

				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><a href="hoteledit.php?edithotelid=<?php echo $result['id'];?>"><?php echo $result['title'];?></a></td>
					<td><?php echo $fm->textshorten($result['body'], 50); ?></td>
					<td><?php echo $result['cityName'];?></td>
					<td><img src="<?php echo $result['image1'];?>" height="30px" width="60px"/></td>
					<td><img src="<?php echo $result['image2'];?>" height="30px" width="60px"/></td>
					<td><img src="<?php echo $result['image3'];?>" height="30px" width="60px"/></td>
					<td><img src="<?php echo $result['image4'];?>" height="30px" width="60px"/></td>
					<td><?php echo $result['location'];?></td>
					<td><?php echo $result['author'];?></td>
					<td><?php echo $result['tags'];?></td>
					<td><?php echo $result['userrating'];?></td>
					

					<td>
						<a href="hotelview.php?viewhotelid=<?php echo $result['id'];?>">
							View
						</a>

<?php if (Session::get('userId') == $result['userid'] || Session::get('userRole')=='0') {?>
						 || 
						<a href="hoteledit.php?edithotelid=<?php echo $result['id'];?>">
							Edit
						</a>
						 || 
						<a onclick="return confirm('Are you sure to Delete?');" href="hoteldelete.php?delhotelid=<?php echo $result['id'];?>">
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
