<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Package List</h2>
       
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th width="4%">No.</th>
					<th width="8%">Package Name</th>
					<th width="7%">City Name</th>
					<th width="10%">Hotel Name</th>
					<th width="6%">Package Price</th>
					<th width="14%">Details</th>
					<th width="8%">Season</th>
					<th width="9%">Image1</th>
					<th width="9%">Image2</th>
					<th width="9%">Image3</th>
					<th width="16%">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$query= "SELECT *, (SELECT title FROM tbl_hotel WHERE tbl_hotel.id=tbl_package.hotelId) AS hotelName, (SELECT cityName FROM tbl_city WHERE tbl_city.id=tbl_package.cityId) AS cityName FROM tbl_package ORDER By `Packname` DESC";
				$post= $db->select($query);
				if ($post) {
					$i=0;
					while ($result = $post->fetch_assoc()) {
						$i++;
				?>

				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><a href="packageedit.php?editpackageid=<?php echo $result['Packid'];?>"><?php echo $result['Packname'];?></a></td>
					<td><?php echo $result['cityName'];?></td>
					<td><?php echo $result['hotelName'];?></td>
					<td><?php echo $result['Packprice'];?></td>
					<td><?php echo $fm->textshorten($result['Detail'], 50); ?></td>
					<td><?php echo $result['season'];?></td>
					<td><img src="<?php echo $result['Pic1'];?>" height="30px" width="60px"/></td>
					<td><img src="<?php echo $result['Pic2'];?>" height="30px" width="60px"/></td>
					<td><img src="<?php echo $result['Pic3'];?>" height="30px" width="60px"/></td>

					

					<td>
						

<?php //if (Session::get('userId') == $result['userid'] || Session::get('userRole')=='0') {?>
						<a href="packageedit.php?editpackageid=<?php echo $result['Packid'];?>">
							Edit
						</a>
						 || 
						<a onclick="return confirm('Are you sure to Delete?');" href="packagedelete.php?delpackageid=<?php echo $result['Packid'];?>">
							Delete
						</a> 
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
