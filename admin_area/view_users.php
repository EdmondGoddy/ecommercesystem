
<?php

/* MAY INCLUDE THIS CODE

if(!isset($_SESSION["admin_email"])){
	
	echo "<script> window.open('login.php', '_self'); </script>";
}else{
	

*/

?>



<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="active">
				<i class="fa fa-dashboard"></i> Dashboard / View Users
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-tags"></i> View Users
				</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>No:</th>
								<th>User Name:</th>
								<th>User Image:</th>
								<th>User Email:</th>
								<th>User Country:</th>
								<th>User Job:</th>
								<th>User Contact:</th>
								<th>Edit:</th>
								<th>Delete:</th>
							</tr>
						</thead>

						<tbody>

							<?php

							$get_users = "SELECT * FROM admins ";
							$run_users = mysqli_query($con, $get_users);

							$i = 0;

							while ($row_users = mysqli_fetch_array($run_users)) {
								# code...

								$user_id = $row_users["admin_id"];
								$user_name = $row_users["admin_name"];
								$user_img = $row_users["admin_image"];
								$user_email = $row_users["admin_email"];
								$user_country = $row_users["admin_country"];
								$user_job = $row_users["admin_job"];
								$user_contact = $row_users["admin_contact"];

								
								$i++;							
							?>
							<tr>
								<td> <?php echo $i; ?> </td>
								<td> <?php echo $user_name; ?> </td>
								<td> <img src="../admin_area/admin_images/<?php echo $user_img; ?>" > </td>
								<td> <?php echo $user_email; ?> </td>
								<td> <?php echo $user_country; ?> </td>
								<td> <?php echo $user_job; ?> </td>
								<td> <?php echo $user_contact; ?> </td>
								<td>
									<a href="index.php?user_profile=<?php echo $user_id; ?>">
										<i class="fa fa-pencil"></i> Edit
									</a>
								</td>
								<td>
									<a href="index.php?delete_user=<?php echo $user_id; ?>">
										<i class="fa fa-trash-o"></i>Delete
									</a>
								</td>
							</tr>

						    <?php  }   ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>




<?php /* }  */ ?>