<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>City List</h2>
       
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th width="3%">No.</th>
					<th width="9%">City Name</th>
					<th width="13%">Description</th>
					<th width="6%">Understand</th>
					<th width="7%">Banner</th>
					<th width="7%">Getin</th>
					<th width="5%">Get Around</th>
					<th width="5%">See</th>
					<th width="4%">Do</th>
					<th width="10%">Eat</th>
					<th width="12%">Buy</th>
					<th width="12%">Sleep</th>
					<th width="12%">Buy</th>

				</tr>
			</thead>
			<tbody>
				<?php
				$query= "SELECT * FROM tbl_city
						ORDER By tbl_city.id DESC";
				$post= $db->select($query);
				if ($post) {
					$i=0;
					while ($result = $post->fetch_assoc()) {
						$i++;
				?>

				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><?php echo $result['cityName'];?></td>
					<td><?php echo $fm->textshorten($result['description'], 50); ?></td>
					<td><?php echo $fm->textshorten($result['understand'],50);?></td>
					<td><img src="<?php echo $result['banner'];?>" height="30px" width="60px"/></td>
					<td><?php echo $fm->textshorten($result['getin'],50);?></td>
					<td><?php echo $fm->textshorten($result['getaround'],50);?></td>
					<td><?php echo $fm->textshorten($result['see'],50);?></td>
					<td><?php echo $fm->textshorten($result['do'],50);?></td>
					<td><?php echo $fm->textshorten($result['buy'],50);?></td>
					<td><?php echo $fm->textshorten($result['eat'],50);?></td>
					<td><?php echo $fm->textshorten($result['sleep'],50);?></td>


					<td>
						<a href="cityview.php?viewcityid=<?php echo $result['id'];?>">
							View
						</a>


						 || 
						<a href="cityedit.php?editcityid=<?php echo $result['id'];?>">
							Edit
						</a>
						 || 
						<a onclick="return confirm('Are you sure to Delete?');" href="citydelete.php?delcityid=<?php echo $result['id'];?>">
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
