<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Bus List</h2>
       
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th width="4%">No.</th>
					<th width="10%">Company Name</th>
					<th width="14%">Destination</th>
					<th width="7%">Leaving From</th>
					<th width="8%">Date</th>
					<th width="8%">Bus Image</th>
					<th width="8%">Time</th>
					<th width="6%">AC fare</th>
					<th width="5%">Non AC fare</th>
					<th width="12%">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$query= "SELECT tbl_bus.*, tbl_city.cityName FROM tbl_bus
							INNER JOIN tbl_city
							ON tbl_bus.destination = tbl_city.id AND tbl_bus.leavingfrom = tbl_city.id
							ORDER By tbl_bus.companyName DESC";
				$post= $db->select($query);
				if ($post) {
					$i=0;
					while ($result = $post->fetch_assoc()) {
						$i++;
				?>

				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><a href="busedit.php?editbusid=<?php echo $result['id'];?>"><?php echo $result['companyName'];?></a></td>
					<td><?php echo $result['destination']; ?></td>
					<td><?php echo $result['leavingfrom'];?></td>
					<td><?php echo $result['dep_date'];?></td>
					<td><img src="<?php echo $result['image'];?>" height="30px" width="60px"/></td>
					<td><?php echo $result['time'];?></td>
					<td>$<?php echo $result['acfare'];?></td>
					<td>$<?php echo $result['nonacfare'];?></td>
					

					<td>
						

<?php if (Session::get('id') == $result['id'] || Session::get('userRole')=='0') {?>
						  
						<a href="busedit.php?editbusid=<?php echo $result['id'];?>">
							Edit
						</a>
						 || 
						<a onclick="return confirm('Are you sure to Delete?');" href="busdelete.php?delbusid=<?php echo $result['id'];?>">
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
